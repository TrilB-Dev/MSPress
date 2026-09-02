<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AkamaiVerifiedDetailsModel extends WebApplicationFirewallVerifiedDetails implements Parsable 
{
    /**
     * @var array<AkamaiAttackGroupActionModel>|null $activeAttackGroups Collection of Akamai attack groups that are currently active for the zone or host, including the action applied to each group (for example, deny, none or alert).
    */
    private ?array $activeAttackGroups = null;
    
    /**
     * @var array<AkamaiCustomRuleModel>|null $activeCustomRules Collection of Akamai custom rules that are currently enabled for the zone or host. Each entry includes rule metadata such as the rule identifier, friendly name, and the action taken when the rule matches traffic.
    */
    private ?array $activeCustomRules = null;
    
    /**
     * @var AkamaiRapidRulesModel|null $rapidRules Configuration for Akamai Rapid Rules, including whether Rapid Rules are enabled and the default action applied to matching traffic.
    */
    private ?AkamaiRapidRulesModel $rapidRules = null;
    
    /**
     * Instantiates a new AkamaiVerifiedDetailsModel and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.akamaiVerifiedDetailsModel');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AkamaiVerifiedDetailsModel
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AkamaiVerifiedDetailsModel {
        return new AkamaiVerifiedDetailsModel();
    }

    /**
     * Gets the activeAttackGroups property value. Collection of Akamai attack groups that are currently active for the zone or host, including the action applied to each group (for example, deny, none or alert).
     * @return array<AkamaiAttackGroupActionModel>|null
    */
    public function getActiveAttackGroups(): ?array {
        return $this->activeAttackGroups;
    }

    /**
     * Gets the activeCustomRules property value. Collection of Akamai custom rules that are currently enabled for the zone or host. Each entry includes rule metadata such as the rule identifier, friendly name, and the action taken when the rule matches traffic.
     * @return array<AkamaiCustomRuleModel>|null
    */
    public function getActiveCustomRules(): ?array {
        return $this->activeCustomRules;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activeAttackGroups' => fn(ParseNode $n) => $o->setActiveAttackGroups($n->getCollectionOfObjectValues([AkamaiAttackGroupActionModel::class, 'createFromDiscriminatorValue'])),
            'activeCustomRules' => fn(ParseNode $n) => $o->setActiveCustomRules($n->getCollectionOfObjectValues([AkamaiCustomRuleModel::class, 'createFromDiscriminatorValue'])),
            'rapidRules' => fn(ParseNode $n) => $o->setRapidRules($n->getObjectValue([AkamaiRapidRulesModel::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the rapidRules property value. Configuration for Akamai Rapid Rules, including whether Rapid Rules are enabled and the default action applied to matching traffic.
     * @return AkamaiRapidRulesModel|null
    */
    public function getRapidRules(): ?AkamaiRapidRulesModel {
        return $this->rapidRules;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('activeAttackGroups', $this->getActiveAttackGroups());
        $writer->writeCollectionOfObjectValues('activeCustomRules', $this->getActiveCustomRules());
        $writer->writeObjectValue('rapidRules', $this->getRapidRules());
    }

    /**
     * Sets the activeAttackGroups property value. Collection of Akamai attack groups that are currently active for the zone or host, including the action applied to each group (for example, deny, none or alert).
     * @param array<AkamaiAttackGroupActionModel>|null $value Value to set for the activeAttackGroups property.
    */
    public function setActiveAttackGroups(?array $value): void {
        $this->activeAttackGroups = $value;
    }

    /**
     * Sets the activeCustomRules property value. Collection of Akamai custom rules that are currently enabled for the zone or host. Each entry includes rule metadata such as the rule identifier, friendly name, and the action taken when the rule matches traffic.
     * @param array<AkamaiCustomRuleModel>|null $value Value to set for the activeCustomRules property.
    */
    public function setActiveCustomRules(?array $value): void {
        $this->activeCustomRules = $value;
    }

    /**
     * Sets the rapidRules property value. Configuration for Akamai Rapid Rules, including whether Rapid Rules are enabled and the default action applied to matching traffic.
     * @param AkamaiRapidRulesModel|null $value Value to set for the rapidRules property.
    */
    public function setRapidRules(?AkamaiRapidRulesModel $value): void {
        $this->rapidRules = $value;
    }

}
