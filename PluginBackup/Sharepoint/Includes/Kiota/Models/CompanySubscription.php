<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CompanySubscription extends Entity implements Parsable 
{
    /**
     * @var string|null $commerceSubscriptionId The ID of this subscription in the commerce system. Alternate key.
    */
    private ?string $commerceSubscriptionId = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when this subscription was created. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var bool|null $isTrial Whether the subscription is a free trial or purchased.
    */
    private ?bool $isTrial = null;
    
    /**
     * @var DateTime|null $nextLifecycleDateTime The date and time when the subscription will move to the next state (as defined by the status property) if not renewed by the tenant. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $nextLifecycleDateTime = null;
    
    /**
     * @var string|null $ownerId The object ID of the account admin.
    */
    private ?string $ownerId = null;
    
    /**
     * @var string|null $ownerTenantId The unique identifier for the Microsoft partner tenant that created the subscription on a customer tenant.
    */
    private ?string $ownerTenantId = null;
    
    /**
     * @var string|null $ownerType Indicates the entity that ownerId belongs to, for example, 'User'.
    */
    private ?string $ownerType = null;
    
    /**
     * @var array<ServicePlanInfo>|null $serviceStatus The provisioning status of each service included in this subscription.
    */
    private ?array $serviceStatus = null;
    
    /**
     * @var string|null $skuId The object ID of the SKU associated with this subscription.
    */
    private ?string $skuId = null;
    
    /**
     * @var string|null $skuPartNumber The SKU associated with this subscription.
    */
    private ?string $skuPartNumber = null;
    
    /**
     * @var string|null $status The status of this subscription. The possible values are: Enabled, Deleted, Suspended, Warning, LockedOut.
    */
    private ?string $status = null;
    
    /**
     * @var int|null $totalLicenses The number of licenses included in this subscription.
    */
    private ?int $totalLicenses = null;
    
    /**
     * Instantiates a new CompanySubscription and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CompanySubscription
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CompanySubscription {
        return new CompanySubscription();
    }

    /**
     * Gets the commerceSubscriptionId property value. The ID of this subscription in the commerce system. Alternate key.
     * @return string|null
    */
    public function getCommerceSubscriptionId(): ?string {
        return $this->commerceSubscriptionId;
    }

    /**
     * Gets the createdDateTime property value. The date and time when this subscription was created. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
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
            'commerceSubscriptionId' => fn(ParseNode $n) => $o->setCommerceSubscriptionId($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'isTrial' => fn(ParseNode $n) => $o->setIsTrial($n->getBooleanValue()),
            'nextLifecycleDateTime' => fn(ParseNode $n) => $o->setNextLifecycleDateTime($n->getDateTimeValue()),
            'ownerId' => fn(ParseNode $n) => $o->setOwnerId($n->getStringValue()),
            'ownerTenantId' => fn(ParseNode $n) => $o->setOwnerTenantId($n->getStringValue()),
            'ownerType' => fn(ParseNode $n) => $o->setOwnerType($n->getStringValue()),
            'serviceStatus' => fn(ParseNode $n) => $o->setServiceStatus($n->getCollectionOfObjectValues([ServicePlanInfo::class, 'createFromDiscriminatorValue'])),
            'skuId' => fn(ParseNode $n) => $o->setSkuId($n->getStringValue()),
            'skuPartNumber' => fn(ParseNode $n) => $o->setSkuPartNumber($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getStringValue()),
            'totalLicenses' => fn(ParseNode $n) => $o->setTotalLicenses($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the isTrial property value. Whether the subscription is a free trial or purchased.
     * @return bool|null
    */
    public function getIsTrial(): ?bool {
        return $this->isTrial;
    }

    /**
     * Gets the nextLifecycleDateTime property value. The date and time when the subscription will move to the next state (as defined by the status property) if not renewed by the tenant. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getNextLifecycleDateTime(): ?DateTime {
        return $this->nextLifecycleDateTime;
    }

    /**
     * Gets the ownerId property value. The object ID of the account admin.
     * @return string|null
    */
    public function getOwnerId(): ?string {
        return $this->ownerId;
    }

    /**
     * Gets the ownerTenantId property value. The unique identifier for the Microsoft partner tenant that created the subscription on a customer tenant.
     * @return string|null
    */
    public function getOwnerTenantId(): ?string {
        return $this->ownerTenantId;
    }

    /**
     * Gets the ownerType property value. Indicates the entity that ownerId belongs to, for example, 'User'.
     * @return string|null
    */
    public function getOwnerType(): ?string {
        return $this->ownerType;
    }

    /**
     * Gets the serviceStatus property value. The provisioning status of each service included in this subscription.
     * @return array<ServicePlanInfo>|null
    */
    public function getServiceStatus(): ?array {
        return $this->serviceStatus;
    }

    /**
     * Gets the skuId property value. The object ID of the SKU associated with this subscription.
     * @return string|null
    */
    public function getSkuId(): ?string {
        return $this->skuId;
    }

    /**
     * Gets the skuPartNumber property value. The SKU associated with this subscription.
     * @return string|null
    */
    public function getSkuPartNumber(): ?string {
        return $this->skuPartNumber;
    }

    /**
     * Gets the status property value. The status of this subscription. The possible values are: Enabled, Deleted, Suspended, Warning, LockedOut.
     * @return string|null
    */
    public function getStatus(): ?string {
        return $this->status;
    }

    /**
     * Gets the totalLicenses property value. The number of licenses included in this subscription.
     * @return int|null
    */
    public function getTotalLicenses(): ?int {
        return $this->totalLicenses;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('commerceSubscriptionId', $this->getCommerceSubscriptionId());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeBooleanValue('isTrial', $this->getIsTrial());
        $writer->writeDateTimeValue('nextLifecycleDateTime', $this->getNextLifecycleDateTime());
        $writer->writeStringValue('ownerId', $this->getOwnerId());
        $writer->writeStringValue('ownerTenantId', $this->getOwnerTenantId());
        $writer->writeStringValue('ownerType', $this->getOwnerType());
        $writer->writeCollectionOfObjectValues('serviceStatus', $this->getServiceStatus());
        $writer->writeStringValue('skuId', $this->getSkuId());
        $writer->writeStringValue('skuPartNumber', $this->getSkuPartNumber());
        $writer->writeStringValue('status', $this->getStatus());
        $writer->writeIntegerValue('totalLicenses', $this->getTotalLicenses());
    }

    /**
     * Sets the commerceSubscriptionId property value. The ID of this subscription in the commerce system. Alternate key.
     * @param string|null $value Value to set for the commerceSubscriptionId property.
    */
    public function setCommerceSubscriptionId(?string $value): void {
        $this->commerceSubscriptionId = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when this subscription was created. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the isTrial property value. Whether the subscription is a free trial or purchased.
     * @param bool|null $value Value to set for the isTrial property.
    */
    public function setIsTrial(?bool $value): void {
        $this->isTrial = $value;
    }

    /**
     * Sets the nextLifecycleDateTime property value. The date and time when the subscription will move to the next state (as defined by the status property) if not renewed by the tenant. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the nextLifecycleDateTime property.
    */
    public function setNextLifecycleDateTime(?DateTime $value): void {
        $this->nextLifecycleDateTime = $value;
    }

    /**
     * Sets the ownerId property value. The object ID of the account admin.
     * @param string|null $value Value to set for the ownerId property.
    */
    public function setOwnerId(?string $value): void {
        $this->ownerId = $value;
    }

    /**
     * Sets the ownerTenantId property value. The unique identifier for the Microsoft partner tenant that created the subscription on a customer tenant.
     * @param string|null $value Value to set for the ownerTenantId property.
    */
    public function setOwnerTenantId(?string $value): void {
        $this->ownerTenantId = $value;
    }

    /**
     * Sets the ownerType property value. Indicates the entity that ownerId belongs to, for example, 'User'.
     * @param string|null $value Value to set for the ownerType property.
    */
    public function setOwnerType(?string $value): void {
        $this->ownerType = $value;
    }

    /**
     * Sets the serviceStatus property value. The provisioning status of each service included in this subscription.
     * @param array<ServicePlanInfo>|null $value Value to set for the serviceStatus property.
    */
    public function setServiceStatus(?array $value): void {
        $this->serviceStatus = $value;
    }

    /**
     * Sets the skuId property value. The object ID of the SKU associated with this subscription.
     * @param string|null $value Value to set for the skuId property.
    */
    public function setSkuId(?string $value): void {
        $this->skuId = $value;
    }

    /**
     * Sets the skuPartNumber property value. The SKU associated with this subscription.
     * @param string|null $value Value to set for the skuPartNumber property.
    */
    public function setSkuPartNumber(?string $value): void {
        $this->skuPartNumber = $value;
    }

    /**
     * Sets the status property value. The status of this subscription. The possible values are: Enabled, Deleted, Suspended, Warning, LockedOut.
     * @param string|null $value Value to set for the status property.
    */
    public function setStatus(?string $value): void {
        $this->status = $value;
    }

    /**
     * Sets the totalLicenses property value. The number of licenses included in this subscription.
     * @param int|null $value Value to set for the totalLicenses property.
    */
    public function setTotalLicenses(?int $value): void {
        $this->totalLicenses = $value;
    }

}
