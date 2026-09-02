<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProtectionRuleBase extends Entity implements Parsable 
{
    /**
     * @var IdentitySet|null $createdBy The identity of person who created the rule.
    */
    private ?IdentitySet $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime The time of creation of the rule.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var PublicError|null $error Contains error details if an operation on a rule fails.
    */
    private ?PublicError $error = null;
    
    /**
     * @var bool|null $isAutoApplyEnabled true indicates that the protection rule is dynamic; false that it's static.
    */
    private ?bool $isAutoApplyEnabled = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy The identity of the person who last modified the rule.
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime Timestamp of the last modification made to the rule.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var ProtectionRuleStatus|null $status The status of the protection rule. The possible values are: draft, active, completed, completedWithErrors, unknownFutureValue, updateRequested, deleteRequested. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: updateRequested , deleteRequested. The draft member is currently unsupported.
    */
    private ?ProtectionRuleStatus $status = null;
    
    /**
     * Instantiates a new ProtectionRuleBase and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProtectionRuleBase
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProtectionRuleBase {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.driveProtectionRule': return new DriveProtectionRule();
                case '#microsoft.graph.mailboxProtectionRule': return new MailboxProtectionRule();
                case '#microsoft.graph.siteProtectionRule': return new SiteProtectionRule();
            }
        }
        return new ProtectionRuleBase();
    }

    /**
     * Gets the createdBy property value. The identity of person who created the rule.
     * @return IdentitySet|null
    */
    public function getCreatedBy(): ?IdentitySet {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. The time of creation of the rule.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the error property value. Contains error details if an operation on a rule fails.
     * @return PublicError|null
    */
    public function getError(): ?PublicError {
        return $this->error;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'error' => fn(ParseNode $n) => $o->setError($n->getObjectValue([PublicError::class, 'createFromDiscriminatorValue'])),
            'isAutoApplyEnabled' => fn(ParseNode $n) => $o->setIsAutoApplyEnabled($n->getBooleanValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(ProtectionRuleStatus::class)),
        ]);
    }

    /**
     * Gets the isAutoApplyEnabled property value. true indicates that the protection rule is dynamic; false that it's static.
     * @return bool|null
    */
    public function getIsAutoApplyEnabled(): ?bool {
        return $this->isAutoApplyEnabled;
    }

    /**
     * Gets the lastModifiedBy property value. The identity of the person who last modified the rule.
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. Timestamp of the last modification made to the rule.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the status property value. The status of the protection rule. The possible values are: draft, active, completed, completedWithErrors, unknownFutureValue, updateRequested, deleteRequested. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: updateRequested , deleteRequested. The draft member is currently unsupported.
     * @return ProtectionRuleStatus|null
    */
    public function getStatus(): ?ProtectionRuleStatus {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('createdBy', $this->getCreatedBy());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeObjectValue('error', $this->getError());
        $writer->writeBooleanValue('isAutoApplyEnabled', $this->getIsAutoApplyEnabled());
        $writer->writeObjectValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeEnumValue('status', $this->getStatus());
    }

    /**
     * Sets the createdBy property value. The identity of person who created the rule.
     * @param IdentitySet|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?IdentitySet $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. The time of creation of the rule.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the error property value. Contains error details if an operation on a rule fails.
     * @param PublicError|null $value Value to set for the error property.
    */
    public function setError(?PublicError $value): void {
        $this->error = $value;
    }

    /**
     * Sets the isAutoApplyEnabled property value. true indicates that the protection rule is dynamic; false that it's static.
     * @param bool|null $value Value to set for the isAutoApplyEnabled property.
    */
    public function setIsAutoApplyEnabled(?bool $value): void {
        $this->isAutoApplyEnabled = $value;
    }

    /**
     * Sets the lastModifiedBy property value. The identity of the person who last modified the rule.
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. Timestamp of the last modification made to the rule.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the status property value. The status of the protection rule. The possible values are: draft, active, completed, completedWithErrors, unknownFutureValue, updateRequested, deleteRequested. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: updateRequested , deleteRequested. The draft member is currently unsupported.
     * @param ProtectionRuleStatus|null $value Value to set for the status property.
    */
    public function setStatus(?ProtectionRuleStatus $value): void {
        $this->status = $value;
    }

}
