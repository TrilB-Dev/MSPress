<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationAiFeedbackAudienceEngagementSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $areEngagementStrategiesEnabled Indicates whether the student should receive feedback on their engagement strategies from the AI feedback.
    */
    private ?bool $areEngagementStrategiesEnabled = null;
    
    /**
     * @var bool|null $isCallToActionEnabled Indicates whether the student should receive feedback on their call to action from the AI feedback.
    */
    private ?bool $isCallToActionEnabled = null;
    
    /**
     * @var bool|null $isEmotionalAndIntellectualAppealEnabled Indicates whether the student should receive feedback on their emotional and intellectual appeal from the AI feedback.
    */
    private ?bool $isEmotionalAndIntellectualAppealEnabled = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new EducationAiFeedbackAudienceEngagementSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationAiFeedbackAudienceEngagementSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationAiFeedbackAudienceEngagementSettings {
        return new EducationAiFeedbackAudienceEngagementSettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the areEngagementStrategiesEnabled property value. Indicates whether the student should receive feedback on their engagement strategies from the AI feedback.
     * @return bool|null
    */
    public function getAreEngagementStrategiesEnabled(): ?bool {
        return $this->areEngagementStrategiesEnabled;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'areEngagementStrategiesEnabled' => fn(ParseNode $n) => $o->setAreEngagementStrategiesEnabled($n->getBooleanValue()),
            'isCallToActionEnabled' => fn(ParseNode $n) => $o->setIsCallToActionEnabled($n->getBooleanValue()),
            'isEmotionalAndIntellectualAppealEnabled' => fn(ParseNode $n) => $o->setIsEmotionalAndIntellectualAppealEnabled($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isCallToActionEnabled property value. Indicates whether the student should receive feedback on their call to action from the AI feedback.
     * @return bool|null
    */
    public function getIsCallToActionEnabled(): ?bool {
        return $this->isCallToActionEnabled;
    }

    /**
     * Gets the isEmotionalAndIntellectualAppealEnabled property value. Indicates whether the student should receive feedback on their emotional and intellectual appeal from the AI feedback.
     * @return bool|null
    */
    public function getIsEmotionalAndIntellectualAppealEnabled(): ?bool {
        return $this->isEmotionalAndIntellectualAppealEnabled;
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
        $writer->writeBooleanValue('areEngagementStrategiesEnabled', $this->getAreEngagementStrategiesEnabled());
        $writer->writeBooleanValue('isCallToActionEnabled', $this->getIsCallToActionEnabled());
        $writer->writeBooleanValue('isEmotionalAndIntellectualAppealEnabled', $this->getIsEmotionalAndIntellectualAppealEnabled());
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
     * Sets the areEngagementStrategiesEnabled property value. Indicates whether the student should receive feedback on their engagement strategies from the AI feedback.
     * @param bool|null $value Value to set for the areEngagementStrategiesEnabled property.
    */
    public function setAreEngagementStrategiesEnabled(?bool $value): void {
        $this->areEngagementStrategiesEnabled = $value;
    }

    /**
     * Sets the isCallToActionEnabled property value. Indicates whether the student should receive feedback on their call to action from the AI feedback.
     * @param bool|null $value Value to set for the isCallToActionEnabled property.
    */
    public function setIsCallToActionEnabled(?bool $value): void {
        $this->isCallToActionEnabled = $value;
    }

    /**
     * Sets the isEmotionalAndIntellectualAppealEnabled property value. Indicates whether the student should receive feedback on their emotional and intellectual appeal from the AI feedback.
     * @param bool|null $value Value to set for the isEmotionalAndIntellectualAppealEnabled property.
    */
    public function setIsEmotionalAndIntellectualAppealEnabled(?bool $value): void {
        $this->isEmotionalAndIntellectualAppealEnabled = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
