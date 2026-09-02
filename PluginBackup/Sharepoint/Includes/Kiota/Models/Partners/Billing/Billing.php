<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Partners\Billing;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class Billing extends Entity implements Parsable 
{
    /**
     * @var array<Manifest>|null $manifests Represents metadata for the exported data.
    */
    private ?array $manifests = null;
    
    /**
     * @var array<Operation>|null $operations Represents an operation to export the billing data of a partner.
    */
    private ?array $operations = null;
    
    /**
     * @var BillingReconciliation|null $reconciliation The reconciliation property
    */
    private ?BillingReconciliation $reconciliation = null;
    
    /**
     * @var AzureUsage|null $usage The usage property
    */
    private ?AzureUsage $usage = null;
    
    /**
     * Instantiates a new Billing and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Billing
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Billing {
        return new Billing();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'manifests' => fn(ParseNode $n) => $o->setManifests($n->getCollectionOfObjectValues([Manifest::class, 'createFromDiscriminatorValue'])),
            'operations' => fn(ParseNode $n) => $o->setOperations($n->getCollectionOfObjectValues([Operation::class, 'createFromDiscriminatorValue'])),
            'reconciliation' => fn(ParseNode $n) => $o->setReconciliation($n->getObjectValue([BillingReconciliation::class, 'createFromDiscriminatorValue'])),
            'usage' => fn(ParseNode $n) => $o->setUsage($n->getObjectValue([AzureUsage::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the manifests property value. Represents metadata for the exported data.
     * @return array<Manifest>|null
    */
    public function getManifests(): ?array {
        return $this->manifests;
    }

    /**
     * Gets the operations property value. Represents an operation to export the billing data of a partner.
     * @return array<Operation>|null
    */
    public function getOperations(): ?array {
        return $this->operations;
    }

    /**
     * Gets the reconciliation property value. The reconciliation property
     * @return BillingReconciliation|null
    */
    public function getReconciliation(): ?BillingReconciliation {
        return $this->reconciliation;
    }

    /**
     * Gets the usage property value. The usage property
     * @return AzureUsage|null
    */
    public function getUsage(): ?AzureUsage {
        return $this->usage;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('manifests', $this->getManifests());
        $writer->writeCollectionOfObjectValues('operations', $this->getOperations());
        $writer->writeObjectValue('reconciliation', $this->getReconciliation());
        $writer->writeObjectValue('usage', $this->getUsage());
    }

    /**
     * Sets the manifests property value. Represents metadata for the exported data.
     * @param array<Manifest>|null $value Value to set for the manifests property.
    */
    public function setManifests(?array $value): void {
        $this->manifests = $value;
    }

    /**
     * Sets the operations property value. Represents an operation to export the billing data of a partner.
     * @param array<Operation>|null $value Value to set for the operations property.
    */
    public function setOperations(?array $value): void {
        $this->operations = $value;
    }

    /**
     * Sets the reconciliation property value. The reconciliation property
     * @param BillingReconciliation|null $value Value to set for the reconciliation property.
    */
    public function setReconciliation(?BillingReconciliation $value): void {
        $this->reconciliation = $value;
    }

    /**
     * Sets the usage property value. The usage property
     * @param AzureUsage|null $value Value to set for the usage property.
    */
    public function setUsage(?AzureUsage $value): void {
        $this->usage = $value;
    }

}
