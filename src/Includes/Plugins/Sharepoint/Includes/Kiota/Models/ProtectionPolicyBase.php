<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProtectionPolicyBase extends Entity implements Parsable 
{
    /**
     * @var IdentitySet|null $createdBy The identity of person who created the policy.
    */
    private ?IdentitySet $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime The time of creation of the policy.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $displayName The name of the policy to be created.
    */
    private ?string $displayName = null;
    
    /**
     * @var bool|null $isEnabled The isEnabled property
    */
    private ?bool $isEnabled = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy The identity of the person who last modified the policy.
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The timestamp of the last modification of the policy.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var ProtectionPolicyArtifactCount|null $protectionPolicyArtifactCount The protectionPolicyArtifactCount property
    */
    private ?ProtectionPolicyArtifactCount $protectionPolicyArtifactCount = null;
    
    /**
     * @var array<RetentionSetting>|null $retentionSettings Contains the retention setting details for the policy.
    */
    private ?array $retentionSettings = null;
    
    /**
     * @var ProtectionPolicyStatus|null $status The aggregated status of the protection units associated with the policy. The possible values are: inactive, activeWithErrors, updating, active, unknownFutureValue.
    */
    private ?ProtectionPolicyStatus $status = null;
    
    /**
     * Instantiates a new ProtectionPolicyBase and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProtectionPolicyBase
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProtectionPolicyBase {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.exchangeProtectionPolicy': return new ExchangeProtectionPolicy();
                case '#microsoft.graph.oneDriveForBusinessProtectionPolicy': return new OneDriveForBusinessProtectionPolicy();
                case '#microsoft.graph.sharePointProtectionPolicy': return new SharePointProtectionPolicy();
            }
        }
        return new ProtectionPolicyBase();
    }

    /**
     * Gets the createdBy property value. The identity of person who created the policy.
     * @return IdentitySet|null
    */
    public function getCreatedBy(): ?IdentitySet {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. The time of creation of the policy.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the displayName property value. The name of the policy to be created.
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
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'isEnabled' => fn(ParseNode $n) => $o->setIsEnabled($n->getBooleanValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'protectionPolicyArtifactCount' => fn(ParseNode $n) => $o->setProtectionPolicyArtifactCount($n->getObjectValue([ProtectionPolicyArtifactCount::class, 'createFromDiscriminatorValue'])),
            'retentionSettings' => fn(ParseNode $n) => $o->setRetentionSettings($n->getCollectionOfObjectValues([RetentionSetting::class, 'createFromDiscriminatorValue'])),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(ProtectionPolicyStatus::class)),
        ]);
    }

    /**
     * Gets the isEnabled property value. The isEnabled property
     * @return bool|null
    */
    public function getIsEnabled(): ?bool {
        return $this->isEnabled;
    }

    /**
     * Gets the lastModifiedBy property value. The identity of the person who last modified the policy.
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. The timestamp of the last modification of the policy.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the protectionPolicyArtifactCount property value. The protectionPolicyArtifactCount property
     * @return ProtectionPolicyArtifactCount|null
    */
    public function getProtectionPolicyArtifactCount(): ?ProtectionPolicyArtifactCount {
        return $this->protectionPolicyArtifactCount;
    }

    /**
     * Gets the retentionSettings property value. Contains the retention setting details for the policy.
     * @return array<RetentionSetting>|null
    */
    public function getRetentionSettings(): ?array {
        return $this->retentionSettings;
    }

    /**
     * Gets the status property value. The aggregated status of the protection units associated with the policy. The possible values are: inactive, activeWithErrors, updating, active, unknownFutureValue.
     * @return ProtectionPolicyStatus|null
    */
    public function getStatus(): ?ProtectionPolicyStatus {
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
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeBooleanValue('isEnabled', $this->getIsEnabled());
        $writer->writeObjectValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeObjectValue('protectionPolicyArtifactCount', $this->getProtectionPolicyArtifactCount());
        $writer->writeCollectionOfObjectValues('retentionSettings', $this->getRetentionSettings());
        $writer->writeEnumValue('status', $this->getStatus());
    }

    /**
     * Sets the createdBy property value. The identity of person who created the policy.
     * @param IdentitySet|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?IdentitySet $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. The time of creation of the policy.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the displayName property value. The name of the policy to be created.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the isEnabled property value. The isEnabled property
     * @param bool|null $value Value to set for the isEnabled property.
    */
    public function setIsEnabled(?bool $value): void {
        $this->isEnabled = $value;
    }

    /**
     * Sets the lastModifiedBy property value. The identity of the person who last modified the policy.
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The timestamp of the last modification of the policy.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the protectionPolicyArtifactCount property value. The protectionPolicyArtifactCount property
     * @param ProtectionPolicyArtifactCount|null $value Value to set for the protectionPolicyArtifactCount property.
    */
    public function setProtectionPolicyArtifactCount(?ProtectionPolicyArtifactCount $value): void {
        $this->protectionPolicyArtifactCount = $value;
    }

    /**
     * Sets the retentionSettings property value. Contains the retention setting details for the policy.
     * @param array<RetentionSetting>|null $value Value to set for the retentionSettings property.
    */
    public function setRetentionSettings(?array $value): void {
        $this->retentionSettings = $value;
    }

    /**
     * Sets the status property value. The aggregated status of the protection units associated with the policy. The possible values are: inactive, activeWithErrors, updating, active, unknownFutureValue.
     * @param ProtectionPolicyStatus|null $value Value to set for the status property.
    */
    public function setStatus(?ProtectionPolicyStatus $value): void {
        $this->status = $value;
    }

}
