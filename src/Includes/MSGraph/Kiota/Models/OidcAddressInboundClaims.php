<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OidcAddressInboundClaims implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $country The country property
    */
    private ?string $country = null;
    
    /**
     * @var string|null $locality The locality property
    */
    private ?string $locality = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $postal_code The postal_code property
    */
    private ?string $postal_code = null;
    
    /**
     * @var string|null $region The region property
    */
    private ?string $region = null;
    
    /**
     * @var string|null $street_address The street_address property
    */
    private ?string $street_address = null;
    
    /**
     * Instantiates a new OidcAddressInboundClaims and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OidcAddressInboundClaims
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OidcAddressInboundClaims {
        return new OidcAddressInboundClaims();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the country property value. The country property
     * @return string|null
    */
    public function getCountry(): ?string {
        return $this->country;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'country' => fn(ParseNode $n) => $o->setCountry($n->getStringValue()),
            'locality' => fn(ParseNode $n) => $o->setLocality($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'postal_code' => fn(ParseNode $n) => $o->setPostalCode($n->getStringValue()),
            'region' => fn(ParseNode $n) => $o->setRegion($n->getStringValue()),
            'street_address' => fn(ParseNode $n) => $o->setStreetAddress($n->getStringValue()),
        ];
    }

    /**
     * Gets the locality property value. The locality property
     * @return string|null
    */
    public function getLocality(): ?string {
        return $this->locality;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the postal_code property value. The postal_code property
     * @return string|null
    */
    public function getPostalCode(): ?string {
        return $this->postal_code;
    }

    /**
     * Gets the region property value. The region property
     * @return string|null
    */
    public function getRegion(): ?string {
        return $this->region;
    }

    /**
     * Gets the street_address property value. The street_address property
     * @return string|null
    */
    public function getStreetAddress(): ?string {
        return $this->street_address;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('country', $this->getCountry());
        $writer->writeStringValue('locality', $this->getLocality());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('postal_code', $this->getPostalCode());
        $writer->writeStringValue('region', $this->getRegion());
        $writer->writeStringValue('street_address', $this->getStreetAddress());
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
     * Sets the country property value. The country property
     * @param string|null $value Value to set for the country property.
    */
    public function setCountry(?string $value): void {
        $this->country = $value;
    }

    /**
     * Sets the locality property value. The locality property
     * @param string|null $value Value to set for the locality property.
    */
    public function setLocality(?string $value): void {
        $this->locality = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the postal_code property value. The postal_code property
     * @param string|null $value Value to set for the postal_code property.
    */
    public function setPostalCode(?string $value): void {
        $this->postal_code = $value;
    }

    /**
     * Sets the region property value. The region property
     * @param string|null $value Value to set for the region property.
    */
    public function setRegion(?string $value): void {
        $this->region = $value;
    }

    /**
     * Sets the street_address property value. The street_address property
     * @param string|null $value Value to set for the street_address property.
    */
    public function setStreetAddress(?string $value): void {
        $this->street_address = $value;
    }

}
