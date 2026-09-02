<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class HostPort extends Entity implements Parsable 
{
    /**
     * @var array<HostPortBanner>|null $banners The hostPortBanners retrieved from scanning the port.
    */
    private ?array $banners = null;
    
    /**
     * @var DateTime|null $firstSeenDateTime The first date and time when Microsoft Defender Threat Intelligence observed the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $firstSeenDateTime = null;
    
    /**
     * @var Host|null $host The host property
    */
    private ?Host $host = null;
    
    /**
     * @var DateTime|null $lastScanDateTime The last date and time when Microsoft Defender Threat Intelligence scanned the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastScanDateTime = null;
    
    /**
     * @var DateTime|null $lastSeenDateTime The last date and time when Microsoft Defender Threat Intelligence observed the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastSeenDateTime = null;
    
    /**
     * @var SslCertificate|null $mostRecentSslCertificate The most recent sslCertificate used to communicate on the port.
    */
    private ?SslCertificate $mostRecentSslCertificate = null;
    
    /**
     * @var int|null $port The numerical identifier of the port which is standardized across the internet.
    */
    private ?int $port = null;
    
    /**
     * @var HostPortProtocol|null $protocol The general protocol used to scan the port. The possible values are: tcp, udp, unknownFutureValue.
    */
    private ?HostPortProtocol $protocol = null;
    
    /**
     * @var array<HostPortComponent>|null $services The hostPortComponents retrieved from scanning the port.
    */
    private ?array $services = null;
    
    /**
     * @var HostPortStatus|null $status The status of the port. The possible values are: open, filtered, closed, unknownFutureValue.
    */
    private ?HostPortStatus $status = null;
    
    /**
     * @var int|null $timesObserved The total amount of times that Microsoft Defender Threat Intelligence has observed the hostPort in all its scans.
    */
    private ?int $timesObserved = null;
    
    /**
     * Instantiates a new HostPort and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return HostPort
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): HostPort {
        return new HostPort();
    }

    /**
     * Gets the banners property value. The hostPortBanners retrieved from scanning the port.
     * @return array<HostPortBanner>|null
    */
    public function getBanners(): ?array {
        return $this->banners;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'banners' => fn(ParseNode $n) => $o->setBanners($n->getCollectionOfObjectValues([HostPortBanner::class, 'createFromDiscriminatorValue'])),
            'firstSeenDateTime' => fn(ParseNode $n) => $o->setFirstSeenDateTime($n->getDateTimeValue()),
            'host' => fn(ParseNode $n) => $o->setHost($n->getObjectValue([Host::class, 'createFromDiscriminatorValue'])),
            'lastScanDateTime' => fn(ParseNode $n) => $o->setLastScanDateTime($n->getDateTimeValue()),
            'lastSeenDateTime' => fn(ParseNode $n) => $o->setLastSeenDateTime($n->getDateTimeValue()),
            'mostRecentSslCertificate' => fn(ParseNode $n) => $o->setMostRecentSslCertificate($n->getObjectValue([SslCertificate::class, 'createFromDiscriminatorValue'])),
            'port' => fn(ParseNode $n) => $o->setPort($n->getIntegerValue()),
            'protocol' => fn(ParseNode $n) => $o->setProtocol($n->getEnumValue(HostPortProtocol::class)),
            'services' => fn(ParseNode $n) => $o->setServices($n->getCollectionOfObjectValues([HostPortComponent::class, 'createFromDiscriminatorValue'])),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(HostPortStatus::class)),
            'timesObserved' => fn(ParseNode $n) => $o->setTimesObserved($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the firstSeenDateTime property value. The first date and time when Microsoft Defender Threat Intelligence observed the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getFirstSeenDateTime(): ?DateTime {
        return $this->firstSeenDateTime;
    }

    /**
     * Gets the host property value. The host property
     * @return Host|null
    */
    public function getHost(): ?Host {
        return $this->host;
    }

    /**
     * Gets the lastScanDateTime property value. The last date and time when Microsoft Defender Threat Intelligence scanned the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastScanDateTime(): ?DateTime {
        return $this->lastScanDateTime;
    }

    /**
     * Gets the lastSeenDateTime property value. The last date and time when Microsoft Defender Threat Intelligence observed the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastSeenDateTime(): ?DateTime {
        return $this->lastSeenDateTime;
    }

    /**
     * Gets the mostRecentSslCertificate property value. The most recent sslCertificate used to communicate on the port.
     * @return SslCertificate|null
    */
    public function getMostRecentSslCertificate(): ?SslCertificate {
        return $this->mostRecentSslCertificate;
    }

    /**
     * Gets the port property value. The numerical identifier of the port which is standardized across the internet.
     * @return int|null
    */
    public function getPort(): ?int {
        return $this->port;
    }

    /**
     * Gets the protocol property value. The general protocol used to scan the port. The possible values are: tcp, udp, unknownFutureValue.
     * @return HostPortProtocol|null
    */
    public function getProtocol(): ?HostPortProtocol {
        return $this->protocol;
    }

    /**
     * Gets the services property value. The hostPortComponents retrieved from scanning the port.
     * @return array<HostPortComponent>|null
    */
    public function getServices(): ?array {
        return $this->services;
    }

    /**
     * Gets the status property value. The status of the port. The possible values are: open, filtered, closed, unknownFutureValue.
     * @return HostPortStatus|null
    */
    public function getStatus(): ?HostPortStatus {
        return $this->status;
    }

    /**
     * Gets the timesObserved property value. The total amount of times that Microsoft Defender Threat Intelligence has observed the hostPort in all its scans.
     * @return int|null
    */
    public function getTimesObserved(): ?int {
        return $this->timesObserved;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('banners', $this->getBanners());
        $writer->writeDateTimeValue('firstSeenDateTime', $this->getFirstSeenDateTime());
        $writer->writeObjectValue('host', $this->getHost());
        $writer->writeDateTimeValue('lastScanDateTime', $this->getLastScanDateTime());
        $writer->writeDateTimeValue('lastSeenDateTime', $this->getLastSeenDateTime());
        $writer->writeObjectValue('mostRecentSslCertificate', $this->getMostRecentSslCertificate());
        $writer->writeIntegerValue('port', $this->getPort());
        $writer->writeEnumValue('protocol', $this->getProtocol());
        $writer->writeCollectionOfObjectValues('services', $this->getServices());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeIntegerValue('timesObserved', $this->getTimesObserved());
    }

    /**
     * Sets the banners property value. The hostPortBanners retrieved from scanning the port.
     * @param array<HostPortBanner>|null $value Value to set for the banners property.
    */
    public function setBanners(?array $value): void {
        $this->banners = $value;
    }

    /**
     * Sets the firstSeenDateTime property value. The first date and time when Microsoft Defender Threat Intelligence observed the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the firstSeenDateTime property.
    */
    public function setFirstSeenDateTime(?DateTime $value): void {
        $this->firstSeenDateTime = $value;
    }

    /**
     * Sets the host property value. The host property
     * @param Host|null $value Value to set for the host property.
    */
    public function setHost(?Host $value): void {
        $this->host = $value;
    }

    /**
     * Sets the lastScanDateTime property value. The last date and time when Microsoft Defender Threat Intelligence scanned the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastScanDateTime property.
    */
    public function setLastScanDateTime(?DateTime $value): void {
        $this->lastScanDateTime = $value;
    }

    /**
     * Sets the lastSeenDateTime property value. The last date and time when Microsoft Defender Threat Intelligence observed the hostPort. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastSeenDateTime property.
    */
    public function setLastSeenDateTime(?DateTime $value): void {
        $this->lastSeenDateTime = $value;
    }

    /**
     * Sets the mostRecentSslCertificate property value. The most recent sslCertificate used to communicate on the port.
     * @param SslCertificate|null $value Value to set for the mostRecentSslCertificate property.
    */
    public function setMostRecentSslCertificate(?SslCertificate $value): void {
        $this->mostRecentSslCertificate = $value;
    }

    /**
     * Sets the port property value. The numerical identifier of the port which is standardized across the internet.
     * @param int|null $value Value to set for the port property.
    */
    public function setPort(?int $value): void {
        $this->port = $value;
    }

    /**
     * Sets the protocol property value. The general protocol used to scan the port. The possible values are: tcp, udp, unknownFutureValue.
     * @param HostPortProtocol|null $value Value to set for the protocol property.
    */
    public function setProtocol(?HostPortProtocol $value): void {
        $this->protocol = $value;
    }

    /**
     * Sets the services property value. The hostPortComponents retrieved from scanning the port.
     * @param array<HostPortComponent>|null $value Value to set for the services property.
    */
    public function setServices(?array $value): void {
        $this->services = $value;
    }

    /**
     * Sets the status property value. The status of the port. The possible values are: open, filtered, closed, unknownFutureValue.
     * @param HostPortStatus|null $value Value to set for the status property.
    */
    public function setStatus(?HostPortStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the timesObserved property value. The total amount of times that Microsoft Defender Threat Intelligence has observed the hostPort in all its scans.
     * @param int|null $value Value to set for the timesObserved property.
    */
    public function setTimesObserved(?int $value): void {
        $this->timesObserved = $value;
    }

}
