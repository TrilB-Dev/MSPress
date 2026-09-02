<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Contains properties of an included .app in a MacOS app.
*/
class MacOSIncludedApp implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $bundleId The bundleId of the app. This maps to the CFBundleIdentifier in the app's bundle configuration.
    */
    private ?string $bundleId = null;
    
    /**
     * @var string|null $bundleVersion The version of the app. This maps to the CFBundleShortVersion in the app's bundle configuration.
    */
    private ?string $bundleVersion = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new MacOSIncludedApp and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MacOSIncludedApp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MacOSIncludedApp {
        return new MacOSIncludedApp();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bundleId property value. The bundleId of the app. This maps to the CFBundleIdentifier in the app's bundle configuration.
     * @return string|null
    */
    public function getBundleId(): ?string {
        return $this->bundleId;
    }

    /**
     * Gets the bundleVersion property value. The version of the app. This maps to the CFBundleShortVersion in the app's bundle configuration.
     * @return string|null
    */
    public function getBundleVersion(): ?string {
        return $this->bundleVersion;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'bundleId' => fn(ParseNode $n) => $o->setBundleId($n->getStringValue()),
            'bundleVersion' => fn(ParseNode $n) => $o->setBundleVersion($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('bundleId', $this->getBundleId());
        $writer->writeStringValue('bundleVersion', $this->getBundleVersion());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the bundleId property value. The bundleId of the app. This maps to the CFBundleIdentifier in the app's bundle configuration.
     * @param string|null $value Value to set for the bundleId property.
    */
    public function setBundleId(?string $value): void {
        $this->bundleId = $value;
    }

    /**
     * Sets the bundleVersion property value. The version of the app. This maps to the CFBundleShortVersion in the app's bundle configuration.
     * @param string|null $value Value to set for the bundleVersion property.
    */
    public function setBundleVersion(?string $value): void {
        $this->bundleVersion = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
