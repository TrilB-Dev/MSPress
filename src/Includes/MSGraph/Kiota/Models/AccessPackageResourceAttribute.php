<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageResourceAttribute implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var AccessPackageResourceAttributeDestination|null $destination Information about how to set the attribute, currently a accessPackageUserDirectoryAttributeStore type.
    */
    private ?AccessPackageResourceAttributeDestination $destination = null;
    
    /**
     * @var bool|null $isEditable The isEditable property
    */
    private ?bool $isEditable = null;
    
    /**
     * @var bool|null $isPersistedOnAssignmentRemoval The isPersistedOnAssignmentRemoval property
    */
    private ?bool $isPersistedOnAssignmentRemoval = null;
    
    /**
     * @var string|null $name The name of the attribute in the end system. If the destination is accessPackageUserDirectoryAttributeStore, then a user property such as jobTitle or a directory schema extension for the user object type, such as extension2b676109c7c74ae2b41549205f1947edpersonalTitle.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var AccessPackageResourceAttributeSource|null $source Information about how to populate the attribute value when an accessPackageAssignmentRequest is being fulfilled, currently a accessPackageResourceAttributeQuestion type.
    */
    private ?AccessPackageResourceAttributeSource $source = null;
    
    /**
     * Instantiates a new AccessPackageResourceAttribute and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageResourceAttribute
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageResourceAttribute {
        return new AccessPackageResourceAttribute();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the destination property value. Information about how to set the attribute, currently a accessPackageUserDirectoryAttributeStore type.
     * @return AccessPackageResourceAttributeDestination|null
    */
    public function getDestination(): ?AccessPackageResourceAttributeDestination {
        return $this->destination;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'destination' => fn(ParseNode $n) => $o->setDestination($n->getObjectValue([AccessPackageResourceAttributeDestination::class, 'createFromDiscriminatorValue'])),
            'isEditable' => fn(ParseNode $n) => $o->setIsEditable($n->getBooleanValue()),
            'isPersistedOnAssignmentRemoval' => fn(ParseNode $n) => $o->setIsPersistedOnAssignmentRemoval($n->getBooleanValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getObjectValue([AccessPackageResourceAttributeSource::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the isEditable property value. The isEditable property
     * @return bool|null
    */
    public function getIsEditable(): ?bool {
        return $this->isEditable;
    }

    /**
     * Gets the isPersistedOnAssignmentRemoval property value. The isPersistedOnAssignmentRemoval property
     * @return bool|null
    */
    public function getIsPersistedOnAssignmentRemoval(): ?bool {
        return $this->isPersistedOnAssignmentRemoval;
    }

    /**
     * Gets the name property value. The name of the attribute in the end system. If the destination is accessPackageUserDirectoryAttributeStore, then a user property such as jobTitle or a directory schema extension for the user object type, such as extension2b676109c7c74ae2b41549205f1947edpersonalTitle.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the source property value. Information about how to populate the attribute value when an accessPackageAssignmentRequest is being fulfilled, currently a accessPackageResourceAttributeQuestion type.
     * @return AccessPackageResourceAttributeSource|null
    */
    public function getSource(): ?AccessPackageResourceAttributeSource {
        return $this->source;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('destination', $this->getDestination());
        $writer->writeBooleanValue('isEditable', $this->getIsEditable());
        $writer->writeBooleanValue('isPersistedOnAssignmentRemoval', $this->getIsPersistedOnAssignmentRemoval());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('source', $this->getSource());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the destination property value. Information about how to set the attribute, currently a accessPackageUserDirectoryAttributeStore type.
     * @param AccessPackageResourceAttributeDestination|null $value Value to set for the destination property.
    */
    public function setDestination(?AccessPackageResourceAttributeDestination $value): void {
        $this->destination = $value;
    }

    /**
     * Sets the isEditable property value. The isEditable property
     * @param bool|null $value Value to set for the isEditable property.
    */
    public function setIsEditable(?bool $value): void {
        $this->isEditable = $value;
    }

    /**
     * Sets the isPersistedOnAssignmentRemoval property value. The isPersistedOnAssignmentRemoval property
     * @param bool|null $value Value to set for the isPersistedOnAssignmentRemoval property.
    */
    public function setIsPersistedOnAssignmentRemoval(?bool $value): void {
        $this->isPersistedOnAssignmentRemoval = $value;
    }

    /**
     * Sets the name property value. The name of the attribute in the end system. If the destination is accessPackageUserDirectoryAttributeStore, then a user property such as jobTitle or a directory schema extension for the user object type, such as extension2b676109c7c74ae2b41549205f1947edpersonalTitle.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the source property value. Information about how to populate the attribute value when an accessPackageAssignmentRequest is being fulfilled, currently a accessPackageResourceAttributeQuestion type.
     * @param AccessPackageResourceAttributeSource|null $value Value to set for the source property.
    */
    public function setSource(?AccessPackageResourceAttributeSource $value): void {
        $this->source = $value;
    }

}
