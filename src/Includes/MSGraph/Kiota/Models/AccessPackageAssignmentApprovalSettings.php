<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageAssignmentApprovalSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $isApprovalRequiredForAdd If false, then approval isn't required for new requests in this policy.
    */
    private ?bool $isApprovalRequiredForAdd = null;
    
    /**
     * @var bool|null $isApprovalRequiredForUpdate If false, then approval isn't required for updates to requests in this policy.
    */
    private ?bool $isApprovalRequiredForUpdate = null;
    
    /**
     * @var bool|null $isRequestorJustificationRequired If false, then requestor justification isn't required for updates to requests in this policy.
    */
    private ?bool $isRequestorJustificationRequired = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<AccessPackageApprovalStage>|null $stages If approval is required, the one, two or three elements of this collection define each of the stages of approval. An empty array is present if no approval is required.
    */
    private ?array $stages = null;
    
    /**
     * Instantiates a new AccessPackageAssignmentApprovalSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageAssignmentApprovalSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageAssignmentApprovalSettings {
        return new AccessPackageAssignmentApprovalSettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'isApprovalRequiredForAdd' => fn(ParseNode $n) => $o->setIsApprovalRequiredForAdd($n->getBooleanValue()),
            'isApprovalRequiredForUpdate' => fn(ParseNode $n) => $o->setIsApprovalRequiredForUpdate($n->getBooleanValue()),
            'isRequestorJustificationRequired' => fn(ParseNode $n) => $o->setIsRequestorJustificationRequired($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'stages' => fn(ParseNode $n) => $o->setStages($n->getCollectionOfObjectValues([AccessPackageApprovalStage::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the isApprovalRequiredForAdd property value. If false, then approval isn't required for new requests in this policy.
     * @return bool|null
    */
    public function getIsApprovalRequiredForAdd(): ?bool {
        return $this->isApprovalRequiredForAdd;
    }

    /**
     * Gets the isApprovalRequiredForUpdate property value. If false, then approval isn't required for updates to requests in this policy.
     * @return bool|null
    */
    public function getIsApprovalRequiredForUpdate(): ?bool {
        return $this->isApprovalRequiredForUpdate;
    }

    /**
     * Gets the isRequestorJustificationRequired property value. If false, then requestor justification isn't required for updates to requests in this policy.
     * @return bool|null
    */
    public function getIsRequestorJustificationRequired(): ?bool {
        return $this->isRequestorJustificationRequired;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the stages property value. If approval is required, the one, two or three elements of this collection define each of the stages of approval. An empty array is present if no approval is required.
     * @return array<AccessPackageApprovalStage>|null
    */
    public function getStages(): ?array {
        return $this->stages;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('isApprovalRequiredForAdd', $this->getIsApprovalRequiredForAdd());
        $writer->writeBooleanValue('isApprovalRequiredForUpdate', $this->getIsApprovalRequiredForUpdate());
        $writer->writeBooleanValue('isRequestorJustificationRequired', $this->getIsRequestorJustificationRequired());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfObjectValues('stages', $this->getStages());
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
     * Sets the isApprovalRequiredForAdd property value. If false, then approval isn't required for new requests in this policy.
     * @param bool|null $value Value to set for the isApprovalRequiredForAdd property.
    */
    public function setIsApprovalRequiredForAdd(?bool $value): void {
        $this->isApprovalRequiredForAdd = $value;
    }

    /**
     * Sets the isApprovalRequiredForUpdate property value. If false, then approval isn't required for updates to requests in this policy.
     * @param bool|null $value Value to set for the isApprovalRequiredForUpdate property.
    */
    public function setIsApprovalRequiredForUpdate(?bool $value): void {
        $this->isApprovalRequiredForUpdate = $value;
    }

    /**
     * Sets the isRequestorJustificationRequired property value. If false, then requestor justification isn't required for updates to requests in this policy.
     * @param bool|null $value Value to set for the isRequestorJustificationRequired property.
    */
    public function setIsRequestorJustificationRequired(?bool $value): void {
        $this->isRequestorJustificationRequired = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the stages property value. If approval is required, the one, two or three elements of this collection define each of the stages of approval. An empty array is present if no approval is required.
     * @param array<AccessPackageApprovalStage>|null $value Value to set for the stages property.
    */
    public function setStages(?array $value): void {
        $this->stages = $value;
    }

}
