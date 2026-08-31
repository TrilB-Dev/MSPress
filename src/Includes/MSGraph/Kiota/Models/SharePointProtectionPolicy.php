<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointProtectionPolicy extends ProtectionPolicyBase implements Parsable 
{
    /**
     * @var array<SiteProtectionRule>|null $siteInclusionRules The rules associated with the SharePoint Protection policy.
    */
    private ?array $siteInclusionRules = null;
    
    /**
     * @var array<SiteProtectionUnit>|null $siteProtectionUnits The protection units (sites) that are protected under the site protection policy.
    */
    private ?array $siteProtectionUnits = null;
    
    /**
     * @var array<SiteProtectionUnitsBulkAdditionJob>|null $siteProtectionUnitsBulkAdditionJobs The siteProtectionUnitsBulkAdditionJobs property
    */
    private ?array $siteProtectionUnitsBulkAdditionJobs = null;
    
    /**
     * Instantiates a new SharePointProtectionPolicy and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.sharePointProtectionPolicy');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointProtectionPolicy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointProtectionPolicy {
        return new SharePointProtectionPolicy();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'siteInclusionRules' => fn(ParseNode $n) => $o->setSiteInclusionRules($n->getCollectionOfObjectValues([SiteProtectionRule::class, 'createFromDiscriminatorValue'])),
            'siteProtectionUnits' => fn(ParseNode $n) => $o->setSiteProtectionUnits($n->getCollectionOfObjectValues([SiteProtectionUnit::class, 'createFromDiscriminatorValue'])),
            'siteProtectionUnitsBulkAdditionJobs' => fn(ParseNode $n) => $o->setSiteProtectionUnitsBulkAdditionJobs($n->getCollectionOfObjectValues([SiteProtectionUnitsBulkAdditionJob::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the siteInclusionRules property value. The rules associated with the SharePoint Protection policy.
     * @return array<SiteProtectionRule>|null
    */
    public function getSiteInclusionRules(): ?array {
        return $this->siteInclusionRules;
    }

    /**
     * Gets the siteProtectionUnits property value. The protection units (sites) that are protected under the site protection policy.
     * @return array<SiteProtectionUnit>|null
    */
    public function getSiteProtectionUnits(): ?array {
        return $this->siteProtectionUnits;
    }

    /**
     * Gets the siteProtectionUnitsBulkAdditionJobs property value. The siteProtectionUnitsBulkAdditionJobs property
     * @return array<SiteProtectionUnitsBulkAdditionJob>|null
    */
    public function getSiteProtectionUnitsBulkAdditionJobs(): ?array {
        return $this->siteProtectionUnitsBulkAdditionJobs;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('siteInclusionRules', $this->getSiteInclusionRules());
        $writer->writeCollectionOfObjectValues('siteProtectionUnits', $this->getSiteProtectionUnits());
        $writer->writeCollectionOfObjectValues('siteProtectionUnitsBulkAdditionJobs', $this->getSiteProtectionUnitsBulkAdditionJobs());
    }

    /**
     * Sets the siteInclusionRules property value. The rules associated with the SharePoint Protection policy.
     * @param array<SiteProtectionRule>|null $value Value to set for the siteInclusionRules property.
    */
    public function setSiteInclusionRules(?array $value): void {
        $this->siteInclusionRules = $value;
    }

    /**
     * Sets the siteProtectionUnits property value. The protection units (sites) that are protected under the site protection policy.
     * @param array<SiteProtectionUnit>|null $value Value to set for the siteProtectionUnits property.
    */
    public function setSiteProtectionUnits(?array $value): void {
        $this->siteProtectionUnits = $value;
    }

    /**
     * Sets the siteProtectionUnitsBulkAdditionJobs property value. The siteProtectionUnitsBulkAdditionJobs property
     * @param array<SiteProtectionUnitsBulkAdditionJob>|null $value Value to set for the siteProtectionUnitsBulkAdditionJobs property.
    */
    public function setSiteProtectionUnitsBulkAdditionJobs(?array $value): void {
        $this->siteProtectionUnitsBulkAdditionJobs = $value;
    }

}
