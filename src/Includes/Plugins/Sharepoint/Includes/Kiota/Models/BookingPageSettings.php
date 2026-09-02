<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BookingPageSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var BookingPageAccessControl|null $accessControl The accessControl property
    */
    private ?BookingPageAccessControl $accessControl = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $bookingPageColorCode Custom color for the booking page. The value should be in Hex format. For example, #123456.
    */
    private ?string $bookingPageColorCode = null;
    
    /**
     * @var string|null $businessTimeZone The time zone of the customer. For a list of possible values, see dateTimeTimeZone.
    */
    private ?string $businessTimeZone = null;
    
    /**
     * @var string|null $customerConsentMessage The personal data collection and usage consent message in the booking page.
    */
    private ?string $customerConsentMessage = null;
    
    /**
     * @var bool|null $enforceOneTimePassword Determines whether the one-time password is required to create an appointment. The default value is false.
    */
    private ?bool $enforceOneTimePassword = null;
    
    /**
     * @var bool|null $isBusinessLogoDisplayEnabled Indicates whether the business logo is displayed on the booking page. The default value is false.
    */
    private ?bool $isBusinessLogoDisplayEnabled = null;
    
    /**
     * @var bool|null $isCustomerConsentEnabled Enables personal data collection and the usage consent toggle on the booking page. The default value is false.
    */
    private ?bool $isCustomerConsentEnabled = null;
    
    /**
     * @var bool|null $isSearchEngineIndexabilityDisabled Indicates whether web crawlers index this page. The defaults value is false.
    */
    private ?bool $isSearchEngineIndexabilityDisabled = null;
    
    /**
     * @var bool|null $isTimeSlotTimeZoneSetToBusinessTimeZone Indicates whether the time zone of the time slot is set to the time zone of the business. The default value is false.
    */
    private ?bool $isTimeSlotTimeZoneSetToBusinessTimeZone = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $privacyPolicyWebUrl URL of a webpage that provides the terms and conditions of the business. If a privacy policy isn't included, the following text appears on the booking page as default: 'The policies and practices of {bookingbusinessname} apply to the use of your data.'
    */
    private ?string $privacyPolicyWebUrl = null;
    
    /**
     * @var string|null $termsAndConditionsWebUrl URL of a webpage that provides the terms and conditions of the business.
    */
    private ?string $termsAndConditionsWebUrl = null;
    
    /**
     * Instantiates a new BookingPageSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BookingPageSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BookingPageSettings {
        return new BookingPageSettings();
    }

    /**
     * Gets the accessControl property value. The accessControl property
     * @return BookingPageAccessControl|null
    */
    public function getAccessControl(): ?BookingPageAccessControl {
        return $this->accessControl;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bookingPageColorCode property value. Custom color for the booking page. The value should be in Hex format. For example, #123456.
     * @return string|null
    */
    public function getBookingPageColorCode(): ?string {
        return $this->bookingPageColorCode;
    }

    /**
     * Gets the businessTimeZone property value. The time zone of the customer. For a list of possible values, see dateTimeTimeZone.
     * @return string|null
    */
    public function getBusinessTimeZone(): ?string {
        return $this->businessTimeZone;
    }

    /**
     * Gets the customerConsentMessage property value. The personal data collection and usage consent message in the booking page.
     * @return string|null
    */
    public function getCustomerConsentMessage(): ?string {
        return $this->customerConsentMessage;
    }

    /**
     * Gets the enforceOneTimePassword property value. Determines whether the one-time password is required to create an appointment. The default value is false.
     * @return bool|null
    */
    public function getEnforceOneTimePassword(): ?bool {
        return $this->enforceOneTimePassword;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'accessControl' => fn(ParseNode $n) => $o->setAccessControl($n->getEnumValue(BookingPageAccessControl::class)),
            'bookingPageColorCode' => fn(ParseNode $n) => $o->setBookingPageColorCode($n->getStringValue()),
            'businessTimeZone' => fn(ParseNode $n) => $o->setBusinessTimeZone($n->getStringValue()),
            'customerConsentMessage' => fn(ParseNode $n) => $o->setCustomerConsentMessage($n->getStringValue()),
            'enforceOneTimePassword' => fn(ParseNode $n) => $o->setEnforceOneTimePassword($n->getBooleanValue()),
            'isBusinessLogoDisplayEnabled' => fn(ParseNode $n) => $o->setIsBusinessLogoDisplayEnabled($n->getBooleanValue()),
            'isCustomerConsentEnabled' => fn(ParseNode $n) => $o->setIsCustomerConsentEnabled($n->getBooleanValue()),
            'isSearchEngineIndexabilityDisabled' => fn(ParseNode $n) => $o->setIsSearchEngineIndexabilityDisabled($n->getBooleanValue()),
            'isTimeSlotTimeZoneSetToBusinessTimeZone' => fn(ParseNode $n) => $o->setIsTimeSlotTimeZoneSetToBusinessTimeZone($n->getBooleanValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'privacyPolicyWebUrl' => fn(ParseNode $n) => $o->setPrivacyPolicyWebUrl($n->getStringValue()),
            'termsAndConditionsWebUrl' => fn(ParseNode $n) => $o->setTermsAndConditionsWebUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the isBusinessLogoDisplayEnabled property value. Indicates whether the business logo is displayed on the booking page. The default value is false.
     * @return bool|null
    */
    public function getIsBusinessLogoDisplayEnabled(): ?bool {
        return $this->isBusinessLogoDisplayEnabled;
    }

    /**
     * Gets the isCustomerConsentEnabled property value. Enables personal data collection and the usage consent toggle on the booking page. The default value is false.
     * @return bool|null
    */
    public function getIsCustomerConsentEnabled(): ?bool {
        return $this->isCustomerConsentEnabled;
    }

    /**
     * Gets the isSearchEngineIndexabilityDisabled property value. Indicates whether web crawlers index this page. The defaults value is false.
     * @return bool|null
    */
    public function getIsSearchEngineIndexabilityDisabled(): ?bool {
        return $this->isSearchEngineIndexabilityDisabled;
    }

    /**
     * Gets the isTimeSlotTimeZoneSetToBusinessTimeZone property value. Indicates whether the time zone of the time slot is set to the time zone of the business. The default value is false.
     * @return bool|null
    */
    public function getIsTimeSlotTimeZoneSetToBusinessTimeZone(): ?bool {
        return $this->isTimeSlotTimeZoneSetToBusinessTimeZone;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the privacyPolicyWebUrl property value. URL of a webpage that provides the terms and conditions of the business. If a privacy policy isn't included, the following text appears on the booking page as default: 'The policies and practices of {bookingbusinessname} apply to the use of your data.'
     * @return string|null
    */
    public function getPrivacyPolicyWebUrl(): ?string {
        return $this->privacyPolicyWebUrl;
    }

    /**
     * Gets the termsAndConditionsWebUrl property value. URL of a webpage that provides the terms and conditions of the business.
     * @return string|null
    */
    public function getTermsAndConditionsWebUrl(): ?string {
        return $this->termsAndConditionsWebUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('accessControl', $this->getAccessControl());
        $writer->writeStringValue('bookingPageColorCode', $this->getBookingPageColorCode());
        $writer->writeStringValue('businessTimeZone', $this->getBusinessTimeZone());
        $writer->writeStringValue('customerConsentMessage', $this->getCustomerConsentMessage());
        $writer->writeBooleanValue('enforceOneTimePassword', $this->getEnforceOneTimePassword());
        $writer->writeBooleanValue('isBusinessLogoDisplayEnabled', $this->getIsBusinessLogoDisplayEnabled());
        $writer->writeBooleanValue('isCustomerConsentEnabled', $this->getIsCustomerConsentEnabled());
        $writer->writeBooleanValue('isSearchEngineIndexabilityDisabled', $this->getIsSearchEngineIndexabilityDisabled());
        $writer->writeBooleanValue('isTimeSlotTimeZoneSetToBusinessTimeZone', $this->getIsTimeSlotTimeZoneSetToBusinessTimeZone());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('privacyPolicyWebUrl', $this->getPrivacyPolicyWebUrl());
        $writer->writeStringValue('termsAndConditionsWebUrl', $this->getTermsAndConditionsWebUrl());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the accessControl property value. The accessControl property
     * @param BookingPageAccessControl|null $value Value to set for the accessControl property.
    */
    public function setAccessControl(?BookingPageAccessControl $value): void {
        $this->accessControl = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the bookingPageColorCode property value. Custom color for the booking page. The value should be in Hex format. For example, #123456.
     * @param string|null $value Value to set for the bookingPageColorCode property.
    */
    public function setBookingPageColorCode(?string $value): void {
        $this->bookingPageColorCode = $value;
    }

    /**
     * Sets the businessTimeZone property value. The time zone of the customer. For a list of possible values, see dateTimeTimeZone.
     * @param string|null $value Value to set for the businessTimeZone property.
    */
    public function setBusinessTimeZone(?string $value): void {
        $this->businessTimeZone = $value;
    }

    /**
     * Sets the customerConsentMessage property value. The personal data collection and usage consent message in the booking page.
     * @param string|null $value Value to set for the customerConsentMessage property.
    */
    public function setCustomerConsentMessage(?string $value): void {
        $this->customerConsentMessage = $value;
    }

    /**
     * Sets the enforceOneTimePassword property value. Determines whether the one-time password is required to create an appointment. The default value is false.
     * @param bool|null $value Value to set for the enforceOneTimePassword property.
    */
    public function setEnforceOneTimePassword(?bool $value): void {
        $this->enforceOneTimePassword = $value;
    }

    /**
     * Sets the isBusinessLogoDisplayEnabled property value. Indicates whether the business logo is displayed on the booking page. The default value is false.
     * @param bool|null $value Value to set for the isBusinessLogoDisplayEnabled property.
    */
    public function setIsBusinessLogoDisplayEnabled(?bool $value): void {
        $this->isBusinessLogoDisplayEnabled = $value;
    }

    /**
     * Sets the isCustomerConsentEnabled property value. Enables personal data collection and the usage consent toggle on the booking page. The default value is false.
     * @param bool|null $value Value to set for the isCustomerConsentEnabled property.
    */
    public function setIsCustomerConsentEnabled(?bool $value): void {
        $this->isCustomerConsentEnabled = $value;
    }

    /**
     * Sets the isSearchEngineIndexabilityDisabled property value. Indicates whether web crawlers index this page. The defaults value is false.
     * @param bool|null $value Value to set for the isSearchEngineIndexabilityDisabled property.
    */
    public function setIsSearchEngineIndexabilityDisabled(?bool $value): void {
        $this->isSearchEngineIndexabilityDisabled = $value;
    }

    /**
     * Sets the isTimeSlotTimeZoneSetToBusinessTimeZone property value. Indicates whether the time zone of the time slot is set to the time zone of the business. The default value is false.
     * @param bool|null $value Value to set for the isTimeSlotTimeZoneSetToBusinessTimeZone property.
    */
    public function setIsTimeSlotTimeZoneSetToBusinessTimeZone(?bool $value): void {
        $this->isTimeSlotTimeZoneSetToBusinessTimeZone = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the privacyPolicyWebUrl property value. URL of a webpage that provides the terms and conditions of the business. If a privacy policy isn't included, the following text appears on the booking page as default: 'The policies and practices of {bookingbusinessname} apply to the use of your data.'
     * @param string|null $value Value to set for the privacyPolicyWebUrl property.
    */
    public function setPrivacyPolicyWebUrl(?string $value): void {
        $this->privacyPolicyWebUrl = $value;
    }

    /**
     * Sets the termsAndConditionsWebUrl property value. URL of a webpage that provides the terms and conditions of the business.
     * @param string|null $value Value to set for the termsAndConditionsWebUrl property.
    */
    public function setTermsAndConditionsWebUrl(?string $value): void {
        $this->termsAndConditionsWebUrl = $value;
    }

}
