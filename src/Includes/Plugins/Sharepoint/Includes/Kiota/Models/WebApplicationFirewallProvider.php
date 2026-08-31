<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WebApplicationFirewallProvider extends Entity implements Parsable 
{
    /**
     * @var string|null $displayName The display name of the WAF provider.
    */
    private ?string $displayName = null;
    
    /**
     * Instantiates a new WebApplicationFirewallProvider and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WebApplicationFirewallProvider
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WebApplicationFirewallProvider {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.akamaiWebApplicationFirewallProvider': return new AkamaiWebApplicationFirewallProvider();
                case '#microsoft.graph.cloudFlareWebApplicationFirewallProvider': return new CloudFlareWebApplicationFirewallProvider();
            }
        }
        return new WebApplicationFirewallProvider();
    }

    /**
     * Gets the displayName property value. The display name of the WAF provider.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('displayName', $this->getDisplayName());
    }

    /**
     * Sets the displayName property value. The display name of the WAF provider.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

}
