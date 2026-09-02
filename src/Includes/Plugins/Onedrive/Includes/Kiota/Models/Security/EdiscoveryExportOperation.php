<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EdiscoveryExportOperation extends CaseOperation implements Parsable 
{
    /**
     * @var string|null $description The description provided for the export.
    */
    private ?string $description = null;
    
    /**
     * @var array<ExportFileMetadata>|null $exportFileMetadata Contains the properties for an export file metadata, including downloadUrl, fileName, and size.
    */
    private ?array $exportFileMetadata = null;
    
    /**
     * @var ExportOptions|null $exportOptions The options provided for the export. For more information, see reviewSet: export. The possible values are: originalFiles, text, pdfReplacement, tags, unknownFutureValue, splitSource, includeFolderAndPath, friendlyName, condensePaths. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: splitSource, includeFolderAndPath, friendlyName, condensePaths.
    */
    private ?ExportOptions $exportOptions = null;
    
    /**
     * @var ExportFileStructure|null $exportStructure The options that specify the structure of the export. For more information, see reviewSet: export. The possible values are: none, directory (deprecated), pst, unknownFutureValue, msg. Use the Prefer: include-unknown-enum-members request header to get the following members from this evolvable enum: msg. The directory member is deprecated. It remains in v1.0 for backward compatibility. Going forward, use either pst or msg.
    */
    private ?ExportFileStructure $exportStructure = null;
    
    /**
     * @var string|null $outputName The name provided for the export.
    */
    private ?string $outputName = null;
    
    /**
     * @var EdiscoveryReviewSet|null $reviewSet Review set from where documents are exported.
    */
    private ?EdiscoveryReviewSet $reviewSet = null;
    
    /**
     * @var EdiscoveryReviewSetQuery|null $reviewSetQuery The review set query that is used to filter the documents for export.
    */
    private ?EdiscoveryReviewSetQuery $reviewSetQuery = null;
    
    /**
     * Instantiates a new EdiscoveryExportOperation and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EdiscoveryExportOperation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EdiscoveryExportOperation {
        return new EdiscoveryExportOperation();
    }

    /**
     * Gets the description property value. The description provided for the export.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the exportFileMetadata property value. Contains the properties for an export file metadata, including downloadUrl, fileName, and size.
     * @return array<ExportFileMetadata>|null
    */
    public function getExportFileMetadata(): ?array {
        return $this->exportFileMetadata;
    }

    /**
     * Gets the exportOptions property value. The options provided for the export. For more information, see reviewSet: export. The possible values are: originalFiles, text, pdfReplacement, tags, unknownFutureValue, splitSource, includeFolderAndPath, friendlyName, condensePaths. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: splitSource, includeFolderAndPath, friendlyName, condensePaths.
     * @return ExportOptions|null
    */
    public function getExportOptions(): ?ExportOptions {
        return $this->exportOptions;
    }

    /**
     * Gets the exportStructure property value. The options that specify the structure of the export. For more information, see reviewSet: export. The possible values are: none, directory (deprecated), pst, unknownFutureValue, msg. Use the Prefer: include-unknown-enum-members request header to get the following members from this evolvable enum: msg. The directory member is deprecated. It remains in v1.0 for backward compatibility. Going forward, use either pst or msg.
     * @return ExportFileStructure|null
    */
    public function getExportStructure(): ?ExportFileStructure {
        return $this->exportStructure;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'exportFileMetadata' => fn(ParseNode $n) => $o->setExportFileMetadata($n->getCollectionOfObjectValues([ExportFileMetadata::class, 'createFromDiscriminatorValue'])),
            'exportOptions' => fn(ParseNode $n) => $o->setExportOptions($n->getEnumValue(ExportOptions::class)),
            'exportStructure' => fn(ParseNode $n) => $o->setExportStructure($n->getEnumValue(ExportFileStructure::class)),
            'outputName' => fn(ParseNode $n) => $o->setOutputName($n->getStringValue()),
            'reviewSet' => fn(ParseNode $n) => $o->setReviewSet($n->getObjectValue([EdiscoveryReviewSet::class, 'createFromDiscriminatorValue'])),
            'reviewSetQuery' => fn(ParseNode $n) => $o->setReviewSetQuery($n->getObjectValue([EdiscoveryReviewSetQuery::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the outputName property value. The name provided for the export.
     * @return string|null
    */
    public function getOutputName(): ?string {
        return $this->outputName;
    }

    /**
     * Gets the reviewSet property value. Review set from where documents are exported.
     * @return EdiscoveryReviewSet|null
    */
    public function getReviewSet(): ?EdiscoveryReviewSet {
        return $this->reviewSet;
    }

    /**
     * Gets the reviewSetQuery property value. The review set query that is used to filter the documents for export.
     * @return EdiscoveryReviewSetQuery|null
    */
    public function getReviewSetQuery(): ?EdiscoveryReviewSetQuery {
        return $this->reviewSetQuery;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeCollectionOfObjectValues('exportFileMetadata', $this->getExportFileMetadata());
        $writer->writeEnumValue('exportOptions', $this->getExportOptions());
        $writer->writeEnumValue('exportStructure', $this->getExportStructure());
        $writer->writeStringValue('outputName', $this->getOutputName());
        $writer->writeObjectValue('reviewSet', $this->getReviewSet());
        $writer->writeObjectValue('reviewSetQuery', $this->getReviewSetQuery());
    }

    /**
     * Sets the description property value. The description provided for the export.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the exportFileMetadata property value. Contains the properties for an export file metadata, including downloadUrl, fileName, and size.
     * @param array<ExportFileMetadata>|null $value Value to set for the exportFileMetadata property.
    */
    public function setExportFileMetadata(?array $value): void {
        $this->exportFileMetadata = $value;
    }

    /**
     * Sets the exportOptions property value. The options provided for the export. For more information, see reviewSet: export. The possible values are: originalFiles, text, pdfReplacement, tags, unknownFutureValue, splitSource, includeFolderAndPath, friendlyName, condensePaths. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: splitSource, includeFolderAndPath, friendlyName, condensePaths.
     * @param ExportOptions|null $value Value to set for the exportOptions property.
    */
    public function setExportOptions(?ExportOptions $value): void {
        $this->exportOptions = $value;
    }

    /**
     * Sets the exportStructure property value. The options that specify the structure of the export. For more information, see reviewSet: export. The possible values are: none, directory (deprecated), pst, unknownFutureValue, msg. Use the Prefer: include-unknown-enum-members request header to get the following members from this evolvable enum: msg. The directory member is deprecated. It remains in v1.0 for backward compatibility. Going forward, use either pst or msg.
     * @param ExportFileStructure|null $value Value to set for the exportStructure property.
    */
    public function setExportStructure(?ExportFileStructure $value): void {
        $this->exportStructure = $value;
    }

    /**
     * Sets the outputName property value. The name provided for the export.
     * @param string|null $value Value to set for the outputName property.
    */
    public function setOutputName(?string $value): void {
        $this->outputName = $value;
    }

    /**
     * Sets the reviewSet property value. Review set from where documents are exported.
     * @param EdiscoveryReviewSet|null $value Value to set for the reviewSet property.
    */
    public function setReviewSet(?EdiscoveryReviewSet $value): void {
        $this->reviewSet = $value;
    }

    /**
     * Sets the reviewSetQuery property value. The review set query that is used to filter the documents for export.
     * @param EdiscoveryReviewSetQuery|null $value Value to set for the reviewSetQuery property.
    */
    public function setReviewSetQuery(?EdiscoveryReviewSetQuery $value): void {
        $this->reviewSetQuery = $value;
    }

}
