<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SiteProtectionUnit extends ProtectionUnitBase implements Parsable 
{
    /**
     * @var string|null $siteId Unique identifier of the SharePoint site.
    */
    private ?string $siteId = null;
    
    /**
     * @var string|null $siteName Name of the SharePoint site.
    */
    private ?string $siteName = null;
    
    /**
     * @var string|null $siteWebUrl The web URL of the SharePoint site.
    */
    private ?string $siteWebUrl = null;
    
    /**
     * Instantiates a new SiteProtectionUnit and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.siteProtectionUnit');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SiteProtectionUnit
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SiteProtectionUnit {
        return new SiteProtectionUnit();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'siteId' => fn(ParseNode $n) => $o->setSiteId($n->getStringValue()),
            'siteName' => fn(ParseNode $n) => $o->setSiteName($n->getStringValue()),
            'siteWebUrl' => fn(ParseNode $n) => $o->setSiteWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the siteId property value. Unique identifier of the SharePoint site.
     * @return string|null
    */
    public function getSiteId(): ?string {
        return $this->siteId;
    }

    /**
     * Gets the siteName property value. Name of the SharePoint site.
     * @return string|null
    */
    public function getSiteName(): ?string {
        return $this->siteName;
    }

    /**
     * Gets the siteWebUrl property value. The web URL of the SharePoint site.
     * @return string|null
    */
    public function getSiteWebUrl(): ?string {
        return $this->siteWebUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('siteId', $this->getSiteId());
    }

    /**
     * Sets the siteId property value. Unique identifier of the SharePoint site.
     * @param string|null $value Value to set for the siteId property.
    */
    public function setSiteId(?string $value): void {
        $this->siteId = $value;
    }

    /**
     * Sets the siteName property value. Name of the SharePoint site.
     * @param string|null $value Value to set for the siteName property.
    */
    public function setSiteName(?string $value): void {
        $this->siteName = $value;
    }

    /**
     * Sets the siteWebUrl property value. The web URL of the SharePoint site.
     * @param string|null $value Value to set for the siteWebUrl property.
    */
    public function setSiteWebUrl(?string $value): void {
        $this->siteWebUrl = $value;
    }

}
