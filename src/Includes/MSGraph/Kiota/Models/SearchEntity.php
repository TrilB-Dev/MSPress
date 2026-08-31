<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Search\Acronym;
use MSPress\Includes\MSGraph\Kiota\Models\Search\Bookmark;
use MSPress\Includes\MSGraph\Kiota\Models\Search\Qna;

class SearchEntity extends Entity implements Parsable 
{
    /**
     * @var array<Acronym>|null $acronyms Administrative answer in Microsoft Search results to define common acronyms in an organization.
    */
    private ?array $acronyms = null;
    
    /**
     * @var array<Bookmark>|null $bookmarks Administrative answer in Microsoft Search results for common search queries in an organization.
    */
    private ?array $bookmarks = null;
    
    /**
     * @var array<Qna>|null $qnas Administrative answer in Microsoft Search results that provide answers for specific search keywords in an organization.
    */
    private ?array $qnas = null;
    
    /**
     * Instantiates a new SearchEntity and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SearchEntity
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SearchEntity {
        return new SearchEntity();
    }

    /**
     * Gets the acronyms property value. Administrative answer in Microsoft Search results to define common acronyms in an organization.
     * @return array<Acronym>|null
    */
    public function getAcronyms(): ?array {
        return $this->acronyms;
    }

    /**
     * Gets the bookmarks property value. Administrative answer in Microsoft Search results for common search queries in an organization.
     * @return array<Bookmark>|null
    */
    public function getBookmarks(): ?array {
        return $this->bookmarks;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'acronyms' => fn(ParseNode $n) => $o->setAcronyms($n->getCollectionOfObjectValues([Acronym::class, 'createFromDiscriminatorValue'])),
            'bookmarks' => fn(ParseNode $n) => $o->setBookmarks($n->getCollectionOfObjectValues([Bookmark::class, 'createFromDiscriminatorValue'])),
            'qnas' => fn(ParseNode $n) => $o->setQnas($n->getCollectionOfObjectValues([Qna::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the qnas property value. Administrative answer in Microsoft Search results that provide answers for specific search keywords in an organization.
     * @return array<Qna>|null
    */
    public function getQnas(): ?array {
        return $this->qnas;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('acronyms', $this->getAcronyms());
        $writer->writeCollectionOfObjectValues('bookmarks', $this->getBookmarks());
        $writer->writeCollectionOfObjectValues('qnas', $this->getQnas());
    }

    /**
     * Sets the acronyms property value. Administrative answer in Microsoft Search results to define common acronyms in an organization.
     * @param array<Acronym>|null $value Value to set for the acronyms property.
    */
    public function setAcronyms(?array $value): void {
        $this->acronyms = $value;
    }

    /**
     * Sets the bookmarks property value. Administrative answer in Microsoft Search results for common search queries in an organization.
     * @param array<Bookmark>|null $value Value to set for the bookmarks property.
    */
    public function setBookmarks(?array $value): void {
        $this->bookmarks = $value;
    }

    /**
     * Sets the qnas property value. Administrative answer in Microsoft Search results that provide answers for specific search keywords in an organization.
     * @param array<Qna>|null $value Value to set for the qnas property.
    */
    public function setQnas(?array $value): void {
        $this->qnas = $value;
    }

}
