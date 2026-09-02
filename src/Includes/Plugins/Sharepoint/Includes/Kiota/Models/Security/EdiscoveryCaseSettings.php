<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

class EdiscoveryCaseSettings extends Entity implements Parsable 
{
    /**
     * @var CaseType|null $caseType The caseType property
    */
    private ?CaseType $caseType = null;
    
    /**
     * @var OcrSettings|null $ocr The OCR (Optical Character Recognition) settings for the case.
    */
    private ?OcrSettings $ocr = null;
    
    /**
     * @var RedundancyDetectionSettings|null $redundancyDetection The redundancy (near duplicate and email threading) detection settings for the case.
    */
    private ?RedundancyDetectionSettings $redundancyDetection = null;
    
    /**
     * @var ReviewSetSettings|null $reviewSetSettings The settings of the review set for the case. The possible values are: none, disableGrouping, unknownFutureValue.
    */
    private ?ReviewSetSettings $reviewSetSettings = null;
    
    /**
     * @var TopicModelingSettings|null $topicModeling The Topic Modeling (Themes) settings for the case.
    */
    private ?TopicModelingSettings $topicModeling = null;
    
    /**
     * Instantiates a new EdiscoveryCaseSettings and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EdiscoveryCaseSettings
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EdiscoveryCaseSettings {
        return new EdiscoveryCaseSettings();
    }

    /**
     * Gets the caseType property value. The caseType property
     * @return CaseType|null
    */
    public function getCaseType(): ?CaseType {
        return $this->caseType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'caseType' => fn(ParseNode $n) => $o->setCaseType($n->getEnumValue(CaseType::class)),
            'ocr' => fn(ParseNode $n) => $o->setOcr($n->getObjectValue([OcrSettings::class, 'createFromDiscriminatorValue'])),
            'redundancyDetection' => fn(ParseNode $n) => $o->setRedundancyDetection($n->getObjectValue([RedundancyDetectionSettings::class, 'createFromDiscriminatorValue'])),
            'reviewSetSettings' => fn(ParseNode $n) => $o->setReviewSetSettings($n->getEnumValue(ReviewSetSettings::class)),
            'topicModeling' => fn(ParseNode $n) => $o->setTopicModeling($n->getObjectValue([TopicModelingSettings::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the ocr property value. The OCR (Optical Character Recognition) settings for the case.
     * @return OcrSettings|null
    */
    public function getOcr(): ?OcrSettings {
        return $this->ocr;
    }

    /**
     * Gets the redundancyDetection property value. The redundancy (near duplicate and email threading) detection settings for the case.
     * @return RedundancyDetectionSettings|null
    */
    public function getRedundancyDetection(): ?RedundancyDetectionSettings {
        return $this->redundancyDetection;
    }

    /**
     * Gets the reviewSetSettings property value. The settings of the review set for the case. The possible values are: none, disableGrouping, unknownFutureValue.
     * @return ReviewSetSettings|null
    */
    public function getReviewSetSettings(): ?ReviewSetSettings {
        return $this->reviewSetSettings;
    }

    /**
     * Gets the topicModeling property value. The Topic Modeling (Themes) settings for the case.
     * @return TopicModelingSettings|null
    */
    public function getTopicModeling(): ?TopicModelingSettings {
        return $this->topicModeling;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('caseType', $this->getCaseType());
        $writer->writeObjectValue('ocr', $this->getOcr());
        $writer->writeObjectValue('redundancyDetection', $this->getRedundancyDetection());
        $writer->writeEnumValue('reviewSetSettings', $this->getReviewSetSettings());
        $writer->writeObjectValue('topicModeling', $this->getTopicModeling());
    }

    /**
     * Sets the caseType property value. The caseType property
     * @param CaseType|null $value Value to set for the caseType property.
    */
    public function setCaseType(?CaseType $value): void {
        $this->caseType = $value;
    }

    /**
     * Sets the ocr property value. The OCR (Optical Character Recognition) settings for the case.
     * @param OcrSettings|null $value Value to set for the ocr property.
    */
    public function setOcr(?OcrSettings $value): void {
        $this->ocr = $value;
    }

    /**
     * Sets the redundancyDetection property value. The redundancy (near duplicate and email threading) detection settings for the case.
     * @param RedundancyDetectionSettings|null $value Value to set for the redundancyDetection property.
    */
    public function setRedundancyDetection(?RedundancyDetectionSettings $value): void {
        $this->redundancyDetection = $value;
    }

    /**
     * Sets the reviewSetSettings property value. The settings of the review set for the case. The possible values are: none, disableGrouping, unknownFutureValue.
     * @param ReviewSetSettings|null $value Value to set for the reviewSetSettings property.
    */
    public function setReviewSetSettings(?ReviewSetSettings $value): void {
        $this->reviewSetSettings = $value;
    }

    /**
     * Sets the topicModeling property value. The Topic Modeling (Themes) settings for the case.
     * @param TopicModelingSettings|null $value Value to set for the topicModeling property.
    */
    public function setTopicModeling(?TopicModelingSettings $value): void {
        $this->topicModeling = $value;
    }

}
