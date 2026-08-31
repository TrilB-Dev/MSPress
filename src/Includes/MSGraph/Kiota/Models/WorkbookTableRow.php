<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookTableRow extends Entity implements Parsable 
{
    /**
     * @var int|null $index The index of the row within the rows collection of the table. Zero-based. Read-only.
    */
    private ?int $index = null;
    
    /**
     * Instantiates a new WorkbookTableRow and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookTableRow
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookTableRow {
        return new WorkbookTableRow();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'index' => fn(ParseNode $n) => $o->setIndex($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the index property value. The index of the row within the rows collection of the table. Zero-based. Read-only.
     * @return int|null
    */
    public function getIndex(): ?int {
        return $this->index;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('index', $this->getIndex());
    }

    /**
     * Sets the index property value. The index of the row within the rows collection of the table. Zero-based. Read-only.
     * @param int|null $value Value to set for the index property.
    */
    public function setIndex(?int $value): void {
        $this->index = $value;
    }

}
