<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class X509CertificateAuthenticationMethodConfiguration extends AuthenticationMethodConfiguration implements Parsable 
{
    /**
     * @var X509CertificateAuthenticationModeConfiguration|null $authenticationModeConfiguration Defines strong authentication configurations. This configuration includes the default authentication mode and the different rules for strong authentication bindings.
    */
    private ?X509CertificateAuthenticationModeConfiguration $authenticationModeConfiguration = null;
    
    /**
     * @var array<X509CertificateAuthorityScope>|null $certificateAuthorityScopes Defines configuration to allow a group of users to use certificates from specific issuing certificate authorities to successfully authenticate.
    */
    private ?array $certificateAuthorityScopes = null;
    
    /**
     * @var array<X509CertificateUserBinding>|null $certificateUserBindings Defines fields in the X.509 certificate that map to attributes of the Microsoft Entra user object in order to bind the certificate to the user. The priority of the object determines the order in which the binding is carried out. The first binding that matches will be used and the rest ignored.
    */
    private ?array $certificateUserBindings = null;
    
    /**
     * @var X509CertificateCRLValidationConfiguration|null $crlValidationConfiguration The crlValidationConfiguration property
    */
    private ?X509CertificateCRLValidationConfiguration $crlValidationConfiguration = null;
    
    /**
     * @var array<AuthenticationMethodTarget>|null $includeTargets A collection of groups that are enabled to use the authentication method.
    */
    private ?array $includeTargets = null;
    
    /**
     * @var X509CertificateIssuerHintsConfiguration|null $issuerHintsConfiguration Determines whether issuer(CA) hints are sent back to the client side to filter the certificates shown in certificate picker.
    */
    private ?X509CertificateIssuerHintsConfiguration $issuerHintsConfiguration = null;
    
    /**
     * Instantiates a new X509CertificateAuthenticationMethodConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.x509CertificateAuthenticationMethodConfiguration');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return X509CertificateAuthenticationMethodConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): X509CertificateAuthenticationMethodConfiguration {
        return new X509CertificateAuthenticationMethodConfiguration();
    }

    /**
     * Gets the authenticationModeConfiguration property value. Defines strong authentication configurations. This configuration includes the default authentication mode and the different rules for strong authentication bindings.
     * @return X509CertificateAuthenticationModeConfiguration|null
    */
    public function getAuthenticationModeConfiguration(): ?X509CertificateAuthenticationModeConfiguration {
        return $this->authenticationModeConfiguration;
    }

    /**
     * Gets the certificateAuthorityScopes property value. Defines configuration to allow a group of users to use certificates from specific issuing certificate authorities to successfully authenticate.
     * @return array<X509CertificateAuthorityScope>|null
    */
    public function getCertificateAuthorityScopes(): ?array {
        return $this->certificateAuthorityScopes;
    }

    /**
     * Gets the certificateUserBindings property value. Defines fields in the X.509 certificate that map to attributes of the Microsoft Entra user object in order to bind the certificate to the user. The priority of the object determines the order in which the binding is carried out. The first binding that matches will be used and the rest ignored.
     * @return array<X509CertificateUserBinding>|null
    */
    public function getCertificateUserBindings(): ?array {
        return $this->certificateUserBindings;
    }

    /**
     * Gets the crlValidationConfiguration property value. The crlValidationConfiguration property
     * @return X509CertificateCRLValidationConfiguration|null
    */
    public function getCrlValidationConfiguration(): ?X509CertificateCRLValidationConfiguration {
        return $this->crlValidationConfiguration;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'authenticationModeConfiguration' => fn(ParseNode $n) => $o->setAuthenticationModeConfiguration($n->getObjectValue([X509CertificateAuthenticationModeConfiguration::class, 'createFromDiscriminatorValue'])),
            'certificateAuthorityScopes' => fn(ParseNode $n) => $o->setCertificateAuthorityScopes($n->getCollectionOfObjectValues([X509CertificateAuthorityScope::class, 'createFromDiscriminatorValue'])),
            'certificateUserBindings' => fn(ParseNode $n) => $o->setCertificateUserBindings($n->getCollectionOfObjectValues([X509CertificateUserBinding::class, 'createFromDiscriminatorValue'])),
            'crlValidationConfiguration' => fn(ParseNode $n) => $o->setCrlValidationConfiguration($n->getObjectValue([X509CertificateCRLValidationConfiguration::class, 'createFromDiscriminatorValue'])),
            'includeTargets' => fn(ParseNode $n) => $o->setIncludeTargets($n->getCollectionOfObjectValues([AuthenticationMethodTarget::class, 'createFromDiscriminatorValue'])),
            'issuerHintsConfiguration' => fn(ParseNode $n) => $o->setIssuerHintsConfiguration($n->getObjectValue([X509CertificateIssuerHintsConfiguration::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the includeTargets property value. A collection of groups that are enabled to use the authentication method.
     * @return array<AuthenticationMethodTarget>|null
    */
    public function getIncludeTargets(): ?array {
        return $this->includeTargets;
    }

    /**
     * Gets the issuerHintsConfiguration property value. Determines whether issuer(CA) hints are sent back to the client side to filter the certificates shown in certificate picker.
     * @return X509CertificateIssuerHintsConfiguration|null
    */
    public function getIssuerHintsConfiguration(): ?X509CertificateIssuerHintsConfiguration {
        return $this->issuerHintsConfiguration;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('authenticationModeConfiguration', $this->getAuthenticationModeConfiguration());
        $writer->writeCollectionOfObjectValues('certificateAuthorityScopes', $this->getCertificateAuthorityScopes());
        $writer->writeCollectionOfObjectValues('certificateUserBindings', $this->getCertificateUserBindings());
        $writer->writeObjectValue('crlValidationConfiguration', $this->getCrlValidationConfiguration());
        $writer->writeCollectionOfObjectValues('includeTargets', $this->getIncludeTargets());
        $writer->writeObjectValue('issuerHintsConfiguration', $this->getIssuerHintsConfiguration());
    }

    /**
     * Sets the authenticationModeConfiguration property value. Defines strong authentication configurations. This configuration includes the default authentication mode and the different rules for strong authentication bindings.
     * @param X509CertificateAuthenticationModeConfiguration|null $value Value to set for the authenticationModeConfiguration property.
    */
    public function setAuthenticationModeConfiguration(?X509CertificateAuthenticationModeConfiguration $value): void {
        $this->authenticationModeConfiguration = $value;
    }

    /**
     * Sets the certificateAuthorityScopes property value. Defines configuration to allow a group of users to use certificates from specific issuing certificate authorities to successfully authenticate.
     * @param array<X509CertificateAuthorityScope>|null $value Value to set for the certificateAuthorityScopes property.
    */
    public function setCertificateAuthorityScopes(?array $value): void {
        $this->certificateAuthorityScopes = $value;
    }

    /**
     * Sets the certificateUserBindings property value. Defines fields in the X.509 certificate that map to attributes of the Microsoft Entra user object in order to bind the certificate to the user. The priority of the object determines the order in which the binding is carried out. The first binding that matches will be used and the rest ignored.
     * @param array<X509CertificateUserBinding>|null $value Value to set for the certificateUserBindings property.
    */
    public function setCertificateUserBindings(?array $value): void {
        $this->certificateUserBindings = $value;
    }

    /**
     * Sets the crlValidationConfiguration property value. The crlValidationConfiguration property
     * @param X509CertificateCRLValidationConfiguration|null $value Value to set for the crlValidationConfiguration property.
    */
    public function setCrlValidationConfiguration(?X509CertificateCRLValidationConfiguration $value): void {
        $this->crlValidationConfiguration = $value;
    }

    /**
     * Sets the includeTargets property value. A collection of groups that are enabled to use the authentication method.
     * @param array<AuthenticationMethodTarget>|null $value Value to set for the includeTargets property.
    */
    public function setIncludeTargets(?array $value): void {
        $this->includeTargets = $value;
    }

    /**
     * Sets the issuerHintsConfiguration property value. Determines whether issuer(CA) hints are sent back to the client side to filter the certificates shown in certificate picker.
     * @param X509CertificateIssuerHintsConfiguration|null $value Value to set for the issuerHintsConfiguration property.
    */
    public function setIssuerHintsConfiguration(?X509CertificateIssuerHintsConfiguration $value): void {
        $this->issuerHintsConfiguration = $value;
    }

}
