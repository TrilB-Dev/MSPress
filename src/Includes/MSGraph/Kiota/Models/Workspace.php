<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Workspace extends Place implements Parsable 
{
    /**
     * @var int|null $capacity The maximum number of individual desks within a workspace.
    */
    private ?int $capacity = null;
    
    /**
     * @var string|null $displayDeviceName The name of the display device (for example, monitor or projector) that is available in the workspace.
    */
    private ?string $displayDeviceName = null;
    
    /**
     * @var string|null $emailAddress The email address that is associated with the workspace. This email address is used for booking.
    */
    private ?string $emailAddress = null;
    
    /**
     * @var PlaceMode|null $mode The mode for a workspace. The supported modes are:reservablePlaceMode - Workspaces that can be booked in advance using desk pool reservation tools.dropInPlaceMode - First come, first served desks. When you plug into a peripheral on one of these desks in the workspace, the desk is booked for you, assuming that the peripheral has been associated with the desk in the Microsoft Teams Rooms pro management portal.unavailablePlaceMode - Workspaces that are taken down for maintenance or marked as not reservable.
    */
    private ?PlaceMode $mode = null;
    
    /**
     * @var string|null $nickname A short, friendly name for the workspace, often used for easier identification or display in the UI.
    */
    private ?string $nickname = null;
    
    /**
     * Instantiates a new Workspace and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.workspace');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Workspace
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Workspace {
        return new Workspace();
    }

    /**
     * Gets the capacity property value. The maximum number of individual desks within a workspace.
     * @return int|null
    */
    public function getCapacity(): ?int {
        return $this->capacity;
    }

    /**
     * Gets the displayDeviceName property value. The name of the display device (for example, monitor or projector) that is available in the workspace.
     * @return string|null
    */
    public function getDisplayDeviceName(): ?string {
        return $this->displayDeviceName;
    }

    /**
     * Gets the emailAddress property value. The email address that is associated with the workspace. This email address is used for booking.
     * @return string|null
    */
    public function getEmailAddress(): ?string {
        return $this->emailAddress;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'capacity' => fn(ParseNode $n) => $o->setCapacity($n->getIntegerValue()),
            'displayDeviceName' => fn(ParseNode $n) => $o->setDisplayDeviceName($n->getStringValue()),
            'emailAddress' => fn(ParseNode $n) => $o->setEmailAddress($n->getStringValue()),
            'mode' => fn(ParseNode $n) => $o->setMode($n->getObjectValue([PlaceMode::class, 'createFromDiscriminatorValue'])),
            'nickname' => fn(ParseNode $n) => $o->setNickname($n->getStringValue()),
        ]);
    }

    /**
     * Gets the mode property value. The mode for a workspace. The supported modes are:reservablePlaceMode - Workspaces that can be booked in advance using desk pool reservation tools.dropInPlaceMode - First come, first served desks. When you plug into a peripheral on one of these desks in the workspace, the desk is booked for you, assuming that the peripheral has been associated with the desk in the Microsoft Teams Rooms pro management portal.unavailablePlaceMode - Workspaces that are taken down for maintenance or marked as not reservable.
     * @return PlaceMode|null
    */
    public function getMode(): ?PlaceMode {
        return $this->mode;
    }

    /**
     * Gets the nickname property value. A short, friendly name for the workspace, often used for easier identification or display in the UI.
     * @return string|null
    */
    public function getNickname(): ?string {
        return $this->nickname;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('capacity', $this->getCapacity());
        $writer->writeStringValue('displayDeviceName', $this->getDisplayDeviceName());
        $writer->writeStringValue('emailAddress', $this->getEmailAddress());
        $writer->writeObjectValue('mode', $this->getMode());
        $writer->writeStringValue('nickname', $this->getNickname());
    }

    /**
     * Sets the capacity property value. The maximum number of individual desks within a workspace.
     * @param int|null $value Value to set for the capacity property.
    */
    public function setCapacity(?int $value): void {
        $this->capacity = $value;
    }

    /**
     * Sets the displayDeviceName property value. The name of the display device (for example, monitor or projector) that is available in the workspace.
     * @param string|null $value Value to set for the displayDeviceName property.
    */
    public function setDisplayDeviceName(?string $value): void {
        $this->displayDeviceName = $value;
    }

    /**
     * Sets the emailAddress property value. The email address that is associated with the workspace. This email address is used for booking.
     * @param string|null $value Value to set for the emailAddress property.
    */
    public function setEmailAddress(?string $value): void {
        $this->emailAddress = $value;
    }

    /**
     * Sets the mode property value. The mode for a workspace. The supported modes are:reservablePlaceMode - Workspaces that can be booked in advance using desk pool reservation tools.dropInPlaceMode - First come, first served desks. When you plug into a peripheral on one of these desks in the workspace, the desk is booked for you, assuming that the peripheral has been associated with the desk in the Microsoft Teams Rooms pro management portal.unavailablePlaceMode - Workspaces that are taken down for maintenance or marked as not reservable.
     * @param PlaceMode|null $value Value to set for the mode property.
    */
    public function setMode(?PlaceMode $value): void {
        $this->mode = $value;
    }

    /**
     * Sets the nickname property value. A short, friendly name for the workspace, often used for easier identification or display in the UI.
     * @param string|null $value Value to set for the nickname property.
    */
    public function setNickname(?string $value): void {
        $this->nickname = $value;
    }

}
