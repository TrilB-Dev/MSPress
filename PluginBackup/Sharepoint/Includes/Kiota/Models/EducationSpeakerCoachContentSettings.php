<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationSpeakerCoachContentSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $isInclusivenessEnabled Indicates whether the student should receive feedback on their inclusiveness from the Speaker Coach.
    */
    private ?bool $isInclusivenessEnabled = null;
    
    /**
     * @var bool|null $isRepetitiveLanguageEnabled Indicates whether the student should receive feedback on their repetitive language from the Speaker Coach.
    */
    private ?bool $isRepetitiveLanguageEnabled = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new EducationSpeakerCoachContentSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationSpeakerCoachContentSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationSpeakerCoachContentSettings {
        return new EducationSpeakerCoachContentSettings();
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
            'isInclusivenessEnabled' => fn(ParseNode $n) => $o->setIsInclusivenessEnabled($n->getBooleanValue()),
            'isRepetitiveLanguageEnabled' => fn(ParseNode $n) => $o->setIsRepetitiveLanguageEnabled($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isInclusivenessEnabled property value. Indicates whether the student should receive feedback on their inclusiveness from the Speaker Coach.
     * @return bool|null
    */
    public function getIsInclusivenessEnabled(): ?bool {
        return $this->isInclusivenessEnabled;
    }

    /**
     * Gets the isRepetitiveLanguageEnabled property value. Indicates whether the student should receive feedback on their repetitive language from the Speaker Coach.
     * @return bool|null
    */
    public function getIsRepetitiveLanguageEnabled(): ?bool {
        return $this->isRepetitiveLanguageEnabled;
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
        $writer->writeBooleanValue('isInclusivenessEnabled', $this->getIsInclusivenessEnabled());
        $writer->writeBooleanValue('isRepetitiveLanguageEnabled', $this->getIsRepetitiveLanguageEnabled());
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
     * Sets the isInclusivenessEnabled property value. Indicates whether the student should receive feedback on their inclusiveness from the Speaker Coach.
     * @param bool|null $value Value to set for the isInclusivenessEnabled property.
    */
    public function setIsInclusivenessEnabled(?bool $value): void {
        $this->isInclusivenessEnabled = $value;
    }

    /**
     * Sets the isRepetitiveLanguageEnabled property value. Indicates whether the student should receive feedback on their repetitive language from the Speaker Coach.
     * @param bool|null $value Value to set for the isRepetitiveLanguageEnabled property.
    */
    public function setIsRepetitiveLanguageEnabled(?bool $value): void {
        $this->isRepetitiveLanguageEnabled = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
