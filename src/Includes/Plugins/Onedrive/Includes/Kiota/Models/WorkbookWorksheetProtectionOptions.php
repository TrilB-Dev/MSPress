<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookWorksheetProtectionOptions implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $allowAutoFilter Indicates whether the worksheet protection option to allow the use of the autofilter feature is enabled.
    */
    private ?bool $allowAutoFilter = null;
    
    /**
     * @var bool|null $allowDeleteColumns Indicates whether the worksheet protection option to allow deleting columns is enabled.
    */
    private ?bool $allowDeleteColumns = null;
    
    /**
     * @var bool|null $allowDeleteRows Indicates whether the worksheet protection option to allow deleting rows is enabled.
    */
    private ?bool $allowDeleteRows = null;
    
    /**
     * @var bool|null $allowFormatCells Indicates whether the worksheet protection option to allow formatting cells is enabled.
    */
    private ?bool $allowFormatCells = null;
    
    /**
     * @var bool|null $allowFormatColumns Indicates whether the worksheet protection option to allow formatting columns is enabled.
    */
    private ?bool $allowFormatColumns = null;
    
    /**
     * @var bool|null $allowFormatRows Indicates whether the worksheet protection option to allow formatting rows is enabled.
    */
    private ?bool $allowFormatRows = null;
    
    /**
     * @var bool|null $allowInsertColumns Indicates whether the worksheet protection option to allow inserting columns is enabled.
    */
    private ?bool $allowInsertColumns = null;
    
    /**
     * @var bool|null $allowInsertHyperlinks Indicates whether the worksheet protection option to allow inserting hyperlinks is enabled.
    */
    private ?bool $allowInsertHyperlinks = null;
    
    /**
     * @var bool|null $allowInsertRows Indicates whether the worksheet protection option to allow inserting rows is enabled.
    */
    private ?bool $allowInsertRows = null;
    
    /**
     * @var bool|null $allowPivotTables Indicates whether the worksheet protection option to allow the use of the pivot table feature is enabled.
    */
    private ?bool $allowPivotTables = null;
    
    /**
     * @var bool|null $allowSort Indicates whether the worksheet protection option to allow the use of the sort feature is enabled.
    */
    private ?bool $allowSort = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new WorkbookWorksheetProtectionOptions and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookWorksheetProtectionOptions
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookWorksheetProtectionOptions {
        return new WorkbookWorksheetProtectionOptions();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the allowAutoFilter property value. Indicates whether the worksheet protection option to allow the use of the autofilter feature is enabled.
     * @return bool|null
    */
    public function getAllowAutoFilter(): ?bool {
        return $this->allowAutoFilter;
    }

    /**
     * Gets the allowDeleteColumns property value. Indicates whether the worksheet protection option to allow deleting columns is enabled.
     * @return bool|null
    */
    public function getAllowDeleteColumns(): ?bool {
        return $this->allowDeleteColumns;
    }

    /**
     * Gets the allowDeleteRows property value. Indicates whether the worksheet protection option to allow deleting rows is enabled.
     * @return bool|null
    */
    public function getAllowDeleteRows(): ?bool {
        return $this->allowDeleteRows;
    }

    /**
     * Gets the allowFormatCells property value. Indicates whether the worksheet protection option to allow formatting cells is enabled.
     * @return bool|null
    */
    public function getAllowFormatCells(): ?bool {
        return $this->allowFormatCells;
    }

    /**
     * Gets the allowFormatColumns property value. Indicates whether the worksheet protection option to allow formatting columns is enabled.
     * @return bool|null
    */
    public function getAllowFormatColumns(): ?bool {
        return $this->allowFormatColumns;
    }

    /**
     * Gets the allowFormatRows property value. Indicates whether the worksheet protection option to allow formatting rows is enabled.
     * @return bool|null
    */
    public function getAllowFormatRows(): ?bool {
        return $this->allowFormatRows;
    }

    /**
     * Gets the allowInsertColumns property value. Indicates whether the worksheet protection option to allow inserting columns is enabled.
     * @return bool|null
    */
    public function getAllowInsertColumns(): ?bool {
        return $this->allowInsertColumns;
    }

    /**
     * Gets the allowInsertHyperlinks property value. Indicates whether the worksheet protection option to allow inserting hyperlinks is enabled.
     * @return bool|null
    */
    public function getAllowInsertHyperlinks(): ?bool {
        return $this->allowInsertHyperlinks;
    }

    /**
     * Gets the allowInsertRows property value. Indicates whether the worksheet protection option to allow inserting rows is enabled.
     * @return bool|null
    */
    public function getAllowInsertRows(): ?bool {
        return $this->allowInsertRows;
    }

    /**
     * Gets the allowPivotTables property value. Indicates whether the worksheet protection option to allow the use of the pivot table feature is enabled.
     * @return bool|null
    */
    public function getAllowPivotTables(): ?bool {
        return $this->allowPivotTables;
    }

    /**
     * Gets the allowSort property value. Indicates whether the worksheet protection option to allow the use of the sort feature is enabled.
     * @return bool|null
    */
    public function getAllowSort(): ?bool {
        return $this->allowSort;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'allowAutoFilter' => fn(ParseNode $n) => $o->setAllowAutoFilter($n->getBooleanValue()),
            'allowDeleteColumns' => fn(ParseNode $n) => $o->setAllowDeleteColumns($n->getBooleanValue()),
            'allowDeleteRows' => fn(ParseNode $n) => $o->setAllowDeleteRows($n->getBooleanValue()),
            'allowFormatCells' => fn(ParseNode $n) => $o->setAllowFormatCells($n->getBooleanValue()),
            'allowFormatColumns' => fn(ParseNode $n) => $o->setAllowFormatColumns($n->getBooleanValue()),
            'allowFormatRows' => fn(ParseNode $n) => $o->setAllowFormatRows($n->getBooleanValue()),
            'allowInsertColumns' => fn(ParseNode $n) => $o->setAllowInsertColumns($n->getBooleanValue()),
            'allowInsertHyperlinks' => fn(ParseNode $n) => $o->setAllowInsertHyperlinks($n->getBooleanValue()),
            'allowInsertRows' => fn(ParseNode $n) => $o->setAllowInsertRows($n->getBooleanValue()),
            'allowPivotTables' => fn(ParseNode $n) => $o->setAllowPivotTables($n->getBooleanValue()),
            'allowSort' => fn(ParseNode $n) => $o->setAllowSort($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('allowAutoFilter', $this->getAllowAutoFilter());
        $writer->writeBooleanValue('allowDeleteColumns', $this->getAllowDeleteColumns());
        $writer->writeBooleanValue('allowDeleteRows', $this->getAllowDeleteRows());
        $writer->writeBooleanValue('allowFormatCells', $this->getAllowFormatCells());
        $writer->writeBooleanValue('allowFormatColumns', $this->getAllowFormatColumns());
        $writer->writeBooleanValue('allowFormatRows', $this->getAllowFormatRows());
        $writer->writeBooleanValue('allowInsertColumns', $this->getAllowInsertColumns());
        $writer->writeBooleanValue('allowInsertHyperlinks', $this->getAllowInsertHyperlinks());
        $writer->writeBooleanValue('allowInsertRows', $this->getAllowInsertRows());
        $writer->writeBooleanValue('allowPivotTables', $this->getAllowPivotTables());
        $writer->writeBooleanValue('allowSort', $this->getAllowSort());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the allowAutoFilter property value. Indicates whether the worksheet protection option to allow the use of the autofilter feature is enabled.
     * @param bool|null $value Value to set for the allowAutoFilter property.
    */
    public function setAllowAutoFilter(?bool $value): void {
        $this->allowAutoFilter = $value;
    }

    /**
     * Sets the allowDeleteColumns property value. Indicates whether the worksheet protection option to allow deleting columns is enabled.
     * @param bool|null $value Value to set for the allowDeleteColumns property.
    */
    public function setAllowDeleteColumns(?bool $value): void {
        $this->allowDeleteColumns = $value;
    }

    /**
     * Sets the allowDeleteRows property value. Indicates whether the worksheet protection option to allow deleting rows is enabled.
     * @param bool|null $value Value to set for the allowDeleteRows property.
    */
    public function setAllowDeleteRows(?bool $value): void {
        $this->allowDeleteRows = $value;
    }

    /**
     * Sets the allowFormatCells property value. Indicates whether the worksheet protection option to allow formatting cells is enabled.
     * @param bool|null $value Value to set for the allowFormatCells property.
    */
    public function setAllowFormatCells(?bool $value): void {
        $this->allowFormatCells = $value;
    }

    /**
     * Sets the allowFormatColumns property value. Indicates whether the worksheet protection option to allow formatting columns is enabled.
     * @param bool|null $value Value to set for the allowFormatColumns property.
    */
    public function setAllowFormatColumns(?bool $value): void {
        $this->allowFormatColumns = $value;
    }

    /**
     * Sets the allowFormatRows property value. Indicates whether the worksheet protection option to allow formatting rows is enabled.
     * @param bool|null $value Value to set for the allowFormatRows property.
    */
    public function setAllowFormatRows(?bool $value): void {
        $this->allowFormatRows = $value;
    }

    /**
     * Sets the allowInsertColumns property value. Indicates whether the worksheet protection option to allow inserting columns is enabled.
     * @param bool|null $value Value to set for the allowInsertColumns property.
    */
    public function setAllowInsertColumns(?bool $value): void {
        $this->allowInsertColumns = $value;
    }

    /**
     * Sets the allowInsertHyperlinks property value. Indicates whether the worksheet protection option to allow inserting hyperlinks is enabled.
     * @param bool|null $value Value to set for the allowInsertHyperlinks property.
    */
    public function setAllowInsertHyperlinks(?bool $value): void {
        $this->allowInsertHyperlinks = $value;
    }

    /**
     * Sets the allowInsertRows property value. Indicates whether the worksheet protection option to allow inserting rows is enabled.
     * @param bool|null $value Value to set for the allowInsertRows property.
    */
    public function setAllowInsertRows(?bool $value): void {
        $this->allowInsertRows = $value;
    }

    /**
     * Sets the allowPivotTables property value. Indicates whether the worksheet protection option to allow the use of the pivot table feature is enabled.
     * @param bool|null $value Value to set for the allowPivotTables property.
    */
    public function setAllowPivotTables(?bool $value): void {
        $this->allowPivotTables = $value;
    }

    /**
     * Sets the allowSort property value. Indicates whether the worksheet protection option to allow the use of the sort feature is enabled.
     * @param bool|null $value Value to set for the allowSort property.
    */
    public function setAllowSort(?bool $value): void {
        $this->allowSort = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
