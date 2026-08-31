<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class SpeakerAssignmentSubmission extends Entity implements Parsable 
{
    /**
     * @var string|null $assignmentId ID of the assignment with which this submission is associated.
    */
    private ?string $assignmentId = null;
    
    /**
     * @var int|null $averageWordsPerMinutePace The average speaking pace of the student, measured in words per minute.
    */
    private ?int $averageWordsPerMinutePace = null;
    
    /**
     * @var string|null $classId ID of the class this speaker progress is associated with.
    */
    private ?string $classId = null;
    
    /**
     * @var int|null $fillerWordsOccurrencesCount The number of times the student was flagged by Speaker Coach for using a filler word.
    */
    private ?int $fillerWordsOccurrencesCount = null;
    
    /**
     * @var int|null $incorrectCameraDistanceOccurrencesCount The number of times the student was flagged by Speaker Coach for being either too close or too far away from the camera.
    */
    private ?int $incorrectCameraDistanceOccurrencesCount = null;
    
    /**
     * @var float|null $lengthOfSubmissionInSeconds The length of the student submission in seconds.
    */
    private ?float $lengthOfSubmissionInSeconds = null;
    
    /**
     * @var int|null $lostEyeContactOccurrencesCount The number of times the student was flagged by Speaker Coach for losing eye contact with the camera.
    */
    private ?int $lostEyeContactOccurrencesCount = null;
    
    /**
     * @var int|null $monotoneOccurrencesCount The number of times the student was flagged by Speaker Coach for speaking in monotone.
    */
    private ?int $monotoneOccurrencesCount = null;
    
    /**
     * @var int|null $nonInclusiveLanguageOccurrencesCount The number of times the student was flagged by Speaker Coach for using non-inclusive or sensitive language.
    */
    private ?int $nonInclusiveLanguageOccurrencesCount = null;
    
    /**
     * @var int|null $obstructedViewOccurrencesCount The number of times the student was flagged by Speaker Coach for obstructing the view of their face.
    */
    private ?int $obstructedViewOccurrencesCount = null;
    
    /**
     * @var int|null $repetitiveLanguageOccurrencesCount The number of times the student was flagged by Speaker Coach for using repetitive language.
    */
    private ?int $repetitiveLanguageOccurrencesCount = null;
    
    /**
     * @var string|null $studentId ID of the user this speaker progress is associated with.
    */
    private ?string $studentId = null;
    
    /**
     * @var DateTime|null $submissionDateTime Date and time of the submission this speaker progress is associated with. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $submissionDateTime = null;
    
    /**
     * @var string|null $submissionId ID of the submission this speaker progress is associated with.
    */
    private ?string $submissionId = null;
    
    /**
     * @var array<string>|null $topFillerWords The filler words used most by the student.
    */
    private ?array $topFillerWords = null;
    
    /**
     * @var array<string>|null $topMispronouncedWords The words mispronounced most by the student.
    */
    private ?array $topMispronouncedWords = null;
    
    /**
     * @var array<string>|null $topNonInclusiveWordsAndPhrases The non-inclusive or sensitive words and phrases most used by the student.
    */
    private ?array $topNonInclusiveWordsAndPhrases = null;
    
    /**
     * @var array<string>|null $topRepetitiveWordsAndPhrases The words and phrases most repeated by the student.
    */
    private ?array $topRepetitiveWordsAndPhrases = null;
    
    /**
     * @var int|null $wordsSpokenCount Total number of words spoken by the student in the submission.
    */
    private ?int $wordsSpokenCount = null;
    
    /**
     * Instantiates a new SpeakerAssignmentSubmission and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SpeakerAssignmentSubmission
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SpeakerAssignmentSubmission {
        return new SpeakerAssignmentSubmission();
    }

    /**
     * Gets the assignmentId property value. ID of the assignment with which this submission is associated.
     * @return string|null
    */
    public function getAssignmentId(): ?string {
        return $this->assignmentId;
    }

    /**
     * Gets the averageWordsPerMinutePace property value. The average speaking pace of the student, measured in words per minute.
     * @return int|null
    */
    public function getAverageWordsPerMinutePace(): ?int {
        return $this->averageWordsPerMinutePace;
    }

    /**
     * Gets the classId property value. ID of the class this speaker progress is associated with.
     * @return string|null
    */
    public function getClassId(): ?string {
        return $this->classId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'assignmentId' => fn(ParseNode $n) => $o->setAssignmentId($n->getStringValue()),
            'averageWordsPerMinutePace' => fn(ParseNode $n) => $o->setAverageWordsPerMinutePace($n->getIntegerValue()),
            'classId' => fn(ParseNode $n) => $o->setClassId($n->getStringValue()),
            'fillerWordsOccurrencesCount' => fn(ParseNode $n) => $o->setFillerWordsOccurrencesCount($n->getIntegerValue()),
            'incorrectCameraDistanceOccurrencesCount' => fn(ParseNode $n) => $o->setIncorrectCameraDistanceOccurrencesCount($n->getIntegerValue()),
            'lengthOfSubmissionInSeconds' => fn(ParseNode $n) => $o->setLengthOfSubmissionInSeconds($n->getFloatValue()),
            'lostEyeContactOccurrencesCount' => fn(ParseNode $n) => $o->setLostEyeContactOccurrencesCount($n->getIntegerValue()),
            'monotoneOccurrencesCount' => fn(ParseNode $n) => $o->setMonotoneOccurrencesCount($n->getIntegerValue()),
            'nonInclusiveLanguageOccurrencesCount' => fn(ParseNode $n) => $o->setNonInclusiveLanguageOccurrencesCount($n->getIntegerValue()),
            'obstructedViewOccurrencesCount' => fn(ParseNode $n) => $o->setObstructedViewOccurrencesCount($n->getIntegerValue()),
            'repetitiveLanguageOccurrencesCount' => fn(ParseNode $n) => $o->setRepetitiveLanguageOccurrencesCount($n->getIntegerValue()),
            'studentId' => fn(ParseNode $n) => $o->setStudentId($n->getStringValue()),
            'submissionDateTime' => fn(ParseNode $n) => $o->setSubmissionDateTime($n->getDateTimeValue()),
            'submissionId' => fn(ParseNode $n) => $o->setSubmissionId($n->getStringValue()),
            'topFillerWords' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTopFillerWords($val);
            },
            'topMispronouncedWords' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTopMispronouncedWords($val);
            },
            'topNonInclusiveWordsAndPhrases' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTopNonInclusiveWordsAndPhrases($val);
            },
            'topRepetitiveWordsAndPhrases' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTopRepetitiveWordsAndPhrases($val);
            },
            'wordsSpokenCount' => fn(ParseNode $n) => $o->setWordsSpokenCount($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the fillerWordsOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for using a filler word.
     * @return int|null
    */
    public function getFillerWordsOccurrencesCount(): ?int {
        return $this->fillerWordsOccurrencesCount;
    }

    /**
     * Gets the incorrectCameraDistanceOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for being either too close or too far away from the camera.
     * @return int|null
    */
    public function getIncorrectCameraDistanceOccurrencesCount(): ?int {
        return $this->incorrectCameraDistanceOccurrencesCount;
    }

    /**
     * Gets the lengthOfSubmissionInSeconds property value. The length of the student submission in seconds.
     * @return float|null
    */
    public function getLengthOfSubmissionInSeconds(): ?float {
        return $this->lengthOfSubmissionInSeconds;
    }

    /**
     * Gets the lostEyeContactOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for losing eye contact with the camera.
     * @return int|null
    */
    public function getLostEyeContactOccurrencesCount(): ?int {
        return $this->lostEyeContactOccurrencesCount;
    }

    /**
     * Gets the monotoneOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for speaking in monotone.
     * @return int|null
    */
    public function getMonotoneOccurrencesCount(): ?int {
        return $this->monotoneOccurrencesCount;
    }

    /**
     * Gets the nonInclusiveLanguageOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for using non-inclusive or sensitive language.
     * @return int|null
    */
    public function getNonInclusiveLanguageOccurrencesCount(): ?int {
        return $this->nonInclusiveLanguageOccurrencesCount;
    }

    /**
     * Gets the obstructedViewOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for obstructing the view of their face.
     * @return int|null
    */
    public function getObstructedViewOccurrencesCount(): ?int {
        return $this->obstructedViewOccurrencesCount;
    }

    /**
     * Gets the repetitiveLanguageOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for using repetitive language.
     * @return int|null
    */
    public function getRepetitiveLanguageOccurrencesCount(): ?int {
        return $this->repetitiveLanguageOccurrencesCount;
    }

    /**
     * Gets the studentId property value. ID of the user this speaker progress is associated with.
     * @return string|null
    */
    public function getStudentId(): ?string {
        return $this->studentId;
    }

    /**
     * Gets the submissionDateTime property value. Date and time of the submission this speaker progress is associated with. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getSubmissionDateTime(): ?DateTime {
        return $this->submissionDateTime;
    }

    /**
     * Gets the submissionId property value. ID of the submission this speaker progress is associated with.
     * @return string|null
    */
    public function getSubmissionId(): ?string {
        return $this->submissionId;
    }

    /**
     * Gets the topFillerWords property value. The filler words used most by the student.
     * @return array<string>|null
    */
    public function getTopFillerWords(): ?array {
        return $this->topFillerWords;
    }

    /**
     * Gets the topMispronouncedWords property value. The words mispronounced most by the student.
     * @return array<string>|null
    */
    public function getTopMispronouncedWords(): ?array {
        return $this->topMispronouncedWords;
    }

    /**
     * Gets the topNonInclusiveWordsAndPhrases property value. The non-inclusive or sensitive words and phrases most used by the student.
     * @return array<string>|null
    */
    public function getTopNonInclusiveWordsAndPhrases(): ?array {
        return $this->topNonInclusiveWordsAndPhrases;
    }

    /**
     * Gets the topRepetitiveWordsAndPhrases property value. The words and phrases most repeated by the student.
     * @return array<string>|null
    */
    public function getTopRepetitiveWordsAndPhrases(): ?array {
        return $this->topRepetitiveWordsAndPhrases;
    }

    /**
     * Gets the wordsSpokenCount property value. Total number of words spoken by the student in the submission.
     * @return int|null
    */
    public function getWordsSpokenCount(): ?int {
        return $this->wordsSpokenCount;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('assignmentId', $this->getAssignmentId());
        $writer->writeIntegerValue('averageWordsPerMinutePace', $this->getAverageWordsPerMinutePace());
        $writer->writeStringValue('classId', $this->getClassId());
        $writer->writeIntegerValue('fillerWordsOccurrencesCount', $this->getFillerWordsOccurrencesCount());
        $writer->writeIntegerValue('incorrectCameraDistanceOccurrencesCount', $this->getIncorrectCameraDistanceOccurrencesCount());
        $writer->writeFloatValue('lengthOfSubmissionInSeconds', $this->getLengthOfSubmissionInSeconds());
        $writer->writeIntegerValue('lostEyeContactOccurrencesCount', $this->getLostEyeContactOccurrencesCount());
        $writer->writeIntegerValue('monotoneOccurrencesCount', $this->getMonotoneOccurrencesCount());
        $writer->writeIntegerValue('nonInclusiveLanguageOccurrencesCount', $this->getNonInclusiveLanguageOccurrencesCount());
        $writer->writeIntegerValue('obstructedViewOccurrencesCount', $this->getObstructedViewOccurrencesCount());
        $writer->writeIntegerValue('repetitiveLanguageOccurrencesCount', $this->getRepetitiveLanguageOccurrencesCount());
        $writer->writeStringValue('studentId', $this->getStudentId());
        $writer->writeDateTimeValue('submissionDateTime', $this->getSubmissionDateTime());
        $writer->writeStringValue('submissionId', $this->getSubmissionId());
        $writer->writeCollectionOfPrimitiveValues('topFillerWords', $this->getTopFillerWords());
        $writer->writeCollectionOfPrimitiveValues('topMispronouncedWords', $this->getTopMispronouncedWords());
        $writer->writeCollectionOfPrimitiveValues('topNonInclusiveWordsAndPhrases', $this->getTopNonInclusiveWordsAndPhrases());
        $writer->writeCollectionOfPrimitiveValues('topRepetitiveWordsAndPhrases', $this->getTopRepetitiveWordsAndPhrases());
        $writer->writeIntegerValue('wordsSpokenCount', $this->getWordsSpokenCount());
    }

    /**
     * Sets the assignmentId property value. ID of the assignment with which this submission is associated.
     * @param string|null $value Value to set for the assignmentId property.
    */
    public function setAssignmentId(?string $value): void {
        $this->assignmentId = $value;
    }

    /**
     * Sets the averageWordsPerMinutePace property value. The average speaking pace of the student, measured in words per minute.
     * @param int|null $value Value to set for the averageWordsPerMinutePace property.
    */
    public function setAverageWordsPerMinutePace(?int $value): void {
        $this->averageWordsPerMinutePace = $value;
    }

    /**
     * Sets the classId property value. ID of the class this speaker progress is associated with.
     * @param string|null $value Value to set for the classId property.
    */
    public function setClassId(?string $value): void {
        $this->classId = $value;
    }

    /**
     * Sets the fillerWordsOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for using a filler word.
     * @param int|null $value Value to set for the fillerWordsOccurrencesCount property.
    */
    public function setFillerWordsOccurrencesCount(?int $value): void {
        $this->fillerWordsOccurrencesCount = $value;
    }

    /**
     * Sets the incorrectCameraDistanceOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for being either too close or too far away from the camera.
     * @param int|null $value Value to set for the incorrectCameraDistanceOccurrencesCount property.
    */
    public function setIncorrectCameraDistanceOccurrencesCount(?int $value): void {
        $this->incorrectCameraDistanceOccurrencesCount = $value;
    }

    /**
     * Sets the lengthOfSubmissionInSeconds property value. The length of the student submission in seconds.
     * @param float|null $value Value to set for the lengthOfSubmissionInSeconds property.
    */
    public function setLengthOfSubmissionInSeconds(?float $value): void {
        $this->lengthOfSubmissionInSeconds = $value;
    }

    /**
     * Sets the lostEyeContactOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for losing eye contact with the camera.
     * @param int|null $value Value to set for the lostEyeContactOccurrencesCount property.
    */
    public function setLostEyeContactOccurrencesCount(?int $value): void {
        $this->lostEyeContactOccurrencesCount = $value;
    }

    /**
     * Sets the monotoneOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for speaking in monotone.
     * @param int|null $value Value to set for the monotoneOccurrencesCount property.
    */
    public function setMonotoneOccurrencesCount(?int $value): void {
        $this->monotoneOccurrencesCount = $value;
    }

    /**
     * Sets the nonInclusiveLanguageOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for using non-inclusive or sensitive language.
     * @param int|null $value Value to set for the nonInclusiveLanguageOccurrencesCount property.
    */
    public function setNonInclusiveLanguageOccurrencesCount(?int $value): void {
        $this->nonInclusiveLanguageOccurrencesCount = $value;
    }

    /**
     * Sets the obstructedViewOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for obstructing the view of their face.
     * @param int|null $value Value to set for the obstructedViewOccurrencesCount property.
    */
    public function setObstructedViewOccurrencesCount(?int $value): void {
        $this->obstructedViewOccurrencesCount = $value;
    }

    /**
     * Sets the repetitiveLanguageOccurrencesCount property value. The number of times the student was flagged by Speaker Coach for using repetitive language.
     * @param int|null $value Value to set for the repetitiveLanguageOccurrencesCount property.
    */
    public function setRepetitiveLanguageOccurrencesCount(?int $value): void {
        $this->repetitiveLanguageOccurrencesCount = $value;
    }

    /**
     * Sets the studentId property value. ID of the user this speaker progress is associated with.
     * @param string|null $value Value to set for the studentId property.
    */
    public function setStudentId(?string $value): void {
        $this->studentId = $value;
    }

    /**
     * Sets the submissionDateTime property value. Date and time of the submission this speaker progress is associated with. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the submissionDateTime property.
    */
    public function setSubmissionDateTime(?DateTime $value): void {
        $this->submissionDateTime = $value;
    }

    /**
     * Sets the submissionId property value. ID of the submission this speaker progress is associated with.
     * @param string|null $value Value to set for the submissionId property.
    */
    public function setSubmissionId(?string $value): void {
        $this->submissionId = $value;
    }

    /**
     * Sets the topFillerWords property value. The filler words used most by the student.
     * @param array<string>|null $value Value to set for the topFillerWords property.
    */
    public function setTopFillerWords(?array $value): void {
        $this->topFillerWords = $value;
    }

    /**
     * Sets the topMispronouncedWords property value. The words mispronounced most by the student.
     * @param array<string>|null $value Value to set for the topMispronouncedWords property.
    */
    public function setTopMispronouncedWords(?array $value): void {
        $this->topMispronouncedWords = $value;
    }

    /**
     * Sets the topNonInclusiveWordsAndPhrases property value. The non-inclusive or sensitive words and phrases most used by the student.
     * @param array<string>|null $value Value to set for the topNonInclusiveWordsAndPhrases property.
    */
    public function setTopNonInclusiveWordsAndPhrases(?array $value): void {
        $this->topNonInclusiveWordsAndPhrases = $value;
    }

    /**
     * Sets the topRepetitiveWordsAndPhrases property value. The words and phrases most repeated by the student.
     * @param array<string>|null $value Value to set for the topRepetitiveWordsAndPhrases property.
    */
    public function setTopRepetitiveWordsAndPhrases(?array $value): void {
        $this->topRepetitiveWordsAndPhrases = $value;
    }

    /**
     * Sets the wordsSpokenCount property value. Total number of words spoken by the student in the submission.
     * @param int|null $value Value to set for the wordsSpokenCount property.
    */
    public function setWordsSpokenCount(?int $value): void {
        $this->wordsSpokenCount = $value;
    }

}
