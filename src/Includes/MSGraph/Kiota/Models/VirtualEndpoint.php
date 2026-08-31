<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VirtualEndpoint extends Entity implements Parsable 
{
    /**
     * @var array<CloudPcAuditEvent>|null $auditEvents A collection of Cloud PC audit events.
    */
    private ?array $auditEvents = null;
    
    /**
     * @var array<CloudPC>|null $cloudPCs A collection of cloud-managed virtual desktops.
    */
    private ?array $cloudPCs = null;
    
    /**
     * @var array<CloudPcDeviceImage>|null $deviceImages A collection of device image resources on Cloud PC.
    */
    private ?array $deviceImages = null;
    
    /**
     * @var array<CloudPcGalleryImage>|null $galleryImages A collection of gallery image resources on Cloud PC.
    */
    private ?array $galleryImages = null;
    
    /**
     * @var array<CloudPcOnPremisesConnection>|null $onPremisesConnections A defined collection of Azure resource information that can be used to establish Azure network connections for Cloud PCs.
    */
    private ?array $onPremisesConnections = null;
    
    /**
     * @var array<CloudPcProvisioningPolicy>|null $provisioningPolicies A collection of Cloud PC provisioning policies.
    */
    private ?array $provisioningPolicies = null;
    
    /**
     * @var CloudPcReport|null $report Cloud PC-related reports. Read-only.
    */
    private ?CloudPcReport $report = null;
    
    /**
     * @var array<CloudPcServicePlan>|null $servicePlans A collection of Cloud PC service plans.
    */
    private ?array $servicePlans = null;
    
    /**
     * @var array<CloudPcUserSetting>|null $userSettings A collection of Cloud PC user settings.
    */
    private ?array $userSettings = null;
    
    /**
     * Instantiates a new VirtualEndpoint and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEndpoint
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEndpoint {
        return new VirtualEndpoint();
    }

    /**
     * Gets the auditEvents property value. A collection of Cloud PC audit events.
     * @return array<CloudPcAuditEvent>|null
    */
    public function getAuditEvents(): ?array {
        return $this->auditEvents;
    }

    /**
     * Gets the cloudPCs property value. A collection of cloud-managed virtual desktops.
     * @return array<CloudPC>|null
    */
    public function getCloudPCs(): ?array {
        return $this->cloudPCs;
    }

    /**
     * Gets the deviceImages property value. A collection of device image resources on Cloud PC.
     * @return array<CloudPcDeviceImage>|null
    */
    public function getDeviceImages(): ?array {
        return $this->deviceImages;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'auditEvents' => fn(ParseNode $n) => $o->setAuditEvents($n->getCollectionOfObjectValues([CloudPcAuditEvent::class, 'createFromDiscriminatorValue'])),
            'cloudPCs' => fn(ParseNode $n) => $o->setCloudPCs($n->getCollectionOfObjectValues([CloudPC::class, 'createFromDiscriminatorValue'])),
            'deviceImages' => fn(ParseNode $n) => $o->setDeviceImages($n->getCollectionOfObjectValues([CloudPcDeviceImage::class, 'createFromDiscriminatorValue'])),
            'galleryImages' => fn(ParseNode $n) => $o->setGalleryImages($n->getCollectionOfObjectValues([CloudPcGalleryImage::class, 'createFromDiscriminatorValue'])),
            'onPremisesConnections' => fn(ParseNode $n) => $o->setOnPremisesConnections($n->getCollectionOfObjectValues([CloudPcOnPremisesConnection::class, 'createFromDiscriminatorValue'])),
            'provisioningPolicies' => fn(ParseNode $n) => $o->setProvisioningPolicies($n->getCollectionOfObjectValues([CloudPcProvisioningPolicy::class, 'createFromDiscriminatorValue'])),
            'report' => fn(ParseNode $n) => $o->setReport($n->getObjectValue([CloudPcReport::class, 'createFromDiscriminatorValue'])),
            'servicePlans' => fn(ParseNode $n) => $o->setServicePlans($n->getCollectionOfObjectValues([CloudPcServicePlan::class, 'createFromDiscriminatorValue'])),
            'userSettings' => fn(ParseNode $n) => $o->setUserSettings($n->getCollectionOfObjectValues([CloudPcUserSetting::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the galleryImages property value. A collection of gallery image resources on Cloud PC.
     * @return array<CloudPcGalleryImage>|null
    */
    public function getGalleryImages(): ?array {
        return $this->galleryImages;
    }

    /**
     * Gets the onPremisesConnections property value. A defined collection of Azure resource information that can be used to establish Azure network connections for Cloud PCs.
     * @return array<CloudPcOnPremisesConnection>|null
    */
    public function getOnPremisesConnections(): ?array {
        return $this->onPremisesConnections;
    }

    /**
     * Gets the provisioningPolicies property value. A collection of Cloud PC provisioning policies.
     * @return array<CloudPcProvisioningPolicy>|null
    */
    public function getProvisioningPolicies(): ?array {
        return $this->provisioningPolicies;
    }

    /**
     * Gets the report property value. Cloud PC-related reports. Read-only.
     * @return CloudPcReport|null
    */
    public function getReport(): ?CloudPcReport {
        return $this->report;
    }

    /**
     * Gets the servicePlans property value. A collection of Cloud PC service plans.
     * @return array<CloudPcServicePlan>|null
    */
    public function getServicePlans(): ?array {
        return $this->servicePlans;
    }

    /**
     * Gets the userSettings property value. A collection of Cloud PC user settings.
     * @return array<CloudPcUserSetting>|null
    */
    public function getUserSettings(): ?array {
        return $this->userSettings;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('auditEvents', $this->getAuditEvents());
        $writer->writeCollectionOfObjectValues('cloudPCs', $this->getCloudPCs());
        $writer->writeCollectionOfObjectValues('deviceImages', $this->getDeviceImages());
        $writer->writeCollectionOfObjectValues('galleryImages', $this->getGalleryImages());
        $writer->writeCollectionOfObjectValues('onPremisesConnections', $this->getOnPremisesConnections());
        $writer->writeCollectionOfObjectValues('provisioningPolicies', $this->getProvisioningPolicies());
        $writer->writeObjectValue('report', $this->getReport());
        $writer->writeCollectionOfObjectValues('servicePlans', $this->getServicePlans());
        $writer->writeCollectionOfObjectValues('userSettings', $this->getUserSettings());
    }

    /**
     * Sets the auditEvents property value. A collection of Cloud PC audit events.
     * @param array<CloudPcAuditEvent>|null $value Value to set for the auditEvents property.
    */
    public function setAuditEvents(?array $value): void {
        $this->auditEvents = $value;
    }

    /**
     * Sets the cloudPCs property value. A collection of cloud-managed virtual desktops.
     * @param array<CloudPC>|null $value Value to set for the cloudPCs property.
    */
    public function setCloudPCs(?array $value): void {
        $this->cloudPCs = $value;
    }

    /**
     * Sets the deviceImages property value. A collection of device image resources on Cloud PC.
     * @param array<CloudPcDeviceImage>|null $value Value to set for the deviceImages property.
    */
    public function setDeviceImages(?array $value): void {
        $this->deviceImages = $value;
    }

    /**
     * Sets the galleryImages property value. A collection of gallery image resources on Cloud PC.
     * @param array<CloudPcGalleryImage>|null $value Value to set for the galleryImages property.
    */
    public function setGalleryImages(?array $value): void {
        $this->galleryImages = $value;
    }

    /**
     * Sets the onPremisesConnections property value. A defined collection of Azure resource information that can be used to establish Azure network connections for Cloud PCs.
     * @param array<CloudPcOnPremisesConnection>|null $value Value to set for the onPremisesConnections property.
    */
    public function setOnPremisesConnections(?array $value): void {
        $this->onPremisesConnections = $value;
    }

    /**
     * Sets the provisioningPolicies property value. A collection of Cloud PC provisioning policies.
     * @param array<CloudPcProvisioningPolicy>|null $value Value to set for the provisioningPolicies property.
    */
    public function setProvisioningPolicies(?array $value): void {
        $this->provisioningPolicies = $value;
    }

    /**
     * Sets the report property value. Cloud PC-related reports. Read-only.
     * @param CloudPcReport|null $value Value to set for the report property.
    */
    public function setReport(?CloudPcReport $value): void {
        $this->report = $value;
    }

    /**
     * Sets the servicePlans property value. A collection of Cloud PC service plans.
     * @param array<CloudPcServicePlan>|null $value Value to set for the servicePlans property.
    */
    public function setServicePlans(?array $value): void {
        $this->servicePlans = $value;
    }

    /**
     * Sets the userSettings property value. A collection of Cloud PC user settings.
     * @param array<CloudPcUserSetting>|null $value Value to set for the userSettings property.
    */
    public function setUserSettings(?array $value): void {
        $this->userSettings = $value;
    }

}
