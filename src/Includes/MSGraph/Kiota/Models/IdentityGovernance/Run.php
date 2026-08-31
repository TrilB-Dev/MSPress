<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class Run extends Entity implements Parsable 
{
    /**
     * @var ActivationScope|null $activatedOnScope The scope for which the workflow runs.
    */
    private ?ActivationScope $activatedOnScope = null;
    
    /**
     * @var DateTime|null $completedDateTime The date time that the run completed. Value is null if the workflow hasn't completed.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $completedDateTime = null;
    
    /**
     * @var int|null $failedTasksCount The number of tasks that failed in the run execution.
    */
    private ?int $failedTasksCount = null;
    
    /**
     * @var int|null $failedUsersCount The number of users that failed in the run execution.
    */
    private ?int $failedUsersCount = null;
    
    /**
     * @var DateTime|null $lastUpdatedDateTime The datetime that the run was last updated.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $lastUpdatedDateTime = null;
    
    /**
     * @var LifecycleWorkflowProcessingStatus|null $processingStatus The processingStatus property
    */
    private ?LifecycleWorkflowProcessingStatus $processingStatus = null;
    
    /**
     * @var array<Run>|null $reprocessedRuns The related reprocessed workflow run.
    */
    private ?array $reprocessedRuns = null;
    
    /**
     * @var DateTime|null $scheduledDateTime The date time that the run is scheduled to be executed for a workflow.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $scheduledDateTime = null;
    
    /**
     * @var DateTime|null $startedDateTime The date time that the run execution started.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $startedDateTime = null;
    
    /**
     * @var array<SubjectProcessingResult>|null $subjectProcessingResults The processing results for each subject in this workflow run.
    */
    private ?array $subjectProcessingResults = null;
    
    /**
     * @var int|null $successfulUsersCount The number of successfully completed users in the run.
    */
    private ?int $successfulUsersCount = null;
    
    /**
     * @var array<TaskProcessingResult>|null $taskProcessingResults The related taskProcessingResults.
    */
    private ?array $taskProcessingResults = null;
    
    /**
     * @var int|null $totalTasksCount The totalTasksCount property
    */
    private ?int $totalTasksCount = null;
    
    /**
     * @var int|null $totalUnprocessedTasksCount The total number of unprocessed tasks in the run execution.
    */
    private ?int $totalUnprocessedTasksCount = null;
    
    /**
     * @var int|null $totalUsersCount The total number of users in the workflow execution.
    */
    private ?int $totalUsersCount = null;
    
    /**
     * @var array<UserProcessingResult>|null $userProcessingResults The associated individual user execution.
    */
    private ?array $userProcessingResults = null;
    
    /**
     * @var WorkflowExecutionType|null $workflowExecutionType The workflowExecutionType property
    */
    private ?WorkflowExecutionType $workflowExecutionType = null;
    
    /**
     * Instantiates a new Run and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Run
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Run {
        return new Run();
    }

    /**
     * Gets the activatedOnScope property value. The scope for which the workflow runs.
     * @return ActivationScope|null
    */
    public function getActivatedOnScope(): ?ActivationScope {
        return $this->activatedOnScope;
    }

    /**
     * Gets the completedDateTime property value. The date time that the run completed. Value is null if the workflow hasn't completed.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getCompletedDateTime(): ?DateTime {
        return $this->completedDateTime;
    }

    /**
     * Gets the failedTasksCount property value. The number of tasks that failed in the run execution.
     * @return int|null
    */
    public function getFailedTasksCount(): ?int {
        return $this->failedTasksCount;
    }

    /**
     * Gets the failedUsersCount property value. The number of users that failed in the run execution.
     * @return int|null
    */
    public function getFailedUsersCount(): ?int {
        return $this->failedUsersCount;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activatedOnScope' => fn(ParseNode $n) => $o->setActivatedOnScope($n->getObjectValue([ActivationScope::class, 'createFromDiscriminatorValue'])),
            'completedDateTime' => fn(ParseNode $n) => $o->setCompletedDateTime($n->getDateTimeValue()),
            'failedTasksCount' => fn(ParseNode $n) => $o->setFailedTasksCount($n->getIntegerValue()),
            'failedUsersCount' => fn(ParseNode $n) => $o->setFailedUsersCount($n->getIntegerValue()),
            'lastUpdatedDateTime' => fn(ParseNode $n) => $o->setLastUpdatedDateTime($n->getDateTimeValue()),
            'processingStatus' => fn(ParseNode $n) => $o->setProcessingStatus($n->getEnumValue(LifecycleWorkflowProcessingStatus::class)),
            'reprocessedRuns' => fn(ParseNode $n) => $o->setReprocessedRuns($n->getCollectionOfObjectValues([Run::class, 'createFromDiscriminatorValue'])),
            'scheduledDateTime' => fn(ParseNode $n) => $o->setScheduledDateTime($n->getDateTimeValue()),
            'startedDateTime' => fn(ParseNode $n) => $o->setStartedDateTime($n->getDateTimeValue()),
            'subjectProcessingResults' => fn(ParseNode $n) => $o->setSubjectProcessingResults($n->getCollectionOfObjectValues([SubjectProcessingResult::class, 'createFromDiscriminatorValue'])),
            'successfulUsersCount' => fn(ParseNode $n) => $o->setSuccessfulUsersCount($n->getIntegerValue()),
            'taskProcessingResults' => fn(ParseNode $n) => $o->setTaskProcessingResults($n->getCollectionOfObjectValues([TaskProcessingResult::class, 'createFromDiscriminatorValue'])),
            'totalTasksCount' => fn(ParseNode $n) => $o->setTotalTasksCount($n->getIntegerValue()),
            'totalUnprocessedTasksCount' => fn(ParseNode $n) => $o->setTotalUnprocessedTasksCount($n->getIntegerValue()),
            'totalUsersCount' => fn(ParseNode $n) => $o->setTotalUsersCount($n->getIntegerValue()),
            'userProcessingResults' => fn(ParseNode $n) => $o->setUserProcessingResults($n->getCollectionOfObjectValues([UserProcessingResult::class, 'createFromDiscriminatorValue'])),
            'workflowExecutionType' => fn(ParseNode $n) => $o->setWorkflowExecutionType($n->getEnumValue(WorkflowExecutionType::class)),
        ]);
    }

    /**
     * Gets the lastUpdatedDateTime property value. The datetime that the run was last updated.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getLastUpdatedDateTime(): ?DateTime {
        return $this->lastUpdatedDateTime;
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
     * Gets the scheduledDateTime property value. The date time that the run is scheduled to be executed for a workflow.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getScheduledDateTime(): ?DateTime {
        return $this->scheduledDateTime;
    }

    /**
     * Gets the startedDateTime property value. The date time that the run execution started.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getStartedDateTime(): ?DateTime {
        return $this->startedDateTime;
    }

    /**
     * Gets the subjectProcessingResults property value. The processing results for each subject in this workflow run.
     * @return array<SubjectProcessingResult>|null
    */
    public function getSubjectProcessingResults(): ?array {
        return $this->subjectProcessingResults;
    }

    /**
     * Gets the successfulUsersCount property value. The number of successfully completed users in the run.
     * @return int|null
    */
    public function getSuccessfulUsersCount(): ?int {
        return $this->successfulUsersCount;
    }

    /**
     * Gets the taskProcessingResults property value. The related taskProcessingResults.
     * @return array<TaskProcessingResult>|null
    */
    public function getTaskProcessingResults(): ?array {
        return $this->taskProcessingResults;
    }

    /**
     * Gets the totalTasksCount property value. The totalTasksCount property
     * @return int|null
    */
    public function getTotalTasksCount(): ?int {
        return $this->totalTasksCount;
    }

    /**
     * Gets the totalUnprocessedTasksCount property value. The total number of unprocessed tasks in the run execution.
     * @return int|null
    */
    public function getTotalUnprocessedTasksCount(): ?int {
        return $this->totalUnprocessedTasksCount;
    }

    /**
     * Gets the totalUsersCount property value. The total number of users in the workflow execution.
     * @return int|null
    */
    public function getTotalUsersCount(): ?int {
        return $this->totalUsersCount;
    }

    /**
     * Gets the userProcessingResults property value. The associated individual user execution.
     * @return array<UserProcessingResult>|null
    */
    public function getUserProcessingResults(): ?array {
        return $this->userProcessingResults;
    }

    /**
     * Gets the workflowExecutionType property value. The workflowExecutionType property
     * @return WorkflowExecutionType|null
    */
    public function getWorkflowExecutionType(): ?WorkflowExecutionType {
        return $this->workflowExecutionType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('activatedOnScope', $this->getActivatedOnScope());
        $writer->writeDateTimeValue('completedDateTime', $this->getCompletedDateTime());
        $writer->writeIntegerValue('failedTasksCount', $this->getFailedTasksCount());
        $writer->writeIntegerValue('failedUsersCount', $this->getFailedUsersCount());
        $writer->writeDateTimeValue('lastUpdatedDateTime', $this->getLastUpdatedDateTime());
        $writer->writeEnumValue('processingStatus', $this->getProcessingStatus());
        $writer->writeCollectionOfObjectValues('reprocessedRuns', $this->getReprocessedRuns());
        $writer->writeDateTimeValue('scheduledDateTime', $this->getScheduledDateTime());
        $writer->writeDateTimeValue('startedDateTime', $this->getStartedDateTime());
        $writer->writeCollectionOfObjectValues('subjectProcessingResults', $this->getSubjectProcessingResults());
        $writer->writeIntegerValue('successfulUsersCount', $this->getSuccessfulUsersCount());
        $writer->writeCollectionOfObjectValues('taskProcessingResults', $this->getTaskProcessingResults());
        $writer->writeIntegerValue('totalTasksCount', $this->getTotalTasksCount());
        $writer->writeIntegerValue('totalUnprocessedTasksCount', $this->getTotalUnprocessedTasksCount());
        $writer->writeIntegerValue('totalUsersCount', $this->getTotalUsersCount());
        $writer->writeCollectionOfObjectValues('userProcessingResults', $this->getUserProcessingResults());
        $writer->writeEnumValue('workflowExecutionType', $this->getWorkflowExecutionType());
    }

    /**
     * Sets the activatedOnScope property value. The scope for which the workflow runs.
     * @param ActivationScope|null $value Value to set for the activatedOnScope property.
    */
    public function setActivatedOnScope(?ActivationScope $value): void {
        $this->activatedOnScope = $value;
    }

    /**
     * Sets the completedDateTime property value. The date time that the run completed. Value is null if the workflow hasn't completed.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the completedDateTime property.
    */
    public function setCompletedDateTime(?DateTime $value): void {
        $this->completedDateTime = $value;
    }

    /**
     * Sets the failedTasksCount property value. The number of tasks that failed in the run execution.
     * @param int|null $value Value to set for the failedTasksCount property.
    */
    public function setFailedTasksCount(?int $value): void {
        $this->failedTasksCount = $value;
    }

    /**
     * Sets the failedUsersCount property value. The number of users that failed in the run execution.
     * @param int|null $value Value to set for the failedUsersCount property.
    */
    public function setFailedUsersCount(?int $value): void {
        $this->failedUsersCount = $value;
    }

    /**
     * Sets the lastUpdatedDateTime property value. The datetime that the run was last updated.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the lastUpdatedDateTime property.
    */
    public function setLastUpdatedDateTime(?DateTime $value): void {
        $this->lastUpdatedDateTime = $value;
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
     * Sets the scheduledDateTime property value. The date time that the run is scheduled to be executed for a workflow.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the scheduledDateTime property.
    */
    public function setScheduledDateTime(?DateTime $value): void {
        $this->scheduledDateTime = $value;
    }

    /**
     * Sets the startedDateTime property value. The date time that the run execution started.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the startedDateTime property.
    */
    public function setStartedDateTime(?DateTime $value): void {
        $this->startedDateTime = $value;
    }

    /**
     * Sets the subjectProcessingResults property value. The processing results for each subject in this workflow run.
     * @param array<SubjectProcessingResult>|null $value Value to set for the subjectProcessingResults property.
    */
    public function setSubjectProcessingResults(?array $value): void {
        $this->subjectProcessingResults = $value;
    }

    /**
     * Sets the successfulUsersCount property value. The number of successfully completed users in the run.
     * @param int|null $value Value to set for the successfulUsersCount property.
    */
    public function setSuccessfulUsersCount(?int $value): void {
        $this->successfulUsersCount = $value;
    }

    /**
     * Sets the taskProcessingResults property value. The related taskProcessingResults.
     * @param array<TaskProcessingResult>|null $value Value to set for the taskProcessingResults property.
    */
    public function setTaskProcessingResults(?array $value): void {
        $this->taskProcessingResults = $value;
    }

    /**
     * Sets the totalTasksCount property value. The totalTasksCount property
     * @param int|null $value Value to set for the totalTasksCount property.
    */
    public function setTotalTasksCount(?int $value): void {
        $this->totalTasksCount = $value;
    }

    /**
     * Sets the totalUnprocessedTasksCount property value. The total number of unprocessed tasks in the run execution.
     * @param int|null $value Value to set for the totalUnprocessedTasksCount property.
    */
    public function setTotalUnprocessedTasksCount(?int $value): void {
        $this->totalUnprocessedTasksCount = $value;
    }

    /**
     * Sets the totalUsersCount property value. The total number of users in the workflow execution.
     * @param int|null $value Value to set for the totalUsersCount property.
    */
    public function setTotalUsersCount(?int $value): void {
        $this->totalUsersCount = $value;
    }

    /**
     * Sets the userProcessingResults property value. The associated individual user execution.
     * @param array<UserProcessingResult>|null $value Value to set for the userProcessingResults property.
    */
    public function setUserProcessingResults(?array $value): void {
        $this->userProcessingResults = $value;
    }

    /**
     * Sets the workflowExecutionType property value. The workflowExecutionType property
     * @param WorkflowExecutionType|null $value Value to set for the workflowExecutionType property.
    */
    public function setWorkflowExecutionType(?WorkflowExecutionType $value): void {
        $this->workflowExecutionType = $value;
    }

}
