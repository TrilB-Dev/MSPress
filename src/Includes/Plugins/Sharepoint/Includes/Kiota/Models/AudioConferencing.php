<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class AudioConferencing implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $conferenceId The conference id of the online meeting.
    */
    private ?string $conferenceId = null;
    
    /**
     * @var string|null $dialinUrl A URL to the externally-accessible web page that contains dial-in information.
    */
    private ?string $dialinUrl = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $tollFreeNumber The toll-free number that connects to the Audio Conference Provider.
    */
    private ?string $tollFreeNumber = null;
    
    /**
     * @var array<string>|null $tollFreeNumbers List of toll-free numbers that are displayed in the meeting invite.
    */
    private ?array $tollFreeNumbers = null;
    
    /**
     * @var string|null $tollNumber The toll number that connects to the Audio Conference Provider.
    */
    private ?string $tollNumber = null;
    
    /**
     * @var array<string>|null $tollNumbers List of toll numbers that are displayed in the meeting invite.
    */
    private ?array $tollNumbers = null;
    
    /**
     * Instantiates a new AudioConferencing and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AudioConferencing
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AudioConferencing {
        return new AudioConferencing();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the conferenceId property value. The conference id of the online meeting.
     * @return string|null
    */
    public function getConferenceId(): ?string {
        return $this->conferenceId;
    }

    /**
     * Gets the dialinUrl property value. A URL to the externally-accessible web page that contains dial-in information.
     * @return string|null
    */
    public function getDialinUrl(): ?string {
        return $this->dialinUrl;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'conferenceId' => fn(ParseNode $n) => $o->setConferenceId($n->getStringValue()),
            'dialinUrl' => fn(ParseNode $n) => $o->setDialinUrl($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'tollFreeNumber' => fn(ParseNode $n) => $o->setTollFreeNumber($n->getStringValue()),
            'tollFreeNumbers' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTollFreeNumbers($val);
            },
            'tollNumber' => fn(ParseNode $n) => $o->setTollNumber($n->getStringValue()),
            'tollNumbers' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTollNumbers($val);
            },
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
     * Gets the tollFreeNumber property value. The toll-free number that connects to the Audio Conference Provider.
     * @return string|null
    */
    public function getTollFreeNumber(): ?string {
        return $this->tollFreeNumber;
    }

    /**
     * Gets the tollFreeNumbers property value. List of toll-free numbers that are displayed in the meeting invite.
     * @return array<string>|null
    */
    public function getTollFreeNumbers(): ?array {
        return $this->tollFreeNumbers;
    }

    /**
     * Gets the tollNumber property value. The toll number that connects to the Audio Conference Provider.
     * @return string|null
    */
    public function getTollNumber(): ?string {
        return $this->tollNumber;
    }

    /**
     * Gets the tollNumbers property value. List of toll numbers that are displayed in the meeting invite.
     * @return array<string>|null
    */
    public function getTollNumbers(): ?array {
        return $this->tollNumbers;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('conferenceId', $this->getConferenceId());
        $writer->writeStringValue('dialinUrl', $this->getDialinUrl());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('tollFreeNumber', $this->getTollFreeNumber());
        $writer->writeCollectionOfPrimitiveValues('tollFreeNumbers', $this->getTollFreeNumbers());
        $writer->writeStringValue('tollNumber', $this->getTollNumber());
        $writer->writeCollectionOfPrimitiveValues('tollNumbers', $this->getTollNumbers());
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
     * Sets the conferenceId property value. The conference id of the online meeting.
     * @param string|null $value Value to set for the conferenceId property.
    */
    public function setConferenceId(?string $value): void {
        $this->conferenceId = $value;
    }

    /**
     * Sets the dialinUrl property value. A URL to the externally-accessible web page that contains dial-in information.
     * @param string|null $value Value to set for the dialinUrl property.
    */
    public function setDialinUrl(?string $value): void {
        $this->dialinUrl = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the tollFreeNumber property value. The toll-free number that connects to the Audio Conference Provider.
     * @param string|null $value Value to set for the tollFreeNumber property.
    */
    public function setTollFreeNumber(?string $value): void {
        $this->tollFreeNumber = $value;
    }

    /**
     * Sets the tollFreeNumbers property value. List of toll-free numbers that are displayed in the meeting invite.
     * @param array<string>|null $value Value to set for the tollFreeNumbers property.
    */
    public function setTollFreeNumbers(?array $value): void {
        $this->tollFreeNumbers = $value;
    }

    /**
     * Sets the tollNumber property value. The toll number that connects to the Audio Conference Provider.
     * @param string|null $value Value to set for the tollNumber property.
    */
    public function setTollNumber(?string $value): void {
        $this->tollNumber = $value;
    }

    /**
     * Sets the tollNumbers property value. List of toll numbers that are displayed in the meeting invite.
     * @param array<string>|null $value Value to set for the tollNumbers property.
    */
    public function setTollNumbers(?array $value): void {
        $this->tollNumbers = $value;
    }

}
