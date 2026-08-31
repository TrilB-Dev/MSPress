<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OutOfOfficeSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $isOutOfOffice If true, either of the following is met:The current time falls within the out-of-office window configured in Outlook or Teams.An event marked as 'Show as Out of Office' appears on the user's calendar.Otherwise, false.
    */
    private ?bool $isOutOfOffice = null;
    
    /**
     * @var string|null $message The out-of-office message configured by the user in the Outlook client (Automatic replies) or the Teams client (Schedule out of office).
    */
    private ?string $message = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new OutOfOfficeSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OutOfOfficeSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OutOfOfficeSettings {
        return new OutOfOfficeSettings();
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
            'isOutOfOffice' => fn(ParseNode $n) => $o->setIsOutOfOffice($n->getBooleanValue()),
            'message' => fn(ParseNode $n) => $o->setMessage($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isOutOfOffice property value. If true, either of the following is met:The current time falls within the out-of-office window configured in Outlook or Teams.An event marked as 'Show as Out of Office' appears on the user's calendar.Otherwise, false.
     * @return bool|null
    */
    public function getIsOutOfOffice(): ?bool {
        return $this->isOutOfOffice;
    }

    /**
     * Gets the message property value. The out-of-office message configured by the user in the Outlook client (Automatic replies) or the Teams client (Schedule out of office).
     * @return string|null
    */
    public function getMessage(): ?string {
        return $this->message;
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
        $writer->writeBooleanValue('isOutOfOffice', $this->getIsOutOfOffice());
        $writer->writeStringValue('message', $this->getMessage());
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
     * Sets the isOutOfOffice property value. If true, either of the following is met:The current time falls within the out-of-office window configured in Outlook or Teams.An event marked as 'Show as Out of Office' appears on the user's calendar.Otherwise, false.
     * @param bool|null $value Value to set for the isOutOfOffice property.
    */
    public function setIsOutOfOffice(?bool $value): void {
        $this->isOutOfOffice = $value;
    }

    /**
     * Sets the message property value. The out-of-office message configured by the user in the Outlook client (Automatic replies) or the Teams client (Schedule out of office).
     * @param string|null $value Value to set for the message property.
    */
    public function setMessage(?string $value): void {
        $this->message = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
