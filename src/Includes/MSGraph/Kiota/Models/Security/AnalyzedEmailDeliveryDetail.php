<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AnalyzedEmailDeliveryDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var DeliveryAction|null $action The delivery action of the email. The possible values are: unknown, deliveredToJunk, delivered, blocked, replaced, unknownFutureValue.
    */
    private ?DeliveryAction $action = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $latestThreats Latest known threat on the email.
    */
    private ?string $latestThreats = null;
    
    /**
     * @var DeliveryLocation|null $location The delivery location of the email. The possible values are: unknown, inboxfolder, junkFolder, deletedFolder, quarantine, onpremexternal, failed, dropped, others, unknownFutureValue.
    */
    private ?DeliveryLocation $location = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $originalThreats Threats identified at the time of delivery.
    */
    private ?string $originalThreats = null;
    
    /**
     * Instantiates a new AnalyzedEmailDeliveryDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AnalyzedEmailDeliveryDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AnalyzedEmailDeliveryDetail {
        return new AnalyzedEmailDeliveryDetail();
    }

    /**
     * Gets the action property value. The delivery action of the email. The possible values are: unknown, deliveredToJunk, delivered, blocked, replaced, unknownFutureValue.
     * @return DeliveryAction|null
    */
    public function getAction(): ?DeliveryAction {
        return $this->action;
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
            'action' => fn(ParseNode $n) => $o->setAction($n->getEnumValue(DeliveryAction::class)),
            'latestThreats' => fn(ParseNode $n) => $o->setLatestThreats($n->getStringValue()),
            'location' => fn(ParseNode $n) => $o->setLocation($n->getEnumValue(DeliveryLocation::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'originalThreats' => fn(ParseNode $n) => $o->setOriginalThreats($n->getStringValue()),
        ];
    }

    /**
     * Gets the latestThreats property value. Latest known threat on the email.
     * @return string|null
    */
    public function getLatestThreats(): ?string {
        return $this->latestThreats;
    }

    /**
     * Gets the location property value. The delivery location of the email. The possible values are: unknown, inboxfolder, junkFolder, deletedFolder, quarantine, onpremexternal, failed, dropped, others, unknownFutureValue.
     * @return DeliveryLocation|null
    */
    public function getLocation(): ?DeliveryLocation {
        return $this->location;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the originalThreats property value. Threats identified at the time of delivery.
     * @return string|null
    */
    public function getOriginalThreats(): ?string {
        return $this->originalThreats;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('action', $this->getAction());
        $writer->writeStringValue('latestThreats', $this->getLatestThreats());
        $writer->writeEnumValue('location', $this->getLocation());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('originalThreats', $this->getOriginalThreats());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the action property value. The delivery action of the email. The possible values are: unknown, deliveredToJunk, delivered, blocked, replaced, unknownFutureValue.
     * @param DeliveryAction|null $value Value to set for the action property.
    */
    public function setAction(?DeliveryAction $value): void {
        $this->action = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the latestThreats property value. Latest known threat on the email.
     * @param string|null $value Value to set for the latestThreats property.
    */
    public function setLatestThreats(?string $value): void {
        $this->latestThreats = $value;
    }

    /**
     * Sets the location property value. The delivery location of the email. The possible values are: unknown, inboxfolder, junkFolder, deletedFolder, quarantine, onpremexternal, failed, dropped, others, unknownFutureValue.
     * @param DeliveryLocation|null $value Value to set for the location property.
    */
    public function setLocation(?DeliveryLocation $value): void {
        $this->location = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the originalThreats property value. Threats identified at the time of delivery.
     * @param string|null $value Value to set for the originalThreats property.
    */
    public function setOriginalThreats(?string $value): void {
        $this->originalThreats = $value;
    }

}
