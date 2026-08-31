<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OnAttributeCollectionExternalUsersSelfServiceSignUp extends OnAttributeCollectionHandler implements Parsable 
{
    /**
     * @var AuthenticationAttributeCollectionPage|null $attributeCollectionPage Required. The configuration for how attributes are displayed in the sign-up experience defined by a user flow, like the externalUsersSelfServiceSignupEventsFlow, specifically on the attribute collection page.
    */
    private ?AuthenticationAttributeCollectionPage $attributeCollectionPage = null;
    
    /**
     * @var array<IdentityUserFlowAttribute>|null $attributes The attributes property
    */
    private ?array $attributes = null;
    
    /**
     * Instantiates a new OnAttributeCollectionExternalUsersSelfServiceSignUp and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.onAttributeCollectionExternalUsersSelfServiceSignUp');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OnAttributeCollectionExternalUsersSelfServiceSignUp
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OnAttributeCollectionExternalUsersSelfServiceSignUp {
        return new OnAttributeCollectionExternalUsersSelfServiceSignUp();
    }

    /**
     * Gets the attributeCollectionPage property value. Required. The configuration for how attributes are displayed in the sign-up experience defined by a user flow, like the externalUsersSelfServiceSignupEventsFlow, specifically on the attribute collection page.
     * @return AuthenticationAttributeCollectionPage|null
    */
    public function getAttributeCollectionPage(): ?AuthenticationAttributeCollectionPage {
        return $this->attributeCollectionPage;
    }

    /**
     * Gets the attributes property value. The attributes property
     * @return array<IdentityUserFlowAttribute>|null
    */
    public function getAttributes(): ?array {
        return $this->attributes;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'attributeCollectionPage' => fn(ParseNode $n) => $o->setAttributeCollectionPage($n->getObjectValue([AuthenticationAttributeCollectionPage::class, 'createFromDiscriminatorValue'])),
            'attributes' => fn(ParseNode $n) => $o->setAttributes($n->getCollectionOfObjectValues([IdentityUserFlowAttribute::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('attributeCollectionPage', $this->getAttributeCollectionPage());
        $writer->writeCollectionOfObjectValues('attributes', $this->getAttributes());
    }

    /**
     * Sets the attributeCollectionPage property value. Required. The configuration for how attributes are displayed in the sign-up experience defined by a user flow, like the externalUsersSelfServiceSignupEventsFlow, specifically on the attribute collection page.
     * @param AuthenticationAttributeCollectionPage|null $value Value to set for the attributeCollectionPage property.
    */
    public function setAttributeCollectionPage(?AuthenticationAttributeCollectionPage $value): void {
        $this->attributeCollectionPage = $value;
    }

    /**
     * Sets the attributes property value. The attributes property
     * @param array<IdentityUserFlowAttribute>|null $value Value to set for the attributes property.
    */
    public function setAttributes(?array $value): void {
        $this->attributes = $value;
    }

}
