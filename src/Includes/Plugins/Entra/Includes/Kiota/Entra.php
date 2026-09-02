<?php

namespace MSPress\Includes\Plugins\Entra\Includes\Kiota;

use Microsoft\Kiota\Abstractions\ApiClientBuilder;
use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use MSPress\Includes\Plugins\Entra\Includes\Kiota\Groups\GroupsRequestBuilder;
use MSPress\Includes\Plugins\Entra\Includes\Kiota\Users\UsersRequestBuilder;

/**
 * The main entry point of the SDK, exposes the configuration and the fluent API.
*/
class Entra extends BaseRequestBuilder 
{
    /**
     * Provides operations to manage the collection of group entities.
    */
    public function groups(): GroupsRequestBuilder {
        return new GroupsRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Provides operations to manage the collection of user entities.
    */
    public function users(): UsersRequestBuilder {
        return new UsersRequestBuilder($this->pathParameters, $this->requestAdapter);
    }
    
    /**
     * Instantiates a new Entra and sets the default values.
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
