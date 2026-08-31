<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class LandingPageDetail extends Entity implements Parsable 
{
    /**
     * @var string|null $content Landing page detail content.
    */
    private ?string $content = null;
    
    /**
     * @var bool|null $isDefaultLangauge Indicates whether this language detail is default for the landing page.
    */
    private ?bool $isDefaultLangauge = null;
    
    /**
     * @var string|null $language The content language for the landing page.
    */
    private ?string $language = null;
    
    /**
     * Instantiates a new LandingPageDetail and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LandingPageDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LandingPageDetail {
        return new LandingPageDetail();
    }

    /**
     * Gets the content property value. Landing page detail content.
     * @return string|null
    */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'content' => fn(ParseNode $n) => $o->setContent($n->getStringValue()),
            'isDefaultLangauge' => fn(ParseNode $n) => $o->setIsDefaultLangauge($n->getBooleanValue()),
            'language' => fn(ParseNode $n) => $o->setLanguage($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isDefaultLangauge property value. Indicates whether this language detail is default for the landing page.
     * @return bool|null
    */
    public function getIsDefaultLangauge(): ?bool {
        return $this->isDefaultLangauge;
    }

    /**
     * Gets the language property value. The content language for the landing page.
     * @return string|null
    */
    public function getLanguage(): ?string {
        return $this->language;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('content', $this->getContent());
        $writer->writeBooleanValue('isDefaultLangauge', $this->getIsDefaultLangauge());
        $writer->writeStringValue('language', $this->getLanguage());
    }

    /**
     * Sets the content property value. Landing page detail content.
     * @param string|null $value Value to set for the content property.
    */
    public function setContent(?string $value): void {
        $this->content = $value;
    }

    /**
     * Sets the isDefaultLangauge property value. Indicates whether this language detail is default for the landing page.
     * @param bool|null $value Value to set for the isDefaultLangauge property.
    */
    public function setIsDefaultLangauge(?bool $value): void {
        $this->isDefaultLangauge = $value;
    }

    /**
     * Sets the language property value. The content language for the landing page.
     * @param string|null $value Value to set for the language property.
    */
    public function setLanguage(?string $value): void {
        $this->language = $value;
    }

}
