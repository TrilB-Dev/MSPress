<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\EntraRecoveryServices;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RecoveryJobEntityNameAndIdsFilter extends RecoveryJobFilteringCriteriaBase implements Parsable 
{
    /**
     * @var array<EntityTypeAndIds>|null $filterValues The list of entity type and ID pairs to include in the recovery job. Duplicate entity types are not allowed and return a 400 Bad Request error.
    */
    private ?array $filterValues = null;
    
    /**
     * Instantiates a new RecoveryJobEntityNameAndIdsFilter and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.entraRecoveryServices.recoveryJobEntityNameAndIdsFilter');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecoveryJobEntityNameAndIdsFilter
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecoveryJobEntityNameAndIdsFilter {
        return new RecoveryJobEntityNameAndIdsFilter();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'filterValues' => fn(ParseNode $n) => $o->setFilterValues($n->getCollectionOfObjectValues([EntityTypeAndIds::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the filterValues property value. The list of entity type and ID pairs to include in the recovery job. Duplicate entity types are not allowed and return a 400 Bad Request error.
     * @return array<EntityTypeAndIds>|null
    */
    public function getFilterValues(): ?array {
        return $this->filterValues;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('filterValues', $this->getFilterValues());
    }

    /**
     * Sets the filterValues property value. The list of entity type and ID pairs to include in the recovery job. Duplicate entity types are not allowed and return a 400 Bad Request error.
     * @param array<EntityTypeAndIds>|null $value Value to set for the filterValues property.
    */
    public function setFilterValues(?array $value): void {
        $this->filterValues = $value;
    }

}
