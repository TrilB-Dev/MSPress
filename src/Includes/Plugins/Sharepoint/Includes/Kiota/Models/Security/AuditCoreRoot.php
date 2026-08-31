<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

/**
 * Root entity for the audit log API.
*/
class AuditCoreRoot extends Entity implements Parsable 
{
    /**
     * @var array<AuditLogQuery>|null $queries The collection of audit log queries.
    */
    private ?array $queries = null;
    
    /**
     * Instantiates a new AuditCoreRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AuditCoreRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AuditCoreRoot {
        return new AuditCoreRoot();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'queries' => fn(ParseNode $n) => $o->setQueries($n->getCollectionOfObjectValues([AuditLogQuery::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the queries property value. The collection of audit log queries.
     * @return array<AuditLogQuery>|null
    */
    public function getQueries(): ?array {
        return $this->queries;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('queries', $this->getQueries());
    }

    /**
     * Sets the queries property value. The collection of audit log queries.
     * @param array<AuditLogQuery>|null $value Value to set for the queries property.
    */
    public function setQueries(?array $value): void {
        $this->queries = $value;
    }

}
