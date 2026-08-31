<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointMigrationJob extends Entity implements Parsable 
{
    /**
     * @var SharePointMigrationContainerInfo|null $containerInfo The containerInfo property
    */
    private ?SharePointMigrationContainerInfo $containerInfo = null;
    
    /**
     * @var array<SharePointMigrationEvent>|null $progressEvents A collection of migration events that reflects the job status changes.
    */
    private ?array $progressEvents = null;
    
    /**
     * Instantiates a new SharePointMigrationJob and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointMigrationJob
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointMigrationJob {
        return new SharePointMigrationJob();
    }

    /**
     * Gets the containerInfo property value. The containerInfo property
     * @return SharePointMigrationContainerInfo|null
    */
    public function getContainerInfo(): ?SharePointMigrationContainerInfo {
        return $this->containerInfo;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'containerInfo' => fn(ParseNode $n) => $o->setContainerInfo($n->getObjectValue([SharePointMigrationContainerInfo::class, 'createFromDiscriminatorValue'])),
            'progressEvents' => fn(ParseNode $n) => $o->setProgressEvents($n->getCollectionOfObjectValues([SharePointMigrationEvent::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the progressEvents property value. A collection of migration events that reflects the job status changes.
     * @return array<SharePointMigrationEvent>|null
    */
    public function getProgressEvents(): ?array {
        return $this->progressEvents;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('containerInfo', $this->getContainerInfo());
        $writer->writeCollectionOfObjectValues('progressEvents', $this->getProgressEvents());
    }

    /**
     * Sets the containerInfo property value. The containerInfo property
     * @param SharePointMigrationContainerInfo|null $value Value to set for the containerInfo property.
    */
    public function setContainerInfo(?SharePointMigrationContainerInfo $value): void {
        $this->containerInfo = $value;
    }

    /**
     * Sets the progressEvents property value. A collection of migration events that reflects the job status changes.
     * @param array<SharePointMigrationEvent>|null $value Value to set for the progressEvents property.
    */
    public function setProgressEvents(?array $value): void {
        $this->progressEvents = $value;
    }

}
