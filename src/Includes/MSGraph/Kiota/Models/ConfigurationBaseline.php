<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConfigurationBaseline extends Entity implements Parsable 
{
    /**
     * @var string|null $description User-friendly description of the baseline given by the user.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName User-friendly name given by the user to the baseline.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<BaselineParameter>|null $parameters Collection of parameters attached to the baseline.
    */
    private ?array $parameters = null;
    
    /**
     * @var array<BaselineResource>|null $resources Collection of resources and their properties that are added to the baseline. At least one property of one resource must be present in the baseline.
    */
    private ?array $resources = null;
    
    /**
     * Instantiates a new ConfigurationBaseline and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConfigurationBaseline
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConfigurationBaseline {
        return new ConfigurationBaseline();
    }

    /**
     * Gets the description property value. User-friendly description of the baseline given by the user.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. User-friendly name given by the user to the baseline.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getCollectionOfObjectValues([BaselineParameter::class, 'createFromDiscriminatorValue'])),
            'resources' => fn(ParseNode $n) => $o->setResources($n->getCollectionOfObjectValues([BaselineResource::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the parameters property value. Collection of parameters attached to the baseline.
     * @return array<BaselineParameter>|null
    */
    public function getParameters(): ?array {
        return $this->parameters;
    }

    /**
     * Gets the resources property value. Collection of resources and their properties that are added to the baseline. At least one property of one resource must be present in the baseline.
     * @return array<BaselineResource>|null
    */
    public function getResources(): ?array {
        return $this->resources;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('parameters', $this->getParameters());
        $writer->writeCollectionOfObjectValues('resources', $this->getResources());
    }

    /**
     * Sets the description property value. User-friendly description of the baseline given by the user.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. User-friendly name given by the user to the baseline.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the parameters property value. Collection of parameters attached to the baseline.
     * @param array<BaselineParameter>|null $value Value to set for the parameters property.
    */
    public function setParameters(?array $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the resources property value. Collection of resources and their properties that are added to the baseline. At least one property of one resource must be present in the baseline.
     * @param array<BaselineResource>|null $value Value to set for the resources property.
    */
    public function setResources(?array $value): void {
        $this->resources = $value;
    }

}
