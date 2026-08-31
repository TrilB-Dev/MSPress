<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WhoisRecord extends WhoisBaseRecord implements Parsable 
{
    /**
     * @var array<WhoisHistoryRecord>|null $history The collection of historical records associated to this WHOIS object.
    */
    private ?array $history = null;
    
    /**
     * Instantiates a new WhoisRecord and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.whoisRecord');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WhoisRecord
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WhoisRecord {
        return new WhoisRecord();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'history' => fn(ParseNode $n) => $o->setHistory($n->getCollectionOfObjectValues([WhoisHistoryRecord::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the history property value. The collection of historical records associated to this WHOIS object.
     * @return array<WhoisHistoryRecord>|null
    */
    public function getHistory(): ?array {
        return $this->history;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('history', $this->getHistory());
    }

    /**
     * Sets the history property value. The collection of historical records associated to this WHOIS object.
     * @param array<WhoisHistoryRecord>|null $value Value to set for the history property.
    */
    public function setHistory(?array $value): void {
        $this->history = $value;
    }

}
