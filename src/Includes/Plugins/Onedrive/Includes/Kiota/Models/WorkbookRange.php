<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookRange extends Entity implements Parsable 
{
    /**
     * @var string|null $address Represents the range reference in A1-style. Address value contains the Sheet reference (for example, Sheet1!A1:B4). Read-only.
    */
    private ?string $address = null;
    
    /**
     * @var string|null $addressLocal Represents range reference for the specified range in the language of the user. Read-only.
    */
    private ?string $addressLocal = null;
    
    /**
     * @var int|null $cellCount Number of cells in the range. Read-only.
    */
    private ?int $cellCount = null;
    
    /**
     * @var int|null $columnCount Represents the total number of columns in the range. Read-only.
    */
    private ?int $columnCount = null;
    
    /**
     * @var bool|null $columnHidden Indicates whether all columns of the current range are hidden.
    */
    private ?bool $columnHidden = null;
    
    /**
     * @var int|null $columnIndex Represents the column number of the first cell in the range. Zero-indexed. Read-only.
    */
    private ?int $columnIndex = null;
    
    /**
     * @var WorkbookRangeFormat|null $format Returns a format object, encapsulating the range's font, fill, borders, alignment, and other properties. Read-only.
    */
    private ?WorkbookRangeFormat $format = null;
    
    /**
     * @var bool|null $hidden Represents if all cells of the current range are hidden. Read-only.
    */
    private ?bool $hidden = null;
    
    /**
     * @var int|null $rowCount Returns the total number of rows in the range. Read-only.
    */
    private ?int $rowCount = null;
    
    /**
     * @var bool|null $rowHidden Indicates whether all rows of the current range are hidden.
    */
    private ?bool $rowHidden = null;
    
    /**
     * @var int|null $rowIndex Returns the row number of the first cell in the range. Zero-indexed. Read-only.
    */
    private ?int $rowIndex = null;
    
    /**
     * @var WorkbookRangeSort|null $sort The worksheet containing the current range. Read-only.
    */
    private ?WorkbookRangeSort $sort = null;
    
    /**
     * @var WorkbookWorksheet|null $worksheet The worksheet containing the current range. Read-only.
    */
    private ?WorkbookWorksheet $worksheet = null;
    
    /**
     * Instantiates a new WorkbookRange and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookRange
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookRange {
        return new WorkbookRange();
    }

    /**
     * Gets the address property value. Represents the range reference in A1-style. Address value contains the Sheet reference (for example, Sheet1!A1:B4). Read-only.
     * @return string|null
    */
    public function getAddress(): ?string {
        return $this->address;
    }

    /**
     * Gets the addressLocal property value. Represents range reference for the specified range in the language of the user. Read-only.
     * @return string|null
    */
    public function getAddressLocal(): ?string {
        return $this->addressLocal;
    }

    /**
     * Gets the cellCount property value. Number of cells in the range. Read-only.
     * @return int|null
    */
    public function getCellCount(): ?int {
        return $this->cellCount;
    }

    /**
     * Gets the columnCount property value. Represents the total number of columns in the range. Read-only.
     * @return int|null
    */
    public function getColumnCount(): ?int {
        return $this->columnCount;
    }

    /**
     * Gets the columnHidden property value. Indicates whether all columns of the current range are hidden.
     * @return bool|null
    */
    public function getColumnHidden(): ?bool {
        return $this->columnHidden;
    }

    /**
     * Gets the columnIndex property value. Represents the column number of the first cell in the range. Zero-indexed. Read-only.
     * @return int|null
    */
    public function getColumnIndex(): ?int {
        return $this->columnIndex;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'address' => fn(ParseNode $n) => $o->setAddress($n->getStringValue()),
            'addressLocal' => fn(ParseNode $n) => $o->setAddressLocal($n->getStringValue()),
            'cellCount' => fn(ParseNode $n) => $o->setCellCount($n->getIntegerValue()),
            'columnCount' => fn(ParseNode $n) => $o->setColumnCount($n->getIntegerValue()),
            'columnHidden' => fn(ParseNode $n) => $o->setColumnHidden($n->getBooleanValue()),
            'columnIndex' => fn(ParseNode $n) => $o->setColumnIndex($n->getIntegerValue()),
            'format' => fn(ParseNode $n) => $o->setFormat($n->getObjectValue([WorkbookRangeFormat::class, 'createFromDiscriminatorValue'])),
            'hidden' => fn(ParseNode $n) => $o->setHidden($n->getBooleanValue()),
            'rowCount' => fn(ParseNode $n) => $o->setRowCount($n->getIntegerValue()),
            'rowHidden' => fn(ParseNode $n) => $o->setRowHidden($n->getBooleanValue()),
            'rowIndex' => fn(ParseNode $n) => $o->setRowIndex($n->getIntegerValue()),
            'sort' => fn(ParseNode $n) => $o->setSort($n->getObjectValue([WorkbookRangeSort::class, 'createFromDiscriminatorValue'])),
            'worksheet' => fn(ParseNode $n) => $o->setWorksheet($n->getObjectValue([WorkbookWorksheet::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the format property value. Returns a format object, encapsulating the range's font, fill, borders, alignment, and other properties. Read-only.
     * @return WorkbookRangeFormat|null
    */
    public function getFormat(): ?WorkbookRangeFormat {
        return $this->format;
    }

    /**
     * Gets the hidden property value. Represents if all cells of the current range are hidden. Read-only.
     * @return bool|null
    */
    public function getHidden(): ?bool {
        return $this->hidden;
    }

    /**
     * Gets the rowCount property value. Returns the total number of rows in the range. Read-only.
     * @return int|null
    */
    public function getRowCount(): ?int {
        return $this->rowCount;
    }

    /**
     * Gets the rowHidden property value. Indicates whether all rows of the current range are hidden.
     * @return bool|null
    */
    public function getRowHidden(): ?bool {
        return $this->rowHidden;
    }

    /**
     * Gets the rowIndex property value. Returns the row number of the first cell in the range. Zero-indexed. Read-only.
     * @return int|null
    */
    public function getRowIndex(): ?int {
        return $this->rowIndex;
    }

    /**
     * Gets the sort property value. The worksheet containing the current range. Read-only.
     * @return WorkbookRangeSort|null
    */
    public function getSort(): ?WorkbookRangeSort {
        return $this->sort;
    }

    /**
     * Gets the worksheet property value. The worksheet containing the current range. Read-only.
     * @return WorkbookWorksheet|null
    */
    public function getWorksheet(): ?WorkbookWorksheet {
        return $this->worksheet;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('address', $this->getAddress());
        $writer->writeStringValue('addressLocal', $this->getAddressLocal());
        $writer->writeIntegerValue('cellCount', $this->getCellCount());
        $writer->writeIntegerValue('columnCount', $this->getColumnCount());
        $writer->writeBooleanValue('columnHidden', $this->getColumnHidden());
        $writer->writeIntegerValue('columnIndex', $this->getColumnIndex());
        $writer->writeObjectValue('format', $this->getFormat());
        $writer->writeBooleanValue('hidden', $this->getHidden());
        $writer->writeIntegerValue('rowCount', $this->getRowCount());
        $writer->writeBooleanValue('rowHidden', $this->getRowHidden());
        $writer->writeIntegerValue('rowIndex', $this->getRowIndex());
        $writer->writeObjectValue('sort', $this->getSort());
        $writer->writeObjectValue('worksheet', $this->getWorksheet());
    }

    /**
     * Sets the address property value. Represents the range reference in A1-style. Address value contains the Sheet reference (for example, Sheet1!A1:B4). Read-only.
     * @param string|null $value Value to set for the address property.
    */
    public function setAddress(?string $value): void {
        $this->address = $value;
    }

    /**
     * Sets the addressLocal property value. Represents range reference for the specified range in the language of the user. Read-only.
     * @param string|null $value Value to set for the addressLocal property.
    */
    public function setAddressLocal(?string $value): void {
        $this->addressLocal = $value;
    }

    /**
     * Sets the cellCount property value. Number of cells in the range. Read-only.
     * @param int|null $value Value to set for the cellCount property.
    */
    public function setCellCount(?int $value): void {
        $this->cellCount = $value;
    }

    /**
     * Sets the columnCount property value. Represents the total number of columns in the range. Read-only.
     * @param int|null $value Value to set for the columnCount property.
    */
    public function setColumnCount(?int $value): void {
        $this->columnCount = $value;
    }

    /**
     * Sets the columnHidden property value. Indicates whether all columns of the current range are hidden.
     * @param bool|null $value Value to set for the columnHidden property.
    */
    public function setColumnHidden(?bool $value): void {
        $this->columnHidden = $value;
    }

    /**
     * Sets the columnIndex property value. Represents the column number of the first cell in the range. Zero-indexed. Read-only.
     * @param int|null $value Value to set for the columnIndex property.
    */
    public function setColumnIndex(?int $value): void {
        $this->columnIndex = $value;
    }

    /**
     * Sets the format property value. Returns a format object, encapsulating the range's font, fill, borders, alignment, and other properties. Read-only.
     * @param WorkbookRangeFormat|null $value Value to set for the format property.
    */
    public function setFormat(?WorkbookRangeFormat $value): void {
        $this->format = $value;
    }

    /**
     * Sets the hidden property value. Represents if all cells of the current range are hidden. Read-only.
     * @param bool|null $value Value to set for the hidden property.
    */
    public function setHidden(?bool $value): void {
        $this->hidden = $value;
    }

    /**
     * Sets the rowCount property value. Returns the total number of rows in the range. Read-only.
     * @param int|null $value Value to set for the rowCount property.
    */
    public function setRowCount(?int $value): void {
        $this->rowCount = $value;
    }

    /**
     * Sets the rowHidden property value. Indicates whether all rows of the current range are hidden.
     * @param bool|null $value Value to set for the rowHidden property.
    */
    public function setRowHidden(?bool $value): void {
        $this->rowHidden = $value;
    }

    /**
     * Sets the rowIndex property value. Returns the row number of the first cell in the range. Zero-indexed. Read-only.
     * @param int|null $value Value to set for the rowIndex property.
    */
    public function setRowIndex(?int $value): void {
        $this->rowIndex = $value;
    }

    /**
     * Sets the sort property value. The worksheet containing the current range. Read-only.
     * @param WorkbookRangeSort|null $value Value to set for the sort property.
    */
    public function setSort(?WorkbookRangeSort $value): void {
        $this->sort = $value;
    }

    /**
     * Sets the worksheet property value. The worksheet containing the current range. Read-only.
     * @param WorkbookWorksheet|null $value Value to set for the worksheet property.
    */
    public function setWorksheet(?WorkbookWorksheet $value): void {
        $this->worksheet = $value;
    }

}
