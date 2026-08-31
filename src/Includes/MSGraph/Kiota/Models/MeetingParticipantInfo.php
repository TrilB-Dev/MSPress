<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MeetingParticipantInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var IdentitySet|null $identity Identity information of the participant.
    */
    private ?IdentitySet $identity = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var OnlineMeetingRole|null $role Specifies the participant's role in the meeting.
    */
    private ?OnlineMeetingRole $role = null;
    
    /**
     * @var string|null $upn User principal name of the participant.
    */
    private ?string $upn = null;
    
    /**
     * Instantiates a new MeetingParticipantInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MeetingParticipantInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MeetingParticipantInfo {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.virtualEventPresenterInfo': return new VirtualEventPresenterInfo();
            }
        }
        return new MeetingParticipantInfo();
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
            'identity' => fn(ParseNode $n) => $o->setIdentity($n->getObjectValue([IdentitySet::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'role' => fn(ParseNode $n) => $o->setRole($n->getEnumValue(OnlineMeetingRole::class)),
            'upn' => fn(ParseNode $n) => $o->setUpn($n->getStringValue()),
        ];
    }

    /**
     * Gets the identity property value. Identity information of the participant.
     * @return IdentitySet|null
    */
    public function getIdentity(): ?IdentitySet {
        return $this->identity;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the role property value. Specifies the participant's role in the meeting.
     * @return OnlineMeetingRole|null
    */
    public function getRole(): ?OnlineMeetingRole {
        return $this->role;
    }

    /**
     * Gets the upn property value. User principal name of the participant.
     * @return string|null
    */
    public function getUpn(): ?string {
        return $this->upn;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('identity', $this->getIdentity());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('role', $this->getRole());
        $writer->writeStringValue('upn', $this->getUpn());
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
     * Sets the identity property value. Identity information of the participant.
     * @param IdentitySet|null $value Value to set for the identity property.
    */
    public function setIdentity(?IdentitySet $value): void {
        $this->identity = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the role property value. Specifies the participant's role in the meeting.
     * @param OnlineMeetingRole|null $value Value to set for the role property.
    */
    public function setRole(?OnlineMeetingRole $value): void {
        $this->role = $value;
    }

    /**
     * Sets the upn property value. User principal name of the participant.
     * @param string|null $value Value to set for the upn property.
    */
    public function setUpn(?string $value): void {
        $this->upn = $value;
    }

}
