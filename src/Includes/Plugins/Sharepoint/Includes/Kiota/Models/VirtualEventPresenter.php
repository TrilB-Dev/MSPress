<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VirtualEventPresenter extends Entity implements Parsable 
{
    /**
     * @var string|null $email Email address of the presenter.
    */
    private ?string $email = null;
    
    /**
     * @var Identity|null $identity Identity information of the presenter. The supported identities are: communicationsGuestIdentity and communicationsUserIdentity.
    */
    private ?Identity $identity = null;
    
    /**
     * @var VirtualEventPresenterDetails|null $presenterDetails Other details about the presenter. This property returns null when the virtual event type is virtualEventTownhall.
    */
    private ?VirtualEventPresenterDetails $presenterDetails = null;
    
    /**
     * Instantiates a new VirtualEventPresenter and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEventPresenter
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEventPresenter {
        return new VirtualEventPresenter();
    }

    /**
     * Gets the email property value. Email address of the presenter.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'identity' => fn(ParseNode $n) => $o->setIdentity($n->getObjectValue([Identity::class, 'createFromDiscriminatorValue'])),
            'presenterDetails' => fn(ParseNode $n) => $o->setPresenterDetails($n->getObjectValue([VirtualEventPresenterDetails::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the identity property value. Identity information of the presenter. The supported identities are: communicationsGuestIdentity and communicationsUserIdentity.
     * @return Identity|null
    */
    public function getIdentity(): ?Identity {
        return $this->identity;
    }

    /**
     * Gets the presenterDetails property value. Other details about the presenter. This property returns null when the virtual event type is virtualEventTownhall.
     * @return VirtualEventPresenterDetails|null
    */
    public function getPresenterDetails(): ?VirtualEventPresenterDetails {
        return $this->presenterDetails;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeObjectValue('identity', $this->getIdentity());
        $writer->writeObjectValue('presenterDetails', $this->getPresenterDetails());
    }

    /**
     * Sets the email property value. Email address of the presenter.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the identity property value. Identity information of the presenter. The supported identities are: communicationsGuestIdentity and communicationsUserIdentity.
     * @param Identity|null $value Value to set for the identity property.
    */
    public function setIdentity(?Identity $value): void {
        $this->identity = $value;
    }

    /**
     * Sets the presenterDetails property value. Other details about the presenter. This property returns null when the virtual event type is virtualEventTownhall.
     * @param VirtualEventPresenterDetails|null $value Value to set for the presenterDetails property.
    */
    public function setPresenterDetails(?VirtualEventPresenterDetails $value): void {
        $this->presenterDetails = $value;
    }

}
