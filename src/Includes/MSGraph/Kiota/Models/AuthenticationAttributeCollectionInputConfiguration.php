<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AuthenticationAttributeCollectionInputConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $attribute The built-in or custom attribute for which a value is being collected.
    */
    private ?string $attribute = null;
    
    /**
     * @var string|null $defaultValue The default value of the attribute displayed to the end user. The capability to set the default value isn't available through the Microsoft Entra admin center.
    */
    private ?string $defaultValue = null;
    
    /**
     * @var bool|null $editable Defines whether the attribute is editable by the end user.
    */
    private ?bool $editable = null;
    
    /**
     * @var bool|null $hidden Defines whether the attribute is displayed to the end user. The capability to hide isn't available through the Microsoft Entra admin center.
    */
    private ?bool $hidden = null;
    
    /**
     * @var AuthenticationAttributeCollectionInputType|null $inputType The inputType property
    */
    private ?AuthenticationAttributeCollectionInputType $inputType = null;
    
    /**
     * @var string|null $label The label of the attribute field that's displayed to end user, unless overridden.
    */
    private ?string $label = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<AuthenticationAttributeCollectionOptionConfiguration>|null $options The option values for certain multiple-option input types.
    */
    private ?array $options = null;
    
    /**
     * @var bool|null $required Defines whether the field is required.
    */
    private ?bool $required = null;
    
    /**
     * @var string|null $validationRegEx The regex for the value of the field. For more information about the supported regexes, see validationRegEx values for inputType objects. To understand how to specify regexes, see the Regular expressions cheat sheet.
    */
    private ?string $validationRegEx = null;
    
    /**
     * @var bool|null $writeToDirectory Defines whether Microsoft Entra ID stores the value that it collects.
    */
    private ?bool $writeToDirectory = null;
    
    /**
     * Instantiates a new AuthenticationAttributeCollectionInputConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AuthenticationAttributeCollectionInputConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AuthenticationAttributeCollectionInputConfiguration {
        return new AuthenticationAttributeCollectionInputConfiguration();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attribute property value. The built-in or custom attribute for which a value is being collected.
     * @return string|null
    */
    public function getAttribute(): ?string {
        return $this->attribute;
    }

    /**
     * Gets the defaultValue property value. The default value of the attribute displayed to the end user. The capability to set the default value isn't available through the Microsoft Entra admin center.
     * @return string|null
    */
    public function getDefaultValue(): ?string {
        return $this->defaultValue;
    }

    /**
     * Gets the editable property value. Defines whether the attribute is editable by the end user.
     * @return bool|null
    */
    public function getEditable(): ?bool {
        return $this->editable;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'attribute' => fn(ParseNode $n) => $o->setAttribute($n->getStringValue()),
            'defaultValue' => fn(ParseNode $n) => $o->setDefaultValue($n->getStringValue()),
            'editable' => fn(ParseNode $n) => $o->setEditable($n->getBooleanValue()),
            'hidden' => fn(ParseNode $n) => $o->setHidden($n->getBooleanValue()),
            'inputType' => fn(ParseNode $n) => $o->setInputType($n->getEnumValue(AuthenticationAttributeCollectionInputType::class)),
            'label' => fn(ParseNode $n) => $o->setLabel($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'options' => fn(ParseNode $n) => $o->setOptions($n->getCollectionOfObjectValues([AuthenticationAttributeCollectionOptionConfiguration::class, 'createFromDiscriminatorValue'])),
            'required' => fn(ParseNode $n) => $o->setRequired($n->getBooleanValue()),
            'validationRegEx' => fn(ParseNode $n) => $o->setValidationRegEx($n->getStringValue()),
            'writeToDirectory' => fn(ParseNode $n) => $o->setWriteToDirectory($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the hidden property value. Defines whether the attribute is displayed to the end user. The capability to hide isn't available through the Microsoft Entra admin center.
     * @return bool|null
    */
    public function getHidden(): ?bool {
        return $this->hidden;
    }

    /**
     * Gets the inputType property value. The inputType property
     * @return AuthenticationAttributeCollectionInputType|null
    */
    public function getInputType(): ?AuthenticationAttributeCollectionInputType {
        return $this->inputType;
    }

    /**
     * Gets the label property value. The label of the attribute field that's displayed to end user, unless overridden.
     * @return string|null
    */
    public function getLabel(): ?string {
        return $this->label;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the options property value. The option values for certain multiple-option input types.
     * @return array<AuthenticationAttributeCollectionOptionConfiguration>|null
    */
    public function getOptions(): ?array {
        return $this->options;
    }

    /**
     * Gets the required property value. Defines whether the field is required.
     * @return bool|null
    */
    public function getRequired(): ?bool {
        return $this->required;
    }

    /**
     * Gets the validationRegEx property value. The regex for the value of the field. For more information about the supported regexes, see validationRegEx values for inputType objects. To understand how to specify regexes, see the Regular expressions cheat sheet.
     * @return string|null
    */
    public function getValidationRegEx(): ?string {
        return $this->validationRegEx;
    }

    /**
     * Gets the writeToDirectory property value. Defines whether Microsoft Entra ID stores the value that it collects.
     * @return bool|null
    */
    public function getWriteToDirectory(): ?bool {
        return $this->writeToDirectory;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('attribute', $this->getAttribute());
        $writer->writeStringValue('defaultValue', $this->getDefaultValue());
        $writer->writeBooleanValue('editable', $this->getEditable());
        $writer->writeBooleanValue('hidden', $this->getHidden());
        $writer->writeEnumValue('inputType', $this->getInputType());
        $writer->writeStringValue('label', $this->getLabel());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfObjectValues('options', $this->getOptions());
        $writer->writeBooleanValue('required', $this->getRequired());
        $writer->writeStringValue('validationRegEx', $this->getValidationRegEx());
        $writer->writeBooleanValue('writeToDirectory', $this->getWriteToDirectory());
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
     * Sets the attribute property value. The built-in or custom attribute for which a value is being collected.
     * @param string|null $value Value to set for the attribute property.
    */
    public function setAttribute(?string $value): void {
        $this->attribute = $value;
    }

    /**
     * Sets the defaultValue property value. The default value of the attribute displayed to the end user. The capability to set the default value isn't available through the Microsoft Entra admin center.
     * @param string|null $value Value to set for the defaultValue property.
    */
    public function setDefaultValue(?string $value): void {
        $this->defaultValue = $value;
    }

    /**
     * Sets the editable property value. Defines whether the attribute is editable by the end user.
     * @param bool|null $value Value to set for the editable property.
    */
    public function setEditable(?bool $value): void {
        $this->editable = $value;
    }

    /**
     * Sets the hidden property value. Defines whether the attribute is displayed to the end user. The capability to hide isn't available through the Microsoft Entra admin center.
     * @param bool|null $value Value to set for the hidden property.
    */
    public function setHidden(?bool $value): void {
        $this->hidden = $value;
    }

    /**
     * Sets the inputType property value. The inputType property
     * @param AuthenticationAttributeCollectionInputType|null $value Value to set for the inputType property.
    */
    public function setInputType(?AuthenticationAttributeCollectionInputType $value): void {
        $this->inputType = $value;
    }

    /**
     * Sets the label property value. The label of the attribute field that's displayed to end user, unless overridden.
     * @param string|null $value Value to set for the label property.
    */
    public function setLabel(?string $value): void {
        $this->label = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the options property value. The option values for certain multiple-option input types.
     * @param array<AuthenticationAttributeCollectionOptionConfiguration>|null $value Value to set for the options property.
    */
    public function setOptions(?array $value): void {
        $this->options = $value;
    }

    /**
     * Sets the required property value. Defines whether the field is required.
     * @param bool|null $value Value to set for the required property.
    */
    public function setRequired(?bool $value): void {
        $this->required = $value;
    }

    /**
     * Sets the validationRegEx property value. The regex for the value of the field. For more information about the supported regexes, see validationRegEx values for inputType objects. To understand how to specify regexes, see the Regular expressions cheat sheet.
     * @param string|null $value Value to set for the validationRegEx property.
    */
    public function setValidationRegEx(?string $value): void {
        $this->validationRegEx = $value;
    }

    /**
     * Sets the writeToDirectory property value. Defines whether Microsoft Entra ID stores the value that it collects.
     * @param bool|null $value Value to set for the writeToDirectory property.
    */
    public function setWriteToDirectory(?bool $value): void {
        $this->writeToDirectory = $value;
    }

}
