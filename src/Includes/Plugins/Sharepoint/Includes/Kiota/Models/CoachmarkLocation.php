<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CoachmarkLocation implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $length Length of coachmark.
    */
    private ?int $length = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var int|null $offset Offset of coachmark.
    */
    private ?int $offset = null;
    
    /**
     * @var CoachmarkLocationType|null $type Type of coachmark location. The possible values are: unknown, fromEmail, subject, externalTag, displayName, messageBody, unknownFutureValue.
    */
    private ?CoachmarkLocationType $type = null;
    
    /**
     * Instantiates a new CoachmarkLocation and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CoachmarkLocation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CoachmarkLocation {
        return new CoachmarkLocation();
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
            'length' => fn(ParseNode $n) => $o->setLength($n->getIntegerValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'offset' => fn(ParseNode $n) => $o->setOffset($n->getIntegerValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CoachmarkLocationType::class)),
        ];
    }

    /**
     * Gets the length property value. Length of coachmark.
     * @return int|null
    */
    public function getLength(): ?int {
        return $this->length;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the offset property value. Offset of coachmark.
     * @return int|null
    */
    public function getOffset(): ?int {
        return $this->offset;
    }

    /**
     * Gets the type property value. Type of coachmark location. The possible values are: unknown, fromEmail, subject, externalTag, displayName, messageBody, unknownFutureValue.
     * @return CoachmarkLocationType|null
    */
    public function getType(): ?CoachmarkLocationType {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('length', $this->getLength());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeIntegerValue('offset', $this->getOffset());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the length property value. Length of coachmark.
     * @param int|null $value Value to set for the length property.
    */
    public function setLength(?int $value): void {
        $this->length = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the offset property value. Offset of coachmark.
     * @param int|null $value Value to set for the offset property.
    */
    public function setOffset(?int $value): void {
        $this->offset = $value;
    }

    /**
     * Sets the type property value. Type of coachmark location. The possible values are: unknown, fromEmail, subject, externalTag, displayName, messageBody, unknownFutureValue.
     * @param CoachmarkLocationType|null $value Value to set for the type property.
    */
    public function setType(?CoachmarkLocationType $value): void {
        $this->type = $value;
    }

}
