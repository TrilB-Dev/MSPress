<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationAiFeedbackDeliverySettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $areRhetoricalTechniquesEnabled Indicates whether the student should receive feedback on their rhetorical techniques from the AI feedback.
    */
    private ?bool $areRhetoricalTechniquesEnabled = null;
    
    /**
     * @var bool|null $isLanguageUseEnabled Indicates whether the student should receive feedback on their language use from the AI feedback.
    */
    private ?bool $isLanguageUseEnabled = null;
    
    /**
     * @var bool|null $isStyleEnabled Indicates whether the student should receive feedback on their style from the AI feedback.
    */
    private ?bool $isStyleEnabled = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new EducationAiFeedbackDeliverySettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationAiFeedbackDeliverySettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationAiFeedbackDeliverySettings {
        return new EducationAiFeedbackDeliverySettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the areRhetoricalTechniquesEnabled property value. Indicates whether the student should receive feedback on their rhetorical techniques from the AI feedback.
     * @return bool|null
    */
    public function getAreRhetoricalTechniquesEnabled(): ?bool {
        return $this->areRhetoricalTechniquesEnabled;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'areRhetoricalTechniquesEnabled' => fn(ParseNode $n) => $o->setAreRhetoricalTechniquesEnabled($n->getBooleanValue()),
            'isLanguageUseEnabled' => fn(ParseNode $n) => $o->setIsLanguageUseEnabled($n->getBooleanValue()),
            'isStyleEnabled' => fn(ParseNode $n) => $o->setIsStyleEnabled($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isLanguageUseEnabled property value. Indicates whether the student should receive feedback on their language use from the AI feedback.
     * @return bool|null
    */
    public function getIsLanguageUseEnabled(): ?bool {
        return $this->isLanguageUseEnabled;
    }

    /**
     * Gets the isStyleEnabled property value. Indicates whether the student should receive feedback on their style from the AI feedback.
     * @return bool|null
    */
    public function getIsStyleEnabled(): ?bool {
        return $this->isStyleEnabled;
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
        $writer->writeBooleanValue('areRhetoricalTechniquesEnabled', $this->getAreRhetoricalTechniquesEnabled());
        $writer->writeBooleanValue('isLanguageUseEnabled', $this->getIsLanguageUseEnabled());
        $writer->writeBooleanValue('isStyleEnabled', $this->getIsStyleEnabled());
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
     * Sets the areRhetoricalTechniquesEnabled property value. Indicates whether the student should receive feedback on their rhetorical techniques from the AI feedback.
     * @param bool|null $value Value to set for the areRhetoricalTechniquesEnabled property.
    */
    public function setAreRhetoricalTechniquesEnabled(?bool $value): void {
        $this->areRhetoricalTechniquesEnabled = $value;
    }

    /**
     * Sets the isLanguageUseEnabled property value. Indicates whether the student should receive feedback on their language use from the AI feedback.
     * @param bool|null $value Value to set for the isLanguageUseEnabled property.
    */
    public function setIsLanguageUseEnabled(?bool $value): void {
        $this->isLanguageUseEnabled = $value;
    }

    /**
     * Sets the isStyleEnabled property value. Indicates whether the student should receive feedback on their style from the AI feedback.
     * @param bool|null $value Value to set for the isStyleEnabled property.
    */
    public function setIsStyleEnabled(?bool $value): void {
        $this->isStyleEnabled = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
