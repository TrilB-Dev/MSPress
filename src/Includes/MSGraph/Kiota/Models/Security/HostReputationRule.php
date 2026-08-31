<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class HostReputationRule implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $description The description of the rule that gives more context.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $name The name of the rule.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $relatedDetailsUrl Link to a web page with details related to this rule.
    */
    private ?string $relatedDetailsUrl = null;
    
    /**
     * @var HostReputationRuleSeverity|null $severity The severity property
    */
    private ?HostReputationRuleSeverity $severity = null;
    
    /**
     * Instantiates a new HostReputationRule and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return HostReputationRule
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): HostReputationRule {
        return new HostReputationRule();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the description property value. The description of the rule that gives more context.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'relatedDetailsUrl' => fn(ParseNode $n) => $o->setRelatedDetailsUrl($n->getStringValue()),
            'severity' => fn(ParseNode $n) => $o->setSeverity($n->getEnumValue(HostReputationRuleSeverity::class)),
        ];
    }

    /**
     * Gets the name property value. The name of the rule.
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
     * Gets the relatedDetailsUrl property value. Link to a web page with details related to this rule.
     * @return string|null
    */
    public function getRelatedDetailsUrl(): ?string {
        return $this->relatedDetailsUrl;
    }

    /**
     * Gets the severity property value. The severity property
     * @return HostReputationRuleSeverity|null
    */
    public function getSeverity(): ?HostReputationRuleSeverity {
        return $this->severity;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('relatedDetailsUrl', $this->getRelatedDetailsUrl());
        $writer->writeEnumValue('severity', $this->getSeverity());
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
     * Sets the description property value. The description of the rule that gives more context.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the name property value. The name of the rule.
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
     * Sets the relatedDetailsUrl property value. Link to a web page with details related to this rule.
     * @param string|null $value Value to set for the relatedDetailsUrl property.
    */
    public function setRelatedDetailsUrl(?string $value): void {
        $this->relatedDetailsUrl = $value;
    }

    /**
     * Sets the severity property value. The severity property
     * @param HostReputationRuleSeverity|null $value Value to set for the severity property.
    */
    public function setSeverity(?HostReputationRuleSeverity $value): void {
        $this->severity = $value;
    }

}
