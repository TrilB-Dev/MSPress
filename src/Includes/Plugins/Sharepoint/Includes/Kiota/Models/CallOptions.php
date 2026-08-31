<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CallOptions implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $hideBotAfterEscalation Indicates whether to hide the app after the call is escalated.
    */
    private ?bool $hideBotAfterEscalation = null;
    
    /**
     * @var bool|null $isContentSharingNotificationEnabled Indicates whether content sharing notifications should be enabled for the call.
    */
    private ?bool $isContentSharingNotificationEnabled = null;
    
    /**
     * @var bool|null $isDeltaRosterEnabled Indicates whether delta roster is enabled for the call.
    */
    private ?bool $isDeltaRosterEnabled = null;
    
    /**
     * @var bool|null $isInteractiveRosterEnabled Indicates whether delta roster filtering by participant interactivity is enabled.
    */
    private ?bool $isInteractiveRosterEnabled = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new CallOptions and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CallOptions
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CallOptions {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.incomingCallOptions': return new IncomingCallOptions();
                case '#microsoft.graph.outgoingCallOptions': return new OutgoingCallOptions();
            }
        }
        return new CallOptions();
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
            'hideBotAfterEscalation' => fn(ParseNode $n) => $o->setHideBotAfterEscalation($n->getBooleanValue()),
            'isContentSharingNotificationEnabled' => fn(ParseNode $n) => $o->setIsContentSharingNotificationEnabled($n->getBooleanValue()),
            'isDeltaRosterEnabled' => fn(ParseNode $n) => $o->setIsDeltaRosterEnabled($n->getBooleanValue()),
            'isInteractiveRosterEnabled' => fn(ParseNode $n) => $o->setIsInteractiveRosterEnabled($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the hideBotAfterEscalation property value. Indicates whether to hide the app after the call is escalated.
     * @return bool|null
    */
    public function getHideBotAfterEscalation(): ?bool {
        return $this->hideBotAfterEscalation;
    }

    /**
     * Gets the isContentSharingNotificationEnabled property value. Indicates whether content sharing notifications should be enabled for the call.
     * @return bool|null
    */
    public function getIsContentSharingNotificationEnabled(): ?bool {
        return $this->isContentSharingNotificationEnabled;
    }

    /**
     * Gets the isDeltaRosterEnabled property value. Indicates whether delta roster is enabled for the call.
     * @return bool|null
    */
    public function getIsDeltaRosterEnabled(): ?bool {
        return $this->isDeltaRosterEnabled;
    }

    /**
     * Gets the isInteractiveRosterEnabled property value. Indicates whether delta roster filtering by participant interactivity is enabled.
     * @return bool|null
    */
    public function getIsInteractiveRosterEnabled(): ?bool {
        return $this->isInteractiveRosterEnabled;
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
        $writer->writeBooleanValue('hideBotAfterEscalation', $this->getHideBotAfterEscalation());
        $writer->writeBooleanValue('isContentSharingNotificationEnabled', $this->getIsContentSharingNotificationEnabled());
        $writer->writeBooleanValue('isDeltaRosterEnabled', $this->getIsDeltaRosterEnabled());
        $writer->writeBooleanValue('isInteractiveRosterEnabled', $this->getIsInteractiveRosterEnabled());
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
     * Sets the hideBotAfterEscalation property value. Indicates whether to hide the app after the call is escalated.
     * @param bool|null $value Value to set for the hideBotAfterEscalation property.
    */
    public function setHideBotAfterEscalation(?bool $value): void {
        $this->hideBotAfterEscalation = $value;
    }

    /**
     * Sets the isContentSharingNotificationEnabled property value. Indicates whether content sharing notifications should be enabled for the call.
     * @param bool|null $value Value to set for the isContentSharingNotificationEnabled property.
    */
    public function setIsContentSharingNotificationEnabled(?bool $value): void {
        $this->isContentSharingNotificationEnabled = $value;
    }

    /**
     * Sets the isDeltaRosterEnabled property value. Indicates whether delta roster is enabled for the call.
     * @param bool|null $value Value to set for the isDeltaRosterEnabled property.
    */
    public function setIsDeltaRosterEnabled(?bool $value): void {
        $this->isDeltaRosterEnabled = $value;
    }

    /**
     * Sets the isInteractiveRosterEnabled property value. Indicates whether delta roster filtering by participant interactivity is enabled.
     * @param bool|null $value Value to set for the isInteractiveRosterEnabled property.
    */
    public function setIsInteractiveRosterEnabled(?bool $value): void {
        $this->isInteractiveRosterEnabled = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
