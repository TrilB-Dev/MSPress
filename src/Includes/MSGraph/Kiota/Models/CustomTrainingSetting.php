<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CustomTrainingSetting extends TrainingSetting implements Parsable 
{
    /**
     * @var array<TrainingAssignedTo>|null $assignedTo A user collection that specifies to whom the training should be assigned. The possible values are: none, allUsers, clickedPayload, compromised, reportedPhish, readButNotClicked, didNothing, unknownFutureValue.
    */
    private ?array $assignedTo = null;
    
    /**
     * @var string|null $description The description of the custom training setting.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the custom training setting.
    */
    private ?string $displayName = null;
    
    /**
     * @var int|null $durationInMinutes Training duration.
    */
    private ?int $durationInMinutes = null;
    
    /**
     * @var string|null $url The training URL.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new CustomTrainingSetting and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.customTrainingSetting');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CustomTrainingSetting
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CustomTrainingSetting {
        return new CustomTrainingSetting();
    }

    /**
     * Gets the assignedTo property value. A user collection that specifies to whom the training should be assigned. The possible values are: none, allUsers, clickedPayload, compromised, reportedPhish, readButNotClicked, didNothing, unknownFutureValue.
     * @return array<TrainingAssignedTo>|null
    */
    public function getAssignedTo(): ?array {
        return $this->assignedTo;
    }

    /**
     * Gets the description property value. The description of the custom training setting.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the custom training setting.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the durationInMinutes property value. Training duration.
     * @return int|null
    */
    public function getDurationInMinutes(): ?int {
        return $this->durationInMinutes;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'assignedTo' => fn(ParseNode $n) => $o->setAssignedTo($n->getCollectionOfEnumValues(TrainingAssignedTo::class)),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'durationInMinutes' => fn(ParseNode $n) => $o->setDurationInMinutes($n->getIntegerValue()),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the url property value. The training URL.
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfEnumValues('assignedTo', $this->getAssignedTo());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeIntegerValue('durationInMinutes', $this->getDurationInMinutes());
        $writer->writeStringValue('url', $this->getUrl());
    }

    /**
     * Sets the assignedTo property value. A user collection that specifies to whom the training should be assigned. The possible values are: none, allUsers, clickedPayload, compromised, reportedPhish, readButNotClicked, didNothing, unknownFutureValue.
     * @param array<TrainingAssignedTo>|null $value Value to set for the assignedTo property.
    */
    public function setAssignedTo(?array $value): void {
        $this->assignedTo = $value;
    }

    /**
     * Sets the description property value. The description of the custom training setting.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the custom training setting.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the durationInMinutes property value. Training duration.
     * @param int|null $value Value to set for the durationInMinutes property.
    */
    public function setDurationInMinutes(?int $value): void {
        $this->durationInMinutes = $value;
    }

    /**
     * Sets the url property value. The training URL.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
