<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\Date;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class ApplicationRiskFactorSecurityInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ApplicationRiskFactorCertificateInfo|null $certificate The certificate property
    */
    private ?ApplicationRiskFactorCertificateInfo $certificate = null;
    
    /**
     * @var string|null $domainToCheck Specifies the domain or hostname evaluated during the security assessment.
    */
    private ?string $domainToCheck = null;
    
    /**
     * @var bool|null $hasAdminAuditTrail Indicates whether the application maintains an audit trail for administrative actions.
    */
    private ?bool $hasAdminAuditTrail = null;
    
    /**
     * @var bool|null $hasAnonymousUsage Indicates whether the application allows anonymous or unauthenticated usage.
    */
    private ?bool $hasAnonymousUsage = null;
    
    /**
     * @var bool|null $hasDataAuditTrail Indicates whether the application logs access or modification of customer data for audit purposes.
    */
    private ?bool $hasDataAuditTrail = null;
    
    /**
     * @var bool|null $hasDataClassification Indicates whether the application classifies and labels data based on sensitivity levels.
    */
    private ?bool $hasDataClassification = null;
    
    /**
     * @var bool|null $hasDataEncrypted Indicates whether data at rest and in transit are encrypted using approved algorithms.
    */
    private ?bool $hasDataEncrypted = null;
    
    /**
     * @var bool|null $hasEnforceTransportEnc Indicates whether HTTPS or equivalent secure transport is enforced for all communication channels.
    */
    private ?bool $hasEnforceTransportEnc = null;
    
    /**
     * @var bool|null $hasIpRestriction Indicates whether access to the application can be restricted based on IP address or network range.
    */
    private ?bool $hasIpRestriction = null;
    
    /**
     * @var bool|null $hasMFA Indicates whether the application supports or enforces multi-factor authentication (MFA).
    */
    private ?bool $hasMFA = null;
    
    /**
     * @var bool|null $hasPenTest Indicates whether the application undergoes periodic penetration testing or external security reviews.
    */
    private ?bool $hasPenTest = null;
    
    /**
     * @var bool|null $hasRememberPassword Indicates whether the application supports password-saving functionality, which may pose a security risk.
    */
    private ?bool $hasRememberPassword = null;
    
    /**
     * @var bool|null $hasSamlSupport Indicates whether the application supports SAML-based single sign-on (SSO).
    */
    private ?bool $hasSamlSupport = null;
    
    /**
     * @var bool|null $hasUserAuditLogs Indicates whether user activity is logged for security or compliance monitoring.
    */
    private ?bool $hasUserAuditLogs = null;
    
    /**
     * @var bool|null $hasUserDataUpload Indicates whether users can upload or store personal or organizational data within the application.
    */
    private ?bool $hasUserDataUpload = null;
    
    /**
     * @var bool|null $hasUserRolesSupport Indicates whether the application supports role-based access control (RBAC).
    */
    private ?bool $hasUserRolesSupport = null;
    
    /**
     * @var bool|null $hasValidCertName Indicates whether the certificate’s common name matches the application’s verified domain.
    */
    private ?bool $hasValidCertName = null;
    
    /**
     * @var array<string>|null $httpsSecurityHeaders Lists the HTTP security headers detected for the application (for example, HSTS, X-Frame-Options, or CSP).
    */
    private ?array $httpsSecurityHeaders = null;
    
    /**
     * @var bool|null $isCertTrusted Indicates whether the application’s certificate is signed by a trusted certificate authority (CA).
    */
    private ?bool $isCertTrusted = null;
    
    /**
     * @var bool|null $isDrownVulnerable Indicates whether the application is vulnerable to the DROWN (Decrypting RSA with Obsolete and Weakened eNcryption) attack.
    */
    private ?bool $isDrownVulnerable = null;
    
    /**
     * @var bool|null $isHeartbleedProof Indicates whether the application’s SSL implementation is protected from the Heartbleed vulnerability.
    */
    private ?bool $isHeartbleedProof = null;
    
    /**
     * @var Date|null $lastBreachDate Specifies the date of the last publicly reported data breach or security incident related to the application, if known.
    */
    private ?Date $lastBreachDate = null;
    
    /**
     * @var SslVersion|null $latestValidSSL The latestValidSSL property
    */
    private ?SslVersion $latestValidSSL = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var PasswordPolicy|null $passwordPolicy The passwordPolicy property
    */
    private ?PasswordPolicy $passwordPolicy = null;
    
    /**
     * @var RestEncryptionType|null $restEncryptionType The restEncryptionType property
    */
    private ?RestEncryptionType $restEncryptionType = null;
    
    /**
     * Instantiates a new ApplicationRiskFactorSecurityInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApplicationRiskFactorSecurityInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApplicationRiskFactorSecurityInfo {
        return new ApplicationRiskFactorSecurityInfo();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the certificate property value. The certificate property
     * @return ApplicationRiskFactorCertificateInfo|null
    */
    public function getCertificate(): ?ApplicationRiskFactorCertificateInfo {
        return $this->certificate;
    }

    /**
     * Gets the domainToCheck property value. Specifies the domain or hostname evaluated during the security assessment.
     * @return string|null
    */
    public function getDomainToCheck(): ?string {
        return $this->domainToCheck;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'certificate' => fn(ParseNode $n) => $o->setCertificate($n->getObjectValue([ApplicationRiskFactorCertificateInfo::class, 'createFromDiscriminatorValue'])),
            'domainToCheck' => fn(ParseNode $n) => $o->setDomainToCheck($n->getStringValue()),
            'hasAdminAuditTrail' => fn(ParseNode $n) => $o->setHasAdminAuditTrail($n->getBooleanValue()),
            'hasAnonymousUsage' => fn(ParseNode $n) => $o->setHasAnonymousUsage($n->getBooleanValue()),
            'hasDataAuditTrail' => fn(ParseNode $n) => $o->setHasDataAuditTrail($n->getBooleanValue()),
            'hasDataClassification' => fn(ParseNode $n) => $o->setHasDataClassification($n->getBooleanValue()),
            'hasDataEncrypted' => fn(ParseNode $n) => $o->setHasDataEncrypted($n->getBooleanValue()),
            'hasEnforceTransportEnc' => fn(ParseNode $n) => $o->setHasEnforceTransportEnc($n->getBooleanValue()),
            'hasIpRestriction' => fn(ParseNode $n) => $o->setHasIpRestriction($n->getBooleanValue()),
            'hasMFA' => fn(ParseNode $n) => $o->setHasMFA($n->getBooleanValue()),
            'hasPenTest' => fn(ParseNode $n) => $o->setHasPenTest($n->getBooleanValue()),
            'hasRememberPassword' => fn(ParseNode $n) => $o->setHasRememberPassword($n->getBooleanValue()),
            'hasSamlSupport' => fn(ParseNode $n) => $o->setHasSamlSupport($n->getBooleanValue()),
            'hasUserAuditLogs' => fn(ParseNode $n) => $o->setHasUserAuditLogs($n->getBooleanValue()),
            'hasUserDataUpload' => fn(ParseNode $n) => $o->setHasUserDataUpload($n->getBooleanValue()),
            'hasUserRolesSupport' => fn(ParseNode $n) => $o->setHasUserRolesSupport($n->getBooleanValue()),
            'hasValidCertName' => fn(ParseNode $n) => $o->setHasValidCertName($n->getBooleanValue()),
            'httpsSecurityHeaders' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setHttpsSecurityHeaders($val);
            },
            'isCertTrusted' => fn(ParseNode $n) => $o->setIsCertTrusted($n->getBooleanValue()),
            'isDrownVulnerable' => fn(ParseNode $n) => $o->setIsDrownVulnerable($n->getBooleanValue()),
            'isHeartbleedProof' => fn(ParseNode $n) => $o->setIsHeartbleedProof($n->getBooleanValue()),
            'lastBreachDate' => fn(ParseNode $n) => $o->setLastBreachDate($n->getDateValue()),
            'latestValidSSL' => fn(ParseNode $n) => $o->setLatestValidSSL($n->getEnumValue(SslVersion::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'passwordPolicy' => fn(ParseNode $n) => $o->setPasswordPolicy($n->getEnumValue(PasswordPolicy::class)),
            'restEncryptionType' => fn(ParseNode $n) => $o->setRestEncryptionType($n->getEnumValue(RestEncryptionType::class)),
        ];
    }

    /**
     * Gets the hasAdminAuditTrail property value. Indicates whether the application maintains an audit trail for administrative actions.
     * @return bool|null
    */
    public function getHasAdminAuditTrail(): ?bool {
        return $this->hasAdminAuditTrail;
    }

    /**
     * Gets the hasAnonymousUsage property value. Indicates whether the application allows anonymous or unauthenticated usage.
     * @return bool|null
    */
    public function getHasAnonymousUsage(): ?bool {
        return $this->hasAnonymousUsage;
    }

    /**
     * Gets the hasDataAuditTrail property value. Indicates whether the application logs access or modification of customer data for audit purposes.
     * @return bool|null
    */
    public function getHasDataAuditTrail(): ?bool {
        return $this->hasDataAuditTrail;
    }

    /**
     * Gets the hasDataClassification property value. Indicates whether the application classifies and labels data based on sensitivity levels.
     * @return bool|null
    */
    public function getHasDataClassification(): ?bool {
        return $this->hasDataClassification;
    }

    /**
     * Gets the hasDataEncrypted property value. Indicates whether data at rest and in transit are encrypted using approved algorithms.
     * @return bool|null
    */
    public function getHasDataEncrypted(): ?bool {
        return $this->hasDataEncrypted;
    }

    /**
     * Gets the hasEnforceTransportEnc property value. Indicates whether HTTPS or equivalent secure transport is enforced for all communication channels.
     * @return bool|null
    */
    public function getHasEnforceTransportEnc(): ?bool {
        return $this->hasEnforceTransportEnc;
    }

    /**
     * Gets the hasIpRestriction property value. Indicates whether access to the application can be restricted based on IP address or network range.
     * @return bool|null
    */
    public function getHasIpRestriction(): ?bool {
        return $this->hasIpRestriction;
    }

    /**
     * Gets the hasMFA property value. Indicates whether the application supports or enforces multi-factor authentication (MFA).
     * @return bool|null
    */
    public function getHasMFA(): ?bool {
        return $this->hasMFA;
    }

    /**
     * Gets the hasPenTest property value. Indicates whether the application undergoes periodic penetration testing or external security reviews.
     * @return bool|null
    */
    public function getHasPenTest(): ?bool {
        return $this->hasPenTest;
    }

    /**
     * Gets the hasRememberPassword property value. Indicates whether the application supports password-saving functionality, which may pose a security risk.
     * @return bool|null
    */
    public function getHasRememberPassword(): ?bool {
        return $this->hasRememberPassword;
    }

    /**
     * Gets the hasSamlSupport property value. Indicates whether the application supports SAML-based single sign-on (SSO).
     * @return bool|null
    */
    public function getHasSamlSupport(): ?bool {
        return $this->hasSamlSupport;
    }

    /**
     * Gets the hasUserAuditLogs property value. Indicates whether user activity is logged for security or compliance monitoring.
     * @return bool|null
    */
    public function getHasUserAuditLogs(): ?bool {
        return $this->hasUserAuditLogs;
    }

    /**
     * Gets the hasUserDataUpload property value. Indicates whether users can upload or store personal or organizational data within the application.
     * @return bool|null
    */
    public function getHasUserDataUpload(): ?bool {
        return $this->hasUserDataUpload;
    }

    /**
     * Gets the hasUserRolesSupport property value. Indicates whether the application supports role-based access control (RBAC).
     * @return bool|null
    */
    public function getHasUserRolesSupport(): ?bool {
        return $this->hasUserRolesSupport;
    }

    /**
     * Gets the hasValidCertName property value. Indicates whether the certificate’s common name matches the application’s verified domain.
     * @return bool|null
    */
    public function getHasValidCertName(): ?bool {
        return $this->hasValidCertName;
    }

    /**
     * Gets the httpsSecurityHeaders property value. Lists the HTTP security headers detected for the application (for example, HSTS, X-Frame-Options, or CSP).
     * @return array<string>|null
    */
    public function getHttpsSecurityHeaders(): ?array {
        return $this->httpsSecurityHeaders;
    }

    /**
     * Gets the isCertTrusted property value. Indicates whether the application’s certificate is signed by a trusted certificate authority (CA).
     * @return bool|null
    */
    public function getIsCertTrusted(): ?bool {
        return $this->isCertTrusted;
    }

    /**
     * Gets the isDrownVulnerable property value. Indicates whether the application is vulnerable to the DROWN (Decrypting RSA with Obsolete and Weakened eNcryption) attack.
     * @return bool|null
    */
    public function getIsDrownVulnerable(): ?bool {
        return $this->isDrownVulnerable;
    }

    /**
     * Gets the isHeartbleedProof property value. Indicates whether the application’s SSL implementation is protected from the Heartbleed vulnerability.
     * @return bool|null
    */
    public function getIsHeartbleedProof(): ?bool {
        return $this->isHeartbleedProof;
    }

    /**
     * Gets the lastBreachDate property value. Specifies the date of the last publicly reported data breach or security incident related to the application, if known.
     * @return Date|null
    */
    public function getLastBreachDate(): ?Date {
        return $this->lastBreachDate;
    }

    /**
     * Gets the latestValidSSL property value. The latestValidSSL property
     * @return SslVersion|null
    */
    public function getLatestValidSSL(): ?SslVersion {
        return $this->latestValidSSL;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the passwordPolicy property value. The passwordPolicy property
     * @return PasswordPolicy|null
    */
    public function getPasswordPolicy(): ?PasswordPolicy {
        return $this->passwordPolicy;
    }

    /**
     * Gets the restEncryptionType property value. The restEncryptionType property
     * @return RestEncryptionType|null
    */
    public function getRestEncryptionType(): ?RestEncryptionType {
        return $this->restEncryptionType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('certificate', $this->getCertificate());
        $writer->writeStringValue('domainToCheck', $this->getDomainToCheck());
        $writer->writeBooleanValue('hasAdminAuditTrail', $this->getHasAdminAuditTrail());
        $writer->writeBooleanValue('hasAnonymousUsage', $this->getHasAnonymousUsage());
        $writer->writeBooleanValue('hasDataAuditTrail', $this->getHasDataAuditTrail());
        $writer->writeBooleanValue('hasDataClassification', $this->getHasDataClassification());
        $writer->writeBooleanValue('hasDataEncrypted', $this->getHasDataEncrypted());
        $writer->writeBooleanValue('hasEnforceTransportEnc', $this->getHasEnforceTransportEnc());
        $writer->writeBooleanValue('hasIpRestriction', $this->getHasIpRestriction());
        $writer->writeBooleanValue('hasMFA', $this->getHasMFA());
        $writer->writeBooleanValue('hasPenTest', $this->getHasPenTest());
        $writer->writeBooleanValue('hasRememberPassword', $this->getHasRememberPassword());
        $writer->writeBooleanValue('hasSamlSupport', $this->getHasSamlSupport());
        $writer->writeBooleanValue('hasUserAuditLogs', $this->getHasUserAuditLogs());
        $writer->writeBooleanValue('hasUserDataUpload', $this->getHasUserDataUpload());
        $writer->writeBooleanValue('hasUserRolesSupport', $this->getHasUserRolesSupport());
        $writer->writeBooleanValue('hasValidCertName', $this->getHasValidCertName());
        $writer->writeCollectionOfPrimitiveValues('httpsSecurityHeaders', $this->getHttpsSecurityHeaders());
        $writer->writeBooleanValue('isCertTrusted', $this->getIsCertTrusted());
        $writer->writeBooleanValue('isDrownVulnerable', $this->getIsDrownVulnerable());
        $writer->writeBooleanValue('isHeartbleedProof', $this->getIsHeartbleedProof());
        $writer->writeDateValue('lastBreachDate', $this->getLastBreachDate());
        $writer->writeEnumValue('latestValidSSL', $this->getLatestValidSSL());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('passwordPolicy', $this->getPasswordPolicy());
        $writer->writeEnumValue('restEncryptionType', $this->getRestEncryptionType());
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
     * Sets the certificate property value. The certificate property
     * @param ApplicationRiskFactorCertificateInfo|null $value Value to set for the certificate property.
    */
    public function setCertificate(?ApplicationRiskFactorCertificateInfo $value): void {
        $this->certificate = $value;
    }

    /**
     * Sets the domainToCheck property value. Specifies the domain or hostname evaluated during the security assessment.
     * @param string|null $value Value to set for the domainToCheck property.
    */
    public function setDomainToCheck(?string $value): void {
        $this->domainToCheck = $value;
    }

    /**
     * Sets the hasAdminAuditTrail property value. Indicates whether the application maintains an audit trail for administrative actions.
     * @param bool|null $value Value to set for the hasAdminAuditTrail property.
    */
    public function setHasAdminAuditTrail(?bool $value): void {
        $this->hasAdminAuditTrail = $value;
    }

    /**
     * Sets the hasAnonymousUsage property value. Indicates whether the application allows anonymous or unauthenticated usage.
     * @param bool|null $value Value to set for the hasAnonymousUsage property.
    */
    public function setHasAnonymousUsage(?bool $value): void {
        $this->hasAnonymousUsage = $value;
    }

    /**
     * Sets the hasDataAuditTrail property value. Indicates whether the application logs access or modification of customer data for audit purposes.
     * @param bool|null $value Value to set for the hasDataAuditTrail property.
    */
    public function setHasDataAuditTrail(?bool $value): void {
        $this->hasDataAuditTrail = $value;
    }

    /**
     * Sets the hasDataClassification property value. Indicates whether the application classifies and labels data based on sensitivity levels.
     * @param bool|null $value Value to set for the hasDataClassification property.
    */
    public function setHasDataClassification(?bool $value): void {
        $this->hasDataClassification = $value;
    }

    /**
     * Sets the hasDataEncrypted property value. Indicates whether data at rest and in transit are encrypted using approved algorithms.
     * @param bool|null $value Value to set for the hasDataEncrypted property.
    */
    public function setHasDataEncrypted(?bool $value): void {
        $this->hasDataEncrypted = $value;
    }

    /**
     * Sets the hasEnforceTransportEnc property value. Indicates whether HTTPS or equivalent secure transport is enforced for all communication channels.
     * @param bool|null $value Value to set for the hasEnforceTransportEnc property.
    */
    public function setHasEnforceTransportEnc(?bool $value): void {
        $this->hasEnforceTransportEnc = $value;
    }

    /**
     * Sets the hasIpRestriction property value. Indicates whether access to the application can be restricted based on IP address or network range.
     * @param bool|null $value Value to set for the hasIpRestriction property.
    */
    public function setHasIpRestriction(?bool $value): void {
        $this->hasIpRestriction = $value;
    }

    /**
     * Sets the hasMFA property value. Indicates whether the application supports or enforces multi-factor authentication (MFA).
     * @param bool|null $value Value to set for the hasMFA property.
    */
    public function setHasMFA(?bool $value): void {
        $this->hasMFA = $value;
    }

    /**
     * Sets the hasPenTest property value. Indicates whether the application undergoes periodic penetration testing or external security reviews.
     * @param bool|null $value Value to set for the hasPenTest property.
    */
    public function setHasPenTest(?bool $value): void {
        $this->hasPenTest = $value;
    }

    /**
     * Sets the hasRememberPassword property value. Indicates whether the application supports password-saving functionality, which may pose a security risk.
     * @param bool|null $value Value to set for the hasRememberPassword property.
    */
    public function setHasRememberPassword(?bool $value): void {
        $this->hasRememberPassword = $value;
    }

    /**
     * Sets the hasSamlSupport property value. Indicates whether the application supports SAML-based single sign-on (SSO).
     * @param bool|null $value Value to set for the hasSamlSupport property.
    */
    public function setHasSamlSupport(?bool $value): void {
        $this->hasSamlSupport = $value;
    }

    /**
     * Sets the hasUserAuditLogs property value. Indicates whether user activity is logged for security or compliance monitoring.
     * @param bool|null $value Value to set for the hasUserAuditLogs property.
    */
    public function setHasUserAuditLogs(?bool $value): void {
        $this->hasUserAuditLogs = $value;
    }

    /**
     * Sets the hasUserDataUpload property value. Indicates whether users can upload or store personal or organizational data within the application.
     * @param bool|null $value Value to set for the hasUserDataUpload property.
    */
    public function setHasUserDataUpload(?bool $value): void {
        $this->hasUserDataUpload = $value;
    }

    /**
     * Sets the hasUserRolesSupport property value. Indicates whether the application supports role-based access control (RBAC).
     * @param bool|null $value Value to set for the hasUserRolesSupport property.
    */
    public function setHasUserRolesSupport(?bool $value): void {
        $this->hasUserRolesSupport = $value;
    }

    /**
     * Sets the hasValidCertName property value. Indicates whether the certificate’s common name matches the application’s verified domain.
     * @param bool|null $value Value to set for the hasValidCertName property.
    */
    public function setHasValidCertName(?bool $value): void {
        $this->hasValidCertName = $value;
    }

    /**
     * Sets the httpsSecurityHeaders property value. Lists the HTTP security headers detected for the application (for example, HSTS, X-Frame-Options, or CSP).
     * @param array<string>|null $value Value to set for the httpsSecurityHeaders property.
    */
    public function setHttpsSecurityHeaders(?array $value): void {
        $this->httpsSecurityHeaders = $value;
    }

    /**
     * Sets the isCertTrusted property value. Indicates whether the application’s certificate is signed by a trusted certificate authority (CA).
     * @param bool|null $value Value to set for the isCertTrusted property.
    */
    public function setIsCertTrusted(?bool $value): void {
        $this->isCertTrusted = $value;
    }

    /**
     * Sets the isDrownVulnerable property value. Indicates whether the application is vulnerable to the DROWN (Decrypting RSA with Obsolete and Weakened eNcryption) attack.
     * @param bool|null $value Value to set for the isDrownVulnerable property.
    */
    public function setIsDrownVulnerable(?bool $value): void {
        $this->isDrownVulnerable = $value;
    }

    /**
     * Sets the isHeartbleedProof property value. Indicates whether the application’s SSL implementation is protected from the Heartbleed vulnerability.
     * @param bool|null $value Value to set for the isHeartbleedProof property.
    */
    public function setIsHeartbleedProof(?bool $value): void {
        $this->isHeartbleedProof = $value;
    }

    /**
     * Sets the lastBreachDate property value. Specifies the date of the last publicly reported data breach or security incident related to the application, if known.
     * @param Date|null $value Value to set for the lastBreachDate property.
    */
    public function setLastBreachDate(?Date $value): void {
        $this->lastBreachDate = $value;
    }

    /**
     * Sets the latestValidSSL property value. The latestValidSSL property
     * @param SslVersion|null $value Value to set for the latestValidSSL property.
    */
    public function setLatestValidSSL(?SslVersion $value): void {
        $this->latestValidSSL = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the passwordPolicy property value. The passwordPolicy property
     * @param PasswordPolicy|null $value Value to set for the passwordPolicy property.
    */
    public function setPasswordPolicy(?PasswordPolicy $value): void {
        $this->passwordPolicy = $value;
    }

    /**
     * Sets the restEncryptionType property value. The restEncryptionType property
     * @param RestEncryptionType|null $value Value to set for the restEncryptionType property.
    */
    public function setRestEncryptionType(?RestEncryptionType $value): void {
        $this->restEncryptionType = $value;
    }

}
