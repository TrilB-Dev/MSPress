<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SharePointGroup extends Entity implements Parsable 
{
    /**
     * @var string|null $description The user-visible description of the sharePointGroup. Read-write.
    */
    private ?string $description = null;
    
    /**
     * @var array<SharePointGroupMember>|null $members The set of members in the sharePointGroup. Read-write.
    */
    private ?array $members = null;
    
    /**
     * @var string|null $principalId The principal ID of the SharePoint group in the tenant. Read-only.
    */
    private ?string $principalId = null;
    
    /**
     * @var string|null $title The user-visible title of the sharePointGroup. Read-write.
    */
    private ?string $title = null;
    
    /**
     * Instantiates a new SharePointGroup and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SharePointGroup
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SharePointGroup {
        return new SharePointGroup();
    }

    /**
     * Gets the description property value. The user-visible description of the sharePointGroup. Read-write.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'members' => fn(ParseNode $n) => $o->setMembers($n->getCollectionOfObjectValues([SharePointGroupMember::class, 'createFromDiscriminatorValue'])),
            'principalId' => fn(ParseNode $n) => $o->setPrincipalId($n->getStringValue()),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
        ]);
    }

    /**
     * Gets the members property value. The set of members in the sharePointGroup. Read-write.
     * @return array<SharePointGroupMember>|null
    */
    public function getMembers(): ?array {
        return $this->members;
    }

    /**
     * Gets the principalId property value. The principal ID of the SharePoint group in the tenant. Read-only.
     * @return string|null
    */
    public function getPrincipalId(): ?string {
        return $this->principalId;
    }

    /**
     * Gets the title property value. The user-visible title of the sharePointGroup. Read-write.
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeCollectionOfObjectValues('members', $this->getMembers());
        $writer->writeStringValue('principalId', $this->getPrincipalId());
        $writer->writeStringValue('title', $this->getTitle());
    }

    /**
     * Sets the description property value. The user-visible description of the sharePointGroup. Read-write.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the members property value. The set of members in the sharePointGroup. Read-write.
     * @param array<SharePointGroupMember>|null $value Value to set for the members property.
    */
    public function setMembers(?array $value): void {
        $this->members = $value;
    }

    /**
     * Sets the principalId property value. The principal ID of the SharePoint group in the tenant. Read-only.
     * @param string|null $value Value to set for the principalId property.
    */
    public function setPrincipalId(?string $value): void {
        $this->principalId = $value;
    }

    /**
     * Sets the title property value. The user-visible title of the sharePointGroup. Read-write.
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

}
