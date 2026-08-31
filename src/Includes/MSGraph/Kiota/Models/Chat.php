<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Chat extends Entity implements Parsable 
{
    /**
     * @var ChatType|null $chatType The chatType property
    */
    private ?ChatType $chatType = null;
    
    /**
     * @var DateTime|null $createdDateTime Date and time at which the chat was created. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<TeamsAppInstallation>|null $installedApps A collection of all the apps in the chat. Nullable.
    */
    private ?array $installedApps = null;
    
    /**
     * @var bool|null $isHiddenForAllMembers Indicates whether the chat is hidden for all its members. Read-only.
    */
    private ?bool $isHiddenForAllMembers = null;
    
    /**
     * @var ChatMessageInfo|null $lastMessagePreview Preview of the last message sent in the chat. Null if no messages were sent in the chat. Currently, only the list chats operation supports this property.
    */
    private ?ChatMessageInfo $lastMessagePreview = null;
    
    /**
     * @var DateTime|null $lastUpdatedDateTime Date and time at which the chat was renamed or the list of members was last changed. Read-only.
    */
    private ?DateTime $lastUpdatedDateTime = null;
    
    /**
     * @var array<ConversationMember>|null $members A collection of all the members in the chat. Nullable.
    */
    private ?array $members = null;
    
    /**
     * @var array<ChatMessage>|null $messages A collection of all the messages in the chat. Nullable.
    */
    private ?array $messages = null;
    
    /**
     * @var MigrationMode|null $migrationMode Indicates whether a chat is in migration mode. This value is null for chats that never entered migration mode. The possible values are: inProgress, completed, unknownFutureValue.
    */
    private ?MigrationMode $migrationMode = null;
    
    /**
     * @var TeamworkOnlineMeetingInfo|null $onlineMeetingInfo Represents details about an online meeting. If the chat isn't associated with an online meeting, the property is empty. Read-only.
    */
    private ?TeamworkOnlineMeetingInfo $onlineMeetingInfo = null;
    
    /**
     * @var DateTime|null $originalCreatedDateTime Timestamp of the original creation time for the chat. The value is null if the chat never entered migration mode.
    */
    private ?DateTime $originalCreatedDateTime = null;
    
    /**
     * @var array<ResourceSpecificPermissionGrant>|null $permissionGrants A collection of permissions granted to apps for the chat.
    */
    private ?array $permissionGrants = null;
    
    /**
     * @var array<PinnedChatMessageInfo>|null $pinnedMessages A collection of all the pinned messages in the chat. Nullable.
    */
    private ?array $pinnedMessages = null;
    
    /**
     * @var array<TeamsTab>|null $tabs A collection of all the tabs in the chat. Nullable.
    */
    private ?array $tabs = null;
    
    /**
     * @var array<TargetedChatMessage>|null $targetedMessages A collection of targeted messages in the chat that are visible only to specific users. Nullable. You can't expand this relationship using $expand. Targeted messages can also be retrieved via the userTeamwork: getAllTargetedMessages API.
    */
    private ?array $targetedMessages = null;
    
    /**
     * @var string|null $tenantId The identifier of the tenant in which the chat was created. Read-only.
    */
    private ?string $tenantId = null;
    
    /**
     * @var string|null $topic (Optional) Subject or topic for the chat. Only available for group chats.
    */
    private ?string $topic = null;
    
    /**
     * @var ChatViewpoint|null $viewpoint Represents caller-specific information about the chat, such as the last message read date and time. This property is populated only when the request is made in a delegated context.
    */
    private ?ChatViewpoint $viewpoint = null;
    
    /**
     * @var string|null $webUrl The URL for the chat in Microsoft Teams. The URL should be treated as an opaque blob, and not parsed. Read-only.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new Chat and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Chat
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Chat {
        return new Chat();
    }

    /**
     * Gets the chatType property value. The chatType property
     * @return ChatType|null
    */
    public function getChatType(): ?ChatType {
        return $this->chatType;
    }

    /**
     * Gets the createdDateTime property value. Date and time at which the chat was created. Read-only.
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
        return array_merge(parent::getFieldDeserializers(), [
            'chatType' => fn(ParseNode $n) => $o->setChatType($n->getEnumValue(ChatType::class)),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'installedApps' => fn(ParseNode $n) => $o->setInstalledApps($n->getCollectionOfObjectValues([TeamsAppInstallation::class, 'createFromDiscriminatorValue'])),
            'isHiddenForAllMembers' => fn(ParseNode $n) => $o->setIsHiddenForAllMembers($n->getBooleanValue()),
            'lastMessagePreview' => fn(ParseNode $n) => $o->setLastMessagePreview($n->getObjectValue([ChatMessageInfo::class, 'createFromDiscriminatorValue'])),
            'lastUpdatedDateTime' => fn(ParseNode $n) => $o->setLastUpdatedDateTime($n->getDateTimeValue()),
            'members' => fn(ParseNode $n) => $o->setMembers($n->getCollectionOfObjectValues([ConversationMember::class, 'createFromDiscriminatorValue'])),
            'messages' => fn(ParseNode $n) => $o->setMessages($n->getCollectionOfObjectValues([ChatMessage::class, 'createFromDiscriminatorValue'])),
            'migrationMode' => fn(ParseNode $n) => $o->setMigrationMode($n->getEnumValue(MigrationMode::class)),
            'onlineMeetingInfo' => fn(ParseNode $n) => $o->setOnlineMeetingInfo($n->getObjectValue([TeamworkOnlineMeetingInfo::class, 'createFromDiscriminatorValue'])),
            'originalCreatedDateTime' => fn(ParseNode $n) => $o->setOriginalCreatedDateTime($n->getDateTimeValue()),
            'permissionGrants' => fn(ParseNode $n) => $o->setPermissionGrants($n->getCollectionOfObjectValues([ResourceSpecificPermissionGrant::class, 'createFromDiscriminatorValue'])),
            'pinnedMessages' => fn(ParseNode $n) => $o->setPinnedMessages($n->getCollectionOfObjectValues([PinnedChatMessageInfo::class, 'createFromDiscriminatorValue'])),
            'tabs' => fn(ParseNode $n) => $o->setTabs($n->getCollectionOfObjectValues([TeamsTab::class, 'createFromDiscriminatorValue'])),
            'targetedMessages' => fn(ParseNode $n) => $o->setTargetedMessages($n->getCollectionOfObjectValues([TargetedChatMessage::class, 'createFromDiscriminatorValue'])),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'topic' => fn(ParseNode $n) => $o->setTopic($n->getStringValue()),
            'viewpoint' => fn(ParseNode $n) => $o->setViewpoint($n->getObjectValue([ChatViewpoint::class, 'createFromDiscriminatorValue'])),
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the installedApps property value. A collection of all the apps in the chat. Nullable.
     * @return array<TeamsAppInstallation>|null
    */
    public function getInstalledApps(): ?array {
        return $this->installedApps;
    }

    /**
     * Gets the isHiddenForAllMembers property value. Indicates whether the chat is hidden for all its members. Read-only.
     * @return bool|null
    */
    public function getIsHiddenForAllMembers(): ?bool {
        return $this->isHiddenForAllMembers;
    }

    /**
     * Gets the lastMessagePreview property value. Preview of the last message sent in the chat. Null if no messages were sent in the chat. Currently, only the list chats operation supports this property.
     * @return ChatMessageInfo|null
    */
    public function getLastMessagePreview(): ?ChatMessageInfo {
        return $this->lastMessagePreview;
    }

    /**
     * Gets the lastUpdatedDateTime property value. Date and time at which the chat was renamed or the list of members was last changed. Read-only.
     * @return DateTime|null
    */
    public function getLastUpdatedDateTime(): ?DateTime {
        return $this->lastUpdatedDateTime;
    }

    /**
     * Gets the members property value. A collection of all the members in the chat. Nullable.
     * @return array<ConversationMember>|null
    */
    public function getMembers(): ?array {
        return $this->members;
    }

    /**
     * Gets the messages property value. A collection of all the messages in the chat. Nullable.
     * @return array<ChatMessage>|null
    */
    public function getMessages(): ?array {
        return $this->messages;
    }

    /**
     * Gets the migrationMode property value. Indicates whether a chat is in migration mode. This value is null for chats that never entered migration mode. The possible values are: inProgress, completed, unknownFutureValue.
     * @return MigrationMode|null
    */
    public function getMigrationMode(): ?MigrationMode {
        return $this->migrationMode;
    }

    /**
     * Gets the onlineMeetingInfo property value. Represents details about an online meeting. If the chat isn't associated with an online meeting, the property is empty. Read-only.
     * @return TeamworkOnlineMeetingInfo|null
    */
    public function getOnlineMeetingInfo(): ?TeamworkOnlineMeetingInfo {
        return $this->onlineMeetingInfo;
    }

    /**
     * Gets the originalCreatedDateTime property value. Timestamp of the original creation time for the chat. The value is null if the chat never entered migration mode.
     * @return DateTime|null
    */
    public function getOriginalCreatedDateTime(): ?DateTime {
        return $this->originalCreatedDateTime;
    }

    /**
     * Gets the permissionGrants property value. A collection of permissions granted to apps for the chat.
     * @return array<ResourceSpecificPermissionGrant>|null
    */
    public function getPermissionGrants(): ?array {
        return $this->permissionGrants;
    }

    /**
     * Gets the pinnedMessages property value. A collection of all the pinned messages in the chat. Nullable.
     * @return array<PinnedChatMessageInfo>|null
    */
    public function getPinnedMessages(): ?array {
        return $this->pinnedMessages;
    }

    /**
     * Gets the tabs property value. A collection of all the tabs in the chat. Nullable.
     * @return array<TeamsTab>|null
    */
    public function getTabs(): ?array {
        return $this->tabs;
    }

    /**
     * Gets the targetedMessages property value. A collection of targeted messages in the chat that are visible only to specific users. Nullable. You can't expand this relationship using $expand. Targeted messages can also be retrieved via the userTeamwork: getAllTargetedMessages API.
     * @return array<TargetedChatMessage>|null
    */
    public function getTargetedMessages(): ?array {
        return $this->targetedMessages;
    }

    /**
     * Gets the tenantId property value. The identifier of the tenant in which the chat was created. Read-only.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the topic property value. (Optional) Subject or topic for the chat. Only available for group chats.
     * @return string|null
    */
    public function getTopic(): ?string {
        return $this->topic;
    }

    /**
     * Gets the viewpoint property value. Represents caller-specific information about the chat, such as the last message read date and time. This property is populated only when the request is made in a delegated context.
     * @return ChatViewpoint|null
    */
    public function getViewpoint(): ?ChatViewpoint {
        return $this->viewpoint;
    }

    /**
     * Gets the webUrl property value. The URL for the chat in Microsoft Teams. The URL should be treated as an opaque blob, and not parsed. Read-only.
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
        $writer->writeEnumValue('chatType', $this->getChatType());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('installedApps', $this->getInstalledApps());
        $writer->writeBooleanValue('isHiddenForAllMembers', $this->getIsHiddenForAllMembers());
        $writer->writeObjectValue('lastMessagePreview', $this->getLastMessagePreview());
        $writer->writeDateTimeValue('lastUpdatedDateTime', $this->getLastUpdatedDateTime());
        $writer->writeCollectionOfObjectValues('members', $this->getMembers());
        $writer->writeCollectionOfObjectValues('messages', $this->getMessages());
        $writer->writeEnumValue('migrationMode', $this->getMigrationMode());
        $writer->writeObjectValue('onlineMeetingInfo', $this->getOnlineMeetingInfo());
        $writer->writeDateTimeValue('originalCreatedDateTime', $this->getOriginalCreatedDateTime());
        $writer->writeCollectionOfObjectValues('permissionGrants', $this->getPermissionGrants());
        $writer->writeCollectionOfObjectValues('pinnedMessages', $this->getPinnedMessages());
        $writer->writeCollectionOfObjectValues('tabs', $this->getTabs());
        $writer->writeCollectionOfObjectValues('targetedMessages', $this->getTargetedMessages());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeStringValue('topic', $this->getTopic());
        $writer->writeObjectValue('viewpoint', $this->getViewpoint());
        $writer->writeStringValue('webUrl', $this->getWebUrl());
    }

    /**
     * Sets the chatType property value. The chatType property
     * @param ChatType|null $value Value to set for the chatType property.
    */
    public function setChatType(?ChatType $value): void {
        $this->chatType = $value;
    }

    /**
     * Sets the createdDateTime property value. Date and time at which the chat was created. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the installedApps property value. A collection of all the apps in the chat. Nullable.
     * @param array<TeamsAppInstallation>|null $value Value to set for the installedApps property.
    */
    public function setInstalledApps(?array $value): void {
        $this->installedApps = $value;
    }

    /**
     * Sets the isHiddenForAllMembers property value. Indicates whether the chat is hidden for all its members. Read-only.
     * @param bool|null $value Value to set for the isHiddenForAllMembers property.
    */
    public function setIsHiddenForAllMembers(?bool $value): void {
        $this->isHiddenForAllMembers = $value;
    }

    /**
     * Sets the lastMessagePreview property value. Preview of the last message sent in the chat. Null if no messages were sent in the chat. Currently, only the list chats operation supports this property.
     * @param ChatMessageInfo|null $value Value to set for the lastMessagePreview property.
    */
    public function setLastMessagePreview(?ChatMessageInfo $value): void {
        $this->lastMessagePreview = $value;
    }

    /**
     * Sets the lastUpdatedDateTime property value. Date and time at which the chat was renamed or the list of members was last changed. Read-only.
     * @param DateTime|null $value Value to set for the lastUpdatedDateTime property.
    */
    public function setLastUpdatedDateTime(?DateTime $value): void {
        $this->lastUpdatedDateTime = $value;
    }

    /**
     * Sets the members property value. A collection of all the members in the chat. Nullable.
     * @param array<ConversationMember>|null $value Value to set for the members property.
    */
    public function setMembers(?array $value): void {
        $this->members = $value;
    }

    /**
     * Sets the messages property value. A collection of all the messages in the chat. Nullable.
     * @param array<ChatMessage>|null $value Value to set for the messages property.
    */
    public function setMessages(?array $value): void {
        $this->messages = $value;
    }

    /**
     * Sets the migrationMode property value. Indicates whether a chat is in migration mode. This value is null for chats that never entered migration mode. The possible values are: inProgress, completed, unknownFutureValue.
     * @param MigrationMode|null $value Value to set for the migrationMode property.
    */
    public function setMigrationMode(?MigrationMode $value): void {
        $this->migrationMode = $value;
    }

    /**
     * Sets the onlineMeetingInfo property value. Represents details about an online meeting. If the chat isn't associated with an online meeting, the property is empty. Read-only.
     * @param TeamworkOnlineMeetingInfo|null $value Value to set for the onlineMeetingInfo property.
    */
    public function setOnlineMeetingInfo(?TeamworkOnlineMeetingInfo $value): void {
        $this->onlineMeetingInfo = $value;
    }

    /**
     * Sets the originalCreatedDateTime property value. Timestamp of the original creation time for the chat. The value is null if the chat never entered migration mode.
     * @param DateTime|null $value Value to set for the originalCreatedDateTime property.
    */
    public function setOriginalCreatedDateTime(?DateTime $value): void {
        $this->originalCreatedDateTime = $value;
    }

    /**
     * Sets the permissionGrants property value. A collection of permissions granted to apps for the chat.
     * @param array<ResourceSpecificPermissionGrant>|null $value Value to set for the permissionGrants property.
    */
    public function setPermissionGrants(?array $value): void {
        $this->permissionGrants = $value;
    }

    /**
     * Sets the pinnedMessages property value. A collection of all the pinned messages in the chat. Nullable.
     * @param array<PinnedChatMessageInfo>|null $value Value to set for the pinnedMessages property.
    */
    public function setPinnedMessages(?array $value): void {
        $this->pinnedMessages = $value;
    }

    /**
     * Sets the tabs property value. A collection of all the tabs in the chat. Nullable.
     * @param array<TeamsTab>|null $value Value to set for the tabs property.
    */
    public function setTabs(?array $value): void {
        $this->tabs = $value;
    }

    /**
     * Sets the targetedMessages property value. A collection of targeted messages in the chat that are visible only to specific users. Nullable. You can't expand this relationship using $expand. Targeted messages can also be retrieved via the userTeamwork: getAllTargetedMessages API.
     * @param array<TargetedChatMessage>|null $value Value to set for the targetedMessages property.
    */
    public function setTargetedMessages(?array $value): void {
        $this->targetedMessages = $value;
    }

    /**
     * Sets the tenantId property value. The identifier of the tenant in which the chat was created. Read-only.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the topic property value. (Optional) Subject or topic for the chat. Only available for group chats.
     * @param string|null $value Value to set for the topic property.
    */
    public function setTopic(?string $value): void {
        $this->topic = $value;
    }

    /**
     * Sets the viewpoint property value. Represents caller-specific information about the chat, such as the last message read date and time. This property is populated only when the request is made in a delegated context.
     * @param ChatViewpoint|null $value Value to set for the viewpoint property.
    */
    public function setViewpoint(?ChatViewpoint $value): void {
        $this->viewpoint = $value;
    }

    /**
     * Sets the webUrl property value. The URL for the chat in Microsoft Teams. The URL should be treated as an opaque blob, and not parsed. Read-only.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
