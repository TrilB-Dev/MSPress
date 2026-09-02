<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Entity which represents a connection to Mobile Threat Defense partner.
*/
class MobileThreatDefenseConnector extends Entity implements Parsable 
{
    /**
     * @var bool|null $allowPartnerToCollectIOSApplicationMetadata When TRUE, indicates the Mobile Threat Defense partner may collect metadata about installed applications from Intune for iOS devices. When FALSE, indicates the Mobile Threat Defense partner may not collect metadata about installed applications from Intune for iOS devices. Default value is FALSE.
    */
    private ?bool $allowPartnerToCollectIOSApplicationMetadata = null;
    
    /**
     * @var bool|null $allowPartnerToCollectIOSPersonalApplicationMetadata When TRUE, indicates the Mobile Threat Defense partner may collect metadata about personally installed applications from Intune for iOS devices. When FALSE, indicates the Mobile Threat Defense partner may not collect metadata about personally installed applications from Intune for iOS devices. Default value is FALSE.
    */
    private ?bool $allowPartnerToCollectIOSPersonalApplicationMetadata = null;
    
    /**
     * @var bool|null $androidDeviceBlockedOnMissingPartnerData When TRUE, indicates that Intune must receive data from the Mobile Threat Defense partner prior to marking an Android device compliant. When FALSE, indicates that Intune may mark an Android device compliant before receiving data from the Mobile Threat Defense partner.
    */
    private ?bool $androidDeviceBlockedOnMissingPartnerData = null;
    
    /**
     * @var bool|null $androidEnabled When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for Android devices. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for Android devices. Default value is FALSE.
    */
    private ?bool $androidEnabled = null;
    
    /**
     * @var bool|null $androidMobileApplicationManagementEnabled When TRUE, inidicates that data from the Mobile Threat Defense partner can be used during Mobile Application Management (MAM) evaluations for Android devices. When FALSE, inidicates that data from the Mobile Threat Defense partner should not be used during Mobile Application Management (MAM) evaluations for Android devices. Only one partner per platform may be enabled for Mobile Application Management (MAM) evaluation. Default value is FALSE.
    */
    private ?bool $androidMobileApplicationManagementEnabled = null;
    
    /**
     * @var bool|null $iosDeviceBlockedOnMissingPartnerData When TRUE, indicates that Intune must receive data from the Mobile Threat Defense partner prior to marking a device compliant. When FALSE, indicates that Intune may not recieve data from Mobile Threat Defense partner prior to making device compliant. Default value is FALSE.
    */
    private ?bool $iosDeviceBlockedOnMissingPartnerData = null;
    
    /**
     * @var bool|null $iosEnabled When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for iOS devices. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for iOS devices. Default value is FALSE.
    */
    private ?bool $iosEnabled = null;
    
    /**
     * @var bool|null $iosMobileApplicationManagementEnabled When TRUE, inidicates that data from the Mobile Threat Defense partner can be used during Mobile Application Management (MAM) evaluations for iOS devices. When FALSE, inidicates that data from the Mobile Threat Defense partner should not be used during Mobile Application Management (MAM) evaluations for iOS devices. Only one partner per platform may be enabled for Mobile Application Management (MAM) evaluation. Default value is FALSE.
    */
    private ?bool $iosMobileApplicationManagementEnabled = null;
    
    /**
     * @var DateTime|null $lastHeartbeatDateTime DateTime of last Heartbeat recieved from the Mobile Threat Defense partner
    */
    private ?DateTime $lastHeartbeatDateTime = null;
    
    /**
     * @var bool|null $microsoftDefenderForEndpointAttachEnabled When TRUE, inidicates that configuration profile management via Microsoft Defender for Endpoint is enabled. When FALSE, inidicates that configuration profile management via Microsoft Defender for Endpoint is disabled. Default value is FALSE.
    */
    private ?bool $microsoftDefenderForEndpointAttachEnabled = null;
    
    /**
     * @var MobileThreatPartnerTenantState|null $partnerState Partner state of this tenant.
    */
    private ?MobileThreatPartnerTenantState $partnerState = null;
    
