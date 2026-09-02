<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OidcInboundClaimMappingOverride implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var OidcAddressInboundClaims|null $address The address property
    */
    private ?OidcAddressInboundClaims $address = null;
    
    /**
     * @var string|null $email The email property
    */
    private ?string $email = null;
    
    /**
     * @var string|null $email_verified The email_verified property
    */
    private ?string $email_verified = null;
    
    /**
     * @var string|null $family_name The family_name property
    */
    private ?string $family_name = null;
    
    /**
     * @var string|null $given_name The given_name property
    */
    private ?string $given_name = null;
    
    /**
     * @var string|null $name The name property
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $phone_number The phone_number property
    */
    private ?string $phone_number = null;
    
    /**
     * @var string|null $phone_number_verified The phone_number_verified property
    */
    private ?string $phone_number_verified = null;
    
    /**
     * @var string|null $sub The sub property
    */
    private ?string $sub = null;
    
    /**
     * Instantiates a new OidcInboundClaimMappingOverride and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OidcInboundClaimMappingOverride
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OidcInboundClaimMappingOverride {
        return new OidcInboundClaimMappingOverride();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the address property value. The address property
     * @return OidcAddressInboundClaims|null
    */
    public function getAddress(): ?OidcAddressInboundClaims {
        return $this->address;
    }

    /**
     * Gets the email property value. The email property
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Gets the email_verified property value. The email_verified property
     * @return string|null
    */
    public function getEmailVerified(): ?string {
        return $this->email_verified;
    }

    /**
     * Gets the family_name property value. The family_name property
     * @return string|null
    */
    public function getFamilyName(): ?string {
        return $this->family_name;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'address' => fn(ParseNode $n) => $o->setAddress($n->getObjectValue([OidcAddressInboundClaims::class, 'createFromDiscriminatorValue'])),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'email_verified' => fn(ParseNode $n) => $o->setEmailVerified($n->getStringValue()),
            'family_name' => fn(ParseNode $n) => $o->setFamilyName($n->getStringValue()),
            'given_name' => fn(ParseNode $n) => $o->setGivenName($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'phone_number' => fn(ParseNode $n) => $o->setPhoneNumber($n->getStringValue()),
            'phone_number_verified' => fn(ParseNode $n) => $o->setPhoneNumberVerified($n->getStringValue()),
            'sub' => fn(ParseNode $n) => $o->setSub($n->getStringValue()),
        ];
    }

    /**
     * Gets the given_name property value. The given_name property
     * @return string|null
    */
    public function getGivenName(): ?string {
        return $this->given_name;
    }

    /**
     * Gets the name property value. The name property
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
     * Gets the phone_number property value. The phone_number property
     * @return string|null
    */
    public function getPhoneNumber(): ?string {
        return $this->phone_number;
    }

    /**
     * Gets the phone_number_verified property value. The phone_number_verified property
     * @return string|null
    */
    public function getPhoneNumberVerified(): ?string {
        return $this->phone_number_verified;
    }

    /**
     * Gets the sub property value. The sub property
     * @return string|null
    */
    public function getSub(): ?string {
        return $this->sub;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('address', $this->getAddress());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeStringValue('email_verified', $this->getEmailVerified());
        $writer->writeStringValue('family_name', $this->getFamilyName());
        $writer->writeStringValue('given_name', $this->getGivenName());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('phone_number', $this->getPhoneNumber());
        $writer->writeStringValue('phone_number_verified', $this->getPhoneNumberVerified());
        $writer->writeStringValue('sub', $this->getSub());
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
     * Sets the address property value. The address property
     * @param OidcAddressInboundClaims|null $value Value to set for the address property.
    */
    public function setAddress(?OidcAddressInboundClaims $value): void {
        $this->address = $value;
    }

    /**
     * Sets the email property value. The email property
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the email_verified property value. The email_verified property
     * @param string|null $value Value to set for the email_verified property.
    */
    public function setEmailVerified(?string $value): void {
        $this->email_verified = $value;
    }

    /**
     * Sets the family_name property value. The family_name property
     * @param string|null $value Value to set for the family_name property.
    */
    public function setFamilyName(?string $value): void {
        $this->family_name = $value;
    }

    /**
     * Sets the given_name property value. The given_name property
     * @param string|null $value Value to set for the given_name property.
    */
    public function setGivenName(?string $value): void {
        $this->given_name = $value;
    }

    /**
     * Sets the name property value. The name property
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
     * Sets the phone_number property value. The phone_number property
     * @param string|null $value Value to set for the phone_number property.
    */
    public function setPhoneNumber(?string $value): void {
        $this->phone_number = $value;
    }

    /**
     * Sets the phone_number_verified property value. The phone_number_verified property
     * @param string|null $value Value to set for the phone_number_verified property.
    */
    public function setPhoneNumberVerified(?string $value): void {
        $this->phone_number_verified = $value;
    }

    /**
     * Sets the sub property value. The sub property
     * @param string|null $value Value to set for the sub property.
    */
    public function setSub(?string $value): void {
        $this->sub = $value;
    }

}
