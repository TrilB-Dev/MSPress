<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExternalTokenBasedSapIagConnectionInfo extends ConnectionInfo implements Parsable 
{
    /**
     * @var string|null $accessTokenUrl The URL endpoint used to obtain access tokens for authentication with the SAP IAG system.
    */
    private ?string $accessTokenUrl = null;
    
    /**
     * @var string|null $clientId The client identifier used for authentication with the SAP IAG system.
    */
    private ?string $clientId = null;
    
    /**
     * @var string|null $keyVaultName The name of the Azure Key Vault that stores the client secret for authentication.
    */
    private ?string $keyVaultName = null;
    
    /**
     * @var string|null $resourceGroup The Azure resource group that contains the Key Vault.
    */
    private ?string $resourceGroup = null;
    
    /**
     * @var string|null $secretName The name of the secret in Azure Key Vault that contains the client secret.
    */
    private ?string $secretName = null;
    
    /**
     * @var string|null $subscriptionId The Azure subscription ID that contains the Key Vault.
    */
    private ?string $subscriptionId = null;
    
    /**
     * Instantiates a new ExternalTokenBasedSapIagConnectionInfo and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.externalTokenBasedSapIagConnectionInfo');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExternalTokenBasedSapIagConnectionInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExternalTokenBasedSapIagConnectionInfo {
        return new ExternalTokenBasedSapIagConnectionInfo();
    }

    /**
     * Gets the accessTokenUrl property value. The URL endpoint used to obtain access tokens for authentication with the SAP IAG system.
     * @return string|null
    */
    public function getAccessTokenUrl(): ?string {
        return $this->accessTokenUrl;
    }

    /**
     * Gets the clientId property value. The client identifier used for authentication with the SAP IAG system.
     * @return string|null
    */
    public function getClientId(): ?string {
        return $this->clientId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'accessTokenUrl' => fn(ParseNode $n) => $o->setAccessTokenUrl($n->getStringValue()),
            'clientId' => fn(ParseNode $n) => $o->setClientId($n->getStringValue()),
            'keyVaultName' => fn(ParseNode $n) => $o->setKeyVaultName($n->getStringValue()),
            'resourceGroup' => fn(ParseNode $n) => $o->setResourceGroup($n->getStringValue()),
            'secretName' => fn(ParseNode $n) => $o->setSecretName($n->getStringValue()),
            'subscriptionId' => fn(ParseNode $n) => $o->setSubscriptionId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the keyVaultName property value. The name of the Azure Key Vault that stores the client secret for authentication.
     * @return string|null
    */
    public function getKeyVaultName(): ?string {
        return $this->keyVaultName;
    }

    /**
     * Gets the resourceGroup property value. The Azure resource group that contains the Key Vault.
     * @return string|null
    */
    public function getResourceGroup(): ?string {
        return $this->resourceGroup;
    }

    /**
     * Gets the secretName property value. The name of the secret in Azure Key Vault that contains the client secret.
     * @return string|null
    */
    public function getSecretName(): ?string {
        return $this->secretName;
    }

    /**
     * Gets the subscriptionId property value. The Azure subscription ID that contains the Key Vault.
     * @return string|null
    */
    public function getSubscriptionId(): ?string {
        return $this->subscriptionId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('accessTokenUrl', $this->getAccessTokenUrl());
        $writer->writeStringValue('clientId', $this->getClientId());
        $writer->writeStringValue('keyVaultName', $this->getKeyVaultName());
        $writer->writeStringValue('resourceGroup', $this->getResourceGroup());
        $writer->writeStringValue('secretName', $this->getSecretName());
        $writer->writeStringValue('subscriptionId', $this->getSubscriptionId());
    }

    /**
     * Sets the accessTokenUrl property value. The URL endpoint used to obtain access tokens for authentication with the SAP IAG system.
     * @param string|null $value Value to set for the accessTokenUrl property.
    */
    public function setAccessTokenUrl(?string $value): void {
        $this->accessTokenUrl = $value;
    }

    /**
     * Sets the clientId property value. The client identifier used for authentication with the SAP IAG system.
     * @param string|null $value Value to set for the clientId property.
    */
    public function setClientId(?string $value): void {
        $this->clientId = $value;
    }

    /**
     * Sets the keyVaultName property value. The name of the Azure Key Vault that stores the client secret for authentication.
     * @param string|null $value Value to set for the keyVaultName property.
    */
    public function setKeyVaultName(?string $value): void {
        $this->keyVaultName = $value;
    }

    /**
     * Sets the resourceGroup property value. The Azure resource group that contains the Key Vault.
     * @param string|null $value Value to set for the resourceGroup property.
    */
    public function setResourceGroup(?string $value): void {
        $this->resourceGroup = $value;
    }

    /**
     * Sets the secretName property value. The name of the secret in Azure Key Vault that contains the client secret.
     * @param string|null $value Value to set for the secretName property.
    */
    public function setSecretName(?string $value): void {
        $this->secretName = $value;
    }

    /**
     * Sets the subscriptionId property value. The Azure subscription ID that contains the Key Vault.
     * @param string|null $value Value to set for the subscriptionId property.
    */
    public function setSubscriptionId(?string $value): void {
        $this->subscriptionId = $value;
    }

}
