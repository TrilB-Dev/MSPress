<?php

namespace MSPress\Includes\Plugins\Exchange\Includes\Kiota\Users\Item\MailFolders;

use Microsoft\Kiota\Abstractions\BaseRequestBuilder;
use Microsoft\Kiota\Abstractions\RequestAdapter;
use MSPress\Includes\Plugins\Exchange\Includes\Kiota\Users\Item\MailFolders\Item\MailFolderItemRequestBuilder;

/**
 * Builds and executes requests for operations under /users/{user-id}/mailFolders
*/
class MailFoldersRequestBuilder extends BaseRequestBuilder 
{
    /**
     * Provides operations to manage the mailFolders property of the microsoft.graph.user entity.
     * @param string $mailFolderId The unique identifier of mailFolder
     * @return MailFolderItemRequestBuilder
    */
    public function byMailFolderId(string $mailFolderId): MailFolderItemRequestBuilder {
        $urlTplParams = $this->pathParameters;
        $urlTplParams['mailFolder%2Did'] = $mailFolderId;
        return new MailFolderItemRequestBuilder($urlTplParams, $this->requestAdapter);
    }

    /**
     * Instantiates a new MailFoldersRequestBuilder and sets the default values.
     * @param array<string, mixed>|string $pathParametersOrRawUrl Path parameters for the request or a String representing the raw URL.
     * @param RequestAdapter $requestAdapter The request adapter to use to execute the requests.
    */
    public function __construct($pathParametersOrRawUrl, RequestAdapter $requestAdapter) {
        parent::__construct($requestAdapter, [], '{+baseurl}/users/{user%2Did}/mailFolders');
        if (is_array($pathParametersOrRawUrl)) {
            $this->pathParameters = $pathParametersOrRawUrl;
        } else {
            $this->pathParameters = ['request-raw-url' => $pathParametersOrRawUrl];
        }
    }

}
