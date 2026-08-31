<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WebApplicationFirewallVerificationResult implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<GenericError>|null $errors List of errors encountered during the verification process.
    */
    private ?array $errors = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var WebApplicationFirewallVerificationStatus|null $status The status property
    */
    private ?WebApplicationFirewallVerificationStatus $status = null;
    
    /**
     * @var DateTime|null $verifiedOnDateTime UTC timestamp when the verification was performed or last updated. This indicates when the verification result was produced.
    */
    private ?DateTime $verifiedOnDateTime = null;
    
    /**
     * @var array<GenericError>|null $warnings List of warnings produced during verification.
    */
    private ?array $warnings = null;
    
    /**
     * Instantiates a new WebApplicationFirewallVerificationResult and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WebApplicationFirewallVerificationResult
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WebApplicationFirewallVerificationResult {
        return new WebApplicationFirewallVerificationResult();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the errors property value. List of errors encountered during the verification process.
     * @return array<GenericError>|null
    */
    public function getErrors(): ?array {
        return $this->errors;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'errors' => fn(ParseNode $n) => $o->setErrors($n->getCollectionOfObjectValues([GenericError::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(WebApplicationFirewallVerificationStatus::class)),
            'verifiedOnDateTime' => fn(ParseNode $n) => $o->setVerifiedOnDateTime($n->getDateTimeValue()),
            'warnings' => fn(ParseNode $n) => $o->setWarnings($n->getCollectionOfObjectValues([GenericError::class, 'createFromDiscriminatorValue'])),
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
     * Gets the status property value. The status property
     * @return WebApplicationFirewallVerificationStatus|null
    */
    public function getStatus(): ?WebApplicationFirewallVerificationStatus {
        return $this->status;
    }

    /**
     * Gets the verifiedOnDateTime property value. UTC timestamp when the verification was performed or last updated. This indicates when the verification result was produced.
     * @return DateTime|null
    */
    public function getVerifiedOnDateTime(): ?DateTime {
        return $this->verifiedOnDateTime;
    }

    /**
     * Gets the warnings property value. List of warnings produced during verification.
     * @return array<GenericError>|null
    */
    public function getWarnings(): ?array {
        return $this->warnings;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('errors', $this->getErrors());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeDateTimeValue('verifiedOnDateTime', $this->getVerifiedOnDateTime());
        $writer->writeCollectionOfObjectValues('warnings', $this->getWarnings());
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
     * Sets the errors property value. List of errors encountered during the verification process.
     * @param array<GenericError>|null $value Value to set for the errors property.
    */
    public function setErrors(?array $value): void {
        $this->errors = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the status property value. The status property
     * @param WebApplicationFirewallVerificationStatus|null $value Value to set for the status property.
    */
    public function setStatus(?WebApplicationFirewallVerificationStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the verifiedOnDateTime property value. UTC timestamp when the verification was performed or last updated. This indicates when the verification result was produced.
     * @param DateTime|null $value Value to set for the verifiedOnDateTime property.
    */
    public function setVerifiedOnDateTime(?DateTime $value): void {
        $this->verifiedOnDateTime = $value;
    }

    /**
     * Sets the warnings property value. List of warnings produced during verification.
     * @param array<GenericError>|null $value Value to set for the warnings property.
    */
    public function setWarnings(?array $value): void {
        $this->warnings = $value;
    }

}
