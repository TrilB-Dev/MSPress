<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ServicePrincipalEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $appId The unique identifier for the associated application, represented by its appId property.
    */
    private ?string $appId = null;
    
    /**
     * @var string|null $appOwnerTenantId The tenant ID where the application is registered.
    */
    private ?string $appOwnerTenantId = null;
    
    /**
     * @var string|null $servicePrincipalName The display name for the service principal.
    */
    private ?string $servicePrincipalName = null;
    
    /**
     * @var string|null $servicePrincipalObjectId The unique identifier for the service principal.
    */
    private ?string $servicePrincipalObjectId = null;
    
    /**
     * @var ServicePrincipalType|null $servicePrincipalType The service principal type. Possible values are: unknown, application, managedIdentity, legacy, unknownFutureValue.
    */
    private ?ServicePrincipalType $servicePrincipalType = null;
    
    /**
     * @var string|null $tenantId The Microsoft Entra tenant ID of the service principal.
    */
    private ?string $tenantId = null;
    
    /**
     * Instantiates a new ServicePrincipalEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.servicePrincipalEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ServicePrincipalEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ServicePrincipalEvidence {
        return new ServicePrincipalEvidence();
    }

    /**
     * Gets the appId property value. The unique identifier for the associated application, represented by its appId property.
     * @return string|null
    */
    public function getAppId(): ?string {
        return $this->appId;
    }

    /**
     * Gets the appOwnerTenantId property value. The tenant ID where the application is registered.
     * @return string|null
    */
    public function getAppOwnerTenantId(): ?string {
        return $this->appOwnerTenantId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'appId' => fn(ParseNode $n) => $o->setAppId($n->getStringValue()),
            'appOwnerTenantId' => fn(ParseNode $n) => $o->setAppOwnerTenantId($n->getStringValue()),
            'servicePrincipalName' => fn(ParseNode $n) => $o->setServicePrincipalName($n->getStringValue()),
            'servicePrincipalObjectId' => fn(ParseNode $n) => $o->setServicePrincipalObjectId($n->getStringValue()),
            'servicePrincipalType' => fn(ParseNode $n) => $o->setServicePrincipalType($n->getEnumValue(ServicePrincipalType::class)),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the servicePrincipalName property value. The display name for the service principal.
     * @return string|null
    */
    public function getServicePrincipalName(): ?string {
        return $this->servicePrincipalName;
    }

    /**
     * Gets the servicePrincipalObjectId property value. The unique identifier for the service principal.
     * @return string|null
    */
    public function getServicePrincipalObjectId(): ?string {
        return $this->servicePrincipalObjectId;
    }

    /**
     * Gets the servicePrincipalType property value. The service principal type. Possible values are: unknown, application, managedIdentity, legacy, unknownFutureValue.
     * @return ServicePrincipalType|null
    */
    public function getServicePrincipalType(): ?ServicePrincipalType {
        return $this->servicePrincipalType;
    }

    /**
     * Gets the tenantId property value. The Microsoft Entra tenant ID of the service principal.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('appId', $this->getAppId());
        $writer->writeStringValue('appOwnerTenantId', $this->getAppOwnerTenantId());
        $writer->writeStringValue('servicePrincipalName', $this->getServicePrincipalName());
        $writer->writeStringValue('servicePrincipalObjectId', $this->getServicePrincipalObjectId());
        $writer->writeEnumValue('servicePrincipalType', $this->getServicePrincipalType());
        $writer->writeStringValue('tenantId', $this->getTenantId());
    }

    /**
     * Sets the appId property value. The unique identifier for the associated application, represented by its appId property.
     * @param string|null $value Value to set for the appId property.
    */
    public function setAppId(?string $value): void {
        $this->appId = $value;
    }

    /**
     * Sets the appOwnerTenantId property value. The tenant ID where the application is registered.
     * @param string|null $value Value to set for the appOwnerTenantId property.
    */
    public function setAppOwnerTenantId(?string $value): void {
        $this->appOwnerTenantId = $value;
    }

    /**
     * Sets the servicePrincipalName property value. The display name for the service principal.
     * @param string|null $value Value to set for the servicePrincipalName property.
    */
    public function setServicePrincipalName(?string $value): void {
        $this->servicePrincipalName = $value;
    }

    /**
     * Sets the servicePrincipalObjectId property value. The unique identifier for the service principal.
     * @param string|null $value Value to set for the servicePrincipalObjectId property.
    */
    public function setServicePrincipalObjectId(?string $value): void {
        $this->servicePrincipalObjectId = $value;
    }

    /**
     * Sets the servicePrincipalType property value. The service principal type. Possible values are: unknown, application, managedIdentity, legacy, unknownFutureValue.
     * @param ServicePrincipalType|null $value Value to set for the servicePrincipalType property.
    */
    public function setServicePrincipalType(?ServicePrincipalType $value): void {
        $this->servicePrincipalType = $value;
    }

    /**
     * Sets the tenantId property value. The Microsoft Entra tenant ID of the service principal.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

}
