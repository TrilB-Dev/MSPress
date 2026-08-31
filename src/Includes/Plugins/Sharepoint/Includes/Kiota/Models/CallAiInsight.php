<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CallAiInsight extends Entity implements Parsable 
{
    /**
     * @var array<ActionItem>|null $actionItems The actionItems property
    */
    private ?array $actionItems = null;
    
    /**
     * @var string|null $callId The callId property
    */
    private ?string $callId = null;
    
    /**
     * @var string|null $contentCorrelationId The contentCorrelationId property
    */
    private ?string $contentCorrelationId = null;
    
    /**
     * @var DateTime|null $createdDateTime The createdDateTime property
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var DateTime|null $endDateTime The endDateTime property
    */
    private ?DateTime $endDateTime = null;
    
    /**
     * @var array<MeetingNote>|null $meetingNotes The meetingNotes property
    */
    private ?array $meetingNotes = null;
    
    /**
     * @var CallAiInsightViewPoint|null $viewpoint The viewpoint property
    */
    private ?CallAiInsightViewPoint $viewpoint = null;
    
    /**
     * Instantiates a new CallAiInsight and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CallAiInsight
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CallAiInsight {
        return new CallAiInsight();
    }

    /**
     * Gets the actionItems property value. The actionItems property
     * @return array<ActionItem>|null
    */
    public function getActionItems(): ?array {
        return $this->actionItems;
    }

    /**
     * Gets the callId property value. The callId property
     * @return string|null
    */
    public function getCallId(): ?string {
        return $this->callId;
    }

    /**
     * Gets the contentCorrelationId property value. The contentCorrelationId property
     * @return string|null
    */
    public function getContentCorrelationId(): ?string {
        return $this->contentCorrelationId;
    }

    /**
     * Gets the createdDateTime property value. The createdDateTime property
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the endDateTime property value. The endDateTime property
     * @return DateTime|null
    */
    public function getEndDateTime(): ?DateTime {
        return $this->endDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'actionItems' => fn(ParseNode $n) => $o->setActionItems($n->getCollectionOfObjectValues([ActionItem::class, 'createFromDiscriminatorValue'])),
            'callId' => fn(ParseNode $n) => $o->setCallId($n->getStringValue()),
            'contentCorrelationId' => fn(ParseNode $n) => $o->setContentCorrelationId($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'endDateTime' => fn(ParseNode $n) => $o->setEndDateTime($n->getDateTimeValue()),
            'meetingNotes' => fn(ParseNode $n) => $o->setMeetingNotes($n->getCollectionOfObjectValues([MeetingNote::class, 'createFromDiscriminatorValue'])),
            'viewpoint' => fn(ParseNode $n) => $o->setViewpoint($n->getObjectValue([CallAiInsightViewPoint::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the meetingNotes property value. The meetingNotes property
     * @return array<MeetingNote>|null
    */
    public function getMeetingNotes(): ?array {
        return $this->meetingNotes;
    }

    /**
     * Gets the viewpoint property value. The viewpoint property
     * @return CallAiInsightViewPoint|null
    */
    public function getViewpoint(): ?CallAiInsightViewPoint {
        return $this->viewpoint;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('actionItems', $this->getActionItems());
        $writer->writeStringValue('callId', $this->getCallId());
        $writer->writeStringValue('contentCorrelationId', $this->getContentCorrelationId());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeDateTimeValue('endDateTime', $this->getEndDateTime());
        $writer->writeCollectionOfObjectValues('meetingNotes', $this->getMeetingNotes());
        $writer->writeObjectValue('viewpoint', $this->getViewpoint());
    }

    /**
     * Sets the actionItems property value. The actionItems property
     * @param array<ActionItem>|null $value Value to set for the actionItems property.
    */
    public function setActionItems(?array $value): void {
        $this->actionItems = $value;
    }

    /**
     * Sets the callId property value. The callId property
     * @param string|null $value Value to set for the callId property.
    */
    public function setCallId(?string $value): void {
        $this->callId = $value;
    }

    /**
     * Sets the contentCorrelationId property value. The contentCorrelationId property
     * @param string|null $value Value to set for the contentCorrelationId property.
    */
    public function setContentCorrelationId(?string $value): void {
        $this->contentCorrelationId = $value;
    }

    /**
     * Sets the createdDateTime property value. The createdDateTime property
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the endDateTime property value. The endDateTime property
     * @param DateTime|null $value Value to set for the endDateTime property.
    */
    public function setEndDateTime(?DateTime $value): void {
        $this->endDateTime = $value;
    }

    /**
     * Sets the meetingNotes property value. The meetingNotes property
     * @param array<MeetingNote>|null $value Value to set for the meetingNotes property.
    */
    public function setMeetingNotes(?array $value): void {
        $this->meetingNotes = $value;
    }

    /**
     * Sets the viewpoint property value. The viewpoint property
     * @param CallAiInsightViewPoint|null $value Value to set for the viewpoint property.
    */
    public function setViewpoint(?CallAiInsightViewPoint $value): void {
        $this->viewpoint = $value;
    }

}
