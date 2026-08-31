<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class VirtualEventRegistrationQuestionAnswer implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $booleanValue Boolean answer of the virtual event registration question. Only appears when answerInputType is boolean.
    */
    private ?bool $booleanValue = null;
    
    /**
     * @var string|null $displayName Display name of the registration question.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<string>|null $multiChoiceValues Collection of text answer of the virtual event registration question. Only appears when answerInputType is multiChoice.
    */
    private ?array $multiChoiceValues = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $questionId id of the virtual event registration question.
    */
    private ?string $questionId = null;
    
    /**
     * @var string|null $value Text answer of the virtual event registration question. Appears when answerInputType is text, multilineText or singleChoice.
    */
    private ?string $value = null;
    
    /**
     * Instantiates a new VirtualEventRegistrationQuestionAnswer and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEventRegistrationQuestionAnswer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEventRegistrationQuestionAnswer {
        return new VirtualEventRegistrationQuestionAnswer();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the booleanValue property value. Boolean answer of the virtual event registration question. Only appears when answerInputType is boolean.
     * @return bool|null
    */
    public function getBooleanValue(): ?bool {
        return $this->booleanValue;
    }

    /**
     * Gets the displayName property value. Display name of the registration question.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'booleanValue' => fn(ParseNode $n) => $o->setBooleanValue($n->getBooleanValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'multiChoiceValues' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setMultiChoiceValues($val);
            },
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'questionId' => fn(ParseNode $n) => $o->setQuestionId($n->getStringValue()),
            'value' => fn(ParseNode $n) => $o->setValue($n->getStringValue()),
        ];
    }

    /**
     * Gets the multiChoiceValues property value. Collection of text answer of the virtual event registration question. Only appears when answerInputType is multiChoice.
     * @return array<string>|null
    */
    public function getMultiChoiceValues(): ?array {
        return $this->multiChoiceValues;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the questionId property value. id of the virtual event registration question.
     * @return string|null
    */
    public function getQuestionId(): ?string {
        return $this->questionId;
    }

    /**
     * Gets the value property value. Text answer of the virtual event registration question. Appears when answerInputType is text, multilineText or singleChoice.
     * @return string|null
    */
    public function getValue(): ?string {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('booleanValue', $this->getBooleanValue());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfPrimitiveValues('multiChoiceValues', $this->getMultiChoiceValues());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('questionId', $this->getQuestionId());
        $writer->writeStringValue('value', $this->getValue());
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
     * Sets the booleanValue property value. Boolean answer of the virtual event registration question. Only appears when answerInputType is boolean.
     * @param bool|null $value Value to set for the booleanValue property.
    */
    public function setBooleanValue(?bool $value): void {
        $this->booleanValue = $value;
    }

    /**
     * Sets the displayName property value. Display name of the registration question.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the multiChoiceValues property value. Collection of text answer of the virtual event registration question. Only appears when answerInputType is multiChoice.
     * @param array<string>|null $value Value to set for the multiChoiceValues property.
    */
    public function setMultiChoiceValues(?array $value): void {
        $this->multiChoiceValues = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the questionId property value. id of the virtual event registration question.
     * @param string|null $value Value to set for the questionId property.
    */
    public function setQuestionId(?string $value): void {
        $this->questionId = $value;
    }

    /**
     * Sets the value property value. Text answer of the virtual event registration question. Appears when answerInputType is text, multilineText or singleChoice.
     * @param string|null $value Value to set for the value property.
    */
    public function setValue(?string $value): void {
        $this->value = $value;
    }

}
