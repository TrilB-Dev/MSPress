<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SynchronizationMetadataEntry implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var SynchronizationMetadata|null $key The possible values are: GalleryApplicationIdentifier, GalleryApplicationKey, IsOAuthEnabled, IsSynchronizationAgentAssignmentRequired, IsSynchronizationAgentRequired, IsSynchronizationInPreview, OAuthSettings, SynchronizationLearnMoreIbizaFwLink, ConfigurationFields.
    */
    private ?SynchronizationMetadata $key = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $value Value of the metadata property.
    */
    private ?string $value = null;
    
    /**
     * Instantiates a new SynchronizationMetadataEntry and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SynchronizationMetadataEntry
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SynchronizationMetadataEntry {
        return new SynchronizationMetadataEntry();
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
            'key' => fn(ParseNode $n) => $o->setKey($n->getEnumValue(SynchronizationMetadata::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'value' => fn(ParseNode $n) => $o->setValue($n->getStringValue()),
        ];
    }

    /**
     * Gets the key property value. The possible values are: GalleryApplicationIdentifier, GalleryApplicationKey, IsOAuthEnabled, IsSynchronizationAgentAssignmentRequired, IsSynchronizationAgentRequired, IsSynchronizationInPreview, OAuthSettings, SynchronizationLearnMoreIbizaFwLink, ConfigurationFields.
     * @return SynchronizationMetadata|null
    */
    public function getKey(): ?SynchronizationMetadata {
        return $this->key;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the value property value. Value of the metadata property.
     * @return string|null
    */
    public function getValue(): ?string {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('key', $this->getKey());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('value', $this->getValue());
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
     * Sets the key property value. The possible values are: GalleryApplicationIdentifier, GalleryApplicationKey, IsOAuthEnabled, IsSynchronizationAgentAssignmentRequired, IsSynchronizationAgentRequired, IsSynchronizationInPreview, OAuthSettings, SynchronizationLearnMoreIbizaFwLink, ConfigurationFields.
     * @param SynchronizationMetadata|null $value Value to set for the key property.
    */
    public function setKey(?SynchronizationMetadata $value): void {
        $this->key = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the value property value. Value of the metadata property.
     * @param string|null $value Value to set for the value property.
    */
    public function setValue(?string $value): void {
        $this->value = $value;
    }

}
