<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PrintJob extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $acknowledgedDateTime The dateTimeOffset when the job was acknowledged. Read-only.
    */
    private ?DateTime $acknowledgedDateTime = null;
    
    /**
     * @var PrintJobConfiguration|null $configuration The configuration property
    */
    private ?PrintJobConfiguration $configuration = null;
    
    /**
     * @var UserIdentity|null $createdBy The createdBy property
    */
    private ?UserIdentity $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime The DateTimeOffset when the job was created. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<PrintDocument>|null $documents The documents property
    */
    private ?array $documents = null;
    
    /**
     * @var int|null $errorCode The error code of the print job. Read-only.
    */
    private ?int $errorCode = null;
    
    /**
     * @var bool|null $isFetchable If true, document can be fetched by printer.
    */
    private ?bool $isFetchable = null;
    
    /**
     * @var string|null $redirectedFrom Contains the source job URL, if the job has been redirected from another printer.
    */
    private ?string $redirectedFrom = null;
    
    /**
     * @var string|null $redirectedTo Contains the destination job URL, if the job has been redirected to another printer.
    */
    private ?string $redirectedTo = null;
    
    /**
     * @var PrintJobStatus|null $status The status property
    */
    private ?PrintJobStatus $status = null;
    
    /**
     * @var array<PrintTask>|null $tasks A list of printTasks that were triggered by this print job.
    */
    private ?array $tasks = null;
    
    /**
     * Instantiates a new PrintJob and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PrintJob
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PrintJob {
        return new PrintJob();
    }

    /**
     * Gets the acknowledgedDateTime property value. The dateTimeOffset when the job was acknowledged. Read-only.
     * @return DateTime|null
    */
    public function getAcknowledgedDateTime(): ?DateTime {
        return $this->acknowledgedDateTime;
    }

    /**
     * Gets the configuration property value. The configuration property
     * @return PrintJobConfiguration|null
    */
    public function getConfiguration(): ?PrintJobConfiguration {
        return $this->configuration;
    }

    /**
     * Gets the createdBy property value. The createdBy property
     * @return UserIdentity|null
    */
    public function getCreatedBy(): ?UserIdentity {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. The DateTimeOffset when the job was created. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the documents property value. The documents property
     * @return array<PrintDocument>|null
    */
    public function getDocuments(): ?array {
        return $this->documents;
    }

    /**
     * Gets the errorCode property value. The error code of the print job. Read-only.
     * @return int|null
    */
    public function getErrorCode(): ?int {
        return $this->errorCode;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'acknowledgedDateTime' => fn(ParseNode $n) => $o->setAcknowledgedDateTime($n->getDateTimeValue()),
            'configuration' => fn(ParseNode $n) => $o->setConfiguration($n->getObjectValue([PrintJobConfiguration::class, 'createFromDiscriminatorValue'])),
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([UserIdentity::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'documents' => fn(ParseNode $n) => $o->setDocuments($n->getCollectionOfObjectValues([PrintDocument::class, 'createFromDiscriminatorValue'])),
            'errorCode' => fn(ParseNode $n) => $o->setErrorCode($n->getIntegerValue()),
            'isFetchable' => fn(ParseNode $n) => $o->setIsFetchable($n->getBooleanValue()),
            'redirectedFrom' => fn(ParseNode $n) => $o->setRedirectedFrom($n->getStringValue()),
            'redirectedTo' => fn(ParseNode $n) => $o->setRedirectedTo($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getObjectValue([PrintJobStatus::class, 'createFromDiscriminatorValue'])),
            'tasks' => fn(ParseNode $n) => $o->setTasks($n->getCollectionOfObjectValues([PrintTask::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isFetchable property value. If true, document can be fetched by printer.
     * @return bool|null
    */
    public function getIsFetchable(): ?bool {
        return $this->isFetchable;
    }

    /**
     * Gets the redirectedFrom property value. Contains the source job URL, if the job has been redirected from another printer.
     * @return string|null
    */
    public function getRedirectedFrom(): ?string {
        return $this->redirectedFrom;
    }

    /**
     * Gets the redirectedTo property value. Contains the destination job URL, if the job has been redirected to another printer.
     * @return string|null
    */
    public function getRedirectedTo(): ?string {
        return $this->redirectedTo;
    }

    /**
     * Gets the status property value. The status property
     * @return PrintJobStatus|null
    */
    public function getStatus(): ?PrintJobStatus {
        return $this->status;
    }

    /**
     * Gets the tasks property value. A list of printTasks that were triggered by this print job.
     * @return array<PrintTask>|null
    */
    public function getTasks(): ?array {
        return $this->tasks;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('acknowledgedDateTime', $this->getAcknowledgedDateTime());
        $writer->writeObjectValue('configuration', $this->getConfiguration());
        $writer->writeObjectValue('createdBy', $this->getCreatedBy());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('documents', $this->getDocuments());
        $writer->writeIntegerValue('errorCode', $this->getErrorCode());
        $writer->writeBooleanValue('isFetchable', $this->getIsFetchable());
        $writer->writeStringValue('redirectedFrom', $this->getRedirectedFrom());
        $writer->writeStringValue('redirectedTo', $this->getRedirectedTo());
        $writer->writeObjectValue('status', $this->getStatus());
        $writer->writeCollectionOfObjectValues('tasks', $this->getTasks());
    }

    /**
     * Sets the acknowledgedDateTime property value. The dateTimeOffset when the job was acknowledged. Read-only.
     * @param DateTime|null $value Value to set for the acknowledgedDateTime property.
    */
    public function setAcknowledgedDateTime(?DateTime $value): void {
        $this->acknowledgedDateTime = $value;
    }

    /**
     * Sets the configuration property value. The configuration property
     * @param PrintJobConfiguration|null $value Value to set for the configuration property.
    */
    public function setConfiguration(?PrintJobConfiguration $value): void {
        $this->configuration = $value;
    }

    /**
     * Sets the createdBy property value. The createdBy property
     * @param UserIdentity|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?UserIdentity $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. The DateTimeOffset when the job was created. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the documents property value. The documents property
     * @param array<PrintDocument>|null $value Value to set for the documents property.
    */
    public function setDocuments(?array $value): void {
        $this->documents = $value;
    }

    /**
     * Sets the errorCode property value. The error code of the print job. Read-only.
     * @param int|null $value Value to set for the errorCode property.
    */
    public function setErrorCode(?int $value): void {
        $this->errorCode = $value;
    }

    /**
     * Sets the isFetchable property value. If true, document can be fetched by printer.
     * @param bool|null $value Value to set for the isFetchable property.
    */
    public function setIsFetchable(?bool $value): void {
        $this->isFetchable = $value;
    }

    /**
     * Sets the redirectedFrom property value. Contains the source job URL, if the job has been redirected from another printer.
     * @param string|null $value Value to set for the redirectedFrom property.
    */
    public function setRedirectedFrom(?string $value): void {
        $this->redirectedFrom = $value;
    }

    /**
     * Sets the redirectedTo property value. Contains the destination job URL, if the job has been redirected to another printer.
     * @param string|null $value Value to set for the redirectedTo property.
    */
    public function setRedirectedTo(?string $value): void {
        $this->redirectedTo = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param PrintJobStatus|null $value Value to set for the status property.
    */
    public function setStatus(?PrintJobStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the tasks property value. A list of printTasks that were triggered by this print job.
     * @param array<PrintTask>|null $value Value to set for the tasks property.
    */
    public function setTasks(?array $value): void {
        $this->tasks = $value;
    }

}
