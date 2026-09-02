<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EdiscoveryPurgeDataOperation extends CaseOperation implements Parsable 
{
    /**
     * @var array<ReportFileMetadata>|null $reportFileMetadata The purge job report file metadata. It contains the properties for report file metadata, including downloadUrl, fileName, and size.
    */
    private ?array $reportFileMetadata = null;
    
    /**
     * Instantiates a new EdiscoveryPurgeDataOperation and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EdiscoveryPurgeDataOperation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EdiscoveryPurgeDataOperation {
        return new EdiscoveryPurgeDataOperation();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'reportFileMetadata' => fn(ParseNode $n) => $o->setReportFileMetadata($n->getCollectionOfObjectValues([ReportFileMetadata::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the reportFileMetadata property value. The purge job report file metadata. It contains the properties for report file metadata, including downloadUrl, fileName, and size.
     * @return array<ReportFileMetadata>|null
    */
    public function getReportFileMetadata(): ?array {
        return $this->reportFileMetadata;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('reportFileMetadata', $this->getReportFileMetadata());
    }

    /**
     * Sets the reportFileMetadata property value. The purge job report file metadata. It contains the properties for report file metadata, including downloadUrl, fileName, and size.
     * @param array<ReportFileMetadata>|null $value Value to set for the reportFileMetadata property.
    */
    public function setReportFileMetadata(?array $value): void {
        $this->reportFileMetadata = $value;
    }

}
