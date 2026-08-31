<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * An abstract class containing the base properties for Intune mobile apps. Note: Listing mobile apps with `$expand=assignments` has been deprecated. Instead get the list of apps without the `$expand` query on `assignments`. Then, perform the expansion on individual applications.
*/
class MobileApp extends Entity implements Parsable 
{
    /**
     * @var array<MobileAppAssignment>|null $assignments The list of group assignments for this mobile app.
    */
    private ?array $assignments = null;
    
    /**
     * @var array<MobileAppCategory>|null $categories The list of categories for this app.
    */
    private ?array $categories = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time the app was created. This property is read-only.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description The description of the app.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $developer The developer of the app.
    */
    private ?string $developer = null;
    
    /**
     * @var string|null $displayName The admin provided or imported title of the app.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $informationUrl The more information Url.
    */
    private ?string $informationUrl = null;
    
    /**
     * @var bool|null $isFeatured The value indicating whether the app is marked as featured by the admin.
    */
    private ?bool $isFeatured = null;
    
    /**
     * @var MimeContent|null $largeIcon The large icon, to be displayed in the app details and used for upload of the icon.
    */
    private ?MimeContent $largeIcon = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime The date and time the app was last modified. This property is read-only.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $notes Notes for the app.
    */
    private ?string $notes = null;
    
    /**
     * @var string|null $owner The owner of the app.
    */
    private ?string $owner = null;
    
    /**
     * @var string|null $privacyInformationUrl The privacy statement Url.
    */
    private ?string $privacyInformationUrl = null;
    
    /**
     * @var string|null $publisher The publisher of the app.
    */
    private ?string $publisher = null;
    
    /**
     * @var MobileAppPublishingState|null $publishingState Indicates the publishing state of an app.
    */
    private ?MobileAppPublishingState $publishingState = null;
    
    /**
     * Instantiates a new MobileApp and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MobileApp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MobileApp {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.androidLobApp': return new AndroidLobApp();
                case '#microsoft.graph.androidStoreApp': return new AndroidStoreApp();
                case '#microsoft.graph.iosiPadOSWebClip': return new IosiPadOSWebClip();
                case '#microsoft.graph.iosLobApp': return new IosLobApp();
                case '#microsoft.graph.iosStoreApp': return new IosStoreApp();
                case '#microsoft.graph.iosVppApp': return new IosVppApp();
                case '#microsoft.graph.macOSDmgApp': return new MacOSDmgApp();
                case '#microsoft.graph.macOSLobApp': return new MacOSLobApp();
                case '#microsoft.graph.macOSMicrosoftDefenderApp': return new MacOSMicrosoftDefenderApp();
                case '#microsoft.graph.macOSMicrosoftEdgeApp': return new MacOSMicrosoftEdgeApp();
                case '#microsoft.graph.macOSOfficeSuiteApp': return new MacOSOfficeSuiteApp();
                case '#microsoft.graph.managedAndroidLobApp': return new ManagedAndroidLobApp();
                case '#microsoft.graph.managedAndroidStoreApp': return new ManagedAndroidStoreApp();
                case '#microsoft.graph.managedApp': return new ManagedApp();
                case '#microsoft.graph.managedIOSLobApp': return new ManagedIOSLobApp();
                case '#microsoft.graph.managedIOSStoreApp': return new ManagedIOSStoreApp();
                case '#microsoft.graph.managedMobileLobApp': return new ManagedMobileLobApp();
                case '#microsoft.graph.microsoftStoreForBusinessApp': return new MicrosoftStoreForBusinessApp();
                case '#microsoft.graph.mobileLobApp': return new MobileLobApp();
                case '#microsoft.graph.webApp': return new WebApp();
                case '#microsoft.graph.win32LobApp': return new Win32LobApp();
                case '#microsoft.graph.windowsAppX': return new WindowsAppX();
                case '#microsoft.graph.windowsMicrosoftEdgeApp': return new WindowsMicrosoftEdgeApp();
                case '#microsoft.graph.windowsMobileMSI': return new WindowsMobileMSI();
                case '#microsoft.graph.windowsUniversalAppX': return new WindowsUniversalAppX();
                case '#microsoft.graph.windowsWebApp': return new WindowsWebApp();
            }
        }
        return new MobileApp();
    }

    /**
     * Gets the assignments property value. The list of group assignments for this mobile app.
     * @return array<MobileAppAssignment>|null
    */
    public function getAssignments(): ?array {
        return $this->assignments;
    }

    /**
     * Gets the categories property value. The list of categories for this app.
     * @return array<MobileAppCategory>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the createdDateTime property value. The date and time the app was created. This property is read-only.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. The description of the app.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the developer property value. The developer of the app.
     * @return string|null
    */
    public function getDeveloper(): ?string {
        return $this->developer;
    }

