<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ContentCustomization implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<KeyValue>|null $attributeCollection Represents the content options of External Identities to be customized throughout the authentication flow for a tenant.
    */
    private ?array $attributeCollection = null;
    
    /**
     * @var string|null $attributeCollectionRelativeUrl A relative URL for the content options of External Identities to be customized throughout the authentication flow for a tenant.
    */
    private ?string $attributeCollectionRelativeUrl = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<KeyValue>|null $registrationCampaign Represents content options to customize during MFA proofup interruptions.
    */
    private ?array $registrationCampaign = null;
    
    /**
     * @var string|null $registrationCampaignRelativeUrl The relative URL of the content options to customize during MFA proofup interruptions.
    */
    private ?string $registrationCampaignRelativeUrl = null;
    
    /**
     * Instantiates a new ContentCustomization and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ContentCustomization
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ContentCustomization {
        return new ContentCustomization();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attributeCollection property value. Represents the content options of External Identities to be customized throughout the authentication flow for a tenant.
     * @return array<KeyValue>|null
    */
    public function getAttributeCollection(): ?array {
        return $this->attributeCollection;
    }

    /**
     * Gets the attributeCollectionRelativeUrl property value. A relative URL for the content options of External Identities to be customized throughout the authentication flow for a tenant.
     * @return string|null
    */
    public function getAttributeCollectionRelativeUrl(): ?string {
        return $this->attributeCollectionRelativeUrl;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'attributeCollection' => fn(ParseNode $n) => $o->setAttributeCollection($n->getCollectionOfObjectValues([KeyValue::class, 'createFromDiscriminatorValue'])),
            'attributeCollectionRelativeUrl' => fn(ParseNode $n) => $o->setAttributeCollectionRelativeUrl($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'registrationCampaign' => fn(ParseNode $n) => $o->setRegistrationCampaign($n->getCollectionOfObjectValues([KeyValue::class, 'createFromDiscriminatorValue'])),
            'registrationCampaignRelativeUrl' => fn(ParseNode $n) => $o->setRegistrationCampaignRelativeUrl($n->getStringValue()),
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
     * Gets the registrationCampaign property value. Represents content options to customize during MFA proofup interruptions.
     * @return array<KeyValue>|null
    */
    public function getRegistrationCampaign(): ?array {
        return $this->registrationCampaign;
    }

    /**
     * Gets the registrationCampaignRelativeUrl property value. The relative URL of the content options to customize during MFA proofup interruptions.
     * @return string|null
    */
    public function getRegistrationCampaignRelativeUrl(): ?string {
        return $this->registrationCampaignRelativeUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('attributeCollection', $this->getAttributeCollection());
        $writer->writeStringValue('attributeCollectionRelativeUrl', $this->getAttributeCollectionRelativeUrl());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfObjectValues('registrationCampaign', $this->getRegistrationCampaign());
        $writer->writeStringValue('registrationCampaignRelativeUrl', $this->getRegistrationCampaignRelativeUrl());
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
     * Sets the attributeCollection property value. Represents the content options of External Identities to be customized throughout the authentication flow for a tenant.
     * @param array<KeyValue>|null $value Value to set for the attributeCollection property.
    */
    public function setAttributeCollection(?array $value): void {
        $this->attributeCollection = $value;
    }

    /**
     * Sets the attributeCollectionRelativeUrl property value. A relative URL for the content options of External Identities to be customized throughout the authentication flow for a tenant.
     * @param string|null $value Value to set for the attributeCollectionRelativeUrl property.
    */
    public function setAttributeCollectionRelativeUrl(?string $value): void {
        $this->attributeCollectionRelativeUrl = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the registrationCampaign property value. Represents content options to customize during MFA proofup interruptions.
     * @param array<KeyValue>|null $value Value to set for the registrationCampaign property.
    */
    public function setRegistrationCampaign(?array $value): void {
        $this->registrationCampaign = $value;
    }

    /**
     * Sets the registrationCampaignRelativeUrl property value. The relative URL of the content options to customize during MFA proofup interruptions.
     * @param string|null $value Value to set for the registrationCampaignRelativeUrl property.
    */
    public function setRegistrationCampaignRelativeUrl(?string $value): void {
        $this->registrationCampaignRelativeUrl = $value;
    }

}
