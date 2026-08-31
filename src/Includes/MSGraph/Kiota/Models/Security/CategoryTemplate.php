<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CategoryTemplate extends FilePlanDescriptorTemplate implements Parsable 
{
    /**
     * @var array<SubcategoryTemplate>|null $subcategories Represents all subcategories under a particular category.
    */
    private ?array $subcategories = null;
    
    /**
     * Instantiates a new CategoryTemplate and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CategoryTemplate
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CategoryTemplate {
        return new CategoryTemplate();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'subcategories' => fn(ParseNode $n) => $o->setSubcategories($n->getCollectionOfObjectValues([SubcategoryTemplate::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the subcategories property value. Represents all subcategories under a particular category.
     * @return array<SubcategoryTemplate>|null
    */
    public function getSubcategories(): ?array {
        return $this->subcategories;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('subcategories', $this->getSubcategories());
    }

    /**
     * Sets the subcategories property value. Represents all subcategories under a particular category.
     * @param array<SubcategoryTemplate>|null $value Value to set for the subcategories property.
    */
    public function setSubcategories(?array $value): void {
        $this->subcategories = $value;
    }

}
