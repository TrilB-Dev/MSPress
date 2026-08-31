<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OnPremisesAccidentalDeletionPrevention implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $alertThreshold Threshold value which triggers accidental deletion prevention. The threshold is either an absolute number of objects or a percentage number of objects.
    */
    private ?int $alertThreshold = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var OnPremisesDirectorySynchronizationDeletionPreventionType|null $synchronizationPreventionType The status of the accidental deletion prevention feature. The possible values are: disabled, enabledForCount, enabledForPercentage, unknownFutureValue.
    */
    private ?OnPremisesDirectorySynchronizationDeletionPreventionType $synchronizationPreventionType = null;
    
    /**
     * Instantiates a new OnPremisesAccidentalDeletionPrevention and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnPremisesAccidentalDeletionPrevention
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnPremisesAccidentalDeletionPrevention {
        return new OnPremisesAccidentalDeletionPrevention();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the alertThreshold property value. Threshold value which triggers accidental deletion prevention. The threshold is either an absolute number of objects or a percentage number of objects.
     * @return int|null
    */
    public function getAlertThreshold(): ?int {
        return $this->alertThreshold;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'alertThreshold' => fn(ParseNode $n) => $o->setAlertThreshold($n->getIntegerValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'synchronizationPreventionType' => fn(ParseNode $n) => $o->setSynchronizationPreventionType($n->getEnumValue(OnPremisesDirectorySynchronizationDeletionPreventionType::class)),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the synchronizationPreventionType property value. The status of the accidental deletion prevention feature. The possible values are: disabled, enabledForCount, enabledForPercentage, unknownFutureValue.
     * @return OnPremisesDirectorySynchronizationDeletionPreventionType|null
    */
    public function getSynchronizationPreventionType(): ?OnPremisesDirectorySynchronizationDeletionPreventionType {
        return $this->synchronizationPreventionType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('alertThreshold', $this->getAlertThreshold());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('synchronizationPreventionType', $this->getSynchronizationPreventionType());
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
     * Sets the alertThreshold property value. Threshold value which triggers accidental deletion prevention. The threshold is either an absolute number of objects or a percentage number of objects.
     * @param int|null $value Value to set for the alertThreshold property.
    */
    public function setAlertThreshold(?int $value): void {
        $this->alertThreshold = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the synchronizationPreventionType property value. The status of the accidental deletion prevention feature. The possible values are: disabled, enabledForCount, enabledForPercentage, unknownFutureValue.
     * @param OnPremisesDirectorySynchronizationDeletionPreventionType|null $value Value to set for the synchronizationPreventionType property.
    */
    public function setSynchronizationPreventionType(?OnPremisesDirectorySynchronizationDeletionPreventionType $value): void {
        $this->synchronizationPreventionType = $value;
    }

}
