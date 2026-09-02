<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AttributeChangeTrigger extends WorkflowExecutionTrigger implements Parsable 
{
    /**
     * @var array<TriggerAttribute>|null $triggerAttributes The trigger attribute being changed that triggers the workflowexecutiontrigger of a workflow.)
    */
    private ?array $triggerAttributes = null;
    
    /**
     * Instantiates a new AttributeChangeTrigger and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.identityGovernance.attributeChangeTrigger');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AttributeChangeTrigger
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AttributeChangeTrigger {
        return new AttributeChangeTrigger();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'triggerAttributes' => fn(ParseNode $n) => $o->setTriggerAttributes($n->getCollectionOfObjectValues([TriggerAttribute::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the triggerAttributes property value. The trigger attribute being changed that triggers the workflowexecutiontrigger of a workflow.)
     * @return array<TriggerAttribute>|null
    */
    public function getTriggerAttributes(): ?array {
        return $this->triggerAttributes;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('triggerAttributes', $this->getTriggerAttributes());
    }

    /**
     * Sets the triggerAttributes property value. The trigger attribute being changed that triggers the workflowexecutiontrigger of a workflow.)
     * @param array<TriggerAttribute>|null $value Value to set for the triggerAttributes property.
    */
    public function setTriggerAttributes(?array $value): void {
        $this->triggerAttributes = $value;
    }

}
