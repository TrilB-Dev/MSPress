<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PeopleAdminSettings extends Entity implements Parsable 
{
    /**
     * @var InsightsSettings|null $itemInsights Represents administrator settings that manage the support for item insights in an organization.
    */
    private ?InsightsSettings $itemInsights = null;
    
    /**
     * @var array<ProfileCardProperty>|null $profileCardProperties Contains a collection of the properties an administrator has defined as visible on the Microsoft 365 profile card.
    */
    private ?array $profileCardProperties = null;
    
    /**
     * @var array<ProfilePropertySetting>|null $profilePropertySettings A collection of profile property configuration settings defined by an administrator for an organization.
    */
    private ?array $profilePropertySettings = null;
    
    /**
     * @var array<ProfileSource>|null $profileSources A collection of profile source settings configured by an administrator in an organization.
    */
    private ?array $profileSources = null;
    
    /**
     * @var PronounsSettings|null $pronouns Represents administrator settings that manage the support of pronouns in an organization.
    */
    private ?PronounsSettings $pronouns = null;
    
    /**
     * Instantiates a new PeopleAdminSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PeopleAdminSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PeopleAdminSettings {
        return new PeopleAdminSettings();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'itemInsights' => fn(ParseNode $n) => $o->setItemInsights($n->getObjectValue([InsightsSettings::class, 'createFromDiscriminatorValue'])),
            'profileCardProperties' => fn(ParseNode $n) => $o->setProfileCardProperties($n->getCollectionOfObjectValues([ProfileCardProperty::class, 'createFromDiscriminatorValue'])),
            'profilePropertySettings' => fn(ParseNode $n) => $o->setProfilePropertySettings($n->getCollectionOfObjectValues([ProfilePropertySetting::class, 'createFromDiscriminatorValue'])),
            'profileSources' => fn(ParseNode $n) => $o->setProfileSources($n->getCollectionOfObjectValues([ProfileSource::class, 'createFromDiscriminatorValue'])),
            'pronouns' => fn(ParseNode $n) => $o->setPronouns($n->getObjectValue([PronounsSettings::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the itemInsights property value. Represents administrator settings that manage the support for item insights in an organization.
     * @return InsightsSettings|null
    */
    public function getItemInsights(): ?InsightsSettings {
        return $this->itemInsights;
    }

    /**
     * Gets the profileCardProperties property value. Contains a collection of the properties an administrator has defined as visible on the Microsoft 365 profile card.
     * @return array<ProfileCardProperty>|null
    */
    public function getProfileCardProperties(): ?array {
        return $this->profileCardProperties;
    }

    /**
     * Gets the profilePropertySettings property value. A collection of profile property configuration settings defined by an administrator for an organization.
     * @return array<ProfilePropertySetting>|null
    */
    public function getProfilePropertySettings(): ?array {
        return $this->profilePropertySettings;
    }

    /**
     * Gets the profileSources property value. A collection of profile source settings configured by an administrator in an organization.
     * @return array<ProfileSource>|null
    */
    public function getProfileSources(): ?array {
        return $this->profileSources;
    }

    /**
     * Gets the pronouns property value. Represents administrator settings that manage the support of pronouns in an organization.
     * @return PronounsSettings|null
    */
    public function getPronouns(): ?PronounsSettings {
        return $this->pronouns;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('itemInsights', $this->getItemInsights());
        $writer->writeCollectionOfObjectValues('profileCardProperties', $this->getProfileCardProperties());
        $writer->writeCollectionOfObjectValues('profilePropertySettings', $this->getProfilePropertySettings());
        $writer->writeCollectionOfObjectValues('profileSources', $this->getProfileSources());
        $writer->writeObjectValue('pronouns', $this->getPronouns());
    }

    /**
     * Sets the itemInsights property value. Represents administrator settings that manage the support for item insights in an organization.
     * @param InsightsSettings|null $value Value to set for the itemInsights property.
    */
    public function setItemInsights(?InsightsSettings $value): void {
        $this->itemInsights = $value;
    }

    /**
     * Sets the profileCardProperties property value. Contains a collection of the properties an administrator has defined as visible on the Microsoft 365 profile card.
     * @param array<ProfileCardProperty>|null $value Value to set for the profileCardProperties property.
    */
    public function setProfileCardProperties(?array $value): void {
        $this->profileCardProperties = $value;
    }

    /**
     * Sets the profilePropertySettings property value. A collection of profile property configuration settings defined by an administrator for an organization.
     * @param array<ProfilePropertySetting>|null $value Value to set for the profilePropertySettings property.
    */
    public function setProfilePropertySettings(?array $value): void {
        $this->profilePropertySettings = $value;
    }

    /**
     * Sets the profileSources property value. A collection of profile source settings configured by an administrator in an organization.
     * @param array<ProfileSource>|null $value Value to set for the profileSources property.
    */
    public function setProfileSources(?array $value): void {
        $this->profileSources = $value;
    }

    /**
     * Sets the pronouns property value. Represents administrator settings that manage the support of pronouns in an organization.
     * @param PronounsSettings|null $value Value to set for the pronouns property.
    */
    public function setPronouns(?PronounsSettings $value): void {
        $this->pronouns = $value;
    }

}
