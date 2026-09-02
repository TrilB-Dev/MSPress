<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class UserEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var Stream|null $stream The stream property
    */
    private ?Stream $stream = null;
    
    /**
     * @var UserAccount|null $userAccount The user account details.
    */
    private ?UserAccount $userAccount = null;
    
    /**
     * Instantiates a new UserEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.userEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UserEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UserEvidence {
        return new UserEvidence();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'stream' => fn(ParseNode $n) => $o->setStream($n->getObjectValue([Stream::class, 'createFromDiscriminatorValue'])),
            'userAccount' => fn(ParseNode $n) => $o->setUserAccount($n->getObjectValue([UserAccount::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the stream property value. The stream property
     * @return Stream|null
    */
    public function getStream(): ?Stream {
        return $this->stream;
    }

    /**
     * Gets the userAccount property value. The user account details.
     * @return UserAccount|null
    */
    public function getUserAccount(): ?UserAccount {
        return $this->userAccount;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('stream', $this->getStream());
        $writer->writeObjectValue('userAccount', $this->getUserAccount());
    }

    /**
     * Sets the stream property value. The stream property
     * @param Stream|null $value Value to set for the stream property.
    */
    public function setStream(?Stream $value): void {
        $this->stream = $value;
    }

    /**
     * Sets the userAccount property value. The user account details.
     * @param UserAccount|null $value Value to set for the userAccount property.
    */
    public function setUserAccount(?UserAccount $value): void {
        $this->userAccount = $value;
    }

}
