<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ApplicationSecurityCompliance implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $cobit Indicates whether the application adheres to the Control Objectives for Information and Related Technologies (COBIT) framework.
    */
    private ?bool $cobit = null;
    
    /**
     * @var bool|null $coppa Indicates whether the application complies with the Children’s Online Privacy Protection Act (COPPA).
    */
    private ?bool $coppa = null;
    
    /**
     * @var CsaStarLevel|null $csaStar Specifies the Cloud Security Alliance (CSA) Security, Trust & Assurance Registry (STAR) certification level. The possible values are: none, attestation, certification, continuousMonitoring, cStarAssessment, selfAssessment, notSupported, unknownFutureValue.
    */
    private ?CsaStarLevel $csaStar = null;
    
    /**
     * @var FedRampLevel|null $fedRamp Specifies the Federal Risk and Authorization Management Program (FedRAMP) certification level. The possible values are: none, high, liSaas, low, moderate, notSupported, unknownFutureValue.
    */
    private ?FedRampLevel $fedRamp = null;
    
    /**
     * @var bool|null $ferpa Indicates whether the application complies with the Family Educational Rights and Privacy Act (FERPA).
    */
    private ?bool $ferpa = null;
    
    /**
     * @var bool|null $ffiec Indicates whether the application meets Federal Financial Institutions Examination Council (FFIEC) requirements.
    */
    private ?bool $ffiec = null;
    
    /**
     * @var bool|null $finra Indicates whether the application complies with Financial Industry Regulatory Authority (FINRA) standards.
    */
    private ?bool $finra = null;
    
    /**
     * @var bool|null $fisma Indicates whether the application complies with the Federal Information Security Management Act (FISMA).
    */
    private ?bool $fisma = null;
    
    /**
     * @var bool|null $gaap Indicates whether the application provider adheres to Generally Accepted Accounting Principles (GAAP).
    */
    private ?bool $gaap = null;
    
    /**
     * @var bool|null $gapp Indicates whether the application adheres to Generally Accepted Privacy Principles (GAPP).
    */
    private ?bool $gapp = null;
    
    /**
     * @var bool|null $glba Indicates whether the application complies with the Gramm–Leach–Bliley Act (GLBA) for financial data protection.
    */
    private ?bool $glba = null;
    
    /**
     * @var bool|null $hipaa Indicates whether the application complies with the Health Insurance Portability and Accountability Act (HIPAA).
    */
    private ?bool $hipaa = null;
    
    /**
     * @var bool|null $hitrust Indicates whether the application holds HITRUST certification, demonstrating alignment with healthcare and data security standards.
    */
    private ?bool $hitrust = null;
    
    /**
     * @var bool|null $isae3402 Indicates whether the application complies with International Standard on Assurance Engagements (ISAE) 3402 requirements.
    */
    private ?bool $isae3402 = null;
    
    /**
     * @var bool|null $iso27001 Indicates whether the application is certified against ISO/IEC 27001 for information security management systems (ISMS).
    */
    private ?bool $iso27001 = null;
    
    /**
     * @var bool|null $iso27002 Indicates whether the application follows ISO/IEC 27002 security control best practices.
    */
    private ?bool $iso27002 = null;
    
    /**
     * @var bool|null $iso27017 Indicates whether the application complies with ISO/IEC 27017 standards for cloud security controls.
    */
    private ?bool $iso27017 = null;
    
    /**
     * @var bool|null $iso27018 Indicates whether the application complies with ISO/IEC 27018 standards for protecting personally identifiable information (PII) in cloud environments.
    */
    private ?bool $iso27018 = null;
    
    /**
     * @var bool|null $itar Indicates whether the application complies with International Traffic in Arms Regulations (ITAR).
    */
    private ?bool $itar = null;
    
    /**
     * @var bool|null $jerichoForumCommandments Indicates whether the application aligns with Jericho Forum security principles for deperimeterized environments.
    */
    private ?bool $jerichoForumCommandments = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var PciVersion|null $pci Specifies the Payment Card Industry (PCI) Data Security Standard (DSS) version the application complies with. The possible values are: none, v321, v4, notSupported, unknownFutureValue.
    */
    private ?PciVersion $pci = null;
    
    /**
     * @var bool|null $privacyShield Indicates whether the application complies with the EU–U.S. Privacy Shield framework for cross-border data transfers.
    */
    private ?bool $privacyShield = null;
    
    /**
     * @var bool|null $safeHarbor Indicates whether the application previously adhered to the U.S.–EU Safe Harbor data transfer framework.
    */
    private ?bool $safeHarbor = null;
    
    /**
     * @var bool|null $soc1 Indicates whether the application provider undergoes a Service Organization Control (SOC) one audit report.
    */
    private ?bool $soc1 = null;
    
    /**
     * @var bool|null $soc2 Indicates whether the application provider undergoes a Service Organization Control (SOC) two audit report.
    */
    private ?bool $soc2 = null;
    
    /**
     * @var bool|null $soc3 Indicates whether the application provider undergoes a Service Organization Control (SOC) three audit report.
    */
    private ?bool $soc3 = null;
    
    /**
     * @var bool|null $sox Indicates whether the application complies with the Sarbanes–Oxley Act (SOX) financial reporting requirements.
    */
    private ?bool $sox = null;
    
    /**
     * @var bool|null $sp800_53 Indicates whether the application aligns with National Institute of Standards and Technology (NIST) Special Publication 800-53 security and privacy controls.
    */
    private ?bool $sp800_53 = null;
    
    /**
     * @var bool|null $ssae16 Indicates whether the application adheres to Statement on Standards for Attestation Engagements (SSAE) No. 16.
    */
    private ?bool $ssae16 = null;
    
    /**
     * @var bool|null $ustr Indicates whether the application complies with U.S. Trade Representative (USTR) data and trade protection requirements.
    */
    private ?bool $ustr = null;
    
    /**
     * Instantiates a new ApplicationSecurityCompliance and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApplicationSecurityCompliance
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApplicationSecurityCompliance {
        return new ApplicationSecurityCompliance();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the cobit property value. Indicates whether the application adheres to the Control Objectives for Information and Related Technologies (COBIT) framework.
     * @return bool|null
    */
    public function getCobit(): ?bool {
        return $this->cobit;
    }

    /**
     * Gets the coppa property value. Indicates whether the application complies with the Children’s Online Privacy Protection Act (COPPA).
     * @return bool|null
    */
    public function getCoppa(): ?bool {
        return $this->coppa;
    }

    /**
     * Gets the csaStar property value. Specifies the Cloud Security Alliance (CSA) Security, Trust & Assurance Registry (STAR) certification level. The possible values are: none, attestation, certification, continuousMonitoring, cStarAssessment, selfAssessment, notSupported, unknownFutureValue.
     * @return CsaStarLevel|null
    */
    public function getCsaStar(): ?CsaStarLevel {
        return $this->csaStar;
    }

    /**
     * Gets the fedRamp property value. Specifies the Federal Risk and Authorization Management Program (FedRAMP) certification level. The possible values are: none, high, liSaas, low, moderate, notSupported, unknownFutureValue.
     * @return FedRampLevel|null
    */
    public function getFedRamp(): ?FedRampLevel {
        return $this->fedRamp;
    }

    /**
     * Gets the ferpa property value. Indicates whether the application complies with the Family Educational Rights and Privacy Act (FERPA).
     * @return bool|null
    */
    public function getFerpa(): ?bool {
        return $this->ferpa;
    }

    /**
     * Gets the ffiec property value. Indicates whether the application meets Federal Financial Institutions Examination Council (FFIEC) requirements.
     * @return bool|null
    */
    public function getFfiec(): ?bool {
        return $this->ffiec;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'cobit' => fn(ParseNode $n) => $o->setCobit($n->getBooleanValue()),
            'coppa' => fn(ParseNode $n) => $o->setCoppa($n->getBooleanValue()),
            'csaStar' => fn(ParseNode $n) => $o->setCsaStar($n->getEnumValue(CsaStarLevel::class)),
            'fedRamp' => fn(ParseNode $n) => $o->setFedRamp($n->getEnumValue(FedRampLevel::class)),
            'ferpa' => fn(ParseNode $n) => $o->setFerpa($n->getBooleanValue()),
            'ffiec' => fn(ParseNode $n) => $o->setFfiec($n->getBooleanValue()),
            'finra' => fn(ParseNode $n) => $o->setFinra($n->getBooleanValue()),
            'fisma' => fn(ParseNode $n) => $o->setFisma($n->getBooleanValue()),
            'gaap' => fn(ParseNode $n) => $o->setGaap($n->getBooleanValue()),
            'gapp' => fn(ParseNode $n) => $o->setGapp($n->getBooleanValue()),
            'glba' => fn(ParseNode $n) => $o->setGlba($n->getBooleanValue()),
            'hipaa' => fn(ParseNode $n) => $o->setHipaa($n->getBooleanValue()),
            'hitrust' => fn(ParseNode $n) => $o->setHitrust($n->getBooleanValue()),
            'isae3402' => fn(ParseNode $n) => $o->setIsae3402($n->getBooleanValue()),
            'iso27001' => fn(ParseNode $n) => $o->setIso27001($n->getBooleanValue()),
            'iso27002' => fn(ParseNode $n) => $o->setIso27002($n->getBooleanValue()),
            'iso27017' => fn(ParseNode $n) => $o->setIso27017($n->getBooleanValue()),
            'iso27018' => fn(ParseNode $n) => $o->setIso27018($n->getBooleanValue()),
            'itar' => fn(ParseNode $n) => $o->setItar($n->getBooleanValue()),
            'jerichoForumCommandments' => fn(ParseNode $n) => $o->setJerichoForumCommandments($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'pci' => fn(ParseNode $n) => $o->setPci($n->getEnumValue(PciVersion::class)),
            'privacyShield' => fn(ParseNode $n) => $o->setPrivacyShield($n->getBooleanValue()),
            'safeHarbor' => fn(ParseNode $n) => $o->setSafeHarbor($n->getBooleanValue()),
            'soc1' => fn(ParseNode $n) => $o->setSoc1($n->getBooleanValue()),
            'soc2' => fn(ParseNode $n) => $o->setSoc2($n->getBooleanValue()),
            'soc3' => fn(ParseNode $n) => $o->setSoc3($n->getBooleanValue()),
            'sox' => fn(ParseNode $n) => $o->setSox($n->getBooleanValue()),
            'sp800_53' => fn(ParseNode $n) => $o->setSp80053($n->getBooleanValue()),
            'ssae16' => fn(ParseNode $n) => $o->setSsae16($n->getBooleanValue()),
            'ustr' => fn(ParseNode $n) => $o->setUstr($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the finra property value. Indicates whether the application complies with Financial Industry Regulatory Authority (FINRA) standards.
     * @return bool|null
    */
    public function getFinra(): ?bool {
        return $this->finra;
    }

    /**
     * Gets the fisma property value. Indicates whether the application complies with the Federal Information Security Management Act (FISMA).
     * @return bool|null
    */
    public function getFisma(): ?bool {
        return $this->fisma;
    }

    /**
     * Gets the gaap property value. Indicates whether the application provider adheres to Generally Accepted Accounting Principles (GAAP).
     * @return bool|null
    */
    public function getGaap(): ?bool {
        return $this->gaap;
    }

    /**
     * Gets the gapp property value. Indicates whether the application adheres to Generally Accepted Privacy Principles (GAPP).
     * @return bool|null
    */
    public function getGapp(): ?bool {
        return $this->gapp;
    }

    /**
     * Gets the glba property value. Indicates whether the application complies with the Gramm–Leach–Bliley Act (GLBA) for financial data protection.
     * @return bool|null
    */
    public function getGlba(): ?bool {
        return $this->glba;
    }

    /**
     * Gets the hipaa property value. Indicates whether the application complies with the Health Insurance Portability and Accountability Act (HIPAA).
     * @return bool|null
    */
    public function getHipaa(): ?bool {
        return $this->hipaa;
    }

    /**
     * Gets the hitrust property value. Indicates whether the application holds HITRUST certification, demonstrating alignment with healthcare and data security standards.
     * @return bool|null
    */
    public function getHitrust(): ?bool {
        return $this->hitrust;
    }

    /**
     * Gets the isae3402 property value. Indicates whether the application complies with International Standard on Assurance Engagements (ISAE) 3402 requirements.
     * @return bool|null
    */
    public function getIsae3402(): ?bool {
        return $this->isae3402;
    }

    /**
     * Gets the iso27001 property value. Indicates whether the application is certified against ISO/IEC 27001 for information security management systems (ISMS).
     * @return bool|null
    */
    public function getIso27001(): ?bool {
        return $this->iso27001;
    }

    /**
     * Gets the iso27002 property value. Indicates whether the application follows ISO/IEC 27002 security control best practices.
     * @return bool|null
    */
    public function getIso27002(): ?bool {
        return $this->iso27002;
    }

    /**
     * Gets the iso27017 property value. Indicates whether the application complies with ISO/IEC 27017 standards for cloud security controls.
     * @return bool|null
    */
    public function getIso27017(): ?bool {
        return $this->iso27017;
    }

    /**
     * Gets the iso27018 property value. Indicates whether the application complies with ISO/IEC 27018 standards for protecting personally identifiable information (PII) in cloud environments.
     * @return bool|null
    */
    public function getIso27018(): ?bool {
        return $this->iso27018;
    }

    /**
     * Gets the itar property value. Indicates whether the application complies with International Traffic in Arms Regulations (ITAR).
     * @return bool|null
    */
    public function getItar(): ?bool {
        return $this->itar;
    }

    /**
     * Gets the jerichoForumCommandments property value. Indicates whether the application aligns with Jericho Forum security principles for deperimeterized environments.
     * @return bool|null
    */
    public function getJerichoForumCommandments(): ?bool {
        return $this->jerichoForumCommandments;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the pci property value. Specifies the Payment Card Industry (PCI) Data Security Standard (DSS) version the application complies with. The possible values are: none, v321, v4, notSupported, unknownFutureValue.
     * @return PciVersion|null
    */
    public function getPci(): ?PciVersion {
        return $this->pci;
    }

    /**
     * Gets the privacyShield property value. Indicates whether the application complies with the EU–U.S. Privacy Shield framework for cross-border data transfers.
     * @return bool|null
    */
    public function getPrivacyShield(): ?bool {
        return $this->privacyShield;
    }

    /**
     * Gets the safeHarbor property value. Indicates whether the application previously adhered to the U.S.–EU Safe Harbor data transfer framework.
     * @return bool|null
    */
    public function getSafeHarbor(): ?bool {
        return $this->safeHarbor;
    }

    /**
     * Gets the soc1 property value. Indicates whether the application provider undergoes a Service Organization Control (SOC) one audit report.
     * @return bool|null
    */
    public function getSoc1(): ?bool {
        return $this->soc1;
    }

    /**
     * Gets the soc2 property value. Indicates whether the application provider undergoes a Service Organization Control (SOC) two audit report.
     * @return bool|null
    */
    public function getSoc2(): ?bool {
        return $this->soc2;
    }

    /**
     * Gets the soc3 property value. Indicates whether the application provider undergoes a Service Organization Control (SOC) three audit report.
     * @return bool|null
    */
    public function getSoc3(): ?bool {
        return $this->soc3;
    }

    /**
     * Gets the sox property value. Indicates whether the application complies with the Sarbanes–Oxley Act (SOX) financial reporting requirements.
     * @return bool|null
    */
    public function getSox(): ?bool {
        return $this->sox;
    }

    /**
     * Gets the sp800_53 property value. Indicates whether the application aligns with National Institute of Standards and Technology (NIST) Special Publication 800-53 security and privacy controls.
     * @return bool|null
    */
    public function getSp80053(): ?bool {
        return $this->sp800_53;
    }

    /**
     * Gets the ssae16 property value. Indicates whether the application adheres to Statement on Standards for Attestation Engagements (SSAE) No. 16.
     * @return bool|null
    */
    public function getSsae16(): ?bool {
        return $this->ssae16;
    }

    /**
     * Gets the ustr property value. Indicates whether the application complies with U.S. Trade Representative (USTR) data and trade protection requirements.
     * @return bool|null
    */
    public function getUstr(): ?bool {
        return $this->ustr;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('cobit', $this->getCobit());
        $writer->writeBooleanValue('coppa', $this->getCoppa());
        $writer->writeEnumValue('csaStar', $this->getCsaStar());
        $writer->writeEnumValue('fedRamp', $this->getFedRamp());
        $writer->writeBooleanValue('ferpa', $this->getFerpa());
        $writer->writeBooleanValue('ffiec', $this->getFfiec());
        $writer->writeBooleanValue('finra', $this->getFinra());
        $writer->writeBooleanValue('fisma', $this->getFisma());
        $writer->writeBooleanValue('gaap', $this->getGaap());
        $writer->writeBooleanValue('gapp', $this->getGapp());
        $writer->writeBooleanValue('glba', $this->getGlba());
        $writer->writeBooleanValue('hipaa', $this->getHipaa());
        $writer->writeBooleanValue('hitrust', $this->getHitrust());
        $writer->writeBooleanValue('isae3402', $this->getIsae3402());
        $writer->writeBooleanValue('iso27001', $this->getIso27001());
        $writer->writeBooleanValue('iso27002', $this->getIso27002());
        $writer->writeBooleanValue('iso27017', $this->getIso27017());
        $writer->writeBooleanValue('iso27018', $this->getIso27018());
        $writer->writeBooleanValue('itar', $this->getItar());
        $writer->writeBooleanValue('jerichoForumCommandments', $this->getJerichoForumCommandments());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('pci', $this->getPci());
        $writer->writeBooleanValue('privacyShield', $this->getPrivacyShield());
        $writer->writeBooleanValue('safeHarbor', $this->getSafeHarbor());
        $writer->writeBooleanValue('soc1', $this->getSoc1());
        $writer->writeBooleanValue('soc2', $this->getSoc2());
        $writer->writeBooleanValue('soc3', $this->getSoc3());
        $writer->writeBooleanValue('sox', $this->getSox());
        $writer->writeBooleanValue('sp800_53', $this->getSp80053());
        $writer->writeBooleanValue('ssae16', $this->getSsae16());
        $writer->writeBooleanValue('ustr', $this->getUstr());
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
     * Sets the cobit property value. Indicates whether the application adheres to the Control Objectives for Information and Related Technologies (COBIT) framework.
     * @param bool|null $value Value to set for the cobit property.
    */
    public function setCobit(?bool $value): void {
        $this->cobit = $value;
    }

    /**
     * Sets the coppa property value. Indicates whether the application complies with the Children’s Online Privacy Protection Act (COPPA).
     * @param bool|null $value Value to set for the coppa property.
    */
    public function setCoppa(?bool $value): void {
        $this->coppa = $value;
    }

    /**
     * Sets the csaStar property value. Specifies the Cloud Security Alliance (CSA) Security, Trust & Assurance Registry (STAR) certification level. The possible values are: none, attestation, certification, continuousMonitoring, cStarAssessment, selfAssessment, notSupported, unknownFutureValue.
     * @param CsaStarLevel|null $value Value to set for the csaStar property.
    */
    public function setCsaStar(?CsaStarLevel $value): void {
        $this->csaStar = $value;
    }

    /**
     * Sets the fedRamp property value. Specifies the Federal Risk and Authorization Management Program (FedRAMP) certification level. The possible values are: none, high, liSaas, low, moderate, notSupported, unknownFutureValue.
     * @param FedRampLevel|null $value Value to set for the fedRamp property.
    */
    public function setFedRamp(?FedRampLevel $value): void {
        $this->fedRamp = $value;
    }

    /**
     * Sets the ferpa property value. Indicates whether the application complies with the Family Educational Rights and Privacy Act (FERPA).
     * @param bool|null $value Value to set for the ferpa property.
    */
    public function setFerpa(?bool $value): void {
        $this->ferpa = $value;
    }

    /**
     * Sets the ffiec property value. Indicates whether the application meets Federal Financial Institutions Examination Council (FFIEC) requirements.
     * @param bool|null $value Value to set for the ffiec property.
    */
    public function setFfiec(?bool $value): void {
        $this->ffiec = $value;
    }

    /**
     * Sets the finra property value. Indicates whether the application complies with Financial Industry Regulatory Authority (FINRA) standards.
     * @param bool|null $value Value to set for the finra property.
    */
    public function setFinra(?bool $value): void {
        $this->finra = $value;
    }

    /**
     * Sets the fisma property value. Indicates whether the application complies with the Federal Information Security Management Act (FISMA).
     * @param bool|null $value Value to set for the fisma property.
    */
    public function setFisma(?bool $value): void {
        $this->fisma = $value;
    }

    /**
     * Sets the gaap property value. Indicates whether the application provider adheres to Generally Accepted Accounting Principles (GAAP).
     * @param bool|null $value Value to set for the gaap property.
    */
    public function setGaap(?bool $value): void {
        $this->gaap = $value;
    }

    /**
     * Sets the gapp property value. Indicates whether the application adheres to Generally Accepted Privacy Principles (GAPP).
     * @param bool|null $value Value to set for the gapp property.
    */
    public function setGapp(?bool $value): void {
        $this->gapp = $value;
    }

    /**
     * Sets the glba property value. Indicates whether the application complies with the Gramm–Leach–Bliley Act (GLBA) for financial data protection.
     * @param bool|null $value Value to set for the glba property.
    */
    public function setGlba(?bool $value): void {
        $this->glba = $value;
    }

    /**
     * Sets the hipaa property value. Indicates whether the application complies with the Health Insurance Portability and Accountability Act (HIPAA).
     * @param bool|null $value Value to set for the hipaa property.
    */
    public function setHipaa(?bool $value): void {
        $this->hipaa = $value;
    }

    /**
     * Sets the hitrust property value. Indicates whether the application holds HITRUST certification, demonstrating alignment with healthcare and data security standards.
     * @param bool|null $value Value to set for the hitrust property.
    */
    public function setHitrust(?bool $value): void {
        $this->hitrust = $value;
    }

    /**
     * Sets the isae3402 property value. Indicates whether the application complies with International Standard on Assurance Engagements (ISAE) 3402 requirements.
     * @param bool|null $value Value to set for the isae3402 property.
    */
    public function setIsae3402(?bool $value): void {
        $this->isae3402 = $value;
    }

    /**
     * Sets the iso27001 property value. Indicates whether the application is certified against ISO/IEC 27001 for information security management systems (ISMS).
     * @param bool|null $value Value to set for the iso27001 property.
    */
    public function setIso27001(?bool $value): void {
        $this->iso27001 = $value;
    }

    /**
     * Sets the iso27002 property value. Indicates whether the application follows ISO/IEC 27002 security control best practices.
     * @param bool|null $value Value to set for the iso27002 property.
    */
    public function setIso27002(?bool $value): void {
        $this->iso27002 = $value;
    }

    /**
     * Sets the iso27017 property value. Indicates whether the application complies with ISO/IEC 27017 standards for cloud security controls.
     * @param bool|null $value Value to set for the iso27017 property.
    */
    public function setIso27017(?bool $value): void {
        $this->iso27017 = $value;
    }

    /**
     * Sets the iso27018 property value. Indicates whether the application complies with ISO/IEC 27018 standards for protecting personally identifiable information (PII) in cloud environments.
     * @param bool|null $value Value to set for the iso27018 property.
    */
    public function setIso27018(?bool $value): void {
        $this->iso27018 = $value;
    }

    /**
     * Sets the itar property value. Indicates whether the application complies with International Traffic in Arms Regulations (ITAR).
     * @param bool|null $value Value to set for the itar property.
    */
    public function setItar(?bool $value): void {
        $this->itar = $value;
    }

    /**
     * Sets the jerichoForumCommandments property value. Indicates whether the application aligns with Jericho Forum security principles for deperimeterized environments.
     * @param bool|null $value Value to set for the jerichoForumCommandments property.
    */
    public function setJerichoForumCommandments(?bool $value): void {
        $this->jerichoForumCommandments = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the pci property value. Specifies the Payment Card Industry (PCI) Data Security Standard (DSS) version the application complies with. The possible values are: none, v321, v4, notSupported, unknownFutureValue.
     * @param PciVersion|null $value Value to set for the pci property.
    */
    public function setPci(?PciVersion $value): void {
        $this->pci = $value;
    }

    /**
     * Sets the privacyShield property value. Indicates whether the application complies with the EU–U.S. Privacy Shield framework for cross-border data transfers.
     * @param bool|null $value Value to set for the privacyShield property.
    */
    public function setPrivacyShield(?bool $value): void {
        $this->privacyShield = $value;
    }

    /**
     * Sets the safeHarbor property value. Indicates whether the application previously adhered to the U.S.–EU Safe Harbor data transfer framework.
     * @param bool|null $value Value to set for the safeHarbor property.
    */
    public function setSafeHarbor(?bool $value): void {
        $this->safeHarbor = $value;
    }

    /**
     * Sets the soc1 property value. Indicates whether the application provider undergoes a Service Organization Control (SOC) one audit report.
     * @param bool|null $value Value to set for the soc1 property.
    */
    public function setSoc1(?bool $value): void {
        $this->soc1 = $value;
    }

    /**
     * Sets the soc2 property value. Indicates whether the application provider undergoes a Service Organization Control (SOC) two audit report.
     * @param bool|null $value Value to set for the soc2 property.
    */
    public function setSoc2(?bool $value): void {
        $this->soc2 = $value;
    }

    /**
     * Sets the soc3 property value. Indicates whether the application provider undergoes a Service Organization Control (SOC) three audit report.
     * @param bool|null $value Value to set for the soc3 property.
    */
    public function setSoc3(?bool $value): void {
        $this->soc3 = $value;
    }

    /**
     * Sets the sox property value. Indicates whether the application complies with the Sarbanes–Oxley Act (SOX) financial reporting requirements.
     * @param bool|null $value Value to set for the sox property.
    */
    public function setSox(?bool $value): void {
        $this->sox = $value;
    }

    /**
     * Sets the sp800_53 property value. Indicates whether the application aligns with National Institute of Standards and Technology (NIST) Special Publication 800-53 security and privacy controls.
     * @param bool|null $value Value to set for the sp800_53 property.
    */
    public function setSp80053(?bool $value): void {
        $this->sp800_53 = $value;
    }

    /**
     * Sets the ssae16 property value. Indicates whether the application adheres to Statement on Standards for Attestation Engagements (SSAE) No. 16.
     * @param bool|null $value Value to set for the ssae16 property.
    */
    public function setSsae16(?bool $value): void {
        $this->ssae16 = $value;
    }

    /**
     * Sets the ustr property value. Indicates whether the application complies with U.S. Trade Representative (USTR) data and trade protection requirements.
     * @param bool|null $value Value to set for the ustr property.
    */
    public function setUstr(?bool $value): void {
        $this->ustr = $value;
    }

}
