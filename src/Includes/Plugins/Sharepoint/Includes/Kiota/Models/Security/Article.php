<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class Article extends Entity implements Parsable 
{
    /**
     * @var FormattedContent|null $body The body property
    */
    private ?FormattedContent $body = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when this article was created. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $imageUrl URL of the header image for this article, used for display purposes.
    */
    private ?string $imageUrl = null;
    
    /**
     * @var array<ArticleIndicator>|null $indicators Indicators related to this article.
    */
    private ?array $indicators = null;
    
    /**
     * @var bool|null $isFeatured Indicates whether this article is currently featured by Microsoft.
    */
    private ?bool $isFeatured = null;
    
    /**
     * @var DateTime|null $lastUpdatedDateTime The most recent date and time when this article was updated. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastUpdatedDateTime = null;
    
    /**
     * @var FormattedContent|null $summary The summary property
    */
    private ?FormattedContent $summary = null;
    
    /**
     * @var array<string>|null $tags Tags for this article, communicating keywords, or key concepts.
    */
    private ?array $tags = null;
    
    /**
     * @var string|null $title The title of this article.
    */
    private ?string $title = null;
    
    /**
     * Instantiates a new Article and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Article
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Article {
        return new Article();
    }

    /**
     * Gets the body property value. The body property
     * @return FormattedContent|null
    */
    public function getBody(): ?FormattedContent {
        return $this->body;
    }

    /**
     * Gets the createdDateTime property value. The date and time when this article was created. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'body' => fn(ParseNode $n) => $o->setBody($n->getObjectValue([FormattedContent::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'imageUrl' => fn(ParseNode $n) => $o->setImageUrl($n->getStringValue()),
            'indicators' => fn(ParseNode $n) => $o->setIndicators($n->getCollectionOfObjectValues([ArticleIndicator::class, 'createFromDiscriminatorValue'])),
            'isFeatured' => fn(ParseNode $n) => $o->setIsFeatured($n->getBooleanValue()),
            'lastUpdatedDateTime' => fn(ParseNode $n) => $o->setLastUpdatedDateTime($n->getDateTimeValue()),
            'summary' => fn(ParseNode $n) => $o->setSummary($n->getObjectValue([FormattedContent::class, 'createFromDiscriminatorValue'])),
            'tags' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTags($val);
            },
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
        ]);
    }

    /**
     * Gets the imageUrl property value. URL of the header image for this article, used for display purposes.
     * @return string|null
    */
    public function getImageUrl(): ?string {
        return $this->imageUrl;
    }

    /**
     * Gets the indicators property value. Indicators related to this article.
     * @return array<ArticleIndicator>|null
    */
    public function getIndicators(): ?array {
        return $this->indicators;
    }

    /**
     * Gets the isFeatured property value. Indicates whether this article is currently featured by Microsoft.
     * @return bool|null
    */
    public function getIsFeatured(): ?bool {
        return $this->isFeatured;
    }

    /**
     * Gets the lastUpdatedDateTime property value. The most recent date and time when this article was updated. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastUpdatedDateTime(): ?DateTime {
        return $this->lastUpdatedDateTime;
    }

    /**
     * Gets the summary property value. The summary property
     * @return FormattedContent|null
    */
    public function getSummary(): ?FormattedContent {
        return $this->summary;
    }

    /**
     * Gets the tags property value. Tags for this article, communicating keywords, or key concepts.
     * @return array<string>|null
    */
    public function getTags(): ?array {
        return $this->tags;
    }

    /**
     * Gets the title property value. The title of this article.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('body', $this->getBody());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('imageUrl', $this->getImageUrl());
        $writer->writeCollectionOfObjectValues('indicators', $this->getIndicators());
        $writer->writeBooleanValue('isFeatured', $this->getIsFeatured());
        $writer->writeDateTimeValue('lastUpdatedDateTime', $this->getLastUpdatedDateTime());
        $writer->writeObjectValue('summary', $this->getSummary());
        $writer->writeCollectionOfPrimitiveValues('tags', $this->getTags());
        $writer->writeStringValue('title', $this->getTitle());
    }

    /**
     * Sets the body property value. The body property
     * @param FormattedContent|null $value Value to set for the body property.
    */
    public function setBody(?FormattedContent $value): void {
        $this->body = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when this article was created. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the imageUrl property value. URL of the header image for this article, used for display purposes.
     * @param string|null $value Value to set for the imageUrl property.
    */
    public function setImageUrl(?string $value): void {
        $this->imageUrl = $value;
    }

    /**
     * Sets the indicators property value. Indicators related to this article.
     * @param array<ArticleIndicator>|null $value Value to set for the indicators property.
    */
    public function setIndicators(?array $value): void {
        $this->indicators = $value;
    }

    /**
     * Sets the isFeatured property value. Indicates whether this article is currently featured by Microsoft.
     * @param bool|null $value Value to set for the isFeatured property.
    */
    public function setIsFeatured(?bool $value): void {
        $this->isFeatured = $value;
    }

    /**
     * Sets the lastUpdatedDateTime property value. The most recent date and time when this article was updated. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastUpdatedDateTime property.
    */
    public function setLastUpdatedDateTime(?DateTime $value): void {
        $this->lastUpdatedDateTime = $value;
    }

    /**
     * Sets the summary property value. The summary property
     * @param FormattedContent|null $value Value to set for the summary property.
    */
    public function setSummary(?FormattedContent $value): void {
        $this->summary = $value;
    }

    /**
     * Sets the tags property value. Tags for this article, communicating keywords, or key concepts.
     * @param array<string>|null $value Value to set for the tags property.
    */
    public function setTags(?array $value): void {
        $this->tags = $value;
    }

    /**
     * Sets the title property value. The title of this article.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

}
