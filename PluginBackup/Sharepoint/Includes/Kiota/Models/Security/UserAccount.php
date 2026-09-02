<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UserAccount implements AdditionalDataHolder, Parsable 
{
    /**
     * @var string|null $accountName The displayed name of the user account.
    */
    private ?string $accountName = null;
    
    /**
     * @var string|null $activeDirectoryObjectGuid The unique user identifier assigned by the on-premises Active Directory.
    */
    private ?string $activeDirectoryObjectGuid = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $azureAdUserId The user object identifier in Microsoft Entra ID.
    */
    private ?string $azureAdUserId = null;
    
    /**
     * @var string|null $displayName The user display name in Microsoft Entra ID.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $domainName The name of the Active Directory domain of which the user is a member.
    */
    private ?string $domainName = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<ResourceAccessEvent>|null $resourceAccessEvents Information on resource access attempts made by the user account.
    */
    private ?array $resourceAccessEvents = null;
    
    /**
     * @var string|null $tenantId The Microsoft Entra tenant ID of the user account.
    */
    private ?string $tenantId = null;
    
    /**
     * @var string|null $userPrincipalName The user principal name of the account in Microsoft Entra ID.
    */
    private ?string $userPrincipalName = null;
    
    /**
     * @var string|null $userSid The local security identifier of the user account.
    */
    private ?string $userSid = null;
    
    /**
     * Instantiates a new UserAccount and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UserAccount
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UserAccount {
        return new UserAccount();
    }

    /**
     * Gets the accountName property value. The displayed name of the user account.
     * @return string|null
    */
    public function getAccountName(): ?string {
        return $this->accountName;
    }

    /**
     * Gets the activeDirectoryObjectGuid property value. The unique user identifier assigned by the on-premises Active Directory.
     * @return string|null
    */
    public function getActiveDirectoryObjectGuid(): ?string {
        return $this->activeDirectoryObjectGuid;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the azureAdUserId property value. The user object identifier in Microsoft Entra ID.
     * @return string|null
    */
    public function getAzureAdUserId(): ?string {
        return $this->azureAdUserId;
    }

    /**
     * Gets the displayName property value. The user display name in Microsoft Entra ID.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the domainName property value. The name of the Active Directory domain of which the user is a member.
     * @return string|null
    */
    public function getDomainName(): ?string {
        return $this->domainName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'accountName' => fn(ParseNode $n) => $o->setAccountName($n->getStringValue()),
            'activeDirectoryObjectGuid' => fn(ParseNode $n) => $o->setActiveDirectoryObjectGuid($n->getStringValue()),
            'azureAdUserId' => fn(ParseNode $n) => $o->setAzureAdUserId($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'domainName' => fn(ParseNode $n) => $o->setDomainName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'resourceAccessEvents' => fn(ParseNode $n) => $o->setResourceAccessEvents($n->getCollectionOfObjectValues([ResourceAccessEvent::class, 'createFromDiscriminatorValue'])),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'userPrincipalName' => fn(ParseNode $n) => $o->setUserPrincipalName($n->getStringValue()),
            'userSid' => fn(ParseNode $n) => $o->setUserSid($n->getStringValue()),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the resourceAccessEvents property value. Information on resource access attempts made by the user account.
     * @return array<ResourceAccessEvent>|null
    */
    public function getResourceAccessEvents(): ?array {
        return $this->resourceAccessEvents;
    }

    /**
     * Gets the tenantId property value. The Microsoft Entra tenant ID of the user account.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the userPrincipalName property value. The user principal name of the account in Microsoft Entra ID.
     * @return string|null
    */
    public function getUserPrincipalName(): ?string {
        return $this->userPrincipalName;
    }

    /**
     * Gets the userSid property value. The local security identifier of the user account.
     * @return string|null
    */
    public function getUserSid(): ?string {
        return $this->userSid;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('accountName', $this->getAccountName());
        $writer->writeStringValue('activeDirectoryObjectGuid', $this->getActiveDirectoryObjectGuid());
        $writer->writeStringValue('azureAdUserId', $this->getAzureAdUserId());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('domainName', $this->getDomainName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfObjectValues('resourceAccessEvents', $this->getResourceAccessEvents());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeStringValue('userPrincipalName', $this->getUserPrincipalName());
        $writer->writeStringValue('userSid', $this->getUserSid());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the accountName property value. The displayed name of the user account.
     * @param string|null $value Value to set for the accountName property.
    */
    public function setAccountName(?string $value): void {
        $this->accountName = $value;
    }

    /**
     * Sets the activeDirectoryObjectGuid property value. The unique user identifier assigned by the on-premises Active Directory.
     * @param string|null $value Value to set for the activeDirectoryObjectGuid property.
    */
    public function setActiveDirectoryObjectGuid(?string $value): void {
        $this->activeDirectoryObjectGuid = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the azureAdUserId property value. The user object identifier in Microsoft Entra ID.
     * @param string|null $value Value to set for the azureAdUserId property.
    */
    public function setAzureAdUserId(?string $value): void {
        $this->azureAdUserId = $value;
    }

    /**
     * Sets the displayName property value. The user display name in Microsoft Entra ID.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the domainName property value. The name of the Active Directory domain of which the user is a member.
     * @param string|null $value Value to set for the domainName property.
    */
    public function setDomainName(?string $value): void {
        $this->domainName = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the resourceAccessEvents property value. Information on resource access attempts made by the user account.
     * @param array<ResourceAccessEvent>|null $value Value to set for the resourceAccessEvents property.
    */
    public function setResourceAccessEvents(?array $value): void {
        $this->resourceAccessEvents = $value;
    }

    /**
     * Sets the tenantId property value. The Microsoft Entra tenant ID of the user account.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the userPrincipalName property value. The user principal name of the account in Microsoft Entra ID.
     * @param string|null $value Value to set for the userPrincipalName property.
    */
    public function setUserPrincipalName(?string $value): void {
        $this->userPrincipalName = $value;
    }

    /**
     * Sets the userSid property value. The local security identifier of the user account.
     * @param string|null $value Value to set for the userSid property.
    */
    public function setUserSid(?string $value): void {
        $this->userSid = $value;
    }

}
