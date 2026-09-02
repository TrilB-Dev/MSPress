<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\EntraRecoveryServices;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class EntityTypeAndIds implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $entityIds The list of entity IDs for the specified entity type.
    */
    private ?array $entityIds = null;
    
    /**
     * @var ResourceTypeName|null $entityType The entityType property
    */
    private ?ResourceTypeName $entityType = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new EntityTypeAndIds and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EntityTypeAndIds
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EntityTypeAndIds {
        return new EntityTypeAndIds();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the entityIds property value. The list of entity IDs for the specified entity type.
     * @return array<string>|null
    */
    public function getEntityIds(): ?array {
        return $this->entityIds;
    }

    /**
     * Gets the entityType property value. The entityType property
     * @return ResourceTypeName|null
    */
    public function getEntityType(): ?ResourceTypeName {
        return $this->entityType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'entityIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setEntityIds($val);
            },
            'entityType' => fn(ParseNode $n) => $o->setEntityType($n->getEnumValue(ResourceTypeName::class)),
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
        $writer->writeCollectionOfPrimitiveValues('entityIds', $this->getEntityIds());
        $writer->writeEnumValue('entityType', $this->getEntityType());
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
     * Sets the entityIds property value. The list of entity IDs for the specified entity type.
     * @param array<string>|null $value Value to set for the entityIds property.
    */
    public function setEntityIds(?array $value): void {
        $this->entityIds = $value;
    }

    /**
     * Sets the entityType property value. The entityType property
     * @param ResourceTypeName|null $value Value to set for the entityType property.
    */
    public function setEntityType(?ResourceTypeName $value): void {
        $this->entityType = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
