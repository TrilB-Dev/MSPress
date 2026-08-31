<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ActiveDirectoryDomainEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $activeDirectoryDomainName The activeDirectoryDomainName property
    */
    private ?string $activeDirectoryDomainName = null;
    
    /**
     * @var array<ActiveDirectoryDomainEvidence>|null $trustedDomains The trustedDomains property
    */
    private ?array $trustedDomains = null;
    
    /**
     * Instantiates a new ActiveDirectoryDomainEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.activeDirectoryDomainEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ActiveDirectoryDomainEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ActiveDirectoryDomainEvidence {
        return new ActiveDirectoryDomainEvidence();
    }

    /**
     * Gets the activeDirectoryDomainName property value. The activeDirectoryDomainName property
     * @return string|null
    */
    public function getActiveDirectoryDomainName(): ?string {
        return $this->activeDirectoryDomainName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activeDirectoryDomainName' => fn(ParseNode $n) => $o->setActiveDirectoryDomainName($n->getStringValue()),
            'trustedDomains' => fn(ParseNode $n) => $o->setTrustedDomains($n->getCollectionOfObjectValues([ActiveDirectoryDomainEvidence::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the trustedDomains property value. The trustedDomains property
     * @return array<ActiveDirectoryDomainEvidence>|null
    */
    public function getTrustedDomains(): ?array {
        return $this->trustedDomains;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('activeDirectoryDomainName', $this->getActiveDirectoryDomainName());
        $writer->writeCollectionOfObjectValues('trustedDomains', $this->getTrustedDomains());
    }

    /**
     * Sets the activeDirectoryDomainName property value. The activeDirectoryDomainName property
     * @param string|null $value Value to set for the activeDirectoryDomainName property.
    */
    public function setActiveDirectoryDomainName(?string $value): void {
        $this->activeDirectoryDomainName = $value;
    }

    /**
     * Sets the trustedDomains property value. The trustedDomains property
     * @param array<ActiveDirectoryDomainEvidence>|null $value Value to set for the trustedDomains property.
    */
    public function setTrustedDomains(?array $value): void {
        $this->trustedDomains = $value;
    }

}
