<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AnalyzedEmailAuthenticationDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $compositeAuthentication A value used by Microsoft 365 to combine email authentication such as SPF, DKIM, and DMARC, to determine whether the message is authentic.
    */
    private ?string $compositeAuthentication = null;
    
    /**
     * @var string|null $dkim DomainKeys identified mail (DKIM). Indicates whether it was pass/fail/soft fail.
    */
    private ?string $dkim = null;
    
    /**
     * @var string|null $dmarc Domain-based Message Authentication. Indicates whether it was pass/fail/soft fail.
    */
    private ?string $dmarc = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $senderPolicyFramework Sender Policy Framework (SPF). Indicates whether it was pass/fail/soft fail.
    */
    private ?string $senderPolicyFramework = null;
    
    /**
     * Instantiates a new AnalyzedEmailAuthenticationDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AnalyzedEmailAuthenticationDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AnalyzedEmailAuthenticationDetail {
        return new AnalyzedEmailAuthenticationDetail();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the compositeAuthentication property value. A value used by Microsoft 365 to combine email authentication such as SPF, DKIM, and DMARC, to determine whether the message is authentic.
     * @return string|null
    */
    public function getCompositeAuthentication(): ?string {
        return $this->compositeAuthentication;
    }

    /**
     * Gets the dkim property value. DomainKeys identified mail (DKIM). Indicates whether it was pass/fail/soft fail.
     * @return string|null
    */
    public function getDkim(): ?string {
        return $this->dkim;
    }

    /**
     * Gets the dmarc property value. Domain-based Message Authentication. Indicates whether it was pass/fail/soft fail.
     * @return string|null
    */
    public function getDmarc(): ?string {
        return $this->dmarc;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'compositeAuthentication' => fn(ParseNode $n) => $o->setCompositeAuthentication($n->getStringValue()),
            'dkim' => fn(ParseNode $n) => $o->setDkim($n->getStringValue()),
            'dmarc' => fn(ParseNode $n) => $o->setDmarc($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'senderPolicyFramework' => fn(ParseNode $n) => $o->setSenderPolicyFramework($n->getStringValue()),
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
     * Gets the senderPolicyFramework property value. Sender Policy Framework (SPF). Indicates whether it was pass/fail/soft fail.
     * @return string|null
    */
    public function getSenderPolicyFramework(): ?string {
        return $this->senderPolicyFramework;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('compositeAuthentication', $this->getCompositeAuthentication());
        $writer->writeStringValue('dkim', $this->getDkim());
        $writer->writeStringValue('dmarc', $this->getDmarc());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('senderPolicyFramework', $this->getSenderPolicyFramework());
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
     * Sets the compositeAuthentication property value. A value used by Microsoft 365 to combine email authentication such as SPF, DKIM, and DMARC, to determine whether the message is authentic.
     * @param string|null $value Value to set for the compositeAuthentication property.
    */
    public function setCompositeAuthentication(?string $value): void {
        $this->compositeAuthentication = $value;
    }

    /**
     * Sets the dkim property value. DomainKeys identified mail (DKIM). Indicates whether it was pass/fail/soft fail.
     * @param string|null $value Value to set for the dkim property.
    */
    public function setDkim(?string $value): void {
        $this->dkim = $value;
    }

    /**
     * Sets the dmarc property value. Domain-based Message Authentication. Indicates whether it was pass/fail/soft fail.
     * @param string|null $value Value to set for the dmarc property.
    */
    public function setDmarc(?string $value): void {
        $this->dmarc = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the senderPolicyFramework property value. Sender Policy Framework (SPF). Indicates whether it was pass/fail/soft fail.
     * @param string|null $value Value to set for the senderPolicyFramework property.
    */
    public function setSenderPolicyFramework(?string $value): void {
        $this->senderPolicyFramework = $value;
    }

}
