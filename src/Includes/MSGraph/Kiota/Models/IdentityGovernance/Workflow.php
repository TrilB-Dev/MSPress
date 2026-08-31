<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\DirectoryObject;

class Workflow extends WorkflowBase implements Parsable 
{
    /**
     * @var DateTime|null $deletedDateTime When the workflow was deleted.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?DateTime $deletedDateTime = null;
    
    /**
     * @var array<UserProcessingResult>|null $executionScope The list of users that meet the workflowExecutionConditions of a workflow.
    */
    private ?array $executionScope = null;
    
    /**
     * @var string|null $id Identifier used for individually addressing a specific workflow.Supports $filter(eq, ne) and $orderby.
    */
    private ?string $id = null;
    
    /**
     * @var DateTime|null $nextScheduleRunDateTime The date time when the workflow is expected to run next based on the schedule interval, if there are any users matching the execution conditions. Supports $filter(lt,gt) and $orderby.
    */
    private ?DateTime $nextScheduleRunDateTime = null;
    
    /**
     * @var array<DirectoryObject>|null $previewScope The preview scope for the workflow.
    */
    private ?array $previewScope = null;
    
    /**
     * @var QuarantineDetails|null $quarantineDetails The quarantineDetails property
    */
    private ?QuarantineDetails $quarantineDetails = null;
    
    /**
     * @var array<Run>|null $runs Workflow runs.
    */
    private ?array $runs = null;
    
    /**
     * @var WorkflowSetting|null $settings The settings property
    */
    private ?WorkflowSetting $settings = null;
    
    /**
     * @var array<SubjectProcessingResult>|null $subjectProcessingResults Per-subject workflow execution results.
    */
    private ?array $subjectProcessingResults = null;
    
    /**
     * @var array<TaskReport>|null $taskReports Represents the aggregation of task execution data for tasks within a workflow object.
    */
    private ?array $taskReports = null;
    
    /**
     * @var array<UserProcessingResult>|null $userProcessingResults Per-user workflow execution results.
    */
    private ?array $userProcessingResults = null;
    
    /**
     * @var int|null $version The current version number of the workflow. Value is 1 when the workflow is first created.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
    */
    private ?int $version = null;
    
    /**
     * @var array<WorkflowVersion>|null $versions The workflow versions that are available.
    */
    private ?array $versions = null;
    
    /**
     * Instantiates a new Workflow and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.identityGovernance.workflow');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Workflow
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Workflow {
        return new Workflow();
    }

    /**
     * Gets the deletedDateTime property value. When the workflow was deleted.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return DateTime|null
    */
    public function getDeletedDateTime(): ?DateTime {
        return $this->deletedDateTime;
    }

