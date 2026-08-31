<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\Date;

class CloudPcDeviceImage extends Entity implements Parsable 
{
    /**
     * @var string|null $displayName The display name of the associated device image. The device image display name and the version are used to uniquely identify the Cloud PC device image. Read-only.
    */
    private ?string $displayName = null;
    
    /**
     * @var CloudPcDeviceImageErrorCode|null $errorCode The error code of the status of the image that indicates why the upload failed, if applicable. The possible values are: internalServerError, sourceImageNotFound, osVersionNotSupported, sourceImageInvalid, sourceImageNotGeneralized, unknownFutureValue, vmAlreadyAzureAdJoined, paidSourceImageNotSupport, sourceImageNotSupportCustomizeVMName, sourceImageSizeExceedsLimitation. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: vmAlreadyAzureAdJoined, paidSourceImageNotSupport, sourceImageNotSupportCustomizeVMName, sourceImageSizeExceedsLimitation. Read-only.
    */
    private ?CloudPcDeviceImageErrorCode $errorCode = null;
    
    /**
     * @var Date|null $expirationDate The date when the image became unavailable. Read-only.
    */
    private ?Date $expirationDate = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The data and time when the image was last modified. The timestamp represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $operatingSystem The operating system (OS) of the image. For example, Windows 11 Enterprise. Read-only.
    */
    private ?string $operatingSystem = null;
    
    /**
     * @var string|null $osBuildNumber The OS build version of the image. For example, 1909. Read-only.
    */
    private ?string $osBuildNumber = null;
    
    /**
     * @var CloudPcDeviceImageOsStatus|null $osStatus The OS status of this image. The possible values are: supported, supportedWithWarning, unknown, unknownFutureValue. The default value is unknown. Read-only.
    */
    private ?CloudPcDeviceImageOsStatus $osStatus = null;
    
    /**
     * @var string|null $osVersionNumber The operating system version of this image. For example, 10.0.22000.296. Read-only.
    */
    private ?string $osVersionNumber = null;
    
    /**
     * @var int|null $sizeInGB The size of the image in GB. For example, 64. Read-only.
    */
    private ?int $sizeInGB = null;
    
    /**
     * @var string|null $sourceImageResourceId The unique identifier (ID) of the source image resource on Azure. The required ID format is: '/subscriptions/{subscription-id}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/images/{imageName}'. Read-only.
    */
    private ?string $sourceImageResourceId = null;
    
    /**
     * @var CloudPcDeviceImageStatus|null $status The status of the image on the Cloud PC. The possible values are: pending, ready, failed, unknownFutureValue. Read-only.
    */
    private ?CloudPcDeviceImageStatus $status = null;
    
    /**
     * @var string|null $version The image version. For example, 0.0.1 and 1.5.13. Read-only.
    */
    private ?string $version = null;
    
    /**
     * Instantiates a new CloudPcDeviceImage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudPcDeviceImage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudPcDeviceImage {
        return new CloudPcDeviceImage();
    }

    /**
     * Gets the displayName property value. The display name of the associated device image. The device image display name and the version are used to uniquely identify the Cloud PC device image. Read-only.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the errorCode property value. The error code of the status of the image that indicates why the upload failed, if applicable. The possible values are: internalServerError, sourceImageNotFound, osVersionNotSupported, sourceImageInvalid, sourceImageNotGeneralized, unknownFutureValue, vmAlreadyAzureAdJoined, paidSourceImageNotSupport, sourceImageNotSupportCustomizeVMName, sourceImageSizeExceedsLimitation. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: vmAlreadyAzureAdJoined, paidSourceImageNotSupport, sourceImageNotSupportCustomizeVMName, sourceImageSizeExceedsLimitation. Read-only.
     * @return CloudPcDeviceImageErrorCode|null
    */
    public function getErrorCode(): ?CloudPcDeviceImageErrorCode {
        return $this->errorCode;
    }

