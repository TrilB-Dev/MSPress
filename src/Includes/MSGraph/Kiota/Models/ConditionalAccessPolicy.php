<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConditionalAccessPolicy extends PolicyDeletableItem implements Parsable 
{
    /**
     * @var ConditionalAccessConditionSet|null $conditions The conditions property
    */
    private ?ConditionalAccessConditionSet $conditions = null;
    
    /**
     * @var DateTime|null $createdDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description The description property
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName Specifies a display name for the conditionalAccessPolicy object.
    */
    private ?string $displayName = null;
    
    /**
     * @var ConditionalAccessGrantControls|null $grantControls Specifies the grant controls that must be fulfilled to pass the policy.
    */
    private ?ConditionalAccessGrantControls $grantControls = null;
    
    /**
     * @var string|null $id Specifies the identifier of a conditionalAccessPolicy object. Read-only.
    */
    private ?string $id = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var ConditionalAccessSessionControls|null $sessionControls Specifies the session controls that are enforced after sign-in.
    */
    private ?ConditionalAccessSessionControls $sessionControls = null;
    
    /**
     * @var ConditionalAccessPolicyState|null $state The state property
    */
    private ?ConditionalAccessPolicyState $state = null;
    
    /**
     * @var string|null $templateId Specifies the unique identifier of a Conditional Access template. Inherited from entity.
    */
    private ?string $templateId = null;
    
    /**
     * Instantiates a new ConditionalAccessPolicy and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.conditionalAccessPolicy');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConditionalAccessPolicy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConditionalAccessPolicy {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.whatIfAnalysisResult': return new WhatIfAnalysisResult();
            }
        }
        return new ConditionalAccessPolicy();
    }

    /**
     * Gets the conditions property value. The conditions property
     * @return ConditionalAccessConditionSet|null
    */
    public function getConditions(): ?ConditionalAccessConditionSet {
        return $this->conditions;
    }

    /**
     * Gets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. The description property
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. Specifies a display name for the conditionalAccessPolicy object.
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
            'conditions' => fn(ParseNode $n) => $o->setConditions($n->getObjectValue([ConditionalAccessConditionSet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'grantControls' => fn(ParseNode $n) => $o->setGrantControls($n->getObjectValue([ConditionalAccessGrantControls::class, 'createFromDiscriminatorValue'])),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            'sessionControls' => fn(ParseNode $n) => $o->setSessionControls($n->getObjectValue([ConditionalAccessSessionControls::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(ConditionalAccessPolicyState::class)),
            'templateId' => fn(ParseNode $n) => $o->setTemplateId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the grantControls property value. Specifies the grant controls that must be fulfilled to pass the policy.
     * @return ConditionalAccessGrantControls|null
    */
    public function getGrantControls(): ?ConditionalAccessGrantControls {
        return $this->grantControls;
    }

    /**
     * Gets the id property value. Specifies the identifier of a conditionalAccessPolicy object. Read-only.
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the sessionControls property value. Specifies the session controls that are enforced after sign-in.
     * @return ConditionalAccessSessionControls|null
    */
    public function getSessionControls(): ?ConditionalAccessSessionControls {
        return $this->sessionControls;
    }

    /**
     * Gets the state property value. The state property
     * @return ConditionalAccessPolicyState|null
    */
    public function getState(): ?ConditionalAccessPolicyState {
        return $this->state;
    }

    /**
     * Gets the templateId property value. Specifies the unique identifier of a Conditional Access template. Inherited from entity.
     * @return string|null
    */
    public function getTemplateId(): ?string {
        return $this->templateId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('conditions', $this->getConditions());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('grantControls', $this->getGrantControls());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeObjectValue('sessionControls', $this->getSessionControls());
        $writer->writeEnumValue('state', $this->getState());
        $writer->writeStringValue('templateId', $this->getTemplateId());
    }

    /**
     * Sets the conditions property value. The conditions property
     * @param ConditionalAccessConditionSet|null $value Value to set for the conditions property.
    */
    public function setConditions(?ConditionalAccessConditionSet $value): void {
        $this->conditions = $value;
    }

    /**
     * Sets the createdDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. The description property
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. Specifies a display name for the conditionalAccessPolicy object.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the grantControls property value. Specifies the grant controls that must be fulfilled to pass the policy.
     * @param ConditionalAccessGrantControls|null $value Value to set for the grantControls property.
    */
    public function setGrantControls(?ConditionalAccessGrantControls $value): void {
        $this->grantControls = $value;
    }

    /**
     * Sets the id property value. Specifies the identifier of a conditionalAccessPolicy object. Read-only.
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the sessionControls property value. Specifies the session controls that are enforced after sign-in.
     * @param ConditionalAccessSessionControls|null $value Value to set for the sessionControls property.
    */
    public function setSessionControls(?ConditionalAccessSessionControls $value): void {
        $this->sessionControls = $value;
    }

    /**
     * Sets the state property value. The state property
     * @param ConditionalAccessPolicyState|null $value Value to set for the state property.
    */
    public function setState(?ConditionalAccessPolicyState $value): void {
        $this->state = $value;
    }

    /**
     * Sets the templateId property value. Specifies the unique identifier of a Conditional Access template. Inherited from entity.
     * @param string|null $value Value to set for the templateId property.
    */
    public function setTemplateId(?string $value): void {
        $this->templateId = $value;
    }

}
