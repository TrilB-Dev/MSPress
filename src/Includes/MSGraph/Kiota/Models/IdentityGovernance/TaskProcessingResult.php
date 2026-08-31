<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;
use MSPress\Includes\MSGraph\Kiota\Models\User;

class TaskProcessingResult extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $completedDateTime The date time when taskProcessingResult execution ended. Value is null if task execution is still in progress.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $completedDateTime = null;
    
    /**
     * @var DateTime|null $createdDateTime The date time when the taskProcessingResult was created.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $failureReason Describes why the taskProcessingResult failed.
    */
    private ?string $failureReason = null;
    
    /**
     * @var string|null $processingInfo Additional human-readable context about the task processing outcome. This property contains information about edge cases where the task completed successfully but the expected action wasn't performed because the target was already in the desired state, such as when the user was already a member of the specified group. Returns null when no additional context is needed. Nullable.
    */
    private ?string $processingInfo = null;
    
    /**
     * @var LifecycleWorkflowProcessingStatus|null $processingStatus The processingStatus property
    */
    private ?LifecycleWorkflowProcessingStatus $processingStatus = null;
    
    /**
     * @var DateTime|null $startedDateTime The date time when taskProcessingResult execution started. Value is null if task execution hasn't started yet.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $startedDateTime = null;
    
    /**
     * @var User|null $subject The subject property
    */
    private ?User $subject = null;
    
    /**
     * @var Task|null $task The task property
    */
    private ?Task $task = null;
    
    /**
     * @var WorkflowSubject|null $workflowSubject The workflow subject associated with this task processing result. Populated for extensibility and provisioning workflows.
    */
    private ?WorkflowSubject $workflowSubject = null;
    
    /**
     * Instantiates a new TaskProcessingResult and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TaskProcessingResult
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TaskProcessingResult {
        return new TaskProcessingResult();
    }

    /**
     * Gets the completedDateTime property value. The date time when taskProcessingResult execution ended. Value is null if task execution is still in progress.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getCompletedDateTime(): ?DateTime {
        return $this->completedDateTime;
    }

    /**
     * Gets the createdDateTime property value. The date time when the taskProcessingResult was created.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the failureReason property value. Describes why the taskProcessingResult failed.
     * @return string|null
    */
    public function getFailureReason(): ?string {
        return $this->failureReason;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'completedDateTime' => fn(ParseNode $n) => $o->setCompletedDateTime($n->getDateTimeValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'failureReason' => fn(ParseNode $n) => $o->setFailureReason($n->getStringValue()),
            'processingInfo' => fn(ParseNode $n) => $o->setProcessingInfo($n->getStringValue()),
            'processingStatus' => fn(ParseNode $n) => $o->setProcessingStatus($n->getEnumValue(LifecycleWorkflowProcessingStatus::class)),
            'startedDateTime' => fn(ParseNode $n) => $o->setStartedDateTime($n->getDateTimeValue()),
            'subject' => fn(ParseNode $n) => $o->setSubject($n->getObjectValue([User::class, 'createFromDiscriminatorValue'])),
            'task' => fn(ParseNode $n) => $o->setTask($n->getObjectValue([Task::class, 'createFromDiscriminatorValue'])),
            'workflowSubject' => fn(ParseNode $n) => $o->setWorkflowSubject($n->getObjectValue([WorkflowSubject::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the processingInfo property value. Additional human-readable context about the task processing outcome. This property contains information about edge cases where the task completed successfully but the expected action wasn't performed because the target was already in the desired state, such as when the user was already a member of the specified group. Returns null when no additional context is needed. Nullable.
     * @return string|null
    */
    public function getProcessingInfo(): ?string {
        return $this->processingInfo;
    }

    /**
     * Gets the processingStatus property value. The processingStatus property
     * @return LifecycleWorkflowProcessingStatus|null
    */
    public function getProcessingStatus(): ?LifecycleWorkflowProcessingStatus {
        return $this->processingStatus;
    }

    /**
     * Gets the startedDateTime property value. The date time when taskProcessingResult execution started. Value is null if task execution hasn't started yet.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
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
     * Gets the task property value. The task property
     * @return Task|null
    */
    public function getTask(): ?Task {
        return $this->task;
    }

    /**
     * Gets the workflowSubject property value. The workflow subject associated with this task processing result. Populated for extensibility and provisioning workflows.
     * @return WorkflowSubject|null
    */
    public function getWorkflowSubject(): ?WorkflowSubject {
        return $this->workflowSubject;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('completedDateTime', $this->getCompletedDateTime());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('failureReason', $this->getFailureReason());
        $writer->writeStringValue('processingInfo', $this->getProcessingInfo());
        $writer->writeEnumValue('processingStatus', $this->getProcessingStatus());
        $writer->writeDateTimeValue('startedDateTime', $this->getStartedDateTime());
        $writer->writeObjectValue('subject', $this->getSubject());
        $writer->writeObjectValue('task', $this->getTask());
        $writer->writeObjectValue('workflowSubject', $this->getWorkflowSubject());
    }

    /**
     * Sets the completedDateTime property value. The date time when taskProcessingResult execution ended. Value is null if task execution is still in progress.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the completedDateTime property.
    */
    public function setCompletedDateTime(?DateTime $value): void {
        $this->completedDateTime = $value;
    }

    /**
     * Sets the createdDateTime property value. The date time when the taskProcessingResult was created.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the failureReason property value. Describes why the taskProcessingResult failed.
     * @param string|null $value Value to set for the failureReason property.
    */
    public function setFailureReason(?string $value): void {
        $this->failureReason = $value;
    }

    /**
     * Sets the processingInfo property value. Additional human-readable context about the task processing outcome. This property contains information about edge cases where the task completed successfully but the expected action wasn't performed because the target was already in the desired state, such as when the user was already a member of the specified group. Returns null when no additional context is needed. Nullable.
     * @param string|null $value Value to set for the processingInfo property.
    */
    public function setProcessingInfo(?string $value): void {
        $this->processingInfo = $value;
    }

    /**
     * Sets the processingStatus property value. The processingStatus property
     * @param LifecycleWorkflowProcessingStatus|null $value Value to set for the processingStatus property.
    */
    public function setProcessingStatus(?LifecycleWorkflowProcessingStatus $value): void {
        $this->processingStatus = $value;
    }

    /**
     * Sets the startedDateTime property value. The date time when taskProcessingResult execution started. Value is null if task execution hasn't started yet.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
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
     * Sets the task property value. The task property
     * @param Task|null $value Value to set for the task property.
    */
    public function setTask(?Task $value): void {
        $this->task = $value;
    }

    /**
     * Sets the workflowSubject property value. The workflow subject associated with this task processing result. Populated for extensibility and provisioning workflows.
     * @param WorkflowSubject|null $value Value to set for the workflowSubject property.
    */
    public function setWorkflowSubject(?WorkflowSubject $value): void {
        $this->workflowSubject = $value;
    }

}
