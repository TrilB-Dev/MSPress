<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class SubscribedSku extends Entity implements Parsable 
{
    /**
     * @var string|null $accountId The unique ID of the account this SKU belongs to.
    */
    private ?string $accountId = null;
    
    /**
     * @var string|null $accountName The name of the account this SKU belongs to.
    */
    private ?string $accountName = null;
    
    /**
     * @var string|null $appliesTo The target class for this SKU. Only SKUs with target class User are assignable. The possible values are: User, Company.
    */
    private ?string $appliesTo = null;
    
    /**
     * @var string|null $capabilityStatus Enabled indicates that the prepaidUnits property has at least one unit that is enabled. LockedOut indicates that the customer canceled their subscription. The possible values are: Enabled, Warning, Suspended, Deleted, LockedOut.
    */
    private ?string $capabilityStatus = null;
    
    /**
     * @var int|null $consumedUnits The number of licenses that have been assigned.
    */
    private ?int $consumedUnits = null;
    
    /**
     * @var LicenseUnitsDetail|null $prepaidUnits Information about the number and status of prepaid licenses.
    */
    private ?LicenseUnitsDetail $prepaidUnits = null;
    
    /**
     * @var array<ServicePlanInfo>|null $servicePlans Information about the service plans that are available with the SKU. Not nullable.
    */
    private ?array $servicePlans = null;
    
    /**
     * @var string|null $skuId The unique identifier (GUID) for the service SKU.
    */
    private ?string $skuId = null;
    
    /**
     * @var string|null $skuPartNumber The SKU part number; for example: AAD_PREMIUM or RMSBASIC. To get a list of commercial subscriptions that an organization has acquired, see List subscribedSkus.
    */
    private ?string $skuPartNumber = null;
    
    /**
     * @var array<string>|null $subscriptionIds A list of all subscription IDs associated with this SKU.
    */
    private ?array $subscriptionIds = null;
    
    /**
     * Instantiates a new SubscribedSku and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SubscribedSku
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SubscribedSku {
        return new SubscribedSku();
    }

    /**
     * Gets the accountId property value. The unique ID of the account this SKU belongs to.
     * @return string|null
    */
    public function getAccountId(): ?string {
        return $this->accountId;
    }

    /**
     * Gets the accountName property value. The name of the account this SKU belongs to.
     * @return string|null
    */
    public function getAccountName(): ?string {
        return $this->accountName;
    }

    /**
     * Gets the appliesTo property value. The target class for this SKU. Only SKUs with target class User are assignable. The possible values are: User, Company.
     * @return string|null
    */
    public function getAppliesTo(): ?string {
        return $this->appliesTo;
    }

    /**
     * Gets the capabilityStatus property value. Enabled indicates that the prepaidUnits property has at least one unit that is enabled. LockedOut indicates that the customer canceled their subscription. The possible values are: Enabled, Warning, Suspended, Deleted, LockedOut.
     * @return string|null
    */
    public function getCapabilityStatus(): ?string {
        return $this->capabilityStatus;
    }

    /**
     * Gets the consumedUnits property value. The number of licenses that have been assigned.
     * @return int|null
    */
    public function getConsumedUnits(): ?int {
        return $this->consumedUnits;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'accountId' => fn(ParseNode $n) => $o->setAccountId($n->getStringValue()),
            'accountName' => fn(ParseNode $n) => $o->setAccountName($n->getStringValue()),
            'appliesTo' => fn(ParseNode $n) => $o->setAppliesTo($n->getStringValue()),
            'capabilityStatus' => fn(ParseNode $n) => $o->setCapabilityStatus($n->getStringValue()),
            'consumedUnits' => fn(ParseNode $n) => $o->setConsumedUnits($n->getIntegerValue()),
            'prepaidUnits' => fn(ParseNode $n) => $o->setPrepaidUnits($n->getObjectValue([LicenseUnitsDetail::class, 'createFromDiscriminatorValue'])),
            'servicePlans' => fn(ParseNode $n) => $o->setServicePlans($n->getCollectionOfObjectValues([ServicePlanInfo::class, 'createFromDiscriminatorValue'])),
            'skuId' => fn(ParseNode $n) => $o->setSkuId($n->getStringValue()),
            'skuPartNumber' => fn(ParseNode $n) => $o->setSkuPartNumber($n->getStringValue()),
            'subscriptionIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSubscriptionIds($val);
            },
        ]);
    }

    /**
     * Gets the prepaidUnits property value. Information about the number and status of prepaid licenses.
     * @return LicenseUnitsDetail|null
    */
    public function getPrepaidUnits(): ?LicenseUnitsDetail {
        return $this->prepaidUnits;
    }

    /**
     * Gets the servicePlans property value. Information about the service plans that are available with the SKU. Not nullable.
     * @return array<ServicePlanInfo>|null
    */
    public function getServicePlans(): ?array {
        return $this->servicePlans;
    }

    /**
     * Gets the skuId property value. The unique identifier (GUID) for the service SKU.
     * @return string|null
    */
    public function getSkuId(): ?string {
        return $this->skuId;
    }

    /**
     * Gets the skuPartNumber property value. The SKU part number; for example: AAD_PREMIUM or RMSBASIC. To get a list of commercial subscriptions that an organization has acquired, see List subscribedSkus.
     * @return string|null
    */
    public function getSkuPartNumber(): ?string {
        return $this->skuPartNumber;
    }

    /**
     * Gets the subscriptionIds property value. A list of all subscription IDs associated with this SKU.
     * @return array<string>|null
    */
    public function getSubscriptionIds(): ?array {
        return $this->subscriptionIds;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('accountId', $this->getAccountId());
        $writer->writeStringValue('accountName', $this->getAccountName());
        $writer->writeStringValue('appliesTo', $this->getAppliesTo());
        $writer->writeStringValue('capabilityStatus', $this->getCapabilityStatus());
        $writer->writeIntegerValue('consumedUnits', $this->getConsumedUnits());
        $writer->writeObjectValue('prepaidUnits', $this->getPrepaidUnits());
        $writer->writeCollectionOfObjectValues('servicePlans', $this->getServicePlans());
        $writer->writeStringValue('skuId', $this->getSkuId());
        $writer->writeStringValue('skuPartNumber', $this->getSkuPartNumber());
        $writer->writeCollectionOfPrimitiveValues('subscriptionIds', $this->getSubscriptionIds());
    }

    /**
     * Sets the accountId property value. The unique ID of the account this SKU belongs to.
     * @param string|null $value Value to set for the accountId property.
    */
    public function setAccountId(?string $value): void {
        $this->accountId = $value;
    }

    /**
     * Sets the accountName property value. The name of the account this SKU belongs to.
     * @param string|null $value Value to set for the accountName property.
    */
    public function setAccountName(?string $value): void {
        $this->accountName = $value;
    }

    /**
     * Sets the appliesTo property value. The target class for this SKU. Only SKUs with target class User are assignable. The possible values are: User, Company.
     * @param string|null $value Value to set for the appliesTo property.
    */
    public function setAppliesTo(?string $value): void {
        $this->appliesTo = $value;
    }

    /**
     * Sets the capabilityStatus property value. Enabled indicates that the prepaidUnits property has at least one unit that is enabled. LockedOut indicates that the customer canceled their subscription. The possible values are: Enabled, Warning, Suspended, Deleted, LockedOut.
     * @param string|null $value Value to set for the capabilityStatus property.
    */
    public function setCapabilityStatus(?string $value): void {
        $this->capabilityStatus = $value;
    }

    /**
     * Sets the consumedUnits property value. The number of licenses that have been assigned.
     * @param int|null $value Value to set for the consumedUnits property.
    */
    public function setConsumedUnits(?int $value): void {
        $this->consumedUnits = $value;
    }

    /**
     * Sets the prepaidUnits property value. Information about the number and status of prepaid licenses.
     * @param LicenseUnitsDetail|null $value Value to set for the prepaidUnits property.
    */
    public function setPrepaidUnits(?LicenseUnitsDetail $value): void {
        $this->prepaidUnits = $value;
    }

    /**
     * Sets the servicePlans property value. Information about the service plans that are available with the SKU. Not nullable.
     * @param array<ServicePlanInfo>|null $value Value to set for the servicePlans property.
    */
    public function setServicePlans(?array $value): void {
        $this->servicePlans = $value;
    }

    /**
     * Sets the skuId property value. The unique identifier (GUID) for the service SKU.
     * @param string|null $value Value to set for the skuId property.
    */
    public function setSkuId(?string $value): void {
        $this->skuId = $value;
    }

    /**
     * Sets the skuPartNumber property value. The SKU part number; for example: AAD_PREMIUM or RMSBASIC. To get a list of commercial subscriptions that an organization has acquired, see List subscribedSkus.
     * @param string|null $value Value to set for the skuPartNumber property.
    */
    public function setSkuPartNumber(?string $value): void {
        $this->skuPartNumber = $value;
    }

    /**
     * Sets the subscriptionIds property value. A list of all subscription IDs associated with this SKU.
     * @param array<string>|null $value Value to set for the subscriptionIds property.
    */
    public function setSubscriptionIds(?array $value): void {
        $this->subscriptionIds = $value;
    }

}
