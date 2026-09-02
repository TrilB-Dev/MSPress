<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class FileStorageContainerTypeAppPermissionGrant implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $appId Application ID to which to set permissions.
    */
    private ?string $appId = null;
    
    /**
     * @var array<FileStorageContainerTypeAppPermission>|null $applicationPermissions Allowed permissions when you use delegated tokens. The possible values are: none, readContent, writeContent, manageContent, create, delete, read, write, enumeratePermissions, addPermissions, updatePermissions, deletePermissions, deleteOwnPermission, managePermissions, full, unknownFutureValue.
    */
    private ?array $applicationPermissions = null;
    
    /**
     * @var array<FileStorageContainerTypeAppPermission>|null $delegatedPermissions Allowed permissions when you use application tokens. The possible values are: none, readContent, writeContent, manageContent, create, delete, read, write, enumeratePermissions, addPermissions, updatePermissions, deletePermissions, deleteOwnPermission, managePermissions, full, unknownFutureValue.
    */
    private ?array $delegatedPermissions = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new FileStorageContainerTypeAppPermissionGrant and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FileStorageContainerTypeAppPermissionGrant
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FileStorageContainerTypeAppPermissionGrant {
        return new FileStorageContainerTypeAppPermissionGrant();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the appId property value. Application ID to which to set permissions.
     * @return string|null
    */
    public function getAppId(): ?string {
        return $this->appId;
    }

    /**
     * Gets the applicationPermissions property value. Allowed permissions when you use delegated tokens. The possible values are: none, readContent, writeContent, manageContent, create, delete, read, write, enumeratePermissions, addPermissions, updatePermissions, deletePermissions, deleteOwnPermission, managePermissions, full, unknownFutureValue.
     * @return array<FileStorageContainerTypeAppPermission>|null
    */
    public function getApplicationPermissions(): ?array {
        return $this->applicationPermissions;
    }

    /**
     * Gets the delegatedPermissions property value. Allowed permissions when you use application tokens. The possible values are: none, readContent, writeContent, manageContent, create, delete, read, write, enumeratePermissions, addPermissions, updatePermissions, deletePermissions, deleteOwnPermission, managePermissions, full, unknownFutureValue.
     * @return array<FileStorageContainerTypeAppPermission>|null
    */
    public function getDelegatedPermissions(): ?array {
        return $this->delegatedPermissions;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'appId' => fn(ParseNode $n) => $o->setAppId($n->getStringValue()),
            'applicationPermissions' => fn(ParseNode $n) => $o->setApplicationPermissions($n->getCollectionOfEnumValues(FileStorageContainerTypeAppPermission::class)),
            'delegatedPermissions' => fn(ParseNode $n) => $o->setDelegatedPermissions($n->getCollectionOfEnumValues(FileStorageContainerTypeAppPermission::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('appId', $this->getAppId());
        $writer->writeCollectionOfEnumValues('applicationPermissions', $this->getApplicationPermissions());
        $writer->writeCollectionOfEnumValues('delegatedPermissions', $this->getDelegatedPermissions());
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
     * Sets the appId property value. Application ID to which to set permissions.
     * @param string|null $value Value to set for the appId property.
    */
    public function setAppId(?string $value): void {
        $this->appId = $value;
    }

    /**
     * Sets the applicationPermissions property value. Allowed permissions when you use delegated tokens. The possible values are: none, readContent, writeContent, manageContent, create, delete, read, write, enumeratePermissions, addPermissions, updatePermissions, deletePermissions, deleteOwnPermission, managePermissions, full, unknownFutureValue.
     * @param array<FileStorageContainerTypeAppPermission>|null $value Value to set for the applicationPermissions property.
    */
    public function setApplicationPermissions(?array $value): void {
        $this->applicationPermissions = $value;
    }

    /**
     * Sets the delegatedPermissions property value. Allowed permissions when you use application tokens. The possible values are: none, readContent, writeContent, manageContent, create, delete, read, write, enumeratePermissions, addPermissions, updatePermissions, deletePermissions, deleteOwnPermission, managePermissions, full, unknownFutureValue.
     * @param array<FileStorageContainerTypeAppPermission>|null $value Value to set for the delegatedPermissions property.
    */
    public function setDelegatedPermissions(?array $value): void {
        $this->delegatedPermissions = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
