<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ItemRetentionLabel extends Entity implements Parsable 
{
    /**
     * @var bool|null $isLabelAppliedExplicitly Specifies whether the label is applied explicitly on the item. True indicates that the label is applied explicitly; otherwise, the label is inherited from its parent. Read-only.
    */
    private ?bool $isLabelAppliedExplicitly = null;
    
    /**
     * @var IdentitySet|null $labelAppliedBy Identity of the user who applied the label. Read-only.
    */
    private ?IdentitySet $labelAppliedBy = null;
    
    /**
     * @var DateTime|null $labelAppliedDateTime The date and time when the label was applied on the item. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $labelAppliedDateTime = null;
    
    /**
     * @var string|null $name The retention label on the document. Read-write.
    */
    private ?string $name = null;
    
    /**
     * @var RetentionLabelSettings|null $retentionSettings The retention settings enforced on the item. Read-write.
    */
    private ?RetentionLabelSettings $retentionSettings = null;
    
    /**
     * Instantiates a new ItemRetentionLabel and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ItemRetentionLabel
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ItemRetentionLabel {
        return new ItemRetentionLabel();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'isLabelAppliedExplicitly' => fn(ParseNode $n) => $o->setIsLabelAppliedExplicitly($n->getBooleanValue()),
            'labelAppliedBy' => fn(ParseNode $n) => $o->setLabelAppliedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'labelAppliedDateTime' => fn(ParseNode $n) => $o->setLabelAppliedDateTime($n->getDateTimeValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'retentionSettings' => fn(ParseNode $n) => $o->setRetentionSettings($n->getObjectValue([RetentionLabelSettings::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isLabelAppliedExplicitly property value. Specifies whether the label is applied explicitly on the item. True indicates that the label is applied explicitly; otherwise, the label is inherited from its parent. Read-only.
     * @return bool|null
    */
    public function getIsLabelAppliedExplicitly(): ?bool {
        return $this->isLabelAppliedExplicitly;
    }

    /**
     * Gets the labelAppliedBy property value. Identity of the user who applied the label. Read-only.
     * @return IdentitySet|null
    */
    public function getLabelAppliedBy(): ?IdentitySet {
        return $this->labelAppliedBy;
    }

    /**
     * Gets the labelAppliedDateTime property value. The date and time when the label was applied on the item. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getLabelAppliedDateTime(): ?DateTime {
        return $this->labelAppliedDateTime;
    }

    /**
     * Gets the name property value. The retention label on the document. Read-write.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the retentionSettings property value. The retention settings enforced on the item. Read-write.
     * @return RetentionLabelSettings|null
    */
    public function getRetentionSettings(): ?RetentionLabelSettings {
        return $this->retentionSettings;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('isLabelAppliedExplicitly', $this->getIsLabelAppliedExplicitly());
        $writer->writeObjectValue('labelAppliedBy', $this->getLabelAppliedBy());
        $writer->writeDateTimeValue('labelAppliedDateTime', $this->getLabelAppliedDateTime());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeObjectValue('retentionSettings', $this->getRetentionSettings());
    }

    /**
     * Sets the isLabelAppliedExplicitly property value. Specifies whether the label is applied explicitly on the item. True indicates that the label is applied explicitly; otherwise, the label is inherited from its parent. Read-only.
     * @param bool|null $value Value to set for the isLabelAppliedExplicitly property.
    */
    public function setIsLabelAppliedExplicitly(?bool $value): void {
        $this->isLabelAppliedExplicitly = $value;
    }

    /**
     * Sets the labelAppliedBy property value. Identity of the user who applied the label. Read-only.
     * @param IdentitySet|null $value Value to set for the labelAppliedBy property.
    */
    public function setLabelAppliedBy(?IdentitySet $value): void {
        $this->labelAppliedBy = $value;
    }

    /**
     * Sets the labelAppliedDateTime property value. The date and time when the label was applied on the item. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the labelAppliedDateTime property.
    */
    public function setLabelAppliedDateTime(?DateTime $value): void {
        $this->labelAppliedDateTime = $value;
    }

    /**
     * Sets the name property value. The retention label on the document. Read-write.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the retentionSettings property value. The retention settings enforced on the item. Read-write.
     * @param RetentionLabelSettings|null $value Value to set for the retentionSettings property.
    */
    public function setRetentionSettings(?RetentionLabelSettings $value): void {
        $this->retentionSettings = $value;
    }

}
