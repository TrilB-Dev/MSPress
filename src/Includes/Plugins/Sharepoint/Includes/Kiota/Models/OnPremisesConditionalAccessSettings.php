<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * Singleton entity which represents the Exchange OnPremises Conditional Access Settings for a tenant.
*/
class OnPremisesConditionalAccessSettings extends Entity implements Parsable 
{
    /**
     * @var bool|null $enabled Indicates if on premises conditional access is enabled for this organization
    */
    private ?bool $enabled = null;
    
    /**
     * @var array<string>|null $excludedGroups User groups that will be exempt by on premises conditional access. All users in these groups will be exempt from the conditional access policy.
    */
    private ?array $excludedGroups = null;
    
    /**
     * @var array<string>|null $includedGroups User groups that will be targeted by on premises conditional access. All users in these groups will be required to have mobile device managed and compliant for mail access.
    */
    private ?array $includedGroups = null;
    
    /**
     * @var bool|null $overrideDefaultRule Override the default access rule when allowing a device to ensure access is granted.
    */
    private ?bool $overrideDefaultRule = null;
    
    /**
     * Instantiates a new OnPremisesConditionalAccessSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnPremisesConditionalAccessSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnPremisesConditionalAccessSettings {
        return new OnPremisesConditionalAccessSettings();
    }

    /**
     * Gets the enabled property value. Indicates if on premises conditional access is enabled for this organization
     * @return bool|null
    */
    public function getEnabled(): ?bool {
        return $this->enabled;
    }

    /**
     * Gets the excludedGroups property value. User groups that will be exempt by on premises conditional access. All users in these groups will be exempt from the conditional access policy.
     * @return array<string>|null
    */
    public function getExcludedGroups(): ?array {
        return $this->excludedGroups;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'enabled' => fn(ParseNode $n) => $o->setEnabled($n->getBooleanValue()),
            'excludedGroups' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setExcludedGroups($val);
            },
            'includedGroups' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIncludedGroups($val);
            },
            'overrideDefaultRule' => fn(ParseNode $n) => $o->setOverrideDefaultRule($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the includedGroups property value. User groups that will be targeted by on premises conditional access. All users in these groups will be required to have mobile device managed and compliant for mail access.
     * @return array<string>|null
    */
    public function getIncludedGroups(): ?array {
        return $this->includedGroups;
    }

    /**
     * Gets the overrideDefaultRule property value. Override the default access rule when allowing a device to ensure access is granted.
     * @return bool|null
    */
    public function getOverrideDefaultRule(): ?bool {
        return $this->overrideDefaultRule;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('enabled', $this->getEnabled());
        $writer->writeCollectionOfPrimitiveValues('excludedGroups', $this->getExcludedGroups());
        $writer->writeCollectionOfPrimitiveValues('includedGroups', $this->getIncludedGroups());
        $writer->writeBooleanValue('overrideDefaultRule', $this->getOverrideDefaultRule());
    }

    /**
     * Sets the enabled property value. Indicates if on premises conditional access is enabled for this organization
     * @param bool|null $value Value to set for the enabled property.
    */
    public function setEnabled(?bool $value): void {
        $this->enabled = $value;
    }

    /**
     * Sets the excludedGroups property value. User groups that will be exempt by on premises conditional access. All users in these groups will be exempt from the conditional access policy.
     * @param array<string>|null $value Value to set for the excludedGroups property.
    */
    public function setExcludedGroups(?array $value): void {
        $this->excludedGroups = $value;
    }

    /**
     * Sets the includedGroups property value. User groups that will be targeted by on premises conditional access. All users in these groups will be required to have mobile device managed and compliant for mail access.
     * @param array<string>|null $value Value to set for the includedGroups property.
    */
    public function setIncludedGroups(?array $value): void {
        $this->includedGroups = $value;
    }

    /**
     * Sets the overrideDefaultRule property value. Override the default access rule when allowing a device to ensure access is granted.
     * @param bool|null $value Value to set for the overrideDefaultRule property.
    */
    public function setOverrideDefaultRule(?bool $value): void {
        $this->overrideDefaultRule = $value;
    }

}
