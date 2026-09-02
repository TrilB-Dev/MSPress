<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\Date;

class ApplicationRiskFactorGeneralInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $consumerPopularity Indicates the relative popularity or adoption of the application based on the user or tenant usage metrics.
    */
    private ?int $consumerPopularity = null;
    
    /**
     * @var Date|null $domainRegistrationDate Specifies the date when the application's primary domain was registered, used to assess domain maturity and legitimacy.
    */
    private ?Date $domainRegistrationDate = null;
    
    /**
     * @var int|null $founded Year the company or organization behind the application was founded.
    */
    private ?int $founded = null;
    
    /**
     * @var bool|null $hasDisasterRecoveryPlan Indicates whether the application provider maintains a disaster recovery or business continuity plan.
    */
    private ?bool $hasDisasterRecoveryPlan = null;
    
    /**
     * @var HoldType|null $hold The hold property
    */
    private ?HoldType $hold = null;
    
    /**
     * @var string|null $hostingCompanyName Specifies the name of the company or provider that hosts the application's infrastructure.
    */
    private ?string $hostingCompanyName = null;
    
    /**
     * @var ApplicationLocation|null $location Provides the geographical and operational location information for the application, including data center and headquarters regions.
    */
    private ?ApplicationLocation $location = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $privacyPolicy Specifies the URL of the application's privacy policy.
    */
    private ?string $privacyPolicy = null;
    
    /**
     * @var ApplicationDataType|null $processedDataTypes The processedDataTypes property
    */
    private ?ApplicationDataType $processedDataTypes = null;
    
    /**
     * @var string|null $termsOfService Specifies the URL of the application's terms of service.
    */
    private ?string $termsOfService = null;
    
    /**
     * Instantiates a new ApplicationRiskFactorGeneralInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApplicationRiskFactorGeneralInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApplicationRiskFactorGeneralInfo {
        return new ApplicationRiskFactorGeneralInfo();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the consumerPopularity property value. Indicates the relative popularity or adoption of the application based on the user or tenant usage metrics.
     * @return int|null
    */
    public function getConsumerPopularity(): ?int {
        return $this->consumerPopularity;
    }

    /**
     * Gets the domainRegistrationDate property value. Specifies the date when the application's primary domain was registered, used to assess domain maturity and legitimacy.
     * @return Date|null
    */
    public function getDomainRegistrationDate(): ?Date {
        return $this->domainRegistrationDate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'consumerPopularity' => fn(ParseNode $n) => $o->setConsumerPopularity($n->getIntegerValue()),
            'domainRegistrationDate' => fn(ParseNode $n) => $o->setDomainRegistrationDate($n->getDateValue()),
            'founded' => fn(ParseNode $n) => $o->setFounded($n->getIntegerValue()),
            'hasDisasterRecoveryPlan' => fn(ParseNode $n) => $o->setHasDisasterRecoveryPlan($n->getBooleanValue()),
            'hold' => fn(ParseNode $n) => $o->setHold($n->getEnumValue(HoldType::class)),
            'hostingCompanyName' => fn(ParseNode $n) => $o->setHostingCompanyName($n->getStringValue()),
            'location' => fn(ParseNode $n) => $o->setLocation($n->getObjectValue([ApplicationLocation::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'privacyPolicy' => fn(ParseNode $n) => $o->setPrivacyPolicy($n->getStringValue()),
            'processedDataTypes' => fn(ParseNode $n) => $o->setProcessedDataTypes($n->getEnumValue(ApplicationDataType::class)),
            'termsOfService' => fn(ParseNode $n) => $o->setTermsOfService($n->getStringValue()),
        ];
    }

    /**
     * Gets the founded property value. Year the company or organization behind the application was founded.
     * @return int|null
    */
    public function getFounded(): ?int {
        return $this->founded;
    }

    /**
     * Gets the hasDisasterRecoveryPlan property value. Indicates whether the application provider maintains a disaster recovery or business continuity plan.
     * @return bool|null
    */
    public function getHasDisasterRecoveryPlan(): ?bool {
        return $this->hasDisasterRecoveryPlan;
    }

    /**
     * Gets the hold property value. The hold property
     * @return HoldType|null
    */
    public function getHold(): ?HoldType {
        return $this->hold;
    }

    /**
     * Gets the hostingCompanyName property value. Specifies the name of the company or provider that hosts the application's infrastructure.
     * @return string|null
    */
    public function getHostingCompanyName(): ?string {
        return $this->hostingCompanyName;
    }

    /**
     * Gets the location property value. Provides the geographical and operational location information for the application, including data center and headquarters regions.
     * @return ApplicationLocation|null
    */
    public function getLocation(): ?ApplicationLocation {
        return $this->location;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the privacyPolicy property value. Specifies the URL of the application's privacy policy.
     * @return string|null
    */
    public function getPrivacyPolicy(): ?string {
        return $this->privacyPolicy;
    }

    /**
     * Gets the processedDataTypes property value. The processedDataTypes property
     * @return ApplicationDataType|null
    */
    public function getProcessedDataTypes(): ?ApplicationDataType {
        return $this->processedDataTypes;
    }

    /**
     * Gets the termsOfService property value. Specifies the URL of the application's terms of service.
     * @return string|null
    */
    public function getTermsOfService(): ?string {
        return $this->termsOfService;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('consumerPopularity', $this->getConsumerPopularity());
        $writer->writeDateValue('domainRegistrationDate', $this->getDomainRegistrationDate());
        $writer->writeIntegerValue('founded', $this->getFounded());
        $writer->writeBooleanValue('hasDisasterRecoveryPlan', $this->getHasDisasterRecoveryPlan());
        $writer->writeEnumValue('hold', $this->getHold());
        $writer->writeStringValue('hostingCompanyName', $this->getHostingCompanyName());
        $writer->writeObjectValue('location', $this->getLocation());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('privacyPolicy', $this->getPrivacyPolicy());
        $writer->writeEnumValue('processedDataTypes', $this->getProcessedDataTypes());
        $writer->writeStringValue('termsOfService', $this->getTermsOfService());
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
     * Sets the consumerPopularity property value. Indicates the relative popularity or adoption of the application based on the user or tenant usage metrics.
     * @param int|null $value Value to set for the consumerPopularity property.
    */
    public function setConsumerPopularity(?int $value): void {
        $this->consumerPopularity = $value;
    }

    /**
     * Sets the domainRegistrationDate property value. Specifies the date when the application's primary domain was registered, used to assess domain maturity and legitimacy.
     * @param Date|null $value Value to set for the domainRegistrationDate property.
    */
    public function setDomainRegistrationDate(?Date $value): void {
        $this->domainRegistrationDate = $value;
    }

    /**
     * Sets the founded property value. Year the company or organization behind the application was founded.
     * @param int|null $value Value to set for the founded property.
    */
    public function setFounded(?int $value): void {
        $this->founded = $value;
    }

    /**
     * Sets the hasDisasterRecoveryPlan property value. Indicates whether the application provider maintains a disaster recovery or business continuity plan.
     * @param bool|null $value Value to set for the hasDisasterRecoveryPlan property.
    */
    public function setHasDisasterRecoveryPlan(?bool $value): void {
        $this->hasDisasterRecoveryPlan = $value;
    }

    /**
     * Sets the hold property value. The hold property
     * @param HoldType|null $value Value to set for the hold property.
    */
    public function setHold(?HoldType $value): void {
        $this->hold = $value;
    }

    /**
     * Sets the hostingCompanyName property value. Specifies the name of the company or provider that hosts the application's infrastructure.
     * @param string|null $value Value to set for the hostingCompanyName property.
    */
    public function setHostingCompanyName(?string $value): void {
        $this->hostingCompanyName = $value;
    }

    /**
     * Sets the location property value. Provides the geographical and operational location information for the application, including data center and headquarters regions.
     * @param ApplicationLocation|null $value Value to set for the location property.
    */
    public function setLocation(?ApplicationLocation $value): void {
        $this->location = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the privacyPolicy property value. Specifies the URL of the application's privacy policy.
     * @param string|null $value Value to set for the privacyPolicy property.
    */
    public function setPrivacyPolicy(?string $value): void {
        $this->privacyPolicy = $value;
    }

    /**
     * Sets the processedDataTypes property value. The processedDataTypes property
     * @param ApplicationDataType|null $value Value to set for the processedDataTypes property.
    */
    public function setProcessedDataTypes(?ApplicationDataType $value): void {
        $this->processedDataTypes = $value;
    }

    /**
     * Sets the termsOfService property value. Specifies the URL of the application's terms of service.
     * @param string|null $value Value to set for the termsOfService property.
    */
    public function setTermsOfService(?string $value): void {
        $this->termsOfService = $value;
    }

}
