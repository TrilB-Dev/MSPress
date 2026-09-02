<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The user experience analytics application performance entity contains application performance by application version details.
*/
class UserExperienceAnalyticsAppHealthAppPerformanceByAppVersionDetails extends Entity implements Parsable 
{
    /**
     * @var int|null $appCrashCount The number of crashes for the app. Valid values -2147483648 to 2147483647
    */
    private ?int $appCrashCount = null;
    
    /**
     * @var string|null $appDisplayName The friendly name of the application.
    */
    private ?string $appDisplayName = null;
    
    /**
     * @var string|null $appName The name of the application.
    */
    private ?string $appName = null;
    
    /**
     * @var string|null $appPublisher The publisher of the application.
    */
    private ?string $appPublisher = null;
    
    /**
     * @var string|null $appVersion The version of the application.
    */
    private ?string $appVersion = null;
    
    /**
     * @var int|null $deviceCountWithCrashes The total number of devices that have reported one or more application crashes for this application and version. Valid values 0 to 2147483647. Supports: $select, $OrderBy. Read-only. Valid values -2147483648 to 2147483647
    */
    private ?int $deviceCountWithCrashes = null;
    
    /**
     * @var bool|null $isLatestUsedVersion When TRUE, indicates the version of application is the latest version for that application that is in use. When FALSE, indicates the version is not the latest version. FALSE by default. Supports: $select, $OrderBy.
    */
    private ?bool $isLatestUsedVersion = null;
    
    /**
     * @var bool|null $isMostUsedVersion When TRUE, indicates the version of application is the most used version for that application. When FALSE, indicates the version is not the most used version. FALSE by default. Supports: $select, $OrderBy. Read-only.
    */
    private ?bool $isMostUsedVersion = null;
    
    /**
     * Instantiates a new UserExperienceAnalyticsAppHealthAppPerformanceByAppVersionDetails and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UserExperienceAnalyticsAppHealthAppPerformanceByAppVersionDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UserExperienceAnalyticsAppHealthAppPerformanceByAppVersionDetails {
        return new UserExperienceAnalyticsAppHealthAppPerformanceByAppVersionDetails();
    }

    /**
     * Gets the appCrashCount property value. The number of crashes for the app. Valid values -2147483648 to 2147483647
     * @return int|null
    */
    public function getAppCrashCount(): ?int {
        return $this->appCrashCount;
    }

    /**
     * Gets the appDisplayName property value. The friendly name of the application.
     * @return string|null
    */
    public function getAppDisplayName(): ?string {
        return $this->appDisplayName;
    }

    /**
     * Gets the appName property value. The name of the application.
     * @return string|null
    */
    public function getAppName(): ?string {
        return $this->appName;
    }

    /**
     * Gets the appPublisher property value. The publisher of the application.
     * @return string|null
    */
    public function getAppPublisher(): ?string {
        return $this->appPublisher;
    }

    /**
     * Gets the appVersion property value. The version of the application.
     * @return string|null
    */
    public function getAppVersion(): ?string {
        return $this->appVersion;
    }

