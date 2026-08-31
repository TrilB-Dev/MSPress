<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class GitHubRepoEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $baseUrl The base URL of the web page for the repository.
    */
    private ?string $baseUrl = null;
    
    /**
     * @var string|null $login The login (name) of the repository.
    */
    private ?string $login = null;
    
    /**
     * @var string|null $owner The login of the owner of the repository.
    */
    private ?string $owner = null;
    
    /**
     * @var string|null $ownerType The type of owner of the repository, for example, User or Organization.
    */
    private ?string $ownerType = null;
    
    /**
     * @var string|null $repoId The unique and immutable ID of the GitHub repository.
    */
    private ?string $repoId = null;
    
    /**
     * Instantiates a new GitHubRepoEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.gitHubRepoEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return GitHubRepoEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): GitHubRepoEvidence {
        return new GitHubRepoEvidence();
    }

    /**
     * Gets the baseUrl property value. The base URL of the web page for the repository.
     * @return string|null
    */
    public function getBaseUrl(): ?string {
        return $this->baseUrl;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'baseUrl' => fn(ParseNode $n) => $o->setBaseUrl($n->getStringValue()),
            'login' => fn(ParseNode $n) => $o->setLogin($n->getStringValue()),
            'owner' => fn(ParseNode $n) => $o->setOwner($n->getStringValue()),
            'ownerType' => fn(ParseNode $n) => $o->setOwnerType($n->getStringValue()),
            'repoId' => fn(ParseNode $n) => $o->setRepoId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the login property value. The login (name) of the repository.
     * @return string|null
    */
    public function getLogin(): ?string {
        return $this->login;
    }

    /**
     * Gets the owner property value. The login of the owner of the repository.
     * @return string|null
    */
    public function getOwner(): ?string {
        return $this->owner;
    }

    /**
     * Gets the ownerType property value. The type of owner of the repository, for example, User or Organization.
     * @return string|null
    */
    public function getOwnerType(): ?string {
        return $this->ownerType;
    }

    /**
     * Gets the repoId property value. The unique and immutable ID of the GitHub repository.
     * @return string|null
    */
    public function getRepoId(): ?string {
        return $this->repoId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('baseUrl', $this->getBaseUrl());
        $writer->writeStringValue('login', $this->getLogin());
        $writer->writeStringValue('owner', $this->getOwner());
        $writer->writeStringValue('ownerType', $this->getOwnerType());
        $writer->writeStringValue('repoId', $this->getRepoId());
    }

    /**
     * Sets the baseUrl property value. The base URL of the web page for the repository.
     * @param string|null $value Value to set for the baseUrl property.
    */
    public function setBaseUrl(?string $value): void {
        $this->baseUrl = $value;
    }

    /**
     * Sets the login property value. The login (name) of the repository.
     * @param string|null $value Value to set for the login property.
    */
    public function setLogin(?string $value): void {
        $this->login = $value;
    }

    /**
     * Sets the owner property value. The login of the owner of the repository.
     * @param string|null $value Value to set for the owner property.
    */
    public function setOwner(?string $value): void {
        $this->owner = $value;
    }

    /**
     * Sets the ownerType property value. The type of owner of the repository, for example, User or Organization.
     * @param string|null $value Value to set for the ownerType property.
    */
    public function setOwnerType(?string $value): void {
        $this->ownerType = $value;
    }

    /**
     * Sets the repoId property value. The unique and immutable ID of the GitHub repository.
     * @param string|null $value Value to set for the repoId property.
    */
    public function setRepoId(?string $value): void {
        $this->repoId = $value;
    }

}
