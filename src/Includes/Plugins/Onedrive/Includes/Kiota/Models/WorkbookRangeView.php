<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookRangeView extends Entity implements Parsable 
{
    /**
     * @var int|null $columnCount The number of visible columns. Read-only.
    */
    private ?int $columnCount = null;
    
    /**
     * @var int|null $index The index of the range.
    */
    private ?int $index = null;
    
    /**
     * @var int|null $rowCount The number of visible rows. Read-only.
    */
    private ?int $rowCount = null;
    
    /**
     * @var array<WorkbookRangeView>|null $rows The collection of range views associated with the range. Read-only. Read-only.
    */
    private ?array $rows = null;
    
    /**
     * Instantiates a new WorkbookRangeView and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookRangeView
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookRangeView {
        return new WorkbookRangeView();
    }

    /**
     * Gets the columnCount property value. The number of visible columns. Read-only.
     * @return int|null
    */
    public function getColumnCount(): ?int {
        return $this->columnCount;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'columnCount' => fn(ParseNode $n) => $o->setColumnCount($n->getIntegerValue()),
            'index' => fn(ParseNode $n) => $o->setIndex($n->getIntegerValue()),
            'rowCount' => fn(ParseNode $n) => $o->setRowCount($n->getIntegerValue()),
            'rows' => fn(ParseNode $n) => $o->setRows($n->getCollectionOfObjectValues([WorkbookRangeView::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the index property value. The index of the range.
     * @return int|null
    */
    public function getIndex(): ?int {
        return $this->index;
    }

    /**
     * Gets the rowCount property value. The number of visible rows. Read-only.
     * @return int|null
    */
    public function getRowCount(): ?int {
        return $this->rowCount;
    }

    /**
     * Gets the rows property value. The collection of range views associated with the range. Read-only. Read-only.
     * @return array<WorkbookRangeView>|null
    */
    public function getRows(): ?array {
        return $this->rows;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('columnCount', $this->getColumnCount());
        $writer->writeIntegerValue('index', $this->getIndex());
        $writer->writeIntegerValue('rowCount', $this->getRowCount());
        $writer->writeCollectionOfObjectValues('rows', $this->getRows());
    }

    /**
     * Sets the columnCount property value. The number of visible columns. Read-only.
     * @param int|null $value Value to set for the columnCount property.
    */
    public function setColumnCount(?int $value): void {
        $this->columnCount = $value;
    }

    /**
     * Sets the index property value. The index of the range.
     * @param int|null $value Value to set for the index property.
    */
    public function setIndex(?int $value): void {
        $this->index = $value;
    }

    /**
     * Sets the rowCount property value. The number of visible rows. Read-only.
     * @param int|null $value Value to set for the rowCount property.
    */
    public function setRowCount(?int $value): void {
        $this->rowCount = $value;
    }

    /**
     * Sets the rows property value. The collection of range views associated with the range. Read-only. Read-only.
     * @param array<WorkbookRangeView>|null $value Value to set for the rows property.
    */
    public function setRows(?array $value): void {
        $this->rows = $value;
    }

}
