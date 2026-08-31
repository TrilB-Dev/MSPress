<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class KubernetesClusterEvidence extends AlertEvidence implements Parsable 
{
    /**
     * @var AlertEvidence|null $cloudResource The cloud identifier of the cluster. Can be either an amazonResourceEvidence, azureResourceEvidence, or googleCloudResourceEvidence object.
    */
    private ?AlertEvidence $cloudResource = null;
    
    /**
     * @var string|null $distribution The distribution type of the cluster.
    */
    private ?string $distribution = null;
    
    /**
     * @var string|null $name The cluster name.
    */
    private ?string $name = null;
    
    /**
     * @var KubernetesPlatform|null $platform The platform the cluster runs on. The possible values are: unknown, aks, eks, gke, arc, unknownFutureValue.
    */
    private ?KubernetesPlatform $platform = null;
    
    /**
     * @var string|null $version The kubernetes version of the cluster.
    */
    private ?string $version = null;
    
    /**
     * Instantiates a new KubernetesClusterEvidence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.security.kubernetesClusterEvidence');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return KubernetesClusterEvidence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): KubernetesClusterEvidence {
        return new KubernetesClusterEvidence();
    }

    /**
     * Gets the cloudResource property value. The cloud identifier of the cluster. Can be either an amazonResourceEvidence, azureResourceEvidence, or googleCloudResourceEvidence object.
     * @return AlertEvidence|null
    */
    public function getCloudResource(): ?AlertEvidence {
        return $this->cloudResource;
    }

    /**
     * Gets the distribution property value. The distribution type of the cluster.
     * @return string|null
    */
    public function getDistribution(): ?string {
        return $this->distribution;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'cloudResource' => fn(ParseNode $n) => $o->setCloudResource($n->getObjectValue([AlertEvidence::class, 'createFromDiscriminatorValue'])),
            'distribution' => fn(ParseNode $n) => $o->setDistribution($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'platform' => fn(ParseNode $n) => $o->setPlatform($n->getEnumValue(KubernetesPlatform::class)),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getStringValue()),
        ]);
    }

    /**
     * Gets the name property value. The cluster name.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the platform property value. The platform the cluster runs on. The possible values are: unknown, aks, eks, gke, arc, unknownFutureValue.
     * @return KubernetesPlatform|null
    */
    public function getPlatform(): ?KubernetesPlatform {
        return $this->platform;
    }

    /**
     * Gets the version property value. The kubernetes version of the cluster.
     * @return string|null
    */
    public function getVersion(): ?string {
        return $this->version;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('cloudResource', $this->getCloudResource());
        $writer->writeStringValue('distribution', $this->getDistribution());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeEnumValue('platform', $this->getPlatform());
        $writer->writeStringValue('version', $this->getVersion());
    }

    /**
     * Sets the cloudResource property value. The cloud identifier of the cluster. Can be either an amazonResourceEvidence, azureResourceEvidence, or googleCloudResourceEvidence object.
     * @param AlertEvidence|null $value Value to set for the cloudResource property.
    */
    public function setCloudResource(?AlertEvidence $value): void {
        $this->cloudResource = $value;
    }

    /**
     * Sets the distribution property value. The distribution type of the cluster.
     * @param string|null $value Value to set for the distribution property.
    */
    public function setDistribution(?string $value): void {
        $this->distribution = $value;
    }

    /**
     * Sets the name property value. The cluster name.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the platform property value. The platform the cluster runs on. The possible values are: unknown, aks, eks, gke, arc, unknownFutureValue.
     * @param KubernetesPlatform|null $value Value to set for the platform property.
    */
    public function setPlatform(?KubernetesPlatform $value): void {
        $this->platform = $value;
    }

    /**
     * Sets the version property value. The kubernetes version of the cluster.
     * @param string|null $value Value to set for the version property.
    */
    public function setVersion(?string $value): void {
        $this->version = $value;
    }

}
