<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class GranularRestoreArtifactBase extends Entity implements Parsable 
{
    /**
     * @var string|null $browseSessionId The unique identifier of the browseSession
    */
    private ?string $browseSessionId = null;
    
    /**
     * @var DateTime|null $completionDateTime Date time when the artifact's restoration completes.
    */
    private ?DateTime $completionDateTime = null;
    
    /**
     * @var string|null $restoredItemKey The unique identifier for the restored artifact.
    */
    private ?string $restoredItemKey = null;
    
    /**
     * @var string|null $restoredItemPath The path of the restored artifact. It's the path of the folder where all the artifacts are restored within a granular restore session.
    */
    private ?string $restoredItemPath = null;
    
    /**
     * @var string|null $restoredItemWebUrl The web url of the restored artifact.
    */
    private ?string $restoredItemWebUrl = null;
    
    /**
     * @var DateTime|null $restorePointDateTime The restore point date time to which the artifact is restored.
    */
    private ?DateTime $restorePointDateTime = null;
    
    /**
     * @var DateTime|null $startDateTime The start time of the restoration.
    */
    private ?DateTime $startDateTime = null;
    
    /**
     * @var ArtifactRestoreStatus|null $status The status property
    */
    private ?ArtifactRestoreStatus $status = null;
    
    /**
     * @var string|null $webUrl The original web url of the artifact being restored.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new GranularRestoreArtifactBase and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return GranularRestoreArtifactBase
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): GranularRestoreArtifactBase {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.granularDriveRestoreArtifact': return new GranularDriveRestoreArtifact();
                case '#microsoft.graph.granularSiteRestoreArtifact': return new GranularSiteRestoreArtifact();
            }
        }
        return new GranularRestoreArtifactBase();
    }

    /**
     * Gets the browseSessionId property value. The unique identifier of the browseSession
     * @return string|null
    */
    public function getBrowseSessionId(): ?string {
        return $this->browseSessionId;
    }

    /**
     * Gets the completionDateTime property value. Date time when the artifact's restoration completes.
     * @return DateTime|null
    */
    public function getCompletionDateTime(): ?DateTime {
        return $this->completionDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'browseSessionId' => fn(ParseNode $n) => $o->setBrowseSessionId($n->getStringValue()),
            'completionDateTime' => fn(ParseNode $n) => $o->setCompletionDateTime($n->getDateTimeValue()),
            'restoredItemKey' => fn(ParseNode $n) => $o->setRestoredItemKey($n->getStringValue()),
            'restoredItemPath' => fn(ParseNode $n) => $o->setRestoredItemPath($n->getStringValue()),
            'restoredItemWebUrl' => fn(ParseNode $n) => $o->setRestoredItemWebUrl($n->getStringValue()),
            'restorePointDateTime' => fn(ParseNode $n) => $o->setRestorePointDateTime($n->getDateTimeValue()),
            'startDateTime' => fn(ParseNode $n) => $o->setStartDateTime($n->getDateTimeValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(ArtifactRestoreStatus::class)),
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the restoredItemKey property value. The unique identifier for the restored artifact.
     * @return string|null
    */
    public function getRestoredItemKey(): ?string {
        return $this->restoredItemKey;
    }

    /**
     * Gets the restoredItemPath property value. The path of the restored artifact. It's the path of the folder where all the artifacts are restored within a granular restore session.
     * @return string|null
    */
    public function getRestoredItemPath(): ?string {
        return $this->restoredItemPath;
    }

    /**
     * Gets the restoredItemWebUrl property value. The web url of the restored artifact.
     * @return string|null
    */
    public function getRestoredItemWebUrl(): ?string {
        return $this->restoredItemWebUrl;
    }

    /**
     * Gets the restorePointDateTime property value. The restore point date time to which the artifact is restored.
     * @return DateTime|null
    */
    public function getRestorePointDateTime(): ?DateTime {
        return $this->restorePointDateTime;
    }

    /**
     * Gets the startDateTime property value. The start time of the restoration.
     * @return DateTime|null
    */
    public function getStartDateTime(): ?DateTime {
        return $this->startDateTime;
    }

    /**
     * Gets the status property value. The status property
     * @return ArtifactRestoreStatus|null
    */
    public function getStatus(): ?ArtifactRestoreStatus {
        return $this->status;
    }

    /**
     * Gets the webUrl property value. The original web url of the artifact being restored.
     * @return string|null
    */
    public function getWebUrl(): ?string {
        return $this->webUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('browseSessionId', $this->getBrowseSessionId());
        $writer->writeDateTimeValue('completionDateTime', $this->getCompletionDateTime());
        $writer->writeStringValue('restoredItemKey', $this->getRestoredItemKey());
        $writer->writeStringValue('restoredItemPath', $this->getRestoredItemPath());
        $writer->writeStringValue('restoredItemWebUrl', $this->getRestoredItemWebUrl());
        $writer->writeDateTimeValue('restorePointDateTime', $this->getRestorePointDateTime());
        $writer->writeDateTimeValue('startDateTime', $this->getStartDateTime());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeStringValue('webUrl', $this->getWebUrl());
    }

    /**
     * Sets the browseSessionId property value. The unique identifier of the browseSession
     * @param string|null $value Value to set for the browseSessionId property.
    */
    public function setBrowseSessionId(?string $value): void {
        $this->browseSessionId = $value;
    }

    /**
     * Sets the completionDateTime property value. Date time when the artifact's restoration completes.
     * @param DateTime|null $value Value to set for the completionDateTime property.
    */
    public function setCompletionDateTime(?DateTime $value): void {
        $this->completionDateTime = $value;
    }

    /**
     * Sets the restoredItemKey property value. The unique identifier for the restored artifact.
     * @param string|null $value Value to set for the restoredItemKey property.
    */
    public function setRestoredItemKey(?string $value): void {
        $this->restoredItemKey = $value;
    }

    /**
     * Sets the restoredItemPath property value. The path of the restored artifact. It's the path of the folder where all the artifacts are restored within a granular restore session.
     * @param string|null $value Value to set for the restoredItemPath property.
    */
    public function setRestoredItemPath(?string $value): void {
        $this->restoredItemPath = $value;
    }

    /**
     * Sets the restoredItemWebUrl property value. The web url of the restored artifact.
     * @param string|null $value Value to set for the restoredItemWebUrl property.
    */
    public function setRestoredItemWebUrl(?string $value): void {
        $this->restoredItemWebUrl = $value;
    }

    /**
     * Sets the restorePointDateTime property value. The restore point date time to which the artifact is restored.
     * @param DateTime|null $value Value to set for the restorePointDateTime property.
    */
    public function setRestorePointDateTime(?DateTime $value): void {
        $this->restorePointDateTime = $value;
    }

    /**
     * Sets the startDateTime property value. The start time of the restoration.
     * @param DateTime|null $value Value to set for the startDateTime property.
    */
    public function setStartDateTime(?DateTime $value): void {
        $this->startDateTime = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param ArtifactRestoreStatus|null $value Value to set for the status property.
    */
    public function setStatus(?ArtifactRestoreStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the webUrl property value. The original web url of the artifact being restored.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
