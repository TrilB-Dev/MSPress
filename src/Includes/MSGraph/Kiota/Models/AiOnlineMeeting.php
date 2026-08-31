<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AiOnlineMeeting extends Entity implements Parsable 
{
    /**
     * @var array<CallAiInsight>|null $aiInsights The aiInsights property
    */
    private ?array $aiInsights = null;
    
    /**
     * Instantiates a new AiOnlineMeeting and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AiOnlineMeeting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AiOnlineMeeting {
        return new AiOnlineMeeting();
    }

    /**
     * Gets the aiInsights property value. The aiInsights property
     * @return array<CallAiInsight>|null
    */
    public function getAiInsights(): ?array {
        return $this->aiInsights;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'aiInsights' => fn(ParseNode $n) => $o->setAiInsights($n->getCollectionOfObjectValues([CallAiInsight::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('aiInsights', $this->getAiInsights());
    }

    /**
     * Sets the aiInsights property value. The aiInsights property
     * @param array<CallAiInsight>|null $value Value to set for the aiInsights property.
    */
    public function setAiInsights(?array $value): void {
        $this->aiInsights = $value;
    }

}
