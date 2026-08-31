<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class Indicator extends Entity implements Parsable 
{
    /**
     * @var Artifact|null $artifact The artifact property
    */
    private ?Artifact $artifact = null;
    
    /**
     * @var IndicatorSource|null $source The source property
    */
    private ?IndicatorSource $source = null;
    
    /**
     * Instantiates a new Indicator and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Indicator
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Indicator {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.security.articleIndicator': return new ArticleIndicator();
                case '#microsoft.graph.security.intelligenceProfileIndicator': return new IntelligenceProfileIndicator();
            }
        }
        return new Indicator();
    }

    /**
     * Gets the artifact property value. The artifact property
     * @return Artifact|null
    */
    public function getArtifact(): ?Artifact {
        return $this->artifact;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'artifact' => fn(ParseNode $n) => $o->setArtifact($n->getObjectValue([Artifact::class, 'createFromDiscriminatorValue'])),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(IndicatorSource::class)),
        ]);
    }

    /**
     * Gets the source property value. The source property
     * @return IndicatorSource|null
    */
    public function getSource(): ?IndicatorSource {
        return $this->source;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('artifact', $this->getArtifact());
        $writer->writeEnumValue('source', $this->getSource());
    }

    /**
     * Sets the artifact property value. The artifact property
     * @param Artifact|null $value Value to set for the artifact property.
    */
    public function setArtifact(?Artifact $value): void {
        $this->artifact = $value;
    }

    /**
     * Sets the source property value. The source property
     * @param IndicatorSource|null $value Value to set for the source property.
    */
    public function setSource(?IndicatorSource $value): void {
        $this->source = $value;
    }

}
