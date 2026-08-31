<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageAssignmentRequest extends Entity implements Parsable 
{
    /**
     * @var AccessPackage|null $accessPackage The access package associated with the accessPackageAssignmentRequest. An access package defines the collections of resource roles and the policies for how one or more users can get access to those resources. Read-only. Nullable.  Supports $expand.
    */
    private ?AccessPackage $accessPackage = null;
    
    /**
     * @var array<AccessPackageAnswer>|null $answers Answers provided by the requestor to accessPackageQuestions asked of them at the time of request.
    */
    private ?array $answers = null;
    
    /**
     * @var AccessPackageAssignment|null $assignment For a requestType of userAdd or adminAdd, this is an access package assignment requested to be created. For a requestType of userRemove, adminRemove, approverRemove, or systemRemove, this has the id property of an existing assignment to be removed.   Supports $expand.
    */
    private ?AccessPackageAssignment $assignment = null;
    
    /**
     * @var DateTime|null $completedDateTime The date of the end of processing, either successful or failure, of a request. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $completedDateTime = null;
    
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only. Supports $filter.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<CustomExtensionCalloutInstance>|null $customExtensionCalloutInstances Information about all the custom extension calls that were made during the access package assignment workflow.
    */
    private ?array $customExtensionCalloutInstances = null;
    
    /**
     * @var string|null $justification The requestor's supplied justification.
    */
    private ?string $justification = null;
    
    /**
     * @var AccessPackageSubject|null $requestor The subject who requested or, if a direct assignment, was assigned. Read-only. Nullable. Supports $expand.
    */
    private ?AccessPackageSubject $requestor = null;
    
    /**
     * @var AccessPackageRequestType|null $requestType The type of the request. The possible values are: notSpecified, userAdd, userUpdate, userRemove, adminAdd, adminUpdate, adminRemove, systemAdd, systemUpdate, systemRemove, onBehalfAdd (not supported), unknownFutureValue. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: approverRemove. Requests from the user have a requestType of userAdd, userUpdate, or userRemove. This property can't be changed once set.
    */
    private ?AccessPackageRequestType $requestType = null;
    
    /**
     * @var EntitlementManagementSchedule|null $schedule The range of dates that access is to be assigned to the requestor. This property can't be changed once set, but a new schedule for an assignment can be included in another userUpdate or adminUpdate assignment request.
    */
    private ?EntitlementManagementSchedule $schedule = null;
    
    /**
     * @var AccessPackageRequestState|null $state The state of the request. The possible values are: submitted, pendingApproval, delivering, delivered, deliveryFailed, denied, scheduled, canceled, partiallyDelivered, unknownFutureValue. Read-only. Supports $filter (eq).
    */
    private ?AccessPackageRequestState $state = null;
    
    /**
     * @var string|null $status More information on the request processing status. Read-only.
    */
    private ?string $status = null;
    
    /**
     * Instantiates a new AccessPackageAssignmentRequest and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageAssignmentRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageAssignmentRequest {
        return new AccessPackageAssignmentRequest();
    }

    /**
     * Gets the accessPackage property value. The access package associated with the accessPackageAssignmentRequest. An access package defines the collections of resource roles and the policies for how one or more users can get access to those resources. Read-only. Nullable.  Supports $expand.
     * @return AccessPackage|null
    */
    public function getAccessPackage(): ?AccessPackage {
        return $this->accessPackage;
    }

    /**
     * Gets the answers property value. Answers provided by the requestor to accessPackageQuestions asked of them at the time of request.
     * @return array<AccessPackageAnswer>|null
    */
    public function getAnswers(): ?array {
        return $this->answers;
    }

    /**
     * Gets the assignment property value. For a requestType of userAdd or adminAdd, this is an access package assignment requested to be created. For a requestType of userRemove, adminRemove, approverRemove, or systemRemove, this has the id property of an existing assignment to be removed.   Supports $expand.
     * @return AccessPackageAssignment|null
    */
    public function getAssignment(): ?AccessPackageAssignment {
        return $this->assignment;
    }

    /**
     * Gets the completedDateTime property value. The date of the end of processing, either successful or failure, of a request. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCompletedDateTime(): ?DateTime {
        return $this->completedDateTime;
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only. Supports $filter.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the customExtensionCalloutInstances property value. Information about all the custom extension calls that were made during the access package assignment workflow.
     * @return array<CustomExtensionCalloutInstance>|null
    */
    public function getCustomExtensionCalloutInstances(): ?array {
        return $this->customExtensionCalloutInstances;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'accessPackage' => fn(ParseNode $n) => $o->setAccessPackage($n->getObjectValue([AccessPackage::class, 'createFromDiscriminatorValue'])),
            'answers' => fn(ParseNode $n) => $o->setAnswers($n->getCollectionOfObjectValues([AccessPackageAnswer::class, 'createFromDiscriminatorValue'])),
            'assignment' => fn(ParseNode $n) => $o->setAssignment($n->getObjectValue([AccessPackageAssignment::class, 'createFromDiscriminatorValue'])),
            'completedDateTime' => fn(ParseNode $n) => $o->setCompletedDateTime($n->getDateTimeValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'customExtensionCalloutInstances' => fn(ParseNode $n) => $o->setCustomExtensionCalloutInstances($n->getCollectionOfObjectValues([CustomExtensionCalloutInstance::class, 'createFromDiscriminatorValue'])),
            'justification' => fn(ParseNode $n) => $o->setJustification($n->getStringValue()),
            'requestor' => fn(ParseNode $n) => $o->setRequestor($n->getObjectValue([AccessPackageSubject::class, 'createFromDiscriminatorValue'])),
            'requestType' => fn(ParseNode $n) => $o->setRequestType($n->getEnumValue(AccessPackageRequestType::class)),
            'schedule' => fn(ParseNode $n) => $o->setSchedule($n->getObjectValue([EntitlementManagementSchedule::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(AccessPackageRequestState::class)),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getStringValue()),
        ]);
    }

    /**
     * Gets the justification property value. The requestor's supplied justification.
     * @return string|null
    */
    public function getJustification(): ?string {
        return $this->justification;
    }

    /**
     * Gets the requestor property value. The subject who requested or, if a direct assignment, was assigned. Read-only. Nullable. Supports $expand.
     * @return AccessPackageSubject|null
    */
    public function getRequestor(): ?AccessPackageSubject {
        return $this->requestor;
    }

    /**
     * Gets the requestType property value. The type of the request. The possible values are: notSpecified, userAdd, userUpdate, userRemove, adminAdd, adminUpdate, adminRemove, systemAdd, systemUpdate, systemRemove, onBehalfAdd (not supported), unknownFutureValue. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: approverRemove. Requests from the user have a requestType of userAdd, userUpdate, or userRemove. This property can't be changed once set.
     * @return AccessPackageRequestType|null
    */
    public function getRequestType(): ?AccessPackageRequestType {
        return $this->requestType;
    }

    /**
     * Gets the schedule property value. The range of dates that access is to be assigned to the requestor. This property can't be changed once set, but a new schedule for an assignment can be included in another userUpdate or adminUpdate assignment request.
     * @return EntitlementManagementSchedule|null
    */
    public function getSchedule(): ?EntitlementManagementSchedule {
        return $this->schedule;
    }

    /**
     * Gets the state property value. The state of the request. The possible values are: submitted, pendingApproval, delivering, delivered, deliveryFailed, denied, scheduled, canceled, partiallyDelivered, unknownFutureValue. Read-only. Supports $filter (eq).
     * @return AccessPackageRequestState|null
    */
    public function getState(): ?AccessPackageRequestState {
        return $this->state;
    }

    /**
     * Gets the status property value. More information on the request processing status. Read-only.
     * @return string|null
    */
    public function getStatus(): ?string {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('accessPackage', $this->getAccessPackage());
        $writer->writeCollectionOfObjectValues('answers', $this->getAnswers());
        $writer->writeObjectValue('assignment', $this->getAssignment());
        $writer->writeDateTimeValue('completedDateTime', $this->getCompletedDateTime());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('customExtensionCalloutInstances', $this->getCustomExtensionCalloutInstances());
        $writer->writeStringValue('justification', $this->getJustification());
        $writer->writeObjectValue('requestor', $this->getRequestor());
        $writer->writeEnumValue('requestType', $this->getRequestType());
        $writer->writeObjectValue('schedule', $this->getSchedule());
        $writer->writeEnumValue('state', $this->getState());
        $writer->writeStringValue('status', $this->getStatus());
    }

    /**
     * Sets the accessPackage property value. The access package associated with the accessPackageAssignmentRequest. An access package defines the collections of resource roles and the policies for how one or more users can get access to those resources. Read-only. Nullable.  Supports $expand.
     * @param AccessPackage|null $value Value to set for the accessPackage property.
    */
    public function setAccessPackage(?AccessPackage $value): void {
        $this->accessPackage = $value;
    }

    /**
     * Sets the answers property value. Answers provided by the requestor to accessPackageQuestions asked of them at the time of request.
     * @param array<AccessPackageAnswer>|null $value Value to set for the answers property.
    */
    public function setAnswers(?array $value): void {
        $this->answers = $value;
    }

    /**
     * Sets the assignment property value. For a requestType of userAdd or adminAdd, this is an access package assignment requested to be created. For a requestType of userRemove, adminRemove, approverRemove, or systemRemove, this has the id property of an existing assignment to be removed.   Supports $expand.
     * @param AccessPackageAssignment|null $value Value to set for the assignment property.
    */
    public function setAssignment(?AccessPackageAssignment $value): void {
        $this->assignment = $value;
    }

    /**
     * Sets the completedDateTime property value. The date of the end of processing, either successful or failure, of a request. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the completedDateTime property.
    */
    public function setCompletedDateTime(?DateTime $value): void {
        $this->completedDateTime = $value;
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only. Supports $filter.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the customExtensionCalloutInstances property value. Information about all the custom extension calls that were made during the access package assignment workflow.
     * @param array<CustomExtensionCalloutInstance>|null $value Value to set for the customExtensionCalloutInstances property.
    */
    public function setCustomExtensionCalloutInstances(?array $value): void {
        $this->customExtensionCalloutInstances = $value;
    }

    /**
     * Sets the justification property value. The requestor's supplied justification.
     * @param string|null $value Value to set for the justification property.
    */
    public function setJustification(?string $value): void {
        $this->justification = $value;
    }

    /**
     * Sets the requestor property value. The subject who requested or, if a direct assignment, was assigned. Read-only. Nullable. Supports $expand.
     * @param AccessPackageSubject|null $value Value to set for the requestor property.
    */
    public function setRequestor(?AccessPackageSubject $value): void {
        $this->requestor = $value;
    }

    /**
     * Sets the requestType property value. The type of the request. The possible values are: notSpecified, userAdd, userUpdate, userRemove, adminAdd, adminUpdate, adminRemove, systemAdd, systemUpdate, systemRemove, onBehalfAdd (not supported), unknownFutureValue. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: approverRemove. Requests from the user have a requestType of userAdd, userUpdate, or userRemove. This property can't be changed once set.
     * @param AccessPackageRequestType|null $value Value to set for the requestType property.
    */
    public function setRequestType(?AccessPackageRequestType $value): void {
        $this->requestType = $value;
    }

    /**
     * Sets the schedule property value. The range of dates that access is to be assigned to the requestor. This property can't be changed once set, but a new schedule for an assignment can be included in another userUpdate or adminUpdate assignment request.
     * @param EntitlementManagementSchedule|null $value Value to set for the schedule property.
    */
    public function setSchedule(?EntitlementManagementSchedule $value): void {
        $this->schedule = $value;
    }

    /**
     * Sets the state property value. The state of the request. The possible values are: submitted, pendingApproval, delivering, delivered, deliveryFailed, denied, scheduled, canceled, partiallyDelivered, unknownFutureValue. Read-only. Supports $filter (eq).
     * @param AccessPackageRequestState|null $value Value to set for the state property.
    */
    public function setState(?AccessPackageRequestState $value): void {
        $this->state = $value;
    }

    /**
     * Sets the status property value. More information on the request processing status. Read-only.
     * @param string|null $value Value to set for the status property.
    */
    public function setStatus(?string $value): void {
        $this->status = $value;
    }

}
