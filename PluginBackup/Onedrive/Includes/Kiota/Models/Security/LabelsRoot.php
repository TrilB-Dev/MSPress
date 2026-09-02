<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Entity;

class LabelsRoot extends Entity implements Parsable 
{
    /**
     * @var array<AuthorityTemplate>|null $authorities Specifies the underlying authority that describes the type of content to be retained and its retention schedule.
    */
    private ?array $authorities = null;
    
    /**
     * @var array<CategoryTemplate>|null $categories Specifies a group of similar types of content in a particular department.
    */
    private ?array $categories = null;
    
    /**
     * @var array<CitationTemplate>|null $citations The specific rule or regulation created by a jurisdiction used to determine whether certain labels and content should be retained or deleted.
    */
    private ?array $citations = null;
    
    /**
     * @var array<DepartmentTemplate>|null $departments Specifies the department or business unit of an organization to which a label belongs.
    */
    private ?array $departments = null;
    
    /**
     * @var array<FilePlanReferenceTemplate>|null $filePlanReferences Specifies a unique alpha-numeric identifier for an organization’s retention schedule.
    */
    private ?array $filePlanReferences = null;
    
    /**
     * @var array<RetentionLabel>|null $retentionLabels Represents how customers can manage their data, whether and for how long to retain or delete it.
    */
    private ?array $retentionLabels = null;
    
    /**
     * Instantiates a new LabelsRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LabelsRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LabelsRoot {
        return new LabelsRoot();
    }

    /**
     * Gets the authorities property value. Specifies the underlying authority that describes the type of content to be retained and its retention schedule.
     * @return array<AuthorityTemplate>|null
    */
    public function getAuthorities(): ?array {
        return $this->authorities;
    }

    /**
     * Gets the categories property value. Specifies a group of similar types of content in a particular department.
     * @return array<CategoryTemplate>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the citations property value. The specific rule or regulation created by a jurisdiction used to determine whether certain labels and content should be retained or deleted.
     * @return array<CitationTemplate>|null
    */
    public function getCitations(): ?array {
        return $this->citations;
    }

    /**
     * Gets the departments property value. Specifies the department or business unit of an organization to which a label belongs.
     * @return array<DepartmentTemplate>|null
    */
    public function getDepartments(): ?array {
        return $this->departments;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'authorities' => fn(ParseNode $n) => $o->setAuthorities($n->getCollectionOfObjectValues([AuthorityTemplate::class, 'createFromDiscriminatorValue'])),
            'categories' => fn(ParseNode $n) => $o->setCategories($n->getCollectionOfObjectValues([CategoryTemplate::class, 'createFromDiscriminatorValue'])),
            'citations' => fn(ParseNode $n) => $o->setCitations($n->getCollectionOfObjectValues([CitationTemplate::class, 'createFromDiscriminatorValue'])),
            'departments' => fn(ParseNode $n) => $o->setDepartments($n->getCollectionOfObjectValues([DepartmentTemplate::class, 'createFromDiscriminatorValue'])),
            'filePlanReferences' => fn(ParseNode $n) => $o->setFilePlanReferences($n->getCollectionOfObjectValues([FilePlanReferenceTemplate::class, 'createFromDiscriminatorValue'])),
            'retentionLabels' => fn(ParseNode $n) => $o->setRetentionLabels($n->getCollectionOfObjectValues([RetentionLabel::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the filePlanReferences property value. Specifies a unique alpha-numeric identifier for an organization’s retention schedule.
     * @return array<FilePlanReferenceTemplate>|null
    */
    public function getFilePlanReferences(): ?array {
        return $this->filePlanReferences;
    }

    /**
     * Gets the retentionLabels property value. Represents how customers can manage their data, whether and for how long to retain or delete it.
     * @return array<RetentionLabel>|null
    */
    public function getRetentionLabels(): ?array {
        return $this->retentionLabels;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('authorities', $this->getAuthorities());
        $writer->writeCollectionOfObjectValues('categories', $this->getCategories());
        $writer->writeCollectionOfObjectValues('citations', $this->getCitations());
        $writer->writeCollectionOfObjectValues('departments', $this->getDepartments());
        $writer->writeCollectionOfObjectValues('filePlanReferences', $this->getFilePlanReferences());
        $writer->writeCollectionOfObjectValues('retentionLabels', $this->getRetentionLabels());
    }

    /**
     * Sets the authorities property value. Specifies the underlying authority that describes the type of content to be retained and its retention schedule.
     * @param array<AuthorityTemplate>|null $value Value to set for the authorities property.
    */
    public function setAuthorities(?array $value): void {
        $this->authorities = $value;
    }

    /**
     * Sets the categories property value. Specifies a group of similar types of content in a particular department.
     * @param array<CategoryTemplate>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the citations property value. The specific rule or regulation created by a jurisdiction used to determine whether certain labels and content should be retained or deleted.
     * @param array<CitationTemplate>|null $value Value to set for the citations property.
    */
    public function setCitations(?array $value): void {
        $this->citations = $value;
    }

    /**
     * Sets the departments property value. Specifies the department or business unit of an organization to which a label belongs.
     * @param array<DepartmentTemplate>|null $value Value to set for the departments property.
    */
    public function setDepartments(?array $value): void {
        $this->departments = $value;
    }

    /**
     * Sets the filePlanReferences property value. Specifies a unique alpha-numeric identifier for an organization’s retention schedule.
     * @param array<FilePlanReferenceTemplate>|null $value Value to set for the filePlanReferences property.
    */
    public function setFilePlanReferences(?array $value): void {
        $this->filePlanReferences = $value;
    }

    /**
     * Sets the retentionLabels property value. Represents how customers can manage their data, whether and for how long to retain or delete it.
     * @param array<RetentionLabel>|null $value Value to set for the retentionLabels property.
    */
    public function setRetentionLabels(?array $value): void {
        $this->retentionLabels = $value;
    }

}
