<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DnsEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var IpEvidence|null $dnsServerIp An IP entity that represents the DNS server that resolves the request.
    */
    private ?IpEvidence $dnsServerIp = null;
    
    /**
     * @var string|null $domainName The name of the DNS record associated with the alert.
    */
    private ?string $domainName = null;
    
    /**
     * @var IpEvidence|null $hostIpAddress An IP entity that represents the DNS request client.
    */
    private ?IpEvidence $hostIpAddress = null;
    
    /**
     * @var array<IpEvidence>|null $ipAddresses IP entities that represent the resolved IP addresses.
    */
    private ?array $ipAddresses = null;
    
    /**
     * Instantiates a new DnsEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.dnsEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DnsEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DnsEvidence {
        return new DnsEvidence();
    }

    /**
     * Gets the dnsServerIp property value. An IP entity that represents the DNS server that resolves the request.
     * @return IpEvidence|null
    */
    public function getDnsServerIp(): ?IpEvidence {
        return $this->dnsServerIp;
    }

    /**
     * Gets the domainName property value. The name of the DNS record associated with the alert.
     * @return string|null
    */
    public function getDomainName(): ?string {
        return $this->domainName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'dnsServerIp' => fn(ParseNode $n) => $o->setDnsServerIp($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'domainName' => fn(ParseNode $n) => $o->setDomainName($n->getStringValue()),
            'hostIpAddress' => fn(ParseNode $n) => $o->setHostIpAddress($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'ipAddresses' => fn(ParseNode $n) => $o->setIpAddresses($n->getCollectionOfObjectValues([IpEvidence::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the hostIpAddress property value. An IP entity that represents the DNS request client.
     * @return IpEvidence|null
    */
    public function getHostIpAddress(): ?IpEvidence {
        return $this->hostIpAddress;
    }

    /**
     * Gets the ipAddresses property value. IP entities that represent the resolved IP addresses.
     * @return array<IpEvidence>|null
    */
    public function getIpAddresses(): ?array {
        return $this->ipAddresses;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('dnsServerIp', $this->getDnsServerIp());
        $writer->writeStringValue('domainName', $this->getDomainName());
        $writer->writeObjectValue('hostIpAddress', $this->getHostIpAddress());
        $writer->writeCollectionOfObjectValues('ipAddresses', $this->getIpAddresses());
    }

    /**
     * Sets the dnsServerIp property value. An IP entity that represents the DNS server that resolves the request.
     * @param IpEvidence|null $value Value to set for the dnsServerIp property.
    */
    public function setDnsServerIp(?IpEvidence $value): void {
        $this->dnsServerIp = $value;
    }

    /**
     * Sets the domainName property value. The name of the DNS record associated with the alert.
     * @param string|null $value Value to set for the domainName property.
    */
    public function setDomainName(?string $value): void {
        $this->domainName = $value;
    }

    /**
     * Sets the hostIpAddress property value. An IP entity that represents the DNS request client.
     * @param IpEvidence|null $value Value to set for the hostIpAddress property.
    */
    public function setHostIpAddress(?IpEvidence $value): void {
        $this->hostIpAddress = $value;
    }

    /**
     * Sets the ipAddresses property value. IP entities that represent the resolved IP addresses.
     * @param array<IpEvidence>|null $value Value to set for the ipAddresses property.
    */
    public function setIpAddresses(?array $value): void {
        $this->ipAddresses = $value;
    }

}
