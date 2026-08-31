<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Room extends Place implements Parsable 
{
    /**
     * @var string|null $audioDeviceName Specifies the name of the audio device in the room.
    */
    private ?string $audioDeviceName = null;
    
    /**
     * @var BookingType|null $bookingType Type of room. Possible values are: unknown, standard, reserved.
    */
    private ?BookingType $bookingType = null;
    
    /**
     * @var string|null $building Specifies the building name or building number that the room is in.
    */
    private ?string $building = null;
    
    /**
     * @var int|null $capacity Specifies the capacity of the room.
    */
    private ?int $capacity = null;
    
    /**
     * @var string|null $displayDeviceName Specifies the name of the display device in the room.
    */
    private ?string $displayDeviceName = null;
    
    /**
     * @var string|null $emailAddress Email address of the room.
    */
    private ?string $emailAddress = null;
    
    /**
     * @var string|null $floorLabel Specifies a descriptive label for the floor, for example, P.
    */
    private ?string $floorLabel = null;
    
    /**
     * @var int|null $floorNumber Specifies the floor number that the room is on.
    */
    private ?int $floorNumber = null;
    
    /**
     * @var string|null $nickname Specifies a nickname for the room, for example, 'conf room'.
    */
    private ?string $nickname = null;
    
    /**
     * @var PlaceFeatureEnablement|null $teamsEnabledState The teamsEnabledState property
    */
    private ?PlaceFeatureEnablement $teamsEnabledState = null;
    
    /**
     * @var string|null $videoDeviceName Specifies the name of the video device in the room.
    */
    private ?string $videoDeviceName = null;
    
    /**
     * Instantiates a new Room and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.room');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Room
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Room {
        return new Room();
    }

    /**
     * Gets the audioDeviceName property value. Specifies the name of the audio device in the room.
     * @return string|null
    */
    public function getAudioDeviceName(): ?string {
        return $this->audioDeviceName;
    }

    /**
     * Gets the bookingType property value. Type of room. Possible values are: unknown, standard, reserved.
     * @return BookingType|null
    */
    public function getBookingType(): ?BookingType {
        return $this->bookingType;
    }

    /**
     * Gets the building property value. Specifies the building name or building number that the room is in.
     * @return string|null
    */
    public function getBuilding(): ?string {
        return $this->building;
    }

    /**
     * Gets the capacity property value. Specifies the capacity of the room.
     * @return int|null
    */
    public function getCapacity(): ?int {
        return $this->capacity;
    }

    /**
     * Gets the displayDeviceName property value. Specifies the name of the display device in the room.
     * @return string|null
    */
    public function getDisplayDeviceName(): ?string {
        return $this->displayDeviceName;
    }

    /**
     * Gets the emailAddress property value. Email address of the room.
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
            'audioDeviceName' => fn(ParseNode $n) => $o->setAudioDeviceName($n->getStringValue()),
            'bookingType' => fn(ParseNode $n) => $o->setBookingType($n->getEnumValue(BookingType::class)),
            'building' => fn(ParseNode $n) => $o->setBuilding($n->getStringValue()),
            'capacity' => fn(ParseNode $n) => $o->setCapacity($n->getIntegerValue()),
            'displayDeviceName' => fn(ParseNode $n) => $o->setDisplayDeviceName($n->getStringValue()),
            'emailAddress' => fn(ParseNode $n) => $o->setEmailAddress($n->getStringValue()),
            'floorLabel' => fn(ParseNode $n) => $o->setFloorLabel($n->getStringValue()),
            'floorNumber' => fn(ParseNode $n) => $o->setFloorNumber($n->getIntegerValue()),
            'nickname' => fn(ParseNode $n) => $o->setNickname($n->getStringValue()),
            'teamsEnabledState' => fn(ParseNode $n) => $o->setTeamsEnabledState($n->getEnumValue(PlaceFeatureEnablement::class)),
            'videoDeviceName' => fn(ParseNode $n) => $o->setVideoDeviceName($n->getStringValue()),
        ]);
    }

    /**
     * Gets the floorLabel property value. Specifies a descriptive label for the floor, for example, P.
     * @return string|null
    */
    public function getFloorLabel(): ?string {
        return $this->floorLabel;
    }

    /**
     * Gets the floorNumber property value. Specifies the floor number that the room is on.
     * @return int|null
    */
    public function getFloorNumber(): ?int {
        return $this->floorNumber;
    }

    /**
     * Gets the nickname property value. Specifies a nickname for the room, for example, 'conf room'.
     * @return string|null
    */
    public function getNickname(): ?string {
        return $this->nickname;
    }

    /**
     * Gets the teamsEnabledState property value. The teamsEnabledState property
     * @return PlaceFeatureEnablement|null
    */
    public function getTeamsEnabledState(): ?PlaceFeatureEnablement {
        return $this->teamsEnabledState;
    }

    /**
     * Gets the videoDeviceName property value. Specifies the name of the video device in the room.
     * @return string|null
    */
    public function getVideoDeviceName(): ?string {
        return $this->videoDeviceName;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('audioDeviceName', $this->getAudioDeviceName());
        $writer->writeEnumValue('bookingType', $this->getBookingType());
        $writer->writeStringValue('building', $this->getBuilding());
        $writer->writeIntegerValue('capacity', $this->getCapacity());
        $writer->writeStringValue('displayDeviceName', $this->getDisplayDeviceName());
        $writer->writeStringValue('emailAddress', $this->getEmailAddress());
        $writer->writeStringValue('floorLabel', $this->getFloorLabel());
        $writer->writeIntegerValue('floorNumber', $this->getFloorNumber());
        $writer->writeStringValue('nickname', $this->getNickname());
        $writer->writeEnumValue('teamsEnabledState', $this->getTeamsEnabledState());
        $writer->writeStringValue('videoDeviceName', $this->getVideoDeviceName());
    }

    /**
     * Sets the audioDeviceName property value. Specifies the name of the audio device in the room.
     * @param string|null $value Value to set for the audioDeviceName property.
    */
    public function setAudioDeviceName(?string $value): void {
        $this->audioDeviceName = $value;
    }

    /**
     * Sets the bookingType property value. Type of room. Possible values are: unknown, standard, reserved.
     * @param BookingType|null $value Value to set for the bookingType property.
    */
    public function setBookingType(?BookingType $value): void {
        $this->bookingType = $value;
    }

    /**
     * Sets the building property value. Specifies the building name or building number that the room is in.
     * @param string|null $value Value to set for the building property.
    */
    public function setBuilding(?string $value): void {
        $this->building = $value;
    }

    /**
     * Sets the capacity property value. Specifies the capacity of the room.
     * @param int|null $value Value to set for the capacity property.
    */
    public function setCapacity(?int $value): void {
        $this->capacity = $value;
    }

    /**
     * Sets the displayDeviceName property value. Specifies the name of the display device in the room.
     * @param string|null $value Value to set for the displayDeviceName property.
    */
    public function setDisplayDeviceName(?string $value): void {
        $this->displayDeviceName = $value;
    }

    /**
     * Sets the emailAddress property value. Email address of the room.
     * @param string|null $value Value to set for the emailAddress property.
    */
    public function setEmailAddress(?string $value): void {
        $this->emailAddress = $value;
    }

    /**
     * Sets the floorLabel property value. Specifies a descriptive label for the floor, for example, P.
     * @param string|null $value Value to set for the floorLabel property.
    */
    public function setFloorLabel(?string $value): void {
        $this->floorLabel = $value;
    }

    /**
     * Sets the floorNumber property value. Specifies the floor number that the room is on.
     * @param int|null $value Value to set for the floorNumber property.
    */
    public function setFloorNumber(?int $value): void {
        $this->floorNumber = $value;
    }

    /**
     * Sets the nickname property value. Specifies a nickname for the room, for example, 'conf room'.
     * @param string|null $value Value to set for the nickname property.
    */
    public function setNickname(?string $value): void {
        $this->nickname = $value;
    }

    /**
     * Sets the teamsEnabledState property value. The teamsEnabledState property
     * @param PlaceFeatureEnablement|null $value Value to set for the teamsEnabledState property.
    */
    public function setTeamsEnabledState(?PlaceFeatureEnablement $value): void {
        $this->teamsEnabledState = $value;
    }

    /**
     * Sets the videoDeviceName property value. Specifies the name of the video device in the room.
     * @param string|null $value Value to set for the videoDeviceName property.
    */
    public function setVideoDeviceName(?string $value): void {
        $this->videoDeviceName = $value;
    }

}
