<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PrintDocument extends Entity implements Parsable 
{
    /**
     * @var string|null $contentType The document's content (MIME) type. Read-only.
    */
    private ?string $contentType = null;
    
    /**
     * @var string|null $displayName The document's name. Read-only.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $downloadedDateTime The time the document was downloaded. Read-only
    */
    private ?DateTime $downloadedDateTime = null;
    
    /**
     * @var int|null $size The document's size in bytes. Read-only.
    */
    private ?int $size = null;
    
    /**
     * @var DateTime|null $uploadedDateTime The time the document was uploaded. Read-only
    */
    private ?DateTime $uploadedDateTime = null;
    
    /**
     * Instantiates a new PrintDocument and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PrintDocument
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PrintDocument {
        return new PrintDocument();
    }

    /**
     * Gets the contentType property value. The document's content (MIME) type. Read-only.
     * @return string|null
    */
    public function getContentType(): ?string {
        return $this->contentType;
    }

    /**
     * Gets the displayName property value. The document's name. Read-only.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the downloadedDateTime property value. The time the document was downloaded. Read-only
     * @return DateTime|null
    */
    public function getDownloadedDateTime(): ?DateTime {
        return $this->downloadedDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'contentType' => fn(ParseNode $n) => $o->setContentType($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'downloadedDateTime' => fn(ParseNode $n) => $o->setDownloadedDateTime($n->getDateTimeValue()),
            'size' => fn(ParseNode $n) => $o->setSize($n->getIntegerValue()),
            'uploadedDateTime' => fn(ParseNode $n) => $o->setUploadedDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the size property value. The document's size in bytes. Read-only.
     * @return int|null
    */
    public function getSize(): ?int {
        return $this->size;
    }

    /**
     * Gets the uploadedDateTime property value. The time the document was uploaded. Read-only
     * @return DateTime|null
    */
    public function getUploadedDateTime(): ?DateTime {
        return $this->uploadedDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('contentType', $this->getContentType());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('downloadedDateTime', $this->getDownloadedDateTime());
        $writer->writeIntegerValue('size', $this->getSize());
        $writer->writeDateTimeValue('uploadedDateTime', $this->getUploadedDateTime());
    }

    /**
     * Sets the contentType property value. The document's content (MIME) type. Read-only.
     * @param string|null $value Value to set for the contentType property.
    */
    public function setContentType(?string $value): void {
        $this->contentType = $value;
    }

    /**
     * Sets the displayName property value. The document's name. Read-only.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the downloadedDateTime property value. The time the document was downloaded. Read-only
     * @param DateTime|null $value Value to set for the downloadedDateTime property.
    */
    public function setDownloadedDateTime(?DateTime $value): void {
        $this->downloadedDateTime = $value;
    }

    /**
     * Sets the size property value. The document's size in bytes. Read-only.
     * @param int|null $value Value to set for the size property.
    */
    public function setSize(?int $value): void {
        $this->size = $value;
    }

    /**
     * Sets the uploadedDateTime property value. The time the document was uploaded. Read-only
     * @param DateTime|null $value Value to set for the uploadedDateTime property.
    */
    public function setUploadedDateTime(?DateTime $value): void {
        $this->uploadedDateTime = $value;
    }

}