    /**
     * @var int|null $partnerUnresponsivenessThresholdInDays Indicates the number of days without receiving a heartbeat from a Mobile Threat Defense partner before the partner is marked as unresponsive. Intune will the ignore the data from this Mobile Threat Defense Partner for next compliance calculation.
    */
    private ?int $partnerUnresponsivenessThresholdInDays = null;
    
    /**
     * @var bool|null $partnerUnsupportedOsVersionBlocked When TRUE, indicates that Intune will mark devices noncompliant on enabled platforms that do not meet the minimum version requirements of the Mobile Threat Defense partner. When FALSE, indicates that Intune will not mark devices noncompliant on enabled platforms that do not meet the minimum version requirements of the Mobile Threat Defense partner. Default value is FALSE.
    */
    private ?bool $partnerUnsupportedOsVersionBlocked = null;
    
    /**
     * @var bool|null $windowsDeviceBlockedOnMissingPartnerData When TRUE, indicates that Intune must receive data from the data sync partner prior to marking a device compliant for Windows. When FALSE, indicates that Intune may mark a device compliant without receiving data from the data sync partner for Windows. Default value is FALSE.
    */
    private ?bool $windowsDeviceBlockedOnMissingPartnerData = null;
    
    /**
     * @var bool|null $windowsEnabled When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for Windows. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for Windows. Default value is FALSE.
    */
    private ?bool $windowsEnabled = null;
    
    /**
     * Instantiates a new MobileThreatDefenseConnector and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MobileThreatDefenseConnector
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MobileThreatDefenseConnector {
        return new MobileThreatDefenseConnector();
    }

    /**
     * Gets the allowPartnerToCollectIOSApplicationMetadata property value. When TRUE, indicates the Mobile Threat Defense partner may collect metadata about installed applications from Intune for iOS devices. When FALSE, indicates the Mobile Threat Defense partner may not collect metadata about installed applications from Intune for iOS devices. Default value is FALSE.
     * @return bool|null
    */
    public function getAllowPartnerToCollectIOSApplicationMetadata(): ?bool {
        return $this->allowPartnerToCollectIOSApplicationMetadata;
    }

    /**
     * Gets the allowPartnerToCollectIOSPersonalApplicationMetadata property value. When TRUE, indicates the Mobile Threat Defense partner may collect metadata about personally installed applications from Intune for iOS devices. When FALSE, indicates the Mobile Threat Defense partner may not collect metadata about personally installed applications from Intune for iOS devices. Default value is FALSE.
     * @return bool|null
    */
    public function getAllowPartnerToCollectIOSPersonalApplicationMetadata(): ?bool {
        return $this->allowPartnerToCollectIOSPersonalApplicationMetadata;
    }

    /**
     * Gets the androidDeviceBlockedOnMissingPartnerData property value. When TRUE, indicates that Intune must receive data from the Mobile Threat Defense partner prior to marking an Android device compliant. When FALSE, indicates that Intune may mark an Android device compliant before receiving data from the Mobile Threat Defense partner.
     * @return bool|null
    */
    public function getAndroidDeviceBlockedOnMissingPartnerData(): ?bool {
        return $this->androidDeviceBlockedOnMissingPartnerData;
    }

    /**
     * Gets the androidEnabled property value. When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for Android devices. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for Android devices. Default value is FALSE.
     * @return bool|null
    */
    public function getAndroidEnabled(): ?bool {
        return $this->androidEnabled;
    }

