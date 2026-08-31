<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Contains properties and inherited properties for the MacOS DMG (Apple Disk Image) App.
*/
class MacOSDmgApp extends MobileLobApp implements Parsable 
{
    /**
     * @var bool|null $ignoreVersionDetection When TRUE, indicates that the app's version will NOT be used to detect if the app is installed on a device. When FALSE, indicates that the app's version will be used to detect if the app is installed on a device. Set this to true for apps that use a self update feature. The default value is FALSE.
    */
    private ?bool $ignoreVersionDetection = null;
    
    /**
     * @var array<MacOSIncludedApp>|null $includedApps The list of .apps expected to be installed by the DMG (Apple Disk Image). This collection can contain a maximum of 500 elements.
    */
    private ?array $includedApps = null;
    
    /**
     * @var MacOSMinimumOperatingSystem|null $minimumSupportedOperatingSystem ComplexType macOSMinimumOperatingSystem that indicates the minimum operating system applicable for the application.
    */
    private ?MacOSMinimumOperatingSystem $minimumSupportedOperatingSystem = null;
    
    /**
     * @var string|null $primaryBundleId The bundleId of the primary .app in the DMG (Apple Disk Image). This maps to the CFBundleIdentifier in the app's bundle configuration.
    */
    private ?string $primaryBundleId = null;
    
    /**
     * @var string|null $primaryBundleVersion The version of the primary .app in the DMG (Apple Disk Image). This maps to the CFBundleShortVersion in the app's bundle configuration.
    */
    private ?string $primaryBundleVersion = null;
    
    /**
     * Instantiates a new MacOSDmgApp and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.macOSDmgApp');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MacOSDmgApp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MacOSDmgApp {
        return new MacOSDmgApp();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'ignoreVersionDetection' => fn(ParseNode $n) => $o->setIgnoreVersionDetection($n->getBooleanValue()),
            'includedApps' => fn(ParseNode $n) => $o->setIncludedApps($n->getCollectionOfObjectValues([MacOSIncludedApp::class, 'createFromDiscriminatorValue'])),
            'minimumSupportedOperatingSystem' => fn(ParseNode $n) => $o->setMinimumSupportedOperatingSystem($n->getObjectValue([MacOSMinimumOperatingSystem::class, 'createFromDiscriminatorValue'])),
            'primaryBundleId' => fn(ParseNode $n) => $o->setPrimaryBundleId($n->getStringValue()),
            'primaryBundleVersion' => fn(ParseNode $n) => $o->setPrimaryBundleVersion($n->getStringValue()),
        ]);
    }

    /**
     * Gets the ignoreVersionDetection property value. When TRUE, indicates that the app's version will NOT be used to detect if the app is installed on a device. When FALSE, indicates that the app's version will be used to detect if the app is installed on a device. Set this to true for apps that use a self update feature. The default value is FALSE.
     * @return bool|null
    */
    public function getIgnoreVersionDetection(): ?bool {
        return $this->ignoreVersionDetection;
    }

    /**
     * Gets the includedApps property value. The list of .apps expected to be installed by the DMG (Apple Disk Image). This collection can contain a maximum of 500 elements.
     * @return array<MacOSIncludedApp>|null
    */
    public function getIncludedApps(): ?array {
        return $this->includedApps;
    }

    /**
     * Gets the minimumSupportedOperatingSystem property value. ComplexType macOSMinimumOperatingSystem that indicates the minimum operating system applicable for the application.
     * @return MacOSMinimumOperatingSystem|null
    */
    public function getMinimumSupportedOperatingSystem(): ?MacOSMinimumOperatingSystem {
        return $this->minimumSupportedOperatingSystem;
    }

    /**
     * Gets the primaryBundleId property value. The bundleId of the primary .app in the DMG (Apple Disk Image). This maps to the CFBundleIdentifier in the app's bundle configuration.
     * @return string|null
    */
    public function getPrimaryBundleId(): ?string {
        return $this->primaryBundleId;
    }

    /**
     * Gets the primaryBundleVersion property value. The version of the primary .app in the DMG (Apple Disk Image). This maps to the CFBundleShortVersion in the app's bundle configuration.
     * @return string|null
    */
    public function getPrimaryBundleVersion(): ?string {
        return $this->primaryBundleVersion;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeBooleanValue('ignoreVersionDetection', $this->getIgnoreVersionDetection());
        $writer->writeCollectionOfObjectValues('includedApps', $this->getIncludedApps());
        $writer->writeObjectValue('minimumSupportedOperatingSystem', $this->getMinimumSupportedOperatingSystem());
        $writer->writeStringValue('primaryBundleId', $this->getPrimaryBundleId());
        $writer->writeStringValue('primaryBundleVersion', $this->getPrimaryBundleVersion());
    }

    /**
     * Sets the ignoreVersionDetection property value. When TRUE, indicates that the app's version will NOT be used to detect if the app is installed on a device. When FALSE, indicates that the app's version will be used to detect if the app is installed on a device. Set this to true for apps that use a self update feature. The default value is FALSE.
     * @param bool|null $value Value to set for the ignoreVersionDetection property.
    */
    public function setIgnoreVersionDetection(?bool $value): void {
        $this->ignoreVersionDetection = $value;
    }

    /**
     * Sets the includedApps property value. The list of .apps expected to be installed by the DMG (Apple Disk Image). This collection can contain a maximum of 500 elements.
     * @param array<MacOSIncludedApp>|null $value Value to set for the includedApps property.
    */
    public function setIncludedApps(?array $value): void {
        $this->includedApps = $value;
    }

    /**
     * Sets the minimumSupportedOperatingSystem property value. ComplexType macOSMinimumOperatingSystem that indicates the minimum operating system applicable for the application.
     * @param MacOSMinimumOperatingSystem|null $value Value to set for the minimumSupportedOperatingSystem property.
    */
    public function setMinimumSupportedOperatingSystem(?MacOSMinimumOperatingSystem $value): void {
        $this->minimumSupportedOperatingSystem = $value;
    }

    /**
     * Sets the primaryBundleId property value. The bundleId of the primary .app in the DMG (Apple Disk Image). This maps to the CFBundleIdentifier in the app's bundle configuration.
     * @param string|null $value Value to set for the primaryBundleId property.
    */
    public function setPrimaryBundleId(?string $value): void {
        $this->primaryBundleId = $value;
    }

    /**
     * Sets the primaryBundleVersion property value. The version of the primary .app in the DMG (Apple Disk Image). This maps to the CFBundleShortVersion in the app's bundle configuration.
     * @param string|null $value Value to set for the primaryBundleVersion property.
    */
    public function setPrimaryBundleVersion(?string $value): void {
        $this->primaryBundleVersion = $value;
    }

}
