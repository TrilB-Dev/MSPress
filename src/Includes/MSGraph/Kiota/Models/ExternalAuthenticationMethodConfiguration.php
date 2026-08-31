<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExternalAuthenticationMethodConfiguration extends AuthenticationMethodConfiguration implements Parsable 
{
    /**
     * @var string|null $appId appId for the app registration in Microsoft Entra ID representing the integration with the external provider.
    */
    private ?string $appId = null;
    
    /**
     * @var string|null $displayName Display name for the external MFA. This name is shown to users during sign-in.
    */
    private ?string $displayName = null;
    
    /**
     * @var array<AuthenticationMethodTarget>|null $includeTargets A collection of groups that are enabled to use an authentication method as part of an authentication method policy in Microsoft Entra ID.
    */
    private ?array $includeTargets = null;
    
    /**
     * @var OpenIdConnectSetting|null $openIdConnectSetting The openIdConnectSetting property
    */
    private ?OpenIdConnectSetting $openIdConnectSetting = null;
    
    /**
     * Instantiates a new ExternalAuthenticationMethodConfiguration and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.externalAuthenticationMethodConfiguration');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExternalAuthenticationMethodConfiguration
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExternalAuthenticationMethodConfiguration {
        return new ExternalAuthenticationMethodConfiguration();
    }

    /**
     * Gets the appId property value. appId for the app registration in Microsoft Entra ID representing the integration with the external provider.
     * @return string|null
    */
    public function getAppId(): ?string {
        return $this->appId;
    }

    /**
     * Gets the displayName property value. Display name for the external MFA. This name is shown to users during sign-in.
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
            'appId' => fn(ParseNode $n) => $o->setAppId($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'includeTargets' => fn(ParseNode $n) => $o->setIncludeTargets($n->getCollectionOfObjectValues([AuthenticationMethodTarget::class, 'createFromDiscriminatorValue'])),
            'openIdConnectSetting' => fn(ParseNode $n) => $o->setOpenIdConnectSetting($n->getObjectValue([OpenIdConnectSetting::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the includeTargets property value. A collection of groups that are enabled to use an authentication method as part of an authentication method policy in Microsoft Entra ID.
     * @return array<AuthenticationMethodTarget>|null
    */
    public function getIncludeTargets(): ?array {
        return $this->includeTargets;
    }

    /**
     * Gets the openIdConnectSetting property value. The openIdConnectSetting property
     * @return OpenIdConnectSetting|null
    */
    public function getOpenIdConnectSetting(): ?OpenIdConnectSetting {
        return $this->openIdConnectSetting;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('appId', $this->getAppId());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeCollectionOfObjectValues('includeTargets', $this->getIncludeTargets());
        $writer->writeObjectValue('openIdConnectSetting', $this->getOpenIdConnectSetting());
    }

    /**
     * Sets the appId property value. appId for the app registration in Microsoft Entra ID representing the integration with the external provider.
     * @param string|null $value Value to set for the appId property.
    */
    public function setAppId(?string $value): void {
        $this->appId = $value;
    }

    /**
     * Sets the displayName property value. Display name for the external MFA. This name is shown to users during sign-in.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the includeTargets property value. A collection of groups that are enabled to use an authentication method as part of an authentication method policy in Microsoft Entra ID.
     * @param array<AuthenticationMethodTarget>|null $value Value to set for the includeTargets property.
    */
    public function setIncludeTargets(?array $value): void {
        $this->includeTargets = $value;
    }

    /**
     * Sets the openIdConnectSetting property value. The openIdConnectSetting property
     * @param OpenIdConnectSetting|null $value Value to set for the openIdConnectSetting property.
    */
    public function setOpenIdConnectSetting(?OpenIdConnectSetting $value): void {
        $this->openIdConnectSetting = $value;
    }

}
