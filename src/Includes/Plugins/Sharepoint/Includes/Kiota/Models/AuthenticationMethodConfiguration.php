<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AuthenticationMethodConfiguration extends Entity implements Parsable 
{
    /**
     * @var array<ExcludeTarget>|null $excludeTargets Groups of users that are excluded from a policy.
    */
    private ?array $excludeTargets = null;
    
    /**
     * @var AuthenticationMethodState|null $state The state of the policy. The possible values are: enabled, disabled.
    */
    private ?AuthenticationMethodState $state = null;
    
    /**
     * Instantiates a new AuthenticationMethodConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AuthenticationMethodConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AuthenticationMethodConfiguration {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.emailAuthenticationMethodConfiguration': return new EmailAuthenticationMethodConfiguration();
                case '#microsoft.graph.externalAuthenticationMethodConfiguration': return new ExternalAuthenticationMethodConfiguration();
                case '#microsoft.graph.fido2AuthenticationMethodConfiguration': return new Fido2AuthenticationMethodConfiguration();
                case '#microsoft.graph.microsoftAuthenticatorAuthenticationMethodConfiguration': return new MicrosoftAuthenticatorAuthenticationMethodConfiguration();
                case '#microsoft.graph.qrCodePinAuthenticationMethodConfiguration': return new QrCodePinAuthenticationMethodConfiguration();
                case '#microsoft.graph.smsAuthenticationMethodConfiguration': return new SmsAuthenticationMethodConfiguration();
                case '#microsoft.graph.softwareOathAuthenticationMethodConfiguration': return new SoftwareOathAuthenticationMethodConfiguration();
                case '#microsoft.graph.temporaryAccessPassAuthenticationMethodConfiguration': return new TemporaryAccessPassAuthenticationMethodConfiguration();
                case '#microsoft.graph.verifiableCredentialsAuthenticationMethodConfiguration': return new VerifiableCredentialsAuthenticationMethodConfiguration();
                case '#microsoft.graph.voiceAuthenticationMethodConfiguration': return new VoiceAuthenticationMethodConfiguration();
                case '#microsoft.graph.x509CertificateAuthenticationMethodConfiguration': return new X509CertificateAuthenticationMethodConfiguration();
            }
        }
        return new AuthenticationMethodConfiguration();
    }

    /**
     * Gets the excludeTargets property value. Groups of users that are excluded from a policy.
     * @return array<ExcludeTarget>|null
    */
    public function getExcludeTargets(): ?array {
        return $this->excludeTargets;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'excludeTargets' => fn(ParseNode $n) => $o->setExcludeTargets($n->getCollectionOfObjectValues([ExcludeTarget::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(AuthenticationMethodState::class)),
        ]);
    }

    /**
     * Gets the state property value. The state of the policy. The possible values are: enabled, disabled.
     * @return AuthenticationMethodState|null
    */
    public function getState(): ?AuthenticationMethodState {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('excludeTargets', $this->getExcludeTargets());
        $writer->writeEnumValue('state', $this->getState());
    }

    /**
     * Sets the excludeTargets property value. Groups of users that are excluded from a policy.
     * @param array<ExcludeTarget>|null $value Value to set for the excludeTargets property.
    */
    public function setExcludeTargets(?array $value): void {
        $this->excludeTargets = $value;
    }

    /**
     * Sets the state property value. The state of the policy. The possible values are: enabled, disabled.
     * @param AuthenticationMethodState|null $value Value to set for the state property.
    */
    public function setState(?AuthenticationMethodState $value): void {
        $this->state = $value;
    }

}
