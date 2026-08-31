<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class Alert extends Entity implements Parsable 
{
    /**
     * @var string|null $actorDisplayName The adversary or activity group that is associated with this alert.
    */
    private ?string $actorDisplayName = null;
    
    /**
     * @var Dictionary|null $additionalDataProperty A collection of other alert properties, including user-defined properties. Any custom details defined in the alert, and any dynamic content in the alert details, are stored here.
    */
    private ?Dictionary $additionalDataProperty = null;
    
    /**
     * @var string|null $alertPolicyId The ID of the policy that generated the alert, and populated when there is a specific policy that generated the alert, whether configured by a customer or a built-in policy.
    */
    private ?string $alertPolicyId = null;
    
    /**
     * @var string|null $alertWebUrl URL for the Microsoft 365 Defender portal alert page.
    */
    private ?string $alertWebUrl = null;
    
    /**
     * @var string|null $assignedTo Owner of the alert, or null if no owner is assigned.
    */
    private ?string $assignedTo = null;
    
    /**
     * @var array<string>|null $categories The attack kill-chain categories that the alert belongs to. Aligned with the MITRE ATT&CK framework.
    */
    private ?array $categories = null;
    
    /**
     * @var string|null $category The attack kill-chain category that the alert belongs to. Aligned with the MITRE ATT&CK framework. This property is in the process of being deprecated. Use the categories property instead.
    */
    private ?string $category = null;
    
    /**
     * @var AlertClassification|null $classification Specifies whether the alert represents a true threat. The possible values are: unknown, falsePositive, truePositive, informationalExpectedActivity, unknownFutureValue.
    */
    private ?AlertClassification $classification = null;
    
    /**
     * @var array<AlertComment>|null $comments Array of comments created by the Security Operations (SecOps) team during the alert management process.
    */
    private ?array $comments = null;
    
    /**
     * @var DateTime|null $createdDateTime Time when Microsoft 365 Defender created the alert.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var Dictionary|null $customDetails User defined custom fields with string values.
    */
    private ?Dictionary $customDetails = null;
    
    /**
     * @var string|null $description String value describing each alert.
    */
    private ?string $description = null;
    
    /**
     * @var DetectionSource|null $detectionSource Detection technology or sensor that identified the notable component or activity.
    */
    private ?DetectionSource $detectionSource = null;
    
    /**
     * @var string|null $detectorId The ID of the detector that triggered the alert.
    */
    private ?string $detectorId = null;
    
    /**
     * @var AlertDetermination|null $determination Specifies the result of the investigation, whether the alert represents a true attack and if so, the nature of the attack. The possible values are: unknown, apt, malware, securityPersonnel, securityTesting, unwantedSoftware, other, multiStagedAttack, compromisedAccount, phishing, maliciousUserActivity, notMalicious, notEnoughDataToValidate, confirmedUserActivity, lineOfBusinessApplication, unknownFutureValue.
    */
    private ?AlertDetermination $determination = null;
    
    /**
     * @var array<AlertEvidence>|null $evidence Collection of evidence related to the alert.
    */
    private ?array $evidence = null;
    
    /**
     * @var DateTime|null $firstActivityDateTime The earliest activity associated with the alert.
    */
    private ?DateTime $firstActivityDateTime = null;
    
    /**
     * @var string|null $incidentId Unique identifier to represent the incident this alert resource is associated with.
    */
    private ?string $incidentId = null;
    
    /**
     * @var string|null $incidentWebUrl URL for the incident page in the Microsoft 365 Defender portal.
    */
    private ?string $incidentWebUrl = null;
    
    /**
     * @var InvestigationState|null $investigationState Information on the current status of the investigation. The possible values are: unknown, terminated, successfullyRemediated, benign, failed, partiallyRemediated, running, pendingApproval, pendingResource, queued, innerFailure, preexistingAlert, unsupportedOs, unsupportedAlertType, suppressedAlert, partiallyInvestigated, terminatedByUser, terminatedBySystem, unknownFutureValue.
    */
    private ?InvestigationState $investigationState = null;
    
    /**
     * @var DateTime|null $lastActivityDateTime The oldest activity associated with the alert.
    */
    private ?DateTime $lastActivityDateTime = null;
    
    /**
     * @var DateTime|null $lastUpdateDateTime Time when the alert was last updated at Microsoft 365 Defender.
    */
    private ?DateTime $lastUpdateDateTime = null;
    
    /**
     * @var array<string>|null $mitreTechniques The attack techniques, as aligned with the MITRE ATT&CK framework.
    */
    private ?array $mitreTechniques = null;
    
    /**
     * @var string|null $productName The name of the product which published this alert.
    */
    private ?string $productName = null;
    
    /**
     * @var string|null $providerAlertId The ID of the alert as it appears in the security provider product that generated the alert.
    */
    private ?string $providerAlertId = null;
    
    /**
     * @var string|null $recommendedActions Recommended response and remediation actions to take in the event this alert was generated.
    */
    private ?string $recommendedActions = null;
    
    /**
     * @var DateTime|null $resolvedDateTime Time when the alert was resolved.
    */
    private ?DateTime $resolvedDateTime = null;
    
    /**
     * @var ServiceSource|null $serviceSource The serviceSource property
    */
    private ?ServiceSource $serviceSource = null;
    
    /**
     * @var AlertSeverity|null $severity The severity property
    */
    private ?AlertSeverity $severity = null;
    
    /**
     * @var AlertStatus|null $status The status property
    */
    private ?AlertStatus $status = null;
    
    /**
     * @var array<string>|null $systemTags The system tags associated with the alert.
    */
    private ?array $systemTags = null;
    
    /**
     * @var string|null $tenantId The Microsoft Entra tenant the alert was created in.
    */
    private ?string $tenantId = null;
    
    /**
     * @var string|null $threatDisplayName The threat associated with this alert.
    */
    private ?string $threatDisplayName = null;
    
    /**
     * @var string|null $threatFamilyName Threat family associated with this alert.
    */
    private ?string $threatFamilyName = null;
    
    /**
     * @var string|null $title Brief identifying string value describing the alert.
    */
    private ?string $title = null;
    
    /**
     * Instantiates a new Alert and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Alert
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Alert {
        return new Alert();
    }

    /**
     * Gets the actorDisplayName property value. The adversary or activity group that is associated with this alert.
     * @return string|null
    */
    public function getActorDisplayName(): ?string {
        return $this->actorDisplayName;
    }

    /**
     * Gets the additionalData property value. A collection of other alert properties, including user-defined properties. Any custom details defined in the alert, and any dynamic content in the alert details, are stored here.
     * @return Dictionary|null
    */
    public function getAdditionalDataProperty(): ?Dictionary {
        return $this->additionalDataProperty;
    }

    /**
     * Gets the alertPolicyId property value. The ID of the policy that generated the alert, and populated when there is a specific policy that generated the alert, whether configured by a customer or a built-in policy.
     * @return string|null
    */
    public function getAlertPolicyId(): ?string {
        return $this->alertPolicyId;
    }

    /**
     * Gets the alertWebUrl property value. URL for the Microsoft 365 Defender portal alert page.
     * @return string|null
    */
    public function getAlertWebUrl(): ?string {
        return $this->alertWebUrl;
    }

    /**
     * Gets the assignedTo property value. Owner of the alert, or null if no owner is assigned.
     * @return string|null
    */
    public function getAssignedTo(): ?string {
        return $this->assignedTo;
    }

    /**
     * Gets the categories property value. The attack kill-chain categories that the alert belongs to. Aligned with the MITRE ATT&CK framework.
     * @return array<string>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the category property value. The attack kill-chain category that the alert belongs to. Aligned with the MITRE ATT&CK framework. This property is in the process of being deprecated. Use the categories property instead.
     * @return string|null
    */
    public function getCategory(): ?string {
        return $this->category;
    }

    /**
     * Gets the classification property value. Specifies whether the alert represents a true threat. The possible values are: unknown, falsePositive, truePositive, informationalExpectedActivity, unknownFutureValue.
     * @return AlertClassification|null
    */
    public function getClassification(): ?AlertClassification {
        return $this->classification;
    }

    /**
     * Gets the comments property value. Array of comments created by the Security Operations (SecOps) team during the alert management process.
     * @return array<AlertComment>|null
    */
    public function getComments(): ?array {
        return $this->comments;
    }

    /**
     * Gets the createdDateTime property value. Time when Microsoft 365 Defender created the alert.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the customDetails property value. User defined custom fields with string values.
     * @return Dictionary|null
    */
    public function getCustomDetails(): ?Dictionary {
        return $this->customDetails;
    }

    /**
     * Gets the description property value. String value describing each alert.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the detectionSource property value. Detection technology or sensor that identified the notable component or activity.
     * @return DetectionSource|null
    */
    public function getDetectionSource(): ?DetectionSource {
        return $this->detectionSource;
    }

    /**
     * Gets the detectorId property value. The ID of the detector that triggered the alert.
     * @return string|null
    */
    public function getDetectorId(): ?string {
        return $this->detectorId;
    }

    /**
     * Gets the determination property value. Specifies the result of the investigation, whether the alert represents a true attack and if so, the nature of the attack. The possible values are: unknown, apt, malware, securityPersonnel, securityTesting, unwantedSoftware, other, multiStagedAttack, compromisedAccount, phishing, maliciousUserActivity, notMalicious, notEnoughDataToValidate, confirmedUserActivity, lineOfBusinessApplication, unknownFutureValue.
     * @return AlertDetermination|null
    */
    public function getDetermination(): ?AlertDetermination {
        return $this->determination;
    }

    /**
     * Gets the evidence property value. Collection of evidence related to the alert.
     * @return array<AlertEvidence>|null
    */
    public function getEvidence(): ?array {
        return $this->evidence;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'actorDisplayName' => fn(ParseNode $n) => $o->setActorDisplayName($n->getStringValue()),
            'additionalData' => fn(ParseNode $n) => $o->setAdditionalDataProperty($n->getObjectValue([Dictionary::class, 'createFromDiscriminatorValue'])),
            'alertPolicyId' => fn(ParseNode $n) => $o->setAlertPolicyId($n->getStringValue()),
            'alertWebUrl' => fn(ParseNode $n) => $o->setAlertWebUrl($n->getStringValue()),
            'assignedTo' => fn(ParseNode $n) => $o->setAssignedTo($n->getStringValue()),
            'categories' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setCategories($val);
            },
            'category' => fn(ParseNode $n) => $o->setCategory($n->getStringValue()),
            'classification' => fn(ParseNode $n) => $o->setClassification($n->getEnumValue(AlertClassification::class)),
            'comments' => fn(ParseNode $n) => $o->setComments($n->getCollectionOfObjectValues([AlertComment::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'customDetails' => fn(ParseNode $n) => $o->setCustomDetails($n->getObjectValue([Dictionary::class, 'createFromDiscriminatorValue'])),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'detectionSource' => fn(ParseNode $n) => $o->setDetectionSource($n->getEnumValue(DetectionSource::class)),
            'detectorId' => fn(ParseNode $n) => $o->setDetectorId($n->getStringValue()),
            'determination' => fn(ParseNode $n) => $o->setDetermination($n->getEnumValue(AlertDetermination::class)),
            'evidence' => fn(ParseNode $n) => $o->setEvidence($n->getCollectionOfObjectValues([AlertEvidence::class, 'createFromDiscriminatorValue'])),
            'firstActivityDateTime' => fn(ParseNode $n) => $o->setFirstActivityDateTime($n->getDateTimeValue()),
            'incidentId' => fn(ParseNode $n) => $o->setIncidentId($n->getStringValue()),
            'incidentWebUrl' => fn(ParseNode $n) => $o->setIncidentWebUrl($n->getStringValue()),
            'investigationState' => fn(ParseNode $n) => $o->setInvestigationState($n->getEnumValue(InvestigationState::class)),
            'lastActivityDateTime' => fn(ParseNode $n) => $o->setLastActivityDateTime($n->getDateTimeValue()),
            'lastUpdateDateTime' => fn(ParseNode $n) => $o->setLastUpdateDateTime($n->getDateTimeValue()),
            'mitreTechniques' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setMitreTechniques($val);
            },
            'productName' => fn(ParseNode $n) => $o->setProductName($n->getStringValue()),
            'providerAlertId' => fn(ParseNode $n) => $o->setProviderAlertId($n->getStringValue()),
            'recommendedActions' => fn(ParseNode $n) => $o->setRecommendedActions($n->getStringValue()),
            'resolvedDateTime' => fn(ParseNode $n) => $o->setResolvedDateTime($n->getDateTimeValue()),
            'serviceSource' => fn(ParseNode $n) => $o->setServiceSource($n->getEnumValue(ServiceSource::class)),
            'severity' => fn(ParseNode $n) => $o->setSeverity($n->getEnumValue(AlertSeverity::class)),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(AlertStatus::class)),
            'systemTags' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSystemTags($val);
            },
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
            'threatDisplayName' => fn(ParseNode $n) => $o->setThreatDisplayName($n->getStringValue()),
            'threatFamilyName' => fn(ParseNode $n) => $o->setThreatFamilyName($n->getStringValue()),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
        ]);
    }

    /**
     * Gets the firstActivityDateTime property value. The earliest activity associated with the alert.
     * @return DateTime|null
    */
    public function getFirstActivityDateTime(): ?DateTime {
        return $this->firstActivityDateTime;
    }

    /**
     * Gets the incidentId property value. Unique identifier to represent the incident this alert resource is associated with.
     * @return string|null
    */
    public function getIncidentId(): ?string {
        return $this->incidentId;
    }

    /**
     * Gets the incidentWebUrl property value. URL for the incident page in the Microsoft 365 Defender portal.
     * @return string|null
    */
    public function getIncidentWebUrl(): ?string {
        return $this->incidentWebUrl;
    }

    /**
     * Gets the investigationState property value. Information on the current status of the investigation. The possible values are: unknown, terminated, successfullyRemediated, benign, failed, partiallyRemediated, running, pendingApproval, pendingResource, queued, innerFailure, preexistingAlert, unsupportedOs, unsupportedAlertType, suppressedAlert, partiallyInvestigated, terminatedByUser, terminatedBySystem, unknownFutureValue.
     * @return InvestigationState|null
    */
    public function getInvestigationState(): ?InvestigationState {
        return $this->investigationState;
    }

    /**
     * Gets the lastActivityDateTime property value. The oldest activity associated with the alert.
     * @return DateTime|null
    */
    public function getLastActivityDateTime(): ?DateTime {
        return $this->lastActivityDateTime;
    }

    /**
     * Gets the lastUpdateDateTime property value. Time when the alert was last updated at Microsoft 365 Defender.
     * @return DateTime|null
    */
    public function getLastUpdateDateTime(): ?DateTime {
        return $this->lastUpdateDateTime;
    }

    /**
     * Gets the mitreTechniques property value. The attack techniques, as aligned with the MITRE ATT&CK framework.
     * @return array<string>|null
    */
    public function getMitreTechniques(): ?array {
        return $this->mitreTechniques;
    }

    /**
     * Gets the productName property value. The name of the product which published this alert.
     * @return string|null
    */
    public function getProductName(): ?string {
        return $this->productName;
    }

    /**
     * Gets the providerAlertId property value. The ID of the alert as it appears in the security provider product that generated the alert.
     * @return string|null
    */
    public function getProviderAlertId(): ?string {
        return $this->providerAlertId;
    }

    /**
     * Gets the recommendedActions property value. Recommended response and remediation actions to take in the event this alert was generated.
     * @return string|null
    */
    public function getRecommendedActions(): ?string {
        return $this->recommendedActions;
    }

    /**
     * Gets the resolvedDateTime property value. Time when the alert was resolved.
     * @return DateTime|null
    */
    public function getResolvedDateTime(): ?DateTime {
        return $this->resolvedDateTime;
    }

    /**
     * Gets the serviceSource property value. The serviceSource property
     * @return ServiceSource|null
    */
    public function getServiceSource(): ?ServiceSource {
        return $this->serviceSource;
    }

    /**
     * Gets the severity property value. The severity property
     * @return AlertSeverity|null
    */
    public function getSeverity(): ?AlertSeverity {
        return $this->severity;
    }

    /**
     * Gets the status property value. The status property
     * @return AlertStatus|null
    */
    public function getStatus(): ?AlertStatus {
        return $this->status;
    }

    /**
     * Gets the systemTags property value. The system tags associated with the alert.
     * @return array<string>|null
    */
    public function getSystemTags(): ?array {
        return $this->systemTags;
    }

    /**
     * Gets the tenantId property value. The Microsoft Entra tenant the alert was created in.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Gets the threatDisplayName property value. The threat associated with this alert.
     * @return string|null
    */
    public function getThreatDisplayName(): ?string {
        return $this->threatDisplayName;
    }

    /**
     * Gets the threatFamilyName property value. Threat family associated with this alert.
     * @return string|null
    */
    public function getThreatFamilyName(): ?string {
        return $this->threatFamilyName;
    }

    /**
     * Gets the title property value. Brief identifying string value describing the alert.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('actorDisplayName', $this->getActorDisplayName());
        $writer->writeObjectValue('additionalData', $this->getAdditionalDataProperty());
        $writer->writeStringValue('alertPolicyId', $this->getAlertPolicyId());
        $writer->writeStringValue('alertWebUrl', $this->getAlertWebUrl());
        $writer->writeStringValue('assignedTo', $this->getAssignedTo());
        $writer->writeCollectionOfPrimitiveValues('categories', $this->getCategories());
        $writer->writeStringValue('category', $this->getCategory());
        $writer->writeEnumValue('classification', $this->getClassification());
        $writer->writeCollectionOfObjectValues('comments', $this->getComments());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeObjectValue('customDetails', $this->getCustomDetails());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeEnumValue('detectionSource', $this->getDetectionSource());
        $writer->writeStringValue('detectorId', $this->getDetectorId());
        $writer->writeEnumValue('determination', $this->getDetermination());
        $writer->writeCollectionOfObjectValues('evidence', $this->getEvidence());
        $writer->writeDateTimeValue('firstActivityDateTime', $this->getFirstActivityDateTime());
        $writer->writeStringValue('incidentId', $this->getIncidentId());
        $writer->writeStringValue('incidentWebUrl', $this->getIncidentWebUrl());
        $writer->writeEnumValue('investigationState', $this->getInvestigationState());
        $writer->writeDateTimeValue('lastActivityDateTime', $this->getLastActivityDateTime());
        $writer->writeDateTimeValue('lastUpdateDateTime', $this->getLastUpdateDateTime());
        $writer->writeCollectionOfPrimitiveValues('mitreTechniques', $this->getMitreTechniques());
        $writer->writeStringValue('productName', $this->getProductName());
        $writer->writeStringValue('providerAlertId', $this->getProviderAlertId());
        $writer->writeStringValue('recommendedActions', $this->getRecommendedActions());
        $writer->writeDateTimeValue('resolvedDateTime', $this->getResolvedDateTime());
        $writer->writeEnumValue('serviceSource', $this->getServiceSource());
        $writer->writeEnumValue('severity', $this->getSeverity());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeCollectionOfPrimitiveValues('systemTags', $this->getSystemTags());
        $writer->writeStringValue('tenantId', $this->getTenantId());
        $writer->writeStringValue('threatDisplayName', $this->getThreatDisplayName());
        $writer->writeStringValue('threatFamilyName', $this->getThreatFamilyName());
        $writer->writeStringValue('title', $this->getTitle());
    }

    /**
     * Sets the actorDisplayName property value. The adversary or activity group that is associated with this alert.
     * @param string|null $value Value to set for the actorDisplayName property.
    */
    public function setActorDisplayName(?string $value): void {
        $this->actorDisplayName = $value;
    }

    /**
     * Sets the additionalData property value. A collection of other alert properties, including user-defined properties. Any custom details defined in the alert, and any dynamic content in the alert details, are stored here.
     * @param Dictionary|null $value Value to set for the additionalData property.
    */
    public function setAdditionalDataProperty(?Dictionary $value): void {
        $this->additionalDataProperty = $value;
    }

    /**
     * Sets the alertPolicyId property value. The ID of the policy that generated the alert, and populated when there is a specific policy that generated the alert, whether configured by a customer or a built-in policy.
     * @param string|null $value Value to set for the alertPolicyId property.
    */
    public function setAlertPolicyId(?string $value): void {
        $this->alertPolicyId = $value;
    }

    /**
     * Sets the alertWebUrl property value. URL for the Microsoft 365 Defender portal alert page.
     * @param string|null $value Value to set for the alertWebUrl property.
    */
    public function setAlertWebUrl(?string $value): void {
        $this->alertWebUrl = $value;
    }

    /**
     * Sets the assignedTo property value. Owner of the alert, or null if no owner is assigned.
     * @param string|null $value Value to set for the assignedTo property.
    */
    public function setAssignedTo(?string $value): void {
        $this->assignedTo = $value;
    }

    /**
     * Sets the categories property value. The attack kill-chain categories that the alert belongs to. Aligned with the MITRE ATT&CK framework.
     * @param array<string>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the category property value. The attack kill-chain category that the alert belongs to. Aligned with the MITRE ATT&CK framework. This property is in the process of being deprecated. Use the categories property instead.
     * @param string|null $value Value to set for the category property.
    */
    public function setCategory(?string $value): void {
        $this->category = $value;
    }

    /**
     * Sets the classification property value. Specifies whether the alert represents a true threat. The possible values are: unknown, falsePositive, truePositive, informationalExpectedActivity, unknownFutureValue.
     * @param AlertClassification|null $value Value to set for the classification property.
    */
    public function setClassification(?AlertClassification $value): void {
        $this->classification = $value;
    }

    /**
     * Sets the comments property value. Array of comments created by the Security Operations (SecOps) team during the alert management process.
     * @param array<AlertComment>|null $value Value to set for the comments property.
    */
    public function setComments(?array $value): void {
        $this->comments = $value;
    }

    /**
     * Sets the createdDateTime property value. Time when Microsoft 365 Defender created the alert.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the customDetails property value. User defined custom fields with string values.
     * @param Dictionary|null $value Value to set for the customDetails property.
    */
    public function setCustomDetails(?Dictionary $value): void {
        $this->customDetails = $value;
    }

    /**
     * Sets the description property value. String value describing each alert.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the detectionSource property value. Detection technology or sensor that identified the notable component or activity.
     * @param DetectionSource|null $value Value to set for the detectionSource property.
    */
    public function setDetectionSource(?DetectionSource $value): void {
        $this->detectionSource = $value;
    }

    /**
     * Sets the detectorId property value. The ID of the detector that triggered the alert.
     * @param string|null $value Value to set for the detectorId property.
    */
    public function setDetectorId(?string $value): void {
        $this->detectorId = $value;
    }

    /**
     * Sets the determination property value. Specifies the result of the investigation, whether the alert represents a true attack and if so, the nature of the attack. The possible values are: unknown, apt, malware, securityPersonnel, securityTesting, unwantedSoftware, other, multiStagedAttack, compromisedAccount, phishing, maliciousUserActivity, notMalicious, notEnoughDataToValidate, confirmedUserActivity, lineOfBusinessApplication, unknownFutureValue.
     * @param AlertDetermination|null $value Value to set for the determination property.
    */
    public function setDetermination(?AlertDetermination $value): void {
        $this->determination = $value;
    }

    /**
     * Sets the evidence property value. Collection of evidence related to the alert.
     * @param array<AlertEvidence>|null $value Value to set for the evidence property.
    */
    public function setEvidence(?array $value): void {
        $this->evidence = $value;
    }

    /**
     * Sets the firstActivityDateTime property value. The earliest activity associated with the alert.
     * @param DateTime|null $value Value to set for the firstActivityDateTime property.
    */
    public function setFirstActivityDateTime(?DateTime $value): void {
        $this->firstActivityDateTime = $value;
    }

    /**
     * Sets the incidentId property value. Unique identifier to represent the incident this alert resource is associated with.
     * @param string|null $value Value to set for the incidentId property.
    */
    public function setIncidentId(?string $value): void {
        $this->incidentId = $value;
    }

    /**
     * Sets the incidentWebUrl property value. URL for the incident page in the Microsoft 365 Defender portal.
     * @param string|null $value Value to set for the incidentWebUrl property.
    */
    public function setIncidentWebUrl(?string $value): void {
        $this->incidentWebUrl = $value;
    }

    /**
     * Sets the investigationState property value. Information on the current status of the investigation. The possible values are: unknown, terminated, successfullyRemediated, benign, failed, partiallyRemediated, running, pendingApproval, pendingResource, queued, innerFailure, preexistingAlert, unsupportedOs, unsupportedAlertType, suppressedAlert, partiallyInvestigated, terminatedByUser, terminatedBySystem, unknownFutureValue.
     * @param InvestigationState|null $value Value to set for the investigationState property.
    */
    public function setInvestigationState(?InvestigationState $value): void {
        $this->investigationState = $value;
    }

    /**
     * Sets the lastActivityDateTime property value. The oldest activity associated with the alert.
     * @param DateTime|null $value Value to set for the lastActivityDateTime property.
    */
    public function setLastActivityDateTime(?DateTime $value): void {
        $this->lastActivityDateTime = $value;
    }

    /**
     * Sets the lastUpdateDateTime property value. Time when the alert was last updated at Microsoft 365 Defender.
     * @param DateTime|null $value Value to set for the lastUpdateDateTime property.
    */
    public function setLastUpdateDateTime(?DateTime $value): void {
        $this->lastUpdateDateTime = $value;
    }

    /**
     * Sets the mitreTechniques property value. The attack techniques, as aligned with the MITRE ATT&CK framework.
     * @param array<string>|null $value Value to set for the mitreTechniques property.
    */
    public function setMitreTechniques(?array $value): void {
        $this->mitreTechniques = $value;
    }

    /**
     * Sets the productName property value. The name of the product which published this alert.
     * @param string|null $value Value to set for the productName property.
    */
    public function setProductName(?string $value): void {
        $this->productName = $value;
    }

    /**
     * Sets the providerAlertId property value. The ID of the alert as it appears in the security provider product that generated the alert.
     * @param string|null $value Value to set for the providerAlertId property.
    */
    public function setProviderAlertId(?string $value): void {
        $this->providerAlertId = $value;
    }

    /**
     * Sets the recommendedActions property value. Recommended response and remediation actions to take in the event this alert was generated.
     * @param string|null $value Value to set for the recommendedActions property.
    */
    public function setRecommendedActions(?string $value): void {
        $this->recommendedActions = $value;
    }

    /**
     * Sets the resolvedDateTime property value. Time when the alert was resolved.
     * @param DateTime|null $value Value to set for the resolvedDateTime property.
    */
    public function setResolvedDateTime(?DateTime $value): void {
        $this->resolvedDateTime = $value;
    }

    /**
     * Sets the serviceSource property value. The serviceSource property
     * @param ServiceSource|null $value Value to set for the serviceSource property.
    */
    public function setServiceSource(?ServiceSource $value): void {
        $this->serviceSource = $value;
    }

    /**
     * Sets the severity property value. The severity property
     * @param AlertSeverity|null $value Value to set for the severity property.
    */
    public function setSeverity(?AlertSeverity $value): void {
        $this->severity = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param AlertStatus|null $value Value to set for the status property.
    */
    public function setStatus(?AlertStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the systemTags property value. The system tags associated with the alert.
     * @param array<string>|null $value Value to set for the systemTags property.
    */
    public function setSystemTags(?array $value): void {
        $this->systemTags = $value;
    }

    /**
     * Sets the tenantId property value. The Microsoft Entra tenant the alert was created in.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

    /**
     * Sets the threatDisplayName property value. The threat associated with this alert.
     * @param string|null $value Value to set for the threatDisplayName property.
    */
    public function setThreatDisplayName(?string $value): void {
        $this->threatDisplayName = $value;
    }

    /**
     * Sets the threatFamilyName property value. Threat family associated with this alert.
     * @param string|null $value Value to set for the threatFamilyName property.
    */
    public function setThreatFamilyName(?string $value): void {
        $this->threatFamilyName = $value;
    }

    /**
     * Sets the title property value. Brief identifying string value describing the alert.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

}
