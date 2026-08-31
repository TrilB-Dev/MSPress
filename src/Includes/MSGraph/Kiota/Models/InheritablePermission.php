<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class InheritablePermission implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var InheritableScopes|null $inheritableScopes Inheritance configuration for delegated permission scopes published by the resource application. Supports three patterns: allAllowedScopes (inherit all available scopes), enumeratedScopes (inherit only the listed scopes), and noScopes (inherit none). Each pattern exposes a kind discriminator for filtering.
    */
    private ?InheritableScopes $inheritableScopes = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $resourceAppId The appId of the resource application that publishes these scopes. Primary key.
    */
    private ?string $resourceAppId = null;
    
    /**
     * Instantiates a new InheritablePermission and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return InheritablePermission
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): InheritablePermission {
        return new InheritablePermission();
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
            'inheritableScopes' => fn(ParseNode $n) => $o->setInheritableScopes($n->getObjectValue([InheritableScopes::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'resourceAppId' => fn(ParseNode $n) => $o->setResourceAppId($n->getStringValue()),
        ];
    }

    /**
     * Gets the inheritableScopes property value. Inheritance configuration for delegated permission scopes published by the resource application. Supports three patterns: allAllowedScopes (inherit all available scopes), enumeratedScopes (inherit only the listed scopes), and noScopes (inherit none). Each pattern exposes a kind discriminator for filtering.
     * @return InheritableScopes|null
    */
    public function getInheritableScopes(): ?InheritableScopes {
        return $this->inheritableScopes;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the resourceAppId property value. The appId of the resource application that publishes these scopes. Primary key.
     * @return string|null
    */
    public function getResourceAppId(): ?string {
        return $this->resourceAppId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('inheritableScopes', $this->getInheritableScopes());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('resourceAppId', $this->getResourceAppId());
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
     * Sets the inheritableScopes property value. Inheritance configuration for delegated permission scopes published by the resource application. Supports three patterns: allAllowedScopes (inherit all available scopes), enumeratedScopes (inherit only the listed scopes), and noScopes (inherit none). Each pattern exposes a kind discriminator for filtering.
     * @param InheritableScopes|null $value Value to set for the inheritableScopes property.
    */
    public function setInheritableScopes(?InheritableScopes $value): void {
        $this->inheritableScopes = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the resourceAppId property value. The appId of the resource application that publishes these scopes. Primary key.
     * @param string|null $value Value to set for the resourceAppId property.
    */
    public function setResourceAppId(?string $value): void {
        $this->resourceAppId = $value;
    }

}
