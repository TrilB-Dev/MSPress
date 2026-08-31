<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class NicEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var IpEvidence|null $ipAddress The current IP address of the NIC.
    */
    private ?IpEvidence $ipAddress = null;
    
    /**
     * @var string|null $macAddress The MAC address of the NIC.
    */
    private ?string $macAddress = null;
    
    /**
     * @var array<string>|null $vlans The current virtual local area networks of the NIC.
    */
    private ?array $vlans = null;
    
    /**
     * Instantiates a new NicEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.nicEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return NicEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): NicEvidence {
        return new NicEvidence();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'ipAddress' => fn(ParseNode $n) => $o->setIpAddress($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'macAddress' => fn(ParseNode $n) => $o->setMacAddress($n->getStringValue()),
            'vlans' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setVlans($val);
            },
        ]);
    }

    /**
     * Gets the ipAddress property value. The current IP address of the NIC.
     * @return IpEvidence|null
    */
    public function getIpAddress(): ?IpEvidence {
        return $this->ipAddress;
    }

    /**
     * Gets the macAddress property value. The MAC address of the NIC.
     * @return string|null
    */
    public function getMacAddress(): ?string {
        return $this->macAddress;
    }

    /**
     * Gets the vlans property value. The current virtual local area networks of the NIC.
     * @return array<string>|null
    */
    public function getVlans(): ?array {
        return $this->vlans;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('ipAddress', $this->getIpAddress());
        $writer->writeStringValue('macAddress', $this->getMacAddress());
        $writer->writeCollectionOfPrimitiveValues('vlans', $this->getVlans());
    }

    /**
     * Sets the ipAddress property value. The current IP address of the NIC.
     * @param IpEvidence|null $value Value to set for the ipAddress property.
    */
    public function setIpAddress(?IpEvidence $value): void {
        $this->ipAddress = $value;
    }

    /**
     * Sets the macAddress property value. The MAC address of the NIC.
     * @param string|null $value Value to set for the macAddress property.
    */
    public function setMacAddress(?string $value): void {
        $this->macAddress = $value;
    }

    /**
     * Sets the vlans property value. The current virtual local area networks of the NIC.
     * @param array<string>|null $value Value to set for the vlans property.
    */
    public function setVlans(?array $value): void {
        $this->vlans = $value;
    }

}
