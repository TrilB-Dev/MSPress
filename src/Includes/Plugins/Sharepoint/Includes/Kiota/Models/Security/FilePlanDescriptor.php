<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class FilePlanDescriptor extends Entity implements Parsable 
{
    /**
     * @var FilePlanAuthority|null $authority Represents the file plan descriptor of type authority applied to a particular retention label.
    */
    private ?FilePlanAuthority $authority = null;
    
    /**
     * @var AuthorityTemplate|null $authorityTemplate Specifies the underlying authority that describes the type of content to be retained and its retention schedule.
    */
    private ?AuthorityTemplate $authorityTemplate = null;
    
    /**
     * @var FilePlanAppliedCategory|null $category The category property
    */
    private ?FilePlanAppliedCategory $category = null;
    
    /**
     * @var CategoryTemplate|null $categoryTemplate Specifies a group of similar types of content in a particular department.
    */
    private ?CategoryTemplate $categoryTemplate = null;
    
    /**
     * @var FilePlanCitation|null $citation Represents the file plan descriptor of type citation applied to a particular retention label.
    */
    private ?FilePlanCitation $citation = null;
    
    /**
     * @var CitationTemplate|null $citationTemplate The specific rule or regulation created by a jurisdiction used to determine whether certain labels and content should be retained or deleted.
    */
    private ?CitationTemplate $citationTemplate = null;
    
    /**
     * @var FilePlanDepartment|null $department Represents the file plan descriptor of type department applied to a particular retention label.
    */
    private ?FilePlanDepartment $department = null;
    
    /**
     * @var DepartmentTemplate|null $departmentTemplate Specifies the  department or business unit of an organization to which a label belongs.
    */
    private ?DepartmentTemplate $departmentTemplate = null;
    
    /**
     * @var FilePlanReference|null $filePlanReference Represents the file plan descriptor of type filePlanReference applied to a particular retention label.
    */
    private ?FilePlanReference $filePlanReference = null;
    
    /**
     * @var FilePlanReferenceTemplate|null $filePlanReferenceTemplate Specifies a unique alpha-numeric identifier for an organization’s retention schedule.
    */
    private ?FilePlanReferenceTemplate $filePlanReferenceTemplate = null;
    
    /**
     * Instantiates a new FilePlanDescriptor and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FilePlanDescriptor
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FilePlanDescriptor {
        return new FilePlanDescriptor();
    }

    /**
     * Gets the authority property value. Represents the file plan descriptor of type authority applied to a particular retention label.
     * @return FilePlanAuthority|null
    */
    public function getAuthority(): ?FilePlanAuthority {
        return $this->authority;
    }

    /**
     * Gets the authorityTemplate property value. Specifies the underlying authority that describes the type of content to be retained and its retention schedule.
     * @return AuthorityTemplate|null
    */
    public function getAuthorityTemplate(): ?AuthorityTemplate {
        return $this->authorityTemplate;
    }

    /**
     * Gets the category property value. The category property
     * @return FilePlanAppliedCategory|null
    */
    public function getCategory(): ?FilePlanAppliedCategory {
        return $this->category;
    }

    /**
     * Gets the categoryTemplate property value. Specifies a group of similar types of content in a particular department.
     * @return CategoryTemplate|null
    */
    public function getCategoryTemplate(): ?CategoryTemplate {
        return $this->categoryTemplate;
    }

    /**
     * Gets the citation property value. Represents the file plan descriptor of type citation applied to a particular retention label.
     * @return FilePlanCitation|null
    */
    public function getCitation(): ?FilePlanCitation {
        return $this->citation;
    }

    /**
     * Gets the citationTemplate property value. The specific rule or regulation created by a jurisdiction used to determine whether certain labels and content should be retained or deleted.
     * @return CitationTemplate|null
    */
    public function getCitationTemplate(): ?CitationTemplate {
        return $this->citationTemplate;
    }

    /**
     * Gets the department property value. Represents the file plan descriptor of type department applied to a particular retention label.
     * @return FilePlanDepartment|null
    */
    public function getDepartment(): ?FilePlanDepartment {
        return $this->department;
    }

    /**
     * Gets the departmentTemplate property value. Specifies the  department or business unit of an organization to which a label belongs.
     * @return DepartmentTemplate|null
    */
    public function getDepartmentTemplate(): ?DepartmentTemplate {
        return $this->departmentTemplate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'authority' => fn(ParseNode $n) => $o->setAuthority($n->getObjectValue([FilePlanAuthority::class, 'createFromDiscriminatorValue'])),
            'authorityTemplate' => fn(ParseNode $n) => $o->setAuthorityTemplate($n->getObjectValue([AuthorityTemplate::class, 'createFromDiscriminatorValue'])),
            'category' => fn(ParseNode $n) => $o->setCategory($n->getObjectValue([FilePlanAppliedCategory::class, 'createFromDiscriminatorValue'])),
            'categoryTemplate' => fn(ParseNode $n) => $o->setCategoryTemplate($n->getObjectValue([CategoryTemplate::class, 'createFromDiscriminatorValue'])),
            'citation' => fn(ParseNode $n) => $o->setCitation($n->getObjectValue([FilePlanCitation::class, 'createFromDiscriminatorValue'])),
            'citationTemplate' => fn(ParseNode $n) => $o->setCitationTemplate($n->getObjectValue([CitationTemplate::class, 'createFromDiscriminatorValue'])),
            'department' => fn(ParseNode $n) => $o->setDepartment($n->getObjectValue([FilePlanDepartment::class, 'createFromDiscriminatorValue'])),
            'departmentTemplate' => fn(ParseNode $n) => $o->setDepartmentTemplate($n->getObjectValue([DepartmentTemplate::class, 'createFromDiscriminatorValue'])),
            'filePlanReference' => fn(ParseNode $n) => $o->setFilePlanReference($n->getObjectValue([FilePlanReference::class, 'createFromDiscriminatorValue'])),
            'filePlanReferenceTemplate' => fn(ParseNode $n) => $o->setFilePlanReferenceTemplate($n->getObjectValue([FilePlanReferenceTemplate::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the filePlanReference property value. Represents the file plan descriptor of type filePlanReference applied to a particular retention label.
     * @return FilePlanReference|null
    */
    public function getFilePlanReference(): ?FilePlanReference {
        return $this->filePlanReference;
    }

    /**
     * Gets the filePlanReferenceTemplate property value. Specifies a unique alpha-numeric identifier for an organization’s retention schedule.
     * @return FilePlanReferenceTemplate|null
    */
    public function getFilePlanReferenceTemplate(): ?FilePlanReferenceTemplate {
        return $this->filePlanReferenceTemplate;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('authority', $this->getAuthority());
        $writer->writeObjectValue('authorityTemplate', $this->getAuthorityTemplate());
        $writer->writeObjectValue('category', $this->getCategory());
        $writer->writeObjectValue('categoryTemplate', $this->getCategoryTemplate());
        $writer->writeObjectValue('citation', $this->getCitation());
        $writer->writeObjectValue('citationTemplate', $this->getCitationTemplate());
        $writer->writeObjectValue('department', $this->getDepartment());
        $writer->writeObjectValue('departmentTemplate', $this->getDepartmentTemplate());
        $writer->writeObjectValue('filePlanReference', $this->getFilePlanReference());
        $writer->writeObjectValue('filePlanReferenceTemplate', $this->getFilePlanReferenceTemplate());
    }

    /**
     * Sets the authority property value. Represents the file plan descriptor of type authority applied to a particular retention label.
     * @param FilePlanAuthority|null $value Value to set for the authority property.
    */
    public function setAuthority(?FilePlanAuthority $value): void {
        $this->authority = $value;
    }

    /**
     * Sets the authorityTemplate property value. Specifies the underlying authority that describes the type of content to be retained and its retention schedule.
     * @param AuthorityTemplate|null $value Value to set for the authorityTemplate property.
    */
    public function setAuthorityTemplate(?AuthorityTemplate $value): void {
        $this->authorityTemplate = $value;
    }

    /**
     * Sets the category property value. The category property
     * @param FilePlanAppliedCategory|null $value Value to set for the category property.
    */
    public function setCategory(?FilePlanAppliedCategory $value): void {
        $this->category = $value;
    }

    /**
     * Sets the categoryTemplate property value. Specifies a group of similar types of content in a particular department.
     * @param CategoryTemplate|null $value Value to set for the categoryTemplate property.
    */
    public function setCategoryTemplate(?CategoryTemplate $value): void {
        $this->categoryTemplate = $value;
    }

    /**
     * Sets the citation property value. Represents the file plan descriptor of type citation applied to a particular retention label.
     * @param FilePlanCitation|null $value Value to set for the citation property.
    */
    public function setCitation(?FilePlanCitation $value): void {
        $this->citation = $value;
    }

    /**
     * Sets the citationTemplate property value. The specific rule or regulation created by a jurisdiction used to determine whether certain labels and content should be retained or deleted.
     * @param CitationTemplate|null $value Value to set for the citationTemplate property.
    */
    public function setCitationTemplate(?CitationTemplate $value): void {
        $this->citationTemplate = $value;
    }

    /**
     * Sets the department property value. Represents the file plan descriptor of type department applied to a particular retention label.
     * @param FilePlanDepartment|null $value Value to set for the department property.
    */
    public function setDepartment(?FilePlanDepartment $value): void {
        $this->department = $value;
    }

    /**
     * Sets the departmentTemplate property value. Specifies the  department or business unit of an organization to which a label belongs.
     * @param DepartmentTemplate|null $value Value to set for the departmentTemplate property.
    */
    public function setDepartmentTemplate(?DepartmentTemplate $value): void {
        $this->departmentTemplate = $value;
    }

    /**
     * Sets the filePlanReference property value. Represents the file plan descriptor of type filePlanReference applied to a particular retention label.
     * @param FilePlanReference|null $value Value to set for the filePlanReference property.
    */
    public function setFilePlanReference(?FilePlanReference $value): void {
        $this->filePlanReference = $value;
    }

    /**
     * Sets the filePlanReferenceTemplate property value. Specifies a unique alpha-numeric identifier for an organization’s retention schedule.
     * @param FilePlanReferenceTemplate|null $value Value to set for the filePlanReferenceTemplate property.
    */
    public function setFilePlanReferenceTemplate(?FilePlanReferenceTemplate $value): void {
        $this->filePlanReferenceTemplate = $value;
    }

}
