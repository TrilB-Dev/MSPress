<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WebApplicationFirewallVerifiedDetails implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var WebApplicationFirewallDnsConfiguration|null $dnsConfiguration DNS-related details discovered during verification for the host, such as the DNS record name, record type, record value, whether the record is proxied through the provider, and whether the domain is verified.
    */
    private ?WebApplicationFirewallDnsConfiguration $dnsConfiguration = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new WebApplicationFirewallVerifiedDetails and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WebApplicationFirewallVerifiedDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WebApplicationFirewallVerifiedDetails {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.akamaiVerifiedDetailsModel': return new AkamaiVerifiedDetailsModel();
                case '#microsoft.graph.cloudFlareVerifiedDetailsModel': return new CloudFlareVerifiedDetailsModel();
            }
        }
        return new WebApplicationFirewallVerifiedDetails();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dnsConfiguration property value. DNS-related details discovered during verification for the host, such as the DNS record name, record type, record value, whether the record is proxied through the provider, and whether the domain is verified.
     * @return WebApplicationFirewallDnsConfiguration|null
    */
    public function getDnsConfiguration(): ?WebApplicationFirewallDnsConfiguration {
        return $this->dnsConfiguration;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dnsConfiguration' => fn(ParseNode $n) => $o->setDnsConfiguration($n->getObjectValue([WebApplicationFirewallDnsConfiguration::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('dnsConfiguration', $this->getDnsConfiguration());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the dnsConfiguration property value. DNS-related details discovered during verification for the host, such as the DNS record name, record type, record value, whether the record is proxied through the provider, and whether the domain is verified.
     * @param WebApplicationFirewallDnsConfiguration|null $value Value to set for the dnsConfiguration property.
    */
    public function setDnsConfiguration(?WebApplicationFirewallDnsConfiguration $value): void {
        $this->dnsConfiguration = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
