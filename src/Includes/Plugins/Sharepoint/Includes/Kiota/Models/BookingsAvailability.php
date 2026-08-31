<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BookingsAvailability implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var BookingsServiceAvailabilityType|null $availabilityType The availabilityType property
    */
    private ?BookingsServiceAvailabilityType $availabilityType = null;
    
    /**
     * @var array<BookingWorkHours>|null $businessHours The hours of operation in a week. The business hours value is set to null if the availability type isn't customWeeklyHours.
    */
    private ?array $businessHours = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new BookingsAvailability and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BookingsAvailability
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BookingsAvailability {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.bookingsAvailabilityWindow': return new BookingsAvailabilityWindow();
            }
        }
        return new BookingsAvailability();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the availabilityType property value. The availabilityType property
     * @return BookingsServiceAvailabilityType|null
    */
    public function getAvailabilityType(): ?BookingsServiceAvailabilityType {
        return $this->availabilityType;
    }

    /**
     * Gets the businessHours property value. The hours of operation in a week. The business hours value is set to null if the availability type isn't customWeeklyHours.
     * @return array<BookingWorkHours>|null
    */
    public function getBusinessHours(): ?array {
        return $this->businessHours;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'availabilityType' => fn(ParseNode $n) => $o->setAvailabilityType($n->getEnumValue(BookingsServiceAvailabilityType::class)),
            'businessHours' => fn(ParseNode $n) => $o->setBusinessHours($n->getCollectionOfObjectValues([BookingWorkHours::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('availabilityType', $this->getAvailabilityType());
        $writer->writeCollectionOfObjectValues('businessHours', $this->getBusinessHours());
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
     * Sets the availabilityType property value. The availabilityType property
     * @param BookingsServiceAvailabilityType|null $value Value to set for the availabilityType property.
    */
    public function setAvailabilityType(?BookingsServiceAvailabilityType $value): void {
        $this->availabilityType = $value;
    }

    /**
     * Sets the businessHours property value. The hours of operation in a week. The business hours value is set to null if the availability type isn't customWeeklyHours.
     * @param array<BookingWorkHours>|null $value Value to set for the businessHours property.
    */
    public function setBusinessHours(?array $value): void {
        $this->businessHours = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
