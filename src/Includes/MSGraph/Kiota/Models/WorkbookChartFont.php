<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WorkbookChartFont extends Entity implements Parsable 
{
    /**
     * @var bool|null $bold Indicates whether the fond is bold.
    */
    private ?bool $bold = null;
    
    /**
     * @var string|null $color The HTML color code representation of the text color. For example #FF0000 represents Red.
    */
    private ?string $color = null;
    
    /**
     * @var bool|null $italic Indicates whether the fond is italic.
    */
    private ?bool $italic = null;
    
    /**
     * @var string|null $name The font name. For example 'Calibri'.
    */
    private ?string $name = null;
    
    /**
     * @var float|null $size The size of the font. For example,  11.
    */
    private ?float $size = null;
    
    /**
     * @var string|null $underline The type of underlining applied to the font. The possible values are: None, Single.
    */
    private ?string $underline = null;
    
    /**
     * Instantiates a new WorkbookChartFont and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WorkbookChartFont
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WorkbookChartFont {
        return new WorkbookChartFont();
    }

    /**
     * Gets the bold property value. Indicates whether the fond is bold.
     * @return bool|null
    */
    public function getBold(): ?bool {
        return $this->bold;
    }

    /**
     * Gets the color property value. The HTML color code representation of the text color. For example #FF0000 represents Red.
     * @return string|null
    */
    public function getColor(): ?string {
        return $this->color;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'bold' => fn(ParseNode $n) => $o->setBold($n->getBooleanValue()),
            'color' => fn(ParseNode $n) => $o->setColor($n->getStringValue()),
            'italic' => fn(ParseNode $n) => $o->setItalic($n->getBooleanValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'size' => fn(ParseNode $n) => $o->setSize($n->getFloatValue()),
            'underline' => fn(ParseNode $n) => $o->setUnderline($n->getStringValue()),
        ]);
    }

    /**
     * Gets the italic property value. Indicates whether the fond is italic.
     * @return bool|null
    */
    public function getItalic(): ?bool {
        return $this->italic;
    }

    /**
     * Gets the name property value. The font name. For example 'Calibri'.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the size property value. The size of the font. For example,  11.
     * @return float|null
    */
    public function getSize(): ?float {
        return $this->size;
    }

    /**
     * Gets the underline property value. The type of underlining applied to the font. The possible values are: None, Single.
     * @return string|null
    */
    public function getUnderline(): ?string {
        return $this->underline;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('bold', $this->getBold());
        $writer->writeStringValue('color', $this->getColor());
        $writer->writeBooleanValue('italic', $this->getItalic());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeFloatValue('size', $this->getSize());
        $writer->writeStringValue('underline', $this->getUnderline());
    }

    /**
     * Sets the bold property value. Indicates whether the fond is bold.
     * @param bool|null $value Value to set for the bold property.
    */
    public function setBold(?bool $value): void {
        $this->bold = $value;
    }

    /**
     * Sets the color property value. The HTML color code representation of the text color. For example #FF0000 represents Red.
     * @param string|null $value Value to set for the color property.
    */
    public function setColor(?string $value): void {
        $this->color = $value;
    }

    /**
     * Sets the italic property value. Indicates whether the fond is italic.
     * @param bool|null $value Value to set for the italic property.
    */
    public function setItalic(?bool $value): void {
        $this->italic = $value;
    }

    /**
     * Sets the name property value. The font name. For example 'Calibri'.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the size property value. The size of the font. For example,  11.
     * @param float|null $value Value to set for the size property.
    */
    public function setSize(?float $value): void {
        $this->size = $value;
    }

    /**
     * Sets the underline property value. The type of underlining applied to the font. The possible values are: None, Single.
     * @param string|null $value Value to set for the underline property.
    */
    public function setUnderline(?string $value): void {
        $this->underline = $value;
    }

}
