<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class NotificationRecipients implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<EmailIdentity>|null $customRecipients A list of users or groups that receive notifications. Only specify this property when role is set to custom.
    */
    private ?array $customRecipients = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var NotificationRecipientsType|null $role The role property
    */
    private ?NotificationRecipientsType $role = null;
    
    /**
     * Instantiates a new NotificationRecipients and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return NotificationRecipients
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): NotificationRecipients {
        return new NotificationRecipients();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the customRecipients property value. A list of users or groups that receive notifications. Only specify this property when role is set to custom.
     * @return array<EmailIdentity>|null
    */
    public function getCustomRecipients(): ?array {
        return $this->customRecipients;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'customRecipients' => fn(ParseNode $n) => $o->setCustomRecipients($n->getCollectionOfObjectValues([EmailIdentity::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'role' => fn(ParseNode $n) => $o->setRole($n->getEnumValue(NotificationRecipientsType::class)),
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
     * Gets the role property value. The role property
     * @return NotificationRecipientsType|null
    */
    public function getRole(): ?NotificationRecipientsType {
        return $this->role;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('customRecipients', $this->getCustomRecipients());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('role', $this->getRole());
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
     * Sets the customRecipients property value. A list of users or groups that receive notifications. Only specify this property when role is set to custom.
     * @param array<EmailIdentity>|null $value Value to set for the customRecipients property.
    */
    public function setCustomRecipients(?array $value): void {
        $this->customRecipients = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the role property value. The role property
     * @param NotificationRecipientsType|null $value Value to set for the role property.
    */
    public function setRole(?NotificationRecipientsType $value): void {
        $this->role = $value;
    }

}
