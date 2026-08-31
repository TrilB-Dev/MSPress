<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Teamwork extends Entity implements Parsable 
{
    /**
     * @var array<DeletedChat>|null $deletedChats A collection of deleted chats.
    */
    private ?array $deletedChats = null;
    
    /**
     * @var array<DeletedTeam>|null $deletedTeams The deleted team.
    */
    private ?array $deletedTeams = null;
    
    /**
     * @var bool|null $isTeamsEnabled Indicates whether Microsoft Teams is enabled for the organization.
    */
    private ?bool $isTeamsEnabled = null;
    
    /**
     * @var string|null $region Represents the region of the organization or the tenant. The region value can be any region supported by the Teams payload. The possible values are: Americas, Europe and MiddleEast, Asia Pacific, UAE, Australia, Brazil, Canada, Switzerland, Germany, France, India, Japan, South Korea, Norway, Singapore, United Kingdom, South Africa, Sweden, Qatar, Poland, Italy, Israel, Spain, Mexico, USGov Community Cloud, USGov Community Cloud High, USGov Department of Defense, and China.
    */
    private ?string $region = null;
    
    /**
     * @var TeamsAppSettings|null $teamsAppSettings Represents tenant-wide settings for all Teams apps in the tenant.
    */
    private ?TeamsAppSettings $teamsAppSettings = null;
    
    /**
     * @var array<WorkforceIntegration>|null $workforceIntegrations The workforceIntegrations property
    */
    private ?array $workforceIntegrations = null;
    
    /**
     * Instantiates a new Teamwork and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Teamwork
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Teamwork {
        return new Teamwork();
    }

    /**
     * Gets the deletedChats property value. A collection of deleted chats.
     * @return array<DeletedChat>|null
    */
    public function getDeletedChats(): ?array {
        return $this->deletedChats;
    }

    /**
     * Gets the deletedTeams property value. The deleted team.
     * @return array<DeletedTeam>|null
    */
    public function getDeletedTeams(): ?array {
        return $this->deletedTeams;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'deletedChats' => fn(ParseNode $n) => $o->setDeletedChats($n->getCollectionOfObjectValues([DeletedChat::class, 'createFromDiscriminatorValue'])),
            'deletedTeams' => fn(ParseNode $n) => $o->setDeletedTeams($n->getCollectionOfObjectValues([DeletedTeam::class, 'createFromDiscriminatorValue'])),
            'isTeamsEnabled' => fn(ParseNode $n) => $o->setIsTeamsEnabled($n->getBooleanValue()),
            'region' => fn(ParseNode $n) => $o->setRegion($n->getStringValue()),
            'teamsAppSettings' => fn(ParseNode $n) => $o->setTeamsAppSettings($n->getObjectValue([TeamsAppSettings::class, 'createFromDiscriminatorValue'])),
            'workforceIntegrations' => fn(ParseNode $n) => $o->setWorkforceIntegrations($n->getCollectionOfObjectValues([WorkforceIntegration::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the isTeamsEnabled property value. Indicates whether Microsoft Teams is enabled for the organization.
     * @return bool|null
    */
    public function getIsTeamsEnabled(): ?bool {
        return $this->isTeamsEnabled;
    }

    /**
     * Gets the region property value. Represents the region of the organization or the tenant. The region value can be any region supported by the Teams payload. The possible values are: Americas, Europe and MiddleEast, Asia Pacific, UAE, Australia, Brazil, Canada, Switzerland, Germany, France, India, Japan, South Korea, Norway, Singapore, United Kingdom, South Africa, Sweden, Qatar, Poland, Italy, Israel, Spain, Mexico, USGov Community Cloud, USGov Community Cloud High, USGov Department of Defense, and China.
     * @return string|null
    */
    public function getRegion(): ?string {
        return $this->region;
    }

    /**
     * Gets the teamsAppSettings property value. Represents tenant-wide settings for all Teams apps in the tenant.
     * @return TeamsAppSettings|null
    */
    public function getTeamsAppSettings(): ?TeamsAppSettings {
        return $this->teamsAppSettings;
    }

    /**
     * Gets the workforceIntegrations property value. The workforceIntegrations property
     * @return array<WorkforceIntegration>|null
    */
    public function getWorkforceIntegrations(): ?array {
        return $this->workforceIntegrations;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('deletedChats', $this->getDeletedChats());
        $writer->writeCollectionOfObjectValues('deletedTeams', $this->getDeletedTeams());
        $writer->writeBooleanValue('isTeamsEnabled', $this->getIsTeamsEnabled());
        $writer->writeStringValue('region', $this->getRegion());
        $writer->writeObjectValue('teamsAppSettings', $this->getTeamsAppSettings());
        $writer->writeCollectionOfObjectValues('workforceIntegrations', $this->getWorkforceIntegrations());
    }

    /**
     * Sets the deletedChats property value. A collection of deleted chats.
     * @param array<DeletedChat>|null $value Value to set for the deletedChats property.
    */
    public function setDeletedChats(?array $value): void {
        $this->deletedChats = $value;
    }

    /**
     * Sets the deletedTeams property value. The deleted team.
     * @param array<DeletedTeam>|null $value Value to set for the deletedTeams property.
    */
    public function setDeletedTeams(?array $value): void {
        $this->deletedTeams = $value;
    }

    /**
     * Sets the isTeamsEnabled property value. Indicates whether Microsoft Teams is enabled for the organization.
     * @param bool|null $value Value to set for the isTeamsEnabled property.
    */
    public function setIsTeamsEnabled(?bool $value): void {
        $this->isTeamsEnabled = $value;
    }

    /**
     * Sets the region property value. Represents the region of the organization or the tenant. The region value can be any region supported by the Teams payload. The possible values are: Americas, Europe and MiddleEast, Asia Pacific, UAE, Australia, Brazil, Canada, Switzerland, Germany, France, India, Japan, South Korea, Norway, Singapore, United Kingdom, South Africa, Sweden, Qatar, Poland, Italy, Israel, Spain, Mexico, USGov Community Cloud, USGov Community Cloud High, USGov Department of Defense, and China.
     * @param string|null $value Value to set for the region property.
    */
    public function setRegion(?string $value): void {
        $this->region = $value;
    }

    /**
     * Sets the teamsAppSettings property value. Represents tenant-wide settings for all Teams apps in the tenant.
     * @param TeamsAppSettings|null $value Value to set for the teamsAppSettings property.
    */
    public function setTeamsAppSettings(?TeamsAppSettings $value): void {
        $this->teamsAppSettings = $value;
    }

    /**
     * Sets the workforceIntegrations property value. The workforceIntegrations property
     * @param array<WorkforceIntegration>|null $value Value to set for the workforceIntegrations property.
    */
    public function setWorkforceIntegrations(?array $value): void {
        $this->workforceIntegrations = $value;
    }

}
