<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OnPasswordMigrationCustomExtensionHandler extends OnPasswordSubmitHandler implements Parsable 
{
    /**
     * @var CustomExtensionOverwriteConfiguration|null $configuration Configuration that overrides the default settings from the referenced custom extension, such as timeout and retry values. Optional.
    */
    private ?CustomExtensionOverwriteConfiguration $configuration = null;
    
    /**
     * @var OnPasswordSubmitCustomExtension|null $customExtension The customExtension property
    */
    private ?OnPasswordSubmitCustomExtension $customExtension = null;
    
    /**
     * @var string|null $migrationPropertyId The name of the custom extension attribute that indicates whether a user requires migration. This property must reference a valid custom attribute on the user object (for example, extension<appId>requiresMigration). Required.
    */
    private ?string $migrationPropertyId = null;
    
    /**
     * Instantiates a new OnPasswordMigrationCustomExtensionHandler and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.onPasswordMigrationCustomExtensionHandler');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnPasswordMigrationCustomExtensionHandler
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnPasswordMigrationCustomExtensionHandler {
        return new OnPasswordMigrationCustomExtensionHandler();
    }

    /**
     * Gets the configuration property value. Configuration that overrides the default settings from the referenced custom extension, such as timeout and retry values. Optional.
     * @return CustomExtensionOverwriteConfiguration|null
    */
    public function getConfiguration(): ?CustomExtensionOverwriteConfiguration {
        return $this->configuration;
    }

    /**
     * Gets the customExtension property value. The customExtension property
     * @return OnPasswordSubmitCustomExtension|null
    */
    public function getCustomExtension(): ?OnPasswordSubmitCustomExtension {
        return $this->customExtension;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'configuration' => fn(ParseNode $n) => $o->setConfiguration($n->getObjectValue([CustomExtensionOverwriteConfiguration::class, 'createFromDiscriminatorValue'])),
            'customExtension' => fn(ParseNode $n) => $o->setCustomExtension($n->getObjectValue([OnPasswordSubmitCustomExtension::class, 'createFromDiscriminatorValue'])),
            'migrationPropertyId' => fn(ParseNode $n) => $o->setMigrationPropertyId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the migrationPropertyId property value. The name of the custom extension attribute that indicates whether a user requires migration. This property must reference a valid custom attribute on the user object (for example, extension<appId>requiresMigration). Required.
     * @return string|null
    */
    public function getMigrationPropertyId(): ?string {
        return $this->migrationPropertyId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('configuration', $this->getConfiguration());
        $writer->writeObjectValue('customExtension', $this->getCustomExtension());
        $writer->writeStringValue('migrationPropertyId', $this->getMigrationPropertyId());
    }

    /**
     * Sets the configuration property value. Configuration that overrides the default settings from the referenced custom extension, such as timeout and retry values. Optional.
     * @param CustomExtensionOverwriteConfiguration|null $value Value to set for the configuration property.
    */
    public function setConfiguration(?CustomExtensionOverwriteConfiguration $value): void {
        $this->configuration = $value;
    }

    /**
     * Sets the customExtension property value. The customExtension property
     * @param OnPasswordSubmitCustomExtension|null $value Value to set for the customExtension property.
    */
    public function setCustomExtension(?OnPasswordSubmitCustomExtension $value): void {
        $this->customExtension = $value;
    }

    /**
     * Sets the migrationPropertyId property value. The name of the custom extension attribute that indicates whether a user requires migration. This property must reference a valid custom attribute on the user object (for example, extension<appId>requiresMigration). Required.
     * @param string|null $value Value to set for the migrationPropertyId property.
    */
    public function setMigrationPropertyId(?string $value): void {
        $this->migrationPropertyId = $value;
    }

}
