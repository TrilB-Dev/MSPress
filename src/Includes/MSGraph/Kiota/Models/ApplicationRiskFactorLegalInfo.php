<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ApplicationRiskFactorLegalInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DataRetentionLevel|null $dataRetention The dataRetention property
    */
    private ?DataRetentionLevel $dataRetention = null;
    
    /**
     * @var ApplicationRiskFactorLegalInfoGdpr|null $gdpr The gdpr property
    */
    private ?ApplicationRiskFactorLegalInfoGdpr $gdpr = null;
    
    /**
     * @var bool|null $hasDataOwnership Indicates whether customers maintain ownership and control of their data processed or stored by the application.
    */
    private ?bool $hasDataOwnership = null;
    
    /**
     * @var bool|null $hasDmca Indicates whether the application or organization complies with the Digital Millennium Copyright Act (DMCA) or equivalent copyright protection frameworks.
    */
    private ?bool $hasDmca = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new ApplicationRiskFactorLegalInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApplicationRiskFactorLegalInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApplicationRiskFactorLegalInfo {
        return new ApplicationRiskFactorLegalInfo();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dataRetention property value. The dataRetention property
     * @return DataRetentionLevel|null
    */
    public function getDataRetention(): ?DataRetentionLevel {
        return $this->dataRetention;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dataRetention' => fn(ParseNode $n) => $o->setDataRetention($n->getEnumValue(DataRetentionLevel::class)),
            'gdpr' => fn(ParseNode $n) => $o->setGdpr($n->getObjectValue([ApplicationRiskFactorLegalInfoGdpr::class, 'createFromDiscriminatorValue'])),
            'hasDataOwnership' => fn(ParseNode $n) => $o->setHasDataOwnership($n->getBooleanValue()),
            'hasDmca' => fn(ParseNode $n) => $o->setHasDmca($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the gdpr property value. The gdpr property
     * @return ApplicationRiskFactorLegalInfoGdpr|null
    */
    public function getGdpr(): ?ApplicationRiskFactorLegalInfoGdpr {
        return $this->gdpr;
    }

    /**
     * Gets the hasDataOwnership property value. Indicates whether customers maintain ownership and control of their data processed or stored by the application.
     * @return bool|null
    */
    public function getHasDataOwnership(): ?bool {
        return $this->hasDataOwnership;
    }

    /**
     * Gets the hasDmca property value. Indicates whether the application or organization complies with the Digital Millennium Copyright Act (DMCA) or equivalent copyright protection frameworks.
     * @return bool|null
    */
    public function getHasDmca(): ?bool {
        return $this->hasDmca;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('dataRetention', $this->getDataRetention());
        $writer->writeObjectValue('gdpr', $this->getGdpr());
        $writer->writeBooleanValue('hasDataOwnership', $this->getHasDataOwnership());
        $writer->writeBooleanValue('hasDmca', $this->getHasDmca());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the dataRetention property value. The dataRetention property
     * @param DataRetentionLevel|null $value Value to set for the dataRetention property.
    */
    public function setDataRetention(?DataRetentionLevel $value): void {
        $this->dataRetention = $value;
    }

    /**
     * Sets the gdpr property value. The gdpr property
     * @param ApplicationRiskFactorLegalInfoGdpr|null $value Value to set for the gdpr property.
    */
    public function setGdpr(?ApplicationRiskFactorLegalInfoGdpr $value): void {
        $this->gdpr = $value;
    }

    /**
     * Sets the hasDataOwnership property value. Indicates whether customers maintain ownership and control of their data processed or stored by the application.
     * @param bool|null $value Value to set for the hasDataOwnership property.
    */
    public function setHasDataOwnership(?bool $value): void {
        $this->hasDataOwnership = $value;
    }

    /**
     * Sets the hasDmca property value. Indicates whether the application or organization complies with the Digital Millennium Copyright Act (DMCA) or equivalent copyright protection frameworks.
     * @param bool|null $value Value to set for the hasDmca property.
    */
    public function setHasDmca(?bool $value): void {
        $this->hasDmca = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
