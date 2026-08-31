<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CustomSecurityAttributeStringValueExemption extends CustomSecurityAttributeExemption implements Parsable 
{
    /**
     * @var string|null $value Value representing custom security attribute value to compare against while evaluating the exemption.
    */
    private ?string $value = null;
    
    /**
     * Instantiates a new CustomSecurityAttributeStringValueExemption and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.customSecurityAttributeStringValueExemption');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CustomSecurityAttributeStringValueExemption
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CustomSecurityAttributeStringValueExemption {
        return new CustomSecurityAttributeStringValueExemption();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'value' => fn(ParseNode $n) => $o->setValue($n->getStringValue()),
        ]);
    }

    /**
     * Gets the value property value. Value representing custom security attribute value to compare against while evaluating the exemption.
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
        parent::serialize($writer);
        $writer->writeStringValue('value', $this->getValue());
    }

    /**
     * Sets the value property value. Value representing custom security attribute value to compare against while evaluating the exemption.
     * @param string|null $value Value to set for the value property.
    */
    public function setValue(?string $value): void {
        $this->value = $value;
    }

}
