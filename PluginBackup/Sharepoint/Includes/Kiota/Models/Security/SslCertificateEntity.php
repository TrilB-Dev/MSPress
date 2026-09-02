<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\PhysicalAddress;

class SslCertificateEntity implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var PhysicalAddress|null $address A physical address of the entity.
    */
    private ?PhysicalAddress $address = null;
    
    /**
     * @var array<string>|null $alternateNames Alternate names for this entity that are part of the certificate.
    */
    private ?array $alternateNames = null;
    
    /**
     * @var string|null $commonName A common name for this entity.
    */
    private ?string $commonName = null;
    
    /**
     * @var string|null $email An email for this entity.
    */
    private ?string $email = null;
    
    /**
     * @var string|null $givenName If the entity is a person, this is the person's given name (first name).
    */
    private ?string $givenName = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $organizationName If the entity is an organization, this is the name of the organization.
    */
    private ?string $organizationName = null;
    
    /**
     * @var string|null $organizationUnitName If the entity is an organization, this communicates if a unit in the organization is named on the entity.
    */
    private ?string $organizationUnitName = null;
    
    /**
     * @var string|null $serialNumber A serial number assigned to the entity; usually only available if the entity is the issuer.
    */
    private ?string $serialNumber = null;
    
    /**
     * @var string|null $surname If the entity is a person, this is the person's surname (last name).
    */
    private ?string $surname = null;
    
    /**
     * Instantiates a new SslCertificateEntity and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SslCertificateEntity
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SslCertificateEntity {
        return new SslCertificateEntity();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the address property value. A physical address of the entity.
     * @return PhysicalAddress|null
    */
    public function getAddress(): ?PhysicalAddress {
        return $this->address;
    }

    /**
     * Gets the alternateNames property value. Alternate names for this entity that are part of the certificate.
     * @return array<string>|null
    */
    public function getAlternateNames(): ?array {
        return $this->alternateNames;
    }

    /**
     * Gets the commonName property value. A common name for this entity.
     * @return string|null
    */
    public function getCommonName(): ?string {
        return $this->commonName;
    }

    /**
     * Gets the email property value. An email for this entity.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'address' => fn(ParseNode $n) => $o->setAddress($n->getObjectValue([PhysicalAddress::class, 'createFromDiscriminatorValue'])),
            'alternateNames' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAlternateNames($val);
            },
            'commonName' => fn(ParseNode $n) => $o->setCommonName($n->getStringValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'givenName' => fn(ParseNode $n) => $o->setGivenName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'organizationName' => fn(ParseNode $n) => $o->setOrganizationName($n->getStringValue()),
            'organizationUnitName' => fn(ParseNode $n) => $o->setOrganizationUnitName($n->getStringValue()),
            'serialNumber' => fn(ParseNode $n) => $o->setSerialNumber($n->getStringValue()),
            'surname' => fn(ParseNode $n) => $o->setSurname($n->getStringValue()),
        ];
    }

    /**
     * Gets the givenName property value. If the entity is a person, this is the person's given name (first name).
     * @return string|null
    */
    public function getGivenName(): ?string {
        return $this->givenName;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the organizationName property value. If the entity is an organization, this is the name of the organization.
     * @return string|null
    */
    public function getOrganizationName(): ?string {
        return $this->organizationName;
    }

    /**
     * Gets the organizationUnitName property value. If the entity is an organization, this communicates if a unit in the organization is named on the entity.
     * @return string|null
    */
    public function getOrganizationUnitName(): ?string {
        return $this->organizationUnitName;
    }

    /**
     * Gets the serialNumber property value. A serial number assigned to the entity; usually only available if the entity is the issuer.
     * @return string|null
    */
    public function getSerialNumber(): ?string {
        return $this->serialNumber;
    }

    /**
     * Gets the surname property value. If the entity is a person, this is the person's surname (last name).
     * @return string|null
    */
    public function getSurname(): ?string {
        return $this->surname;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('address', $this->getAddress());
        $writer->writeCollectionOfPrimitiveValues('alternateNames', $this->getAlternateNames());
        $writer->writeStringValue('commonName', $this->getCommonName());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeStringValue('givenName', $this->getGivenName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('organizationName', $this->getOrganizationName());
        $writer->writeStringValue('organizationUnitName', $this->getOrganizationUnitName());
        $writer->writeStringValue('serialNumber', $this->getSerialNumber());
        $writer->writeStringValue('surname', $this->getSurname());
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
     * Sets the address property value. A physical address of the entity.
     * @param PhysicalAddress|null $value Value to set for the address property.
    */
    public function setAddress(?PhysicalAddress $value): void {
        $this->address = $value;
    }

    /**
     * Sets the alternateNames property value. Alternate names for this entity that are part of the certificate.
     * @param array<string>|null $value Value to set for the alternateNames property.
    */
    public function setAlternateNames(?array $value): void {
        $this->alternateNames = $value;
    }

    /**
     * Sets the commonName property value. A common name for this entity.
     * @param string|null $value Value to set for the commonName property.
    */
    public function setCommonName(?string $value): void {
        $this->commonName = $value;
    }

    /**
     * Sets the email property value. An email for this entity.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the givenName property value. If the entity is a person, this is the person's given name (first name).
     * @param string|null $value Value to set for the givenName property.
    */
    public function setGivenName(?string $value): void {
        $this->givenName = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the organizationName property value. If the entity is an organization, this is the name of the organization.
     * @param string|null $value Value to set for the organizationName property.
    */
    public function setOrganizationName(?string $value): void {
        $this->organizationName = $value;
    }

    /**
     * Sets the organizationUnitName property value. If the entity is an organization, this communicates if a unit in the organization is named on the entity.
     * @param string|null $value Value to set for the organizationUnitName property.
    */
    public function setOrganizationUnitName(?string $value): void {
        $this->organizationUnitName = $value;
    }

    /**
     * Sets the serialNumber property value. A serial number assigned to the entity; usually only available if the entity is the issuer.
     * @param string|null $value Value to set for the serialNumber property.
    */
    public function setSerialNumber(?string $value): void {
        $this->serialNumber = $value;
    }

    /**
     * Sets the surname property value. If the entity is a person, this is the person's surname (last name).
     * @param string|null $value Value to set for the surname property.
    */
    public function setSurname(?string $value): void {
        $this->surname = $value;
    }

}
