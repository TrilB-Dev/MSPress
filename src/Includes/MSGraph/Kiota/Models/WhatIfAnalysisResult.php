<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WhatIfAnalysisResult extends ConditionalAccessPolicy implements Parsable 
{
    /**
     * @var WhatIfAnalysisReasons|null $analysisReasons The analysisReasons property
    */
    private ?WhatIfAnalysisReasons $analysisReasons = null;
    
    /**
     * @var bool|null $policyApplies Specifies whether the policy applies to the sign-in properties provided in the request body. If policyApplies is true, the policy applies to the sign-in based on the sign-in properties provided. If policyApplies is false, the policy doesn't apply to the sign-in based on the sign-in properties provided and the analysisReasons property is populated to show the reason for the policy not applying.
    */
    private ?bool $policyApplies = null;
    
    /**
     * Instantiates a new WhatIfAnalysisResult and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.whatIfAnalysisResult');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WhatIfAnalysisResult
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WhatIfAnalysisResult {
        return new WhatIfAnalysisResult();
    }

    /**
     * Gets the analysisReasons property value. The analysisReasons property
     * @return WhatIfAnalysisReasons|null
    */
    public function getAnalysisReasons(): ?WhatIfAnalysisReasons {
        return $this->analysisReasons;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'analysisReasons' => fn(ParseNode $n) => $o->setAnalysisReasons($n->getEnumValue(WhatIfAnalysisReasons::class)),
            'policyApplies' => fn(ParseNode $n) => $o->setPolicyApplies($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the policyApplies property value. Specifies whether the policy applies to the sign-in properties provided in the request body. If policyApplies is true, the policy applies to the sign-in based on the sign-in properties provided. If policyApplies is false, the policy doesn't apply to the sign-in based on the sign-in properties provided and the analysisReasons property is populated to show the reason for the policy not applying.
     * @return bool|null
    */
    public function getPolicyApplies(): ?bool {
        return $this->policyApplies;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('analysisReasons', $this->getAnalysisReasons());
        $writer->writeBooleanValue('policyApplies', $this->getPolicyApplies());
    }

    /**
     * Sets the analysisReasons property value. The analysisReasons property
     * @param WhatIfAnalysisReasons|null $value Value to set for the analysisReasons property.
    */
    public function setAnalysisReasons(?WhatIfAnalysisReasons $value): void {
        $this->analysisReasons = $value;
    }

    /**
     * Sets the policyApplies property value. Specifies whether the policy applies to the sign-in properties provided in the request body. If policyApplies is true, the policy applies to the sign-in based on the sign-in properties provided. If policyApplies is false, the policy doesn't apply to the sign-in based on the sign-in properties provided and the analysisReasons property is populated to show the reason for the policy not applying.
     * @param bool|null $value Value to set for the policyApplies property.
    */
    public function setPolicyApplies(?bool $value): void {
        $this->policyApplies = $value;
    }

}
