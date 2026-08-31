<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageResource extends Entity implements Parsable 
{
    /**
     * @var array<AccessPackageResourceAttribute>|null $attributes Contains information about the attributes to be collected from the requestor and sent to the resource application.
    */
    private ?array $attributes = null;
    
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description A description for the resource.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the resource, such as the application name, group name or site name.
    */
    private ?string $displayName = null;
    
    /**
     * @var AccessPackageResourceEnvironment|null $environment Contains the environment information for the resource. This can be set using either the @odata.bind annotation or the environment's originId.Supports $expand.
    */
    private ?AccessPackageResourceEnvironment $environment = null;
    
    /**
     * @var ExternalOriginResourceConnector|null $externalOriginResourceConnector The connector that integrates with external origin systems to provision access to resources from those systems. Read-only. Nullable.
    */
    private ?ExternalOriginResourceConnector $externalOriginResourceConnector = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var string|null $originId The unique identifier of the resource in the origin system. For a Microsoft Entra group, this is the identifier of the group.
    */
    private ?string $originId = null;
    
    /**
     * @var string|null $originSystem The type of the resource in the origin system, such as SharePointOnline, AadApplication or AadGroup.
    */
    private ?string $originSystem = null;
    
    /**
     * @var array<AccessPackageResourceRole>|null $roles Read-only. Nullable. Supports $expand.
    */
    private ?array $roles = null;
    
    /**
     * @var array<AccessPackageResourceScope>|null $scopes Read-only. Nullable. Supports $expand.
    */
    private ?array $scopes = null;
    
    /**
     * @var array<CustomDataProvidedResourceUploadSession>|null $uploadSessions The upload sessions for uploading external access data to this resource through the Bring Your Own Data (BYOD) flow.
    */
    private ?array $uploadSessions = null;
    
    /**
     * Instantiates a new AccessPackageResource and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageResource
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageResource {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.customDataProvidedResource': return new CustomDataProvidedResource();
            }
        }
        return new AccessPackageResource();
    }

    /**
     * Gets the attributes property value. Contains information about the attributes to be collected from the requestor and sent to the resource application.
     * @return array<AccessPackageResourceAttribute>|null
    */
    public function getAttributes(): ?array {
        return $this->attributes;
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. A description for the resource.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the resource, such as the application name, group name or site name.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the environment property value. Contains the environment information for the resource. This can be set using either the @odata.bind annotation or the environment's originId.Supports $expand.
     * @return AccessPackageResourceEnvironment|null
    */
    public function getEnvironment(): ?AccessPackageResourceEnvironment {
        return $this->environment;
    }

    /**
     * Gets the externalOriginResourceConnector property value. The connector that integrates with external origin systems to provision access to resources from those systems. Read-only. Nullable.
     * @return ExternalOriginResourceConnector|null
    */
    public function getExternalOriginResourceConnector(): ?ExternalOriginResourceConnector {
        return $this->externalOriginResourceConnector;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'attributes' => fn(ParseNode $n) => $o->setAttributes($n->getCollectionOfObjectValues([AccessPackageResourceAttribute::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'environment' => fn(ParseNode $n) => $o->setEnvironment($n->getObjectValue([AccessPackageResourceEnvironment::class, 'createFromDiscriminatorValue'])),
            'externalOriginResourceConnector' => fn(ParseNode $n) => $o->setExternalOriginResourceConnector($n->getObjectValue([ExternalOriginResourceConnector::class, 'createFromDiscriminatorValue'])),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            'originId' => fn(ParseNode $n) => $o->setOriginId($n->getStringValue()),
            'originSystem' => fn(ParseNode $n) => $o->setOriginSystem($n->getStringValue()),
            'roles' => fn(ParseNode $n) => $o->setRoles($n->getCollectionOfObjectValues([AccessPackageResourceRole::class, 'createFromDiscriminatorValue'])),
            'scopes' => fn(ParseNode $n) => $o->setScopes($n->getCollectionOfObjectValues([AccessPackageResourceScope::class, 'createFromDiscriminatorValue'])),
            'uploadSessions' => fn(ParseNode $n) => $o->setUploadSessions($n->getCollectionOfObjectValues([CustomDataProvidedResourceUploadSession::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the originId property value. The unique identifier of the resource in the origin system. For a Microsoft Entra group, this is the identifier of the group.
     * @return string|null
    */
    public function getOriginId(): ?string {
        return $this->originId;
    }

    /**
     * Gets the originSystem property value. The type of the resource in the origin system, such as SharePointOnline, AadApplication or AadGroup.
     * @return string|null
    */
    public function getOriginSystem(): ?string {
        return $this->originSystem;
    }

    /**
     * Gets the roles property value. Read-only. Nullable. Supports $expand.
     * @return array<AccessPackageResourceRole>|null
    */
    public function getRoles(): ?array {
        return $this->roles;
    }

    /**
     * Gets the scopes property value. Read-only. Nullable. Supports $expand.
     * @return array<AccessPackageResourceScope>|null
    */
    public function getScopes(): ?array {
        return $this->scopes;
    }

    /**
     * Gets the uploadSessions property value. The upload sessions for uploading external access data to this resource through the Bring Your Own Data (BYOD) flow.
     * @return array<CustomDataProvidedResourceUploadSession>|null
    */
    public function getUploadSessions(): ?array {
        return $this->uploadSessions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('attributes', $this->getAttributes());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('environment', $this->getEnvironment());
        $writer->writeObjectValue('externalOriginResourceConnector', $this->getExternalOriginResourceConnector());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeStringValue('originId', $this->getOriginId());
        $writer->writeStringValue('originSystem', $this->getOriginSystem());
        $writer->writeCollectionOfObjectValues('roles', $this->getRoles());
        $writer->writeCollectionOfObjectValues('scopes', $this->getScopes());
        $writer->writeCollectionOfObjectValues('uploadSessions', $this->getUploadSessions());
    }

    /**
     * Sets the attributes property value. Contains information about the attributes to be collected from the requestor and sent to the resource application.
     * @param array<AccessPackageResourceAttribute>|null $value Value to set for the attributes property.
    */
    public function setAttributes(?array $value): void {
        $this->attributes = $value;
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. A description for the resource.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the resource, such as the application name, group name or site name.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the environment property value. Contains the environment information for the resource. This can be set using either the @odata.bind annotation or the environment's originId.Supports $expand.
     * @param AccessPackageResourceEnvironment|null $value Value to set for the environment property.
    */
    public function setEnvironment(?AccessPackageResourceEnvironment $value): void {
        $this->environment = $value;
    }

    /**
     * Sets the externalOriginResourceConnector property value. The connector that integrates with external origin systems to provision access to resources from those systems. Read-only. Nullable.
     * @param ExternalOriginResourceConnector|null $value Value to set for the externalOriginResourceConnector property.
    */
    public function setExternalOriginResourceConnector(?ExternalOriginResourceConnector $value): void {
        $this->externalOriginResourceConnector = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the originId property value. The unique identifier of the resource in the origin system. For a Microsoft Entra group, this is the identifier of the group.
     * @param string|null $value Value to set for the originId property.
    */
    public function setOriginId(?string $value): void {
        $this->originId = $value;
    }

    /**
     * Sets the originSystem property value. The type of the resource in the origin system, such as SharePointOnline, AadApplication or AadGroup.
     * @param string|null $value Value to set for the originSystem property.
    */
    public function setOriginSystem(?string $value): void {
        $this->originSystem = $value;
    }

    /**
     * Sets the roles property value. Read-only. Nullable. Supports $expand.
     * @param array<AccessPackageResourceRole>|null $value Value to set for the roles property.
    */
    public function setRoles(?array $value): void {
        $this->roles = $value;
    }

    /**
     * Sets the scopes property value. Read-only. Nullable. Supports $expand.
     * @param array<AccessPackageResourceScope>|null $value Value to set for the scopes property.
    */
    public function setScopes(?array $value): void {
        $this->scopes = $value;
    }

    /**
     * Sets the uploadSessions property value. The upload sessions for uploading external access data to this resource through the Bring Your Own Data (BYOD) flow.
     * @param array<CustomDataProvidedResourceUploadSession>|null $value Value to set for the uploadSessions property.
    */
    public function setUploadSessions(?array $value): void {
        $this->uploadSessions = $value;
    }

}
