<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class IpAddress extends Host implements Parsable 
{
    /**
     * @var AutonomousSystem|null $autonomousSystem The details about the autonomous system to which this IP address belongs.
    */
    private ?AutonomousSystem $autonomousSystem = null;
    
    /**
     * @var string|null $countryOrRegion The country/region for this IP address.
    */
    private ?string $countryOrRegion = null;
    
    /**
     * @var string|null $hostingProvider The hosting company listed for this host.
    */
    private ?string $hostingProvider = null;
    
    /**
     * @var string|null $netblock The block of IP addresses this IP address belongs to.
    */
    private ?string $netblock = null;
    
    /**
     * Instantiates a new IpAddress and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.ipAddress');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IpAddress
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IpAddress {
        return new IpAddress();
    }

    /**
     * Gets the autonomousSystem property value. The details about the autonomous system to which this IP address belongs.
     * @return AutonomousSystem|null
    */
    public function getAutonomousSystem(): ?AutonomousSystem {
        return $this->autonomousSystem;
    }

    /**
     * Gets the countryOrRegion property value. The country/region for this IP address.
     * @return string|null
    */
    public function getCountryOrRegion(): ?string {
        return $this->countryOrRegion;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'autonomousSystem' => fn(ParseNode $n) => $o->setAutonomousSystem($n->getObjectValue([AutonomousSystem::class, 'createFromDiscriminatorValue'])),
            'countryOrRegion' => fn(ParseNode $n) => $o->setCountryOrRegion($n->getStringValue()),
            'hostingProvider' => fn(ParseNode $n) => $o->setHostingProvider($n->getStringValue()),
            'netblock' => fn(ParseNode $n) => $o->setNetblock($n->getStringValue()),
        ]);
    }

    /**
     * Gets the hostingProvider property value. The hosting company listed for this host.
     * @return string|null
    */
    public function getHostingProvider(): ?string {
        return $this->hostingProvider;
    }

    /**
     * Gets the netblock property value. The block of IP addresses this IP address belongs to.
     * @return string|null
    */
    public function getNetblock(): ?string {
        return $this->netblock;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('autonomousSystem', $this->getAutonomousSystem());
        $writer->writeStringValue('countryOrRegion', $this->getCountryOrRegion());
        $writer->writeStringValue('hostingProvider', $this->getHostingProvider());
        $writer->writeStringValue('netblock', $this->getNetblock());
    }

    /**
     * Sets the autonomousSystem property value. The details about the autonomous system to which this IP address belongs.
     * @param AutonomousSystem|null $value Value to set for the autonomousSystem property.
    */
    public function setAutonomousSystem(?AutonomousSystem $value): void {
        $this->autonomousSystem = $value;
    }

    /**
     * Sets the countryOrRegion property value. The country/region for this IP address.
     * @param string|null $value Value to set for the countryOrRegion property.
    */
    public function setCountryOrRegion(?string $value): void {
        $this->countryOrRegion = $value;
    }

    /**
     * Sets the hostingProvider property value. The hosting company listed for this host.
     * @param string|null $value Value to set for the hostingProvider property.
    */
    public function setHostingProvider(?string $value): void {
        $this->hostingProvider = $value;
    }

    /**
     * Sets the netblock property value. The block of IP addresses this IP address belongs to.
     * @param string|null $value Value to set for the netblock property.
    */
    public function setNetblock(?string $value): void {
        $this->netblock = $value;
    }

}
