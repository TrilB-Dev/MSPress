<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Contains properties and inherited properties for Win32 apps.
*/
class Win32LobApp extends MobileLobApp implements Parsable 
{
    /**
     * @var WindowsArchitecture|null $allowedArchitectures Indicates the Windows architecture(s) this app should be installed on. The app will be treated as not applicable for devices with architectures not matching the selected value. When a non-null value is provided for the allowedArchitectures property, the value of the applicableArchitectures property is set to none. The possible values are: null, x86, x64, arm64. The possible values are: none, x86, x64, arm, neutral.
    */
    private ?WindowsArchitecture $allowedArchitectures = null;
    
    /**
     * @var WindowsArchitecture|null $applicableArchitectures Contains properties for Windows architecture.
    */
    private ?WindowsArchitecture $applicableArchitectures = null;
    
    /**
     * @var string|null $installCommandLine Indicates the command line to install this app. Used to install the Win32 app. Example: msiexec /i 'Orca.Msi' /qn.
    */
    private ?string $installCommandLine = null;
    
    /**
     * @var Win32LobAppInstallExperience|null $installExperience Indicates the install experience for this app.
    */
    private ?Win32LobAppInstallExperience $installExperience = null;
    
    /**
     * @var int|null $minimumCpuSpeedInMHz Indicates the value for the minimum CPU speed which is required to install this app. Allowed range from 0 to clock speed from WMI helper.
    */
    private ?int $minimumCpuSpeedInMHz = null;
    
    /**
     * @var int|null $minimumFreeDiskSpaceInMB Indicates the value for the minimum free disk space which is required to install this app. Allowed range from 0 to driver's maximum available free space.
    */
    private ?int $minimumFreeDiskSpaceInMB = null;
    
    /**
     * @var int|null $minimumMemoryInMB Indicates the value for the minimum physical memory which is required to install this app. Allowed range from 0 to total physical memory from WMI helper.
    */
    private ?int $minimumMemoryInMB = null;
    
    /**
     * @var int|null $minimumNumberOfProcessors Indicates the value for the minimum number of processors which is required to install this app. Minimum value is 0.
    */
    private ?int $minimumNumberOfProcessors = null;
    
    /**
     * @var string|null $minimumSupportedWindowsRelease Indicates the value for the minimum supported windows release. Example: Windows11_23H2.
    */
    private ?string $minimumSupportedWindowsRelease = null;
    
    /**
     * @var Win32LobAppMsiInformation|null $msiInformation Indicates the MSI details if this Win32 app is an MSI app.
    */
    private ?Win32LobAppMsiInformation $msiInformation = null;
    
    /**
     * @var array<Win32LobAppReturnCode>|null $returnCodes Indicates the return codes for post installation behavior.
    */
    private ?array $returnCodes = null;
    
    /**
     * @var array<Win32LobAppRule>|null $rules Indicates the detection and requirement rules for this app. The possible values are: Win32LobAppFileSystemRule, Win32LobAppPowerShellScriptRule, Win32LobAppProductCodeRule, Win32LobAppRegistryRule.
    */
    private ?array $rules = null;
    
    /**
     * @var string|null $setupFilePath Indicates the relative path of the setup file in the encrypted Win32LobApp package. Example: Intel-SA-00075 Detection and Mitigation Tool.msi.
    */
    private ?string $setupFilePath = null;
    
    /**
     * @var string|null $uninstallCommandLine Indicates the command line to uninstall this app. Used to uninstall the app. Example: msiexec /x '{85F4CBCB-9BBC-4B50-A7D8-E1106771498D}' /qn.
    */
    private ?string $uninstallCommandLine = null;
    
    /**
     * Instantiates a new Win32LobApp and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.win32LobApp');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Win32LobApp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Win32LobApp {
        return new Win32LobApp();
    }

    /**
     * Gets the allowedArchitectures property value. Indicates the Windows architecture(s) this app should be installed on. The app will be treated as not applicable for devices with architectures not matching the selected value. When a non-null value is provided for the allowedArchitectures property, the value of the applicableArchitectures property is set to none. The possible values are: null, x86, x64, arm64. The possible values are: none, x86, x64, arm, neutral.
     * @return WindowsArchitecture|null
    */
    public function getAllowedArchitectures(): ?WindowsArchitecture {
        return $this->allowedArchitectures;
    }