    /**
     * Gets the androidMobileApplicationManagementEnabled property value. When TRUE, inidicates that data from the Mobile Threat Defense partner can be used during Mobile Application Management (MAM) evaluations for Android devices. When FALSE, inidicates that data from the Mobile Threat Defense partner should not be used during Mobile Application Management (MAM) evaluations for Android devices. Only one partner per platform may be enabled for Mobile Application Management (MAM) evaluation. Default value is FALSE.
     * @return bool|null
    */
    public function getAndroidMobileApplicationManagementEnabled(): ?bool {
        return $this->androidMobileApplicationManagementEnabled;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'allowPartnerToCollectIOSApplicationMetadata' => fn(ParseNode $n) => $o->setAllowPartnerToCollectIOSApplicationMetadata($n->getBooleanValue()),
            'allowPartnerToCollectIOSPersonalApplicationMetadata' => fn(ParseNode $n) => $o->setAllowPartnerToCollectIOSPersonalApplicationMetadata($n->getBooleanValue()),
            'androidDeviceBlockedOnMissingPartnerData' => fn(ParseNode $n) => $o->setAndroidDeviceBlockedOnMissingPartnerData($n->getBooleanValue()),
            'androidEnabled' => fn(ParseNode $n) => $o->setAndroidEnabled($n->getBooleanValue()),
            'androidMobileApplicationManagementEnabled' => fn(ParseNode $n) => $o->setAndroidMobileApplicationManagementEnabled($n->getBooleanValue()),
            'iosDeviceBlockedOnMissingPartnerData' => fn(ParseNode $n) => $o->setIosDeviceBlockedOnMissingPartnerData($n->getBooleanValue()),
            'iosEnabled' => fn(ParseNode $n) => $o->setIosEnabled($n->getBooleanValue()),
            'iosMobileApplicationManagementEnabled' => fn(ParseNode $n) => $o->setIosMobileApplicationManagementEnabled($n->getBooleanValue()),
            'lastHeartbeatDateTime' => fn(ParseNode $n) => $o->setLastHeartbeatDateTime($n->getDateTimeValue()),
            'microsoftDefenderForEndpointAttachEnabled' => fn(ParseNode $n) => $o->setMicrosoftDefenderForEndpointAttachEnabled($n->getBooleanValue()),
            'partnerState' => fn(ParseNode $n) => $o->setPartnerState($n->getEnumValue(MobileThreatPartnerTenantState::class)),
            'partnerUnresponsivenessThresholdInDays' => fn(ParseNode $n) => $o->setPartnerUnresponsivenessThresholdInDays($n->getIntegerValue()),
            'partnerUnsupportedOsVersionBlocked' => fn(ParseNode $n) => $o->setPartnerUnsupportedOsVersionBlocked($n->getBooleanValue()),
            'windowsDeviceBlockedOnMissingPartnerData' => fn(ParseNode $n) => $o->setWindowsDeviceBlockedOnMissingPartnerData($n->getBooleanValue()),
            'windowsEnabled' => fn(ParseNode $n) => $o->setWindowsEnabled($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the iosDeviceBlockedOnMissingPartnerData property value. When TRUE, indicates that Intune must receive data from the Mobile Threat Defense partner prior to marking a device compliant. When FALSE, indicates that Intune may not recieve data from Mobile Threat Defense partner prior to making device compliant. Default value is FALSE.
     * @return bool|null
    */
    public function getIosDeviceBlockedOnMissingPartnerData(): ?bool {
        return $this->iosDeviceBlockedOnMissingPartnerData;
    }

    /**
     * Gets the iosEnabled property value. When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for iOS devices. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for iOS devices. Default value is FALSE.
     * @return bool|null
    */
    public function getIosEnabled(): ?bool {
        return $this->iosEnabled;
    }

    /**
     * Gets the iosMobileApplicationManagementEnabled property value. When TRUE, inidicates that data from the Mobile Threat Defense partner can be used during Mobile Application Management (MAM) evaluations for iOS devices. When FALSE, inidicates that data from the Mobile Threat Defense partner should not be used during Mobile Application Management (MAM) evaluations for iOS devices. Only one partner per platform may be enabled for Mobile Application Management (MAM) evaluation. Default value is FALSE.
     * @return bool|null
    */
    public function getIosMobileApplicationManagementEnabled(): ?bool {
        return $this->iosMobileApplicationManagementEnabled;
    }

    /**
     * Gets the lastHeartbeatDateTime property value. DateTime of last Heartbeat recieved from the Mobile Threat Defense partner
     * @return DateTime|null
    */
    public function getLastHeartbeatDateTime(): ?DateTime {
        return $this->lastHeartbeatDateTime;
    }

    /**
     * Gets the microsoftDefenderForEndpointAttachEnabled property value. When TRUE, inidicates that configuration profile management via Microsoft Defender for Endpoint is enabled. When FALSE, inidicates that configuration profile management via Microsoft Defender for Endpoint is disabled. Default value is FALSE.
     * @return bool|null
    */
    public function getMicrosoftDefenderForEndpointAttachEnabled(): ?bool {
        return $this->microsoftDefenderForEndpointAttachEnabled;
    }

    /**
     * Gets the partnerState property value. Partner state of this tenant.
     * @return MobileThreatPartnerTenantState|null
    */
    public function getPartnerState(): ?MobileThreatPartnerTenantState {
        return $this->partnerState;
    }

    /**
     * Gets the partnerUnresponsivenessThresholdInDays property value. Indicates the number of days without receiving a heartbeat from a Mobile Threat Defense partner before the partner is marked as unresponsive. Intune will the ignore the data from this Mobile Threat Defense Partner for next compliance calculation.
     * @return int|null
    */
    public function getPartnerUnresponsivenessThresholdInDays(): ?int {
        return $this->partnerUnresponsivenessThresholdInDays;
    }

    /**
     * Gets the partnerUnsupportedOsVersionBlocked property value. When TRUE, indicates that Intune will mark devices noncompliant on enabled platforms that do not meet the minimum version requirements of the Mobile Threat Defense partner. When FALSE, indicates that Intune will not mark devices noncompliant on enabled platforms that do not meet the minimum version requirements of the Mobile Threat Defense partner. Default value is FALSE.
     * @return bool|null
    */
    public function getPartnerUnsupportedOsVersionBlocked(): ?bool {
        return $this->partnerUnsupportedOsVersionBlocked;
    }

    /**
     * Gets the windowsDeviceBlockedOnMissingPartnerData property value. When TRUE, indicates that Intune must receive data from the data sync partner prior to marking a device compliant for Windows. When FALSE, indicates that Intune may mark a device compliant without receiving data from the data sync partner for Windows. Default value is FALSE.
     * @return bool|null
    */
    public function getWindowsDeviceBlockedOnMissingPartnerData(): ?bool {
        return $this->windowsDeviceBlockedOnMissingPartnerData;
    }

    /**
     * Gets the windowsEnabled property value. When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for Windows. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for Windows. Default value is FALSE.
     * @return bool|null
    */
    public function getWindowsEnabled(): ?bool {
        return $this->windowsEnabled;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('allowPartnerToCollectIOSApplicationMetadata', $this->getAllowPartnerToCollectIOSApplicationMetadata());
        $writer->writeBooleanValue('allowPartnerToCollectIOSPersonalApplicationMetadata', $this->getAllowPartnerToCollectIOSPersonalApplicationMetadata());
        $writer->writeBooleanValue('androidDeviceBlockedOnMissingPartnerData', $this->getAndroidDeviceBlockedOnMissingPartnerData());
        $writer->writeBooleanValue('androidEnabled', $this->getAndroidEnabled());
        $writer->writeBooleanValue('androidMobileApplicationManagementEnabled', $this->getAndroidMobileApplicationManagementEnabled());
        $writer->writeBooleanValue('iosDeviceBlockedOnMissingPartnerData', $this->getIosDeviceBlockedOnMissingPartnerData());
        $writer->writeBooleanValue('iosEnabled', $this->getIosEnabled());
        $writer->writeBooleanValue('iosMobileApplicationManagementEnabled', $this->getIosMobileApplicationManagementEnabled());
        $writer->writeDateTimeValue('lastHeartbeatDateTime', $this->getLastHeartbeatDateTime());
        $writer->writeBooleanValue('microsoftDefenderForEndpointAttachEnabled', $this->getMicrosoftDefenderForEndpointAttachEnabled());
        $writer->writeEnumValue('partnerState', $this->getPartnerState());
        $writer->writeIntegerValue('partnerUnresponsivenessThresholdInDays', $this->getPartnerUnresponsivenessThresholdInDays());
        $writer->writeBooleanValue('partnerUnsupportedOsVersionBlocked', $this->getPartnerUnsupportedOsVersionBlocked());
        $writer->writeBooleanValue('windowsDeviceBlockedOnMissingPartnerData', $this->getWindowsDeviceBlockedOnMissingPartnerData());
        $writer->writeBooleanValue('windowsEnabled', $this->getWindowsEnabled());
    }

    /**
     * Sets the allowPartnerToCollectIOSApplicationMetadata property value. When TRUE, indicates the Mobile Threat Defense partner may collect metadata about installed applications from Intune for iOS devices. When FALSE, indicates the Mobile Threat Defense partner may not collect metadata about installed applications from Intune for iOS devices. Default value is FALSE.
     * @param bool|null $value Value to set for the allowPartnerToCollectIOSApplicationMetadata property.
    */
    public function setAllowPartnerToCollectIOSApplicationMetadata(?bool $value): void {
        $this->allowPartnerToCollectIOSApplicationMetadata = $value;
    }

    /**
     * Sets the allowPartnerToCollectIOSPersonalApplicationMetadata property value. When TRUE, indicates the Mobile Threat Defense partner may collect metadata about personally installed applications from Intune for iOS devices. When FALSE, indicates the Mobile Threat Defense partner may not collect metadata about personally installed applications from Intune for iOS devices. Default value is FALSE.
     * @param bool|null $value Value to set for the allowPartnerToCollectIOSPersonalApplicationMetadata property.
    */
    public function setAllowPartnerToCollectIOSPersonalApplicationMetadata(?bool $value): void {
        $this->allowPartnerToCollectIOSPersonalApplicationMetadata = $value;
    }

    /**
     * Sets the androidDeviceBlockedOnMissingPartnerData property value. When TRUE, indicates that Intune must receive data from the Mobile Threat Defense partner prior to marking an Android device compliant. When FALSE, indicates that Intune may mark an Android device compliant before receiving data from the Mobile Threat Defense partner.
     * @param bool|null $value Value to set for the androidDeviceBlockedOnMissingPartnerData property.
    */
    public function setAndroidDeviceBlockedOnMissingPartnerData(?bool $value): void {
        $this->androidDeviceBlockedOnMissingPartnerData = $value;
    }

    /**
     * Sets the androidEnabled property value. When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for Android devices. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for Android devices. Default value is FALSE.
     * @param bool|null $value Value to set for the androidEnabled property.
    */
    public function setAndroidEnabled(?bool $value): void {
        $this->androidEnabled = $value;
    }

    /**
     * Sets the androidMobileApplicationManagementEnabled property value. When TRUE, inidicates that data from the Mobile Threat Defense partner can be used during Mobile Application Management (MAM) evaluations for Android devices. When FALSE, inidicates that data from the Mobile Threat Defense partner should not be used during Mobile Application Management (MAM) evaluations for Android devices. Only one partner per platform may be enabled for Mobile Application Management (MAM) evaluation. Default value is FALSE.
     * @param bool|null $value Value to set for the androidMobileApplicationManagementEnabled property.
    */
    public function setAndroidMobileApplicationManagementEnabled(?bool $value): void {
        $this->androidMobileApplicationManagementEnabled = $value;
    }

    /**
     * Sets the iosDeviceBlockedOnMissingPartnerData property value. When TRUE, indicates that Intune must receive data from the Mobile Threat Defense partner prior to marking a device compliant. When FALSE, indicates that Intune may not recieve data from Mobile Threat Defense partner prior to making device compliant. Default value is FALSE.
     * @param bool|null $value Value to set for the iosDeviceBlockedOnMissingPartnerData property.
    */
    public function setIosDeviceBlockedOnMissingPartnerData(?bool $value): void {
        $this->iosDeviceBlockedOnMissingPartnerData = $value;
    }

    /**
     * Sets the iosEnabled property value. When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for iOS devices. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for iOS devices. Default value is FALSE.
     * @param bool|null $value Value to set for the iosEnabled property.
    */
    public function setIosEnabled(?bool $value): void {
        $this->iosEnabled = $value;
    }

    /**
     * Sets the iosMobileApplicationManagementEnabled property value. When TRUE, inidicates that data from the Mobile Threat Defense partner can be used during Mobile Application Management (MAM) evaluations for iOS devices. When FALSE, inidicates that data from the Mobile Threat Defense partner should not be used during Mobile Application Management (MAM) evaluations for iOS devices. Only one partner per platform may be enabled for Mobile Application Management (MAM) evaluation. Default value is FALSE.
     * @param bool|null $value Value to set for the iosMobileApplicationManagementEnabled property.
    */
    public function setIosMobileApplicationManagementEnabled(?bool $value): void {
        $this->iosMobileApplicationManagementEnabled = $value;
    }

    /**
     * Sets the lastHeartbeatDateTime property value. DateTime of last Heartbeat recieved from the Mobile Threat Defense partner
     * @param DateTime|null $value Value to set for the lastHeartbeatDateTime property.
    */
    public function setLastHeartbeatDateTime(?DateTime $value): void {
        $this->lastHeartbeatDateTime = $value;
    }

    /**
     * Sets the microsoftDefenderForEndpointAttachEnabled property value. When TRUE, inidicates that configuration profile management via Microsoft Defender for Endpoint is enabled. When FALSE, inidicates that configuration profile management via Microsoft Defender for Endpoint is disabled. Default value is FALSE.
     * @param bool|null $value Value to set for the microsoftDefenderForEndpointAttachEnabled property.
    */
    public function setMicrosoftDefenderForEndpointAttachEnabled(?bool $value): void {
        $this->microsoftDefenderForEndpointAttachEnabled = $value;
    }

    /**
     * Sets the partnerState property value. Partner state of this tenant.
     * @param MobileThreatPartnerTenantState|null $value Value to set for the partnerState property.
    */
    public function setPartnerState(?MobileThreatPartnerTenantState $value): void {
        $this->partnerState = $value;
    }

    /**
     * Sets the partnerUnresponsivenessThresholdInDays property value. Indicates the number of days without receiving a heartbeat from a Mobile Threat Defense partner before the partner is marked as unresponsive. Intune will the ignore the data from this Mobile Threat Defense Partner for next compliance calculation.
     * @param int|null $value Value to set for the partnerUnresponsivenessThresholdInDays property.
    */
    public function setPartnerUnresponsivenessThresholdInDays(?int $value): void {
        $this->partnerUnresponsivenessThresholdInDays = $value;
    }

    /**
     * Sets the partnerUnsupportedOsVersionBlocked property value. When TRUE, indicates that Intune will mark devices noncompliant on enabled platforms that do not meet the minimum version requirements of the Mobile Threat Defense partner. When FALSE, indicates that Intune will not mark devices noncompliant on enabled platforms that do not meet the minimum version requirements of the Mobile Threat Defense partner. Default value is FALSE.
     * @param bool|null $value Value to set for the partnerUnsupportedOsVersionBlocked property.
    */
    public function setPartnerUnsupportedOsVersionBlocked(?bool $value): void {
        $this->partnerUnsupportedOsVersionBlocked = $value;
    }

    /**
     * Sets the windowsDeviceBlockedOnMissingPartnerData property value. When TRUE, indicates that Intune must receive data from the data sync partner prior to marking a device compliant for Windows. When FALSE, indicates that Intune may mark a device compliant without receiving data from the data sync partner for Windows. Default value is FALSE.
     * @param bool|null $value Value to set for the windowsDeviceBlockedOnMissingPartnerData property.
    */
    public function setWindowsDeviceBlockedOnMissingPartnerData(?bool $value): void {
        $this->windowsDeviceBlockedOnMissingPartnerData = $value;
    }

    /**
     * Sets the windowsEnabled property value. When TRUE, indicates that data from the Mobile Threat Defense partner will be used during compliance evaluations for Windows. When FALSE, indicates that data from the Mobile Threat Defense partner will not be used during compliance evaluations for Windows. Default value is FALSE.
     * @param bool|null $value Value to set for the windowsEnabled property.
    */
    public function setWindowsEnabled(?bool $value): void {
        $this->windowsEnabled = $value;
    }

}
