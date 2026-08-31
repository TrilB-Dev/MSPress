<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateInterval;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RetentionSetting implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $interval The frequency of the backup.
    */
    private ?string $interval = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var DateInterval|null $period The period of time to retain the protected data for a single Microsoft 365 service.
    */
    private ?DateInterval $period = null;
    
    /**
     * Instantiates a new RetentionSetting and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RetentionSetting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RetentionSetting {
        return new RetentionSetting();
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
            'interval' => fn(ParseNode $n) => $o->setInterval($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'period' => fn(ParseNode $n) => $o->setPeriod($n->getDateIntervalValue()),
        ];
    }

    /**
     * Gets the interval property value. The frequency of the backup.
     * @return string|null
    */
    public function getInterval(): ?string {
        return $this->interval;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the period property value. The period of time to retain the protected data for a single Microsoft 365 service.
     * @return DateInterval|null
    */
    public function getPeriod(): ?DateInterval {
        return $this->period;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('interval', $this->getInterval());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeDateIntervalValue('period', $this->getPeriod());
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
     * Sets the interval property value. The frequency of the backup.
     * @param string|null $value Value to set for the interval property.
    */
    public function setInterval(?string $value): void {
        $this->interval = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the period property value. The period of time to retain the protected data for a single Microsoft 365 service.
     * @param DateInterval|null $value Value to set for the period property.
    */
    public function setPeriod(?DateInterval $value): void {
        $this->period = $value;
    }

}
