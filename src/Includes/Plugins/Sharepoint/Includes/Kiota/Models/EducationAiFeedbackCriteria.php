<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationAiFeedbackCriteria implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var EducationAiFeedbackSettings|null $aiFeedbackSettings The aiFeedbackSettings property
    */
    private ?EducationAiFeedbackSettings $aiFeedbackSettings = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var EducationSpeechType|null $speechType The speechType property
    */
    private ?EducationSpeechType $speechType = null;
    
    /**
     * Instantiates a new EducationAiFeedbackCriteria and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationAiFeedbackCriteria
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationAiFeedbackCriteria {
        return new EducationAiFeedbackCriteria();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the aiFeedbackSettings property value. The aiFeedbackSettings property
     * @return EducationAiFeedbackSettings|null
    */
    public function getAiFeedbackSettings(): ?EducationAiFeedbackSettings {
        return $this->aiFeedbackSettings;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'aiFeedbackSettings' => fn(ParseNode $n) => $o->setAiFeedbackSettings($n->getObjectValue([EducationAiFeedbackSettings::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'speechType' => fn(ParseNode $n) => $o->setSpeechType($n->getEnumValue(EducationSpeechType::class)),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the speechType property value. The speechType property
     * @return EducationSpeechType|null
    */
    public function getSpeechType(): ?EducationSpeechType {
        return $this->speechType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('aiFeedbackSettings', $this->getAiFeedbackSettings());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('speechType', $this->getSpeechType());
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
     * Sets the aiFeedbackSettings property value. The aiFeedbackSettings property
     * @param EducationAiFeedbackSettings|null $value Value to set for the aiFeedbackSettings property.
    */
    public function setAiFeedbackSettings(?EducationAiFeedbackSettings $value): void {
        $this->aiFeedbackSettings = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the speechType property value. The speechType property
     * @param EducationSpeechType|null $value Value to set for the speechType property.
    */
    public function setSpeechType(?EducationSpeechType $value): void {
        $this->speechType = $value;
    }

}
