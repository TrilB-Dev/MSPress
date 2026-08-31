<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationAiFeedbackContentSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $isMessageClarityEnabled Indicates whether the student should receive feedback on their message clarity from the AI feedback.
    */
    private ?bool $isMessageClarityEnabled = null;
    
    /**
     * @var bool|null $isQualityOfInformationEnabled Indicates whether the student should receive feedback on their quality of information from the AI feedback.
    */
    private ?bool $isQualityOfInformationEnabled = null;
    
    /**
     * @var bool|null $isSpeechOrganizationEnabled Indicates whether the student should receive feedback on their speech organization from the AI feedback.
    */
    private ?bool $isSpeechOrganizationEnabled = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new EducationAiFeedbackContentSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationAiFeedbackContentSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationAiFeedbackContentSettings {
        return new EducationAiFeedbackContentSettings();
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
            'isMessageClarityEnabled' => fn(ParseNode $n) => $o->setIsMessageClarityEnabled($n->getBooleanValue()),
            'isQualityOfInformationEnabled' => fn(ParseNode $n) => $o->setIsQualityOfInformationEnabled($n->getBooleanValue()),
            'isSpeechOrganizationEnabled' => fn(ParseNode $n) => $o->setIsSpeechOrganizationEnabled($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isMessageClarityEnabled property value. Indicates whether the student should receive feedback on their message clarity from the AI feedback.
     * @return bool|null
    */
    public function getIsMessageClarityEnabled(): ?bool {
        return $this->isMessageClarityEnabled;
    }

    /**
     * Gets the isQualityOfInformationEnabled property value. Indicates whether the student should receive feedback on their quality of information from the AI feedback.
     * @return bool|null
    */
    public function getIsQualityOfInformationEnabled(): ?bool {
        return $this->isQualityOfInformationEnabled;
    }

    /**
     * Gets the isSpeechOrganizationEnabled property value. Indicates whether the student should receive feedback on their speech organization from the AI feedback.
     * @return bool|null
    */
    public function getIsSpeechOrganizationEnabled(): ?bool {
        return $this->isSpeechOrganizationEnabled;
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
        $writer->writeBooleanValue('isMessageClarityEnabled', $this->getIsMessageClarityEnabled());
        $writer->writeBooleanValue('isQualityOfInformationEnabled', $this->getIsQualityOfInformationEnabled());
        $writer->writeBooleanValue('isSpeechOrganizationEnabled', $this->getIsSpeechOrganizationEnabled());
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
     * Sets the isMessageClarityEnabled property value. Indicates whether the student should receive feedback on their message clarity from the AI feedback.
     * @param bool|null $value Value to set for the isMessageClarityEnabled property.
    */
    public function setIsMessageClarityEnabled(?bool $value): void {
        $this->isMessageClarityEnabled = $value;
    }

    /**
     * Sets the isQualityOfInformationEnabled property value. Indicates whether the student should receive feedback on their quality of information from the AI feedback.
     * @param bool|null $value Value to set for the isQualityOfInformationEnabled property.
    */
    public function setIsQualityOfInformationEnabled(?bool $value): void {
        $this->isQualityOfInformationEnabled = $value;
    }

    /**
     * Sets the isSpeechOrganizationEnabled property value. Indicates whether the student should receive feedback on their speech organization from the AI feedback.
     * @param bool|null $value Value to set for the isSpeechOrganizationEnabled property.
    */
    public function setIsSpeechOrganizationEnabled(?bool $value): void {
        $this->isSpeechOrganizationEnabled = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
