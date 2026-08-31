<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SitePage extends BaseSitePage implements Parsable 
{
    /**
     * @var CanvasLayout|null $canvasLayout Indicates the layout of the content in a given SharePoint page, including horizontal sections and vertical sections.
    */
    private ?CanvasLayout $canvasLayout = null;
    
    /**
     * @var PagePromotionType|null $promotionKind Indicates the promotion kind of the sitePage. The possible values are: microsoftReserved, page, newsPost, unknownFutureValue.
    */
    private ?PagePromotionType $promotionKind = null;
    
    /**
     * @var ReactionsFacet|null $reactions Reactions information for the page.
    */
    private ?ReactionsFacet $reactions = null;
    
    /**
     * @var bool|null $showComments Determines whether or not to show comments at the bottom of the page.
    */
    private ?bool $showComments = null;
    
    /**
     * @var bool|null $showRecommendedPages Determines whether or not to show recommended pages at the bottom of the page.
    */
    private ?bool $showRecommendedPages = null;
    
    /**
     * @var string|null $thumbnailWebUrl Url of the sitePage's thumbnail image
    */
    private ?string $thumbnailWebUrl = null;
    
    /**
     * @var TitleArea|null $titleArea Title area on the SharePoint page.
    */
    private ?TitleArea $titleArea = null;
    
    /**
     * @var array<WebPart>|null $webParts Collection of webparts on the SharePoint page.
    */
    private ?array $webParts = null;
    
    /**
     * Instantiates a new SitePage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SitePage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SitePage {
        return new SitePage();
    }

    /**
     * Gets the canvasLayout property value. Indicates the layout of the content in a given SharePoint page, including horizontal sections and vertical sections.
     * @return CanvasLayout|null
    */
    public function getCanvasLayout(): ?CanvasLayout {
        return $this->canvasLayout;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'canvasLayout' => fn(ParseNode $n) => $o->setCanvasLayout($n->getObjectValue([CanvasLayout::class, 'createFromDiscriminatorValue'])),
            'promotionKind' => fn(ParseNode $n) => $o->setPromotionKind($n->getEnumValue(PagePromotionType::class)),
            'reactions' => fn(ParseNode $n) => $o->setReactions($n->getObjectValue([ReactionsFacet::class, 'createFromDiscriminatorValue'])),
            'showComments' => fn(ParseNode $n) => $o->setShowComments($n->getBooleanValue()),
            'showRecommendedPages' => fn(ParseNode $n) => $o->setShowRecommendedPages($n->getBooleanValue()),
            'thumbnailWebUrl' => fn(ParseNode $n) => $o->setThumbnailWebUrl($n->getStringValue()),
            'titleArea' => fn(ParseNode $n) => $o->setTitleArea($n->getObjectValue([TitleArea::class, 'createFromDiscriminatorValue'])),
            'webParts' => fn(ParseNode $n) => $o->setWebParts($n->getCollectionOfObjectValues([WebPart::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the promotionKind property value. Indicates the promotion kind of the sitePage. The possible values are: microsoftReserved, page, newsPost, unknownFutureValue.
     * @return PagePromotionType|null
    */
    public function getPromotionKind(): ?PagePromotionType {
        return $this->promotionKind;
    }

    /**
     * Gets the reactions property value. Reactions information for the page.
     * @return ReactionsFacet|null
    */
    public function getReactions(): ?ReactionsFacet {
        return $this->reactions;
    }

    /**
     * Gets the showComments property value. Determines whether or not to show comments at the bottom of the page.
     * @return bool|null
    */
    public function getShowComments(): ?bool {
        return $this->showComments;
    }

    /**
     * Gets the showRecommendedPages property value. Determines whether or not to show recommended pages at the bottom of the page.
     * @return bool|null
    */
    public function getShowRecommendedPages(): ?bool {
        return $this->showRecommendedPages;
    }

    /**
     * Gets the thumbnailWebUrl property value. Url of the sitePage's thumbnail image
     * @return string|null
    */
    public function getThumbnailWebUrl(): ?string {
        return $this->thumbnailWebUrl;
    }

    /**
     * Gets the titleArea property value. Title area on the SharePoint page.
     * @return TitleArea|null
    */
    public function getTitleArea(): ?TitleArea {
        return $this->titleArea;
    }

    /**
     * Gets the webParts property value. Collection of webparts on the SharePoint page.
     * @return array<WebPart>|null
    */
    public function getWebParts(): ?array {
        return $this->webParts;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('canvasLayout', $this->getCanvasLayout());
        $writer->writeEnumValue('promotionKind', $this->getPromotionKind());
        $writer->writeObjectValue('reactions', $this->getReactions());
        $writer->writeBooleanValue('showComments', $this->getShowComments());
        $writer->writeBooleanValue('showRecommendedPages', $this->getShowRecommendedPages());
        $writer->writeStringValue('thumbnailWebUrl', $this->getThumbnailWebUrl());
        $writer->writeObjectValue('titleArea', $this->getTitleArea());
        $writer->writeCollectionOfObjectValues('webParts', $this->getWebParts());
    }

    /**
     * Sets the canvasLayout property value. Indicates the layout of the content in a given SharePoint page, including horizontal sections and vertical sections.
     * @param CanvasLayout|null $value Value to set for the canvasLayout property.
    */
    public function setCanvasLayout(?CanvasLayout $value): void {
        $this->canvasLayout = $value;
    }

    /**
     * Sets the promotionKind property value. Indicates the promotion kind of the sitePage. The possible values are: microsoftReserved, page, newsPost, unknownFutureValue.
     * @param PagePromotionType|null $value Value to set for the promotionKind property.
    */
    public function setPromotionKind(?PagePromotionType $value): void {
        $this->promotionKind = $value;
    }

    /**
     * Sets the reactions property value. Reactions information for the page.
     * @param ReactionsFacet|null $value Value to set for the reactions property.
    */
    public function setReactions(?ReactionsFacet $value): void {
        $this->reactions = $value;
    }

    /**
     * Sets the showComments property value. Determines whether or not to show comments at the bottom of the page.
     * @param bool|null $value Value to set for the showComments property.
    */
    public function setShowComments(?bool $value): void {
        $this->showComments = $value;
    }

    /**
     * Sets the showRecommendedPages property value. Determines whether or not to show recommended pages at the bottom of the page.
     * @param bool|null $value Value to set for the showRecommendedPages property.
    */
    public function setShowRecommendedPages(?bool $value): void {
        $this->showRecommendedPages = $value;
    }

    /**
     * Sets the thumbnailWebUrl property value. Url of the sitePage's thumbnail image
     * @param string|null $value Value to set for the thumbnailWebUrl property.
    */
    public function setThumbnailWebUrl(?string $value): void {
        $this->thumbnailWebUrl = $value;
    }

    /**
     * Sets the titleArea property value. Title area on the SharePoint page.
     * @param TitleArea|null $value Value to set for the titleArea property.
    */
    public function setTitleArea(?TitleArea $value): void {
        $this->titleArea = $value;
    }

    /**
     * Sets the webParts property value. Collection of webparts on the SharePoint page.
     * @param array<WebPart>|null $value Value to set for the webParts property.
    */
    public function setWebParts(?array $value): void {
        $this->webParts = $value;
    }

}
