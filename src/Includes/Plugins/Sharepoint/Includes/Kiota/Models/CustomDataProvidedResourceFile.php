<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CustomDataProvidedResourceFile extends Entity implements Parsable 
{
    /**
     * @var string|null $name Name of the uploaded file, including the file extension. Required.  Supports $filter (eq, ne)  and $orderby.
    */
    private ?string $name = null;
    
    /**
     * @var int|null $size Size of the file in bytes. Read-only.  Supports $filter (eq, ne, gt, ge, lt, le) and $orderby.
    */
    private ?int $size = null;
    
    /**
     * @var DateTime|null $uploadedDateTime Timestamp when the file was uploaded. Read-only.  Supports $filter (eq, ne, gt, ge, lt, le) and $orderby.
    */
    private ?DateTime $uploadedDateTime = null;
    
    /**
     * Instantiates a new CustomDataProvidedResourceFile and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CustomDataProvidedResourceFile
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CustomDataProvidedResourceFile {
        return new CustomDataProvidedResourceFile();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'size' => fn(ParseNode $n) => $o->setSize($n->getIntegerValue()),
            'uploadedDateTime' => fn(ParseNode $n) => $o->setUploadedDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the name property value. Name of the uploaded file, including the file extension. Required.  Supports $filter (eq, ne)  and $orderby.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the size property value. Size of the file in bytes. Read-only.  Supports $filter (eq, ne, gt, ge, lt, le) and $orderby.
     * @return int|null
    */
    public function getSize(): ?int {
        return $this->size;
    }

    /**
     * Gets the uploadedDateTime property value. Timestamp when the file was uploaded. Read-only.  Supports $filter (eq, ne, gt, ge, lt, le) and $orderby.
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
        $writer->writeStringValue('name', $this->getName());
        $writer->writeIntegerValue('size', $this->getSize());
        $writer->writeDateTimeValue('uploadedDateTime', $this->getUploadedDateTime());
    }

    /**
     * Sets the name property value. Name of the uploaded file, including the file extension. Required.  Supports $filter (eq, ne)  and $orderby.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the size property value. Size of the file in bytes. Read-only.  Supports $filter (eq, ne, gt, ge, lt, le) and $orderby.
     * @param int|null $value Value to set for the size property.
    */
    public function setSize(?int $value): void {
        $this->size = $value;
    }

    /**
     * Sets the uploadedDateTime property value. Timestamp when the file was uploaded. Read-only.  Supports $filter (eq, ne, gt, ge, lt, le) and $orderby.
     * @param DateTime|null $value Value to set for the uploadedDateTime property.
    */
    public function setUploadedDateTime(?DateTime $value): void {
        $this->uploadedDateTime = $value;
    }

}
