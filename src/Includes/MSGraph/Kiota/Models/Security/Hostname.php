<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Hostname extends Host implements Parsable 
{
    /**
     * @var string|null $registrant The company or individual who registered this hostname, from WHOIS data.
    */
    private ?string $registrant = null;
    
    /**
     * @var string|null $registrar The registrar for this hostname, from WHOIS data.
    */
    private ?string $registrar = null;
    
    /**
     * Instantiates a new Hostname and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.hostname');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Hostname
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Hostname {
        return new Hostname();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'registrant' => fn(ParseNode $n) => $o->setRegistrant($n->getStringValue()),
            'registrar' => fn(ParseNode $n) => $o->setRegistrar($n->getStringValue()),
        ]);
    }

    /**
     * Gets the registrant property value. The company or individual who registered this hostname, from WHOIS data.
     * @return string|null
    */
    public function getRegistrant(): ?string {
        return $this->registrant;
    }

    /**
     * Gets the registrar property value. The registrar for this hostname, from WHOIS data.
     * @return string|null
    */
    public function getRegistrar(): ?string {
        return $this->registrar;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('registrant', $this->getRegistrant());
        $writer->writeStringValue('registrar', $this->getRegistrar());
    }

    /**
     * Sets the registrant property value. The company or individual who registered this hostname, from WHOIS data.
     * @param string|null $value Value to set for the registrant property.
    */
    public function setRegistrant(?string $value): void {
        $this->registrant = $value;
    }

    /**
     * Sets the registrar property value. The registrar for this hostname, from WHOIS data.
     * @param string|null $value Value to set for the registrar property.
    */
    public function setRegistrar(?string $value): void {
        $this->registrar = $value;
    }

}
