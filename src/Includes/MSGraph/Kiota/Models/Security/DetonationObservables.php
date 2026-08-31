<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class DetonationObservables implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $contactedIps The list of all contacted IPs in the detonation.
    */
    private ?array $contactedIps = null;
    
    /**
     * @var array<string>|null $contactedUrls The list of all URLs found in the detonation.
    */
    private ?array $contactedUrls = null;
    
    /**
     * @var array<string>|null $droppedfiles The list of all dropped files in the detonation.
    */
    private ?array $droppedfiles = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new DetonationObservables and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DetonationObservables
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DetonationObservables {
        return new DetonationObservables();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the contactedIps property value. The list of all contacted IPs in the detonation.
     * @return array<string>|null
    */
    public function getContactedIps(): ?array {
        return $this->contactedIps;
    }

    /**
     * Gets the contactedUrls property value. The list of all URLs found in the detonation.
     * @return array<string>|null
    */
    public function getContactedUrls(): ?array {
        return $this->contactedUrls;
    }

    /**
     * Gets the droppedfiles property value. The list of all dropped files in the detonation.
     * @return array<string>|null
    */
    public function getDroppedfiles(): ?array {
        return $this->droppedfiles;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'contactedIps' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setContactedIps($val);
            },
            'contactedUrls' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setContactedUrls($val);
            },
            'droppedfiles' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDroppedfiles($val);
            },
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('contactedIps', $this->getContactedIps());
        $writer->writeCollectionOfPrimitiveValues('contactedUrls', $this->getContactedUrls());
        $writer->writeCollectionOfPrimitiveValues('droppedfiles', $this->getDroppedfiles());
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
     * Sets the contactedIps property value. The list of all contacted IPs in the detonation.
     * @param array<string>|null $value Value to set for the contactedIps property.
    */
    public function setContactedIps(?array $value): void {
        $this->contactedIps = $value;
    }

    /**
     * Sets the contactedUrls property value. The list of all URLs found in the detonation.
     * @param array<string>|null $value Value to set for the contactedUrls property.
    */
    public function setContactedUrls(?array $value): void {
        $this->contactedUrls = $value;
    }

    /**
     * Sets the droppedfiles property value. The list of all dropped files in the detonation.
     * @param array<string>|null $value Value to set for the droppedfiles property.
    */
    public function setDroppedfiles(?array $value): void {
        $this->droppedfiles = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
