<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudFlareRulesetModel implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $name Friendly name for the ruleset, used in UIs and logs to help administrators identify the ruleset.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $phaseName Name of the phase during which the ruleset is evaluated (for example, httprequestfirewallmanaged, httprequestfirewallcustom, or provider-specific phase names). This indicates when in the request/response lifecycle the rules apply.
    */
    private ?string $phaseName = null;
    
    /**
     * @var string|null $rulesetId Unique identifier assigned to the ruleset by Cloudflare or the integration.
    */
    private ?string $rulesetId = null;
    
    /**
     * Instantiates a new CloudFlareRulesetModel and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudFlareRulesetModel
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudFlareRulesetModel {
        return new CloudFlareRulesetModel();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'phaseName' => fn(ParseNode $n) => $o->setPhaseName($n->getStringValue()),
            'rulesetId' => fn(ParseNode $n) => $o->setRulesetId($n->getStringValue()),
        ];
    }

    /**
     * Gets the name property value. Friendly name for the ruleset, used in UIs and logs to help administrators identify the ruleset.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the phaseName property value. Name of the phase during which the ruleset is evaluated (for example, httprequestfirewallmanaged, httprequestfirewallcustom, or provider-specific phase names). This indicates when in the request/response lifecycle the rules apply.
     * @return string|null
    */
    public function getPhaseName(): ?string {
        return $this->phaseName;
    }

    /**
     * Gets the rulesetId property value. Unique identifier assigned to the ruleset by Cloudflare or the integration.
     * @return string|null
    */
    public function getRulesetId(): ?string {
        return $this->rulesetId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('phaseName', $this->getPhaseName());
        $writer->writeStringValue('rulesetId', $this->getRulesetId());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the name property value. Friendly name for the ruleset, used in UIs and logs to help administrators identify the ruleset.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the phaseName property value. Name of the phase during which the ruleset is evaluated (for example, httprequestfirewallmanaged, httprequestfirewallcustom, or provider-specific phase names). This indicates when in the request/response lifecycle the rules apply.
     * @param string|null $value Value to set for the phaseName property.
    */
    public function setPhaseName(?string $value): void {
        $this->phaseName = $value;
    }

    /**
     * Sets the rulesetId property value. Unique identifier assigned to the ruleset by Cloudflare or the integration.
     * @param string|null $value Value to set for the rulesetId property.
    */
    public function setRulesetId(?string $value): void {
        $this->rulesetId = $value;
    }

}
