<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OnlineMeetingBase extends Entity implements Parsable 
{
    /**
     * @var bool|null $allowAttendeeToEnableCamera Indicates whether attendees can turn on their camera.
    */
    private ?bool $allowAttendeeToEnableCamera = null;
    
    /**
     * @var bool|null $allowAttendeeToEnableMic Indicates whether attendees can turn on their microphone.
    */
    private ?bool $allowAttendeeToEnableMic = null;
    
    /**
     * @var bool|null $allowBreakoutRooms Indicates whether breakout rooms are enabled for the meeting.
    */
    private ?bool $allowBreakoutRooms = null;
    
    /**
     * @var bool|null $allowCopyingAndSharingMeetingContent Indicates whether the ability to copy and share meeting content is enabled for the meeting.
    */
    private ?bool $allowCopyingAndSharingMeetingContent = null;
    
    /**
     * @var AllowedLobbyAdmitterRoles|null $allowedLobbyAdmitters Specifies the users who can admit from the lobby. The possible values are: organizerAndCoOrganizersAndPresenters, organizerAndCoOrganizers, unknownFutureValue.
    */
    private ?AllowedLobbyAdmitterRoles $allowedLobbyAdmitters = null;
    
    /**
     * @var OnlineMeetingPresenters|null $allowedPresenters Specifies who can be a presenter in a meeting. The possible values are: everyone, organization, roleIsPresenter, organizer, unknownFutureValue. Inherited from onlineMeetingBase.
    */
    private ?OnlineMeetingPresenters $allowedPresenters = null;
    
    /**
     * @var MeetingLiveShareOptions|null $allowLiveShare Indicates whether live share is enabled for the meeting. The possible values are: enabled, disabled, unknownFutureValue.
    */
    private ?MeetingLiveShareOptions $allowLiveShare = null;
    
    /**
     * @var MeetingChatMode|null $allowMeetingChat Specifies the mode of the meeting chat.
    */
    private ?MeetingChatMode $allowMeetingChat = null;
    
    /**
     * @var bool|null $allowParticipantsToChangeName Specifies if participants are allowed to rename themselves in an instance of the meeting.
    */
    private ?bool $allowParticipantsToChangeName = null;
    
    /**
     * @var bool|null $allowPowerPointSharing Indicates whether PowerPoint live is enabled for the meeting.
    */
    private ?bool $allowPowerPointSharing = null;
    
    /**
     * @var bool|null $allowRecording Indicates whether recording is enabled for the meeting.
    */
    private ?bool $allowRecording = null;
    
    /**
     * @var bool|null $allowTeamworkReactions Indicates if Teams reactions are enabled for the meeting.
    */
    private ?bool $allowTeamworkReactions = null;
    
    /**
     * @var bool|null $allowTranscription Indicates whether transcription is enabled for the meeting.
    */
    private ?bool $allowTranscription = null;
    
    /**
     * @var bool|null $allowWhiteboard Indicates whether whiteboard is enabled for the meeting.
    */
    private ?bool $allowWhiteboard = null;
    
    /**
     * @var array<MeetingAttendanceReport>|null $attendanceReports The attendance reports of an online meeting. Read-only.
    */
    private ?array $attendanceReports = null;
    
    /**
     * @var AudioConferencing|null $audioConferencing The phone access (dial-in) information for an online meeting. Read-only.
    */
    private ?AudioConferencing $audioConferencing = null;
    
    /**
     * @var ChatInfo|null $chatInfo The chat information associated with this online meeting.
    */
    private ?ChatInfo $chatInfo = null;
    
    /**
     * @var ChatRestrictions|null $chatRestrictions Specifies the configuration settings for meeting chat restrictions.
    */
    private ?ChatRestrictions $chatRestrictions = null;
    
    /**
     * @var CloudVideoInteropInfo|null $cloudVideoInteropInfo Conferencing device integration settings for Cloud Video Interop (CVI). Read-only.
    */
    private ?CloudVideoInteropInfo $cloudVideoInteropInfo = null;
    
    /**
     * @var DateTime|null $expiryDateTime Indicates the date and time when the meeting resource expires. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $expiryDateTime = null;
    
    /**
     * @var bool|null $isEndToEndEncryptionEnabled Indicates whether end-to-end encryption (E2EE) is enabled for the online meeting.
    */
    private ?bool $isEndToEndEncryptionEnabled = null;
    
    /**
     * @var bool|null $isEntryExitAnnounced Indicates whether to announce when callers join or leave.
    */
    private ?bool $isEntryExitAnnounced = null;
    
    /**
     * @var ItemBody|null $joinInformation The join information in the language and locale variant specified in 'Accept-Language' request HTTP header. Read-only.
    */
    private ?ItemBody $joinInformation = null;
    
    /**
     * @var JoinMeetingIdSettings|null $joinMeetingIdSettings Specifies the joinMeetingId, the meeting passcode, and the requirement for the passcode. Once an onlineMeeting is created, the joinMeetingIdSettings can't be modified. To make any changes to this property, you must cancel this meeting and create a new one.
    */
    private ?JoinMeetingIdSettings $joinMeetingIdSettings = null;
    
    /**
     * @var string|null $joinWebUrl The join URL of the online meeting. Read-only.
    */
    private ?string $joinWebUrl = null;
    
    /**
     * @var LobbyBypassSettings|null $lobbyBypassSettings Specifies which participants can bypass the meeting lobby.
    */
    private ?LobbyBypassSettings $lobbyBypassSettings = null;
    
    /**
     * @var string|null $meetingOptionsWebUrl Provides the URL to the Teams meeting options page for the specified meeting. This link allows only the organizer to configure meeting settings.
    */
    private ?string $meetingOptionsWebUrl = null;
    
    /**
     * @var string|null $meetingSpokenLanguageTag Specifies the spoken language used during the meeting for recording and transcription purposes.
    */
    private ?string $meetingSpokenLanguageTag = null;
    
    /**
     * @var OnlineMeetingType|null $meetingType The type of the online meeting. The possible values are: adhoc, scheduled, recurring, broadcast, meetnow, unknownFutureValue. Read-only.
    */
    private ?OnlineMeetingType $meetingType = null;
    
    /**
     * @var bool|null $recordAutomatically Indicates whether to record the meeting automatically.
    */
    private ?bool $recordAutomatically = null;
    
    /**
     * @var OnlineMeetingSensitivityLabelAssignment|null $sensitivityLabelAssignment Specifies the sensitivity label applied to the Teams meeting.
    */
    private ?OnlineMeetingSensitivityLabelAssignment $sensitivityLabelAssignment = null;
    
    /**
     * @var MeetingChatHistoryDefaultMode|null $shareMeetingChatHistoryDefault Specifies whether meeting chat history is shared with participants.  The possible values are: all, none, unknownFutureValue.
    */
    private ?MeetingChatHistoryDefaultMode $shareMeetingChatHistoryDefault = null;
    
    /**
     * @var string|null $subject The subject of the online meeting.
    */
    private ?string $subject = null;
    
    /**
     * @var string|null $videoTeleconferenceId The video teleconferencing ID. Read-only.
    */
    private ?string $videoTeleconferenceId = null;
    
    /**
     * @var WatermarkProtectionValues|null $watermarkProtection Specifies whether the client application should apply a watermark to a content type.
    */
    private ?WatermarkProtectionValues $watermarkProtection = null;
    
    /**
     * Instantiates a new OnlineMeetingBase and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnlineMeetingBase
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnlineMeetingBase {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.onlineMeeting': return new OnlineMeeting();
                case '#microsoft.graph.virtualEventSession': return new VirtualEventSession();
            }
        }
        return new OnlineMeetingBase();
    }

    /**
     * Gets the allowAttendeeToEnableCamera property value. Indicates whether attendees can turn on their camera.
     * @return bool|null
    */
    public function getAllowAttendeeToEnableCamera(): ?bool {
        return $this->allowAttendeeToEnableCamera;
    }

    /**
     * Gets the allowAttendeeToEnableMic property value. Indicates whether attendees can turn on their microphone.
     * @return bool|null
    */
    public function getAllowAttendeeToEnableMic(): ?bool {
        return $this->allowAttendeeToEnableMic;
    }

    /**
     * Gets the allowBreakoutRooms property value. Indicates whether breakout rooms are enabled for the meeting.
     * @return bool|null
    */
    public function getAllowBreakoutRooms(): ?bool {
        return $this->allowBreakoutRooms;
    }

    /**
     * Gets the allowCopyingAndSharingMeetingContent property value. Indicates whether the ability to copy and share meeting content is enabled for the meeting.
     * @return bool|null
    */
    public function getAllowCopyingAndSharingMeetingContent(): ?bool {
        return $this->allowCopyingAndSharingMeetingContent;
    }

    /**
     * Gets the allowedLobbyAdmitters property value. Specifies the users who can admit from the lobby. The possible values are: organizerAndCoOrganizersAndPresenters, organizerAndCoOrganizers, unknownFutureValue.
     * @return AllowedLobbyAdmitterRoles|null
    */
    public function getAllowedLobbyAdmitters(): ?AllowedLobbyAdmitterRoles {
        return $this->allowedLobbyAdmitters;
    }

    /**
     * Gets the allowedPresenters property value. Specifies who can be a presenter in a meeting. The possible values are: everyone, organization, roleIsPresenter, organizer, unknownFutureValue. Inherited from onlineMeetingBase.
     * @return OnlineMeetingPresenters|null
    */
    public function getAllowedPresenters(): ?OnlineMeetingPresenters {
        return $this->allowedPresenters;
    }

    /**
     * Gets the allowLiveShare property value. Indicates whether live share is enabled for the meeting. The possible values are: enabled, disabled, unknownFutureValue.
     * @return MeetingLiveShareOptions|null
    */
    public function getAllowLiveShare(): ?MeetingLiveShareOptions {
        return $this->allowLiveShare;
    }

    /**
     * Gets the allowMeetingChat property value. Specifies the mode of the meeting chat.
     * @return MeetingChatMode|null
    */
    public function getAllowMeetingChat(): ?MeetingChatMode {
        return $this->allowMeetingChat;
    }

    /**
     * Gets the allowParticipantsToChangeName property value. Specifies if participants are allowed to rename themselves in an instance of the meeting.
     * @return bool|null
    */
    public function getAllowParticipantsToChangeName(): ?bool {
        return $this->allowParticipantsToChangeName;
    }

    /**
     * Gets the allowPowerPointSharing property value. Indicates whether PowerPoint live is enabled for the meeting.
     * @return bool|null
    */
    public function getAllowPowerPointSharing(): ?bool {
        return $this->allowPowerPointSharing;
    }

    /**
     * Gets the allowRecording property value. Indicates whether recording is enabled for the meeting.
     * @return bool|null
    */
    public function getAllowRecording(): ?bool {
        return $this->allowRecording;
    }

    /**
     * Gets the allowTeamworkReactions property value. Indicates if Teams reactions are enabled for the meeting.
     * @return bool|null
    */
    public function getAllowTeamworkReactions(): ?bool {
        return $this->allowTeamworkReactions;
    }

    /**
     * Gets the allowTranscription property value. Indicates whether transcription is enabled for the meeting.
     * @return bool|null
    */
    public function getAllowTranscription(): ?bool {
        return $this->allowTranscription;
    }

    /**
     * Gets the allowWhiteboard property value. Indicates whether whiteboard is enabled for the meeting.
     * @return bool|null
    */
    public function getAllowWhiteboard(): ?bool {
        return $this->allowWhiteboard;
    }

    /**
     * Gets the attendanceReports property value. The attendance reports of an online meeting. Read-only.
     * @return array<MeetingAttendanceReport>|null
    */
    public function getAttendanceReports(): ?array {
        return $this->attendanceReports;
    }

    /**
     * Gets the audioConferencing property value. The phone access (dial-in) information for an online meeting. Read-only.
     * @return AudioConferencing|null
    */
    public function getAudioConferencing(): ?AudioConferencing {
        return $this->audioConferencing;
    }

    /**
     * Gets the chatInfo property value. The chat information associated with this online meeting.
     * @return ChatInfo|null
    */
    public function getChatInfo(): ?ChatInfo {
        return $this->chatInfo;
    }

    /**
     * Gets the chatRestrictions property value. Specifies the configuration settings for meeting chat restrictions.
     * @return ChatRestrictions|null
    */
    public function getChatRestrictions(): ?ChatRestrictions {
        return $this->chatRestrictions;
    }

    /**
     * Gets the cloudVideoInteropInfo property value. Conferencing device integration settings for Cloud Video Interop (CVI). Read-only.
     * @return CloudVideoInteropInfo|null
    */
    public function getCloudVideoInteropInfo(): ?CloudVideoInteropInfo {
        return $this->cloudVideoInteropInfo;
    }

    /**
     * Gets the expiryDateTime property value. Indicates the date and time when the meeting resource expires. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getExpiryDateTime(): ?DateTime {
        return $this->expiryDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'allowAttendeeToEnableCamera' => fn(ParseNode $n) => $o->setAllowAttendeeToEnableCamera($n->getBooleanValue()),
            'allowAttendeeToEnableMic' => fn(ParseNode $n) => $o->setAllowAttendeeToEnableMic($n->getBooleanValue()),
            'allowBreakoutRooms' => fn(ParseNode $n) => $o->setAllowBreakoutRooms($n->getBooleanValue()),
            'allowCopyingAndSharingMeetingContent' => fn(ParseNode $n) => $o->setAllowCopyingAndSharingMeetingContent($n->getBooleanValue()),
            'allowedLobbyAdmitters' => fn(ParseNode $n) => $o->setAllowedLobbyAdmitters($n->getEnumValue(AllowedLobbyAdmitterRoles::class)),
            'allowedPresenters' => fn(ParseNode $n) => $o->setAllowedPresenters($n->getEnumValue(OnlineMeetingPresenters::class)),
            'allowLiveShare' => fn(ParseNode $n) => $o->setAllowLiveShare($n->getEnumValue(MeetingLiveShareOptions::class)),
            'allowMeetingChat' => fn(ParseNode $n) => $o->setAllowMeetingChat($n->getEnumValue(MeetingChatMode::class)),
            'allowParticipantsToChangeName' => fn(ParseNode $n) => $o->setAllowParticipantsToChangeName($n->getBooleanValue()),
            'allowPowerPointSharing' => fn(ParseNode $n) => $o->setAllowPowerPointSharing($n->getBooleanValue()),
            'allowRecording' => fn(ParseNode $n) => $o->setAllowRecording($n->getBooleanValue()),
            'allowTeamworkReactions' => fn(ParseNode $n) => $o->setAllowTeamworkReactions($n->getBooleanValue()),
            'allowTranscription' => fn(ParseNode $n) => $o->setAllowTranscription($n->getBooleanValue()),
            'allowWhiteboard' => fn(ParseNode $n) => $o->setAllowWhiteboard($n->getBooleanValue()),
            'attendanceReports' => fn(ParseNode $n) => $o->setAttendanceReports($n->getCollectionOfObjectValues([MeetingAttendanceReport::class, 'createFromDiscriminatorValue'])),
            'audioConferencing' => fn(ParseNode $n) => $o->setAudioConferencing($n->getObjectValue([AudioConferencing::class, 'createFromDiscriminatorValue'])),
            'chatInfo' => fn(ParseNode $n) => $o->setChatInfo($n->getObjectValue([ChatInfo::class, 'createFromDiscriminatorValue'])),
            'chatRestrictions' => fn(ParseNode $n) => $o->setChatRestrictions($n->getObjectValue([ChatRestrictions::class, 'createFromDiscriminatorValue'])),
            'cloudVideoInteropInfo' => fn(ParseNode $n) => $o->setCloudVideoInteropInfo($n->getObjectValue([CloudVideoInteropInfo::class, 'createFromDiscriminatorValue'])),
            'expiryDateTime' => fn(ParseNode $n) => $o->setExpiryDateTime($n->getDateTimeValue()),
            'isEndToEndEncryptionEnabled' => fn(ParseNode $n) => $o->setIsEndToEndEncryptionEnabled($n->getBooleanValue()),
            'isEntryExitAnnounced' => fn(ParseNode $n) => $o->setIsEntryExitAnnounced($n->getBooleanValue()),
            'joinInformation' => fn(ParseNode $n) => $o->setJoinInformation($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
            'joinMeetingIdSettings' => fn(ParseNode $n) => $o->setJoinMeetingIdSettings($n->getObjectValue([JoinMeetingIdSettings::class, 'createFromDiscriminatorValue'])),
            'joinWebUrl' => fn(ParseNode $n) => $o->setJoinWebUrl($n->getStringValue()),
            'lobbyBypassSettings' => fn(ParseNode $n) => $o->setLobbyBypassSettings($n->getObjectValue([LobbyBypassSettings::class, 'createFromDiscriminatorValue'])),
            'meetingOptionsWebUrl' => fn(ParseNode $n) => $o->setMeetingOptionsWebUrl($n->getStringValue()),
            'meetingSpokenLanguageTag' => fn(ParseNode $n) => $o->setMeetingSpokenLanguageTag($n->getStringValue()),
            'meetingType' => fn(ParseNode $n) => $o->setMeetingType($n->getEnumValue(OnlineMeetingType::class)),
            'recordAutomatically' => fn(ParseNode $n) => $o->setRecordAutomatically($n->getBooleanValue()),
            'sensitivityLabelAssignment' => fn(ParseNode $n) => $o->setSensitivityLabelAssignment($n->getObjectValue([OnlineMeetingSensitivityLabelAssignment::class, 'createFromDiscriminatorValue'])),
            'shareMeetingChatHistoryDefault' => fn(ParseNode $n) => $o->setShareMeetingChatHistoryDefault($n->getEnumValue(MeetingChatHistoryDefaultMode::class)),
            'subject' => fn(ParseNode $n) => $o->setSubject($n->getStringValue()),
            'videoTeleconferenceId' => fn(ParseNode $n) => $o->setVideoTeleconferenceId($n->getStringValue()),
            'watermarkProtection' => fn(ParseNode $n) => $o->setWatermarkProtection($n->getObjectValue([WatermarkProtectionValues::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isEndToEndEncryptionEnabled property value. Indicates whether end-to-end encryption (E2EE) is enabled for the online meeting.
     * @return bool|null
    */
    public function getIsEndToEndEncryptionEnabled(): ?bool {
        return $this->isEndToEndEncryptionEnabled;
    }

    /**
     * Gets the isEntryExitAnnounced property value. Indicates whether to announce when callers join or leave.
     * @return bool|null
    */
    public function getIsEntryExitAnnounced(): ?bool {
        return $this->isEntryExitAnnounced;
    }

    /**
     * Gets the joinInformation property value. The join information in the language and locale variant specified in 'Accept-Language' request HTTP header. Read-only.
     * @return ItemBody|null
    */
    public function getJoinInformation(): ?ItemBody {
        return $this->joinInformation;
    }

    /**
     * Gets the joinMeetingIdSettings property value. Specifies the joinMeetingId, the meeting passcode, and the requirement for the passcode. Once an onlineMeeting is created, the joinMeetingIdSettings can't be modified. To make any changes to this property, you must cancel this meeting and create a new one.
     * @return JoinMeetingIdSettings|null
    */
    public function getJoinMeetingIdSettings(): ?JoinMeetingIdSettings {
        return $this->joinMeetingIdSettings;
    }

    /**
     * Gets the joinWebUrl property value. The join URL of the online meeting. Read-only.
     * @return string|null
    */
    public function getJoinWebUrl(): ?string {
        return $this->joinWebUrl;
    }

    /**
     * Gets the lobbyBypassSettings property value. Specifies which participants can bypass the meeting lobby.
     * @return LobbyBypassSettings|null
    */
    public function getLobbyBypassSettings(): ?LobbyBypassSettings {
        return $this->lobbyBypassSettings;
    }

    /**
     * Gets the meetingOptionsWebUrl property value. Provides the URL to the Teams meeting options page for the specified meeting. This link allows only the organizer to configure meeting settings.
     * @return string|null
    */
    public function getMeetingOptionsWebUrl(): ?string {
        return $this->meetingOptionsWebUrl;
    }

    /**
     * Gets the meetingSpokenLanguageTag property value. Specifies the spoken language used during the meeting for recording and transcription purposes.
     * @return string|null
    */
    public function getMeetingSpokenLanguageTag(): ?string {
        return $this->meetingSpokenLanguageTag;
    }

    /**
     * Gets the meetingType property value. The type of the online meeting. The possible values are: adhoc, scheduled, recurring, broadcast, meetnow, unknownFutureValue. Read-only.
     * @return OnlineMeetingType|null
    */
    public function getMeetingType(): ?OnlineMeetingType {
        return $this->meetingType;
    }

    /**
     * Gets the recordAutomatically property value. Indicates whether to record the meeting automatically.
     * @return bool|null
    */
    public function getRecordAutomatically(): ?bool {
        return $this->recordAutomatically;
    }

    /**
     * Gets the sensitivityLabelAssignment property value. Specifies the sensitivity label applied to the Teams meeting.
     * @return OnlineMeetingSensitivityLabelAssignment|null
    */
    public function getSensitivityLabelAssignment(): ?OnlineMeetingSensitivityLabelAssignment {
        return $this->sensitivityLabelAssignment;
    }

    /**
     * Gets the shareMeetingChatHistoryDefault property value. Specifies whether meeting chat history is shared with participants.  The possible values are: all, none, unknownFutureValue.
     * @return MeetingChatHistoryDefaultMode|null
    */
    public function getShareMeetingChatHistoryDefault(): ?MeetingChatHistoryDefaultMode {
        return $this->shareMeetingChatHistoryDefault;
    }

    /**
     * Gets the subject property value. The subject of the online meeting.
     * @return string|null
    */
    public function getSubject(): ?string {
        return $this->subject;
    }

    /**
     * Gets the videoTeleconferenceId property value. The video teleconferencing ID. Read-only.
     * @return string|null
    */
    public function getVideoTeleconferenceId(): ?string {
        return $this->videoTeleconferenceId;
    }

    /**
     * Gets the watermarkProtection property value. Specifies whether the client application should apply a watermark to a content type.
     * @return WatermarkProtectionValues|null
    */
    public function getWatermarkProtection(): ?WatermarkProtectionValues {
        return $this->watermarkProtection;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('allowAttendeeToEnableCamera', $this->getAllowAttendeeToEnableCamera());
        $writer->writeBooleanValue('allowAttendeeToEnableMic', $this->getAllowAttendeeToEnableMic());
        $writer->writeBooleanValue('allowBreakoutRooms', $this->getAllowBreakoutRooms());
        $writer->writeBooleanValue('allowCopyingAndSharingMeetingContent', $this->getAllowCopyingAndSharingMeetingContent());
        $writer->writeEnumValue('allowedLobbyAdmitters', $this->getAllowedLobbyAdmitters());
        $writer->writeEnumValue('allowedPresenters', $this->getAllowedPresenters());
        $writer->writeEnumValue('allowLiveShare', $this->getAllowLiveShare());
        $writer->writeEnumValue('allowMeetingChat', $this->getAllowMeetingChat());
        $writer->writeBooleanValue('allowParticipantsToChangeName', $this->getAllowParticipantsToChangeName());
        $writer->writeBooleanValue('allowPowerPointSharing', $this->getAllowPowerPointSharing());
        $writer->writeBooleanValue('allowRecording', $this->getAllowRecording());
        $writer->writeBooleanValue('allowTeamworkReactions', $this->getAllowTeamworkReactions());
        $writer->writeBooleanValue('allowTranscription', $this->getAllowTranscription());
        $writer->writeBooleanValue('allowWhiteboard', $this->getAllowWhiteboard());
        $writer->writeCollectionOfObjectValues('attendanceReports', $this->getAttendanceReports());
        $writer->writeObjectValue('audioConferencing', $this->getAudioConferencing());
        $writer->writeObjectValue('chatInfo', $this->getChatInfo());
        $writer->writeObjectValue('chatRestrictions', $this->getChatRestrictions());
        $writer->writeObjectValue('cloudVideoInteropInfo', $this->getCloudVideoInteropInfo());
        $writer->writeDateTimeValue('expiryDateTime', $this->getExpiryDateTime());
        $writer->writeBooleanValue('isEndToEndEncryptionEnabled', $this->getIsEndToEndEncryptionEnabled());
        $writer->writeBooleanValue('isEntryExitAnnounced', $this->getIsEntryExitAnnounced());
        $writer->writeObjectValue('joinInformation', $this->getJoinInformation());
        $writer->writeObjectValue('joinMeetingIdSettings', $this->getJoinMeetingIdSettings());
        $writer->writeStringValue('joinWebUrl', $this->getJoinWebUrl());
        $writer->writeObjectValue('lobbyBypassSettings', $this->getLobbyBypassSettings());
        $writer->writeStringValue('meetingOptionsWebUrl', $this->getMeetingOptionsWebUrl());
        $writer->writeStringValue('meetingSpokenLanguageTag', $this->getMeetingSpokenLanguageTag());
        $writer->writeEnumValue('meetingType', $this->getMeetingType());
        $writer->writeBooleanValue('recordAutomatically', $this->getRecordAutomatically());
        $writer->writeObjectValue('sensitivityLabelAssignment', $this->getSensitivityLabelAssignment());
        $writer->writeEnumValue('shareMeetingChatHistoryDefault', $this->getShareMeetingChatHistoryDefault());
        $writer->writeStringValue('subject', $this->getSubject());
        $writer->writeStringValue('videoTeleconferenceId', $this->getVideoTeleconferenceId());
        $writer->writeObjectValue('watermarkProtection', $this->getWatermarkProtection());
    }

    /**
     * Sets the allowAttendeeToEnableCamera property value. Indicates whether attendees can turn on their camera.
     * @param bool|null $value Value to set for the allowAttendeeToEnableCamera property.
    */
    public function setAllowAttendeeToEnableCamera(?bool $value): void {
        $this->allowAttendeeToEnableCamera = $value;
    }

    /**
     * Sets the allowAttendeeToEnableMic property value. Indicates whether attendees can turn on their microphone.
     * @param bool|null $value Value to set for the allowAttendeeToEnableMic property.
    */
    public function setAllowAttendeeToEnableMic(?bool $value): void {
        $this->allowAttendeeToEnableMic = $value;
    }

    /**
     * Sets the allowBreakoutRooms property value. Indicates whether breakout rooms are enabled for the meeting.
     * @param bool|null $value Value to set for the allowBreakoutRooms property.
    */
    public function setAllowBreakoutRooms(?bool $value): void {
        $this->allowBreakoutRooms = $value;
    }

    /**
     * Sets the allowCopyingAndSharingMeetingContent property value. Indicates whether the ability to copy and share meeting content is enabled for the meeting.
     * @param bool|null $value Value to set for the allowCopyingAndSharingMeetingContent property.
    */
    public function setAllowCopyingAndSharingMeetingContent(?bool $value): void {
        $this->allowCopyingAndSharingMeetingContent = $value;
    }

    /**
     * Sets the allowedLobbyAdmitters property value. Specifies the users who can admit from the lobby. The possible values are: organizerAndCoOrganizersAndPresenters, organizerAndCoOrganizers, unknownFutureValue.
     * @param AllowedLobbyAdmitterRoles|null $value Value to set for the allowedLobbyAdmitters property.
    */
    public function setAllowedLobbyAdmitters(?AllowedLobbyAdmitterRoles $value): void {
        $this->allowedLobbyAdmitters = $value;
    }

    /**
     * Sets the allowedPresenters property value. Specifies who can be a presenter in a meeting. The possible values are: everyone, organization, roleIsPresenter, organizer, unknownFutureValue. Inherited from onlineMeetingBase.
     * @param OnlineMeetingPresenters|null $value Value to set for the allowedPresenters property.
    */
    public function setAllowedPresenters(?OnlineMeetingPresenters $value): void {
        $this->allowedPresenters = $value;
    }

    /**
     * Sets the allowLiveShare property value. Indicates whether live share is enabled for the meeting. The possible values are: enabled, disabled, unknownFutureValue.
     * @param MeetingLiveShareOptions|null $value Value to set for the allowLiveShare property.
    */
    public function setAllowLiveShare(?MeetingLiveShareOptions $value): void {
        $this->allowLiveShare = $value;
    }

    /**
     * Sets the allowMeetingChat property value. Specifies the mode of the meeting chat.
     * @param MeetingChatMode|null $value Value to set for the allowMeetingChat property.
    */
    public function setAllowMeetingChat(?MeetingChatMode $value): void {
        $this->allowMeetingChat = $value;
    }

    /**
     * Sets the allowParticipantsToChangeName property value. Specifies if participants are allowed to rename themselves in an instance of the meeting.
     * @param bool|null $value Value to set for the allowParticipantsToChangeName property.
    */
    public function setAllowParticipantsToChangeName(?bool $value): void {
        $this->allowParticipantsToChangeName = $value;
    }

    /**
     * Sets the allowPowerPointSharing property value. Indicates whether PowerPoint live is enabled for the meeting.
     * @param bool|null $value Value to set for the allowPowerPointSharing property.
    */
    public function setAllowPowerPointSharing(?bool $value): void {
        $this->allowPowerPointSharing = $value;
    }

    /**
     * Sets the allowRecording property value. Indicates whether recording is enabled for the meeting.
     * @param bool|null $value Value to set for the allowRecording property.
    */
    public function setAllowRecording(?bool $value): void {
        $this->allowRecording = $value;
    }

    /**
     * Sets the allowTeamworkReactions property value. Indicates if Teams reactions are enabled for the meeting.
     * @param bool|null $value Value to set for the allowTeamworkReactions property.
    */
    public function setAllowTeamworkReactions(?bool $value): void {
        $this->allowTeamworkReactions = $value;
    }

    /**
     * Sets the allowTranscription property value. Indicates whether transcription is enabled for the meeting.
     * @param bool|null $value Value to set for the allowTranscription property.
    */
    public function setAllowTranscription(?bool $value): void {
        $this->allowTranscription = $value;
    }

    /**
     * Sets the allowWhiteboard property value. Indicates whether whiteboard is enabled for the meeting.
     * @param bool|null $value Value to set for the allowWhiteboard property.
    */
    public function setAllowWhiteboard(?bool $value): void {
        $this->allowWhiteboard = $value;
    }

    /**
     * Sets the attendanceReports property value. The attendance reports of an online meeting. Read-only.
     * @param array<MeetingAttendanceReport>|null $value Value to set for the attendanceReports property.
    */
    public function setAttendanceReports(?array $value): void {
        $this->attendanceReports = $value;
    }

    /**
     * Sets the audioConferencing property value. The phone access (dial-in) information for an online meeting. Read-only.
     * @param AudioConferencing|null $value Value to set for the audioConferencing property.
    */
    public function setAudioConferencing(?AudioConferencing $value): void {
        $this->audioConferencing = $value;
    }

    /**
     * Sets the chatInfo property value. The chat information associated with this online meeting.
     * @param ChatInfo|null $value Value to set for the chatInfo property.
    */
    public function setChatInfo(?ChatInfo $value): void {
        $this->chatInfo = $value;
    }

    /**
     * Sets the chatRestrictions property value. Specifies the configuration settings for meeting chat restrictions.
     * @param ChatRestrictions|null $value Value to set for the chatRestrictions property.
    */
    public function setChatRestrictions(?ChatRestrictions $value): void {
        $this->chatRestrictions = $value;
    }

    /**
     * Sets the cloudVideoInteropInfo property value. Conferencing device integration settings for Cloud Video Interop (CVI). Read-only.
     * @param CloudVideoInteropInfo|null $value Value to set for the cloudVideoInteropInfo property.
    */
    public function setCloudVideoInteropInfo(?CloudVideoInteropInfo $value): void {
        $this->cloudVideoInteropInfo = $value;
    }

    /**
     * Sets the expiryDateTime property value. Indicates the date and time when the meeting resource expires. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the expiryDateTime property.
    */
    public function setExpiryDateTime(?DateTime $value): void {
        $this->expiryDateTime = $value;
    }

    /**
     * Sets the isEndToEndEncryptionEnabled property value. Indicates whether end-to-end encryption (E2EE) is enabled for the online meeting.
     * @param bool|null $value Value to set for the isEndToEndEncryptionEnabled property.
    */
    public function setIsEndToEndEncryptionEnabled(?bool $value): void {
        $this->isEndToEndEncryptionEnabled = $value;
    }

    /**
     * Sets the isEntryExitAnnounced property value. Indicates whether to announce when callers join or leave.
     * @param bool|null $value Value to set for the isEntryExitAnnounced property.
    */
    public function setIsEntryExitAnnounced(?bool $value): void {
        $this->isEntryExitAnnounced = $value;
    }

    /**
     * Sets the joinInformation property value. The join information in the language and locale variant specified in 'Accept-Language' request HTTP header. Read-only.
     * @param ItemBody|null $value Value to set for the joinInformation property.
    */
    public function setJoinInformation(?ItemBody $value): void {
        $this->joinInformation = $value;
    }

    /**
     * Sets the joinMeetingIdSettings property value. Specifies the joinMeetingId, the meeting passcode, and the requirement for the passcode. Once an onlineMeeting is created, the joinMeetingIdSettings can't be modified. To make any changes to this property, you must cancel this meeting and create a new one.
     * @param JoinMeetingIdSettings|null $value Value to set for the joinMeetingIdSettings property.
    */
    public function setJoinMeetingIdSettings(?JoinMeetingIdSettings $value): void {
        $this->joinMeetingIdSettings = $value;
    }

    /**
     * Sets the joinWebUrl property value. The join URL of the online meeting. Read-only.
     * @param string|null $value Value to set for the joinWebUrl property.
    */
    public function setJoinWebUrl(?string $value): void {
        $this->joinWebUrl = $value;
    }

    /**
     * Sets the lobbyBypassSettings property value. Specifies which participants can bypass the meeting lobby.
     * @param LobbyBypassSettings|null $value Value to set for the lobbyBypassSettings property.
    */
    public function setLobbyBypassSettings(?LobbyBypassSettings $value): void {
        $this->lobbyBypassSettings = $value;
    }

    /**
     * Sets the meetingOptionsWebUrl property value. Provides the URL to the Teams meeting options page for the specified meeting. This link allows only the organizer to configure meeting settings.
     * @param string|null $value Value to set for the meetingOptionsWebUrl property.
    */
    public function setMeetingOptionsWebUrl(?string $value): void {
        $this->meetingOptionsWebUrl = $value;
    }

    /**
     * Sets the meetingSpokenLanguageTag property value. Specifies the spoken language used during the meeting for recording and transcription purposes.
     * @param string|null $value Value to set for the meetingSpokenLanguageTag property.
    */
    public function setMeetingSpokenLanguageTag(?string $value): void {
        $this->meetingSpokenLanguageTag = $value;
    }

    /**
     * Sets the meetingType property value. The type of the online meeting. The possible values are: adhoc, scheduled, recurring, broadcast, meetnow, unknownFutureValue. Read-only.
     * @param OnlineMeetingType|null $value Value to set for the meetingType property.
    */
    public function setMeetingType(?OnlineMeetingType $value): void {
        $this->meetingType = $value;
    }

    /**
     * Sets the recordAutomatically property value. Indicates whether to record the meeting automatically.
     * @param bool|null $value Value to set for the recordAutomatically property.
    */
    public function setRecordAutomatically(?bool $value): void {
        $this->recordAutomatically = $value;
    }

    /**
     * Sets the sensitivityLabelAssignment property value. Specifies the sensitivity label applied to the Teams meeting.
     * @param OnlineMeetingSensitivityLabelAssignment|null $value Value to set for the sensitivityLabelAssignment property.
    */
    public function setSensitivityLabelAssignment(?OnlineMeetingSensitivityLabelAssignment $value): void {
        $this->sensitivityLabelAssignment = $value;
    }

    /**
     * Sets the shareMeetingChatHistoryDefault property value. Specifies whether meeting chat history is shared with participants.  The possible values are: all, none, unknownFutureValue.
     * @param MeetingChatHistoryDefaultMode|null $value Value to set for the shareMeetingChatHistoryDefault property.
    */
    public function setShareMeetingChatHistoryDefault(?MeetingChatHistoryDefaultMode $value): void {
        $this->shareMeetingChatHistoryDefault = $value;
    }

    /**
     * Sets the subject property value. The subject of the online meeting.
     * @param string|null $value Value to set for the subject property.
    */
    public function setSubject(?string $value): void {
        $this->subject = $value;
    }

    /**
     * Sets the videoTeleconferenceId property value. The video teleconferencing ID. Read-only.
     * @param string|null $value Value to set for the videoTeleconferenceId property.
    */
    public function setVideoTeleconferenceId(?string $value): void {
        $this->videoTeleconferenceId = $value;
    }

    /**
     * Sets the watermarkProtection property value. Specifies whether the client application should apply a watermark to a content type.
     * @param WatermarkProtectionValues|null $value Value to set for the watermarkProtection property.
    */
    public function setWatermarkProtection(?WatermarkProtectionValues $value): void {
        $this->watermarkProtection = $value;
    }

}
