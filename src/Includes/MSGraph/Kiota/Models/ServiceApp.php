<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ServiceApp extends Entity implements Parsable 
{
    /**
     * @var Identity|null $application The Entra ID application ID.
    */
    private ?Identity $application = null;
    
    /**
     * @var DateTime|null $effectiveDateTime Timestamp of the effective activation of the service app.
    */
    private ?DateTime $effectiveDateTime = null;
    
    /**
     * @var IdentitySet|null $lastModifiedBy Identity of the person who last modified the entity.
    */
    private ?IdentitySet $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime Timestamp of the last modification of the entity.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var DateTime|null $registrationDateTime Timestamp of the creation of the service app entity.
    */
    private ?DateTime $registrationDateTime = null;
    
    /**
     * @var ServiceAppStatus|null $status The status of the service app. This value indicates whether or not the application can be used to control the backup service. The possible values are: inactive, active, pendingActive, pendingInactive, unknownFutureValue.
    */
    private ?ServiceAppStatus $status = null;
    
    /**
     * Instantiates a new ServiceApp and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ServiceApp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ServiceApp {
        return new ServiceApp();
    }

    /**
     * Gets the application property value. The Entra ID application ID.
     * @return Identity|null
    */
    public function getApplication(): ?Identity {
        return $this->application;
    }

    /**
     * Gets the effectiveDateTime property value. Timestamp of the effective activation of the service app.
     * @return DateTime|null
    */
    public function getEffectiveDateTime(): ?DateTime {
        return $this->effectiveDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'application' => fn(ParseNode $n) => $o->setApplication($n->getObjectValue([Identity::class, 'createFromDiscriminatorValue'])),
            'effectiveDateTime' => fn(ParseNode $n) => $o->setEffectiveDateTime($n->getDateTimeValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'registrationDateTime' => fn(ParseNode $n) => $o->setRegistrationDateTime($n->getDateTimeValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(ServiceAppStatus::class)),
        ]);
    }

    /**
     * Gets the lastModifiedBy property value. Identity of the person who last modified the entity.
     * @return IdentitySet|null
    */
    public function getLastModifiedBy(): ?IdentitySet {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. Timestamp of the last modification of the entity.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the registrationDateTime property value. Timestamp of the creation of the service app entity.
     * @return DateTime|null
    */
    public function getRegistrationDateTime(): ?DateTime {
        return $this->registrationDateTime;
    }

    /**
     * Gets the status property value. The status of the service app. This value indicates whether or not the application can be used to control the backup service. The possible values are: inactive, active, pendingActive, pendingInactive, unknownFutureValue.
     * @return ServiceAppStatus|null
    */
    public function getStatus(): ?ServiceAppStatus {
        return $this->status;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('application', $this->getApplication());
        $writer->writeDateTimeValue('effectiveDateTime', $this->getEffectiveDateTime());
        $writer->writeObjectValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeDateTimeValue('registrationDateTime', $this->getRegistrationDateTime());
        $writer->writeEnumValue('status', $this->getStatus());
    }

    /**
     * Sets the application property value. The Entra ID application ID.
     * @param Identity|null $value Value to set for the application property.
    */
    public function setApplication(?Identity $value): void {
        $this->application = $value;
    }

    /**
     * Sets the effectiveDateTime property value. Timestamp of the effective activation of the service app.
     * @param DateTime|null $value Value to set for the effectiveDateTime property.
    */
    public function setEffectiveDateTime(?DateTime $value): void {
        $this->effectiveDateTime = $value;
    }

    /**
     * Sets the lastModifiedBy property value. Identity of the person who last modified the entity.
     * @param IdentitySet|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?IdentitySet $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. Timestamp of the last modification of the entity.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the registrationDateTime property value. Timestamp of the creation of the service app entity.
     * @param DateTime|null $value Value to set for the registrationDateTime property.
    */
    public function setRegistrationDateTime(?DateTime $value): void {
        $this->registrationDateTime = $value;
    }

    /**
     * Sets the status property value. The status of the service app. This value indicates whether or not the application can be used to control the backup service. The possible values are: inactive, active, pendingActive, pendingInactive, unknownFutureValue.
     * @param ServiceAppStatus|null $value Value to set for the status property.
    */
    public function setStatus(?ServiceAppStatus $value): void {
        $this->status = $value;
    }

}
