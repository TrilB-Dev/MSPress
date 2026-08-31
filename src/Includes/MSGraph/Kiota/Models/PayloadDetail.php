<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PayloadDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<PayloadCoachmark>|null $coachmarks The coachmarks property
    */
    private ?array $coachmarks = null;
    
    /**
     * @var string|null $content Payload content details.
    */
    private ?string $content = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $phishingUrl The phishing URL used to target a user.
    */
    private ?string $phishingUrl = null;
    
    /**
     * Instantiates a new PayloadDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PayloadDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PayloadDetail {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.emailPayloadDetail': return new EmailPayloadDetail();
            }
        }
        return new PayloadDetail();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the coachmarks property value. The coachmarks property
     * @return array<PayloadCoachmark>|null
    */
    public function getCoachmarks(): ?array {
        return $this->coachmarks;
    }

    /**
     * Gets the content property value. Payload content details.
     * @return string|null
    */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'coachmarks' => fn(ParseNode $n) => $o->setCoachmarks($n->getCollectionOfObjectValues([PayloadCoachmark::class, 'createFromDiscriminatorValue'])),
            'content' => fn(ParseNode $n) => $o->setContent($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'phishingUrl' => fn(ParseNode $n) => $o->setPhishingUrl($n->getStringValue()),
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
     * Gets the phishingUrl property value. The phishing URL used to target a user.
     * @return string|null
    */
    public function getPhishingUrl(): ?string {
        return $this->phishingUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('coachmarks', $this->getCoachmarks());
        $writer->writeStringValue('content', $this->getContent());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('phishingUrl', $this->getPhishingUrl());
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
     * Sets the coachmarks property value. The coachmarks property
     * @param array<PayloadCoachmark>|null $value Value to set for the coachmarks property.
    */
    public function setCoachmarks(?array $value): void {
        $this->coachmarks = $value;
    }

    /**
     * Sets the content property value. Payload content details.
     * @param string|null $value Value to set for the content property.
    */
    public function setContent(?string $value): void {
        $this->content = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the phishingUrl property value. The phishing URL used to target a user.
     * @param string|null $value Value to set for the phishingUrl property.
    */
    public function setPhishingUrl(?string $value): void {
        $this->phishingUrl = $value;
    }

}
