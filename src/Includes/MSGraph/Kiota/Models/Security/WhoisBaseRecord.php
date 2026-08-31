<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\Entity;

class WhoisBaseRecord extends Entity implements Parsable 
{
    /**
     * @var WhoisContact|null $abuse The contact information for the abuse contact.
    */
    private ?WhoisContact $abuse = null;
    
    /**
     * @var WhoisContact|null $admin The contact information for the admin contact.
    */
    private ?WhoisContact $admin = null;
    
    /**
     * @var WhoisContact|null $billing The contact information for the billing contact.
    */
    private ?WhoisContact $billing = null;
    
    /**
     * @var string|null $domainStatus The domain status for this WHOIS object.
    */
    private ?string $domainStatus = null;
    
    /**
     * @var DateTime|null $expirationDateTime The date and time when this WHOIS record expires with the registrar. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $expirationDateTime = null;
    
    /**
     * @var DateTime|null $firstSeenDateTime The first seen date and time of this WHOIS record. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $firstSeenDateTime = null;
    
    /**
     * @var Host|null $host The host property
    */
    private ?Host $host = null;
    
    /**
     * @var DateTime|null $lastSeenDateTime The last seen date and time of this WHOIS record. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastSeenDateTime = null;
    
    /**
     * @var DateTime|null $lastUpdateDateTime The date and time when this WHOIS record was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastUpdateDateTime = null;
    
    /**
     * @var array<WhoisNameserver>|null $nameservers The nameservers for this WHOIS object.
    */
    private ?array $nameservers = null;
    
    /**
     * @var WhoisContact|null $noc The contact information for the noc contact.
    */
    private ?WhoisContact $noc = null;
    
    /**
     * @var string|null $rawWhoisText The raw WHOIS details for this WHOIS object.
    */
    private ?string $rawWhoisText = null;
    
    /**
     * @var WhoisContact|null $registrant The contact information for the registrant contact.
    */
    private ?WhoisContact $registrant = null;
    
    /**
     * @var WhoisContact|null $registrar The contact information for the registrar contact.
    */
    private ?WhoisContact $registrar = null;
    
    /**
     * @var DateTime|null $registrationDateTime The date and time when this WHOIS record was registered with a registrar. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $registrationDateTime = null;
    
    /**
     * @var WhoisContact|null $technical The contact information for the technical contact.
    */
    private ?WhoisContact $technical = null;
    
    /**
     * @var string|null $whoisServer The WHOIS server that provides the details.
    */
    private ?string $whoisServer = null;
    
    /**
     * @var WhoisContact|null $zone The contact information for the zone contact.
    */
    private ?WhoisContact $zone = null;
    
    /**
     * Instantiates a new WhoisBaseRecord and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WhoisBaseRecord
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WhoisBaseRecord {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.security.whoisHistoryRecord': return new WhoisHistoryRecord();
                case '#microsoft.graph.security.whoisRecord': return new WhoisRecord();
            }
        }
        return new WhoisBaseRecord();
    }

    /**
     * Gets the abuse property value. The contact information for the abuse contact.
     * @return WhoisContact|null
    */
    public function getAbuse(): ?WhoisContact {
        return $this->abuse;
    }

    /**
     * Gets the admin property value. The contact information for the admin contact.
     * @return WhoisContact|null
    */
    public function getAdmin(): ?WhoisContact {
        return $this->admin;
    }

    /**
     * Gets the billing property value. The contact information for the billing contact.
     * @return WhoisContact|null
    */
    public function getBilling(): ?WhoisContact {
        return $this->billing;
    }

    /**
     * Gets the domainStatus property value. The domain status for this WHOIS object.
     * @return string|null
    */
    public function getDomainStatus(): ?string {
        return $this->domainStatus;
    }

