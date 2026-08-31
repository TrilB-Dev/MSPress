<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointGroupIdentity extends Identity implements Parsable 
{
    /**
     * @var string|null $principalId The principal ID of the SharePoint group in the tenant. Read-only.
    */
    private ?string $principalId = null;
    
    /**
     * @var string|null $title The title of the SharePoint group. Read-only.
    */
    private ?string $title = null;
    
    /**
     * Instantiates a new SharePointGroupIdentity and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.sharePointGroupIdentity');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointGroupIdentity
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointGroupIdentity {
        return new SharePointGroupIdentity();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'principalId' => fn(ParseNode $n) => $o->setPrincipalId($n->getStringValue()),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
        ]);
    }

    /**
     * Gets the principalId property value. The principal ID of the SharePoint group in the tenant. Read-only.
     * @return string|null
    */
    public function getPrincipalId(): ?string {
        return $this->principalId;
    }

    /**
     * Gets the title property value. The title of the SharePoint group. Read-only.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('principalId', $this->getPrincipalId());
        $writer->writeStringValue('title', $this->getTitle());
    }

    /**
     * Sets the principalId property value. The principal ID of the SharePoint group in the tenant. Read-only.
     * @param string|null $value Value to set for the principalId property.
    */
    public function setPrincipalId(?string $value): void {
        $this->principalId = $value;
    }

    /**
     * Sets the title property value. The title of the SharePoint group. Read-only.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

}
