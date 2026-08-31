<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CustomExtensionCalloutInstance implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $customExtensionId Identification of the custom extension that was triggered at this instance.
    */
    private ?string $customExtensionId = null;
    
    /**
     * @var string|null $detail Details provided by the logic app during the callback of the request instance.
    */
    private ?string $detail = null;
    
    /**
     * @var string|null $externalCorrelationId The unique run identifier for the logic app.
    */
    private ?string $externalCorrelationId = null;
    
    /**
     * @var string|null $id Unique identifier for the callout instance. Read-only.
    */
    private ?string $id = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var CustomExtensionCalloutInstanceStatus|null $status The status of the request to the custom extension. The possible values are: calloutSent, callbackReceived, calloutFailed, callbackTimedOut, waitingForCallback, unknownFutureValue.
    */
    private ?CustomExtensionCalloutInstanceStatus $status = null;
    
    /**
     * Instantiates a new CustomExtensionCalloutInstance and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CustomExtensionCalloutInstance
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CustomExtensionCalloutInstance {
        return new CustomExtensionCalloutInstance();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the customExtensionId property value. Identification of the custom extension that was triggered at this instance.
     * @return string|null
    */
    public function getCustomExtensionId(): ?string {
        return $this->customExtensionId;
    }

    /**
     * Gets the detail property value. Details provided by the logic app during the callback of the request instance.
     * @return string|null
    */
    public function getDetail(): ?string {
        return $this->detail;
    }

    /**
     * Gets the externalCorrelationId property value. The unique run identifier for the logic app.
     * @return string|null
    */
    public function getExternalCorrelationId(): ?string {
        return $this->externalCorrelationId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'customExtensionId' => fn(ParseNode $n) => $o->setCustomExtensionId($n->getStringValue()),
            'detail' => fn(ParseNode $n) => $o->setDetail($n->getStringValue()),
            'externalCorrelationId' => fn(ParseNode $n) => $o->setExternalCorrelationId($n->getStringValue()),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(CustomExtensionCalloutInstanceStatus::class)),
        ];
    }

    /**
     * Gets the id property value. Unique identifier for the callout instance. Read-only.
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the status property value. The status of the request to the custom extension. The possible values are: calloutSent, callbackReceived, calloutFailed, callbackTimedOut, waitingForCallback, unknownFutureValue.
     * @return CustomExtensionCalloutInstanceStatus|null
    */
    public function getStatus(): ?CustomExtensionCalloutInstanceStatus {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('customExtensionId', $this->getCustomExtensionId());
        $writer->writeStringValue('detail', $this->getDetail());
        $writer->writeStringValue('externalCorrelationId', $this->getExternalCorrelationId());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('status', $this->getStatus());
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
     * Sets the customExtensionId property value. Identification of the custom extension that was triggered at this instance.
     * @param string|null $value Value to set for the customExtensionId property.
    */
    public function setCustomExtensionId(?string $value): void {
        $this->customExtensionId = $value;
    }

    /**
     * Sets the detail property value. Details provided by the logic app during the callback of the request instance.
     * @param string|null $value Value to set for the detail property.
    */
    public function setDetail(?string $value): void {
        $this->detail = $value;
    }

    /**
     * Sets the externalCorrelationId property value. The unique run identifier for the logic app.
     * @param string|null $value Value to set for the externalCorrelationId property.
    */
    public function setExternalCorrelationId(?string $value): void {
        $this->externalCorrelationId = $value;
    }

    /**
     * Sets the id property value. Unique identifier for the callout instance. Read-only.
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the status property value. The status of the request to the custom extension. The possible values are: calloutSent, callbackReceived, calloutFailed, callbackTimedOut, waitingForCallback, unknownFutureValue.
     * @param CustomExtensionCalloutInstanceStatus|null $value Value to set for the status property.
    */
    public function setStatus(?CustomExtensionCalloutInstanceStatus $value): void {
        $this->status = $value;
    }

}
