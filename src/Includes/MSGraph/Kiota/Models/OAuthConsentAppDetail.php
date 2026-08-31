<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OAuthConsentAppDetail implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var OAuthAppScope|null $appScope App scope. The possible values are: unknown, readCalendar, readContact, readMail, readAllChat, readAllFile, readAndWriteMail, sendMail, unknownFutureValue.
    */
    private ?OAuthAppScope $appScope = null;
    
    /**
     * @var string|null $displayLogo App display logo.
    */
    private ?string $displayLogo = null;
    
    /**
     * @var string|null $displayName App name.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new OAuthConsentAppDetail and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OAuthConsentAppDetail
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OAuthConsentAppDetail {
        return new OAuthConsentAppDetail();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the appScope property value. App scope. The possible values are: unknown, readCalendar, readContact, readMail, readAllChat, readAllFile, readAndWriteMail, sendMail, unknownFutureValue.
     * @return OAuthAppScope|null
    */
    public function getAppScope(): ?OAuthAppScope {
        return $this->appScope;
    }

    /**
     * Gets the displayLogo property value. App display logo.
     * @return string|null
    */
    public function getDisplayLogo(): ?string {
        return $this->displayLogo;
    }

    /**
     * Gets the displayName property value. App name.
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
        return  [
            'appScope' => fn(ParseNode $n) => $o->setAppScope($n->getEnumValue(OAuthAppScope::class)),
            'displayLogo' => fn(ParseNode $n) => $o->setDisplayLogo($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
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
        $writer->writeEnumValue('appScope', $this->getAppScope());
        $writer->writeStringValue('displayLogo', $this->getDisplayLogo());
        $writer->writeStringValue('displayName', $this->getDisplayName());
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
     * Sets the appScope property value. App scope. The possible values are: unknown, readCalendar, readContact, readMail, readAllChat, readAllFile, readAndWriteMail, sendMail, unknownFutureValue.
     * @param OAuthAppScope|null $value Value to set for the appScope property.
    */
    public function setAppScope(?OAuthAppScope $value): void {
        $this->appScope = $value;
    }

    /**
     * Sets the displayLogo property value. App display logo.
     * @param string|null $value Value to set for the displayLogo property.
    */
    public function setDisplayLogo(?string $value): void {
        $this->displayLogo = $value;
    }

    /**
     * Sets the displayName property value. App name.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
