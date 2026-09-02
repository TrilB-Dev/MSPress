<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class FileStorageContainerTypeRegistrationSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $isDiscoverabilityEnabled Indicates whether items from containers are surfaced in experiences such as My Activity or Microsoft 365.
    */
    private ?bool $isDiscoverabilityEnabled = null;
    
    /**
     * @var bool|null $isItemVersioningEnabled Indicates whether item versioning is enabled.
    */
    private ?bool $isItemVersioningEnabled = null;
    
    /**
     * @var bool|null $isSearchEnabled Indicates whether search is enabled.
    */
    private ?bool $isSearchEnabled = null;
    
    /**
     * @var bool|null $isSharingRestricted Only the manager and owner can share files in the container if restricted sharing is enabled.
    */
    private ?bool $isSharingRestricted = null;
    
    /**
     * @var int|null $itemMajorVersionLimit Maximum number of versions. Versioning must be enabled ('isItemVersioningEnabled'=true).
    */
    private ?int $itemMajorVersionLimit = null;
    
    /**
     * @var int|null $maxStoragePerContainerInBytes Controls maximum storage in bytes.
    */
    private ?int $maxStoragePerContainerInBytes = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var SharingCapabilities|null $sharingCapability Sharing capabilities permitted for containers. The possible values are: disabled, externalUserSharingOnly, externalUserAndGuestSharing, existingExternalUserSharingOnly, unknownFutureValue. Can always be updated.
    */
    private ?SharingCapabilities $sharingCapability = null;
    
    /**
     * @var string|null $urlTemplate Pattern used to redirect files.
    */
    private ?string $urlTemplate = null;
    
    /**
     * Instantiates a new FileStorageContainerTypeRegistrationSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FileStorageContainerTypeRegistrationSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FileStorageContainerTypeRegistrationSettings {
        return new FileStorageContainerTypeRegistrationSettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'isDiscoverabilityEnabled' => fn(ParseNode $n) => $o->setIsDiscoverabilityEnabled($n->getBooleanValue()),
            'isItemVersioningEnabled' => fn(ParseNode $n) => $o->setIsItemVersioningEnabled($n->getBooleanValue()),
            'isSearchEnabled' => fn(ParseNode $n) => $o->setIsSearchEnabled($n->getBooleanValue()),
            'isSharingRestricted' => fn(ParseNode $n) => $o->setIsSharingRestricted($n->getBooleanValue()),
            'itemMajorVersionLimit' => fn(ParseNode $n) => $o->setItemMajorVersionLimit($n->getIntegerValue()),
            'maxStoragePerContainerInBytes' => fn(ParseNode $n) => $o->setMaxStoragePerContainerInBytes($n->getIntegerValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'sharingCapability' => fn(ParseNode $n) => $o->setSharingCapability($n->getEnumValue(SharingCapabilities::class)),
            'urlTemplate' => fn(ParseNode $n) => $o->setUrlTemplate($n->getStringValue()),
        ];
    }

    /**
     * Gets the isDiscoverabilityEnabled property value. Indicates whether items from containers are surfaced in experiences such as My Activity or Microsoft 365.
     * @return bool|null
    */
    public function getIsDiscoverabilityEnabled(): ?bool {
        return $this->isDiscoverabilityEnabled;
    }

    /**
     * Gets the isItemVersioningEnabled property value. Indicates whether item versioning is enabled.
     * @return bool|null
    */
    public function getIsItemVersioningEnabled(): ?bool {
        return $this->isItemVersioningEnabled;
    }

    /**
     * Gets the isSearchEnabled property value. Indicates whether search is enabled.
     * @return bool|null
    */
    public function getIsSearchEnabled(): ?bool {
        return $this->isSearchEnabled;
    }

    /**
     * Gets the isSharingRestricted property value. Only the manager and owner can share files in the container if restricted sharing is enabled.
     * @return bool|null
    */
    public function getIsSharingRestricted(): ?bool {
        return $this->isSharingRestricted;
    }

    /**
     * Gets the itemMajorVersionLimit property value. Maximum number of versions. Versioning must be enabled ('isItemVersioningEnabled'=true).
     * @return int|null
    */
    public function getItemMajorVersionLimit(): ?int {
        return $this->itemMajorVersionLimit;
    }

    /**
     * Gets the maxStoragePerContainerInBytes property value. Controls maximum storage in bytes.
     * @return int|null
    */
    public function getMaxStoragePerContainerInBytes(): ?int {
        return $this->maxStoragePerContainerInBytes;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the sharingCapability property value. Sharing capabilities permitted for containers. The possible values are: disabled, externalUserSharingOnly, externalUserAndGuestSharing, existingExternalUserSharingOnly, unknownFutureValue. Can always be updated.
     * @return SharingCapabilities|null
    */
    public function getSharingCapability(): ?SharingCapabilities {
        return $this->sharingCapability;
    }

    /**
     * Gets the urlTemplate property value. Pattern used to redirect files.
     * @return string|null
    */
    public function getUrlTemplate(): ?string {
        return $this->urlTemplate;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('isDiscoverabilityEnabled', $this->getIsDiscoverabilityEnabled());
        $writer->writeBooleanValue('isItemVersioningEnabled', $this->getIsItemVersioningEnabled());
        $writer->writeBooleanValue('isSearchEnabled', $this->getIsSearchEnabled());
        $writer->writeBooleanValue('isSharingRestricted', $this->getIsSharingRestricted());
        $writer->writeIntegerValue('itemMajorVersionLimit', $this->getItemMajorVersionLimit());
        $writer->writeIntegerValue('maxStoragePerContainerInBytes', $this->getMaxStoragePerContainerInBytes());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('sharingCapability', $this->getSharingCapability());
        $writer->writeStringValue('urlTemplate', $this->getUrlTemplate());
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
     * Sets the isDiscoverabilityEnabled property value. Indicates whether items from containers are surfaced in experiences such as My Activity or Microsoft 365.
     * @param bool|null $value Value to set for the isDiscoverabilityEnabled property.
    */
    public function setIsDiscoverabilityEnabled(?bool $value): void {
        $this->isDiscoverabilityEnabled = $value;
    }

    /**
     * Sets the isItemVersioningEnabled property value. Indicates whether item versioning is enabled.
     * @param bool|null $value Value to set for the isItemVersioningEnabled property.
    */
    public function setIsItemVersioningEnabled(?bool $value): void {
        $this->isItemVersioningEnabled = $value;
    }

    /**
     * Sets the isSearchEnabled property value. Indicates whether search is enabled.
     * @param bool|null $value Value to set for the isSearchEnabled property.
    */
    public function setIsSearchEnabled(?bool $value): void {
        $this->isSearchEnabled = $value;
    }

    /**
     * Sets the isSharingRestricted property value. Only the manager and owner can share files in the container if restricted sharing is enabled.
     * @param bool|null $value Value to set for the isSharingRestricted property.
    */
    public function setIsSharingRestricted(?bool $value): void {
        $this->isSharingRestricted = $value;
    }

    /**
     * Sets the itemMajorVersionLimit property value. Maximum number of versions. Versioning must be enabled ('isItemVersioningEnabled'=true).
     * @param int|null $value Value to set for the itemMajorVersionLimit property.
    */
    public function setItemMajorVersionLimit(?int $value): void {
        $this->itemMajorVersionLimit = $value;
    }

    /**
     * Sets the maxStoragePerContainerInBytes property value. Controls maximum storage in bytes.
     * @param int|null $value Value to set for the maxStoragePerContainerInBytes property.
    */
    public function setMaxStoragePerContainerInBytes(?int $value): void {
        $this->maxStoragePerContainerInBytes = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the sharingCapability property value. Sharing capabilities permitted for containers. The possible values are: disabled, externalUserSharingOnly, externalUserAndGuestSharing, existingExternalUserSharingOnly, unknownFutureValue. Can always be updated.
     * @param SharingCapabilities|null $value Value to set for the sharingCapability property.
    */
    public function setSharingCapability(?SharingCapabilities $value): void {
        $this->sharingCapability = $value;
    }

    /**
     * Sets the urlTemplate property value. Pattern used to redirect files.
     * @param string|null $value Value to set for the urlTemplate property.
    */
    public function setUrlTemplate(?string $value): void {
        $this->urlTemplate = $value;
    }

}
