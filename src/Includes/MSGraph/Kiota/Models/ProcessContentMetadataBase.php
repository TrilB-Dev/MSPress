<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProcessContentMetadataBase implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ContentBase|null $content Represents the actual content, either as text (textContent) or binary data (binaryContent). Optional if metadata alone is sufficient for policy evaluation. Do not use for contentActivities.
    */
    private ?ContentBase $content = null;
    
    /**
     * @var ContentCategory|null $contentCategory The contentCategory property
    */
    private ?ContentCategory $contentCategory = null;
    
    /**
     * @var string|null $correlationId An identifier used to group multiple related content entries (for example, different parts of the same file upload, messages in a conversation).
    */
    private ?string $correlationId = null;
    
    /**
     * @var DateTime|null $createdDateTime Required. Timestamp indicating when the original content was created (for example, file creation time, message sent time).
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $identifier Required. A unique identifier for this specific content entry within the context of the calling application or enforcement plane (for example, message ID, file path/URL).
    */
    private ?string $identifier = null;
    
    /**
     * @var bool|null $isTruncated Required. Indicates if the provided content has been truncated from its original form (for example, due to size limits).
    */
    private ?bool $isTruncated = null;
    
    /**
     * @var int|null $length The length of the original content in bytes.
    */
    private ?int $length = null;
    
    /**
     * @var DateTime|null $modifiedDateTime Required. Timestamp indicating when the original content was last modified. For ephemeral content like messages, this might be the same as createdDateTime.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var string|null $name Required. A descriptive name for the content (for example, file name, web page title, 'Chat Message').
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var int|null $sequenceNumber A sequence number indicating the order in which content was generated or should be processed, required when correlationId is used.
    */
    private ?int $sequenceNumber = null;
    
    /**
     * Instantiates a new ProcessContentMetadataBase and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProcessContentMetadataBase
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProcessContentMetadataBase {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.processConversationMetadata': return new ProcessConversationMetadata();
                case '#microsoft.graph.processFileMetadata': return new ProcessFileMetadata();
            }
        }
        return new ProcessContentMetadataBase();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the content property value. Represents the actual content, either as text (textContent) or binary data (binaryContent). Optional if metadata alone is sufficient for policy evaluation. Do not use for contentActivities.
     * @return ContentBase|null
    */
    public function getContent(): ?ContentBase {
        return $this->content;
    }

    /**
     * Gets the contentCategory property value. The contentCategory property
     * @return ContentCategory|null
    */
    public function getContentCategory(): ?ContentCategory {
        return $this->contentCategory;
    }

    /**
     * Gets the correlationId property value. An identifier used to group multiple related content entries (for example, different parts of the same file upload, messages in a conversation).
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the createdDateTime property value. Required. Timestamp indicating when the original content was created (for example, file creation time, message sent time).
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
        return  [
            'content' => fn(ParseNode $n) => $o->setContent($n->getObjectValue([ContentBase::class, 'createFromDiscriminatorValue'])),
            'contentCategory' => fn(ParseNode $n) => $o->setContentCategory($n->getEnumValue(ContentCategory::class)),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'identifier' => fn(ParseNode $n) => $o->setIdentifier($n->getStringValue()),
            'isTruncated' => fn(ParseNode $n) => $o->setIsTruncated($n->getBooleanValue()),
            'length' => fn(ParseNode $n) => $o->setLength($n->getIntegerValue()),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'sequenceNumber' => fn(ParseNode $n) => $o->setSequenceNumber($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the identifier property value. Required. A unique identifier for this specific content entry within the context of the calling application or enforcement plane (for example, message ID, file path/URL).
     * @return string|null
    */
    public function getIdentifier(): ?string {
        return $this->identifier;
    }

    /**
     * Gets the isTruncated property value. Required. Indicates if the provided content has been truncated from its original form (for example, due to size limits).
     * @return bool|null
    */
    public function getIsTruncated(): ?bool {
        return $this->isTruncated;
    }

    /**
     * Gets the length property value. The length of the original content in bytes.
     * @return int|null
    */
    public function getLength(): ?int {
        return $this->length;
    }

    /**
     * Gets the modifiedDateTime property value. Required. Timestamp indicating when the original content was last modified. For ephemeral content like messages, this might be the same as createdDateTime.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the name property value. Required. A descriptive name for the content (for example, file name, web page title, 'Chat Message').
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the sequenceNumber property value. A sequence number indicating the order in which content was generated or should be processed, required when correlationId is used.
     * @return int|null
    */
    public function getSequenceNumber(): ?int {
        return $this->sequenceNumber;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('content', $this->getContent());
        $writer->writeEnumValue('contentCategory', $this->getContentCategory());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('identifier', $this->getIdentifier());
        $writer->writeBooleanValue('isTruncated', $this->getIsTruncated());
        $writer->writeIntegerValue('length', $this->getLength());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeIntegerValue('sequenceNumber', $this->getSequenceNumber());
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
     * Sets the content property value. Represents the actual content, either as text (textContent) or binary data (binaryContent). Optional if metadata alone is sufficient for policy evaluation. Do not use for contentActivities.
     * @param ContentBase|null $value Value to set for the content property.
    */
    public function setContent(?ContentBase $value): void {
        $this->content = $value;
    }

    /**
     * Sets the contentCategory property value. The contentCategory property
     * @param ContentCategory|null $value Value to set for the contentCategory property.
    */
    public function setContentCategory(?ContentCategory $value): void {
        $this->contentCategory = $value;
    }

    /**
     * Sets the correlationId property value. An identifier used to group multiple related content entries (for example, different parts of the same file upload, messages in a conversation).
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the createdDateTime property value. Required. Timestamp indicating when the original content was created (for example, file creation time, message sent time).
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the identifier property value. Required. A unique identifier for this specific content entry within the context of the calling application or enforcement plane (for example, message ID, file path/URL).
     * @param string|null $value Value to set for the identifier property.
    */
    public function setIdentifier(?string $value): void {
        $this->identifier = $value;
    }

    /**
     * Sets the isTruncated property value. Required. Indicates if the provided content has been truncated from its original form (for example, due to size limits).
     * @param bool|null $value Value to set for the isTruncated property.
    */
    public function setIsTruncated(?bool $value): void {
        $this->isTruncated = $value;
    }

    /**
     * Sets the length property value. The length of the original content in bytes.
     * @param int|null $value Value to set for the length property.
    */
    public function setLength(?int $value): void {
        $this->length = $value;
    }

    /**
     * Sets the modifiedDateTime property value. Required. Timestamp indicating when the original content was last modified. For ephemeral content like messages, this might be the same as createdDateTime.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the name property value. Required. A descriptive name for the content (for example, file name, web page title, 'Chat Message').
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the sequenceNumber property value. A sequence number indicating the order in which content was generated or should be processed, required when correlationId is used.
     * @param int|null $value Value to set for the sequenceNumber property.
    */
    public function setSequenceNumber(?int $value): void {
        $this->sequenceNumber = $value;
    }

}
