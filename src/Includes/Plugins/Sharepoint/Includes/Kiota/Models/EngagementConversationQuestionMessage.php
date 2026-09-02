<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * A Viva Engage conversation question message.
*/
class EngagementConversationQuestionMessage extends EngagementConversationMessage implements Parsable 
{
    /**
     * @var string|null $title The title of the question post message on Viva Engage. Inherited from engagementConversationMessage.
    */
    private ?string $title = null;
    
    /**
     * Instantiates a new EngagementConversationQuestionMessage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.engagementConversationQuestionMessage');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EngagementConversationQuestionMessage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EngagementConversationQuestionMessage {
        return new EngagementConversationQuestionMessage();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
        ]);
    }

    /**
     * Gets the title property value. The title of the question post message on Viva Engage. Inherited from engagementConversationMessage.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('title', $this->getTitle());
    }

    /**
     * Sets the title property value. The title of the question post message on Viva Engage. Inherited from engagementConversationMessage.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

}
