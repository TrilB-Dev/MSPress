<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class DeviceEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $azureAdDeviceId A unique identifier assigned to a device by Microsoft Entra ID when device is Microsoft Entra joined.
    */
    private ?string $azureAdDeviceId = null;
    
    /**
     * @var DefenderAvStatus|null $defenderAvStatus State of the Defender anti-malware engine. The possible values are: notReporting, disabled, notUpdated, updated, unknown, notSupported, unknownFutureValue.
    */
    private ?DefenderAvStatus $defenderAvStatus = null;
    
    /**
     * @var string|null $deviceDnsName The fully qualified domain name (FQDN) for the device.
    */
    private ?string $deviceDnsName = null;
    
    /**
     * @var string|null $dnsDomain The DNS domain that this computer belongs to. A sequence of labels separated by dots.
    */
    private ?string $dnsDomain = null;
    
    /**
     * @var DateTime|null $firstSeenDateTime The date and time when the device was first seen.
    */
    private ?DateTime $firstSeenDateTime = null;
    
    /**
     * @var DeviceHealthStatus|null $healthStatus The health state of the device. The possible values are: active, inactive, impairedCommunication, noSensorData, noSensorDataImpairedCommunication, unknown, unknownFutureValue.
    */
    private ?DeviceHealthStatus $healthStatus = null;
    
    /**
     * @var string|null $hostName The hostname without the domain suffix.
    */
    private ?string $hostName = null;
    
    /**
     * @var array<string>|null $ipInterfaces Ip interfaces of the device during the time of the alert.
    */
    private ?array $ipInterfaces = null;
    
    /**
     * @var string|null $lastExternalIpAddress The lastExternalIpAddress property
    */
    private ?string $lastExternalIpAddress = null;
    
    /**
     * @var string|null $lastIpAddress The lastIpAddress property
    */
    private ?string $lastIpAddress = null;
    
    /**
     * @var array<LoggedOnUser>|null $loggedOnUsers Users that were logged on the machine during the time of the alert.
    */
    private ?array $loggedOnUsers = null;
    
    /**
     * @var string|null $mdeDeviceId A unique identifier assigned to a device by Microsoft Defender for Endpoint.
    */
    private ?string $mdeDeviceId = null;
    
    /**
     * @var string|null $ntDomain A logical grouping of computers within a Microsoft Windows network.
    */
    private ?string $ntDomain = null;
    
    /**
     * @var OnboardingStatus|null $onboardingStatus The status of the machine onboarding to Microsoft Defender for Endpoint. The possible values are: insufficientInfo, onboarded, canBeOnboarded, unsupported, unknownFutureValue.
    */
    private ?OnboardingStatus $onboardingStatus = null;
    
    /**
     * @var int|null $osBuild The build version for the operating system the device is running.
    */
    private ?int $osBuild = null;
    
    /**
     * @var string|null $osPlatform The operating system platform the device is running.
    */
    private ?string $osPlatform = null;
    
    /**
     * @var int|null $rbacGroupId The ID of the role-based access control (RBAC) device group.
    */
    private ?int $rbacGroupId = null;
    
    /**
     * @var string|null $rbacGroupName The name of the RBAC device group.
    */
    private ?string $rbacGroupName = null;
    
    /**
     * @var array<ResourceAccessEvent>|null $resourceAccessEvents Information on resource access attempts made by the user account.
    */
    private ?array $resourceAccessEvents = null;
    
    /**
     * @var DeviceRiskScore|null $riskScore Risk score as evaluated by Microsoft Defender for Endpoint. The possible values are: none, informational, low, medium, high, unknownFutureValue.
    */
    private ?DeviceRiskScore $riskScore = null;
    
    /**
     * @var string|null $version The version of the operating system platform.
    */
    private ?string $version = null;
    
    /**
     * @var VmMetadata|null $vmMetadata Metadata of the virtual machine (VM) on which Microsoft Defender for Endpoint is running.
    */
    private ?VmMetadata $vmMetadata = null;
    
    /**
     * Instantiates a new DeviceEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.deviceEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DeviceEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DeviceEvidence {
        return new DeviceEvidence();
    }

    /**
     * Gets the azureAdDeviceId property value. A unique identifier assigned to a device by Microsoft Entra ID when device is Microsoft Entra joined.
     * @return string|null
    */
    public function getAzureAdDeviceId(): ?string {
        return $this->azureAdDeviceId;
    }

    /**
     * Gets the defenderAvStatus property value. State of the Defender anti-malware engine. The possible values are: notReporting, disabled, notUpdated, updated, unknown, notSupported, unknownFutureValue.
     * @return DefenderAvStatus|null
    */
    public function getDefenderAvStatus(): ?DefenderAvStatus {
        return $this->defenderAvStatus;
    }

    /**
     * Gets the deviceDnsName property value. The fully qualified domain name (FQDN) for the device.
     * @return string|null
    */
    public function getDeviceDnsName(): ?string {
        return $this->deviceDnsName;
    }

    /**
     * Gets the dnsDomain property value. The DNS domain that this computer belongs to. A sequence of labels separated by dots.
     * @return string|null
    */
    public function getDnsDomain(): ?string {
        return $this->dnsDomain;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'azureAdDeviceId' => fn(ParseNode $n) => $o->setAzureAdDeviceId($n->getStringValue()),
            'defenderAvStatus' => fn(ParseNode $n) => $o->setDefenderAvStatus($n->getEnumValue(DefenderAvStatus::class)),
            'deviceDnsName' => fn(ParseNode $n) => $o->setDeviceDnsName($n->getStringValue()),
            'dnsDomain' => fn(ParseNode $n) => $o->setDnsDomain($n->getStringValue()),
            'firstSeenDateTime' => fn(ParseNode $n) => $o->setFirstSeenDateTime($n->getDateTimeValue()),
            'healthStatus' => fn(ParseNode $n) => $o->setHealthStatus($n->getEnumValue(DeviceHealthStatus::class)),
            'hostName' => fn(ParseNode $n) => $o->setHostName($n->getStringValue()),
            'ipInterfaces' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIpInterfaces($val);
            },
            'lastExternalIpAddress' => fn(ParseNode $n) => $o->setLastExternalIpAddress($n->getStringValue()),
            'lastIpAddress' => fn(ParseNode $n) => $o->setLastIpAddress($n->getStringValue()),
            'loggedOnUsers' => fn(ParseNode $n) => $o->setLoggedOnUsers($n->getCollectionOfObjectValues([LoggedOnUser::class, 'createFromDiscriminatorValue'])),
            'mdeDeviceId' => fn(ParseNode $n) => $o->setMdeDeviceId($n->getStringValue()),
            'ntDomain' => fn(ParseNode $n) => $o->setNtDomain($n->getStringValue()),
            'onboardingStatus' => fn(ParseNode $n) => $o->setOnboardingStatus($n->getEnumValue(OnboardingStatus::class)),
            'osBuild' => fn(ParseNode $n) => $o->setOsBuild($n->getIntegerValue()),
            'osPlatform' => fn(ParseNode $n) => $o->setOsPlatform($n->getStringValue()),
            'rbacGroupId' => fn(ParseNode $n) => $o->setRbacGroupId($n->getIntegerValue()),
            'rbacGroupName' => fn(ParseNode $n) => $o->setRbacGroupName($n->getStringValue()),
            'resourceAccessEvents' => fn(ParseNode $n) => $o->setResourceAccessEvents($n->getCollectionOfObjectValues([ResourceAccessEvent::class, 'createFromDiscriminatorValue'])),
            'riskScore' => fn(ParseNode $n) => $o->setRiskScore($n->getEnumValue(DeviceRiskScore::class)),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getStringValue()),
            'vmMetadata' => fn(ParseNode $n) => $o->setVmMetadata($n->getObjectValue([VmMetadata::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the firstSeenDateTime property value. The date and time when the device was first seen.
     * @return DateTime|null
    */
    public function getFirstSeenDateTime(): ?DateTime {
        return $this->firstSeenDateTime;
    }

    /**
     * Gets the healthStatus property value. The health state of the device. The possible values are: active, inactive, impairedCommunication, noSensorData, noSensorDataImpairedCommunication, unknown, unknownFutureValue.
     * @return DeviceHealthStatus|null
    */
    public function getHealthStatus(): ?DeviceHealthStatus {
        return $this->healthStatus;
    }

    /**
     * Gets the hostName property value. The hostname without the domain suffix.
     * @return string|null
    */
    public function getHostName(): ?string {
        return $this->hostName;
    }

    /**
     * Gets the ipInterfaces property value. Ip interfaces of the device during the time of the alert.
     * @return array<string>|null
    */
    public function getIpInterfaces(): ?array {
        return $this->ipInterfaces;
    }

    /**
     * Gets the lastExternalIpAddress property value. The lastExternalIpAddress property
     * @return string|null
    */
    public function getLastExternalIpAddress(): ?string {
        return $this->lastExternalIpAddress;
    }

    /**
     * Gets the lastIpAddress property value. The lastIpAddress property
     * @return string|null
    */
    public function getLastIpAddress(): ?string {
        return $this->lastIpAddress;
    }

    /**
     * Gets the loggedOnUsers property value. Users that were logged on the machine during the time of the alert.
     * @return array<LoggedOnUser>|null
    */
    public function getLoggedOnUsers(): ?array {
        return $this->loggedOnUsers;
    }

    /**
     * Gets the mdeDeviceId property value. A unique identifier assigned to a device by Microsoft Defender for Endpoint.
     * @return string|null
    */
    public function getMdeDeviceId(): ?string {
        return $this->mdeDeviceId;
    }

    /**
     * Gets the ntDomain property value. A logical grouping of computers within a Microsoft Windows network.
     * @return string|null
    */
    public function getNtDomain(): ?string {
        return $this->ntDomain;
    }

    /**
     * Gets the onboardingStatus property value. The status of the machine onboarding to Microsoft Defender for Endpoint. The possible values are: insufficientInfo, onboarded, canBeOnboarded, unsupported, unknownFutureValue.
     * @return OnboardingStatus|null
    */
    public function getOnboardingStatus(): ?OnboardingStatus {
        return $this->onboardingStatus;
    }

    /**
     * Gets the osBuild property value. The build version for the operating system the device is running.
     * @return int|null
    */
    public function getOsBuild(): ?int {
        return $this->osBuild;
    }

    /**
     * Gets the osPlatform property value. The operating system platform the device is running.
     * @return string|null
    */
    public function getOsPlatform(): ?string {
        return $this->osPlatform;
    }

    /**
     * Gets the rbacGroupId property value. The ID of the role-based access control (RBAC) device group.
     * @return int|null
    */
    public function getRbacGroupId(): ?int {
        return $this->rbacGroupId;
    }

    /**
     * Gets the rbacGroupName property value. The name of the RBAC device group.
     * @return string|null
    */
    public function getRbacGroupName(): ?string {
        return $this->rbacGroupName;
    }

    /**
     * Gets the resourceAccessEvents property value. Information on resource access attempts made by the user account.
     * @return array<ResourceAccessEvent>|null
    */
    public function getResourceAccessEvents(): ?array {
        return $this->resourceAccessEvents;
    }

    /**
     * Gets the riskScore property value. Risk score as evaluated by Microsoft Defender for Endpoint. The possible values are: none, informational, low, medium, high, unknownFutureValue.
     * @return DeviceRiskScore|null
    */
    public function getRiskScore(): ?DeviceRiskScore {
        return $this->riskScore;
    }

    /**
     * Gets the version property value. The version of the operating system platform.
     * @return string|null
    */
    public function getVersion(): ?string {
        return $this->version;
    }

    /**
     * Gets the vmMetadata property value. Metadata of the virtual machine (VM) on which Microsoft Defender for Endpoint is running.
     * @return VmMetadata|null
    */
    public function getVmMetadata(): ?VmMetadata {
        return $this->vmMetadata;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('azureAdDeviceId', $this->getAzureAdDeviceId());
        $writer->writeEnumValue('defenderAvStatus', $this->getDefenderAvStatus());
        $writer->writeStringValue('deviceDnsName', $this->getDeviceDnsName());
        $writer->writeStringValue('dnsDomain', $this->getDnsDomain());
        $writer->writeDateTimeValue('firstSeenDateTime', $this->getFirstSeenDateTime());
        $writer->writeEnumValue('healthStatus', $this->getHealthStatus());
        $writer->writeStringValue('hostName', $this->getHostName());
        $writer->writeCollectionOfPrimitiveValues('ipInterfaces', $this->getIpInterfaces());
        $writer->writeStringValue('lastExternalIpAddress', $this->getLastExternalIpAddress());
        $writer->writeStringValue('lastIpAddress', $this->getLastIpAddress());
        $writer->writeCollectionOfObjectValues('loggedOnUsers', $this->getLoggedOnUsers());
        $writer->writeStringValue('mdeDeviceId', $this->getMdeDeviceId());
        $writer->writeStringValue('ntDomain', $this->getNtDomain());
        $writer->writeEnumValue('onboardingStatus', $this->getOnboardingStatus());
        $writer->writeIntegerValue('osBuild', $this->getOsBuild());
        $writer->writeStringValue('osPlatform', $this->getOsPlatform());
        $writer->writeIntegerValue('rbacGroupId', $this->getRbacGroupId());
        $writer->writeStringValue('rbacGroupName', $this->getRbacGroupName());
        $writer->writeCollectionOfObjectValues('resourceAccessEvents', $this->getResourceAccessEvents());
        $writer->writeEnumValue('riskScore', $this->getRiskScore());
        $writer->writeStringValue('version', $this->getVersion());
        $writer->writeObjectValue('vmMetadata', $this->getVmMetadata());
    }

    /**
     * Sets the azureAdDeviceId property value. A unique identifier assigned to a device by Microsoft Entra ID when device is Microsoft Entra joined.
     * @param string|null $value Value to set for the azureAdDeviceId property.
    */
    public function setAzureAdDeviceId(?string $value): void {
        $this->azureAdDeviceId = $value;
    }

    /**
     * Sets the defenderAvStatus property value. State of the Defender anti-malware engine. The possible values are: notReporting, disabled, notUpdated, updated, unknown, notSupported, unknownFutureValue.
     * @param DefenderAvStatus|null $value Value to set for the defenderAvStatus property.
    */
    public function setDefenderAvStatus(?DefenderAvStatus $value): void {
        $this->defenderAvStatus = $value;
    }

    /**
     * Sets the deviceDnsName property value. The fully qualified domain name (FQDN) for the device.
     * @param string|null $value Value to set for the deviceDnsName property.
    */
    public function setDeviceDnsName(?string $value): void {
        $this->deviceDnsName = $value;
    }

    /**
     * Sets the dnsDomain property value. The DNS domain that this computer belongs to. A sequence of labels separated by dots.
     * @param string|null $value Value to set for the dnsDomain property.
    */
    public function setDnsDomain(?string $value): void {
        $this->dnsDomain = $value;
    }

    /**
     * Sets the firstSeenDateTime property value. The date and time when the device was first seen.
     * @param DateTime|null $value Value to set for the firstSeenDateTime property.
    */
    public function setFirstSeenDateTime(?DateTime $value): void {
        $this->firstSeenDateTime = $value;
    }

    /**
     * Sets the healthStatus property value. The health state of the device. The possible values are: active, inactive, impairedCommunication, noSensorData, noSensorDataImpairedCommunication, unknown, unknownFutureValue.
     * @param DeviceHealthStatus|null $value Value to set for the healthStatus property.
    */
    public function setHealthStatus(?DeviceHealthStatus $value): void {
        $this->healthStatus = $value;
    }

    /**
     * Sets the hostName property value. The hostname without the domain suffix.
     * @param string|null $value Value to set for the hostName property.
    */
    public function setHostName(?string $value): void {
        $this->hostName = $value;
    }

    /**
     * Sets the ipInterfaces property value. Ip interfaces of the device during the time of the alert.
     * @param array<string>|null $value Value to set for the ipInterfaces property.
    */
    public function setIpInterfaces(?array $value): void {
        $this->ipInterfaces = $value;
    }

    /**
     * Sets the lastExternalIpAddress property value. The lastExternalIpAddress property
     * @param string|null $value Value to set for the lastExternalIpAddress property.
    */
    public function setLastExternalIpAddress(?string $value): void {
        $this->lastExternalIpAddress = $value;
    }

    /**
     * Sets the lastIpAddress property value. The lastIpAddress property
     * @param string|null $value Value to set for the lastIpAddress property.
    */
    public function setLastIpAddress(?string $value): void {
        $this->lastIpAddress = $value;
    }

    /**
     * Sets the loggedOnUsers property value. Users that were logged on the machine during the time of the alert.
     * @param array<LoggedOnUser>|null $value Value to set for the loggedOnUsers property.
    */
    public function setLoggedOnUsers(?array $value): void {
        $this->loggedOnUsers = $value;
    }

    /**
     * Sets the mdeDeviceId property value. A unique identifier assigned to a device by Microsoft Defender for Endpoint.
     * @param string|null $value Value to set for the mdeDeviceId property.
    */
    public function setMdeDeviceId(?string $value): void {
        $this->mdeDeviceId = $value;
    }

    /**
     * Sets the ntDomain property value. A logical grouping of computers within a Microsoft Windows network.
     * @param string|null $value Value to set for the ntDomain property.
    */
    public function setNtDomain(?string $value): void {
        $this->ntDomain = $value;
    }

    /**
     * Sets the onboardingStatus property value. The status of the machine onboarding to Microsoft Defender for Endpoint. The possible values are: insufficientInfo, onboarded, canBeOnboarded, unsupported, unknownFutureValue.
     * @param OnboardingStatus|null $value Value to set for the onboardingStatus property.
    */
    public function setOnboardingStatus(?OnboardingStatus $value): void {
        $this->onboardingStatus = $value;
    }

    /**
     * Sets the osBuild property value. The build version for the operating system the device is running.
     * @param int|null $value Value to set for the osBuild property.
    */
    public function setOsBuild(?int $value): void {
        $this->osBuild = $value;
    }

    /**
     * Sets the osPlatform property value. The operating system platform the device is running.
     * @param string|null $value Value to set for the osPlatform property.
    */
    public function setOsPlatform(?string $value): void {
        $this->osPlatform = $value;
    }

    /**
     * Sets the rbacGroupId property value. The ID of the role-based access control (RBAC) device group.
     * @param int|null $value Value to set for the rbacGroupId property.
    */
    public function setRbacGroupId(?int $value): void {
        $this->rbacGroupId = $value;
    }

    /**
     * Sets the rbacGroupName property value. The name of the RBAC device group.
     * @param string|null $value Value to set for the rbacGroupName property.
    */
    public function setRbacGroupName(?string $value): void {
        $this->rbacGroupName = $value;
    }

    /**
     * Sets the resourceAccessEvents property value. Information on resource access attempts made by the user account.
     * @param array<ResourceAccessEvent>|null $value Value to set for the resourceAccessEvents property.
    */
    public function setResourceAccessEvents(?array $value): void {
        $this->resourceAccessEvents = $value;
    }

    /**
     * Sets the riskScore property value. Risk score as evaluated by Microsoft Defender for Endpoint. The possible values are: none, informational, low, medium, high, unknownFutureValue.
     * @param DeviceRiskScore|null $value Value to set for the riskScore property.
    */
    public function setRiskScore(?DeviceRiskScore $value): void {
        $this->riskScore = $value;
    }

    /**
     * Sets the version property value. The version of the operating system platform.
     * @param string|null $value Value to set for the version property.
    */
    public function setVersion(?string $value): void {
        $this->version = $value;
    }

    /**
     * Sets the vmMetadata property value. Metadata of the virtual machine (VM) on which Microsoft Defender for Endpoint is running.
     * @param VmMetadata|null $value Value to set for the vmMetadata property.
    */
    public function setVmMetadata(?VmMetadata $value): void {
        $this->vmMetadata = $value;
    }

}
