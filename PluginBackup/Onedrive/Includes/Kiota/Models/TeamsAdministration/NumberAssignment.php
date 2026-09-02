<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\TeamsAdministration;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Entity;

class NumberAssignment extends Entity implements Parsable 
{
    /**
     * @var ActivationState|null $activationState The activationState property
    */
    private ?ActivationState $activationState = null;
    
    /**
     * @var AssignmentCategory|null $assignmentCategory Contains the assignment category such as Primary or Private. The possible values are: primary, private, alternate, unknownFutureValue.
    */
    private ?AssignmentCategory $assignmentCategory = null;
    
    /**
     * @var AssignmentStatus|null $assignmentStatus The assignment status of the phone number. The possible values are: unassigned, internalError, userAssigned, conferenceAssigned, voiceApplicationAssigned, thirdPartyAppAssigned, policyAssigned, unknownFutureValue.
    */
    private ?AssignmentStatus $assignmentStatus = null;
    
    /**
     * @var string|null $assignmentTargetId The ID of the object the phone number is assigned to, either the ObjectId of a user or resource account, or the policy instance ID of a Teams shared calling routing policy instance.
    */
    private ?string $assignmentTargetId = null;
    
    /**
     * @var array<NumberCapability>|null $capabilities The list of capabilities assigned to the phone number.
    */
    private ?array $capabilities = null;
    
    /**
     * @var string|null $city The city where the phone number is located or associated with.
    */
    private ?string $city = null;
    
    /**
     * @var string|null $civicAddressId The ID of the civic address assigned to the phone number.
    */
    private ?string $civicAddressId = null;
    
    /**
     * @var string|null $isoCountryCode The ISO country code assigned to the phone number.
    */
    private ?string $isoCountryCode = null;
    
    /**
     * @var string|null $locationId The ID of the location assigned to the phone number.
    */
    private ?string $locationId = null;
    
    /**
     * @var string|null $networkSiteId This property is reserved for internal Microsoft use.
    */
    private ?string $networkSiteId = null;
    
    /**
     * @var NumberSource|null $numberSource The source of the phone number. online is used for phone numbers assigned in Microsoft 365, and onPremises is used for phone numbers assigned in AD on-premises, which are synchronized into Microsoft 365. The possible values are: online, onPremises, unknownFutureValue.
    */
    private ?NumberSource $numberSource = null;
    
    /**
     * @var NumberType|null $numberType The numberType property
    */
    private ?NumberType $numberType = null;
    
    /**
     * @var string|null $operatorId The ID of the operator.
    */
    private ?string $operatorId = null;
    
    /**
     * @var PortInStatus|null $portInStatus The status of any port in order covering the phone number. The possible values are: completed, firmOrderCommitmentAccepted, unknownFutureValue.
    */
    private ?PortInStatus $portInStatus = null;
    
    /**
     * @var array<ReverseNumberLookupOption>|null $reverseNumberLookupOptions Status of Reverse Number Lookup (RNL). If set to skipInternalVoip, calls are routed through the external Public Switched Telephone Network (PSTN) instead of using internal VoIP resolution.
    */
    private ?array $reverseNumberLookupOptions = null;
    
    /**
     * @var array<CustomerAction>|null $supportedCustomerActions Indicates what customer actions are available to modify the number.
    */
    private ?array $supportedCustomerActions = null;
    
    /**
     * @var string|null $telephoneNumber The telephone number in the record. The recorded telephone number is always displayed with a '+' prefix, regardless of whether it was originally assigned with one.
    */
    private ?string $telephoneNumber = null;
    
    /**
     * Instantiates a new NumberAssignment and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return NumberAssignment
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): NumberAssignment {
        return new NumberAssignment();
    }

    /**
     * Gets the activationState property value. The activationState property
     * @return ActivationState|null
    */
    public function getActivationState(): ?ActivationState {
        return $this->activationState;
    }

    /**
     * Gets the assignmentCategory property value. Contains the assignment category such as Primary or Private. The possible values are: primary, private, alternate, unknownFutureValue.
     * @return AssignmentCategory|null
    */
    public function getAssignmentCategory(): ?AssignmentCategory {
        return $this->assignmentCategory;
    }

