<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Entity;

class SettingsContainer extends Entity implements Parsable 
{
    /**
     * @var AutoAuditingConfiguration|null $autoAuditingConfiguration Represents automatic configuration for collection of Windows event logs as needed for Defender for Identity sensors.
    */
    private ?AutoAuditingConfiguration $autoAuditingConfiguration = null;
    
    /**
     * Instantiates a new SettingsContainer and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SettingsContainer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SettingsContainer {
        return new SettingsContainer();
    }

    /**
     * Gets the autoAuditingConfiguration property value. Represents automatic configuration for collection of Windows event logs as needed for Defender for Identity sensors.
     * @return AutoAuditingConfiguration|null
    */
    public function getAutoAuditingConfiguration(): ?AutoAuditingConfiguration {
        return $this->autoAuditingConfiguration;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'autoAuditingConfiguration' => fn(ParseNode $n) => $o->setAutoAuditingConfiguration($n->getObjectValue([AutoAuditingConfiguration::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('autoAuditingConfiguration', $this->getAutoAuditingConfiguration());
    }

    /**
     * Sets the autoAuditingConfiguration property value. Represents automatic configuration for collection of Windows event logs as needed for Defender for Identity sensors.
     * @param AutoAuditingConfiguration|null $value Value to set for the autoAuditingConfiguration property.
    */
    public function setAutoAuditingConfiguration(?AutoAuditingConfiguration $value): void {
        $this->autoAuditingConfiguration = $value;
    }

}
