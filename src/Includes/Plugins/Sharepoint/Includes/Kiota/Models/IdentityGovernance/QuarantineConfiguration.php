<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class QuarantineConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<QuarantineCondition>|null $conditions The set of threshold conditions evaluated for the workflow. Each condition is either a countBasedQuarantineCondition or a percentageBasedQuarantineCondition.
    */
    private ?array $conditions = null;
    
    /**
     * @var MatchMode|null $matchMode The matchMode property
    */
    private ?MatchMode $matchMode = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new QuarantineConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QuarantineConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QuarantineConfiguration {
        return new QuarantineConfiguration();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the conditions property value. The set of threshold conditions evaluated for the workflow. Each condition is either a countBasedQuarantineCondition or a percentageBasedQuarantineCondition.
     * @return array<QuarantineCondition>|null
    */
    public function getConditions(): ?array {
        return $this->conditions;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'conditions' => fn(ParseNode $n) => $o->setConditions($n->getCollectionOfObjectValues([QuarantineCondition::class, 'createFromDiscriminatorValue'])),
            'matchMode' => fn(ParseNode $n) => $o->setMatchMode($n->getEnumValue(MatchMode::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the matchMode property value. The matchMode property
     * @return MatchMode|null
    */
    public function getMatchMode(): ?MatchMode {
        return $this->matchMode;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('conditions', $this->getConditions());
        $writer->writeEnumValue('matchMode', $this->getMatchMode());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the conditions property value. The set of threshold conditions evaluated for the workflow. Each condition is either a countBasedQuarantineCondition or a percentageBasedQuarantineCondition.
     * @param array<QuarantineCondition>|null $value Value to set for the conditions property.
    */
    public function setConditions(?array $value): void {
        $this->conditions = $value;
    }

    /**
     * Sets the matchMode property value. The matchMode property
     * @param MatchMode|null $value Value to set for the matchMode property.
    */
    public function setMatchMode(?MatchMode $value): void {
        $this->matchMode = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
