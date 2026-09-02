<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Represents a community in Viva Engage that is a central place for conversations,files, events, and updates for people sharing a common interest or goal.
*/
class Community extends Entity implements Parsable 
{
    /**
     * @var string|null $description The description of the community. The maximum length is 1,024 characters.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The name of the community. The maximum length is 255 characters.
    */
    private ?string $displayName = null;
    
    /**
     * @var Group|null $group The Microsoft 365 group that manages the membership of this community.
    */
    private ?Group $group = null;
    
    /**
     * @var string|null $groupId The ID of the Microsoft 365 group that manages the membership of this community.
    */
    private ?string $groupId = null;
    
    /**
     * @var array<User>|null $owners The admins of the community. Limited to 100 users. If this property isn't specified when you create the community, the calling user is automatically assigned as the community owner.
    */
    private ?array $owners = null;
    
    /**
     * @var CommunityPrivacy|null $privacy Types of communityPrivacy.
    */
    private ?CommunityPrivacy $privacy = null;
    
    /**
     * Instantiates a new Community and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Community
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Community {
        return new Community();
    }

    /**
     * Gets the description property value. The description of the community. The maximum length is 1,024 characters.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The name of the community. The maximum length is 255 characters.
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
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'group' => fn(ParseNode $n) => $o->setGroup($n->getObjectValue([Group::class, 'createFromDiscriminatorValue'])),
            'groupId' => fn(ParseNode $n) => $o->setGroupId($n->getStringValue()),
            'owners' => fn(ParseNode $n) => $o->setOwners($n->getCollectionOfObjectValues([User::class, 'createFromDiscriminatorValue'])),
            'privacy' => fn(ParseNode $n) => $o->setPrivacy($n->getEnumValue(CommunityPrivacy::class)),
        ]);
    }

    /**
     * Gets the group property value. The Microsoft 365 group that manages the membership of this community.
     * @return Group|null
    */
    public function getGroup(): ?Group {
        return $this->group;
    }

    /**
     * Gets the groupId property value. The ID of the Microsoft 365 group that manages the membership of this community.
     * @return string|null
    */
    public function getGroupId(): ?string {
        return $this->groupId;
    }

    /**
     * Gets the owners property value. The admins of the community. Limited to 100 users. If this property isn't specified when you create the community, the calling user is automatically assigned as the community owner.
     * @return array<User>|null
    */
    public function getOwners(): ?array {
        return $this->owners;
    }

    /**
     * Gets the privacy property value. Types of communityPrivacy.
     * @return CommunityPrivacy|null
    */
    public function getPrivacy(): ?CommunityPrivacy {
        return $this->privacy;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('group', $this->getGroup());
        $writer->writeStringValue('groupId', $this->getGroupId());
        $writer->writeCollectionOfObjectValues('owners', $this->getOwners());
        $writer->writeEnumValue('privacy', $this->getPrivacy());
    }

    /**
     * Sets the description property value. The description of the community. The maximum length is 1,024 characters.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The name of the community. The maximum length is 255 characters.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the group property value. The Microsoft 365 group that manages the membership of this community.
     * @param Group|null $value Value to set for the group property.
    */
    public function setGroup(?Group $value): void {
        $this->group = $value;
    }

    /**
     * Sets the groupId property value. The ID of the Microsoft 365 group that manages the membership of this community.
     * @param string|null $value Value to set for the groupId property.
    */
    public function setGroupId(?string $value): void {
        $this->groupId = $value;
    }

    /**
     * Sets the owners property value. The admins of the community. Limited to 100 users. If this property isn't specified when you create the community, the calling user is automatically assigned as the community owner.
     * @param array<User>|null $value Value to set for the owners property.
    */
    public function setOwners(?array $value): void {
        $this->owners = $value;
    }

    /**
     * Sets the privacy property value. Types of communityPrivacy.
     * @param CommunityPrivacy|null $value Value to set for the privacy property.
    */
    public function setPrivacy(?CommunityPrivacy $value): void {
        $this->privacy = $value;
    }

}
