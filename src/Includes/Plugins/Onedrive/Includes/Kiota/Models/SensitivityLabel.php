<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SensitivityLabel extends Entity implements Parsable 
{
    /**
     * @var LabelActionSource|null $actionSource The actionSource property
    */
    private ?LabelActionSource $actionSource = null;
    
    /**
     * @var string|null $autoTooltip The autoTooltip property
    */
    private ?string $autoTooltip = null;
    
    /**
     * @var string|null $description The description property
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The displayName property
    */
    private ?string $displayName = null;
    
    /**
     * @var bool|null $hasProtection The hasProtection property
    */
    private ?bool $hasProtection = null;
    
    /**
     * @var bool|null $isDefault The isDefault property
    */
    private ?bool $isDefault = null;
    
    /**
     * @var bool|null $isEndpointProtectionEnabled The isEndpointProtectionEnabled property
    */
    private ?bool $isEndpointProtectionEnabled = null;
    
    /**
     * @var bool|null $isScopedToUser The isScopedToUser property
    */
    private ?bool $isScopedToUser = null;
    
    /**
     * @var string|null $locale The locale property
    */
    private ?string $locale = null;
    
    /**
     * @var string|null $name The name property
    */
    private ?string $name = null;
    
    /**
     * @var int|null $priority The priority property
    */
    private ?int $priority = null;
    
    /**
     * @var UsageRightsIncluded|null $rights The rights property
    */
    private ?UsageRightsIncluded $rights = null;
    
    /**
     * @var array<SensitivityLabel>|null $sublabels The sublabels property
    */
    private ?array $sublabels = null;
    
    /**
     * @var string|null $toolTip The toolTip property
    */
    private ?string $toolTip = null;
    
    /**
     * Instantiates a new SensitivityLabel and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SensitivityLabel
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SensitivityLabel {
        return new SensitivityLabel();
    }

    /**
     * Gets the actionSource property value. The actionSource property
     * @return LabelActionSource|null
    */
    public function getActionSource(): ?LabelActionSource {
        return $this->actionSource;
    }

    /**
     * Gets the autoTooltip property value. The autoTooltip property
     * @return string|null
    */
    public function getAutoTooltip(): ?string {
        return $this->autoTooltip;
    }

    /**
     * Gets the description property value. The description property
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The displayName property
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
            'actionSource' => fn(ParseNode $n) => $o->setActionSource($n->getEnumValue(LabelActionSource::class)),
            'autoTooltip' => fn(ParseNode $n) => $o->setAutoTooltip($n->getStringValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'hasProtection' => fn(ParseNode $n) => $o->setHasProtection($n->getBooleanValue()),
            'isDefault' => fn(ParseNode $n) => $o->setIsDefault($n->getBooleanValue()),
            'isEndpointProtectionEnabled' => fn(ParseNode $n) => $o->setIsEndpointProtectionEnabled($n->getBooleanValue()),
            'isScopedToUser' => fn(ParseNode $n) => $o->setIsScopedToUser($n->getBooleanValue()),
            'locale' => fn(ParseNode $n) => $o->setLocale($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'priority' => fn(ParseNode $n) => $o->setPriority($n->getIntegerValue()),
            'rights' => fn(ParseNode $n) => $o->setRights($n->getObjectValue([UsageRightsIncluded::class, 'createFromDiscriminatorValue'])),
            'sublabels' => fn(ParseNode $n) => $o->setSublabels($n->getCollectionOfObjectValues([SensitivityLabel::class, 'createFromDiscriminatorValue'])),
            'toolTip' => fn(ParseNode $n) => $o->setToolTip($n->getStringValue()),
        ]);
    }

    /**
     * Gets the hasProtection property value. The hasProtection property
     * @return bool|null
    */
    public function getHasProtection(): ?bool {
        return $this->hasProtection;
    }

    /**
     * Gets the isDefault property value. The isDefault property
     * @return bool|null
    */
    public function getIsDefault(): ?bool {
        return $this->isDefault;
    }

    /**
     * Gets the isEndpointProtectionEnabled property value. The isEndpointProtectionEnabled property
     * @return bool|null
    */
    public function getIsEndpointProtectionEnabled(): ?bool {
        return $this->isEndpointProtectionEnabled;
    }

    /**
     * Gets the isScopedToUser property value. The isScopedToUser property
     * @return bool|null
    */
    public function getIsScopedToUser(): ?bool {
        return $this->isScopedToUser;
    }

    /**
     * Gets the locale property value. The locale property
     * @return string|null
    */
    public function getLocale(): ?string {
        return $this->locale;
    }

    /**
     * Gets the name property value. The name property
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the priority property value. The priority property
     * @return int|null
    */
    public function getPriority(): ?int {
        return $this->priority;
    }

    /**
     * Gets the rights property value. The rights property
     * @return UsageRightsIncluded|null
    */
    public function getRights(): ?UsageRightsIncluded {
        return $this->rights;
    }

    /**
     * Gets the sublabels property value. The sublabels property
     * @return array<SensitivityLabel>|null
    */
    public function getSublabels(): ?array {
        return $this->sublabels;
    }

    /**
     * Gets the toolTip property value. The toolTip property
     * @return string|null
    */
    public function getToolTip(): ?string {
        return $this->toolTip;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('actionSource', $this->getActionSource());
        $writer->writeStringValue('autoTooltip', $this->getAutoTooltip());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeBooleanValue('hasProtection', $this->getHasProtection());
        $writer->writeBooleanValue('isDefault', $this->getIsDefault());
        $writer->writeBooleanValue('isEndpointProtectionEnabled', $this->getIsEndpointProtectionEnabled());
        $writer->writeBooleanValue('isScopedToUser', $this->getIsScopedToUser());
        $writer->writeStringValue('locale', $this->getLocale());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeIntegerValue('priority', $this->getPriority());
        $writer->writeObjectValue('rights', $this->getRights());
        $writer->writeCollectionOfObjectValues('sublabels', $this->getSublabels());
        $writer->writeStringValue('toolTip', $this->getToolTip());
    }

    /**
     * Sets the actionSource property value. The actionSource property
     * @param LabelActionSource|null $value Value to set for the actionSource property.
    */
    public function setActionSource(?LabelActionSource $value): void {
        $this->actionSource = $value;
    }

    /**
     * Sets the autoTooltip property value. The autoTooltip property
     * @param string|null $value Value to set for the autoTooltip property.
    */
    public function setAutoTooltip(?string $value): void {
        $this->autoTooltip = $value;
    }

    /**
     * Sets the description property value. The description property
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The displayName property
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the hasProtection property value. The hasProtection property
     * @param bool|null $value Value to set for the hasProtection property.
    */
    public function setHasProtection(?bool $value): void {
        $this->hasProtection = $value;
    }

    /**
     * Sets the isDefault property value. The isDefault property
     * @param bool|null $value Value to set for the isDefault property.
    */
    public function setIsDefault(?bool $value): void {
        $this->isDefault = $value;
    }

    /**
     * Sets the isEndpointProtectionEnabled property value. The isEndpointProtectionEnabled property
     * @param bool|null $value Value to set for the isEndpointProtectionEnabled property.
    */
    public function setIsEndpointProtectionEnabled(?bool $value): void {
        $this->isEndpointProtectionEnabled = $value;
    }

    /**
     * Sets the isScopedToUser property value. The isScopedToUser property
     * @param bool|null $value Value to set for the isScopedToUser property.
    */
    public function setIsScopedToUser(?bool $value): void {
        $this->isScopedToUser = $value;
    }

    /**
     * Sets the locale property value. The locale property
     * @param string|null $value Value to set for the locale property.
    */
    public function setLocale(?string $value): void {
        $this->locale = $value;
    }

    /**
     * Sets the name property value. The name property
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the priority property value. The priority property
     * @param int|null $value Value to set for the priority property.
    */
    public function setPriority(?int $value): void {
        $this->priority = $value;
    }

    /**
     * Sets the rights property value. The rights property
     * @param UsageRightsIncluded|null $value Value to set for the rights property.
    */
    public function setRights(?UsageRightsIncluded $value): void {
        $this->rights = $value;
    }

    /**
     * Sets the sublabels property value. The sublabels property
     * @param array<SensitivityLabel>|null $value Value to set for the sublabels property.
    */
    public function setSublabels(?array $value): void {
        $this->sublabels = $value;
    }

    /**
     * Sets the toolTip property value. The toolTip property
     * @param string|null $value Value to set for the toolTip property.
    */
    public function setToolTip(?string $value): void {
        $this->toolTip = $value;
    }

}