    /**
     * Gets the applicableArchitectures property value. Contains properties for Windows architecture.
     * @return WindowsArchitecture|null
    */
    public function getApplicableArchitectures(): ?WindowsArchitecture {
        return $this->applicableArchitectures;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'allowedArchitectures' => fn(ParseNode $n) => $o->setAllowedArchitectures($n->getEnumValue(WindowsArchitecture::class)),
            'applicableArchitectures' => fn(ParseNode $n) => $o->setApplicableArchitectures($n->getEnumValue(WindowsArchitecture::class)),
            'installCommandLine' => fn(ParseNode $n) => $o->setInstallCommandLine($n->getStringValue()),
            'installExperience' => fn(ParseNode $n) => $o->setInstallExperience($n->getObjectValue([Win32LobAppInstallExperience::class, 'createFromDiscriminatorValue'])),
            'minimumCpuSpeedInMHz' => fn(ParseNode $n) => $o->setMinimumCpuSpeedInMHz($n->getIntegerValue()),
            'minimumFreeDiskSpaceInMB' => fn(ParseNode $n) => $o->setMinimumFreeDiskSpaceInMB($n->getIntegerValue()),
            'minimumMemoryInMB' => fn(ParseNode $n) => $o->setMinimumMemoryInMB($n->getIntegerValue()),
            'minimumNumberOfProcessors' => fn(ParseNode $n) => $o->setMinimumNumberOfProcessors($n->getIntegerValue()),
            'minimumSupportedWindowsRelease' => fn(ParseNode $n) => $o->setMinimumSupportedWindowsRelease($n->getStringValue()),
            'msiInformation' => fn(ParseNode $n) => $o->setMsiInformation($n->getObjectValue([Win32LobAppMsiInformation::class, 'createFromDiscriminatorValue'])),
            'returnCodes' => fn(ParseNode $n) => $o->setReturnCodes($n->getCollectionOfObjectValues([Win32LobAppReturnCode::class, 'createFromDiscriminatorValue'])),
            'rules' => fn(ParseNode $n) => $o->setRules($n->getCollectionOfObjectValues([Win32LobAppRule::class, 'createFromDiscriminatorValue'])),
            'setupFilePath' => fn(ParseNode $n) => $o->setSetupFilePath($n->getStringValue()),
            'uninstallCommandLine' => fn(ParseNode $n) => $o->setUninstallCommandLine($n->getStringValue()),
        ]);
    }

    /**
     * Gets the installCommandLine property value. Indicates the command line to install this app. Used to install the Win32 app. Example: msiexec /i 'Orca.Msi' /qn.
     * @return string|null
    */
    public function getInstallCommandLine(): ?string {
        return $this->installCommandLine;
    }

    /**
     * Gets the installExperience property value. Indicates the install experience for this app.
     * @return Win32LobAppInstallExperience|null
    */
    public function getInstallExperience(): ?Win32LobAppInstallExperience {
        return $this->installExperience;
    }

    /**
     * Gets the minimumCpuSpeedInMHz property value. Indicates the value for the minimum CPU speed which is required to install this app. Allowed range from 0 to clock speed from WMI helper.
     * @return int|null
    */
    public function getMinimumCpuSpeedInMHz(): ?int {
        return $this->minimumCpuSpeedInMHz;
    }

    /**
     * Gets the minimumFreeDiskSpaceInMB property value. Indicates the value for the minimum free disk space which is required to install this app. Allowed range from 0 to driver's maximum available free space.
     * @return int|null
    */
    public function getMinimumFreeDiskSpaceInMB(): ?int {
        return $this->minimumFreeDiskSpaceInMB;
    }

    /**
     * Gets the minimumMemoryInMB property value. Indicates the value for the minimum physical memory which is required to install this app. Allowed range from 0 to total physical memory from WMI helper.
     * @return int|null
    */
    public function getMinimumMemoryInMB(): ?int {
        return $this->minimumMemoryInMB;
    }

    /**
     * Gets the minimumNumberOfProcessors property value. Indicates the value for the minimum number of processors which is required to install this app. Minimum value is 0.
     * @return int|null
    */
    public function getMinimumNumberOfProcessors(): ?int {
        return $this->minimumNumberOfProcessors;
    }

    /**
     * Gets the minimumSupportedWindowsRelease property value. Indicates the value for the minimum supported windows release. Example: Windows11_23H2.
     * @return string|null
    */
    public function getMinimumSupportedWindowsRelease(): ?string {
        return $this->minimumSupportedWindowsRelease;
    }

    /**
     * Gets the msiInformation property value. Indicates the MSI details if this Win32 app is an MSI app.
     * @return Win32LobAppMsiInformation|null
    */
    public function getMsiInformation(): ?Win32LobAppMsiInformation {
        return $this->msiInformation;
    }

    /**
     * Gets the returnCodes property value. Indicates the return codes for post installation behavior.
     * @return array<Win32LobAppReturnCode>|null
    */
    public function getReturnCodes(): ?array {
        return $this->returnCodes;
    }

    /**
     * Gets the rules property value. Indicates the detection and requirement rules for this app. The possible values are: Win32LobAppFileSystemRule, Win32LobAppPowerShellScriptRule, Win32LobAppProductCodeRule, Win32LobAppRegistryRule.
     * @return array<Win32LobAppRule>|null
    */
    public function getRules(): ?array {
        return $this->rules;
    }

    /**
     * Gets the setupFilePath property value. Indicates the relative path of the setup file in the encrypted Win32LobApp package. Example: Intel-SA-00075 Detection and Mitigation Tool.msi.
     * @return string|null
    */
    public function getSetupFilePath(): ?string {
        return $this->setupFilePath;
    }

    /**
     * Gets the uninstallCommandLine property value. Indicates the command line to uninstall this app. Used to uninstall the app. Example: msiexec /x '{85F4CBCB-9BBC-4B50-A7D8-E1106771498D}' /qn.
     * @return string|null
    */
    public function getUninstallCommandLine(): ?string {
        return $this->uninstallCommandLine;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('allowedArchitectures', $this->getAllowedArchitectures());
        $writer->writeEnumValue('applicableArchitectures', $this->getApplicableArchitectures());
        $writer->writeStringValue('installCommandLine', $this->getInstallCommandLine());
        $writer->writeObjectValue('installExperience', $this->getInstallExperience());
        $writer->writeIntegerValue('minimumCpuSpeedInMHz', $this->getMinimumCpuSpeedInMHz());
        $writer->writeIntegerValue('minimumFreeDiskSpaceInMB', $this->getMinimumFreeDiskSpaceInMB());
        $writer->writeIntegerValue('minimumMemoryInMB', $this->getMinimumMemoryInMB());
        $writer->writeIntegerValue('minimumNumberOfProcessors', $this->getMinimumNumberOfProcessors());
        $writer->writeStringValue('minimumSupportedWindowsRelease', $this->getMinimumSupportedWindowsRelease());
        $writer->writeObjectValue('msiInformation', $this->getMsiInformation());
        $writer->writeCollectionOfObjectValues('returnCodes', $this->getReturnCodes());
        $writer->writeCollectionOfObjectValues('rules', $this->getRules());
        $writer->writeStringValue('setupFilePath', $this->getSetupFilePath());
        $writer->writeStringValue('uninstallCommandLine', $this->getUninstallCommandLine());
    }

    /**
     * Sets the allowedArchitectures property value. Indicates the Windows architecture(s) this app should be installed on. The app will be treated as not applicable for devices with architectures not matching the selected value. When a non-null value is provided for the allowedArchitectures property, the value of the applicableArchitectures property is set to none. The possible values are: null, x86, x64, arm64. The possible values are: none, x86, x64, arm, neutral.
     * @param WindowsArchitecture|null $value Value to set for the allowedArchitectures property.
    */
    public function setAllowedArchitectures(?WindowsArchitecture $value): void {
        $this->allowedArchitectures = $value;
    }

    /**
     * Sets the applicableArchitectures property value. Contains properties for Windows architecture.
     * @param WindowsArchitecture|null $value Value to set for the applicableArchitectures property.
    */
    public function setApplicableArchitectures(?WindowsArchitecture $value): void {
        $this->applicableArchitectures = $value;
    }

    /**
     * Sets the installCommandLine property value. Indicates the command line to install this app. Used to install the Win32 app. Example: msiexec /i 'Orca.Msi' /qn.
     * @param string|null $value Value to set for the installCommandLine property.
    */
    public function setInstallCommandLine(?string $value): void {
        $this->installCommandLine = $value;
    }

    /**
     * Sets the installExperience property value. Indicates the install experience for this app.
     * @param Win32LobAppInstallExperience|null $value Value to set for the installExperience property.
    */
    public function setInstallExperience(?Win32LobAppInstallExperience $value): void {
        $this->installExperience = $value;
    }

    /**
     * Sets the minimumCpuSpeedInMHz property value. Indicates the value for the minimum CPU speed which is required to install this app. Allowed range from 0 to clock speed from WMI helper.
     * @param int|null $value Value to set for the minimumCpuSpeedInMHz property.
    */
    public function setMinimumCpuSpeedInMHz(?int $value): void {
        $this->minimumCpuSpeedInMHz = $value;
    }

    /**
     * Sets the minimumFreeDiskSpaceInMB property value. Indicates the value for the minimum free disk space which is required to install this app. Allowed range from 0 to driver's maximum available free space.
     * @param int|null $value Value to set for the minimumFreeDiskSpaceInMB property.
    */
    public function setMinimumFreeDiskSpaceInMB(?int $value): void {
        $this->minimumFreeDiskSpaceInMB = $value;
    }

    /**
     * Sets the minimumMemoryInMB property value. Indicates the value for the minimum physical memory which is required to install this app. Allowed range from 0 to total physical memory from WMI helper.
     * @param int|null $value Value to set for the minimumMemoryInMB property.
    */
    public function setMinimumMemoryInMB(?int $value): void {
        $this->minimumMemoryInMB = $value;
    }

    /**
     * Sets the minimumNumberOfProcessors property value. Indicates the value for the minimum number of processors which is required to install this app. Minimum value is 0.
     * @param int|null $value Value to set for the minimumNumberOfProcessors property.
    */
    public function setMinimumNumberOfProcessors(?int $value): void {
        $this->minimumNumberOfProcessors = $value;
    }

    /**
     * Sets the minimumSupportedWindowsRelease property value. Indicates the value for the minimum supported windows release. Example: Windows11_23H2.
     * @param string|null $value Value to set for the minimumSupportedWindowsRelease property.
    */
    public function setMinimumSupportedWindowsRelease(?string $value): void {
        $this->minimumSupportedWindowsRelease = $value;
    }

    /**
     * Sets the msiInformation property value. Indicates the MSI details if this Win32 app is an MSI app.
     * @param Win32LobAppMsiInformation|null $value Value to set for the msiInformation property.
    */
    public function setMsiInformation(?Win32LobAppMsiInformation $value): void {
        $this->msiInformation = $value;
    }

    /**
     * Sets the returnCodes property value. Indicates the return codes for post installation behavior.
     * @param array<Win32LobAppReturnCode>|null $value Value to set for the returnCodes property.
    */
    public function setReturnCodes(?array $value): void {
        $this->returnCodes = $value;
    }

    /**
     * Sets the rules property value. Indicates the detection and requirement rules for this app. The possible values are: Win32LobAppFileSystemRule, Win32LobAppPowerShellScriptRule, Win32LobAppProductCodeRule, Win32LobAppRegistryRule.
     * @param array<Win32LobAppRule>|null $value Value to set for the rules property.
    */
    public function setRules(?array $value): void {
        $this->rules = $value;
    }

    /**
     * Sets the setupFilePath property value. Indicates the relative path of the setup file in the encrypted Win32LobApp package. Example: Intel-SA-00075 Detection and Mitigation Tool.msi.
     * @param string|null $value Value to set for the setupFilePath property.
    */
    public function setSetupFilePath(?string $value): void {
        $this->setupFilePath = $value;
    }

    /**
     * Sets the uninstallCommandLine property value. Indicates the command line to uninstall this app. Used to uninstall the app. Example: msiexec /x '{85F4CBCB-9BBC-4B50-A7D8-E1106771498D}' /qn.
     * @param string|null $value Value to set for the uninstallCommandLine property.
    */
    public function setUninstallCommandLine(?string $value): void {
        $this->uninstallCommandLine = $value;
    }

}
