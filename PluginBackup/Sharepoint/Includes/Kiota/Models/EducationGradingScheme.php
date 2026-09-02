<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EducationGradingScheme extends Entity implements Parsable 
{
    /**
     * @var string|null $displayName The name of the grading scheme.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<EducationGradingSchemeGrade>|null $grades The grades that make up the scheme.
    */
    private ?array $grades = null;
    
    /**
     * @var bool|null $hidePointsDuringGrading The display setting for the UI. Indicates whether teachers can grade with points in addition to letter grades.
    */
    private ?bool $hidePointsDuringGrading = null;
    
    /**
     * Instantiates a new EducationGradingScheme and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EducationGradingScheme
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EducationGradingScheme {
        return new EducationGradingScheme();
    }

    /**
     * Gets the displayName property value. The name of the grading scheme.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'grades' => fn(ParseNode $n) => $o->setGrades($n->getCollectionOfObjectValues([EducationGradingSchemeGrade::class, 'createFromDiscriminatorValue'])),
            'hidePointsDuringGrading' => fn(ParseNode $n) => $o->setHidePointsDuringGrading($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the grades property value. The grades that make up the scheme.
     * @return array<EducationGradingSchemeGrade>|null
    */
    public function getGrades(): ?array {
        return $this->grades;
    }

    /**
     * Gets the hidePointsDuringGrading property value. The display setting for the UI. Indicates whether teachers can grade with points in addition to letter grades.
     * @return bool|null
    */
    public function getHidePointsDuringGrading(): ?bool {
        return $this->hidePointsDuringGrading;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('grades', $this->getGrades());
        $writer->writeBooleanValue('hidePointsDuringGrading', $this->getHidePointsDuringGrading());
    }

    /**
     * Sets the displayName property value. The name of the grading scheme.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the grades property value. The grades that make up the scheme.
     * @param array<EducationGradingSchemeGrade>|null $value Value to set for the grades property.
    */
    public function setGrades(?array $value): void {
        $this->grades = $value;
    }

    /**
     * Sets the hidePointsDuringGrading property value. The display setting for the UI. Indicates whether teachers can grade with points in addition to letter grades.
     * @param bool|null $value Value to set for the hidePointsDuringGrading property.
    */
    public function setHidePointsDuringGrading(?bool $value): void {
        $this->hidePointsDuringGrading = $value;
    }

}
