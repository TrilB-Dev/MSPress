<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AssignedTelephoneNumber implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var AssignmentCategory|null $assignmentCategory The assignmentCategory property
    */
    private ?AssignmentCategory $assignmentCategory = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $telephoneNumber The assigned phone number.
    */
    private ?string $telephoneNumber = null;
    
    /**
     * Instantiates a new AssignedTelephoneNumber and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AssignedTelephoneNumber
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AssignedTelephoneNumber {
        return new AssignedTelephoneNumber();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the assignmentCategory property value. The assignmentCategory property
     * @return AssignmentCategory|null
    */
    public function getAssignmentCategory(): ?AssignmentCategory {
        return $this->assignmentCategory;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'assignmentCategory' => fn(ParseNode $n) => $o->setAssignmentCategory($n->getEnumValue(AssignmentCategory::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'telephoneNumber' => fn(ParseNode $n) => $o->setTelephoneNumber($n->getStringValue()),
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
     * Gets the telephoneNumber property value. The assigned phone number.
     * @return string|null
    */
    public function getTelephoneNumber(): ?string {
        return $this->telephoneNumber;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('assignmentCategory', $this->getAssignmentCategory());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('telephoneNumber', $this->getTelephoneNumber());
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
     * Sets the assignmentCategory property value. The assignmentCategory property
     * @param AssignmentCategory|null $value Value to set for the assignmentCategory property.
    */
    public function setAssignmentCategory(?AssignmentCategory $value): void {
        $this->assignmentCategory = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the telephoneNumber property value. The assigned phone number.
     * @param string|null $value Value to set for the telephoneNumber property.
    */
    public function setTelephoneNumber(?string $value): void {
        $this->telephoneNumber = $value;
    }

}
