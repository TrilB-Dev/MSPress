<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class GitHubOrganizationEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $company The name of the company that owns the organization.
    */
    private ?string $company = null;
    
    /**
     * @var string|null $displayName The display name of the organization.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $email The email address of the organization.
    */
    private ?string $email = null;
    
    /**
     * @var string|null $login The login (name) of the organization.
    */
    private ?string $login = null;
    
    /**
     * @var string|null $orgId The unique and immutable ID of the organization.
    */
    private ?string $orgId = null;
    
    /**
     * @var string|null $webUrl The URL of the web page for the organization.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new GitHubOrganizationEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.gitHubOrganizationEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return GitHubOrganizationEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): GitHubOrganizationEvidence {
        return new GitHubOrganizationEvidence();
    }

    /**
     * Gets the company property value. The name of the company that owns the organization.
     * @return string|null
    */
    public function getCompany(): ?string {
        return $this->company;
    }

    /**
     * Gets the displayName property value. The display name of the organization.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the email property value. The email address of the organization.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'company' => fn(ParseNode $n) => $o->setCompany($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'login' => fn(ParseNode $n) => $o->setLogin($n->getStringValue()),
            'orgId' => fn(ParseNode $n) => $o->setOrgId($n->getStringValue()),
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the login property value. The login (name) of the organization.
     * @return string|null
    */
    public function getLogin(): ?string {
        return $this->login;
    }

    /**
     * Gets the orgId property value. The unique and immutable ID of the organization.
     * @return string|null
    */
    public function getOrgId(): ?string {
        return $this->orgId;
    }

    /**
     * Gets the webUrl property value. The URL of the web page for the organization.
     * @return string|null
    */
    public function getWebUrl(): ?string {
        return $this->webUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('company', $this->getCompany());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeStringValue('login', $this->getLogin());
        $writer->writeStringValue('orgId', $this->getOrgId());
        $writer->writeStringValue('webUrl', $this->getWebUrl());
    }

    /**
     * Sets the company property value. The name of the company that owns the organization.
     * @param string|null $value Value to set for the company property.
    */
    public function setCompany(?string $value): void {
        $this->company = $value;
    }

    /**
     * Sets the displayName property value. The display name of the organization.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the email property value. The email address of the organization.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the login property value. The login (name) of the organization.
     * @param string|null $value Value to set for the login property.
    */
    public function setLogin(?string $value): void {
        $this->login = $value;
    }

    /**
     * Sets the orgId property value. The unique and immutable ID of the organization.
     * @param string|null $value Value to set for the orgId property.
    */
    public function setOrgId(?string $value): void {
        $this->orgId = $value;
    }

    /**
     * Sets the webUrl property value. The URL of the web page for the organization.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
