<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class TicketInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $ticketNumber The ticket number.
    */
    private ?string $ticketNumber = null;
    
    /**
     * @var string|null $ticketSystem The description of the ticket system.
    */
    private ?string $ticketSystem = null;
    
    /**
     * Instantiates a new TicketInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TicketInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TicketInfo {
        return new TicketInfo();
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
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'ticketNumber' => fn(ParseNode $n) => $o->setTicketNumber($n->getStringValue()),
            'ticketSystem' => fn(ParseNode $n) => $o->setTicketSystem($n->getStringValue()),
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
     * Gets the ticketNumber property value. The ticket number.
     * @return string|null
    */
    public function getTicketNumber(): ?string {
        return $this->ticketNumber;
    }

    /**
     * Gets the ticketSystem property value. The description of the ticket system.
     * @return string|null
    */
    public function getTicketSystem(): ?string {
        return $this->ticketSystem;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('ticketNumber', $this->getTicketNumber());
        $writer->writeStringValue('ticketSystem', $this->getTicketSystem());
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
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the ticketNumber property value. The ticket number.
     * @param string|null $value Value to set for the ticketNumber property.
    */
    public function setTicketNumber(?string $value): void {
        $this->ticketNumber = $value;
    }

    /**
     * Sets the ticketSystem property value. The description of the ticket system.
     * @param string|null $value Value to set for the ticketSystem property.
    */
    public function setTicketSystem(?string $value): void {
        $this->ticketSystem = $value;
    }

}
