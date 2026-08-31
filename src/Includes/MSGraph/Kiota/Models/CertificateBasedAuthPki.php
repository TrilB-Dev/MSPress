<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CertificateBasedAuthPki extends DirectoryObject implements Parsable 
{
    /**
     * @var array<CertificateAuthorityDetail>|null $certificateAuthorities The collection of certificate authorities contained in this public key infrastructure resource.
    */
    private ?array $certificateAuthorities = null;
    
    /**
     * @var string|null $displayName The name of the object. Maximum length is 256 characters.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The date and time when the object was created or last modified.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $status The status of any asynchronous jobs runs on the object which can be upload or delete.
    */
    private ?string $status = null;
    
    /**
     * @var string|null $statusDetails The status details of the upload/deleted operation of PKI (Public Key Infrastructure).
    */
    private ?string $statusDetails = null;
    
    /**
     * Instantiates a new CertificateBasedAuthPki and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.certificateBasedAuthPki');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CertificateBasedAuthPki
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CertificateBasedAuthPki {
        return new CertificateBasedAuthPki();
    }

    /**
     * Gets the certificateAuthorities property value. The collection of certificate authorities contained in this public key infrastructure resource.
     * @return array<CertificateAuthorityDetail>|null
    */
    public function getCertificateAuthorities(): ?array {
        return $this->certificateAuthorities;
    }

    /**
     * Gets the displayName property value. The name of the object. Maximum length is 256 characters.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'certificateAuthorities' => fn(ParseNode $n) => $o->setCertificateAuthorities($n->getCollectionOfObjectValues([CertificateAuthorityDetail::class, 'createFromDiscriminatorValue'])),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getStringValue()),
            'statusDetails' => fn(ParseNode $n) => $o->setStatusDetails($n->getStringValue()),
        ]);
    }

    /**
     * Gets the lastModifiedDateTime property value. The date and time when the object was created or last modified.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the status property value. The status of any asynchronous jobs runs on the object which can be upload or delete.
     * @return string|null
    */
    public function getStatus(): ?string {
        return $this->status;
    }

    /**
     * Gets the statusDetails property value. The status details of the upload/deleted operation of PKI (Public Key Infrastructure).
     * @return string|null
    */
    public function getStatusDetails(): ?string {
        return $this->statusDetails;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('certificateAuthorities', $this->getCertificateAuthorities());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeStringValue('status', $this->getStatus());
        $writer->writeStringValue('statusDetails', $this->getStatusDetails());
    }

    /**
     * Sets the certificateAuthorities property value. The collection of certificate authorities contained in this public key infrastructure resource.
     * @param array<CertificateAuthorityDetail>|null $value Value to set for the certificateAuthorities property.
    */
    public function setCertificateAuthorities(?array $value): void {
        $this->certificateAuthorities = $value;
    }

    /**
     * Sets the displayName property value. The name of the object. Maximum length is 256 characters.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The date and time when the object was created or last modified.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the status property value. The status of any asynchronous jobs runs on the object which can be upload or delete.
     * @param string|null $value Value to set for the status property.
    */
    public function setStatus(?string $value): void {
        $this->status = $value;
    }

    /**
     * Sets the statusDetails property value. The status details of the upload/deleted operation of PKI (Public Key Infrastructure).
     * @param string|null $value Value to set for the statusDetails property.
    */
    public function setStatusDetails(?string $value): void {
        $this->statusDetails = $value;
    }

}
