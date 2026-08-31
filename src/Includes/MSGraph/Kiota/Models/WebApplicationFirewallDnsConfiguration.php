<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WebApplicationFirewallDnsConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $isDomainVerified Indicates whether the domain owning this DNS record has been verified by the WAF provider.
    */
    private ?bool $isDomainVerified = null;
    
    /**
     * @var bool|null $isProxied Indicates whether traffic for this DNS record is proxied through the WAF provider's network (for example, using a CDN or reverse proxy).
    */
    private ?bool $isProxied = null;
    
    /**
     * @var string|null $name The DNS record name (for example, www.contoso.com or contoso.com). This is the host or zone name to which the configuration applies.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var WebApplicationFirewallDnsRecordType|null $recordType The recordType property
    */
    private ?WebApplicationFirewallDnsRecordType $recordType = null;
    
    /**
     * @var string|null $value The value of the DNS record.
    */
    private ?string $value = null;
    
    /**
     * Instantiates a new WebApplicationFirewallDnsConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WebApplicationFirewallDnsConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WebApplicationFirewallDnsConfiguration {
        return new WebApplicationFirewallDnsConfiguration();
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
            'isDomainVerified' => fn(ParseNode $n) => $o->setIsDomainVerified($n->getBooleanValue()),
            'isProxied' => fn(ParseNode $n) => $o->setIsProxied($n->getBooleanValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'recordType' => fn(ParseNode $n) => $o->setRecordType($n->getEnumValue(WebApplicationFirewallDnsRecordType::class)),
            'value' => fn(ParseNode $n) => $o->setValue($n->getStringValue()),
        ];
    }

    /**
     * Gets the isDomainVerified property value. Indicates whether the domain owning this DNS record has been verified by the WAF provider.
     * @return bool|null
    */
    public function getIsDomainVerified(): ?bool {
        return $this->isDomainVerified;
    }

    /**
     * Gets the isProxied property value. Indicates whether traffic for this DNS record is proxied through the WAF provider's network (for example, using a CDN or reverse proxy).
     * @return bool|null
    */
    public function getIsProxied(): ?bool {
        return $this->isProxied;
    }

    /**
     * Gets the name property value. The DNS record name (for example, www.contoso.com or contoso.com). This is the host or zone name to which the configuration applies.
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
     * Gets the recordType property value. The recordType property
     * @return WebApplicationFirewallDnsRecordType|null
    */
    public function getRecordType(): ?WebApplicationFirewallDnsRecordType {
        return $this->recordType;
    }

    /**
     * Gets the value property value. The value of the DNS record.
     * @return string|null
    */
    public function getValue(): ?string {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('isDomainVerified', $this->getIsDomainVerified());
        $writer->writeBooleanValue('isProxied', $this->getIsProxied());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('recordType', $this->getRecordType());
        $writer->writeStringValue('value', $this->getValue());
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
     * Sets the isDomainVerified property value. Indicates whether the domain owning this DNS record has been verified by the WAF provider.
     * @param bool|null $value Value to set for the isDomainVerified property.
    */
    public function setIsDomainVerified(?bool $value): void {
        $this->isDomainVerified = $value;
    }

    /**
     * Sets the isProxied property value. Indicates whether traffic for this DNS record is proxied through the WAF provider's network (for example, using a CDN or reverse proxy).
     * @param bool|null $value Value to set for the isProxied property.
    */
    public function setIsProxied(?bool $value): void {
        $this->isProxied = $value;
    }

    /**
     * Sets the name property value. The DNS record name (for example, www.contoso.com or contoso.com). This is the host or zone name to which the configuration applies.
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
     * Sets the recordType property value. The recordType property
     * @param WebApplicationFirewallDnsRecordType|null $value Value to set for the recordType property.
    */
    public function setRecordType(?WebApplicationFirewallDnsRecordType $value): void {
        $this->recordType = $value;
    }

    /**
     * Sets the value property value. The value of the DNS record.
     * @param string|null $value Value to set for the value property.
    */
    public function setValue(?string $value): void {
        $this->value = $value;
    }

}
