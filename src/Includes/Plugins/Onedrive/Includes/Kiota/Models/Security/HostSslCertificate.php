<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class HostSslCertificate extends Artifact implements Parsable 
{
    /**
     * @var DateTime|null $firstSeenDateTime The first date and time when this hostSslCertificate was observed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $firstSeenDateTime = null;
    
    /**
     * @var Host|null $host The host for this hostSslCertificate.
    */
    private ?Host $host = null;
    
    /**
     * @var DateTime|null $lastSeenDateTime The most recent date and time when this hostSslCertificate was observed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastSeenDateTime = null;
    
    /**
     * @var array<HostSslCertificatePort>|null $ports The ports related with this hostSslCertificate.
    */
    private ?array $ports = null;
    
    /**
     * @var SslCertificate|null $sslCertificate The sslCertificate for this hostSslCertificate.
    */
    private ?SslCertificate $sslCertificate = null;
    
    /**
     * Instantiates a new HostSslCertificate and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.hostSslCertificate');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return HostSslCertificate
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): HostSslCertificate {
        return new HostSslCertificate();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'firstSeenDateTime' => fn(ParseNode $n) => $o->setFirstSeenDateTime($n->getDateTimeValue()),
            'host' => fn(ParseNode $n) => $o->setHost($n->getObjectValue([Host::class, 'createFromDiscriminatorValue'])),
            'lastSeenDateTime' => fn(ParseNode $n) => $o->setLastSeenDateTime($n->getDateTimeValue()),
            'ports' => fn(ParseNode $n) => $o->setPorts($n->getCollectionOfObjectValues([HostSslCertificatePort::class, 'createFromDiscriminatorValue'])),
            'sslCertificate' => fn(ParseNode $n) => $o->setSslCertificate($n->getObjectValue([SslCertificate::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the firstSeenDateTime property value. The first date and time when this hostSslCertificate was observed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getFirstSeenDateTime(): ?DateTime {
        return $this->firstSeenDateTime;
    }

    /**
     * Gets the host property value. The host for this hostSslCertificate.
     * @return Host|null
    */
    public function getHost(): ?Host {
        return $this->host;
    }

    /**
     * Gets the lastSeenDateTime property value. The most recent date and time when this hostSslCertificate was observed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastSeenDateTime(): ?DateTime {
        return $this->lastSeenDateTime;
    }

    /**
     * Gets the ports property value. The ports related with this hostSslCertificate.
     * @return array<HostSslCertificatePort>|null
    */
    public function getPorts(): ?array {
        return $this->ports;
    }

    /**
     * Gets the sslCertificate property value. The sslCertificate for this hostSslCertificate.
     * @return SslCertificate|null
    */
    public function getSslCertificate(): ?SslCertificate {
        return $this->sslCertificate;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('firstSeenDateTime', $this->getFirstSeenDateTime());
        $writer->writeObjectValue('host', $this->getHost());
        $writer->writeDateTimeValue('lastSeenDateTime', $this->getLastSeenDateTime());
        $writer->writeCollectionOfObjectValues('ports', $this->getPorts());
        $writer->writeObjectValue('sslCertificate', $this->getSslCertificate());
    }

    /**
     * Sets the firstSeenDateTime property value. The first date and time when this hostSslCertificate was observed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the firstSeenDateTime property.
    */
    public function setFirstSeenDateTime(?DateTime $value): void {
        $this->firstSeenDateTime = $value;
    }

    /**
     * Sets the host property value. The host for this hostSslCertificate.
     * @param Host|null $value Value to set for the host property.
    */
    public function setHost(?Host $value): void {
        $this->host = $value;
    }

    /**
     * Sets the lastSeenDateTime property value. The most recent date and time when this hostSslCertificate was observed. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastSeenDateTime property.
    */
    public function setLastSeenDateTime(?DateTime $value): void {
        $this->lastSeenDateTime = $value;
    }

    /**
     * Sets the ports property value. The ports related with this hostSslCertificate.
     * @param array<HostSslCertificatePort>|null $value Value to set for the ports property.
    */
    public function setPorts(?array $value): void {
        $this->ports = $value;
    }

    /**
     * Sets the sslCertificate property value. The sslCertificate for this hostSslCertificate.
     * @param SslCertificate|null $value Value to set for the sslCertificate property.
    */
    public function setSslCertificate(?SslCertificate $value): void {
        $this->sslCertificate = $value;
    }

}
