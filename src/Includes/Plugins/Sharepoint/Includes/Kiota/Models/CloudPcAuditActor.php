<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class CloudPcAuditActor implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $applicationDisplayName Name of the application.
    */
    private ?string $applicationDisplayName = null;
    
    /**
     * @var string|null $applicationId Microsoft Entra application ID.
    */
    private ?string $applicationId = null;
    
    /**
     * @var string|null $ipAddress IP address.
    */
    private ?string $ipAddress = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $remoteTenantId The delegated partner tenant ID.
    */
    private ?string $remoteTenantId = null;
    
    /**
     * @var string|null $remoteUserId The delegated partner user ID.
    */
    private ?string $remoteUserId = null;
    
    /**
     * @var string|null $servicePrincipalName Service Principal Name (SPN).
    */
    private ?string $servicePrincipalName = null;
    
    /**
     * @var string|null $userId Microsoft Entra user ID.
    */
    private ?string $userId = null;
    
    /**
     * @var array<string>|null $userPermissions List of user permissions and application permissions when the audit event was performed.
    */
    private ?array $userPermissions = null;
    
    /**
     * @var string|null $userPrincipalName User Principal Name (UPN).
    */
    private ?string $userPrincipalName = null;
    
    /**
     * @var array<CloudPcUserRoleScopeTagInfo>|null $userRoleScopeTags List of role scope tags.
    */
    private ?array $userRoleScopeTags = null;
    
    /**
     * Instantiates a new CloudPcAuditActor and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudPcAuditActor
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudPcAuditActor {
        return new CloudPcAuditActor();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the applicationDisplayName property value. Name of the application.
     * @return string|null
    */
    public function getApplicationDisplayName(): ?string {
        return $this->applicationDisplayName;
    }

    /**
     * Gets the applicationId property value. Microsoft Entra application ID.
     * @return string|null
    */
    public function getApplicationId(): ?string {
        return $this->applicationId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'applicationDisplayName' => fn(ParseNode $n) => $o->setApplicationDisplayName($n->getStringValue()),
            'applicationId' => fn(ParseNode $n) => $o->setApplicationId($n->getStringValue()),
            'ipAddress' => fn(ParseNode $n) => $o->setIpAddress($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'remoteTenantId' => fn(ParseNode $n) => $o->setRemoteTenantId($n->getStringValue()),
            'remoteUserId' => fn(ParseNode $n) => $o->setRemoteUserId($n->getStringValue()),
            'servicePrincipalName' => fn(ParseNode $n) => $o->setServicePrincipalName($n->getStringValue()),
            'userId' => fn(ParseNode $n) => $o->setUserId($n->getStringValue()),
            'userPermissions' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setUserPermissions($val);
            },
            'userPrincipalName' => fn(ParseNode $n) => $o->setUserPrincipalName($n->getStringValue()),
            'userRoleScopeTags' => fn(ParseNode $n) => $o->setUserRoleScopeTags($n->getCollectionOfObjectValues([CloudPcUserRoleScopeTagInfo::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the ipAddress property value. IP address.
     * @return string|null
    */
    public function getIpAddress(): ?string {
        return $this->ipAddress;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the remoteTenantId property value. The delegated partner tenant ID.
     * @return string|null
    */
    public function getRemoteTenantId(): ?string {
        return $this->remoteTenantId;
    }

    /**
     * Gets the remoteUserId property value. The delegated partner user ID.
     * @return string|null
    */
    public function getRemoteUserId(): ?string {
        return $this->remoteUserId;
    }

    /**
     * Gets the servicePrincipalName property value. Service Principal Name (SPN).
     * @return string|null
    */
    public function getServicePrincipalName(): ?string {
        return $this->servicePrincipalName;
    }

    /**
     * Gets the userId property value. Microsoft Entra user ID.
     * @return string|null
    */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * Gets the userPermissions property value. List of user permissions and application permissions when the audit event was performed.
     * @return array<string>|null
    */
    public function getUserPermissions(): ?array {
        return $this->userPermissions;
    }

    /**
     * Gets the userPrincipalName property value. User Principal Name (UPN).
     * @return string|null
    */
    public function getUserPrincipalName(): ?string {
        return $this->userPrincipalName;
    }

    /**
     * Gets the userRoleScopeTags property value. List of role scope tags.
     * @return array<CloudPcUserRoleScopeTagInfo>|null
    */
    public function getUserRoleScopeTags(): ?array {
        return $this->userRoleScopeTags;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('applicationDisplayName', $this->getApplicationDisplayName());
        $writer->writeStringValue('applicationId', $this->getApplicationId());
        $writer->writeStringValue('ipAddress', $this->getIpAddress());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('remoteTenantId', $this->getRemoteTenantId());
        $writer->writeStringValue('remoteUserId', $this->getRemoteUserId());
        $writer->writeStringValue('servicePrincipalName', $this->getServicePrincipalName());
        $writer->writeStringValue('userId', $this->getUserId());
        $writer->writeCollectionOfPrimitiveValues('userPermissions', $this->getUserPermissions());
        $writer->writeStringValue('userPrincipalName', $this->getUserPrincipalName());
        $writer->writeCollectionOfObjectValues('userRoleScopeTags', $this->getUserRoleScopeTags());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the applicationDisplayName property value. Name of the application.
     * @param string|null $value Value to set for the applicationDisplayName property.
    */
    public function setApplicationDisplayName(?string $value): void {
        $this->applicationDisplayName = $value;
    }

    /**
     * Sets the applicationId property value. Microsoft Entra application ID.
     * @param string|null $value Value to set for the applicationId property.
    */
    public function setApplicationId(?string $value): void {
        $this->applicationId = $value;
    }

    /**
     * Sets the ipAddress property value. IP address.
     * @param string|null $value Value to set for the ipAddress property.
    */
    public function setIpAddress(?string $value): void {
        $this->ipAddress = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the remoteTenantId property value. The delegated partner tenant ID.
     * @param string|null $value Value to set for the remoteTenantId property.
    */
    public function setRemoteTenantId(?string $value): void {
        $this->remoteTenantId = $value;
    }

    /**
     * Sets the remoteUserId property value. The delegated partner user ID.
     * @param string|null $value Value to set for the remoteUserId property.
    */
    public function setRemoteUserId(?string $value): void {
        $this->remoteUserId = $value;
    }

    /**
     * Sets the servicePrincipalName property value. Service Principal Name (SPN).
     * @param string|null $value Value to set for the servicePrincipalName property.
    */
    public function setServicePrincipalName(?string $value): void {
        $this->servicePrincipalName = $value;
    }

    /**
     * Sets the userId property value. Microsoft Entra user ID.
     * @param string|null $value Value to set for the userId property.
    */
    public function setUserId(?string $value): void {
        $this->userId = $value;
    }

    /**
     * Sets the userPermissions property value. List of user permissions and application permissions when the audit event was performed.
     * @param array<string>|null $value Value to set for the userPermissions property.
    */
    public function setUserPermissions(?array $value): void {
        $this->userPermissions = $value;
    }

    /**
     * Sets the userPrincipalName property value. User Principal Name (UPN).
     * @param string|null $value Value to set for the userPrincipalName property.
    */
    public function setUserPrincipalName(?string $value): void {
        $this->userPrincipalName = $value;
    }

    /**
     * Sets the userRoleScopeTags property value. List of role scope tags.
     * @param array<CloudPcUserRoleScopeTagInfo>|null $value Value to set for the userRoleScopeTags property.
    */
    public function setUserRoleScopeTags(?array $value): void {
        $this->userRoleScopeTags = $value;
    }

}
