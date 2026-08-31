<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MobileAppTroubleshootingEvent extends Entity implements Parsable 
{
    /**
     * @var array<AppLogCollectionRequest>|null $appLogCollectionRequests Indicates collection of App Log Upload Request.
    */
    private ?array $appLogCollectionRequests = null;
    
    /**
     * Instantiates a new MobileAppTroubleshootingEvent and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MobileAppTroubleshootingEvent
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MobileAppTroubleshootingEvent {
        return new MobileAppTroubleshootingEvent();
    }

    /**
     * Gets the appLogCollectionRequests property value. Indicates collection of App Log Upload Request.
     * @return array<AppLogCollectionRequest>|null
    */
    public function getAppLogCollectionRequests(): ?array {
        return $this->appLogCollectionRequests;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'appLogCollectionRequests' => fn(ParseNode $n) => $o->setAppLogCollectionRequests($n->getCollectionOfObjectValues([AppLogCollectionRequest::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('appLogCollectionRequests', $this->getAppLogCollectionRequests());
    }

    /**
     * Sets the appLogCollectionRequests property value. Indicates collection of App Log Upload Request.
     * @param array<AppLogCollectionRequest>|null $value Value to set for the appLogCollectionRequests property.
    */
    public function setAppLogCollectionRequests(?array $value): void {
        $this->appLogCollectionRequests = $value;
    }

}
