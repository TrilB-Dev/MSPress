<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PlannerPlanContainer implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $containerId The identifier of the resource that contains the plan. Optional.
    */
    private ?string $containerId = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var PlannerContainerType|null $type The type of the resource that contains the plan. For supported types, see the previous table. The possible values are: group, unknownFutureValue, roster. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: roster. Optional.
    */
    private ?PlannerContainerType $type = null;
    
    /**
     * @var string|null $url The full canonical URL of the container. Optional.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new PlannerPlanContainer and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PlannerPlanContainer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PlannerPlanContainer {
        return new PlannerPlanContainer();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the containerId property value. The identifier of the resource that contains the plan. Optional.
     * @return string|null
    */
    public function getContainerId(): ?string {
        return $this->containerId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'containerId' => fn(ParseNode $n) => $o->setContainerId($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(PlannerContainerType::class)),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
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
     * Gets the type property value. The type of the resource that contains the plan. For supported types, see the previous table. The possible values are: group, unknownFutureValue, roster. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: roster. Optional.
     * @return PlannerContainerType|null
    */
    public function getType(): ?PlannerContainerType {
        return $this->type;
    }

    /**
     * Gets the url property value. The full canonical URL of the container. Optional.
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('containerId', $this->getContainerId());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('type', $this->getType());
        $writer->writeStringValue('url', $this->getUrl());
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
     * Sets the containerId property value. The identifier of the resource that contains the plan. Optional.
     * @param string|null $value Value to set for the containerId property.
    */
    public function setContainerId(?string $value): void {
        $this->containerId = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the type property value. The type of the resource that contains the plan. For supported types, see the previous table. The possible values are: group, unknownFutureValue, roster. Use the Prefer: include-unknown-enum-members request header to get the following members in this evolvable enum: roster. Optional.
     * @param PlannerContainerType|null $value Value to set for the type property.
    */
    public function setType(?PlannerContainerType $value): void {
        $this->type = $value;
    }

    /**
     * Sets the url property value. The full canonical URL of the container. Optional.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
