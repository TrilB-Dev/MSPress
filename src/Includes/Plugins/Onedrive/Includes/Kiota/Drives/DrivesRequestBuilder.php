<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Drives;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Drives\Item\DriveItemRequestBuilder;

/**
 * Builds and executes requests for operations under /drives
*/
class DrivesRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Provides operations to manage the collection of drive entities.
     * @param string $driveId The unique identifier of drive
     * @return DriveItemRequestBuilder
    */
    public function byDriveId(string $driveId): DriveItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['drive%2Did'] = $driveId;
        return new DriveItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new DrivesRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/drives');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
