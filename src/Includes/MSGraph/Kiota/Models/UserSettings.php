<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UserSettings extends Entity implements Parsable 
{
    /**
     * @var bool|null $contributionToContentDiscoveryAsOrganizationDisabled Reflects the organization level setting controlling delegate access to the trending API. When set to true, the organization doesn't have access to Office Delve. The relevancy of the content displayed in Microsoft 365, for example in Suggested sites in SharePoint Home and the Discover view in OneDrive for work or school is affected for the whole organization. This setting is read-only and can only be changed by administrators in the SharePoint admin center.
    */
    private ?bool $contributionToContentDiscoveryAsOrganizationDisabled = null;
    
    /**
     * @var bool|null $contributionToContentDiscoveryDisabled When set to true, the delegate access to the user's trending API is disabled. When set to true, documents in the user's Office Delve are disabled. When set to true, the relevancy of the content displayed in Microsoft 365, for example in Suggested sites in SharePoint Home and the Discover view in OneDrive for work or school is affected. Users can control this setting in Office Delve.
    */
    private ?bool $contributionToContentDiscoveryDisabled = null;
    
    /**
     * @var ExchangeSettings|null $exchange The Exchange settings for mailbox discovery.
    */
    private ?ExchangeSettings $exchange = null;
    
    /**
     * @var UserInsightsSettings|null $itemInsights The user's settings for the visibility of meeting hour insights, and insights derived between a user and other items in Microsoft 365, such as documents or sites. Get userInsightsSettings through this navigation property.
    */
    private ?UserInsightsSettings $itemInsights = null;
    
    /**
     * @var ShiftPreferences|null $shiftPreferences The shiftPreferences property
    */
    private ?ShiftPreferences $shiftPreferences = null;
    
    /**
     * @var UserStorage|null $storage The storage property
    */
    private ?UserStorage $storage = null;
    
    /**
     * @var array<WindowsSetting>|null $windows The Windows settings of the user stored in the cloud.
    */
    private ?array $windows = null;
    
    /**
     * @var WorkHoursAndLocationsSetting|null $workHoursAndLocations The user's settings for work hours and location preferences for scheduling and availability management.
    */
    private ?WorkHoursAndLocationsSetting $workHoursAndLocations = null;
    
    /**
     * Instantiates a new UserSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UserSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UserSettings {
        return new UserSettings();
    }

    /**
     * Gets the contributionToContentDiscoveryAsOrganizationDisabled property value. Reflects the organization level setting controlling delegate access to the trending API. When set to true, the organization doesn't have access to Office Delve. The relevancy of the content displayed in Microsoft 365, for example in Suggested sites in SharePoint Home and the Discover view in OneDrive for work or school is affected for the whole organization. This setting is read-only and can only be changed by administrators in the SharePoint admin center.
     * @return bool|null
    */
    public function getContributionToContentDiscoveryAsOrganizationDisabled(): ?bool {
        return $this->contributionToContentDiscoveryAsOrganizationDisabled;
    }

    /**
     * Gets the contributionToContentDiscoveryDisabled property value. When set to true, the delegate access to the user's trending API is disabled. When set to true, documents in the user's Office Delve are disabled. When set to true, the relevancy of the content displayed in Microsoft 365, for example in Suggested sites in SharePoint Home and the Discover view in OneDrive for work or school is affected. Users can control this setting in Office Delve.
     * @return bool|null
    */
    public function getContributionToContentDiscoveryDisabled(): ?bool {
        return $this->contributionToContentDiscoveryDisabled;
    }

    /**
     * Gets the exchange property value. The Exchange settings for mailbox discovery.
     * @return ExchangeSettings|null
    */
    public function getExchange(): ?ExchangeSettings {
        return $this->exchange;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'contributionToContentDiscoveryAsOrganizationDisabled' => fn(ParseNode $n) => $o->setContributionToContentDiscoveryAsOrganizationDisabled($n->getBooleanValue()),
            'contributionToContentDiscoveryDisabled' => fn(ParseNode $n) => $o->setContributionToContentDiscoveryDisabled($n->getBooleanValue()),
            'exchange' => fn(ParseNode $n) => $o->setExchange($n->getObjectValue([ExchangeSettings::class, 'createFromDiscriminatorValue'])),
            'itemInsights' => fn(ParseNode $n) => $o->setItemInsights($n->getObjectValue([UserInsightsSettings::class, 'createFromDiscriminatorValue'])),
            'shiftPreferences' => fn(ParseNode $n) => $o->setShiftPreferences($n->getObjectValue([ShiftPreferences::class, 'createFromDiscriminatorValue'])),
            'storage' => fn(ParseNode $n) => $o->setStorage($n->getObjectValue([UserStorage::class, 'createFromDiscriminatorValue'])),
            'windows' => fn(ParseNode $n) => $o->setWindows($n->getCollectionOfObjectValues([WindowsSetting::class, 'createFromDiscriminatorValue'])),
            'workHoursAndLocations' => fn(ParseNode $n) => $o->setWorkHoursAndLocations($n->getObjectValue([WorkHoursAndLocationsSetting::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the itemInsights property value. The user's settings for the visibility of meeting hour insights, and insights derived between a user and other items in Microsoft 365, such as documents or sites. Get userInsightsSettings through this navigation property.
     * @return UserInsightsSettings|null
    */
    public function getItemInsights(): ?UserInsightsSettings {
        return $this->itemInsights;
    }

    /**
     * Gets the shiftPreferences property value. The shiftPreferences property
     * @return ShiftPreferences|null
    */
    public function getShiftPreferences(): ?ShiftPreferences {
        return $this->shiftPreferences;
    }

    /**
     * Gets the storage property value. The storage property
     * @return UserStorage|null
    */
    public function getStorage(): ?UserStorage {
        return $this->storage;
    }

    /**
     * Gets the windows property value. The Windows settings of the user stored in the cloud.
     * @return array<WindowsSetting>|null
    */
    public function getWindows(): ?array {
        return $this->windows;
    }

    /**
     * Gets the workHoursAndLocations property value. The user's settings for work hours and location preferences for scheduling and availability management.
     * @return WorkHoursAndLocationsSetting|null
    */
    public function getWorkHoursAndLocations(): ?WorkHoursAndLocationsSetting {
        return $this->workHoursAndLocations;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('contributionToContentDiscoveryAsOrganizationDisabled', $this->getContributionToContentDiscoveryAsOrganizationDisabled());
        $writer->writeBooleanValue('contributionToContentDiscoveryDisabled', $this->getContributionToContentDiscoveryDisabled());
        $writer->writeObjectValue('exchange', $this->getExchange());
        $writer->writeObjectValue('itemInsights', $this->getItemInsights());
        $writer->writeObjectValue('shiftPreferences', $this->getShiftPreferences());
        $writer->writeObjectValue('storage', $this->getStorage());
        $writer->writeCollectionOfObjectValues('windows', $this->getWindows());
        $writer->writeObjectValue('workHoursAndLocations', $this->getWorkHoursAndLocations());
    }

    /**
     * Sets the contributionToContentDiscoveryAsOrganizationDisabled property value. Reflects the organization level setting controlling delegate access to the trending API. When set to true, the organization doesn't have access to Office Delve. The relevancy of the content displayed in Microsoft 365, for example in Suggested sites in SharePoint Home and the Discover view in OneDrive for work or school is affected for the whole organization. This setting is read-only and can only be changed by administrators in the SharePoint admin center.
     * @param bool|null $value Value to set for the contributionToContentDiscoveryAsOrganizationDisabled property.
    */
    public function setContributionToContentDiscoveryAsOrganizationDisabled(?bool $value): void {
        $this->contributionToContentDiscoveryAsOrganizationDisabled = $value;
    }

    /**
     * Sets the contributionToContentDiscoveryDisabled property value. When set to true, the delegate access to the user's trending API is disabled. When set to true, documents in the user's Office Delve are disabled. When set to true, the relevancy of the content displayed in Microsoft 365, for example in Suggested sites in SharePoint Home and the Discover view in OneDrive for work or school is affected. Users can control this setting in Office Delve.
     * @param bool|null $value Value to set for the contributionToContentDiscoveryDisabled property.
    */
    public function setContributionToContentDiscoveryDisabled(?bool $value): void {
        $this->contributionToContentDiscoveryDisabled = $value;
    }

    /**
     * Sets the exchange property value. The Exchange settings for mailbox discovery.
     * @param ExchangeSettings|null $value Value to set for the exchange property.
    */
    public function setExchange(?ExchangeSettings $value): void {
        $this->exchange = $value;
    }

    /**
     * Sets the itemInsights property value. The user's settings for the visibility of meeting hour insights, and insights derived between a user and other items in Microsoft 365, such as documents or sites. Get userInsightsSettings through this navigation property.
     * @param UserInsightsSettings|null $value Value to set for the itemInsights property.
    */
    public function setItemInsights(?UserInsightsSettings $value): void {
        $this->itemInsights = $value;
    }

    /**
     * Sets the shiftPreferences property value. The shiftPreferences property
     * @param ShiftPreferences|null $value Value to set for the shiftPreferences property.
    */
    public function setShiftPreferences(?ShiftPreferences $value): void {
        $this->shiftPreferences = $value;
    }

    /**
     * Sets the storage property value. The storage property
     * @param UserStorage|null $value Value to set for the storage property.
    */
    public function setStorage(?UserStorage $value): void {
        $this->storage = $value;
    }

    /**
     * Sets the windows property value. The Windows settings of the user stored in the cloud.
     * @param array<WindowsSetting>|null $value Value to set for the windows property.
    */
    public function setWindows(?array $value): void {
        $this->windows = $value;
    }

    /**
     * Sets the workHoursAndLocations property value. The user's settings for work hours and location preferences for scheduling and availability management.
     * @param WorkHoursAndLocationsSetting|null $value Value to set for the workHoursAndLocations property.
    */
    public function setWorkHoursAndLocations(?WorkHoursAndLocationsSetting $value): void {
        $this->workHoursAndLocations = $value;
    }

}
