<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Channel extends Entity implements Parsable 
{
    /**
     * @var array<ConversationMember>|null $allMembers A collection of membership records associated with the channel, including both direct and indirect members of shared channels.
    */
    private ?array $allMembers = null;
    
    /**
     * @var DateTime|null $createdDateTime Read-only. Timestamp at which the channel was created.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description Optional textual description for the channel.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Channel name as it will appear to the user in Microsoft Teams. The maximum length is 50 characters.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $email The email address for sending messages to the channel. Read-only.
    */
    private ?string $email = null;
    
    /**
     * @var array<TeamsApp>|null $enabledApps A collection of enabled apps in the channel.
    */
    private ?array $enabledApps = null;
    
    /**
     * @var DriveItem|null $filesFolder Metadata for the location where the channel's files are stored.
    */
    private ?DriveItem $filesFolder = null;
    
    /**
     * @var bool|null $isArchived Indicates whether the channel is archived. Read-only.
    */
    private ?bool $isArchived = null;
    
    /**
     * @var bool|null $isFavoriteByDefault Indicates whether the channel should be marked as recommended for all members of the team to show in their channel list. Note: All recommended channels automatically show in the channels list for education and frontline worker users. The property can only be set programmatically via the Create team method. The default value is false.
    */
    private ?bool $isFavoriteByDefault = null;
    
    /**
     * @var ChannelLayoutType|null $layoutType The layout type of the channel. It can be set during creation and updated later. The possible values are: post, chat, unknownFutureValue. The default value is post. Channels with the post layout use a traditional post‑reply conversation format, and channels with the chat layout provide a chat‑like threading experience similar to group chats.
    */
    private ?ChannelLayoutType $layoutType = null;
    
    /**
     * @var array<ConversationMember>|null $members A collection of membership records associated with the channel.
    */
    private ?array $members = null;
    
    /**
     * @var ChannelMembershipType|null $membershipType The type of the channel. Can be set during creation and can't be changed. The possible values are: standard, private, unknownFutureValue, shared. The default value is standard. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: shared.
    */
    private ?ChannelMembershipType $membershipType = null;
    
    /**
     * @var array<ChatMessage>|null $messages A collection of all the messages in the channel. A navigation property. Nullable.
    */
    private ?array $messages = null;
    
    /**
     * @var MigrationMode|null $migrationMode Indicates whether a channel is in migration mode. This value is null for channels that never entered migration mode. The possible values are: inProgress, completed, unknownFutureValue.
    */
    private ?MigrationMode $migrationMode = null;
    
    /**
     * @var DateTime|null $originalCreatedDateTime Timestamp of the original creation time for the channel. The value is null if the channel never entered migration mode.
    */
    private ?DateTime $originalCreatedDateTime = null;
    
    /**
     * @var array<SharedWithChannelTeamInfo>|null $sharedWithTeams A collection of teams with which a channel is shared.
    */
    private ?array $sharedWithTeams = null;
    
    /**
     * @var ChannelSummary|null $summary Contains summary information about the channel, including number of owners, members, guests, and an indicator for members from other tenants. The summary property will only be returned if it is specified in the $select clause of the Get channel method.
    */
    private ?ChannelSummary $summary = null;
    
    /**
     * @var array<TeamsTab>|null $tabs A collection of all the tabs in the channel. A navigation property.
    */
    private ?array $tabs = null;
    
    /**
     * @var string|null $tenantId The ID of the Microsoft Entra tenant.
    */
    private ?string $tenantId = null;
    
    /**
     * @var string|null $webUrl A hyperlink that will go to the channel in Microsoft Teams. This is the URL that you get when you right-click a channel in Microsoft Teams and select Get link to channel. This URL should be treated as an opaque blob, and not parsed. Read-only.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new Channel and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Channel
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Channel {
        return new Channel();
    }

    /**
     * Gets the allMembers property value. A collection of membership records associated with the channel, including both direct and indirect members of shared channels.
     * @return array<ConversationMember>|null
    */
    public function getAllMembers(): ?array {
        return $this->allMembers;
    }

    /**
     * Gets the createdDateTime property value. Read-only. Timestamp at which the channel was created.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. Optional textual description for the channel.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Channel name as it will appear to the user in Microsoft Teams. The maximum length is 50 characters.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the email property value. The email address for sending messages to the channel. Read-only.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Gets the enabledApps property value. A collection of enabled apps in the channel.
     * @return array<TeamsApp>|null
    */
    public function getEnabledApps(): ?array {
        return $this->enabledApps;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'allMembers' => fn(ParseNode $n) => $o->setAllMembers($n->getCollectionOfObjectValues([ConversationMember::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'enabledApps' => fn(ParseNode $n) => $o->setEnabledApps($n->getCollectionOfObjectValues([TeamsApp::class, 'createFromDiscriminatorValue'])),
            'filesFolder' => fn(ParseNode $n) => $o->setFilesFolder($n->getObjectValue([DriveItem::class, 'createFromDiscriminatorValue'])),
            'isArchived' => fn(ParseNode $n) => $o->setIsArchived($n->getBooleanValue()),
            'isFavoriteByDefault' => fn(ParseNode $n) => $o->setIsFavoriteByDefault($n->getBooleanValue()),
            'layoutType' => fn(ParseNode $n) => $o->setLayoutType($n->getEnumValue(ChannelLayoutType::class)),
            'members' => fn(ParseNode $n) => $o->setMembers($n->getCollectionOfObjectValues([ConversationMember::class, 'createFromDiscriminatorValue'])),
            'membershipType' => fn(ParseNode $n) => $o->setMembershipType($n->getEnumValue(ChannelMembershipType::class)),
            'messages' => fn(ParseNode $n) => $o->setMessages($n->getCollectionOfObjectValues([ChatMessage::class, 'createFromDiscriminatorValue'])),
            'migrationMode' => fn(ParseNode $n) => $o->setMigrationMode($n->getEnumValue(MigrationMode::class)),
            'originalCreatedDateTime' => fn(ParseNode $n) => $o->setOriginalCreatedDateTime($n->getDateTimeValue()),
            'sharedWithTeams' => fn(ParseNode $n) => $o->setSharedWithTeams($n->getCollectionOfObjectValues([SharedWithChannelTeamInfo::class, 'createFromDiscriminatorValue'])),
            'summary' => fn(ParseNode $n) => $o->setSummary($n->getObjectValue([ChannelSummary::class, 'createFromDiscriminatorValue'])),
            'tabs' => fn(ParseNode $n) => $o->setTabs($n->getCollectionOfObjectValues([TeamsTab::class, 'createFromDiscriminatorValue'])),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the filesFolder property value. Metadata for the location where the channel's files are stored.
     * @return DriveItem|null
    */
    public function getFilesFolder(): ?DriveItem {
        return $this->filesFolder;
    }

    /**
     * Gets the isArchived property value. Indicates whether the channel is archived. Read-only.
     * @return bool|null
    */
    public function getIsArchived(): ?bool {
        return $this->isArchived;
    }

    /**
     * Gets the isFavoriteByDefault property value. Indicates whether the channel should be marked as recommended for all members of the team to show in their channel list. Note: All recommended channels automatically show in the channels list for education and frontline worker users. The property can only be set programmatically via the Create team method. The default value is false.
     * @return bool|null
    */
    public function getIsFavoriteByDefault(): ?bool {
        return $this->isFavoriteByDefault;
    }

    /**
     * Gets the layoutType property value. The layout type of the channel. It can be set during creation and updated later. The possible values are: post, chat, unknownFutureValue. The default value is post. Channels with the post layout use a traditional post‑reply conversation format, and channels with the chat layout provide a chat‑like threading experience similar to group chats.
     * @return ChannelLayoutType|null
    */
    public function getLayoutType(): ?ChannelLayoutType {
        return $this->layoutType;
    }

    /**
     * Gets the members property value. A collection of membership records associated with the channel.
     * @return array<ConversationMember>|null
    */
    public function getMembers(): ?array {
        return $this->members;
    }

    /**
     * Gets the membershipType property value. The type of the channel. Can be set during creation and can't be changed. The possible values are: standard, private, unknownFutureValue, shared. The default value is standard. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: shared.
     * @return ChannelMembershipType|null
    */
    public function getMembershipType(): ?ChannelMembershipType {
        return $this->membershipType;
    }

    /**
     * Gets the messages property value. A collection of all the messages in the channel. A navigation property. Nullable.
     * @return array<ChatMessage>|null
    */
    public function getMessages(): ?array {
        return $this->messages;
    }

    /**
     * Gets the migrationMode property value. Indicates whether a channel is in migration mode. This value is null for channels that never entered migration mode. The possible values are: inProgress, completed, unknownFutureValue.
     * @return MigrationMode|null
    */
    public function getMigrationMode(): ?MigrationMode {
        return $this->migrationMode;
    }

    /**
     * Gets the originalCreatedDateTime property value. Timestamp of the original creation time for the channel. The value is null if the channel never entered migration mode.
     * @return DateTime|null
    */
    public function getOriginalCreatedDateTime(): ?DateTime {
        return $this->originalCreatedDateTime;
    }

    /**
     * Gets the sharedWithTeams property value. A collection of teams with which a channel is shared.
     * @return array<SharedWithChannelTeamInfo>|null
    */
    public function getSharedWithTeams(): ?array {
        return $this->sharedWithTeams;
    }

    /**
     * Gets the summary property value. Contains summary information about the channel, including number of owners, members, guests, and an indicator for members from other tenants. The summary property will only be returned if it is specified in the $select clause of the Get channel method.
     * @return ChannelSummary|null
    */
    public function getSummary(): ?ChannelSummary {
        return $this->summary;
    }

    /**
     * Gets the tabs property value. A collection of all the tabs in the channel. A navigation property.
     * @return array<TeamsTab>|null
    */
    public function getTabs(): ?array {
        return $this->tabs;
    }

    /**
     * Gets the tenantId property value. The ID of the Microsoft Entra tenant.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the webUrl property value. A hyperlink that will go to the channel in Microsoft Teams. This is the URL that you get when you right-click a channel in Microsoft Teams and select Get link to channel. This URL should be treated as an opaque blob, and not parsed. Read-only.
     * @return string|null
    */
    public function getWebUrl(): ?string {
        return $this->webUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('allMembers', $this->getAllMembers());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeCollectionOfObjectValues('enabledApps', $this->getEnabledApps());
        $writer->writeObjectValue('filesFolder', $this->getFilesFolder());
        $writer->writeBooleanValue('isArchived', $this->getIsArchived());
        $writer->writeBooleanValue('isFavoriteByDefault', $this->getIsFavoriteByDefault());
        $writer->writeEnumValue('layoutType', $this->getLayoutType());
        $writer->writeCollectionOfObjectValues('members', $this->getMembers());
        $writer->writeEnumValue('membershipType', $this->getMembershipType());
        $writer->writeCollectionOfObjectValues('messages', $this->getMessages());
        $writer->writeEnumValue('migrationMode', $this->getMigrationMode());
        $writer->writeDateTimeValue('originalCreatedDateTime', $this->getOriginalCreatedDateTime());
        $writer->writeCollectionOfObjectValues('sharedWithTeams', $this->getSharedWithTeams());
        $writer->writeObjectValue('summary', $this->getSummary());
        $writer->writeCollectionOfObjectValues('tabs', $this->getTabs());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeStringValue('webUrl', $this->getWebUrl());
    }

    /**
     * Sets the allMembers property value. A collection of membership records associated with the channel, including both direct and indirect members of shared channels.
     * @param array<ConversationMember>|null $value Value to set for the allMembers property.
    */
    public function setAllMembers(?array $value): void {
        $this->allMembers = $value;
    }

    /**
     * Sets the createdDateTime property value. Read-only. Timestamp at which the channel was created.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. Optional textual description for the channel.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Channel name as it will appear to the user in Microsoft Teams. The maximum length is 50 characters.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the email property value. The email address for sending messages to the channel. Read-only.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the enabledApps property value. A collection of enabled apps in the channel.
     * @param array<TeamsApp>|null $value Value to set for the enabledApps property.
    */
    public function setEnabledApps(?array $value): void {
        $this->enabledApps = $value;
    }

    /**
     * Sets the filesFolder property value. Metadata for the location where the channel's files are stored.
     * @param DriveItem|null $value Value to set for the filesFolder property.
    */
    public function setFilesFolder(?DriveItem $value): void {
        $this->filesFolder = $value;
    }

    /**
     * Sets the isArchived property value. Indicates whether the channel is archived. Read-only.
     * @param bool|null $value Value to set for the isArchived property.
    */
    public function setIsArchived(?bool $value): void {
        $this->isArchived = $value;
    }

    /**
     * Sets the isFavoriteByDefault property value. Indicates whether the channel should be marked as recommended for all members of the team to show in their channel list. Note: All recommended channels automatically show in the channels list for education and frontline worker users. The property can only be set programmatically via the Create team method. The default value is false.
     * @param bool|null $value Value to set for the isFavoriteByDefault property.
    */
    public function setIsFavoriteByDefault(?bool $value): void {
        $this->isFavoriteByDefault = $value;
    }

    /**
     * Sets the layoutType property value. The layout type of the channel. It can be set during creation and updated later. The possible values are: post, chat, unknownFutureValue. The default value is post. Channels with the post layout use a traditional post‑reply conversation format, and channels with the chat layout provide a chat‑like threading experience similar to group chats.
     * @param ChannelLayoutType|null $value Value to set for the layoutType property.
    */
    public function setLayoutType(?ChannelLayoutType $value): void {
        $this->layoutType = $value;
    }

    /**
     * Sets the members property value. A collection of membership records associated with the channel.
     * @param array<ConversationMember>|null $value Value to set for the members property.
    */
    public function setMembers(?array $value): void {
        $this->members = $value;
    }

    /**
     * Sets the membershipType property value. The type of the channel. Can be set during creation and can't be changed. The possible values are: standard, private, unknownFutureValue, shared. The default value is standard. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: shared.
     * @param ChannelMembershipType|null $value Value to set for the membershipType property.
    */
    public function setMembershipType(?ChannelMembershipType $value): void {
        $this->membershipType = $value;
    }

    /**
     * Sets the messages property value. A collection of all the messages in the channel. A navigation property. Nullable.
     * @param array<ChatMessage>|null $value Value to set for the messages property.
    */
    public function setMessages(?array $value): void {
        $this->messages = $value;
    }

    /**
     * Sets the migrationMode property value. Indicates whether a channel is in migration mode. This value is null for channels that never entered migration mode. The possible values are: inProgress, completed, unknownFutureValue.
     * @param MigrationMode|null $value Value to set for the migrationMode property.
    */
    public function setMigrationMode(?MigrationMode $value): void {
        $this->migrationMode = $value;
    }

    /**
     * Sets the originalCreatedDateTime property value. Timestamp of the original creation time for the channel. The value is null if the channel never entered migration mode.
     * @param DateTime|null $value Value to set for the originalCreatedDateTime property.
    */
    public function setOriginalCreatedDateTime(?DateTime $value): void {
        $this->originalCreatedDateTime = $value;
    }

    /**
     * Sets the sharedWithTeams property value. A collection of teams with which a channel is shared.
     * @param array<SharedWithChannelTeamInfo>|null $value Value to set for the sharedWithTeams property.
    */
    public function setSharedWithTeams(?array $value): void {
        $this->sharedWithTeams = $value;
    }

    /**
     * Sets the summary property value. Contains summary information about the channel, including number of owners, members, guests, and an indicator for members from other tenants. The summary property will only be returned if it is specified in the $select clause of the Get channel method.
     * @param ChannelSummary|null $value Value to set for the summary property.
    */
    public function setSummary(?ChannelSummary $value): void {
        $this->summary = $value;
    }

    /**
     * Sets the tabs property value. A collection of all the tabs in the channel. A navigation property.
     * @param array<TeamsTab>|null $value Value to set for the tabs property.
    */
    public function setTabs(?array $value): void {
        $this->tabs = $value;
    }

    /**
     * Sets the tenantId property value. The ID of the Microsoft Entra tenant.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the webUrl property value. A hyperlink that will go to the channel in Microsoft Teams. This is the URL that you get when you right-click a channel in Microsoft Teams and select Get link to channel. This URL should be treated as an opaque blob, and not parsed. Read-only.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
