<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security\BehaviorDuringRetentionPeriod;

class RetentionLabelSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var BehaviorDuringRetentionPeriod|null $behaviorDuringRetentionPeriod Describes the item behavior during retention period. The possible values are: doNotRetain, retain, retainAsRecord, retainAsRegulatoryRecord, unknownFutureValue. Read-only.
    */
    private ?BehaviorDuringRetentionPeriod $behaviorDuringRetentionPeriod = null;
    
    /**
     * @var bool|null $isContentUpdateAllowed Specifies whether updates to document content are allowed. Read-only.
    */
    private ?bool $isContentUpdateAllowed = null;
    
    /**
     * @var bool|null $isDeleteAllowed Specifies whether the document deletion is allowed. Read-only.
    */
    private ?bool $isDeleteAllowed = null;
    
    /**
     * @var bool|null $isLabelUpdateAllowed Specifies whether you're allowed to change the retention label on the document. Read-only.
    */
    private ?bool $isLabelUpdateAllowed = null;
    
    /**
     * @var bool|null $isMetadataUpdateAllowed Specifies whether updates to the item metadata (for example, the Title field) are blocked. Read-only.
    */
    private ?bool $isMetadataUpdateAllowed = null;
    
    /**
     * @var bool|null $isRecordLocked Specifies whether the item is locked. Read-write.
    */
    private ?bool $isRecordLocked = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new RetentionLabelSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RetentionLabelSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RetentionLabelSettings {
        return new RetentionLabelSettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the behaviorDuringRetentionPeriod property value. Describes the item behavior during retention period. The possible values are: doNotRetain, retain, retainAsRecord, retainAsRegulatoryRecord, unknownFutureValue. Read-only.
     * @return BehaviorDuringRetentionPeriod|null
    */
    public function getBehaviorDuringRetentionPeriod(): ?BehaviorDuringRetentionPeriod {
        return $this->behaviorDuringRetentionPeriod;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'behaviorDuringRetentionPeriod' => fn(ParseNode $n) => $o->setBehaviorDuringRetentionPeriod($n->getEnumValue(BehaviorDuringRetentionPeriod::class)),
            'isContentUpdateAllowed' => fn(ParseNode $n) => $o->setIsContentUpdateAllowed($n->getBooleanValue()),
            'isDeleteAllowed' => fn(ParseNode $n) => $o->setIsDeleteAllowed($n->getBooleanValue()),
            'isLabelUpdateAllowed' => fn(ParseNode $n) => $o->setIsLabelUpdateAllowed($n->getBooleanValue()),
            'isMetadataUpdateAllowed' => fn(ParseNode $n) => $o->setIsMetadataUpdateAllowed($n->getBooleanValue()),
            'isRecordLocked' => fn(ParseNode $n) => $o->setIsRecordLocked($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isContentUpdateAllowed property value. Specifies whether updates to document content are allowed. Read-only.
     * @return bool|null
    */
    public function getIsContentUpdateAllowed(): ?bool {
        return $this->isContentUpdateAllowed;
    }

    /**
     * Gets the isDeleteAllowed property value. Specifies whether the document deletion is allowed. Read-only.
     * @return bool|null
    */
    public function getIsDeleteAllowed(): ?bool {
        return $this->isDeleteAllowed;
    }

    /**
     * Gets the isLabelUpdateAllowed property value. Specifies whether you're allowed to change the retention label on the document. Read-only.
     * @return bool|null
    */
    public function getIsLabelUpdateAllowed(): ?bool {
        return $this->isLabelUpdateAllowed;
    }

    /**
     * Gets the isMetadataUpdateAllowed property value. Specifies whether updates to the item metadata (for example, the Title field) are blocked. Read-only.
     * @return bool|null
    */
    public function getIsMetadataUpdateAllowed(): ?bool {
        return $this->isMetadataUpdateAllowed;
    }

    /**
     * Gets the isRecordLocked property value. Specifies whether the item is locked. Read-write.
     * @return bool|null
    */
    public function getIsRecordLocked(): ?bool {
        return $this->isRecordLocked;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('behaviorDuringRetentionPeriod', $this->getBehaviorDuringRetentionPeriod());
        $writer->writeBooleanValue('isContentUpdateAllowed', $this->getIsContentUpdateAllowed());
        $writer->writeBooleanValue('isDeleteAllowed', $this->getIsDeleteAllowed());
        $writer->writeBooleanValue('isLabelUpdateAllowed', $this->getIsLabelUpdateAllowed());
        $writer->writeBooleanValue('isMetadataUpdateAllowed', $this->getIsMetadataUpdateAllowed());
        $writer->writeBooleanValue('isRecordLocked', $this->getIsRecordLocked());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the behaviorDuringRetentionPeriod property value. Describes the item behavior during retention period. The possible values are: doNotRetain, retain, retainAsRecord, retainAsRegulatoryRecord, unknownFutureValue. Read-only.
     * @param BehaviorDuringRetentionPeriod|null $value Value to set for the behaviorDuringRetentionPeriod property.
    */
    public function setBehaviorDuringRetentionPeriod(?BehaviorDuringRetentionPeriod $value): void {
        $this->behaviorDuringRetentionPeriod = $value;
    }

    /**
     * Sets the isContentUpdateAllowed property value. Specifies whether updates to document content are allowed. Read-only.
     * @param bool|null $value Value to set for the isContentUpdateAllowed property.
    */
    public function setIsContentUpdateAllowed(?bool $value): void {
        $this->isContentUpdateAllowed = $value;
    }

    /**
     * Sets the isDeleteAllowed property value. Specifies whether the document deletion is allowed. Read-only.
     * @param bool|null $value Value to set for the isDeleteAllowed property.
    */
    public function setIsDeleteAllowed(?bool $value): void {
        $this->isDeleteAllowed = $value;
    }

    /**
     * Sets the isLabelUpdateAllowed property value. Specifies whether you're allowed to change the retention label on the document. Read-only.
     * @param bool|null $value Value to set for the isLabelUpdateAllowed property.
    */
    public function setIsLabelUpdateAllowed(?bool $value): void {
        $this->isLabelUpdateAllowed = $value;
    }

    /**
     * Sets the isMetadataUpdateAllowed property value. Specifies whether updates to the item metadata (for example, the Title field) are blocked. Read-only.
     * @param bool|null $value Value to set for the isMetadataUpdateAllowed property.
    */
    public function setIsMetadataUpdateAllowed(?bool $value): void {
        $this->isMetadataUpdateAllowed = $value;
    }

    /**
     * Sets the isRecordLocked property value. Specifies whether the item is locked. Read-write.
     * @param bool|null $value Value to set for the isRecordLocked property.
    */
    public function setIsRecordLocked(?bool $value): void {
        $this->isRecordLocked = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
