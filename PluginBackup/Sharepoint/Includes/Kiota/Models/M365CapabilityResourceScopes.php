<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class M365CapabilityResourceScopes implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<M365CapabilityResourceScope>|null $excluded Resources to exclude from the scope. If a resource appears in both included and excluded, the excluded property takes precedence.
    */
    private ?array $excluded = null;
    
    /**
     * @var array<M365CapabilityResourceScope>|null $included Resources to include in the scope.
    */
    private ?array $included = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new M365CapabilityResourceScopes and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return M365CapabilityResourceScopes
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): M365CapabilityResourceScopes {
        return new M365CapabilityResourceScopes();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the excluded property value. Resources to exclude from the scope. If a resource appears in both included and excluded, the excluded property takes precedence.
     * @return array<M365CapabilityResourceScope>|null
    */
    public function getExcluded(): ?array {
        return $this->excluded;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'excluded' => fn(ParseNode $n) => $o->setExcluded($n->getCollectionOfObjectValues([M365CapabilityResourceScope::class, 'createFromDiscriminatorValue'])),
            'included' => fn(ParseNode $n) => $o->setIncluded($n->getCollectionOfObjectValues([M365CapabilityResourceScope::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the included property value. Resources to include in the scope.
     * @return array<M365CapabilityResourceScope>|null
    */
    public function getIncluded(): ?array {
        return $this->included;
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
        $writer->writeCollectionOfObjectValues('excluded', $this->getExcluded());
        $writer->writeCollectionOfObjectValues('included', $this->getIncluded());
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
     * Sets the excluded property value. Resources to exclude from the scope. If a resource appears in both included and excluded, the excluded property takes precedence.
     * @param array<M365CapabilityResourceScope>|null $value Value to set for the excluded property.
    */
    public function setExcluded(?array $value): void {
        $this->excluded = $value;
    }

    /**
     * Sets the included property value. Resources to include in the scope.
     * @param array<M365CapabilityResourceScope>|null $value Value to set for the included property.
    */
    public function setIncluded(?array $value): void {
        $this->included = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
