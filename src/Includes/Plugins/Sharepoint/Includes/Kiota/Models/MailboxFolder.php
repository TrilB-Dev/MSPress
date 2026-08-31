<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MailboxFolder extends Entity implements Parsable 
{
    /**
     * @var int|null $childFolderCount The number of immediate child folders in the current folder.
    */
    private ?int $childFolderCount = null;
    
    /**
     * @var array<MailboxFolder>|null $childFolders The collection of child folders in this folder.
    */
    private ?array $childFolders = null;
    
    /**
     * @var string|null $displayName The display name of the folder.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<MailboxItem>|null $items The collection of items in this folder.
    */
    private ?array $items = null;
    
    /**
     * @var array<MultiValueLegacyExtendedProperty>|null $multiValueExtendedProperties The collection of multi-value extended properties defined for the mailboxFolder.
    */
    private ?array $multiValueExtendedProperties = null;
    
    /**
     * @var string|null $parentFolderId The unique identifier for the parent folder of this folder.
    */
    private ?string $parentFolderId = null;
    
    /**
     * @var array<SingleValueLegacyExtendedProperty>|null $singleValueExtendedProperties The collection of single-value extended properties defined for the mailboxFolder.
    */
    private ?array $singleValueExtendedProperties = null;
    
    /**
     * @var int|null $totalItemCount The number of items in the folder.
    */
    private ?int $totalItemCount = null;
    
    /**
     * @var string|null $type Describes the folder class type.
    */
    private ?string $type = null;
    
    /**
     * @var string|null $wellKnownName The locale-independent well-known name of the folder for folders created by Outlook, such as inbox, sentitems, drafts, deleteditems, or archive. For user-created folders, the value is null. Read-only.
    */
    private ?string $wellKnownName = null;
    
    /**
     * Instantiates a new MailboxFolder and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MailboxFolder
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MailboxFolder {
        return new MailboxFolder();
    }

    /**
     * Gets the childFolderCount property value. The number of immediate child folders in the current folder.
     * @return int|null
    */
    public function getChildFolderCount(): ?int {
        return $this->childFolderCount;
    }

    /**
     * Gets the childFolders property value. The collection of child folders in this folder.
     * @return array<MailboxFolder>|null
    */
    public function getChildFolders(): ?array {
        return $this->childFolders;
    }

    /**
     * Gets the displayName property value. The display name of the folder.
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
            'childFolderCount' => fn(ParseNode $n) => $o->setChildFolderCount($n->getIntegerValue()),
            'childFolders' => fn(ParseNode $n) => $o->setChildFolders($n->getCollectionOfObjectValues([MailboxFolder::class, 'createFromDiscriminatorValue'])),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'items' => fn(ParseNode $n) => $o->setItems($n->getCollectionOfObjectValues([MailboxItem::class, 'createFromDiscriminatorValue'])),
            'multiValueExtendedProperties' => fn(ParseNode $n) => $o->setMultiValueExtendedProperties($n->getCollectionOfObjectValues([MultiValueLegacyExtendedProperty::class, 'createFromDiscriminatorValue'])),
            'parentFolderId' => fn(ParseNode $n) => $o->setParentFolderId($n->getStringValue()),
            'singleValueExtendedProperties' => fn(ParseNode $n) => $o->setSingleValueExtendedProperties($n->getCollectionOfObjectValues([SingleValueLegacyExtendedProperty::class, 'createFromDiscriminatorValue'])),
            'totalItemCount' => fn(ParseNode $n) => $o->setTotalItemCount($n->getIntegerValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getStringValue()),
            'wellKnownName' => fn(ParseNode $n) => $o->setWellKnownName($n->getStringValue()),
        ]);
    }

    /**
     * Gets the items property value. The collection of items in this folder.
     * @return array<MailboxItem>|null
    */
    public function getItems(): ?array {
        return $this->items;
    }

    /**
     * Gets the multiValueExtendedProperties property value. The collection of multi-value extended properties defined for the mailboxFolder.
     * @return array<MultiValueLegacyExtendedProperty>|null
    */
    public function getMultiValueExtendedProperties(): ?array {
        return $this->multiValueExtendedProperties;
    }

    /**
     * Gets the parentFolderId property value. The unique identifier for the parent folder of this folder.
     * @return string|null
    */
    public function getParentFolderId(): ?string {
        return $this->parentFolderId;
    }

    /**
     * Gets the singleValueExtendedProperties property value. The collection of single-value extended properties defined for the mailboxFolder.
     * @return array<SingleValueLegacyExtendedProperty>|null
    */
    public function getSingleValueExtendedProperties(): ?array {
        return $this->singleValueExtendedProperties;
    }

    /**
     * Gets the totalItemCount property value. The number of items in the folder.
     * @return int|null
    */
    public function getTotalItemCount(): ?int {
        return $this->totalItemCount;
    }

    /**
     * Gets the type property value. Describes the folder class type.
     * @return string|null
    */
    public function getType(): ?string {
        return $this->type;
    }

    /**
     * Gets the wellKnownName property value. The locale-independent well-known name of the folder for folders created by Outlook, such as inbox, sentitems, drafts, deleteditems, or archive. For user-created folders, the value is null. Read-only.
     * @return string|null
    */
    public function getWellKnownName(): ?string {
        return $this->wellKnownName;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('childFolderCount', $this->getChildFolderCount());
        $writer->writeCollectionOfObjectValues('childFolders', $this->getChildFolders());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('items', $this->getItems());
        $writer->writeCollectionOfObjectValues('multiValueExtendedProperties', $this->getMultiValueExtendedProperties());
        $writer->writeStringValue('parentFolderId', $this->getParentFolderId());
        $writer->writeCollectionOfObjectValues('singleValueExtendedProperties', $this->getSingleValueExtendedProperties());
        $writer->writeIntegerValue('totalItemCount', $this->getTotalItemCount());
        $writer->writeStringValue('type', $this->getType());
        $writer->writeStringValue('wellKnownName', $this->getWellKnownName());
    }

    /**
     * Sets the childFolderCount property value. The number of immediate child folders in the current folder.
     * @param int|null $value Value to set for the childFolderCount property.
    */
    public function setChildFolderCount(?int $value): void {
        $this->childFolderCount = $value;
    }

    /**
     * Sets the childFolders property value. The collection of child folders in this folder.
     * @param array<MailboxFolder>|null $value Value to set for the childFolders property.
    */
    public function setChildFolders(?array $value): void {
        $this->childFolders = $value;
    }

    /**
     * Sets the displayName property value. The display name of the folder.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the items property value. The collection of items in this folder.
     * @param array<MailboxItem>|null $value Value to set for the items property.
    */
    public function setItems(?array $value): void {
        $this->items = $value;
    }

    /**
     * Sets the multiValueExtendedProperties property value. The collection of multi-value extended properties defined for the mailboxFolder.
     * @param array<MultiValueLegacyExtendedProperty>|null $value Value to set for the multiValueExtendedProperties property.
    */
    public function setMultiValueExtendedProperties(?array $value): void {
        $this->multiValueExtendedProperties = $value;
    }

    /**
     * Sets the parentFolderId property value. The unique identifier for the parent folder of this folder.
     * @param string|null $value Value to set for the parentFolderId property.
    */
    public function setParentFolderId(?string $value): void {
        $this->parentFolderId = $value;
    }

    /**
     * Sets the singleValueExtendedProperties property value. The collection of single-value extended properties defined for the mailboxFolder.
     * @param array<SingleValueLegacyExtendedProperty>|null $value Value to set for the singleValueExtendedProperties property.
    */
    public function setSingleValueExtendedProperties(?array $value): void {
        $this->singleValueExtendedProperties = $value;
    }

    /**
     * Sets the totalItemCount property value. The number of items in the folder.
     * @param int|null $value Value to set for the totalItemCount property.
    */
    public function setTotalItemCount(?int $value): void {
        $this->totalItemCount = $value;
    }

    /**
     * Sets the type property value. Describes the folder class type.
     * @param string|null $value Value to set for the type property.
    */
    public function setType(?string $value): void {
        $this->type = $value;
    }

    /**
     * Sets the wellKnownName property value. The locale-independent well-known name of the folder for folders created by Outlook, such as inbox, sentitems, drafts, deleteditems, or archive. For user-created folders, the value is null. Read-only.
     * @param string|null $value Value to set for the wellKnownName property.
    */
    public function setWellKnownName(?string $value): void {
        $this->wellKnownName = $value;
    }

}
