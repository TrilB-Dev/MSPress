<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\EntraRecoveryServices\Recovery;

class Directory extends Entity implements Parsable 
{
    /**
     * @var array<AdministrativeUnit>|null $administrativeUnits Conceptual container for user and group directory objects.
    */
    private ?array $administrativeUnits = null;
    
    /**
     * @var array<AttributeSet>|null $attributeSets Group of related custom security attribute definitions.
    */
    private ?array $attributeSets = null;
    
    /**
     * @var array<CustomSecurityAttributeDefinition>|null $customSecurityAttributeDefinitions Schema of a custom security attributes (key-value pairs).
    */
    private ?array $customSecurityAttributeDefinitions = null;
    
    /**
     * @var array<DirectoryObject>|null $deletedItems Recently deleted items. Read-only. Nullable.
    */
    private ?array $deletedItems = null;
    
    /**
     * @var array<DeviceLocalCredentialInfo>|null $deviceLocalCredentials The credentials of the device's local administrator account backed up to Microsoft Entra ID.
    */
    private ?array $deviceLocalCredentials = null;
    
    /**
     * @var array<IdentityProviderBase>|null $federationConfigurations Configure domain federation with organizations whose identity provider (IdP) supports either the SAML or WS-Fed protocol.
    */
    private ?array $federationConfigurations = null;
    
    /**
     * @var array<OnPremisesDirectorySynchronization>|null $onPremisesSynchronization A container for on-premises directory synchronization functionalities that are available for the organization.
    */
    private ?array $onPremisesSynchronization = null;
    
    /**
     * @var PublicKeyInfrastructureRoot|null $publicKeyInfrastructure The collection of public key infrastructure instances for the certificate-based authentication feature for users in a Microsoft Entra tenant.
    */
    private ?PublicKeyInfrastructureRoot $publicKeyInfrastructure = null;
    
    /**
     * @var Recovery|null $recovery The recovery property
    */
    private ?Recovery $recovery = null;
    
    /**
     * @var array<RemoteTenantGroup>|null $remoteTenantGroups Collection of groups in remote Microsoft Entra tenants that are available in the directory.
    */
    private ?array $remoteTenantGroups = null;
    
    /**
     * @var array<CompanySubscription>|null $subscriptions List of commercial subscriptions that an organization acquired.
    */
    private ?array $subscriptions = null;
    
    /**
     * Instantiates a new Directory and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Directory
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Directory {
        return new Directory();
    }

    /**
     * Gets the administrativeUnits property value. Conceptual container for user and group directory objects.
     * @return array<AdministrativeUnit>|null
    */
    public function getAdministrativeUnits(): ?array {
        return $this->administrativeUnits;
    }

    /**
     * Gets the attributeSets property value. Group of related custom security attribute definitions.
     * @return array<AttributeSet>|null
    */
    public function getAttributeSets(): ?array {
        return $this->attributeSets;
    }

    /**
     * Gets the customSecurityAttributeDefinitions property value. Schema of a custom security attributes (key-value pairs).
     * @return array<CustomSecurityAttributeDefinition>|null
    */
    public function getCustomSecurityAttributeDefinitions(): ?array {
        return $this->customSecurityAttributeDefinitions;
    }

    /**
     * Gets the deletedItems property value. Recently deleted items. Read-only. Nullable.
     * @return array<DirectoryObject>|null
    */
    public function getDeletedItems(): ?array {
        return $this->deletedItems;
    }

    /**
     * Gets the deviceLocalCredentials property value. The credentials of the device's local administrator account backed up to Microsoft Entra ID.
     * @return array<DeviceLocalCredentialInfo>|null
    */
    public function getDeviceLocalCredentials(): ?array {
        return $this->deviceLocalCredentials;
    }

