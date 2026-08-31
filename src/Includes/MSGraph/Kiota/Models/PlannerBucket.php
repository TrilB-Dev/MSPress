<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PlannerBucket extends Entity implements Parsable 
{
    /**
     * @var string|null $name Name of the bucket.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $orderHint Hint used to order items of this type in a list view. For details about the supported format, see Using order hints in Planner.
    */
    private ?string $orderHint = null;
    
    /**
     * @var string|null $planId Plan ID to which the bucket belongs.
    */
    private ?string $planId = null;
    
    /**
     * @var array<PlannerTask>|null $tasks Read-only. Nullable. The collection of tasks in the bucket.
    */
    private ?array $tasks = null;
    
    /**
     * Instantiates a new PlannerBucket and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PlannerBucket
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PlannerBucket {
        return new PlannerBucket();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'orderHint' => fn(ParseNode $n) => $o->setOrderHint($n->getStringValue()),
            'planId' => fn(ParseNode $n) => $o->setPlanId($n->getStringValue()),
            'tasks' => fn(ParseNode $n) => $o->setTasks($n->getCollectionOfObjectValues([PlannerTask::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the name property value. Name of the bucket.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the orderHint property value. Hint used to order items of this type in a list view. For details about the supported format, see Using order hints in Planner.
     * @return string|null
    */
    public function getOrderHint(): ?string {
        return $this->orderHint;
    }

    /**
     * Gets the planId property value. Plan ID to which the bucket belongs.
     * @return string|null
    */
    public function getPlanId(): ?string {
        return $this->planId;
    }

    /**
     * Gets the tasks property value. Read-only. Nullable. The collection of tasks in the bucket.
     * @return array<PlannerTask>|null
    */
    public function getTasks(): ?array {
        return $this->tasks;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('orderHint', $this->getOrderHint());
        $writer->writeStringValue('planId', $this->getPlanId());
        $writer->writeCollectionOfObjectValues('tasks', $this->getTasks());
    }

    /**
     * Sets the name property value. Name of the bucket.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the orderHint property value. Hint used to order items of this type in a list view. For details about the supported format, see Using order hints in Planner.
     * @param string|null $value Value to set for the orderHint property.
    */
    public function setOrderHint(?string $value): void {
        $this->orderHint = $value;
    }

    /**
     * Sets the planId property value. Plan ID to which the bucket belongs.
     * @param string|null $value Value to set for the planId property.
    */
    public function setPlanId(?string $value): void {
        $this->planId = $value;
    }

    /**
     * Sets the tasks property value. Read-only. Nullable. The collection of tasks in the bucket.
     * @param array<PlannerTask>|null $value Value to set for the tasks property.
    */
    public function setTasks(?array $value): void {
        $this->tasks = $value;
    }

}
