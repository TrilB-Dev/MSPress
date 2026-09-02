<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ThreatDetectionDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $confidenceLevel Indicates the confidence level in the threat detection.
    */
    private ?string $confidenceLevel = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $priorityAccountProtection Indicates if the account has priority protection enabled.
    */
    private ?string $priorityAccountProtection = null;
    
    /**
     * @var string|null $threats Lists the detected threats.
    */
    private ?string $threats = null;
    
    /**
     * Instantiates a new ThreatDetectionDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ThreatDetectionDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ThreatDetectionDetail {
        return new ThreatDetectionDetail();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the confidenceLevel property value. Indicates the confidence level in the threat detection.
     * @return string|null
    */
    public function getConfidenceLevel(): ?string {
        return $this->confidenceLevel;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'confidenceLevel' => fn(ParseNode $n) => $o->setConfidenceLevel($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'priorityAccountProtection' => fn(ParseNode $n) => $o->setPriorityAccountProtection($n->getStringValue()),
            'threats' => fn(ParseNode $n) => $o->setThreats($n->getStringValue()),
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
     * Gets the priorityAccountProtection property value. Indicates if the account has priority protection enabled.
     * @return string|null
    */
    public function getPriorityAccountProtection(): ?string {
        return $this->priorityAccountProtection;
    }

    /**
     * Gets the threats property value. Lists the detected threats.
     * @return string|null
    */
    public function getThreats(): ?string {
        return $this->threats;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('confidenceLevel', $this->getConfidenceLevel());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('priorityAccountProtection', $this->getPriorityAccountProtection());
        $writer->writeStringValue('threats', $this->getThreats());
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
     * Sets the confidenceLevel property value. Indicates the confidence level in the threat detection.
     * @param string|null $value Value to set for the confidenceLevel property.
    */
    public function setConfidenceLevel(?string $value): void {
        $this->confidenceLevel = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the priorityAccountProtection property value. Indicates if the account has priority protection enabled.
     * @param string|null $value Value to set for the priorityAccountProtection property.
    */
    public function setPriorityAccountProtection(?string $value): void {
        $this->priorityAccountProtection = $value;
    }

    /**
     * Sets the threats property value. Lists the detected threats.
     * @param string|null $value Value to set for the threats property.
    */
    public function setThreats(?string $value): void {
        $this->threats = $value;
    }

}