    /**
     * Gets the federationConfigurations property value. Configure domain federation with organizations whose identity provider (IdP) supports either the SAML or WS-Fed protocol.
     * @return array<IdentityProviderBase>|null
    */
    public function getFederationConfigurations(): ?array {
        return $this->federationConfigurations;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'administrativeUnits' => fn(ParseNode $n) => $o->setAdministrativeUnits($n->getCollectionOfObjectValues([AdministrativeUnit::class, 'createFromDiscriminatorValue'])),
            'attributeSets' => fn(ParseNode $n) => $o->setAttributeSets($n->getCollectionOfObjectValues([AttributeSet::class, 'createFromDiscriminatorValue'])),
            'customSecurityAttributeDefinitions' => fn(ParseNode $n) => $o->setCustomSecurityAttributeDefinitions($n->getCollectionOfObjectValues([CustomSecurityAttributeDefinition::class, 'createFromDiscriminatorValue'])),
            'deletedItems' => fn(ParseNode $n) => $o->setDeletedItems($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'deviceLocalCredentials' => fn(ParseNode $n) => $o->setDeviceLocalCredentials($n->getCollectionOfObjectValues([DeviceLocalCredentialInfo::class, 'createFromDiscriminatorValue'])),
            'federationConfigurations' => fn(ParseNode $n) => $o->setFederationConfigurations($n->getCollectionOfObjectValues([IdentityProviderBase::class, 'createFromDiscriminatorValue'])),
            'onPremisesSynchronization' => fn(ParseNode $n) => $o->setOnPremisesSynchronization($n->getCollectionOfObjectValues([OnPremisesDirectorySynchronization::class, 'createFromDiscriminatorValue'])),
            'publicKeyInfrastructure' => fn(ParseNode $n) => $o->setPublicKeyInfrastructure($n->getObjectValue([PublicKeyInfrastructureRoot::class, 'createFromDiscriminatorValue'])),
            'recovery' => fn(ParseNode $n) => $o->setRecovery($n->getObjectValue([Recovery::class, 'createFromDiscriminatorValue'])),
            'remoteTenantGroups' => fn(ParseNode $n) => $o->setRemoteTenantGroups($n->getCollectionOfObjectValues([RemoteTenantGroup::class, 'createFromDiscriminatorValue'])),
            'subscriptions' => fn(ParseNode $n) => $o->setSubscriptions($n->getCollectionOfObjectValues([CompanySubscription::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the onPremisesSynchronization property value. A container for on-premises directory synchronization functionalities that are available for the organization.
     * @return array<OnPremisesDirectorySynchronization>|null
    */
    public function getOnPremisesSynchronization(): ?array {
        return $this->onPremisesSynchronization;
    }

    /**
     * Gets the publicKeyInfrastructure property value. The collection of public key infrastructure instances for the certificate-based authentication feature for users in a Microsoft Entra tenant.
     * @return PublicKeyInfrastructureRoot|null
    */
    public function getPublicKeyInfrastructure(): ?PublicKeyInfrastructureRoot {
        return $this->publicKeyInfrastructure;
    }

    /**
     * Gets the recovery property value. The recovery property
     * @return Recovery|null
    */
    public function getRecovery(): ?Recovery {
        return $this->recovery;
    }

    /**
     * Gets the remoteTenantGroups property value. Collection of groups in remote Microsoft Entra tenants that are available in the directory.
     * @return array<RemoteTenantGroup>|null
    */
    public function getRemoteTenantGroups(): ?array {
        return $this->remoteTenantGroups;
    }

    /**
     * Gets the subscriptions property value. List of commercial subscriptions that an organization acquired.
     * @return array<CompanySubscription>|null
    */
    public function getSubscriptions(): ?array {
        return $this->subscriptions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('administrativeUnits', $this->getAdministrativeUnits());
        $writer->writeCollectionOfObjectValues('attributeSets', $this->getAttributeSets());
        $writer->writeCollectionOfObjectValues('customSecurityAttributeDefinitions', $this->getCustomSecurityAttributeDefinitions());
        $writer->writeCollectionOfObjectValues('deletedItems', $this->getDeletedItems());
        $writer->writeCollectionOfObjectValues('deviceLocalCredentials', $this->getDeviceLocalCredentials());
        $writer->writeCollectionOfObjectValues('federationConfigurations', $this->getFederationConfigurations());
        $writer->writeCollectionOfObjectValues('onPremisesSynchronization', $this->getOnPremisesSynchronization());
        $writer->writeObjectValue('publicKeyInfrastructure', $this->getPublicKeyInfrastructure());
        $writer->writeObjectValue('recovery', $this->getRecovery());
        $writer->writeCollectionOfObjectValues('remoteTenantGroups', $this->getRemoteTenantGroups());
        $writer->writeCollectionOfObjectValues('subscriptions', $this->getSubscriptions());
    }

    /**
     * Sets the administrativeUnits property value. Conceptual container for user and group directory objects.
     * @param array<AdministrativeUnit>|null $value Value to set for the administrativeUnits property.
    */
    public function setAdministrativeUnits(?array $value): void {
        $this->administrativeUnits = $value;
    }

    /**
     * Sets the attributeSets property value. Group of related custom security attribute definitions.
     * @param array<AttributeSet>|null $value Value to set for the attributeSets property.
    */
    public function setAttributeSets(?array $value): void {
        $this->attributeSets = $value;
    }

    /**
     * Sets the customSecurityAttributeDefinitions property value. Schema of a custom security attributes (key-value pairs).
     * @param array<CustomSecurityAttributeDefinition>|null $value Value to set for the customSecurityAttributeDefinitions property.
    */
    public function setCustomSecurityAttributeDefinitions(?array $value): void {
        $this->customSecurityAttributeDefinitions = $value;
    }

    /**
     * Sets the deletedItems property value. Recently deleted items. Read-only. Nullable.
     * @param array<DirectoryObject>|null $value Value to set for the deletedItems property.
    */
    public function setDeletedItems(?array $value): void {
        $this->deletedItems = $value;
    }

    /**
     * Sets the deviceLocalCredentials property value. The credentials of the device's local administrator account backed up to Microsoft Entra ID.
     * @param array<DeviceLocalCredentialInfo>|null $value Value to set for the deviceLocalCredentials property.
    */
    public function setDeviceLocalCredentials(?array $value): void {
        $this->deviceLocalCredentials = $value;
    }

    /**
     * Sets the federationConfigurations property value. Configure domain federation with organizations whose identity provider (IdP) supports either the SAML or WS-Fed protocol.
     * @param array<IdentityProviderBase>|null $value Value to set for the federationConfigurations property.
    */
    public function setFederationConfigurations(?array $value): void {
        $this->federationConfigurations = $value;
    }

    /**
     * Sets the onPremisesSynchronization property value. A container for on-premises directory synchronization functionalities that are available for the organization.
     * @param array<OnPremisesDirectorySynchronization>|null $value Value to set for the onPremisesSynchronization property.
    */
    public function setOnPremisesSynchronization(?array $value): void {
        $this->onPremisesSynchronization = $value;
    }

    /**
     * Sets the publicKeyInfrastructure property value. The collection of public key infrastructure instances for the certificate-based authentication feature for users in a Microsoft Entra tenant.
     * @param PublicKeyInfrastructureRoot|null $value Value to set for the publicKeyInfrastructure property.
    */
    public function setPublicKeyInfrastructure(?PublicKeyInfrastructureRoot $value): void {
        $this->publicKeyInfrastructure = $value;
    }

    /**
     * Sets the recovery property value. The recovery property
     * @param Recovery|null $value Value to set for the recovery property.
    */
    public function setRecovery(?Recovery $value): void {
        $this->recovery = $value;
    }

    /**
     * Sets the remoteTenantGroups property value. Collection of groups in remote Microsoft Entra tenants that are available in the directory.
     * @param array<RemoteTenantGroup>|null $value Value to set for the remoteTenantGroups property.
    */
    public function setRemoteTenantGroups(?array $value): void {
        $this->remoteTenantGroups = $value;
    }

    /**
     * Sets the subscriptions property value. List of commercial subscriptions that an organization acquired.
     * @param array<CompanySubscription>|null $value Value to set for the subscriptions property.
    */
    public function setSubscriptions(?array $value): void {
        $this->subscriptions = $value;
    }

}
