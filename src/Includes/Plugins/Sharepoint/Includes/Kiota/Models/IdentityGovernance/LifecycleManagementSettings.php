<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\IdentityGovernance;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\EmailSettings;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class LifecycleManagementSettings extends Entity implements Parsable 
{
    /**
     * @var EmailSettings|null $emailSettings The emailSettings property
    */
    private ?EmailSettings $emailSettings = null;
    
    /**
     * @var QuarantineConfiguration|null $quarantineConfiguration The tenant-level quarantine configuration that automatically halts a workflow when its threshold conditions are met. Optional.
    */
    private ?QuarantineConfiguration $quarantineConfiguration = null;
    
    /**
     * @var int|null $workflowScheduleIntervalInHours The interval in hours at which all workflows running in the tenant should be scheduled for execution. This interval has a minimum value of 1 and a maximum value of 24. The default value is 3 hours.
    */
    private ?int $workflowScheduleIntervalInHours = null;
    
    /**
     * Instantiates a new LifecycleManagementSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LifecycleManagementSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LifecycleManagementSettings {
        return new LifecycleManagementSettings();
    }

    /**
     * Gets the emailSettings property value. The emailSettings property
     * @return EmailSettings|null
    */
    public function getEmailSettings(): ?EmailSettings {
        return $this->emailSettings;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'emailSettings' => fn(ParseNode $n) => $o->setEmailSettings($n->getObjectValue([EmailSettings::class, 'createFromDiscriminatorValue'])),
            'quarantineConfiguration' => fn(ParseNode $n) => $o->setQuarantineConfiguration($n->getObjectValue([QuarantineConfiguration::class, 'createFromDiscriminatorValue'])),
            'workflowScheduleIntervalInHours' => fn(ParseNode $n) => $o->setWorkflowScheduleIntervalInHours($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the quarantineConfiguration property value. The tenant-level quarantine configuration that automatically halts a workflow when its threshold conditions are met. Optional.
     * @return QuarantineConfiguration|null
    */
    public function getQuarantineConfiguration(): ?QuarantineConfiguration {
        return $this->quarantineConfiguration;
    }

    /**
     * Gets the workflowScheduleIntervalInHours property value. The interval in hours at which all workflows running in the tenant should be scheduled for execution. This interval has a minimum value of 1 and a maximum value of 24. The default value is 3 hours.
     * @return int|null
    */
    public function getWorkflowScheduleIntervalInHours(): ?int {
        return $this->workflowScheduleIntervalInHours;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('emailSettings', $this->getEmailSettings());
        $writer->writeObjectValue('quarantineConfiguration', $this->getQuarantineConfiguration());
        $writer->writeIntegerValue('workflowScheduleIntervalInHours', $this->getWorkflowScheduleIntervalInHours());
    }

    /**
     * Sets the emailSettings property value. The emailSettings property
     * @param EmailSettings|null $value Value to set for the emailSettings property.
    */
    public function setEmailSettings(?EmailSettings $value): void {
        $this->emailSettings = $value;
    }

    /**
     * Sets the quarantineConfiguration property value. The tenant-level quarantine configuration that automatically halts a workflow when its threshold conditions are met. Optional.
     * @param QuarantineConfiguration|null $value Value to set for the quarantineConfiguration property.
    */
    public function setQuarantineConfiguration(?QuarantineConfiguration $value): void {
        $this->quarantineConfiguration = $value;
    }

    /**
     * Sets the workflowScheduleIntervalInHours property value. The interval in hours at which all workflows running in the tenant should be scheduled for execution. This interval has a minimum value of 1 and a maximum value of 24. The default value is 3 hours.
     * @param int|null $value Value to set for the workflowScheduleIntervalInHours property.
    */
    public function setWorkflowScheduleIntervalInHours(?int $value): void {
        $this->workflowScheduleIntervalInHours = $value;
    }

}
