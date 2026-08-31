<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class Incident extends Entity implements Parsable 
{
    /**
     * @var array<Alert>|null $alerts The list of related alerts. Supports $expand.
    */
    private ?array $alerts = null;
    
    /**
     * @var string|null $assignedTo Owner of the incident, or null if no owner is assigned. Free editable text.
    */
    private ?string $assignedTo = null;
    
    /**
     * @var AlertClassification|null $classification The specification for the incident. The possible values are: unknown, falsePositive, truePositive, informationalExpectedActivity, unknownFutureValue.
    */
    private ?AlertClassification $classification = null;
    
    /**
     * @var array<AlertComment>|null $comments Array of comments created by the Security Operations (SecOps) team when the incident is managed.
    */
    private ?array $comments = null;
    
    /**
     * @var DateTime|null $createdDateTime Time when the incident was first created.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<string>|null $customTags Array of custom tags associated with an incident.
    */
    private ?array $customTags = null;
    
    /**
     * @var string|null $description Description of the incident.
    */
    private ?string $description = null;
    
    /**
     * @var AlertDetermination|null $determination Specifies the determination of the incident. The possible values are: unknown, apt, malware, securityPersonnel, securityTesting, unwantedSoftware, other, multiStagedAttack, compromisedUser, phishing, maliciousUserActivity, clean, insufficientData, confirmedUserActivity, lineOfBusinessApplication, unknownFutureValue.
    */
    private ?AlertDetermination $determination = null;
    
    /**
     * @var string|null $displayName The incident name.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $incidentWebUrl The URL for the incident page in the Microsoft 365 Defender portal.
    */
    private ?string $incidentWebUrl = null;
    
    /**
     * @var string|null $lastModifiedBy The identity that last modified the incident.
    */
    private ?string $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastUpdateDateTime Time when the incident was last updated.
    */
    private ?DateTime $lastUpdateDateTime = null;
    
    /**
     * @var int|null $priorityScore A priority score for the incident from 0 to 100, with > 85 being the top priority, 15 - 85 medium priority, and < 15 low priority. This score is generated using machine learning and is based on multiple factors, including severity, disruption impact, threat intelligence, alert types, asset criticality, threat analytics, incident rarity, and additional priority signals. The value can also be null which indicates the feature is not open for the tenant or the value of the score is pending calculation.
    */
    private ?int $priorityScore = null;
    
    /**
     * @var string|null $redirectIncidentId Only populated in case an incident is grouped with another incident, as part of the logic that processes incidents. In such a case, the status property is redirected.
    */
    private ?string $redirectIncidentId = null;
    
    /**
     * @var string|null $resolvingComment User input that explains the resolution of the incident and the classification choice. This property contains free editable text.
    */
    private ?string $resolvingComment = null;
    
    /**
     * @var AlertSeverity|null $severity The severity property
    */
    private ?AlertSeverity $severity = null;
    
    /**
     * @var IncidentStatus|null $status The status property
    */
    private ?IncidentStatus $status = null;
    
    /**
     * @var string|null $summary The overview of an attack. When applicable, the summary contains details of what occurred, impacted assets, and the type of attack.
    */
    private ?string $summary = null;
    
    /**
     * @var array<string>|null $systemTags The system tags associated with the incident.
    */
    private ?array $systemTags = null;
    
    /**
     * @var string|null $tenantId The Microsoft Entra tenant in which the alert was created.
    */
    private ?string $tenantId = null;
    
    /**
     * Instantiates a new Incident and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Incident
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Incident {
        return new Incident();
    }

    /**
     * Gets the alerts property value. The list of related alerts. Supports $expand.
     * @return array<Alert>|null
    */
    public function getAlerts(): ?array {
        return $this->alerts;
    }

    /**
     * Gets the assignedTo property value. Owner of the incident, or null if no owner is assigned. Free editable text.
     * @return string|null
    */
    public function getAssignedTo(): ?string {
        return $this->assignedTo;
    }

    /**
     * Gets the classification property value. The specification for the incident. The possible values are: unknown, falsePositive, truePositive, informationalExpectedActivity, unknownFutureValue.
     * @return AlertClassification|null
    */
    public function getClassification(): ?AlertClassification {
        return $this->classification;
    }

    /**
     * Gets the comments property value. Array of comments created by the Security Operations (SecOps) team when the incident is managed.
     * @return array<AlertComment>|null
    */
    public function getComments(): ?array {
        return $this->comments;
    }

    /**
     * Gets the createdDateTime property value. Time when the incident was first created.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the customTags property value. Array of custom tags associated with an incident.
     * @return array<string>|null
    */
    public function getCustomTags(): ?array {
        return $this->customTags;
    }

    /**
     * Gets the description property value. Description of the incident.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the determination property value. Specifies the determination of the incident. The possible values are: unknown, apt, malware, securityPersonnel, securityTesting, unwantedSoftware, other, multiStagedAttack, compromisedUser, phishing, maliciousUserActivity, clean, insufficientData, confirmedUserActivity, lineOfBusinessApplication, unknownFutureValue.
     * @return AlertDetermination|null
    */
    public function getDetermination(): ?AlertDetermination {
        return $this->determination;
    }

    /**
     * Gets the displayName property value. The incident name.
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
            'alerts' => fn(ParseNode $n) => $o->setAlerts($n->getCollectionOfObjectValues([Alert::class, 'createFromDiscriminatorValue'])),
            'assignedTo' => fn(ParseNode $n) => $o->setAssignedTo($n->getStringValue()),
            'classification' => fn(ParseNode $n) => $o->setClassification($n->getEnumValue(AlertClassification::class)),
            'comments' => fn(ParseNode $n) => $o->setComments($n->getCollectionOfObjectValues([AlertComment::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'customTags' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setCustomTags($val);
            },
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'determination' => fn(ParseNode $n) => $o->setDetermination($n->getEnumValue(AlertDetermination::class)),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'incidentWebUrl' => fn(ParseNode $n) => $o->setIncidentWebUrl($n->getStringValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getStringValue()),
            'lastUpdateDateTime' => fn(ParseNode $n) => $o->setLastUpdateDateTime($n->getDateTimeValue()),
            'priorityScore' => fn(ParseNode $n) => $o->setPriorityScore($n->getIntegerValue()),
            'redirectIncidentId' => fn(ParseNode $n) => $o->setRedirectIncidentId($n->getStringValue()),
            'resolvingComment' => fn(ParseNode $n) => $o->setResolvingComment($n->getStringValue()),
            'severity' => fn(ParseNode $n) => $o->setSeverity($n->getEnumValue(AlertSeverity::class)),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(IncidentStatus::class)),
            'summary' => fn(ParseNode $n) => $o->setSummary($n->getStringValue()),
            'systemTags' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSystemTags($val);
            },
            'tenantId' => fn(ParseNode $n) => $o->setTenantId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the incidentWebUrl property value. The URL for the incident page in the Microsoft 365 Defender portal.
     * @return string|null
    */
    public function getIncidentWebUrl(): ?string {
        return $this->incidentWebUrl;
    }

    /**
     * Gets the lastModifiedBy property value. The identity that last modified the incident.
     * @return string|null
    */
    public function getLastModifiedBy(): ?string {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastUpdateDateTime property value. Time when the incident was last updated.
     * @return DateTime|null
    */
    public function getLastUpdateDateTime(): ?DateTime {
        return $this->lastUpdateDateTime;
    }

    /**
     * Gets the priorityScore property value. A priority score for the incident from 0 to 100, with > 85 being the top priority, 15 - 85 medium priority, and < 15 low priority. This score is generated using machine learning and is based on multiple factors, including severity, disruption impact, threat intelligence, alert types, asset criticality, threat analytics, incident rarity, and additional priority signals. The value can also be null which indicates the feature is not open for the tenant or the value of the score is pending calculation.
     * @return int|null
    */
    public function getPriorityScore(): ?int {
        return $this->priorityScore;
    }

    /**
     * Gets the redirectIncidentId property value. Only populated in case an incident is grouped with another incident, as part of the logic that processes incidents. In such a case, the status property is redirected.
     * @return string|null
    */
    public function getRedirectIncidentId(): ?string {
        return $this->redirectIncidentId;
    }

    /**
     * Gets the resolvingComment property value. User input that explains the resolution of the incident and the classification choice. This property contains free editable text.
     * @return string|null
    */
    public function getResolvingComment(): ?string {
        return $this->resolvingComment;
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
     * @return IncidentStatus|null
    */
    public function getStatus(): ?IncidentStatus {
        return $this->status;
    }

    /**
     * Gets the summary property value. The overview of an attack. When applicable, the summary contains details of what occurred, impacted assets, and the type of attack.
     * @return string|null
    */
    public function getSummary(): ?string {
        return $this->summary;
    }

    /**
     * Gets the systemTags property value. The system tags associated with the incident.
     * @return array<string>|null
    */
    public function getSystemTags(): ?array {
        return $this->systemTags;
    }

    /**
     * Gets the tenantId property value. The Microsoft Entra tenant in which the alert was created.
     * @return string|null
    */
    public function getTenantId(): ?string {
        return $this->tenantId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('alerts', $this->getAlerts());
        $writer->writeStringValue('assignedTo', $this->getAssignedTo());
        $writer->writeEnumValue('classification', $this->getClassification());
        $writer->writeCollectionOfObjectValues('comments', $this->getComments());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfPrimitiveValues('customTags', $this->getCustomTags());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeEnumValue('determination', $this->getDetermination());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('incidentWebUrl', $this->getIncidentWebUrl());
        $writer->writeStringValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastUpdateDateTime', $this->getLastUpdateDateTime());
        $writer->writeIntegerValue('priorityScore', $this->getPriorityScore());
        $writer->writeStringValue('redirectIncidentId', $this->getRedirectIncidentId());
        $writer->writeStringValue('resolvingComment', $this->getResolvingComment());
        $writer->writeEnumValue('severity', $this->getSeverity());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeStringValue('summary', $this->getSummary());
        $writer->writeCollectionOfPrimitiveValues('systemTags', $this->getSystemTags());
        $writer->writeStringValue('tenantId', $this->getTenantId());
    }

    /**
     * Sets the alerts property value. The list of related alerts. Supports $expand.
     * @param array<Alert>|null $value Value to set for the alerts property.
    */
    public function setAlerts(?array $value): void {
        $this->alerts = $value;
    }

    /**
     * Sets the assignedTo property value. Owner of the incident, or null if no owner is assigned. Free editable text.
     * @param string|null $value Value to set for the assignedTo property.
    */
    public function setAssignedTo(?string $value): void {
        $this->assignedTo = $value;
    }

    /**
     * Sets the classification property value. The specification for the incident. The possible values are: unknown, falsePositive, truePositive, informationalExpectedActivity, unknownFutureValue.
     * @param AlertClassification|null $value Value to set for the classification property.
    */
    public function setClassification(?AlertClassification $value): void {
        $this->classification = $value;
    }

    /**
     * Sets the comments property value. Array of comments created by the Security Operations (SecOps) team when the incident is managed.
     * @param array<AlertComment>|null $value Value to set for the comments property.
    */
    public function setComments(?array $value): void {
        $this->comments = $value;
    }

    /**
     * Sets the createdDateTime property value. Time when the incident was first created.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the customTags property value. Array of custom tags associated with an incident.
     * @param array<string>|null $value Value to set for the customTags property.
    */
    public function setCustomTags(?array $value): void {
        $this->customTags = $value;
    }

    /**
     * Sets the description property value. Description of the incident.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the determination property value. Specifies the determination of the incident. The possible values are: unknown, apt, malware, securityPersonnel, securityTesting, unwantedSoftware, other, multiStagedAttack, compromisedUser, phishing, maliciousUserActivity, clean, insufficientData, confirmedUserActivity, lineOfBusinessApplication, unknownFutureValue.
     * @param AlertDetermination|null $value Value to set for the determination property.
    */
    public function setDetermination(?AlertDetermination $value): void {
        $this->determination = $value;
    }

    /**
     * Sets the displayName property value. The incident name.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the incidentWebUrl property value. The URL for the incident page in the Microsoft 365 Defender portal.
     * @param string|null $value Value to set for the incidentWebUrl property.
    */
    public function setIncidentWebUrl(?string $value): void {
        $this->incidentWebUrl = $value;
    }

    /**
     * Sets the lastModifiedBy property value. The identity that last modified the incident.
     * @param string|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?string $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastUpdateDateTime property value. Time when the incident was last updated.
     * @param DateTime|null $value Value to set for the lastUpdateDateTime property.
    */
    public function setLastUpdateDateTime(?DateTime $value): void {
        $this->lastUpdateDateTime = $value;
    }

    /**
     * Sets the priorityScore property value. A priority score for the incident from 0 to 100, with > 85 being the top priority, 15 - 85 medium priority, and < 15 low priority. This score is generated using machine learning and is based on multiple factors, including severity, disruption impact, threat intelligence, alert types, asset criticality, threat analytics, incident rarity, and additional priority signals. The value can also be null which indicates the feature is not open for the tenant or the value of the score is pending calculation.
     * @param int|null $value Value to set for the priorityScore property.
    */
    public function setPriorityScore(?int $value): void {
        $this->priorityScore = $value;
    }

    /**
     * Sets the redirectIncidentId property value. Only populated in case an incident is grouped with another incident, as part of the logic that processes incidents. In such a case, the status property is redirected.
     * @param string|null $value Value to set for the redirectIncidentId property.
    */
    public function setRedirectIncidentId(?string $value): void {
        $this->redirectIncidentId = $value;
    }

    /**
     * Sets the resolvingComment property value. User input that explains the resolution of the incident and the classification choice. This property contains free editable text.
     * @param string|null $value Value to set for the resolvingComment property.
    */
    public function setResolvingComment(?string $value): void {
        $this->resolvingComment = $value;
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
     * @param IncidentStatus|null $value Value to set for the status property.
    */
    public function setStatus(?IncidentStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the summary property value. The overview of an attack. When applicable, the summary contains details of what occurred, impacted assets, and the type of attack.
     * @param string|null $value Value to set for the summary property.
    */
    public function setSummary(?string $value): void {
        $this->summary = $value;
    }

    /**
     * Sets the systemTags property value. The system tags associated with the incident.
     * @param array<string>|null $value Value to set for the systemTags property.
    */
    public function setSystemTags(?array $value): void {
        $this->systemTags = $value;
    }

    /**
     * Sets the tenantId property value. The Microsoft Entra tenant in which the alert was created.
     * @param string|null $value Value to set for the tenantId property.
    */
    public function setTenantId(?string $value): void {
        $this->tenantId = $value;
    }

}
