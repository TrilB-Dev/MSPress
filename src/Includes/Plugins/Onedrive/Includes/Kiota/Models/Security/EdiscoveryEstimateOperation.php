<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EdiscoveryEstimateOperation extends CaseOperation implements Parsable 
{
    /**
     * @var int|null $indexedItemCount The estimated count of items for the search that matched the content query.
    */
    private ?int $indexedItemCount = null;
    
    /**
     * @var int|null $indexedItemsSize The estimated size of items for the search that matched the content query.
    */
    private ?int $indexedItemsSize = null;
    
    /**
     * @var int|null $mailboxCount The number of mailboxes that had search hits.
    */
    private ?int $mailboxCount = null;
    
    /**
     * @var array<ReportFileMetadata>|null $reportFileMetadata Contains the properties for report file metadata, including downloadUrl, fileName, and size.
    */
    private ?array $reportFileMetadata = null;
    
    /**
     * @var EdiscoverySearch|null $search eDiscovery search.
    */
    private ?EdiscoverySearch $search = null;
    
    /**
     * @var int|null $siteCount The number of mailboxes that had search hits.
    */
    private ?int $siteCount = null;
    
    /**
     * @var StatisticsOptions|null $statisticsOptions The options to generate statistics. The possible values are: includeRefiners, includeQueryStats, includeUnindexedStats, advancedIndexing, locationsWithoutHits, unknownFutureValue.
    */
    private ?StatisticsOptions $statisticsOptions = null;
    
    /**
     * @var int|null $unindexedItemCount The estimated count of unindexed items for the collection.
    */
    private ?int $unindexedItemCount = null;
    
    /**
     * @var int|null $unindexedItemsSize The estimated size of unindexed items for the collection.
    */
    private ?int $unindexedItemsSize = null;
    
    /**
     * Instantiates a new EdiscoveryEstimateOperation and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EdiscoveryEstimateOperation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EdiscoveryEstimateOperation {
        return new EdiscoveryEstimateOperation();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'indexedItemCount' => fn(ParseNode $n) => $o->setIndexedItemCount($n->getIntegerValue()),
            'indexedItemsSize' => fn(ParseNode $n) => $o->setIndexedItemsSize($n->getIntegerValue()),
            'mailboxCount' => fn(ParseNode $n) => $o->setMailboxCount($n->getIntegerValue()),
            'reportFileMetadata' => fn(ParseNode $n) => $o->setReportFileMetadata($n->getCollectionOfObjectValues([ReportFileMetadata::class, 'createFromDiscriminatorValue'])),
            'search' => fn(ParseNode $n) => $o->setSearch($n->getObjectValue([EdiscoverySearch::class, 'createFromDiscriminatorValue'])),
            'siteCount' => fn(ParseNode $n) => $o->setSiteCount($n->getIntegerValue()),
            'statisticsOptions' => fn(ParseNode $n) => $o->setStatisticsOptions($n->getEnumValue(StatisticsOptions::class)),
            'unindexedItemCount' => fn(ParseNode $n) => $o->setUnindexedItemCount($n->getIntegerValue()),
            'unindexedItemsSize' => fn(ParseNode $n) => $o->setUnindexedItemsSize($n->getIntegerValue()),
        ]);
    }

    /**
     * Gets the indexedItemCount property value. The estimated count of items for the search that matched the content query.
     * @return int|null
    */
    public function getIndexedItemCount(): ?int {
        return $this->indexedItemCount;
    }

    /**
     * Gets the indexedItemsSize property value. The estimated size of items for the search that matched the content query.
     * @return int|null
    */
    public function getIndexedItemsSize(): ?int {
        return $this->indexedItemsSize;
    }

    /**
     * Gets the mailboxCount property value. The number of mailboxes that had search hits.
     * @return int|null
    */
    public function getMailboxCount(): ?int {
        return $this->mailboxCount;
    }

    /**
     * Gets the reportFileMetadata property value. Contains the properties for report file metadata, including downloadUrl, fileName, and size.
     * @return array<ReportFileMetadata>|null
    */
    public function getReportFileMetadata(): ?array {
        return $this->reportFileMetadata;
    }

    /**
     * Gets the search property value. eDiscovery search.
     * @return EdiscoverySearch|null
    */
    public function getSearch(): ?EdiscoverySearch {
        return $this->search;
    }

    /**
     * Gets the siteCount property value. The number of mailboxes that had search hits.
     * @return int|null
    */
    public function getSiteCount(): ?int {
        return $this->siteCount;
    }

    /**
     * Gets the statisticsOptions property value. The options to generate statistics. The possible values are: includeRefiners, includeQueryStats, includeUnindexedStats, advancedIndexing, locationsWithoutHits, unknownFutureValue.
     * @return StatisticsOptions|null
    */
    public function getStatisticsOptions(): ?StatisticsOptions {
        return $this->statisticsOptions;
    }

    /**
     * Gets the unindexedItemCount property value. The estimated count of unindexed items for the collection.
     * @return int|null
    */
    public function getUnindexedItemCount(): ?int {
        return $this->unindexedItemCount;
    }

    /**
     * Gets the unindexedItemsSize property value. The estimated size of unindexed items for the collection.
     * @return int|null
    */
    public function getUnindexedItemsSize(): ?int {
        return $this->unindexedItemsSize;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('indexedItemCount', $this->getIndexedItemCount());
        $writer->writeIntegerValue('indexedItemsSize', $this->getIndexedItemsSize());
        $writer->writeIntegerValue('mailboxCount', $this->getMailboxCount());
        $writer->writeCollectionOfObjectValues('reportFileMetadata', $this->getReportFileMetadata());
        $writer->writeObjectValue('search', $this->getSearch());
        $writer->writeIntegerValue('siteCount', $this->getSiteCount());
        $writer->writeEnumValue('statisticsOptions', $this->getStatisticsOptions());
        $writer->writeIntegerValue('unindexedItemCount', $this->getUnindexedItemCount());
        $writer->writeIntegerValue('unindexedItemsSize', $this->getUnindexedItemsSize());
    }

    /**
     * Sets the indexedItemCount property value. The estimated count of items for the search that matched the content query.
     * @param int|null $value Value to set for the indexedItemCount property.
    */
    public function setIndexedItemCount(?int $value): void {
        $this->indexedItemCount = $value;
    }

    /**
     * Sets the indexedItemsSize property value. The estimated size of items for the search that matched the content query.
     * @param int|null $value Value to set for the indexedItemsSize property.
    */
    public function setIndexedItemsSize(?int $value): void {
        $this->indexedItemsSize = $value;
    }

    /**
     * Sets the mailboxCount property value. The number of mailboxes that had search hits.
     * @param int|null $value Value to set for the mailboxCount property.
    */
    public function setMailboxCount(?int $value): void {
        $this->mailboxCount = $value;
    }

    /**
     * Sets the reportFileMetadata property value. Contains the properties for report file metadata, including downloadUrl, fileName, and size.
     * @param array<ReportFileMetadata>|null $value Value to set for the reportFileMetadata property.
    */
    public function setReportFileMetadata(?array $value): void {
        $this->reportFileMetadata = $value;
    }

    /**
     * Sets the search property value. eDiscovery search.
     * @param EdiscoverySearch|null $value Value to set for the search property.
    */
    public function setSearch(?EdiscoverySearch $value): void {
        $this->search = $value;
    }

    /**
     * Sets the siteCount property value. The number of mailboxes that had search hits.
     * @param int|null $value Value to set for the siteCount property.
    */
    public function setSiteCount(?int $value): void {
        $this->siteCount = $value;
    }

    /**
     * Sets the statisticsOptions property value. The options to generate statistics. The possible values are: includeRefiners, includeQueryStats, includeUnindexedStats, advancedIndexing, locationsWithoutHits, unknownFutureValue.
     * @param StatisticsOptions|null $value Value to set for the statisticsOptions property.
    */
    public function setStatisticsOptions(?StatisticsOptions $value): void {
        $this->statisticsOptions = $value;
    }

    /**
     * Sets the unindexedItemCount property value. The estimated count of unindexed items for the collection.
     * @param int|null $value Value to set for the unindexedItemCount property.
    */
    public function setUnindexedItemCount(?int $value): void {
        $this->unindexedItemCount = $value;
    }

    /**
     * Sets the unindexedItemsSize property value. The estimated size of unindexed items for the collection.
     * @param int|null $value Value to set for the unindexedItemsSize property.
    */
    public function setUnindexedItemsSize(?int $value): void {
        $this->unindexedItemsSize = $value;
    }

}
