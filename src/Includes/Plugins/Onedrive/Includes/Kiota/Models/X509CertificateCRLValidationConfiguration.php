<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class X509CertificateCRLValidationConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $exemptedCertificateAuthoritiesSubjectKeyIdentifiers Represents the SKIs of CAs that should be excluded from the valid CRL distribution point check. SKI is represented as a hexadecimal string.
    */
    private ?array $exemptedCertificateAuthoritiesSubjectKeyIdentifiers = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var X509CertificateCRLValidationConfigurationState|null $state The state property
    */
    private ?X509CertificateCRLValidationConfigurationState $state = null;
    
    /**
     * Instantiates a new X509CertificateCRLValidationConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return X509CertificateCRLValidationConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): X509CertificateCRLValidationConfiguration {
        return new X509CertificateCRLValidationConfiguration();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the exemptedCertificateAuthoritiesSubjectKeyIdentifiers property value. Represents the SKIs of CAs that should be excluded from the valid CRL distribution point check. SKI is represented as a hexadecimal string.
     * @return array<string>|null
    */
    public function getExemptedCertificateAuthoritiesSubjectKeyIdentifiers(): ?array {
        return $this->exemptedCertificateAuthoritiesSubjectKeyIdentifiers;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'exemptedCertificateAuthoritiesSubjectKeyIdentifiers' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setExemptedCertificateAuthoritiesSubjectKeyIdentifiers($val);
            },
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(X509CertificateCRLValidationConfigurationState::class)),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the state property value. The state property
     * @return X509CertificateCRLValidationConfigurationState|null
    */
    public function getState(): ?X509CertificateCRLValidationConfigurationState {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('exemptedCertificateAuthoritiesSubjectKeyIdentifiers', $this->getExemptedCertificateAuthoritiesSubjectKeyIdentifiers());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('state', $this->getState());
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
     * Sets the exemptedCertificateAuthoritiesSubjectKeyIdentifiers property value. Represents the SKIs of CAs that should be excluded from the valid CRL distribution point check. SKI is represented as a hexadecimal string.
     * @param array<string>|null $value Value to set for the exemptedCertificateAuthoritiesSubjectKeyIdentifiers property.
    */
    public function setExemptedCertificateAuthoritiesSubjectKeyIdentifiers(?array $value): void {
        $this->exemptedCertificateAuthoritiesSubjectKeyIdentifiers = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the state property value. The state property
     * @param X509CertificateCRLValidationConfigurationState|null $value Value to set for the state property.
    */
    public function setState(?X509CertificateCRLValidationConfigurationState $value): void {
        $this->state = $value;
    }

}
