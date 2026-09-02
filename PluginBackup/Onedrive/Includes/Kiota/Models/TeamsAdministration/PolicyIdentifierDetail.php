<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Entity;

class PolicyIdentifierDetail extends Entity implements Parsable 
{
    /**
     * @var string|null $name The display name of the policy instance.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $policyId The unique ID associated with the policy instance.
    */
    private ?string $policyId = null;
    
    /**
     * Instantiates a new PolicyIdentifierDetail and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PolicyIdentifierDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PolicyIdentifierDetail {
        return new PolicyIdentifierDetail();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'policyId' => fn(ParseNode $n) => $o->setPolicyId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the name property value. The display name of the policy instance.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the policyId property value. The unique ID associated with the policy instance.
     * @return string|null
    */
    public function getPolicyId(): ?string {
        return $this->policyId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('policyId', $this->getPolicyId());
    }

    /**
     * Sets the name property value. The display name of the policy instance.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the policyId property value. The unique ID associated with the policy instance.
     * @param string|null $value Value to set for the policyId property.
    */
    public function setPolicyId(?string $value): void {
        $this->policyId = $value;
    }

}
