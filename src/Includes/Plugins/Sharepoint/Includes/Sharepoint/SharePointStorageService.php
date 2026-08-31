<?php

namespace MSPress\Includes\Plugins\Sharepoint\Includes\Sharepoint;

use Exception;
use Microsoft\Graph\GraphServiceClient;
use MSPress\Includes\Functions\Helpers\DriveItemFormatter;
use MSPress\Includes\Functions\Helpers\LoggerHelper as utilities;
use MSPress\Includes\MSGraph\GraphService;
use MSPress\Includes\MSGraph\Kiota\Models\DriveItem;
use MSPress\Includes\Plugins\Onedrive\Includes\Kiota\OneDrive;
use MSPress\Includes\Plugins\Sharepoint\Includes\Kiota\SharePoint;

final class SharePointStorageService {

	private GraphServiceClient $graph;
	private ?SharePoint $sharepoint = null;
	private ?OneDrive $one_drive = null;

	private function get_sharepoint_client(): SharePoint {
		if ( $this->sharepoint === null ) {
			$this->sharepoint = $this->service->get_sharepoint_client();
		}

		if ( $this->sharepoint === null ) {
			throw new Exception( 'Graph client not initialized' );
		}

		return $this->sharepoint;
	}

	private function get_onedrive_client(): OneDrive {
		if ( $this->one_drive === null ) {
			$this->one_drive = $this->service->get_onedrive_client();
		}

		if ( $this->one_drive === null ) {
			throw new Exception( 'Graph client not initialized' );
		}

		return $this->one_drive;
	}

	private function encode_path_segments( string $path ): string {
		$path = trim( $path, '/' );
		return implode( '/', array_map( 'rawurlencode', explode( '/', $path ) ) );
	}

	public function __construct( private GraphService $service ) {
		$graph = $service->get_graph();
		if ( ! $graph ) {
			throw new Exception( 'Graph client not initialized' );
		}
		$this->graph = $graph;
	}

	public function list_sharepoint_sites() {
		try {
			$site_list = array();

			try {
				$sites_response = $this->get_sharepoint_client()->sites()->get()->wait();
				$sites          = $sites_response->getValue();
			} catch ( Exception $siteException ) {
				utilities::write_log( 'MS Graph list_sharepoint_sites SDK retrieval failed: ' . $siteException->getMessage() );
				$sites = array();
			}

			if ( empty( $sites ) ) {
				utilities::write_log( 'MS Graph list_sharepoint_sites falling back to direct HTTP site search' );
				$http_client = $this->service->getHttpClient();
				if ( ! $http_client ) {
					throw new Exception( 'Unable to create authenticated Graph HTTP client for site listing.' );
				}

				try {
					$response = $http_client->request(
						'GET',
						'sites?search=*',
						array(
							'headers' => array(
								'Accept' => 'application/json',
							),
						)
					);
				} catch ( \GuzzleHttp\Exception\ClientException $clientException ) {
					$status_code = $clientException->getResponse() ? $clientException->getResponse()->getStatusCode() : null;
					$body       = $clientException->getResponse() ? (string) $clientException->getResponse()->getBody() : '';
					utilities::write_log( 'MS Graph list_sharepoint_sites fallback HTTP error: ' . $status_code );

					if ( 403 === $status_code || stripos( $body, 'accessDenied' ) !== false ) {
						throw new Exception( 'Access denied listing SharePoint sites. Confirm the app has Sites.Read.All application permission and admin consent.' );
					}

					throw new Exception( 'Unable to list SharePoint sites via Graph HTTP fallback: ' . $clientException->getMessage() );
				}

				$site_body = json_decode( $response->getBody()->getContents(), true );
				if ( empty( $site_body['value'] ) || ! is_array( $site_body['value'] ) ) {
					utilities::write_log( 'MS Graph list_sharepoint_sites fallback response invalid; fields: ' . ( is_array( $site_body ) ? implode( ', ', array_keys( $site_body ) ) : 'invalid JSON' ) );
					throw new Exception( 'No SharePoint sites were returned by Graph.' );
				}

				$sites = $site_body['value'];
			}

			foreach ( $sites as $site ) {
				if ( is_object( $site ) ) {
					$site_id   = method_exists( $site, 'getId' ) ? $site->getId() : null;
					$site_name = method_exists( $site, 'getDisplayName' ) ? $site->getDisplayName() : null;
					if ( empty( $site_name ) && method_exists( $site, 'getName' ) ) {
						$site_name = $site->getName();
					}
					$site_url         = method_exists( $site, 'getWebUrl' ) ? $site->getWebUrl() : null;
					$site_description = method_exists( $site, 'getDescription' ) ? $site->getDescription() : null;
					$site_collection  = method_exists( $site, 'getSiteCollection' ) ? $site->getSiteCollection() : null;
					$hostname         = '';
					if ( is_object( $site_collection ) && method_exists( $site_collection, 'getHostname' ) ) {
						$hostname = $site_collection->getHostname();
					} elseif ( is_array( $site_collection ) ) {
						$hostname = $site_collection['hostname'] ?? '';
					}
				} elseif ( is_array( $site ) ) {
					$site_id          = $site['id'] ?? '';
					$site_name        = $site['displayName'] ?? $site['name'] ?? '';
					$site_url         = $site['webUrl'] ?? '';
					$site_description = $site['description'] ?? '';
					$hostname         = $site['siteCollection']['hostname'] ?? '';
				} else {
					continue;
				}

				$site_list[] = array(
					'id'              => $site_id ?? '',
					'name'            => $site_name ?? '',
					'url'             => $site_url ?? '',
					'description'     => $site_description ?? '',
					'site_collection' => array( 'hostname' => $hostname ),
				);
			}

			return $site_list;
		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph list_sharepoint_sites error: ' . $e->getMessage() );
			throw new Exception( 'Unable to list SharePoint sites. Please check your Sites.Read.All permission: ' . $e->getMessage() );
		}
	}

