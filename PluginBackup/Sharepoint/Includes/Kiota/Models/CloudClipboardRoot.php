<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudClipboardRoot extends Entity implements Parsable 
{
    /**
     * @var array<CloudClipboardItem>|null $items Represents a collection of Cloud Clipboard items.
    */
    private ?array $items = null;
    
    /**
     * Instantiates a new CloudClipboardRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudClipboardRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudClipboardRoot {
        return new CloudClipboardRoot();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'items' => fn(ParseNode $n) => $o->setItems($n->getCollectionOfObjectValues([CloudClipboardItem::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the items property value. Represents a collection of Cloud Clipboard items.
     * @return array<CloudClipboardItem>|null
    */
    public function getItems(): ?array {
        return $this->items;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('items', $this->getItems());
    }

    /**
     * Sets the items property value. Represents a collection of Cloud Clipboard items.
     * @param array<CloudClipboardItem>|null $value Value to set for the items property.
    */
    public function setItems(?array $value): void {
        $this->items = $value;
    }

}
