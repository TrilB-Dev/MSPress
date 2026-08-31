<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class FileStorageContainerType extends Entity implements Parsable 
{
    /**
     * @var FileStorageContainerBillingClassification|null $billingClassification The billingClassification property
    */
    private ?FileStorageContainerBillingClassification $billingClassification = null;
    
    /**
     * @var FileStorageContainerBillingStatus|null $billingStatus The billingStatus property
    */
    private ?FileStorageContainerBillingStatus $billingStatus = null;
    
    /**
     * @var DateTime|null $createdDateTime The creation date. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $etag Used in update scenarios for optimistic concurrency control. Read-only.
    */
    private ?string $etag = null;
    
    /**
     * @var DateTime|null $expirationDateTime The expiration date. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $expirationDateTime = null;
    
    /**
     * @var string|null $name The name of the fileStorageContainerType.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $owningAppId ID of the application that owns the fileStorageContainerType.
    */
    private ?string $owningAppId = null;
    
    /**
     * @var FileStorageContainerTypeSettings|null $settings The settings property
    */
    private ?FileStorageContainerTypeSettings $settings = null;
    
    /**
     * Instantiates a new FileStorageContainerType and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FileStorageContainerType
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FileStorageContainerType {
        return new FileStorageContainerType();
    }

    /**
     * Gets the billingClassification property value. The billingClassification property
     * @return FileStorageContainerBillingClassification|null
    */
    public function getBillingClassification(): ?FileStorageContainerBillingClassification {
        return $this->billingClassification;
    }

    /**
     * Gets the billingStatus property value. The billingStatus property
     * @return FileStorageContainerBillingStatus|null
    */
    public function getBillingStatus(): ?FileStorageContainerBillingStatus {
        return $this->billingStatus;
    }

    /**
     * Gets the createdDateTime property value. The creation date. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the etag property value. Used in update scenarios for optimistic concurrency control. Read-only.
     * @return string|null
    */
    public function getEtag(): ?string {
        return $this->etag;
    }

    /**
     * Gets the expirationDateTime property value. The expiration date. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getExpirationDateTime(): ?DateTime {
        return $this->expirationDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'billingClassification' => fn(ParseNode $n) => $o->setBillingClassification($n->getEnumValue(FileStorageContainerBillingClassification::class)),
            'billingStatus' => fn(ParseNode $n) => $o->setBillingStatus($n->getEnumValue(FileStorageContainerBillingStatus::class)),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'etag' => fn(ParseNode $n) => $o->setEtag($n->getStringValue()),
            'expirationDateTime' => fn(ParseNode $n) => $o->setExpirationDateTime($n->getDateTimeValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'owningAppId' => fn(ParseNode $n) => $o->setOwningAppId($n->getStringValue()),
            'settings' => fn(ParseNode $n) => $o->setSettings($n->getObjectValue([FileStorageContainerTypeSettings::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the name property value. The name of the fileStorageContainerType.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the owningAppId property value. ID of the application that owns the fileStorageContainerType.
     * @return string|null
    */
    public function getOwningAppId(): ?string {
        return $this->owningAppId;
    }

    /**
     * Gets the settings property value. The settings property
     * @return FileStorageContainerTypeSettings|null
    */
    public function getSettings(): ?FileStorageContainerTypeSettings {
        return $this->settings;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('billingClassification', $this->getBillingClassification());
        $writer->writeEnumValue('billingStatus', $this->getBillingStatus());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('etag', $this->getEtag());
        $writer->writeDateTimeValue('expirationDateTime', $this->getExpirationDateTime());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('owningAppId', $this->getOwningAppId());
        $writer->writeObjectValue('settings', $this->getSettings());
    }

    /**
     * Sets the billingClassification property value. The billingClassification property
     * @param FileStorageContainerBillingClassification|null $value Value to set for the billingClassification property.
    */
    public function setBillingClassification(?FileStorageContainerBillingClassification $value): void {
        $this->billingClassification = $value;
    }

    /**
     * Sets the billingStatus property value. The billingStatus property
     * @param FileStorageContainerBillingStatus|null $value Value to set for the billingStatus property.
    */
    public function setBillingStatus(?FileStorageContainerBillingStatus $value): void {
        $this->billingStatus = $value;
    }

    /**
     * Sets the createdDateTime property value. The creation date. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the etag property value. Used in update scenarios for optimistic concurrency control. Read-only.
     * @param string|null $value Value to set for the etag property.
    */
    public function setEtag(?string $value): void {
        $this->etag = $value;
    }

    /**
     * Sets the expirationDateTime property value. The expiration date. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the expirationDateTime property.
    */
    public function setExpirationDateTime(?DateTime $value): void {
        $this->expirationDateTime = $value;
    }

    /**
     * Sets the name property value. The name of the fileStorageContainerType.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the owningAppId property value. ID of the application that owns the fileStorageContainerType.
     * @param string|null $value Value to set for the owningAppId property.
    */
    public function setOwningAppId(?string $value): void {
        $this->owningAppId = $value;
    }

    /**
     * Sets the settings property value. The settings property
     * @param FileStorageContainerTypeSettings|null $value Value to set for the settings property.
    */
    public function setSettings(?FileStorageContainerTypeSettings $value): void {
        $this->settings = $value;
    }

}