    /**
     * Gets the displayName property value. The admin provided or imported title of the app.
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
            'assignments' => fn(ParseNode $n) => $o->setAssignments($n->getCollectionOfObjectValues([MobileAppAssignment::class, 'createFromDiscriminatorValue'])),
            'categories' => fn(ParseNode $n) => $o->setCategories($n->getCollectionOfObjectValues([MobileAppCategory::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'developer' => fn(ParseNode $n) => $o->setDeveloper($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'informationUrl' => fn(ParseNode $n) => $o->setInformationUrl($n->getStringValue()),
            'isFeatured' => fn(ParseNode $n) => $o->setIsFeatured($n->getBooleanValue()),
            'largeIcon' => fn(ParseNode $n) => $o->setLargeIcon($n->getObjectValue([MimeContent::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'notes' => fn(ParseNode $n) => $o->setNotes($n->getStringValue()),
            'owner' => fn(ParseNode $n) => $o->setOwner($n->getStringValue()),
            'privacyInformationUrl' => fn(ParseNode $n) => $o->setPrivacyInformationUrl($n->getStringValue()),
            'publisher' => fn(ParseNode $n) => $o->setPublisher($n->getStringValue()),
            'publishingState' => fn(ParseNode $n) => $o->setPublishingState($n->getEnumValue(MobileAppPublishingState::class)),
        ]);
    }

    /**
     * Gets the informationUrl property value. The more information Url.
     * @return string|null
    */
    public function getInformationUrl(): ?string {
        return $this->informationUrl;
    }

    /**
     * Gets the isFeatured property value. The value indicating whether the app is marked as featured by the admin.
     * @return bool|null
    */
    public function getIsFeatured(): ?bool {
        return $this->isFeatured;
    }

    /**
     * Gets the largeIcon property value. The large icon, to be displayed in the app details and used for upload of the icon.
     * @return MimeContent|null
    */
    public function getLargeIcon(): ?MimeContent {
        return $this->largeIcon;
    }

    /**
     * Gets the lastModifiedDateTime property value. The date and time the app was last modified. This property is read-only.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the notes property value. Notes for the app.
     * @return string|null
    */
    public function getNotes(): ?string {
        return $this->notes;
    }

    /**
     * Gets the owner property value. The owner of the app.
     * @return string|null
    */
    public function getOwner(): ?string {
        return $this->owner;
    }

    /**
     * Gets the privacyInformationUrl property value. The privacy statement Url.
     * @return string|null
    */
    public function getPrivacyInformationUrl(): ?string {
        return $this->privacyInformationUrl;
    }

    /**
     * Gets the publisher property value. The publisher of the app.
     * @return string|null
    */
    public function getPublisher(): ?string {
        return $this->publisher;
    }

    /**
     * Gets the publishingState property value. Indicates the publishing state of an app.
     * @return MobileAppPublishingState|null
    */
    public function getPublishingState(): ?MobileAppPublishingState {
        return $this->publishingState;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('assignments', $this->getAssignments());
        $writer->writeCollectionOfObjectValues('categories', $this->getCategories());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('developer', $this->getDeveloper());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('informationUrl', $this->getInformationUrl());
        $writer->writeBooleanValue('isFeatured', $this->getIsFeatured());
        $writer->writeObjectValue('largeIcon', $this->getLargeIcon());
        $writer->writeStringValue('notes', $this->getNotes());
        $writer->writeStringValue('owner', $this->getOwner());
        $writer->writeStringValue('privacyInformationUrl', $this->getPrivacyInformationUrl());
        $writer->writeStringValue('publisher', $this->getPublisher());
        $writer->writeEnumValue('publishingState', $this->getPublishingState());
    }

    /**
     * Sets the assignments property value. The list of group assignments for this mobile app.
     * @param array<MobileAppAssignment>|null $value Value to set for the assignments property.
    */
    public function setAssignments(?array $value): void {
        $this->assignments = $value;
    }

    /**
     * Sets the categories property value. The list of categories for this app.
     * @param array<MobileAppCategory>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time the app was created. This property is read-only.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. The description of the app.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the developer property value. The developer of the app.
     * @param string|null $value Value to set for the developer property.
    */
    public function setDeveloper(?string $value): void {
        $this->developer = $value;
    }

    /**
     * Sets the displayName property value. The admin provided or imported title of the app.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the informationUrl property value. The more information Url.
     * @param string|null $value Value to set for the informationUrl property.
    */
    public function setInformationUrl(?string $value): void {
        $this->informationUrl = $value;
    }

    /**
     * Sets the isFeatured property value. The value indicating whether the app is marked as featured by the admin.
     * @param bool|null $value Value to set for the isFeatured property.
    */
    public function setIsFeatured(?bool $value): void {
        $this->isFeatured = $value;
    }

    /**
     * Sets the largeIcon property value. The large icon, to be displayed in the app details and used for upload of the icon.
     * @param MimeContent|null $value Value to set for the largeIcon property.
    */
    public function setLargeIcon(?MimeContent $value): void {
        $this->largeIcon = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. The date and time the app was last modified. This property is read-only.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the notes property value. Notes for the app.
     * @param string|null $value Value to set for the notes property.
    */
    public function setNotes(?string $value): void {
        $this->notes = $value;
    }

    /**
     * Sets the owner property value. The owner of the app.
     * @param string|null $value Value to set for the owner property.
    */
    public function setOwner(?string $value): void {
        $this->owner = $value;
    }

    /**
     * Sets the privacyInformationUrl property value. The privacy statement Url.
     * @param string|null $value Value to set for the privacyInformationUrl property.
    */
    public function setPrivacyInformationUrl(?string $value): void {
        $this->privacyInformationUrl = $value;
    }

    /**
     * Sets the publisher property value. The publisher of the app.
     * @param string|null $value Value to set for the publisher property.
    */
    public function setPublisher(?string $value): void {
        $this->publisher = $value;
    }

    /**
     * Sets the publishingState property value. Indicates the publishing state of an app.
     * @param MobileAppPublishingState|null $value Value to set for the publishingState property.
    */
    public function setPublishingState(?MobileAppPublishingState $value): void {
        $this->publishingState = $value;
    }

}
