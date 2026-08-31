<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EndUserSettings extends ControlConfiguration implements Parsable 
{
    /**
     * @var AccessPackageSuggestionRelatedPeopleInsightLevel|null $relatedPeopleInsightLevel The level of related people insights to show in access package suggestions. The possible values are: disabled, count, countAndNames, unknownFutureValue.
    */
    private ?AccessPackageSuggestionRelatedPeopleInsightLevel $relatedPeopleInsightLevel = null;
    
    /**
     * @var bool|null $showApproverDetailsToMembers Indicates whether approver details are shown to end users. When true, approver information is visible to members.
    */
    private ?bool $showApproverDetailsToMembers = null;
    
    /**
     * Instantiates a new EndUserSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.endUserSettings');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EndUserSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EndUserSettings {
        return new EndUserSettings();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'relatedPeopleInsightLevel' => fn(ParseNode $n) => $o->setRelatedPeopleInsightLevel($n->getEnumValue(AccessPackageSuggestionRelatedPeopleInsightLevel::class)),
            'showApproverDetailsToMembers' => fn(ParseNode $n) => $o->setShowApproverDetailsToMembers($n->getBooleanValue()),
        ]);
    }

    /**
     * Gets the relatedPeopleInsightLevel property value. The level of related people insights to show in access package suggestions. The possible values are: disabled, count, countAndNames, unknownFutureValue.
     * @return AccessPackageSuggestionRelatedPeopleInsightLevel|null
    */
    public function getRelatedPeopleInsightLevel(): ?AccessPackageSuggestionRelatedPeopleInsightLevel {
        return $this->relatedPeopleInsightLevel;
    }

    /**
     * Gets the showApproverDetailsToMembers property value. Indicates whether approver details are shown to end users. When true, approver information is visible to members.
     * @return bool|null
    */
    public function getShowApproverDetailsToMembers(): ?bool {
        return $this->showApproverDetailsToMembers;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('relatedPeopleInsightLevel', $this->getRelatedPeopleInsightLevel());
        $writer->writeBooleanValue('showApproverDetailsToMembers', $this->getShowApproverDetailsToMembers());
    }

    /**
     * Sets the relatedPeopleInsightLevel property value. The level of related people insights to show in access package suggestions. The possible values are: disabled, count, countAndNames, unknownFutureValue.
     * @param AccessPackageSuggestionRelatedPeopleInsightLevel|null $value Value to set for the relatedPeopleInsightLevel property.
    */
    public function setRelatedPeopleInsightLevel(?AccessPackageSuggestionRelatedPeopleInsightLevel $value): void {
        $this->relatedPeopleInsightLevel = $value;
    }

    /**
     * Sets the showApproverDetailsToMembers property value. Indicates whether approver details are shown to end users. When true, approver information is visible to members.
     * @param bool|null $value Value to set for the showApproverDetailsToMembers property.
    */
    public function setShowApproverDetailsToMembers(?bool $value): void {
        $this->showApproverDetailsToMembers = $value;
    }

}
