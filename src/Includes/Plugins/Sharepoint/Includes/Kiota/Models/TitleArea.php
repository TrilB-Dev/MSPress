<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class TitleArea implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $alternativeText Alternative text on the title area.
    */
    private ?string $alternativeText = null;
    
    /**
     * @var bool|null $enableGradientEffect Indicates whether the title area has a gradient effect enabled.
    */
    private ?bool $enableGradientEffect = null;
    
    /**
     * @var string|null $imageWebUrl URL of the image in the title area.
    */
    private ?string $imageWebUrl = null;
    
    /**
     * @var TitleAreaLayoutType|null $layout Enumeration value that indicates the layout of the title area. The possible values are: imageAndTitle, plain, colorBlock, overlap, unknownFutureValue.
    */
    private ?TitleAreaLayoutType $layout = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ServerProcessedContent|null $serverProcessedContent Contains collections of data that can be processed by server side services like search index and link fixup.
    */
    private ?ServerProcessedContent $serverProcessedContent = null;
    
    /**
     * @var bool|null $showAuthor Indicates whether the author should be shown in title area.
    */
    private ?bool $showAuthor = null;
    
    /**
     * @var bool|null $showPublishedDate Indicates whether the published date should be shown in title area.
    */
    private ?bool $showPublishedDate = null;
    
    /**
     * @var bool|null $showTextBlockAboveTitle Indicates whether the text block above title should be shown in title area.
    */
    private ?bool $showTextBlockAboveTitle = null;
    
    /**
     * @var string|null $textAboveTitle The text above title line.
    */
    private ?string $textAboveTitle = null;
    
    /**
     * @var TitleAreaTextAlignmentType|null $textAlignment Enumeration value that indicates the text alignment of the title area. The possible values are: left, center, unknownFutureValue.
    */
    private ?TitleAreaTextAlignmentType $textAlignment = null;
    
    /**
     * Instantiates a new TitleArea and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TitleArea
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TitleArea {
        return new TitleArea();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the alternativeText property value. Alternative text on the title area.
     * @return string|null
    */
    public function getAlternativeText(): ?string {
        return $this->alternativeText;
    }

    /**
     * Gets the enableGradientEffect property value. Indicates whether the title area has a gradient effect enabled.
     * @return bool|null
    */
    public function getEnableGradientEffect(): ?bool {
        return $this->enableGradientEffect;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'alternativeText' => fn(ParseNode $n) => $o->setAlternativeText($n->getStringValue()),
            'enableGradientEffect' => fn(ParseNode $n) => $o->setEnableGradientEffect($n->getBooleanValue()),
            'imageWebUrl' => fn(ParseNode $n) => $o->setImageWebUrl($n->getStringValue()),
            'layout' => fn(ParseNode $n) => $o->setLayout($n->getEnumValue(TitleAreaLayoutType::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'serverProcessedContent' => fn(ParseNode $n) => $o->setServerProcessedContent($n->getObjectValue([ServerProcessedContent::class, 'createFromDiscriminatorValue'])),
            'showAuthor' => fn(ParseNode $n) => $o->setShowAuthor($n->getBooleanValue()),
            'showPublishedDate' => fn(ParseNode $n) => $o->setShowPublishedDate($n->getBooleanValue()),
            'showTextBlockAboveTitle' => fn(ParseNode $n) => $o->setShowTextBlockAboveTitle($n->getBooleanValue()),
            'textAboveTitle' => fn(ParseNode $n) => $o->setTextAboveTitle($n->getStringValue()),
            'textAlignment' => fn(ParseNode $n) => $o->setTextAlignment($n->getEnumValue(TitleAreaTextAlignmentType::class)),
        ];
    }

    /**
     * Gets the imageWebUrl property value. URL of the image in the title area.
     * @return string|null
    */
    public function getImageWebUrl(): ?string {
        return $this->imageWebUrl;
    }

    /**
     * Gets the layout property value. Enumeration value that indicates the layout of the title area. The possible values are: imageAndTitle, plain, colorBlock, overlap, unknownFutureValue.
     * @return TitleAreaLayoutType|null
    */
    public function getLayout(): ?TitleAreaLayoutType {
        return $this->layout;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the serverProcessedContent property value. Contains collections of data that can be processed by server side services like search index and link fixup.
     * @return ServerProcessedContent|null
    */
    public function getServerProcessedContent(): ?ServerProcessedContent {
        return $this->serverProcessedContent;
    }

    /**
     * Gets the showAuthor property value. Indicates whether the author should be shown in title area.
     * @return bool|null
    */
    public function getShowAuthor(): ?bool {
        return $this->showAuthor;
    }

    /**
     * Gets the showPublishedDate property value. Indicates whether the published date should be shown in title area.
     * @return bool|null
    */
    public function getShowPublishedDate(): ?bool {
        return $this->showPublishedDate;
    }

    /**
     * Gets the showTextBlockAboveTitle property value. Indicates whether the text block above title should be shown in title area.
     * @return bool|null
    */
    public function getShowTextBlockAboveTitle(): ?bool {
        return $this->showTextBlockAboveTitle;
    }

    /**
     * Gets the textAboveTitle property value. The text above title line.
     * @return string|null
    */
    public function getTextAboveTitle(): ?string {
        return $this->textAboveTitle;
    }

    /**
     * Gets the textAlignment property value. Enumeration value that indicates the text alignment of the title area. The possible values are: left, center, unknownFutureValue.
     * @return TitleAreaTextAlignmentType|null
    */
    public function getTextAlignment(): ?TitleAreaTextAlignmentType {
        return $this->textAlignment;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('alternativeText', $this->getAlternativeText());
        $writer->writeBooleanValue('enableGradientEffect', $this->getEnableGradientEffect());
        $writer->writeStringValue('imageWebUrl', $this->getImageWebUrl());
        $writer->writeEnumValue('layout', $this->getLayout());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('serverProcessedContent', $this->getServerProcessedContent());
        $writer->writeBooleanValue('showAuthor', $this->getShowAuthor());
        $writer->writeBooleanValue('showPublishedDate', $this->getShowPublishedDate());
        $writer->writeBooleanValue('showTextBlockAboveTitle', $this->getShowTextBlockAboveTitle());
        $writer->writeStringValue('textAboveTitle', $this->getTextAboveTitle());
        $writer->writeEnumValue('textAlignment', $this->getTextAlignment());
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
     * Sets the alternativeText property value. Alternative text on the title area.
     * @param string|null $value Value to set for the alternativeText property.
    */
    public function setAlternativeText(?string $value): void {
        $this->alternativeText = $value;
    }

    /**
     * Sets the enableGradientEffect property value. Indicates whether the title area has a gradient effect enabled.
     * @param bool|null $value Value to set for the enableGradientEffect property.
    */
    public function setEnableGradientEffect(?bool $value): void {
        $this->enableGradientEffect = $value;
    }

    /**
     * Sets the imageWebUrl property value. URL of the image in the title area.
     * @param string|null $value Value to set for the imageWebUrl property.
    */
    public function setImageWebUrl(?string $value): void {
        $this->imageWebUrl = $value;
    }

    /**
     * Sets the layout property value. Enumeration value that indicates the layout of the title area. The possible values are: imageAndTitle, plain, colorBlock, overlap, unknownFutureValue.
     * @param TitleAreaLayoutType|null $value Value to set for the layout property.
    */
    public function setLayout(?TitleAreaLayoutType $value): void {
        $this->layout = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the serverProcessedContent property value. Contains collections of data that can be processed by server side services like search index and link fixup.
     * @param ServerProcessedContent|null $value Value to set for the serverProcessedContent property.
    */
    public function setServerProcessedContent(?ServerProcessedContent $value): void {
        $this->serverProcessedContent = $value;
    }

    /**
     * Sets the showAuthor property value. Indicates whether the author should be shown in title area.
     * @param bool|null $value Value to set for the showAuthor property.
    */
    public function setShowAuthor(?bool $value): void {
        $this->showAuthor = $value;
    }

    /**
     * Sets the showPublishedDate property value. Indicates whether the published date should be shown in title area.
     * @param bool|null $value Value to set for the showPublishedDate property.
    */
    public function setShowPublishedDate(?bool $value): void {
        $this->showPublishedDate = $value;
    }

    /**
     * Sets the showTextBlockAboveTitle property value. Indicates whether the text block above title should be shown in title area.
     * @param bool|null $value Value to set for the showTextBlockAboveTitle property.
    */
    public function setShowTextBlockAboveTitle(?bool $value): void {
        $this->showTextBlockAboveTitle = $value;
    }

    /**
     * Sets the textAboveTitle property value. The text above title line.
     * @param string|null $value Value to set for the textAboveTitle property.
    */
    public function setTextAboveTitle(?string $value): void {
        $this->textAboveTitle = $value;
    }

    /**
     * Sets the textAlignment property value. Enumeration value that indicates the text alignment of the title area. The possible values are: left, center, unknownFutureValue.
     * @param TitleAreaTextAlignmentType|null $value Value to set for the textAlignment property.
    */
    public function setTextAlignment(?TitleAreaTextAlignmentType $value): void {
        $this->textAlignment = $value;
    }

}
