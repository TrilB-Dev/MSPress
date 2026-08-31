<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AuthenticationEventListener extends Entity implements Parsable 
{
    /**
     * @var string|null $authenticationEventsFlowId The identifier of the authenticationEventsFlow object.
    */
    private ?string $authenticationEventsFlowId = null;
    
    /**
     * @var AuthenticationConditions|null $conditions The conditions on which this authenticationEventListener should trigger.
    */
    private ?AuthenticationConditions $conditions = null;
    
    /**
     * @var string|null $displayName The display name of the listener.
    */
    private ?string $displayName = null;
    
    /**
     * Instantiates a new AuthenticationEventListener and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AuthenticationEventListener
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AuthenticationEventListener {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.onAttributeCollectionListener': return new OnAttributeCollectionListener();
                case '#microsoft.graph.onAttributeCollectionStartListener': return new OnAttributeCollectionStartListener();
                case '#microsoft.graph.onAttributeCollectionSubmitListener': return new OnAttributeCollectionSubmitListener();
                case '#microsoft.graph.onAuthenticationMethodLoadStartListener': return new OnAuthenticationMethodLoadStartListener();
                case '#microsoft.graph.onEmailOtpSendListener': return new OnEmailOtpSendListener();
                case '#microsoft.graph.onFraudProtectionLoadStartListener': return new OnFraudProtectionLoadStartListener();
                case '#microsoft.graph.onInteractiveAuthFlowStartListener': return new OnInteractiveAuthFlowStartListener();
                case '#microsoft.graph.onPasswordSubmitListener': return new OnPasswordSubmitListener();
                case '#microsoft.graph.onTokenIssuanceStartListener': return new OnTokenIssuanceStartListener();
                case '#microsoft.graph.onUserCreateStartListener': return new OnUserCreateStartListener();
                case '#microsoft.graph.onVerifiedIdClaimValidationListener': return new OnVerifiedIdClaimValidationListener();
            }
        }
        return new AuthenticationEventListener();
    }

    /**
     * Gets the authenticationEventsFlowId property value. The identifier of the authenticationEventsFlow object.
     * @return string|null
    */
    public function getAuthenticationEventsFlowId(): ?string {
        return $this->authenticationEventsFlowId;
    }

    /**
     * Gets the conditions property value. The conditions on which this authenticationEventListener should trigger.
     * @return AuthenticationConditions|null
    */
    public function getConditions(): ?AuthenticationConditions {
        return $this->conditions;
    }

    /**
     * Gets the displayName property value. The display name of the listener.
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
            'authenticationEventsFlowId' => fn(ParseNode $n) => $o->setAuthenticationEventsFlowId($n->getStringValue()),
            'conditions' => fn(ParseNode $n) => $o->setConditions($n->getObjectValue([AuthenticationConditions::class, 'createFromDiscriminatorValue'])),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('authenticationEventsFlowId', $this->getAuthenticationEventsFlowId());
        $writer->writeObjectValue('conditions', $this->getConditions());
        $writer->writeStringValue('displayName', $this->getDisplayName());
    }

    /**
     * Sets the authenticationEventsFlowId property value. The identifier of the authenticationEventsFlow object.
     * @param string|null $value Value to set for the authenticationEventsFlowId property.
    */
    public function setAuthenticationEventsFlowId(?string $value): void {
        $this->authenticationEventsFlowId = $value;
    }

    /**
     * Sets the conditions property value. The conditions on which this authenticationEventListener should trigger.
     * @param AuthenticationConditions|null $value Value to set for the conditions property.
    */
    public function setConditions(?AuthenticationConditions $value): void {
        $this->conditions = $value;
    }

    /**
     * Sets the displayName property value. The display name of the listener.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

}
