<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MultiTenantOrganization extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $createdDateTime Date when multitenant organization was created. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description Description of the multitenant organization.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Display name of the multitenant organization.
    */
    private ?string $displayName = null;
    
    /**
     * @var MultiTenantOrganizationJoinRequestRecord|null $joinRequest Defines the status of a tenant joining a multitenant organization.
    */
    private ?MultiTenantOrganizationJoinRequestRecord $joinRequest = null;
    
    /**
     * @var MultiTenantOrganizationState|null $state State of the multitenant organization. The possible values are: active, inactive, unknownFutureValue. active indicates the multitenant organization is created. inactive indicates the multitenant organization isn't created. Read-only.
    */
    private ?MultiTenantOrganizationState $state = null;
    
    /**
     * @var array<MultiTenantOrganizationMember>|null $tenants Defines tenants added to a multitenant organization.
    */
    private ?array $tenants = null;
    
    /**
     * Instantiates a new MultiTenantOrganization and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MultiTenantOrganization
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MultiTenantOrganization {
        return new MultiTenantOrganization();
    }

    /**
     * Gets the createdDateTime property value. Date when multitenant organization was created. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. Description of the multitenant organization.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Display name of the multitenant organization.
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
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'joinRequest' => fn(ParseNode $n) => $o->setJoinRequest($n->getObjectValue([MultiTenantOrganizationJoinRequestRecord::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(MultiTenantOrganizationState::class)),
            'tenants' => fn(ParseNode $n) => $o->setTenants($n->getCollectionOfObjectValues([MultiTenantOrganizationMember::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the joinRequest property value. Defines the status of a tenant joining a multitenant organization.
     * @return MultiTenantOrganizationJoinRequestRecord|null
    */
    public function getJoinRequest(): ?MultiTenantOrganizationJoinRequestRecord {
        return $this->joinRequest;
    }

    /**
     * Gets the state property value. State of the multitenant organization. The possible values are: active, inactive, unknownFutureValue. active indicates the multitenant organization is created. inactive indicates the multitenant organization isn't created. Read-only.
     * @return MultiTenantOrganizationState|null
    */
    public function getState(): ?MultiTenantOrganizationState {
        return $this->state;
    }

    /**
     * Gets the tenants property value. Defines tenants added to a multitenant organization.
     * @return array<MultiTenantOrganizationMember>|null
    */
    public function getTenants(): ?array {
        return $this->tenants;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('joinRequest', $this->getJoinRequest());
        $writer->writeEnumValue('state', $this->getState());
        $writer->writeCollectionOfObjectValues('tenants', $this->getTenants());
    }

    /**
     * Sets the createdDateTime property value. Date when multitenant organization was created. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. Description of the multitenant organization.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Display name of the multitenant organization.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the joinRequest property value. Defines the status of a tenant joining a multitenant organization.
     * @param MultiTenantOrganizationJoinRequestRecord|null $value Value to set for the joinRequest property.
    */
    public function setJoinRequest(?MultiTenantOrganizationJoinRequestRecord $value): void {
        $this->joinRequest = $value;
    }

    /**
     * Sets the state property value. State of the multitenant organization. The possible values are: active, inactive, unknownFutureValue. active indicates the multitenant organization is created. inactive indicates the multitenant organization isn't created. Read-only.
     * @param MultiTenantOrganizationState|null $value Value to set for the state property.
    */
    public function setState(?MultiTenantOrganizationState $value): void {
        $this->state = $value;
    }

    /**
     * Sets the tenants property value. Defines tenants added to a multitenant organization.
     * @param array<MultiTenantOrganizationMember>|null $value Value to set for the tenants property.
    */
    public function setTenants(?array $value): void {
        $this->tenants = $value;
    }

}
