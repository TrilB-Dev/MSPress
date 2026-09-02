<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class LandingPage extends Entity implements Parsable 
{
    /**
     * @var EmailIdentity|null $createdBy Identity of the user who created the landing page.
    */
    private ?EmailIdentity $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime Date and time when the landing page was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description Description of the landing page as defined by the user.
    */
    private ?string $description = null;
    
    /**
     * @var array<LandingPageDetail>|null $details The detail information for a landing page associated with a simulation during its creation.
    */
    private ?array $details = null;
    
    /**
     * @var string|null $displayName The display name of the landing page.
    */
    private ?string $displayName = null;
    
    /**
     * @var EmailIdentity|null $lastModifiedBy Email identity of the user who last modified the landing page.
    */
    private ?EmailIdentity $lastModifiedBy = null;
    
    /**
     * @var DateTime|null $lastModifiedDateTime Date and time when the landing page was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $lastModifiedDateTime = null;
    
    /**
     * @var string|null $locale Content locale.
    */
    private ?string $locale = null;
    
    /**
     * @var SimulationContentSource|null $source The source of the content. The possible values are: unknown, global, tenant, unknownFutureValue.
    */
    private ?SimulationContentSource $source = null;
    
    /**
     * @var SimulationContentStatus|null $status The status of the simulation. The possible values are: unknown, draft, ready, archive, delete, unknownFutureValue.
    */
    private ?SimulationContentStatus $status = null;
    
    /**
     * @var array<string>|null $supportedLocales Supported locales.
    */
    private ?array $supportedLocales = null;
    
    /**
     * Instantiates a new LandingPage and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LandingPage
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LandingPage {
        return new LandingPage();
    }

    /**
     * Gets the createdBy property value. Identity of the user who created the landing page.
     * @return EmailIdentity|null
    */
    public function getCreatedBy(): ?EmailIdentity {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. Date and time when the landing page was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. Description of the landing page as defined by the user.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the details property value. The detail information for a landing page associated with a simulation during its creation.
     * @return array<LandingPageDetail>|null
    */
    public function getDetails(): ?array {
        return $this->details;
    }

    /**
     * Gets the displayName property value. The display name of the landing page.
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
        return array_merge(parent::getFieldDeserializers(), [
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getObjectValue([EmailIdentity::class, 'createFromDiscriminatorValue'])),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'details' => fn(ParseNode $n) => $o->setDetails($n->getCollectionOfObjectValues([LandingPageDetail::class, 'createFromDiscriminatorValue'])),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'lastModifiedBy' => fn(ParseNode $n) => $o->setLastModifiedBy($n->getObjectValue([EmailIdentity::class, 'createFromDiscriminatorValue'])),
            'lastModifiedDateTime' => fn(ParseNode $n) => $o->setLastModifiedDateTime($n->getDateTimeValue()),
            'locale' => fn(ParseNode $n) => $o->setLocale($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(SimulationContentSource::class)),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(SimulationContentStatus::class)),
            'supportedLocales' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSupportedLocales($val);
            },
        ]);
    }

    /**
     * Gets the lastModifiedBy property value. Email identity of the user who last modified the landing page.
     * @return EmailIdentity|null
    */
    public function getLastModifiedBy(): ?EmailIdentity {
        return $this->lastModifiedBy;
    }

    /**
     * Gets the lastModifiedDateTime property value. Date and time when the landing page was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getLastModifiedDateTime(): ?DateTime {
        return $this->lastModifiedDateTime;
    }

    /**
     * Gets the locale property value. Content locale.
     * @return string|null
    */
    public function getLocale(): ?string {
        return $this->locale;
    }

    /**
     * Gets the source property value. The source of the content. The possible values are: unknown, global, tenant, unknownFutureValue.
     * @return SimulationContentSource|null
    */
    public function getSource(): ?SimulationContentSource {
        return $this->source;
    }

    /**
     * Gets the status property value. The status of the simulation. The possible values are: unknown, draft, ready, archive, delete, unknownFutureValue.
     * @return SimulationContentStatus|null
    */
    public function getStatus(): ?SimulationContentStatus {
        return $this->status;
    }

    /**
     * Gets the supportedLocales property value. Supported locales.
     * @return array<string>|null
    */
    public function getSupportedLocales(): ?array {
        return $this->supportedLocales;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('createdBy', $this->getCreatedBy());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeCollectionOfObjectValues('details', $this->getDetails());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('lastModifiedBy', $this->getLastModifiedBy());
        $writer->writeDateTimeValue('lastModifiedDateTime', $this->getLastModifiedDateTime());
        $writer->writeStringValue('locale', $this->getLocale());
        $writer->writeEnumValue('source', $this->getSource());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeCollectionOfPrimitiveValues('supportedLocales', $this->getSupportedLocales());
    }

    /**
     * Sets the createdBy property value. Identity of the user who created the landing page.
     * @param EmailIdentity|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?EmailIdentity $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. Date and time when the landing page was created. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. Description of the landing page as defined by the user.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the details property value. The detail information for a landing page associated with a simulation during its creation.
     * @param array<LandingPageDetail>|null $value Value to set for the details property.
    */
    public function setDetails(?array $value): void {
        $this->details = $value;
    }

    /**
     * Sets the displayName property value. The display name of the landing page.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the lastModifiedBy property value. Email identity of the user who last modified the landing page.
     * @param EmailIdentity|null $value Value to set for the lastModifiedBy property.
    */
    public function setLastModifiedBy(?EmailIdentity $value): void {
        $this->lastModifiedBy = $value;
    }

    /**
     * Sets the lastModifiedDateTime property value. Date and time when the landing page was last modified. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the lastModifiedDateTime property.
    */
    public function setLastModifiedDateTime(?DateTime $value): void {
        $this->lastModifiedDateTime = $value;
    }

    /**
     * Sets the locale property value. Content locale.
     * @param string|null $value Value to set for the locale property.
    */
    public function setLocale(?string $value): void {
        $this->locale = $value;
    }

    /**
     * Sets the source property value. The source of the content. The possible values are: unknown, global, tenant, unknownFutureValue.
     * @param SimulationContentSource|null $value Value to set for the source property.
    */
    public function setSource(?SimulationContentSource $value): void {
        $this->source = $value;
    }

    /**
     * Sets the status property value. The status of the simulation. The possible values are: unknown, draft, ready, archive, delete, unknownFutureValue.
     * @param SimulationContentStatus|null $value Value to set for the status property.
    */
    public function setStatus(?SimulationContentStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the supportedLocales property value. Supported locales.
     * @param array<string>|null $value Value to set for the supportedLocales property.
    */
    public function setSupportedLocales(?array $value): void {
        $this->supportedLocales = $value;
    }

}
