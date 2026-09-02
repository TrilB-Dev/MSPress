<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class TeamsMessageEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $campaignId The identifier of the campaign that this Teams message is part of.
    */
    private ?string $campaignId = null;
    
    /**
     * @var string|null $channelId The channel ID associated with this Teams message.
    */
    private ?string $channelId = null;
    
    /**
     * @var TeamsMessageDeliveryAction|null $deliveryAction The delivery action of this Teams message. The possible values are: unknown, deliveredAsSpam, delivered, blocked, replaced, unknownFutureValue.
    */
    private ?TeamsMessageDeliveryAction $deliveryAction = null;
    
    /**
     * @var TeamsDeliveryLocation|null $deliveryLocation The delivery location of this Teams message. The possible values are: unknown, teams, quarantine, failed, unknownFutureValue.
    */
    private ?TeamsDeliveryLocation $deliveryLocation = null;
    
    /**
     * @var array<FileEvidence>|null $files The list of file entities that are attached to this Teams message.
    */
    private ?array $files = null;
    
    /**
     * @var string|null $groupId The identifier of the team or group that this message is part of.
    */
    private ?string $groupId = null;
    
    /**
     * @var bool|null $isExternal Indicates whether the message is owned by the organization that reported the security detection alert.
    */
    private ?bool $isExternal = null;
    
    /**
     * @var bool|null $isOwned Indicates whether the message is owned by your organization.
    */
    private ?bool $isOwned = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime Date and time when the message was last edited. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var AntispamTeamsDirection|null $messageDirection The direction of the Teams message. The possible values are: unknown, inbound, outbound, intraorg, unknownFutureValue.
    */
    private ?AntispamTeamsDirection $messageDirection = null;
    
    /**
     * @var string|null $messageId Message identifier unique within the thread.
    */
    private ?string $messageId = null;
    
    /**
     * @var string|null $owningTenantId Tenant ID (GUID) of the owner of the message.
    */
    private ?string $owningTenantId = null;
    
    /**
     * @var string|null $parentMessageId Identifier of the message to which the current message is a reply; otherwise, it's the same as the messageId.
    */
    private ?string $parentMessageId = null;
    
    /**
     * @var DateTime|null $receivedDateTime The received date of this message. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $receivedDateTime = null;
    
    /**
     * @var array<string>|null $recipients The recipients of this Teams message.
    */
    private ?array $recipients = null;
    
    /**
     * @var string|null $senderFromAddress The SMTP format address of the sender.
    */
    private ?string $senderFromAddress = null;
    
    /**
     * @var string|null $senderIP The IP address of the sender.
    */
    private ?string $senderIP = null;
    
    /**
     * @var string|null $sourceAppName Source of the message; for example, desktop and mobile.
    */
    private ?string $sourceAppName = null;
    
    /**
     * @var string|null $sourceId The source ID of this Teams message.
    */
    private ?string $sourceId = null;
    
    /**
     * @var string|null $subject The subject of this Teams message.
    */
    private ?string $subject = null;
    
    /**
     * @var array<string>|null $suspiciousRecipients The list of recipients who were detected as suspicious.
    */
    private ?array $suspiciousRecipients = null;
    
    /**
     * @var string|null $threadId Identifier of the channel or chat that this message is part of.
    */
    private ?string $threadId = null;
    
    /**
     * @var string|null $threadType The Teams message type. Supported values are: Chat, Topic, Space, and Meeting.
    */
    private ?string $threadType = null;
    
    /**
     * @var array<UrlEvidence>|null $urls The URLs contained in this Teams message.
    */
    private ?array $urls = null;
    
    /**
     * Instantiates a new TeamsMessageEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.teamsMessageEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TeamsMessageEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TeamsMessageEvidence {
        return new TeamsMessageEvidence();
    }

    /**
     * Gets the campaignId property value. The identifier of the campaign that this Teams message is part of.
     * @return string|null
    */
    public function getCampaignId(): ?string {
        return $this->campaignId;
    }

    /**
     * Gets the channelId property value. The channel ID associated with this Teams message.
     * @return string|null
    */
    public function getChannelId(): ?string {
        return $this->channelId;
    }

    /**
     * Gets the deliveryAction property value. The delivery action of this Teams message. The possible values are: unknown, deliveredAsSpam, delivered, blocked, replaced, unknownFutureValue.
     * @return TeamsMessageDeliveryAction|null
    */
    public function getDeliveryAction(): ?TeamsMessageDeliveryAction {
        return $this->deliveryAction;
    }

    /**
     * Gets the deliveryLocation property value. The delivery location of this Teams message. The possible values are: unknown, teams, quarantine, failed, unknownFutureValue.
     * @return TeamsDeliveryLocation|null
    */
    public function getDeliveryLocation(): ?TeamsDeliveryLocation {
        return $this->deliveryLocation;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'campaignId' => fn(ParseNode $n) => $o->setCampaignId($n->getStringValue()),
            'channelId' => fn(ParseNode $n) => $o->setChannelId($n->getStringValue()),
            'deliveryAction' => fn(ParseNode $n) => $o->setDeliveryAction($n->getEnumValue(TeamsMessageDeliveryAction::class)),
            'deliveryLocation' => fn(ParseNode $n) => $o->setDeliveryLocation($n->getEnumValue(TeamsDeliveryLocation::class)),
            'files' => fn(ParseNode $n) => $o->setFiles($n->getCollectionOfObjectValues([FileEvidence::class, 'createFromDiscriminatorValue'])),
            'groupId' => fn(ParseNode $n) => $o->setGroupId($n->getStringValue()),
            'isExternal' => fn(ParseNode $n) => $o->setIsExternal($n->getBooleanValue()),
            'isOwned' => fn(ParseNode $n) => $o->setIsOwned($n->getBooleanValue()),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'messageDirection' => fn(ParseNode $n) => $o->setMessageDirection($n->getEnumValue(AntispamTeamsDirection::class)),
            'messageId' => fn(ParseNode $n) => $o->setMessageId($n->getStringValue()),
            'owningTenantId' => fn(ParseNode $n) => $o->setOwningTenantId($n->getStringValue()),
            'parentMessageId' => fn(ParseNode $n) => $o->setParentMessageId($n->getStringValue()),
            'receivedDateTime' => fn(ParseNode $n) => $o->setReceivedDateTime($n->getDateTimeValue()),
            'recipients' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setRecipients($val);
            },
            'senderFromAddress' => fn(ParseNode $n) => $o->setSenderFromAddress($n->getStringValue()),
            'senderIP' => fn(ParseNode $n) => $o->setSenderIP($n->getStringValue()),
            'sourceAppName' => fn(ParseNode $n) => $o->setSourceAppName($n->getStringValue()),
            'sourceId' => fn(ParseNode $n) => $o->setSourceId($n->getStringValue()),
            'subject' => fn(ParseNode $n) => $o->setSubject($n->getStringValue()),
            'suspiciousRecipients' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSuspiciousRecipients($val);
            },
            'threadId' => fn(ParseNode $n) => $o->setThreadId($n->getStringValue()),
            'threadType' => fn(ParseNode $n) => $o->setThreadType($n->getStringValue()),
            'urls' => fn(ParseNode $n) => $o->setUrls($n->getCollectionOfObjectValues([UrlEvidence::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the files property value. The list of file entities that are attached to this Teams message.
     * @return array<FileEvidence>|null
    */
    public function getFiles(): ?array {
        return $this->files;
    }

    /**
     * Gets the groupId property value. The identifier of the team or group that this message is part of.
     * @return string|null
    */
    public function getGroupId(): ?string {
        return $this->groupId;
    }

    /**
     * Gets the isExternal property value. Indicates whether the message is owned by the organization that reported the security detection alert.
     * @return bool|null
    */
    public function getIsExternal(): ?bool {
        return $this->isExternal;
    }

    /**
     * Gets the isOwned property value. Indicates whether the message is owned by your organization.
     * @return bool|null
    */
    public function getIsOwned(): ?bool {
        return $this->isOwned;
    }

    /**
     * Gets the lastModifiedDateTime property value. Date and time when the message was last edited. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the messageDirection property value. The direction of the Teams message. The possible values are: unknown, inbound, outbound, intraorg, unknownFutureValue.
     * @return AntispamTeamsDirection|null
    */
    public function getMessageDirection(): ?AntispamTeamsDirection {
        return $this->messageDirection;
    }

    /**
     * Gets the messageId property value. Message identifier unique within the thread.
     * @return string|null
    */
    public function getMessageId(): ?string {
        return $this->messageId;
    }

    /**
     * Gets the owningTenantId property value. Tenant ID (GUID) of the owner of the message.
     * @return string|null
    */
    public function getOwningTenantId(): ?string {
        return $this->owningTenantId;
    }

    /**
     * Gets the parentMessageId property value. Identifier of the message to which the current message is a reply; otherwise, it's the same as the messageId.
     * @return string|null
    */
    public function getParentMessageId(): ?string {
        return $this->parentMessageId;
    }

    /**
     * Gets the receivedDateTime property value. The received date of this message. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getReceivedDateTime(): ?DateTime {
        return $this->receivedDateTime;
    }

    /**
     * Gets the recipients property value. The recipients of this Teams message.
     * @return array<string>|null
    */
    public function getRecipients(): ?array {
        return $this->recipients;
    }

    /**
     * Gets the senderFromAddress property value. The SMTP format address of the sender.
     * @return string|null
    */
    public function getSenderFromAddress(): ?string {
        return $this->senderFromAddress;
    }

    /**
     * Gets the senderIP property value. The IP address of the sender.
     * @return string|null
    */
    public function getSenderIP(): ?string {
        return $this->senderIP;
    }

    /**
     * Gets the sourceAppName property value. Source of the message; for example, desktop and mobile.
     * @return string|null
    */
    public function getSourceAppName(): ?string {
        return $this->sourceAppName;
    }

    /**
     * Gets the sourceId property value. The source ID of this Teams message.
     * @return string|null
    */
    public function getSourceId(): ?string {
        return $this->sourceId;
    }

    /**
     * Gets the subject property value. The subject of this Teams message.
     * @return string|null
    */
    public function getSubject(): ?string {
        return $this->subject;
    }

    /**
     * Gets the suspiciousRecipients property value. The list of recipients who were detected as suspicious.
     * @return array<string>|null
    */
    public function getSuspiciousRecipients(): ?array {
        return $this->suspiciousRecipients;
    }

    /**
     * Gets the threadId property value. Identifier of the channel or chat that this message is part of.
     * @return string|null
    */
    public function getThreadId(): ?string {
        return $this->threadId;
    }

    /**
     * Gets the threadType property value. The Teams message type. Supported values are: Chat, Topic, Space, and Meeting.
     * @return string|null
    */
    public function getThreadType(): ?string {
        return $this->threadType;
    }

    /**
     * Gets the urls property value. The URLs contained in this Teams message.
     * @return array<UrlEvidence>|null
    */
    public function getUrls(): ?array {
        return $this->urls;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('campaignId', $this->getCampaignId());
        $writer->writeStringValue('channelId', $this->getChannelId());
        $writer->writeEnumValue('deliveryAction', $this->getDeliveryAction());
        $writer->writeEnumValue('deliveryLocation', $this->getDeliveryLocation());
        $writer->writeCollectionOfObjectValues('files', $this->getFiles());
        $writer->writeStringValue('groupId', $this->getGroupId());
        $writer->writeBooleanValue('isExternal', $this->getIsExternal());
        $writer->writeBooleanValue('isOwned', $this->getIsOwned());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeEnumValue('messageDirection', $this->getMessageDirection());
        $writer->writeStringValue('messageId', $this->getMessageId());
        $writer->writeStringValue('owningTenantId', $this->getOwningTenantId());
        $writer->writeStringValue('parentMessageId', $this->getParentMessageId());
        $writer->writeDateTimeValue('receivedDateTime', $this->getReceivedDateTime());
        $writer->writeCollectionOfPrimitiveValues('recipients', $this->getRecipients());
        $writer->writeStringValue('senderFromAddress', $this->getSenderFromAddress());
        $writer->writeStringValue('senderIP', $this->getSenderIP());
        $writer->writeStringValue('sourceAppName', $this->getSourceAppName());
        $writer->writeStringValue('sourceId', $this->getSourceId());
        $writer->writeStringValue('subject', $this->getSubject());
        $writer->writeCollectionOfPrimitiveValues('suspiciousRecipients', $this->getSuspiciousRecipients());
        $writer->writeStringValue('threadId', $this->getThreadId());
        $writer->writeStringValue('threadType', $this->getThreadType());
        $writer->writeCollectionOfObjectValues('urls', $this->getUrls());
    }

    /**
     * Sets the campaignId property value. The identifier of the campaign that this Teams message is part of.
     * @param string|null $value Value to set for the campaignId property.
    */
    public function setCampaignId(?string $value): void {
        $this->campaignId = $value;
    }

    /**
     * Sets the channelId property value. The channel ID associated with this Teams message.
     * @param string|null $value Value to set for the channelId property.
    */
    public function setChannelId(?string $value): void {
        $this->channelId = $value;
    }

    /**
     * Sets the deliveryAction property value. The delivery action of this Teams message. The possible values are: unknown, deliveredAsSpam, delivered, blocked, replaced, unknownFutureValue.
     * @param TeamsMessageDeliveryAction|null $value Value to set for the deliveryAction property.
    */
    public function setDeliveryAction(?TeamsMessageDeliveryAction $value): void {
        $this->deliveryAction = $value;
    }

    /**
     * Sets the deliveryLocation property value. The delivery location of this Teams message. The possible values are: unknown, teams, quarantine, failed, unknownFutureValue.
     * @param TeamsDeliveryLocation|null $value Value to set for the deliveryLocation property.
    */
    public function setDeliveryLocation(?TeamsDeliveryLocation $value): void {
        $this->deliveryLocation = $value;
    }

    /**
     * Sets the files property value. The list of file entities that are attached to this Teams message.
     * @param array<FileEvidence>|null $value Value to set for the files property.
    */
    public function setFiles(?array $value): void {
        $this->files = $value;
    }

    /**
     * Sets the groupId property value. The identifier of the team or group that this message is part of.
     * @param string|null $value Value to set for the groupId property.
    */
    public function setGroupId(?string $value): void {
        $this->groupId = $value;
    }

    /**
     * Sets the isExternal property value. Indicates whether the message is owned by the organization that reported the security detection alert.
     * @param bool|null $value Value to set for the isExternal property.
    */
    public function setIsExternal(?bool $value): void {
        $this->isExternal = $value;
    }

    /**
     * Sets the isOwned property value. Indicates whether the message is owned by your organization.
     * @param bool|null $value Value to set for the isOwned property.
    */
    public function setIsOwned(?bool $value): void {
        $this->isOwned = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. Date and time when the message was last edited. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the messageDirection property value. The direction of the Teams message. The possible values are: unknown, inbound, outbound, intraorg, unknownFutureValue.
     * @param AntispamTeamsDirection|null $value Value to set for the messageDirection property.
    */
    public function setMessageDirection(?AntispamTeamsDirection $value): void {
        $this->messageDirection = $value;
    }

    /**
     * Sets the messageId property value. Message identifier unique within the thread.
     * @param string|null $value Value to set for the messageId property.
    */
    public function setMessageId(?string $value): void {
        $this->messageId = $value;
    }

    /**
     * Sets the owningTenantId property value. Tenant ID (GUID) of the owner of the message.
     * @param string|null $value Value to set for the owningTenantId property.
    */
    public function setOwningTenantId(?string $value): void {
        $this->owningTenantId = $value;
    }

    /**
     * Sets the parentMessageId property value. Identifier of the message to which the current message is a reply; otherwise, it's the same as the messageId.
     * @param string|null $value Value to set for the parentMessageId property.
    */
    public function setParentMessageId(?string $value): void {
        $this->parentMessageId = $value;
    }

    /**
     * Sets the receivedDateTime property value. The received date of this message. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the receivedDateTime property.
    */
    public function setReceivedDateTime(?DateTime $value): void {
        $this->receivedDateTime = $value;
    }

    /**
     * Sets the recipients property value. The recipients of this Teams message.
     * @param array<string>|null $value Value to set for the recipients property.
    */
    public function setRecipients(?array $value): void {
        $this->recipients = $value;
    }

    /**
     * Sets the senderFromAddress property value. The SMTP format address of the sender.
     * @param string|null $value Value to set for the senderFromAddress property.
    */
    public function setSenderFromAddress(?string $value): void {
        $this->senderFromAddress = $value;
    }

    /**
     * Sets the senderIP property value. The IP address of the sender.
     * @param string|null $value Value to set for the senderIP property.
    */
    public function setSenderIP(?string $value): void {
        $this->senderIP = $value;
    }

    /**
     * Sets the sourceAppName property value. Source of the message; for example, desktop and mobile.
     * @param string|null $value Value to set for the sourceAppName property.
    */
    public function setSourceAppName(?string $value): void {
        $this->sourceAppName = $value;
    }

    /**
     * Sets the sourceId property value. The source ID of this Teams message.
     * @param string|null $value Value to set for the sourceId property.
    */
    public function setSourceId(?string $value): void {
        $this->sourceId = $value;
    }

    /**
     * Sets the subject property value. The subject of this Teams message.
     * @param string|null $value Value to set for the subject property.
    */
    public function setSubject(?string $value): void {
        $this->subject = $value;
    }

    /**
     * Sets the suspiciousRecipients property value. The list of recipients who were detected as suspicious.
     * @param array<string>|null $value Value to set for the suspiciousRecipients property.
    */
    public function setSuspiciousRecipients(?array $value): void {
        $this->suspiciousRecipients = $value;
    }

    /**
     * Sets the threadId property value. Identifier of the channel or chat that this message is part of.
     * @param string|null $value Value to set for the threadId property.
    */
    public function setThreadId(?string $value): void {
        $this->threadId = $value;
    }

    /**
     * Sets the threadType property value. The Teams message type. Supported values are: Chat, Topic, Space, and Meeting.
     * @param string|null $value Value to set for the threadType property.
    */
    public function setThreadType(?string $value): void {
        $this->threadType = $value;
    }

    /**
     * Sets the urls property value. The URLs contained in this Teams message.
     * @param array<UrlEvidence>|null $value Value to set for the urls property.
    */
    public function setUrls(?array $value): void {
        $this->urls = $value;
    }

}
