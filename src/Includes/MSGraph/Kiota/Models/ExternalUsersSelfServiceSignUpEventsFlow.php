<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExternalUsersSelfServiceSignUpEventsFlow extends AuthenticationEventsFlow implements Parsable 
{
    /**
     * @var OnAttributeCollectionHandler|null $onAttributeCollection The configuration for what to invoke when attributes are ready to be collected from the user.
    */
    private ?OnAttributeCollectionHandler $onAttributeCollection = null;
    
    /**
     * @var OnAttributeCollectionStartHandler|null $onAttributeCollectionStart The configuration for what to invoke when attribution collection starts.
    */
    private ?OnAttributeCollectionStartHandler $onAttributeCollectionStart = null;
    
    /**
     * @var OnAttributeCollectionSubmitHandler|null $onAttributeCollectionSubmit The configuration for what to invoke when attributes are submitted at the end of attribution collection.
    */
    private ?OnAttributeCollectionSubmitHandler $onAttributeCollectionSubmit = null;
    
    /**
     * @var OnAuthenticationMethodLoadStartHandler|null $onAuthenticationMethodLoadStart Required. The configuration for what to invoke when authentication methods are ready to be presented to the user. Must have at least one identity provider linked.  Supports $filter (eq). See support for filtering on user flows for syntax information.
    */
    private ?OnAuthenticationMethodLoadStartHandler $onAuthenticationMethodLoadStart = null;
    
    /**
     * @var OnInteractiveAuthFlowStartHandler|null $onInteractiveAuthFlowStart Required. The configuration for what to invoke when an authentication flow is ready to be initiated.
    */
    private ?OnInteractiveAuthFlowStartHandler $onInteractiveAuthFlowStart = null;
    
    /**
     * @var OnUserCreateStartHandler|null $onUserCreateStart The configuration for what to invoke during user creation.
    */
    private ?OnUserCreateStartHandler $onUserCreateStart = null;
    
    /**
     * Instantiates a new ExternalUsersSelfServiceSignUpEventsFlow and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.externalUsersSelfServiceSignUpEventsFlow');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExternalUsersSelfServiceSignUpEventsFlow
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExternalUsersSelfServiceSignUpEventsFlow {
        return new ExternalUsersSelfServiceSignUpEventsFlow();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'onAttributeCollection' => fn(ParseNode $n) => $o->setOnAttributeCollection($n->getObjectValue([OnAttributeCollectionHandler::class, 'createFromDiscriminatorValue'])),
            'onAttributeCollectionStart' => fn(ParseNode $n) => $o->setOnAttributeCollectionStart($n->getObjectValue([OnAttributeCollectionStartHandler::class, 'createFromDiscriminatorValue'])),
            'onAttributeCollectionSubmit' => fn(ParseNode $n) => $o->setOnAttributeCollectionSubmit($n->getObjectValue([OnAttributeCollectionSubmitHandler::class, 'createFromDiscriminatorValue'])),
            'onAuthenticationMethodLoadStart' => fn(ParseNode $n) => $o->setOnAuthenticationMethodLoadStart($n->getObjectValue([OnAuthenticationMethodLoadStartHandler::class, 'createFromDiscriminatorValue'])),
            'onInteractiveAuthFlowStart' => fn(ParseNode $n) => $o->setOnInteractiveAuthFlowStart($n->getObjectValue([OnInteractiveAuthFlowStartHandler::class, 'createFromDiscriminatorValue'])),
            'onUserCreateStart' => fn(ParseNode $n) => $o->setOnUserCreateStart($n->getObjectValue([OnUserCreateStartHandler::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the onAttributeCollection property value. The configuration for what to invoke when attributes are ready to be collected from the user.
     * @return OnAttributeCollectionHandler|null
    */
    public function getOnAttributeCollection(): ?OnAttributeCollectionHandler {
        return $this->onAttributeCollection;
    }

    /**
     * Gets the onAttributeCollectionStart property value. The configuration for what to invoke when attribution collection starts.
     * @return OnAttributeCollectionStartHandler|null
    */
    public function getOnAttributeCollectionStart(): ?OnAttributeCollectionStartHandler {
        return $this->onAttributeCollectionStart;
    }

    /**
     * Gets the onAttributeCollectionSubmit property value. The configuration for what to invoke when attributes are submitted at the end of attribution collection.
     * @return OnAttributeCollectionSubmitHandler|null
    */
    public function getOnAttributeCollectionSubmit(): ?OnAttributeCollectionSubmitHandler {
        return $this->onAttributeCollectionSubmit;
    }

    /**
     * Gets the onAuthenticationMethodLoadStart property value. Required. The configuration for what to invoke when authentication methods are ready to be presented to the user. Must have at least one identity provider linked.  Supports $filter (eq). See support for filtering on user flows for syntax information.
     * @return OnAuthenticationMethodLoadStartHandler|null
    */
    public function getOnAuthenticationMethodLoadStart(): ?OnAuthenticationMethodLoadStartHandler {
        return $this->onAuthenticationMethodLoadStart;
    }

    /**
     * Gets the onInteractiveAuthFlowStart property value. Required. The configuration for what to invoke when an authentication flow is ready to be initiated.
     * @return OnInteractiveAuthFlowStartHandler|null
    */
    public function getOnInteractiveAuthFlowStart(): ?OnInteractiveAuthFlowStartHandler {
        return $this->onInteractiveAuthFlowStart;
    }

    /**
     * Gets the onUserCreateStart property value. The configuration for what to invoke during user creation.
     * @return OnUserCreateStartHandler|null
    */
    public function getOnUserCreateStart(): ?OnUserCreateStartHandler {
        return $this->onUserCreateStart;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('onAttributeCollection', $this->getOnAttributeCollection());
        $writer->writeObjectValue('onAttributeCollectionStart', $this->getOnAttributeCollectionStart());
        $writer->writeObjectValue('onAttributeCollectionSubmit', $this->getOnAttributeCollectionSubmit());
        $writer->writeObjectValue('onAuthenticationMethodLoadStart', $this->getOnAuthenticationMethodLoadStart());
        $writer->writeObjectValue('onInteractiveAuthFlowStart', $this->getOnInteractiveAuthFlowStart());
        $writer->writeObjectValue('onUserCreateStart', $this->getOnUserCreateStart());
    }

    /**
     * Sets the onAttributeCollection property value. The configuration for what to invoke when attributes are ready to be collected from the user.
     * @param OnAttributeCollectionHandler|null $value Value to set for the onAttributeCollection property.
    */
    public function setOnAttributeCollection(?OnAttributeCollectionHandler $value): void {
        $this->onAttributeCollection = $value;
    }

    /**
     * Sets the onAttributeCollectionStart property value. The configuration for what to invoke when attribution collection starts.
     * @param OnAttributeCollectionStartHandler|null $value Value to set for the onAttributeCollectionStart property.
    */
    public function setOnAttributeCollectionStart(?OnAttributeCollectionStartHandler $value): void {
        $this->onAttributeCollectionStart = $value;
    }

    /**
     * Sets the onAttributeCollectionSubmit property value. The configuration for what to invoke when attributes are submitted at the end of attribution collection.
     * @param OnAttributeCollectionSubmitHandler|null $value Value to set for the onAttributeCollectionSubmit property.
    */
    public function setOnAttributeCollectionSubmit(?OnAttributeCollectionSubmitHandler $value): void {
        $this->onAttributeCollectionSubmit = $value;
    }

    /**
     * Sets the onAuthenticationMethodLoadStart property value. Required. The configuration for what to invoke when authentication methods are ready to be presented to the user. Must have at least one identity provider linked.  Supports $filter (eq). See support for filtering on user flows for syntax information.
     * @param OnAuthenticationMethodLoadStartHandler|null $value Value to set for the onAuthenticationMethodLoadStart property.
    */
    public function setOnAuthenticationMethodLoadStart(?OnAuthenticationMethodLoadStartHandler $value): void {
        $this->onAuthenticationMethodLoadStart = $value;
    }

    /**
     * Sets the onInteractiveAuthFlowStart property value. Required. The configuration for what to invoke when an authentication flow is ready to be initiated.
     * @param OnInteractiveAuthFlowStartHandler|null $value Value to set for the onInteractiveAuthFlowStart property.
    */
    public function setOnInteractiveAuthFlowStart(?OnInteractiveAuthFlowStartHandler $value): void {
        $this->onInteractiveAuthFlowStart = $value;
    }

    /**
     * Sets the onUserCreateStart property value. The configuration for what to invoke during user creation.
     * @param OnUserCreateStartHandler|null $value Value to set for the onUserCreateStart property.
    */
    public function setOnUserCreateStart(?OnUserCreateStartHandler $value): void {
        $this->onUserCreateStart = $value;
    }

}
