<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Contains properties and inherited properties for Windows Universal AppX Line Of Business apps. Inherits from `mobileLobApp`.
*/
class WindowsUniversalAppX extends MobileLobApp implements Parsable 
{
    /**
     * @var WindowsArchitecture|null $applicableArchitectures Contains properties for Windows architecture.
    */
    private ?WindowsArchitecture $applicableArchitectures = null;
    
    /**
     * @var WindowsDeviceType|null $applicableDeviceTypes Contains properties for Windows device type. Multiple values can be selected. Default value is `none`.
    */
    private ?WindowsDeviceType $applicableDeviceTypes = null;
    
    /**
     * @var array<MobileContainedApp>|null $committedContainedApps The collection of contained apps in the committed mobileAppContent of a windowsUniversalAppX app. This property is read-only.
    */
    private ?array $committedContainedApps = null;
    
    /**
     * @var string|null $identityName The Identity Name of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'Contoso.DemoApp'.
    */
    private ?string $identityName = null;
    
    /**
     * @var string|null $identityPublisherHash The Identity Publisher Hash of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'AB82CD0XYZ'.
    */
    private ?string $identityPublisherHash = null;
    
    /**
     * @var string|null $identityResourceIdentifier The Identity Resource Identifier of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'TestResourceId'.
    */
    private ?string $identityResourceIdentifier = null;
    
    /**
     * @var string|null $identityVersion The Identity Version of the app, parsed from the appx file when it is uploaded through the Intune MEM console.  For example: '1.0.0.0'.
    */
    private ?string $identityVersion = null;
    
    /**
     * @var bool|null $isBundle Whether or not the app is a bundle. If TRUE, app is a bundle; if FALSE, app is not a bundle.
    */
    private ?bool $isBundle = null;
    
    /**
     * @var WindowsMinimumOperatingSystem|null $minimumSupportedOperatingSystem The minimum operating system required for a Windows mobile app.
    */
    private ?WindowsMinimumOperatingSystem $minimumSupportedOperatingSystem = null;
    
    /**
     * Instantiates a new WindowsUniversalAppX and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.windowsUniversalAppX');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WindowsUniversalAppX
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WindowsUniversalAppX {
        return new WindowsUniversalAppX();
    }

    /**
     * Gets the applicableArchitectures property value. Contains properties for Windows architecture.
     * @return WindowsArchitecture|null
    */
    public function getApplicableArchitectures(): ?WindowsArchitecture {
        return $this->applicableArchitectures;
    }

    /**
     * Gets the applicableDeviceTypes property value. Contains properties for Windows device type. Multiple values can be selected. Default value is `none`.
     * @return WindowsDeviceType|null
    */
    public function getApplicableDeviceTypes(): ?WindowsDeviceType {
        return $this->applicableDeviceTypes;
    }

