<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance\GroupBasedSubjectSet;
use MSPress\Includes\MSGraph\Kiota\Models\IdentityGovernance\RuleBasedSubjectSet;

class SubjectSet implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new SubjectSet and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SubjectSet
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SubjectSet {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.attributeRuleMembers': return new AttributeRuleMembers();
                case '#microsoft.graph.connectedOrganizationMembers': return new ConnectedOrganizationMembers();
                case '#microsoft.graph.externalSponsors': return new ExternalSponsors();
                case '#microsoft.graph.groupMembers': return new GroupMembers();
                case '#microsoft.graph.identityGovernance.groupBasedSubjectSet': return new GroupBasedSubjectSet();
                case '#microsoft.graph.identityGovernance.ruleBasedSubjectSet': return new RuleBasedSubjectSet();
                case '#microsoft.graph.internalSponsors': return new InternalSponsors();
                case '#microsoft.graph.requestorManager': return new RequestorManager();
                case '#microsoft.graph.singleServicePrincipal': return new SingleServicePrincipal();
                case '#microsoft.graph.singleUser': return new SingleUser();
                case '#microsoft.graph.targetAgentIdentitySponsorsOrOwners': return new TargetAgentIdentitySponsorsOrOwners();
                case '#microsoft.graph.targetApplicationOwners': return new TargetApplicationOwners();
                case '#microsoft.graph.targetManager': return new TargetManager();
                case '#microsoft.graph.targetUserSponsors': return new TargetUserSponsors();
            }
        }
        return new SubjectSet();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
