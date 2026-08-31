<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AzureADJoinPolicy implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var DeviceRegistrationMembership|null $allowedToJoin Determines if Microsoft Entra join is allowed.
    */
    private ?DeviceRegistrationMembership $allowedToJoin = null;
    
    /**
     * @var bool|null $isAdminConfigurable Determines if administrators can modify this policy.
    */
    private ?bool $isAdminConfigurable = null;
    
    /**
     * @var LocalAdminSettings|null $localAdmins Determines who becomes a local administrator on joined devices.
    */
    private ?LocalAdminSettings $localAdmins = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new AzureADJoinPolicy and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AzureADJoinPolicy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AzureADJoinPolicy {
        return new AzureADJoinPolicy();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the allowedToJoin property value. Determines if Microsoft Entra join is allowed.
     * @return DeviceRegistrationMembership|null
    */
    public function getAllowedToJoin(): ?DeviceRegistrationMembership {
        return $this->allowedToJoin;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'allowedToJoin' => fn(ParseNode $n) => $o->setAllowedToJoin($n->getObjectValue([DeviceRegistrationMembership::class, 'createFromDiscriminatorValue'])),
            'isAdminConfigurable' => fn(ParseNode $n) => $o->setIsAdminConfigurable($n->getBooleanValue()),
            'localAdmins' => fn(ParseNode $n) => $o->setLocalAdmins($n->getObjectValue([LocalAdminSettings::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the isAdminConfigurable property value. Determines if administrators can modify this policy.
     * @return bool|null
    */
    public function getIsAdminConfigurable(): ?bool {
        return $this->isAdminConfigurable;
    }

    /**
     * Gets the localAdmins property value. Determines who becomes a local administrator on joined devices.
     * @return LocalAdminSettings|null
    */
    public function getLocalAdmins(): ?LocalAdminSettings {
        return $this->localAdmins;
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
        $writer->writeObjectValue('allowedToJoin', $this->getAllowedToJoin());
        $writer->writeBooleanValue('isAdminConfigurable', $this->getIsAdminConfigurable());
        $writer->writeObjectValue('localAdmins', $this->getLocalAdmins());
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
     * Sets the allowedToJoin property value. Determines if Microsoft Entra join is allowed.
     * @param DeviceRegistrationMembership|null $value Value to set for the allowedToJoin property.
    */
    public function setAllowedToJoin(?DeviceRegistrationMembership $value): void {
        $this->allowedToJoin = $value;
    }

    /**
     * Sets the isAdminConfigurable property value. Determines if administrators can modify this policy.
     * @param bool|null $value Value to set for the isAdminConfigurable property.
    */
    public function setIsAdminConfigurable(?bool $value): void {
        $this->isAdminConfigurable = $value;
    }

    /**
     * Sets the localAdmins property value. Determines who becomes a local administrator on joined devices.
     * @param LocalAdminSettings|null $value Value to set for the localAdmins property.
    */
    public function setLocalAdmins(?LocalAdminSettings $value): void {
        $this->localAdmins = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
