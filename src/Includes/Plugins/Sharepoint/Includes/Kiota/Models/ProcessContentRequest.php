<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProcessContentRequest implements AdditionalDataHolder, Parsable 
{
    /**
     * @var ActivityMetadata|null $activityMetadata The activityMetadata property
    */
    private ?ActivityMetadata $activityMetadata = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<ProcessContentMetadataBase>|null $contentEntries A collection of content entries to be processed. Each entry contains the content itself and its metadata. Use conversation metadata for content like prompts and responses and file metadata for files. Required.
    */
    private ?array $contentEntries = null;
    
    /**
     * @var DeviceMetadata|null $deviceMetadata The deviceMetadata property
    */
    private ?DeviceMetadata $deviceMetadata = null;
    
    /**
     * @var IntegratedApplicationMetadata|null $integratedAppMetadata The integratedAppMetadata property
    */
    private ?IntegratedApplicationMetadata $integratedAppMetadata = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ProtectedApplicationMetadata|null $protectedAppMetadata Metadata about the protected application making the request. Required.
    */
    private ?ProtectedApplicationMetadata $protectedAppMetadata = null;
    
    /**
     * Instantiates a new ProcessContentRequest and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProcessContentRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProcessContentRequest {
        return new ProcessContentRequest();
    }

    /**
     * Gets the activityMetadata property value. The activityMetadata property
     * @return ActivityMetadata|null
    */
    public function getActivityMetadata(): ?ActivityMetadata {
        return $this->activityMetadata;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the contentEntries property value. A collection of content entries to be processed. Each entry contains the content itself and its metadata. Use conversation metadata for content like prompts and responses and file metadata for files. Required.
     * @return array<ProcessContentMetadataBase>|null
    */
    public function getContentEntries(): ?array {
        return $this->contentEntries;
    }

    /**
     * Gets the deviceMetadata property value. The deviceMetadata property
     * @return DeviceMetadata|null
    */
    public function getDeviceMetadata(): ?DeviceMetadata {
        return $this->deviceMetadata;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'activityMetadata' => fn(ParseNode $n) => $o->setActivityMetadata($n->getObjectValue([ActivityMetadata::class, 'createFromDiscriminatorValue'])),
            'contentEntries' => fn(ParseNode $n) => $o->setContentEntries($n->getCollectionOfObjectValues([ProcessContentMetadataBase::class, 'createFromDiscriminatorValue'])),
            'deviceMetadata' => fn(ParseNode $n) => $o->setDeviceMetadata($n->getObjectValue([DeviceMetadata::class, 'createFromDiscriminatorValue'])),
            'integratedAppMetadata' => fn(ParseNode $n) => $o->setIntegratedAppMetadata($n->getObjectValue([IntegratedApplicationMetadata::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'protectedAppMetadata' => fn(ParseNode $n) => $o->setProtectedAppMetadata($n->getObjectValue([ProtectedApplicationMetadata::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the integratedAppMetadata property value. The integratedAppMetadata property
     * @return IntegratedApplicationMetadata|null
    */
    public function getIntegratedAppMetadata(): ?IntegratedApplicationMetadata {
        return $this->integratedAppMetadata;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the protectedAppMetadata property value. Metadata about the protected application making the request. Required.
     * @return ProtectedApplicationMetadata|null
    */
    public function getProtectedAppMetadata(): ?ProtectedApplicationMetadata {
        return $this->protectedAppMetadata;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('activityMetadata', $this->getActivityMetadata());
        $writer->writeCollectionOfObjectValues('contentEntries', $this->getContentEntries());
        $writer->writeObjectValue('deviceMetadata', $this->getDeviceMetadata());
        $writer->writeObjectValue('integratedAppMetadata', $this->getIntegratedAppMetadata());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('protectedAppMetadata', $this->getProtectedAppMetadata());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the activityMetadata property value. The activityMetadata property
     * @param ActivityMetadata|null $value Value to set for the activityMetadata property.
    */
    public function setActivityMetadata(?ActivityMetadata $value): void {
        $this->activityMetadata = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the contentEntries property value. A collection of content entries to be processed. Each entry contains the content itself and its metadata. Use conversation metadata for content like prompts and responses and file metadata for files. Required.
     * @param array<ProcessContentMetadataBase>|null $value Value to set for the contentEntries property.
    */
    public function setContentEntries(?array $value): void {
        $this->contentEntries = $value;
    }

    /**
     * Sets the deviceMetadata property value. The deviceMetadata property
     * @param DeviceMetadata|null $value Value to set for the deviceMetadata property.
    */
    public function setDeviceMetadata(?DeviceMetadata $value): void {
        $this->deviceMetadata = $value;
    }

    /**
     * Sets the integratedAppMetadata property value. The integratedAppMetadata property
     * @param IntegratedApplicationMetadata|null $value Value to set for the integratedAppMetadata property.
    */
    public function setIntegratedAppMetadata(?IntegratedApplicationMetadata $value): void {
        $this->integratedAppMetadata = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the protectedAppMetadata property value. Metadata about the protected application making the request. Required.
     * @param ProtectedApplicationMetadata|null $value Value to set for the protectedAppMetadata property.
    */
    public function setProtectedAppMetadata(?ProtectedApplicationMetadata $value): void {
        $this->protectedAppMetadata = $value;
    }

}
