<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class IdentifierUriRestriction implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var AppManagementPolicyActorExemptions|null $excludeActors Collection of custom security attribute exemptions. If an actor user or service principal has the custom security attribute defined in this section, they're exempted from the restriction.  This means that calls the user or service principal makes to create or update apps are exempt from this policy enforcement.
    */
    private ?AppManagementPolicyActorExemptions $excludeActors = null;
    
    /**
     * @var bool|null $excludeAppsReceivingV2Tokens If true, the restriction isn't enforced for applications that are configured to receive V2 tokens in Microsoft Entra ID; else, the restriction is enforced for those applications.
    */
    private ?bool $excludeAppsReceivingV2Tokens = null;
    
    /**
     * @var bool|null $excludeSaml If true, the restriction isn't enforced for SAML applications in Microsoft Entra ID; else, the restriction is enforced for those applications.
    */
    private ?bool $excludeSaml = null;
    
    /**
     * @var bool|null $isStateSetByMicrosoft If true, Microsoft sets the identifierUriRestriction state. If false, the tenant modifies the identifierUriRestriction state. Read-only.
    */
    private ?bool $isStateSetByMicrosoft = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var DateTime|null $restrictForAppsCreatedAfterDateTime Specifies the date from which the policy restriction applies to newly created applications. For existing applications, the enforcement date can be retroactively applied.
    */
    private ?DateTime $restrictForAppsCreatedAfterDateTime = null;
    
    /**
     * @var AppManagementRestrictionState|null $state The state property
    */
    private ?AppManagementRestrictionState $state = null;
    
    /**
     * Instantiates a new IdentifierUriRestriction and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IdentifierUriRestriction
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IdentifierUriRestriction {
        return new IdentifierUriRestriction();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the excludeActors property value. Collection of custom security attribute exemptions. If an actor user or service principal has the custom security attribute defined in this section, they're exempted from the restriction.  This means that calls the user or service principal makes to create or update apps are exempt from this policy enforcement.
     * @return AppManagementPolicyActorExemptions|null
    */
    public function getExcludeActors(): ?AppManagementPolicyActorExemptions {
        return $this->excludeActors;
    }

    /**
     * Gets the excludeAppsReceivingV2Tokens property value. If true, the restriction isn't enforced for applications that are configured to receive V2 tokens in Microsoft Entra ID; else, the restriction is enforced for those applications.
     * @return bool|null
    */
    public function getExcludeAppsReceivingV2Tokens(): ?bool {
        return $this->excludeAppsReceivingV2Tokens;
    }

    /**
     * Gets the excludeSaml property value. If true, the restriction isn't enforced for SAML applications in Microsoft Entra ID; else, the restriction is enforced for those applications.
     * @return bool|null
    */
    public function getExcludeSaml(): ?bool {
        return $this->excludeSaml;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'excludeActors' => fn(ParseNode $n) => $o->setExcludeActors($n->getObjectValue([AppManagementPolicyActorExemptions::class, 'createFromDiscriminatorValue'])),
            'excludeAppsReceivingV2Tokens' => fn(ParseNode $n) => $o->setExcludeAppsReceivingV2Tokens($n->getBooleanValue()),
            'excludeSaml' => fn(ParseNode $n) => $o->setExcludeSaml($n->getBooleanValue()),
            'isStateSetByMicrosoft' => fn(ParseNode $n) => $o->setIsStateSetByMicrosoft($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'restrictForAppsCreatedAfterDateTime' => fn(ParseNode $n) => $o->setRestrictForAppsCreatedAfterDateTime($n->getDateTimeValue()),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(AppManagementRestrictionState::class)),
        ];
    }

    /**
     * Gets the isStateSetByMicrosoft property value. If true, Microsoft sets the identifierUriRestriction state. If false, the tenant modifies the identifierUriRestriction state. Read-only.
     * @return bool|null
    */
    public function getIsStateSetByMicrosoft(): ?bool {
        return $this->isStateSetByMicrosoft;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the restrictForAppsCreatedAfterDateTime property value. Specifies the date from which the policy restriction applies to newly created applications. For existing applications, the enforcement date can be retroactively applied.
     * @return DateTime|null
    */
    public function getRestrictForAppsCreatedAfterDateTime(): ?DateTime {
        return $this->restrictForAppsCreatedAfterDateTime;
    }

    /**
     * Gets the state property value. The state property
     * @return AppManagementRestrictionState|null
    */
    public function getState(): ?AppManagementRestrictionState {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('excludeActors', $this->getExcludeActors());
        $writer->writeBooleanValue('excludeAppsReceivingV2Tokens', $this->getExcludeAppsReceivingV2Tokens());
        $writer->writeBooleanValue('excludeSaml', $this->getExcludeSaml());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeDateTimeValue('restrictForAppsCreatedAfterDateTime', $this->getRestrictForAppsCreatedAfterDateTime());
        $writer->writeEnumValue('state', $this->getState());
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
     * Sets the excludeActors property value. Collection of custom security attribute exemptions. If an actor user or service principal has the custom security attribute defined in this section, they're exempted from the restriction.  This means that calls the user or service principal makes to create or update apps are exempt from this policy enforcement.
     * @param AppManagementPolicyActorExemptions|null $value Value to set for the excludeActors property.
    */
    public function setExcludeActors(?AppManagementPolicyActorExemptions $value): void {
        $this->excludeActors = $value;
    }

    /**
     * Sets the excludeAppsReceivingV2Tokens property value. If true, the restriction isn't enforced for applications that are configured to receive V2 tokens in Microsoft Entra ID; else, the restriction is enforced for those applications.
     * @param bool|null $value Value to set for the excludeAppsReceivingV2Tokens property.
    */
    public function setExcludeAppsReceivingV2Tokens(?bool $value): void {
        $this->excludeAppsReceivingV2Tokens = $value;
    }

    /**
     * Sets the excludeSaml property value. If true, the restriction isn't enforced for SAML applications in Microsoft Entra ID; else, the restriction is enforced for those applications.
     * @param bool|null $value Value to set for the excludeSaml property.
    */
    public function setExcludeSaml(?bool $value): void {
        $this->excludeSaml = $value;
    }

    /**
     * Sets the isStateSetByMicrosoft property value. If true, Microsoft sets the identifierUriRestriction state. If false, the tenant modifies the identifierUriRestriction state. Read-only.
     * @param bool|null $value Value to set for the isStateSetByMicrosoft property.
    */
    public function setIsStateSetByMicrosoft(?bool $value): void {
        $this->isStateSetByMicrosoft = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the restrictForAppsCreatedAfterDateTime property value. Specifies the date from which the policy restriction applies to newly created applications. For existing applications, the enforcement date can be retroactively applied.
     * @param DateTime|null $value Value to set for the restrictForAppsCreatedAfterDateTime property.
    */
    public function setRestrictForAppsCreatedAfterDateTime(?DateTime $value): void {
        $this->restrictForAppsCreatedAfterDateTime = $value;
    }

    /**
     * Sets the state property value. The state property
     * @param AppManagementRestrictionState|null $value Value to set for the state property.
    */
    public function setState(?AppManagementRestrictionState $value): void {
        $this->state = $value;
    }

}
