<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\TeamsAdministration;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\User;

class TeamsUserConfiguration extends Entity implements Parsable 
{
    /**
     * @var AccountType|null $accountType The accountType property
    */
    private ?AccountType $accountType = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when the user was created. The timestamp represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<EffectivePolicyAssignment>|null $effectivePolicyAssignments Contains the user's effective policy assignments, with each assignment including policyType and policyAssignment details.
    */
    private ?array $effectivePolicyAssignments = null;
    
    /**
     * @var array<string>|null $featureTypes The Teams features enabled for a given user based on licensing or service plan.
    */
    private ?array $featureTypes = null;
    
    /**
     * @var bool|null $isEnterpriseVoiceEnabled Indicates whether voice capability is enabled.
    */
    private ?bool $isEnterpriseVoiceEnabled = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The date and time when the user's details were last modified. The system updates this value each time the user's details are changed. The timestamp represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * @var array<AssignedTelephoneNumber>|null $telephoneNumbers Includes both the phone number and its corresponding assignment category. The assignment category can include values such as primary, private, and alternate.
    */
    private ?array $telephoneNumbers = null;
    
    /**
     * @var string|null $tenantId The unique identifier of the tenant in Entra to which this user is assigned.
    */
    private ?string $tenantId = null;
    
    /**
     * @var User|null $user Represents an Entra user account.
    */
    private ?User $user = null;
    
    /**
     * @var string|null $userPrincipalName The sign-in address of the user.
    */
    private ?string $userPrincipalName = null;
    
    /**
     * Instantiates a new TeamsUserConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TeamsUserConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TeamsUserConfiguration {
        return new TeamsUserConfiguration();
    }

    /**
     * Gets the accountType property value. The accountType property
     * @return AccountType|null
    */
    public function getAccountType(): ?AccountType {
        return $this->accountType;
    }

    /**
     * Gets the createdDateTime property value. The date and time when the user was created. The timestamp represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the effectivePolicyAssignments property value. Contains the user's effective policy assignments, with each assignment including policyType and policyAssignment details.
     * @return array<EffectivePolicyAssignment>|null
    */
    public function getEffectivePolicyAssignments(): ?array {
        return $this->effectivePolicyAssignments;
    }

    /**
     * Gets the featureTypes property value. The Teams features enabled for a given user based on licensing or service plan.
     * @return array<string>|null
    */
    public function getFeatureTypes(): ?array {
        return $this->featureTypes;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'accountType' => fn(ParseNode $n) => $o->setAccountType($n->getEnumValue(AccountType::class)),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'effectivePolicyAssignments' => fn(ParseNode $n) => $o->setEffectivePolicyAssignments($n->getCollectionOfObjectValues([EffectivePolicyAssignment::class, 'createFromDiscriminatorValue'])),
            'featureTypes' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setFeatureTypes($val);
            },
            'isEnterpriseVoiceEnabled' => fn(ParseNode $n) => $o->setIsEnterpriseVoiceEnabled($n->getBooleanValue()),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
            'telephoneNumbers' => fn(ParseNode $n) => $o->setTelephoneNumbers($n->getCollectionOfObjectValues([AssignedTelephoneNumber::class, 'createFromDiscriminatorValue'])),
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'user' => fn(ParseNode $n) => $o->setUser($n->getObjectValue([User::class, 'createFromDiscriminatorValue'])),
            'userPrincipalName' => fn(ParseNode $n) => $o->setUserPrincipalName($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isEnterpriseVoiceEnabled property value. Indicates whether voice capability is enabled.
     * @return bool|null
    */
    public function getIsEnterpriseVoiceEnabled(): ?bool {
        return $this->isEnterpriseVoiceEnabled;
    }

    /**
     * Gets the modifiedDateTime property value. The date and time when the user's details were last modified. The system updates this value each time the user's details are changed. The timestamp represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Gets the telephoneNumbers property value. Includes both the phone number and its corresponding assignment category. The assignment category can include values such as primary, private, and alternate.
     * @return array<AssignedTelephoneNumber>|null
    */
    public function getTelephoneNumbers(): ?array {
        return $this->telephoneNumbers;
    }

    /**
     * Gets the tenantId property value. The unique identifier of the tenant in Entra to which this user is assigned.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the user property value. Represents an Entra user account.
     * @return User|null
    */
    public function getUser(): ?User {
        return $this->user;
    }

    /**
     * Gets the userPrincipalName property value. The sign-in address of the user.
     * @return string|null
    */
    public function getUserPrincipalName(): ?string {
        return $this->userPrincipalName;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('accountType', $this->getAccountType());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('effectivePolicyAssignments', $this->getEffectivePolicyAssignments());
        $writer->writeCollectionOfPrimitiveValues('featureTypes', $this->getFeatureTypes());
        $writer->writeBooleanValue('isEnterpriseVoiceEnabled', $this->getIsEnterpriseVoiceEnabled());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
        $writer->writeCollectionOfObjectValues('telephoneNumbers', $this->getTelephoneNumbers());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeObjectValue('user', $this->getUser());
        $writer->writeStringValue('userPrincipalName', $this->getUserPrincipalName());
    }

    /**
     * Sets the accountType property value. The accountType property
     * @param AccountType|null $value Value to set for the accountType property.
    */
    public function setAccountType(?AccountType $value): void {
        $this->accountType = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when the user was created. The timestamp represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the effectivePolicyAssignments property value. Contains the user's effective policy assignments, with each assignment including policyType and policyAssignment details.
     * @param array<EffectivePolicyAssignment>|null $value Value to set for the effectivePolicyAssignments property.
    */
    public function setEffectivePolicyAssignments(?array $value): void {
        $this->effectivePolicyAssignments = $value;
    }

    /**
     * Sets the featureTypes property value. The Teams features enabled for a given user based on licensing or service plan.
     * @param array<string>|null $value Value to set for the featureTypes property.
    */
    public function setFeatureTypes(?array $value): void {
        $this->featureTypes = $value;
    }

    /**
     * Sets the isEnterpriseVoiceEnabled property value. Indicates whether voice capability is enabled.
     * @param bool|null $value Value to set for the isEnterpriseVoiceEnabled property.
    */
    public function setIsEnterpriseVoiceEnabled(?bool $value): void {
        $this->isEnterpriseVoiceEnabled = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The date and time when the user's details were last modified. The system updates this value each time the user's details are changed. The timestamp represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

    /**
     * Sets the telephoneNumbers property value. Includes both the phone number and its corresponding assignment category. The assignment category can include values such as primary, private, and alternate.
     * @param array<AssignedTelephoneNumber>|null $value Value to set for the telephoneNumbers property.
    */
    public function setTelephoneNumbers(?array $value): void {
        $this->telephoneNumbers = $value;
    }

    /**
     * Sets the tenantId property value. The unique identifier of the tenant in Entra to which this user is assigned.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the user property value. Represents an Entra user account.
     * @param User|null $value Value to set for the user property.
    */
    public function setUser(?User $value): void {
        $this->user = $value;
    }

    /**
     * Sets the userPrincipalName property value. The sign-in address of the user.
     * @param string|null $value Value to set for the userPrincipalName property.
    */
    public function setUserPrincipalName(?string $value): void {
        $this->userPrincipalName = $value;
    }

}
