<?php

namespace MSPress\Includes\Plugins\Exchange\Includes\Kiota\Me\Settings;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use MSPress\Includes\Plugins\Exchange\Includes\Kiota\Me\Settings\Exchange\ExchangeRequestBuilder;

/**
 * Builds and executes requests for operations under /me/settings
*/
class SettingsRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Provides operations to manage the exchange property of the microsoft.graph.userSettings entity.
    */
    public function exchange(): ExchangeRequestBuilder {
        return new ExchangeRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new SettingsRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/me/settings');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
