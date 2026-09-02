<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SiteRestoreArtifact extends RestoreArtifactBase implements Parsable 
{
    /**
     * @var string|null $restoredSiteId The new site identifier if the value of the destinationType property is new, and the existing site ID if the value is inPlace.
    */
    private ?string $restoredSiteId = null;
    
    /**
     * @var string|null $restoredSiteName The name of the restored site.
    */
    private ?string $restoredSiteName = null;
    
    /**
     * @var string|null $restoredSiteWebUrl The web URL of the restored site.
    */
    private ?string $restoredSiteWebUrl = null;
    
    /**
     * Instantiates a new SiteRestoreArtifact and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SiteRestoreArtifact
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SiteRestoreArtifact {
        return new SiteRestoreArtifact();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'restoredSiteId' => fn(ParseNode $n) => $o->setRestoredSiteId($n->getStringValue()),
            'restoredSiteName' => fn(ParseNode $n) => $o->setRestoredSiteName($n->getStringValue()),
            'restoredSiteWebUrl' => fn(ParseNode $n) => $o->setRestoredSiteWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the restoredSiteId property value. The new site identifier if the value of the destinationType property is new, and the existing site ID if the value is inPlace.
     * @return string|null
    */
    public function getRestoredSiteId(): ?string {
        return $this->restoredSiteId;
    }

    /**
     * Gets the restoredSiteName property value. The name of the restored site.
     * @return string|null
    */
    public function getRestoredSiteName(): ?string {
        return $this->restoredSiteName;
    }

    /**
     * Gets the restoredSiteWebUrl property value. The web URL of the restored site.
     * @return string|null
    */
    public function getRestoredSiteWebUrl(): ?string {
        return $this->restoredSiteWebUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('restoredSiteId', $this->getRestoredSiteId());
    }

    /**
     * Sets the restoredSiteId property value. The new site identifier if the value of the destinationType property is new, and the existing site ID if the value is inPlace.
     * @param string|null $value Value to set for the restoredSiteId property.
    */
    public function setRestoredSiteId(?string $value): void {
        $this->restoredSiteId = $value;
    }

    /**
     * Sets the restoredSiteName property value. The name of the restored site.
     * @param string|null $value Value to set for the restoredSiteName property.
    */
    public function setRestoredSiteName(?string $value): void {
        $this->restoredSiteName = $value;
    }

    /**
     * Sets the restoredSiteWebUrl property value. The web URL of the restored site.
     * @param string|null $value Value to set for the restoredSiteWebUrl property.
    */
    public function setRestoredSiteWebUrl(?string $value): void {
        $this->restoredSiteWebUrl = $value;
    }

}
