<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EdiscoverySearchExportOperation extends CaseOperation implements Parsable 
{
    /**
     * @var AdditionalOptions|null $additionalOptions The additional items to include in the export. The possible values are: none, teamsAndYammerConversations, cloudAttachments, allDocumentVersions, subfolderContents, listAttachments, unknownFutureValue, htmlTranscripts, advancedIndexing, allItemsInFolder, includeFolderAndPath, condensePaths, friendlyName, splitSource, includeReport. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: htmlTranscripts, advancedIndexing, allItemsInFolder, includeFolderAndPath, condensePaths, friendlyName, splitSource, includeReport.
    */
    private ?AdditionalOptions $additionalOptions = null;
    
    /**
     * @var CloudAttachmentVersion|null $cloudAttachmentVersion The versions of cloud attachments to include in messages. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
    */
    private ?CloudAttachmentVersion $cloudAttachmentVersion = null;
    
    /**
     * @var string|null $description The description of the export by the user.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The name of export provided by the user.
    */
    private ?string $displayName = null;
    
    /**
     * @var DocumentVersion|null $documentVersion The versions of files in SharePoint to include. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
    */
    private ?DocumentVersion $documentVersion = null;
    
    /**
     * @var ExportCriteria|null $exportCriteria Items to be included in the export. The possible values are: searchHits, partiallyIndexed, unknownFutureValue.
    */
    private ?ExportCriteria $exportCriteria = null;
    
    /**
     * @var array<ExportFileMetadata>|null $exportFileMetadata Contains the properties for an export file metadata, including downloadUrl, fileName, and size.
    */
    private ?array $exportFileMetadata = null;
    
    /**
     * @var ExportFormat|null $exportFormat Format of the emails of the export. The possible values are: pst, msg, eml (deprecated), unknownFutureValue. The eml member is deprecated. It remains in v1.0 for backward compatibility. Going forward, use either pst or msg.
    */
    private ?ExportFormat $exportFormat = null;
    
    /**
     * @var ExportLocation|null $exportLocation Location scope for partially indexed items. You can choose to include partially indexed items only in responsive locations with search hits or in all targeted locations. The possible values are: responsiveLocations, nonresponsiveLocations, unknownFutureValue.
    */
    private ?ExportLocation $exportLocation = null;
    
    /**
     * @var bool|null $exportSingleItems Indicates whether to export single items.
    */
    private ?bool $exportSingleItems = null;
    
    /**
     * @var EdiscoverySearch|null $search The eDiscovery searches under each case.
    */
    private ?EdiscoverySearch $search = null;
    
    /**
     * Instantiates a new EdiscoverySearchExportOperation and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EdiscoverySearchExportOperation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EdiscoverySearchExportOperation {
        return new EdiscoverySearchExportOperation();
    }

    /**
     * Gets the additionalOptions property value. The additional items to include in the export. The possible values are: none, teamsAndYammerConversations, cloudAttachments, allDocumentVersions, subfolderContents, listAttachments, unknownFutureValue, htmlTranscripts, advancedIndexing, allItemsInFolder, includeFolderAndPath, condensePaths, friendlyName, splitSource, includeReport. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: htmlTranscripts, advancedIndexing, allItemsInFolder, includeFolderAndPath, condensePaths, friendlyName, splitSource, includeReport.
     * @return AdditionalOptions|null
    */
    public function getAdditionalOptions(): ?AdditionalOptions {
        return $this->additionalOptions;
    }

    /**
     * Gets the cloudAttachmentVersion property value. The versions of cloud attachments to include in messages. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @return CloudAttachmentVersion|null
    */
    public function getCloudAttachmentVersion(): ?CloudAttachmentVersion {
        return $this->cloudAttachmentVersion;
    }

    /**
     * Gets the description property value. The description of the export by the user.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The name of export provided by the user.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the documentVersion property value. The versions of files in SharePoint to include. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @return DocumentVersion|null
    */
    public function getDocumentVersion(): ?DocumentVersion {
        return $this->documentVersion;
    }

    /**
     * Gets the exportCriteria property value. Items to be included in the export. The possible values are: searchHits, partiallyIndexed, unknownFutureValue.
     * @return ExportCriteria|null
    */
    public function getExportCriteria(): ?ExportCriteria {
        return $this->exportCriteria;
    }

    /**
     * Gets the exportFileMetadata property value. Contains the properties for an export file metadata, including downloadUrl, fileName, and size.
     * @return array<ExportFileMetadata>|null
    */
    public function getExportFileMetadata(): ?array {
        return $this->exportFileMetadata;
    }

    /**
     * Gets the exportFormat property value. Format of the emails of the export. The possible values are: pst, msg, eml (deprecated), unknownFutureValue. The eml member is deprecated. It remains in v1.0 for backward compatibility. Going forward, use either pst or msg.
     * @return ExportFormat|null
    */
    public function getExportFormat(): ?ExportFormat {
        return $this->exportFormat;
    }

    /**
     * Gets the exportLocation property value. Location scope for partially indexed items. You can choose to include partially indexed items only in responsive locations with search hits or in all targeted locations. The possible values are: responsiveLocations, nonresponsiveLocations, unknownFutureValue.
     * @return ExportLocation|null
    */
    public function getExportLocation(): ?ExportLocation {
        return $this->exportLocation;
    }

    /**
     * Gets the exportSingleItems property value. Indicates whether to export single items.
     * @return bool|null
    */
    public function getExportSingleItems(): ?bool {
        return $this->exportSingleItems;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'additionalOptions' => fn(ParseNode $n) => $o->setAdditionalOptions($n->getEnumValue(AdditionalOptions::class)),
            'cloudAttachmentVersion' => fn(ParseNode $n) => $o->setCloudAttachmentVersion($n->getEnumValue(CloudAttachmentVersion::class)),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'documentVersion' => fn(ParseNode $n) => $o->setDocumentVersion($n->getEnumValue(DocumentVersion::class)),
            'exportCriteria' => fn(ParseNode $n) => $o->setExportCriteria($n->getEnumValue(ExportCriteria::class)),
            'exportFileMetadata' => fn(ParseNode $n) => $o->setExportFileMetadata($n->getCollectionOfObjectValues([ExportFileMetadata::class, 'createFromDiscriminatorValue'])),
            'exportFormat' => fn(ParseNode $n) => $o->setExportFormat($n->getEnumValue(ExportFormat::class)),
            'exportLocation' => fn(ParseNode $n) => $o->setExportLocation($n->getEnumValue(ExportLocation::class)),
            'exportSingleItems' => fn(ParseNode $n) => $o->setExportSingleItems($n->getBooleanValue()),
            'search' => fn(ParseNode $n) => $o->setSearch($n->getObjectValue([EdiscoverySearch::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the search property value. The eDiscovery searches under each case.
     * @return EdiscoverySearch|null
    */
    public function getSearch(): ?EdiscoverySearch {
        return $this->search;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeEnumValue('additionalOptions', $this->getAdditionalOptions());
        $writer->writeEnumValue('cloudAttachmentVersion', $this->getCloudAttachmentVersion());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeEnumValue('documentVersion', $this->getDocumentVersion());
        $writer->writeEnumValue('exportCriteria', $this->getExportCriteria());
        $writer->writeCollectionOfObjectValues('exportFileMetadata', $this->getExportFileMetadata());
        $writer->writeEnumValue('exportFormat', $this->getExportFormat());
        $writer->writeEnumValue('exportLocation', $this->getExportLocation());
        $writer->writeBooleanValue('exportSingleItems', $this->getExportSingleItems());
        $writer->writeObjectValue('search', $this->getSearch());
    }

    /**
     * Sets the additionalOptions property value. The additional items to include in the export. The possible values are: none, teamsAndYammerConversations, cloudAttachments, allDocumentVersions, subfolderContents, listAttachments, unknownFutureValue, htmlTranscripts, advancedIndexing, allItemsInFolder, includeFolderAndPath, condensePaths, friendlyName, splitSource, includeReport. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: htmlTranscripts, advancedIndexing, allItemsInFolder, includeFolderAndPath, condensePaths, friendlyName, splitSource, includeReport.
     * @param AdditionalOptions|null $value Value to set for the additionalOptions property.
    */
    public function setAdditionalOptions(?AdditionalOptions $value): void {
        $this->additionalOptions = $value;
    }

    /**
     * Sets the cloudAttachmentVersion property value. The versions of cloud attachments to include in messages. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @param CloudAttachmentVersion|null $value Value to set for the cloudAttachmentVersion property.
    */
    public function setCloudAttachmentVersion(?CloudAttachmentVersion $value): void {
        $this->cloudAttachmentVersion = $value;
    }

    /**
     * Sets the description property value. The description of the export by the user.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The name of export provided by the user.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the documentVersion property value. The versions of files in SharePoint to include. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @param DocumentVersion|null $value Value to set for the documentVersion property.
    */
    public function setDocumentVersion(?DocumentVersion $value): void {
        $this->documentVersion = $value;
    }

    /**
     * Sets the exportCriteria property value. Items to be included in the export. The possible values are: searchHits, partiallyIndexed, unknownFutureValue.
     * @param ExportCriteria|null $value Value to set for the exportCriteria property.
    */
    public function setExportCriteria(?ExportCriteria $value): void {
        $this->exportCriteria = $value;
    }

    /**
     * Sets the exportFileMetadata property value. Contains the properties for an export file metadata, including downloadUrl, fileName, and size.
     * @param array<ExportFileMetadata>|null $value Value to set for the exportFileMetadata property.
    */
    public function setExportFileMetadata(?array $value): void {
        $this->exportFileMetadata = $value;
    }

    /**
     * Sets the exportFormat property value. Format of the emails of the export. The possible values are: pst, msg, eml (deprecated), unknownFutureValue. The eml member is deprecated. It remains in v1.0 for backward compatibility. Going forward, use either pst or msg.
     * @param ExportFormat|null $value Value to set for the exportFormat property.
    */
    public function setExportFormat(?ExportFormat $value): void {
        $this->exportFormat = $value;
    }

    /**
     * Sets the exportLocation property value. Location scope for partially indexed items. You can choose to include partially indexed items only in responsive locations with search hits or in all targeted locations. The possible values are: responsiveLocations, nonresponsiveLocations, unknownFutureValue.
     * @param ExportLocation|null $value Value to set for the exportLocation property.
    */
    public function setExportLocation(?ExportLocation $value): void {
        $this->exportLocation = $value;
    }

    /**
     * Sets the exportSingleItems property value. Indicates whether to export single items.
     * @param bool|null $value Value to set for the exportSingleItems property.
    */
    public function setExportSingleItems(?bool $value): void {
        $this->exportSingleItems = $value;
    }

    /**
     * Sets the search property value. The eDiscovery searches under each case.
     * @param EdiscoverySearch|null $value Value to set for the search property.
    */
    public function setSearch(?EdiscoverySearch $value): void {
        $this->search = $value;
    }

}
