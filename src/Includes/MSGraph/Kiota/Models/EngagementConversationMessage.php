<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * A Viva Engage conversation message.
*/
class EngagementConversationMessage extends Entity implements Parsable 
{
    /**
     * @var ItemBody|null $body The body property
    */
    private ?ItemBody $body = null;
    
    /**
     * @var EngagementConversation|null $conversation The conversation property
    */
    private ?EngagementConversation $conversation = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when the message was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var EngagementCreationMode|null $creationMode Indicates that the resource is in migration state and is currently being used for migration purposes.
    */
    private ?EngagementCreationMode $creationMode = null;
    
    /**
     * @var EngagementIdentitySet|null $from Identity of the sender of the message.
    */
    private ?EngagementIdentitySet $from = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The date and time when message was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var array<EngagementConversationMessageReaction>|null $reactions A collection of reactions (such as like and smile) that users have applied to this message.
    */
    private ?array $reactions = null;
    
    /**
     * @var array<EngagementConversationMessage>|null $replies A collection of messages that are replies to this message and form a threaded discussion.
    */
    private ?array $replies = null;
    
    /**
     * @var EngagementConversationMessage|null $replyTo The parent message to which this message is a reply, if it is part of a reply chain.
    */
    private ?EngagementConversationMessage $replyTo = null;
    
    /**
     * @var string|null $replyToId The ID of the parent message to which this message is a reply, if applicable.
    */
    private ?string $replyToId = null;
    
    /**
     * Instantiates a new EngagementConversationMessage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EngagementConversationMessage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EngagementConversationMessage {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.engagementConversationDiscussionMessage': return new EngagementConversationDiscussionMessage();
                case '#microsoft.graph.engagementConversationQuestionMessage': return new EngagementConversationQuestionMessage();
                case '#microsoft.graph.engagementConversationSystemMessage': return new EngagementConversationSystemMessage();
            }
        }
        return new EngagementConversationMessage();
    }

    /**
     * Gets the body property value. The body property
     * @return ItemBody|null
    */
    public function getBody(): ?ItemBody {
        return $this->body;
    }

    /**
     * Gets the conversation property value. The conversation property
     * @return EngagementConversation|null
    */
    public function getConversation(): ?EngagementConversation {
        return $this->conversation;
    }

    /**
     * Gets the createdDateTime property value. The date and time when the message was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the creationMode property value. Indicates that the resource is in migration state and is currently being used for migration purposes.
     * @return EngagementCreationMode|null
    */
    public function getCreationMode(): ?EngagementCreationMode {
        return $this->creationMode;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'body' => fn(ParseNode $n) => $o->setBody($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
            'conversation' => fn(ParseNode $n) => $o->setConversation($n->getObjectValue([EngagementConversation::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'creationMode' => fn(ParseNode $n) => $o->setCreationMode($n->getEnumValue(EngagementCreationMode::class)),
            'from' => fn(ParseNode $n) => $o->setFrom($n->getObjectValue([EngagementIdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'reactions' => fn(ParseNode $n) => $o->setReactions($n->getCollectionOfObjectValues([EngagementConversationMessageReaction::class, 'createFromDiscriminatorValue'])),
            'replies' => fn(ParseNode $n) => $o->setReplies($n->getCollectionOfObjectValues([EngagementConversationMessage::class, 'createFromDiscriminatorValue'])),
            'replyTo' => fn(ParseNode $n) => $o->setReplyTo($n->getObjectValue([EngagementConversationMessage::class, 'createFromDiscriminatorValue'])),
            'replyToId' => fn(ParseNode $n) => $o->setReplyToId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the from property value. Identity of the sender of the message.
     * @return EngagementIdentitySet|null
    */
    public function getFrom(): ?EngagementIdentitySet {
        return $this->from;
    }

    /**
     * Gets the lastModifiedDateTime property value. The date and time when message was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the reactions property value. A collection of reactions (such as like and smile) that users have applied to this message.
     * @return array<EngagementConversationMessageReaction>|null
    */
    public function getReactions(): ?array {
        return $this->reactions;
    }

    /**
     * Gets the replies property value. A collection of messages that are replies to this message and form a threaded discussion.
     * @return array<EngagementConversationMessage>|null
    */
    public function getReplies(): ?array {
        return $this->replies;
    }

    /**
     * Gets the replyTo property value. The parent message to which this message is a reply, if it is part of a reply chain.
     * @return EngagementConversationMessage|null
    */
    public function getReplyTo(): ?EngagementConversationMessage {
        return $this->replyTo;
    }

    /**
     * Gets the replyToId property value. The ID of the parent message to which this message is a reply, if applicable.
     * @return string|null
    */
    public function getReplyToId(): ?string {
        return $this->replyToId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('body', $this->getBody());
        $writer->writeObjectValue('conversation', $this->getConversation());
        $writer->writeEnumValue('creationMode', $this->getCreationMode());
        $writer->writeObjectValue('from', $this->getFrom());
        $writer->writeCollectionOfObjectValues('reactions', $this->getReactions());
        $writer->writeCollectionOfObjectValues('replies', $this->getReplies());
        $writer->writeObjectValue('replyTo', $this->getReplyTo());
        $writer->writeStringValue('replyToId', $this->getReplyToId());
    }

    /**
     * Sets the body property value. The body property
     * @param ItemBody|null $value Value to set for the body property.
    */
    public function setBody(?ItemBody $value): void {
        $this->body = $value;
    }

    /**
     * Sets the conversation property value. The conversation property
     * @param EngagementConversation|null $value Value to set for the conversation property.
    */
    public function setConversation(?EngagementConversation $value): void {
        $this->conversation = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when the message was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the creationMode property value. Indicates that the resource is in migration state and is currently being used for migration purposes.
     * @param EngagementCreationMode|null $value Value to set for the creationMode property.
    */
    public function setCreationMode(?EngagementCreationMode $value): void {
        $this->creationMode = $value;
    }

    /**
     * Sets the from property value. Identity of the sender of the message.
     * @param EngagementIdentitySet|null $value Value to set for the from property.
    */
    public function setFrom(?EngagementIdentitySet $value): void {
        $this->from = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The date and time when message was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the reactions property value. A collection of reactions (such as like and smile) that users have applied to this message.
     * @param array<EngagementConversationMessageReaction>|null $value Value to set for the reactions property.
    */
    public function setReactions(?array $value): void {
        $this->reactions = $value;
    }

    /**
     * Sets the replies property value. A collection of messages that are replies to this message and form a threaded discussion.
     * @param array<EngagementConversationMessage>|null $value Value to set for the replies property.
    */
    public function setReplies(?array $value): void {
        $this->replies = $value;
    }

    /**
     * Sets the replyTo property value. The parent message to which this message is a reply, if it is part of a reply chain.
     * @param EngagementConversationMessage|null $value Value to set for the replyTo property.
    */
    public function setReplyTo(?EngagementConversationMessage $value): void {
        $this->replyTo = $value;
    }

    /**
     * Sets the replyToId property value. The ID of the parent message to which this message is a reply, if applicable.
     * @param string|null $value Value to set for the replyToId property.
    */
    public function setReplyToId(?string $value): void {
        $this->replyToId = $value;
    }

}
