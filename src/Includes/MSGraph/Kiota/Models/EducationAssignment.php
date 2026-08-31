<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationAssignment extends Entity implements Parsable 
{
    /**
     * @var EducationAddedStudentAction|null $addedStudentAction Optional field to control the assignment behavior for students who are added after the assignment is published. If not specified, defaults to none. Supported values are: none, assignIfOpen. For example, a teacher can use assignIfOpen to indicate that an assignment should be assigned to any new student who joins the class while the assignment is still open, and none to indicate that an assignment shouldn't be assigned to new students.
    */
    private ?EducationAddedStudentAction $addedStudentAction = null;
    
    /**
     * @var EducationAddToCalendarOptions|null $addToCalendarAction Optional field to control the assignment behavior  for adding assignments to students' and teachers' calendars when the assignment is published. The possible values are: none, studentsAndPublisher, studentsAndTeamOwners, unknownFutureValue, and studentsOnly. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: studentsOnly. The default value is none.
    */
    private ?EducationAddToCalendarOptions $addToCalendarAction = null;
    
    /**
     * @var bool|null $allowLateSubmissions Identifies whether students can submit after the due date. If this property isn't specified during create, it defaults to true.
    */
    private ?bool $allowLateSubmissions = null;
    
    /**
     * @var bool|null $allowStudentsToAddResourcesToSubmission Identifies whether students can add their own resources to a submission or if they can only modify resources added by the teacher.
    */
    private ?bool $allowStudentsToAddResourcesToSubmission = null;
    
    /**
     * @var DateTime|null $assignDateTime The date when the assignment should become active. If in the future, the assignment isn't shown to the student until this date. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $assignDateTime = null;
    
    /**
     * @var DateTime|null $assignedDateTime The moment that the assignment was published to students and the assignment shows up on the students timeline. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $assignedDateTime = null;
    
    /**
     * @var EducationAssignmentRecipient|null $assignTo Which users, or whole class should receive a submission object once the assignment is published.
    */
    private ?EducationAssignmentRecipient $assignTo = null;
    
    /**
     * @var array<EducationCategory>|null $categories When set, enables users to easily find assignments of a given type. Read-only. Nullable.
    */
    private ?array $categories = null;
    
    /**
     * @var string|null $classId Class to which this assignment belongs.
    */
    private ?string $classId = null;
    
    /**
     * @var DateTime|null $closeDateTime Date when the assignment is closed for submissions. This is an optional field that can be null if the assignment doesn't allowLateSubmissions or when the closeDateTime is the same as the dueDateTime. But if specified, then the closeDateTime must be greater than or equal to the dueDateTime. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $closeDateTime = null;
    
    /**
     * @var IdentitySet|null $createdBy Who created the assignment.
    */
    private ?IdentitySet $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime Moment when the assignment was created. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $displayName Name of the assignment.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $dueDateTime Date when the students assignment is due. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $dueDateTime = null;
    
    /**
     * @var string|null $feedbackResourcesFolderUrl Folder URL where all the feedback file resources for this assignment are stored.
    */
    private ?string $feedbackResourcesFolderUrl = null;
    
    /**
     * @var EducationAssignmentGradeType|null $grading How the assignment will be graded.
    */
    private ?EducationAssignmentGradeType $grading = null;
    
    /**
     * @var EducationGradingCategory|null $gradingCategory When set, enables users to weight assignments differently when computing a class average grade.
    */
    private ?EducationGradingCategory $gradingCategory = null;
    
    /**
     * @var EducationGradingScheme|null $gradingScheme When set, enables users to configure custom string grades based on the percentage of total points earned on this assignment.
    */
    private ?EducationGradingScheme $gradingScheme = null;
    
    /**
     * @var EducationItemBody|null $instructions Instructions for the assignment. The instructions and the display name tell the student what to do.
    */
    private ?EducationItemBody $instructions = null;
    
    /**
     * @var string|null $languageTag Specifies the language in which UI notifications for the assignment are displayed. If languageTag isn't provided, the default language is en-US. Optional.
    */
    private ?string $languageTag = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy Who last modified the assignment.
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The date and time on which the assignment was modified. A student submission doesn't modify the assignment; only teachers can update assignments. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $moduleUrl The URL of the module from which to access the assignment.
    */
    private ?string $moduleUrl = null;
    
    /**
     * @var string|null $notificationChannelUrl Optional field to specify the URL of the channel to post the assignment publish notification. If not specified or null, defaults to the General channel. This field only applies to assignments where the assignTo value is educationAssignmentClassRecipient. Updating the notificationChannelUrl isn't allowed after the assignment is published.
    */
    private ?string $notificationChannelUrl = null;
    
    /**
     * @var array<EducationAssignmentResource>|null $resources Learning objects that are associated with this assignment. Only teachers can modify this list. Nullable.
    */
    private ?array $resources = null;
    
    /**
     * @var string|null $resourcesFolderUrl Folder URL where all the file resources for this assignment are stored.
    */
    private ?string $resourcesFolderUrl = null;
    
    /**
     * @var EducationRubric|null $rubric When set, the grading rubric attached to this assignment.
    */
    private ?EducationRubric $rubric = null;
    
    /**
     * @var EducationAssignmentStatus|null $status Status of the assignment.  You can't PATCH this value. The possible values are: draft, scheduled, published, assigned, unknownFutureValue, inactive. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: inactive.
    */
    private ?EducationAssignmentStatus $status = null;
    
    /**
     * @var array<EducationSubmission>|null $submissions Once published, there's a submission object for each student representing their work and grade. Read-only. Nullable.
    */
    private ?array $submissions = null;
    
    /**
     * @var string|null $webUrl The deep link URL for the given assignment.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new EducationAssignment and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationAssignment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationAssignment {
        return new EducationAssignment();
    }

    /**
     * Gets the addedStudentAction property value. Optional field to control the assignment behavior for students who are added after the assignment is published. If not specified, defaults to none. Supported values are: none, assignIfOpen. For example, a teacher can use assignIfOpen to indicate that an assignment should be assigned to any new student who joins the class while the assignment is still open, and none to indicate that an assignment shouldn't be assigned to new students.
     * @return EducationAddedStudentAction|null
    */
    public function getAddedStudentAction(): ?EducationAddedStudentAction {
        return $this->addedStudentAction;
    }

    /**
     * Gets the addToCalendarAction property value. Optional field to control the assignment behavior  for adding assignments to students' and teachers' calendars when the assignment is published. The possible values are: none, studentsAndPublisher, studentsAndTeamOwners, unknownFutureValue, and studentsOnly. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: studentsOnly. The default value is none.
     * @return EducationAddToCalendarOptions|null
    */
    public function getAddToCalendarAction(): ?EducationAddToCalendarOptions {
        return $this->addToCalendarAction;
    }

    /**
     * Gets the allowLateSubmissions property value. Identifies whether students can submit after the due date. If this property isn't specified during create, it defaults to true.
     * @return bool|null
    */
    public function getAllowLateSubmissions(): ?bool {
        return $this->allowLateSubmissions;
    }

    /**
     * Gets the allowStudentsToAddResourcesToSubmission property value. Identifies whether students can add their own resources to a submission or if they can only modify resources added by the teacher.
     * @return bool|null
    */
    public function getAllowStudentsToAddResourcesToSubmission(): ?bool {
        return $this->allowStudentsToAddResourcesToSubmission;
    }

    /**
     * Gets the assignDateTime property value. The date when the assignment should become active. If in the future, the assignment isn't shown to the student until this date. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getAssignDateTime(): ?DateTime {
        return $this->assignDateTime;
    }

    /**
     * Gets the assignedDateTime property value. The moment that the assignment was published to students and the assignment shows up on the students timeline. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getAssignedDateTime(): ?DateTime {
        return $this->assignedDateTime;
    }

    /**
     * Gets the assignTo property value. Which users, or whole class should receive a submission object once the assignment is published.
     * @return EducationAssignmentRecipient|null
    */
    public function getAssignTo(): ?EducationAssignmentRecipient {
        return $this->assignTo;
    }

    /**
     * Gets the categories property value. When set, enables users to easily find assignments of a given type. Read-only. Nullable.
     * @return array<EducationCategory>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the classId property value. Class to which this assignment belongs.
     * @return string|null
    */
    public function getClassId(): ?string {
        return $this->classId;
    }

    /**
     * Gets the closeDateTime property value. Date when the assignment is closed for submissions. This is an optional field that can be null if the assignment doesn't allowLateSubmissions or when the closeDateTime is the same as the dueDateTime. But if specified, then the closeDateTime must be greater than or equal to the dueDateTime. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getCloseDateTime(): ?DateTime {
        return $this->closeDateTime;
    }

    /**
     * Gets the createdBy property value. Who created the assignment.
     * @return IdentitySet|null
    */
    public function getCreatedBy(): ?IdentitySet {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. Moment when the assignment was created. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the displayName property value. Name of the assignment.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the dueDateTime property value. Date when the students assignment is due. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getDueDateTime(): ?DateTime {
        return $this->dueDateTime;
    }

    /**
     * Gets the feedbackResourcesFolderUrl property value. Folder URL where all the feedback file resources for this assignment are stored.
     * @return string|null
    */
    public function getFeedbackResourcesFolderUrl(): ?string {
        return $this->feedbackResourcesFolderUrl;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'addedStudentAction' => fn(ParseNode $n) => $o->setAddedStudentAction($n->getEnumValue(EducationAddedStudentAction::class)),
            'addToCalendarAction' => fn(ParseNode $n) => $o->setAddToCalendarAction($n->getEnumValue(EducationAddToCalendarOptions::class)),
            'allowLateSubmissions' => fn(ParseNode $n) => $o->setAllowLateSubmissions($n->getBooleanValue()),
            'allowStudentsToAddResourcesToSubmission' => fn(ParseNode $n) => $o->setAllowStudentsToAddResourcesToSubmission($n->getBooleanValue()),
            'assignDateTime' => fn(ParseNode $n) => $o->setAssignDateTime($n->getDateTimeValue()),
            'assignedDateTime' => fn(ParseNode $n) => $o->setAssignedDateTime($n->getDateTimeValue()),
            'assignTo' => fn(ParseNode $n) => $o->setAssignTo($n->getObjectValue([EducationAssignmentRecipient::class, 'createFromDiscriminatorValue'])),
            'categories' => fn(ParseNode $n) => $o->setCategories($n->getCollectionOfObjectValues([EducationCategory::class, 'createFromDiscriminatorValue'])),
            'classId' => fn(ParseNode $n) => $o->setClassId($n->getStringValue()),
            'closeDateTime' => fn(ParseNode $n) => $o->setCloseDateTime($n->getDateTimeValue()),
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'dueDateTime' => fn(ParseNode $n) => $o->setDueDateTime($n->getDateTimeValue()),
            'feedbackResourcesFolderUrl' => fn(ParseNode $n) => $o->setFeedbackResourcesFolderUrl($n->getStringValue()),
            'grading' => fn(ParseNode $n) => $o->setGrading($n->getObjectValue([EducationAssignmentGradeType::class, 'createFromDiscriminatorValue'])),
            'gradingCategory' => fn(ParseNode $n) => $o->setGradingCategory($n->getObjectValue([EducationGradingCategory::class, 'createFromDiscriminatorValue'])),
            'gradingScheme' => fn(ParseNode $n) => $o->setGradingScheme($n->getObjectValue([EducationGradingScheme::class, 'createFromDiscriminatorValue'])),
            'instructions' => fn(ParseNode $n) => $o->setInstructions($n->getObjectValue([EducationItemBody::class, 'createFromDiscriminatorValue'])),
            'languageTag' => fn(ParseNode $n) => $o->setLanguageTag($n->getStringValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'moduleUrl' => fn(ParseNode $n) => $o->setModuleUrl($n->getStringValue()),
            'notificationChannelUrl' => fn(ParseNode $n) => $o->setNotificationChannelUrl($n->getStringValue()),
            'resources' => fn(ParseNode $n) => $o->setResources($n->getCollectionOfObjectValues([EducationAssignmentResource::class, 'createFromDiscriminatorValue'])),
            'resourcesFolderUrl' => fn(ParseNode $n) => $o->setResourcesFolderUrl($n->getStringValue()),
            'rubric' => fn(ParseNode $n) => $o->setRubric($n->getObjectValue([EducationRubric::class, 'createFromDiscriminatorValue'])),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(EducationAssignmentStatus::class)),
            'submissions' => fn(ParseNode $n) => $o->setSubmissions($n->getCollectionOfObjectValues([EducationSubmission::class, 'createFromDiscriminatorValue'])),
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the grading property value. How the assignment will be graded.
     * @return EducationAssignmentGradeType|null
    */
    public function getGrading(): ?EducationAssignmentGradeType {
        return $this->grading;
    }

    /**
     * Gets the gradingCategory property value. When set, enables users to weight assignments differently when computing a class average grade.
     * @return EducationGradingCategory|null
    */
    public function getGradingCategory(): ?EducationGradingCategory {
        return $this->gradingCategory;
    }

    /**
     * Gets the gradingScheme property value. When set, enables users to configure custom string grades based on the percentage of total points earned on this assignment.
     * @return EducationGradingScheme|null
    */
    public function getGradingScheme(): ?EducationGradingScheme {
        return $this->gradingScheme;
    }

    /**
     * Gets the instructions property value. Instructions for the assignment. The instructions and the display name tell the student what to do.
     * @return EducationItemBody|null
    */
    public function getInstructions(): ?EducationItemBody {
        return $this->instructions;
    }

    /**
     * Gets the languageTag property value. Specifies the language in which UI notifications for the assignment are displayed. If languageTag isn't provided, the default language is en-US. Optional.
     * @return string|null
    */
    public function getLanguageTag(): ?string {
        return $this->languageTag;
    }

    /**
     * Gets the lastModifiedBy property value. Who last modified the assignment.
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. The date and time on which the assignment was modified. A student submission doesn't modify the assignment; only teachers can update assignments. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the moduleUrl property value. The URL of the module from which to access the assignment.
     * @return string|null
    */
    public function getModuleUrl(): ?string {
        return $this->moduleUrl;
    }

    /**
     * Gets the notificationChannelUrl property value. Optional field to specify the URL of the channel to post the assignment publish notification. If not specified or null, defaults to the General channel. This field only applies to assignments where the assignTo value is educationAssignmentClassRecipient. Updating the notificationChannelUrl isn't allowed after the assignment is published.
     * @return string|null
    */
    public function getNotificationChannelUrl(): ?string {
        return $this->notificationChannelUrl;
    }

    /**
     * Gets the resources property value. Learning objects that are associated with this assignment. Only teachers can modify this list. Nullable.
     * @return array<EducationAssignmentResource>|null
    */
    public function getResources(): ?array {
        return $this->resources;
    }

    /**
     * Gets the resourcesFolderUrl property value. Folder URL where all the file resources for this assignment are stored.
     * @return string|null
    */
    public function getResourcesFolderUrl(): ?string {
        return $this->resourcesFolderUrl;
    }

    /**
     * Gets the rubric property value. When set, the grading rubric attached to this assignment.
     * @return EducationRubric|null
    */
    public function getRubric(): ?EducationRubric {
        return $this->rubric;
    }

    /**
     * Gets the status property value. Status of the assignment.  You can't PATCH this value. The possible values are: draft, scheduled, published, assigned, unknownFutureValue, inactive. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: inactive.
     * @return EducationAssignmentStatus|null
    */
    public function getStatus(): ?EducationAssignmentStatus {
        return $this->status;
    }

    /**
     * Gets the submissions property value. Once published, there's a submission object for each student representing their work and grade. Read-only. Nullable.
     * @return array<EducationSubmission>|null
    */
    public function getSubmissions(): ?array {
        return $this->submissions;
    }

    /**
     * Gets the webUrl property value. The deep link URL for the given assignment.
     * @return string|null
    */
    public function getWebUrl(): ?string {
        return $this->webUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('addedStudentAction', $this->getAddedStudentAction());
        $writer->writeEnumValue('addToCalendarAction', $this->getAddToCalendarAction());
        $writer->writeBooleanValue('allowLateSubmissions', $this->getAllowLateSubmissions());
        $writer->writeBooleanValue('allowStudentsToAddResourcesToSubmission', $this->getAllowStudentsToAddResourcesToSubmission());
        $writer->writeObjectValue('assignTo', $this->getAssignTo());
        $writer->writeCollectionOfObjectValues('categories', $this->getCategories());
        $writer->writeStringValue('classId', $this->getClassId());
        $writer->writeDateTimeValue('closeDateTime', $this->getCloseDateTime());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('dueDateTime', $this->getDueDateTime());
        $writer->writeObjectValue('grading', $this->getGrading());
        $writer->writeObjectValue('gradingCategory', $this->getGradingCategory());
        $writer->writeObjectValue('gradingScheme', $this->getGradingScheme());
        $writer->writeObjectValue('instructions', $this->getInstructions());
        $writer->writeStringValue('languageTag', $this->getLanguageTag());
        $writer->writeStringValue('moduleUrl', $this->getModuleUrl());
        $writer->writeStringValue('notificationChannelUrl', $this->getNotificationChannelUrl());
        $writer->writeCollectionOfObjectValues('resources', $this->getResources());
        $writer->writeObjectValue('rubric', $this->getRubric());
        $writer->writeCollectionOfObjectValues('submissions', $this->getSubmissions());
    }

    /**
     * Sets the addedStudentAction property value. Optional field to control the assignment behavior for students who are added after the assignment is published. If not specified, defaults to none. Supported values are: none, assignIfOpen. For example, a teacher can use assignIfOpen to indicate that an assignment should be assigned to any new student who joins the class while the assignment is still open, and none to indicate that an assignment shouldn't be assigned to new students.
     * @param EducationAddedStudentAction|null $value Value to set for the addedStudentAction property.
    */
    public function setAddedStudentAction(?EducationAddedStudentAction $value): void {
        $this->addedStudentAction = $value;
    }

    /**
     * Sets the addToCalendarAction property value. Optional field to control the assignment behavior  for adding assignments to students' and teachers' calendars when the assignment is published. The possible values are: none, studentsAndPublisher, studentsAndTeamOwners, unknownFutureValue, and studentsOnly. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: studentsOnly. The default value is none.
     * @param EducationAddToCalendarOptions|null $value Value to set for the addToCalendarAction property.
    */
    public function setAddToCalendarAction(?EducationAddToCalendarOptions $value): void {
        $this->addToCalendarAction = $value;
    }

    /**
     * Sets the allowLateSubmissions property value. Identifies whether students can submit after the due date. If this property isn't specified during create, it defaults to true.
     * @param bool|null $value Value to set for the allowLateSubmissions property.
    */
    public function setAllowLateSubmissions(?bool $value): void {
        $this->allowLateSubmissions = $value;
    }

    /**
     * Sets the allowStudentsToAddResourcesToSubmission property value. Identifies whether students can add their own resources to a submission or if they can only modify resources added by the teacher.
     * @param bool|null $value Value to set for the allowStudentsToAddResourcesToSubmission property.
    */
    public function setAllowStudentsToAddResourcesToSubmission(?bool $value): void {
        $this->allowStudentsToAddResourcesToSubmission = $value;
    }

    /**
     * Sets the assignDateTime property value. The date when the assignment should become active. If in the future, the assignment isn't shown to the student until this date. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the assignDateTime property.
    */
    public function setAssignDateTime(?DateTime $value): void {
        $this->assignDateTime = $value;
    }

    /**
     * Sets the assignedDateTime property value. The moment that the assignment was published to students and the assignment shows up on the students timeline. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the assignedDateTime property.
    */
    public function setAssignedDateTime(?DateTime $value): void {
        $this->assignedDateTime = $value;
    }

    /**
     * Sets the assignTo property value. Which users, or whole class should receive a submission object once the assignment is published.
     * @param EducationAssignmentRecipient|null $value Value to set for the assignTo property.
    */
    public function setAssignTo(?EducationAssignmentRecipient $value): void {
        $this->assignTo = $value;
    }

    /**
     * Sets the categories property value. When set, enables users to easily find assignments of a given type. Read-only. Nullable.
     * @param array<EducationCategory>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the classId property value. Class to which this assignment belongs.
     * @param string|null $value Value to set for the classId property.
    */
    public function setClassId(?string $value): void {
        $this->classId = $value;
    }

    /**
     * Sets the closeDateTime property value. Date when the assignment is closed for submissions. This is an optional field that can be null if the assignment doesn't allowLateSubmissions or when the closeDateTime is the same as the dueDateTime. But if specified, then the closeDateTime must be greater than or equal to the dueDateTime. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the closeDateTime property.
    */
    public function setCloseDateTime(?DateTime $value): void {
        $this->closeDateTime = $value;
    }

    /**
     * Sets the createdBy property value. Who created the assignment.
     * @param IdentitySet|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?IdentitySet $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. Moment when the assignment was created. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the displayName property value. Name of the assignment.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the dueDateTime property value. Date when the students assignment is due. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the dueDateTime property.
    */
    public function setDueDateTime(?DateTime $value): void {
        $this->dueDateTime = $value;
    }

    /**
     * Sets the feedbackResourcesFolderUrl property value. Folder URL where all the feedback file resources for this assignment are stored.
     * @param string|null $value Value to set for the feedbackResourcesFolderUrl property.
    */
    public function setFeedbackResourcesFolderUrl(?string $value): void {
        $this->feedbackResourcesFolderUrl = $value;
    }

    /**
     * Sets the grading property value. How the assignment will be graded.
     * @param EducationAssignmentGradeType|null $value Value to set for the grading property.
    */
    public function setGrading(?EducationAssignmentGradeType $value): void {
        $this->grading = $value;
    }

    /**
     * Sets the gradingCategory property value. When set, enables users to weight assignments differently when computing a class average grade.
     * @param EducationGradingCategory|null $value Value to set for the gradingCategory property.
    */
    public function setGradingCategory(?EducationGradingCategory $value): void {
        $this->gradingCategory = $value;
    }

    /**
     * Sets the gradingScheme property value. When set, enables users to configure custom string grades based on the percentage of total points earned on this assignment.
     * @param EducationGradingScheme|null $value Value to set for the gradingScheme property.
    */
    public function setGradingScheme(?EducationGradingScheme $value): void {
        $this->gradingScheme = $value;
    }

    /**
     * Sets the instructions property value. Instructions for the assignment. The instructions and the display name tell the student what to do.
     * @param EducationItemBody|null $value Value to set for the instructions property.
    */
    public function setInstructions(?EducationItemBody $value): void {
        $this->instructions = $value;
    }

    /**
     * Sets the languageTag property value. Specifies the language in which UI notifications for the assignment are displayed. If languageTag isn't provided, the default language is en-US. Optional.
     * @param string|null $value Value to set for the languageTag property.
    */
    public function setLanguageTag(?string $value): void {
        $this->languageTag = $value;
    }

    /**
     * Sets the lastModifiedBy property value. Who last modified the assignment.
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The date and time on which the assignment was modified. A student submission doesn't modify the assignment; only teachers can update assignments. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the moduleUrl property value. The URL of the module from which to access the assignment.
     * @param string|null $value Value to set for the moduleUrl property.
    */
    public function setModuleUrl(?string $value): void {
        $this->moduleUrl = $value;
    }

    /**
     * Sets the notificationChannelUrl property value. Optional field to specify the URL of the channel to post the assignment publish notification. If not specified or null, defaults to the General channel. This field only applies to assignments where the assignTo value is educationAssignmentClassRecipient. Updating the notificationChannelUrl isn't allowed after the assignment is published.
     * @param string|null $value Value to set for the notificationChannelUrl property.
    */
    public function setNotificationChannelUrl(?string $value): void {
        $this->notificationChannelUrl = $value;
    }

    /**
     * Sets the resources property value. Learning objects that are associated with this assignment. Only teachers can modify this list. Nullable.
     * @param array<EducationAssignmentResource>|null $value Value to set for the resources property.
    */
    public function setResources(?array $value): void {
        $this->resources = $value;
    }

    /**
     * Sets the resourcesFolderUrl property value. Folder URL where all the file resources for this assignment are stored.
     * @param string|null $value Value to set for the resourcesFolderUrl property.
    */
    public function setResourcesFolderUrl(?string $value): void {
        $this->resourcesFolderUrl = $value;
    }

    /**
     * Sets the rubric property value. When set, the grading rubric attached to this assignment.
     * @param EducationRubric|null $value Value to set for the rubric property.
    */
    public function setRubric(?EducationRubric $value): void {
        $this->rubric = $value;
    }

    /**
     * Sets the status property value. Status of the assignment.  You can't PATCH this value. The possible values are: draft, scheduled, published, assigned, unknownFutureValue, inactive. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: inactive.
     * @param EducationAssignmentStatus|null $value Value to set for the status property.
    */
    public function setStatus(?EducationAssignmentStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the submissions property value. Once published, there's a submission object for each student representing their work and grade. Read-only. Nullable.
     * @param array<EducationSubmission>|null $value Value to set for the submissions property.
    */
    public function setSubmissions(?array $value): void {
        $this->submissions = $value;
    }

    /**
     * Sets the webUrl property value. The deep link URL for the given assignment.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
