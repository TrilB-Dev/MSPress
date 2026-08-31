<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class IoTDeviceEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $deviceId The device ID.
    */
    private ?string $deviceId = null;
    
    /**
     * @var string|null $deviceName The friendly name of the device.
    */
    private ?string $deviceName = null;
    
    /**
     * @var string|null $devicePageLink The URL to the device page in the IoT Defender portal.
    */
    private ?string $devicePageLink = null;
    
    /**
     * @var string|null $deviceSubType The device subtype.
    */
    private ?string $deviceSubType = null;
    
    /**
     * @var string|null $deviceType The type of the device. For example, 'temperature sensor,' 'freezer,' 'wind turbine,' and so on.
    */
    private ?string $deviceType = null;
    
    /**
     * @var IoTDeviceImportanceType|null $importance The importance level for the IoT device. The possible values are: unknown, low, normal, high, unknownFutureValue.
    */
    private ?IoTDeviceImportanceType $importance = null;
    
    /**
     * @var AzureResourceEvidence|null $ioTHub The azureResourceEvidence entity that represents the IoT Hub that the device belongs to.
    */
    private ?AzureResourceEvidence $ioTHub = null;
    
    /**
     * @var string|null $ioTSecurityAgentId The ID of the Azure Security Center for the IoT agent that is running on the device.
    */
    private ?string $ioTSecurityAgentId = null;
    
    /**
     * @var IpEvidence|null $ipAddress The current IP address of the device.
    */
    private ?IpEvidence $ipAddress = null;
    
    /**
     * @var bool|null $isAuthorized Indicates whether the device classified as an authorized device.
    */
    private ?bool $isAuthorized = null;
    
    /**
     * @var bool|null $isProgramming Indicates whether the device classified as a programming device.
    */
    private ?bool $isProgramming = null;
    
    /**
     * @var bool|null $isScanner Indicates whether the device classified as a scanner.
    */
    private ?bool $isScanner = null;
    
    /**
     * @var string|null $macAddress The MAC address of the device.
    */
    private ?string $macAddress = null;
    
    /**
     * @var string|null $manufacturer The manufacturer of the device.
    */
    private ?string $manufacturer = null;
    
    /**
     * @var string|null $model The model of the device.
    */
    private ?string $model = null;
    
    /**
     * @var array<NicEvidence>|null $nics The current network interface controllers on the device.
    */
    private ?array $nics = null;
    
    /**
     * @var string|null $operatingSystem The operating system the device is running.
    */
    private ?string $operatingSystem = null;
    
    /**
     * @var array<string>|null $owners The owners for the device.
    */
    private ?array $owners = null;
    
    /**
     * @var array<string>|null $protocols The list of protocols that the device supports.
    */
    private ?array $protocols = null;
    
    /**
     * @var string|null $purdueLayer The Purdue Layer of the device.
    */
    private ?string $purdueLayer = null;
    
    /**
     * @var string|null $sensor The sensor that monitors the device.
    */
    private ?string $sensor = null;
    
    /**
     * @var string|null $serialNumber The serial number of the device.
    */
    private ?string $serialNumber = null;
    
    /**
     * @var string|null $site The site location of the device.
    */
    private ?string $site = null;
    
    /**
     * @var string|null $source The source (microsoft/vendor) of the device entity.
    */
    private ?string $source = null;
    
    /**
     * @var UrlEvidence|null $sourceRef A URL reference to the source item where the device is managed.
    */
    private ?UrlEvidence $sourceRef = null;
    
    /**
     * @var string|null $zone The zone location of the device within a site.
    */
    private ?string $zone = null;
    
    /**
     * Instantiates a new IoTDeviceEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.ioTDeviceEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IoTDeviceEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IoTDeviceEvidence {
        return new IoTDeviceEvidence();
    }

    /**
     * Gets the deviceId property value. The device ID.
     * @return string|null
    */
    public function getDeviceId(): ?string {
        return $this->deviceId;
    }

    /**
     * Gets the deviceName property value. The friendly name of the device.
     * @return string|null
    */
    public function getDeviceName(): ?string {
        return $this->deviceName;
    }

    /**
     * Gets the devicePageLink property value. The URL to the device page in the IoT Defender portal.
     * @return string|null
    */
    public function getDevicePageLink(): ?string {
        return $this->devicePageLink;
    }

    /**
     * Gets the deviceSubType property value. The device subtype.
     * @return string|null
    */
    public function getDeviceSubType(): ?string {
        return $this->deviceSubType;
    }

    /**
     * Gets the deviceType property value. The type of the device. For example, 'temperature sensor,' 'freezer,' 'wind turbine,' and so on.
     * @return string|null
    */
    public function getDeviceType(): ?string {
        return $this->deviceType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'deviceId' => fn(ParseNode $n) => $o->setDeviceId($n->getStringValue()),
            'deviceName' => fn(ParseNode $n) => $o->setDeviceName($n->getStringValue()),
            'devicePageLink' => fn(ParseNode $n) => $o->setDevicePageLink($n->getStringValue()),
            'deviceSubType' => fn(ParseNode $n) => $o->setDeviceSubType($n->getStringValue()),
            'deviceType' => fn(ParseNode $n) => $o->setDeviceType($n->getStringValue()),
            'importance' => fn(ParseNode $n) => $o->setImportance($n->getEnumValue(IoTDeviceImportanceType::class)),
            'ioTHub' => fn(ParseNode $n) => $o->setIoTHub($n->getObjectValue([AzureResourceEvidence::class, 'createFromDiscriminatorValue'])),
            'ioTSecurityAgentId' => fn(ParseNode $n) => $o->setIoTSecurityAgentId($n->getStringValue()),
            'ipAddress' => fn(ParseNode $n) => $o->setIpAddress($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'isAuthorized' => fn(ParseNode $n) => $o->setIsAuthorized($n->getBooleanValue()),
            'isProgramming' => fn(ParseNode $n) => $o->setIsProgramming($n->getBooleanValue()),
            'isScanner' => fn(ParseNode $n) => $o->setIsScanner($n->getBooleanValue()),
            'macAddress' => fn(ParseNode $n) => $o->setMacAddress($n->getStringValue()),
            'manufacturer' => fn(ParseNode $n) => $o->setManufacturer($n->getStringValue()),
            'model' => fn(ParseNode $n) => $o->setModel($n->getStringValue()),
            'nics' => fn(ParseNode $n) => $o->setNics($n->getCollectionOfObjectValues([NicEvidence::class, 'createFromDiscriminatorValue'])),
            'operatingSystem' => fn(ParseNode $n) => $o->setOperatingSystem($n->getStringValue()),
            'owners' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setOwners($val);
            },
            'protocols' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setProtocols($val);
            },
            'purdueLayer' => fn(ParseNode $n) => $o->setPurdueLayer($n->getStringValue()),
            'sensor' => fn(ParseNode $n) => $o->setSensor($n->getStringValue()),
            'serialNumber' => fn(ParseNode $n) => $o->setSerialNumber($n->getStringValue()),
            'site' => fn(ParseNode $n) => $o->setSite($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getStringValue()),
            'sourceRef' => fn(ParseNode $n) => $o->setSourceRef($n->getObjectValue([UrlEvidence::class, 'createFromDiscriminatorValue'])),
            'zone' => fn(ParseNode $n) => $o->setZone($n->getStringValue()),
        ]);
    }

    /**
     * Gets the importance property value. The importance level for the IoT device. The possible values are: unknown, low, normal, high, unknownFutureValue.
     * @return IoTDeviceImportanceType|null
    */
    public function getImportance(): ?IoTDeviceImportanceType {
        return $this->importance;
    }

    /**
     * Gets the ioTHub property value. The azureResourceEvidence entity that represents the IoT Hub that the device belongs to.
     * @return AzureResourceEvidence|null
    */
    public function getIoTHub(): ?AzureResourceEvidence {
        return $this->ioTHub;
    }

    /**
     * Gets the ioTSecurityAgentId property value. The ID of the Azure Security Center for the IoT agent that is running on the device.
     * @return string|null
    */
    public function getIoTSecurityAgentId(): ?string {
        return $this->ioTSecurityAgentId;
    }

    /**
     * Gets the ipAddress property value. The current IP address of the device.
     * @return IpEvidence|null
    */
    public function getIpAddress(): ?IpEvidence {
        return $this->ipAddress;
    }

    /**
     * Gets the isAuthorized property value. Indicates whether the device classified as an authorized device.
     * @return bool|null
    */
    public function getIsAuthorized(): ?bool {
        return $this->isAuthorized;
    }

    /**
     * Gets the isProgramming property value. Indicates whether the device classified as a programming device.
     * @return bool|null
    */
    public function getIsProgramming(): ?bool {
        return $this->isProgramming;
    }

    /**
     * Gets the isScanner property value. Indicates whether the device classified as a scanner.
     * @return bool|null
    */
    public function getIsScanner(): ?bool {
        return $this->isScanner;
    }

    /**
     * Gets the macAddress property value. The MAC address of the device.
     * @return string|null
    */
    public function getMacAddress(): ?string {
        return $this->macAddress;
    }

    /**
     * Gets the manufacturer property value. The manufacturer of the device.
     * @return string|null
    */
    public function getManufacturer(): ?string {
        return $this->manufacturer;
    }

    /**
     * Gets the model property value. The model of the device.
     * @return string|null
    */
    public function getModel(): ?string {
        return $this->model;
    }

    /**
     * Gets the nics property value. The current network interface controllers on the device.
     * @return array<NicEvidence>|null
    */
    public function getNics(): ?array {
        return $this->nics;
    }

    /**
     * Gets the operatingSystem property value. The operating system the device is running.
     * @return string|null
    */
    public function getOperatingSystem(): ?string {
        return $this->operatingSystem;
    }

    /**
     * Gets the owners property value. The owners for the device.
     * @return array<string>|null
    */
    public function getOwners(): ?array {
        return $this->owners;
    }

    /**
     * Gets the protocols property value. The list of protocols that the device supports.
     * @return array<string>|null
    */
    public function getProtocols(): ?array {
        return $this->protocols;
    }

    /**
     * Gets the purdueLayer property value. The Purdue Layer of the device.
     * @return string|null
    */
    public function getPurdueLayer(): ?string {
        return $this->purdueLayer;
    }

    /**
     * Gets the sensor property value. The sensor that monitors the device.
     * @return string|null
    */
    public function getSensor(): ?string {
        return $this->sensor;
    }

    /**
     * Gets the serialNumber property value. The serial number of the device.
     * @return string|null
    */
    public function getSerialNumber(): ?string {
        return $this->serialNumber;
    }

    /**
     * Gets the site property value. The site location of the device.
     * @return string|null
    */
    public function getSite(): ?string {
        return $this->site;
    }

    /**
     * Gets the source property value. The source (microsoft/vendor) of the device entity.
     * @return string|null
    */
    public function getSource(): ?string {
        return $this->source;
    }

    /**
     * Gets the sourceRef property value. A URL reference to the source item where the device is managed.
     * @return UrlEvidence|null
    */
    public function getSourceRef(): ?UrlEvidence {
        return $this->sourceRef;
    }

    /**
     * Gets the zone property value. The zone location of the device within a site.
     * @return string|null
    */
    public function getZone(): ?string {
        return $this->zone;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('deviceId', $this->getDeviceId());
        $writer->writeStringValue('deviceName', $this->getDeviceName());
        $writer->writeStringValue('devicePageLink', $this->getDevicePageLink());
        $writer->writeStringValue('deviceSubType', $this->getDeviceSubType());
        $writer->writeStringValue('deviceType', $this->getDeviceType());
        $writer->writeEnumValue('importance', $this->getImportance());
        $writer->writeObjectValue('ioTHub', $this->getIoTHub());
        $writer->writeStringValue('ioTSecurityAgentId', $this->getIoTSecurityAgentId());
        $writer->writeObjectValue('ipAddress', $this->getIpAddress());
        $writer->writeBooleanValue('isAuthorized', $this->getIsAuthorized());
        $writer->writeBooleanValue('isProgramming', $this->getIsProgramming());
        $writer->writeBooleanValue('isScanner', $this->getIsScanner());
        $writer->writeStringValue('macAddress', $this->getMacAddress());
        $writer->writeStringValue('manufacturer', $this->getManufacturer());
        $writer->writeStringValue('model', $this->getModel());
        $writer->writeCollectionOfObjectValues('nics', $this->getNics());
        $writer->writeStringValue('operatingSystem', $this->getOperatingSystem());
        $writer->writeCollectionOfPrimitiveValues('owners', $this->getOwners());
        $writer->writeCollectionOfPrimitiveValues('protocols', $this->getProtocols());
        $writer->writeStringValue('purdueLayer', $this->getPurdueLayer());
        $writer->writeStringValue('sensor', $this->getSensor());
        $writer->writeStringValue('serialNumber', $this->getSerialNumber());
        $writer->writeStringValue('site', $this->getSite());
        $writer->writeStringValue('source', $this->getSource());
        $writer->writeObjectValue('sourceRef', $this->getSourceRef());
        $writer->writeStringValue('zone', $this->getZone());
    }

    /**
     * Sets the deviceId property value. The device ID.
     * @param string|null $value Value to set for the deviceId property.
    */
    public function setDeviceId(?string $value): void {
        $this->deviceId = $value;
    }

    /**
     * Sets the deviceName property value. The friendly name of the device.
     * @param string|null $value Value to set for the deviceName property.
    */
    public function setDeviceName(?string $value): void {
        $this->deviceName = $value;
    }

    /**
     * Sets the devicePageLink property value. The URL to the device page in the IoT Defender portal.
     * @param string|null $value Value to set for the devicePageLink property.
    */
    public function setDevicePageLink(?string $value): void {
        $this->devicePageLink = $value;
    }

    /**
     * Sets the deviceSubType property value. The device subtype.
     * @param string|null $value Value to set for the deviceSubType property.
    */
    public function setDeviceSubType(?string $value): void {
        $this->deviceSubType = $value;
    }

    /**
     * Sets the deviceType property value. The type of the device. For example, 'temperature sensor,' 'freezer,' 'wind turbine,' and so on.
     * @param string|null $value Value to set for the deviceType property.
    */
    public function setDeviceType(?string $value): void {
        $this->deviceType = $value;
    }

    /**
     * Sets the importance property value. The importance level for the IoT device. The possible values are: unknown, low, normal, high, unknownFutureValue.
     * @param IoTDeviceImportanceType|null $value Value to set for the importance property.
    */
    public function setImportance(?IoTDeviceImportanceType $value): void {
        $this->importance = $value;
    }

    /**
     * Sets the ioTHub property value. The azureResourceEvidence entity that represents the IoT Hub that the device belongs to.
     * @param AzureResourceEvidence|null $value Value to set for the ioTHub property.
    */
    public function setIoTHub(?AzureResourceEvidence $value): void {
        $this->ioTHub = $value;
    }

    /**
     * Sets the ioTSecurityAgentId property value. The ID of the Azure Security Center for the IoT agent that is running on the device.
     * @param string|null $value Value to set for the ioTSecurityAgentId property.
    */
    public function setIoTSecurityAgentId(?string $value): void {
        $this->ioTSecurityAgentId = $value;
    }

    /**
     * Sets the ipAddress property value. The current IP address of the device.
     * @param IpEvidence|null $value Value to set for the ipAddress property.
    */
    public function setIpAddress(?IpEvidence $value): void {
        $this->ipAddress = $value;
    }

    /**
     * Sets the isAuthorized property value. Indicates whether the device classified as an authorized device.
     * @param bool|null $value Value to set for the isAuthorized property.
    */
    public function setIsAuthorized(?bool $value): void {
        $this->isAuthorized = $value;
    }

    /**
     * Sets the isProgramming property value. Indicates whether the device classified as a programming device.
     * @param bool|null $value Value to set for the isProgramming property.
    */
    public function setIsProgramming(?bool $value): void {
        $this->isProgramming = $value;
    }

    /**
     * Sets the isScanner property value. Indicates whether the device classified as a scanner.
     * @param bool|null $value Value to set for the isScanner property.
    */
    public function setIsScanner(?bool $value): void {
        $this->isScanner = $value;
    }

    /**
     * Sets the macAddress property value. The MAC address of the device.
     * @param string|null $value Value to set for the macAddress property.
    */
    public function setMacAddress(?string $value): void {
        $this->macAddress = $value;
    }

    /**
     * Sets the manufacturer property value. The manufacturer of the device.
     * @param string|null $value Value to set for the manufacturer property.
    */
    public function setManufacturer(?string $value): void {
        $this->manufacturer = $value;
    }

    /**
     * Sets the model property value. The model of the device.
     * @param string|null $value Value to set for the model property.
    */
    public function setModel(?string $value): void {
        $this->model = $value;
    }

    /**
     * Sets the nics property value. The current network interface controllers on the device.
     * @param array<NicEvidence>|null $value Value to set for the nics property.
    */
    public function setNics(?array $value): void {
        $this->nics = $value;
    }

    /**
     * Sets the operatingSystem property value. The operating system the device is running.
     * @param string|null $value Value to set for the operatingSystem property.
    */
    public function setOperatingSystem(?string $value): void {
        $this->operatingSystem = $value;
    }

    /**
     * Sets the owners property value. The owners for the device.
     * @param array<string>|null $value Value to set for the owners property.
    */
    public function setOwners(?array $value): void {
        $this->owners = $value;
    }

    /**
     * Sets the protocols property value. The list of protocols that the device supports.
     * @param array<string>|null $value Value to set for the protocols property.
    */
    public function setProtocols(?array $value): void {
        $this->protocols = $value;
    }

    /**
     * Sets the purdueLayer property value. The Purdue Layer of the device.
     * @param string|null $value Value to set for the purdueLayer property.
    */
    public function setPurdueLayer(?string $value): void {
        $this->purdueLayer = $value;
    }

    /**
     * Sets the sensor property value. The sensor that monitors the device.
     * @param string|null $value Value to set for the sensor property.
    */
    public function setSensor(?string $value): void {
        $this->sensor = $value;
    }

    /**
     * Sets the serialNumber property value. The serial number of the device.
     * @param string|null $value Value to set for the serialNumber property.
    */
    public function setSerialNumber(?string $value): void {
        $this->serialNumber = $value;
    }

    /**
     * Sets the site property value. The site location of the device.
     * @param string|null $value Value to set for the site property.
    */
    public function setSite(?string $value): void {
        $this->site = $value;
    }

    /**
     * Sets the source property value. The source (microsoft/vendor) of the device entity.
     * @param string|null $value Value to set for the source property.
    */
    public function setSource(?string $value): void {
        $this->source = $value;
    }

    /**
     * Sets the sourceRef property value. A URL reference to the source item where the device is managed.
     * @param UrlEvidence|null $value Value to set for the sourceRef property.
    */
    public function setSourceRef(?UrlEvidence $value): void {
        $this->sourceRef = $value;
    }

    /**
     * Sets the zone property value. The zone location of the device within a site.
     * @param string|null $value Value to set for the zone property.
    */
    public function setZone(?string $value): void {
        $this->zone = $value;
    }

}
