<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class InvitationRedemptionIdentityProviderConfiguration implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var B2bIdentityProvidersType|null $fallbackIdentityProvider The fallback identity provider to be used in case no primary identity provider can be used for guest invitation redemption. The possible values are: defaultConfiguredIdp, emailOneTimePasscode, or microsoftAccount.
    */
    private ?B2bIdentityProvidersType $fallbackIdentityProvider = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<B2bIdentityProvidersType>|null $primaryIdentityProviderPrecedenceOrder Collection of identity providers in priority order of preference to be used for guest invitation redemption. The possible values are: azureActiveDirectory, externalFederation, or socialIdentityProviders.
    */
    private ?array $primaryIdentityProviderPrecedenceOrder = null;
    
    /**
     * Instantiates a new InvitationRedemptionIdentityProviderConfiguration and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return InvitationRedemptionIdentityProviderConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): InvitationRedemptionIdentityProviderConfiguration {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.defaultInvitationRedemptionIdentityProviderConfiguration': return new DefaultInvitationRedemptionIdentityProviderConfiguration();
            }
        }
        return new InvitationRedemptionIdentityProviderConfiguration();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the fallbackIdentityProvider property value. The fallback identity provider to be used in case no primary identity provider can be used for guest invitation redemption. The possible values are: defaultConfiguredIdp, emailOneTimePasscode, or microsoftAccount.
     * @return B2bIdentityProvidersType|null
    */
    public function getFallbackIdentityProvider(): ?B2bIdentityProvidersType {
        return $this->fallbackIdentityProvider;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'fallbackIdentityProvider' => fn(ParseNode $n) => $o->setFallbackIdentityProvider($n->getEnumValue(B2bIdentityProvidersType::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'primaryIdentityProviderPrecedenceOrder' => fn(ParseNode $n) => $o->setPrimaryIdentityProviderPrecedenceOrder($n->getCollectionOfEnumValues(B2bIdentityProvidersType::class)),
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
     * Gets the primaryIdentityProviderPrecedenceOrder property value. Collection of identity providers in priority order of preference to be used for guest invitation redemption. The possible values are: azureActiveDirectory, externalFederation, or socialIdentityProviders.
     * @return array<B2bIdentityProvidersType>|null
    */
    public function getPrimaryIdentityProviderPrecedenceOrder(): ?array {
        return $this->primaryIdentityProviderPrecedenceOrder;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('fallbackIdentityProvider', $this->getFallbackIdentityProvider());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfEnumValues('primaryIdentityProviderPrecedenceOrder', $this->getPrimaryIdentityProviderPrecedenceOrder());
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
     * Sets the fallbackIdentityProvider property value. The fallback identity provider to be used in case no primary identity provider can be used for guest invitation redemption. The possible values are: defaultConfiguredIdp, emailOneTimePasscode, or microsoftAccount.
     * @param B2bIdentityProvidersType|null $value Value to set for the fallbackIdentityProvider property.
    */
    public function setFallbackIdentityProvider(?B2bIdentityProvidersType $value): void {
        $this->fallbackIdentityProvider = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the primaryIdentityProviderPrecedenceOrder property value. Collection of identity providers in priority order of preference to be used for guest invitation redemption. The possible values are: azureActiveDirectory, externalFederation, or socialIdentityProviders.
     * @param array<B2bIdentityProvidersType>|null $value Value to set for the primaryIdentityProviderPrecedenceOrder property.
    */
    public function setPrimaryIdentityProviderPrecedenceOrder(?array $value): void {
        $this->primaryIdentityProviderPrecedenceOrder = $value;
    }

}
