<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CrossTenantAccessPolicyConfigurationDefault extends Entity implements Parsable 
{
    /**
     * @var CrossTenantAccessPolicyAppServiceConnectSetting|null $appServiceConnectInbound Defines your default configuration for inbound app service connect settings that control which applications can connect across tenant boundaries.
    */
    private ?CrossTenantAccessPolicyAppServiceConnectSetting $appServiceConnectInbound = null;
    
    /**
     * @var InboundOutboundPolicyConfiguration|null $automaticUserConsentSettings Determines the default configuration for automatic user consent settings. The inboundAllowed and outboundAllowed properties are always false and can't be updated in the default configuration. Read-only.
    */
    private ?InboundOutboundPolicyConfiguration $automaticUserConsentSettings = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bCollaborationInbound Defines your default configuration for users from other organizations accessing your resources via Microsoft Entra B2B collaboration.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bCollaborationInbound = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bCollaborationOutbound Defines your default configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B collaboration.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bCollaborationOutbound = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bDirectConnectInbound Defines your default configuration for users from other organizations accessing your resources via Microsoft Entra B2B direct connect.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bDirectConnectInbound = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bDirectConnectOutbound Defines your default configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B direct connect.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bDirectConnectOutbound = null;
    
    /**
     * @var CrossTenantAccessPolicyInboundTrust|null $inboundTrust Determines the default configuration for trusting other Conditional Access claims from external Microsoft Entra organizations.
    */
    private ?CrossTenantAccessPolicyInboundTrust $inboundTrust = null;
    
    /**
     * @var DefaultInvitationRedemptionIdentityProviderConfiguration|null $invitationRedemptionIdentityProviderConfiguration Defines the priority order based on which an identity provider is selected during invitation redemption for a guest user.
    */
    private ?DefaultInvitationRedemptionIdentityProviderConfiguration $invitationRedemptionIdentityProviderConfiguration = null;
    
    /**
     * @var bool|null $isServiceDefault If true, the default configuration is set to the system default configuration. If false, the default settings are customized.
    */
    private ?bool $isServiceDefault = null;
    
    /**
     * @var array<M365CapabilityBase>|null $m365Capabilities Defines the default Microsoft 365 cross-tenant capabilities for inbound access from external organizations.
    */
    private ?array $m365Capabilities = null;
    
    /**
     * @var CrossTenantAccessPolicyM365CollaborationInboundSetting|null $m365CollaborationInbound Defines your default configuration for inbound Microsoft 365 collaboration settings that determine which users from other organizations can collaborate with your organization using Microsoft 365 apps.
    */
    private ?CrossTenantAccessPolicyM365CollaborationInboundSetting $m365CollaborationInbound = null;
    
    /**
     * @var CrossTenantAccessPolicyM365CollaborationOutboundSetting|null $m365CollaborationOutbound Defines your default configuration for outbound Microsoft 365 collaboration settings that determine which users in your organization can collaborate with other organizations using Microsoft 365 apps.
    */
    private ?CrossTenantAccessPolicyM365CollaborationOutboundSetting $m365CollaborationOutbound = null;
    
    /**
     * @var CrossTenantAccessPolicyTenantRestrictions|null $tenantRestrictions Defines the default tenant restrictions configuration for users in your organization who access an external organization on your network or devices.
    */
    private ?CrossTenantAccessPolicyTenantRestrictions $tenantRestrictions = null;
    
    /**
     * Instantiates a new CrossTenantAccessPolicyConfigurationDefault and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CrossTenantAccessPolicyConfigurationDefault
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CrossTenantAccessPolicyConfigurationDefault {
        return new CrossTenantAccessPolicyConfigurationDefault();
    }

    /**
     * Gets the appServiceConnectInbound property value. Defines your default configuration for inbound app service connect settings that control which applications can connect across tenant boundaries.
     * @return CrossTenantAccessPolicyAppServiceConnectSetting|null
    */
    public function getAppServiceConnectInbound(): ?CrossTenantAccessPolicyAppServiceConnectSetting {
        return $this->appServiceConnectInbound;
    }

    /**
     * Gets the automaticUserConsentSettings property value. Determines the default configuration for automatic user consent settings. The inboundAllowed and outboundAllowed properties are always false and can't be updated in the default configuration. Read-only.
     * @return InboundOutboundPolicyConfiguration|null
    */
    public function getAutomaticUserConsentSettings(): ?InboundOutboundPolicyConfiguration {
        return $this->automaticUserConsentSettings;
    }

    /**
     * Gets the b2bCollaborationInbound property value. Defines your default configuration for users from other organizations accessing your resources via Microsoft Entra B2B collaboration.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bCollaborationInbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bCollaborationInbound;
    }

    /**
     * Gets the b2bCollaborationOutbound property value. Defines your default configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B collaboration.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bCollaborationOutbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bCollaborationOutbound;
    }

    /**
     * Gets the b2bDirectConnectInbound property value. Defines your default configuration for users from other organizations accessing your resources via Microsoft Entra B2B direct connect.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bDirectConnectInbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bDirectConnectInbound;
    }

    /**
     * Gets the b2bDirectConnectOutbound property value. Defines your default configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B direct connect.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bDirectConnectOutbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bDirectConnectOutbound;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'appServiceConnectInbound' => fn(ParseNode $n) => $o->setAppServiceConnectInbound($n->getObjectValue([CrossTenantAccessPolicyAppServiceConnectSetting::class, 'createFromDiscriminatorValue'])),
            'automaticUserConsentSettings' => fn(ParseNode $n) => $o->setAutomaticUserConsentSettings($n->getObjectValue([InboundOutboundPolicyConfiguration::class, 'createFromDiscriminatorValue'])),
            'b2bCollaborationInbound' => fn(ParseNode $n) => $o->setB2bCollaborationInbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'b2bCollaborationOutbound' => fn(ParseNode $n) => $o->setB2bCollaborationOutbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'b2bDirectConnectInbound' => fn(ParseNode $n) => $o->setB2bDirectConnectInbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'b2bDirectConnectOutbound' => fn(ParseNode $n) => $o->setB2bDirectConnectOutbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'inboundTrust' => fn(ParseNode $n) => $o->setInboundTrust($n->getObjectValue([CrossTenantAccessPolicyInboundTrust::class, 'createFromDiscriminatorValue'])),
            'invitationRedemptionIdentityProviderConfiguration' => fn(ParseNode $n) => $o->setInvitationRedemptionIdentityProviderConfiguration($n->getObjectValue([DefaultInvitationRedemptionIdentityProviderConfiguration::class, 'createFromDiscriminatorValue'])),
            'isServiceDefault' => fn(ParseNode $n) => $o->setIsServiceDefault($n->getBooleanValue()),
            'm365Capabilities' => fn(ParseNode $n) => $o->setM365Capabilities($n->getCollectionOfObjectValues([M365CapabilityBase::class, 'createFromDiscriminatorValue'])),
            'm365CollaborationInbound' => fn(ParseNode $n) => $o->setM365CollaborationInbound($n->getObjectValue([CrossTenantAccessPolicyM365CollaborationInboundSetting::class, 'createFromDiscriminatorValue'])),
            'm365CollaborationOutbound' => fn(ParseNode $n) => $o->setM365CollaborationOutbound($n->getObjectValue([CrossTenantAccessPolicyM365CollaborationOutboundSetting::class, 'createFromDiscriminatorValue'])),
            'tenantRestrictions' => fn(ParseNode $n) => $o->setTenantRestrictions($n->getObjectValue([CrossTenantAccessPolicyTenantRestrictions::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the inboundTrust property value. Determines the default configuration for trusting other Conditional Access claims from external Microsoft Entra organizations.
     * @return CrossTenantAccessPolicyInboundTrust|null
    */
    public function getInboundTrust(): ?CrossTenantAccessPolicyInboundTrust {
        return $this->inboundTrust;
    }

    /**
     * Gets the invitationRedemptionIdentityProviderConfiguration property value. Defines the priority order based on which an identity provider is selected during invitation redemption for a guest user.
     * @return DefaultInvitationRedemptionIdentityProviderConfiguration|null
    */
    public function getInvitationRedemptionIdentityProviderConfiguration(): ?DefaultInvitationRedemptionIdentityProviderConfiguration {
        return $this->invitationRedemptionIdentityProviderConfiguration;
    }

    /**
     * Gets the isServiceDefault property value. If true, the default configuration is set to the system default configuration. If false, the default settings are customized.
     * @return bool|null
    */
    public function getIsServiceDefault(): ?bool {
        return $this->isServiceDefault;
    }

    /**
     * Gets the m365Capabilities property value. Defines the default Microsoft 365 cross-tenant capabilities for inbound access from external organizations.
     * @return array<M365CapabilityBase>|null
    */
    public function getM365Capabilities(): ?array {
        return $this->m365Capabilities;
    }

    /**
     * Gets the m365CollaborationInbound property value. Defines your default configuration for inbound Microsoft 365 collaboration settings that determine which users from other organizations can collaborate with your organization using Microsoft 365 apps.
     * @return CrossTenantAccessPolicyM365CollaborationInboundSetting|null
    */
    public function getM365CollaborationInbound(): ?CrossTenantAccessPolicyM365CollaborationInboundSetting {
        return $this->m365CollaborationInbound;
    }

    /**
     * Gets the m365CollaborationOutbound property value. Defines your default configuration for outbound Microsoft 365 collaboration settings that determine which users in your organization can collaborate with other organizations using Microsoft 365 apps.
     * @return CrossTenantAccessPolicyM365CollaborationOutboundSetting|null
    */
    public function getM365CollaborationOutbound(): ?CrossTenantAccessPolicyM365CollaborationOutboundSetting {
        return $this->m365CollaborationOutbound;
    }

    /**
     * Gets the tenantRestrictions property value. Defines the default tenant restrictions configuration for users in your organization who access an external organization on your network or devices.
     * @return CrossTenantAccessPolicyTenantRestrictions|null
    */
    public function getTenantRestrictions(): ?CrossTenantAccessPolicyTenantRestrictions {
        return $this->tenantRestrictions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('appServiceConnectInbound', $this->getAppServiceConnectInbound());
        $writer->writeObjectValue('automaticUserConsentSettings', $this->getAutomaticUserConsentSettings());
        $writer->writeObjectValue('b2bCollaborationInbound', $this->getB2bCollaborationInbound());
        $writer->writeObjectValue('b2bCollaborationOutbound', $this->getB2bCollaborationOutbound());
        $writer->writeObjectValue('b2bDirectConnectInbound', $this->getB2bDirectConnectInbound());
        $writer->writeObjectValue('b2bDirectConnectOutbound', $this->getB2bDirectConnectOutbound());
        $writer->writeObjectValue('inboundTrust', $this->getInboundTrust());
        $writer->writeObjectValue('invitationRedemptionIdentityProviderConfiguration', $this->getInvitationRedemptionIdentityProviderConfiguration());
        $writer->writeBooleanValue('isServiceDefault', $this->getIsServiceDefault());
        $writer->writeCollectionOfObjectValues('m365Capabilities', $this->getM365Capabilities());
        $writer->writeObjectValue('m365CollaborationInbound', $this->getM365CollaborationInbound());
        $writer->writeObjectValue('m365CollaborationOutbound', $this->getM365CollaborationOutbound());
        $writer->writeObjectValue('tenantRestrictions', $this->getTenantRestrictions());
    }

    /**
     * Sets the appServiceConnectInbound property value. Defines your default configuration for inbound app service connect settings that control which applications can connect across tenant boundaries.
     * @param CrossTenantAccessPolicyAppServiceConnectSetting|null $value Value to set for the appServiceConnectInbound property.
    */
    public function setAppServiceConnectInbound(?CrossTenantAccessPolicyAppServiceConnectSetting $value): void {
        $this->appServiceConnectInbound = $value;
    }

    /**
     * Sets the automaticUserConsentSettings property value. Determines the default configuration for automatic user consent settings. The inboundAllowed and outboundAllowed properties are always false and can't be updated in the default configuration. Read-only.
     * @param InboundOutboundPolicyConfiguration|null $value Value to set for the automaticUserConsentSettings property.
    */
    public function setAutomaticUserConsentSettings(?InboundOutboundPolicyConfiguration $value): void {
        $this->automaticUserConsentSettings = $value;
    }

    /**
     * Sets the b2bCollaborationInbound property value. Defines your default configuration for users from other organizations accessing your resources via Microsoft Entra B2B collaboration.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bCollaborationInbound property.
    */
    public function setB2bCollaborationInbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bCollaborationInbound = $value;
    }

    /**
     * Sets the b2bCollaborationOutbound property value. Defines your default configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B collaboration.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bCollaborationOutbound property.
    */
    public function setB2bCollaborationOutbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bCollaborationOutbound = $value;
    }

    /**
     * Sets the b2bDirectConnectInbound property value. Defines your default configuration for users from other organizations accessing your resources via Microsoft Entra B2B direct connect.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bDirectConnectInbound property.
    */
    public function setB2bDirectConnectInbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bDirectConnectInbound = $value;
    }

    /**
     * Sets the b2bDirectConnectOutbound property value. Defines your default configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B direct connect.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bDirectConnectOutbound property.
    */
    public function setB2bDirectConnectOutbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bDirectConnectOutbound = $value;
    }

    /**
     * Sets the inboundTrust property value. Determines the default configuration for trusting other Conditional Access claims from external Microsoft Entra organizations.
     * @param CrossTenantAccessPolicyInboundTrust|null $value Value to set for the inboundTrust property.
    */
    public function setInboundTrust(?CrossTenantAccessPolicyInboundTrust $value): void {
        $this->inboundTrust = $value;
    }

    /**
     * Sets the invitationRedemptionIdentityProviderConfiguration property value. Defines the priority order based on which an identity provider is selected during invitation redemption for a guest user.
     * @param DefaultInvitationRedemptionIdentityProviderConfiguration|null $value Value to set for the invitationRedemptionIdentityProviderConfiguration property.
    */
    public function setInvitationRedemptionIdentityProviderConfiguration(?DefaultInvitationRedemptionIdentityProviderConfiguration $value): void {
        $this->invitationRedemptionIdentityProviderConfiguration = $value;
    }

    /**
     * Sets the isServiceDefault property value. If true, the default configuration is set to the system default configuration. If false, the default settings are customized.
     * @param bool|null $value Value to set for the isServiceDefault property.
    */
    public function setIsServiceDefault(?bool $value): void {
        $this->isServiceDefault = $value;
    }

    /**
     * Sets the m365Capabilities property value. Defines the default Microsoft 365 cross-tenant capabilities for inbound access from external organizations.
     * @param array<M365CapabilityBase>|null $value Value to set for the m365Capabilities property.
    */
    public function setM365Capabilities(?array $value): void {
        $this->m365Capabilities = $value;
    }

    /**
     * Sets the m365CollaborationInbound property value. Defines your default configuration for inbound Microsoft 365 collaboration settings that determine which users from other organizations can collaborate with your organization using Microsoft 365 apps.
     * @param CrossTenantAccessPolicyM365CollaborationInboundSetting|null $value Value to set for the m365CollaborationInbound property.
    */
    public function setM365CollaborationInbound(?CrossTenantAccessPolicyM365CollaborationInboundSetting $value): void {
        $this->m365CollaborationInbound = $value;
    }

    /**
     * Sets the m365CollaborationOutbound property value. Defines your default configuration for outbound Microsoft 365 collaboration settings that determine which users in your organization can collaborate with other organizations using Microsoft 365 apps.
     * @param CrossTenantAccessPolicyM365CollaborationOutboundSetting|null $value Value to set for the m365CollaborationOutbound property.
    */
    public function setM365CollaborationOutbound(?CrossTenantAccessPolicyM365CollaborationOutboundSetting $value): void {
        $this->m365CollaborationOutbound = $value;
    }

    /**
     * Sets the tenantRestrictions property value. Defines the default tenant restrictions configuration for users in your organization who access an external organization on your network or devices.
     * @param CrossTenantAccessPolicyTenantRestrictions|null $value Value to set for the tenantRestrictions property.
    */
    public function setTenantRestrictions(?CrossTenantAccessPolicyTenantRestrictions $value): void {
        $this->tenantRestrictions = $value;
    }

}
