<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Hardware information of a given device.
*/
class DeviceProtectionOverview implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $cleanDeviceCount Indicates number of devices reporting as clean
    */
    private ?int $cleanDeviceCount = null;
    
    /**
     * @var int|null $criticalFailuresDeviceCount Indicates number of devices with critical failures
    */
    private ?int $criticalFailuresDeviceCount = null;
    
    /**
     * @var int|null $inactiveThreatAgentDeviceCount Indicates number of devices with inactive threat agent
    */
    private ?int $inactiveThreatAgentDeviceCount = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var int|null $pendingFullScanDeviceCount Indicates number of devices pending full scan
    */
    private ?int $pendingFullScanDeviceCount = null;
    
    /**
     * @var int|null $pendingManualStepsDeviceCount Indicates number of devices with pending manual steps
    */
    private ?int $pendingManualStepsDeviceCount = null;
    
    /**
     * @var int|null $pendingOfflineScanDeviceCount Indicates number of pending offline scan devices
    */
    private ?int $pendingOfflineScanDeviceCount = null;
    
    /**
     * @var int|null $pendingQuickScanDeviceCount Indicates the number of devices that have a pending full scan. Valid values -2147483648 to 2147483647
    */
    private ?int $pendingQuickScanDeviceCount = null;
    
    /**
     * @var int|null $pendingRestartDeviceCount Indicates number of devices pending restart
    */
    private ?int $pendingRestartDeviceCount = null;
    
    /**
     * @var int|null $pendingSignatureUpdateDeviceCount Indicates number of devices with an old signature
    */
    private ?int $pendingSignatureUpdateDeviceCount = null;
    
    /**
     * @var int|null $totalReportedDeviceCount Total device count.
    */
    private ?int $totalReportedDeviceCount = null;
    
    /**
     * @var int|null $unknownStateThreatAgentDeviceCount Indicates number of devices with threat agent state as unknown
    */
    private ?int $unknownStateThreatAgentDeviceCount = null;
    
    /**
     * Instantiates a new DeviceProtectionOverview and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DeviceProtectionOverview
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DeviceProtectionOverview {
        return new DeviceProtectionOverview();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the cleanDeviceCount property value. Indicates number of devices reporting as clean
     * @return int|null
    */
    public function getCleanDeviceCount(): ?int {
        return $this->cleanDeviceCount;
    }

    /**
     * Gets the criticalFailuresDeviceCount property value. Indicates number of devices with critical failures
     * @return int|null
    */
    public function getCriticalFailuresDeviceCount(): ?int {
        return $this->criticalFailuresDeviceCount;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'cleanDeviceCount' => fn(ParseNode $n) => $o->setCleanDeviceCount($n->getIntegerValue()),
            'criticalFailuresDeviceCount' => fn(ParseNode $n) => $o->setCriticalFailuresDeviceCount($n->getIntegerValue()),
            'inactiveThreatAgentDeviceCount' => fn(ParseNode $n) => $o->setInactiveThreatAgentDeviceCount($n->getIntegerValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'pendingFullScanDeviceCount' => fn(ParseNode $n) => $o->setPendingFullScanDeviceCount($n->getIntegerValue()),
            'pendingManualStepsDeviceCount' => fn(ParseNode $n) => $o->setPendingManualStepsDeviceCount($n->getIntegerValue()),
            'pendingOfflineScanDeviceCount' => fn(ParseNode $n) => $o->setPendingOfflineScanDeviceCount($n->getIntegerValue()),
            'pendingQuickScanDeviceCount' => fn(ParseNode $n) => $o->setPendingQuickScanDeviceCount($n->getIntegerValue()),
            'pendingRestartDeviceCount' => fn(ParseNode $n) => $o->setPendingRestartDeviceCount($n->getIntegerValue()),
            'pendingSignatureUpdateDeviceCount' => fn(ParseNode $n) => $o->setPendingSignatureUpdateDeviceCount($n->getIntegerValue()),
            'totalReportedDeviceCount' => fn(ParseNode $n) => $o->setTotalReportedDeviceCount($n->getIntegerValue()),
            'unknownStateThreatAgentDeviceCount' => fn(ParseNode $n) => $o->setUnknownStateThreatAgentDeviceCount($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the inactiveThreatAgentDeviceCount property value. Indicates number of devices with inactive threat agent
     * @return int|null
    */
    public function getInactiveThreatAgentDeviceCount(): ?int {
        return $this->inactiveThreatAgentDeviceCount;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the pendingFullScanDeviceCount property value. Indicates number of devices pending full scan
     * @return int|null
    */
    public function getPendingFullScanDeviceCount(): ?int {
        return $this->pendingFullScanDeviceCount;
    }

    /**
     * Gets the pendingManualStepsDeviceCount property value. Indicates number of devices with pending manual steps
     * @return int|null
    */
    public function getPendingManualStepsDeviceCount(): ?int {
        return $this->pendingManualStepsDeviceCount;
    }

    /**
     * Gets the pendingOfflineScanDeviceCount property value. Indicates number of pending offline scan devices
     * @return int|null
    */
    public function getPendingOfflineScanDeviceCount(): ?int {
        return $this->pendingOfflineScanDeviceCount;
    }

    /**
     * Gets the pendingQuickScanDeviceCount property value. Indicates the number of devices that have a pending full scan. Valid values -2147483648 to 2147483647
     * @return int|null
    */
    public function getPendingQuickScanDeviceCount(): ?int {
        return $this->pendingQuickScanDeviceCount;
    }

    /**
     * Gets the pendingRestartDeviceCount property value. Indicates number of devices pending restart
     * @return int|null
    */
    public function getPendingRestartDeviceCount(): ?int {
        return $this->pendingRestartDeviceCount;
    }

    /**
     * Gets the pendingSignatureUpdateDeviceCount property value. Indicates number of devices with an old signature
     * @return int|null
    */
    public function getPendingSignatureUpdateDeviceCount(): ?int {
        return $this->pendingSignatureUpdateDeviceCount;
    }

    /**
     * Gets the totalReportedDeviceCount property value. Total device count.
     * @return int|null
    */
    public function getTotalReportedDeviceCount(): ?int {
        return $this->totalReportedDeviceCount;
    }

    /**
     * Gets the unknownStateThreatAgentDeviceCount property value. Indicates number of devices with threat agent state as unknown
     * @return int|null
    */
    public function getUnknownStateThreatAgentDeviceCount(): ?int {
        return $this->unknownStateThreatAgentDeviceCount;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('cleanDeviceCount', $this->getCleanDeviceCount());
        $writer->writeIntegerValue('criticalFailuresDeviceCount', $this->getCriticalFailuresDeviceCount());
        $writer->writeIntegerValue('inactiveThreatAgentDeviceCount', $this->getInactiveThreatAgentDeviceCount());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeIntegerValue('pendingFullScanDeviceCount', $this->getPendingFullScanDeviceCount());
        $writer->writeIntegerValue('pendingManualStepsDeviceCount', $this->getPendingManualStepsDeviceCount());
        $writer->writeIntegerValue('pendingOfflineScanDeviceCount', $this->getPendingOfflineScanDeviceCount());
        $writer->writeIntegerValue('pendingQuickScanDeviceCount', $this->getPendingQuickScanDeviceCount());
        $writer->writeIntegerValue('pendingRestartDeviceCount', $this->getPendingRestartDeviceCount());
        $writer->writeIntegerValue('pendingSignatureUpdateDeviceCount', $this->getPendingSignatureUpdateDeviceCount());
        $writer->writeIntegerValue('totalReportedDeviceCount', $this->getTotalReportedDeviceCount());
        $writer->writeIntegerValue('unknownStateThreatAgentDeviceCount', $this->getUnknownStateThreatAgentDeviceCount());
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
     * Sets the cleanDeviceCount property value. Indicates number of devices reporting as clean
     * @param int|null $value Value to set for the cleanDeviceCount property.
    */
    public function setCleanDeviceCount(?int $value): void {
        $this->cleanDeviceCount = $value;
    }

    /**
     * Sets the criticalFailuresDeviceCount property value. Indicates number of devices with critical failures
     * @param int|null $value Value to set for the criticalFailuresDeviceCount property.
    */
    public function setCriticalFailuresDeviceCount(?int $value): void {
        $this->criticalFailuresDeviceCount = $value;
    }

    /**
     * Sets the inactiveThreatAgentDeviceCount property value. Indicates number of devices with inactive threat agent
     * @param int|null $value Value to set for the inactiveThreatAgentDeviceCount property.
    */
    public function setInactiveThreatAgentDeviceCount(?int $value): void {
        $this->inactiveThreatAgentDeviceCount = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the pendingFullScanDeviceCount property value. Indicates number of devices pending full scan
     * @param int|null $value Value to set for the pendingFullScanDeviceCount property.
    */
    public function setPendingFullScanDeviceCount(?int $value): void {
        $this->pendingFullScanDeviceCount = $value;
    }

    /**
     * Sets the pendingManualStepsDeviceCount property value. Indicates number of devices with pending manual steps
     * @param int|null $value Value to set for the pendingManualStepsDeviceCount property.
    */
    public function setPendingManualStepsDeviceCount(?int $value): void {
        $this->pendingManualStepsDeviceCount = $value;
    }

    /**
     * Sets the pendingOfflineScanDeviceCount property value. Indicates number of pending offline scan devices
     * @param int|null $value Value to set for the pendingOfflineScanDeviceCount property.
    */
    public function setPendingOfflineScanDeviceCount(?int $value): void {
        $this->pendingOfflineScanDeviceCount = $value;
    }

    /**
     * Sets the pendingQuickScanDeviceCount property value. Indicates the number of devices that have a pending full scan. Valid values -2147483648 to 2147483647
     * @param int|null $value Value to set for the pendingQuickScanDeviceCount property.
    */
    public function setPendingQuickScanDeviceCount(?int $value): void {
        $this->pendingQuickScanDeviceCount = $value;
    }

    /**
     * Sets the pendingRestartDeviceCount property value. Indicates number of devices pending restart
     * @param int|null $value Value to set for the pendingRestartDeviceCount property.
    */
    public function setPendingRestartDeviceCount(?int $value): void {
        $this->pendingRestartDeviceCount = $value;
    }

    /**
     * Sets the pendingSignatureUpdateDeviceCount property value. Indicates number of devices with an old signature
     * @param int|null $value Value to set for the pendingSignatureUpdateDeviceCount property.
    */
    public function setPendingSignatureUpdateDeviceCount(?int $value): void {
        $this->pendingSignatureUpdateDeviceCount = $value;
    }

    /**
     * Sets the totalReportedDeviceCount property value. Total device count.
     * @param int|null $value Value to set for the totalReportedDeviceCount property.
    */
    public function setTotalReportedDeviceCount(?int $value): void {
        $this->totalReportedDeviceCount = $value;
    }

    /**
     * Sets the unknownStateThreatAgentDeviceCount property value. Indicates number of devices with threat agent state as unknown
     * @param int|null $value Value to set for the unknownStateThreatAgentDeviceCount property.
    */
    public function setUnknownStateThreatAgentDeviceCount(?int $value): void {
        $this->unknownStateThreatAgentDeviceCount = $value;
    }

}
