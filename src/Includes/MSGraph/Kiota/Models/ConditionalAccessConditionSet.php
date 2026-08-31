<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ConditionalAccessConditionSet implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ConditionalAccessApplications|null $applications Applications and user actions included in and excluded from the policy. Required.
    */
    private ?ConditionalAccessApplications $applications = null;
    
    /**
     * @var ConditionalAccessAuthenticationFlows|null $authenticationFlows Authentication flows included in the policy scope.
    */
    private ?ConditionalAccessAuthenticationFlows $authenticationFlows = null;
    
    /**
     * @var ConditionalAccessClientApplications|null $clientApplications Client applications (service principals and workload identities) included in and excluded from the policy. Either users or clientApplications is required.
    */
    private ?ConditionalAccessClientApplications $clientApplications = null;
    
    /**
     * @var array<ConditionalAccessClientApp>|null $clientAppTypes Client application types included in the policy. The possible values are: all, browser, mobileAppsAndDesktopClients, exchangeActiveSync, easSupported, other. Required.  The easUnsupported enumeration member will be deprecated in favor of exchangeActiveSync, which includes EAS supported and unsupported platforms.
    */
    private ?array $clientAppTypes = null;
    
    /**
     * @var ConditionalAccessDevices|null $devices Devices in the policy.
    */
    private ?ConditionalAccessDevices $devices = null;
    
    /**
     * @var ConditionalAccessInsiderRiskLevels|null $insiderRiskLevels Insider risk levels included in the policy. The possible values are: minor, moderate, elevated, unknownFutureValue.
    */
    private ?ConditionalAccessInsiderRiskLevels $insiderRiskLevels = null;
    
    /**
     * @var ConditionalAccessLocations|null $locations Locations included in and excluded from the policy.
    */
    private ?ConditionalAccessLocations $locations = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var ConditionalAccessPlatforms|null $platforms Platforms included in and excluded from the policy.
    */
    private ?ConditionalAccessPlatforms $platforms = null;
    
    /**
     * @var array<RiskLevel>|null $servicePrincipalRiskLevels Service principal risk levels included in the policy. The possible values are: low, medium, high, none, unknownFutureValue.
    */
    private ?array $servicePrincipalRiskLevels = null;
    
    /**
     * @var array<RiskLevel>|null $signInRiskLevels Sign-in risk levels included in the policy. The possible values are: low, medium, high, hidden, none, unknownFutureValue. Required.
    */
    private ?array $signInRiskLevels = null;
    
    /**
     * @var array<RiskLevel>|null $userRiskLevels User risk levels included in the policy. The possible values are: low, medium, high, hidden, none, unknownFutureValue. Required.
    */
    private ?array $userRiskLevels = null;
    
    /**
     * @var ConditionalAccessUsers|null $users Users, groups, and roles included in and excluded from the policy. Either users or clientApplications is required.
    */
    private ?ConditionalAccessUsers $users = null;
    
    /**
     * Instantiates a new ConditionalAccessConditionSet and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConditionalAccessConditionSet
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConditionalAccessConditionSet {
        return new ConditionalAccessConditionSet();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the applications property value. Applications and user actions included in and excluded from the policy. Required.
     * @return ConditionalAccessApplications|null
    */
    public function getApplications(): ?ConditionalAccessApplications {
        return $this->applications;
    }

    /**
     * Gets the authenticationFlows property value. Authentication flows included in the policy scope.
     * @return ConditionalAccessAuthenticationFlows|null
    */
    public function getAuthenticationFlows(): ?ConditionalAccessAuthenticationFlows {
        return $this->authenticationFlows;
    }

    /**
     * Gets the clientApplications property value. Client applications (service principals and workload identities) included in and excluded from the policy. Either users or clientApplications is required.
     * @return ConditionalAccessClientApplications|null
    */
    public function getClientApplications(): ?ConditionalAccessClientApplications {
        return $this->clientApplications;
    }

    /**
     * Gets the clientAppTypes property value. Client application types included in the policy. The possible values are: all, browser, mobileAppsAndDesktopClients, exchangeActiveSync, easSupported, other. Required.  The easUnsupported enumeration member will be deprecated in favor of exchangeActiveSync, which includes EAS supported and unsupported platforms.
     * @return array<ConditionalAccessClientApp>|null
    */
    public function getClientAppTypes(): ?array {
        return $this->clientAppTypes;
    }

    /**
     * Gets the devices property value. Devices in the policy.
     * @return ConditionalAccessDevices|null
    */
    public function getDevices(): ?ConditionalAccessDevices {
        return $this->devices;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'applications' => fn(ParseNode $n) => $o->setApplications($n->getObjectValue([ConditionalAccessApplications::class, 'createFromDiscriminatorValue'])),
            'authenticationFlows' => fn(ParseNode $n) => $o->setAuthenticationFlows($n->getObjectValue([ConditionalAccessAuthenticationFlows::class, 'createFromDiscriminatorValue'])),
            'clientApplications' => fn(ParseNode $n) => $o->setClientApplications($n->getObjectValue([ConditionalAccessClientApplications::class, 'createFromDiscriminatorValue'])),
            'clientAppTypes' => fn(ParseNode $n) => $o->setClientAppTypes($n->getCollectionOfEnumValues(ConditionalAccessClientApp::class)),
            'devices' => fn(ParseNode $n) => $o->setDevices($n->getObjectValue([ConditionalAccessDevices::class, 'createFromDiscriminatorValue'])),
            'insiderRiskLevels' => fn(ParseNode $n) => $o->setInsiderRiskLevels($n->getEnumValue(ConditionalAccessInsiderRiskLevels::class)),
            'locations' => fn(ParseNode $n) => $o->setLocations($n->getObjectValue([ConditionalAccessLocations::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'platforms' => fn(ParseNode $n) => $o->setPlatforms($n->getObjectValue([ConditionalAccessPlatforms::class, 'createFromDiscriminatorValue'])),
            'servicePrincipalRiskLevels' => fn(ParseNode $n) => $o->setServicePrincipalRiskLevels($n->getCollectionOfEnumValues(RiskLevel::class)),
            'signInRiskLevels' => fn(ParseNode $n) => $o->setSignInRiskLevels($n->getCollectionOfEnumValues(RiskLevel::class)),
            'userRiskLevels' => fn(ParseNode $n) => $o->setUserRiskLevels($n->getCollectionOfEnumValues(RiskLevel::class)),
            'users' => fn(ParseNode $n) => $o->setUsers($n->getObjectValue([ConditionalAccessUsers::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the insiderRiskLevels property value. Insider risk levels included in the policy. The possible values are: minor, moderate, elevated, unknownFutureValue.
     * @return ConditionalAccessInsiderRiskLevels|null
    */
    public function getInsiderRiskLevels(): ?ConditionalAccessInsiderRiskLevels {
        return $this->insiderRiskLevels;
    }

    /**
     * Gets the locations property value. Locations included in and excluded from the policy.
     * @return ConditionalAccessLocations|null
    */
    public function getLocations(): ?ConditionalAccessLocations {
        return $this->locations;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the platforms property value. Platforms included in and excluded from the policy.
     * @return ConditionalAccessPlatforms|null
    */
    public function getPlatforms(): ?ConditionalAccessPlatforms {
        return $this->platforms;
    }

    /**
     * Gets the servicePrincipalRiskLevels property value. Service principal risk levels included in the policy. The possible values are: low, medium, high, none, unknownFutureValue.
     * @return array<RiskLevel>|null
    */
    public function getServicePrincipalRiskLevels(): ?array {
        return $this->servicePrincipalRiskLevels;
    }

    /**
     * Gets the signInRiskLevels property value. Sign-in risk levels included in the policy. The possible values are: low, medium, high, hidden, none, unknownFutureValue. Required.
     * @return array<RiskLevel>|null
    */
    public function getSignInRiskLevels(): ?array {
        return $this->signInRiskLevels;
    }

    /**
     * Gets the userRiskLevels property value. User risk levels included in the policy. The possible values are: low, medium, high, hidden, none, unknownFutureValue. Required.
     * @return array<RiskLevel>|null
    */
    public function getUserRiskLevels(): ?array {
        return $this->userRiskLevels;
    }

    /**
     * Gets the users property value. Users, groups, and roles included in and excluded from the policy. Either users or clientApplications is required.
     * @return ConditionalAccessUsers|null
    */
    public function getUsers(): ?ConditionalAccessUsers {
        return $this->users;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('applications', $this->getApplications());
        $writer->writeObjectValue('authenticationFlows', $this->getAuthenticationFlows());
        $writer->writeObjectValue('clientApplications', $this->getClientApplications());
        $writer->writeCollectionOfEnumValues('clientAppTypes', $this->getClientAppTypes());
        $writer->writeObjectValue('devices', $this->getDevices());
        $writer->writeEnumValue('insiderRiskLevels', $this->getInsiderRiskLevels());
        $writer->writeObjectValue('locations', $this->getLocations());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('platforms', $this->getPlatforms());
        $writer->writeCollectionOfEnumValues('servicePrincipalRiskLevels', $this->getServicePrincipalRiskLevels());
        $writer->writeCollectionOfEnumValues('signInRiskLevels', $this->getSignInRiskLevels());
        $writer->writeCollectionOfEnumValues('userRiskLevels', $this->getUserRiskLevels());
        $writer->writeObjectValue('users', $this->getUsers());
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
     * Sets the applications property value. Applications and user actions included in and excluded from the policy. Required.
     * @param ConditionalAccessApplications|null $value Value to set for the applications property.
    */
    public function setApplications(?ConditionalAccessApplications $value): void {
        $this->applications = $value;
    }

    /**
     * Sets the authenticationFlows property value. Authentication flows included in the policy scope.
     * @param ConditionalAccessAuthenticationFlows|null $value Value to set for the authenticationFlows property.
    */
    public function setAuthenticationFlows(?ConditionalAccessAuthenticationFlows $value): void {
        $this->authenticationFlows = $value;
    }

    /**
     * Sets the clientApplications property value. Client applications (service principals and workload identities) included in and excluded from the policy. Either users or clientApplications is required.
     * @param ConditionalAccessClientApplications|null $value Value to set for the clientApplications property.
    */
    public function setClientApplications(?ConditionalAccessClientApplications $value): void {
        $this->clientApplications = $value;
    }

    /**
     * Sets the clientAppTypes property value. Client application types included in the policy. The possible values are: all, browser, mobileAppsAndDesktopClients, exchangeActiveSync, easSupported, other. Required.  The easUnsupported enumeration member will be deprecated in favor of exchangeActiveSync, which includes EAS supported and unsupported platforms.
     * @param array<ConditionalAccessClientApp>|null $value Value to set for the clientAppTypes property.
    */
    public function setClientAppTypes(?array $value): void {
        $this->clientAppTypes = $value;
    }

    /**
     * Sets the devices property value. Devices in the policy.
     * @param ConditionalAccessDevices|null $value Value to set for the devices property.
    */
    public function setDevices(?ConditionalAccessDevices $value): void {
        $this->devices = $value;
    }

    /**
     * Sets the insiderRiskLevels property value. Insider risk levels included in the policy. The possible values are: minor, moderate, elevated, unknownFutureValue.
     * @param ConditionalAccessInsiderRiskLevels|null $value Value to set for the insiderRiskLevels property.
    */
    public function setInsiderRiskLevels(?ConditionalAccessInsiderRiskLevels $value): void {
        $this->insiderRiskLevels = $value;
    }

    /**
     * Sets the locations property value. Locations included in and excluded from the policy.
     * @param ConditionalAccessLocations|null $value Value to set for the locations property.
    */
    public function setLocations(?ConditionalAccessLocations $value): void {
        $this->locations = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the platforms property value. Platforms included in and excluded from the policy.
     * @param ConditionalAccessPlatforms|null $value Value to set for the platforms property.
    */
    public function setPlatforms(?ConditionalAccessPlatforms $value): void {
        $this->platforms = $value;
    }

    /**
     * Sets the servicePrincipalRiskLevels property value. Service principal risk levels included in the policy. The possible values are: low, medium, high, none, unknownFutureValue.
     * @param array<RiskLevel>|null $value Value to set for the servicePrincipalRiskLevels property.
    */
    public function setServicePrincipalRiskLevels(?array $value): void {
        $this->servicePrincipalRiskLevels = $value;
    }

    /**
     * Sets the signInRiskLevels property value. Sign-in risk levels included in the policy. The possible values are: low, medium, high, hidden, none, unknownFutureValue. Required.
     * @param array<RiskLevel>|null $value Value to set for the signInRiskLevels property.
    */
    public function setSignInRiskLevels(?array $value): void {
        $this->signInRiskLevels = $value;
    }

    /**
     * Sets the userRiskLevels property value. User risk levels included in the policy. The possible values are: low, medium, high, hidden, none, unknownFutureValue. Required.
     * @param array<RiskLevel>|null $value Value to set for the userRiskLevels property.
    */
    public function setUserRiskLevels(?array $value): void {
        $this->userRiskLevels = $value;
    }

    /**
     * Sets the users property value. Users, groups, and roles included in and excluded from the policy. Either users or clientApplications is required.
     * @param ConditionalAccessUsers|null $value Value to set for the users property.
    */
    public function setUsers(?ConditionalAccessUsers $value): void {
        $this->users = $value;
    }

}
