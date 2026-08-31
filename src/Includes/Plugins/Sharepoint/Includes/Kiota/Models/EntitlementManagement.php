<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EntitlementManagement extends Entity implements Parsable 
{
    /**
     * @var array<Approval>|null $accessPackageAssignmentApprovals Approval stages for decisions associated with access package assignment requests.
    */
    private ?array $accessPackageAssignmentApprovals = null;
    
    /**
     * @var array<AccessPackage>|null $accessPackages Access packages define the collection of resource roles and the policies for which subjects can request or be assigned access to those resources.
    */
    private ?array $accessPackages = null;
    
    /**
     * @var array<AccessPackageSuggestion>|null $accessPackageSuggestions Suggested access packages for end users based on various criteria such as related people insights and assignment history.
    */
    private ?array $accessPackageSuggestions = null;
    
    /**
     * @var array<AccessPackageAssignmentPolicy>|null $assignmentPolicies Access package assignment policies govern which subjects can request or be assigned an access package via an access package assignment.
    */
    private ?array $assignmentPolicies = null;
    
    /**
     * @var array<AccessPackageAssignmentRequest>|null $assignmentRequests Access package assignment requests created by or on behalf of a subject.
    */
    private ?array $assignmentRequests = null;
    
    /**
     * @var array<AccessPackageAssignment>|null $assignments The assignment of an access package to a subject for a period of time.
    */
    private ?array $assignments = null;
    
    /**
     * @var array<AvailableAccessPackage>|null $availableAccessPackages Access packages available for end users to browse and request.
    */
    private ?array $availableAccessPackages = null;
    
    /**
     * @var array<AccessPackageCatalog>|null $catalogs A container for access packages.
    */
    private ?array $catalogs = null;
    
    /**
     * @var array<ConnectedOrganization>|null $connectedOrganizations References to a directory or domain of another organization whose users can request access.
    */
    private ?array $connectedOrganizations = null;
    
    /**
     * @var array<ControlConfiguration>|null $controlConfigurations Configuration settings that control the lifecycle and access policies of entitlement management within a tenant.
    */
    private ?array $controlConfigurations = null;
    
    /**
     * @var array<ExternalOriginResourceConnector>|null $externalOriginResourceConnectors Represents the connectors used to communicate with external resource systems.
    */
    private ?array $externalOriginResourceConnectors = null;
    
    /**
     * @var array<AccessPackageResourceEnvironment>|null $resourceEnvironments A reference to the geolocation environments in which a resource is located.
    */
    private ?array $resourceEnvironments = null;
    
    /**
     * @var array<AccessPackageResourceRequest>|null $resourceRequests Represents a request to add or remove a resource to or from a catalog respectively.
    */
    private ?array $resourceRequests = null;
    
    /**
     * @var array<AccessPackageResourceRoleScope>|null $resourceRoleScopes The resourceRoleScopes property
    */
    private ?array $resourceRoleScopes = null;
    
    /**
     * @var array<AccessPackageResource>|null $resources The resources associated with the catalogs.
    */
    private ?array $resources = null;
    
    /**
     * @var EntitlementManagementSettings|null $settings The settings that control the behavior of Microsoft Entra entitlement management.
    */
    private ?EntitlementManagementSettings $settings = null;
    
    /**
     * @var array<AccessPackageSubject>|null $subjects The subjects property
    */
    private ?array $subjects = null;
    
    /**
     * Instantiates a new EntitlementManagement and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EntitlementManagement
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EntitlementManagement {
        return new EntitlementManagement();
    }

    /**
     * Gets the accessPackageAssignmentApprovals property value. Approval stages for decisions associated with access package assignment requests.
     * @return array<Approval>|null
    */
    public function getAccessPackageAssignmentApprovals(): ?array {
        return $this->accessPackageAssignmentApprovals;
    }

    /**
     * Gets the accessPackages property value. Access packages define the collection of resource roles and the policies for which subjects can request or be assigned access to those resources.
     * @return array<AccessPackage>|null
    */
    public function getAccessPackages(): ?array {
        return $this->accessPackages;
    }

    /**
     * Gets the accessPackageSuggestions property value. Suggested access packages for end users based on various criteria such as related people insights and assignment history.
     * @return array<AccessPackageSuggestion>|null
    */
    public function getAccessPackageSuggestions(): ?array {
        return $this->accessPackageSuggestions;
    }

    /**
     * Gets the assignmentPolicies property value. Access package assignment policies govern which subjects can request or be assigned an access package via an access package assignment.
     * @return array<AccessPackageAssignmentPolicy>|null
    */
    public function getAssignmentPolicies(): ?array {
        return $this->assignmentPolicies;
    }

    /**
     * Gets the assignmentRequests property value. Access package assignment requests created by or on behalf of a subject.
     * @return array<AccessPackageAssignmentRequest>|null
    */
    public function getAssignmentRequests(): ?array {
        return $this->assignmentRequests;
    }

    /**
     * Gets the assignments property value. The assignment of an access package to a subject for a period of time.
     * @return array<AccessPackageAssignment>|null
    */
    public function getAssignments(): ?array {
        return $this->assignments;
    }

    /**
     * Gets the availableAccessPackages property value. Access packages available for end users to browse and request.
     * @return array<AvailableAccessPackage>|null
    */
    public function getAvailableAccessPackages(): ?array {
        return $this->availableAccessPackages;
    }

    /**
     * Gets the catalogs property value. A container for access packages.
     * @return array<AccessPackageCatalog>|null
    */
    public function getCatalogs(): ?array {
        return $this->catalogs;
    }

    /**
     * Gets the connectedOrganizations property value. References to a directory or domain of another organization whose users can request access.
     * @return array<ConnectedOrganization>|null
    */
    public function getConnectedOrganizations(): ?array {
        return $this->connectedOrganizations;
    }

    /**
     * Gets the controlConfigurations property value. Configuration settings that control the lifecycle and access policies of entitlement management within a tenant.
     * @return array<ControlConfiguration>|null
    */
    public function getControlConfigurations(): ?array {
        return $this->controlConfigurations;
    }

    /**
     * Gets the externalOriginResourceConnectors property value. Represents the connectors used to communicate with external resource systems.
     * @return array<ExternalOriginResourceConnector>|null
    */
    public function getExternalOriginResourceConnectors(): ?array {
        return $this->externalOriginResourceConnectors;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'accessPackageAssignmentApprovals' => fn(ParseNode $n) => $o->setAccessPackageAssignmentApprovals($n->getCollectionOfObjectValues([Approval::class, 'createFromDiscriminatorValue'])),
            'accessPackages' => fn(ParseNode $n) => $o->setAccessPackages($n->getCollectionOfObjectValues([AccessPackage::class, 'createFromDiscriminatorValue'])),
            'accessPackageSuggestions' => fn(ParseNode $n) => $o->setAccessPackageSuggestions($n->getCollectionOfObjectValues([AccessPackageSuggestion::class, 'createFromDiscriminatorValue'])),
            'assignmentPolicies' => fn(ParseNode $n) => $o->setAssignmentPolicies($n->getCollectionOfObjectValues([AccessPackageAssignmentPolicy::class, 'createFromDiscriminatorValue'])),
            'assignmentRequests' => fn(ParseNode $n) => $o->setAssignmentRequests($n->getCollectionOfObjectValues([AccessPackageAssignmentRequest::class, 'createFromDiscriminatorValue'])),
            'assignments' => fn(ParseNode $n) => $o->setAssignments($n->getCollectionOfObjectValues([AccessPackageAssignment::class, 'createFromDiscriminatorValue'])),
            'availableAccessPackages' => fn(ParseNode $n) => $o->setAvailableAccessPackages($n->getCollectionOfObjectValues([AvailableAccessPackage::class, 'createFromDiscriminatorValue'])),
            'catalogs' => fn(ParseNode $n) => $o->setCatalogs($n->getCollectionOfObjectValues([AccessPackageCatalog::class, 'createFromDiscriminatorValue'])),
            'connectedOrganizations' => fn(ParseNode $n) => $o->setConnectedOrganizations($n->getCollectionOfObjectValues([ConnectedOrganization::class, 'createFromDiscriminatorValue'])),
            'controlConfigurations' => fn(ParseNode $n) => $o->setControlConfigurations($n->getCollectionOfObjectValues([ControlConfiguration::class, 'createFromDiscriminatorValue'])),
            'externalOriginResourceConnectors' => fn(ParseNode $n) => $o->setExternalOriginResourceConnectors($n->getCollectionOfObjectValues([ExternalOriginResourceConnector::class, 'createFromDiscriminatorValue'])),
            'resourceEnvironments' => fn(ParseNode $n) => $o->setResourceEnvironments($n->getCollectionOfObjectValues([AccessPackageResourceEnvironment::class, 'createFromDiscriminatorValue'])),
            'resourceRequests' => fn(ParseNode $n) => $o->setResourceRequests($n->getCollectionOfObjectValues([AccessPackageResourceRequest::class, 'createFromDiscriminatorValue'])),
            'resourceRoleScopes' => fn(ParseNode $n) => $o->setResourceRoleScopes($n->getCollectionOfObjectValues([AccessPackageResourceRoleScope::class, 'createFromDiscriminatorValue'])),
            'resources' => fn(ParseNode $n) => $o->setResources($n->getCollectionOfObjectValues([AccessPackageResource::class, 'createFromDiscriminatorValue'])),
            'settings' => fn(ParseNode $n) => $o->setSettings($n->getObjectValue([EntitlementManagementSettings::class, 'createFromDiscriminatorValue'])),
            'subjects' => fn(ParseNode $n) => $o->setSubjects($n->getCollectionOfObjectValues([AccessPackageSubject::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the resourceEnvironments property value. A reference to the geolocation environments in which a resource is located.
     * @return array<AccessPackageResourceEnvironment>|null
    */
    public function getResourceEnvironments(): ?array {
        return $this->resourceEnvironments;
    }

    /**
     * Gets the resourceRequests property value. Represents a request to add or remove a resource to or from a catalog respectively.
     * @return array<AccessPackageResourceRequest>|null
    */
    public function getResourceRequests(): ?array {
        return $this->resourceRequests;
    }

    /**
     * Gets the resourceRoleScopes property value. The resourceRoleScopes property
     * @return array<AccessPackageResourceRoleScope>|null
    */
    public function getResourceRoleScopes(): ?array {
        return $this->resourceRoleScopes;
    }

    /**
     * Gets the resources property value. The resources associated with the catalogs.
     * @return array<AccessPackageResource>|null
    */
    public function getResources(): ?array {
        return $this->resources;
    }

    /**
     * Gets the settings property value. The settings that control the behavior of Microsoft Entra entitlement management.
     * @return EntitlementManagementSettings|null
    */
    public function getSettings(): ?EntitlementManagementSettings {
        return $this->settings;
    }

    /**
     * Gets the subjects property value. The subjects property
     * @return array<AccessPackageSubject>|null
    */
    public function getSubjects(): ?array {
        return $this->subjects;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('accessPackageAssignmentApprovals', $this->getAccessPackageAssignmentApprovals());
        $writer->writeCollectionOfObjectValues('accessPackages', $this->getAccessPackages());
        $writer->writeCollectionOfObjectValues('accessPackageSuggestions', $this->getAccessPackageSuggestions());
        $writer->writeCollectionOfObjectValues('assignmentPolicies', $this->getAssignmentPolicies());
        $writer->writeCollectionOfObjectValues('assignmentRequests', $this->getAssignmentRequests());
        $writer->writeCollectionOfObjectValues('assignments', $this->getAssignments());
        $writer->writeCollectionOfObjectValues('availableAccessPackages', $this->getAvailableAccessPackages());
        $writer->writeCollectionOfObjectValues('catalogs', $this->getCatalogs());
        $writer->writeCollectionOfObjectValues('connectedOrganizations', $this->getConnectedOrganizations());
        $writer->writeCollectionOfObjectValues('controlConfigurations', $this->getControlConfigurations());
        $writer->writeCollectionOfObjectValues('externalOriginResourceConnectors', $this->getExternalOriginResourceConnectors());
        $writer->writeCollectionOfObjectValues('resourceEnvironments', $this->getResourceEnvironments());
        $writer->writeCollectionOfObjectValues('resourceRequests', $this->getResourceRequests());
        $writer->writeCollectionOfObjectValues('resourceRoleScopes', $this->getResourceRoleScopes());
        $writer->writeCollectionOfObjectValues('resources', $this->getResources());
        $writer->writeObjectValue('settings', $this->getSettings());
        $writer->writeCollectionOfObjectValues('subjects', $this->getSubjects());
    }

    /**
     * Sets the accessPackageAssignmentApprovals property value. Approval stages for decisions associated with access package assignment requests.
     * @param array<Approval>|null $value Value to set for the accessPackageAssignmentApprovals property.
    */
    public function setAccessPackageAssignmentApprovals(?array $value): void {
        $this->accessPackageAssignmentApprovals = $value;
    }

    /**
     * Sets the accessPackages property value. Access packages define the collection of resource roles and the policies for which subjects can request or be assigned access to those resources.
     * @param array<AccessPackage>|null $value Value to set for the accessPackages property.
    */
    public function setAccessPackages(?array $value): void {
        $this->accessPackages = $value;
    }

    /**
     * Sets the accessPackageSuggestions property value. Suggested access packages for end users based on various criteria such as related people insights and assignment history.
     * @param array<AccessPackageSuggestion>|null $value Value to set for the accessPackageSuggestions property.
    */
    public function setAccessPackageSuggestions(?array $value): void {
        $this->accessPackageSuggestions = $value;
    }

    /**
     * Sets the assignmentPolicies property value. Access package assignment policies govern which subjects can request or be assigned an access package via an access package assignment.
     * @param array<AccessPackageAssignmentPolicy>|null $value Value to set for the assignmentPolicies property.
    */
    public function setAssignmentPolicies(?array $value): void {
        $this->assignmentPolicies = $value;
    }

    /**
     * Sets the assignmentRequests property value. Access package assignment requests created by or on behalf of a subject.
     * @param array<AccessPackageAssignmentRequest>|null $value Value to set for the assignmentRequests property.
    */
    public function setAssignmentRequests(?array $value): void {
        $this->assignmentRequests = $value;
    }

    /**
     * Sets the assignments property value. The assignment of an access package to a subject for a period of time.
     * @param array<AccessPackageAssignment>|null $value Value to set for the assignments property.
    */
    public function setAssignments(?array $value): void {
        $this->assignments = $value;
    }

    /**
     * Sets the availableAccessPackages property value. Access packages available for end users to browse and request.
     * @param array<AvailableAccessPackage>|null $value Value to set for the availableAccessPackages property.
    */
    public function setAvailableAccessPackages(?array $value): void {
        $this->availableAccessPackages = $value;
    }

    /**
     * Sets the catalogs property value. A container for access packages.
     * @param array<AccessPackageCatalog>|null $value Value to set for the catalogs property.
    */
    public function setCatalogs(?array $value): void {
        $this->catalogs = $value;
    }

    /**
     * Sets the connectedOrganizations property value. References to a directory or domain of another organization whose users can request access.
     * @param array<ConnectedOrganization>|null $value Value to set for the connectedOrganizations property.
    */
    public function setConnectedOrganizations(?array $value): void {
        $this->connectedOrganizations = $value;
    }

    /**
     * Sets the controlConfigurations property value. Configuration settings that control the lifecycle and access policies of entitlement management within a tenant.
     * @param array<ControlConfiguration>|null $value Value to set for the controlConfigurations property.
    */
    public function setControlConfigurations(?array $value): void {
        $this->controlConfigurations = $value;
    }

    /**
     * Sets the externalOriginResourceConnectors property value. Represents the connectors used to communicate with external resource systems.
     * @param array<ExternalOriginResourceConnector>|null $value Value to set for the externalOriginResourceConnectors property.
    */
    public function setExternalOriginResourceConnectors(?array $value): void {
        $this->externalOriginResourceConnectors = $value;
    }

    /**
     * Sets the resourceEnvironments property value. A reference to the geolocation environments in which a resource is located.
     * @param array<AccessPackageResourceEnvironment>|null $value Value to set for the resourceEnvironments property.
    */
    public function setResourceEnvironments(?array $value): void {
        $this->resourceEnvironments = $value;
    }

    /**
     * Sets the resourceRequests property value. Represents a request to add or remove a resource to or from a catalog respectively.
     * @param array<AccessPackageResourceRequest>|null $value Value to set for the resourceRequests property.
    */
    public function setResourceRequests(?array $value): void {
        $this->resourceRequests = $value;
    }

    /**
     * Sets the resourceRoleScopes property value. The resourceRoleScopes property
     * @param array<AccessPackageResourceRoleScope>|null $value Value to set for the resourceRoleScopes property.
    */
    public function setResourceRoleScopes(?array $value): void {
        $this->resourceRoleScopes = $value;
    }

    /**
     * Sets the resources property value. The resources associated with the catalogs.
     * @param array<AccessPackageResource>|null $value Value to set for the resources property.
    */
    public function setResources(?array $value): void {
        $this->resources = $value;
    }

    /**
     * Sets the settings property value. The settings that control the behavior of Microsoft Entra entitlement management.
     * @param EntitlementManagementSettings|null $value Value to set for the settings property.
    */
    public function setSettings(?EntitlementManagementSettings $value): void {
        $this->settings = $value;
    }

    /**
     * Sets the subjects property value. The subjects property
     * @param array<AccessPackageSubject>|null $value Value to set for the subjects property.
    */
    public function setSubjects(?array $value): void {
        $this->subjects = $value;
    }

}
