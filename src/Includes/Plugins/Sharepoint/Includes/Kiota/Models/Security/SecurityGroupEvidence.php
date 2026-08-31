<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SecurityGroupEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $activeDirectoryObjectGuid The unique group identifier assigned by the on-premises Active Directory.
    */
    private ?string $activeDirectoryObjectGuid = null;
    
    /**
     * @var string|null $displayName The name of the security group.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $distinguishedName The distinguished name of the security group.
    */
    private ?string $distinguishedName = null;
    
    /**
     * @var string|null $friendlyName The friendly name of the security group.
    */
    private ?string $friendlyName = null;
    
    /**
     * @var string|null $securityGroupId Unique identifier of the security group.
    */
    private ?string $securityGroupId = null;
    
    /**
     * @var string|null $sid The security identifier of the group.
    */
    private ?string $sid = null;
    
    /**
     * Instantiates a new SecurityGroupEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.securityGroupEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SecurityGroupEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SecurityGroupEvidence {
        return new SecurityGroupEvidence();
    }

    /**
     * Gets the activeDirectoryObjectGuid property value. The unique group identifier assigned by the on-premises Active Directory.
     * @return string|null
    */
    public function getActiveDirectoryObjectGuid(): ?string {
        return $this->activeDirectoryObjectGuid;
    }

    /**
     * Gets the displayName property value. The name of the security group.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the distinguishedName property value. The distinguished name of the security group.
     * @return string|null
    */
    public function getDistinguishedName(): ?string {
        return $this->distinguishedName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'activeDirectoryObjectGuid' => fn(ParseNode $n) => $o->setActiveDirectoryObjectGuid($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'distinguishedName' => fn(ParseNode $n) => $o->setDistinguishedName($n->getStringValue()),
            'friendlyName' => fn(ParseNode $n) => $o->setFriendlyName($n->getStringValue()),
            'securityGroupId' => fn(ParseNode $n) => $o->setSecurityGroupId($n->getStringValue()),
            'sid' => fn(ParseNode $n) => $o->setSid($n->getStringValue()),
        ]);
    }

    /**
     * Gets the friendlyName property value. The friendly name of the security group.
     * @return string|null
    */
    public function getFriendlyName(): ?string {
        return $this->friendlyName;
    }

    /**
     * Gets the securityGroupId property value. Unique identifier of the security group.
     * @return string|null
    */
    public function getSecurityGroupId(): ?string {
        return $this->securityGroupId;
    }

    /**
     * Gets the sid property value. The security identifier of the group.
     * @return string|null
    */
    public function getSid(): ?string {
        return $this->sid;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('activeDirectoryObjectGuid', $this->getActiveDirectoryObjectGuid());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('distinguishedName', $this->getDistinguishedName());
        $writer->writeStringValue('friendlyName', $this->getFriendlyName());
        $writer->writeStringValue('securityGroupId', $this->getSecurityGroupId());
        $writer->writeStringValue('sid', $this->getSid());
    }

    /**
     * Sets the activeDirectoryObjectGuid property value. The unique group identifier assigned by the on-premises Active Directory.
     * @param string|null $value Value to set for the activeDirectoryObjectGuid property.
    */
    public function setActiveDirectoryObjectGuid(?string $value): void {
        $this->activeDirectoryObjectGuid = $value;
    }

    /**
     * Sets the displayName property value. The name of the security group.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the distinguishedName property value. The distinguished name of the security group.
     * @param string|null $value Value to set for the distinguishedName property.
    */
    public function setDistinguishedName(?string $value): void {
        $this->distinguishedName = $value;
    }

    /**
     * Sets the friendlyName property value. The friendly name of the security group.
     * @param string|null $value Value to set for the friendlyName property.
    */
    public function setFriendlyName(?string $value): void {
        $this->friendlyName = $value;
    }

    /**
     * Sets the securityGroupId property value. Unique identifier of the security group.
     * @param string|null $value Value to set for the securityGroupId property.
    */
    public function setSecurityGroupId(?string $value): void {
        $this->securityGroupId = $value;
    }

    /**
     * Sets the sid property value. The security identifier of the group.
     * @param string|null $value Value to set for the sid property.
    */
    public function setSid(?string $value): void {
        $this->sid = $value;
    }

}
