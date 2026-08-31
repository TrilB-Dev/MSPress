<?php

namespace MSPress\Includes\MSGraph\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CloudApplicationEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var int|null $appId Unique identifier of the application.
    */
    private ?int $appId = null;
    
    /**
     * @var string|null $displayName Name of the application.
    */
    private ?string $displayName = null;
    
    /**
     * @var int|null $instanceId Identifier of the instance of the Software as a Service (SaaS) application.
    */
    private ?int $instanceId = null;
    
    /**
     * @var string|null $instanceName Name of the instance of the SaaS application.
    */
    private ?string $instanceName = null;
    
    /**
     * @var int|null $saasAppId The identifier of the SaaS application.
    */
    private ?int $saasAppId = null;
    
    /**
     * @var Stream|null $stream The stream property
    */
    private ?Stream $stream = null;
    
    /**
     * Instantiates a new CloudApplicationEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.cloudApplicationEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CloudApplicationEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CloudApplicationEvidence {
        return new CloudApplicationEvidence();
    }

    /**
     * Gets the appId property value. Unique identifier of the application.
     * @return int|null
    */
    public function getAppId(): ?int {
        return $this->appId;
    }

    /**
     * Gets the displayName property value. Name of the application.
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
            'appId' => fn(ParseNode $n) => $o->setAppId($n->getIntegerValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'instanceId' => fn(ParseNode $n) => $o->setInstanceId($n->getIntegerValue()),
            'instanceName' => fn(ParseNode $n) => $o->setInstanceName($n->getStringValue()),
            'saasAppId' => fn(ParseNode $n) => $o->setSaasAppId($n->getIntegerValue()),
            'stream' => fn(ParseNode $n) => $o->setStream($n->getObjectValue([Stream::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the instanceId property value. Identifier of the instance of the Software as a Service (SaaS) application.
     * @return int|null
    */
    public function getInstanceId(): ?int {
        return $this->instanceId;
    }

    /**
     * Gets the instanceName property value. Name of the instance of the SaaS application.
     * @return string|null
    */
    public function getInstanceName(): ?string {
        return $this->instanceName;
    }

    /**
     * Gets the saasAppId property value. The identifier of the SaaS application.
     * @return int|null
    */
    public function getSaasAppId(): ?int {
        return $this->saasAppId;
    }

    /**
     * Gets the stream property value. The stream property
     * @return Stream|null
    */
    public function getStream(): ?Stream {
        return $this->stream;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('appId', $this->getAppId());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeIntegerValue('instanceId', $this->getInstanceId());
        $writer->writeStringValue('instanceName', $this->getInstanceName());
        $writer->writeIntegerValue('saasAppId', $this->getSaasAppId());
        $writer->writeObjectValue('stream', $this->getStream());
    }

    /**
     * Sets the appId property value. Unique identifier of the application.
     * @param int|null $value Value to set for the appId property.
    */
    public function setAppId(?int $value): void {
        $this->appId = $value;
    }

    /**
     * Sets the displayName property value. Name of the application.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the instanceId property value. Identifier of the instance of the Software as a Service (SaaS) application.
     * @param int|null $value Value to set for the instanceId property.
    */
    public function setInstanceId(?int $value): void {
        $this->instanceId = $value;
    }

    /**
     * Sets the instanceName property value. Name of the instance of the SaaS application.
     * @param string|null $value Value to set for the instanceName property.
    */
    public function setInstanceName(?string $value): void {
        $this->instanceName = $value;
    }

    /**
     * Sets the saasAppId property value. The identifier of the SaaS application.
     * @param int|null $value Value to set for the saasAppId property.
    */
    public function setSaasAppId(?int $value): void {
        $this->saasAppId = $value;
    }

    /**
     * Sets the stream property value. The stream property
     * @param Stream|null $value Value to set for the stream property.
    */
    public function setStream(?Stream $value): void {
        $this->stream = $value;
    }

}
