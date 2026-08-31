<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PolicyTemplate extends Entity implements Parsable 
{
    /**
     * @var MultiTenantOrganizationIdentitySyncPolicyTemplate|null $multiTenantOrganizationIdentitySynchronization Defines an optional cross-tenant access policy template with user synchronization settings for a multitenant organization.
    */
    private ?MultiTenantOrganizationIdentitySyncPolicyTemplate $multiTenantOrganizationIdentitySynchronization = null;
    
    /**
     * @var MultiTenantOrganizationPartnerConfigurationTemplate|null $multiTenantOrganizationPartnerConfiguration Defines an optional cross-tenant access policy template with inbound and outbound partner configuration settings for a multitenant organization.
    */
    private ?MultiTenantOrganizationPartnerConfigurationTemplate $multiTenantOrganizationPartnerConfiguration = null;
    
    /**
     * Instantiates a new PolicyTemplate and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PolicyTemplate
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PolicyTemplate {
        return new PolicyTemplate();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'multiTenantOrganizationIdentitySynchronization' => fn(ParseNode $n) => $o->setMultiTenantOrganizationIdentitySynchronization($n->getObjectValue([MultiTenantOrganizationIdentitySyncPolicyTemplate::class, 'createFromDiscriminatorValue'])),
            'multiTenantOrganizationPartnerConfiguration' => fn(ParseNode $n) => $o->setMultiTenantOrganizationPartnerConfiguration($n->getObjectValue([MultiTenantOrganizationPartnerConfigurationTemplate::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the multiTenantOrganizationIdentitySynchronization property value. Defines an optional cross-tenant access policy template with user synchronization settings for a multitenant organization.
     * @return MultiTenantOrganizationIdentitySyncPolicyTemplate|null
    */
    public function getMultiTenantOrganizationIdentitySynchronization(): ?MultiTenantOrganizationIdentitySyncPolicyTemplate {
        return $this->multiTenantOrganizationIdentitySynchronization;
    }

    /**
     * Gets the multiTenantOrganizationPartnerConfiguration property value. Defines an optional cross-tenant access policy template with inbound and outbound partner configuration settings for a multitenant organization.
     * @return MultiTenantOrganizationPartnerConfigurationTemplate|null
    */
    public function getMultiTenantOrganizationPartnerConfiguration(): ?MultiTenantOrganizationPartnerConfigurationTemplate {
        return $this->multiTenantOrganizationPartnerConfiguration;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('multiTenantOrganizationIdentitySynchronization', $this->getMultiTenantOrganizationIdentitySynchronization());
        $writer->writeObjectValue('multiTenantOrganizationPartnerConfiguration', $this->getMultiTenantOrganizationPartnerConfiguration());
    }

    /**
     * Sets the multiTenantOrganizationIdentitySynchronization property value. Defines an optional cross-tenant access policy template with user synchronization settings for a multitenant organization.
     * @param MultiTenantOrganizationIdentitySyncPolicyTemplate|null $value Value to set for the multiTenantOrganizationIdentitySynchronization property.
    */
    public function setMultiTenantOrganizationIdentitySynchronization(?MultiTenantOrganizationIdentitySyncPolicyTemplate $value): void {
        $this->multiTenantOrganizationIdentitySynchronization = $value;
    }

    /**
     * Sets the multiTenantOrganizationPartnerConfiguration property value. Defines an optional cross-tenant access policy template with inbound and outbound partner configuration settings for a multitenant organization.
     * @param MultiTenantOrganizationPartnerConfigurationTemplate|null $value Value to set for the multiTenantOrganizationPartnerConfiguration property.
    */
    public function setMultiTenantOrganizationPartnerConfiguration(?MultiTenantOrganizationPartnerConfigurationTemplate $value): void {
        $this->multiTenantOrganizationPartnerConfiguration = $value;
    }

}
