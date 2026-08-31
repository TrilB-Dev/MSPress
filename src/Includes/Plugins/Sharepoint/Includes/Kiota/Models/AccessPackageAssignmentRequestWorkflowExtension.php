<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageAssignmentRequestWorkflowExtension extends CustomCalloutExtension implements Parsable 
{
    /**
     * @var CustomExtensionCallbackConfiguration|null $callbackConfiguration The callback configuration for a custom extension.
    */
    private ?CustomExtensionCallbackConfiguration $callbackConfiguration = null;
    
    /**
     * @var string|null $createdBy The userPrincipalName of the user or identity of the subject that created this resource. Read-only.
    */
    private ?string $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime When the object was created.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $lastModifiedBy The userPrincipalName of the identity that last modified the object.
    */
    private ?string $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime When the object was last modified.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * Instantiates a new AccessPackageAssignmentRequestWorkflowExtension and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.accessPackageAssignmentRequestWorkflowExtension');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageAssignmentRequestWorkflowExtension
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageAssignmentRequestWorkflowExtension {
        return new AccessPackageAssignmentRequestWorkflowExtension();
    }

    /**
     * Gets the callbackConfiguration property value. The callback configuration for a custom extension.
     * @return CustomExtensionCallbackConfiguration|null
    */
    public function getCallbackConfiguration(): ?CustomExtensionCallbackConfiguration {
        return $this->callbackConfiguration;
    }

    /**
     * Gets the createdBy property value. The userPrincipalName of the user or identity of the subject that created this resource. Read-only.
     * @return string|null
    */
    public function getCreatedBy(): ?string {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. When the object was created.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'callbackConfiguration' => fn(ParseNode $n) => $o->setCallbackConfiguration($n->getObjectValue([CustomExtensionCallbackConfiguration::class, 'createFromDiscriminatorValue'])),
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getStringValue()),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the lastModifiedBy property value. The userPrincipalName of the identity that last modified the object.
     * @return string|null
    */
    public function getLastModifiedBy(): ?string {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. When the object was last modified.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('callbackConfiguration', $this->getCallbackConfiguration());
        $writer->writeStringValue('createdBy', $this->getCreatedBy());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
    }

    /**
     * Sets the callbackConfiguration property value. The callback configuration for a custom extension.
     * @param CustomExtensionCallbackConfiguration|null $value Value to set for the callbackConfiguration property.
    */
    public function setCallbackConfiguration(?CustomExtensionCallbackConfiguration $value): void {
        $this->callbackConfiguration = $value;
    }

    /**
     * Sets the createdBy property value. The userPrincipalName of the user or identity of the subject that created this resource. Read-only.
     * @param string|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?string $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. When the object was created.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the lastModifiedBy property value. The userPrincipalName of the identity that last modified the object.
     * @param string|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?string $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. When the object was last modified.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

}
