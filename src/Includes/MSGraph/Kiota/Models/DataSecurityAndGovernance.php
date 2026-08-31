<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DataSecurityAndGovernance extends Entity implements Parsable 
{
    /**
     * @var array<SensitivityLabel>|null $sensitivityLabels The sensitivityLabels property
    */
    private ?array $sensitivityLabels = null;
    
    /**
     * Instantiates a new DataSecurityAndGovernance and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DataSecurityAndGovernance
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DataSecurityAndGovernance {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.tenantDataSecurityAndGovernance': return new TenantDataSecurityAndGovernance();
                case '#microsoft.graph.userDataSecurityAndGovernance': return new UserDataSecurityAndGovernance();
            }
        }
        return new DataSecurityAndGovernance();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'sensitivityLabels' => fn(ParseNode $n) => $o->setSensitivityLabels($n->getCollectionOfObjectValues([SensitivityLabel::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the sensitivityLabels property value. The sensitivityLabels property
     * @return array<SensitivityLabel>|null
    */
    public function getSensitivityLabels(): ?array {
        return $this->sensitivityLabels;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('sensitivityLabels', $this->getSensitivityLabels());
    }

    /**
     * Sets the sensitivityLabels property value. The sensitivityLabels property
     * @param array<SensitivityLabel>|null $value Value to set for the sensitivityLabels property.
    */
    public function setSensitivityLabels(?array $value): void {
        $this->sensitivityLabels = $value;
    }

}
