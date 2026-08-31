<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\PhysicalAddress;

class WhoisContact implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var PhysicalAddress|null $address The physical address of the entity.
    */
    private ?PhysicalAddress $address = null;
    
    /**
     * @var string|null $email The email of this WHOIS contact.
    */
    private ?string $email = null;
    
    /**
     * @var string|null $fax The fax of this WHOIS contact. No format is guaranteed.
    */
    private ?string $fax = null;
    
    /**
     * @var string|null $name The name of this WHOIS contact.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $organization The organization of this WHOIS contact.
    */
    private ?string $organization = null;
    
    /**
     * @var string|null $telephone The telephone of this WHOIS contact. No format is guaranteed.
    */
    private ?string $telephone = null;
    
    /**
     * Instantiates a new WhoisContact and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WhoisContact
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WhoisContact {
        return new WhoisContact();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the address property value. The physical address of the entity.
     * @return PhysicalAddress|null
    */
    public function getAddress(): ?PhysicalAddress {
        return $this->address;
    }

    /**
     * Gets the email property value. The email of this WHOIS contact.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Gets the fax property value. The fax of this WHOIS contact. No format is guaranteed.
     * @return string|null
    */
    public function getFax(): ?string {
        return $this->fax;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'address' => fn(ParseNode $n) => $o->setAddress($n->getObjectValue([PhysicalAddress::class, 'createFromDiscriminatorValue'])),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'fax' => fn(ParseNode $n) => $o->setFax($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'organization' => fn(ParseNode $n) => $o->setOrganization($n->getStringValue()),
            'telephone' => fn(ParseNode $n) => $o->setTelephone($n->getStringValue()),
        ];
    }

    /**
     * Gets the name property value. The name of this WHOIS contact.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the organization property value. The organization of this WHOIS contact.
     * @return string|null
    */
    public function getOrganization(): ?string {
        return $this->organization;
    }

    /**
     * Gets the telephone property value. The telephone of this WHOIS contact. No format is guaranteed.
     * @return string|null
    */
    public function getTelephone(): ?string {
        return $this->telephone;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('address', $this->getAddress());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeStringValue('fax', $this->getFax());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('organization', $this->getOrganization());
        $writer->writeStringValue('telephone', $this->getTelephone());
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
     * Sets the address property value. The physical address of the entity.
     * @param PhysicalAddress|null $value Value to set for the address property.
    */
    public function setAddress(?PhysicalAddress $value): void {
        $this->address = $value;
    }

    /**
     * Sets the email property value. The email of this WHOIS contact.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the fax property value. The fax of this WHOIS contact. No format is guaranteed.
     * @param string|null $value Value to set for the fax property.
    */
    public function setFax(?string $value): void {
        $this->fax = $value;
    }

    /**
     * Sets the name property value. The name of this WHOIS contact.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the organization property value. The organization of this WHOIS contact.
     * @param string|null $value Value to set for the organization property.
    */
    public function setOrganization(?string $value): void {
        $this->organization = $value;
    }

    /**
     * Sets the telephone property value. The telephone of this WHOIS contact. No format is guaranteed.
     * @param string|null $value Value to set for the telephone property.
    */
    public function setTelephone(?string $value): void {
        $this->telephone = $value;
    }

}
