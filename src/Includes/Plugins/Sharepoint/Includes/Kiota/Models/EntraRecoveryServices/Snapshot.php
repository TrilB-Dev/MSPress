<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\EntraRecoveryServices;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class Snapshot extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $createdDateTime The date and time when the snapshot was created.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<RecoveryJob>|null $recoveryJobs Collection of recovery jobs created for this snapshot.
    */
    private ?array $recoveryJobs = null;
    
    /**
     * @var array<RecoveryPreviewJob>|null $recoveryPreviewJobs Collection of preview jobs created for this snapshot.
    */
    private ?array $recoveryPreviewJobs = null;
    
    /**
     * @var int|null $totalChangedObjects The total number of changed objects identified in this snapshot.
    */
    private ?int $totalChangedObjects = null;
    
    /**
     * Instantiates a new Snapshot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Snapshot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Snapshot {
        return new Snapshot();
    }

    /**
     * Gets the createdDateTime property value. The date and time when the snapshot was created.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'recoveryJobs' => fn(ParseNode $n) => $o->setRecoveryJobs($n->getCollectionOfObjectValues([RecoveryJob::class, 'createFromDiscriminatorValue'])),
            'recoveryPreviewJobs' => fn(ParseNode $n) => $o->setRecoveryPreviewJobs($n->getCollectionOfObjectValues([RecoveryPreviewJob::class, 'createFromDiscriminatorValue'])),
            'totalChangedObjects' => fn(ParseNode $n) => $o->setTotalChangedObjects($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the recoveryJobs property value. Collection of recovery jobs created for this snapshot.
     * @return array<RecoveryJob>|null
    */
    public function getRecoveryJobs(): ?array {
        return $this->recoveryJobs;
    }

    /**
     * Gets the recoveryPreviewJobs property value. Collection of preview jobs created for this snapshot.
     * @return array<RecoveryPreviewJob>|null
    */
    public function getRecoveryPreviewJobs(): ?array {
        return $this->recoveryPreviewJobs;
    }

    /**
     * Gets the totalChangedObjects property value. The total number of changed objects identified in this snapshot.
     * @return int|null
    */
    public function getTotalChangedObjects(): ?int {
        return $this->totalChangedObjects;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('recoveryJobs', $this->getRecoveryJobs());
        $writer->writeCollectionOfObjectValues('recoveryPreviewJobs', $this->getRecoveryPreviewJobs());
        $writer->writeIntegerValue('totalChangedObjects', $this->getTotalChangedObjects());
    }

    /**
     * Sets the createdDateTime property value. The date and time when the snapshot was created.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the recoveryJobs property value. Collection of recovery jobs created for this snapshot.
     * @param array<RecoveryJob>|null $value Value to set for the recoveryJobs property.
    */
    public function setRecoveryJobs(?array $value): void {
        $this->recoveryJobs = $value;
    }

    /**
     * Sets the recoveryPreviewJobs property value. Collection of preview jobs created for this snapshot.
     * @param array<RecoveryPreviewJob>|null $value Value to set for the recoveryPreviewJobs property.
    */
    public function setRecoveryPreviewJobs(?array $value): void {
        $this->recoveryPreviewJobs = $value;
    }

    /**
     * Sets the totalChangedObjects property value. The total number of changed objects identified in this snapshot.
     * @param int|null $value Value to set for the totalChangedObjects property.
    */
    public function setTotalChangedObjects(?int $value): void {
        $this->totalChangedObjects = $value;
    }

}