    /**
     * Gets the expirationDateTime property value. The date and time when this WHOIS record expires with the registrar. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getExpirationDateTime(): ?DateTime {
        return $this->expirationDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'abuse' => fn(ParseNode $n) => $o->setAbuse($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'admin' => fn(ParseNode $n) => $o->setAdmin($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'billing' => fn(ParseNode $n) => $o->setBilling($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'domainStatus' => fn(ParseNode $n) => $o->setDomainStatus($n->getStringValue()),
            'expirationDateTime' => fn(ParseNode $n) => $o->setExpirationDateTime($n->getDateTimeValue()),
            'firstSeenDateTime' => fn(ParseNode $n) => $o->setFirstSeenDateTime($n->getDateTimeValue()),
            'host' => fn(ParseNode $n) => $o->setHost($n->getObjectValue([Host::class, 'createFromDiscriminatorValue'])),
            'lastSeenDateTime' => fn(ParseNode $n) => $o->setLastSeenDateTime($n->getDateTimeValue()),
            'lastUpdateDateTime' => fn(ParseNode $n) => $o->setLastUpdateDateTime($n->getDateTimeValue()),
            'nameservers' => fn(ParseNode $n) => $o->setNameservers($n->getCollectionOfObjectValues([WhoisNameserver::class, 'createFromDiscriminatorValue'])),
            'noc' => fn(ParseNode $n) => $o->setNoc($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'rawWhoisText' => fn(ParseNode $n) => $o->setRawWhoisText($n->getStringValue()),
            'registrant' => fn(ParseNode $n) => $o->setRegistrant($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'registrar' => fn(ParseNode $n) => $o->setRegistrar($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'registrationDateTime' => fn(ParseNode $n) => $o->setRegistrationDateTime($n->getDateTimeValue()),
            'technical' => fn(ParseNode $n) => $o->setTechnical($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
            'whoisServer' => fn(ParseNode $n) => $o->setWhoisServer($n->getStringValue()),
            'zone' => fn(ParseNode $n) => $o->setZone($n->getObjectValue([WhoisContact::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the firstSeenDateTime property value. The first seen date and time of this WHOIS record. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
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
     * Gets the lastSeenDateTime property value. The last seen date and time of this WHOIS record. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastSeenDateTime(): ?DateTime {
        return $this->lastSeenDateTime;
    }

    /**
     * Gets the lastUpdateDateTime property value. The date and time when this WHOIS record was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastUpdateDateTime(): ?DateTime {
        return $this->lastUpdateDateTime;
    }

    /**
     * Gets the nameservers property value. The nameservers for this WHOIS object.
     * @return array<WhoisNameserver>|null
    */
    public function getNameservers(): ?array {
        return $this->nameservers;
    }

    /**
     * Gets the noc property value. The contact information for the noc contact.
     * @return WhoisContact|null
    */
    public function getNoc(): ?WhoisContact {
        return $this->noc;
    }

    /**
     * Gets the rawWhoisText property value. The raw WHOIS details for this WHOIS object.
     * @return string|null
    */
    public function getRawWhoisText(): ?string {
        return $this->rawWhoisText;
    }

    /**
     * Gets the registrant property value. The contact information for the registrant contact.
     * @return WhoisContact|null
    */
    public function getRegistrant(): ?WhoisContact {
        return $this->registrant;
    }

    /**
     * Gets the registrar property value. The contact information for the registrar contact.
     * @return WhoisContact|null
    */
    public function getRegistrar(): ?WhoisContact {
        return $this->registrar;
    }

    /**
     * Gets the registrationDateTime property value. The date and time when this WHOIS record was registered with a registrar. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getRegistrationDateTime(): ?DateTime {
        return $this->registrationDateTime;
    }

    /**
     * Gets the technical property value. The contact information for the technical contact.
     * @return WhoisContact|null
    */
    public function getTechnical(): ?WhoisContact {
        return $this->technical;
    }

    /**
     * Gets the whoisServer property value. The WHOIS server that provides the details.
     * @return string|null
    */
    public function getWhoisServer(): ?string {
        return $this->whoisServer;
    }

    /**
     * Gets the zone property value. The contact information for the zone contact.
     * @return WhoisContact|null
    */
    public function getZone(): ?WhoisContact {
        return $this->zone;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('abuse', $this->getAbuse());
        $writer->writeObjectValue('admin', $this->getAdmin());
        $writer->writeObjectValue('billing', $this->getBilling());
        $writer->writeStringValue('domainStatus', $this->getDomainStatus());
        $writer->writeDateTimeValue('expirationDateTime', $this->getExpirationDateTime());
        $writer->writeDateTimeValue('firstSeenDateTime', $this->getFirstSeenDateTime());
        $writer->writeObjectValue('host', $this->getHost());
        $writer->writeDateTimeValue('lastSeenDateTime', $this->getLastSeenDateTime());
        $writer->writeDateTimeValue('lastUpdateDateTime', $this->getLastUpdateDateTime());
        $writer->writeCollectionOfObjectValues('nameservers', $this->getNameservers());
        $writer->writeObjectValue('noc', $this->getNoc());
        $writer->writeStringValue('rawWhoisText', $this->getRawWhoisText());
        $writer->writeObjectValue('registrant', $this->getRegistrant());
        $writer->writeObjectValue('registrar', $this->getRegistrar());
        $writer->writeDateTimeValue('registrationDateTime', $this->getRegistrationDateTime());
        $writer->writeObjectValue('technical', $this->getTechnical());
        $writer->writeStringValue('whoisServer', $this->getWhoisServer());
        $writer->writeObjectValue('zone', $this->getZone());
    }

