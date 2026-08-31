<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ChatMessageReaction implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTime|null $createdDateTime The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $displayName The name of the reaction.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $reactionContentUrl The hosted content URL for the custom reaction type.
    */
    private ?string $reactionContentUrl = null;
    
    /**
     * @var string|null $reactionType The reaction type. Supported values include Unicode characters, custom, and some backward-compatible reaction types, such as like, angry, sad, laugh, heart, and surprised.
    */
    private ?string $reactionType = null;
    
    /**
     * @var ChatMessageReactionIdentitySet|null $user The user property
    */
    private ?ChatMessageReactionIdentitySet $user = null;
    
    /**
     * Instantiates a new ChatMessageReaction and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ChatMessageReaction
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ChatMessageReaction {
        return new ChatMessageReaction();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the createdDateTime property value. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the displayName property value. The name of the reaction.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'reactionContentUrl' => fn(ParseNode $n) => $o->setReactionContentUrl($n->getStringValue()),
            'reactionType' => fn(ParseNode $n) => $o->setReactionType($n->getStringValue()),
            'user' => fn(ParseNode $n) => $o->setUser($n->getObjectValue([ChatMessageReactionIdentitySet::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the reactionContentUrl property value. The hosted content URL for the custom reaction type.
     * @return string|null
    */
    public function getReactionContentUrl(): ?string {
        return $this->reactionContentUrl;
    }

    /**
     * Gets the reactionType property value. The reaction type. Supported values include Unicode characters, custom, and some backward-compatible reaction types, such as like, angry, sad, laugh, heart, and surprised.
     * @return string|null
    */
    public function getReactionType(): ?string {
        return $this->reactionType;
    }

    /**
     * Gets the user property value. The user property
     * @return ChatMessageReactionIdentitySet|null
    */
    public function getUser(): ?ChatMessageReactionIdentitySet {
        return $this->user;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('reactionContentUrl', $this->getReactionContentUrl());
        $writer->writeStringValue('reactionType', $this->getReactionType());
        $writer->writeObjectValue('user', $this->getUser());
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
     * Sets the createdDateTime property value. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the displayName property value. The name of the reaction.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the reactionContentUrl property value. The hosted content URL for the custom reaction type.
     * @param string|null $value Value to set for the reactionContentUrl property.
    */
    public function setReactionContentUrl(?string $value): void {
        $this->reactionContentUrl = $value;
    }

    /**
     * Sets the reactionType property value. The reaction type. Supported values include Unicode characters, custom, and some backward-compatible reaction types, such as like, angry, sad, laugh, heart, and surprised.
     * @param string|null $value Value to set for the reactionType property.
    */
    public function setReactionType(?string $value): void {
        $this->reactionType = $value;
    }

    /**
     * Sets the user property value. The user property
     * @param ChatMessageReactionIdentitySet|null $value Value to set for the user property.
    */
    public function setUser(?ChatMessageReactionIdentitySet $value): void {
        $this->user = $value;
    }

}
