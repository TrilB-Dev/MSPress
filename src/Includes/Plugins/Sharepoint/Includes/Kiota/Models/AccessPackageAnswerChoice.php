<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageAnswerChoice implements AdditionalDataHolder, Parsable 
{
    /**
     * @var string|null $actualValue The actual value of the selected choice. This is typically a string value which is understandable by applications. Required.
    */
    private ?string $actualValue = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<AccessPackageLocalizedText>|null $localizations The text of the answer choice represented in a format for a specific locale.
    */
    private ?array $localizations = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $text The string to display for this answer; if an Accept-Language header is provided, and there is a matching localization in localizations, this string will be the matching localized string; otherwise, this string remains as the default non-localized string. Required.
    */
    private ?string $text = null;
    
    /**
     * Instantiates a new AccessPackageAnswerChoice and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageAnswerChoice
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageAnswerChoice {
        return new AccessPackageAnswerChoice();
    }

    /**
     * Gets the actualValue property value. The actual value of the selected choice. This is typically a string value which is understandable by applications. Required.
     * @return string|null
    */
    public function getActualValue(): ?string {
        return $this->actualValue;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'actualValue' => fn(ParseNode $n) => $o->setActualValue($n->getStringValue()),
            'localizations' => fn(ParseNode $n) => $o->setLocalizations($n->getCollectionOfObjectValues([AccessPackageLocalizedText::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'text' => fn(ParseNode $n) => $o->setText($n->getStringValue()),
        ];
    }

    /**
     * Gets the localizations property value. The text of the answer choice represented in a format for a specific locale.
     * @return array<AccessPackageLocalizedText>|null
    */
    public function getLocalizations(): ?array {
        return $this->localizations;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the text property value. The string to display for this answer; if an Accept-Language header is provided, and there is a matching localization in localizations, this string will be the matching localized string; otherwise, this string remains as the default non-localized string. Required.
     * @return string|null
    */
    public function getText(): ?string {
        return $this->text;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('actualValue', $this->getActualValue());
        $writer->writeCollectionOfObjectValues('localizations', $this->getLocalizations());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('text', $this->getText());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the actualValue property value. The actual value of the selected choice. This is typically a string value which is understandable by applications. Required.
     * @param string|null $value Value to set for the actualValue property.
    */
    public function setActualValue(?string $value): void {
        $this->actualValue = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the localizations property value. The text of the answer choice represented in a format for a specific locale.
     * @param array<AccessPackageLocalizedText>|null $value Value to set for the localizations property.
    */
    public function setLocalizations(?array $value): void {
        $this->localizations = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the text property value. The string to display for this answer; if an Accept-Language header is provided, and there is a matching localization in localizations, this string will be the matching localized string; otherwise, this string remains as the default non-localized string. Required.
     * @param string|null $value Value to set for the text property.
    */
    public function setText(?string $value): void {
        $this->text = $value;
    }

}
