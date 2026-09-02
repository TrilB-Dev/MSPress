<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AnalyzedEmailUrl implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $detectionMethod The method used to detect threats in the URL.
    */
    private ?string $detectionMethod = null;
    
    /**
     * @var DetonationDetails|null $detonationDetails Detonation data associated with the URL.
    */
    private ?DetonationDetails $detonationDetails = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $tenantAllowBlockListDetailInfo Details of entries in tenant allow/block list configured by tenant.
    */
    private ?string $tenantAllowBlockListDetailInfo = null;
    
    /**
     * @var ThreatType|null $threatType The type of threat associated with the URL. The possible values are: unknown, spam, malware, phishing, none, unknownFutureValue.
    */
    private ?ThreatType $threatType = null;
    
    /**
     * @var string|null $url The URL that is found in the email. This is full URL string, including query parameters.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new AnalyzedEmailUrl and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AnalyzedEmailUrl
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AnalyzedEmailUrl {
        return new AnalyzedEmailUrl();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the detectionMethod property value. The method used to detect threats in the URL.
     * @return string|null
    */
    public function getDetectionMethod(): ?string {
        return $this->detectionMethod;
    }

    /**
     * Gets the detonationDetails property value. Detonation data associated with the URL.
     * @return DetonationDetails|null
    */
    public function getDetonationDetails(): ?DetonationDetails {
        return $this->detonationDetails;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'detectionMethod' => fn(ParseNode $n) => $o->setDetectionMethod($n->getStringValue()),
            'detonationDetails' => fn(ParseNode $n) => $o->setDetonationDetails($n->getObjectValue([DetonationDetails::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'tenantAllowBlockListDetailInfo' => fn(ParseNode $n) => $o->setTenantAllowBlockListDetailInfo($n->getStringValue()),
            'threatType' => fn(ParseNode $n) => $o->setThreatType($n->getEnumValue(ThreatType::class)),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
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
     * Gets the tenantAllowBlockListDetailInfo property value. Details of entries in tenant allow/block list configured by tenant.
     * @return string|null
    */
    public function getTenantAllowBlockListDetailInfo(): ?string {
        return $this->tenantAllowBlockListDetailInfo;
    }

    /**
     * Gets the threatType property value. The type of threat associated with the URL. The possible values are: unknown, spam, malware, phishing, none, unknownFutureValue.
     * @return ThreatType|null
    */
    public function getThreatType(): ?ThreatType {
        return $this->threatType;
    }

    /**
     * Gets the url property value. The URL that is found in the email. This is full URL string, including query parameters.
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('detectionMethod', $this->getDetectionMethod());
        $writer->writeObjectValue('detonationDetails', $this->getDetonationDetails());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('tenantAllowBlockListDetailInfo', $this->getTenantAllowBlockListDetailInfo());
        $writer->writeEnumValue('threatType', $this->getThreatType());
        $writer->writeStringValue('url', $this->getUrl());
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
     * Sets the detectionMethod property value. The method used to detect threats in the URL.
     * @param string|null $value Value to set for the detectionMethod property.
    */
    public function setDetectionMethod(?string $value): void {
        $this->detectionMethod = $value;
    }

    /**
     * Sets the detonationDetails property value. Detonation data associated with the URL.
     * @param DetonationDetails|null $value Value to set for the detonationDetails property.
    */
    public function setDetonationDetails(?DetonationDetails $value): void {
        $this->detonationDetails = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the tenantAllowBlockListDetailInfo property value. Details of entries in tenant allow/block list configured by tenant.
     * @param string|null $value Value to set for the tenantAllowBlockListDetailInfo property.
    */
    public function setTenantAllowBlockListDetailInfo(?string $value): void {
        $this->tenantAllowBlockListDetailInfo = $value;
    }

    /**
     * Sets the threatType property value. The type of threat associated with the URL. The possible values are: unknown, spam, malware, phishing, none, unknownFutureValue.
     * @param ThreatType|null $value Value to set for the threatType property.
    */
    public function setThreatType(?ThreatType $value): void {
        $this->threatType = $value;
    }

    /**
     * Sets the url property value. The URL that is found in the email. This is full URL string, including query parameters.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
