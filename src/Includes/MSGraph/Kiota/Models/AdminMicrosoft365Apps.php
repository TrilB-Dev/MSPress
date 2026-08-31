<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AdminMicrosoft365Apps extends Entity implements Parsable 
{
    /**
     * @var M365AppsInstallationOptions|null $installationOptions A container for tenant-level settings for Microsoft 365 applications.
    */
    private ?M365AppsInstallationOptions $installationOptions = null;
    
    /**
     * Instantiates a new AdminMicrosoft365Apps and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AdminMicrosoft365Apps
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AdminMicrosoft365Apps {
        return new AdminMicrosoft365Apps();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'installationOptions' => fn(ParseNode $n) => $o->setInstallationOptions($n->getObjectValue([M365AppsInstallationOptions::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the installationOptions property value. A container for tenant-level settings for Microsoft 365 applications.
     * @return M365AppsInstallationOptions|null
    */
    public function getInstallationOptions(): ?M365AppsInstallationOptions {
        return $this->installationOptions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('installationOptions', $this->getInstallationOptions());
    }

    /**
     * Sets the installationOptions property value. A container for tenant-level settings for Microsoft 365 applications.
     * @param M365AppsInstallationOptions|null $value Value to set for the installationOptions property.
    */
    public function setInstallationOptions(?M365AppsInstallationOptions $value): void {
        $this->installationOptions = $value;
    }

}
