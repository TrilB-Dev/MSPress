<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ChatMessageHistoryItem implements AdditionalDataHolder, Parsable 
{
    /**
     * @var ChatMessageActions|null $actions The actions property
    */
    private ?ChatMessageActions $actions = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The date and time when the message was modified.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ChatMessageReaction|null $reaction The reaction in the modified message.
    */
    private ?ChatMessageReaction $reaction = null;
    
    /**
     * Instantiates a new ChatMessageHistoryItem and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ChatMessageHistoryItem
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ChatMessageHistoryItem {
        return new ChatMessageHistoryItem();
    }

    /**
     * Gets the actions property value. The actions property
     * @return ChatMessageActions|null
    */
    public function getActions(): ?ChatMessageActions {
        return $this->actions;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'actions' => fn(ParseNode $n) => $o->setActions($n->getEnumValue(ChatMessageActions::class)),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'reaction' => fn(ParseNode $n) => $o->setReaction($n->getObjectValue([ChatMessageReaction::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the modifiedDateTime property value. The date and time when the message was modified.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the reaction property value. The reaction in the modified message.
     * @return ChatMessageReaction|null
    */
    public function getReaction(): ?ChatMessageReaction {
        return $this->reaction;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('actions', $this->getActions());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('reaction', $this->getReaction());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the actions property value. The actions property
     * @param ChatMessageActions|null $value Value to set for the actions property.
    */
    public function setActions(?ChatMessageActions $value): void {
        $this->actions = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The date and time when the message was modified.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the reaction property value. The reaction in the modified message.
     * @param ChatMessageReaction|null $value Value to set for the reaction property.
    */
    public function setReaction(?ChatMessageReaction $value): void {
        $this->reaction = $value;
    }

}
