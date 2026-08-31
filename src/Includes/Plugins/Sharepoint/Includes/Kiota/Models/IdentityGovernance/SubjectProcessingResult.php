<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class SubjectProcessingResult extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $completedDateTime The date and time when the subject processing completed. Read-only.
    */
    private ?DateTime $completedDateTime = null;
    
    /**
     * @var int|null $failedTasksCount The count of tasks that failed for the subject. Read-only.
    */
    private ?int $failedTasksCount = null;
    
    /**
     * @var LifecycleWorkflowProcessingStatus|null $processingStatus The processingStatus property
    */
    private ?LifecycleWorkflowProcessingStatus $processingStatus = null;
    
    /**
     * @var array<Run>|null $reprocessedRuns The reprocessed runs associated with this subject processing result.
    */
    private ?array $reprocessedRuns = null;
    
    /**
     * @var DateTime|null $scheduledDateTime The date and time when processing was scheduled. Read-only.
    */
    private ?DateTime $scheduledDateTime = null;
    
    /**
     * @var DateTime|null $startedDateTime The date and time when processing started. Read-only.
    */
    private ?DateTime $startedDateTime = null;
    
    /**
     * @var WorkflowSubject|null $subject The subject property
    */
    private ?WorkflowSubject $subject = null;
    
    /**
     * @var SubjectType|null $subjectType The subjectType property
    */
    private ?SubjectType $subjectType = null;
    
    /**
     * @var array<TaskProcessingResult>|null $taskProcessingResults The task-level processing results for this subject. Read-only.
    */
    private ?array $taskProcessingResults = null;
    
    /**
     * @var int|null $totalTasksCount The total number of tasks in the workflow. Read-only.
    */
    private ?int $totalTasksCount = null;
    
    /**
     * @var int|null $totalUnprocessedTasksCount The count of tasks that have not yet been processed. Read-only.
    */
    private ?int $totalUnprocessedTasksCount = null;
    
    /**
     * @var WorkflowExecutionType|null $workflowExecutionType The workflowExecutionType property
    */
    private ?WorkflowExecutionType $workflowExecutionType = null;
    
    /**
     * @var int|null $workflowVersion The version of the workflow at the time of execution. Read-only.
    */
    private ?int $workflowVersion = null;
    
    /**
     * Instantiates a new SubjectProcessingResult and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SubjectProcessingResult
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SubjectProcessingResult {
        return new SubjectProcessingResult();
    }

    /**
     * Gets the completedDateTime property value. The date and time when the subject processing completed. Read-only.
     * @return DateTime|null
    */
    public function getCompletedDateTime(): ?DateTime {
        return $this->completedDateTime;
    }

    /**
     * Gets the failedTasksCount property value. The count of tasks that failed for the subject. Read-only.
     * @return int|null
    */
    public function getFailedTasksCount(): ?int {
        return $this->failedTasksCount;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'completedDateTime' => fn(ParseNode $n) => $o->setCompletedDateTime($n->getDateTimeValue()),
            'failedTasksCount' => fn(ParseNode $n) => $o->setFailedTasksCount($n->getIntegerValue()),
            'processingStatus' => fn(ParseNode $n) => $o->setProcessingStatus($n->getEnumValue(LifecycleWorkflowProcessingStatus::class)),
            'reprocessedRuns' => fn(ParseNode $n) => $o->setReprocessedRuns($n->getCollectionOfObjectValues([Run::class, 'createFromDiscriminatorValue'])),
            'scheduledDateTime' => fn(ParseNode $n) => $o->setScheduledDateTime($n->getDateTimeValue()),
            'startedDateTime' => fn(ParseNode $n) => $o->setStartedDateTime($n->getDateTimeValue()),
            'subject' => fn(ParseNode $n) => $o->setSubject($n->getObjectValue([WorkflowSubject::class, 'createFromDiscriminatorValue'])),
            'subjectType' => fn(ParseNode $n) => $o->setSubjectType($n->getEnumValue(SubjectType::class)),
            'taskProcessingResults' => fn(ParseNode $n) => $o->setTaskProcessingResults($n->getCollectionOfObjectValues([TaskProcessingResult::class, 'createFromDiscriminatorValue'])),
            'totalTasksCount' => fn(ParseNode $n) => $o->setTotalTasksCount($n->getIntegerValue()),
            'totalUnprocessedTasksCount' => fn(ParseNode $n) => $o->setTotalUnprocessedTasksCount($n->getIntegerValue()),
            'workflowExecutionType' => fn(ParseNode $n) => $o->setWorkflowExecutionType($n->getEnumValue(WorkflowExecutionType::class)),
            'workflowVersion' => fn(ParseNode $n) => $o->setWorkflowVersion($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the processingStatus property value. The processingStatus property
     * @return LifecycleWorkflowProcessingStatus|null
    */
    public function getProcessingStatus(): ?LifecycleWorkflowProcessingStatus {
        return $this->processingStatus;
    }

    /**
     * Gets the reprocessedRuns property value. The reprocessed runs associated with this subject processing result.
     * @return array<Run>|null
    */
    public function getReprocessedRuns(): ?array {
        return $this->reprocessedRuns;
    }

    /**
     * Gets the scheduledDateTime property value. The date and time when processing was scheduled. Read-only.
     * @return DateTime|null
    */
    public function getScheduledDateTime(): ?DateTime {
        return $this->scheduledDateTime;
    }

    /**
     * Gets the startedDateTime property value. The date and time when processing started. Read-only.
     * @return DateTime|null
    */
    public function getStartedDateTime(): ?DateTime {
        return $this->startedDateTime;
    }

    /**
     * Gets the subject property value. The subject property
     * @return WorkflowSubject|null
    */
    public function getSubject(): ?WorkflowSubject {
        return $this->subject;
    }

    /**
     * Gets the subjectType property value. The subjectType property
     * @return SubjectType|null
    */
    public function getSubjectType(): ?SubjectType {
        return $this->subjectType;
    }

    /**
     * Gets the taskProcessingResults property value. The task-level processing results for this subject. Read-only.
     * @return array<TaskProcessingResult>|null
    */
    public function getTaskProcessingResults(): ?array {
        return $this->taskProcessingResults;
    }

    /**
     * Gets the totalTasksCount property value. The total number of tasks in the workflow. Read-only.
     * @return int|null
    */
    public function getTotalTasksCount(): ?int {
        return $this->totalTasksCount;
    }

    /**
     * Gets the totalUnprocessedTasksCount property value. The count of tasks that have not yet been processed. Read-only.
     * @return int|null
    */
    public function getTotalUnprocessedTasksCount(): ?int {
        return $this->totalUnprocessedTasksCount;
    }

    /**
     * Gets the workflowExecutionType property value. The workflowExecutionType property
     * @return WorkflowExecutionType|null
    */
    public function getWorkflowExecutionType(): ?WorkflowExecutionType {
        return $this->workflowExecutionType;
    }

    /**
     * Gets the workflowVersion property value. The version of the workflow at the time of execution. Read-only.
     * @return int|null
    */
    public function getWorkflowVersion(): ?int {
        return $this->workflowVersion;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('completedDateTime', $this->getCompletedDateTime());
        $writer->writeIntegerValue('failedTasksCount', $this->getFailedTasksCount());
        $writer->writeEnumValue('processingStatus', $this->getProcessingStatus());
        $writer->writeCollectionOfObjectValues('reprocessedRuns', $this->getReprocessedRuns());
        $writer->writeDateTimeValue('scheduledDateTime', $this->getScheduledDateTime());
        $writer->writeDateTimeValue('startedDateTime', $this->getStartedDateTime());
        $writer->writeObjectValue('subject', $this->getSubject());
        $writer->writeEnumValue('subjectType', $this->getSubjectType());
        $writer->writeCollectionOfObjectValues('taskProcessingResults', $this->getTaskProcessingResults());
        $writer->writeIntegerValue('totalTasksCount', $this->getTotalTasksCount());
        $writer->writeIntegerValue('totalUnprocessedTasksCount', $this->getTotalUnprocessedTasksCount());
        $writer->writeEnumValue('workflowExecutionType', $this->getWorkflowExecutionType());
        $writer->writeIntegerValue('workflowVersion', $this->getWorkflowVersion());
    }

    /**
     * Sets the completedDateTime property value. The date and time when the subject processing completed. Read-only.
     * @param DateTime|null $value Value to set for the completedDateTime property.
    */
    public function setCompletedDateTime(?DateTime $value): void {
        $this->completedDateTime = $value;
    }

    /**
     * Sets the failedTasksCount property value. The count of tasks that failed for the subject. Read-only.
     * @param int|null $value Value to set for the failedTasksCount property.
    */
    public function setFailedTasksCount(?int $value): void {
        $this->failedTasksCount = $value;
    }

    /**
     * Sets the processingStatus property value. The processingStatus property
     * @param LifecycleWorkflowProcessingStatus|null $value Value to set for the processingStatus property.
    */
    public function setProcessingStatus(?LifecycleWorkflowProcessingStatus $value): void {
        $this->processingStatus = $value;
    }

    /**
     * Sets the reprocessedRuns property value. The reprocessed runs associated with this subject processing result.
     * @param array<Run>|null $value Value to set for the reprocessedRuns property.
    */
    public function setReprocessedRuns(?array $value): void {
        $this->reprocessedRuns = $value;
    }

    /**
     * Sets the scheduledDateTime property value. The date and time when processing was scheduled. Read-only.
     * @param DateTime|null $value Value to set for the scheduledDateTime property.
    */
    public function setScheduledDateTime(?DateTime $value): void {
        $this->scheduledDateTime = $value;
    }

    /**
     * Sets the startedDateTime property value. The date and time when processing started. Read-only.
     * @param DateTime|null $value Value to set for the startedDateTime property.
    */
    public function setStartedDateTime(?DateTime $value): void {
        $this->startedDateTime = $value;
    }

    /**
     * Sets the subject property value. The subject property
     * @param WorkflowSubject|null $value Value to set for the subject property.
    */
    public function setSubject(?WorkflowSubject $value): void {
        $this->subject = $value;
    }

    /**
     * Sets the subjectType property value. The subjectType property
     * @param SubjectType|null $value Value to set for the subjectType property.
    */
    public function setSubjectType(?SubjectType $value): void {
        $this->subjectType = $value;
    }

    /**
     * Sets the taskProcessingResults property value. The task-level processing results for this subject. Read-only.
     * @param array<TaskProcessingResult>|null $value Value to set for the taskProcessingResults property.
    */
    public function setTaskProcessingResults(?array $value): void {
        $this->taskProcessingResults = $value;
    }

    /**
     * Sets the totalTasksCount property value. The total number of tasks in the workflow. Read-only.
     * @param int|null $value Value to set for the totalTasksCount property.
    */
    public function setTotalTasksCount(?int $value): void {
        $this->totalTasksCount = $value;
    }

    /**
     * Sets the totalUnprocessedTasksCount property value. The count of tasks that have not yet been processed. Read-only.
     * @param int|null $value Value to set for the totalUnprocessedTasksCount property.
    */
    public function setTotalUnprocessedTasksCount(?int $value): void {
        $this->totalUnprocessedTasksCount = $value;
    }

    /**
     * Sets the workflowExecutionType property value. The workflowExecutionType property
     * @param WorkflowExecutionType|null $value Value to set for the workflowExecutionType property.
    */
    public function setWorkflowExecutionType(?WorkflowExecutionType $value): void {
        $this->workflowExecutionType = $value;
    }

    /**
     * Sets the workflowVersion property value. The version of the workflow at the time of execution. Read-only.
     * @param int|null $value Value to set for the workflowVersion property.
    */
    public function setWorkflowVersion(?int $value): void {
        $this->workflowVersion = $value;
    }

}
