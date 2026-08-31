<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PublicationFacet implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var IdentitySet|null $checkedOutBy The user who checked out the file.
    */
    private ?IdentitySet $checkedOutBy = null;
    
    /**
     * @var string|null $level The state of publication for this document. Either published or checkout. Read-only.
    */
    private ?string $level = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $versionId The unique identifier for the version that is visible to the current caller. Read-only.
    */
    private ?string $versionId = null;
    
    /**
     * Instantiates a new PublicationFacet and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PublicationFacet
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PublicationFacet {
        return new PublicationFacet();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the checkedOutBy property value. The user who checked out the file.
     * @return IdentitySet|null
    */
    public function getCheckedOutBy(): ?IdentitySet {
        return $this->checkedOutBy;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'checkedOutBy' => fn(ParseNode $n) => $o->setCheckedOutBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'level' => fn(ParseNode $n) => $o->setLevel($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'versionId' => fn(ParseNode $n) => $o->setVersionId($n->getStringValue()),
        ];
    }

    /**
     * Gets the level property value. The state of publication for this document. Either published or checkout. Read-only.
     * @return string|null
    */
    public function getLevel(): ?string {
        return $this->level;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the versionId property value. The unique identifier for the version that is visible to the current caller. Read-only.
     * @return string|null
    */
    public function getVersionId(): ?string {
        return $this->versionId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('checkedOutBy', $this->getCheckedOutBy());
        $writer->writeStringValue('level', $this->getLevel());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('versionId', $this->getVersionId());
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
     * Sets the checkedOutBy property value. The user who checked out the file.
     * @param IdentitySet|null $value Value to set for the checkedOutBy property.
    */
    public function setCheckedOutBy(?IdentitySet $value): void {
        $this->checkedOutBy = $value;
    }

    /**
     * Sets the level property value. The state of publication for this document. Either published or checkout. Read-only.
     * @param string|null $value Value to set for the level property.
    */
    public function setLevel(?string $value): void {
        $this->level = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the versionId property value. The unique identifier for the version that is visible to the current caller. Read-only.
     * @param string|null $value Value to set for the versionId property.
    */
    public function setVersionId(?string $value): void {
        $this->versionId = $value;
    }

}
