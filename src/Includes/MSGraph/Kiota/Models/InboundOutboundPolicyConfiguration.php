<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class InboundOutboundPolicyConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $inboundAllowed Defines whether external users coming inbound are allowed.
    */
    private ?bool $inboundAllowed = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var bool|null $outboundAllowed Defines whether internal users are allowed to go outbound.
    */
    private ?bool $outboundAllowed = null;
    
    /**
     * Instantiates a new InboundOutboundPolicyConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return InboundOutboundPolicyConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): InboundOutboundPolicyConfiguration {
        return new InboundOutboundPolicyConfiguration();
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
            'inboundAllowed' => fn(ParseNode $n) => $o->setInboundAllowed($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'outboundAllowed' => fn(ParseNode $n) => $o->setOutboundAllowed($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the inboundAllowed property value. Defines whether external users coming inbound are allowed.
     * @return bool|null
    */
    public function getInboundAllowed(): ?bool {
        return $this->inboundAllowed;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the outboundAllowed property value. Defines whether internal users are allowed to go outbound.
     * @return bool|null
    */
    public function getOutboundAllowed(): ?bool {
        return $this->outboundAllowed;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('inboundAllowed', $this->getInboundAllowed());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeBooleanValue('outboundAllowed', $this->getOutboundAllowed());
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
     * Sets the inboundAllowed property value. Defines whether external users coming inbound are allowed.
     * @param bool|null $value Value to set for the inboundAllowed property.
    */
    public function setInboundAllowed(?bool $value): void {
        $this->inboundAllowed = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the outboundAllowed property value. Defines whether internal users are allowed to go outbound.
     * @param bool|null $value Value to set for the outboundAllowed property.
    */
    public function setOutboundAllowed(?bool $value): void {
        $this->outboundAllowed = $value;
    }

}
