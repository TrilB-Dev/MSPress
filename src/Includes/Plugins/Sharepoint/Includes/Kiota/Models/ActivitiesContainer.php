<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ActivitiesContainer extends Entity implements Parsable 
{
    /**
     * @var array<ContentActivity>|null $contentActivities Collection of activity logs related to content processing.
    */
    private ?array $contentActivities = null;
    
    /**
     * Instantiates a new ActivitiesContainer and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ActivitiesContainer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ActivitiesContainer {
        return new ActivitiesContainer();
    }

    /**
     * Gets the contentActivities property value. Collection of activity logs related to content processing.
     * @return array<ContentActivity>|null
    */
    public function getContentActivities(): ?array {
        return $this->contentActivities;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'contentActivities' => fn(ParseNode $n) => $o->setContentActivities($n->getCollectionOfObjectValues([ContentActivity::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('contentActivities', $this->getContentActivities());
    }

    /**
     * Sets the contentActivities property value. Collection of activity logs related to content processing.
     * @param array<ContentActivity>|null $value Value to set for the contentActivities property.
    */
    public function setContentActivities(?array $value): void {
        $this->contentActivities = $value;
    }

}
