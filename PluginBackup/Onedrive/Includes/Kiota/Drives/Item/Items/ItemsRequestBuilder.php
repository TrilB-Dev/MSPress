<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Drives\Item\Items;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Drives\Item\Items\Item\DriveItemItemRequestBuilder;

/**
 * Builds and executes requests for operations under /drives/{drive-id}/items
*/
class ItemsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Provides operations to manage the items property of the microsoft.graph.drive entity.
     * @param string $driveItemId The unique identifier of driveItem
     * @return DriveItemItemRequestBuilder
    */
    public function byDriveItemId(string $driveItemId): DriveItemItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['driveItem%2Did'] = $driveItemId;
        return new DriveItemItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new ItemsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/drives/{drive%2Did}/items');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
