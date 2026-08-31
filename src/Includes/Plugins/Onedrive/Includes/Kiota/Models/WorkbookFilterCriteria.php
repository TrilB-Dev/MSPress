<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookFilterCriteria implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $color The color applied to the cell.
    */
    private ?string $color = null;
    
    /**
     * @var string|null $criterion1 A custom criterion.
    */
    private ?string $criterion1 = null;
    
    /**
     * @var string|null $criterion2 A custom criterion.
    */
    private ?string $criterion2 = null;
    
    /**
     * @var string|null $dynamicCriteria A dynamic formula specified in a custom filter.
    */
    private ?string $dynamicCriteria = null;
    
    /**
     * @var string|null $filterOn Indicates whether a filter is applied to a column.
    */
    private ?string $filterOn = null;
    
    /**
     * @var WorkbookIcon|null $icon An icon applied to a cell via conditional formatting.
    */
    private ?WorkbookIcon $icon = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $operator An operator in a cell; for example, =, >, <, <=, or <>.
    */
    private ?string $operator = null;
    
    /**
     * Instantiates a new WorkbookFilterCriteria and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookFilterCriteria
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookFilterCriteria {
        return new WorkbookFilterCriteria();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the color property value. The color applied to the cell.
     * @return string|null
    */
    public function getColor(): ?string {
        return $this->color;
    }

    /**
     * Gets the criterion1 property value. A custom criterion.
     * @return string|null
    */
    public function getCriterion1(): ?string {
        return $this->criterion1;
    }

    /**
     * Gets the criterion2 property value. A custom criterion.
     * @return string|null
    */
    public function getCriterion2(): ?string {
        return $this->criterion2;
    }

    /**
     * Gets the dynamicCriteria property value. A dynamic formula specified in a custom filter.
     * @return string|null
    */
    public function getDynamicCriteria(): ?string {
        return $this->dynamicCriteria;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'color' => fn(ParseNode $n) => $o->setColor($n->getStringValue()),
            'criterion1' => fn(ParseNode $n) => $o->setCriterion1($n->getStringValue()),
            'criterion2' => fn(ParseNode $n) => $o->setCriterion2($n->getStringValue()),
            'dynamicCriteria' => fn(ParseNode $n) => $o->setDynamicCriteria($n->getStringValue()),
            'filterOn' => fn(ParseNode $n) => $o->setFilterOn($n->getStringValue()),
            'icon' => fn(ParseNode $n) => $o->setIcon($n->getObjectValue([WorkbookIcon::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'operator' => fn(ParseNode $n) => $o->setOperator($n->getStringValue()),
        ];
    }

    /**
     * Gets the filterOn property value. Indicates whether a filter is applied to a column.
     * @return string|null
    */
    public function getFilterOn(): ?string {
        return $this->filterOn;
    }

    /**
     * Gets the icon property value. An icon applied to a cell via conditional formatting.
     * @return WorkbookIcon|null
    */
    public function getIcon(): ?WorkbookIcon {
        return $this->icon;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the operator property value. An operator in a cell; for example, =, >, <, <=, or <>.
     * @return string|null
    */
    public function getOperator(): ?string {
        return $this->operator;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('color', $this->getColor());
        $writer->writeStringValue('criterion1', $this->getCriterion1());
        $writer->writeStringValue('criterion2', $this->getCriterion2());
        $writer->writeStringValue('dynamicCriteria', $this->getDynamicCriteria());
        $writer->writeStringValue('filterOn', $this->getFilterOn());
        $writer->writeObjectValue('icon', $this->getIcon());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('operator', $this->getOperator());
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
     * Sets the color property value. The color applied to the cell.
     * @param string|null $value Value to set for the color property.
    */
    public function setColor(?string $value): void {
        $this->color = $value;
    }

    /**
     * Sets the criterion1 property value. A custom criterion.
     * @param string|null $value Value to set for the criterion1 property.
    */
    public function setCriterion1(?string $value): void {
        $this->criterion1 = $value;
    }

    /**
     * Sets the criterion2 property value. A custom criterion.
     * @param string|null $value Value to set for the criterion2 property.
    */
    public function setCriterion2(?string $value): void {
        $this->criterion2 = $value;
    }

    /**
     * Sets the dynamicCriteria property value. A dynamic formula specified in a custom filter.
     * @param string|null $value Value to set for the dynamicCriteria property.
    */
    public function setDynamicCriteria(?string $value): void {
        $this->dynamicCriteria = $value;
    }

    /**
     * Sets the filterOn property value. Indicates whether a filter is applied to a column.
     * @param string|null $value Value to set for the filterOn property.
    */
    public function setFilterOn(?string $value): void {
        $this->filterOn = $value;
    }

    /**
     * Sets the icon property value. An icon applied to a cell via conditional formatting.
     * @param WorkbookIcon|null $value Value to set for the icon property.
    */
    public function setIcon(?WorkbookIcon $value): void {
        $this->icon = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the operator property value. An operator in a cell; for example, =, >, <, <=, or <>.
     * @param string|null $value Value to set for the operator property.
    */
    public function setOperator(?string $value): void {
        $this->operator = $value;
    }

}
