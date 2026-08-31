<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\EntraRecoveryServices;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class Recovery extends Entity implements Parsable 
{
    /**
     * @var array<RecoveryJobBase>|null $jobs Collection of all recovery jobs (both preview and recovery) for the tenant.
    */
    private ?array $jobs = null;
    
    /**
     * @var array<Snapshot>|null $snapshots Collection of backup snapshots available for the tenant.
    */
    private ?array $snapshots = null;
    
    /**
     * Instantiates a new Recovery and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Recovery
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Recovery {
        return new Recovery();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'jobs' => fn(ParseNode $n) => $o->setJobs($n->getCollectionOfObjectValues([RecoveryJobBase::class, 'createFromDiscriminatorValue'])),
            'snapshots' => fn(ParseNode $n) => $o->setSnapshots($n->getCollectionOfObjectValues([Snapshot::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the jobs property value. Collection of all recovery jobs (both preview and recovery) for the tenant.
     * @return array<RecoveryJobBase>|null
    */
    public function getJobs(): ?array {
        return $this->jobs;
    }

    /**
     * Gets the snapshots property value. Collection of backup snapshots available for the tenant.
     * @return array<Snapshot>|null
    */
    public function getSnapshots(): ?array {
        return $this->snapshots;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('jobs', $this->getJobs());
        $writer->writeCollectionOfObjectValues('snapshots', $this->getSnapshots());
    }

    /**
     * Sets the jobs property value. Collection of all recovery jobs (both preview and recovery) for the tenant.
     * @param array<RecoveryJobBase>|null $value Value to set for the jobs property.
    */
    public function setJobs(?array $value): void {
        $this->jobs = $value;
    }

    /**
     * Sets the snapshots property value. Collection of backup snapshots available for the tenant.
     * @param array<Snapshot>|null $value Value to set for the snapshots property.
    */
    public function setSnapshots(?array $value): void {
        $this->snapshots = $value;
    }

}
