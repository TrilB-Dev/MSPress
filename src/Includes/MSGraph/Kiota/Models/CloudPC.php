<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudPC extends Entity implements Parsable 
{
    /**
     * @var string|null $aadDeviceId The Microsoft Entra device ID for the Cloud PC, also known as the Azure Active Directory (Azure AD) device ID, that consists of 32 characters in a GUID format. Generated on a VM joined to Microsoft Entra ID. Read-only.
    */
    private ?string $aadDeviceId = null;
    
    /**
     * @var string|null $displayName The display name for the Cloud PC. Maximum length is 64 characters. Read-only. You can use the cloudPC: rename API to modify the Cloud PC name.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $gracePeriodEndDateTime The date and time when the grace period ends and reprovisioning or deprovisioning happen. Required only if the status is inGracePeriod. The timestamp is shown in ISO 8601 format and Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $gracePeriodEndDateTime = null;
    
    /**
     * @var string|null $imageDisplayName The name of the operating system image used for the Cloud PC. Maximum length is 50 characters. Only letters (A-Z, a-z), numbers (0-9), and special characters (-,,.) are allowed for this property. The property value can't begin or end with an underscore. Read-only.
    */
    private ?string $imageDisplayName = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The last modified date and time of the Cloud PC. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $managedDeviceId The Intune enrolled device ID for the Cloud PC that consists of 32 characters in a GUID format. The managedDeviceId property of Windows 365 Business Cloud PCs is always null as Windows 365 Business Cloud PCs aren't Intune-enrolled automatically by Windows 365. Read-only.
    */
    private ?string $managedDeviceId = null;
    
    /**
     * @var string|null $managedDeviceName The Intune enrolled device name for the Cloud PC. The managedDeviceName property of Windows 365 Business Cloud PCs is always null as Windows 365 Business Cloud PCs aren't Intune-enrolled automatically by Windows 365. Read-only.
    */
    private ?string $managedDeviceName = null;
    
    /**
     * @var string|null $onPremisesConnectionName The on-premises connection that applied during the provisioning of Cloud PCs. Read-only.
    */
    private ?string $onPremisesConnectionName = null;
    
    /**
     * @var string|null $provisioningPolicyId The provisioning policy ID for the Cloud PC that consists of 32 characters in a GUID format. A policy defines the type of Cloud PC the user wants to create. Read-only.
    */
    private ?string $provisioningPolicyId = null;
    
    /**
     * @var string|null $provisioningPolicyName The provisioning policy that applied during the provisioning of Cloud PCs. Maximum length is 120 characters. Read-only.
    */
    private ?string $provisioningPolicyName = null;
    
    /**
     * @var CloudPcProvisioningType|null $provisioningType The type of licenses to be used when provisioning Cloud PCs using this policy. The possible values are: dedicated, shared, unknownFutureValue. The default value is dedicated.
    */
    private ?CloudPcProvisioningType $provisioningType = null;
    
    /**
     * @var string|null $servicePlanId The service plan ID for the Cloud PC that consists of 32 characters in a GUID format. For more information about service plans, see Product names and service plan identifiers for licensing. Read-only.
    */
    private ?string $servicePlanId = null;
    
    /**
     * @var string|null $servicePlanName The service plan name for the customer-facing Cloud PC entity. Read-only.
    */
    private ?string $servicePlanName = null;
    
    /**
     * @var string|null $userPrincipalName The user principal name (UPN) of the user assigned to the Cloud PC. Maximum length is 113 characters. For more information on username policies, see Password policies and account restrictions in Microsoft Entra ID. Read-only.
    */
    private ?string $userPrincipalName = null;
    
    /**
     * Instantiates a new CloudPC and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudPC
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudPC {
        return new CloudPC();
    }

    /**
     * Gets the aadDeviceId property value. The Microsoft Entra device ID for the Cloud PC, also known as the Azure Active Directory (Azure AD) device ID, that consists of 32 characters in a GUID format. Generated on a VM joined to Microsoft Entra ID. Read-only.
     * @return string|null
    */
    public function getAadDeviceId(): ?string {
        return $this->aadDeviceId;
    }

    /**
     * Gets the displayName property value. The display name for the Cloud PC. Maximum length is 64 characters. Read-only. You can use the cloudPC: rename API to modify the Cloud PC name.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'aadDeviceId' => fn(ParseNode $n) => $o->setAadDeviceId($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'gracePeriodEndDateTime' => fn(ParseNode $n) => $o->setGracePeriodEndDateTime($n->getDateTimeValue()),
            'imageDisplayName' => fn(ParseNode $n) => $o->setImageDisplayName($n->getStringValue()),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'managedDeviceId' => fn(ParseNode $n) => $o->setManagedDeviceId($n->getStringValue()),
            'managedDeviceName' => fn(ParseNode $n) => $o->setManagedDeviceName($n->getStringValue()),
            'onPremisesConnectionName' => fn(ParseNode $n) => $o->setOnPremisesConnectionName($n->getStringValue()),
            'provisioningPolicyId' => fn(ParseNode $n) => $o->setProvisioningPolicyId($n->getStringValue()),
            'provisioningPolicyName' => fn(ParseNode $n) => $o->setProvisioningPolicyName($n->getStringValue()),
            'provisioningType' => fn(ParseNode $n) => $o->setProvisioningType($n->getEnumValue(CloudPcProvisioningType::class)),
            'servicePlanId' => fn(ParseNode $n) => $o->setServicePlanId($n->getStringValue()),
            'servicePlanName' => fn(ParseNode $n) => $o->setServicePlanName($n->getStringValue()),
            'userPrincipalName' => fn(ParseNode $n) => $o->setUserPrincipalName($n->getStringValue()),
        ]);
    }

    /**
     * Gets the gracePeriodEndDateTime property value. The date and time when the grace period ends and reprovisioning or deprovisioning happen. Required only if the status is inGracePeriod. The timestamp is shown in ISO 8601 format and Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getGracePeriodEndDateTime(): ?DateTime {
        return $this->gracePeriodEndDateTime;
    }

    /**
     * Gets the imageDisplayName property value. The name of the operating system image used for the Cloud PC. Maximum length is 50 characters. Only letters (A-Z, a-z), numbers (0-9), and special characters (-,,.) are allowed for this property. The property value can't begin or end with an underscore. Read-only.
     * @return string|null
    */
    public function getImageDisplayName(): ?string {
        return $this->imageDisplayName;
    }

    /**
     * Gets the lastModifiedDateTime property value. The last modified date and time of the Cloud PC. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the managedDeviceId property value. The Intune enrolled device ID for the Cloud PC that consists of 32 characters in a GUID format. The managedDeviceId property of Windows 365 Business Cloud PCs is always null as Windows 365 Business Cloud PCs aren't Intune-enrolled automatically by Windows 365. Read-only.
     * @return string|null
    */
    public function getManagedDeviceId(): ?string {
        return $this->managedDeviceId;
    }

    /**
     * Gets the managedDeviceName property value. The Intune enrolled device name for the Cloud PC. The managedDeviceName property of Windows 365 Business Cloud PCs is always null as Windows 365 Business Cloud PCs aren't Intune-enrolled automatically by Windows 365. Read-only.
     * @return string|null
    */
    public function getManagedDeviceName(): ?string {
        return $this->managedDeviceName;
    }

    /**
     * Gets the onPremisesConnectionName property value. The on-premises connection that applied during the provisioning of Cloud PCs. Read-only.
     * @return string|null
    */
    public function getOnPremisesConnectionName(): ?string {
        return $this->onPremisesConnectionName;
    }

    /**
     * Gets the provisioningPolicyId property value. The provisioning policy ID for the Cloud PC that consists of 32 characters in a GUID format. A policy defines the type of Cloud PC the user wants to create. Read-only.
     * @return string|null
    */
    public function getProvisioningPolicyId(): ?string {
        return $this->provisioningPolicyId;
    }

    /**
     * Gets the provisioningPolicyName property value. The provisioning policy that applied during the provisioning of Cloud PCs. Maximum length is 120 characters. Read-only.
     * @return string|null
    */
    public function getProvisioningPolicyName(): ?string {
        return $this->provisioningPolicyName;
    }

    /**
     * Gets the provisioningType property value. The type of licenses to be used when provisioning Cloud PCs using this policy. The possible values are: dedicated, shared, unknownFutureValue. The default value is dedicated.
     * @return CloudPcProvisioningType|null
    */
    public function getProvisioningType(): ?CloudPcProvisioningType {
        return $this->provisioningType;
    }

    /**
     * Gets the servicePlanId property value. The service plan ID for the Cloud PC that consists of 32 characters in a GUID format. For more information about service plans, see Product names and service plan identifiers for licensing. Read-only.
     * @return string|null
    */
    public function getServicePlanId(): ?string {
        return $this->servicePlanId;
    }

    /**
     * Gets the servicePlanName property value. The service plan name for the customer-facing Cloud PC entity. Read-only.
     * @return string|null
    */
    public function getServicePlanName(): ?string {
        return $this->servicePlanName;
    }

    /**
     * Gets the userPrincipalName property value. The user principal name (UPN) of the user assigned to the Cloud PC. Maximum length is 113 characters. For more information on username policies, see Password policies and account restrictions in Microsoft Entra ID. Read-only.
     * @return string|null
    */
    public function getUserPrincipalName(): ?string {
        return $this->userPrincipalName;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('aadDeviceId', $this->getAadDeviceId());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('gracePeriodEndDateTime', $this->getGracePeriodEndDateTime());
        $writer->writeStringValue('imageDisplayName', $this->getImageDisplayName());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeStringValue('managedDeviceId', $this->getManagedDeviceId());
        $writer->writeStringValue('managedDeviceName', $this->getManagedDeviceName());
        $writer->writeStringValue('onPremisesConnectionName', $this->getOnPremisesConnectionName());
        $writer->writeStringValue('provisioningPolicyId', $this->getProvisioningPolicyId());
        $writer->writeStringValue('provisioningPolicyName', $this->getProvisioningPolicyName());
        $writer->writeEnumValue('provisioningType', $this->getProvisioningType());
        $writer->writeStringValue('servicePlanId', $this->getServicePlanId());
        $writer->writeStringValue('servicePlanName', $this->getServicePlanName());
        $writer->writeStringValue('userPrincipalName', $this->getUserPrincipalName());
    }

    /**
     * Sets the aadDeviceId property value. The Microsoft Entra device ID for the Cloud PC, also known as the Azure Active Directory (Azure AD) device ID, that consists of 32 characters in a GUID format. Generated on a VM joined to Microsoft Entra ID. Read-only.
     * @param string|null $value Value to set for the aadDeviceId property.
    */
    public function setAadDeviceId(?string $value): void {
        $this->aadDeviceId = $value;
    }

    /**
     * Sets the displayName property value. The display name for the Cloud PC. Maximum length is 64 characters. Read-only. You can use the cloudPC: rename API to modify the Cloud PC name.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the gracePeriodEndDateTime property value. The date and time when the grace period ends and reprovisioning or deprovisioning happen. Required only if the status is inGracePeriod. The timestamp is shown in ISO 8601 format and Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the gracePeriodEndDateTime property.
    */
    public function setGracePeriodEndDateTime(?DateTime $value): void {
        $this->gracePeriodEndDateTime = $value;
    }

    /**
     * Sets the imageDisplayName property value. The name of the operating system image used for the Cloud PC. Maximum length is 50 characters. Only letters (A-Z, a-z), numbers (0-9), and special characters (-,,.) are allowed for this property. The property value can't begin or end with an underscore. Read-only.
     * @param string|null $value Value to set for the imageDisplayName property.
    */
    public function setImageDisplayName(?string $value): void {
        $this->imageDisplayName = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The last modified date and time of the Cloud PC. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the managedDeviceId property value. The Intune enrolled device ID for the Cloud PC that consists of 32 characters in a GUID format. The managedDeviceId property of Windows 365 Business Cloud PCs is always null as Windows 365 Business Cloud PCs aren't Intune-enrolled automatically by Windows 365. Read-only.
     * @param string|null $value Value to set for the managedDeviceId property.
    */
    public function setManagedDeviceId(?string $value): void {
        $this->managedDeviceId = $value;
    }

    /**
     * Sets the managedDeviceName property value. The Intune enrolled device name for the Cloud PC. The managedDeviceName property of Windows 365 Business Cloud PCs is always null as Windows 365 Business Cloud PCs aren't Intune-enrolled automatically by Windows 365. Read-only.
     * @param string|null $value Value to set for the managedDeviceName property.
    */
    public function setManagedDeviceName(?string $value): void {
        $this->managedDeviceName = $value;
    }

    /**
     * Sets the onPremisesConnectionName property value. The on-premises connection that applied during the provisioning of Cloud PCs. Read-only.
     * @param string|null $value Value to set for the onPremisesConnectionName property.
    */
    public function setOnPremisesConnectionName(?string $value): void {
        $this->onPremisesConnectionName = $value;
    }

    /**
     * Sets the provisioningPolicyId property value. The provisioning policy ID for the Cloud PC that consists of 32 characters in a GUID format. A policy defines the type of Cloud PC the user wants to create. Read-only.
     * @param string|null $value Value to set for the provisioningPolicyId property.
    */
    public function setProvisioningPolicyId(?string $value): void {
        $this->provisioningPolicyId = $value;
    }

    /**
     * Sets the provisioningPolicyName property value. The provisioning policy that applied during the provisioning of Cloud PCs. Maximum length is 120 characters. Read-only.
     * @param string|null $value Value to set for the provisioningPolicyName property.
    */
    public function setProvisioningPolicyName(?string $value): void {
        $this->provisioningPolicyName = $value;
    }

    /**
     * Sets the provisioningType property value. The type of licenses to be used when provisioning Cloud PCs using this policy. The possible values are: dedicated, shared, unknownFutureValue. The default value is dedicated.
     * @param CloudPcProvisioningType|null $value Value to set for the provisioningType property.
    */
    public function setProvisioningType(?CloudPcProvisioningType $value): void {
        $this->provisioningType = $value;
    }

    /**
     * Sets the servicePlanId property value. The service plan ID for the Cloud PC that consists of 32 characters in a GUID format. For more information about service plans, see Product names and service plan identifiers for licensing. Read-only.
     * @param string|null $value Value to set for the servicePlanId property.
    */
    public function setServicePlanId(?string $value): void {
        $this->servicePlanId = $value;
    }

    /**
     * Sets the servicePlanName property value. The service plan name for the customer-facing Cloud PC entity. Read-only.
     * @param string|null $value Value to set for the servicePlanName property.
    */
    public function setServicePlanName(?string $value): void {
        $this->servicePlanName = $value;
    }

    /**
     * Sets the userPrincipalName property value. The user principal name (UPN) of the user assigned to the Cloud PC. Maximum length is 113 characters. For more information on username policies, see Password policies and account restrictions in Microsoft Entra ID. Read-only.
     * @param string|null $value Value to set for the userPrincipalName property.
    */
    public function setUserPrincipalName(?string $value): void {
        $this->userPrincipalName = $value;
    }

}
