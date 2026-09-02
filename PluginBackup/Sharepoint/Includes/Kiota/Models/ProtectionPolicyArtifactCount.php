<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProtectionPolicyArtifactCount implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $completed The completed property
    */
    private ?int $completed = null;
    
    /**
     * @var int|null $failed The failed property
    */
    private ?int $failed = null;
    
    /**
     * @var int|null $inProgress The inProgress property
    */
    private ?int $inProgress = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var int|null $total The total property
    */
    private ?int $total = null;
    
    /**
     * Instantiates a new ProtectionPolicyArtifactCount and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProtectionPolicyArtifactCount
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProtectionPolicyArtifactCount {
        return new ProtectionPolicyArtifactCount();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the completed property value. The completed property
     * @return int|null
    */
    public function getCompleted(): ?int {
        return $this->completed;
    }

    /**
     * Gets the failed property value. The failed property
     * @return int|null
    */
    public function getFailed(): ?int {
        return $this->failed;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'completed' => fn(ParseNode $n) => $o->setCompleted($n->getIntegerValue()),
            'failed' => fn(ParseNode $n) => $o->setFailed($n->getIntegerValue()),
            'inProgress' => fn(ParseNode $n) => $o->setInProgress($n->getIntegerValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'total' => fn(ParseNode $n) => $o->setTotal($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the inProgress property value. The inProgress property
     * @return int|null
    */
    public function getInProgress(): ?int {
        return $this->inProgress;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the total property value. The total property
     * @return int|null
    */
    public function getTotal(): ?int {
        return $this->total;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('completed', $this->getCompleted());
        $writer->writeIntegerValue('failed', $this->getFailed());
        $writer->writeIntegerValue('inProgress', $this->getInProgress());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeIntegerValue('total', $this->getTotal());
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
     * Sets the completed property value. The completed property
     * @param int|null $value Value to set for the completed property.
    */
    public function setCompleted(?int $value): void {
        $this->completed = $value;
    }

    /**
     * Sets the failed property value. The failed property
     * @param int|null $value Value to set for the failed property.
    */
    public function setFailed(?int $value): void {
        $this->failed = $value;
    }

    /**
     * Sets the inProgress property value. The inProgress property
     * @param int|null $value Value to set for the inProgress property.
    */
    public function setInProgress(?int $value): void {
        $this->inProgress = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the total property value. The total property
     * @param int|null $value Value to set for the total property.
    */
    public function setTotal(?int $value): void {
        $this->total = $value;
    }

}
