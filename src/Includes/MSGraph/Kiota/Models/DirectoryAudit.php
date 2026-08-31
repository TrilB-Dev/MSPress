<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DirectoryAudit extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $activityDateTime Indicates the date and time the activity was performed. The Timestamp type is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ge, le) and $orderby.
    */
    private ?DateTime $activityDateTime = null;
    
    /**
     * @var string|null $activityDisplayName Indicates the activity name or the operation name (examples: 'Create User' and 'Add member to group'). For a list of activities logged, refer to Microsoft Entra audit log categories and activities. Supports $filter (eq, startswith).
    */
    private ?string $activityDisplayName = null;
    
    /**
     * @var array<KeyValue>|null $additionalDetails Indicates additional details on the activity.
    */
    private ?array $additionalDetails = null;
    
    /**
     * @var string|null $category Indicates which resource category that's targeted by the activity. For example: UserManagement, GroupManagement, ApplicationManagement, RoleManagement. For a list of categories for activities logged, refer to Microsoft Entra audit log categories and activities.
    */
    private ?string $category = null;
    
    /**
     * @var string|null $correlationId Indicates a unique ID that helps correlate activities that span across various services. Can be used to trace logs across services. Supports $filter (eq).
    */
    private ?string $correlationId = null;
    
    /**
     * @var AuditActivityInitiator|null $initiatedBy The initiatedBy property
    */
    private ?AuditActivityInitiator $initiatedBy = null;
    
    /**
     * @var string|null $loggedByService Indicates information on which service initiated the activity (For example: Self-service Password Management, Core Directory, B2C, Invited Users, Microsoft Identity Manager, Privileged Identity Management. Supports $filter (eq).
    */
    private ?string $loggedByService = null;
    
    /**
     * @var string|null $operationType Indicates the type of operation that was performed. The possible values include but are not limited to the following: Add, Assign, Update, Unassign, and Delete.
    */
    private ?string $operationType = null;
    
    /**
     * @var OperationResult|null $result Indicates the result of the activity. The possible values are: success, failure, timeout, unknownFutureValue.
    */
    private ?OperationResult $result = null;
    
    /**
     * @var string|null $resultReason Indicates the reason for failure if the result is failure or timeout.
    */
    private ?string $resultReason = null;
    
    /**
     * @var array<TargetResource>|null $targetResources Indicates information on which resource was changed due to the activity. Target Resource Type can be User, Device, Directory, App, Role, Group, Policy or Other. Supports $filter (eq) for id and displayName; and $filter (startswith) for displayName.
    */
    private ?array $targetResources = null;
    
    /**
     * Instantiates a new DirectoryAudit and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DirectoryAudit
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DirectoryAudit {
        return new DirectoryAudit();
    }

    /**
     * Gets the activityDateTime property value. Indicates the date and time the activity was performed. The Timestamp type is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ge, le) and $orderby.
     * @return DateTime|null
    */
    public function getActivityDateTime(): ?DateTime {
        return $this->activityDateTime;
    }

    /**
     * Gets the activityDisplayName property value. Indicates the activity name or the operation name (examples: 'Create User' and 'Add member to group'). For a list of activities logged, refer to Microsoft Entra audit log categories and activities. Supports $filter (eq, startswith).
     * @return string|null
    */
    public function getActivityDisplayName(): ?string {
        return $this->activityDisplayName;
    }

    /**
     * Gets the additionalDetails property value. Indicates additional details on the activity.
     * @return array<KeyValue>|null
    */
    public function getAdditionalDetails(): ?array {
        return $this->additionalDetails;
    }

    /**
     * Gets the category property value. Indicates which resource category that's targeted by the activity. For example: UserManagement, GroupManagement, ApplicationManagement, RoleManagement. For a list of categories for activities logged, refer to Microsoft Entra audit log categories and activities.
     * @return string|null
    */
    public function getCategory(): ?string {
        return $this->category;
    }

    /**
     * Gets the correlationId property value. Indicates a unique ID that helps correlate activities that span across various services. Can be used to trace logs across services. Supports $filter (eq).
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activityDateTime' => fn(ParseNode $n) => $o->setActivityDateTime($n->getDateTimeValue()),
            'activityDisplayName' => fn(ParseNode $n) => $o->setActivityDisplayName($n->getStringValue()),
            'additionalDetails' => fn(ParseNode $n) => $o->setAdditionalDetails($n->getCollectionOfObjectValues([KeyValue::class, 'createFromDiscriminatorValue'])),
            'category' => fn(ParseNode $n) => $o->setCategory($n->getStringValue()),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'initiatedBy' => fn(ParseNode $n) => $o->setInitiatedBy($n->getObjectValue([AuditActivityInitiator::class, 'createFromDiscriminatorValue'])),
            'loggedByService' => fn(ParseNode $n) => $o->setLoggedByService($n->getStringValue()),
            'operationType' => fn(ParseNode $n) => $o->setOperationType($n->getStringValue()),
            'result' => fn(ParseNode $n) => $o->setResult($n->getEnumValue(OperationResult::class)),
            'resultReason' => fn(ParseNode $n) => $o->setResultReason($n->getStringValue()),
            'targetResources' => fn(ParseNode $n) => $o->setTargetResources($n->getCollectionOfObjectValues([TargetResource::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the initiatedBy property value. The initiatedBy property
     * @return AuditActivityInitiator|null
    */
    public function getInitiatedBy(): ?AuditActivityInitiator {
        return $this->initiatedBy;
    }

    /**
     * Gets the loggedByService property value. Indicates information on which service initiated the activity (For example: Self-service Password Management, Core Directory, B2C, Invited Users, Microsoft Identity Manager, Privileged Identity Management. Supports $filter (eq).
     * @return string|null
    */
    public function getLoggedByService(): ?string {
        return $this->loggedByService;
    }

    /**
     * Gets the operationType property value. Indicates the type of operation that was performed. The possible values include but are not limited to the following: Add, Assign, Update, Unassign, and Delete.
     * @return string|null
    */
    public function getOperationType(): ?string {
        return $this->operationType;
    }

    /**
     * Gets the result property value. Indicates the result of the activity. The possible values are: success, failure, timeout, unknownFutureValue.
     * @return OperationResult|null
    */
    public function getResult(): ?OperationResult {
        return $this->result;
    }

    /**
     * Gets the resultReason property value. Indicates the reason for failure if the result is failure or timeout.
     * @return string|null
    */
    public function getResultReason(): ?string {
        return $this->resultReason;
    }

    /**
     * Gets the targetResources property value. Indicates information on which resource was changed due to the activity. Target Resource Type can be User, Device, Directory, App, Role, Group, Policy or Other. Supports $filter (eq) for id and displayName; and $filter (startswith) for displayName.
     * @return array<TargetResource>|null
    */
    public function getTargetResources(): ?array {
        return $this->targetResources;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('activityDateTime', $this->getActivityDateTime());
        $writer->writeStringValue('activityDisplayName', $this->getActivityDisplayName());
        $writer->writeCollectionOfObjectValues('additionalDetails', $this->getAdditionalDetails());
        $writer->writeStringValue('category', $this->getCategory());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeObjectValue('initiatedBy', $this->getInitiatedBy());
        $writer->writeStringValue('loggedByService', $this->getLoggedByService());
        $writer->writeStringValue('operationType', $this->getOperationType());
        $writer->writeEnumValue('result', $this->getResult());
        $writer->writeStringValue('resultReason', $this->getResultReason());
        $writer->writeCollectionOfObjectValues('targetResources', $this->getTargetResources());
    }

    /**
     * Sets the activityDateTime property value. Indicates the date and time the activity was performed. The Timestamp type is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Supports $filter (eq, ge, le) and $orderby.
     * @param DateTime|null $value Value to set for the activityDateTime property.
    */
    public function setActivityDateTime(?DateTime $value): void {
        $this->activityDateTime = $value;
    }

    /**
     * Sets the activityDisplayName property value. Indicates the activity name or the operation name (examples: 'Create User' and 'Add member to group'). For a list of activities logged, refer to Microsoft Entra audit log categories and activities. Supports $filter (eq, startswith).
     * @param string|null $value Value to set for the activityDisplayName property.
    */
    public function setActivityDisplayName(?string $value): void {
        $this->activityDisplayName = $value;
    }

    /**
     * Sets the additionalDetails property value. Indicates additional details on the activity.
     * @param array<KeyValue>|null $value Value to set for the additionalDetails property.
    */
    public function setAdditionalDetails(?array $value): void {
        $this->additionalDetails = $value;
    }

    /**
     * Sets the category property value. Indicates which resource category that's targeted by the activity. For example: UserManagement, GroupManagement, ApplicationManagement, RoleManagement. For a list of categories for activities logged, refer to Microsoft Entra audit log categories and activities.
     * @param string|null $value Value to set for the category property.
    */
    public function setCategory(?string $value): void {
        $this->category = $value;
    }

    /**
     * Sets the correlationId property value. Indicates a unique ID that helps correlate activities that span across various services. Can be used to trace logs across services. Supports $filter (eq).
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the initiatedBy property value. The initiatedBy property
     * @param AuditActivityInitiator|null $value Value to set for the initiatedBy property.
    */
    public function setInitiatedBy(?AuditActivityInitiator $value): void {
        $this->initiatedBy = $value;
    }

    /**
     * Sets the loggedByService property value. Indicates information on which service initiated the activity (For example: Self-service Password Management, Core Directory, B2C, Invited Users, Microsoft Identity Manager, Privileged Identity Management. Supports $filter (eq).
     * @param string|null $value Value to set for the loggedByService property.
    */
    public function setLoggedByService(?string $value): void {
        $this->loggedByService = $value;
    }

    /**
     * Sets the operationType property value. Indicates the type of operation that was performed. The possible values include but are not limited to the following: Add, Assign, Update, Unassign, and Delete.
     * @param string|null $value Value to set for the operationType property.
    */
    public function setOperationType(?string $value): void {
        $this->operationType = $value;
    }

    /**
     * Sets the result property value. Indicates the result of the activity. The possible values are: success, failure, timeout, unknownFutureValue.
     * @param OperationResult|null $value Value to set for the result property.
    */
    public function setResult(?OperationResult $value): void {
        $this->result = $value;
    }

    /**
     * Sets the resultReason property value. Indicates the reason for failure if the result is failure or timeout.
     * @param string|null $value Value to set for the resultReason property.
    */
    public function setResultReason(?string $value): void {
        $this->resultReason = $value;
    }

    /**
     * Sets the targetResources property value. Indicates information on which resource was changed due to the activity. Target Resource Type can be User, Device, Directory, App, Role, Group, Policy or Other. Supports $filter (eq) for id and displayName; and $filter (startswith) for displayName.
     * @param array<TargetResource>|null $value Value to set for the targetResources property.
    */
    public function setTargetResources(?array $value): void {
        $this->targetResources = $value;
    }

}
