<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudVideoInteropInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $moreInfoWebUrl Provides other video teleconferencing (VTC) dial-in options. Read-only.
    */
    private ?string $moreInfoWebUrl = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $tenantKey The tenant key that is used to dial into the interactive voice response (IVR) of the partner CVI service.
    */
    private ?string $tenantKey = null;
    
    /**
     * @var string|null $videoTeleconferenceId The video teleconferencing ID. Read-only.
    */
    private ?string $videoTeleconferenceId = null;
    
    /**
     * Instantiates a new CloudVideoInteropInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudVideoInteropInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudVideoInteropInfo {
        return new CloudVideoInteropInfo();
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
            'moreInfoWebUrl' => fn(ParseNode $n) => $o->setMoreInfoWebUrl($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'tenantKey' => fn(ParseNode $n) => $o->setTenantKey($n->getStringValue()),
            'videoTeleconferenceId' => fn(ParseNode $n) => $o->setVideoTeleconferenceId($n->getStringValue()),
        ];
    }

    /**
     * Gets the moreInfoWebUrl property value. Provides other video teleconferencing (VTC) dial-in options. Read-only.
     * @return string|null
    */
    public function getMoreInfoWebUrl(): ?string {
        return $this->moreInfoWebUrl;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the tenantKey property value. The tenant key that is used to dial into the interactive voice response (IVR) of the partner CVI service.
     * @return string|null
    */
    public function getTenantKey(): ?string {
        return $this->tenantKey;
    }

    /**
     * Gets the videoTeleconferenceId property value. The video teleconferencing ID. Read-only.
     * @return string|null
    */
    public function getVideoTeleconferenceId(): ?string {
        return $this->videoTeleconferenceId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('moreInfoWebUrl', $this->getMoreInfoWebUrl());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('tenantKey', $this->getTenantKey());
        $writer->writeStringValue('videoTeleconferenceId', $this->getVideoTeleconferenceId());
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
     * Sets the moreInfoWebUrl property value. Provides other video teleconferencing (VTC) dial-in options. Read-only.
     * @param string|null $value Value to set for the moreInfoWebUrl property.
    */
    public function setMoreInfoWebUrl(?string $value): void {
        $this->moreInfoWebUrl = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the tenantKey property value. The tenant key that is used to dial into the interactive voice response (IVR) of the partner CVI service.
     * @param string|null $value Value to set for the tenantKey property.
    */
    public function setTenantKey(?string $value): void {
        $this->tenantKey = $value;
    }

    /**
     * Sets the videoTeleconferenceId property value. The video teleconferencing ID. Read-only.
     * @param string|null $value Value to set for the videoTeleconferenceId property.
    */
    public function setVideoTeleconferenceId(?string $value): void {
        $this->videoTeleconferenceId = $value;
    }

}
