<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProvisioningObjectWorkflowSubject extends WorkflowSubject implements Parsable 
{
    /**
     * @var array<AttributeSetEntry>|null $attributeSetEntries The attribute set entries representing the subject's attributes. Each entry is a key-value pair.
    */
    private ?array $attributeSetEntries = null;
    
    /**
     * @var string|null $id The identifier of the provisioning object subject.
    */
    private ?string $id = null;
    
    /**
     * Instantiates a new ProvisioningObjectWorkflowSubject and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.identityGovernance.provisioningObjectWorkflowSubject');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProvisioningObjectWorkflowSubject
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProvisioningObjectWorkflowSubject {
        return new ProvisioningObjectWorkflowSubject();
    }

    /**
     * Gets the attributeSetEntries property value. The attribute set entries representing the subject's attributes. Each entry is a key-value pair.
     * @return array<AttributeSetEntry>|null
    */
    public function getAttributeSetEntries(): ?array {
        return $this->attributeSetEntries;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'attributeSetEntries' => fn(ParseNode $n) => $o->setAttributeSetEntries($n->getCollectionOfObjectValues([AttributeSetEntry::class, 'createFromDiscriminatorValue'])),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the id property value. The identifier of the provisioning object subject.
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('attributeSetEntries', $this->getAttributeSetEntries());
        $writer->writeStringValue('id', $this->getId());
    }

    /**
     * Sets the attributeSetEntries property value. The attribute set entries representing the subject's attributes. Each entry is a key-value pair.
     * @param array<AttributeSetEntry>|null $value Value to set for the attributeSetEntries property.
    */
    public function setAttributeSetEntries(?array $value): void {
        $this->attributeSetEntries = $value;
    }

    /**
     * Sets the id property value. The identifier of the provisioning object subject.
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

}
