<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VirtualEventWebinar extends VirtualEvent implements Parsable 
{
    /**
     * @var MeetingAudience|null $audience To whom the webinar is visible. The possible values are: everyone, organization, and unknownFutureValue.
    */
    private ?MeetingAudience $audience = null;
    
    /**
     * @var array<CommunicationsUserIdentity>|null $coOrganizers Identity information of coorganizers of the webinar.
    */
    private ?array $coOrganizers = null;
    
    /**
     * @var VirtualEventWebinarRegistrationConfiguration|null $registrationConfiguration Registration configuration of the webinar.
    */
    private ?VirtualEventWebinarRegistrationConfiguration $registrationConfiguration = null;
    
    /**
     * @var array<VirtualEventRegistration>|null $registrations Registration records of the webinar.
    */
    private ?array $registrations = null;
    
    /**
     * Instantiates a new VirtualEventWebinar and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.virtualEventWebinar');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEventWebinar
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEventWebinar {
        return new VirtualEventWebinar();
    }

    /**
     * Gets the audience property value. To whom the webinar is visible. The possible values are: everyone, organization, and unknownFutureValue.
     * @return MeetingAudience|null
    */
    public function getAudience(): ?MeetingAudience {
        return $this->audience;
    }

    /**
     * Gets the coOrganizers property value. Identity information of coorganizers of the webinar.
     * @return array<CommunicationsUserIdentity>|null
    */
    public function getCoOrganizers(): ?array {
        return $this->coOrganizers;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'audience' => fn(ParseNode $n) => $o->setAudience($n->getEnumValue(MeetingAudience::class)),
            'coOrganizers' => fn(ParseNode $n) => $o->setCoOrganizers($n->getCollectionOfObjectValues([CommunicationsUserIdentity::class, 'createFromDiscriminatorValue'])),
            'registrationConfiguration' => fn(ParseNode $n) => $o->setRegistrationConfiguration($n->getObjectValue([VirtualEventWebinarRegistrationConfiguration::class, 'createFromDiscriminatorValue'])),
            'registrations' => fn(ParseNode $n) => $o->setRegistrations($n->getCollectionOfObjectValues([VirtualEventRegistration::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the registrationConfiguration property value. Registration configuration of the webinar.
     * @return VirtualEventWebinarRegistrationConfiguration|null
    */
    public function getRegistrationConfiguration(): ?VirtualEventWebinarRegistrationConfiguration {
        return $this->registrationConfiguration;
    }

    /**
     * Gets the registrations property value. Registration records of the webinar.
     * @return array<VirtualEventRegistration>|null
    */
    public function getRegistrations(): ?array {
        return $this->registrations;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('audience', $this->getAudience());
        $writer->writeCollectionOfObjectValues('coOrganizers', $this->getCoOrganizers());
        $writer->writeObjectValue('registrationConfiguration', $this->getRegistrationConfiguration());
        $writer->writeCollectionOfObjectValues('registrations', $this->getRegistrations());
    }

    /**
     * Sets the audience property value. To whom the webinar is visible. The possible values are: everyone, organization, and unknownFutureValue.
     * @param MeetingAudience|null $value Value to set for the audience property.
    */
    public function setAudience(?MeetingAudience $value): void {
        $this->audience = $value;
    }

    /**
     * Sets the coOrganizers property value. Identity information of coorganizers of the webinar.
     * @param array<CommunicationsUserIdentity>|null $value Value to set for the coOrganizers property.
    */
    public function setCoOrganizers(?array $value): void {
        $this->coOrganizers = $value;
    }

    /**
     * Sets the registrationConfiguration property value. Registration configuration of the webinar.
     * @param VirtualEventWebinarRegistrationConfiguration|null $value Value to set for the registrationConfiguration property.
    */
    public function setRegistrationConfiguration(?VirtualEventWebinarRegistrationConfiguration $value): void {
        $this->registrationConfiguration = $value;
    }

    /**
     * Sets the registrations property value. Registration records of the webinar.
     * @param array<VirtualEventRegistration>|null $value Value to set for the registrations property.
    */
    public function setRegistrations(?array $value): void {
        $this->registrations = $value;
    }

}
