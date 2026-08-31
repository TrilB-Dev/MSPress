<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class ProcessConversationMetadata extends ProcessContentMetadataBase implements Parsable 
{
    /**
     * @var array<string>|null $accessedResources List of resources (for example, file URLs, web URLs) accessed during the generation of this message (relevant for bot interactions). The accessedResources property is deprecated and stopped returning data on August 20, 2025. Going forward, use the accessedResources_v2 property.
    */
    private ?array $accessedResources = null;
    
    /**
     * @var array<ResourceAccessDetail>|null $accessedResources_v2 Lists details about the resources accessed by AI agents, such as identifiers, access type, and status.
    */
    private ?array $accessedResources_v2 = null;
    
    /**
     * @var array<AiAgentInfo>|null $agents Indicates the information about an AI agent that participated in the preparation of the message.
    */
    private ?array $agents = null;
    
    /**
     * @var string|null $parentMessageId Identifier of the parent message in a threaded conversation, if applicable.
    */
    private ?string $parentMessageId = null;
    
    /**
     * @var array<AiInteractionPlugin>|null $plugins List of plugins used during the generation of this message (relevant for AI/bot interactions).
    */
    private ?array $plugins = null;
    
    /**
     * Instantiates a new ProcessConversationMetadata and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.processConversationMetadata');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProcessConversationMetadata
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProcessConversationMetadata {
        return new ProcessConversationMetadata();
    }

    /**
     * Gets the accessedResources property value. List of resources (for example, file URLs, web URLs) accessed during the generation of this message (relevant for bot interactions). The accessedResources property is deprecated and stopped returning data on August 20, 2025. Going forward, use the accessedResources_v2 property.
     * @return array<string>|null
    */
    public function getAccessedResources(): ?array {
        return $this->accessedResources;
    }

    /**
     * Gets the accessedResources_v2 property value. Lists details about the resources accessed by AI agents, such as identifiers, access type, and status.
     * @return array<ResourceAccessDetail>|null
    */
    public function getAccessedResourcesV2(): ?array {
        return $this->accessedResources_v2;
    }

    /**
     * Gets the agents property value. Indicates the information about an AI agent that participated in the preparation of the message.
     * @return array<AiAgentInfo>|null
    */
    public function getAgents(): ?array {
        return $this->agents;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'accessedResources' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAccessedResources($val);
            },
            'accessedResources_v2' => fn(ParseNode $n) => $o->setAccessedResourcesV2($n->getCollectionOfObjectValues([ResourceAccessDetail::class, 'createFromDiscriminatorValue'])),
            'agents' => fn(ParseNode $n) => $o->setAgents($n->getCollectionOfObjectValues([AiAgentInfo::class, 'createFromDiscriminatorValue'])),
            'parentMessageId' => fn(ParseNode $n) => $o->setParentMessageId($n->getStringValue()),
            'plugins' => fn(ParseNode $n) => $o->setPlugins($n->getCollectionOfObjectValues([AiInteractionPlugin::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the parentMessageId property value. Identifier of the parent message in a threaded conversation, if applicable.
     * @return string|null
    */
    public function getParentMessageId(): ?string {
        return $this->parentMessageId;
    }

    /**
     * Gets the plugins property value. List of plugins used during the generation of this message (relevant for AI/bot interactions).
     * @return array<AiInteractionPlugin>|null
    */
    public function getPlugins(): ?array {
        return $this->plugins;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfPrimitiveValues('accessedResources', $this->getAccessedResources());
        $writer->writeCollectionOfObjectValues('accessedResources_v2', $this->getAccessedResourcesV2());
        $writer->writeCollectionOfObjectValues('agents', $this->getAgents());
        $writer->writeStringValue('parentMessageId', $this->getParentMessageId());
        $writer->writeCollectionOfObjectValues('plugins', $this->getPlugins());
    }

    /**
     * Sets the accessedResources property value. List of resources (for example, file URLs, web URLs) accessed during the generation of this message (relevant for bot interactions). The accessedResources property is deprecated and stopped returning data on August 20, 2025. Going forward, use the accessedResources_v2 property.
     * @param array<string>|null $value Value to set for the accessedResources property.
    */
    public function setAccessedResources(?array $value): void {
        $this->accessedResources = $value;
    }

    /**
     * Sets the accessedResources_v2 property value. Lists details about the resources accessed by AI agents, such as identifiers, access type, and status.
     * @param array<ResourceAccessDetail>|null $value Value to set for the accessedResources_v2 property.
    */
    public function setAccessedResourcesV2(?array $value): void {
        $this->accessedResources_v2 = $value;
    }

    /**
     * Sets the agents property value. Indicates the information about an AI agent that participated in the preparation of the message.
     * @param array<AiAgentInfo>|null $value Value to set for the agents property.
    */
    public function setAgents(?array $value): void {
        $this->agents = $value;
    }

    /**
     * Sets the parentMessageId property value. Identifier of the parent message in a threaded conversation, if applicable.
     * @param string|null $value Value to set for the parentMessageId property.
    */
    public function setParentMessageId(?string $value): void {
        $this->parentMessageId = $value;
    }

    /**
     * Sets the plugins property value. List of plugins used during the generation of this message (relevant for AI/bot interactions).
     * @param array<AiInteractionPlugin>|null $value Value to set for the plugins property.
    */
    public function setPlugins(?array $value): void {
        $this->plugins = $value;
    }

}
