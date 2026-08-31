<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConfigurationManagement extends Entity implements Parsable 
{
    /**
     * @var array<ConfigurationDrift>|null $configurationDrifts A container for configuration drift resources.
    */
    private ?array $configurationDrifts = null;
    
    /**
     * @var array<ConfigurationMonitoringResult>|null $configurationMonitoringResults A container for configuration monitoring results resources.
    */
    private ?array $configurationMonitoringResults = null;
    
    /**
     * @var array<ConfigurationMonitor>|null $configurationMonitors A container for configuration monitor resources.
    */
    private ?array $configurationMonitors = null;
    
    /**
     * @var array<ConfigurationSnapshotJob>|null $configurationSnapshotJobs A container for snapshot job resources.
    */
    private ?array $configurationSnapshotJobs = null;
    
    /**
     * @var array<ConfigurationBaseline>|null $configurationSnapshots A container for configuration snapshot baselines.
    */
    private ?array $configurationSnapshots = null;
    
    /**
     * Instantiates a new ConfigurationManagement and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConfigurationManagement
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConfigurationManagement {
        return new ConfigurationManagement();
    }

    /**
     * Gets the configurationDrifts property value. A container for configuration drift resources.
     * @return array<ConfigurationDrift>|null
    */
    public function getConfigurationDrifts(): ?array {
        return $this->configurationDrifts;
    }

    /**
     * Gets the configurationMonitoringResults property value. A container for configuration monitoring results resources.
     * @return array<ConfigurationMonitoringResult>|null
    */
    public function getConfigurationMonitoringResults(): ?array {
        return $this->configurationMonitoringResults;
    }

    /**
     * Gets the configurationMonitors property value. A container for configuration monitor resources.
     * @return array<ConfigurationMonitor>|null
    */
    public function getConfigurationMonitors(): ?array {
        return $this->configurationMonitors;
    }

    /**
     * Gets the configurationSnapshotJobs property value. A container for snapshot job resources.
     * @return array<ConfigurationSnapshotJob>|null
    */
    public function getConfigurationSnapshotJobs(): ?array {
        return $this->configurationSnapshotJobs;
    }

    /**
     * Gets the configurationSnapshots property value. A container for configuration snapshot baselines.
     * @return array<ConfigurationBaseline>|null
    */
    public function getConfigurationSnapshots(): ?array {
        return $this->configurationSnapshots;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'configurationDrifts' => fn(ParseNode $n) => $o->setConfigurationDrifts($n->getCollectionOfObjectValues([ConfigurationDrift::class, 'createFromDiscriminatorValue'])),
            'configurationMonitoringResults' => fn(ParseNode $n) => $o->setConfigurationMonitoringResults($n->getCollectionOfObjectValues([ConfigurationMonitoringResult::class, 'createFromDiscriminatorValue'])),
            'configurationMonitors' => fn(ParseNode $n) => $o->setConfigurationMonitors($n->getCollectionOfObjectValues([ConfigurationMonitor::class, 'createFromDiscriminatorValue'])),
            'configurationSnapshotJobs' => fn(ParseNode $n) => $o->setConfigurationSnapshotJobs($n->getCollectionOfObjectValues([ConfigurationSnapshotJob::class, 'createFromDiscriminatorValue'])),
            'configurationSnapshots' => fn(ParseNode $n) => $o->setConfigurationSnapshots($n->getCollectionOfObjectValues([ConfigurationBaseline::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('configurationDrifts', $this->getConfigurationDrifts());
        $writer->writeCollectionOfObjectValues('configurationMonitoringResults', $this->getConfigurationMonitoringResults());
        $writer->writeCollectionOfObjectValues('configurationMonitors', $this->getConfigurationMonitors());
        $writer->writeCollectionOfObjectValues('configurationSnapshotJobs', $this->getConfigurationSnapshotJobs());
        $writer->writeCollectionOfObjectValues('configurationSnapshots', $this->getConfigurationSnapshots());
    }

    /**
     * Sets the configurationDrifts property value. A container for configuration drift resources.
     * @param array<ConfigurationDrift>|null $value Value to set for the configurationDrifts property.
    */
    public function setConfigurationDrifts(?array $value): void {
        $this->configurationDrifts = $value;
    }

    /**
     * Sets the configurationMonitoringResults property value. A container for configuration monitoring results resources.
     * @param array<ConfigurationMonitoringResult>|null $value Value to set for the configurationMonitoringResults property.
    */
    public function setConfigurationMonitoringResults(?array $value): void {
        $this->configurationMonitoringResults = $value;
    }

    /**
     * Sets the configurationMonitors property value. A container for configuration monitor resources.
     * @param array<ConfigurationMonitor>|null $value Value to set for the configurationMonitors property.
    */
    public function setConfigurationMonitors(?array $value): void {
        $this->configurationMonitors = $value;
    }

    /**
     * Sets the configurationSnapshotJobs property value. A container for snapshot job resources.
     * @param array<ConfigurationSnapshotJob>|null $value Value to set for the configurationSnapshotJobs property.
    */
    public function setConfigurationSnapshotJobs(?array $value): void {
        $this->configurationSnapshotJobs = $value;
    }

    /**
     * Sets the configurationSnapshots property value. A container for configuration snapshot baselines.
     * @param array<ConfigurationBaseline>|null $value Value to set for the configurationSnapshots property.
    */
    public function setConfigurationSnapshots(?array $value): void {
        $this->configurationSnapshots = $value;
    }

}
