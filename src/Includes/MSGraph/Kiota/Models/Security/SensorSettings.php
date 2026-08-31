<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class SensorSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $description Description of the sensor.
    */
    private ?string $description = null;
    
    /**
     * @var array<string>|null $domainControllerDnsNames DNS names for the domain controller
    */
    private ?array $domainControllerDnsNames = null;
    
    /**
     * @var bool|null $isDelayedDeploymentEnabled Indicates whether to delay updates for the sensor.
    */
    private ?bool $isDelayedDeploymentEnabled = null;
    
    /**
     * @var array<NetworkAdapter>|null $networkAdapters The networkAdapters property
    */
    private ?array $networkAdapters = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new SensorSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SensorSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SensorSettings {
        return new SensorSettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the description property value. Description of the sensor.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the domainControllerDnsNames property value. DNS names for the domain controller
     * @return array<string>|null
    */
    public function getDomainControllerDnsNames(): ?array {
        return $this->domainControllerDnsNames;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'domainControllerDnsNames' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDomainControllerDnsNames($val);
            },
            'isDelayedDeploymentEnabled' => fn(ParseNode $n) => $o->setIsDelayedDeploymentEnabled($n->getBooleanValue()),
            'networkAdapters' => fn(ParseNode $n) => $o->setNetworkAdapters($n->getCollectionOfObjectValues([NetworkAdapter::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isDelayedDeploymentEnabled property value. Indicates whether to delay updates for the sensor.
     * @return bool|null
    */
    public function getIsDelayedDeploymentEnabled(): ?bool {
        return $this->isDelayedDeploymentEnabled;
    }

    /**
     * Gets the networkAdapters property value. The networkAdapters property
     * @return array<NetworkAdapter>|null
    */
    public function getNetworkAdapters(): ?array {
        return $this->networkAdapters;
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
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeCollectionOfPrimitiveValues('domainControllerDnsNames', $this->getDomainControllerDnsNames());
        $writer->writeBooleanValue('isDelayedDeploymentEnabled', $this->getIsDelayedDeploymentEnabled());
        $writer->writeCollectionOfObjectValues('networkAdapters', $this->getNetworkAdapters());
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
     * Sets the description property value. Description of the sensor.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the domainControllerDnsNames property value. DNS names for the domain controller
     * @param array<string>|null $value Value to set for the domainControllerDnsNames property.
    */
    public function setDomainControllerDnsNames(?array $value): void {
        $this->domainControllerDnsNames = $value;
    }

    /**
     * Sets the isDelayedDeploymentEnabled property value. Indicates whether to delay updates for the sensor.
     * @param bool|null $value Value to set for the isDelayedDeploymentEnabled property.
    */
    public function setIsDelayedDeploymentEnabled(?bool $value): void {
        $this->isDelayedDeploymentEnabled = $value;
    }

    /**
     * Sets the networkAdapters property value. The networkAdapters property
     * @param array<NetworkAdapter>|null $value Value to set for the networkAdapters property.
    */
    public function setNetworkAdapters(?array $value): void {
        $this->networkAdapters = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
