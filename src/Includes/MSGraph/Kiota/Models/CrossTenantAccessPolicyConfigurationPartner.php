<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CrossTenantAccessPolicyConfigurationPartner implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var CrossTenantAccessPolicyAppServiceConnectSetting|null $appServiceConnectInbound Defines your partner-specific configuration for inbound app service connect settings that control which applications can connect across tenant boundaries with the partner organization.
    */
    private ?CrossTenantAccessPolicyAppServiceConnectSetting $appServiceConnectInbound = null;
    
    /**
     * @var InboundOutboundPolicyConfiguration|null $automaticUserConsentSettings Determines the partner-specific configuration for automatic user consent settings. Unless specifically configured, the inboundAllowed and outboundAllowed properties are null and inherit from the default settings, which is always false.
    */
    private ?InboundOutboundPolicyConfiguration $automaticUserConsentSettings = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bCollaborationInbound Defines your partner-specific configuration for users from other organizations accessing your resources via Microsoft Entra B2B collaboration.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bCollaborationInbound = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bCollaborationOutbound Defines your partner-specific configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B collaboration.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bCollaborationOutbound = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bDirectConnectInbound Defines your partner-specific configuration for users from other organizations accessing your resources via Azure B2B direct connect.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bDirectConnectInbound = null;
    
    /**
     * @var CrossTenantAccessPolicyB2BSetting|null $b2bDirectConnectOutbound Defines your partner-specific configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B direct connect.
    */
    private ?CrossTenantAccessPolicyB2BSetting $b2bDirectConnectOutbound = null;
    
    /**
     * @var CrossTenantIdentitySyncPolicyPartner|null $identitySynchronization Defines the cross-tenant policy for the synchronization of users from a partner tenant. Use this user synchronization policy to streamline collaboration between users in a multitenant organization by automating the creation, update, and deletion of users from one tenant to another.
    */
    private ?CrossTenantIdentitySyncPolicyPartner $identitySynchronization = null;
    
    /**
     * @var CrossTenantAccessPolicyInboundTrust|null $inboundTrust Determines the partner-specific configuration for trusting other Conditional Access claims from external Microsoft Entra organizations.
    */
    private ?CrossTenantAccessPolicyInboundTrust $inboundTrust = null;
    
    /**
     * @var bool|null $isInMultiTenantOrganization Identifies whether a tenant is a member of a multitenant organization.
    */
    private ?bool $isInMultiTenantOrganization = null;
    
    /**
     * @var bool|null $isServiceProvider Identifies whether the partner-specific configuration is a Cloud Service Provider for your organization.
    */
    private ?bool $isServiceProvider = null;
    
    /**
     * @var array<M365CapabilityBase>|null $m365Capabilities Defines the partner-specific Microsoft 365 cross-tenant capabilities for inbound access from the partner organization.
    */
    private ?array $m365Capabilities = null;
    
    /**
     * @var CrossTenantAccessPolicyM365CollaborationInboundSetting|null $m365CollaborationInbound Defines your partner-specific configuration for inbound Microsoft 365 collaboration settings that determine which users from the partner organization can collaborate with your organization using Microsoft 365 apps.
    */
    private ?CrossTenantAccessPolicyM365CollaborationInboundSetting $m365CollaborationInbound = null;
    
    /**
     * @var CrossTenantAccessPolicyM365CollaborationOutboundSetting|null $m365CollaborationOutbound Defines your partner-specific configuration for outbound Microsoft 365 collaboration settings that determine which users in your organization can collaborate with the partner organization using Microsoft 365 apps.
    */
    private ?CrossTenantAccessPolicyM365CollaborationOutboundSetting $m365CollaborationOutbound = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ServiceProviderConstraints|null $serviceProviderConstraints The serviceProviderConstraints property
    */
    private ?ServiceProviderConstraints $serviceProviderConstraints = null;
    
    /**
     * @var string|null $tenantId The tenant identifier for the partner Microsoft Entra organization. Read-only. Key.
    */
    private ?string $tenantId = null;
    
    /**
     * @var CrossTenantAccessPolicyTenantRestrictions|null $tenantRestrictions Defines the partner-specific tenant restrictions configuration for users in your organization who access a partner organization using partner supplied identities on your network or devices.
    */
    private ?CrossTenantAccessPolicyTenantRestrictions $tenantRestrictions = null;
    
    /**
     * Instantiates a new CrossTenantAccessPolicyConfigurationPartner and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CrossTenantAccessPolicyConfigurationPartner
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CrossTenantAccessPolicyConfigurationPartner {
        return new CrossTenantAccessPolicyConfigurationPartner();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the appServiceConnectInbound property value. Defines your partner-specific configuration for inbound app service connect settings that control which applications can connect across tenant boundaries with the partner organization.
     * @return CrossTenantAccessPolicyAppServiceConnectSetting|null
    */
    public function getAppServiceConnectInbound(): ?CrossTenantAccessPolicyAppServiceConnectSetting {
        return $this->appServiceConnectInbound;
    }

    /**
     * Gets the automaticUserConsentSettings property value. Determines the partner-specific configuration for automatic user consent settings. Unless specifically configured, the inboundAllowed and outboundAllowed properties are null and inherit from the default settings, which is always false.
     * @return InboundOutboundPolicyConfiguration|null
    */
    public function getAutomaticUserConsentSettings(): ?InboundOutboundPolicyConfiguration {
        return $this->automaticUserConsentSettings;
    }

    /**
     * Gets the b2bCollaborationInbound property value. Defines your partner-specific configuration for users from other organizations accessing your resources via Microsoft Entra B2B collaboration.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bCollaborationInbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bCollaborationInbound;
    }

    /**
     * Gets the b2bCollaborationOutbound property value. Defines your partner-specific configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B collaboration.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bCollaborationOutbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bCollaborationOutbound;
    }

    /**
     * Gets the b2bDirectConnectInbound property value. Defines your partner-specific configuration for users from other organizations accessing your resources via Azure B2B direct connect.
     * @return CrossTenantAccessPolicyB2BSetting|null
    */
    public function getB2bDirectConnectInbound(): ?CrossTenantAccessPolicyB2BSetting {
        return $this->b2bDirectConnectInbound;
    }

    /**
     * Gets the b2bDirectConnectOutbound property value. Defines your partner-specific configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B direct connect.
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
        return  [
            'appServiceConnectInbound' => fn(ParseNode $n) => $o->setAppServiceConnectInbound($n->getObjectValue([CrossTenantAccessPolicyAppServiceConnectSetting::class, 'createFromDiscriminatorValue'])),
            'automaticUserConsentSettings' => fn(ParseNode $n) => $o->setAutomaticUserConsentSettings($n->getObjectValue([InboundOutboundPolicyConfiguration::class, 'createFromDiscriminatorValue'])),
            'b2bCollaborationInbound' => fn(ParseNode $n) => $o->setB2bCollaborationInbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'b2bCollaborationOutbound' => fn(ParseNode $n) => $o->setB2bCollaborationOutbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'b2bDirectConnectInbound' => fn(ParseNode $n) => $o->setB2bDirectConnectInbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'b2bDirectConnectOutbound' => fn(ParseNode $n) => $o->setB2bDirectConnectOutbound($n->getObjectValue([CrossTenantAccessPolicyB2BSetting::class, 'createFromDiscriminatorValue'])),
            'identitySynchronization' => fn(ParseNode $n) => $o->setIdentitySynchronization($n->getObjectValue([CrossTenantIdentitySyncPolicyPartner::class, 'createFromDiscriminatorValue'])),
            'inboundTrust' => fn(ParseNode $n) => $o->setInboundTrust($n->getObjectValue([CrossTenantAccessPolicyInboundTrust::class, 'createFromDiscriminatorValue'])),
            'isInMultiTenantOrganization' => fn(ParseNode $n) => $o->setIsInMultiTenantOrganization($n->getBooleanValue()),
            'isServiceProvider' => fn(ParseNode $n) => $o->setIsServiceProvider($n->getBooleanValue()),
            'm365Capabilities' => fn(ParseNode $n) => $o->setM365Capabilities($n->getCollectionOfObjectValues([M365CapabilityBase::class, 'createFromDiscriminatorValue'])),
            'm365CollaborationInbound' => fn(ParseNode $n) => $o->setM365CollaborationInbound($n->getObjectValue([CrossTenantAccessPolicyM365CollaborationInboundSetting::class, 'createFromDiscriminatorValue'])),
            'm365CollaborationOutbound' => fn(ParseNode $n) => $o->setM365CollaborationOutbound($n->getObjectValue([CrossTenantAccessPolicyM365CollaborationOutboundSetting::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'serviceProviderConstraints' => fn(ParseNode $n) => $o->setServiceProviderConstraints($n->getObjectValue([ServiceProviderConstraints::class, 'createFromDiscriminatorValue'])),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'tenantRestrictions' => fn(ParseNode $n) => $o->setTenantRestrictions($n->getObjectValue([CrossTenantAccessPolicyTenantRestrictions::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the identitySynchronization property value. Defines the cross-tenant policy for the synchronization of users from a partner tenant. Use this user synchronization policy to streamline collaboration between users in a multitenant organization by automating the creation, update, and deletion of users from one tenant to another.
     * @return CrossTenantIdentitySyncPolicyPartner|null
    */
    public function getIdentitySynchronization(): ?CrossTenantIdentitySyncPolicyPartner {
        return $this->identitySynchronization;
    }

    /**
     * Gets the inboundTrust property value. Determines the partner-specific configuration for trusting other Conditional Access claims from external Microsoft Entra organizations.
     * @return CrossTenantAccessPolicyInboundTrust|null
    */
    public function getInboundTrust(): ?CrossTenantAccessPolicyInboundTrust {
        return $this->inboundTrust;
    }

    /**
     * Gets the isInMultiTenantOrganization property value. Identifies whether a tenant is a member of a multitenant organization.
     * @return bool|null
    */
    public function getIsInMultiTenantOrganization(): ?bool {
        return $this->isInMultiTenantOrganization;
    }

    /**
     * Gets the isServiceProvider property value. Identifies whether the partner-specific configuration is a Cloud Service Provider for your organization.
     * @return bool|null
    */
    public function getIsServiceProvider(): ?bool {
        return $this->isServiceProvider;
    }

    /**
     * Gets the m365Capabilities property value. Defines the partner-specific Microsoft 365 cross-tenant capabilities for inbound access from the partner organization.
     * @return array<M365CapabilityBase>|null
    */
    public function getM365Capabilities(): ?array {
        return $this->m365Capabilities;
    }

    /**
     * Gets the m365CollaborationInbound property value. Defines your partner-specific configuration for inbound Microsoft 365 collaboration settings that determine which users from the partner organization can collaborate with your organization using Microsoft 365 apps.
     * @return CrossTenantAccessPolicyM365CollaborationInboundSetting|null
    */
    public function getM365CollaborationInbound(): ?CrossTenantAccessPolicyM365CollaborationInboundSetting {
        return $this->m365CollaborationInbound;
    }

    /**
     * Gets the m365CollaborationOutbound property value. Defines your partner-specific configuration for outbound Microsoft 365 collaboration settings that determine which users in your organization can collaborate with the partner organization using Microsoft 365 apps.
     * @return CrossTenantAccessPolicyM365CollaborationOutboundSetting|null
    */
    public function getM365CollaborationOutbound(): ?CrossTenantAccessPolicyM365CollaborationOutboundSetting {
        return $this->m365CollaborationOutbound;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the serviceProviderConstraints property value. The serviceProviderConstraints property
     * @return ServiceProviderConstraints|null
    */
    public function getServiceProviderConstraints(): ?ServiceProviderConstraints {
        return $this->serviceProviderConstraints;
    }

    /**
     * Gets the tenantId property value. The tenant identifier for the partner Microsoft Entra organization. Read-only. Key.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the tenantRestrictions property value. Defines the partner-specific tenant restrictions configuration for users in your organization who access a partner organization using partner supplied identities on your network or devices.
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
        $writer->writeObjectValue('appServiceConnectInbound', $this->getAppServiceConnectInbound());
        $writer->writeObjectValue('automaticUserConsentSettings', $this->getAutomaticUserConsentSettings());
        $writer->writeObjectValue('b2bCollaborationInbound', $this->getB2bCollaborationInbound());
        $writer->writeObjectValue('b2bCollaborationOutbound', $this->getB2bCollaborationOutbound());
        $writer->writeObjectValue('b2bDirectConnectInbound', $this->getB2bDirectConnectInbound());
        $writer->writeObjectValue('b2bDirectConnectOutbound', $this->getB2bDirectConnectOutbound());
        $writer->writeObjectValue('identitySynchronization', $this->getIdentitySynchronization());
        $writer->writeObjectValue('inboundTrust', $this->getInboundTrust());
        $writer->writeBooleanValue('isInMultiTenantOrganization', $this->getIsInMultiTenantOrganization());
        $writer->writeBooleanValue('isServiceProvider', $this->getIsServiceProvider());
        $writer->writeCollectionOfObjectValues('m365Capabilities', $this->getM365Capabilities());
        $writer->writeObjectValue('m365CollaborationInbound', $this->getM365CollaborationInbound());
        $writer->writeObjectValue('m365CollaborationOutbound', $this->getM365CollaborationOutbound());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('serviceProviderConstraints', $this->getServiceProviderConstraints());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeObjectValue('tenantRestrictions', $this->getTenantRestrictions());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the appServiceConnectInbound property value. Defines your partner-specific configuration for inbound app service connect settings that control which applications can connect across tenant boundaries with the partner organization.
     * @param CrossTenantAccessPolicyAppServiceConnectSetting|null $value Value to set for the appServiceConnectInbound property.
    */
    public function setAppServiceConnectInbound(?CrossTenantAccessPolicyAppServiceConnectSetting $value): void {
        $this->appServiceConnectInbound = $value;
    }

    /**
     * Sets the automaticUserConsentSettings property value. Determines the partner-specific configuration for automatic user consent settings. Unless specifically configured, the inboundAllowed and outboundAllowed properties are null and inherit from the default settings, which is always false.
     * @param InboundOutboundPolicyConfiguration|null $value Value to set for the automaticUserConsentSettings property.
    */
    public function setAutomaticUserConsentSettings(?InboundOutboundPolicyConfiguration $value): void {
        $this->automaticUserConsentSettings = $value;
    }

    /**
     * Sets the b2bCollaborationInbound property value. Defines your partner-specific configuration for users from other organizations accessing your resources via Microsoft Entra B2B collaboration.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bCollaborationInbound property.
    */
    public function setB2bCollaborationInbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bCollaborationInbound = $value;
    }

    /**
     * Sets the b2bCollaborationOutbound property value. Defines your partner-specific configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B collaboration.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bCollaborationOutbound property.
    */
    public function setB2bCollaborationOutbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bCollaborationOutbound = $value;
    }

    /**
     * Sets the b2bDirectConnectInbound property value. Defines your partner-specific configuration for users from other organizations accessing your resources via Azure B2B direct connect.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bDirectConnectInbound property.
    */
    public function setB2bDirectConnectInbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bDirectConnectInbound = $value;
    }

    /**
     * Sets the b2bDirectConnectOutbound property value. Defines your partner-specific configuration for users in your organization going outbound to access resources in another organization via Microsoft Entra B2B direct connect.
     * @param CrossTenantAccessPolicyB2BSetting|null $value Value to set for the b2bDirectConnectOutbound property.
    */
    public function setB2bDirectConnectOutbound(?CrossTenantAccessPolicyB2BSetting $value): void {
        $this->b2bDirectConnectOutbound = $value;
    }

    /**
     * Sets the identitySynchronization property value. Defines the cross-tenant policy for the synchronization of users from a partner tenant. Use this user synchronization policy to streamline collaboration between users in a multitenant organization by automating the creation, update, and deletion of users from one tenant to another.
     * @param CrossTenantIdentitySyncPolicyPartner|null $value Value to set for the identitySynchronization property.
    */
    public function setIdentitySynchronization(?CrossTenantIdentitySyncPolicyPartner $value): void {
        $this->identitySynchronization = $value;
    }

    /**
     * Sets the inboundTrust property value. Determines the partner-specific configuration for trusting other Conditional Access claims from external Microsoft Entra organizations.
     * @param CrossTenantAccessPolicyInboundTrust|null $value Value to set for the inboundTrust property.
    */
    public function setInboundTrust(?CrossTenantAccessPolicyInboundTrust $value): void {
        $this->inboundTrust = $value;
    }

    /**
     * Sets the isInMultiTenantOrganization property value. Identifies whether a tenant is a member of a multitenant organization.
     * @param bool|null $value Value to set for the isInMultiTenantOrganization property.
    */
    public function setIsInMultiTenantOrganization(?bool $value): void {
        $this->isInMultiTenantOrganization = $value;
    }

    /**
     * Sets the isServiceProvider property value. Identifies whether the partner-specific configuration is a Cloud Service Provider for your organization.
     * @param bool|null $value Value to set for the isServiceProvider property.
    */
    public function setIsServiceProvider(?bool $value): void {
        $this->isServiceProvider = $value;
    }

    /**
     * Sets the m365Capabilities property value. Defines the partner-specific Microsoft 365 cross-tenant capabilities for inbound access from the partner organization.
     * @param array<M365CapabilityBase>|null $value Value to set for the m365Capabilities property.
    */
    public function setM365Capabilities(?array $value): void {
        $this->m365Capabilities = $value;
    }

    /**
     * Sets the m365CollaborationInbound property value. Defines your partner-specific configuration for inbound Microsoft 365 collaboration settings that determine which users from the partner organization can collaborate with your organization using Microsoft 365 apps.
     * @param CrossTenantAccessPolicyM365CollaborationInboundSetting|null $value Value to set for the m365CollaborationInbound property.
    */
    public function setM365CollaborationInbound(?CrossTenantAccessPolicyM365CollaborationInboundSetting $value): void {
        $this->m365CollaborationInbound = $value;
    }

    /**
     * Sets the m365CollaborationOutbound property value. Defines your partner-specific configuration for outbound Microsoft 365 collaboration settings that determine which users in your organization can collaborate with the partner organization using Microsoft 365 apps.
     * @param CrossTenantAccessPolicyM365CollaborationOutboundSetting|null $value Value to set for the m365CollaborationOutbound property.
    */
    public function setM365CollaborationOutbound(?CrossTenantAccessPolicyM365CollaborationOutboundSetting $value): void {
        $this->m365CollaborationOutbound = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the serviceProviderConstraints property value. The serviceProviderConstraints property
     * @param ServiceProviderConstraints|null $value Value to set for the serviceProviderConstraints property.
    */
    public function setServiceProviderConstraints(?ServiceProviderConstraints $value): void {
        $this->serviceProviderConstraints = $value;
    }

    /**
     * Sets the tenantId property value. The tenant identifier for the partner Microsoft Entra organization. Read-only. Key.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the tenantRestrictions property value. Defines the partner-specific tenant restrictions configuration for users in your organization who access a partner organization using partner supplied identities on your network or devices.
     * @param CrossTenantAccessPolicyTenantRestrictions|null $value Value to set for the tenantRestrictions property.
    */
    public function setTenantRestrictions(?CrossTenantAccessPolicyTenantRestrictions $value): void {
        $this->tenantRestrictions = $value;
    }

}
