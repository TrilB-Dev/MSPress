<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ReflectCheckInResponse extends Entity implements Parsable 
{
    /**
     * @var string|null $checkInId Identifier for the Reflect check-in.
    */
    private ?string $checkInId = null;
    
    /**
     * @var string|null $checkInTitle The question or prompt of the Reflect check-in that this response addresses.
    */
    private ?string $checkInTitle = null;
    
    /**
     * @var string|null $classId ID of the class associated with the Reflect check-in.
    */
    private ?string $classId = null;
    
    /**
     * @var DateTime|null $createdDateTime Date and time when the Reflect check-in was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $creatorId ID of the user who created the Reflect check-in.
    */
    private ?string $creatorId = null;
    
    /**
     * @var bool|null $isClosed Indicates whether the Reflect check-in is closed (true) or open (false).
    */
    private ?bool $isClosed = null;
    
    /**
     * @var string|null $responderId ID of the user who responded to the Reflect check-in.
    */
    private ?string $responderId = null;
    
    /**
     * @var ResponseEmotionType|null $responseEmotion The responseEmotion property
    */
    private ?ResponseEmotionType $responseEmotion = null;
    
    /**
     * @var ResponseFeedbackType|null $responseFeedback The responseFeedback property
    */
    private ?ResponseFeedbackType $responseFeedback = null;
    
    /**
     * @var DateTime|null $submitDateTime Date and time when the response to the Reflect check-in was submitted. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $submitDateTime = null;
    
    /**
     * Instantiates a new ReflectCheckInResponse and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ReflectCheckInResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ReflectCheckInResponse {
        return new ReflectCheckInResponse();
    }

    /**
     * Gets the checkInId property value. Identifier for the Reflect check-in.
     * @return string|null
    */
    public function getCheckInId(): ?string {
        return $this->checkInId;
    }

    /**
     * Gets the checkInTitle property value. The question or prompt of the Reflect check-in that this response addresses.
     * @return string|null
    */
    public function getCheckInTitle(): ?string {
        return $this->checkInTitle;
    }

    /**
     * Gets the classId property value. ID of the class associated with the Reflect check-in.
     * @return string|null
    */
    public function getClassId(): ?string {
        return $this->classId;
    }

    /**
     * Gets the createdDateTime property value. Date and time when the Reflect check-in was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the creatorId property value. ID of the user who created the Reflect check-in.
     * @return string|null
    */
    public function getCreatorId(): ?string {
        return $this->creatorId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'checkInId' => fn(ParseNode $n) => $o->setCheckInId($n->getStringValue()),
            'checkInTitle' => fn(ParseNode $n) => $o->setCheckInTitle($n->getStringValue()),
            'classId' => fn(ParseNode $n) => $o->setClassId($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'creatorId' => fn(ParseNode $n) => $o->setCreatorId($n->getStringValue()),
            'isClosed' => fn(ParseNode $n) => $o->setIsClosed($n->getBooleanValue()),
            'responderId' => fn(ParseNode $n) => $o->setResponderId($n->getStringValue()),
            'responseEmotion' => fn(ParseNode $n) => $o->setResponseEmotion($n->getEnumValue(ResponseEmotionType::class)),
            'responseFeedback' => fn(ParseNode $n) => $o->setResponseFeedback($n->getEnumValue(ResponseFeedbackType::class)),
            'submitDateTime' => fn(ParseNode $n) => $o->setSubmitDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the isClosed property value. Indicates whether the Reflect check-in is closed (true) or open (false).
     * @return bool|null
    */
    public function getIsClosed(): ?bool {
        return $this->isClosed;
    }

    /**
     * Gets the responderId property value. ID of the user who responded to the Reflect check-in.
     * @return string|null
    */
    public function getResponderId(): ?string {
        return $this->responderId;
    }

    /**
     * Gets the responseEmotion property value. The responseEmotion property
     * @return ResponseEmotionType|null
    */
    public function getResponseEmotion(): ?ResponseEmotionType {
        return $this->responseEmotion;
    }

    /**
     * Gets the responseFeedback property value. The responseFeedback property
     * @return ResponseFeedbackType|null
    */
    public function getResponseFeedback(): ?ResponseFeedbackType {
        return $this->responseFeedback;
    }

    /**
     * Gets the submitDateTime property value. Date and time when the response to the Reflect check-in was submitted. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getSubmitDateTime(): ?DateTime {
        return $this->submitDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('checkInId', $this->getCheckInId());
        $writer->writeStringValue('checkInTitle', $this->getCheckInTitle());
        $writer->writeStringValue('classId', $this->getClassId());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('creatorId', $this->getCreatorId());
        $writer->writeBooleanValue('isClosed', $this->getIsClosed());
        $writer->writeStringValue('responderId', $this->getResponderId());
        $writer->writeEnumValue('responseEmotion', $this->getResponseEmotion());
        $writer->writeEnumValue('responseFeedback', $this->getResponseFeedback());
        $writer->writeDateTimeValue('submitDateTime', $this->getSubmitDateTime());
    }

    /**
     * Sets the checkInId property value. Identifier for the Reflect check-in.
     * @param string|null $value Value to set for the checkInId property.
    */
    public function setCheckInId(?string $value): void {
        $this->checkInId = $value;
    }

    /**
     * Sets the checkInTitle property value. The question or prompt of the Reflect check-in that this response addresses.
     * @param string|null $value Value to set for the checkInTitle property.
    */
    public function setCheckInTitle(?string $value): void {
        $this->checkInTitle = $value;
    }

    /**
     * Sets the classId property value. ID of the class associated with the Reflect check-in.
     * @param string|null $value Value to set for the classId property.
    */
    public function setClassId(?string $value): void {
        $this->classId = $value;
    }

    /**
     * Sets the createdDateTime property value. Date and time when the Reflect check-in was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the creatorId property value. ID of the user who created the Reflect check-in.
     * @param string|null $value Value to set for the creatorId property.
    */
    public function setCreatorId(?string $value): void {
        $this->creatorId = $value;
    }

    /**
     * Sets the isClosed property value. Indicates whether the Reflect check-in is closed (true) or open (false).
     * @param bool|null $value Value to set for the isClosed property.
    */
    public function setIsClosed(?bool $value): void {
        $this->isClosed = $value;
    }

    /**
     * Sets the responderId property value. ID of the user who responded to the Reflect check-in.
     * @param string|null $value Value to set for the responderId property.
    */
    public function setResponderId(?string $value): void {
        $this->responderId = $value;
    }

    /**
     * Sets the responseEmotion property value. The responseEmotion property
     * @param ResponseEmotionType|null $value Value to set for the responseEmotion property.
    */
    public function setResponseEmotion(?ResponseEmotionType $value): void {
        $this->responseEmotion = $value;
    }

    /**
     * Sets the responseFeedback property value. The responseFeedback property
     * @param ResponseFeedbackType|null $value Value to set for the responseFeedback property.
    */
    public function setResponseFeedback(?ResponseFeedbackType $value): void {
        $this->responseFeedback = $value;
    }

    /**
     * Sets the submitDateTime property value. Date and time when the response to the Reflect check-in was submitted. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the submitDateTime property.
    */
    public function setSubmitDateTime(?DateTime $value): void {
        $this->submitDateTime = $value;
    }

}
