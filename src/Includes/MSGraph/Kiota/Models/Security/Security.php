<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Alert;
use MSPress\Includes\MSGraph\Kiota\Models\AttackSimulationRoot;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;
use MSPress\Includes\MSGraph\Kiota\Models\SecureScore;
use MSPress\Includes\MSGraph\Kiota\Models\SecureScoreControlProfile;
use MSPress\Includes\MSGraph\Kiota\Models\SubjectRightsRequest;
use MSPress\Includes\MSGraph\Kiota\Models\TenantDataSecurityAndGovernance;

/**
 * Security singleton providing access to audit log resources.
*/
class Security extends Entity implements Parsable 
{
    /**
     * @var array<Alert>|null $alerts The alerts property
    */
    private ?array $alerts = null;
    
    /**
     * @var array<Alert>|null $alerts_v2 A collection of alerts in Microsoft 365 Defender.
    */
    private ?array $alerts_v2 = null;
    
    /**
     * @var AttackSimulationRoot|null $attackSimulation The attackSimulation property
    */
    private ?AttackSimulationRoot $attackSimulation = null;
    
    /**
     * @var AuditCoreRoot|null $auditLog The entry point for the audit log query API.
    */
    private ?AuditCoreRoot $auditLog = null;
    
    /**
     * @var CasesRoot|null $cases The cases property
    */
    private ?CasesRoot $cases = null;
    
    /**
     * @var CollaborationRoot|null $collaboration The collaboration property
    */
    private ?CollaborationRoot $collaboration = null;
    
    /**
     * @var TenantDataSecurityAndGovernance|null $dataSecurityAndGovernance The dataSecurityAndGovernance property
    */
    private ?TenantDataSecurityAndGovernance $dataSecurityAndGovernance = null;
    
    /**
     * @var IdentityContainer|null $identities A container for security identities APIs.
    */
    private ?IdentityContainer $identities = null;
    
    /**
     * @var array<Incident>|null $incidents A collection of incidents in Microsoft 365 Defender, each of which is a set of correlated alerts and associated metadata that reflects the story of an attack.
    */
    private ?array $incidents = null;
    
    /**
     * @var LabelsRoot|null $labels The labels property
    */
    private ?LabelsRoot $labels = null;
    
    /**
     * @var array<SecureScoreControlProfile>|null $secureScoreControlProfiles The secureScoreControlProfiles property
    */
    private ?array $secureScoreControlProfiles = null;
    
    /**
     * @var array<SecureScore>|null $secureScores The secureScores property
    */
    private ?array $secureScores = null;
    
    /**
     * @var array<SubjectRightsRequest>|null $subjectRightsRequests The subjectRightsRequests property
    */
    private ?array $subjectRightsRequests = null;
    
    /**
     * @var ThreatIntelligence|null $threatIntelligence The threatIntelligence property
    */
    private ?ThreatIntelligence $threatIntelligence = null;
    
    /**
     * @var TriggersRoot|null $triggers The triggers property
    */
    private ?TriggersRoot $triggers = null;
    
    /**
     * @var TriggerTypesRoot|null $triggerTypes The triggerTypes property
    */
    private ?TriggerTypesRoot $triggerTypes = null;
    
    /**
     * Instantiates a new Security and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Security
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Security {
        return new Security();
    }

    /**
     * Gets the alerts property value. The alerts property
     * @return array<Alert>|null
    */
    public function getAlerts(): ?array {
        return $this->alerts;
    }

    /**
     * Gets the alerts_v2 property value. A collection of alerts in Microsoft 365 Defender.
     * @return array<Alert>|null
    */
    public function getAlertsV2(): ?array {
        return $this->alerts_v2;
    }

    /**
     * Gets the attackSimulation property value. The attackSimulation property
     * @return AttackSimulationRoot|null
    */
    public function getAttackSimulation(): ?AttackSimulationRoot {
        return $this->attackSimulation;
    }

    /**
     * Gets the auditLog property value. The entry point for the audit log query API.
     * @return AuditCoreRoot|null
    */
    public function getAuditLog(): ?AuditCoreRoot {
        return $this->auditLog;
    }

    /**
     * Gets the cases property value. The cases property
     * @return CasesRoot|null
    */
    public function getCases(): ?CasesRoot {
        return $this->cases;
    }

    /**
     * Gets the collaboration property value. The collaboration property
     * @return CollaborationRoot|null
    */
    public function getCollaboration(): ?CollaborationRoot {
        return $this->collaboration;
    }

