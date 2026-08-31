<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PolicyRoot extends Entity implements Parsable 
{
    /**
     * @var array<ActivityBasedTimeoutPolicy>|null $activityBasedTimeoutPolicies The policy that controls the idle time out for web sessions for applications.
    */
    private ?array $activityBasedTimeoutPolicies = null;
    
    /**
     * @var AdminConsentRequestPolicy|null $adminConsentRequestPolicy The policy by which consent requests are created and managed for the entire tenant.
    */
    private ?AdminConsentRequestPolicy $adminConsentRequestPolicy = null;
    
    /**
     * @var array<AppManagementPolicy>|null $appManagementPolicies The policies that enforce app management restrictions for specific applications and service principals, overriding the defaultAppManagementPolicy.
    */
    private ?array $appManagementPolicies = null;
    
    /**
     * @var AuthenticationFlowsPolicy|null $authenticationFlowsPolicy The policy configuration of the self-service sign-up experience of external users.
    */
    private ?AuthenticationFlowsPolicy $authenticationFlowsPolicy = null;
    
    /**
     * @var AuthenticationMethodsPolicy|null $authenticationMethodsPolicy The authentication methods and the users that are allowed to use them to sign in and perform multifactor authentication (MFA) in Microsoft Entra ID.
    */
    private ?AuthenticationMethodsPolicy $authenticationMethodsPolicy = null;
    
    /**
     * @var array<AuthenticationStrengthPolicy>|null $authenticationStrengthPolicies The authentication method combinations that are to be used in scenarios defined by Microsoft Entra Conditional Access.
    */
    private ?array $authenticationStrengthPolicies = null;
    
    /**
     * @var AuthorizationPolicy|null $authorizationPolicy The policy that controls Microsoft Entra authorization settings.
    */
    private ?AuthorizationPolicy $authorizationPolicy = null;
    
    /**
     * @var array<ClaimsMappingPolicy>|null $claimsMappingPolicies The claim-mapping policies for WS-Fed, SAML, OAuth 2.0, and OpenID Connect protocols, for tokens issued to a specific application.
    */
    private ?array $claimsMappingPolicies = null;
    
    /**
     * @var array<ConditionalAccessPolicy>|null $conditionalAccessPolicies The custom rules that define an access scenario.
    */
    private ?array $conditionalAccessPolicies = null;
    
    /**
     * @var CrossTenantAccessPolicy|null $crossTenantAccessPolicy The custom rules that define an access scenario when interacting with external Microsoft Entra tenants.
    */
    private ?CrossTenantAccessPolicy $crossTenantAccessPolicy = null;
    
    /**
     * @var TenantAppManagementPolicy|null $defaultAppManagementPolicy The tenant-wide policy that enforces app management restrictions for all applications and service principals.
    */
    private ?TenantAppManagementPolicy $defaultAppManagementPolicy = null;
    
    /**
     * @var DeviceRegistrationPolicy|null $deviceRegistrationPolicy The deviceRegistrationPolicy property
    */
    private ?DeviceRegistrationPolicy $deviceRegistrationPolicy = null;
    
    /**
     * @var array<FeatureRolloutPolicy>|null $featureRolloutPolicies The feature rollout policy associated with a directory object.
    */
    private ?array $featureRolloutPolicies = null;
    
    /**
     * @var FederatedTokenValidationPolicy|null $federatedTokenValidationPolicy The federatedTokenValidationPolicy property
    */
    private ?FederatedTokenValidationPolicy $federatedTokenValidationPolicy = null;
    
    /**
     * @var array<HomeRealmDiscoveryPolicy>|null $homeRealmDiscoveryPolicies The policy to control Microsoft Entra authentication behavior for federated users.
    */
    private ?array $homeRealmDiscoveryPolicies = null;
    
    /**
     * @var IdentitySecurityDefaultsEnforcementPolicy|null $identitySecurityDefaultsEnforcementPolicy The policy that represents the security defaults that protect against common attacks.
    */
    private ?IdentitySecurityDefaultsEnforcementPolicy $identitySecurityDefaultsEnforcementPolicy = null;
    
    /**
     * @var OwnerlessGroupPolicy|null $ownerlessGroupPolicy The policy configuration for managing groups that have lost their sole owner.
    */
    private ?OwnerlessGroupPolicy $ownerlessGroupPolicy = null;
    
    /**
     * @var array<PermissionGrantPolicy>|null $permissionGrantPolicies The policy that specifies the conditions under which consent can be granted.
    */
    private ?array $permissionGrantPolicies = null;
    
    /**
     * @var array<UnifiedRoleManagementPolicy>|null $roleManagementPolicies Specifies the various policies associated with scopes and roles.
    */
    private ?array $roleManagementPolicies = null;
    
    /**
     * @var array<UnifiedRoleManagementPolicyAssignment>|null $roleManagementPolicyAssignments The assignment of a role management policy to a role definition object.
    */
    private ?array $roleManagementPolicyAssignments = null;
    
    /**
     * @var array<TokenIssuancePolicy>|null $tokenIssuancePolicies The policy that specifies the characteristics of SAML tokens issued by Microsoft Entra ID.
    */
    private ?array $tokenIssuancePolicies = null;
    
    /**
     * @var array<TokenLifetimePolicy>|null $tokenLifetimePolicies The policy that controls the lifetime of a JWT access token, an ID token, or a SAML 1.1/2.0 token issued by Microsoft Entra ID.
    */
    private ?array $tokenLifetimePolicies = null;
    
    /**
     * Instantiates a new PolicyRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PolicyRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PolicyRoot {
        return new PolicyRoot();
    }

    /**
     * Gets the activityBasedTimeoutPolicies property value. The policy that controls the idle time out for web sessions for applications.
     * @return array<ActivityBasedTimeoutPolicy>|null
    */
    public function getActivityBasedTimeoutPolicies(): ?array {
        return $this->activityBasedTimeoutPolicies;
    }

    /**
     * Gets the adminConsentRequestPolicy property value. The policy by which consent requests are created and managed for the entire tenant.
     * @return AdminConsentRequestPolicy|null
    */
    public function getAdminConsentRequestPolicy(): ?AdminConsentRequestPolicy {
        return $this->adminConsentRequestPolicy;
    }

    /**
     * Gets the appManagementPolicies property value. The policies that enforce app management restrictions for specific applications and service principals, overriding the defaultAppManagementPolicy.
     * @return array<AppManagementPolicy>|null
    */
    public function getAppManagementPolicies(): ?array {
        return $this->appManagementPolicies;
    }

    /**
     * Gets the authenticationFlowsPolicy property value. The policy configuration of the self-service sign-up experience of external users.
     * @return AuthenticationFlowsPolicy|null
    */
    public function getAuthenticationFlowsPolicy(): ?AuthenticationFlowsPolicy {
        return $this->authenticationFlowsPolicy;
    }

    /**
     * Gets the authenticationMethodsPolicy property value. The authentication methods and the users that are allowed to use them to sign in and perform multifactor authentication (MFA) in Microsoft Entra ID.
     * @return AuthenticationMethodsPolicy|null
    */
    public function getAuthenticationMethodsPolicy(): ?AuthenticationMethodsPolicy {
        return $this->authenticationMethodsPolicy;
    }

    /**
     * Gets the authenticationStrengthPolicies property value. The authentication method combinations that are to be used in scenarios defined by Microsoft Entra Conditional Access.
     * @return array<AuthenticationStrengthPolicy>|null
    */
    public function getAuthenticationStrengthPolicies(): ?array {
        return $this->authenticationStrengthPolicies;
    }

    /**
     * Gets the authorizationPolicy property value. The policy that controls Microsoft Entra authorization settings.
     * @return AuthorizationPolicy|null
    */
    public function getAuthorizationPolicy(): ?AuthorizationPolicy {
        return $this->authorizationPolicy;
    }

    /**
     * Gets the claimsMappingPolicies property value. The claim-mapping policies for WS-Fed, SAML, OAuth 2.0, and OpenID Connect protocols, for tokens issued to a specific application.
     * @return array<ClaimsMappingPolicy>|null
    */
    public function getClaimsMappingPolicies(): ?array {
        return $this->claimsMappingPolicies;
    }

    /**
     * Gets the conditionalAccessPolicies property value. The custom rules that define an access scenario.
     * @return array<ConditionalAccessPolicy>|null
    */
    public function getConditionalAccessPolicies(): ?array {
        return $this->conditionalAccessPolicies;
    }

    /**
     * Gets the crossTenantAccessPolicy property value. The custom rules that define an access scenario when interacting with external Microsoft Entra tenants.
     * @return CrossTenantAccessPolicy|null
    */
    public function getCrossTenantAccessPolicy(): ?CrossTenantAccessPolicy {
        return $this->crossTenantAccessPolicy;
    }

    /**
     * Gets the defaultAppManagementPolicy property value. The tenant-wide policy that enforces app management restrictions for all applications and service principals.
     * @return TenantAppManagementPolicy|null
    */
    public function getDefaultAppManagementPolicy(): ?TenantAppManagementPolicy {
        return $this->defaultAppManagementPolicy;
    }

    /**
     * Gets the deviceRegistrationPolicy property value. The deviceRegistrationPolicy property
     * @return DeviceRegistrationPolicy|null
    */
    public function getDeviceRegistrationPolicy(): ?DeviceRegistrationPolicy {
        return $this->deviceRegistrationPolicy;
    }

    /**
     * Gets the featureRolloutPolicies property value. The feature rollout policy associated with a directory object.
     * @return array<FeatureRolloutPolicy>|null
    */
    public function getFeatureRolloutPolicies(): ?array {
        return $this->featureRolloutPolicies;
    }

    /**
     * Gets the federatedTokenValidationPolicy property value. The federatedTokenValidationPolicy property
     * @return FederatedTokenValidationPolicy|null
    */
    public function getFederatedTokenValidationPolicy(): ?FederatedTokenValidationPolicy {
        return $this->federatedTokenValidationPolicy;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activityBasedTimeoutPolicies' => fn(ParseNode $n) => $o->setActivityBasedTimeoutPolicies($n->getCollectionOfObjectValues([ActivityBasedTimeoutPolicy::class, 'createFromDiscriminatorValue'])),
            'adminConsentRequestPolicy' => fn(ParseNode $n) => $o->setAdminConsentRequestPolicy($n->getObjectValue([AdminConsentRequestPolicy::class, 'createFromDiscriminatorValue'])),
            'appManagementPolicies' => fn(ParseNode $n) => $o->setAppManagementPolicies($n->getCollectionOfObjectValues([AppManagementPolicy::class, 'createFromDiscriminatorValue'])),
            'authenticationFlowsPolicy' => fn(ParseNode $n) => $o->setAuthenticationFlowsPolicy($n->getObjectValue([AuthenticationFlowsPolicy::class, 'createFromDiscriminatorValue'])),
            'authenticationMethodsPolicy' => fn(ParseNode $n) => $o->setAuthenticationMethodsPolicy($n->getObjectValue([AuthenticationMethodsPolicy::class, 'createFromDiscriminatorValue'])),
            'authenticationStrengthPolicies' => fn(ParseNode $n) => $o->setAuthenticationStrengthPolicies($n->getCollectionOfObjectValues([AuthenticationStrengthPolicy::class, 'createFromDiscriminatorValue'])),
            'authorizationPolicy' => fn(ParseNode $n) => $o->setAuthorizationPolicy($n->getObjectValue([AuthorizationPolicy::class, 'createFromDiscriminatorValue'])),
            'claimsMappingPolicies' => fn(ParseNode $n) => $o->setClaimsMappingPolicies($n->getCollectionOfObjectValues([ClaimsMappingPolicy::class, 'createFromDiscriminatorValue'])),
            'conditionalAccessPolicies' => fn(ParseNode $n) => $o->setConditionalAccessPolicies($n->getCollectionOfObjectValues([ConditionalAccessPolicy::class, 'createFromDiscriminatorValue'])),
            'crossTenantAccessPolicy' => fn(ParseNode $n) => $o->setCrossTenantAccessPolicy($n->getObjectValue([CrossTenantAccessPolicy::class, 'createFromDiscriminatorValue'])),
            'defaultAppManagementPolicy' => fn(ParseNode $n) => $o->setDefaultAppManagementPolicy($n->getObjectValue([TenantAppManagementPolicy::class, 'createFromDiscriminatorValue'])),
            'deviceRegistrationPolicy' => fn(ParseNode $n) => $o->setDeviceRegistrationPolicy($n->getObjectValue([DeviceRegistrationPolicy::class, 'createFromDiscriminatorValue'])),
            'featureRolloutPolicies' => fn(ParseNode $n) => $o->setFeatureRolloutPolicies($n->getCollectionOfObjectValues([FeatureRolloutPolicy::class, 'createFromDiscriminatorValue'])),
            'federatedTokenValidationPolicy' => fn(ParseNode $n) => $o->setFederatedTokenValidationPolicy($n->getObjectValue([FederatedTokenValidationPolicy::class, 'createFromDiscriminatorValue'])),
            'homeRealmDiscoveryPolicies' => fn(ParseNode $n) => $o->setHomeRealmDiscoveryPolicies($n->getCollectionOfObjectValues([HomeRealmDiscoveryPolicy::class, 'createFromDiscriminatorValue'])),
            'identitySecurityDefaultsEnforcementPolicy' => fn(ParseNode $n) => $o->setIdentitySecurityDefaultsEnforcementPolicy($n->getObjectValue([IdentitySecurityDefaultsEnforcementPolicy::class, 'createFromDiscriminatorValue'])),
            'ownerlessGroupPolicy' => fn(ParseNode $n) => $o->setOwnerlessGroupPolicy($n->getObjectValue([OwnerlessGroupPolicy::class, 'createFromDiscriminatorValue'])),
            'permissionGrantPolicies' => fn(ParseNode $n) => $o->setPermissionGrantPolicies($n->getCollectionOfObjectValues([PermissionGrantPolicy::class, 'createFromDiscriminatorValue'])),
            'roleManagementPolicies' => fn(ParseNode $n) => $o->setRoleManagementPolicies($n->getCollectionOfObjectValues([UnifiedRoleManagementPolicy::class, 'createFromDiscriminatorValue'])),
            'roleManagementPolicyAssignments' => fn(ParseNode $n) => $o->setRoleManagementPolicyAssignments($n->getCollectionOfObjectValues([UnifiedRoleManagementPolicyAssignment::class, 'createFromDiscriminatorValue'])),
            'tokenIssuancePolicies' => fn(ParseNode $n) => $o->setTokenIssuancePolicies($n->getCollectionOfObjectValues([TokenIssuancePolicy::class, 'createFromDiscriminatorValue'])),
            'tokenLifetimePolicies' => fn(ParseNode $n) => $o->setTokenLifetimePolicies($n->getCollectionOfObjectValues([TokenLifetimePolicy::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the homeRealmDiscoveryPolicies property value. The policy to control Microsoft Entra authentication behavior for federated users.
     * @return array<HomeRealmDiscoveryPolicy>|null
    */
    public function getHomeRealmDiscoveryPolicies(): ?array {
        return $this->homeRealmDiscoveryPolicies;
    }

    /**
     * Gets the identitySecurityDefaultsEnforcementPolicy property value. The policy that represents the security defaults that protect against common attacks.
     * @return IdentitySecurityDefaultsEnforcementPolicy|null
    */
    public function getIdentitySecurityDefaultsEnforcementPolicy(): ?IdentitySecurityDefaultsEnforcementPolicy {
        return $this->identitySecurityDefaultsEnforcementPolicy;
    }

    /**
     * Gets the ownerlessGroupPolicy property value. The policy configuration for managing groups that have lost their sole owner.
     * @return OwnerlessGroupPolicy|null
    */
    public function getOwnerlessGroupPolicy(): ?OwnerlessGroupPolicy {
        return $this->ownerlessGroupPolicy;
    }

    /**
     * Gets the permissionGrantPolicies property value. The policy that specifies the conditions under which consent can be granted.
     * @return array<PermissionGrantPolicy>|null
    */
    public function getPermissionGrantPolicies(): ?array {
        return $this->permissionGrantPolicies;
    }

    /**
     * Gets the roleManagementPolicies property value. Specifies the various policies associated with scopes and roles.
     * @return array<UnifiedRoleManagementPolicy>|null
    */
    public function getRoleManagementPolicies(): ?array {
        return $this->roleManagementPolicies;
    }

    /**
     * Gets the roleManagementPolicyAssignments property value. The assignment of a role management policy to a role definition object.
     * @return array<UnifiedRoleManagementPolicyAssignment>|null
    */
    public function getRoleManagementPolicyAssignments(): ?array {
        return $this->roleManagementPolicyAssignments;
    }

    /**
     * Gets the tokenIssuancePolicies property value. The policy that specifies the characteristics of SAML tokens issued by Microsoft Entra ID.
     * @return array<TokenIssuancePolicy>|null
    */
    public function getTokenIssuancePolicies(): ?array {
        return $this->tokenIssuancePolicies;
    }

    /**
     * Gets the tokenLifetimePolicies property value. The policy that controls the lifetime of a JWT access token, an ID token, or a SAML 1.1/2.0 token issued by Microsoft Entra ID.
     * @return array<TokenLifetimePolicy>|null
    */
    public function getTokenLifetimePolicies(): ?array {
        return $this->tokenLifetimePolicies;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('activityBasedTimeoutPolicies', $this->getActivityBasedTimeoutPolicies());
        $writer->writeObjectValue('adminConsentRequestPolicy', $this->getAdminConsentRequestPolicy());
        $writer->writeCollectionOfObjectValues('appManagementPolicies', $this->getAppManagementPolicies());
        $writer->writeObjectValue('authenticationFlowsPolicy', $this->getAuthenticationFlowsPolicy());
        $writer->writeObjectValue('authenticationMethodsPolicy', $this->getAuthenticationMethodsPolicy());
        $writer->writeCollectionOfObjectValues('authenticationStrengthPolicies', $this->getAuthenticationStrengthPolicies());
        $writer->writeObjectValue('authorizationPolicy', $this->getAuthorizationPolicy());
        $writer->writeCollectionOfObjectValues('claimsMappingPolicies', $this->getClaimsMappingPolicies());
        $writer->writeCollectionOfObjectValues('conditionalAccessPolicies', $this->getConditionalAccessPolicies());
        $writer->writeObjectValue('crossTenantAccessPolicy', $this->getCrossTenantAccessPolicy());
        $writer->writeObjectValue('defaultAppManagementPolicy', $this->getDefaultAppManagementPolicy());
        $writer->writeObjectValue('deviceRegistrationPolicy', $this->getDeviceRegistrationPolicy());
        $writer->writeCollectionOfObjectValues('featureRolloutPolicies', $this->getFeatureRolloutPolicies());
        $writer->writeObjectValue('federatedTokenValidationPolicy', $this->getFederatedTokenValidationPolicy());
        $writer->writeCollectionOfObjectValues('homeRealmDiscoveryPolicies', $this->getHomeRealmDiscoveryPolicies());
        $writer->writeObjectValue('identitySecurityDefaultsEnforcementPolicy', $this->getIdentitySecurityDefaultsEnforcementPolicy());
        $writer->writeObjectValue('ownerlessGroupPolicy', $this->getOwnerlessGroupPolicy());
        $writer->writeCollectionOfObjectValues('permissionGrantPolicies', $this->getPermissionGrantPolicies());
        $writer->writeCollectionOfObjectValues('roleManagementPolicies', $this->getRoleManagementPolicies());
        $writer->writeCollectionOfObjectValues('roleManagementPolicyAssignments', $this->getRoleManagementPolicyAssignments());
        $writer->writeCollectionOfObjectValues('tokenIssuancePolicies', $this->getTokenIssuancePolicies());
        $writer->writeCollectionOfObjectValues('tokenLifetimePolicies', $this->getTokenLifetimePolicies());
    }

    /**
     * Sets the activityBasedTimeoutPolicies property value. The policy that controls the idle time out for web sessions for applications.
     * @param array<ActivityBasedTimeoutPolicy>|null $value Value to set for the activityBasedTimeoutPolicies property.
    */
    public function setActivityBasedTimeoutPolicies(?array $value): void {
        $this->activityBasedTimeoutPolicies = $value;
    }

    /**
     * Sets the adminConsentRequestPolicy property value. The policy by which consent requests are created and managed for the entire tenant.
     * @param AdminConsentRequestPolicy|null $value Value to set for the adminConsentRequestPolicy property.
    */
    public function setAdminConsentRequestPolicy(?AdminConsentRequestPolicy $value): void {
        $this->adminConsentRequestPolicy = $value;
    }

    /**
     * Sets the appManagementPolicies property value. The policies that enforce app management restrictions for specific applications and service principals, overriding the defaultAppManagementPolicy.
     * @param array<AppManagementPolicy>|null $value Value to set for the appManagementPolicies property.
    */
    public function setAppManagementPolicies(?array $value): void {
        $this->appManagementPolicies = $value;
    }

    /**
     * Sets the authenticationFlowsPolicy property value. The policy configuration of the self-service sign-up experience of external users.
     * @param AuthenticationFlowsPolicy|null $value Value to set for the authenticationFlowsPolicy property.
    */
    public function setAuthenticationFlowsPolicy(?AuthenticationFlowsPolicy $value): void {
        $this->authenticationFlowsPolicy = $value;
    }

    /**
     * Sets the authenticationMethodsPolicy property value. The authentication methods and the users that are allowed to use them to sign in and perform multifactor authentication (MFA) in Microsoft Entra ID.
     * @param AuthenticationMethodsPolicy|null $value Value to set for the authenticationMethodsPolicy property.
    */
    public function setAuthenticationMethodsPolicy(?AuthenticationMethodsPolicy $value): void {
        $this->authenticationMethodsPolicy = $value;
    }

    /**
     * Sets the authenticationStrengthPolicies property value. The authentication method combinations that are to be used in scenarios defined by Microsoft Entra Conditional Access.
     * @param array<AuthenticationStrengthPolicy>|null $value Value to set for the authenticationStrengthPolicies property.
    */
    public function setAuthenticationStrengthPolicies(?array $value): void {
        $this->authenticationStrengthPolicies = $value;
    }

    /**
     * Sets the authorizationPolicy property value. The policy that controls Microsoft Entra authorization settings.
     * @param AuthorizationPolicy|null $value Value to set for the authorizationPolicy property.
    */
    public function setAuthorizationPolicy(?AuthorizationPolicy $value): void {
        $this->authorizationPolicy = $value;
    }

    /**
     * Sets the claimsMappingPolicies property value. The claim-mapping policies for WS-Fed, SAML, OAuth 2.0, and OpenID Connect protocols, for tokens issued to a specific application.
     * @param array<ClaimsMappingPolicy>|null $value Value to set for the claimsMappingPolicies property.
    */
    public function setClaimsMappingPolicies(?array $value): void {
        $this->claimsMappingPolicies = $value;
    }

    /**
     * Sets the conditionalAccessPolicies property value. The custom rules that define an access scenario.
     * @param array<ConditionalAccessPolicy>|null $value Value to set for the conditionalAccessPolicies property.
    */
    public function setConditionalAccessPolicies(?array $value): void {
        $this->conditionalAccessPolicies = $value;
    }

    /**
     * Sets the crossTenantAccessPolicy property value. The custom rules that define an access scenario when interacting with external Microsoft Entra tenants.
     * @param CrossTenantAccessPolicy|null $value Value to set for the crossTenantAccessPolicy property.
    */
    public function setCrossTenantAccessPolicy(?CrossTenantAccessPolicy $value): void {
        $this->crossTenantAccessPolicy = $value;
    }

    /**
     * Sets the defaultAppManagementPolicy property value. The tenant-wide policy that enforces app management restrictions for all applications and service principals.
     * @param TenantAppManagementPolicy|null $value Value to set for the defaultAppManagementPolicy property.
    */
    public function setDefaultAppManagementPolicy(?TenantAppManagementPolicy $value): void {
        $this->defaultAppManagementPolicy = $value;
    }

    /**
     * Sets the deviceRegistrationPolicy property value. The deviceRegistrationPolicy property
     * @param DeviceRegistrationPolicy|null $value Value to set for the deviceRegistrationPolicy property.
    */
    public function setDeviceRegistrationPolicy(?DeviceRegistrationPolicy $value): void {
        $this->deviceRegistrationPolicy = $value;
    }

    /**
     * Sets the featureRolloutPolicies property value. The feature rollout policy associated with a directory object.
     * @param array<FeatureRolloutPolicy>|null $value Value to set for the featureRolloutPolicies property.
    */
    public function setFeatureRolloutPolicies(?array $value): void {
        $this->featureRolloutPolicies = $value;
    }

    /**
     * Sets the federatedTokenValidationPolicy property value. The federatedTokenValidationPolicy property
     * @param FederatedTokenValidationPolicy|null $value Value to set for the federatedTokenValidationPolicy property.
    */
    public function setFederatedTokenValidationPolicy(?FederatedTokenValidationPolicy $value): void {
        $this->federatedTokenValidationPolicy = $value;
    }

    /**
     * Sets the homeRealmDiscoveryPolicies property value. The policy to control Microsoft Entra authentication behavior for federated users.
     * @param array<HomeRealmDiscoveryPolicy>|null $value Value to set for the homeRealmDiscoveryPolicies property.
    */
    public function setHomeRealmDiscoveryPolicies(?array $value): void {
        $this->homeRealmDiscoveryPolicies = $value;
    }

    /**
     * Sets the identitySecurityDefaultsEnforcementPolicy property value. The policy that represents the security defaults that protect against common attacks.
     * @param IdentitySecurityDefaultsEnforcementPolicy|null $value Value to set for the identitySecurityDefaultsEnforcementPolicy property.
    */
    public function setIdentitySecurityDefaultsEnforcementPolicy(?IdentitySecurityDefaultsEnforcementPolicy $value): void {
        $this->identitySecurityDefaultsEnforcementPolicy = $value;
    }

    /**
     * Sets the ownerlessGroupPolicy property value. The policy configuration for managing groups that have lost their sole owner.
     * @param OwnerlessGroupPolicy|null $value Value to set for the ownerlessGroupPolicy property.
    */
    public function setOwnerlessGroupPolicy(?OwnerlessGroupPolicy $value): void {
        $this->ownerlessGroupPolicy = $value;
    }

    /**
     * Sets the permissionGrantPolicies property value. The policy that specifies the conditions under which consent can be granted.
     * @param array<PermissionGrantPolicy>|null $value Value to set for the permissionGrantPolicies property.
    */
    public function setPermissionGrantPolicies(?array $value): void {
        $this->permissionGrantPolicies = $value;
    }

    /**
     * Sets the roleManagementPolicies property value. Specifies the various policies associated with scopes and roles.
     * @param array<UnifiedRoleManagementPolicy>|null $value Value to set for the roleManagementPolicies property.
    */
    public function setRoleManagementPolicies(?array $value): void {
        $this->roleManagementPolicies = $value;
    }

    /**
     * Sets the roleManagementPolicyAssignments property value. The assignment of a role management policy to a role definition object.
     * @param array<UnifiedRoleManagementPolicyAssignment>|null $value Value to set for the roleManagementPolicyAssignments property.
    */
    public function setRoleManagementPolicyAssignments(?array $value): void {
        $this->roleManagementPolicyAssignments = $value;
    }

    /**
     * Sets the tokenIssuancePolicies property value. The policy that specifies the characteristics of SAML tokens issued by Microsoft Entra ID.
     * @param array<TokenIssuancePolicy>|null $value Value to set for the tokenIssuancePolicies property.
    */
    public function setTokenIssuancePolicies(?array $value): void {
        $this->tokenIssuancePolicies = $value;
    }

    /**
     * Sets the tokenLifetimePolicies property value. The policy that controls the lifetime of a JWT access token, an ID token, or a SAML 1.1/2.0 token issued by Microsoft Entra ID.
     * @param array<TokenLifetimePolicy>|null $value Value to set for the tokenLifetimePolicies property.
    */
    public function setTokenLifetimePolicies(?array $value): void {
        $this->tokenLifetimePolicies = $value;
    }

}
