<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExchangeRestoreSession extends RestoreSessionBase implements Parsable 
{
    /**
     * @var array<GranularMailboxRestoreArtifact>|null $granularMailboxRestoreArtifacts The granularMailboxRestoreArtifacts property
    */
    private ?array $granularMailboxRestoreArtifacts = null;
    
    /**
     * @var array<MailboxRestoreArtifact>|null $mailboxRestoreArtifacts A collection of restore points and destination details that can be used to restore Exchange mailboxes.
    */
    private ?array $mailboxRestoreArtifacts = null;
    
    /**
     * @var array<MailboxRestoreArtifactsBulkAdditionRequest>|null $mailboxRestoreArtifactsBulkAdditionRequests A collection of user mailboxes and destination details that can be used to restore Exchange mailboxes.
    */
    private ?array $mailboxRestoreArtifactsBulkAdditionRequests = null;
    
    /**
     * Instantiates a new ExchangeRestoreSession and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.exchangeRestoreSession');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExchangeRestoreSession
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExchangeRestoreSession {
        return new ExchangeRestoreSession();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'granularMailboxRestoreArtifacts' => fn(ParseNode $n) => $o->setGranularMailboxRestoreArtifacts($n->getCollectionOfObjectValues([GranularMailboxRestoreArtifact::class, 'createFromDiscriminatorValue'])),
            'mailboxRestoreArtifacts' => fn(ParseNode $n) => $o->setMailboxRestoreArtifacts($n->getCollectionOfObjectValues([MailboxRestoreArtifact::class, 'createFromDiscriminatorValue'])),
            'mailboxRestoreArtifactsBulkAdditionRequests' => fn(ParseNode $n) => $o->setMailboxRestoreArtifactsBulkAdditionRequests($n->getCollectionOfObjectValues([MailboxRestoreArtifactsBulkAdditionRequest::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the granularMailboxRestoreArtifacts property value. The granularMailboxRestoreArtifacts property
     * @return array<GranularMailboxRestoreArtifact>|null
    */
    public function getGranularMailboxRestoreArtifacts(): ?array {
        return $this->granularMailboxRestoreArtifacts;
    }

    /**
     * Gets the mailboxRestoreArtifacts property value. A collection of restore points and destination details that can be used to restore Exchange mailboxes.
     * @return array<MailboxRestoreArtifact>|null
    */
    public function getMailboxRestoreArtifacts(): ?array {
        return $this->mailboxRestoreArtifacts;
    }

    /**
     * Gets the mailboxRestoreArtifactsBulkAdditionRequests property value. A collection of user mailboxes and destination details that can be used to restore Exchange mailboxes.
     * @return array<MailboxRestoreArtifactsBulkAdditionRequest>|null
    */
    public function getMailboxRestoreArtifactsBulkAdditionRequests(): ?array {
        return $this->mailboxRestoreArtifactsBulkAdditionRequests;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('granularMailboxRestoreArtifacts', $this->getGranularMailboxRestoreArtifacts());
        $writer->writeCollectionOfObjectValues('mailboxRestoreArtifacts', $this->getMailboxRestoreArtifacts());
        $writer->writeCollectionOfObjectValues('mailboxRestoreArtifactsBulkAdditionRequests', $this->getMailboxRestoreArtifactsBulkAdditionRequests());
    }

    /**
     * Sets the granularMailboxRestoreArtifacts property value. The granularMailboxRestoreArtifacts property
     * @param array<GranularMailboxRestoreArtifact>|null $value Value to set for the granularMailboxRestoreArtifacts property.
    */
    public function setGranularMailboxRestoreArtifacts(?array $value): void {
        $this->granularMailboxRestoreArtifacts = $value;
    }

    /**
     * Sets the mailboxRestoreArtifacts property value. A collection of restore points and destination details that can be used to restore Exchange mailboxes.
     * @param array<MailboxRestoreArtifact>|null $value Value to set for the mailboxRestoreArtifacts property.
    */
    public function setMailboxRestoreArtifacts(?array $value): void {
        $this->mailboxRestoreArtifacts = $value;
    }

    /**
     * Sets the mailboxRestoreArtifactsBulkAdditionRequests property value. A collection of user mailboxes and destination details that can be used to restore Exchange mailboxes.
     * @param array<MailboxRestoreArtifactsBulkAdditionRequest>|null $value Value to set for the mailboxRestoreArtifactsBulkAdditionRequests property.
    */
    public function setMailboxRestoreArtifactsBulkAdditionRequests(?array $value): void {
        $this->mailboxRestoreArtifactsBulkAdditionRequests = $value;
    }

}
