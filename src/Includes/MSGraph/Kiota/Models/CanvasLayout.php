<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CanvasLayout extends Entity implements Parsable 
{
    /**
     * @var array<HorizontalSection>|null $horizontalSections Collection of horizontal sections on the SharePoint page.
    */
    private ?array $horizontalSections = null;
    
    /**
     * @var VerticalSection|null $verticalSection Vertical section on the SharePoint page.
    */
    private ?VerticalSection $verticalSection = null;
    
    /**
     * Instantiates a new CanvasLayout and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CanvasLayout
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CanvasLayout {
        return new CanvasLayout();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'horizontalSections' => fn(ParseNode $n) => $o->setHorizontalSections($n->getCollectionOfObjectValues([HorizontalSection::class, 'createFromDiscriminatorValue'])),
            'verticalSection' => fn(ParseNode $n) => $o->setVerticalSection($n->getObjectValue([VerticalSection::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the horizontalSections property value. Collection of horizontal sections on the SharePoint page.
     * @return array<HorizontalSection>|null
    */
    public function getHorizontalSections(): ?array {
        return $this->horizontalSections;
    }

    /**
     * Gets the verticalSection property value. Vertical section on the SharePoint page.
     * @return VerticalSection|null
    */
    public function getVerticalSection(): ?VerticalSection {
        return $this->verticalSection;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('horizontalSections', $this->getHorizontalSections());
        $writer->writeObjectValue('verticalSection', $this->getVerticalSection());
    }

    /**
     * Sets the horizontalSections property value. Collection of horizontal sections on the SharePoint page.
     * @param array<HorizontalSection>|null $value Value to set for the horizontalSections property.
    */
    public function setHorizontalSections(?array $value): void {
        $this->horizontalSections = $value;
    }

    /**
     * Sets the verticalSection property value. Vertical section on the SharePoint page.
     * @param VerticalSection|null $value Value to set for the verticalSection property.
    */
    public function setVerticalSection(?VerticalSection $value): void {
        $this->verticalSection = $value;
    }

}