    /**
     * Sets the abuse property value. The contact information for the abuse contact.
     * @param WhoisContact|null $value Value to set for the abuse property.
    */
    public function setAbuse(?WhoisContact $value): void {
        $this->abuse = $value;
    }

    /**
     * Sets the admin property value. The contact information for the admin contact.
     * @param WhoisContact|null $value Value to set for the admin property.
    */
    public function setAdmin(?WhoisContact $value): void {
        $this->admin = $value;
    }

    /**
     * Sets the billing property value. The contact information for the billing contact.
     * @param WhoisContact|null $value Value to set for the billing property.
    */
    public function setBilling(?WhoisContact $value): void {
        $this->billing = $value;
    }

    /**
     * Sets the domainStatus property value. The domain status for this WHOIS object.
     * @param string|null $value Value to set for the domainStatus property.
    */
    public function setDomainStatus(?string $value): void {
        $this->domainStatus = $value;
    }

    /**
     * Sets the expirationDateTime property value. The date and time when this WHOIS record expires with the registrar. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the expirationDateTime property.
    */
    public function setExpirationDateTime(?DateTime $value): void {
        $this->expirationDateTime = $value;
    }

    /**
     * Sets the firstSeenDateTime property value. The first seen date and time of this WHOIS record. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
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
     * Sets the lastSeenDateTime property value. The last seen date and time of this WHOIS record. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastSeenDateTime property.
    */
    public function setLastSeenDateTime(?DateTime $value): void {
        $this->lastSeenDateTime = $value;
    }

    /**
     * Sets the lastUpdateDateTime property value. The date and time when this WHOIS record was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastUpdateDateTime property.
    */
    public function setLastUpdateDateTime(?DateTime $value): void {
        $this->lastUpdateDateTime = $value;
    }

    /**
     * Sets the nameservers property value. The nameservers for this WHOIS object.
     * @param array<WhoisNameserver>|null $value Value to set for the nameservers property.
    */
    public function setNameservers(?array $value): void {
        $this->nameservers = $value;
    }

    /**
     * Sets the noc property value. The contact information for the noc contact.
     * @param WhoisContact|null $value Value to set for the noc property.
    */
    public function setNoc(?WhoisContact $value): void {
        $this->noc = $value;
    }

    /**
     * Sets the rawWhoisText property value. The raw WHOIS details for this WHOIS object.
     * @param string|null $value Value to set for the rawWhoisText property.
    */
    public function setRawWhoisText(?string $value): void {
        $this->rawWhoisText = $value;
    }

    /**
     * Sets the registrant property value. The contact information for the registrant contact.
     * @param WhoisContact|null $value Value to set for the registrant property.
    */
    public function setRegistrant(?WhoisContact $value): void {
        $this->registrant = $value;
    }

    /**
     * Sets the registrar property value. The contact information for the registrar contact.
     * @param WhoisContact|null $value Value to set for the registrar property.
    */
    public function setRegistrar(?WhoisContact $value): void {
        $this->registrar = $value;
    }

    /**
     * Sets the registrationDateTime property value. The date and time when this WHOIS record was registered with a registrar. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the registrationDateTime property.
    */
    public function setRegistrationDateTime(?DateTime $value): void {
        $this->registrationDateTime = $value;
    }

    /**
     * Sets the technical property value. The contact information for the technical contact.
     * @param WhoisContact|null $value Value to set for the technical property.
    */
    public function setTechnical(?WhoisContact $value): void {
        $this->technical = $value;
    }

    /**
     * Sets the whoisServer property value. The WHOIS server that provides the details.
     * @param string|null $value Value to set for the whoisServer property.
    */
    public function setWhoisServer(?string $value): void {
        $this->whoisServer = $value;
    }

    /**
     * Sets the zone property value. The contact information for the zone contact.
     * @param WhoisContact|null $value Value to set for the zone property.
    */
    public function setZone(?WhoisContact $value): void {
        $this->zone = $value;
    }

}
