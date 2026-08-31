<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Fido2AuthenticationMethodConfiguration extends AuthenticationMethodConfiguration implements Parsable 
{
    /**
     * @var string|null $defaultPasskeyProfile The non-deletable baseline passkey profile, within the passkey profile collection. It's automatically created when migrating to passkey profiles and initially mirrors the tenant's legacy global passkey (FIDO2) authentication methods policy settings.
    */
    private ?string $defaultPasskeyProfile = null;
    
    /**
     * @var array<PasskeyAuthenticationMethodTarget>|null $includeTargets A collection of groups that are enabled to use the authentication method.
    */
    private ?array $includeTargets = null;
    
    /**
     * @var bool|null $isAttestationEnforced Determines whether attestation must be enforced for passkey (FIDO2) registration. This property is deprecated and will be removed in October 2027. Use passkeyProfiles property.
    */
    private ?bool $isAttestationEnforced = null;
    
    /**
     * @var bool|null $isSelfServiceRegistrationAllowed Determines if users can register new passkeys (FIDO2).
    */
    private ?bool $isSelfServiceRegistrationAllowed = null;
    
    /**
     * @var Fido2KeyRestrictions|null $keyRestrictions Controls whether key restrictions are enforced on passkeys (FIDO2), either allowing or disallowing certain key types as defined by Authenticator Attestation GUID (AAGUID), an identifier that indicates the type (for example, make and model) of the authenticator. This property is deprecated and will be removed in October 2027. Use the passkeyProfiles property.
    */
    private ?Fido2KeyRestrictions $keyRestrictions = null;
    
    /**
     * @var array<PasskeyProfile>|null $passkeyProfiles A collection of configuration profiles that control the registration of and authentication with passkeys (FIDO2).
    */
    private ?array $passkeyProfiles = null;
    
    /**
     * Instantiates a new Fido2AuthenticationMethodConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.fido2AuthenticationMethodConfiguration');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Fido2AuthenticationMethodConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Fido2AuthenticationMethodConfiguration {
        return new Fido2AuthenticationMethodConfiguration();
    }

    /**
     * Gets the defaultPasskeyProfile property value. The non-deletable baseline passkey profile, within the passkey profile collection. It's automatically created when migrating to passkey profiles and initially mirrors the tenant's legacy global passkey (FIDO2) authentication methods policy settings.
     * @return string|null
    */
    public function getDefaultPasskeyProfile(): ?string {
        return $this->defaultPasskeyProfile;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'defaultPasskeyProfile' => fn(ParseNode $n) => $o->setDefaultPasskeyProfile($n->getStringValue()),
            'includeTargets' => fn(ParseNode $n) => $o->setIncludeTargets($n->getCollectionOfObjectValues([PasskeyAuthenticationMethodTarget::class, 'createFromDiscriminatorValue'])),
            'isAttestationEnforced' => fn(ParseNode $n) => $o->setIsAttestationEnforced($n->getBooleanValue()),
            'isSelfServiceRegistrationAllowed' => fn(ParseNode $n) => $o->setIsSelfServiceRegistrationAllowed($n->getBooleanValue()),
            'keyRestrictions' => fn(ParseNode $n) => $o->setKeyRestrictions($n->getObjectValue([Fido2KeyRestrictions::class, 'createFromDiscriminatorValue'])),
            'passkeyProfiles' => fn(ParseNode $n) => $o->setPasskeyProfiles($n->getCollectionOfObjectValues([PasskeyProfile::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the includeTargets property value. A collection of groups that are enabled to use the authentication method.
     * @return array<PasskeyAuthenticationMethodTarget>|null
    */
    public function getIncludeTargets(): ?array {
        return $this->includeTargets;
    }

    /**
     * Gets the isAttestationEnforced property value. Determines whether attestation must be enforced for passkey (FIDO2) registration. This property is deprecated and will be removed in October 2027. Use passkeyProfiles property.
     * @return bool|null
    */
    public function getIsAttestationEnforced(): ?bool {
        return $this->isAttestationEnforced;
    }

    /**
     * Gets the isSelfServiceRegistrationAllowed property value. Determines if users can register new passkeys (FIDO2).
     * @return bool|null
    */
    public function getIsSelfServiceRegistrationAllowed(): ?bool {
        return $this->isSelfServiceRegistrationAllowed;
    }

    /**
     * Gets the keyRestrictions property value. Controls whether key restrictions are enforced on passkeys (FIDO2), either allowing or disallowing certain key types as defined by Authenticator Attestation GUID (AAGUID), an identifier that indicates the type (for example, make and model) of the authenticator. This property is deprecated and will be removed in October 2027. Use the passkeyProfiles property.
     * @return Fido2KeyRestrictions|null
    */
    public function getKeyRestrictions(): ?Fido2KeyRestrictions {
        return $this->keyRestrictions;
    }

    /**
     * Gets the passkeyProfiles property value. A collection of configuration profiles that control the registration of and authentication with passkeys (FIDO2).
     * @return array<PasskeyProfile>|null
    */
    public function getPasskeyProfiles(): ?array {
        return $this->passkeyProfiles;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('defaultPasskeyProfile', $this->getDefaultPasskeyProfile());
        $writer->writeCollectionOfObjectValues('includeTargets', $this->getIncludeTargets());
        $writer->writeBooleanValue('isAttestationEnforced', $this->getIsAttestationEnforced());
        $writer->writeBooleanValue('isSelfServiceRegistrationAllowed', $this->getIsSelfServiceRegistrationAllowed());
        $writer->writeObjectValue('keyRestrictions', $this->getKeyRestrictions());
        $writer->writeCollectionOfObjectValues('passkeyProfiles', $this->getPasskeyProfiles());
    }

    /**
     * Sets the defaultPasskeyProfile property value. The non-deletable baseline passkey profile, within the passkey profile collection. It's automatically created when migrating to passkey profiles and initially mirrors the tenant's legacy global passkey (FIDO2) authentication methods policy settings.
     * @param string|null $value Value to set for the defaultPasskeyProfile property.
    */
    public function setDefaultPasskeyProfile(?string $value): void {
        $this->defaultPasskeyProfile = $value;
    }

    /**
     * Sets the includeTargets property value. A collection of groups that are enabled to use the authentication method.
     * @param array<PasskeyAuthenticationMethodTarget>|null $value Value to set for the includeTargets property.
    */
    public function setIncludeTargets(?array $value): void {
        $this->includeTargets = $value;
    }

    /**
     * Sets the isAttestationEnforced property value. Determines whether attestation must be enforced for passkey (FIDO2) registration. This property is deprecated and will be removed in October 2027. Use passkeyProfiles property.
     * @param bool|null $value Value to set for the isAttestationEnforced property.
    */
    public function setIsAttestationEnforced(?bool $value): void {
        $this->isAttestationEnforced = $value;
    }

    /**
     * Sets the isSelfServiceRegistrationAllowed property value. Determines if users can register new passkeys (FIDO2).
     * @param bool|null $value Value to set for the isSelfServiceRegistrationAllowed property.
    */
    public function setIsSelfServiceRegistrationAllowed(?bool $value): void {
        $this->isSelfServiceRegistrationAllowed = $value;
    }

    /**
     * Sets the keyRestrictions property value. Controls whether key restrictions are enforced on passkeys (FIDO2), either allowing or disallowing certain key types as defined by Authenticator Attestation GUID (AAGUID), an identifier that indicates the type (for example, make and model) of the authenticator. This property is deprecated and will be removed in October 2027. Use the passkeyProfiles property.
     * @param Fido2KeyRestrictions|null $value Value to set for the keyRestrictions property.
    */
    public function setKeyRestrictions(?Fido2KeyRestrictions $value): void {
        $this->keyRestrictions = $value;
    }

    /**
     * Sets the passkeyProfiles property value. A collection of configuration profiles that control the registration of and authentication with passkeys (FIDO2).
     * @param array<PasskeyProfile>|null $value Value to set for the passkeyProfiles property.
    */
    public function setPasskeyProfiles(?array $value): void {
        $this->passkeyProfiles = $value;
    }

}
