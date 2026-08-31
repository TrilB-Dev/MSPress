<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class SubjectRightsRequest extends Entity implements Parsable 
{
    /**
     * @var array<User>|null $approvers Collection of users who can approve the request. Currently only supported for requests of type delete.
    */
    private ?array $approvers = null;
    
    /**
     * @var Identity|null $assignedTo Identity that the request is assigned to.
    */
    private ?Identity $assignedTo = null;
    
    /**
     * @var DateTime|null $closedDateTime The date and time when the request was closed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $closedDateTime = null;
    
    /**
     * @var array<User>|null $collaborators Collection of users who can collaborate on the request.
    */
    private ?array $collaborators = null;
    
    /**
     * @var string|null $contentQuery KQL based content query that should be used for search. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?string $contentQuery = null;
    
    /**
     * @var IdentitySet|null $createdBy Identity information for the entity that created the request.
    */
    private ?IdentitySet $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when the request was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var DataSubject|null $dataSubject Information about the data subject.
    */
    private ?DataSubject $dataSubject = null;
    
    /**
     * @var DataSubjectType|null $dataSubjectType The type of the data subject. The possible values are: customer, currentEmployee, formerEmployee, prospectiveEmployee, student, teacher, faculty, other, unknownFutureValue.
    */
    private ?DataSubjectType $dataSubjectType = null;
    
    /**
     * @var string|null $description Description for the request.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The name of the request.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $externalId The external ID for the request that is immutable after creation and is used for tracking the request for the external system. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?string $externalId = null;
    
    /**
     * @var array<SubjectRightsRequestHistory>|null $history Collection of history change events.
    */
    private ?array $history = null;
    
    /**
     * @var bool|null $includeAllVersions Include all versions of the documents. By default, the current copies of the documents are returned. If SharePoint sites have versioning enabled, including all versions includes the historical copies of the documents. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?bool $includeAllVersions = null;
    
    /**
     * @var bool|null $includeAuthoredContent Include content authored by the data subject. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?bool $includeAuthoredContent = null;
    
    /**
     * @var SubjectRightsRequestDetail|null $insight Insight about the request.
    */
    private ?SubjectRightsRequestDetail $insight = null;
    
    /**
     * @var DateTime|null $internalDueDateTime The date and time when the request is internally due. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $internalDueDateTime = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy Identity information for the entity that last modified the request.
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The date and time when the request was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var SubjectRightsRequestMailboxLocation|null $mailboxLocations The mailbox locations that should be searched. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?SubjectRightsRequestMailboxLocation $mailboxLocations = null;
    
    /**
     * @var array<AuthoredNote>|null $notes List of notes associated with the request.
    */
    private ?array $notes = null;
    
    /**
     * @var bool|null $pauseAfterEstimate Pause the request after estimate has finished. By default, the data estimate runs and then pauses, allowing you to preview results and then select the option to retrieve data in the UI. You can set this property to false if you want it to perform the estimate and then automatically begin with the retrieval of the content. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?bool $pauseAfterEstimate = null;
    
    /**
     * @var array<string>|null $regulations List of regulations that this request fulfill.
    */
    private ?array $regulations = null;
    
    /**
     * @var SubjectRightsRequestSiteLocation|null $siteLocations The SharePoint and OneDrive site locations that should be searched. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
    */
    private ?SubjectRightsRequestSiteLocation $siteLocations = null;
    
    /**
     * @var array<SubjectRightsRequestStageDetail>|null $stages Information about the different stages for the request.
    */
    private ?array $stages = null;
    
    /**
     * @var SubjectRightsRequestStatus|null $status The status of the request. The possible values are: active, closed, unknownFutureValue.
    */
    private ?SubjectRightsRequestStatus $status = null;
    
    /**
     * @var Team|null $team Information about the Microsoft Teams team that was created for the request.
    */
    private ?Team $team = null;
    
    /**
     * @var SubjectRightsRequestType|null $type The type of the request. The possible values are: export, delete, access, tagForAction, unknownFutureValue.
    */
    private ?SubjectRightsRequestType $type = null;
    
    /**
     * Instantiates a new SubjectRightsRequest and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SubjectRightsRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SubjectRightsRequest {
        return new SubjectRightsRequest();
    }

    /**
     * Gets the approvers property value. Collection of users who can approve the request. Currently only supported for requests of type delete.
     * @return array<User>|null
    */
    public function getApprovers(): ?array {
        return $this->approvers;
    }

    /**
     * Gets the assignedTo property value. Identity that the request is assigned to.
     * @return Identity|null
    */
    public function getAssignedTo(): ?Identity {
        return $this->assignedTo;
    }

    /**
     * Gets the closedDateTime property value. The date and time when the request was closed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getClosedDateTime(): ?DateTime {
        return $this->closedDateTime;
    }

    /**
     * Gets the collaborators property value. Collection of users who can collaborate on the request.
     * @return array<User>|null
    */
    public function getCollaborators(): ?array {
        return $this->collaborators;
    }

    /**
     * Gets the contentQuery property value. KQL based content query that should be used for search. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return string|null
    */
    public function getContentQuery(): ?string {
        return $this->contentQuery;
    }

    /**
     * Gets the createdBy property value. Identity information for the entity that created the request.
     * @return IdentitySet|null
    */
    public function getCreatedBy(): ?IdentitySet {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. The date and time when the request was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the dataSubject property value. Information about the data subject.
     * @return DataSubject|null
    */
    public function getDataSubject(): ?DataSubject {
        return $this->dataSubject;
    }

    /**
     * Gets the dataSubjectType property value. The type of the data subject. The possible values are: customer, currentEmployee, formerEmployee, prospectiveEmployee, student, teacher, faculty, other, unknownFutureValue.
     * @return DataSubjectType|null
    */
    public function getDataSubjectType(): ?DataSubjectType {
        return $this->dataSubjectType;
    }

    /**
     * Gets the description property value. Description for the request.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The name of the request.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the externalId property value. The external ID for the request that is immutable after creation and is used for tracking the request for the external system. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return string|null
    */
    public function getExternalId(): ?string {
        return $this->externalId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'approvers' => fn(ParseNode $n) => $o->setApprovers($n->getCollectionOfObjectValues([User::class, 'createFromDiscriminatorValue'])),
            'assignedTo' => fn(ParseNode $n) => $o->setAssignedTo($n->getObjectValue([Identity::class, 'createFromDiscriminatorValue'])),
            'closedDateTime' => fn(ParseNode $n) => $o->setClosedDateTime($n->getDateTimeValue()),
            'collaborators' => fn(ParseNode $n) => $o->setCollaborators($n->getCollectionOfObjectValues([User::class, 'createFromDiscriminatorValue'])),
            'contentQuery' => fn(ParseNode $n) => $o->setContentQuery($n->getStringValue()),
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'dataSubject' => fn(ParseNode $n) => $o->setDataSubject($n->getObjectValue([DataSubject::class, 'createFromDiscriminatorValue'])),
            'dataSubjectType' => fn(ParseNode $n) => $o->setDataSubjectType($n->getEnumValue(DataSubjectType::class)),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'externalId' => fn(ParseNode $n) => $o->setExternalId($n->getStringValue()),
            'history' => fn(ParseNode $n) => $o->setHistory($n->getCollectionOfObjectValues([SubjectRightsRequestHistory::class, 'createFromDiscriminatorValue'])),
            'includeAllVersions' => fn(ParseNode $n) => $o->setIncludeAllVersions($n->getBooleanValue()),
            'includeAuthoredContent' => fn(ParseNode $n) => $o->setIncludeAuthoredContent($n->getBooleanValue()),
            'insight' => fn(ParseNode $n) => $o->setInsight($n->getObjectValue([SubjectRightsRequestDetail::class, 'createFromDiscriminatorValue'])),
            'internalDueDateTime' => fn(ParseNode $n) => $o->setInternalDueDateTime($n->getDateTimeValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'mailboxLocations' => fn(ParseNode $n) => $o->setMailboxLocations($n->getObjectValue([SubjectRightsRequestMailboxLocation::class, 'createFromDiscriminatorValue'])),
            'notes' => fn(ParseNode $n) => $o->setNotes($n->getCollectionOfObjectValues([AuthoredNote::class, 'createFromDiscriminatorValue'])),
            'pauseAfterEstimate' => fn(ParseNode $n) => $o->setPauseAfterEstimate($n->getBooleanValue()),
            'regulations' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setRegulations($val);
            },
            'siteLocations' => fn(ParseNode $n) => $o->setSiteLocations($n->getObjectValue([SubjectRightsRequestSiteLocation::class, 'createFromDiscriminatorValue'])),
            'stages' => fn(ParseNode $n) => $o->setStages($n->getCollectionOfObjectValues([SubjectRightsRequestStageDetail::class, 'createFromDiscriminatorValue'])),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(SubjectRightsRequestStatus::class)),
            'team' => fn(ParseNode $n) => $o->setTeam($n->getObjectValue([Team::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(SubjectRightsRequestType::class)),
        ]);
    }

    /**
     * Gets the history property value. Collection of history change events.
     * @return array<SubjectRightsRequestHistory>|null
    */
    public function getHistory(): ?array {
        return $this->history;
    }

    /**
     * Gets the includeAllVersions property value. Include all versions of the documents. By default, the current copies of the documents are returned. If SharePoint sites have versioning enabled, including all versions includes the historical copies of the documents. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return bool|null
    */
    public function getIncludeAllVersions(): ?bool {
        return $this->includeAllVersions;
    }

    /**
     * Gets the includeAuthoredContent property value. Include content authored by the data subject. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return bool|null
    */
    public function getIncludeAuthoredContent(): ?bool {
        return $this->includeAuthoredContent;
    }

    /**
     * Gets the insight property value. Insight about the request.
     * @return SubjectRightsRequestDetail|null
    */
    public function getInsight(): ?SubjectRightsRequestDetail {
        return $this->insight;
    }

    /**
     * Gets the internalDueDateTime property value. The date and time when the request is internally due. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getInternalDueDateTime(): ?DateTime {
        return $this->internalDueDateTime;
    }

    /**
     * Gets the lastModifiedBy property value. Identity information for the entity that last modified the request.
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. The date and time when the request was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the mailboxLocations property value. The mailbox locations that should be searched. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return SubjectRightsRequestMailboxLocation|null
    */
    public function getMailboxLocations(): ?SubjectRightsRequestMailboxLocation {
        return $this->mailboxLocations;
    }

    /**
     * Gets the notes property value. List of notes associated with the request.
     * @return array<AuthoredNote>|null
    */
    public function getNotes(): ?array {
        return $this->notes;
    }

    /**
     * Gets the pauseAfterEstimate property value. Pause the request after estimate has finished. By default, the data estimate runs and then pauses, allowing you to preview results and then select the option to retrieve data in the UI. You can set this property to false if you want it to perform the estimate and then automatically begin with the retrieval of the content. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return bool|null
    */
    public function getPauseAfterEstimate(): ?bool {
        return $this->pauseAfterEstimate;
    }

    /**
     * Gets the regulations property value. List of regulations that this request fulfill.
     * @return array<string>|null
    */
    public function getRegulations(): ?array {
        return $this->regulations;
    }

    /**
     * Gets the siteLocations property value. The SharePoint and OneDrive site locations that should be searched. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @return SubjectRightsRequestSiteLocation|null
    */
    public function getSiteLocations(): ?SubjectRightsRequestSiteLocation {
        return $this->siteLocations;
    }

    /**
     * Gets the stages property value. Information about the different stages for the request.
     * @return array<SubjectRightsRequestStageDetail>|null
    */
    public function getStages(): ?array {
        return $this->stages;
    }

    /**
     * Gets the status property value. The status of the request. The possible values are: active, closed, unknownFutureValue.
     * @return SubjectRightsRequestStatus|null
    */
    public function getStatus(): ?SubjectRightsRequestStatus {
        return $this->status;
    }

    /**
     * Gets the team property value. Information about the Microsoft Teams team that was created for the request.
     * @return Team|null
    */
    public function getTeam(): ?Team {
        return $this->team;
    }

    /**
     * Gets the type property value. The type of the request. The possible values are: export, delete, access, tagForAction, unknownFutureValue.
     * @return SubjectRightsRequestType|null
    */
    public function getType(): ?SubjectRightsRequestType {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('approvers', $this->getApprovers());
        $writer->writeObjectValue('assignedTo', $this->getAssignedTo());
        $writer->writeDateTimeValue('closedDateTime', $this->getClosedDateTime());
        $writer->writeCollectionOfObjectValues('collaborators', $this->getCollaborators());
        $writer->writeStringValue('contentQuery', $this->getContentQuery());
        $writer->writeObjectValue('createdBy', $this->getCreatedBy());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeObjectValue('dataSubject', $this->getDataSubject());
        $writer->writeEnumValue('dataSubjectType', $this->getDataSubjectType());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('externalId', $this->getExternalId());
        $writer->writeCollectionOfObjectValues('history', $this->getHistory());
        $writer->writeBooleanValue('includeAllVersions', $this->getIncludeAllVersions());
        $writer->writeBooleanValue('includeAuthoredContent', $this->getIncludeAuthoredContent());
        $writer->writeObjectValue('insight', $this->getInsight());
        $writer->writeDateTimeValue('internalDueDateTime', $this->getInternalDueDateTime());
        $writer->writeObjectValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeObjectValue('mailboxLocations', $this->getMailboxLocations());
        $writer->writeCollectionOfObjectValues('notes', $this->getNotes());
        $writer->writeBooleanValue('pauseAfterEstimate', $this->getPauseAfterEstimate());
        $writer->writeCollectionOfPrimitiveValues('regulations', $this->getRegulations());
        $writer->writeObjectValue('siteLocations', $this->getSiteLocations());
        $writer->writeCollectionOfObjectValues('stages', $this->getStages());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeObjectValue('team', $this->getTeam());
        $writer->writeEnumValue('type', $this->getType());
    }

    /**
     * Sets the approvers property value. Collection of users who can approve the request. Currently only supported for requests of type delete.
     * @param array<User>|null $value Value to set for the approvers property.
    */
    public function setApprovers(?array $value): void {
        $this->approvers = $value;
    }

    /**
     * Sets the assignedTo property value. Identity that the request is assigned to.
     * @param Identity|null $value Value to set for the assignedTo property.
    */
    public function setAssignedTo(?Identity $value): void {
        $this->assignedTo = $value;
    }

    /**
     * Sets the closedDateTime property value. The date and time when the request was closed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the closedDateTime property.
    */
    public function setClosedDateTime(?DateTime $value): void {
        $this->closedDateTime = $value;
    }

    /**
     * Sets the collaborators property value. Collection of users who can collaborate on the request.
     * @param array<User>|null $value Value to set for the collaborators property.
    */
    public function setCollaborators(?array $value): void {
        $this->collaborators = $value;
    }

    /**
     * Sets the contentQuery property value. KQL based content query that should be used for search. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param string|null $value Value to set for the contentQuery property.
    */
    public function setContentQuery(?string $value): void {
        $this->contentQuery = $value;
    }

    /**
     * Sets the createdBy property value. Identity information for the entity that created the request.
     * @param IdentitySet|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?IdentitySet $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when the request was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the dataSubject property value. Information about the data subject.
     * @param DataSubject|null $value Value to set for the dataSubject property.
    */
    public function setDataSubject(?DataSubject $value): void {
        $this->dataSubject = $value;
    }

    /**
     * Sets the dataSubjectType property value. The type of the data subject. The possible values are: customer, currentEmployee, formerEmployee, prospectiveEmployee, student, teacher, faculty, other, unknownFutureValue.
     * @param DataSubjectType|null $value Value to set for the dataSubjectType property.
    */
    public function setDataSubjectType(?DataSubjectType $value): void {
        $this->dataSubjectType = $value;
    }

    /**
     * Sets the description property value. Description for the request.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The name of the request.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the externalId property value. The external ID for the request that is immutable after creation and is used for tracking the request for the external system. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param string|null $value Value to set for the externalId property.
    */
    public function setExternalId(?string $value): void {
        $this->externalId = $value;
    }

    /**
     * Sets the history property value. Collection of history change events.
     * @param array<SubjectRightsRequestHistory>|null $value Value to set for the history property.
    */
    public function setHistory(?array $value): void {
        $this->history = $value;
    }

    /**
     * Sets the includeAllVersions property value. Include all versions of the documents. By default, the current copies of the documents are returned. If SharePoint sites have versioning enabled, including all versions includes the historical copies of the documents. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param bool|null $value Value to set for the includeAllVersions property.
    */
    public function setIncludeAllVersions(?bool $value): void {
        $this->includeAllVersions = $value;
    }

    /**
     * Sets the includeAuthoredContent property value. Include content authored by the data subject. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param bool|null $value Value to set for the includeAuthoredContent property.
    */
    public function setIncludeAuthoredContent(?bool $value): void {
        $this->includeAuthoredContent = $value;
    }

    /**
     * Sets the insight property value. Insight about the request.
     * @param SubjectRightsRequestDetail|null $value Value to set for the insight property.
    */
    public function setInsight(?SubjectRightsRequestDetail $value): void {
        $this->insight = $value;
    }

    /**
     * Sets the internalDueDateTime property value. The date and time when the request is internally due. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the internalDueDateTime property.
    */
    public function setInternalDueDateTime(?DateTime $value): void {
        $this->internalDueDateTime = $value;
    }

    /**
     * Sets the lastModifiedBy property value. Identity information for the entity that last modified the request.
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The date and time when the request was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the mailboxLocations property value. The mailbox locations that should be searched. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param SubjectRightsRequestMailboxLocation|null $value Value to set for the mailboxLocations property.
    */
    public function setMailboxLocations(?SubjectRightsRequestMailboxLocation $value): void {
        $this->mailboxLocations = $value;
    }

    /**
     * Sets the notes property value. List of notes associated with the request.
     * @param array<AuthoredNote>|null $value Value to set for the notes property.
    */
    public function setNotes(?array $value): void {
        $this->notes = $value;
    }

    /**
     * Sets the pauseAfterEstimate property value. Pause the request after estimate has finished. By default, the data estimate runs and then pauses, allowing you to preview results and then select the option to retrieve data in the UI. You can set this property to false if you want it to perform the estimate and then automatically begin with the retrieval of the content. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param bool|null $value Value to set for the pauseAfterEstimate property.
    */
    public function setPauseAfterEstimate(?bool $value): void {
        $this->pauseAfterEstimate = $value;
    }

    /**
     * Sets the regulations property value. List of regulations that this request fulfill.
     * @param array<string>|null $value Value to set for the regulations property.
    */
    public function setRegulations(?array $value): void {
        $this->regulations = $value;
    }

    /**
     * Sets the siteLocations property value. The SharePoint and OneDrive site locations that should be searched. This property is defined only for APIs accessed using the /security query path and not the /privacy query path.
     * @param SubjectRightsRequestSiteLocation|null $value Value to set for the siteLocations property.
    */
    public function setSiteLocations(?SubjectRightsRequestSiteLocation $value): void {
        $this->siteLocations = $value;
    }

    /**
     * Sets the stages property value. Information about the different stages for the request.
     * @param array<SubjectRightsRequestStageDetail>|null $value Value to set for the stages property.
    */
    public function setStages(?array $value): void {
        $this->stages = $value;
    }

    /**
     * Sets the status property value. The status of the request. The possible values are: active, closed, unknownFutureValue.
     * @param SubjectRightsRequestStatus|null $value Value to set for the status property.
    */
    public function setStatus(?SubjectRightsRequestStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the team property value. Information about the Microsoft Teams team that was created for the request.
     * @param Team|null $value Value to set for the team property.
    */
    public function setTeam(?Team $value): void {
        $this->team = $value;
    }

    /**
     * Sets the type property value. The type of the request. The possible values are: export, delete, access, tagForAction, unknownFutureValue.
     * @param SubjectRightsRequestType|null $value Value to set for the type property.
    */
    public function setType(?SubjectRightsRequestType $value): void {
        $this->type = $value;
    }

}
