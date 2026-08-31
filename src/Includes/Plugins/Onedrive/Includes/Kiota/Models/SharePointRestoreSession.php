<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointRestoreSession extends RestoreSessionBase implements Parsable 
{
    /**
     * @var array<GranularSiteRestoreArtifact>|null $granularSiteRestoreArtifacts A collection of browse session ID and item key details that can be used to restore SharePoint files and folders.
    */
    private ?array $granularSiteRestoreArtifacts = null;
    
    /**
     * @var array<SiteRestoreArtifact>|null $siteRestoreArtifacts A collection of restore points and destination details that can be used to restore SharePoint sites.
    */
    private ?array $siteRestoreArtifacts = null;
    
    /**
     * @var array<SiteRestoreArtifactsBulkAdditionRequest>|null $siteRestoreArtifactsBulkAdditionRequests A collection of SharePoint site URLs and destination details that can be used to restore SharePoint sites.
    */
    private ?array $siteRestoreArtifactsBulkAdditionRequests = null;
    
    /**
     * Instantiates a new SharePointRestoreSession and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.sharePointRestoreSession');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointRestoreSession
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointRestoreSession {
        return new SharePointRestoreSession();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'granularSiteRestoreArtifacts' => fn(ParseNode $n) => $o->setGranularSiteRestoreArtifacts($n->getCollectionOfObjectValues([GranularSiteRestoreArtifact::class, 'createFromDiscriminatorValue'])),
            'siteRestoreArtifacts' => fn(ParseNode $n) => $o->setSiteRestoreArtifacts($n->getCollectionOfObjectValues([SiteRestoreArtifact::class, 'createFromDiscriminatorValue'])),
            'siteRestoreArtifactsBulkAdditionRequests' => fn(ParseNode $n) => $o->setSiteRestoreArtifactsBulkAdditionRequests($n->getCollectionOfObjectValues([SiteRestoreArtifactsBulkAdditionRequest::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the granularSiteRestoreArtifacts property value. A collection of browse session ID and item key details that can be used to restore SharePoint files and folders.
     * @return array<GranularSiteRestoreArtifact>|null
    */
    public function getGranularSiteRestoreArtifacts(): ?array {
        return $this->granularSiteRestoreArtifacts;
    }

    /**
     * Gets the siteRestoreArtifacts property value. A collection of restore points and destination details that can be used to restore SharePoint sites.
     * @return array<SiteRestoreArtifact>|null
    */
    public function getSiteRestoreArtifacts(): ?array {
        return $this->siteRestoreArtifacts;
    }

    /**
     * Gets the siteRestoreArtifactsBulkAdditionRequests property value. A collection of SharePoint site URLs and destination details that can be used to restore SharePoint sites.
     * @return array<SiteRestoreArtifactsBulkAdditionRequest>|null
    */
    public function getSiteRestoreArtifactsBulkAdditionRequests(): ?array {
        return $this->siteRestoreArtifactsBulkAdditionRequests;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('granularSiteRestoreArtifacts', $this->getGranularSiteRestoreArtifacts());
        $writer->writeCollectionOfObjectValues('siteRestoreArtifacts', $this->getSiteRestoreArtifacts());
        $writer->writeCollectionOfObjectValues('siteRestoreArtifactsBulkAdditionRequests', $this->getSiteRestoreArtifactsBulkAdditionRequests());
    }

    /**
     * Sets the granularSiteRestoreArtifacts property value. A collection of browse session ID and item key details that can be used to restore SharePoint files and folders.
     * @param array<GranularSiteRestoreArtifact>|null $value Value to set for the granularSiteRestoreArtifacts property.
    */
    public function setGranularSiteRestoreArtifacts(?array $value): void {
        $this->granularSiteRestoreArtifacts = $value;
    }

    /**
     * Sets the siteRestoreArtifacts property value. A collection of restore points and destination details that can be used to restore SharePoint sites.
     * @param array<SiteRestoreArtifact>|null $value Value to set for the siteRestoreArtifacts property.
    */
    public function setSiteRestoreArtifacts(?array $value): void {
        $this->siteRestoreArtifacts = $value;
    }

    /**
     * Sets the siteRestoreArtifactsBulkAdditionRequests property value. A collection of SharePoint site URLs and destination details that can be used to restore SharePoint sites.
     * @param array<SiteRestoreArtifactsBulkAdditionRequest>|null $value Value to set for the siteRestoreArtifactsBulkAdditionRequests property.
    */
    public function setSiteRestoreArtifactsBulkAdditionRequests(?array $value): void {
        $this->siteRestoreArtifactsBulkAdditionRequests = $value;
    }

}
