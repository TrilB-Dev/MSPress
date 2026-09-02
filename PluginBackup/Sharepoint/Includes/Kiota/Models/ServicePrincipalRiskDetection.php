<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class ServicePrincipalRiskDetection extends Entity implements Parsable 
{
    /**
     * @var ActivityType|null $activity Indicates the activity type the detected risk is linked to.
    */
    private ?ActivityType $activity = null;
    
    /**
     * @var DateTime|null $activityDateTime Date and time when the risky activity occurred. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
    */
    private ?DateTime $activityDateTime = null;
    
    /**
     * @var string|null $additionalInfo Additional information associated with the risk detection. This string value is represented as a JSON object with the quotations escaped.
    */
    private ?string $additionalInfo = null;
    
    /**
     * @var string|null $appId The unique identifier for the associated application.
    */
    private ?string $appId = null;
    
    /**
     * @var string|null $correlationId Correlation ID of the sign-in activity associated with the risk detection. This property is null if the risk detection is not associated with a sign-in activity.
    */
    private ?string $correlationId = null;
    
    /**
     * @var DateTime|null $detectedDateTime Date and time when the risk was detected. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $detectedDateTime = null;
    
    /**
     * @var RiskDetectionTimingType|null $detectionTimingType Timing of the detected risk , whether real-time or offline. The possible values are: notDefined, realtime, nearRealtime, offline, unknownFutureValue.
    */
    private ?RiskDetectionTimingType $detectionTimingType = null;
    
    /**
     * @var string|null $ipAddress Provides the IP address of the client from where the risk occurred.
    */
    private ?string $ipAddress = null;
    
    /**
     * @var array<string>|null $keyIds The unique identifier for the key credential associated with the risk detection.
    */
    private ?array $keyIds = null;
    
    /**
     * @var DateTime|null $lastUpdatedDateTime Date and time when the risk detection was last updated.
    */
    private ?DateTime $lastUpdatedDateTime = null;
    
    /**
     * @var SignInLocation|null $location Location from where the sign-in was initiated.
    */
    private ?SignInLocation $location = null;
    
    /**
     * @var string|null $requestId Request identifier of the sign-in activity associated with the risk detection. This property is null if the risk detection is not associated with a sign-in activity. Supports $filter (eq).
    */
    private ?string $requestId = null;
    
    /**
     * @var RiskDetail|null $riskDetail Details of the detected risk. Note: Details for this property are only available for Workload Identities Premium customers. Events in tenants without this license will be returned hidden.
    */
    private ?RiskDetail $riskDetail = null;
    
    /**
     * @var string|null $riskEventType The type of risk event detected. The possible values are: investigationsThreatIntelligence, generic, adminConfirmedServicePrincipalCompromised, suspiciousSignins, leakedCredentials, anomalousServicePrincipalActivity, maliciousApplication, suspiciousApplication.
    */
    private ?string $riskEventType = null;
    
    /**
     * @var RiskLevel|null $riskLevel Level of the detected risk. Note: Details for this property are only available for Workload Identities Premium customers. Events in tenants without this license will be returned hidden. The possible values are: low, medium, high, hidden, none.
    */
    private ?RiskLevel $riskLevel = null;
    
    /**
     * @var RiskState|null $riskState The state of a detected risky service principal or sign-in activity. The possible values are: none, dismissed, atRisk, confirmedCompromised.
    */
    private ?RiskState $riskState = null;
    
    /**
     * @var string|null $servicePrincipalDisplayName The display name for the service principal.
    */
    private ?string $servicePrincipalDisplayName = null;
    
    /**
     * @var string|null $servicePrincipalId The unique identifier for the service principal. Supports $filter (eq).
    */
    private ?string $servicePrincipalId = null;
    
    /**
     * @var string|null $source Source of the risk detection. For example, identityProtection.
    */
    private ?string $source = null;
    
    /**
     * @var TokenIssuerType|null $tokenIssuerType Indicates the type of token issuer for the detected sign-in risk. The possible values are: AzureAD.
    */
    private ?TokenIssuerType $tokenIssuerType = null;
    
    /**
     * Instantiates a new ServicePrincipalRiskDetection and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ServicePrincipalRiskDetection
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ServicePrincipalRiskDetection {
        return new ServicePrincipalRiskDetection();
    }

    /**
     * Gets the activity property value. Indicates the activity type the detected risk is linked to.
     * @return ActivityType|null
    */
    public function getActivity(): ?ActivityType {
        return $this->activity;
    }

    /**
     * Gets the activityDateTime property value. Date and time when the risky activity occurred. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @return DateTime|null
    */
    public function getActivityDateTime(): ?DateTime {
        return $this->activityDateTime;
    }

    /**
     * Gets the additionalInfo property value. Additional information associated with the risk detection. This string value is represented as a JSON object with the quotations escaped.
     * @return string|null
    */
    public function getAdditionalInfo(): ?string {
        return $this->additionalInfo;
    }

    /**
     * Gets the appId property value. The unique identifier for the associated application.
     * @return string|null
    */
    public function getAppId(): ?string {
        return $this->appId;
    }

    /**
     * Gets the correlationId property value. Correlation ID of the sign-in activity associated with the risk detection. This property is null if the risk detection is not associated with a sign-in activity.
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the detectedDateTime property value. Date and time when the risk was detected. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getDetectedDateTime(): ?DateTime {
        return $this->detectedDateTime;
    }

    /**
     * Gets the detectionTimingType property value. Timing of the detected risk , whether real-time or offline. The possible values are: notDefined, realtime, nearRealtime, offline, unknownFutureValue.
     * @return RiskDetectionTimingType|null
    */
    public function getDetectionTimingType(): ?RiskDetectionTimingType {
        return $this->detectionTimingType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activity' => fn(ParseNode $n) => $o->setActivity($n->getEnumValue(ActivityType::class)),
            'activityDateTime' => fn(ParseNode $n) => $o->setActivityDateTime($n->getDateTimeValue()),
            'additionalInfo' => fn(ParseNode $n) => $o->setAdditionalInfo($n->getStringValue()),
            'appId' => fn(ParseNode $n) => $o->setAppId($n->getStringValue()),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'detectedDateTime' => fn(ParseNode $n) => $o->setDetectedDateTime($n->getDateTimeValue()),
            'detectionTimingType' => fn(ParseNode $n) => $o->setDetectionTimingType($n->getEnumValue(RiskDetectionTimingType::class)),
            'ipAddress' => fn(ParseNode $n) => $o->setIpAddress($n->getStringValue()),
            'keyIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setKeyIds($val);
            },
            'lastUpdatedDateTime' => fn(ParseNode $n) => $o->setLastUpdatedDateTime($n->getDateTimeValue()),
            'location' => fn(ParseNode $n) => $o->setLocation($n->getObjectValue([SignInLocation::class, 'createFromDiscriminatorValue'])),
            'requestId' => fn(ParseNode $n) => $o->setRequestId($n->getStringValue()),
            'riskDetail' => fn(ParseNode $n) => $o->setRiskDetail($n->getEnumValue(RiskDetail::class)),
            'riskEventType' => fn(ParseNode $n) => $o->setRiskEventType($n->getStringValue()),
            'riskLevel' => fn(ParseNode $n) => $o->setRiskLevel($n->getEnumValue(RiskLevel::class)),
            'riskState' => fn(ParseNode $n) => $o->setRiskState($n->getEnumValue(RiskState::class)),
            'servicePrincipalDisplayName' => fn(ParseNode $n) => $o->setServicePrincipalDisplayName($n->getStringValue()),
            'servicePrincipalId' => fn(ParseNode $n) => $o->setServicePrincipalId($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getStringValue()),
            'tokenIssuerType' => fn(ParseNode $n) => $o->setTokenIssuerType($n->getEnumValue(TokenIssuerType::class)),
        ]);
    }

    /**
     * Gets the ipAddress property value. Provides the IP address of the client from where the risk occurred.
     * @return string|null
    */
    public function getIpAddress(): ?string {
        return $this->ipAddress;
    }

    /**
     * Gets the keyIds property value. The unique identifier for the key credential associated with the risk detection.
     * @return array<string>|null
    */
    public function getKeyIds(): ?array {
        return $this->keyIds;
    }

    /**
     * Gets the lastUpdatedDateTime property value. Date and time when the risk detection was last updated.
     * @return DateTime|null
    */
    public function getLastUpdatedDateTime(): ?DateTime {
        return $this->lastUpdatedDateTime;
    }

    /**
     * Gets the location property value. Location from where the sign-in was initiated.
     * @return SignInLocation|null
    */
    public function getLocation(): ?SignInLocation {
        return $this->location;
    }

    /**
     * Gets the requestId property value. Request identifier of the sign-in activity associated with the risk detection. This property is null if the risk detection is not associated with a sign-in activity. Supports $filter (eq).
     * @return string|null
    */
    public function getRequestId(): ?string {
        return $this->requestId;
    }

    /**
     * Gets the riskDetail property value. Details of the detected risk. Note: Details for this property are only available for Workload Identities Premium customers. Events in tenants without this license will be returned hidden.
     * @return RiskDetail|null
    */
    public function getRiskDetail(): ?RiskDetail {
        return $this->riskDetail;
    }

    /**
     * Gets the riskEventType property value. The type of risk event detected. The possible values are: investigationsThreatIntelligence, generic, adminConfirmedServicePrincipalCompromised, suspiciousSignins, leakedCredentials, anomalousServicePrincipalActivity, maliciousApplication, suspiciousApplication.
     * @return string|null
    */
    public function getRiskEventType(): ?string {
        return $this->riskEventType;
    }

    /**
     * Gets the riskLevel property value. Level of the detected risk. Note: Details for this property are only available for Workload Identities Premium customers. Events in tenants without this license will be returned hidden. The possible values are: low, medium, high, hidden, none.
     * @return RiskLevel|null
    */
    public function getRiskLevel(): ?RiskLevel {
        return $this->riskLevel;
    }

    /**
     * Gets the riskState property value. The state of a detected risky service principal or sign-in activity. The possible values are: none, dismissed, atRisk, confirmedCompromised.
     * @return RiskState|null
    */
    public function getRiskState(): ?RiskState {
        return $this->riskState;
    }

    /**
     * Gets the servicePrincipalDisplayName property value. The display name for the service principal.
     * @return string|null
    */
    public function getServicePrincipalDisplayName(): ?string {
        return $this->servicePrincipalDisplayName;
    }

    /**
     * Gets the servicePrincipalId property value. The unique identifier for the service principal. Supports $filter (eq).
     * @return string|null
    */
    public function getServicePrincipalId(): ?string {
        return $this->servicePrincipalId;
    }

    /**
     * Gets the source property value. Source of the risk detection. For example, identityProtection.
     * @return string|null
    */
    public function getSource(): ?string {
        return $this->source;
    }

    /**
     * Gets the tokenIssuerType property value. Indicates the type of token issuer for the detected sign-in risk. The possible values are: AzureAD.
     * @return TokenIssuerType|null
    */
    public function getTokenIssuerType(): ?TokenIssuerType {
        return $this->tokenIssuerType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('activity', $this->getActivity());
        $writer->writeDateTimeValue('activityDateTime', $this->getActivityDateTime());
        $writer->writeStringValue('additionalInfo', $this->getAdditionalInfo());
        $writer->writeStringValue('appId', $this->getAppId());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeDateTimeValue('detectedDateTime', $this->getDetectedDateTime());
        $writer->writeEnumValue('detectionTimingType', $this->getDetectionTimingType());
        $writer->writeStringValue('ipAddress', $this->getIpAddress());
        $writer->writeCollectionOfPrimitiveValues('keyIds', $this->getKeyIds());
        $writer->writeDateTimeValue('lastUpdatedDateTime', $this->getLastUpdatedDateTime());
        $writer->writeObjectValue('location', $this->getLocation());
        $writer->writeStringValue('requestId', $this->getRequestId());
        $writer->writeEnumValue('riskDetail', $this->getRiskDetail());
        $writer->writeStringValue('riskEventType', $this->getRiskEventType());
        $writer->writeEnumValue('riskLevel', $this->getRiskLevel());
        $writer->writeEnumValue('riskState', $this->getRiskState());
        $writer->writeStringValue('servicePrincipalDisplayName', $this->getServicePrincipalDisplayName());
        $writer->writeStringValue('servicePrincipalId', $this->getServicePrincipalId());
        $writer->writeStringValue('source', $this->getSource());
        $writer->writeEnumValue('tokenIssuerType', $this->getTokenIssuerType());
    }

    /**
     * Sets the activity property value. Indicates the activity type the detected risk is linked to.
     * @param ActivityType|null $value Value to set for the activity property.
    */
    public function setActivity(?ActivityType $value): void {
        $this->activity = $value;
    }

    /**
     * Sets the activityDateTime property value. Date and time when the risky activity occurred. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z
     * @param DateTime|null $value Value to set for the activityDateTime property.
    */
    public function setActivityDateTime(?DateTime $value): void {
        $this->activityDateTime = $value;
    }

    /**
     * Sets the additionalInfo property value. Additional information associated with the risk detection. This string value is represented as a JSON object with the quotations escaped.
     * @param string|null $value Value to set for the additionalInfo property.
    */
    public function setAdditionalInfo(?string $value): void {
        $this->additionalInfo = $value;
    }

    /**
     * Sets the appId property value. The unique identifier for the associated application.
     * @param string|null $value Value to set for the appId property.
    */
    public function setAppId(?string $value): void {
        $this->appId = $value;
    }

    /**
     * Sets the correlationId property value. Correlation ID of the sign-in activity associated with the risk detection. This property is null if the risk detection is not associated with a sign-in activity.
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the detectedDateTime property value. Date and time when the risk was detected. The DateTimeOffset type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the detectedDateTime property.
    */
    public function setDetectedDateTime(?DateTime $value): void {
        $this->detectedDateTime = $value;
    }

    /**
     * Sets the detectionTimingType property value. Timing of the detected risk , whether real-time or offline. The possible values are: notDefined, realtime, nearRealtime, offline, unknownFutureValue.
     * @param RiskDetectionTimingType|null $value Value to set for the detectionTimingType property.
    */
    public function setDetectionTimingType(?RiskDetectionTimingType $value): void {
        $this->detectionTimingType = $value;
    }

    /**
     * Sets the ipAddress property value. Provides the IP address of the client from where the risk occurred.
     * @param string|null $value Value to set for the ipAddress property.
    */
    public function setIpAddress(?string $value): void {
        $this->ipAddress = $value;
    }

    /**
     * Sets the keyIds property value. The unique identifier for the key credential associated with the risk detection.
     * @param array<string>|null $value Value to set for the keyIds property.
    */
    public function setKeyIds(?array $value): void {
        $this->keyIds = $value;
    }

    /**
     * Sets the lastUpdatedDateTime property value. Date and time when the risk detection was last updated.
     * @param DateTime|null $value Value to set for the lastUpdatedDateTime property.
    */
    public function setLastUpdatedDateTime(?DateTime $value): void {
        $this->lastUpdatedDateTime = $value;
    }

    /**
     * Sets the location property value. Location from where the sign-in was initiated.
     * @param SignInLocation|null $value Value to set for the location property.
    */
    public function setLocation(?SignInLocation $value): void {
        $this->location = $value;
    }

    /**
     * Sets the requestId property value. Request identifier of the sign-in activity associated with the risk detection. This property is null if the risk detection is not associated with a sign-in activity. Supports $filter (eq).
     * @param string|null $value Value to set for the requestId property.
    */
    public function setRequestId(?string $value): void {
        $this->requestId = $value;
    }

    /**
     * Sets the riskDetail property value. Details of the detected risk. Note: Details for this property are only available for Workload Identities Premium customers. Events in tenants without this license will be returned hidden.
     * @param RiskDetail|null $value Value to set for the riskDetail property.
    */
    public function setRiskDetail(?RiskDetail $value): void {
        $this->riskDetail = $value;
    }

    /**
     * Sets the riskEventType property value. The type of risk event detected. The possible values are: investigationsThreatIntelligence, generic, adminConfirmedServicePrincipalCompromised, suspiciousSignins, leakedCredentials, anomalousServicePrincipalActivity, maliciousApplication, suspiciousApplication.
     * @param string|null $value Value to set for the riskEventType property.
    */
    public function setRiskEventType(?string $value): void {
        $this->riskEventType = $value;
    }

    /**
     * Sets the riskLevel property value. Level of the detected risk. Note: Details for this property are only available for Workload Identities Premium customers. Events in tenants without this license will be returned hidden. The possible values are: low, medium, high, hidden, none.
     * @param RiskLevel|null $value Value to set for the riskLevel property.
    */
    public function setRiskLevel(?RiskLevel $value): void {
        $this->riskLevel = $value;
    }

    /**
     * Sets the riskState property value. The state of a detected risky service principal or sign-in activity. The possible values are: none, dismissed, atRisk, confirmedCompromised.
     * @param RiskState|null $value Value to set for the riskState property.
    */
    public function setRiskState(?RiskState $value): void {
        $this->riskState = $value;
    }

    /**
     * Sets the servicePrincipalDisplayName property value. The display name for the service principal.
     * @param string|null $value Value to set for the servicePrincipalDisplayName property.
    */
    public function setServicePrincipalDisplayName(?string $value): void {
        $this->servicePrincipalDisplayName = $value;
    }

    /**
     * Sets the servicePrincipalId property value. The unique identifier for the service principal. Supports $filter (eq).
     * @param string|null $value Value to set for the servicePrincipalId property.
    */
    public function setServicePrincipalId(?string $value): void {
        $this->servicePrincipalId = $value;
    }

    /**
     * Sets the source property value. Source of the risk detection. For example, identityProtection.
     * @param string|null $value Value to set for the source property.
    */
    public function setSource(?string $value): void {
        $this->source = $value;
    }

    /**
     * Sets the tokenIssuerType property value. Indicates the type of token issuer for the detected sign-in risk. The possible values are: AzureAD.
     * @param TokenIssuerType|null $value Value to set for the tokenIssuerType property.
    */
    public function setTokenIssuerType(?TokenIssuerType $value): void {
        $this->tokenIssuerType = $value;
    }

}
