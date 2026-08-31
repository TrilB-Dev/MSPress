<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExchangeAdmin extends Entity implements Parsable 
{
    /**
     * @var array<Mailbox>|null $mailboxes Represents a user's mailboxes.
    */
    private ?array $mailboxes = null;
    
    /**
     * @var MessageTracingRoot|null $tracing Represents a container for administrative resources to trace messages.
    */
    private ?MessageTracingRoot $tracing = null;
    
    /**
     * Instantiates a new ExchangeAdmin and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExchangeAdmin
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExchangeAdmin {
        return new ExchangeAdmin();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'mailboxes' => fn(ParseNode $n) => $o->setMailboxes($n->getCollectionOfObjectValues([Mailbox::class, 'createFromDiscriminatorValue'])),
            'tracing' => fn(ParseNode $n) => $o->setTracing($n->getObjectValue([MessageTracingRoot::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the mailboxes property value. Represents a user's mailboxes.
     * @return array<Mailbox>|null
    */
    public function getMailboxes(): ?array {
        return $this->mailboxes;
    }

    /**
     * Gets the tracing property value. Represents a container for administrative resources to trace messages.
     * @return MessageTracingRoot|null
    */
    public function getTracing(): ?MessageTracingRoot {
        return $this->tracing;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('mailboxes', $this->getMailboxes());
        $writer->writeObjectValue('tracing', $this->getTracing());
    }

    /**
     * Sets the mailboxes property value. Represents a user's mailboxes.
     * @param array<Mailbox>|null $value Value to set for the mailboxes property.
    */
    public function setMailboxes(?array $value): void {
        $this->mailboxes = $value;
    }

    /**
     * Sets the tracing property value. Represents a container for administrative resources to trace messages.
     * @param MessageTracingRoot|null $value Value to set for the tracing property.
    */
    public function setTracing(?MessageTracingRoot $value): void {
        $this->tracing = $value;
    }

}