    /**
     * Gets the assignmentStatus property value. The assignment status of the phone number. The possible values are: unassigned, internalError, userAssigned, conferenceAssigned, voiceApplicationAssigned, thirdPartyAppAssigned, policyAssigned, unknownFutureValue.
     * @return AssignmentStatus|null
    */
    public function getAssignmentStatus(): ?AssignmentStatus {
        return $this->assignmentStatus;
    }

    /**
     * Gets the assignmentTargetId property value. The ID of the object the phone number is assigned to, either the ObjectId of a user or resource account, or the policy instance ID of a Teams shared calling routing policy instance.
     * @return string|null
    */
    public function getAssignmentTargetId(): ?string {
        return $this->assignmentTargetId;
    }

    /**
     * Gets the capabilities property value. The list of capabilities assigned to the phone number.
     * @return array<NumberCapability>|null
    */
    public function getCapabilities(): ?array {
        return $this->capabilities;
    }

    /**
     * Gets the city property value. The city where the phone number is located or associated with.
     * @return string|null
    */
    public function getCity(): ?string {
        return $this->city;
    }

    /**
     * Gets the civicAddressId property value. The ID of the civic address assigned to the phone number.
     * @return string|null
    */
    public function getCivicAddressId(): ?string {
        return $this->civicAddressId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activationState' => fn(ParseNode $n) => $o->setActivationState($n->getEnumValue(ActivationState::class)),
            'assignmentCategory' => fn(ParseNode $n) => $o->setAssignmentCategory($n->getEnumValue(AssignmentCategory::class)),
            'assignmentStatus' => fn(ParseNode $n) => $o->setAssignmentStatus($n->getEnumValue(AssignmentStatus::class)),
            'assignmentTargetId' => fn(ParseNode $n) => $o->setAssignmentTargetId($n->getStringValue()),
            'capabilities' => fn(ParseNode $n) => $o->setCapabilities($n->getCollectionOfEnumValues(NumberCapability::class)),
            'city' => fn(ParseNode $n) => $o->setCity($n->getStringValue()),
            'civicAddressId' => fn(ParseNode $n) => $o->setCivicAddressId($n->getStringValue()),
            'isoCountryCode' => fn(ParseNode $n) => $o->setIsoCountryCode($n->getStringValue()),
            'locationId' => fn(ParseNode $n) => $o->setLocationId($n->getStringValue()),
            'networkSiteId' => fn(ParseNode $n) => $o->setNetworkSiteId($n->getStringValue()),
            'numberSource' => fn(ParseNode $n) => $o->setNumberSource($n->getEnumValue(NumberSource::class)),
            'numberType' => fn(ParseNode $n) => $o->setNumberType($n->getEnumValue(NumberType::class)),
            'operatorId' => fn(ParseNode $n) => $o->setOperatorId($n->getStringValue()),
            'portInStatus' => fn(ParseNode $n) => $o->setPortInStatus($n->getEnumValue(PortInStatus::class)),
            'reverseNumberLookupOptions' => fn(ParseNode $n) => $o->setReverseNumberLookupOptions($n->getCollectionOfEnumValues(ReverseNumberLookupOption::class)),
            'supportedCustomerActions' => fn(ParseNode $n) => $o->setSupportedCustomerActions($n->getCollectionOfEnumValues(CustomerAction::class)),
            'telephoneNumber' => fn(ParseNode $n) => $o->setTelephoneNumber($n->getStringValue()),
        ]);
    }

    /**
     * Gets the isoCountryCode property value. The ISO country code assigned to the phone number.
     * @return string|null
    */
    public function getIsoCountryCode(): ?string {
        return $this->isoCountryCode;
    }

    /**
     * Gets the locationId property value. The ID of the location assigned to the phone number.
     * @return string|null
    */
    public function getLocationId(): ?string {
        return $this->locationId;
    }

    /**
     * Gets the networkSiteId property value. This property is reserved for internal Microsoft use.
     * @return string|null
    */
    public function getNetworkSiteId(): ?string {
        return $this->networkSiteId;
    }

    /**
     * Gets the numberSource property value. The source of the phone number. online is used for phone numbers assigned in Microsoft 365, and onPremises is used for phone numbers assigned in AD on-premises, which are synchronized into Microsoft 365. The possible values are: online, onPremises, unknownFutureValue.
     * @return NumberSource|null
    */
    public function getNumberSource(): ?NumberSource {
        return $this->numberSource;
    }

    /**
     * Gets the numberType property value. The numberType property
     * @return NumberType|null
    */
    public function getNumberType(): ?NumberType {
        return $this->numberType;
    }

    /**
     * Gets the operatorId property value. The ID of the operator.
     * @return string|null
    */
    public function getOperatorId(): ?string {
        return $this->operatorId;
    }

    /**
     * Gets the portInStatus property value. The status of any port in order covering the phone number. The possible values are: completed, firmOrderCommitmentAccepted, unknownFutureValue.
     * @return PortInStatus|null
    */
    public function getPortInStatus(): ?PortInStatus {
        return $this->portInStatus;
    }

    /**
     * Gets the reverseNumberLookupOptions property value. Status of Reverse Number Lookup (RNL). If set to skipInternalVoip, calls are routed through the external Public Switched Telephone Network (PSTN) instead of using internal VoIP resolution.
     * @return array<ReverseNumberLookupOption>|null
    */
    public function getReverseNumberLookupOptions(): ?array {
        return $this->reverseNumberLookupOptions;
    }

    /**
     * Gets the supportedCustomerActions property value. Indicates what customer actions are available to modify the number.
     * @return array<CustomerAction>|null
    */
    public function getSupportedCustomerActions(): ?array {
        return $this->supportedCustomerActions;
    }

    /**
     * Gets the telephoneNumber property value. The telephone number in the record. The recorded telephone number is always displayed with a '+' prefix, regardless of whether it was originally assigned with one.
     * @return string|null
    */
    public function getTelephoneNumber(): ?string {
        return $this->telephoneNumber;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('activationState', $this->getActivationState());
        $writer->writeEnumValue('assignmentCategory', $this->getAssignmentCategory());
        $writer->writeEnumValue('assignmentStatus', $this->getAssignmentStatus());
        $writer->writeStringValue('assignmentTargetId', $this->getAssignmentTargetId());
        $writer->writeCollectionOfEnumValues('capabilities', $this->getCapabilities());
        $writer->writeStringValue('city', $this->getCity());
        $writer->writeStringValue('civicAddressId', $this->getCivicAddressId());
        $writer->writeStringValue('isoCountryCode', $this->getIsoCountryCode());
        $writer->writeStringValue('locationId', $this->getLocationId());
        $writer->writeStringValue('networkSiteId', $this->getNetworkSiteId());
        $writer->writeEnumValue('numberSource', $this->getNumberSource());
        $writer->writeEnumValue('numberType', $this->getNumberType());
        $writer->writeStringValue('operatorId', $this->getOperatorId());
        $writer->writeEnumValue('portInStatus', $this->getPortInStatus());
        $writer->writeCollectionOfEnumValues('reverseNumberLookupOptions', $this->getReverseNumberLookupOptions());
        $writer->writeCollectionOfEnumValues('supportedCustomerActions', $this->getSupportedCustomerActions());
        $writer->writeStringValue('telephoneNumber', $this->getTelephoneNumber());
    }

    /**
     * Sets the activationState property value. The activationState property
     * @param ActivationState|null $value Value to set for the activationState property.
    */
    public function setActivationState(?ActivationState $value): void {
        $this->activationState = $value;
    }

    /**
     * Sets the assignmentCategory property value. Contains the assignment category such as Primary or Private. The possible values are: primary, private, alternate, unknownFutureValue.
     * @param AssignmentCategory|null $value Value to set for the assignmentCategory property.
    */
    public function setAssignmentCategory(?AssignmentCategory $value): void {
        $this->assignmentCategory = $value;
    }

    /**
     * Sets the assignmentStatus property value. The assignment status of the phone number. The possible values are: unassigned, internalError, userAssigned, conferenceAssigned, voiceApplicationAssigned, thirdPartyAppAssigned, policyAssigned, unknownFutureValue.
     * @param AssignmentStatus|null $value Value to set for the assignmentStatus property.
    */
    public function setAssignmentStatus(?AssignmentStatus $value): void {
        $this->assignmentStatus = $value;
    }

    /**
     * Sets the assignmentTargetId property value. The ID of the object the phone number is assigned to, either the ObjectId of a user or resource account, or the policy instance ID of a Teams shared calling routing policy instance.
     * @param string|null $value Value to set for the assignmentTargetId property.
    */
    public function setAssignmentTargetId(?string $value): void {
        $this->assignmentTargetId = $value;
    }

    /**
     * Sets the capabilities property value. The list of capabilities assigned to the phone number.
     * @param array<NumberCapability>|null $value Value to set for the capabilities property.
    */
    public function setCapabilities(?array $value): void {
        $this->capabilities = $value;
    }

    /**
     * Sets the city property value. The city where the phone number is located or associated with.
     * @param string|null $value Value to set for the city property.
    */
    public function setCity(?string $value): void {
        $this->city = $value;
    }

    /**
     * Sets the civicAddressId property value. The ID of the civic address assigned to the phone number.
     * @param string|null $value Value to set for the civicAddressId property.
    */
    public function setCivicAddressId(?string $value): void {
        $this->civicAddressId = $value;
    }

    /**
     * Sets the isoCountryCode property value. The ISO country code assigned to the phone number.
     * @param string|null $value Value to set for the isoCountryCode property.
    */
    public function setIsoCountryCode(?string $value): void {
        $this->isoCountryCode = $value;
    }

    /**
     * Sets the locationId property value. The ID of the location assigned to the phone number.
     * @param string|null $value Value to set for the locationId property.
    */
    public function setLocationId(?string $value): void {
        $this->locationId = $value;
    }

    /**
     * Sets the networkSiteId property value. This property is reserved for internal Microsoft use.
     * @param string|null $value Value to set for the networkSiteId property.
    */
    public function setNetworkSiteId(?string $value): void {
        $this->networkSiteId = $value;
    }

    /**
     * Sets the numberSource property value. The source of the phone number. online is used for phone numbers assigned in Microsoft 365, and onPremises is used for phone numbers assigned in AD on-premises, which are synchronized into Microsoft 365. The possible values are: online, onPremises, unknownFutureValue.
     * @param NumberSource|null $value Value to set for the numberSource property.
    */
    public function setNumberSource(?NumberSource $value): void {
        $this->numberSource = $value;
    }

    /**
     * Sets the numberType property value. The numberType property
     * @param NumberType|null $value Value to set for the numberType property.
    */
    public function setNumberType(?NumberType $value): void {
        $this->numberType = $value;
    }

    /**
     * Sets the operatorId property value. The ID of the operator.
     * @param string|null $value Value to set for the operatorId property.
    */
    public function setOperatorId(?string $value): void {
        $this->operatorId = $value;
    }

    /**
     * Sets the portInStatus property value. The status of any port in order covering the phone number. The possible values are: completed, firmOrderCommitmentAccepted, unknownFutureValue.
     * @param PortInStatus|null $value Value to set for the portInStatus property.
    */
    public function setPortInStatus(?PortInStatus $value): void {
        $this->portInStatus = $value;
    }

    /**
     * Sets the reverseNumberLookupOptions property value. Status of Reverse Number Lookup (RNL). If set to skipInternalVoip, calls are routed through the external Public Switched Telephone Network (PSTN) instead of using internal VoIP resolution.
     * @param array<ReverseNumberLookupOption>|null $value Value to set for the reverseNumberLookupOptions property.
    */
    public function setReverseNumberLookupOptions(?array $value): void {
        $this->reverseNumberLookupOptions = $value;
    }

    /**
     * Sets the supportedCustomerActions property value. Indicates what customer actions are available to modify the number.
     * @param array<CustomerAction>|null $value Value to set for the supportedCustomerActions property.
    */
    public function setSupportedCustomerActions(?array $value): void {
        $this->supportedCustomerActions = $value;
    }

    /**
     * Sets the telephoneNumber property value. The telephone number in the record. The recorded telephone number is always displayed with a '+' prefix, regardless of whether it was originally assigned with one.
     * @param string|null $value Value to set for the telephoneNumber property.
    */
    public function setTelephoneNumber(?string $value): void {
        $this->telephoneNumber = $value;
    }

}
