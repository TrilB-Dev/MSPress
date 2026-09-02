<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class OwnerlessGroupPolicy extends Entity implements Parsable 
{
    /**
     * @var EmailDetails|null $emailInfo The emailInfo property
    */
    private ?EmailDetails $emailInfo = null;
    
    /**
     * @var array<string>|null $enabledGroupIds The collection of IDs for groups to which the policy is enabled. If empty, the policy is enabled for all groups in the tenant.
    */
    private ?array $enabledGroupIds = null;
    
    /**
     * @var bool|null $isEnabled Indicates whether the ownerless group policy is enabled in the tenant. Setting this property to false clears the values of all other policy parameters.
    */
    private ?bool $isEnabled = null;
    
    /**
     * @var int|null $maxMembersToNotify The maximum number of members to notify. Value range is 0-90. Members are prioritized by recent group activity (most active first). If there aren't enough active members to fill the limit, remaining slots are filled with other eligible group members from the directory.
    */
    private ?int $maxMembersToNotify = null;
    
    /**
     * @var int|null $notificationDurationInWeeks The number of weeks for the notification duration. Value range is 1-7.
    */
    private ?int $notificationDurationInWeeks = null;
    
    /**
     * @var string|null $policyWebUrl The URL to the policy documentation.
    */
    private ?string $policyWebUrl = null;
    
    /**
     * @var TargetOwners|null $targetOwners The targetOwners property
    */
    private ?TargetOwners $targetOwners = null;
    
    /**
     * Instantiates a new OwnerlessGroupPolicy and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OwnerlessGroupPolicy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OwnerlessGroupPolicy {
        return new OwnerlessGroupPolicy();
    }

    /**
     * Gets the emailInfo property value. The emailInfo property
     * @return EmailDetails|null
    */
    public function getEmailInfo(): ?EmailDetails {
        return $this->emailInfo;
    }

    /**
     * Gets the enabledGroupIds property value. The collection of IDs for groups to which the policy is enabled. If empty, the policy is enabled for all groups in the tenant.
     * @return array<string>|null
    */
    public function getEnabledGroupIds(): ?array {
        return $this->enabledGroupIds;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'emailInfo' => fn(ParseNode $n) => $o->setEmailInfo($n->getObjectValue([EmailDetails::class, 'createFromDiscriminatorValue'])),
            'enabledGroupIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setEnabledGroupIds($val);
            },
            'isEnabled' => fn(ParseNode $n) => $o->setIsEnabled($n->getBooleanValue()),
            'maxMembersToNotify' => fn(ParseNode $n) => $o->setMaxMembersToNotify($n->getIntegerValue()),
            'notificationDurationInWeeks' => fn(ParseNode $n) => $o->setNotificationDurationInWeeks($n->getIntegerValue()),
            'policyWebUrl' => fn(ParseNode $n) => $o->setPolicyWebUrl($n->getStringValue()),
            'targetOwners' => fn(ParseNode $n) => $o->setTargetOwners($n->getObjectValue([TargetOwners::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isEnabled property value. Indicates whether the ownerless group policy is enabled in the tenant. Setting this property to false clears the values of all other policy parameters.
     * @return bool|null
    */
    public function getIsEnabled(): ?bool {
        return $this->isEnabled;
    }

    /**
     * Gets the maxMembersToNotify property value. The maximum number of members to notify. Value range is 0-90. Members are prioritized by recent group activity (most active first). If there aren't enough active members to fill the limit, remaining slots are filled with other eligible group members from the directory.
     * @return int|null
    */
    public function getMaxMembersToNotify(): ?int {
        return $this->maxMembersToNotify;
    }

    /**
     * Gets the notificationDurationInWeeks property value. The number of weeks for the notification duration. Value range is 1-7.
     * @return int|null
    */
    public function getNotificationDurationInWeeks(): ?int {
        return $this->notificationDurationInWeeks;
    }

    /**
     * Gets the policyWebUrl property value. The URL to the policy documentation.
     * @return string|null
    */
    public function getPolicyWebUrl(): ?string {
        return $this->policyWebUrl;
    }

    /**
     * Gets the targetOwners property value. The targetOwners property
     * @return TargetOwners|null
    */
    public function getTargetOwners(): ?TargetOwners {
        return $this->targetOwners;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('emailInfo', $this->getEmailInfo());
        $writer->writeCollectionOfPrimitiveValues('enabledGroupIds', $this->getEnabledGroupIds());
        $writer->writeBooleanValue('isEnabled', $this->getIsEnabled());
        $writer->writeIntegerValue('maxMembersToNotify', $this->getMaxMembersToNotify());
        $writer->writeIntegerValue('notificationDurationInWeeks', $this->getNotificationDurationInWeeks());
        $writer->writeStringValue('policyWebUrl', $this->getPolicyWebUrl());
        $writer->writeObjectValue('targetOwners', $this->getTargetOwners());
    }

    /**
     * Sets the emailInfo property value. The emailInfo property
     * @param EmailDetails|null $value Value to set for the emailInfo property.
    */
    public function setEmailInfo(?EmailDetails $value): void {
        $this->emailInfo = $value;
    }

    /**
     * Sets the enabledGroupIds property value. The collection of IDs for groups to which the policy is enabled. If empty, the policy is enabled for all groups in the tenant.
     * @param array<string>|null $value Value to set for the enabledGroupIds property.
    */
    public function setEnabledGroupIds(?array $value): void {
        $this->enabledGroupIds = $value;
    }

    /**
     * Sets the isEnabled property value. Indicates whether the ownerless group policy is enabled in the tenant. Setting this property to false clears the values of all other policy parameters.
     * @param bool|null $value Value to set for the isEnabled property.
    */
    public function setIsEnabled(?bool $value): void {
        $this->isEnabled = $value;
    }

    /**
     * Sets the maxMembersToNotify property value. The maximum number of members to notify. Value range is 0-90. Members are prioritized by recent group activity (most active first). If there aren't enough active members to fill the limit, remaining slots are filled with other eligible group members from the directory.
     * @param int|null $value Value to set for the maxMembersToNotify property.
    */
    public function setMaxMembersToNotify(?int $value): void {
        $this->maxMembersToNotify = $value;
    }

    /**
     * Sets the notificationDurationInWeeks property value. The number of weeks for the notification duration. Value range is 1-7.
     * @param int|null $value Value to set for the notificationDurationInWeeks property.
    */
    public function setNotificationDurationInWeeks(?int $value): void {
        $this->notificationDurationInWeeks = $value;
    }

    /**
     * Sets the policyWebUrl property value. The URL to the policy documentation.
     * @param string|null $value Value to set for the policyWebUrl property.
    */
    public function setPolicyWebUrl(?string $value): void {
        $this->policyWebUrl = $value;
    }

    /**
     * Sets the targetOwners property value. The targetOwners property
     * @param TargetOwners|null $value Value to set for the targetOwners property.
    */
    public function setTargetOwners(?TargetOwners $value): void {
        $this->targetOwners = $value;
    }

}
