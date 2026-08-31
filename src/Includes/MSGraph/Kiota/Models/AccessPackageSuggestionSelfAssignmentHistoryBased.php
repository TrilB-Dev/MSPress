<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessPackageSuggestionSelfAssignmentHistoryBased extends AccessPackageSuggestionReason implements Parsable 
{
    /**
     * @var DateTime|null $lastAssignmentDateTime The date and time when the user was last assigned to this access package. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
    */
    private ?DateTime $lastAssignmentDateTime = null;
    
    /**
     * @var int|null $pastAssignmentCount The number of times the user has been assigned to this access package in the past. Read-only.
    */
    private ?int $pastAssignmentCount = null;
    
    /**
     * Instantiates a new AccessPackageSuggestionSelfAssignmentHistoryBased and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.accessPackageSuggestionSelfAssignmentHistoryBased');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessPackageSuggestionSelfAssignmentHistoryBased
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessPackageSuggestionSelfAssignmentHistoryBased {
        return new AccessPackageSuggestionSelfAssignmentHistoryBased();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'lastAssignmentDateTime' => fn(ParseNode $n) => $o->setLastAssignmentDateTime($n->getDateTimeValue()),
            'pastAssignmentCount' => fn(ParseNode $n) => $o->setPastAssignmentCount($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the lastAssignmentDateTime property value. The date and time when the user was last assigned to this access package. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @return DateTime|null
    */
    public function getLastAssignmentDateTime(): ?DateTime {
        return $this->lastAssignmentDateTime;
    }

    /**
     * Gets the pastAssignmentCount property value. The number of times the user has been assigned to this access package in the past. Read-only.
     * @return int|null
    */
    public function getPastAssignmentCount(): ?int {
        return $this->pastAssignmentCount;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeDateTimeValue('lastAssignmentDateTime', $this->getLastAssignmentDateTime());
        $writer->writeIntegerValue('pastAssignmentCount', $this->getPastAssignmentCount());
    }

    /**
     * Sets the lastAssignmentDateTime property value. The date and time when the user was last assigned to this access package. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC time. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only.
     * @param DateTime|null $value Value to set for the lastAssignmentDateTime property.
    */
    public function setLastAssignmentDateTime(?DateTime $value): void {
        $this->lastAssignmentDateTime = $value;
    }

    /**
     * Sets the pastAssignmentCount property value. The number of times the user has been assigned to this access package in the past. Read-only.
     * @param int|null $value Value to set for the pastAssignmentCount property.
    */
    public function setPastAssignmentCount(?int $value): void {
        $this->pastAssignmentCount = $value;
    }

}