    /**
     * Gets the deviceCountWithCrashes property value. The total number of devices that have reported one or more application crashes for this application and version. Valid values 0 to 2147483647. Supports: $select, $OrderBy. Read-only. Valid values -2147483648 to 2147483647
     * @return int|null
    */
    public function getDeviceCountWithCrashes(): ?int {
        return $this->deviceCountWithCrashes;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'appCrashCount' => fn(ParseNode $n) => $o->setAppCrashCount($n->getIntegerValue()),
            'appDisplayName' => fn(ParseNode $n) => $o->setAppDisplayName($n->getStringValue()),
            'appName' => fn(ParseNode $n) => $o->setAppName($n->getStringValue()),
            'appPublisher' => fn(ParseNode $n) => $o->setAppPublisher($n->getStringValue()),
            'appVersion' => fn(ParseNode $n) => $o->setAppVersion($n->getStringValue()),
            'deviceCountWithCrashes' => fn(ParseNode $n) => $o->setDeviceCountWithCrashes($n->getIntegerValue()),
            'isLatestUsedVersion' => fn(ParseNode $n) => $o->setIsLatestUsedVersion($n->getBooleanValue()),
            'isMostUsedVersion' => fn(ParseNode $n) => $o->setIsMostUsedVersion($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the isLatestUsedVersion property value. When TRUE, indicates the version of application is the latest version for that application that is in use. When FALSE, indicates the version is not the latest version. FALSE by default. Supports: $select, $OrderBy.
     * @return bool|null
    */
    public function getIsLatestUsedVersion(): ?bool {
        return $this->isLatestUsedVersion;
    }

    /**
     * Gets the isMostUsedVersion property value. When TRUE, indicates the version of application is the most used version for that application. When FALSE, indicates the version is not the most used version. FALSE by default. Supports: $select, $OrderBy. Read-only.
     * @return bool|null
    */
    public function getIsMostUsedVersion(): ?bool {
        return $this->isMostUsedVersion;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('appCrashCount', $this->getAppCrashCount());
        $writer->writeStringValue('appDisplayName', $this->getAppDisplayName());
        $writer->writeStringValue('appName', $this->getAppName());
        $writer->writeStringValue('appPublisher', $this->getAppPublisher());
        $writer->writeStringValue('appVersion', $this->getAppVersion());
        $writer->writeIntegerValue('deviceCountWithCrashes', $this->getDeviceCountWithCrashes());
        $writer->writeBooleanValue('isLatestUsedVersion', $this->getIsLatestUsedVersion());
        $writer->writeBooleanValue('isMostUsedVersion', $this->getIsMostUsedVersion());
    }

    /**
     * Sets the appCrashCount property value. The number of crashes for the app. Valid values -2147483648 to 2147483647
     * @param int|null $value Value to set for the appCrashCount property.
    */
    public function setAppCrashCount(?int $value): void {
        $this->appCrashCount = $value;
    }

    /**
     * Sets the appDisplayName property value. The friendly name of the application.
     * @param string|null $value Value to set for the appDisplayName property.
    */
    public function setAppDisplayName(?string $value): void {
        $this->appDisplayName = $value;
    }

    /**
     * Sets the appName property value. The name of the application.
     * @param string|null $value Value to set for the appName property.
    */
    public function setAppName(?string $value): void {
        $this->appName = $value;
    }

    /**
     * Sets the appPublisher property value. The publisher of the application.
     * @param string|null $value Value to set for the appPublisher property.
    */
    public function setAppPublisher(?string $value): void {
        $this->appPublisher = $value;
    }

    /**
     * Sets the appVersion property value. The version of the application.
     * @param string|null $value Value to set for the appVersion property.
    */
    public function setAppVersion(?string $value): void {
        $this->appVersion = $value;
    }

    /**
     * Sets the deviceCountWithCrashes property value. The total number of devices that have reported one or more application crashes for this application and version. Valid values 0 to 2147483647. Supports: $select, $OrderBy. Read-only. Valid values -2147483648 to 2147483647
     * @param int|null $value Value to set for the deviceCountWithCrashes property.
    */
    public function setDeviceCountWithCrashes(?int $value): void {
        $this->deviceCountWithCrashes = $value;
    }

    /**
     * Sets the isLatestUsedVersion property value. When TRUE, indicates the version of application is the latest version for that application that is in use. When FALSE, indicates the version is not the latest version. FALSE by default. Supports: $select, $OrderBy.
     * @param bool|null $value Value to set for the isLatestUsedVersion property.
    */
    public function setIsLatestUsedVersion(?bool $value): void {
        $this->isLatestUsedVersion = $value;
    }

    /**
     * Sets the isMostUsedVersion property value. When TRUE, indicates the version of application is the most used version for that application. When FALSE, indicates the version is not the most used version. FALSE by default. Supports: $select, $OrderBy. Read-only.
     * @param bool|null $value Value to set for the isMostUsedVersion property.
    */
    public function setIsMostUsedVersion(?bool $value): void {
        $this->isMostUsedVersion = $value;
    }

}
