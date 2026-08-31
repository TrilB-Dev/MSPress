<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\CallRecords;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;
use MSPress\Includes\MSGraph\Kiota\Models\IdentitySet;

class CallRecord extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $endDateTime UTC time when the last user left the call. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $endDateTime = null;
    
    /**
     * @var string|null $joinWebUrl Meeting URL associated to the call. May not be available for a peerToPeer call record type.
    */
    private ?string $joinWebUrl = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime UTC time when the call record was created. The DatetimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var array<Modality>|null $modalities List of all the modalities used in the call. The possible values are: unknown, audio, video, videoBasedScreenSharing, data, screenSharing, unknownFutureValue.
    */
    private ?array $modalities = null;
    
    /**
     * @var IdentitySet|null $organizer The organizing party's identity. The organizer property is deprecated and will stop returning data on June 30, 2026. Going forward, use the organizer_v2 relationship.
    */
    private ?IdentitySet $organizer = null;
    
    /**
     * @var Organizer|null $organizer_v2 Identity of the organizer of the call. This relationship is expanded by default in callRecord methods.
    */
    private ?Organizer $organizer_v2 = null;
    
    /**
     * @var array<IdentitySet>|null $participants List of distinct identities involved in the call. Limited to 130 entries. The participants property is deprecated and will stop returning data on June 30, 2026. Going forward, use the participants_v2 relationship.
    */
    private ?array $participants = null;
    
    /**
     * @var array<Participant>|null $participants_v2 List of distinct participants in the call.
    */
    private ?array $participants_v2 = null;
    
    /**
     * @var array<Session>|null $sessions List of sessions involved in the call. Peer-to-peer calls typically only have one session, whereas group calls typically have at least one session per participant. Read-only. Nullable.
    */
    private ?array $sessions = null;
    
    /**
     * @var DateTime|null $startDateTime UTC time when the first user joined the call. The DatetimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $startDateTime = null;
    
    /**
     * @var CallType|null $type The type property
    */
    private ?CallType $type = null;
    
    /**
     * @var int|null $version Monotonically increasing version of the call record. Higher version call records with the same id includes additional data compared to the lower version.
    */
    private ?int $version = null;
    
    /**
     * Instantiates a new CallRecord and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CallRecord
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CallRecord {
        return new CallRecord();
    }

    /**
     * Gets the endDateTime property value. UTC time when the last user left the call. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
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
            'endDateTime' => fn(ParseNode $n) => $o->setEndDateTime($n->getDateTimeValue()),
            'joinWebUrl' => fn(ParseNode $n) => $o->setJoinWebUrl($n->getStringValue()),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'modalities' => fn(ParseNode $n) => $o->setModalities($n->getCollectionOfEnumValues(Modality::class)),
            'organizer' => fn(ParseNode $n) => $o->setOrganizer($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'organizer_v2' => fn(ParseNode $n) => $o->setOrganizerV2($n->getObjectValue([Organizer::class, 'createFromDiscriminatorValue'])),
            'participants' => fn(ParseNode $n) => $o->setParticipants($n->getCollectionOfObjectValues([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'participants_v2' => fn(ParseNode $n) => $o->setParticipantsV2($n->getCollectionOfObjectValues([Participant::class, 'createFromDiscriminatorValue'])),
            'sessions' => fn(ParseNode $n) => $o->setSessions($n->getCollectionOfObjectValues([Session::class, 'createFromDiscriminatorValue'])),
            'startDateTime' => fn(ParseNode $n) => $o->setStartDateTime($n->getDateTimeValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CallType::class)),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the joinWebUrl property value. Meeting URL associated to the call. May not be available for a peerToPeer call record type.
     * @return string|null
    */
    public function getJoinWebUrl(): ?string {
        return $this->joinWebUrl;
    }

    /**
     * Gets the lastModifiedDateTime property value. UTC time when the call record was created. The DatetimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the modalities property value. List of all the modalities used in the call. The possible values are: unknown, audio, video, videoBasedScreenSharing, data, screenSharing, unknownFutureValue.
     * @return array<Modality>|null
    */
    public function getModalities(): ?array {
        return $this->modalities;
    }

    /**
     * Gets the organizer property value. The organizing party's identity. The organizer property is deprecated and will stop returning data on June 30, 2026. Going forward, use the organizer_v2 relationship.
     * @return IdentitySet|null
    */
    public function getOrganizer(): ?IdentitySet {
        return $this->organizer;
    }

    /**
     * Gets the organizer_v2 property value. Identity of the organizer of the call. This relationship is expanded by default in callRecord methods.
     * @return Organizer|null
    */
    public function getOrganizerV2(): ?Organizer {
        return $this->organizer_v2;
    }

    /**
     * Gets the participants property value. List of distinct identities involved in the call. Limited to 130 entries. The participants property is deprecated and will stop returning data on June 30, 2026. Going forward, use the participants_v2 relationship.
     * @return array<IdentitySet>|null
    */
    public function getParticipants(): ?array {
        return $this->participants;
    }

    /**
     * Gets the participants_v2 property value. List of distinct participants in the call.
     * @return array<Participant>|null
    */
    public function getParticipantsV2(): ?array {
        return $this->participants_v2;
    }

    /**
     * Gets the sessions property value. List of sessions involved in the call. Peer-to-peer calls typically only have one session, whereas group calls typically have at least one session per participant. Read-only. Nullable.
     * @return array<Session>|null
    */
    public function getSessions(): ?array {
        return $this->sessions;
    }

    /**
     * Gets the startDateTime property value. UTC time when the first user joined the call. The DatetimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getStartDateTime(): ?DateTime {
        return $this->startDateTime;
    }

    /**
     * Gets the type property value. The type property
     * @return CallType|null
    */
    public function getType(): ?CallType {
        return $this->type;
    }

    /**
     * Gets the version property value. Monotonically increasing version of the call record. Higher version call records with the same id includes additional data compared to the lower version.
     * @return int|null
    */
    public function getVersion(): ?int {
        return $this->version;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('endDateTime', $this->getEndDateTime());
        $writer->writeStringValue('joinWebUrl', $this->getJoinWebUrl());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeCollectionOfEnumValues('modalities', $this->getModalities());
        $writer->writeObjectValue('organizer', $this->getOrganizer());
        $writer->writeObjectValue('organizer_v2', $this->getOrganizerV2());
        $writer->writeCollectionOfObjectValues('participants', $this->getParticipants());
        $writer->writeCollectionOfObjectValues('participants_v2', $this->getParticipantsV2());
        $writer->writeCollectionOfObjectValues('sessions', $this->getSessions());
        $writer->writeDateTimeValue('startDateTime', $this->getStartDateTime());
        $writer->writeEnumValue('type', $this->getType());
        $writer->writeIntegerValue('version', $this->getVersion());
    }

    /**
     * Sets the endDateTime property value. UTC time when the last user left the call. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the endDateTime property.
    */
    public function setEndDateTime(?DateTime $value): void {
        $this->endDateTime = $value;
    }

    /**
     * Sets the joinWebUrl property value. Meeting URL associated to the call. May not be available for a peerToPeer call record type.
     * @param string|null $value Value to set for the joinWebUrl property.
    */
    public function setJoinWebUrl(?string $value): void {
        $this->joinWebUrl = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. UTC time when the call record was created. The DatetimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the modalities property value. List of all the modalities used in the call. The possible values are: unknown, audio, video, videoBasedScreenSharing, data, screenSharing, unknownFutureValue.
     * @param array<Modality>|null $value Value to set for the modalities property.
    */
    public function setModalities(?array $value): void {
        $this->modalities = $value;
    }

    /**
     * Sets the organizer property value. The organizing party's identity. The organizer property is deprecated and will stop returning data on June 30, 2026. Going forward, use the organizer_v2 relationship.
     * @param IdentitySet|null $value Value to set for the organizer property.
    */
    public function setOrganizer(?IdentitySet $value): void {
        $this->organizer = $value;
    }

    /**
     * Sets the organizer_v2 property value. Identity of the organizer of the call. This relationship is expanded by default in callRecord methods.
     * @param Organizer|null $value Value to set for the organizer_v2 property.
    */
    public function setOrganizerV2(?Organizer $value): void {
        $this->organizer_v2 = $value;
    }

    /**
     * Sets the participants property value. List of distinct identities involved in the call. Limited to 130 entries. The participants property is deprecated and will stop returning data on June 30, 2026. Going forward, use the participants_v2 relationship.
     * @param array<IdentitySet>|null $value Value to set for the participants property.
    */
    public function setParticipants(?array $value): void {
        $this->participants = $value;
    }

    /**
     * Sets the participants_v2 property value. List of distinct participants in the call.
     * @param array<Participant>|null $value Value to set for the participants_v2 property.
    */
    public function setParticipantsV2(?array $value): void {
        $this->participants_v2 = $value;
    }

    /**
     * Sets the sessions property value. List of sessions involved in the call. Peer-to-peer calls typically only have one session, whereas group calls typically have at least one session per participant. Read-only. Nullable.
     * @param array<Session>|null $value Value to set for the sessions property.
    */
    public function setSessions(?array $value): void {
        $this->sessions = $value;
    }

    /**
     * Sets the startDateTime property value. UTC time when the first user joined the call. The DatetimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the startDateTime property.
    */
    public function setStartDateTime(?DateTime $value): void {
        $this->startDateTime = $value;
    }

    /**
     * Sets the type property value. The type property
     * @param CallType|null $value Value to set for the type property.
    */
    public function setType(?CallType $value): void {
        $this->type = $value;
    }

    /**
     * Sets the version property value. Monotonically increasing version of the call record. Higher version call records with the same id includes additional data compared to the lower version.
     * @param int|null $value Value to set for the version property.
    */
    public function setVersion(?int $value): void {
        $this->version = $value;
    }

}
