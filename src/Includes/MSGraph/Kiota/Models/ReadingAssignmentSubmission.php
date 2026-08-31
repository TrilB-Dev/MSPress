<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ReadingAssignmentSubmission extends Entity implements Parsable 
{
    /**
     * @var float|null $accuracyScore Accuracy score of the reading progress.
    */
    private ?float $accuracyScore = null;
    
    /**
     * @var string|null $action Indicates whether the submission is an attempt by the student or a miscue edit done by the educator. The possible values are Attempt and EditMiscue.
    */
    private ?string $action = null;
    
    /**
     * @var string|null $assignmentId ID of the assignment with which this submission is associated.
    */
    private ?string $assignmentId = null;
    
    /**
     * @var array<ChallengingWord>|null $challengingWords List of words that the student found challenging during the reading session.
    */
    private ?array $challengingWords = null;
    
    /**
     * @var string|null $classId ID of the class this reading progress is associated with.
    */
    private ?string $classId = null;
    
    /**
     * @var int|null $insertions Insertions of the reading progress.
    */
    private ?int $insertions = null;
    
    /**
     * @var int|null $mispronunciations Mispronunciations of the reading progress.
    */
    private ?int $mispronunciations = null;
    
    /**
     * @var int|null $missedExclamationMarks Number of exclamation marks missed in the reading passage.
    */
    private ?int $missedExclamationMarks = null;
    
    /**
     * @var int|null $missedPeriods Number of periods missed in the reading passage.
    */
    private ?int $missedPeriods = null;
    
    /**
     * @var int|null $missedQuestionMarks Number of question marks missed in the reading passage.
    */
    private ?int $missedQuestionMarks = null;
    
    /**
     * @var int|null $missedShorts Number of short words missed during the reading session.
    */
    private ?int $missedShorts = null;
    
    /**
     * @var float|null $monotoneScore Score that reflects the student's use of intonation and expression. Lower scores indicate more monotone reading.
    */
    private ?float $monotoneScore = null;
    
    /**
     * @var int|null $omissions Omissions of the reading progress.
    */
    private ?int $omissions = null;
    
    /**
     * @var int|null $repetitions Number of times the student repeated words or phrases during the reading session.
    */
    private ?int $repetitions = null;
    
    /**
     * @var int|null $selfCorrections Number of times the student self-corrected their reading errors.
    */
    private ?int $selfCorrections = null;
    
    /**
     * @var string|null $studentId ID of the user this reading progress is associated with.
    */
    private ?string $studentId = null;
    
    /**
     * @var DateTime|null $submissionDateTime Date and time of the submission this reading progress is associated with. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
    */
    private ?DateTime $submissionDateTime = null;
    
    /**
     * @var string|null $submissionId ID of the submission this reading progress is associated with.
    */
    private ?string $submissionId = null;
    
    /**
     * @var int|null $unexpectedPauses Number of unexpected pauses made during the reading session.
    */
    private ?int $unexpectedPauses = null;
    
    /**
     * @var int|null $wordCount Words count of the reading progress.
    */
    private ?int $wordCount = null;
    
    /**
     * @var float|null $wordsPerMinute Words per minute of the reading progress.
    */
    private ?float $wordsPerMinute = null;
    
    /**
     * Instantiates a new ReadingAssignmentSubmission and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ReadingAssignmentSubmission
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ReadingAssignmentSubmission {
        return new ReadingAssignmentSubmission();
    }

    /**
     * Gets the accuracyScore property value. Accuracy score of the reading progress.
     * @return float|null
    */
    public function getAccuracyScore(): ?float {
        return $this->accuracyScore;
    }

    /**
     * Gets the action property value. Indicates whether the submission is an attempt by the student or a miscue edit done by the educator. The possible values are Attempt and EditMiscue.
     * @return string|null
    */
    public function getAction(): ?string {
        return $this->action;
    }

    /**
     * Gets the assignmentId property value. ID of the assignment with which this submission is associated.
     * @return string|null
    */
    public function getAssignmentId(): ?string {
        return $this->assignmentId;
    }

    /**
     * Gets the challengingWords property value. List of words that the student found challenging during the reading session.
     * @return array<ChallengingWord>|null
    */
    public function getChallengingWords(): ?array {
        return $this->challengingWords;
    }

    /**
     * Gets the classId property value. ID of the class this reading progress is associated with.
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
            'accuracyScore' => fn(ParseNode $n) => $o->setAccuracyScore($n->getFloatValue()),
            'action' => fn(ParseNode $n) => $o->setAction($n->getStringValue()),
            'assignmentId' => fn(ParseNode $n) => $o->setAssignmentId($n->getStringValue()),
            'challengingWords' => fn(ParseNode $n) => $o->setChallengingWords($n->getCollectionOfObjectValues([ChallengingWord::class, 'createFromDiscriminatorValue'])),
            'classId' => fn(ParseNode $n) => $o->setClassId($n->getStringValue()),
            'insertions' => fn(ParseNode $n) => $o->setInsertions($n->getIntegerValue()),
            'mispronunciations' => fn(ParseNode $n) => $o->setMispronunciations($n->getIntegerValue()),
            'missedExclamationMarks' => fn(ParseNode $n) => $o->setMissedExclamationMarks($n->getIntegerValue()),
            'missedPeriods' => fn(ParseNode $n) => $o->setMissedPeriods($n->getIntegerValue()),
            'missedQuestionMarks' => fn(ParseNode $n) => $o->setMissedQuestionMarks($n->getIntegerValue()),
            'missedShorts' => fn(ParseNode $n) => $o->setMissedShorts($n->getIntegerValue()),
            'monotoneScore' => fn(ParseNode $n) => $o->setMonotoneScore($n->getFloatValue()),
            'omissions' => fn(ParseNode $n) => $o->setOmissions($n->getIntegerValue()),
            'repetitions' => fn(ParseNode $n) => $o->setRepetitions($n->getIntegerValue()),
            'selfCorrections' => fn(ParseNode $n) => $o->setSelfCorrections($n->getIntegerValue()),
            'studentId' => fn(ParseNode $n) => $o->setStudentId($n->getStringValue()),
            'submissionDateTime' => fn(ParseNode $n) => $o->setSubmissionDateTime($n->getDateTimeValue()),
            'submissionId' => fn(ParseNode $n) => $o->setSubmissionId($n->getStringValue()),
            'unexpectedPauses' => fn(ParseNode $n) => $o->setUnexpectedPauses($n->getIntegerValue()),
            'wordCount' => fn(ParseNode $n) => $o->setWordCount($n->getIntegerValue()),
            'wordsPerMinute' => fn(ParseNode $n) => $o->setWordsPerMinute($n->getFloatValue()),
        ]);
    }

    /**
     * Gets the insertions property value. Insertions of the reading progress.
     * @return int|null
    */
    public function getInsertions(): ?int {
        return $this->insertions;
    }

    /**
     * Gets the mispronunciations property value. Mispronunciations of the reading progress.
     * @return int|null
    */
    public function getMispronunciations(): ?int {
        return $this->mispronunciations;
    }

    /**
     * Gets the missedExclamationMarks property value. Number of exclamation marks missed in the reading passage.
     * @return int|null
    */
    public function getMissedExclamationMarks(): ?int {
        return $this->missedExclamationMarks;
    }

    /**
     * Gets the missedPeriods property value. Number of periods missed in the reading passage.
     * @return int|null
    */
    public function getMissedPeriods(): ?int {
        return $this->missedPeriods;
    }

    /**
     * Gets the missedQuestionMarks property value. Number of question marks missed in the reading passage.
     * @return int|null
    */
    public function getMissedQuestionMarks(): ?int {
        return $this->missedQuestionMarks;
    }

    /**
     * Gets the missedShorts property value. Number of short words missed during the reading session.
     * @return int|null
    */
    public function getMissedShorts(): ?int {
        return $this->missedShorts;
    }

    /**
     * Gets the monotoneScore property value. Score that reflects the student's use of intonation and expression. Lower scores indicate more monotone reading.
     * @return float|null
    */
    public function getMonotoneScore(): ?float {
        return $this->monotoneScore;
    }

    /**
     * Gets the omissions property value. Omissions of the reading progress.
     * @return int|null
    */
    public function getOmissions(): ?int {
        return $this->omissions;
    }

    /**
     * Gets the repetitions property value. Number of times the student repeated words or phrases during the reading session.
     * @return int|null
    */
    public function getRepetitions(): ?int {
        return $this->repetitions;
    }

    /**
     * Gets the selfCorrections property value. Number of times the student self-corrected their reading errors.
     * @return int|null
    */
    public function getSelfCorrections(): ?int {
        return $this->selfCorrections;
    }

    /**
     * Gets the studentId property value. ID of the user this reading progress is associated with.
     * @return string|null
    */
    public function getStudentId(): ?string {
        return $this->studentId;
    }

    /**
     * Gets the submissionDateTime property value. Date and time of the submission this reading progress is associated with. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @return DateTime|null
    */
    public function getSubmissionDateTime(): ?DateTime {
        return $this->submissionDateTime;
    }

    /**
     * Gets the submissionId property value. ID of the submission this reading progress is associated with.
     * @return string|null
    */
    public function getSubmissionId(): ?string {
        return $this->submissionId;
    }

    /**
     * Gets the unexpectedPauses property value. Number of unexpected pauses made during the reading session.
     * @return int|null
    */
    public function getUnexpectedPauses(): ?int {
        return $this->unexpectedPauses;
    }

    /**
     * Gets the wordCount property value. Words count of the reading progress.
     * @return int|null
    */
    public function getWordCount(): ?int {
        return $this->wordCount;
    }

    /**
     * Gets the wordsPerMinute property value. Words per minute of the reading progress.
     * @return float|null
    */
    public function getWordsPerMinute(): ?float {
        return $this->wordsPerMinute;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeFloatValue('accuracyScore', $this->getAccuracyScore());
        $writer->writeStringValue('action', $this->getAction());
        $writer->writeStringValue('assignmentId', $this->getAssignmentId());
        $writer->writeCollectionOfObjectValues('challengingWords', $this->getChallengingWords());
        $writer->writeStringValue('classId', $this->getClassId());
        $writer->writeIntegerValue('insertions', $this->getInsertions());
        $writer->writeIntegerValue('mispronunciations', $this->getMispronunciations());
        $writer->writeIntegerValue('missedExclamationMarks', $this->getMissedExclamationMarks());
        $writer->writeIntegerValue('missedPeriods', $this->getMissedPeriods());
        $writer->writeIntegerValue('missedQuestionMarks', $this->getMissedQuestionMarks());
        $writer->writeIntegerValue('missedShorts', $this->getMissedShorts());
        $writer->writeFloatValue('monotoneScore', $this->getMonotoneScore());
        $writer->writeIntegerValue('omissions', $this->getOmissions());
        $writer->writeIntegerValue('repetitions', $this->getRepetitions());
        $writer->writeIntegerValue('selfCorrections', $this->getSelfCorrections());
        $writer->writeStringValue('studentId', $this->getStudentId());
        $writer->writeDateTimeValue('submissionDateTime', $this->getSubmissionDateTime());
        $writer->writeStringValue('submissionId', $this->getSubmissionId());
        $writer->writeIntegerValue('unexpectedPauses', $this->getUnexpectedPauses());
        $writer->writeIntegerValue('wordCount', $this->getWordCount());
        $writer->writeFloatValue('wordsPerMinute', $this->getWordsPerMinute());
    }

    /**
     * Sets the accuracyScore property value. Accuracy score of the reading progress.
     * @param float|null $value Value to set for the accuracyScore property.
    */
    public function setAccuracyScore(?float $value): void {
        $this->accuracyScore = $value;
    }

    /**
     * Sets the action property value. Indicates whether the submission is an attempt by the student or a miscue edit done by the educator. The possible values are Attempt and EditMiscue.
     * @param string|null $value Value to set for the action property.
    */
    public function setAction(?string $value): void {
        $this->action = $value;
    }

    /**
     * Sets the assignmentId property value. ID of the assignment with which this submission is associated.
     * @param string|null $value Value to set for the assignmentId property.
    */
    public function setAssignmentId(?string $value): void {
        $this->assignmentId = $value;
    }

    /**
     * Sets the challengingWords property value. List of words that the student found challenging during the reading session.
     * @param array<ChallengingWord>|null $value Value to set for the challengingWords property.
    */
    public function setChallengingWords(?array $value): void {
        $this->challengingWords = $value;
    }

    /**
     * Sets the classId property value. ID of the class this reading progress is associated with.
     * @param string|null $value Value to set for the classId property.
    */
    public function setClassId(?string $value): void {
        $this->classId = $value;
    }

    /**
     * Sets the insertions property value. Insertions of the reading progress.
     * @param int|null $value Value to set for the insertions property.
    */
    public function setInsertions(?int $value): void {
        $this->insertions = $value;
    }

    /**
     * Sets the mispronunciations property value. Mispronunciations of the reading progress.
     * @param int|null $value Value to set for the mispronunciations property.
    */
    public function setMispronunciations(?int $value): void {
        $this->mispronunciations = $value;
    }

    /**
     * Sets the missedExclamationMarks property value. Number of exclamation marks missed in the reading passage.
     * @param int|null $value Value to set for the missedExclamationMarks property.
    */
    public function setMissedExclamationMarks(?int $value): void {
        $this->missedExclamationMarks = $value;
    }

    /**
     * Sets the missedPeriods property value. Number of periods missed in the reading passage.
     * @param int|null $value Value to set for the missedPeriods property.
    */
    public function setMissedPeriods(?int $value): void {
        $this->missedPeriods = $value;
    }

    /**
     * Sets the missedQuestionMarks property value. Number of question marks missed in the reading passage.
     * @param int|null $value Value to set for the missedQuestionMarks property.
    */
    public function setMissedQuestionMarks(?int $value): void {
        $this->missedQuestionMarks = $value;
    }

    /**
     * Sets the missedShorts property value. Number of short words missed during the reading session.
     * @param int|null $value Value to set for the missedShorts property.
    */
    public function setMissedShorts(?int $value): void {
        $this->missedShorts = $value;
    }

    /**
     * Sets the monotoneScore property value. Score that reflects the student's use of intonation and expression. Lower scores indicate more monotone reading.
     * @param float|null $value Value to set for the monotoneScore property.
    */
    public function setMonotoneScore(?float $value): void {
        $this->monotoneScore = $value;
    }

    /**
     * Sets the omissions property value. Omissions of the reading progress.
     * @param int|null $value Value to set for the omissions property.
    */
    public function setOmissions(?int $value): void {
        $this->omissions = $value;
    }

    /**
     * Sets the repetitions property value. Number of times the student repeated words or phrases during the reading session.
     * @param int|null $value Value to set for the repetitions property.
    */
    public function setRepetitions(?int $value): void {
        $this->repetitions = $value;
    }

    /**
     * Sets the selfCorrections property value. Number of times the student self-corrected their reading errors.
     * @param int|null $value Value to set for the selfCorrections property.
    */
    public function setSelfCorrections(?int $value): void {
        $this->selfCorrections = $value;
    }

    /**
     * Sets the studentId property value. ID of the user this reading progress is associated with.
     * @param string|null $value Value to set for the studentId property.
    */
    public function setStudentId(?string $value): void {
        $this->studentId = $value;
    }

    /**
     * Sets the submissionDateTime property value. Date and time of the submission this reading progress is associated with. The timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z.
     * @param DateTime|null $value Value to set for the submissionDateTime property.
    */
    public function setSubmissionDateTime(?DateTime $value): void {
        $this->submissionDateTime = $value;
    }

    /**
     * Sets the submissionId property value. ID of the submission this reading progress is associated with.
     * @param string|null $value Value to set for the submissionId property.
    */
    public function setSubmissionId(?string $value): void {
        $this->submissionId = $value;
    }

    /**
     * Sets the unexpectedPauses property value. Number of unexpected pauses made during the reading session.
     * @param int|null $value Value to set for the unexpectedPauses property.
    */
    public function setUnexpectedPauses(?int $value): void {
        $this->unexpectedPauses = $value;
    }

    /**
     * Sets the wordCount property value. Words count of the reading progress.
     * @param int|null $value Value to set for the wordCount property.
    */
    public function setWordCount(?int $value): void {
        $this->wordCount = $value;
    }

    /**
     * Sets the wordsPerMinute property value. Words per minute of the reading progress.
     * @param float|null $value Value to set for the wordsPerMinute property.
    */
    public function setWordsPerMinute(?float $value): void {
        $this->wordsPerMinute = $value;
    }

}
