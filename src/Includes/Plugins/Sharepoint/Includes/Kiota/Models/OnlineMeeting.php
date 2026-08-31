<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Psr\Http\Message\StreamInterface;

class OnlineMeeting extends OnlineMeetingBase implements Parsable 
{
    /**
     * @var StreamInterface|null $attendeeReport The content stream of the attendee report of a Microsoft Teams live event. Read-only.
    */
    private ?StreamInterface $attendeeReport = null;
    
    /**
     * @var BroadcastMeetingSettings|null $broadcastSettings Settings related to a live event.
    */
    private ?BroadcastMeetingSettings $broadcastSettings = null;
    
    /**
     * @var DateTime|null $creationDateTime The meeting creation time in UTC. Read-only.
    */
    private ?DateTime $creationDateTime = null;
    
    /**
     * @var DateTime|null $endDateTime The meeting end time in UTC. Required when you create an online meeting.
    */
    private ?DateTime $endDateTime = null;
    
    /**
     * @var string|null $externalId The external ID that is a custom identifier. Optional.
    */
    private ?string $externalId = null;
    
    /**
     * @var bool|null $isBroadcast Indicates whether this meeting is a Teams live event.
    */
    private ?bool $isBroadcast = null;
    
    /**
     * @var string|null $meetingTemplateId The ID of the meeting template.
    */
    private ?string $meetingTemplateId = null;
    
    /**
     * @var MeetingParticipants|null $participants The participants associated with the online meeting, including the organizer and the attendees.
    */
    private ?MeetingParticipants $participants = null;
    
    /**
     * @var array<CallRecording>|null $recordings The recordings of an online meeting. Read-only.
    */
    private ?array $recordings = null;
    
    /**
     * @var DateTime|null $startDateTime The meeting start time in UTC.
    */
    private ?DateTime $startDateTime = null;
    
    /**
     * @var array<CallTranscript>|null $transcripts The transcripts of an online meeting. Read-only.
    */
    private ?array $transcripts = null;
    
    /**
     * Instantiates a new OnlineMeeting and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.onlineMeeting');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnlineMeeting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnlineMeeting {
        return new OnlineMeeting();
    }

    /**
     * Gets the attendeeReport property value. The content stream of the attendee report of a Microsoft Teams live event. Read-only.
     * @return StreamInterface|null
    */
    public function getAttendeeReport(): ?StreamInterface {
        return $this->attendeeReport;
    }

    /**
     * Gets the broadcastSettings property value. Settings related to a live event.
     * @return BroadcastMeetingSettings|null
    */
    public function getBroadcastSettings(): ?BroadcastMeetingSettings {
        return $this->broadcastSettings;
    }

    /**
     * Gets the creationDateTime property value. The meeting creation time in UTC. Read-only.
     * @return DateTime|null
    */
    public function getCreationDateTime(): ?DateTime {
        return $this->creationDateTime;
    }

    /**
     * Gets the endDateTime property value. The meeting end time in UTC. Required when you create an online meeting.
     * @return DateTime|null
    */
    public function getEndDateTime(): ?DateTime {
        return $this->endDateTime;
    }