    /**
     * Gets the committedContainedApps property value. The collection of contained apps in the committed mobileAppContent of a windowsUniversalAppX app. This property is read-only.
     * @return array<MobileContainedApp>|null
    */
    public function getCommittedContainedApps(): ?array {
        return $this->committedContainedApps;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'applicableArchitectures' => fn(ParseNode $n) => $o->setApplicableArchitectures($n->getEnumValue(WindowsArchitecture::class)),
            'applicableDeviceTypes' => fn(ParseNode $n) => $o->setApplicableDeviceTypes($n->getEnumValue(WindowsDeviceType::class)),
            'committedContainedApps' => fn(ParseNode $n) => $o->setCommittedContainedApps($n->getCollectionOfObjectValues([MobileContainedApp::class, 'createFromDiscriminatorValue'])),
            'identityName' => fn(ParseNode $n) => $o->setIdentityName($n->getStringValue()),
            'identityPublisherHash' => fn(ParseNode $n) => $o->setIdentityPublisherHash($n->getStringValue()),
            'identityResourceIdentifier' => fn(ParseNode $n) => $o->setIdentityResourceIdentifier($n->getStringValue()),
            'identityVersion' => fn(ParseNode $n) => $o->setIdentityVersion($n->getStringValue()),
            'isBundle' => fn(ParseNode $n) => $o->setIsBundle($n->getBooleanValue()),
            'minimumSupportedOperatingSystem' => fn(ParseNode $n) => $o->setMinimumSupportedOperatingSystem($n->getObjectValue([WindowsMinimumOperatingSystem::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the identityName property value. The Identity Name of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'Contoso.DemoApp'.
     * @return string|null
    */
    public function getIdentityName(): ?string {
        return $this->identityName;
    }

    /**
     * Gets the identityPublisherHash property value. The Identity Publisher Hash of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'AB82CD0XYZ'.
     * @return string|null
    */
    public function getIdentityPublisherHash(): ?string {
        return $this->identityPublisherHash;
    }

    /**
     * Gets the identityResourceIdentifier property value. The Identity Resource Identifier of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'TestResourceId'.
     * @return string|null
    */
    public function getIdentityResourceIdentifier(): ?string {
        return $this->identityResourceIdentifier;
    }

    /**
     * Gets the identityVersion property value. The Identity Version of the app, parsed from the appx file when it is uploaded through the Intune MEM console.  For example: '1.0.0.0'.
     * @return string|null
    */
    public function getIdentityVersion(): ?string {
        return $this->identityVersion;
    }

    /**
     * Gets the isBundle property value. Whether or not the app is a bundle. If TRUE, app is a bundle; if FALSE, app is not a bundle.
     * @return bool|null
    */
    public function getIsBundle(): ?bool {
        return $this->isBundle;
    }

    /**
     * Gets the minimumSupportedOperatingSystem property value. The minimum operating system required for a Windows mobile app.
     * @return WindowsMinimumOperatingSystem|null
    */
    public function getMinimumSupportedOperatingSystem(): ?WindowsMinimumOperatingSystem {
        return $this->minimumSupportedOperatingSystem;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('applicableArchitectures', $this->getApplicableArchitectures());
        $writer->writeEnumValue('applicableDeviceTypes', $this->getApplicableDeviceTypes());
        $writer->writeCollectionOfObjectValues('committedContainedApps', $this->getCommittedContainedApps());
        $writer->writeStringValue('identityName', $this->getIdentityName());
        $writer->writeStringValue('identityPublisherHash', $this->getIdentityPublisherHash());
        $writer->writeStringValue('identityResourceIdentifier', $this->getIdentityResourceIdentifier());
        $writer->writeStringValue('identityVersion', $this->getIdentityVersion());
        $writer->writeBooleanValue('isBundle', $this->getIsBundle());
        $writer->writeObjectValue('minimumSupportedOperatingSystem', $this->getMinimumSupportedOperatingSystem());
    }

    /**
     * Sets the applicableArchitectures property value. Contains properties for Windows architecture.
     * @param WindowsArchitecture|null $value Value to set for the applicableArchitectures property.
    */
    public function setApplicableArchitectures(?WindowsArchitecture $value): void {
        $this->applicableArchitectures = $value;
    }

    /**
     * Sets the applicableDeviceTypes property value. Contains properties for Windows device type. Multiple values can be selected. Default value is `none`.
     * @param WindowsDeviceType|null $value Value to set for the applicableDeviceTypes property.
    */
    public function setApplicableDeviceTypes(?WindowsDeviceType $value): void {
        $this->applicableDeviceTypes = $value;
    }

    /**
     * Sets the committedContainedApps property value. The collection of contained apps in the committed mobileAppContent of a windowsUniversalAppX app. This property is read-only.
     * @param array<MobileContainedApp>|null $value Value to set for the committedContainedApps property.
    */
    public function setCommittedContainedApps(?array $value): void {
        $this->committedContainedApps = $value;
    }

    /**
     * Sets the identityName property value. The Identity Name of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'Contoso.DemoApp'.
     * @param string|null $value Value to set for the identityName property.
    */
    public function setIdentityName(?string $value): void {
        $this->identityName = $value;
    }

    /**
     * Sets the identityPublisherHash property value. The Identity Publisher Hash of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'AB82CD0XYZ'.
     * @param string|null $value Value to set for the identityPublisherHash property.
    */
    public function setIdentityPublisherHash(?string $value): void {
        $this->identityPublisherHash = $value;
    }

    /**
     * Sets the identityResourceIdentifier property value. The Identity Resource Identifier of the app, parsed from the appx file when it is uploaded through the Intune MEM console. For example: 'TestResourceId'.
     * @param string|null $value Value to set for the identityResourceIdentifier property.
    */
    public function setIdentityResourceIdentifier(?string $value): void {
        $this->identityResourceIdentifier = $value;
    }

    /**
     * Sets the identityVersion property value. The Identity Version of the app, parsed from the appx file when it is uploaded through the Intune MEM console.  For example: '1.0.0.0'.
     * @param string|null $value Value to set for the identityVersion property.
    */
    public function setIdentityVersion(?string $value): void {
        $this->identityVersion = $value;
    }

    /**
     * Sets the isBundle property value. Whether or not the app is a bundle. If TRUE, app is a bundle; if FALSE, app is not a bundle.
     * @param bool|null $value Value to set for the isBundle property.
    */
    public function setIsBundle(?bool $value): void {
        $this->isBundle = $value;
    }

    /**
     * Sets the minimumSupportedOperatingSystem property value. The minimum operating system required for a Windows mobile app.
     * @param WindowsMinimumOperatingSystem|null $value Value to set for the minimumSupportedOperatingSystem property.
    */
    public function setMinimumSupportedOperatingSystem(?WindowsMinimumOperatingSystem $value): void {
        $this->minimumSupportedOperatingSystem = $value;
    }

}
