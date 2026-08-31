<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UnavailablePlaceMode extends PlaceMode implements Parsable 
{
    /**
     * @var string|null $reason The reason a place is marked unavailable.
    */
    private ?string $reason = null;
    
    /**
     * Instantiates a new UnavailablePlaceMode and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.unavailablePlaceMode');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UnavailablePlaceMode
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UnavailablePlaceMode {
        return new UnavailablePlaceMode();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'reason' => fn(ParseNode $n) => $o->setReason($n->getStringValue()),
        ]);
    }

    /**
     * Gets the reason property value. The reason a place is marked unavailable.
     * @return string|null
    */
    public function getReason(): ?string {
        return $this->reason;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('reason', $this->getReason());
    }

    /**
     * Sets the reason property value. The reason a place is marked unavailable.
     * @param string|null $value Value to set for the reason property.
    */
    public function setReason(?string $value): void {
        $this->reason = $value;
    }

}
