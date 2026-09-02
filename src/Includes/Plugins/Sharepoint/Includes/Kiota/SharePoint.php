<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota;

use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Sites\SitesRequestBuilder;

/**
 * The main entry point of the SDK, exposes the configuration and the fluent API.
*/
class SharePoint extends BaseRequestBuilder 
{
    /**
     * Provides operations to manage the collection of site entities.
    */
    public function sites(): SitesRequestBuilder {
        return new SitesRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new SharePoint and sets the default values.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct(RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}');
        if (empty($this->requestAdapter->getBaseUrl())) {
            $this->requestAdapter->setBaseUrl('https://graph.microsoft.com/v1.0');
        }
        $this->pathParameters['baseurl'] = $this->requestAdapter->getBaseUrl();
    }

}
