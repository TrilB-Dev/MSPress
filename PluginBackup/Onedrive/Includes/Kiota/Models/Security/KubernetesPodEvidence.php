<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class KubernetesPodEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var array<ContainerEvidence>|null $containers The list of pod containers which are not init or ephemeral containers.
    */
    private ?array $containers = null;
    
    /**
     * @var KubernetesControllerEvidence|null $controller The pod controller.
    */
    private ?KubernetesControllerEvidence $controller = null;
    
    /**
     * @var array<ContainerEvidence>|null $ephemeralContainers The list of pod ephemeral containers.
    */
    private ?array $ephemeralContainers = null;
    
    /**
     * @var KubernetesNamespaceEvidence|null $escapedNamespace The pod namespace.
    */
    private ?KubernetesNamespaceEvidence $escapedNamespace = null;
    
    /**
     * @var array<ContainerEvidence>|null $initContainers The list of pod init containers.
    */
    private ?array $initContainers = null;
    
    /**
     * @var Dictionary|null $labels The pod labels.
    */
    private ?Dictionary $labels = null;
    
    /**
     * @var string|null $name The pod name.
    */
    private ?string $name = null;
    
    /**
     * @var IpEvidence|null $podIp The pod IP.
    */
    private ?IpEvidence $podIp = null;
    
    /**
     * @var KubernetesServiceAccountEvidence|null $serviceAccount The pod service account.
    */
    private ?KubernetesServiceAccountEvidence $serviceAccount = null;
    
    /**
     * Instantiates a new KubernetesPodEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.kubernetesPodEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return KubernetesPodEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): KubernetesPodEvidence {
        return new KubernetesPodEvidence();
    }

    /**
     * Gets the containers property value. The list of pod containers which are not init or ephemeral containers.
     * @return array<ContainerEvidence>|null
    */
    public function getContainers(): ?array {
        return $this->containers;
    }

    /**
     * Gets the controller property value. The pod controller.
     * @return KubernetesControllerEvidence|null
    */
    public function getController(): ?KubernetesControllerEvidence {
        return $this->controller;
    }

    /**
     * Gets the ephemeralContainers property value. The list of pod ephemeral containers.
     * @return array<ContainerEvidence>|null
    */
    public function getEphemeralContainers(): ?array {
        return $this->ephemeralContainers;
    }

    /**
     * Gets the namespace property value. The pod namespace.
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
            'containers' => fn(ParseNode $n) => $o->setContainers($n->getCollectionOfObjectValues([ContainerEvidence::class, 'createFromDiscriminatorValue'])),
            'controller' => fn(ParseNode $n) => $o->setController($n->getObjectValue([KubernetesControllerEvidence::class, 'createFromDiscriminatorValue'])),
            'ephemeralContainers' => fn(ParseNode $n) => $o->setEphemeralContainers($n->getCollectionOfObjectValues([ContainerEvidence::class, 'createFromDiscriminatorValue'])),
            'namespace' => fn(ParseNode $n) => $o->setEscapedNamespace($n->getObjectValue([KubernetesNamespaceEvidence::class, 'createFromDiscriminatorValue'])),
            'initContainers' => fn(ParseNode $n) => $o->setInitContainers($n->getCollectionOfObjectValues([ContainerEvidence::class, 'createFromDiscriminatorValue'])),
            'labels' => fn(ParseNode $n) => $o->setLabels($n->getObjectValue([Dictionary::class, 'createFromDiscriminatorValue'])),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'podIp' => fn(ParseNode $n) => $o->setPodIp($n->getObjectValue([IpEvidence::class, 'createFromDiscriminatorValue'])),
            'serviceAccount' => fn(ParseNode $n) => $o->setServiceAccount($n->getObjectValue([KubernetesServiceAccountEvidence::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the initContainers property value. The list of pod init containers.
     * @return array<ContainerEvidence>|null
    */
    public function getInitContainers(): ?array {
        return $this->initContainers;
    }

    /**
     * Gets the labels property value. The pod labels.
     * @return Dictionary|null
    */
    public function getLabels(): ?Dictionary {
        return $this->labels;
    }

    /**
     * Gets the name property value. The pod name.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the podIp property value. The pod IP.
     * @return IpEvidence|null
    */
    public function getPodIp(): ?IpEvidence {
        return $this->podIp;
    }

    /**
     * Gets the serviceAccount property value. The pod service account.
     * @return KubernetesServiceAccountEvidence|null
    */
    public function getServiceAccount(): ?KubernetesServiceAccountEvidence {
        return $this->serviceAccount;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('containers', $this->getContainers());
        $writer->writeObjectValue('controller', $this->getController());
        $writer->writeCollectionOfObjectValues('ephemeralContainers', $this->getEphemeralContainers());
        $writer->writeObjectValue('namespace', $this->getEscapedNamespace());
        $writer->writeCollectionOfObjectValues('initContainers', $this->getInitContainers());
        $writer->writeObjectValue('labels', $this->getLabels());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeObjectValue('podIp', $this->getPodIp());
        $writer->writeObjectValue('serviceAccount', $this->getServiceAccount());
    }

    /**
     * Sets the containers property value. The list of pod containers which are not init or ephemeral containers.
     * @param array<ContainerEvidence>|null $value Value to set for the containers property.
    */
    public function setContainers(?array $value): void {
        $this->containers = $value;
    }

    /**
     * Sets the controller property value. The pod controller.
     * @param KubernetesControllerEvidence|null $value Value to set for the controller property.
    */
    public function setController(?KubernetesControllerEvidence $value): void {
        $this->controller = $value;
    }

    /**
     * Sets the ephemeralContainers property value. The list of pod ephemeral containers.
     * @param array<ContainerEvidence>|null $value Value to set for the ephemeralContainers property.
    */
    public function setEphemeralContainers(?array $value): void {
        $this->ephemeralContainers = $value;
    }

    /**
     * Sets the namespace property value. The pod namespace.
     * @param KubernetesNamespaceEvidence|null $value Value to set for the namespace property.
    */
    public function setEscapedNamespace(?KubernetesNamespaceEvidence $value): void {
        $this->escapedNamespace = $value;
    }

    /**
     * Sets the initContainers property value. The list of pod init containers.
     * @param array<ContainerEvidence>|null $value Value to set for the initContainers property.
    */
    public function setInitContainers(?array $value): void {
        $this->initContainers = $value;
    }

    /**
     * Sets the labels property value. The pod labels.
     * @param Dictionary|null $value Value to set for the labels property.
    */
    public function setLabels(?Dictionary $value): void {
        $this->labels = $value;
    }

    /**
     * Sets the name property value. The pod name.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the podIp property value. The pod IP.
     * @param IpEvidence|null $value Value to set for the podIp property.
    */
    public function setPodIp(?IpEvidence $value): void {
        $this->podIp = $value;
    }

    /**
     * Sets the serviceAccount property value. The pod service account.
     * @param KubernetesServiceAccountEvidence|null $value Value to set for the serviceAccount property.
    */
    public function setServiceAccount(?KubernetesServiceAccountEvidence $value): void {
        $this->serviceAccount = $value;
    }

}