    /**
     * Gets the executionScope property value. The list of users that meet the workflowExecutionConditions of a workflow.
     * @return array<UserProcessingResult>|null
    */
    public function getExecutionScope(): ?array {
        return $this->executionScope;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'deletedDateTime' => fn(ParseNode $n) => $o->setDeletedDateTime($n->getDateTimeValue()),
            'executionScope' => fn(ParseNode $n) => $o->setExecutionScope($n->getCollectionOfObjectValues([UserProcessingResult::class, 'createFromDiscriminatorValue'])),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            'nextScheduleRunDateTime' => fn(ParseNode $n) => $o->setNextScheduleRunDateTime($n->getDateTimeValue()),
            'previewScope' => fn(ParseNode $n) => $o->setPreviewScope($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'quarantineDetails' => fn(ParseNode $n) => $o->setQuarantineDetails($n->getObjectValue([QuarantineDetails::class, 'createFromDiscriminatorValue'])),
            'runs' => fn(ParseNode $n) => $o->setRuns($n->getCollectionOfObjectValues([Run::class, 'createFromDiscriminatorValue'])),
            'settings' => fn(ParseNode $n) => $o->setSettings($n->getObjectValue([WorkflowSetting::class, 'createFromDiscriminatorValue'])),
            'subjectProcessingResults' => fn(ParseNode $n) => $o->setSubjectProcessingResults($n->getCollectionOfObjectValues([SubjectProcessingResult::class, 'createFromDiscriminatorValue'])),
            'taskReports' => fn(ParseNode $n) => $o->setTaskReports($n->getCollectionOfObjectValues([TaskReport::class, 'createFromDiscriminatorValue'])),
            'userProcessingResults' => fn(ParseNode $n) => $o->setUserProcessingResults($n->getCollectionOfObjectValues([UserProcessingResult::class, 'createFromDiscriminatorValue'])),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getIntegerValue()),
            'versions' => fn(ParseNode $n) => $o->setVersions($n->getCollectionOfObjectValues([WorkflowVersion::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the id property value. Identifier used for individually addressing a specific workflow.Supports $filter(eq, ne) and $orderby.
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the nextScheduleRunDateTime property value. The date time when the workflow is expected to run next based on the schedule interval, if there are any users matching the execution conditions. Supports $filter(lt,gt) and $orderby.
     * @return DateTime|null
    */
    public function getNextScheduleRunDateTime(): ?DateTime {
        return $this->nextScheduleRunDateTime;
    }

    /**
     * Gets the previewScope property value. The preview scope for the workflow.
     * @return array<DirectoryObject>|null
    */
    public function getPreviewScope(): ?array {
        return $this->previewScope;
    }

    /**
     * Gets the quarantineDetails property value. The quarantineDetails property
     * @return QuarantineDetails|null
    */
    public function getQuarantineDetails(): ?QuarantineDetails {
        return $this->quarantineDetails;
    }

    /**
     * Gets the runs property value. Workflow runs.
     * @return array<Run>|null
    */
    public function getRuns(): ?array {
        return $this->runs;
    }

    /**
     * Gets the settings property value. The settings property
     * @return WorkflowSetting|null
    */
    public function getSettings(): ?WorkflowSetting {
        return $this->settings;
    }

    /**
     * Gets the subjectProcessingResults property value. Per-subject workflow execution results.
     * @return array<SubjectProcessingResult>|null
    */
    public function getSubjectProcessingResults(): ?array {
        return $this->subjectProcessingResults;
    }

    /**
     * Gets the taskReports property value. Represents the aggregation of task execution data for tasks within a workflow object.
     * @return array<TaskReport>|null
    */
    public function getTaskReports(): ?array {
        return $this->taskReports;
    }

    /**
     * Gets the userProcessingResults property value. Per-user workflow execution results.
     * @return array<UserProcessingResult>|null
    */
    public function getUserProcessingResults(): ?array {
        return $this->userProcessingResults;
    }

    /**
     * Gets the version property value. The current version number of the workflow. Value is 1 when the workflow is first created.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @return int|null
    */
    public function getVersion(): ?int {
        return $this->version;
    }

    /**
     * Gets the versions property value. The workflow versions that are available.
     * @return array<WorkflowVersion>|null
    */
    public function getVersions(): ?array {
        return $this->versions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('deletedDateTime', $this->getDeletedDateTime());
        $writer->writeCollectionOfObjectValues('executionScope', $this->getExecutionScope());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeDateTimeValue('nextScheduleRunDateTime', $this->getNextScheduleRunDateTime());
        $writer->writeCollectionOfObjectValues('previewScope', $this->getPreviewScope());
        $writer->writeObjectValue('quarantineDetails', $this->getQuarantineDetails());
        $writer->writeCollectionOfObjectValues('runs', $this->getRuns());
        $writer->writeObjectValue('settings', $this->getSettings());
        $writer->writeCollectionOfObjectValues('subjectProcessingResults', $this->getSubjectProcessingResults());
        $writer->writeCollectionOfObjectValues('taskReports', $this->getTaskReports());
        $writer->writeCollectionOfObjectValues('userProcessingResults', $this->getUserProcessingResults());
        $writer->writeIntegerValue('version', $this->getVersion());
        $writer->writeCollectionOfObjectValues('versions', $this->getVersions());
    }

    /**
     * Sets the deletedDateTime property value. When the workflow was deleted.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param DateTime|null $value Value to set for the deletedDateTime property.
    */
    public function setDeletedDateTime(?DateTime $value): void {
        $this->deletedDateTime = $value;
    }

    /**
     * Sets the executionScope property value. The list of users that meet the workflowExecutionConditions of a workflow.
     * @param array<UserProcessingResult>|null $value Value to set for the executionScope property.
    */
    public function setExecutionScope(?array $value): void {
        $this->executionScope = $value;
    }

    /**
     * Sets the id property value. Identifier used for individually addressing a specific workflow.Supports $filter(eq, ne) and $orderby.
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the nextScheduleRunDateTime property value. The date time when the workflow is expected to run next based on the schedule interval, if there are any users matching the execution conditions. Supports $filter(lt,gt) and $orderby.
     * @param DateTime|null $value Value to set for the nextScheduleRunDateTime property.
    */
    public function setNextScheduleRunDateTime(?DateTime $value): void {
        $this->nextScheduleRunDateTime = $value;
    }

    /**
     * Sets the previewScope property value. The preview scope for the workflow.
     * @param array<DirectoryObject>|null $value Value to set for the previewScope property.
    */
    public function setPreviewScope(?array $value): void {
        $this->previewScope = $value;
    }

    /**
     * Sets the quarantineDetails property value. The quarantineDetails property
     * @param QuarantineDetails|null $value Value to set for the quarantineDetails property.
    */
    public function setQuarantineDetails(?QuarantineDetails $value): void {
        $this->quarantineDetails = $value;
    }

    /**
     * Sets the runs property value. Workflow runs.
     * @param array<Run>|null $value Value to set for the runs property.
    */
    public function setRuns(?array $value): void {
        $this->runs = $value;
    }

    /**
     * Sets the settings property value. The settings property
     * @param WorkflowSetting|null $value Value to set for the settings property.
    */
    public function setSettings(?WorkflowSetting $value): void {
        $this->settings = $value;
    }

    /**
     * Sets the subjectProcessingResults property value. Per-subject workflow execution results.
     * @param array<SubjectProcessingResult>|null $value Value to set for the subjectProcessingResults property.
    */
    public function setSubjectProcessingResults(?array $value): void {
        $this->subjectProcessingResults = $value;
    }

    /**
     * Sets the taskReports property value. Represents the aggregation of task execution data for tasks within a workflow object.
     * @param array<TaskReport>|null $value Value to set for the taskReports property.
    */
    public function setTaskReports(?array $value): void {
        $this->taskReports = $value;
    }

    /**
     * Sets the userProcessingResults property value. Per-user workflow execution results.
     * @param array<UserProcessingResult>|null $value Value to set for the userProcessingResults property.
    */
    public function setUserProcessingResults(?array $value): void {
        $this->userProcessingResults = $value;
    }

    /**
     * Sets the version property value. The current version number of the workflow. Value is 1 when the workflow is first created.Supports $filter(lt, le, gt, ge, eq, ne) and $orderby.
     * @param int|null $value Value to set for the version property.
    */
    public function setVersion(?int $value): void {
        $this->version = $value;
    }

    /**
     * Sets the versions property value. The workflow versions that are available.
     * @param array<WorkflowVersion>|null $value Value to set for the versions property.
    */
    public function setVersions(?array $value): void {
        $this->versions = $value;
    }

}
