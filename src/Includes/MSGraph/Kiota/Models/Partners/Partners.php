<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Partners;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;
use MSPress\Includes\MSGraph\Kiota\Models\Partners\Billing\Billing;

class Partners extends Entity implements Parsable 
{
    /**
     * @var Billing|null $billing Represents billing details for billed and unbilled data.
    */
    private ?Billing $billing = null;
    
    /**
     * Instantiates a new Partners and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Partners
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Partners {
        return new Partners();
    }

    /**
     * Gets the billing property value. Represents billing details for billed and unbilled data.
     * @return Billing|null
    */
    public function getBilling(): ?Billing {
        return $this->billing;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'billing' => fn(ParseNode $n) => $o->setBilling($n->getObjectValue([Billing::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('billing', $this->getBilling());
    }

    /**
     * Sets the billing property value. Represents billing details for billed and unbilled data.
     * @param Billing|null $value Value to set for the billing property.
    */
    public function setBilling(?Billing $value): void {
        $this->billing = $value;
    }

}
