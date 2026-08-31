<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class SignIn extends Entity implements Parsable 
{
    /**
     * @var string|null $appDisplayName App name displayed in the Microsoft Entra admin center.  Supports $filter (eq, startsWith).
    */
    private ?string $appDisplayName = null;
    
    /**
     * @var string|null $appId Unique GUID that represents the app ID in the Microsoft Entra ID.  Supports $filter (eq).
    */
    private ?string $appId = null;
    
    /**
     * @var array<AppliedConditionalAccessPolicy>|null $appliedConditionalAccessPolicies Provides a list of conditional access policies that the corresponding sign-in activity triggers. Apps need more Conditional Access-related privileges to read the details of this property. For more information, see Permissions for viewing applied conditional access (CA) policies in sign-ins.
    */
    private ?array $appliedConditionalAccessPolicies = null;
    
    /**
     * @var AuthenticationAppDeviceDetails|null $authenticationAppDeviceDetails The authenticationAppDeviceDetails property
    */
    private ?AuthenticationAppDeviceDetails $authenticationAppDeviceDetails = null;
    
    /**
     * @var string|null $clientAppUsed Identifies the client used for the sign-in activity. Modern authentication clients include Browser, modern clients. Legacy authentication clients include Exchange ActiveSync, IMAP, MAPI, SMTP, POP, and other clients.  Supports $filter (eq).
    */
    private ?string $clientAppUsed = null;
    
    /**
     * @var ConditionalAccessStatus|null $conditionalAccessStatus Reports status of an activated conditional access policy. The possible values are: success, failure, notApplied, and unknownFutureValue.  Supports $filter (eq).
    */
    private ?ConditionalAccessStatus $conditionalAccessStatus = null;
    
    /**
     * @var string|null $correlationId The request ID sent from the client when the sign-in is initiated. Used to troubleshoot sign-in activity.  Supports $filter (eq).
    */
    private ?string $correlationId = null;
    
    /**
     * @var DateTime|null $createdDateTime Date and time (UTC) the sign-in was initiated. Example: midnight on Jan 1, 2014 is reported as 2014-01-01T00:00:00Z.  Supports $orderby, $filter (eq, le, and ge).
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var DeviceDetail|null $deviceDetail Device information from where the sign-in occurred; includes device ID, operating system, and browser.  Supports $filter (eq, startsWith) on browser and operatingSytem properties.
    */
    private ?DeviceDetail $deviceDetail = null;
    
    /**
     * @var string|null $homeTenantId The homeTenantId property
    */
    private ?string $homeTenantId = null;
    
    /**
     * @var string|null $ipAddress IP address of the client used to sign in.  Supports $filter (eq, startsWith).
    */
    private ?string $ipAddress = null;
    
    /**
     * @var bool|null $isInteractive Indicates whether a sign-in is interactive.
    */
    private ?bool $isInteractive = null;
    
    /**
     * @var SignInLocation|null $location Provides the city, state, and country code where the sign-in originated.  Supports $filter (eq, startsWith) on city, state, and countryOrRegion properties.
    */
    private ?SignInLocation $location = null;
    
    /**
     * @var string|null $resourceDisplayName Name of the resource the user signed into.  Supports $filter (eq).
    */
    private ?string $resourceDisplayName = null;
    
    /**
     * @var string|null $resourceId ID of the resource that the user signed into.  Supports $filter (eq).
    */
    private ?string $resourceId = null;
    
    /**
     * @var string|null $resourceTenantId The resourceTenantId property
    */
    private ?string $resourceTenantId = null;
    
    /**
     * @var RiskDetail|null $riskDetail The reason behind a specific state of a risky user, sign-in, or a risk event. The value none means that Microsoft Entra risk detection did not flag the user or the sign-in as a risky event so far.  Supports $filter (eq). Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
    */
    private ?RiskDetail $riskDetail = null;
    
    /**
     * @var array<RiskEventType>|null $riskEventTypes The riskEventTypes property
    */
    private ?array $riskEventTypes = null;
    
    /**
     * @var array<string>|null $riskEventTypes_v2 The list of risk event types associated with the sign-in. Possible values: unlikelyTravel, anonymizedIPAddress, maliciousIPAddress, unfamiliarFeatures, malwareInfectedIPAddress, suspiciousIPAddress, leakedCredentials, investigationsThreatIntelligence, generic, or unknownFutureValue.  Supports $filter (eq, startsWith).
    */
    private ?array $riskEventTypes_v2 = null;
    
    /**
     * @var RiskLevel|null $riskLevelAggregated Aggregated risk level. The possible values are: none, low, medium, high, hidden, and unknownFutureValue. The value hidden means the user or sign-in wasn't enabled for Microsoft Entra ID Protection.  Supports $filter (eq).  Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
    */
    private ?RiskLevel $riskLevelAggregated = null;
    
    /**
     * @var RiskLevel|null $riskLevelDuringSignIn Risk level during sign-in. The possible values are: none, low, medium, high, hidden, and unknownFutureValue. The value hidden means the user or sign-in wasn't enabled for Microsoft Entra ID Protection.  Supports $filter (eq). Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
    */
    private ?RiskLevel $riskLevelDuringSignIn = null;
    
    /**
     * @var RiskState|null $riskState Reports status of the risky user, sign-in, or a risk event. The possible values are: none, confirmedSafe, remediated, dismissed, atRisk, confirmedCompromised, unknownFutureValue.  Supports $filter (eq).
    */
    private ?RiskState $riskState = null;
    
    /**
     * @var string|null $servicePrincipalId The servicePrincipalId property
    */
    private ?string $servicePrincipalId = null;
    
    /**
     * @var string|null $servicePrincipalName The servicePrincipalName property
    */
    private ?string $servicePrincipalName = null;
    
    /**
     * @var SignInStatus|null $status Sign-in status. Includes the error code and description of the error (if a sign-in failure occurs).  Supports $filter (eq) on errorCode property.
    */
    private ?SignInStatus $status = null;
    
    /**
     * @var string|null $userAgent The userAgent property
    */
    private ?string $userAgent = null;
    
    /**
     * @var string|null $userDisplayName Display name of the user that initiated the sign-in.  Supports $filter (eq, startsWith).
    */
    private ?string $userDisplayName = null;
    
    /**
     * @var string|null $userId ID of the user that initiated the sign-in.  Supports $filter (eq).
    */
    private ?string $userId = null;
    
    /**
     * @var string|null $userPrincipalName User principal name of the user that initiated the sign-in. This value is always in lowercase. For guest users whose values in the user object typically contain #EXT# before the domain part, this property stores the value in both lowercase and the 'true' format. For example, while the user object stores AdeleVance_fabrikam.com#EXT#@contoso.com, the sign-in logs store adelevance@fabrikam.com. Supports $filter (eq, startsWith).
    */
    private ?string $userPrincipalName = null;
    
    /**
     * Instantiates a new SignIn and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SignIn
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SignIn {
        return new SignIn();
    }

    /**
     * Gets the appDisplayName property value. App name displayed in the Microsoft Entra admin center.  Supports $filter (eq, startsWith).
     * @return string|null
    */
    public function getAppDisplayName(): ?string {
        return $this->appDisplayName;
    }

    /**
     * Gets the appId property value. Unique GUID that represents the app ID in the Microsoft Entra ID.  Supports $filter (eq).
     * @return string|null
    */
    public function getAppId(): ?string {
        return $this->appId;
    }

    /**
     * Gets the appliedConditionalAccessPolicies property value. Provides a list of conditional access policies that the corresponding sign-in activity triggers. Apps need more Conditional Access-related privileges to read the details of this property. For more information, see Permissions for viewing applied conditional access (CA) policies in sign-ins.
     * @return array<AppliedConditionalAccessPolicy>|null
    */
    public function getAppliedConditionalAccessPolicies(): ?array {
        return $this->appliedConditionalAccessPolicies;
    }

    /**
     * Gets the authenticationAppDeviceDetails property value. The authenticationAppDeviceDetails property
     * @return AuthenticationAppDeviceDetails|null
    */
    public function getAuthenticationAppDeviceDetails(): ?AuthenticationAppDeviceDetails {
        return $this->authenticationAppDeviceDetails;
    }

    /**
     * Gets the clientAppUsed property value. Identifies the client used for the sign-in activity. Modern authentication clients include Browser, modern clients. Legacy authentication clients include Exchange ActiveSync, IMAP, MAPI, SMTP, POP, and other clients.  Supports $filter (eq).
     * @return string|null
    */
    public function getClientAppUsed(): ?string {
        return $this->clientAppUsed;
    }

    /**
     * Gets the conditionalAccessStatus property value. Reports status of an activated conditional access policy. The possible values are: success, failure, notApplied, and unknownFutureValue.  Supports $filter (eq).
     * @return ConditionalAccessStatus|null
    */
    public function getConditionalAccessStatus(): ?ConditionalAccessStatus {
        return $this->conditionalAccessStatus;
    }

    /**
     * Gets the correlationId property value. The request ID sent from the client when the sign-in is initiated. Used to troubleshoot sign-in activity.  Supports $filter (eq).
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the createdDateTime property value. Date and time (UTC) the sign-in was initiated. Example: midnight on Jan 1, 2014 is reported as 2014-01-01T00:00:00Z.  Supports $orderby, $filter (eq, le, and ge).
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the deviceDetail property value. Device information from where the sign-in occurred; includes device ID, operating system, and browser.  Supports $filter (eq, startsWith) on browser and operatingSytem properties.
     * @return DeviceDetail|null
    */
    public function getDeviceDetail(): ?DeviceDetail {
        return $this->deviceDetail;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'appDisplayName' => fn(ParseNode $n) => $o->setAppDisplayName($n->getStringValue()),
            'appId' => fn(ParseNode $n) => $o->setAppId($n->getStringValue()),
            'appliedConditionalAccessPolicies' => fn(ParseNode $n) => $o->setAppliedConditionalAccessPolicies($n->getCollectionOfObjectValues([AppliedConditionalAccessPolicy::class, 'createFromDiscriminatorValue'])),
            'authenticationAppDeviceDetails' => fn(ParseNode $n) => $o->setAuthenticationAppDeviceDetails($n->getObjectValue([AuthenticationAppDeviceDetails::class, 'createFromDiscriminatorValue'])),
            'clientAppUsed' => fn(ParseNode $n) => $o->setClientAppUsed($n->getStringValue()),
            'conditionalAccessStatus' => fn(ParseNode $n) => $o->setConditionalAccessStatus($n->getEnumValue(ConditionalAccessStatus::class)),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'deviceDetail' => fn(ParseNode $n) => $o->setDeviceDetail($n->getObjectValue([DeviceDetail::class, 'createFromDiscriminatorValue'])),
            'homeTenantId' => fn(ParseNode $n) => $o->setHomeTenantId($n->getStringValue()),
            'ipAddress' => fn(ParseNode $n) => $o->setIpAddress($n->getStringValue()),
            'isInteractive' => fn(ParseNode $n) => $o->setIsInteractive($n->getBooleanValue()),
            'location' => fn(ParseNode $n) => $o->setLocation($n->getObjectValue([SignInLocation::class, 'createFromDiscriminatorValue'])),
            'resourceDisplayName' => fn(ParseNode $n) => $o->setResourceDisplayName($n->getStringValue()),
            'resourceId' => fn(ParseNode $n) => $o->setResourceId($n->getStringValue()),
            'resourceTenantId' => fn(ParseNode $n) => $o->setResourceTenantId($n->getStringValue()),
            'riskDetail' => fn(ParseNode $n) => $o->setRiskDetail($n->getEnumValue(RiskDetail::class)),
            'riskEventTypes' => fn(ParseNode $n) => $o->setRiskEventTypes($n->getCollectionOfEnumValues(RiskEventType::class)),
            'riskEventTypes_v2' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setRiskEventTypesV2($val);
            },
            'riskLevelAggregated' => fn(ParseNode $n) => $o->setRiskLevelAggregated($n->getEnumValue(RiskLevel::class)),
            'riskLevelDuringSignIn' => fn(ParseNode $n) => $o->setRiskLevelDuringSignIn($n->getEnumValue(RiskLevel::class)),
            'riskState' => fn(ParseNode $n) => $o->setRiskState($n->getEnumValue(RiskState::class)),
            'servicePrincipalId' => fn(ParseNode $n) => $o->setServicePrincipalId($n->getStringValue()),
            'servicePrincipalName' => fn(ParseNode $n) => $o->setServicePrincipalName($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getObjectValue([SignInStatus::class, 'createFromDiscriminatorValue'])),
            'userAgent' => fn(ParseNode $n) => $o->setUserAgent($n->getStringValue()),
            'userDisplayName' => fn(ParseNode $n) => $o->setUserDisplayName($n->getStringValue()),
            'userId' => fn(ParseNode $n) => $o->setUserId($n->getStringValue()),
            'userPrincipalName' => fn(ParseNode $n) => $o->setUserPrincipalName($n->getStringValue()),
        ]);
    }

    /**
     * Gets the homeTenantId property value. The homeTenantId property
     * @return string|null
    */
    public function getHomeTenantId(): ?string {
        return $this->homeTenantId;
    }

    /**
     * Gets the ipAddress property value. IP address of the client used to sign in.  Supports $filter (eq, startsWith).
     * @return string|null
    */
    public function getIpAddress(): ?string {
        return $this->ipAddress;
    }

    /**
     * Gets the isInteractive property value. Indicates whether a sign-in is interactive.
     * @return bool|null
    */
    public function getIsInteractive(): ?bool {
        return $this->isInteractive;
    }

    /**
     * Gets the location property value. Provides the city, state, and country code where the sign-in originated.  Supports $filter (eq, startsWith) on city, state, and countryOrRegion properties.
     * @return SignInLocation|null
    */
    public function getLocation(): ?SignInLocation {
        return $this->location;
    }

    /**
     * Gets the resourceDisplayName property value. Name of the resource the user signed into.  Supports $filter (eq).
     * @return string|null
    */
    public function getResourceDisplayName(): ?string {
        return $this->resourceDisplayName;
    }

    /**
     * Gets the resourceId property value. ID of the resource that the user signed into.  Supports $filter (eq).
     * @return string|null
    */
    public function getResourceId(): ?string {
        return $this->resourceId;
    }

    /**
     * Gets the resourceTenantId property value. The resourceTenantId property
     * @return string|null
    */
    public function getResourceTenantId(): ?string {
        return $this->resourceTenantId;
    }

    /**
     * Gets the riskDetail property value. The reason behind a specific state of a risky user, sign-in, or a risk event. The value none means that Microsoft Entra risk detection did not flag the user or the sign-in as a risky event so far.  Supports $filter (eq). Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
     * @return RiskDetail|null
    */
    public function getRiskDetail(): ?RiskDetail {
        return $this->riskDetail;
    }

    /**
     * Gets the riskEventTypes property value. The riskEventTypes property
     * @return array<RiskEventType>|null
    */
    public function getRiskEventTypes(): ?array {
        return $this->riskEventTypes;
    }

    /**
     * Gets the riskEventTypes_v2 property value. The list of risk event types associated with the sign-in. Possible values: unlikelyTravel, anonymizedIPAddress, maliciousIPAddress, unfamiliarFeatures, malwareInfectedIPAddress, suspiciousIPAddress, leakedCredentials, investigationsThreatIntelligence, generic, or unknownFutureValue.  Supports $filter (eq, startsWith).
     * @return array<string>|null
    */
    public function getRiskEventTypesV2(): ?array {
        return $this->riskEventTypes_v2;
    }

    /**
     * Gets the riskLevelAggregated property value. Aggregated risk level. The possible values are: none, low, medium, high, hidden, and unknownFutureValue. The value hidden means the user or sign-in wasn't enabled for Microsoft Entra ID Protection.  Supports $filter (eq).  Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
     * @return RiskLevel|null
    */
    public function getRiskLevelAggregated(): ?RiskLevel {
        return $this->riskLevelAggregated;
    }

    /**
     * Gets the riskLevelDuringSignIn property value. Risk level during sign-in. The possible values are: none, low, medium, high, hidden, and unknownFutureValue. The value hidden means the user or sign-in wasn't enabled for Microsoft Entra ID Protection.  Supports $filter (eq). Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
     * @return RiskLevel|null
    */
    public function getRiskLevelDuringSignIn(): ?RiskLevel {
        return $this->riskLevelDuringSignIn;
    }

    /**
     * Gets the riskState property value. Reports status of the risky user, sign-in, or a risk event. The possible values are: none, confirmedSafe, remediated, dismissed, atRisk, confirmedCompromised, unknownFutureValue.  Supports $filter (eq).
     * @return RiskState|null
    */
    public function getRiskState(): ?RiskState {
        return $this->riskState;
    }

    /**
     * Gets the servicePrincipalId property value. The servicePrincipalId property
     * @return string|null
    */
    public function getServicePrincipalId(): ?string {
        return $this->servicePrincipalId;
    }

    /**
     * Gets the servicePrincipalName property value. The servicePrincipalName property
     * @return string|null
    */
    public function getServicePrincipalName(): ?string {
        return $this->servicePrincipalName;
    }

    /**
     * Gets the status property value. Sign-in status. Includes the error code and description of the error (if a sign-in failure occurs).  Supports $filter (eq) on errorCode property.
     * @return SignInStatus|null
    */
    public function getStatus(): ?SignInStatus {
        return $this->status;
    }

    /**
     * Gets the userAgent property value. The userAgent property
     * @return string|null
    */
    public function getUserAgent(): ?string {
        return $this->userAgent;
    }

    /**
     * Gets the userDisplayName property value. Display name of the user that initiated the sign-in.  Supports $filter (eq, startsWith).
     * @return string|null
    */
    public function getUserDisplayName(): ?string {
        return $this->userDisplayName;
    }

    /**
     * Gets the userId property value. ID of the user that initiated the sign-in.  Supports $filter (eq).
     * @return string|null
    */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * Gets the userPrincipalName property value. User principal name of the user that initiated the sign-in. This value is always in lowercase. For guest users whose values in the user object typically contain #EXT# before the domain part, this property stores the value in both lowercase and the 'true' format. For example, while the user object stores AdeleVance_fabrikam.com#EXT#@contoso.com, the sign-in logs store adelevance@fabrikam.com. Supports $filter (eq, startsWith).
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
        $writer->writeStringValue('appDisplayName', $this->getAppDisplayName());
        $writer->writeStringValue('appId', $this->getAppId());
        $writer->writeCollectionOfObjectValues('appliedConditionalAccessPolicies', $this->getAppliedConditionalAccessPolicies());
        $writer->writeObjectValue('authenticationAppDeviceDetails', $this->getAuthenticationAppDeviceDetails());
        $writer->writeStringValue('clientAppUsed', $this->getClientAppUsed());
        $writer->writeEnumValue('conditionalAccessStatus', $this->getConditionalAccessStatus());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeObjectValue('deviceDetail', $this->getDeviceDetail());
        $writer->writeStringValue('homeTenantId', $this->getHomeTenantId());
        $writer->writeStringValue('ipAddress', $this->getIpAddress());
        $writer->writeBooleanValue('isInteractive', $this->getIsInteractive());
        $writer->writeObjectValue('location', $this->getLocation());
        $writer->writeStringValue('resourceDisplayName', $this->getResourceDisplayName());
        $writer->writeStringValue('resourceId', $this->getResourceId());
        $writer->writeStringValue('resourceTenantId', $this->getResourceTenantId());
        $writer->writeEnumValue('riskDetail', $this->getRiskDetail());
        $writer->writeCollectionOfEnumValues('riskEventTypes', $this->getRiskEventTypes());
        $writer->writeCollectionOfPrimitiveValues('riskEventTypes_v2', $this->getRiskEventTypesV2());
        $writer->writeEnumValue('riskLevelAggregated', $this->getRiskLevelAggregated());
        $writer->writeEnumValue('riskLevelDuringSignIn', $this->getRiskLevelDuringSignIn());
        $writer->writeEnumValue('riskState', $this->getRiskState());
        $writer->writeStringValue('servicePrincipalId', $this->getServicePrincipalId());
        $writer->writeStringValue('servicePrincipalName', $this->getServicePrincipalName());
        $writer->writeObjectValue('status', $this->getStatus());
        $writer->writeStringValue('userAgent', $this->getUserAgent());
        $writer->writeStringValue('userDisplayName', $this->getUserDisplayName());
        $writer->writeStringValue('userId', $this->getUserId());
        $writer->writeStringValue('userPrincipalName', $this->getUserPrincipalName());
    }

    /**
     * Sets the appDisplayName property value. App name displayed in the Microsoft Entra admin center.  Supports $filter (eq, startsWith).
     * @param string|null $value Value to set for the appDisplayName property.
    */
    public function setAppDisplayName(?string $value): void {
        $this->appDisplayName = $value;
    }

    /**
     * Sets the appId property value. Unique GUID that represents the app ID in the Microsoft Entra ID.  Supports $filter (eq).
     * @param string|null $value Value to set for the appId property.
    */
    public function setAppId(?string $value): void {
        $this->appId = $value;
    }

    /**
     * Sets the appliedConditionalAccessPolicies property value. Provides a list of conditional access policies that the corresponding sign-in activity triggers. Apps need more Conditional Access-related privileges to read the details of this property. For more information, see Permissions for viewing applied conditional access (CA) policies in sign-ins.
     * @param array<AppliedConditionalAccessPolicy>|null $value Value to set for the appliedConditionalAccessPolicies property.
    */
    public function setAppliedConditionalAccessPolicies(?array $value): void {
        $this->appliedConditionalAccessPolicies = $value;
    }

    /**
     * Sets the authenticationAppDeviceDetails property value. The authenticationAppDeviceDetails property
     * @param AuthenticationAppDeviceDetails|null $value Value to set for the authenticationAppDeviceDetails property.
    */
    public function setAuthenticationAppDeviceDetails(?AuthenticationAppDeviceDetails $value): void {
        $this->authenticationAppDeviceDetails = $value;
    }

    /**
     * Sets the clientAppUsed property value. Identifies the client used for the sign-in activity. Modern authentication clients include Browser, modern clients. Legacy authentication clients include Exchange ActiveSync, IMAP, MAPI, SMTP, POP, and other clients.  Supports $filter (eq).
     * @param string|null $value Value to set for the clientAppUsed property.
    */
    public function setClientAppUsed(?string $value): void {
        $this->clientAppUsed = $value;
    }

    /**
     * Sets the conditionalAccessStatus property value. Reports status of an activated conditional access policy. The possible values are: success, failure, notApplied, and unknownFutureValue.  Supports $filter (eq).
     * @param ConditionalAccessStatus|null $value Value to set for the conditionalAccessStatus property.
    */
    public function setConditionalAccessStatus(?ConditionalAccessStatus $value): void {
        $this->conditionalAccessStatus = $value;
    }

    /**
     * Sets the correlationId property value. The request ID sent from the client when the sign-in is initiated. Used to troubleshoot sign-in activity.  Supports $filter (eq).
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the createdDateTime property value. Date and time (UTC) the sign-in was initiated. Example: midnight on Jan 1, 2014 is reported as 2014-01-01T00:00:00Z.  Supports $orderby, $filter (eq, le, and ge).
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the deviceDetail property value. Device information from where the sign-in occurred; includes device ID, operating system, and browser.  Supports $filter (eq, startsWith) on browser and operatingSytem properties.
     * @param DeviceDetail|null $value Value to set for the deviceDetail property.
    */
    public function setDeviceDetail(?DeviceDetail $value): void {
        $this->deviceDetail = $value;
    }

    /**
     * Sets the homeTenantId property value. The homeTenantId property
     * @param string|null $value Value to set for the homeTenantId property.
    */
    public function setHomeTenantId(?string $value): void {
        $this->homeTenantId = $value;
    }

    /**
     * Sets the ipAddress property value. IP address of the client used to sign in.  Supports $filter (eq, startsWith).
     * @param string|null $value Value to set for the ipAddress property.
    */
    public function setIpAddress(?string $value): void {
        $this->ipAddress = $value;
    }

    /**
     * Sets the isInteractive property value. Indicates whether a sign-in is interactive.
     * @param bool|null $value Value to set for the isInteractive property.
    */
    public function setIsInteractive(?bool $value): void {
        $this->isInteractive = $value;
    }

    /**
     * Sets the location property value. Provides the city, state, and country code where the sign-in originated.  Supports $filter (eq, startsWith) on city, state, and countryOrRegion properties.
     * @param SignInLocation|null $value Value to set for the location property.
    */
    public function setLocation(?SignInLocation $value): void {
        $this->location = $value;
    }

    /**
     * Sets the resourceDisplayName property value. Name of the resource the user signed into.  Supports $filter (eq).
     * @param string|null $value Value to set for the resourceDisplayName property.
    */
    public function setResourceDisplayName(?string $value): void {
        $this->resourceDisplayName = $value;
    }

    /**
     * Sets the resourceId property value. ID of the resource that the user signed into.  Supports $filter (eq).
     * @param string|null $value Value to set for the resourceId property.
    */
    public function setResourceId(?string $value): void {
        $this->resourceId = $value;
    }

    /**
     * Sets the resourceTenantId property value. The resourceTenantId property
     * @param string|null $value Value to set for the resourceTenantId property.
    */
    public function setResourceTenantId(?string $value): void {
        $this->resourceTenantId = $value;
    }

    /**
     * Sets the riskDetail property value. The reason behind a specific state of a risky user, sign-in, or a risk event. The value none means that Microsoft Entra risk detection did not flag the user or the sign-in as a risky event so far.  Supports $filter (eq). Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
     * @param RiskDetail|null $value Value to set for the riskDetail property.
    */
    public function setRiskDetail(?RiskDetail $value): void {
        $this->riskDetail = $value;
    }

    /**
     * Sets the riskEventTypes property value. The riskEventTypes property
     * @param array<RiskEventType>|null $value Value to set for the riskEventTypes property.
    */
    public function setRiskEventTypes(?array $value): void {
        $this->riskEventTypes = $value;
    }

    /**
     * Sets the riskEventTypes_v2 property value. The list of risk event types associated with the sign-in. Possible values: unlikelyTravel, anonymizedIPAddress, maliciousIPAddress, unfamiliarFeatures, malwareInfectedIPAddress, suspiciousIPAddress, leakedCredentials, investigationsThreatIntelligence, generic, or unknownFutureValue.  Supports $filter (eq, startsWith).
     * @param array<string>|null $value Value to set for the riskEventTypes_v2 property.
    */
    public function setRiskEventTypesV2(?array $value): void {
        $this->riskEventTypes_v2 = $value;
    }

    /**
     * Sets the riskLevelAggregated property value. Aggregated risk level. The possible values are: none, low, medium, high, hidden, and unknownFutureValue. The value hidden means the user or sign-in wasn't enabled for Microsoft Entra ID Protection.  Supports $filter (eq).  Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
     * @param RiskLevel|null $value Value to set for the riskLevelAggregated property.
    */
    public function setRiskLevelAggregated(?RiskLevel $value): void {
        $this->riskLevelAggregated = $value;
    }

    /**
     * Sets the riskLevelDuringSignIn property value. Risk level during sign-in. The possible values are: none, low, medium, high, hidden, and unknownFutureValue. The value hidden means the user or sign-in wasn't enabled for Microsoft Entra ID Protection.  Supports $filter (eq). Note: Details for this property are only available for Microsoft Entra ID P2 customers. All other customers are returned hidden.
     * @param RiskLevel|null $value Value to set for the riskLevelDuringSignIn property.
    */
    public function setRiskLevelDuringSignIn(?RiskLevel $value): void {
        $this->riskLevelDuringSignIn = $value;
    }

    /**
     * Sets the riskState property value. Reports status of the risky user, sign-in, or a risk event. The possible values are: none, confirmedSafe, remediated, dismissed, atRisk, confirmedCompromised, unknownFutureValue.  Supports $filter (eq).
     * @param RiskState|null $value Value to set for the riskState property.
    */
    public function setRiskState(?RiskState $value): void {
        $this->riskState = $value;
    }

    /**
     * Sets the servicePrincipalId property value. The servicePrincipalId property
     * @param string|null $value Value to set for the servicePrincipalId property.
    */
    public function setServicePrincipalId(?string $value): void {
        $this->servicePrincipalId = $value;
    }

    /**
     * Sets the servicePrincipalName property value. The servicePrincipalName property
     * @param string|null $value Value to set for the servicePrincipalName property.
    */
    public function setServicePrincipalName(?string $value): void {
        $this->servicePrincipalName = $value;
    }

    /**
     * Sets the status property value. Sign-in status. Includes the error code and description of the error (if a sign-in failure occurs).  Supports $filter (eq) on errorCode property.
     * @param SignInStatus|null $value Value to set for the status property.
    */
    public function setStatus(?SignInStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the userAgent property value. The userAgent property
     * @param string|null $value Value to set for the userAgent property.
    */
    public function setUserAgent(?string $value): void {
        $this->userAgent = $value;
    }

    /**
     * Sets the userDisplayName property value. Display name of the user that initiated the sign-in.  Supports $filter (eq, startsWith).
     * @param string|null $value Value to set for the userDisplayName property.
    */
    public function setUserDisplayName(?string $value): void {
        $this->userDisplayName = $value;
    }

    /**
     * Sets the userId property value. ID of the user that initiated the sign-in.  Supports $filter (eq).
     * @param string|null $value Value to set for the userId property.
    */
    public function setUserId(?string $value): void {
        $this->userId = $value;
    }

    /**
     * Sets the userPrincipalName property value. User principal name of the user that initiated the sign-in. This value is always in lowercase. For guest users whose values in the user object typically contain #EXT# before the domain part, this property stores the value in both lowercase and the 'true' format. For example, while the user object stores AdeleVance_fabrikam.com#EXT#@contoso.com, the sign-in logs store adelevance@fabrikam.com. Supports $filter (eq, startsWith).
     * @param string|null $value Value to set for the userPrincipalName property.
    */
    public function setUserPrincipalName(?string $value): void {
        $this->userPrincipalName = $value;
    }

}
