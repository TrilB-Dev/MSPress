<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class AccessReviewStageSettings implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $decisionsThatWillMoveToNextStage Indicate which decisions will go to the next stage. Can be a subset of Approve, Deny, Recommendation, or NotReviewed. If not provided, all decisions will go to the next stage. Optional.
    */
    private ?array $decisionsThatWillMoveToNextStage = null;
    
    /**
     * @var array<string>|null $dependsOn Defines the sequential or parallel order of the stages and depends on the stageId. Only sequential stages are currently supported. For example, if stageId is 2, then dependsOn must be 1. If stageId is 1, don't specify dependsOn. Required if stageId isn't 1.
    */
    private ?array $dependsOn = null;
    
    /**
     * @var int|null $durationInDays The duration of the stage. Required.  NOTE: The cumulative value of this property across all stages  1. Will override the instanceDurationInDays setting on the accessReviewScheduleDefinition object. 2. Can't exceed the length of one recurrence. That is, if the review recurs weekly, the cumulative durationInDays can't exceed 7.
    */
    private ?int $durationInDays = null;
    
    /**
     * @var array<AccessReviewReviewerScope>|null $fallbackReviewers If provided, the fallback reviewers are asked to complete a review if the primary reviewers don't exist. For example, if managers are selected as reviewers and a principal under review doesn't have a manager in Microsoft Entra ID, the fallback reviewers are asked to review that principal. NOTE: The value of this property overrides the corresponding setting on the accessReviewScheduleDefinition object.
    */
    private ?array $fallbackReviewers = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<AccessReviewRecommendationInsightSetting>|null $recommendationInsightSettings The recommendationInsightSettings property
    */
    private ?array $recommendationInsightSettings = null;
    
    /**
     * @var bool|null $recommendationsEnabled Indicates whether showing recommendations to reviewers is enabled. Required. NOTE: The value of this property overrides override the corresponding setting on the accessReviewScheduleDefinition object.
    */
    private ?bool $recommendationsEnabled = null;
    
    /**
     * @var array<AccessReviewReviewerScope>|null $reviewers Defines who the reviewers are. If none is specified, the review is a self-review (users review their own access).  For examples of options for assigning reviewers, see Assign reviewers to your access review definition using the Microsoft Graph API. NOTE: The value of this property overrides the corresponding setting on the accessReviewScheduleDefinition.
    */
    private ?array $reviewers = null;
    
    /**
     * @var string|null $stageId Unique identifier of the accessReviewStageSettings object. The stageId is used by the dependsOn property to indicate the order of the stages. Required.
    */
    private ?string $stageId = null;
    
    /**
     * Instantiates a new AccessReviewStageSettings and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessReviewStageSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessReviewStageSettings {
        return new AccessReviewStageSettings();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the decisionsThatWillMoveToNextStage property value. Indicate which decisions will go to the next stage. Can be a subset of Approve, Deny, Recommendation, or NotReviewed. If not provided, all decisions will go to the next stage. Optional.
     * @return array<string>|null
    */
    public function getDecisionsThatWillMoveToNextStage(): ?array {
        return $this->decisionsThatWillMoveToNextStage;
    }

    /**
     * Gets the dependsOn property value. Defines the sequential or parallel order of the stages and depends on the stageId. Only sequential stages are currently supported. For example, if stageId is 2, then dependsOn must be 1. If stageId is 1, don't specify dependsOn. Required if stageId isn't 1.
     * @return array<string>|null
    */
    public function getDependsOn(): ?array {
        return $this->dependsOn;
    }

    /**
     * Gets the durationInDays property value. The duration of the stage. Required.  NOTE: The cumulative value of this property across all stages  1. Will override the instanceDurationInDays setting on the accessReviewScheduleDefinition object. 2. Can't exceed the length of one recurrence. That is, if the review recurs weekly, the cumulative durationInDays can't exceed 7.
     * @return int|null
    */
    public function getDurationInDays(): ?int {
        return $this->durationInDays;
    }

    /**
     * Gets the fallbackReviewers property value. If provided, the fallback reviewers are asked to complete a review if the primary reviewers don't exist. For example, if managers are selected as reviewers and a principal under review doesn't have a manager in Microsoft Entra ID, the fallback reviewers are asked to review that principal. NOTE: The value of this property overrides the corresponding setting on the accessReviewScheduleDefinition object.
     * @return array<AccessReviewReviewerScope>|null
    */
    public function getFallbackReviewers(): ?array {
        return $this->fallbackReviewers;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'decisionsThatWillMoveToNextStage' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDecisionsThatWillMoveToNextStage($val);
            },
            'dependsOn' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDependsOn($val);
            },
            'durationInDays' => fn(ParseNode $n) => $o->setDurationInDays($n->getIntegerValue()),
            'fallbackReviewers' => fn(ParseNode $n) => $o->setFallbackReviewers($n->getCollectionOfObjectValues([AccessReviewReviewerScope::class, 'createFromDiscriminatorValue'])),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'recommendationInsightSettings' => fn(ParseNode $n) => $o->setRecommendationInsightSettings($n->getCollectionOfObjectValues([AccessReviewRecommendationInsightSetting::class, 'createFromDiscriminatorValue'])),
            'recommendationsEnabled' => fn(ParseNode $n) => $o->setRecommendationsEnabled($n->getBooleanValue()),
            'reviewers' => fn(ParseNode $n) => $o->setReviewers($n->getCollectionOfObjectValues([AccessReviewReviewerScope::class, 'createFromDiscriminatorValue'])),
            'stageId' => fn(ParseNode $n) => $o->setStageId($n->getStringValue()),
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
     * Gets the recommendationInsightSettings property value. The recommendationInsightSettings property
     * @return array<AccessReviewRecommendationInsightSetting>|null
    */
    public function getRecommendationInsightSettings(): ?array {
        return $this->recommendationInsightSettings;
    }

    /**
     * Gets the recommendationsEnabled property value. Indicates whether showing recommendations to reviewers is enabled. Required. NOTE: The value of this property overrides override the corresponding setting on the accessReviewScheduleDefinition object.
     * @return bool|null
    */
    public function getRecommendationsEnabled(): ?bool {
        return $this->recommendationsEnabled;
    }

    /**
     * Gets the reviewers property value. Defines who the reviewers are. If none is specified, the review is a self-review (users review their own access).  For examples of options for assigning reviewers, see Assign reviewers to your access review definition using the Microsoft Graph API. NOTE: The value of this property overrides the corresponding setting on the accessReviewScheduleDefinition.
     * @return array<AccessReviewReviewerScope>|null
    */
    public function getReviewers(): ?array {
        return $this->reviewers;
    }

    /**
     * Gets the stageId property value. Unique identifier of the accessReviewStageSettings object. The stageId is used by the dependsOn property to indicate the order of the stages. Required.
     * @return string|null
    */
    public function getStageId(): ?string {
        return $this->stageId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('decisionsThatWillMoveToNextStage', $this->getDecisionsThatWillMoveToNextStage());
        $writer->writeCollectionOfPrimitiveValues('dependsOn', $this->getDependsOn());
        $writer->writeIntegerValue('durationInDays', $this->getDurationInDays());
        $writer->writeCollectionOfObjectValues('fallbackReviewers', $this->getFallbackReviewers());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfObjectValues('recommendationInsightSettings', $this->getRecommendationInsightSettings());
        $writer->writeBooleanValue('recommendationsEnabled', $this->getRecommendationsEnabled());
        $writer->writeCollectionOfObjectValues('reviewers', $this->getReviewers());
        $writer->writeStringValue('stageId', $this->getStageId());
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
     * Sets the decisionsThatWillMoveToNextStage property value. Indicate which decisions will go to the next stage. Can be a subset of Approve, Deny, Recommendation, or NotReviewed. If not provided, all decisions will go to the next stage. Optional.
     * @param array<string>|null $value Value to set for the decisionsThatWillMoveToNextStage property.
    */
    public function setDecisionsThatWillMoveToNextStage(?array $value): void {
        $this->decisionsThatWillMoveToNextStage = $value;
    }

    /**
     * Sets the dependsOn property value. Defines the sequential or parallel order of the stages and depends on the stageId. Only sequential stages are currently supported. For example, if stageId is 2, then dependsOn must be 1. If stageId is 1, don't specify dependsOn. Required if stageId isn't 1.
     * @param array<string>|null $value Value to set for the dependsOn property.
    */
    public function setDependsOn(?array $value): void {
        $this->dependsOn = $value;
    }

    /**
     * Sets the durationInDays property value. The duration of the stage. Required.  NOTE: The cumulative value of this property across all stages  1. Will override the instanceDurationInDays setting on the accessReviewScheduleDefinition object. 2. Can't exceed the length of one recurrence. That is, if the review recurs weekly, the cumulative durationInDays can't exceed 7.
     * @param int|null $value Value to set for the durationInDays property.
    */
    public function setDurationInDays(?int $value): void {
        $this->durationInDays = $value;
    }

    /**
     * Sets the fallbackReviewers property value. If provided, the fallback reviewers are asked to complete a review if the primary reviewers don't exist. For example, if managers are selected as reviewers and a principal under review doesn't have a manager in Microsoft Entra ID, the fallback reviewers are asked to review that principal. NOTE: The value of this property overrides the corresponding setting on the accessReviewScheduleDefinition object.
     * @param array<AccessReviewReviewerScope>|null $value Value to set for the fallbackReviewers property.
    */
    public function setFallbackReviewers(?array $value): void {
        $this->fallbackReviewers = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the recommendationInsightSettings property value. The recommendationInsightSettings property
     * @param array<AccessReviewRecommendationInsightSetting>|null $value Value to set for the recommendationInsightSettings property.
    */
    public function setRecommendationInsightSettings(?array $value): void {
        $this->recommendationInsightSettings = $value;
    }

    /**
     * Sets the recommendationsEnabled property value. Indicates whether showing recommendations to reviewers is enabled. Required. NOTE: The value of this property overrides override the corresponding setting on the accessReviewScheduleDefinition object.
     * @param bool|null $value Value to set for the recommendationsEnabled property.
    */
    public function setRecommendationsEnabled(?bool $value): void {
        $this->recommendationsEnabled = $value;
    }

    /**
     * Sets the reviewers property value. Defines who the reviewers are. If none is specified, the review is a self-review (users review their own access).  For examples of options for assigning reviewers, see Assign reviewers to your access review definition using the Microsoft Graph API. NOTE: The value of this property overrides the corresponding setting on the accessReviewScheduleDefinition.
     * @param array<AccessReviewReviewerScope>|null $value Value to set for the reviewers property.
    */
    public function setReviewers(?array $value): void {
        $this->reviewers = $value;
    }

    /**
     * Sets the stageId property value. Unique identifier of the accessReviewStageSettings object. The stageId is used by the dependsOn property to indicate the order of the stages. Required.
     * @param string|null $value Value to set for the stageId property.
    */
    public function setStageId(?string $value): void {
        $this->stageId = $value;
    }

}