    /**
     * Gets the dataSecurityAndGovernance property value. The dataSecurityAndGovernance property
     * @return TenantDataSecurityAndGovernance|null
    */
    public function getDataSecurityAndGovernance(): ?TenantDataSecurityAndGovernance {
        return $this->dataSecurityAndGovernance;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'alerts' => fn(ParseNode $n) => $o->setAlerts($n->getCollectionOfObjectValues([Alert::class, 'createFromDiscriminatorValue'])),
            'alerts_v2' => fn(ParseNode $n) => $o->setAlertsV2($n->getCollectionOfObjectValues([Alert::class, 'createFromDiscriminatorValue'])),
            'attackSimulation' => fn(ParseNode $n) => $o->setAttackSimulation($n->getObjectValue([AttackSimulationRoot::class, 'createFromDiscriminatorValue'])),
            'auditLog' => fn(ParseNode $n) => $o->setAuditLog($n->getObjectValue([AuditCoreRoot::class, 'createFromDiscriminatorValue'])),
            'cases' => fn(ParseNode $n) => $o->setCases($n->getObjectValue([CasesRoot::class, 'createFromDiscriminatorValue'])),
            'collaboration' => fn(ParseNode $n) => $o->setCollaboration($n->getObjectValue([CollaborationRoot::class, 'createFromDiscriminatorValue'])),
            'dataSecurityAndGovernance' => fn(ParseNode $n) => $o->setDataSecurityAndGovernance($n->getObjectValue([TenantDataSecurityAndGovernance::class, 'createFromDiscriminatorValue'])),
            'identities' => fn(ParseNode $n) => $o->setIdentities($n->getObjectValue([IdentityContainer::class, 'createFromDiscriminatorValue'])),
            'incidents' => fn(ParseNode $n) => $o->setIncidents($n->getCollectionOfObjectValues([Incident::class, 'createFromDiscriminatorValue'])),
            'labels' => fn(ParseNode $n) => $o->setLabels($n->getObjectValue([LabelsRoot::class, 'createFromDiscriminatorValue'])),
            'secureScoreControlProfiles' => fn(ParseNode $n) => $o->setSecureScoreControlProfiles($n->getCollectionOfObjectValues([SecureScoreControlProfile::class, 'createFromDiscriminatorValue'])),
            'secureScores' => fn(ParseNode $n) => $o->setSecureScores($n->getCollectionOfObjectValues([SecureScore::class, 'createFromDiscriminatorValue'])),
            'subjectRightsRequests' => fn(ParseNode $n) => $o->setSubjectRightsRequests($n->getCollectionOfObjectValues([SubjectRightsRequest::class, 'createFromDiscriminatorValue'])),
            'threatIntelligence' => fn(ParseNode $n) => $o->setThreatIntelligence($n->getObjectValue([ThreatIntelligence::class, 'createFromDiscriminatorValue'])),
            'triggers' => fn(ParseNode $n) => $o->setTriggers($n->getObjectValue([TriggersRoot::class, 'createFromDiscriminatorValue'])),
            'triggerTypes' => fn(ParseNode $n) => $o->setTriggerTypes($n->getObjectValue([TriggerTypesRoot::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the identities property value. A container for security identities APIs.
     * @return IdentityContainer|null
    */
    public function getIdentities(): ?IdentityContainer {
        return $this->identities;
    }

    /**
     * Gets the incidents property value. A collection of incidents in Microsoft 365 Defender, each of which is a set of correlated alerts and associated metadata that reflects the story of an attack.
     * @return array<Incident>|null
    */
    public function getIncidents(): ?array {
        return $this->incidents;
    }

    /**
     * Gets the labels property value. The labels property
     * @return LabelsRoot|null
    */
    public function getLabels(): ?LabelsRoot {
        return $this->labels;
    }

    /**
     * Gets the secureScoreControlProfiles property value. The secureScoreControlProfiles property
     * @return array<SecureScoreControlProfile>|null
    */
    public function getSecureScoreControlProfiles(): ?array {
        return $this->secureScoreControlProfiles;
    }

    /**
     * Gets the secureScores property value. The secureScores property
     * @return array<SecureScore>|null
    */
    public function getSecureScores(): ?array {
        return $this->secureScores;
    }

    /**
     * Gets the subjectRightsRequests property value. The subjectRightsRequests property
     * @return array<SubjectRightsRequest>|null
    */
    public function getSubjectRightsRequests(): ?array {
        return $this->subjectRightsRequests;
    }

    /**
     * Gets the threatIntelligence property value. The threatIntelligence property
     * @return ThreatIntelligence|null
    */
    public function getThreatIntelligence(): ?ThreatIntelligence {
        return $this->threatIntelligence;
    }

    /**
     * Gets the triggers property value. The triggers property
     * @return TriggersRoot|null
    */
    public function getTriggers(): ?TriggersRoot {
        return $this->triggers;
    }

    /**
     * Gets the triggerTypes property value. The triggerTypes property
     * @return TriggerTypesRoot|null
    */
    public function getTriggerTypes(): ?TriggerTypesRoot {
        return $this->triggerTypes;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('alerts', $this->getAlerts());
        $writer->writeCollectionOfObjectValues('alerts_v2', $this->getAlertsV2());
        $writer->writeObjectValue('attackSimulation', $this->getAttackSimulation());
        $writer->writeObjectValue('auditLog', $this->getAuditLog());
        $writer->writeObjectValue('cases', $this->getCases());
        $writer->writeObjectValue('collaboration', $this->getCollaboration());
        $writer->writeObjectValue('dataSecurityAndGovernance', $this->getDataSecurityAndGovernance());
        $writer->writeObjectValue('identities', $this->getIdentities());
        $writer->writeCollectionOfObjectValues('incidents', $this->getIncidents());
        $writer->writeObjectValue('labels', $this->getLabels());
        $writer->writeCollectionOfObjectValues('secureScoreControlProfiles', $this->getSecureScoreControlProfiles());
        $writer->writeCollectionOfObjectValues('secureScores', $this->getSecureScores());
        $writer->writeCollectionOfObjectValues('subjectRightsRequests', $this->getSubjectRightsRequests());
        $writer->writeObjectValue('threatIntelligence', $this->getThreatIntelligence());
        $writer->writeObjectValue('triggers', $this->getTriggers());
        $writer->writeObjectValue('triggerTypes', $this->getTriggerTypes());
    }

    /**
     * Sets the alerts property value. The alerts property
     * @param array<Alert>|null $value Value to set for the alerts property.
    */
    public function setAlerts(?array $value): void {
        $this->alerts = $value;
    }

    /**
     * Sets the alerts_v2 property value. A collection of alerts in Microsoft 365 Defender.
     * @param array<Alert>|null $value Value to set for the alerts_v2 property.
    */
    public function setAlertsV2(?array $value): void {
        $this->alerts_v2 = $value;
    }

    /**
     * Sets the attackSimulation property value. The attackSimulation property
     * @param AttackSimulationRoot|null $value Value to set for the attackSimulation property.
    */
    public function setAttackSimulation(?AttackSimulationRoot $value): void {
        $this->attackSimulation = $value;
    }

    /**
     * Sets the auditLog property value. The entry point for the audit log query API.
     * @param AuditCoreRoot|null $value Value to set for the auditLog property.
    */
    public function setAuditLog(?AuditCoreRoot $value): void {
        $this->auditLog = $value;
    }

    /**
     * Sets the cases property value. The cases property
     * @param CasesRoot|null $value Value to set for the cases property.
    */
    public function setCases(?CasesRoot $value): void {
        $this->cases = $value;
    }

    /**
     * Sets the collaboration property value. The collaboration property
     * @param CollaborationRoot|null $value Value to set for the collaboration property.
    */
    public function setCollaboration(?CollaborationRoot $value): void {
        $this->collaboration = $value;
    }

    /**
     * Sets the dataSecurityAndGovernance property value. The dataSecurityAndGovernance property
     * @param TenantDataSecurityAndGovernance|null $value Value to set for the dataSecurityAndGovernance property.
    */
    public function setDataSecurityAndGovernance(?TenantDataSecurityAndGovernance $value): void {
        $this->dataSecurityAndGovernance = $value;
    }

    /**
     * Sets the identities property value. A container for security identities APIs.
     * @param IdentityContainer|null $value Value to set for the identities property.
    */
    public function setIdentities(?IdentityContainer $value): void {
        $this->identities = $value;
    }

    /**
     * Sets the incidents property value. A collection of incidents in Microsoft 365 Defender, each of which is a set of correlated alerts and associated metadata that reflects the story of an attack.
     * @param array<Incident>|null $value Value to set for the incidents property.
    */
    public function setIncidents(?array $value): void {
        $this->incidents = $value;
    }

    /**
     * Sets the labels property value. The labels property
     * @param LabelsRoot|null $value Value to set for the labels property.
    */
    public function setLabels(?LabelsRoot $value): void {
        $this->labels = $value;
    }

    /**
     * Sets the secureScoreControlProfiles property value. The secureScoreControlProfiles property
     * @param array<SecureScoreControlProfile>|null $value Value to set for the secureScoreControlProfiles property.
    */
    public function setSecureScoreControlProfiles(?array $value): void {
        $this->secureScoreControlProfiles = $value;
    }

    /**
     * Sets the secureScores property value. The secureScores property
     * @param array<SecureScore>|null $value Value to set for the secureScores property.
    */
    public function setSecureScores(?array $value): void {
        $this->secureScores = $value;
    }

    /**
     * Sets the subjectRightsRequests property value. The subjectRightsRequests property
     * @param array<SubjectRightsRequest>|null $value Value to set for the subjectRightsRequests property.
    */
    public function setSubjectRightsRequests(?array $value): void {
        $this->subjectRightsRequests = $value;
    }

    /**
     * Sets the threatIntelligence property value. The threatIntelligence property
     * @param ThreatIntelligence|null $value Value to set for the threatIntelligence property.
    */
    public function setThreatIntelligence(?ThreatIntelligence $value): void {
        $this->threatIntelligence = $value;
    }

    /**
     * Sets the triggers property value. The triggers property
     * @param TriggersRoot|null $value Value to set for the triggers property.
    */
    public function setTriggers(?TriggersRoot $value): void {
        $this->triggers = $value;
    }

    /**
     * Sets the triggerTypes property value. The triggerTypes property
     * @param TriggerTypesRoot|null $value Value to set for the triggerTypes property.
    */
    public function setTriggerTypes(?TriggerTypesRoot $value): void {
        $this->triggerTypes = $value;
    }

}
