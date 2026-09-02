<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudPcOnPremisesConnectionHealthCheck implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $additionalDetail Additional details about the health check or the recommended action. For exmaple, the string value can be download.microsoft.com:443;software-download.microsoft.com:443; Read-only.
    */
    private ?string $additionalDetail = null;
    
    /**
     * @var string|null $correlationId The unique identifier of the health check item-related activities. This identifier can be useful in troubleshooting.
    */
    private ?string $correlationId = null;
    
    /**
     * @var string|null $displayName The display name for this health check item.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $endDateTime The value cannot be modified and is automatically populated when the health check ends. The Timestamp type represents date and time information using ISO 8601 format and is in Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2024 would look like this: '2024-01-01T00:00:00Z'. Returned by default. Read-only.
    */
    private ?DateTime $endDateTime = null;
    
    /**
     * @var CloudPcOnPremisesConnectionHealthCheckErrorType|null $errorType The type of error that occurred during this health check. Read-only.
    */
    private ?CloudPcOnPremisesConnectionHealthCheckErrorType $errorType = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $recommendedAction The recommended action to fix the corresponding error. For example, The Active Directory domain join check failed because the password of the domain join user has expired. Read-Only.
    */
    private ?string $recommendedAction = null;
    
    /**
     * @var DateTime|null $startDateTime The value cannot be modified and is automatically populated when the health check starts. The Timestamp type represents date and time information using ISO 8601 format and is in  Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2024 would look like this: '2024-01-01T00:00:00Z'. Returned by default. Read-only.
    */
    private ?DateTime $startDateTime = null;
    
    /**
     * @var CloudPcOnPremisesConnectionStatus|null $status The status property
    */
    private ?CloudPcOnPremisesConnectionStatus $status = null;
    
    /**
     * Instantiates a new CloudPcOnPremisesConnectionHealthCheck and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudPcOnPremisesConnectionHealthCheck
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudPcOnPremisesConnectionHealthCheck {
        return new CloudPcOnPremisesConnectionHealthCheck();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the additionalDetail property value. Additional details about the health check or the recommended action. For exmaple, the string value can be download.microsoft.com:443;software-download.microsoft.com:443; Read-only.
     * @return string|null
    */
    public function getAdditionalDetail(): ?string {
        return $this->additionalDetail;
    }

    /**
     * Gets the correlationId property value. The unique identifier of the health check item-related activities. This identifier can be useful in troubleshooting.
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the displayName property value. The display name for this health check item.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the endDateTime property value. The value cannot be modified and is automatically populated when the health check ends. The Timestamp type represents date and time information using ISO 8601 format and is in Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2024 would look like this: '2024-01-01T00:00:00Z'. Returned by default. Read-only.
     * @return DateTime|null
    */
    public function getEndDateTime(): ?DateTime {
        return $this->endDateTime;
    }

    /**
     * Gets the errorType property value. The type of error that occurred during this health check. Read-only.
     * @return CloudPcOnPremisesConnectionHealthCheckErrorType|null
    */
    public function getErrorType(): ?CloudPcOnPremisesConnectionHealthCheckErrorType {
        return $this->errorType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'additionalDetail' => fn(ParseNode $n) => $o->setAdditionalDetail($n->getStringValue()),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'endDateTime' => fn(ParseNode $n) => $o->setEndDateTime($n->getDateTimeValue()),
            'errorType' => fn(ParseNode $n) => $o->setErrorType($n->getEnumValue(CloudPcOnPremisesConnectionHealthCheckErrorType::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'recommendedAction' => fn(ParseNode $n) => $o->setRecommendedAction($n->getStringValue()),
            'startDateTime' => fn(ParseNode $n) => $o->setStartDateTime($n->getDateTimeValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(CloudPcOnPremisesConnectionStatus::class)),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the recommendedAction property value. The recommended action to fix the corresponding error. For example, The Active Directory domain join check failed because the password of the domain join user has expired. Read-Only.
     * @return string|null
    */
    public function getRecommendedAction(): ?string {
        return $this->recommendedAction;
    }

    /**
     * Gets the startDateTime property value. The value cannot be modified and is automatically populated when the health check starts. The Timestamp type represents date and time information using ISO 8601 format and is in  Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2024 would look like this: '2024-01-01T00:00:00Z'. Returned by default. Read-only.
     * @return DateTime|null
    */
    public function getStartDateTime(): ?DateTime {
        return $this->startDateTime;
    }

    /**
     * Gets the status property value. The status property
     * @return CloudPcOnPremisesConnectionStatus|null
    */
    public function getStatus(): ?CloudPcOnPremisesConnectionStatus {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('additionalDetail', $this->getAdditionalDetail());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('endDateTime', $this->getEndDateTime());
        $writer->writeEnumValue('errorType', $this->getErrorType());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('recommendedAction', $this->getRecommendedAction());
        $writer->writeDateTimeValue('startDateTime', $this->getStartDateTime());
        $writer->writeEnumValue('status', $this->getStatus());
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
     * Sets the additionalDetail property value. Additional details about the health check or the recommended action. For exmaple, the string value can be download.microsoft.com:443;software-download.microsoft.com:443; Read-only.
     * @param string|null $value Value to set for the additionalDetail property.
    */
    public function setAdditionalDetail(?string $value): void {
        $this->additionalDetail = $value;
    }

    /**
     * Sets the correlationId property value. The unique identifier of the health check item-related activities. This identifier can be useful in troubleshooting.
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the displayName property value. The display name for this health check item.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the endDateTime property value. The value cannot be modified and is automatically populated when the health check ends. The Timestamp type represents date and time information using ISO 8601 format and is in Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2024 would look like this: '2024-01-01T00:00:00Z'. Returned by default. Read-only.
     * @param DateTime|null $value Value to set for the endDateTime property.
    */
    public function setEndDateTime(?DateTime $value): void {
        $this->endDateTime = $value;
    }

    /**
     * Sets the errorType property value. The type of error that occurred during this health check. Read-only.
     * @param CloudPcOnPremisesConnectionHealthCheckErrorType|null $value Value to set for the errorType property.
    */
    public function setErrorType(?CloudPcOnPremisesConnectionHealthCheckErrorType $value): void {
        $this->errorType = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the recommendedAction property value. The recommended action to fix the corresponding error. For example, The Active Directory domain join check failed because the password of the domain join user has expired. Read-Only.
     * @param string|null $value Value to set for the recommendedAction property.
    */
    public function setRecommendedAction(?string $value): void {
        $this->recommendedAction = $value;
    }

    /**
     * Sets the startDateTime property value. The value cannot be modified and is automatically populated when the health check starts. The Timestamp type represents date and time information using ISO 8601 format and is in  Coordinated Universal Time (UTC). For example, midnight UTC on Jan 1, 2024 would look like this: '2024-01-01T00:00:00Z'. Returned by default. Read-only.
     * @param DateTime|null $value Value to set for the startDateTime property.
    */
    public function setStartDateTime(?DateTime $value): void {
        $this->startDateTime = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param CloudPcOnPremisesConnectionStatus|null $value Value to set for the status property.
    */
    public function setStatus(?CloudPcOnPremisesConnectionStatus $value): void {
        $this->status = $value;
    }

}
