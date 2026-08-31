<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class HostLogonSessionEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var UserEvidence|null $account The account that is associated with the sign-in session ID.
    */
    private ?UserEvidence $account = null;
    
    /**
     * @var DateTime|null $endUtcDateTime The session end time, if known. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2024 is 2024-01-01T00:00:00Z.
    */
    private ?DateTime $endUtcDateTime = null;
    
    /**
     * @var DeviceEvidence|null $host The host for the session.
    */
    private ?DeviceEvidence $host = null;
    
    /**
     * @var string|null $sessionId The session ID for the account reported in the alert, for example, 0x3e7.
    */
    private ?string $sessionId = null;
    
    /**
     * @var DateTime|null $startUtcDateTime The session start time, if known. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2024 is 2024-01-01T00:00:00Z.
    */
    private ?DateTime $startUtcDateTime = null;
    
    /**
     * Instantiates a new HostLogonSessionEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.hostLogonSessionEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return HostLogonSessionEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): HostLogonSessionEvidence {
        return new HostLogonSessionEvidence();
    }

    /**
     * Gets the account property value. The account that is associated with the sign-in session ID.
     * @return UserEvidence|null
    */
    public function getAccount(): ?UserEvidence {
        return $this->account;
    }

    /**
     * Gets the endUtcDateTime property value. The session end time, if known. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2024 is 2024-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getEndUtcDateTime(): ?DateTime {
        return $this->endUtcDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'account' => fn(ParseNode $n) => $o->setAccount($n->getObjectValue([UserEvidence::class, 'createFromDiscriminatorValue'])),
            'endUtcDateTime' => fn(ParseNode $n) => $o->setEndUtcDateTime($n->getDateTimeValue()),
            'host' => fn(ParseNode $n) => $o->setHost($n->getObjectValue([DeviceEvidence::class, 'createFromDiscriminatorValue'])),
            'sessionId' => fn(ParseNode $n) => $o->setSessionId($n->getStringValue()),
            'startUtcDateTime' => fn(ParseNode $n) => $o->setStartUtcDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the host property value. The host for the session.
     * @return DeviceEvidence|null
    */
    public function getHost(): ?DeviceEvidence {
        return $this->host;
    }

    /**
     * Gets the sessionId property value. The session ID for the account reported in the alert, for example, 0x3e7.
     * @return string|null
    */
    public function getSessionId(): ?string {
        return $this->sessionId;
    }

    /**
     * Gets the startUtcDateTime property value. The session start time, if known. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2024 is 2024-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getStartUtcDateTime(): ?DateTime {
        return $this->startUtcDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('account', $this->getAccount());
        $writer->writeDateTimeValue('endUtcDateTime', $this->getEndUtcDateTime());
        $writer->writeObjectValue('host', $this->getHost());
        $writer->writeStringValue('sessionId', $this->getSessionId());
        $writer->writeDateTimeValue('startUtcDateTime', $this->getStartUtcDateTime());
    }

    /**
     * Sets the account property value. The account that is associated with the sign-in session ID.
     * @param UserEvidence|null $value Value to set for the account property.
    */
    public function setAccount(?UserEvidence $value): void {
        $this->account = $value;
    }

    /**
     * Sets the endUtcDateTime property value. The session end time, if known. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2024 is 2024-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the endUtcDateTime property.
    */
    public function setEndUtcDateTime(?DateTime $value): void {
        $this->endUtcDateTime = $value;
    }

    /**
     * Sets the host property value. The host for the session.
     * @param DeviceEvidence|null $value Value to set for the host property.
    */
    public function setHost(?DeviceEvidence $value): void {
        $this->host = $value;
    }

    /**
     * Sets the sessionId property value. The session ID for the account reported in the alert, for example, 0x3e7.
     * @param string|null $value Value to set for the sessionId property.
    */
    public function setSessionId(?string $value): void {
        $this->sessionId = $value;
    }

    /**
     * Sets the startUtcDateTime property value. The session start time, if known. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2024 is 2024-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the startUtcDateTime property.
    */
    public function setStartUtcDateTime(?DateTime $value): void {
        $this->startUtcDateTime = $value;
    }

}
