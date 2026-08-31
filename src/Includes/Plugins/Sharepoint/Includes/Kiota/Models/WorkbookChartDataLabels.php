<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookChartDataLabels extends Entity implements Parsable 
{
    /**
     * @var WorkbookChartDataLabelFormat|null $format Represents the format of chart data labels, which includes fill and font formatting. Read-only.
    */
    private ?WorkbookChartDataLabelFormat $format = null;
    
    /**
     * @var string|null $position DataLabelPosition value that represents the position of the data label. The possible values are: None, Center, InsideEnd, InsideBase, OutsideEnd, Left, Right, Top, Bottom, BestFit, Callout.
    */
    private ?string $position = null;
    
    /**
     * @var string|null $separator String that represents the separator used for the data labels on a chart.
    */
    private ?string $separator = null;
    
    /**
     * @var bool|null $showBubbleSize Boolean value that represents whether the data label bubble size is visible.
    */
    private ?bool $showBubbleSize = null;
    
    /**
     * @var bool|null $showCategoryName Boolean value that represents whether the data label category name is visible.
    */
    private ?bool $showCategoryName = null;
    
    /**
     * @var bool|null $showLegendKey Boolean value that represents whether the data label legend key is visible.
    */
    private ?bool $showLegendKey = null;
    
    /**
     * @var bool|null $showPercentage Boolean value that represents whether the data label percentage is visible.
    */
    private ?bool $showPercentage = null;
    
    /**
     * @var bool|null $showSeriesName Boolean value that represents whether the data label series name is visible.
    */
    private ?bool $showSeriesName = null;
    
    /**
     * @var bool|null $showValue Boolean value that represents whether the data label value is visible.
    */
    private ?bool $showValue = null;
    
    /**
     * Instantiates a new WorkbookChartDataLabels and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookChartDataLabels
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookChartDataLabels {
        return new WorkbookChartDataLabels();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'format' => fn(ParseNode $n) => $o->setFormat($n->getObjectValue([WorkbookChartDataLabelFormat::class, 'createFromDiscriminatorValue'])),
            'position' => fn(ParseNode $n) => $o->setPosition($n->getStringValue()),
            'separator' => fn(ParseNode $n) => $o->setSeparator($n->getStringValue()),
            'showBubbleSize' => fn(ParseNode $n) => $o->setShowBubbleSize($n->getBooleanValue()),
            'showCategoryName' => fn(ParseNode $n) => $o->setShowCategoryName($n->getBooleanValue()),
            'showLegendKey' => fn(ParseNode $n) => $o->setShowLegendKey($n->getBooleanValue()),
            'showPercentage' => fn(ParseNode $n) => $o->setShowPercentage($n->getBooleanValue()),
            'showSeriesName' => fn(ParseNode $n) => $o->setShowSeriesName($n->getBooleanValue()),
            'showValue' => fn(ParseNode $n) => $o->setShowValue($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the format property value. Represents the format of chart data labels, which includes fill and font formatting. Read-only.
     * @return WorkbookChartDataLabelFormat|null
    */
    public function getFormat(): ?WorkbookChartDataLabelFormat {
        return $this->format;
    }

    /**
     * Gets the position property value. DataLabelPosition value that represents the position of the data label. The possible values are: None, Center, InsideEnd, InsideBase, OutsideEnd, Left, Right, Top, Bottom, BestFit, Callout.
     * @return string|null
    */
    public function getPosition(): ?string {
        return $this->position;
    }

    /**
     * Gets the separator property value. String that represents the separator used for the data labels on a chart.
     * @return string|null
    */
    public function getSeparator(): ?string {
        return $this->separator;
    }

    /**
     * Gets the showBubbleSize property value. Boolean value that represents whether the data label bubble size is visible.
     * @return bool|null
    */
    public function getShowBubbleSize(): ?bool {
        return $this->showBubbleSize;
    }

    /**
     * Gets the showCategoryName property value. Boolean value that represents whether the data label category name is visible.
     * @return bool|null
    */
    public function getShowCategoryName(): ?bool {
        return $this->showCategoryName;
    }

    /**
     * Gets the showLegendKey property value. Boolean value that represents whether the data label legend key is visible.
     * @return bool|null
    */
    public function getShowLegendKey(): ?bool {
        return $this->showLegendKey;
    }

    /**
     * Gets the showPercentage property value. Boolean value that represents whether the data label percentage is visible.
     * @return bool|null
    */
    public function getShowPercentage(): ?bool {
        return $this->showPercentage;
    }

    /**
     * Gets the showSeriesName property value. Boolean value that represents whether the data label series name is visible.
     * @return bool|null
    */
    public function getShowSeriesName(): ?bool {
        return $this->showSeriesName;
    }

    /**
     * Gets the showValue property value. Boolean value that represents whether the data label value is visible.
     * @return bool|null
    */
    public function getShowValue(): ?bool {
        return $this->showValue;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('format', $this->getFormat());
        $writer->writeStringValue('position', $this->getPosition());
        $writer->writeStringValue('separator', $this->getSeparator());
        $writer->writeBooleanValue('showBubbleSize', $this->getShowBubbleSize());
        $writer->writeBooleanValue('showCategoryName', $this->getShowCategoryName());
        $writer->writeBooleanValue('showLegendKey', $this->getShowLegendKey());
        $writer->writeBooleanValue('showPercentage', $this->getShowPercentage());
        $writer->writeBooleanValue('showSeriesName', $this->getShowSeriesName());
        $writer->writeBooleanValue('showValue', $this->getShowValue());
    }

    /**
     * Sets the format property value. Represents the format of chart data labels, which includes fill and font formatting. Read-only.
     * @param WorkbookChartDataLabelFormat|null $value Value to set for the format property.
    */
    public function setFormat(?WorkbookChartDataLabelFormat $value): void {
        $this->format = $value;
    }

    /**
     * Sets the position property value. DataLabelPosition value that represents the position of the data label. The possible values are: None, Center, InsideEnd, InsideBase, OutsideEnd, Left, Right, Top, Bottom, BestFit, Callout.
     * @param string|null $value Value to set for the position property.
    */
    public function setPosition(?string $value): void {
        $this->position = $value;
    }

    /**
     * Sets the separator property value. String that represents the separator used for the data labels on a chart.
     * @param string|null $value Value to set for the separator property.
    */
    public function setSeparator(?string $value): void {
        $this->separator = $value;
    }

    /**
     * Sets the showBubbleSize property value. Boolean value that represents whether the data label bubble size is visible.
     * @param bool|null $value Value to set for the showBubbleSize property.
    */
    public function setShowBubbleSize(?bool $value): void {
        $this->showBubbleSize = $value;
    }

    /**
     * Sets the showCategoryName property value. Boolean value that represents whether the data label category name is visible.
     * @param bool|null $value Value to set for the showCategoryName property.
    */
    public function setShowCategoryName(?bool $value): void {
        $this->showCategoryName = $value;
    }

    /**
     * Sets the showLegendKey property value. Boolean value that represents whether the data label legend key is visible.
     * @param bool|null $value Value to set for the showLegendKey property.
    */
    public function setShowLegendKey(?bool $value): void {
        $this->showLegendKey = $value;
    }

    /**
     * Sets the showPercentage property value. Boolean value that represents whether the data label percentage is visible.
     * @param bool|null $value Value to set for the showPercentage property.
    */
    public function setShowPercentage(?bool $value): void {
        $this->showPercentage = $value;
    }

    /**
     * Sets the showSeriesName property value. Boolean value that represents whether the data label series name is visible.
     * @param bool|null $value Value to set for the showSeriesName property.
    */
    public function setShowSeriesName(?bool $value): void {
        $this->showSeriesName = $value;
    }

    /**
     * Sets the showValue property value. Boolean value that represents whether the data label value is visible.
     * @param bool|null $value Value to set for the showValue property.
    */
    public function setShowValue(?bool $value): void {
        $this->showValue = $value;
    }

}
