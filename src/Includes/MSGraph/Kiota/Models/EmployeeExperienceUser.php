<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EmployeeExperienceUser extends Entity implements Parsable 
{
    /**
     * @var array<EngagementRole>|null $assignedRoles Represents the collection of Viva Engage roles assigned to a user.
    */
    private ?array $assignedRoles = null;
    
    /**
     * @var array<LearningCourseActivity>|null $learningCourseActivities The learningCourseActivities property
    */
    private ?array $learningCourseActivities = null;
    
    /**
     * Instantiates a new EmployeeExperienceUser and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EmployeeExperienceUser
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EmployeeExperienceUser {
        return new EmployeeExperienceUser();
    }

    /**
     * Gets the assignedRoles property value. Represents the collection of Viva Engage roles assigned to a user.
     * @return array<EngagementRole>|null
    */
    public function getAssignedRoles(): ?array {
        return $this->assignedRoles;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'assignedRoles' => fn(ParseNode $n) => $o->setAssignedRoles($n->getCollectionOfObjectValues([EngagementRole::class, 'createFromDiscriminatorValue'])),
            'learningCourseActivities' => fn(ParseNode $n) => $o->setLearningCourseActivities($n->getCollectionOfObjectValues([LearningCourseActivity::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the learningCourseActivities property value. The learningCourseActivities property
     * @return array<LearningCourseActivity>|null
    */
    public function getLearningCourseActivities(): ?array {
        return $this->learningCourseActivities;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('assignedRoles', $this->getAssignedRoles());
        $writer->writeCollectionOfObjectValues('learningCourseActivities', $this->getLearningCourseActivities());
    }

    /**
     * Sets the assignedRoles property value. Represents the collection of Viva Engage roles assigned to a user.
     * @param array<EngagementRole>|null $value Value to set for the assignedRoles property.
    */
    public function setAssignedRoles(?array $value): void {
        $this->assignedRoles = $value;
    }

    /**
     * Sets the learningCourseActivities property value. The learningCourseActivities property
     * @param array<LearningCourseActivity>|null $value Value to set for the learningCourseActivities property.
    */
    public function setLearningCourseActivities(?array $value): void {
        $this->learningCourseActivities = $value;
    }

}
