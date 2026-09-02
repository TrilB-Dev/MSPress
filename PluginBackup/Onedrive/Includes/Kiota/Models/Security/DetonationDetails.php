<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DetonationDetails implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DateTime|null $analysisDateTime The time of detonation.
    */
    private ?DateTime $analysisDateTime = null;
    
    /**
     * @var array<CompromiseIndicator>|null $compromiseIndicators Represents indicators and its associated verdict that suggests whether an email is compromised.
    */
    private ?array $compromiseIndicators = null;
    
    /**
     * @var DetonationBehaviourDetails|null $detonationBehaviourDetails Shows the exact events that took place during detonation, and problematic or benign observations that contain URLs, IPs, domains, and files that were found during detonation. This property is deprecated and still stop returning data in March 2026. Use the detonationBehaviourDetailsV2 property instead.
    */
    private ?DetonationBehaviourDetails $detonationBehaviourDetails = null;
    
    /**
     * @var string|null $detonationBehaviourDetailsV2 Shows the exact events that took place during detonation, and problematic or benign observations that contain URLs, IPs, domains, and files that were found during detonation in a JSON format.
    */
    private ?string $detonationBehaviourDetailsV2 = null;
    
    /**
     * @var DetonationChain|null $detonationChain The chain of detonation.
    */
    private ?DetonationChain $detonationChain = null;
    
    /**
     * @var DetonationObservables|null $detonationObservables All observables in the detonation tree.
    */
    private ?DetonationObservables $detonationObservables = null;
    
    /**
     * @var string|null $detonationScreenshotUri Show any screenshots that were captured during detonation. No screenshots are captured if the URL opens into a link that directly downloads a file. However, you see the downloaded file in the detonation chain.
    */
    private ?string $detonationScreenshotUri = null;
    
    /**
     * @var string|null $detonationVerdict The verdict of the detonation.
    */
    private ?string $detonationVerdict = null;
    
    /**
     * @var string|null $detonationVerdictReason The reason for the verdict of the detonation.
    */
    private ?string $detonationVerdictReason = null;
    
    /**
     * @var string|null $entityMetadata Additional metadata about the entity in JSON format.
    */
    private ?string $entityMetadata = null;
    
    /**
     * @var string|null $mitreTechniques The attack techniques, as aligned with the MITRE ATT&CK framework.
    */
    private ?string $mitreTechniques = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $staticAnalysis The results of static analysis performed on the file or URL.
    */
    private ?string $staticAnalysis = null;
    
    /**
     * @var string|null $submissionSource The source of the submission.
    */
    private ?string $submissionSource = null;
    
    /**
     * Instantiates a new DetonationDetails and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DetonationDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DetonationDetails {
        return new DetonationDetails();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the analysisDateTime property value. The time of detonation.
     * @return DateTime|null
    */
    public function getAnalysisDateTime(): ?DateTime {
        return $this->analysisDateTime;
    }

    /**
     * Gets the compromiseIndicators property value. Represents indicators and its associated verdict that suggests whether an email is compromised.
     * @return array<CompromiseIndicator>|null
    */
    public function getCompromiseIndicators(): ?array {
        return $this->compromiseIndicators;
    }

    /**
     * Gets the detonationBehaviourDetails property value. Shows the exact events that took place during detonation, and problematic or benign observations that contain URLs, IPs, domains, and files that were found during detonation. This property is deprecated and still stop returning data in March 2026. Use the detonationBehaviourDetailsV2 property instead.
     * @return DetonationBehaviourDetails|null
    */
    public function getDetonationBehaviourDetails(): ?DetonationBehaviourDetails {
        return $this->detonationBehaviourDetails;
    }

    /**
     * Gets the detonationBehaviourDetailsV2 property value. Shows the exact events that took place during detonation, and problematic or benign observations that contain URLs, IPs, domains, and files that were found during detonation in a JSON format.
     * @return string|null
    */
    public function getDetonationBehaviourDetailsV2(): ?string {
        return $this->detonationBehaviourDetailsV2;
    }

    /**
     * Gets the detonationChain property value. The chain of detonation.
     * @return DetonationChain|null
    */
    public function getDetonationChain(): ?DetonationChain {
        return $this->detonationChain;
    }

    /**
     * Gets the detonationObservables property value. All observables in the detonation tree.
     * @return DetonationObservables|null
    */
    public function getDetonationObservables(): ?DetonationObservables {
        return $this->detonationObservables;
    }

    /**
     * Gets the detonationScreenshotUri property value. Show any screenshots that were captured during detonation. No screenshots are captured if the URL opens into a link that directly downloads a file. However, you see the downloaded file in the detonation chain.
     * @return string|null
    */
    public function getDetonationScreenshotUri(): ?string {
        return $this->detonationScreenshotUri;
    }

    /**
     * Gets the detonationVerdict property value. The verdict of the detonation.
     * @return string|null
    */
    public function getDetonationVerdict(): ?string {
        return $this->detonationVerdict;
    }

    /**
     * Gets the detonationVerdictReason property value. The reason for the verdict of the detonation.
     * @return string|null
    */
    public function getDetonationVerdictReason(): ?string {
        return $this->detonationVerdictReason;
    }

    /**
     * Gets the entityMetadata property value. Additional metadata about the entity in JSON format.
     * @return string|null
    */
    public function getEntityMetadata(): ?string {
        return $this->entityMetadata;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'analysisDateTime' => fn(ParseNode $n) => $o->setAnalysisDateTime($n->getDateTimeValue()),
            'compromiseIndicators' => fn(ParseNode $n) => $o->setCompromiseIndicators($n->getCollectionOfObjectValues([CompromiseIndicator::class, 'createFromDiscriminatorValue'])),
            'detonationBehaviourDetails' => fn(ParseNode $n) => $o->setDetonationBehaviourDetails($n->getObjectValue([DetonationBehaviourDetails::class, 'createFromDiscriminatorValue'])),
            'detonationBehaviourDetailsV2' => fn(ParseNode $n) => $o->setDetonationBehaviourDetailsV2($n->getStringValue()),
            'detonationChain' => fn(ParseNode $n) => $o->setDetonationChain($n->getObjectValue([DetonationChain::class, 'createFromDiscriminatorValue'])),
            'detonationObservables' => fn(ParseNode $n) => $o->setDetonationObservables($n->getObjectValue([DetonationObservables::class, 'createFromDiscriminatorValue'])),
            'detonationScreenshotUri' => fn(ParseNode $n) => $o->setDetonationScreenshotUri($n->getStringValue()),
            'detonationVerdict' => fn(ParseNode $n) => $o->setDetonationVerdict($n->getStringValue()),
            'detonationVerdictReason' => fn(ParseNode $n) => $o->setDetonationVerdictReason($n->getStringValue()),
            'entityMetadata' => fn(ParseNode $n) => $o->setEntityMetadata($n->getStringValue()),
            'mitreTechniques' => fn(ParseNode $n) => $o->setMitreTechniques($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'staticAnalysis' => fn(ParseNode $n) => $o->setStaticAnalysis($n->getStringValue()),
            'submissionSource' => fn(ParseNode $n) => $o->setSubmissionSource($n->getStringValue()),
        ];
    }

    /**
     * Gets the mitreTechniques property value. The attack techniques, as aligned with the MITRE ATT&CK framework.
     * @return string|null
    */
    public function getMitreTechniques(): ?string {
        return $this->mitreTechniques;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the staticAnalysis property value. The results of static analysis performed on the file or URL.
     * @return string|null
    */
    public function getStaticAnalysis(): ?string {
        return $this->staticAnalysis;
    }

    /**
     * Gets the submissionSource property value. The source of the submission.
     * @return string|null
    */
    public function getSubmissionSource(): ?string {
        return $this->submissionSource;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeDateTimeValue('analysisDateTime', $this->getAnalysisDateTime());
        $writer->writeCollectionOfObjectValues('compromiseIndicators', $this->getCompromiseIndicators());
        $writer->writeObjectValue('detonationBehaviourDetails', $this->getDetonationBehaviourDetails());
        $writer->writeStringValue('detonationBehaviourDetailsV2', $this->getDetonationBehaviourDetailsV2());
        $writer->writeObjectValue('detonationChain', $this->getDetonationChain());
        $writer->writeObjectValue('detonationObservables', $this->getDetonationObservables());
        $writer->writeStringValue('detonationScreenshotUri', $this->getDetonationScreenshotUri());
        $writer->writeStringValue('detonationVerdict', $this->getDetonationVerdict());
        $writer->writeStringValue('detonationVerdictReason', $this->getDetonationVerdictReason());
        $writer->writeStringValue('entityMetadata', $this->getEntityMetadata());
        $writer->writeStringValue('mitreTechniques', $this->getMitreTechniques());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('staticAnalysis', $this->getStaticAnalysis());
        $writer->writeStringValue('submissionSource', $this->getSubmissionSource());
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
     * Sets the analysisDateTime property value. The time of detonation.
     * @param DateTime|null $value Value to set for the analysisDateTime property.
    */
    public function setAnalysisDateTime(?DateTime $value): void {
        $this->analysisDateTime = $value;
    }

    /**
     * Sets the compromiseIndicators property value. Represents indicators and its associated verdict that suggests whether an email is compromised.
     * @param array<CompromiseIndicator>|null $value Value to set for the compromiseIndicators property.
    */
    public function setCompromiseIndicators(?array $value): void {
        $this->compromiseIndicators = $value;
    }

    /**
     * Sets the detonationBehaviourDetails property value. Shows the exact events that took place during detonation, and problematic or benign observations that contain URLs, IPs, domains, and files that were found during detonation. This property is deprecated and still stop returning data in March 2026. Use the detonationBehaviourDetailsV2 property instead.
     * @param DetonationBehaviourDetails|null $value Value to set for the detonationBehaviourDetails property.
    */
    public function setDetonationBehaviourDetails(?DetonationBehaviourDetails $value): void {
        $this->detonationBehaviourDetails = $value;
    }

    /**
     * Sets the detonationBehaviourDetailsV2 property value. Shows the exact events that took place during detonation, and problematic or benign observations that contain URLs, IPs, domains, and files that were found during detonation in a JSON format.
     * @param string|null $value Value to set for the detonationBehaviourDetailsV2 property.
    */
    public function setDetonationBehaviourDetailsV2(?string $value): void {
        $this->detonationBehaviourDetailsV2 = $value;
    }

    /**
     * Sets the detonationChain property value. The chain of detonation.
     * @param DetonationChain|null $value Value to set for the detonationChain property.
    */
    public function setDetonationChain(?DetonationChain $value): void {
        $this->detonationChain = $value;
    }

    /**
     * Sets the detonationObservables property value. All observables in the detonation tree.
     * @param DetonationObservables|null $value Value to set for the detonationObservables property.
    */
    public function setDetonationObservables(?DetonationObservables $value): void {
        $this->detonationObservables = $value;
    }

    /**
     * Sets the detonationScreenshotUri property value. Show any screenshots that were captured during detonation. No screenshots are captured if the URL opens into a link that directly downloads a file. However, you see the downloaded file in the detonation chain.
     * @param string|null $value Value to set for the detonationScreenshotUri property.
    */
    public function setDetonationScreenshotUri(?string $value): void {
        $this->detonationScreenshotUri = $value;
    }

    /**
     * Sets the detonationVerdict property value. The verdict of the detonation.
     * @param string|null $value Value to set for the detonationVerdict property.
    */
    public function setDetonationVerdict(?string $value): void {
        $this->detonationVerdict = $value;
    }

    /**
     * Sets the detonationVerdictReason property value. The reason for the verdict of the detonation.
     * @param string|null $value Value to set for the detonationVerdictReason property.
    */
    public function setDetonationVerdictReason(?string $value): void {
        $this->detonationVerdictReason = $value;
    }

    /**
     * Sets the entityMetadata property value. Additional metadata about the entity in JSON format.
     * @param string|null $value Value to set for the entityMetadata property.
    */
    public function setEntityMetadata(?string $value): void {
        $this->entityMetadata = $value;
    }

    /**
     * Sets the mitreTechniques property value. The attack techniques, as aligned with the MITRE ATT&CK framework.
     * @param string|null $value Value to set for the mitreTechniques property.
    */
    public function setMitreTechniques(?string $value): void {
        $this->mitreTechniques = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the staticAnalysis property value. The results of static analysis performed on the file or URL.
     * @param string|null $value Value to set for the staticAnalysis property.
    */
    public function setStaticAnalysis(?string $value): void {
        $this->staticAnalysis = $value;
    }

    /**
     * Sets the submissionSource property value. The source of the submission.
     * @param string|null $value Value to set for the submissionSource property.
    */
    public function setSubmissionSource(?string $value): void {
        $this->submissionSource = $value;
    }

}
