<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OnVerifiedIdClaimValidationCustomExtensionHandler extends OnVerifiedIdClaimValidationHandler implements Parsable 
{
    /**
     * @var CustomExtensionOverwriteConfiguration|null $configuration Configuration that overrides the default settings from the referenced custom extension, such as timeout and retry values. Optional.
    */
    private ?CustomExtensionOverwriteConfiguration $configuration = null;
    
    /**
     * @var OnVerifiedIdClaimValidationCustomExtension|null $customExtension The customExtension property
    */
    private ?OnVerifiedIdClaimValidationCustomExtension $customExtension = null;
    
    /**
     * Instantiates a new OnVerifiedIdClaimValidationCustomExtensionHandler and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.onVerifiedIdClaimValidationCustomExtensionHandler');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnVerifiedIdClaimValidationCustomExtensionHandler
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnVerifiedIdClaimValidationCustomExtensionHandler {
        return new OnVerifiedIdClaimValidationCustomExtensionHandler();
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
     * @return OnVerifiedIdClaimValidationCustomExtension|null
    */
    public function getCustomExtension(): ?OnVerifiedIdClaimValidationCustomExtension {
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
            'customExtension' => fn(ParseNode $n) => $o->setCustomExtension($n->getObjectValue([OnVerifiedIdClaimValidationCustomExtension::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('configuration', $this->getConfiguration());
        $writer->writeObjectValue('customExtension', $this->getCustomExtension());
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
     * @param OnVerifiedIdClaimValidationCustomExtension|null $value Value to set for the customExtension property.
    */
    public function setCustomExtension(?OnVerifiedIdClaimValidationCustomExtension $value): void {
        $this->customExtension = $value;
    }

}
