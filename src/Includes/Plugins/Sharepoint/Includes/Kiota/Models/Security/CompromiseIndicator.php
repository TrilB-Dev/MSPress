<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CompromiseIndicator implements AdditionalDataHolder, Parsable 
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
     * @var string|null $value Indicator.
    */
    private ?string $value = null;
    
    /**
     * @var VerdictCategory|null $verdict The possible values are: none, malware, phish, siteUnavailable, spam, decryptionFailed, unsupportedUriScheme, unsupportedFileType, undefined, unknownFutureValue.
    */
    private ?VerdictCategory $verdict = null;
    
    /**
     * Instantiates a new CompromiseIndicator and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CompromiseIndicator
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CompromiseIndicator {
        return new CompromiseIndicator();
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
            'value' => fn(ParseNode $n) => $o->setValue($n->getStringValue()),
            'verdict' => fn(ParseNode $n) => $o->setVerdict($n->getEnumValue(VerdictCategory::class)),
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
     * Gets the value property value. Indicator.
     * @return string|null
    */
    public function getValue(): ?string {
        return $this->value;
    }

    /**
     * Gets the verdict property value. The possible values are: none, malware, phish, siteUnavailable, spam, decryptionFailed, unsupportedUriScheme, unsupportedFileType, undefined, unknownFutureValue.
     * @return VerdictCategory|null
    */
    public function getVerdict(): ?VerdictCategory {
        return $this->verdict;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('value', $this->getValue());
        $writer->writeEnumValue('verdict', $this->getVerdict());
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
     * Sets the value property value. Indicator.
     * @param string|null $value Value to set for the value property.
    */
    public function setValue(?string $value): void {
        $this->value = $value;
    }

    /**
     * Sets the verdict property value. The possible values are: none, malware, phish, siteUnavailable, spam, decryptionFailed, unsupportedUriScheme, unsupportedFileType, undefined, unknownFutureValue.
     * @param VerdictCategory|null $value Value to set for the verdict property.
    */
    public function setVerdict(?VerdictCategory $value): void {
        $this->verdict = $value;
    }

}