	public function list_site_drives( $site_id ) {
		try {
			$drive_list = array();

			try {
				$drives_response = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
				$drives          = $drives_response->getValue();
			} catch ( Exception $driveException ) {
				utilities::write_log( 'MS Graph list_site_drives drive retrieval failed: ' . $driveException->getMessage() );
				$drives = array();
			}

			if ( empty( $drives ) ) {
				utilities::write_log( 'MS Graph list_site_drives falling back to lists() for site ' . $site_id );
				$lists_response = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->lists()->get()->wait();
				$drives         = $lists_response->getValue();

				foreach ( $drives as $list ) {
					$drive_list[] = array(
						'id'                      => $list->getId(),
						'name'                    => $list->getName(),
						'description'             => $list->getDescription() ?? '',
						'drive_type'              => 'list',
						'web_url'                 => $list->getWebUrl() ?? '',
						'created_date_time'       => $list->getCreatedDateTime()?->format( 'Y-m-d H:i:s' ),
						'last_modified_date_time' => $list->getLastModifiedDateTime()?->format( 'Y-m-d H:i:s' ),
					);
				}

				return $drive_list;
			}

			foreach ( $drives as $drive ) {
				$drive_list[] = array(
					'id'                      => $drive->getId(),
					'name'                    => $drive->getName(),
					'description'             => $drive->getDescription() ?? '',
					'drive_type'              => $drive->getDriveType(),
					'web_url'                 => $drive->getWebUrl(),
					'created_date_time'       => $drive->getCreatedDateTime()?->format( 'Y-m-d H:i:s' ),
					'last_modified_date_time' => $drive->getLastModifiedDateTime()?->format( 'Y-m-d H:i:s' ),
				);
			}

			return $drive_list;
		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph list_site_drives error: ' . $e->getMessage() );
			throw new Exception( 'Unable to list drives for this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage() );
		}
	}

	/**
	 * Test drive access for a SharePoint site
	 */
	public function test_drive_access( $site_id ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		utilities::write_log( 'MSGraph test_drive_access: Testing drive access for site: ' . $site_id );

		try {
			// First verify site access
			utilities::write_log( 'MSGraph test_drive_access: Attempting to access site: ' . $site_id );
			$site = $this->get_sharepoint_site( $site_id );
			utilities::write_log( 'MSGraph test_drive_access: Site access successful: ' . $site->getDisplayName() );

			// Try to list drives
			utilities::write_log( 'MSGraph test_drive_access: Attempting to list drives for site: ' . $site_id );
			$drives_list  = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
			$drives_array = $drives_list->getValue();

			utilities::write_log( 'MSGraph test_drive_access: Found ' . count( $drives_array ) . ' drives' );
			$drive_names = array();
			foreach ( $drives_array as $drive ) {
				$drive_names[] = $drive->getName() . ' (ID: ' . $drive->getId() . ')';
				utilities::write_log( 'MSGraph test_drive_access: Drive: ' . $drive->getName() . ' - ' . $drive->getId() );
			}

			return array(
				'success'     => true,
				'site_name'   => $site->getDisplayName(),
				'drive_count' => count( $drives_array ),
				'drives'      => $drive_names,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MSGraph test_drive_access: Error: ' . $e->getMessage() );
			$error_details = $e->getMessage();
			if ( strpos( $error_details, '403' ) !== false || strpos( $error_details, 'Forbidden' ) !== false ) {
				$error_message = 'Access denied. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted and that admin consent has been provided.';
			} elseif ( strpos( $error_details, '401' ) !== false || strpos( $error_details, 'Unauthorized' ) !== false ) {
				$error_message = 'Authentication failed. Please check your Azure app credentials and ensure the app is properly configured.';
			} elseif ( strpos( $error_details, '404' ) !== false || strpos( $error_details, 'Not Found' ) !== false ) {
				$error_message = 'SharePoint site not found. Please verify the site URL format and ensure the site exists.';
			} elseif ( strpos( $error_details, 'Could not find SharePoint site' ) !== false ) {
				$error_message = 'Site access failed. The site URL format may be incorrect. Expected format: hostname:/sites/sitename';
			} else {
				$error_message = 'Drive access test failed: ' . $error_details;
			}
			return array(
				'success'   => false,
				'error'     => $error_message,
				'raw_error' => $error_details,
			);
		}
	}

	/**
	 * Get SharePoint site by identifier
	 */
	public function get_sharepoint_site( $site_identifier ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		utilities::write_log( 'MSGraph get_sharepoint_site: Looking up site: ' . $site_identifier );

		// Try different site ID formats
		$site_formats = array(
			$site_identifier, // Original format
		);

		// If it looks like hostname:/sites/sitename format, also try hostname:/sites/sitename:/sites/sitename
		if ( strpos( $site_identifier, ':/sites/' ) !== false ) {
			$parts = explode( ':/sites/', $site_identifier );
			if ( count( $parts ) === 2 ) {
				$hostname  = $parts[0];
				$site_path = $parts[1];
				// Try without the leading slash
				$site_formats[] = $hostname . ':/sites/' . $site_path;
				// Try with different path formats
				$site_formats[] = $hostname . '/sites/' . $site_path;
			}
		}

		foreach ( $site_formats as $format ) {
			try {
				utilities::write_log( 'MSGraph get_sharepoint_site: Trying format: ' . $format );
				$site = $this->get_sharepoint_client()->sites()->bySiteId( $format )->get()->wait();
				utilities::write_log( 'MSGraph get_sharepoint_site: Found site by ID: ' . $site->getDisplayName() );
				return $site;
			} catch ( Exception $e ) {
				utilities::write_log( 'MSGraph get_sharepoint_site: Format ' . $format . ' failed: ' . $e->getMessage() );
				continue;
			}
		}

		throw new Exception( 'Could not find SharePoint site: ' . $site_identifier . ' (tried multiple formats)' );
	}

	/**
	 * Get files and folders from SharePoint drive
	 */
	public function get_drive_items( $site_id, $drive_id = null, $folder_path = '', $drive_name = null ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		utilities::write_log( 'MSGraph get_drive_items: Starting with site_id=' . $site_id . ', drive_id=' . ( $drive_id ?? 'null' ) . ', folder_path=' . $folder_path . ', drive_name=' . ( $drive_name ?? 'null' ) );

		try {
			// Get the drive ID if not specified
			if ( ! $drive_id ) {
				if ( $drive_name ) {
					utilities::write_log( 'MSGraph get_drive_items: Looking for drive by name: ' . $drive_name );
					// Find drive by name
					try {
						$drives_list  = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
						$drives_array = $drives_list->getValue();
						utilities::write_log( 'MSGraph get_drive_items: Found ' . count( $drives_array ) . ' drives' );
						foreach ( $drives_array as $drive ) {
							utilities::write_log( 'MSGraph get_drive_items: Checking drive: ' . $drive->getName() . ' (ID: ' . $drive->getId() . ')' );
							if ( strcasecmp( $drive->getName(), $drive_name ) === 0 ) {
								$drive_id = $drive->getId();
								utilities::write_log( 'MSGraph get_drive_items: Found matching drive: ' . $drive_id );
								break;
							}
						}
						if ( ! $drive_id ) {
							$available_drives = array_map(
								function ( $d ) {
									return $d->getName();
								},
								$drives_array
							);
							utilities::write_log( 'MSGraph get_drive_items: Drive not found. Available: ' . implode( ', ', $available_drives ) );
							throw new Exception( 'Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode( ', ', $available_drives ) );
						}
					} catch ( Exception $e ) {
						utilities::write_log( 'MSGraph get_drive_items: Error accessing drives: ' . $e->getMessage() );
						$error_details = $e->getMessage();
						if ( strpos( $error_details, '403' ) !== false || strpos( $error_details, 'Forbidden' ) !== false ) {
							throw new Exception( 'Access denied when listing drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted and that the app has been granted admin consent. Error: ' . $error_details );
						} elseif ( strpos( $error_details, '401' ) !== false || strpos( $error_details, 'Unauthorized' ) !== false ) {
							throw new Exception( 'Authentication failed when accessing drives. Please check your Azure app credentials and ensure the app is properly configured. Error: ' . $error_details );
						} elseif ( strpos( $error_details, '404' ) !== false || strpos( $error_details, 'Not Found' ) !== false ) {
							throw new Exception( 'SharePoint site not found. Please verify the site URL and ensure the site exists. Error: ' . $error_details );
						} else {
							throw new Exception( 'Unable to access drives in this SharePoint site. Error: ' . $error_details );
						}
					}
				} else {
					utilities::write_log( 'MSGraph get_drive_items: No drive_name specified, trying default drive' );
					try {
						// Try to get the default drive first
						$drives   = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drive()->get()->wait();
						$drive_id = $drives->getId();
						utilities::write_log( 'MSGraph get_drive_items: Using default drive: ' . $drive_id );
					} catch ( Exception $e ) {
						utilities::write_log( 'MSGraph get_drive_items: Default drive not available: ' . $e->getMessage() );
						// If no default drive, list all drives and pick the first one
						try {
							$drives_list  = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
							$drives_array = $drives_list->getValue();
							if ( empty( $drives_array ) ) {
								utilities::write_log( 'MSGraph get_drive_items: No drives found in site' );
								throw new Exception( 'No drives found in this SharePoint site' );
							}
							$drive_id = $drives_array[0]->getId();
							utilities::write_log( 'MSGraph get_drive_items: Using first available drive: ' . $drive_id . ' (' . $drives_array[0]->getName() . ')' );
						} catch ( Exception $e2 ) {
							utilities::write_log( 'MSGraph get_drive_items: Error listing drives: ' . $e2->getMessage() );
							$error_details = $e2->getMessage();
							if ( strpos( $error_details, '403' ) !== false || strpos( $error_details, 'Forbidden' ) !== false ) {
								throw new Exception( 'Access denied when listing drives. Please ensure your Azure app registration has the Files.ReadWrite.All permission granted and that the app has been granted admin consent. Error: ' . $error_details );
							} elseif ( strpos( $error_details, '401' ) !== false || strpos( $error_details, 'Unauthorized' ) !== false ) {
								throw new Exception( 'Authentication failed when accessing drives. Please check your Azure app credentials and ensure the app is properly configured. Error: ' . $error_details );
							} elseif ( strpos( $error_details, '404' ) !== false || strpos( $error_details, 'Not Found' ) !== false ) {
								throw new Exception( 'SharePoint site not found. Please verify the site URL and ensure the site exists. Error: ' . $error_details );
							} else {
								throw new Exception( 'Unable to access drives in this SharePoint site. Error: ' . $error_details );
							}
						}
					}
				}
			}

			// Build the path for the folder
			$item_path = empty( $folder_path ) || $folder_path === '/' ? 'root' : 'root:' . $folder_path . ':';
			utilities::write_log( 'MSGraph get_drive_items: Using item_path: ' . $item_path . ', drive_id: ' . $drive_id );

			// Get children of the folder using HTTP client
			$httpClient  = $this->service->getHttpClient();
			$expandQuery = '?$expand=listItem($expand=fields)';
			if ( empty( $folder_path ) || $folder_path === '/' ) {
				$url            = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children" . $expandQuery;
				$response       = $httpClient->get( $url );
				$children       = json_decode( $response->getBody()->getContents(), true );
				$children_array = $children['value'] ?? array();
			} else {
				$clean_path     = $this->encode_path_segments( $folder_path );
				$url            = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$clean_path}:/children" . $expandQuery;
				$response       = $httpClient->get( $url );
				$children       = json_decode( $response->getBody()->getContents(), true );
				$children_array = $children['value'] ?? array();
			}

			$files   = array();
			$folders = array();

			foreach ( $children_array as $item ) {
				$item_data = array(
					'id'                      => $item['id'],
					'name'                    => $item['name'],
					'web_url'                 => $item['webUrl'],
					'created_date_time'       => isset( $item['createdDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $item['createdDateTime'] ) ) : null,
					'last_modified_date_time' => isset( $item['lastModifiedDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $item['lastModifiedDateTime'] ) ) : null,
				);

				if ( isset( $item['folder'] ) ) {
					// It's a folder
					$folders[] = array_merge(
						$item_data,
						array(
							'type'        => 'folder',
							'path'        => ( $folder_path === '/' ? '' : rtrim( $folder_path, '/' ) . '/' ) . $item['name'],
							'child_count' => $item['folder']['childCount'] ?? 0,
						)
					);
				} else {
					// It's a file
					$file_info = DriveItemFormatter::format_array_item( $item );
					$files[]   = array_merge(
						$item_data,
						$file_info,
						array(
							'path' => ( $folder_path === '/' ? '' : rtrim( $folder_path, '/' ) . '/' ) . $item['name'],
						)
					);
				}
			}

			utilities::write_log( 'MSGraph get_drive_items: Successfully retrieved ' . count( $files ) . ' files and ' . count( $folders ) . ' folders' );

			return array(
				'files'    => $files,
				'folders'  => $folders,
				'drive_id' => $drive_id,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph get_drive_items error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Upload file to SharePoint
	 */
	public function upload_file( $site_id, $drive_id, $folder_path, $file_path, $file_name, $drive_name = null, $metadata = array() ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		try {
			// Get the drive ID if not specified
			if ( ! $drive_id ) {
				if ( $drive_name ) {
					// Find drive by name
					try {
						$drives_list  = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
						$drives_array = $drives_list->getValue();
						foreach ( $drives_array as $drive ) {
							if ( strcasecmp( $drive->getName(), $drive_name ) === 0 ) {
								$drive_id = $drive->getId();
								break;
							}
						}
						if ( ! $drive_id ) {
							throw new Exception(
								'Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(
									', ',
									array_map(
										function ( $d ) {
											return $d->getName();
										},
										$drives_array
									)
								)
							);
						}
					} catch ( Exception $e ) {
						throw new Exception( 'Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage() );
					}
				} else {
					$drive_id = $this->resolve_drive_id( $site_id );
				}
			}

			// Read file content
			$file_content = file_get_contents( $file_path );
			if ( $file_content === false ) {
				throw new Exception( 'Could not read file: ' . $file_path );
			}

			// Build the upload path
			$upload_path = empty( $folder_path ) || $folder_path === '/' ? $file_name : $folder_path . '/' . $file_name;
			$upload_path = $this->encode_path_segments( $upload_path );
			// Upload the file using HTTP client
			$httpClient    = $this->service->getHttpClient();
			$url           = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$upload_path}:/content";
			$response      = $httpClient->request(
				'PUT',
				$url,
				array(
					'headers' => array(
						'Content-Type' => 'application/octet-stream',
					),
					'body'    => $file_content,
				)
			);
			$uploaded_item = json_decode( $response->getBody()->getContents(), true );

			// Update metadata if provided
			if ( ! empty( $metadata ) && isset( $uploaded_item['id'] ) ) {
				try {
					$this->update_file_metadata( $site_id, $drive_id, $uploaded_item['id'], $metadata );
				} catch ( Exception $metadata_error ) {
					utilities::write_log( 'MS Graph upload_file metadata update warning: ' . $metadata_error->getMessage() );
					// Don't fail the upload if metadata update fails
				}
			}

			return array(
				'id'                      => $uploaded_item['id'],
				'name'                    => $uploaded_item['name'],
				'web_url'                 => $uploaded_item['webUrl'],
				'size'                    => $uploaded_item['size'],
				'created_date_time'       => isset( $uploaded_item['createdDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $uploaded_item['createdDateTime'] ) ) : null,
				'last_modified_date_time' => isset( $uploaded_item['lastModifiedDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $uploaded_item['lastModifiedDateTime'] ) ) : null,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph upload_file error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Update file metadata (list item fields) in SharePoint or OneDrive
	 */
	private function update_file_metadata( $site_id, $drive_id, $item_id, $metadata ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		try {
			// Prepare the fields to update
			$fields = array();

			if ( isset( $metadata['title'] ) ) {
				$fields['Title'] = $metadata['title'];
			}

			if ( isset( $metadata['file_version'] ) ) {
				$fields['FileVersion'] = $metadata['file_version'];
			}

			// Add any other custom fields
			foreach ( $metadata as $key => $value ) {
				if ( ! in_array( $key, array( 'title', 'file_version' ) ) ) {
					$fields[ $key ] = $value;
				}
			}

			if ( empty( $fields ) ) {
				return; // Nothing to update
			}

			// Update the list item fields - handle both SharePoint and OneDrive
			if ( $site_id ) {
				// SharePoint - update list item fields using HTTP client
				$httpClient = $this->service->getHttpClient();
				$url        = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item_id}/listItem/fields";
				$httpClient->request(
					'PATCH',
					$url,
					array(
						'headers' => array(
							'Content-Type' => 'application/json',
						),
						'body'    => json_encode( $fields ),
					)
				);
			} else {
				// OneDrive - update item properties directly
				// For OneDrive, we can update basic properties like name, but custom fields might not be available
				// For now, we'll try to update the description field if title is provided
				if ( isset( $fields['Title'] ) ) {
					$driveItem = new DriveItem();
					$driveItem->setDescription( $fields['Title'] );

					$this->get_onedrive_client()->me()->drive()
						->items()
						->byDriveItemId( $item_id )
						->patch( $driveItem )
						->wait();
				}
			}
		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph update_file_metadata error: ' . $e->getMessage() );
			throw new Exception( 'Failed to update file metadata: ' . $e->getMessage() );
		}
	}

	/**
	 * Delete file from SharePoint
	 */
	public function delete_file( $site_id, $drive_id, $item_id, $drive_name = null ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		try {
			// Get the drive ID if not specified
			if ( ! $drive_id ) {
				if ( $drive_name ) {
					// Find drive by name
					try {
						$drives_list  = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
						$drives_array = $drives_list->getValue();
						foreach ( $drives_array as $drive ) {
							if ( strcasecmp( $drive->getName(), $drive_name ) === 0 ) {
								$drive_id = $drive->getId();
								break;
							}
						}
						if ( ! $drive_id ) {
							throw new Exception(
								'Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(
									', ',
									array_map(
										function ( $d ) {
											return $d->getName();
										},
										$drives_array
									)
								)
							);
						}
					} catch ( Exception $e ) {
						throw new Exception( 'Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage() );
					}
				} else {
					$drive_id = $this->resolve_drive_id( $site_id );
				}
			}

			// Delete file using HTTP client
			$http_client = $this->service->getHttpClient();
			if ( ! $http_client ) {
				throw new Exception( 'HTTP client not available' );
			}
			$url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item_id}";
			$http_client->request( 'DELETE', $url );
			return true;
		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph delete_file error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Create folder in SharePoint
	 */
	public function create_folder( $site_id, $drive_id, $parent_path, $folder_name, $drive_name = null ) {
		if ( ! $this->graph ) {
			throw new Exception( 'Graph client not initialized' );
		}

		try {
			// Get the drive ID if not specified
			if ( ! $drive_id ) {
				if ( $drive_name ) {
					// Find drive by name
					try {
						$drives_list  = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait();
						$drives_array = $drives_list->getValue();
						foreach ( $drives_array as $drive ) {
							if ( strcasecmp( $drive->getName(), $drive_name ) === 0 ) {
								$drive_id = $drive->getId();
								break;
							}
						}
						if ( ! $drive_id ) {
							throw new Exception(
								'Drive with name "' . $drive_name . '" not found in this SharePoint site. Available drives: ' . implode(
									', ',
									array_map(
										function ( $d ) {
											return $d->getName();
										},
										$drives_array
									)
								)
							);
						}
					} catch ( Exception $e ) {
						throw new Exception( 'Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage() );
					}
				} else {
					$drive_id = $this->resolve_drive_id( $site_id );
				}
			}

			$folder_data = array(
				'name'                              => $folder_name,
				'folder'                            => (object) array(),
				'@microsoft.graph.conflictBehavior' => 'rename',
			);

			// Create folder using HTTP client
			$httpClient = $this->service->getHttpClient();
			if ( empty( $parent_path ) || $parent_path === '/' ) {
				$url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children";
			} else {
				$encoded_path = $this->encode_path_segments( $parent_path );
				$url          = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$encoded_path}:/children";
			}
			$response   = $httpClient->request(
				'POST',
				$url,
				array(
					'headers' => array(
						'Content-Type' => 'application/json',
					),
					'body'    => json_encode( $folder_data ),
				)
			);
			$new_folder = json_decode( $response->getBody()->getContents(), true );

			return array(
				'id'                => $new_folder['id'],
				'name'              => $new_folder['name'],
				'web_url'           => $new_folder['webUrl'],
				'path'              => ( $parent_path ? $parent_path . '/' : '' ) . $folder_name,
				'created_date_time' => isset( $new_folder['createdDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $new_folder['createdDateTime'] ) ) : null,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph create_folder error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Get SharePoint site by identifier
	 */
	public function getSharePointSite( $site_identifier ) {
		try {
			if ( ! $this->graph ) {
				throw new Exception( 'MS Graph not initialized' );
			}

			$site = $this->get_sharepoint_client()->sites()->bySiteId( $site_identifier )->get()->wait();
			return $site;
		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph getSharePointSite error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Resolve a SharePoint drive ID through the Graph SDK.
	 */
	private function resolve_drive_id( $site_id, $drive_id = null ) {
		if ( $drive_id ) {
			$drive = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->byDriveId( $drive_id )->get()->wait();
			return $drive->getId();
		}

		try {
			$drive = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drive()->get()->wait();
			return $drive->getId();
		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph resolve_drive_id: Default drive not available: ' . $e->getMessage() );
		}

		try {
			$drives = $this->get_sharepoint_client()->sites()->bySiteId( $site_id )->drives()->get()->wait()->getValue();
			if ( empty( $drives ) ) {
				throw new Exception( 'No drives found in this SharePoint site' );
			}

			return $drives[0]->getId();
		} catch ( Exception $e ) {
			throw new Exception( 'Unable to access drives in this SharePoint site. Please check your Files.ReadWrite.All permission: ' . $e->getMessage() );
		}
	}

	/**
	 * Get drive items from SharePoint site
	 */
	public function getDriveItems( $site_id, $drive_id = null, $folder_path = '' ) {
		try {
			utilities::write_log( 'MS Graph getDriveItems called with site_id: ' . $site_id . ', drive_id: ' . ( $drive_id ?? 'null' ) . ', folder_path: ' . $folder_path );

			if ( ! $this->graph ) {
				utilities::write_log( 'MS Graph getDriveItems: Graph not initialized' );
				throw new Exception( 'MS Graph not initialized' );
			}

			utilities::write_log( 'MS Graph getDriveItems: Graph is initialized, proceeding with API call' );

			$drive_id = $this->resolve_drive_id( $site_id, $drive_id );

			// Get root items or items in specific folder using HTTP client
			$httpClient = $this->service->getHttpClient();
			if ( empty( $folder_path ) || $folder_path === '/' ) {
				$url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children";
			} else {
				$encoded_path = $this->encode_path_segments( $folder_path );
				$url          = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$encoded_path}:/children";
			}
			$response = $httpClient->get( $url );
			$data     = json_decode( $response->getBody()->getContents(), true );
			$items    = $data['value'] ?? array();

			$files   = array();
			$folders = array();

			foreach ( $items as $item ) {
				$item_data = array(
					'id'                      => $item['id'],
					'name'                    => $item['name'],
					'web_url'                 => $item['webUrl'],
					'created_date_time'       => isset( $item['createdDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $item['createdDateTime'] ) ) : null,
					'last_modified_date_time' => isset( $item['lastModifiedDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $item['lastModifiedDateTime'] ) ) : null,
				);

				if ( isset( $item['folder'] ) ) {
					$folders[] = array_merge(
						$item_data,
						array(
							'type'       => 'folder',
							'icon'       => 'fas fa-folder',
							'size'       => '',
							'size_bytes' => 0,
						)
					);
				} else {
					$file_info = DriveItemFormatter::format_array_item( $item );
					$files[]   = array_merge( $item_data, $file_info );
				}
			}

			return array(
				'files'    => $files,
				'folders'  => $folders,
				'drive_id' => $drive_id,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph getDriveItems error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Upload file to SharePoint
	 */
	public function uploadFileToSharePoint( $site_id, $drive_id, $folder_path, $file_path, $file_name ) {
		try {
			if ( ! $this->graph ) {
				throw new Exception( 'MS Graph not initialized' );
			}

			$drive_id = $this->resolve_drive_id( $site_id, $drive_id );

			// Prepare upload path
			$upload_path  = empty( $folder_path ) || $folder_path === '/' ? $file_name : $folder_path . '/' . $file_name;
			$encoded_path = $this->encode_path_segments( $upload_path );

			// Read file content
			$file_content = file_get_contents( $file_path );
			if ( $file_content === false ) {
				throw new Exception( 'Failed to read file content' );
			}

			// Upload file using HTTP client
			$httpClient    = $this->service->getHttpClient();
			$url           = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$encoded_path}:/content";
			$response      = $httpClient->request(
				'PUT',
				$url,
				array(
					'headers' => array(
						'Content-Type' => 'application/octet-stream',
					),
					'body'    => $file_content,
				)
			);
			$uploaded_item = json_decode( $response->getBody()->getContents(), true );

			return array(
				'id'                      => $uploaded_item['id'],
				'name'                    => $uploaded_item['name'],
				'web_url'                 => $uploaded_item['webUrl'],
				'size'                    => DriveItemFormatter::format_file_size( $uploaded_item['size'] ?? 0 ),
				'size_bytes'              => $uploaded_item['size'] ?? 0,
				'created_date_time'       => isset( $uploaded_item['createdDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $uploaded_item['createdDateTime'] ) ) : null,
				'last_modified_date_time' => isset( $uploaded_item['lastModifiedDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $uploaded_item['lastModifiedDateTime'] ) ) : null,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph uploadFileToSharePoint error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Delete file from SharePoint
	 */
	public function deleteFileFromSharePoint( $site_id, $drive_id, $file_id ) {
		try {
			if ( ! $this->graph ) {
				throw new Exception( 'MS Graph not initialized' );
			}

			// Delete the item using HTTP client
			$httpClient = $this->service->getHttpClient();
			if ( ! $httpClient ) {
				throw new Exception( 'HTTP client not available' );
			}
			$url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$file_id}";
			$httpClient->request( 'DELETE', $url );

			return true;

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph deleteFileFromSharePoint error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Create folder in SharePoint
	 */
	public function createSharePointFolder( $site_id, $drive_id, $parent_path, $folder_name ) {
		try {
			if ( ! $this->graph ) {
				throw new Exception( 'MS Graph not initialized' );
			}

			$drive_id = $this->resolve_drive_id( $site_id, $drive_id );

			// Prepare parent path
			$logical_parent_path = empty( $parent_path ) || $parent_path === '/' ? '' : ltrim( $parent_path, '/' );

			// Create folder
			$folder_data = array(
				'name'                              => $folder_name,
				'folder'                            => new \Microsoft\Graph\Generated\Models\Folder(),
				'@microsoft.graph.conflictBehavior' => 'rename',
			);

			// Create folder using HTTP client
			$httpClient = $this->service->getHttpClient();
			if ( empty( $logical_parent_path ) ) {
				$url = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root/children";
			} else {
				$encoded_parent_path = $this->encode_path_segments( $logical_parent_path );
				$url                 = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$encoded_parent_path}:/children";
			}
			$response   = $httpClient->request(
				'POST',
				$url,
				array(
					'headers' => array(
						'Content-Type' => 'application/json',
					),
					'json'    => array(
						'name'   => $folder_name,
						'folder' => (object) array(),
						'@microsoft.graph.conflictBehavior' => 'rename',
					),
				)
			);
			$new_folder = json_decode( $response->getBody()->getContents(), true );

			return array(
				'id'                => $new_folder['id'],
				'name'              => $new_folder['name'],
				'web_url'           => $new_folder['webUrl'],
				'path'              => ( $logical_parent_path ? $logical_parent_path . '/' : '' ) . $folder_name,
				'created_date_time' => isset( $new_folder['createdDateTime'] ) ? date( 'Y-m-d H:i:s', strtotime( $new_folder['createdDateTime'] ) ) : null,
			);

		} catch ( Exception $e ) {
			utilities::write_log( 'MS Graph createSharePointFolder error: ' . $e->getMessage() );
			throw $e;
		}
	}

	/**
	 * Rename a drive item (file or folder) in SharePoint
	 *
	 * @param string $site_id SharePoint site ID
	 * @param string $drive_id Drive ID
	 * @param string $item_path Path to the item to rename
	 * @param string $new_name New name for the item
	 * @param string $drive_name Drive name for logging
	 * @return array Result of the operation
	 * @throws Exception If rename fails
	 */
	public function rename_drive_item( $site_id, $drive_id, $item_path, $new_name, $drive_name = '' ) {
		try {
			$httpClient = $this->service->getHttpClient();

			// Get the item by path first
			$itemPath     = ltrim( $item_path, '/' );
			$itemPath     = $this->encode_path_segments( $itemPath );
			$itemUrl      = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$itemPath}";
			$itemResponse = $httpClient->request( 'GET', $itemUrl );
			$item         = json_decode( $itemResponse->getBody()->getContents(), true );

			if ( ! isset( $item['id'] ) ) {
				throw new Exception( 'Item not found' );
			}

			// Create update request body
			$updateBody = array(
				'name' => $new_name,
			);

			// Update the item
			$updateUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item['id']}";
			$httpClient->request(
				'PATCH',
				$updateUrl,
				array(
					'headers' => array(
						'Content-Type' => 'application/json',
					),
					'body'    => json_encode( $updateBody ),
				)
			);

			return array(
				'success' => true,
				'item_id' => $item['id'],
				'name'    => $new_name,
				'web_url' => $item['webUrl'],
			);

		} catch ( Exception $e ) {
			utilities::write_log( "MS Graph rename_drive_item error for {$drive_name}: {$item_path} -> {$new_name}: " . $e->getMessage() );
			throw new Exception( 'Failed to rename item: ' . $e->getMessage() );
		}
	}

	/**
	 * Delete a drive item (file or folder) in SharePoint
	 *
	 * @param string $site_id SharePoint site ID
	 * @param string $drive_id Drive ID
	 * @param string $item_path Path to the item to delete
	 * @param string $drive_name Drive name for logging
	 * @return array Result of the operation
	 * @throws Exception If delete fails
	 */
	public function delete_drive_item( $site_id, $drive_id, $item_path, $drive_name = '' ) {
		try {
			$httpClient = $this->service->getHttpClient();

			// Get the item by path first to get its ID
			$itemPath     = ltrim( $item_path, '/' );
			$itemPath     = $this->encode_path_segments( $itemPath );
			$itemUrl      = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$itemPath}";
			$itemResponse = $httpClient->request( 'GET', $itemUrl );
			$item         = json_decode( $itemResponse->getBody()->getContents(), true );

			if ( ! isset( $item['id'] ) ) {
				throw new Exception( 'Item not found' );
			}

			// Delete the item
			$deleteUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$item['id']}";
			$httpClient->request( 'DELETE', $deleteUrl );

			return array(
				'success'         => true,
				'deleted_item_id' => $item['id'],
			);

		} catch ( Exception $e ) {
			utilities::write_log( "MS Graph delete_drive_item error for {$drive_name}: {$item_path}: " . $e->getMessage() );
			throw new Exception( 'Failed to delete item: ' . $e->getMessage() );
		}
	}

	/**
	 * Move a drive item (file or folder) in SharePoint
	 *
	 * @param string $site_id SharePoint site ID
	 * @param string $drive_id Drive ID
	 * @param string $source_path Path to the item to move
	 * @param string $target_path New path for the item
	 * @param string $drive_name Drive name for logging
	 * @return array Result of the operation
	 * @throws Exception If move fails
	 */
	public function move_drive_item( $site_id, $drive_id, $source_path, $target_path, $drive_name = '' ) {
		try {
			$httpClient = $this->service->getHttpClient();

			// Clean and validate paths
			$source_path = trim( $source_path, '/' );
			$target_path = trim( $target_path, '/' );

			if ( empty( $source_path ) ) {
				throw new Exception( 'Source path cannot be empty' );
			}

			if ( empty( $target_path ) ) {
				throw new Exception( 'Target path cannot be empty' );
			}

			utilities::write_log( "MS Graph move_drive_item: Moving '{$source_path}' to '{$target_path}' in drive '{$drive_name}'" );

			// Get the source item by path
			$sourcePath = ltrim( $source_path, '/' );
			$sourcePath = $this->encode_path_segments( $sourcePath );
			$sourceUrl  = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$sourcePath}";

			utilities::write_log( "MS Graph move_drive_item: Source URL: {$sourceUrl}" );

			$sourceResponse = $httpClient->request( 'GET', $sourceUrl );
			$sourceItem     = json_decode( $sourceResponse->getBody()->getContents(), true );

			if ( ! isset( $sourceItem['id'] ) ) {
				utilities::write_log( 'MS Graph move_drive_item: Source item response fields: ' . implode( ', ', array_keys( $sourceItem ) ) );
				throw new Exception( 'Source item not found or invalid response' );
			}

			// Get the target parent folder
			$targetParentPath = dirname( $target_path );
			$targetName       = basename( $target_path );

			utilities::write_log( "MS Graph move_drive_item: Target parent path: '{$targetParentPath}', target name: '{$targetName}'" );

			if ( $targetParentPath === '.' || $targetParentPath === '/' || $targetParentPath === '' ) {
				// Moving to root
				utilities::write_log( 'MS Graph move_drive_item: Moving to root directory' );
				$rootUrl      = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root";
				$rootResponse = $httpClient->request( 'GET', $rootUrl );
				$rootItem     = json_decode( $rootResponse->getBody()->getContents(), true );

				if ( ! isset( $rootItem['id'] ) ) {
					utilities::write_log( 'MS Graph move_drive_item: Root item response fields: ' . implode( ', ', array_keys( $rootItem ) ) );
					throw new Exception( 'Root folder not found or invalid response' );
				}

				$targetParentId = $rootItem['id'];
			} else {
				// Moving to a subfolder
				$targetParentPath = ltrim( $targetParentPath, '/' );
				$targetParentPath = $this->encode_path_segments( $targetParentPath );
				$targetParentUrl  = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/root:/{$targetParentPath}";

				utilities::write_log( "MS Graph move_drive_item: Target parent URL: {$targetParentUrl}" );

				$targetParentResponse = $httpClient->request( 'GET', $targetParentUrl );
				$targetParent         = json_decode( $targetParentResponse->getBody()->getContents(), true );

				if ( ! isset( $targetParent['id'] ) ) {
					utilities::write_log( 'MS Graph move_drive_item: Target parent response fields: ' . implode( ', ', array_keys( $targetParent ) ) );
					throw new Exception( 'Target parent folder not found or invalid response' );
				}
				$targetParentId = $targetParent['id'];
			}

			// Create move request body
			$moveBody = array(
				'parentReference' => array(
					'id' => $targetParentId,
				),
				'name'            => $targetName,
			);

			utilities::write_log( 'MS Graph move_drive_item: Move body fields: ' . implode( ', ', array_keys( $moveBody ) ) );

			// Move the item
			$moveUrl = "https://graph.microsoft.com/v1.0/sites/{$site_id}/drives/{$drive_id}/items/{$sourceItem['id']}";
			utilities::write_log( "MS Graph move_drive_item: Move URL: {$moveUrl}" );

			$moveResponse = $httpClient->request(
				'PATCH',
				$moveUrl,
				array(
					'headers' => array(
						'Content-Type' => 'application/json',
					),
					'body'    => json_encode( $moveBody ),
				)
			);

			$movedItem = json_decode( $moveResponse->getBody()->getContents(), true );

			utilities::write_log( 'MS Graph move_drive_item: Move successful; returned fields: ' . implode( ', ', array_keys( $movedItem ) ) );

			return array(
				'success' => true,
				'item_id' => $movedItem['id'],
				'name'    => $movedItem['name'],
				'web_url' => $movedItem['webUrl'],
			);

		} catch ( Exception $e ) {
			utilities::write_log( "MS Graph move_drive_item error for {$drive_name}: {$source_path} -> {$target_path}: " . $e->getMessage() );
			throw new Exception( 'Failed to move item: ' . $e->getMessage() );
		}
	}
}
