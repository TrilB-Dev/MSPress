<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageResourceRequest extends Entity implements Parsable 
{
    /**
     * @var AccessPackageCatalog|null $catalog The catalog property
    */
    private ?AccessPackageCatalog $catalog = null;
    
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var AccessPackageRequestType|null $requestType The type of the request. Use adminAdd to add a resource, if the caller is an administrator or resource owner, adminUpdate to update a resource, or adminRemove to remove a resource.
    */
    private ?AccessPackageRequestType $requestType = null;
    
    /**
     * @var AccessPackageResource|null $resource The resource property
    */
    private ?AccessPackageResource $resource = null;
    
    /**
     * @var AccessPackageRequestState|null $state The outcome of whether the service was able to add the resource to the catalog. The value is delivered if the resource was added or removed, and deliveryFailed if it couldn't be added or removed. Read-only.
    */
    private ?AccessPackageRequestState $state = null;
    
    /**
     * Instantiates a new AccessPackageResourceRequest and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageResourceRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageResourceRequest {
        return new AccessPackageResourceRequest();
    }

    /**
     * Gets the catalog property value. The catalog property
     * @return AccessPackageCatalog|null
    */
    public function getCatalog(): ?AccessPackageCatalog {
        return $this->catalog;
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'catalog' => fn(ParseNode $n) => $o->setCatalog($n->getObjectValue([AccessPackageCatalog::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'requestType' => fn(ParseNode $n) => $o->setRequestType($n->getEnumValue(AccessPackageRequestType::class)),
            'resource' => fn(ParseNode $n) => $o->setResource($n->getObjectValue([AccessPackageResource::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(AccessPackageRequestState::class)),
        ]);
    }

    /**
     * Gets the requestType property value. The type of the request. Use adminAdd to add a resource, if the caller is an administrator or resource owner, adminUpdate to update a resource, or adminRemove to remove a resource.
     * @return AccessPackageRequestType|null
    */
    public function getRequestType(): ?AccessPackageRequestType {
        return $this->requestType;
    }

    /**
     * Gets the resource property value. The resource property
     * @return AccessPackageResource|null
    */
    public function getResource(): ?AccessPackageResource {
        return $this->resource;
    }

    /**
     * Gets the state property value. The outcome of whether the service was able to add the resource to the catalog. The value is delivered if the resource was added or removed, and deliveryFailed if it couldn't be added or removed. Read-only.
     * @return AccessPackageRequestState|null
    */
    public function getState(): ?AccessPackageRequestState {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('catalog', $this->getCatalog());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeEnumValue('requestType', $this->getRequestType());
        $writer->writeObjectValue('resource', $this->getResource());
        $writer->writeEnumValue('state', $this->getState());
    }

    /**
     * Sets the catalog property value. The catalog property
     * @param AccessPackageCatalog|null $value Value to set for the catalog property.
    */
    public function setCatalog(?AccessPackageCatalog $value): void {
        $this->catalog = $value;
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the requestType property value. The type of the request. Use adminAdd to add a resource, if the caller is an administrator or resource owner, adminUpdate to update a resource, or adminRemove to remove a resource.
     * @param AccessPackageRequestType|null $value Value to set for the requestType property.
    */
    public function setRequestType(?AccessPackageRequestType $value): void {
        $this->requestType = $value;
    }

    /**
     * Sets the resource property value. The resource property
     * @param AccessPackageResource|null $value Value to set for the resource property.
    */
    public function setResource(?AccessPackageResource $value): void {
        $this->resource = $value;
    }

    /**
     * Sets the state property value. The outcome of whether the service was able to add the resource to the catalog. The value is delivered if the resource was added or removed, and deliveryFailed if it couldn't be added or removed. Read-only.
     * @param AccessPackageRequestState|null $value Value to set for the state property.
    */
    public function setState(?AccessPackageRequestState $value): void {
        $this->state = $value;
    }

}
