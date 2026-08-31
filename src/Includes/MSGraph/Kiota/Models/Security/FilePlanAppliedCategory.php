<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class FilePlanAppliedCategory extends FilePlanDescriptorBase implements Parsable 
{
    /**
     * @var FilePlanSubcategory|null $subcategory Represents the file plan descriptor for a subcategory under a specific category, which has been assigned to a particular retention label.
    */
    private ?FilePlanSubcategory $subcategory = null;
    
    /**
     * Instantiates a new FilePlanAppliedCategory and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FilePlanAppliedCategory
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FilePlanAppliedCategory {
        return new FilePlanAppliedCategory();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'subcategory' => fn(ParseNode $n) => $o->setSubcategory($n->getObjectValue([FilePlanSubcategory::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the subcategory property value. Represents the file plan descriptor for a subcategory under a specific category, which has been assigned to a particular retention label.
     * @return FilePlanSubcategory|null
    */
    public function getSubcategory(): ?FilePlanSubcategory {
        return $this->subcategory;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('subcategory', $this->getSubcategory());
    }

    /**
     * Sets the subcategory property value. Represents the file plan descriptor for a subcategory under a specific category, which has been assigned to a particular retention label.
     * @param FilePlanSubcategory|null $value Value to set for the subcategory property.
    */
    public function setSubcategory(?FilePlanSubcategory $value): void {
        $this->subcategory = $value;
    }

}
