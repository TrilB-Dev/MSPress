<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The status of a long-running operation.
*/
class AttackSimulationOperation extends LongRunningOperation implements Parsable 
{
    /**
     * @var int|null $percentageCompleted Percentage of completion of the respective operation.
    */
    private ?int $percentageCompleted = null;
    
    /**
     * @var string|null $tenantId Tenant identifier.
    */
    private ?string $tenantId = null;
    
    /**
     * @var AttackSimulationOperationType|null $type The attack simulation operation type. The possible values are: createSimulation, updateSimulation, unknownFutureValue.
    */
    private ?AttackSimulationOperationType $type = null;
    
    /**
     * Instantiates a new AttackSimulationOperation and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AttackSimulationOperation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AttackSimulationOperation {
        return new AttackSimulationOperation();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'percentageCompleted' => fn(ParseNode $n) => $o->setPercentageCompleted($n->getIntegerValue()),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(AttackSimulationOperationType::class)),
        ]);
    }

    /**
     * Gets the percentageCompleted property value. Percentage of completion of the respective operation.
     * @return int|null
    */
    public function getPercentageCompleted(): ?int {
        return $this->percentageCompleted;
    }

    /**
     * Gets the tenantId property value. Tenant identifier.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the type property value. The attack simulation operation type. The possible values are: createSimulation, updateSimulation, unknownFutureValue.
     * @return AttackSimulationOperationType|null
    */
    public function getType(): ?AttackSimulationOperationType {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('percentageCompleted', $this->getPercentageCompleted());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeEnumValue('type', $this->getType());
    }

    /**
     * Sets the percentageCompleted property value. Percentage of completion of the respective operation.
     * @param int|null $value Value to set for the percentageCompleted property.
    */
    public function setPercentageCompleted(?int $value): void {
        $this->percentageCompleted = $value;
    }

    /**
     * Sets the tenantId property value. Tenant identifier.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the type property value. The attack simulation operation type. The possible values are: createSimulation, updateSimulation, unknownFutureValue.
     * @param AttackSimulationOperationType|null $value Value to set for the type property.
    */
    public function setType(?AttackSimulationOperationType $value): void {
        $this->type = $value;
    }

}
