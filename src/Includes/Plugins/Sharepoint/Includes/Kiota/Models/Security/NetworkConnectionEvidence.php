<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class NetworkConnectionEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var IpEvidence|null $destinationAddress An entity of type IP that is the destination for this connection.
    */
    private ?IpEvidence $destinationAddress = null;
    
    /**
     * @var int|null $destinationPort The destination port number. For example, 80.
    */
    private ?int $destinationPort = null;
    
    /**
     * @var ProtocolType|null $protocol The protocol type. Possible values are tcp, udp, unknownFutureValue.
    */
    private ?ProtocolType $protocol = null;
    
    /**
     * @var IpEvidence|null $sourceAddress An entity of type IP that is the source for this connection.
    */
    private ?IpEvidence $sourceAddress = null;
    
    /**
     * @var int|null $sourcePort The source port number. For example, 80.
    */
    private ?int $sourcePort = null;
    
    /**
     * Instantiates a new NetworkConnectionEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.networkConnectionEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return NetworkConnectionEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): NetworkConnectionEvidence {
        return new NetworkConnectionEvidence();
    }

    /**
     * Gets the destinationAddress property value. An entity of type IP that is the destination for this connection.
     * @return IpEvidence|null
    */
    public function getDestinationAddress(): ?IpEvidence {
        return $this->destinationAddress;
    }

    /**
     * Gets the destinationPort property value. The destination port number. For example, 80.
     * @return int|null
    */
    public function getDestinationPort(): ?int {
        return $this->destinationPort;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'destinationAddress' => fn(ParseNode $n) => $o->setDestinationAddress($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'destinationPort' => fn(ParseNode $n) => $o->setDestinationPort($n->getIntegerValue()),
            'protocol' => fn(ParseNode $n) => $o->setProtocol($n->getEnumValue(ProtocolType::class)),
            'sourceAddress' => fn(ParseNode $n) => $o->setSourceAddress($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'sourcePort' => fn(ParseNode $n) => $o->setSourcePort($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the protocol property value. The protocol type. Possible values are tcp, udp, unknownFutureValue.
     * @return ProtocolType|null
    */
    public function getProtocol(): ?ProtocolType {
        return $this->protocol;
    }

    /**
     * Gets the sourceAddress property value. An entity of type IP that is the source for this connection.
     * @return IpEvidence|null
    */
    public function getSourceAddress(): ?IpEvidence {
        return $this->sourceAddress;
    }

    /**
     * Gets the sourcePort property value. The source port number. For example, 80.
     * @return int|null
    */
    public function getSourcePort(): ?int {
        return $this->sourcePort;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('destinationAddress', $this->getDestinationAddress());
        $writer->writeIntegerValue('destinationPort', $this->getDestinationPort());
        $writer->writeEnumValue('protocol', $this->getProtocol());
        $writer->writeObjectValue('sourceAddress', $this->getSourceAddress());
        $writer->writeIntegerValue('sourcePort', $this->getSourcePort());
    }

    /**
     * Sets the destinationAddress property value. An entity of type IP that is the destination for this connection.
     * @param IpEvidence|null $value Value to set for the destinationAddress property.
    */
    public function setDestinationAddress(?IpEvidence $value): void {
        $this->destinationAddress = $value;
    }

    /**
     * Sets the destinationPort property value. The destination port number. For example, 80.
     * @param int|null $value Value to set for the destinationPort property.
    */
    public function setDestinationPort(?int $value): void {
        $this->destinationPort = $value;
    }

    /**
     * Sets the protocol property value. The protocol type. Possible values are tcp, udp, unknownFutureValue.
     * @param ProtocolType|null $value Value to set for the protocol property.
    */
    public function setProtocol(?ProtocolType $value): void {
        $this->protocol = $value;
    }

    /**
     * Sets the sourceAddress property value. An entity of type IP that is the source for this connection.
     * @param IpEvidence|null $value Value to set for the sourceAddress property.
    */
    public function setSourceAddress(?IpEvidence $value): void {
        $this->sourceAddress = $value;
    }

    /**
     * Sets the sourcePort property value. The source port number. For example, 80.
     * @param int|null $value Value to set for the sourcePort property.
    */
    public function setSourcePort(?int $value): void {
        $this->sourcePort = $value;
    }

}
