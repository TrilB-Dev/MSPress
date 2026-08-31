<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OneDriveForBusinessRestoreSession extends RestoreSessionBase implements Parsable 
{
    /**
     * @var array<DriveRestoreArtifact>|null $driveRestoreArtifacts A collection of restore points and destination details that can be used to restore a OneDrive for work or school drive.
    */
    private ?array $driveRestoreArtifacts = null;
    
    /**
     * @var array<DriveRestoreArtifactsBulkAdditionRequest>|null $driveRestoreArtifactsBulkAdditionRequests A collection of user mailboxes and destination details that can be used to restore a OneDrive for work or school drive.
    */
    private ?array $driveRestoreArtifactsBulkAdditionRequests = null;
    
    /**
     * @var array<GranularDriveRestoreArtifact>|null $granularDriveRestoreArtifacts A collection of browse session ID and item key details that can be used to restore OneDrive for work or school files and folders.
    */
    private ?array $granularDriveRestoreArtifacts = null;
    
    /**
     * Instantiates a new OneDriveForBusinessRestoreSession and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.oneDriveForBusinessRestoreSession');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OneDriveForBusinessRestoreSession
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OneDriveForBusinessRestoreSession {
        return new OneDriveForBusinessRestoreSession();
    }

    /**
     * Gets the driveRestoreArtifacts property value. A collection of restore points and destination details that can be used to restore a OneDrive for work or school drive.
     * @return array<DriveRestoreArtifact>|null
    */
    public function getDriveRestoreArtifacts(): ?array {
        return $this->driveRestoreArtifacts;
    }

    /**
     * Gets the driveRestoreArtifactsBulkAdditionRequests property value. A collection of user mailboxes and destination details that can be used to restore a OneDrive for work or school drive.
     * @return array<DriveRestoreArtifactsBulkAdditionRequest>|null
    */
    public function getDriveRestoreArtifactsBulkAdditionRequests(): ?array {
        return $this->driveRestoreArtifactsBulkAdditionRequests;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'driveRestoreArtifacts' => fn(ParseNode $n) => $o->setDriveRestoreArtifacts($n->getCollectionOfObjectValues([DriveRestoreArtifact::class, 'createFromDiscriminatorValue'])),
            'driveRestoreArtifactsBulkAdditionRequests' => fn(ParseNode $n) => $o->setDriveRestoreArtifactsBulkAdditionRequests($n->getCollectionOfObjectValues([DriveRestoreArtifactsBulkAdditionRequest::class, 'createFromDiscriminatorValue'])),
            'granularDriveRestoreArtifacts' => fn(ParseNode $n) => $o->setGranularDriveRestoreArtifacts($n->getCollectionOfObjectValues([GranularDriveRestoreArtifact::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the granularDriveRestoreArtifacts property value. A collection of browse session ID and item key details that can be used to restore OneDrive for work or school files and folders.
     * @return array<GranularDriveRestoreArtifact>|null
    */
    public function getGranularDriveRestoreArtifacts(): ?array {
        return $this->granularDriveRestoreArtifacts;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('driveRestoreArtifacts', $this->getDriveRestoreArtifacts());
        $writer->writeCollectionOfObjectValues('driveRestoreArtifactsBulkAdditionRequests', $this->getDriveRestoreArtifactsBulkAdditionRequests());
        $writer->writeCollectionOfObjectValues('granularDriveRestoreArtifacts', $this->getGranularDriveRestoreArtifacts());
    }

    /**
     * Sets the driveRestoreArtifacts property value. A collection of restore points and destination details that can be used to restore a OneDrive for work or school drive.
     * @param array<DriveRestoreArtifact>|null $value Value to set for the driveRestoreArtifacts property.
    */
    public function setDriveRestoreArtifacts(?array $value): void {
        $this->driveRestoreArtifacts = $value;
    }

    /**
     * Sets the driveRestoreArtifactsBulkAdditionRequests property value. A collection of user mailboxes and destination details that can be used to restore a OneDrive for work or school drive.
     * @param array<DriveRestoreArtifactsBulkAdditionRequest>|null $value Value to set for the driveRestoreArtifactsBulkAdditionRequests property.
    */
    public function setDriveRestoreArtifactsBulkAdditionRequests(?array $value): void {
        $this->driveRestoreArtifactsBulkAdditionRequests = $value;
    }

    /**
     * Sets the granularDriveRestoreArtifacts property value. A collection of browse session ID and item key details that can be used to restore OneDrive for work or school files and folders.
     * @param array<GranularDriveRestoreArtifact>|null $value Value to set for the granularDriveRestoreArtifacts property.
    */
    public function setGranularDriveRestoreArtifacts(?array $value): void {
        $this->granularDriveRestoreArtifacts = $value;
    }

}
