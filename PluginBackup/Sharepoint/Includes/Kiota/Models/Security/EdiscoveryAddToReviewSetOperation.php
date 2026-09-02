<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EdiscoveryAddToReviewSetOperation extends CaseOperation implements Parsable 
{
    /**
     * @var AdditionalDataOptions|null $additionalDataOptions The options to add items to the review set. The possible values are: allVersions, linkedFiles, unknownFutureValue, advancedIndexing, listAttachments, htmlTranscripts, messageConversationExpansion, locationsWithoutHits, allItemsInFolder, cloudNativeHtmlConversion. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: advancedIndexing, listAttachments, htmlTranscripts, messageConversationExpansion, locationsWithoutHits, allItemsInFolder, cloudNativeHtmlConversion.
    */
    private ?AdditionalDataOptions $additionalDataOptions = null;
    
    /**
     * @var CloudAttachmentVersion|null $cloudAttachmentVersion Specifies the number of most recent versions of cloud attachments to collect. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
    */
    private ?CloudAttachmentVersion $cloudAttachmentVersion = null;
    
    /**
     * @var DocumentVersion|null $documentVersion Specifies the number of most recent versions of SharePoint documents to collect. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
    */
    private ?DocumentVersion $documentVersion = null;
    
    /**
     * @var ItemsToInclude|null $itemsToInclude The items to include in the review set. The possible values are: searchHits, partiallyIndexed, unknownFutureValue.
    */
    private ?ItemsToInclude $itemsToInclude = null;
    
    /**
     * @var array<ReportFileMetadata>|null $reportFileMetadata Contains the properties for report file metadata, including downloadUrl, fileName, and size.
    */
    private ?array $reportFileMetadata = null;
    
    /**
     * @var EdiscoveryReviewSet|null $reviewSet eDiscovery review set to which items matching source collection query gets added.
    */
    private ?EdiscoveryReviewSet $reviewSet = null;
    
    /**
     * @var EdiscoverySearch|null $search eDiscovery search that gets added to review set.
    */
    private ?EdiscoverySearch $search = null;
    
    /**
     * Instantiates a new EdiscoveryAddToReviewSetOperation and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EdiscoveryAddToReviewSetOperation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EdiscoveryAddToReviewSetOperation {
        return new EdiscoveryAddToReviewSetOperation();
    }

    /**
     * Gets the additionalDataOptions property value. The options to add items to the review set. The possible values are: allVersions, linkedFiles, unknownFutureValue, advancedIndexing, listAttachments, htmlTranscripts, messageConversationExpansion, locationsWithoutHits, allItemsInFolder, cloudNativeHtmlConversion. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: advancedIndexing, listAttachments, htmlTranscripts, messageConversationExpansion, locationsWithoutHits, allItemsInFolder, cloudNativeHtmlConversion.
     * @return AdditionalDataOptions|null
    */
    public function getAdditionalDataOptions(): ?AdditionalDataOptions {
        return $this->additionalDataOptions;
    }

    /**
     * Gets the cloudAttachmentVersion property value. Specifies the number of most recent versions of cloud attachments to collect. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @return CloudAttachmentVersion|null
    */
    public function getCloudAttachmentVersion(): ?CloudAttachmentVersion {
        return $this->cloudAttachmentVersion;
    }

    /**
     * Gets the documentVersion property value. Specifies the number of most recent versions of SharePoint documents to collect. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @return DocumentVersion|null
    */
    public function getDocumentVersion(): ?DocumentVersion {
        return $this->documentVersion;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'additionalDataOptions' => fn(ParseNode $n) => $o->setAdditionalDataOptions($n->getEnumValue(AdditionalDataOptions::class)),
            'cloudAttachmentVersion' => fn(ParseNode $n) => $o->setCloudAttachmentVersion($n->getEnumValue(CloudAttachmentVersion::class)),
            'documentVersion' => fn(ParseNode $n) => $o->setDocumentVersion($n->getEnumValue(DocumentVersion::class)),
            'itemsToInclude' => fn(ParseNode $n) => $o->setItemsToInclude($n->getEnumValue(ItemsToInclude::class)),
            'reportFileMetadata' => fn(ParseNode $n) => $o->setReportFileMetadata($n->getCollectionOfObjectValues([ReportFileMetadata::class, 'createFromDiscriminatorValue'])),
            'reviewSet' => fn(ParseNode $n) => $o->setReviewSet($n->getObjectValue([EdiscoveryReviewSet::class, 'createFromDiscriminatorValue'])),
            'search' => fn(ParseNode $n) => $o->setSearch($n->getObjectValue([EdiscoverySearch::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the itemsToInclude property value. The items to include in the review set. The possible values are: searchHits, partiallyIndexed, unknownFutureValue.
     * @return ItemsToInclude|null
    */
    public function getItemsToInclude(): ?ItemsToInclude {
        return $this->itemsToInclude;
    }

    /**
     * Gets the reportFileMetadata property value. Contains the properties for report file metadata, including downloadUrl, fileName, and size.
     * @return array<ReportFileMetadata>|null
    */
    public function getReportFileMetadata(): ?array {
        return $this->reportFileMetadata;
    }

    /**
     * Gets the reviewSet property value. eDiscovery review set to which items matching source collection query gets added.
     * @return EdiscoveryReviewSet|null
    */
    public function getReviewSet(): ?EdiscoveryReviewSet {
        return $this->reviewSet;
    }

    /**
     * Gets the search property value. eDiscovery search that gets added to review set.
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
        $writer->writeEnumValue('additionalDataOptions', $this->getAdditionalDataOptions());
        $writer->writeEnumValue('cloudAttachmentVersion', $this->getCloudAttachmentVersion());
        $writer->writeEnumValue('documentVersion', $this->getDocumentVersion());
        $writer->writeEnumValue('itemsToInclude', $this->getItemsToInclude());
        $writer->writeCollectionOfObjectValues('reportFileMetadata', $this->getReportFileMetadata());
        $writer->writeObjectValue('reviewSet', $this->getReviewSet());
        $writer->writeObjectValue('search', $this->getSearch());
    }

    /**
     * Sets the additionalDataOptions property value. The options to add items to the review set. The possible values are: allVersions, linkedFiles, unknownFutureValue, advancedIndexing, listAttachments, htmlTranscripts, messageConversationExpansion, locationsWithoutHits, allItemsInFolder, cloudNativeHtmlConversion. Use the Prefer: include-unknown-enum-members request header to get the following values from this evolvable enum: advancedIndexing, listAttachments, htmlTranscripts, messageConversationExpansion, locationsWithoutHits, allItemsInFolder, cloudNativeHtmlConversion.
     * @param AdditionalDataOptions|null $value Value to set for the additionalDataOptions property.
    */
    public function setAdditionalDataOptions(?AdditionalDataOptions $value): void {
        $this->additionalDataOptions = $value;
    }

    /**
     * Sets the cloudAttachmentVersion property value. Specifies the number of most recent versions of cloud attachments to collect. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @param CloudAttachmentVersion|null $value Value to set for the cloudAttachmentVersion property.
    */
    public function setCloudAttachmentVersion(?CloudAttachmentVersion $value): void {
        $this->cloudAttachmentVersion = $value;
    }

    /**
     * Sets the documentVersion property value. Specifies the number of most recent versions of SharePoint documents to collect. The possible values are: latest, recent10, recent100, all, unknownFutureValue.
     * @param DocumentVersion|null $value Value to set for the documentVersion property.
    */
    public function setDocumentVersion(?DocumentVersion $value): void {
        $this->documentVersion = $value;
    }

    /**
     * Sets the itemsToInclude property value. The items to include in the review set. The possible values are: searchHits, partiallyIndexed, unknownFutureValue.
     * @param ItemsToInclude|null $value Value to set for the itemsToInclude property.
    */
    public function setItemsToInclude(?ItemsToInclude $value): void {
        $this->itemsToInclude = $value;
    }

    /**
     * Sets the reportFileMetadata property value. Contains the properties for report file metadata, including downloadUrl, fileName, and size.
     * @param array<ReportFileMetadata>|null $value Value to set for the reportFileMetadata property.
    */
    public function setReportFileMetadata(?array $value): void {
        $this->reportFileMetadata = $value;
    }

    /**
     * Sets the reviewSet property value. eDiscovery review set to which items matching source collection query gets added.
     * @param EdiscoveryReviewSet|null $value Value to set for the reviewSet property.
    */
    public function setReviewSet(?EdiscoveryReviewSet $value): void {
        $this->reviewSet = $value;
    }

    /**
     * Sets the search property value. eDiscovery search that gets added to review set.
     * @param EdiscoverySearch|null $value Value to set for the search property.
    */
    public function setSearch(?EdiscoverySearch $value): void {
        $this->search = $value;
    }

}
