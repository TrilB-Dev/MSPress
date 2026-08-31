<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudFlareVerifiedDetailsModel extends WebApplicationFirewallVerifiedDetails implements Parsable 
{
    /**
     * @var array<CloudFlareRuleModel>|null $enabledCustomRules Collection of Cloudflare custom rules that are currently enabled for the zone or host.
    */
    private ?array $enabledCustomRules = null;
    
    /**
     * @var array<CloudFlareRulesetModel>|null $enabledRecommendedRulesets Collection of Cloudflare recommended rulesets that are enabled for the zone or host.
    */
    private ?array $enabledRecommendedRulesets = null;
    
    /**
     * @var string|null $zoneId Cloudflare-assigned identifier for the DNS zone associated with the verified host (for example, the Cloudflare Zone ID). This ID is used to correlate verification details with the Cloudflare account and to perform configuration operations via the provider's API.
    */
    private ?string $zoneId = null;
    
    /**
     * Instantiates a new CloudFlareVerifiedDetailsModel and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.cloudFlareVerifiedDetailsModel');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudFlareVerifiedDetailsModel
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudFlareVerifiedDetailsModel {
        return new CloudFlareVerifiedDetailsModel();
    }

    /**
     * Gets the enabledCustomRules property value. Collection of Cloudflare custom rules that are currently enabled for the zone or host.
     * @return array<CloudFlareRuleModel>|null
    */
    public function getEnabledCustomRules(): ?array {
        return $this->enabledCustomRules;
    }

    /**
     * Gets the enabledRecommendedRulesets property value. Collection of Cloudflare recommended rulesets that are enabled for the zone or host.
     * @return array<CloudFlareRulesetModel>|null
    */
    public function getEnabledRecommendedRulesets(): ?array {
        return $this->enabledRecommendedRulesets;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'enabledCustomRules' => fn(ParseNode $n) => $o->setEnabledCustomRules($n->getCollectionOfObjectValues([CloudFlareRuleModel::class, 'createFromDiscriminatorValue'])),
            'enabledRecommendedRulesets' => fn(ParseNode $n) => $o->setEnabledRecommendedRulesets($n->getCollectionOfObjectValues([CloudFlareRulesetModel::class, 'createFromDiscriminatorValue'])),
            'zoneId' => fn(ParseNode $n) => $o->setZoneId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the zoneId property value. Cloudflare-assigned identifier for the DNS zone associated with the verified host (for example, the Cloudflare Zone ID). This ID is used to correlate verification details with the Cloudflare account and to perform configuration operations via the provider's API.
     * @return string|null
    */
    public function getZoneId(): ?string {
        return $this->zoneId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('enabledCustomRules', $this->getEnabledCustomRules());
        $writer->writeCollectionOfObjectValues('enabledRecommendedRulesets', $this->getEnabledRecommendedRulesets());
        $writer->writeStringValue('zoneId', $this->getZoneId());
    }

    /**
     * Sets the enabledCustomRules property value. Collection of Cloudflare custom rules that are currently enabled for the zone or host.
     * @param array<CloudFlareRuleModel>|null $value Value to set for the enabledCustomRules property.
    */
    public function setEnabledCustomRules(?array $value): void {
        $this->enabledCustomRules = $value;
    }

    /**
     * Sets the enabledRecommendedRulesets property value. Collection of Cloudflare recommended rulesets that are enabled for the zone or host.
     * @param array<CloudFlareRulesetModel>|null $value Value to set for the enabledRecommendedRulesets property.
    */
    public function setEnabledRecommendedRulesets(?array $value): void {
        $this->enabledRecommendedRulesets = $value;
    }

    /**
     * Sets the zoneId property value. Cloudflare-assigned identifier for the DNS zone associated with the verified host (for example, the Cloudflare Zone ID). This ID is used to correlate verification details with the Cloudflare account and to perform configuration operations via the provider's API.
     * @param string|null $value Value to set for the zoneId property.
    */
    public function setZoneId(?string $value): void {
        $this->zoneId = $value;
    }

}
