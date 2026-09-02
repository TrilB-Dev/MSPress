<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class AppliedConditionalAccessPolicy implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $displayName Refers to the name of the conditional access policy (example: 'Require MFA for Salesforce').
    */
    private ?string $displayName = null;
    
    /**
     * @var array<string>|null $enforcedGrantControls Refers to the grant controls enforced by the conditional access policy (example: 'Require multifactor authentication').
    */
    private ?array $enforcedGrantControls = null;
    
    /**
     * @var array<string>|null $enforcedSessionControls Refers to the session controls enforced by the conditional access policy (example: 'Require app enforced controls').
    */
    private ?array $enforcedSessionControls = null;
    
    /**
     * @var string|null $id An identifier of the conditional access policy. Supports $filter (eq).
    */
    private ?string $id = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var AppliedConditionalAccessPolicyResult|null $result Indicates the result of the CA policy that was triggered. The possible values are: success, failure, notApplied (policy isn't applied because policy conditions weren't met), notEnabled (This is due to the policy in a disabled state), unknown, unknownFutureValue, reportOnlySuccess, reportOnlyFailure, reportOnlyNotApplied, reportOnlyInterrupted. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: reportOnlySuccess, reportOnlyFailure, reportOnlyNotApplied, reportOnlyInterrupted.
    */
    private ?AppliedConditionalAccessPolicyResult $result = null;
    
    /**
     * Instantiates a new AppliedConditionalAccessPolicy and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AppliedConditionalAccessPolicy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AppliedConditionalAccessPolicy {
        return new AppliedConditionalAccessPolicy();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the displayName property value. Refers to the name of the conditional access policy (example: 'Require MFA for Salesforce').
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the enforcedGrantControls property value. Refers to the grant controls enforced by the conditional access policy (example: 'Require multifactor authentication').
     * @return array<string>|null
    */
    public function getEnforcedGrantControls(): ?array {
        return $this->enforcedGrantControls;
    }

    /**
     * Gets the enforcedSessionControls property value. Refers to the session controls enforced by the conditional access policy (example: 'Require app enforced controls').
     * @return array<string>|null
    */
    public function getEnforcedSessionControls(): ?array {
        return $this->enforcedSessionControls;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'enforcedGrantControls' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setEnforcedGrantControls($val);
            },
            'enforcedSessionControls' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setEnforcedSessionControls($val);
            },
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'result' => fn(ParseNode $n) => $o->setResult($n->getEnumValue(AppliedConditionalAccessPolicyResult::class)),
        ];
    }

    /**
     * Gets the id property value. An identifier of the conditional access policy. Supports $filter (eq).
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the result property value. Indicates the result of the CA policy that was triggered. The possible values are: success, failure, notApplied (policy isn't applied because policy conditions weren't met), notEnabled (This is due to the policy in a disabled state), unknown, unknownFutureValue, reportOnlySuccess, reportOnlyFailure, reportOnlyNotApplied, reportOnlyInterrupted. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: reportOnlySuccess, reportOnlyFailure, reportOnlyNotApplied, reportOnlyInterrupted.
     * @return AppliedConditionalAccessPolicyResult|null
    */
    public function getResult(): ?AppliedConditionalAccessPolicyResult {
        return $this->result;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfPrimitiveValues('enforcedGrantControls', $this->getEnforcedGrantControls());
        $writer->writeCollectionOfPrimitiveValues('enforcedSessionControls', $this->getEnforcedSessionControls());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('result', $this->getResult());
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
     * Sets the displayName property value. Refers to the name of the conditional access policy (example: 'Require MFA for Salesforce').
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the enforcedGrantControls property value. Refers to the grant controls enforced by the conditional access policy (example: 'Require multifactor authentication').
     * @param array<string>|null $value Value to set for the enforcedGrantControls property.
    */
    public function setEnforcedGrantControls(?array $value): void {
        $this->enforcedGrantControls = $value;
    }

    /**
     * Sets the enforcedSessionControls property value. Refers to the session controls enforced by the conditional access policy (example: 'Require app enforced controls').
     * @param array<string>|null $value Value to set for the enforcedSessionControls property.
    */
    public function setEnforcedSessionControls(?array $value): void {
        $this->enforcedSessionControls = $value;
    }

    /**
     * Sets the id property value. An identifier of the conditional access policy. Supports $filter (eq).
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the result property value. Indicates the result of the CA policy that was triggered. The possible values are: success, failure, notApplied (policy isn't applied because policy conditions weren't met), notEnabled (This is due to the policy in a disabled state), unknown, unknownFutureValue, reportOnlySuccess, reportOnlyFailure, reportOnlyNotApplied, reportOnlyInterrupted. Use the Prefer: include-unknown-enum-members request header to get the following values in this evolvable enum: reportOnlySuccess, reportOnlyFailure, reportOnlyNotApplied, reportOnlyInterrupted.
     * @param AppliedConditionalAccessPolicyResult|null $value Value to set for the result property.
    */
    public function setResult(?AppliedConditionalAccessPolicyResult $value): void {
        $this->result = $value;
    }

}