    /**
     * Gets the expirationDate property value. The date when the image became unavailable. Read-only.
     * @return Date|null
    */
    public function getExpirationDate(): ?Date {
        return $this->expirationDate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'errorCode' => fn(ParseNode $n) => $o->setErrorCode($n->getEnumValue(CloudPcDeviceImageErrorCode::class)),
            'expirationDate' => fn(ParseNode $n) => $o->setExpirationDate($n->getDateValue()),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'operatingSystem' => fn(ParseNode $n) => $o->setOperatingSystem($n->getStringValue()),
            'osBuildNumber' => fn(ParseNode $n) => $o->setOsBuildNumber($n->getStringValue()),
            'osStatus' => fn(ParseNode $n) => $o->setOsStatus($n->getEnumValue(CloudPcDeviceImageOsStatus::class)),
            'osVersionNumber' => fn(ParseNode $n) => $o->setOsVersionNumber($n->getStringValue()),
            'sizeInGB' => fn(ParseNode $n) => $o->setSizeInGB($n->getIntegerValue()),
            'sourceImageResourceId' => fn(ParseNode $n) => $o->setSourceImageResourceId($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(CloudPcDeviceImageStatus::class)),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getStringValue()),
        ]);
    }

    /**
     * Gets the lastModifiedDateTime property value. The data and time when the image was last modified. The timestamp represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the operatingSystem property value. The operating system (OS) of the image. For example, Windows 11 Enterprise. Read-only.
     * @return string|null
    */
    public function getOperatingSystem(): ?string {
        return $this->operatingSystem;
    }

    /**
     * Gets the osBuildNumber property value. The OS build version of the image. For example, 1909. Read-only.
     * @return string|null
    */
    public function getOsBuildNumber(): ?string {
        return $this->osBuildNumber;
    }

    /**
     * Gets the osStatus property value. The OS status of this image. The possible values are: supported, supportedWithWarning, unknown, unknownFutureValue. The default value is unknown. Read-only.
     * @return CloudPcDeviceImageOsStatus|null
    */
    public function getOsStatus(): ?CloudPcDeviceImageOsStatus {
        return $this->osStatus;
    }

    /**
     * Gets the osVersionNumber property value. The operating system version of this image. For example, 10.0.22000.296. Read-only.
     * @return string|null
    */
    public function getOsVersionNumber(): ?string {
        return $this->osVersionNumber;
    }

    /**
     * Gets the sizeInGB property value. The size of the image in GB. For example, 64. Read-only.
     * @return int|null
    */
    public function getSizeInGB(): ?int {
        return $this->sizeInGB;
    }

    /**
     * Gets the sourceImageResourceId property value. The unique identifier (ID) of the source image resource on Azure. The required ID format is: '/subscriptions/{subscription-id}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/images/{imageName}'. Read-only.
     * @return string|null
    */
    public function getSourceImageResourceId(): ?string {
        return $this->sourceImageResourceId;
    }

    /**
     * Gets the status property value. The status of the image on the Cloud PC. The possible values are: pending, ready, failed, unknownFutureValue. Read-only.
     * @return CloudPcDeviceImageStatus|null
    */
    public function getStatus(): ?CloudPcDeviceImageStatus {
        return $this->status;
    }

    /**
     * Gets the version property value. The image version. For example, 0.0.1 and 1.5.13. Read-only.
     * @return string|null
    */
    public function getVersion(): ?string {
        return $this->version;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeEnumValue('errorCode', $this->getErrorCode());
        $writer->writeDateValue('expirationDate', $this->getExpirationDate());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeStringValue('operatingSystem', $this->getOperatingSystem());
        $writer->writeStringValue('osBuildNumber', $this->getOsBuildNumber());
        $writer->writeEnumValue('osStatus', $this->getOsStatus());
        $writer->writeStringValue('osVersionNumber', $this->getOsVersionNumber());
        $writer->writeIntegerValue('sizeInGB', $this->getSizeInGB());
        $writer->writeStringValue('sourceImageResourceId', $this->getSourceImageResourceId());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeStringValue('version', $this->getVersion());
    }

    /**
     * Sets the displayName property value. The display name of the associated device image. The device image display name and the version are used to uniquely identify the Cloud PC device image. Read-only.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the errorCode property value. The error code of the status of the image that indicates why the upload failed, if applicable. The possible values are: internalServerError, sourceImageNotFound, osVersionNotSupported, sourceImageInvalid, sourceImageNotGeneralized, unknownFutureValue, vmAlreadyAzureAdJoined, paidSourceImageNotSupport, sourceImageNotSupportCustomizeVMName, sourceImageSizeExceedsLimitation. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: vmAlreadyAzureAdJoined, paidSourceImageNotSupport, sourceImageNotSupportCustomizeVMName, sourceImageSizeExceedsLimitation. Read-only.
     * @param CloudPcDeviceImageErrorCode|null $value Value to set for the errorCode property.
    */
    public function setErrorCode(?CloudPcDeviceImageErrorCode $value): void {
        $this->errorCode = $value;
    }

    /**
     * Sets the expirationDate property value. The date when the image became unavailable. Read-only.
     * @param Date|null $value Value to set for the expirationDate property.
    */
    public function setExpirationDate(?Date $value): void {
        $this->expirationDate = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The data and time when the image was last modified. The timestamp represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the operatingSystem property value. The operating system (OS) of the image. For example, Windows 11 Enterprise. Read-only.
     * @param string|null $value Value to set for the operatingSystem property.
    */
    public function setOperatingSystem(?string $value): void {
        $this->operatingSystem = $value;
    }

    /**
     * Sets the osBuildNumber property value. The OS build version of the image. For example, 1909. Read-only.
     * @param string|null $value Value to set for the osBuildNumber property.
    */
    public function setOsBuildNumber(?string $value): void {
        $this->osBuildNumber = $value;
    }

    /**
     * Sets the osStatus property value. The OS status of this image. The possible values are: supported, supportedWithWarning, unknown, unknownFutureValue. The default value is unknown. Read-only.
     * @param CloudPcDeviceImageOsStatus|null $value Value to set for the osStatus property.
    */
    public function setOsStatus(?CloudPcDeviceImageOsStatus $value): void {
        $this->osStatus = $value;
    }

    /**
     * Sets the osVersionNumber property value. The operating system version of this image. For example, 10.0.22000.296. Read-only.
     * @param string|null $value Value to set for the osVersionNumber property.
    */
    public function setOsVersionNumber(?string $value): void {
        $this->osVersionNumber = $value;
    }

    /**
     * Sets the sizeInGB property value. The size of the image in GB. For example, 64. Read-only.
     * @param int|null $value Value to set for the sizeInGB property.
    */
    public function setSizeInGB(?int $value): void {
        $this->sizeInGB = $value;
    }

    /**
     * Sets the sourceImageResourceId property value. The unique identifier (ID) of the source image resource on Azure. The required ID format is: '/subscriptions/{subscription-id}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/images/{imageName}'. Read-only.
     * @param string|null $value Value to set for the sourceImageResourceId property.
    */
    public function setSourceImageResourceId(?string $value): void {
        $this->sourceImageResourceId = $value;
    }

    /**
     * Sets the status property value. The status of the image on the Cloud PC. The possible values are: pending, ready, failed, unknownFutureValue. Read-only.
     * @param CloudPcDeviceImageStatus|null $value Value to set for the status property.
    */
    public function setStatus(?CloudPcDeviceImageStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the version property value. The image version. For example, 0.0.1 and 1.5.13. Read-only.
     * @param string|null $value Value to set for the version property.
    */
    public function setVersion(?string $value): void {
        $this->version = $value;
    }

}
