<?php

namespace MSPress\Includes\Plugins\Exchange\Includes\Kiota\Users\Item\SendMail;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Message;

class SendMailPostRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Message|null $message The Message property
    */
    private ?Message $message = null;
    
    /**
     * @var bool|null $saveToSentItems The SaveToSentItems property
    */
    private ?bool $saveToSentItems = null;
    
    /**
     * Instantiates a new SendMailPostRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
        $this->setSaveToSentItems(false);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SendMailPostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SendMailPostRequestBody {
        return new SendMailPostRequestBody();
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
            'Message' => fn(ParseNode $n) => $o->setMessage($n->getObjectValue([Message::class, 'createFromDiscriminatorValue'])),
            'SaveToSentItems' => fn(ParseNode $n) => $o->setSaveToSentItems($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the Message property value. The Message property
     * @return Message|null
    */
    public function getMessage(): ?Message {
        return $this->message;
    }

    /**
     * Gets the SaveToSentItems property value. The SaveToSentItems property
     * @return bool|null
    */
    public function getSaveToSentItems(): ?bool {
        return $this->saveToSentItems;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('Message', $this->getMessage());
        $writer->writeBooleanValue('SaveToSentItems', $this->getSaveToSentItems());
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
     * Sets the Message property value. The Message property
     * @param Message|null $value Value to set for the Message property.
    */
    public function setMessage(?Message $value): void {
        $this->message = $value;
    }

    /**
     * Sets the SaveToSentItems property value. The SaveToSentItems property
     * @param bool|null $value Value to set for the SaveToSentItems property.
    */
    public function setSaveToSentItems(?bool $value): void {
        $this->saveToSentItems = $value;
    }

}
