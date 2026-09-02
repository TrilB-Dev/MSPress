<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Windows Log Collection request entity.
*/
class DeviceLogCollectionResponse extends Entity implements Parsable 
{
    /**
     * @var string|null $enrolledByUser The User Principal Name (UPN) of the user that enrolled the device.
    */
    private ?string $enrolledByUser = null;
    
    /**
     * @var DateTime|null $expirationDateTimeUTC The DateTime of the expiration of the logs.
    */
    private ?DateTime $expirationDateTimeUTC = null;
    
    /**
     * @var string|null $initiatedByUserPrincipalName The UPN for who initiated the request.
    */
    private ?string $initiatedByUserPrincipalName = null;
    
    /**
     * @var string|null $managedDeviceId Indicates Intune device unique identifier.
    */
    private ?string $managedDeviceId = null;
    
    /**
     * @var DateTime|null $receivedDateTimeUTC The DateTime the request was received.
    */
    private ?DateTime $receivedDateTimeUTC = null;
    
    /**
     * @var DateTime|null $requestedDateTimeUTC The DateTime of the request.
    */
    private ?DateTime $requestedDateTimeUTC = null;
    
    /**
     * @var float|null $sizeInKB The size of the logs in KB. Valid values -1.79769313486232E+308 to 1.79769313486232E+308
    */
    private ?float $sizeInKB = null;
    
    /**
     * @var AppLogUploadState|null $status AppLogUploadStatus
    */
    private ?AppLogUploadState $status = null;
    
    /**
     * Instantiates a new DeviceLogCollectionResponse and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DeviceLogCollectionResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DeviceLogCollectionResponse {
        return new DeviceLogCollectionResponse();
    }

    /**
     * Gets the enrolledByUser property value. The User Principal Name (UPN) of the user that enrolled the device.
     * @return string|null
    */
    public function getEnrolledByUser(): ?string {
        return $this->enrolledByUser;
    }

    /**
     * Gets the expirationDateTimeUTC property value. The DateTime of the expiration of the logs.
     * @return DateTime|null
    */
    public function getExpirationDateTimeUTC(): ?DateTime {
        return $this->expirationDateTimeUTC;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'enrolledByUser' => fn(ParseNode $n) => $o->setEnrolledByUser($n->getStringValue()),
            'expirationDateTimeUTC' => fn(ParseNode $n) => $o->setExpirationDateTimeUTC($n->getDateTimeValue()),
            'initiatedByUserPrincipalName' => fn(ParseNode $n) => $o->setInitiatedByUserPrincipalName($n->getStringValue()),
            'managedDeviceId' => fn(ParseNode $n) => $o->setManagedDeviceId($n->getStringValue()),
            'receivedDateTimeUTC' => fn(ParseNode $n) => $o->setReceivedDateTimeUTC($n->getDateTimeValue()),
            'requestedDateTimeUTC' => fn(ParseNode $n) => $o->setRequestedDateTimeUTC($n->getDateTimeValue()),
            'sizeInKB' => fn(ParseNode $n) => $o->setSizeInKB($n->getFloatValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(AppLogUploadState::class)),
        ]);
    }

    /**
     * Gets the initiatedByUserPrincipalName property value. The UPN for who initiated the request.
     * @return string|null
    */
    public function getInitiatedByUserPrincipalName(): ?string {
        return $this->initiatedByUserPrincipalName;
    }

    /**
     * Gets the managedDeviceId property value. Indicates Intune device unique identifier.
     * @return string|null
    */
    public function getManagedDeviceId(): ?string {
        return $this->managedDeviceId;
    }

    /**
     * Gets the receivedDateTimeUTC property value. The DateTime the request was received.
     * @return DateTime|null
    */
    public function getReceivedDateTimeUTC(): ?DateTime {
        return $this->receivedDateTimeUTC;
    }

    /**
     * Gets the requestedDateTimeUTC property value. The DateTime of the request.
     * @return DateTime|null
    */
    public function getRequestedDateTimeUTC(): ?DateTime {
        return $this->requestedDateTimeUTC;
    }

    /**
     * Gets the sizeInKB property value. The size of the logs in KB. Valid values -1.79769313486232E+308 to 1.79769313486232E+308
     * @return float|null
    */
    public function getSizeInKB(): ?float {
        return $this->sizeInKB;
    }

    /**
     * Gets the status property value. AppLogUploadStatus
     * @return AppLogUploadState|null
    */
    public function getStatus(): ?AppLogUploadState {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('enrolledByUser', $this->getEnrolledByUser());
        $writer->writeDateTimeValue('expirationDateTimeUTC', $this->getExpirationDateTimeUTC());
        $writer->writeStringValue('initiatedByUserPrincipalName', $this->getInitiatedByUserPrincipalName());
        $writer->writeStringValue('managedDeviceId', $this->getManagedDeviceId());
        $writer->writeDateTimeValue('receivedDateTimeUTC', $this->getReceivedDateTimeUTC());
        $writer->writeDateTimeValue('requestedDateTimeUTC', $this->getRequestedDateTimeUTC());
        $writer->writeFloatValue('sizeInKB', $this->getSizeInKB());
        $writer->writeEnumValue('status', $this->getStatus());
    }

    /**
     * Sets the enrolledByUser property value. The User Principal Name (UPN) of the user that enrolled the device.
     * @param string|null $value Value to set for the enrolledByUser property.
    */
    public function setEnrolledByUser(?string $value): void {
        $this->enrolledByUser = $value;
    }

    /**
     * Sets the expirationDateTimeUTC property value. The DateTime of the expiration of the logs.
     * @param DateTime|null $value Value to set for the expirationDateTimeUTC property.
    */
    public function setExpirationDateTimeUTC(?DateTime $value): void {
        $this->expirationDateTimeUTC = $value;
    }

    /**
     * Sets the initiatedByUserPrincipalName property value. The UPN for who initiated the request.
     * @param string|null $value Value to set for the initiatedByUserPrincipalName property.
    */
    public function setInitiatedByUserPrincipalName(?string $value): void {
        $this->initiatedByUserPrincipalName = $value;
    }

    /**
     * Sets the managedDeviceId property value. Indicates Intune device unique identifier.
     * @param string|null $value Value to set for the managedDeviceId property.
    */
    public function setManagedDeviceId(?string $value): void {
        $this->managedDeviceId = $value;
    }

    /**
     * Sets the receivedDateTimeUTC property value. The DateTime the request was received.
     * @param DateTime|null $value Value to set for the receivedDateTimeUTC property.
    */
    public function setReceivedDateTimeUTC(?DateTime $value): void {
        $this->receivedDateTimeUTC = $value;
    }

    /**
     * Sets the requestedDateTimeUTC property value. The DateTime of the request.
     * @param DateTime|null $value Value to set for the requestedDateTimeUTC property.
    */
    public function setRequestedDateTimeUTC(?DateTime $value): void {
        $this->requestedDateTimeUTC = $value;
    }

    /**
     * Sets the sizeInKB property value. The size of the logs in KB. Valid values -1.79769313486232E+308 to 1.79769313486232E+308
     * @param float|null $value Value to set for the sizeInKB property.
    */
    public function setSizeInKB(?float $value): void {
        $this->sizeInKB = $value;
    }

    /**
     * Sets the status property value. AppLogUploadStatus
     * @param AppLogUploadState|null $value Value to set for the status property.
    */
    public function setStatus(?AppLogUploadState $value): void {
        $this->status = $value;
    }

}