    /**
     * Gets the externalId property value. The external ID that is a custom identifier. Optional.
     * @return string|null
    */
    public function getExternalId(): ?string {
        return $this->externalId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'attendeeReport' => fn(ParseNode $n) => $o->setAttendeeReport($n->getBinaryContent()),
            'broadcastSettings' => fn(ParseNode $n) => $o->setBroadcastSettings($n->getObjectValue([BroadcastMeetingSettings::class, 'createFromDiscriminatorValue'])),
            'creationDateTime' => fn(ParseNode $n) => $o->setCreationDateTime($n->getDateTimeValue()),
            'endDateTime' => fn(ParseNode $n) => $o->setEndDateTime($n->getDateTimeValue()),
            'externalId' => fn(ParseNode $n) => $o->setExternalId($n->getStringValue()),
            'isBroadcast' => fn(ParseNode $n) => $o->setIsBroadcast($n->getBooleanValue()),
            'meetingTemplateId' => fn(ParseNode $n) => $o->setMeetingTemplateId($n->getStringValue()),
            'participants' => fn(ParseNode $n) => $o->setParticipants($n->getObjectValue([MeetingParticipants::class, 'createFromDiscriminatorValue'])),
            'recordings' => fn(ParseNode $n) => $o->setRecordings($n->getCollectionOfObjectValues([CallRecording::class, 'createFromDiscriminatorValue'])),
            'startDateTime' => fn(ParseNode $n) => $o->setStartDateTime($n->getDateTimeValue()),
            'transcripts' => fn(ParseNode $n) => $o->setTranscripts($n->getCollectionOfObjectValues([CallTranscript::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isBroadcast property value. Indicates whether this meeting is a Teams live event.
     * @return bool|null
    */
    public function getIsBroadcast(): ?bool {
        return $this->isBroadcast;
    }

    /**
     * Gets the meetingTemplateId property value. The ID of the meeting template.
     * @return string|null
    */
    public function getMeetingTemplateId(): ?string {
        return $this->meetingTemplateId;
    }

    /**
     * Gets the participants property value. The participants associated with the online meeting, including the organizer and the attendees.
     * @return MeetingParticipants|null
    */
    public function getParticipants(): ?MeetingParticipants {
        return $this->participants;
    }

    /**
     * Gets the recordings property value. The recordings of an online meeting. Read-only.
     * @return array<CallRecording>|null
    */
    public function getRecordings(): ?array {
        return $this->recordings;
    }

    /**
     * Gets the startDateTime property value. The meeting start time in UTC.
     * @return DateTime|null
    */
    public function getStartDateTime(): ?DateTime {
        return $this->startDateTime;
    }

    /**
     * Gets the transcripts property value. The transcripts of an online meeting. Read-only.
     * @return array<CallTranscript>|null
    */
    public function getTranscripts(): ?array {
        return $this->transcripts;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBinaryContent('attendeeReport', $this->getAttendeeReport());
        $writer->writeObjectValue('broadcastSettings', $this->getBroadcastSettings());
        $writer->writeDateTimeValue('creationDateTime', $this->getCreationDateTime());
        $writer->writeDateTimeValue('endDateTime', $this->getEndDateTime());
        $writer->writeStringValue('externalId', $this->getExternalId());
        $writer->writeBooleanValue('isBroadcast', $this->getIsBroadcast());
        $writer->writeStringValue('meetingTemplateId', $this->getMeetingTemplateId());
        $writer->writeObjectValue('participants', $this->getParticipants());
        $writer->writeCollectionOfObjectValues('recordings', $this->getRecordings());
        $writer->writeDateTimeValue('startDateTime', $this->getStartDateTime());
        $writer->writeCollectionOfObjectValues('transcripts', $this->getTranscripts());
    }

    /**
     * Sets the attendeeReport property value. The content stream of the attendee report of a Microsoft Teams live event. Read-only.
     * @param StreamInterface|null $value Value to set for the attendeeReport property.
    */
    public function setAttendeeReport(?StreamInterface $value): void {
        $this->attendeeReport = $value;
    }

    /**
     * Sets the broadcastSettings property value. Settings related to a live event.
     * @param BroadcastMeetingSettings|null $value Value to set for the broadcastSettings property.
    */
    public function setBroadcastSettings(?BroadcastMeetingSettings $value): void {
        $this->broadcastSettings = $value;
    }

    /**
     * Sets the creationDateTime property value. The meeting creation time in UTC. Read-only.
     * @param DateTime|null $value Value to set for the creationDateTime property.
    */
    public function setCreationDateTime(?DateTime $value): void {
        $this->creationDateTime = $value;
    }

    /**
     * Sets the endDateTime property value. The meeting end time in UTC. Required when you create an online meeting.
     * @param DateTime|null $value Value to set for the endDateTime property.
    */
    public function setEndDateTime(?DateTime $value): void {
        $this->endDateTime = $value;
    }

    /**
     * Sets the externalId property value. The external ID that is a custom identifier. Optional.
     * @param string|null $value Value to set for the externalId property.
    */
    public function setExternalId(?string $value): void {
        $this->externalId = $value;
    }

    /**
     * Sets the isBroadcast property value. Indicates whether this meeting is a Teams live event.
     * @param bool|null $value Value to set for the isBroadcast property.
    */
    public function setIsBroadcast(?bool $value): void {
        $this->isBroadcast = $value;
    }

    /**
     * Sets the meetingTemplateId property value. The ID of the meeting template.
     * @param string|null $value Value to set for the meetingTemplateId property.
    */
    public function setMeetingTemplateId(?string $value): void {
        $this->meetingTemplateId = $value;
    }

    /**
     * Sets the participants property value. The participants associated with the online meeting, including the organizer and the attendees.
     * @param MeetingParticipants|null $value Value to set for the participants property.
    */
    public function setParticipants(?MeetingParticipants $value): void {
        $this->participants = $value;
    }

    /**
     * Sets the recordings property value. The recordings of an online meeting. Read-only.
     * @param array<CallRecording>|null $value Value to set for the recordings property.
    */
    public function setRecordings(?array $value): void {
        $this->recordings = $value;
    }

    /**
     * Sets the startDateTime property value. The meeting start time in UTC.
     * @param DateTime|null $value Value to set for the startDateTime property.
    */
    public function setStartDateTime(?DateTime $value): void {
        $this->startDateTime = $value;
    }

    /**
     * Sets the transcripts property value. The transcripts of an online meeting. Read-only.
     * @param array<CallTranscript>|null $value Value to set for the transcripts property.
    */
    public function setTranscripts(?array $value): void {
        $this->transcripts = $value;
    }

}
