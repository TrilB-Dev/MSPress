<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AnalyzedEmailSenderDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $displayName Display name of sender from address.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $domainCreationDateTime Date and time of creation of the sender domain.
    */
    private ?DateTime $domainCreationDateTime = null;
    
    /**
     * @var string|null $domainName Registered name of the domain.
    */
    private ?string $domainName = null;
    
    /**
     * @var string|null $domainOwner Owner of the domain.
    */
    private ?string $domainOwner = null;
    
    /**
     * @var string|null $fromAddress The sender email address in the mail From header, also known as the envelope sender or the P1 sender.
    */
    private ?string $fromAddress = null;
    
    /**
     * @var string|null $ipv4 The IPv4 address of the last detected mail server that relayed the message.
    */
    private ?string $ipv4 = null;
    
    /**
     * @var string|null $location Location of the domain.
    */
    private ?string $location = null;
    
    /**
     * @var string|null $mailFromAddress The sender email address in the From header, which is visible to email recipients on their email clients. Also known as P2 sender.
    */
    private ?string $mailFromAddress = null;
    
    /**
     * @var string|null $mailFromDomainName Domain name of sender mail from address.
    */
    private ?string $mailFromDomainName = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new AnalyzedEmailSenderDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AnalyzedEmailSenderDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AnalyzedEmailSenderDetail {
        return new AnalyzedEmailSenderDetail();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the displayName property value. Display name of sender from address.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the domainCreationDateTime property value. Date and time of creation of the sender domain.
     * @return DateTime|null
    */
    public function getDomainCreationDateTime(): ?DateTime {
        return $this->domainCreationDateTime;
    }

    /**
     * Gets the domainName property value. Registered name of the domain.
     * @return string|null
    */
    public function getDomainName(): ?string {
        return $this->domainName;
    }

    /**
     * Gets the domainOwner property value. Owner of the domain.
     * @return string|null
    */
    public function getDomainOwner(): ?string {
        return $this->domainOwner;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'domainCreationDateTime' => fn(ParseNode $n) => $o->setDomainCreationDateTime($n->getDateTimeValue()),
            'domainName' => fn(ParseNode $n) => $o->setDomainName($n->getStringValue()),
            'domainOwner' => fn(ParseNode $n) => $o->setDomainOwner($n->getStringValue()),
            'fromAddress' => fn(ParseNode $n) => $o->setFromAddress($n->getStringValue()),
            'ipv4' => fn(ParseNode $n) => $o->setIpv4($n->getStringValue()),
            'location' => fn(ParseNode $n) => $o->setLocation($n->getStringValue()),
            'mailFromAddress' => fn(ParseNode $n) => $o->setMailFromAddress($n->getStringValue()),
            'mailFromDomainName' => fn(ParseNode $n) => $o->setMailFromDomainName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the fromAddress property value. The sender email address in the mail From header, also known as the envelope sender or the P1 sender.
     * @return string|null
    */
    public function getFromAddress(): ?string {
        return $this->fromAddress;
    }

    /**
     * Gets the ipv4 property value. The IPv4 address of the last detected mail server that relayed the message.
     * @return string|null
    */
    public function getIpv4(): ?string {
        return $this->ipv4;
    }

    /**
     * Gets the location property value. Location of the domain.
     * @return string|null
    */
    public function getLocation(): ?string {
        return $this->location;
    }

    /**
     * Gets the mailFromAddress property value. The sender email address in the From header, which is visible to email recipients on their email clients. Also known as P2 sender.
     * @return string|null
    */
    public function getMailFromAddress(): ?string {
        return $this->mailFromAddress;
    }

    /**
     * Gets the mailFromDomainName property value. Domain name of sender mail from address.
     * @return string|null
    */
    public function getMailFromDomainName(): ?string {
        return $this->mailFromDomainName;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('domainCreationDateTime', $this->getDomainCreationDateTime());
        $writer->writeStringValue('domainName', $this->getDomainName());
        $writer->writeStringValue('domainOwner', $this->getDomainOwner());
        $writer->writeStringValue('fromAddress', $this->getFromAddress());
        $writer->writeStringValue('ipv4', $this->getIpv4());
        $writer->writeStringValue('location', $this->getLocation());
        $writer->writeStringValue('mailFromAddress', $this->getMailFromAddress());
        $writer->writeStringValue('mailFromDomainName', $this->getMailFromDomainName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the displayName property value. Display name of sender from address.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the domainCreationDateTime property value. Date and time of creation of the sender domain.
     * @param DateTime|null $value Value to set for the domainCreationDateTime property.
    */
    public function setDomainCreationDateTime(?DateTime $value): void {
        $this->domainCreationDateTime = $value;
    }

    /**
     * Sets the domainName property value. Registered name of the domain.
     * @param string|null $value Value to set for the domainName property.
    */
    public function setDomainName(?string $value): void {
        $this->domainName = $value;
    }

    /**
     * Sets the domainOwner property value. Owner of the domain.
     * @param string|null $value Value to set for the domainOwner property.
    */
    public function setDomainOwner(?string $value): void {
        $this->domainOwner = $value;
    }

    /**
     * Sets the fromAddress property value. The sender email address in the mail From header, also known as the envelope sender or the P1 sender.
     * @param string|null $value Value to set for the fromAddress property.
    */
    public function setFromAddress(?string $value): void {
        $this->fromAddress = $value;
    }

    /**
     * Sets the ipv4 property value. The IPv4 address of the last detected mail server that relayed the message.
     * @param string|null $value Value to set for the ipv4 property.
    */
    public function setIpv4(?string $value): void {
        $this->ipv4 = $value;
    }

    /**
     * Sets the location property value. Location of the domain.
     * @param string|null $value Value to set for the location property.
    */
    public function setLocation(?string $value): void {
        $this->location = $value;
    }

    /**
     * Sets the mailFromAddress property value. The sender email address in the From header, which is visible to email recipients on their email clients. Also known as P2 sender.
     * @param string|null $value Value to set for the mailFromAddress property.
    */
    public function setMailFromAddress(?string $value): void {
        $this->mailFromAddress = $value;
    }

    /**
     * Sets the mailFromDomainName property value. Domain name of sender mail from address.
     * @param string|null $value Value to set for the mailFromDomainName property.
    */
    public function setMailFromDomainName(?string $value): void {
        $this->mailFromDomainName = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
