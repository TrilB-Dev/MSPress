<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UnifiedStorageQuota extends Entity implements Parsable 
{
    /**
     * @var int|null $deleted The deleted property
    */
    private ?int $deleted = null;
    
    /**
     * @var string|null $manageWebUrl The manageWebUrl property
    */
    private ?string $manageWebUrl = null;
    
    /**
     * @var int|null $remaining The remaining property
    */
    private ?int $remaining = null;
    
    /**
     * @var array<ServiceStorageQuotaBreakdown>|null $services The services property
    */
    private ?array $services = null;
    
    /**
     * @var string|null $state The state property
    */
    private ?string $state = null;
    
    /**
     * @var int|null $total The total property
    */
    private ?int $total = null;
    
    /**
     * @var int|null $used The used property
    */
    private ?int $used = null;
    
    /**
     * Instantiates a new UnifiedStorageQuota and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UnifiedStorageQuota
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UnifiedStorageQuota {
        return new UnifiedStorageQuota();
    }

    /**
     * Gets the deleted property value. The deleted property
     * @return int|null
    */
    public function getDeleted(): ?int {
        return $this->deleted;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'deleted' => fn(ParseNode $n) => $o->setDeleted($n->getIntegerValue()),
            'manageWebUrl' => fn(ParseNode $n) => $o->setManageWebUrl($n->getStringValue()),
            'remaining' => fn(ParseNode $n) => $o->setRemaining($n->getIntegerValue()),
            'services' => fn(ParseNode $n) => $o->setServices($n->getCollectionOfObjectValues([ServiceStorageQuotaBreakdown::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getStringValue()),
            'total' => fn(ParseNode $n) => $o->setTotal($n->getIntegerValue()),
            'used' => fn(ParseNode $n) => $o->setUsed($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the manageWebUrl property value. The manageWebUrl property
     * @return string|null
    */
    public function getManageWebUrl(): ?string {
        return $this->manageWebUrl;
    }

    /**
     * Gets the remaining property value. The remaining property
     * @return int|null
    */
    public function getRemaining(): ?int {
        return $this->remaining;
    }

    /**
     * Gets the services property value. The services property
     * @return array<ServiceStorageQuotaBreakdown>|null
    */
    public function getServices(): ?array {
        return $this->services;
    }

    /**
     * Gets the state property value. The state property
     * @return string|null
    */
    public function getState(): ?string {
        return $this->state;
    }

    /**
     * Gets the total property value. The total property
     * @return int|null
    */
    public function getTotal(): ?int {
        return $this->total;
    }

    /**
     * Gets the used property value. The used property
     * @return int|null
    */
    public function getUsed(): ?int {
        return $this->used;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('deleted', $this->getDeleted());
        $writer->writeStringValue('manageWebUrl', $this->getManageWebUrl());
        $writer->writeIntegerValue('remaining', $this->getRemaining());
        $writer->writeCollectionOfObjectValues('services', $this->getServices());
        $writer->writeStringValue('state', $this->getState());
        $writer->writeIntegerValue('total', $this->getTotal());
        $writer->writeIntegerValue('used', $this->getUsed());
    }

    /**
     * Sets the deleted property value. The deleted property
     * @param int|null $value Value to set for the deleted property.
    */
    public function setDeleted(?int $value): void {
        $this->deleted = $value;
    }

    /**
     * Sets the manageWebUrl property value. The manageWebUrl property
     * @param string|null $value Value to set for the manageWebUrl property.
    */
    public function setManageWebUrl(?string $value): void {
        $this->manageWebUrl = $value;
    }

    /**
     * Sets the remaining property value. The remaining property
     * @param int|null $value Value to set for the remaining property.
    */
    public function setRemaining(?int $value): void {
        $this->remaining = $value;
    }

    /**
     * Sets the services property value. The services property
     * @param array<ServiceStorageQuotaBreakdown>|null $value Value to set for the services property.
    */
    public function setServices(?array $value): void {
        $this->services = $value;
    }

    /**
     * Sets the state property value. The state property
     * @param string|null $value Value to set for the state property.
    */
    public function setState(?string $value): void {
        $this->state = $value;
    }

    /**
     * Sets the total property value. The total property
     * @param int|null $value Value to set for the total property.
    */
    public function setTotal(?int $value): void {
        $this->total = $value;
    }

    /**
     * Sets the used property value. The used property
     * @param int|null $value Value to set for the used property.
    */
    public function setUsed(?int $value): void {
        $this->used = $value;
    }

}
