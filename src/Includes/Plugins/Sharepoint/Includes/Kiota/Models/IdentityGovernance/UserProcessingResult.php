<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\User;

class UserProcessingResult extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $completedDateTime The date time that the workflow execution for a user completed. Value is null if the workflow hasn't completed.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $completedDateTime = null;
    
    /**
     * @var int|null $failedTasksCount The number of tasks that failed in the workflow execution.
    */
    private ?int $failedTasksCount = null;
    
    /**
     * @var LifecycleWorkflowProcessingStatus|null $processingStatus The processingStatus property
    */
    private ?LifecycleWorkflowProcessingStatus $processingStatus = null;
    
    /**
     * @var array<Run>|null $reprocessedRuns The related reprocessed workflow run.
    */
    private ?array $reprocessedRuns = null;
    
    /**
     * @var DateTime|null $scheduledDateTime The date time that the workflow is scheduled to be executed for a user.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $scheduledDateTime = null;
    
    /**
     * @var DateTime|null $startedDateTime The date time that the workflow execution started. Value is null if the workflow execution hasn't started.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $startedDateTime = null;
    
    /**
     * @var User|null $subject The subject property
    */
    private ?User $subject = null;
    
    /**
     * @var array<TaskProcessingResult>|null $taskProcessingResults The associated individual task execution.
    */
    private ?array $taskProcessingResults = null;
    
    /**
     * @var int|null $totalTasksCount The total number of tasks that in the workflow execution.
    */
    private ?int $totalTasksCount = null;
    
    /**
     * @var int|null $totalUnprocessedTasksCount The total number of unprocessed tasks for the workflow.
    */
    private ?int $totalUnprocessedTasksCount = null;
    
    /**
     * @var WorkflowExecutionType|null $workflowExecutionType The workflowExecutionType property
    */
    private ?WorkflowExecutionType $workflowExecutionType = null;
    
    /**
     * @var int|null $workflowVersion The version of the workflow that was executed.
    */
    private ?int $workflowVersion = null;
    
    /**
     * Instantiates a new UserProcessingResult and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UserProcessingResult
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UserProcessingResult {
        return new UserProcessingResult();
    }

    /**
     * Gets the completedDateTime property value. The date time that the workflow execution for a user completed. Value is null if the workflow hasn't completed.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getCompletedDateTime(): ?DateTime {
        return $this->completedDateTime;
    }

    /**
     * Gets the failedTasksCount property value. The number of tasks that failed in the workflow execution.
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
            'subject' => fn(ParseNode $n) => $o->setSubject($n->getObjectValue([User::class, 'createFromDiscriminatorValue'])),
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
     * Gets the reprocessedRuns property value. The related reprocessed workflow run.
     * @return array<Run>|null
    */
    public function getReprocessedRuns(): ?array {
        return $this->reprocessedRuns;
    }

    /**
     * Gets the scheduledDateTime property value. The date time that the workflow is scheduled to be executed for a user.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getScheduledDateTime(): ?DateTime {
        return $this->scheduledDateTime;
    }

    /**
     * Gets the startedDateTime property value. The date time that the workflow execution started. Value is null if the workflow execution hasn't started.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getStartedDateTime(): ?DateTime {
        return $this->startedDateTime;
    }

    /**
     * Gets the subject property value. The subject property
     * @return User|null
    */
    public function getSubject(): ?User {
        return $this->subject;
    }

    /**
     * Gets the taskProcessingResults property value. The associated individual task execution.
     * @return array<TaskProcessingResult>|null
    */
    public function getTaskProcessingResults(): ?array {
        return $this->taskProcessingResults;
    }

    /**
     * Gets the totalTasksCount property value. The total number of tasks that in the workflow execution.
     * @return int|null
    */
    public function getTotalTasksCount(): ?int {
        return $this->totalTasksCount;
    }

    /**
     * Gets the totalUnprocessedTasksCount property value. The total number of unprocessed tasks for the workflow.
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
     * Gets the workflowVersion property value. The version of the workflow that was executed.
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
        $writer->writeCollectionOfObjectValues('taskProcessingResults', $this->getTaskProcessingResults());
        $writer->writeIntegerValue('totalTasksCount', $this->getTotalTasksCount());
        $writer->writeIntegerValue('totalUnprocessedTasksCount', $this->getTotalUnprocessedTasksCount());
        $writer->writeEnumValue('workflowExecutionType', $this->getWorkflowExecutionType());
        $writer->writeIntegerValue('workflowVersion', $this->getWorkflowVersion());
    }

    /**
     * Sets the completedDateTime property value. The date time that the workflow execution for a user completed. Value is null if the workflow hasn't completed.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the completedDateTime property.
    */
    public function setCompletedDateTime(?DateTime $value): void {
        $this->completedDateTime = $value;
    }

    /**
     * Sets the failedTasksCount property value. The number of tasks that failed in the workflow execution.
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
     * Sets the reprocessedRuns property value. The related reprocessed workflow run.
     * @param array<Run>|null $value Value to set for the reprocessedRuns property.
    */
    public function setReprocessedRuns(?array $value): void {
        $this->reprocessedRuns = $value;
    }

    /**
     * Sets the scheduledDateTime property value. The date time that the workflow is scheduled to be executed for a user.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the scheduledDateTime property.
    */
    public function setScheduledDateTime(?DateTime $value): void {
        $this->scheduledDateTime = $value;
    }

    /**
     * Sets the startedDateTime property value. The date time that the workflow execution started. Value is null if the workflow execution hasn't started.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the startedDateTime property.
    */
    public function setStartedDateTime(?DateTime $value): void {
        $this->startedDateTime = $value;
    }

    /**
     * Sets the subject property value. The subject property
     * @param User|null $value Value to set for the subject property.
    */
    public function setSubject(?User $value): void {
        $this->subject = $value;
    }

    /**
     * Sets the taskProcessingResults property value. The associated individual task execution.
     * @param array<TaskProcessingResult>|null $value Value to set for the taskProcessingResults property.
    */
    public function setTaskProcessingResults(?array $value): void {
        $this->taskProcessingResults = $value;
    }

    /**
     * Sets the totalTasksCount property value. The total number of tasks that in the workflow execution.
     * @param int|null $value Value to set for the totalTasksCount property.
    */
    public function setTotalTasksCount(?int $value): void {
        $this->totalTasksCount = $value;
    }

    /**
     * Sets the totalUnprocessedTasksCount property value. The total number of unprocessed tasks for the workflow.
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
     * Sets the workflowVersion property value. The version of the workflow that was executed.
     * @param int|null $value Value to set for the workflowVersion property.
    */
    public function setWorkflowVersion(?int $value): void {
        $this->workflowVersion = $value;
    }

}
