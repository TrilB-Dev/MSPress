<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class X509CertificateAuthorityScope implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<IncludeTarget>|null $includeTargets A collection of groups that are enabled to be in scope to use certificates issued by specific certificate authority.
    */
    private ?array $includeTargets = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $publicKeyInfrastructureIdentifier Public Key Infrastructure container object under which the certificate authorities are stored in the Entra PKI based trust store.
    */
    private ?string $publicKeyInfrastructureIdentifier = null;
    
    /**
     * @var string|null $subjectKeyIdentifier Subject Key Identifier that identifies the certificate authority uniquely.
    */
    private ?string $subjectKeyIdentifier = null;
    
    /**
     * Instantiates a new X509CertificateAuthorityScope and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return X509CertificateAuthorityScope
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): X509CertificateAuthorityScope {
        return new X509CertificateAuthorityScope();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'includeTargets' => fn(ParseNode $n) => $o->setIncludeTargets($n->getCollectionOfObjectValues([IncludeTarget::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'publicKeyInfrastructureIdentifier' => fn(ParseNode $n) => $o->setPublicKeyInfrastructureIdentifier($n->getStringValue()),
            'subjectKeyIdentifier' => fn(ParseNode $n) => $o->setSubjectKeyIdentifier($n->getStringValue()),
        ];
    }

    /**
     * Gets the includeTargets property value. A collection of groups that are enabled to be in scope to use certificates issued by specific certificate authority.
     * @return array<IncludeTarget>|null
    */
    public function getIncludeTargets(): ?array {
        return $this->includeTargets;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the publicKeyInfrastructureIdentifier property value. Public Key Infrastructure container object under which the certificate authorities are stored in the Entra PKI based trust store.
     * @return string|null
    */
    public function getPublicKeyInfrastructureIdentifier(): ?string {
        return $this->publicKeyInfrastructureIdentifier;
    }

    /**
     * Gets the subjectKeyIdentifier property value. Subject Key Identifier that identifies the certificate authority uniquely.
     * @return string|null
    */
    public function getSubjectKeyIdentifier(): ?string {
        return $this->subjectKeyIdentifier;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('includeTargets', $this->getIncludeTargets());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('publicKeyInfrastructureIdentifier', $this->getPublicKeyInfrastructureIdentifier());
        $writer->writeStringValue('subjectKeyIdentifier', $this->getSubjectKeyIdentifier());
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
     * Sets the includeTargets property value. A collection of groups that are enabled to be in scope to use certificates issued by specific certificate authority.
     * @param array<IncludeTarget>|null $value Value to set for the includeTargets property.
    */
    public function setIncludeTargets(?array $value): void {
        $this->includeTargets = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the publicKeyInfrastructureIdentifier property value. Public Key Infrastructure container object under which the certificate authorities are stored in the Entra PKI based trust store.
     * @param string|null $value Value to set for the publicKeyInfrastructureIdentifier property.
    */
    public function setPublicKeyInfrastructureIdentifier(?string $value): void {
        $this->publicKeyInfrastructureIdentifier = $value;
    }

    /**
     * Sets the subjectKeyIdentifier property value. Subject Key Identifier that identifies the certificate authority uniquely.
     * @param string|null $value Value to set for the subjectKeyIdentifier property.
    */
    public function setSubjectKeyIdentifier(?string $value): void {
        $this->subjectKeyIdentifier = $value;
    }

}
