<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Psr\Http\Message\StreamInterface;

class VirtualEventPresenterDetails implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ItemBody|null $bio Bio of the presenter.
    */
    private ?ItemBody $bio = null;
    
    /**
     * @var string|null $company The presenter's company name.
    */
    private ?string $company = null;
    
    /**
     * @var string|null $jobTitle The presenter's job title.
    */
    private ?string $jobTitle = null;
    
    /**
     * @var string|null $linkedInProfileWebUrl The presenter's LinkedIn profile URL.
    */
    private ?string $linkedInProfileWebUrl = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $personalSiteWebUrl The presenter's personal website URL.
    */
    private ?string $personalSiteWebUrl = null;
    
    /**
     * @var StreamInterface|null $photo The content stream of the presenter's photo.
    */
    private ?StreamInterface $photo = null;
    
    /**
     * @var string|null $twitterProfileWebUrl The presenter's Twitter profile URL.
    */
    private ?string $twitterProfileWebUrl = null;
    
    /**
     * Instantiates a new VirtualEventPresenterDetails and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VirtualEventPresenterDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VirtualEventPresenterDetails {
        return new VirtualEventPresenterDetails();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bio property value. Bio of the presenter.
     * @return ItemBody|null
    */
    public function getBio(): ?ItemBody {
        return $this->bio;
    }

    /**
     * Gets the company property value. The presenter's company name.
     * @return string|null
    */
    public function getCompany(): ?string {
        return $this->company;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'bio' => fn(ParseNode $n) => $o->setBio($n->getObjectValue([ItemBody::class, 'createFromDiscriminatorValue'])),
            'company' => fn(ParseNode $n) => $o->setCompany($n->getStringValue()),
            'jobTitle' => fn(ParseNode $n) => $o->setJobTitle($n->getStringValue()),
            'linkedInProfileWebUrl' => fn(ParseNode $n) => $o->setLinkedInProfileWebUrl($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'personalSiteWebUrl' => fn(ParseNode $n) => $o->setPersonalSiteWebUrl($n->getStringValue()),
            'photo' => fn(ParseNode $n) => $o->setPhoto($n->getBinaryContent()),
            'twitterProfileWebUrl' => fn(ParseNode $n) => $o->setTwitterProfileWebUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the jobTitle property value. The presenter's job title.
     * @return string|null
    */
    public function getJobTitle(): ?string {
        return $this->jobTitle;
    }

    /**
     * Gets the linkedInProfileWebUrl property value. The presenter's LinkedIn profile URL.
     * @return string|null
    */
    public function getLinkedInProfileWebUrl(): ?string {
        return $this->linkedInProfileWebUrl;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the personalSiteWebUrl property value. The presenter's personal website URL.
     * @return string|null
    */
    public function getPersonalSiteWebUrl(): ?string {
        return $this->personalSiteWebUrl;
    }

    /**
     * Gets the photo property value. The content stream of the presenter's photo.
     * @return StreamInterface|null
    */
    public function getPhoto(): ?StreamInterface {
        return $this->photo;
    }

    /**
     * Gets the twitterProfileWebUrl property value. The presenter's Twitter profile URL.
     * @return string|null
    */
    public function getTwitterProfileWebUrl(): ?string {
        return $this->twitterProfileWebUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('bio', $this->getBio());
        $writer->writeStringValue('company', $this->getCompany());
        $writer->writeStringValue('jobTitle', $this->getJobTitle());
        $writer->writeStringValue('linkedInProfileWebUrl', $this->getLinkedInProfileWebUrl());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('personalSiteWebUrl', $this->getPersonalSiteWebUrl());
        $writer->writeBinaryContent('photo', $this->getPhoto());
        $writer->writeStringValue('twitterProfileWebUrl', $this->getTwitterProfileWebUrl());
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
     * Sets the bio property value. Bio of the presenter.
     * @param ItemBody|null $value Value to set for the bio property.
    */
    public function setBio(?ItemBody $value): void {
        $this->bio = $value;
    }

    /**
     * Sets the company property value. The presenter's company name.
     * @param string|null $value Value to set for the company property.
    */
    public function setCompany(?string $value): void {
        $this->company = $value;
    }

    /**
     * Sets the jobTitle property value. The presenter's job title.
     * @param string|null $value Value to set for the jobTitle property.
    */
    public function setJobTitle(?string $value): void {
        $this->jobTitle = $value;
    }

    /**
     * Sets the linkedInProfileWebUrl property value. The presenter's LinkedIn profile URL.
     * @param string|null $value Value to set for the linkedInProfileWebUrl property.
    */
    public function setLinkedInProfileWebUrl(?string $value): void {
        $this->linkedInProfileWebUrl = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the personalSiteWebUrl property value. The presenter's personal website URL.
     * @param string|null $value Value to set for the personalSiteWebUrl property.
    */
    public function setPersonalSiteWebUrl(?string $value): void {
        $this->personalSiteWebUrl = $value;
    }

    /**
     * Sets the photo property value. The content stream of the presenter's photo.
     * @param StreamInterface|null $value Value to set for the photo property.
    */
    public function setPhoto(?StreamInterface $value): void {
        $this->photo = $value;
    }

    /**
     * Sets the twitterProfileWebUrl property value. The presenter's Twitter profile URL.
     * @param string|null $value Value to set for the twitterProfileWebUrl property.
    */
    public function setTwitterProfileWebUrl(?string $value): void {
        $this->twitterProfileWebUrl = $value;
    }

}
