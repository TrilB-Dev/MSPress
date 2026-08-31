<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class KubernetesControllerEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var KubernetesNamespaceEvidence|null $escapedNamespace The service account namespace.
    */
    private ?KubernetesNamespaceEvidence $escapedNamespace = null;
    
    /**
     * @var Dictionary|null $labels The labels for the Kubernetes pod.
    */
    private ?Dictionary $labels = null;
    
    /**
     * @var string|null $name The controller name.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $type The controller type.
    */
    private ?string $type = null;
    
    /**
     * Instantiates a new KubernetesControllerEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.kubernetesControllerEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return KubernetesControllerEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): KubernetesControllerEvidence {
        return new KubernetesControllerEvidence();
    }

    /**
     * Gets the namespace property value. The service account namespace.
     * @return KubernetesNamespaceEvidence|null
    */
    public function getEscapedNamespace(): ?KubernetesNamespaceEvidence {
        return $this->escapedNamespace;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'namespace' => fn(ParseNode $n) => $o->setEscapedNamespace($n->getObjectValue([KubernetesNamespaceEvidence::class, 'createFromDiscriminatorValue'])),
            'labels' => fn(ParseNode $n) => $o->setLabels($n->getObjectValue([Dictionary::class, 'createFromDiscriminatorValue'])),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getStringValue()),
        ]);
    }

    /**
     * Gets the labels property value. The labels for the Kubernetes pod.
     * @return Dictionary|null
    */
    public function getLabels(): ?Dictionary {
        return $this->labels;
    }

    /**
     * Gets the name property value. The controller name.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the type property value. The controller type.
     * @return string|null
    */
    public function getType(): ?string {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('namespace', $this->getEscapedNamespace());
        $writer->writeObjectValue('labels', $this->getLabels());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('type', $this->getType());
    }

    /**
     * Sets the namespace property value. The service account namespace.
     * @param KubernetesNamespaceEvidence|null $value Value to set for the namespace property.
    */
    public function setEscapedNamespace(?KubernetesNamespaceEvidence $value): void {
        $this->escapedNamespace = $value;
    }

    /**
     * Sets the labels property value. The labels for the Kubernetes pod.
     * @param Dictionary|null $value Value to set for the labels property.
    */
    public function setLabels(?Dictionary $value): void {
        $this->labels = $value;
    }

    /**
     * Sets the name property value. The controller name.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the type property value. The controller type.
     * @param string|null $value Value to set for the type property.
    */
    public function setType(?string $value): void {
        $this->type = $value;
    }

}
