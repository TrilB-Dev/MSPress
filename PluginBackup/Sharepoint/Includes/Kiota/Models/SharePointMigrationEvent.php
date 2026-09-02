<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointMigrationEvent extends Entity implements Parsable 
{
    /**
     * @var string|null $correlationId The correlation ID of a migration job. Read-only.
    */
    private ?string $correlationId = null;
    
    /**
     * @var DateTime|null $eventDateTime The date and time when the job status changes. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $eventDateTime = null;
    
    /**
     * @var string|null $jobId The unique identifier of a migration job. Read-only.
    */
    private ?string $jobId = null;
    
    /**
     * Instantiates a new SharePointMigrationEvent and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointMigrationEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointMigrationEvent {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.sharePointMigrationFinishManifestFileUploadEvent': return new SharePointMigrationFinishManifestFileUploadEvent();
                case '#microsoft.graph.sharePointMigrationJobCancelledEvent': return new SharePointMigrationJobCancelledEvent();
                case '#microsoft.graph.sharePointMigrationJobDeletedEvent': return new SharePointMigrationJobDeletedEvent();
                case '#microsoft.graph.sharePointMigrationJobErrorEvent': return new SharePointMigrationJobErrorEvent();
                case '#microsoft.graph.sharePointMigrationJobPostponedEvent': return new SharePointMigrationJobPostponedEvent();
                case '#microsoft.graph.sharePointMigrationJobProgressEvent': return new SharePointMigrationJobProgressEvent();
                case '#microsoft.graph.sharePointMigrationJobQueuedEvent': return new SharePointMigrationJobQueuedEvent();
                case '#microsoft.graph.sharePointMigrationJobStartEvent': return new SharePointMigrationJobStartEvent();
            }
        }
        return new SharePointMigrationEvent();
    }

    /**
     * Gets the correlationId property value. The correlation ID of a migration job. Read-only.
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the eventDateTime property value. The date and time when the job status changes. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getEventDateTime(): ?DateTime {
        return $this->eventDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'eventDateTime' => fn(ParseNode $n) => $o->setEventDateTime($n->getDateTimeValue()),
            'jobId' => fn(ParseNode $n) => $o->setJobId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the jobId property value. The unique identifier of a migration job. Read-only.
     * @return string|null
    */
    public function getJobId(): ?string {
        return $this->jobId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeDateTimeValue('eventDateTime', $this->getEventDateTime());
        $writer->writeStringValue('jobId', $this->getJobId());
    }

    /**
     * Sets the correlationId property value. The correlation ID of a migration job. Read-only.
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the eventDateTime property value. The date and time when the job status changes. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the eventDateTime property.
    */
    public function setEventDateTime(?DateTime $value): void {
        $this->eventDateTime = $value;
    }

    /**
     * Sets the jobId property value. The unique identifier of a migration job. Read-only.
     * @param string|null $value Value to set for the jobId property.
    */
    public function setJobId(?string $value): void {
        $this->jobId = $value;
    }

}
