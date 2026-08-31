<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationAssignmentSettings extends Entity implements Parsable 
{
    /**
     * @var EducationGradingScheme|null $defaultGradingScheme The default grading scheme for assignments created in this class.
    */
    private ?EducationGradingScheme $defaultGradingScheme = null;
    
    /**
     * @var array<EducationGradingCategory>|null $gradingCategories When set, enables users to weight assignments differently when computing a class average grade.
    */
    private ?array $gradingCategories = null;
    
    /**
     * @var array<EducationGradingScheme>|null $gradingSchemes The grading schemes that can be attached to assignments created in this class.
    */
    private ?array $gradingSchemes = null;
    
    /**
     * @var bool|null $submissionAnimationDisabled Indicates whether to show the turn-in celebration animation. If true, indicates to skip the animation. The default value is false.
    */
    private ?bool $submissionAnimationDisabled = null;
    
    /**
     * Instantiates a new EducationAssignmentSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationAssignmentSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationAssignmentSettings {
        return new EducationAssignmentSettings();
    }

    /**
     * Gets the defaultGradingScheme property value. The default grading scheme for assignments created in this class.
     * @return EducationGradingScheme|null
    */
    public function getDefaultGradingScheme(): ?EducationGradingScheme {
        return $this->defaultGradingScheme;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'defaultGradingScheme' => fn(ParseNode $n) => $o->setDefaultGradingScheme($n->getObjectValue([EducationGradingScheme::class, 'createFromDiscriminatorValue'])),
            'gradingCategories' => fn(ParseNode $n) => $o->setGradingCategories($n->getCollectionOfObjectValues([EducationGradingCategory::class, 'createFromDiscriminatorValue'])),
            'gradingSchemes' => fn(ParseNode $n) => $o->setGradingSchemes($n->getCollectionOfObjectValues([EducationGradingScheme::class, 'createFromDiscriminatorValue'])),
            'submissionAnimationDisabled' => fn(ParseNode $n) => $o->setSubmissionAnimationDisabled($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the gradingCategories property value. When set, enables users to weight assignments differently when computing a class average grade.
     * @return array<EducationGradingCategory>|null
    */
    public function getGradingCategories(): ?array {
        return $this->gradingCategories;
    }

    /**
     * Gets the gradingSchemes property value. The grading schemes that can be attached to assignments created in this class.
     * @return array<EducationGradingScheme>|null
    */
    public function getGradingSchemes(): ?array {
        return $this->gradingSchemes;
    }

    /**
     * Gets the submissionAnimationDisabled property value. Indicates whether to show the turn-in celebration animation. If true, indicates to skip the animation. The default value is false.
     * @return bool|null
    */
    public function getSubmissionAnimationDisabled(): ?bool {
        return $this->submissionAnimationDisabled;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('defaultGradingScheme', $this->getDefaultGradingScheme());
        $writer->writeCollectionOfObjectValues('gradingCategories', $this->getGradingCategories());
        $writer->writeCollectionOfObjectValues('gradingSchemes', $this->getGradingSchemes());
        $writer->writeBooleanValue('submissionAnimationDisabled', $this->getSubmissionAnimationDisabled());
    }

    /**
     * Sets the defaultGradingScheme property value. The default grading scheme for assignments created in this class.
     * @param EducationGradingScheme|null $value Value to set for the defaultGradingScheme property.
    */
    public function setDefaultGradingScheme(?EducationGradingScheme $value): void {
        $this->defaultGradingScheme = $value;
    }

    /**
     * Sets the gradingCategories property value. When set, enables users to weight assignments differently when computing a class average grade.
     * @param array<EducationGradingCategory>|null $value Value to set for the gradingCategories property.
    */
    public function setGradingCategories(?array $value): void {
        $this->gradingCategories = $value;
    }

    /**
     * Sets the gradingSchemes property value. The grading schemes that can be attached to assignments created in this class.
     * @param array<EducationGradingScheme>|null $value Value to set for the gradingSchemes property.
    */
    public function setGradingSchemes(?array $value): void {
        $this->gradingSchemes = $value;
    }

    /**
     * Sets the submissionAnimationDisabled property value. Indicates whether to show the turn-in celebration animation. If true, indicates to skip the animation. The default value is false.
     * @param bool|null $value Value to set for the submissionAnimationDisabled property.
    */
    public function setSubmissionAnimationDisabled(?bool $value): void {
        $this->submissionAnimationDisabled = $value;
    }

}
