<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CvssSummary implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var float|null $score The CVSS score about this vulnerability.
    */
    private ?float $score = null;
    
    /**
     * @var VulnerabilitySeverity|null $severity The CVSS severity rating for this vulnerability. The possible values are: none, low, medium, high, critical, unknownFutureValue.
    */
    private ?VulnerabilitySeverity $severity = null;
    
    /**
     * @var string|null $vectorString The CVSS vector string for this vulnerability.
    */
    private ?string $vectorString = null;
    
    /**
     * Instantiates a new CvssSummary and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CvssSummary
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CvssSummary {
        return new CvssSummary();
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
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'score' => fn(ParseNode $n) => $o->setScore($n->getFloatValue()),
            'severity' => fn(ParseNode $n) => $o->setSeverity($n->getEnumValue(VulnerabilitySeverity::class)),
            'vectorString' => fn(ParseNode $n) => $o->setVectorString($n->getStringValue()),
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
     * Gets the score property value. The CVSS score about this vulnerability.
     * @return float|null
    */
    public function getScore(): ?float {
        return $this->score;
    }

    /**
     * Gets the severity property value. The CVSS severity rating for this vulnerability. The possible values are: none, low, medium, high, critical, unknownFutureValue.
     * @return VulnerabilitySeverity|null
    */
    public function getSeverity(): ?VulnerabilitySeverity {
        return $this->severity;
    }

    /**
     * Gets the vectorString property value. The CVSS vector string for this vulnerability.
     * @return string|null
    */
    public function getVectorString(): ?string {
        return $this->vectorString;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeFloatValue('score', $this->getScore());
        $writer->writeEnumValue('severity', $this->getSeverity());
        $writer->writeStringValue('vectorString', $this->getVectorString());
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
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the score property value. The CVSS score about this vulnerability.
     * @param float|null $value Value to set for the score property.
    */
    public function setScore(?float $value): void {
        $this->score = $value;
    }

    /**
     * Sets the severity property value. The CVSS severity rating for this vulnerability. The possible values are: none, low, medium, high, critical, unknownFutureValue.
     * @param VulnerabilitySeverity|null $value Value to set for the severity property.
    */
    public function setSeverity(?VulnerabilitySeverity $value): void {
        $this->severity = $value;
    }

    /**
     * Sets the vectorString property value. The CVSS vector string for this vulnerability.
     * @param string|null $value Value to set for the vectorString property.
    */
    public function setVectorString(?string $value): void {
        $this->vectorString = $value;
    }

}
