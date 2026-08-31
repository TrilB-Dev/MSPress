<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\ExternalConnectors;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class ExternalItem extends Entity implements Parsable 
{
    /**
     * @var array<Acl>|null $acl An array of access control entries. Each entry specifies the access granted to a user or group. Required.
    */
    private ?array $acl = null;
    
    /**
     * @var array<ExternalActivity>|null $activities Returns a list of activities performed on the item. Write-only.
    */
    private ?array $activities = null;
    
    /**
     * @var ExternalItemContent|null $content A plain-text  representation of the contents of the item. The text in this property is full-text indexed. Optional.
    */
    private ?ExternalItemContent $content = null;
    
    /**
     * @var ExternalItemInformationProtectionLabel|null $informationProtectionLabel The informationProtectionLabel property
    */
    private ?ExternalItemInformationProtectionLabel $informationProtectionLabel = null;
    
    /**
     * @var Properties|null $properties A property bag with the properties of the item. The properties MUST conform to the schema defined for the externalConnection. Required.
    */
    private ?Properties $properties = null;
    
    /**
     * Instantiates a new ExternalItem and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExternalItem
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExternalItem {
        return new ExternalItem();
    }

    /**
     * Gets the acl property value. An array of access control entries. Each entry specifies the access granted to a user or group. Required.
     * @return array<Acl>|null
    */
    public function getAcl(): ?array {
        return $this->acl;
    }

    /**
     * Gets the activities property value. Returns a list of activities performed on the item. Write-only.
     * @return array<ExternalActivity>|null
    */
    public function getActivities(): ?array {
        return $this->activities;
    }

    /**
     * Gets the content property value. A plain-text  representation of the contents of the item. The text in this property is full-text indexed. Optional.
     * @return ExternalItemContent|null
    */
    public function getContent(): ?ExternalItemContent {
        return $this->content;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'acl' => fn(ParseNode $n) => $o->setAcl($n->getCollectionOfObjectValues([Acl::class, 'createFromDiscriminatorValue'])),
            'activities' => fn(ParseNode $n) => $o->setActivities($n->getCollectionOfObjectValues([ExternalActivity::class, 'createFromDiscriminatorValue'])),
            'content' => fn(ParseNode $n) => $o->setContent($n->getObjectValue([ExternalItemContent::class, 'createFromDiscriminatorValue'])),
            'informationProtectionLabel' => fn(ParseNode $n) => $o->setInformationProtectionLabel($n->getObjectValue([ExternalItemInformationProtectionLabel::class, 'createFromDiscriminatorValue'])),
            'properties' => fn(ParseNode $n) => $o->setProperties($n->getObjectValue([Properties::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the informationProtectionLabel property value. The informationProtectionLabel property
     * @return ExternalItemInformationProtectionLabel|null
    */
    public function getInformationProtectionLabel(): ?ExternalItemInformationProtectionLabel {
        return $this->informationProtectionLabel;
    }

    /**
     * Gets the properties property value. A property bag with the properties of the item. The properties MUST conform to the schema defined for the externalConnection. Required.
     * @return Properties|null
    */
    public function getProperties(): ?Properties {
        return $this->properties;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('acl', $this->getAcl());
        $writer->writeCollectionOfObjectValues('activities', $this->getActivities());
        $writer->writeObjectValue('content', $this->getContent());
        $writer->writeObjectValue('informationProtectionLabel', $this->getInformationProtectionLabel());
        $writer->writeObjectValue('properties', $this->getProperties());
    }

    /**
     * Sets the acl property value. An array of access control entries. Each entry specifies the access granted to a user or group. Required.
     * @param array<Acl>|null $value Value to set for the acl property.
    */
    public function setAcl(?array $value): void {
        $this->acl = $value;
    }

    /**
     * Sets the activities property value. Returns a list of activities performed on the item. Write-only.
     * @param array<ExternalActivity>|null $value Value to set for the activities property.
    */
    public function setActivities(?array $value): void {
        $this->activities = $value;
    }

    /**
     * Sets the content property value. A plain-text  representation of the contents of the item. The text in this property is full-text indexed. Optional.
     * @param ExternalItemContent|null $value Value to set for the content property.
    */
    public function setContent(?ExternalItemContent $value): void {
        $this->content = $value;
    }

    /**
     * Sets the informationProtectionLabel property value. The informationProtectionLabel property
     * @param ExternalItemInformationProtectionLabel|null $value Value to set for the informationProtectionLabel property.
    */
    public function setInformationProtectionLabel(?ExternalItemInformationProtectionLabel $value): void {
        $this->informationProtectionLabel = $value;
    }

    /**
     * Sets the properties property value. A property bag with the properties of the item. The properties MUST conform to the schema defined for the externalConnection. Required.
     * @param Properties|null $value Value to set for the properties property.
    */
    public function setProperties(?Properties $value): void {
        $this->properties = $value;
    }

}
