<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProfileSource extends Entity implements Parsable 
{
    /**
     * @var string|null $displayName Name of the profile source intended to inform users about the profile source name.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $kind Type of the profile source.
    */
    private ?string $kind = null;
    
    /**
     * @var array<ProfileSourceLocalization>|null $localizations Alternative localized labels specified by an administrator.
    */
    private ?array $localizations = null;
    
    /**
     * @var string|null $sourceId Profile source identifier used as an alternate key.
    */
    private ?string $sourceId = null;
    
    /**
     * @var string|null $webUrl Web URL of the profile source that directs users to the page view of the profile data.
    */
    private ?string $webUrl = null;
    
    /**
     * Instantiates a new ProfileSource and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProfileSource
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProfileSource {
        return new ProfileSource();
    }

    /**
     * Gets the displayName property value. Name of the profile source intended to inform users about the profile source name.
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
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'kind' => fn(ParseNode $n) => $o->setKind($n->getStringValue()),
            'localizations' => fn(ParseNode $n) => $o->setLocalizations($n->getCollectionOfObjectValues([ProfileSourceLocalization::class, 'createFromDiscriminatorValue'])),
            'sourceId' => fn(ParseNode $n) => $o->setSourceId($n->getStringValue()),
            'webUrl' => fn(ParseNode $n) => $o->setWebUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the kind property value. Type of the profile source.
     * @return string|null
    */
    public function getKind(): ?string {
        return $this->kind;
    }

    /**
     * Gets the localizations property value. Alternative localized labels specified by an administrator.
     * @return array<ProfileSourceLocalization>|null
    */
    public function getLocalizations(): ?array {
        return $this->localizations;
    }

    /**
     * Gets the sourceId property value. Profile source identifier used as an alternate key.
     * @return string|null
    */
    public function getSourceId(): ?string {
        return $this->sourceId;
    }

    /**
     * Gets the webUrl property value. Web URL of the profile source that directs users to the page view of the profile data.
     * @return string|null
    */
    public function getWebUrl(): ?string {
        return $this->webUrl;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('kind', $this->getKind());
        $writer->writeCollectionOfObjectValues('localizations', $this->getLocalizations());
        $writer->writeStringValue('sourceId', $this->getSourceId());
        $writer->writeStringValue('webUrl', $this->getWebUrl());
    }

    /**
     * Sets the displayName property value. Name of the profile source intended to inform users about the profile source name.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the kind property value. Type of the profile source.
     * @param string|null $value Value to set for the kind property.
    */
    public function setKind(?string $value): void {
        $this->kind = $value;
    }

    /**
     * Sets the localizations property value. Alternative localized labels specified by an administrator.
     * @param array<ProfileSourceLocalization>|null $value Value to set for the localizations property.
    */
    public function setLocalizations(?array $value): void {
        $this->localizations = $value;
    }

    /**
     * Sets the sourceId property value. Profile source identifier used as an alternate key.
     * @param string|null $value Value to set for the sourceId property.
    */
    public function setSourceId(?string $value): void {
        $this->sourceId = $value;
    }

    /**
     * Sets the webUrl property value. Web URL of the profile source that directs users to the page view of the profile data.
     * @param string|null $value Value to set for the webUrl property.
    */
    public function setWebUrl(?string $value): void {
        $this->webUrl = $value;
    }

}
