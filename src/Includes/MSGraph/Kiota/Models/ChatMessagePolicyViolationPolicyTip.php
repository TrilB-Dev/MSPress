<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class ChatMessagePolicyViolationPolicyTip implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $complianceUrl The URL a user can visit to read about the data loss prevention policies for the organization. (ie, policies about what users shouldn't say in chats)
    */
    private ?string $complianceUrl = null;
    
    /**
     * @var string|null $generalText Explanatory text shown to the sender of the message.
    */
    private ?string $generalText = null;
    
    /**
     * @var array<string>|null $matchedConditionDescriptions The list of improper data in the message that was detected by the data loss prevention app. Each DLP app defines its own conditions, examples include 'Credit Card Number' and 'Social Security Number'.
    */
    private ?array $matchedConditionDescriptions = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new ChatMessagePolicyViolationPolicyTip and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ChatMessagePolicyViolationPolicyTip
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ChatMessagePolicyViolationPolicyTip {
        return new ChatMessagePolicyViolationPolicyTip();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the complianceUrl property value. The URL a user can visit to read about the data loss prevention policies for the organization. (ie, policies about what users shouldn't say in chats)
     * @return string|null
    */
    public function getComplianceUrl(): ?string {
        return $this->complianceUrl;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'complianceUrl' => fn(ParseNode $n) => $o->setComplianceUrl($n->getStringValue()),
            'generalText' => fn(ParseNode $n) => $o->setGeneralText($n->getStringValue()),
            'matchedConditionDescriptions' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setMatchedConditionDescriptions($val);
            },
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the generalText property value. Explanatory text shown to the sender of the message.
     * @return string|null
    */
    public function getGeneralText(): ?string {
        return $this->generalText;
    }

    /**
     * Gets the matchedConditionDescriptions property value. The list of improper data in the message that was detected by the data loss prevention app. Each DLP app defines its own conditions, examples include 'Credit Card Number' and 'Social Security Number'.
     * @return array<string>|null
    */
    public function getMatchedConditionDescriptions(): ?array {
        return $this->matchedConditionDescriptions;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('complianceUrl', $this->getComplianceUrl());
        $writer->writeStringValue('generalText', $this->getGeneralText());
        $writer->writeCollectionOfPrimitiveValues('matchedConditionDescriptions', $this->getMatchedConditionDescriptions());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the complianceUrl property value. The URL a user can visit to read about the data loss prevention policies for the organization. (ie, policies about what users shouldn't say in chats)
     * @param string|null $value Value to set for the complianceUrl property.
    */
    public function setComplianceUrl(?string $value): void {
        $this->complianceUrl = $value;
    }

    /**
     * Sets the generalText property value. Explanatory text shown to the sender of the message.
     * @param string|null $value Value to set for the generalText property.
    */
    public function setGeneralText(?string $value): void {
        $this->generalText = $value;
    }

    /**
     * Sets the matchedConditionDescriptions property value. The list of improper data in the message that was detected by the data loss prevention app. Each DLP app defines its own conditions, examples include 'Credit Card Number' and 'Social Security Number'.
     * @param array<string>|null $value Value to set for the matchedConditionDescriptions property.
    */
    public function setMatchedConditionDescriptions(?array $value): void {
        $this->matchedConditionDescriptions = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
