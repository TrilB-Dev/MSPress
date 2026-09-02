<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class M365CapabilityResourceScope implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $resourceId The ID of the resource to modify. The value is either All, to apply the capability to all resources of the type specified by resourceType (all users or all groups), or the GUID of a specific user or group.
    */
    private ?string $resourceId = null;
    
    /**
     * @var M365ResourceType|null $resourceType The resourceType property
    */
    private ?M365ResourceType $resourceType = null;
    
    /**
     * Instantiates a new M365CapabilityResourceScope and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return M365CapabilityResourceScope
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): M365CapabilityResourceScope {
        return new M365CapabilityResourceScope();
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
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'resourceId' => fn(ParseNode $n) => $o->setResourceId($n->getStringValue()),
            'resourceType' => fn(ParseNode $n) => $o->setResourceType($n->getEnumValue(M365ResourceType::class)),
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
     * Gets the resourceId property value. The ID of the resource to modify. The value is either All, to apply the capability to all resources of the type specified by resourceType (all users or all groups), or the GUID of a specific user or group.
     * @return string|null
    */
    public function getResourceId(): ?string {
        return $this->resourceId;
    }

    /**
     * Gets the resourceType property value. The resourceType property
     * @return M365ResourceType|null
    */
    public function getResourceType(): ?M365ResourceType {
        return $this->resourceType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('resourceId', $this->getResourceId());
        $writer->writeEnumValue('resourceType', $this->getResourceType());
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
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the resourceId property value. The ID of the resource to modify. The value is either All, to apply the capability to all resources of the type specified by resourceType (all users or all groups), or the GUID of a specific user or group.
     * @param string|null $value Value to set for the resourceId property.
    */
    public function setResourceId(?string $value): void {
        $this->resourceId = $value;
    }

    /**
     * Sets the resourceType property value. The resourceType property
     * @param M365ResourceType|null $value Value to set for the resourceType property.
    */
    public function setResourceType(?M365ResourceType $value): void {
        $this->resourceType = $value;
    }

}
