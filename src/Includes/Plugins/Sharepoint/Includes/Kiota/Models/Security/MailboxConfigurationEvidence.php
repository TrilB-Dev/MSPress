<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MailboxConfigurationEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var string|null $configurationId The unique identifier of the mailbox configuration.
    */
    private ?string $configurationId = null;
    
    /**
     * @var MailboxConfigurationType|null $configurationType The type of mailbox configuration. The possible values are: mailForwardingRule, owaSettings, ewsSettings, mailDelegation, userInboxRule, unknownFutureValue.
    */
    private ?MailboxConfigurationType $configurationType = null;
    
    /**
     * @var string|null $displayName The display name of the mailbox.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $externalDirectoryObjectId The external directory object identifier of the mailbox.
    */
    private ?string $externalDirectoryObjectId = null;
    
    /**
     * @var string|null $mailboxPrimaryAddress The primary email address of the mailbox.
    */
    private ?string $mailboxPrimaryAddress = null;
    
    /**
     * @var string|null $upn The user principal name (UPN) of the mailbox.
    */
    private ?string $upn = null;
    
    /**
     * Instantiates a new MailboxConfigurationEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.mailboxConfigurationEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MailboxConfigurationEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MailboxConfigurationEvidence {
        return new MailboxConfigurationEvidence();
    }

    /**
     * Gets the configurationId property value. The unique identifier of the mailbox configuration.
     * @return string|null
    */
    public function getConfigurationId(): ?string {
        return $this->configurationId;
    }

    /**
     * Gets the configurationType property value. The type of mailbox configuration. The possible values are: mailForwardingRule, owaSettings, ewsSettings, mailDelegation, userInboxRule, unknownFutureValue.
     * @return MailboxConfigurationType|null
    */
    public function getConfigurationType(): ?MailboxConfigurationType {
        return $this->configurationType;
    }

    /**
     * Gets the displayName property value. The display name of the mailbox.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the externalDirectoryObjectId property value. The external directory object identifier of the mailbox.
     * @return string|null
    */
    public function getExternalDirectoryObjectId(): ?string {
        return $this->externalDirectoryObjectId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'configurationId' => fn(ParseNode $n) => $o->setConfigurationId($n->getStringValue()),
            'configurationType' => fn(ParseNode $n) => $o->setConfigurationType($n->getEnumValue(MailboxConfigurationType::class)),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'externalDirectoryObjectId' => fn(ParseNode $n) => $o->setExternalDirectoryObjectId($n->getStringValue()),
            'mailboxPrimaryAddress' => fn(ParseNode $n) => $o->setMailboxPrimaryAddress($n->getStringValue()),
            'upn' => fn(ParseNode $n) => $o->setUpn($n->getStringValue()),
        ]);
    }

    /**
     * Gets the mailboxPrimaryAddress property value. The primary email address of the mailbox.
     * @return string|null
    */
    public function getMailboxPrimaryAddress(): ?string {
        return $this->mailboxPrimaryAddress;
    }

    /**
     * Gets the upn property value. The user principal name (UPN) of the mailbox.
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
        parent::serialize($writer);
        $writer->writeStringValue('configurationId', $this->getConfigurationId());
        $writer->writeEnumValue('configurationType', $this->getConfigurationType());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('externalDirectoryObjectId', $this->getExternalDirectoryObjectId());
        $writer->writeStringValue('mailboxPrimaryAddress', $this->getMailboxPrimaryAddress());
        $writer->writeStringValue('upn', $this->getUpn());
    }

    /**
     * Sets the configurationId property value. The unique identifier of the mailbox configuration.
     * @param string|null $value Value to set for the configurationId property.
    */
    public function setConfigurationId(?string $value): void {
        $this->configurationId = $value;
    }

    /**
     * Sets the configurationType property value. The type of mailbox configuration. The possible values are: mailForwardingRule, owaSettings, ewsSettings, mailDelegation, userInboxRule, unknownFutureValue.
     * @param MailboxConfigurationType|null $value Value to set for the configurationType property.
    */
    public function setConfigurationType(?MailboxConfigurationType $value): void {
        $this->configurationType = $value;
    }

    /**
     * Sets the displayName property value. The display name of the mailbox.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the externalDirectoryObjectId property value. The external directory object identifier of the mailbox.
     * @param string|null $value Value to set for the externalDirectoryObjectId property.
    */
    public function setExternalDirectoryObjectId(?string $value): void {
        $this->externalDirectoryObjectId = $value;
    }

    /**
     * Sets the mailboxPrimaryAddress property value. The primary email address of the mailbox.
     * @param string|null $value Value to set for the mailboxPrimaryAddress property.
    */
    public function setMailboxPrimaryAddress(?string $value): void {
        $this->mailboxPrimaryAddress = $value;
    }

    /**
     * Sets the upn property value. The user principal name (UPN) of the mailbox.
     * @param string|null $value Value to set for the upn property.
    */
    public function setUpn(?string $value): void {
        $this->upn = $value;
    }

}
