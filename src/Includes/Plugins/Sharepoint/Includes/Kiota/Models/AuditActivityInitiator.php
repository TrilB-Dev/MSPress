<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AuditActivityInitiator implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var AppIdentity|null $app If the resource initiating the activity is an app, this property indicates all the app related information like appId and name.
    */
    private ?AppIdentity $app = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var UserIdentity|null $user If the resource initiating the activity is a user, this property Indicates all the user related information like user ID and userPrincipalName.
    */
    private ?UserIdentity $user = null;
    
    /**
     * Instantiates a new AuditActivityInitiator and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AuditActivityInitiator
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AuditActivityInitiator {
        return new AuditActivityInitiator();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the app property value. If the resource initiating the activity is an app, this property indicates all the app related information like appId and name.
     * @return AppIdentity|null
    */
    public function getApp(): ?AppIdentity {
        return $this->app;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'app' => fn(ParseNode $n) => $o->setApp($n->getObjectValue([AppIdentity::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'user' => fn(ParseNode $n) => $o->setUser($n->getObjectValue([UserIdentity::class, 'createFromDiscriminatorValue'])),
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
     * Gets the user property value. If the resource initiating the activity is a user, this property Indicates all the user related information like user ID and userPrincipalName.
     * @return UserIdentity|null
    */
    public function getUser(): ?UserIdentity {
        return $this->user;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('app', $this->getApp());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeObjectValue('user', $this->getUser());
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
     * Sets the app property value. If the resource initiating the activity is an app, this property indicates all the app related information like appId and name.
     * @param AppIdentity|null $value Value to set for the app property.
    */
    public function setApp(?AppIdentity $value): void {
        $this->app = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the user property value. If the resource initiating the activity is a user, this property Indicates all the user related information like user ID and userPrincipalName.
     * @param UserIdentity|null $value Value to set for the user property.
    */
    public function setUser(?UserIdentity $value): void {
        $this->user = $value;
    }

}
