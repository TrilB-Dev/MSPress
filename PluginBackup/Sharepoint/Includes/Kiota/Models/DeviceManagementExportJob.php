<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * Entity representing a job to export a report.
*/
class DeviceManagementExportJob extends Entity implements Parsable 
{
    /**
     * @var DateTime|null $expirationDateTime Time that the exported report expires.
    */
    private ?DateTime $expirationDateTime = null;
    
    /**
     * @var string|null $filter Filters applied on the report. The maximum length allowed for this property is 2000 characters.
    */
    private ?string $filter = null;
    
    /**
     * @var DeviceManagementReportFileFormat|null $format Possible values for the file format of a report to be exported.
    */
    private ?DeviceManagementReportFileFormat $format = null;
    
    /**
     * @var DeviceManagementExportJobLocalizationType|null $localizationType Configures how the requested export job is localized.
    */
    private ?DeviceManagementExportJobLocalizationType $localizationType = null;
    
    /**
     * @var string|null $reportName Name of the report. The maximum length allowed for this property is 2000 characters.
    */
    private ?string $reportName = null;
    
    /**
     * @var DateTime|null $requestDateTime Time that the exported report was requested.
    */
    private ?DateTime $requestDateTime = null;
    
    /**
     * @var array<string>|null $select Columns selected from the report. The maximum number of allowed columns names is 256. The maximum length allowed for each column name in this property is 1000 characters.
    */
    private ?array $select = null;
    
    /**
     * @var string|null $snapshotId A snapshot is an identifiable subset of the dataset represented by the ReportName. A sessionId or CachedReportConfiguration id can be used here. If a sessionId is specified, Filter, Select, and OrderBy are applied to the data represented by the sessionId. Filter, Select, and OrderBy cannot be specified together with a CachedReportConfiguration id. The maximum length allowed for this property is 128 characters.
    */
    private ?string $snapshotId = null;
    
    /**
     * @var DeviceManagementReportStatus|null $status Possible statuses associated with a generated report.
    */
    private ?DeviceManagementReportStatus $status = null;
    
    /**
     * @var string|null $url Temporary location of the exported report.
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new DeviceManagementExportJob and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DeviceManagementExportJob
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DeviceManagementExportJob {
        return new DeviceManagementExportJob();
    }

    /**
     * Gets the expirationDateTime property value. Time that the exported report expires.
     * @return DateTime|null
    */
    public function getExpirationDateTime(): ?DateTime {
        return $this->expirationDateTime;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'expirationDateTime' => fn(ParseNode $n) => $o->setExpirationDateTime($n->getDateTimeValue()),
            'filter' => fn(ParseNode $n) => $o->setFilter($n->getStringValue()),
            'format' => fn(ParseNode $n) => $o->setFormat($n->getEnumValue(DeviceManagementReportFileFormat::class)),
            'localizationType' => fn(ParseNode $n) => $o->setLocalizationType($n->getEnumValue(DeviceManagementExportJobLocalizationType::class)),
            'reportName' => fn(ParseNode $n) => $o->setReportName($n->getStringValue()),
            'requestDateTime' => fn(ParseNode $n) => $o->setRequestDateTime($n->getDateTimeValue()),
            'select' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSelect($val);
            },
            'snapshotId' => fn(ParseNode $n) => $o->setSnapshotId($n->getStringValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(DeviceManagementReportStatus::class)),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ]);
    }

    /**
     * Gets the filter property value. Filters applied on the report. The maximum length allowed for this property is 2000 characters.
     * @return string|null
    */
    public function getFilter(): ?string {
        return $this->filter;
    }

    /**
     * Gets the format property value. Possible values for the file format of a report to be exported.
     * @return DeviceManagementReportFileFormat|null
    */
    public function getFormat(): ?DeviceManagementReportFileFormat {
        return $this->format;
    }

    /**
     * Gets the localizationType property value. Configures how the requested export job is localized.
     * @return DeviceManagementExportJobLocalizationType|null
    */
    public function getLocalizationType(): ?DeviceManagementExportJobLocalizationType {
        return $this->localizationType;
    }

    /**
     * Gets the reportName property value. Name of the report. The maximum length allowed for this property is 2000 characters.
     * @return string|null
    */
    public function getReportName(): ?string {
        return $this->reportName;
    }

    /**
     * Gets the requestDateTime property value. Time that the exported report was requested.
     * @return DateTime|null
    */
    public function getRequestDateTime(): ?DateTime {
        return $this->requestDateTime;
    }

    /**
     * Gets the select property value. Columns selected from the report. The maximum number of allowed columns names is 256. The maximum length allowed for each column name in this property is 1000 characters.
     * @return array<string>|null
    */
    public function getSelect(): ?array {
        return $this->select;
    }

    /**
     * Gets the snapshotId property value. A snapshot is an identifiable subset of the dataset represented by the ReportName. A sessionId or CachedReportConfiguration id can be used here. If a sessionId is specified, Filter, Select, and OrderBy are applied to the data represented by the sessionId. Filter, Select, and OrderBy cannot be specified together with a CachedReportConfiguration id. The maximum length allowed for this property is 128 characters.
     * @return string|null
    */
    public function getSnapshotId(): ?string {
        return $this->snapshotId;
    }

    /**
     * Gets the status property value. Possible statuses associated with a generated report.
     * @return DeviceManagementReportStatus|null
    */
    public function getStatus(): ?DeviceManagementReportStatus {
        return $this->status;
    }

    /**
     * Gets the url property value. Temporary location of the exported report.
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
        $writer->writeDateTimeValue('expirationDateTime', $this->getExpirationDateTime());
        $writer->writeStringValue('filter', $this->getFilter());
        $writer->writeEnumValue('format', $this->getFormat());
        $writer->writeEnumValue('localizationType', $this->getLocalizationType());
        $writer->writeStringValue('reportName', $this->getReportName());
        $writer->writeDateTimeValue('requestDateTime', $this->getRequestDateTime());
        $writer->writeCollectionOfPrimitiveValues('select', $this->getSelect());
        $writer->writeStringValue('snapshotId', $this->getSnapshotId());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeStringValue('url', $this->getUrl());
    }

    /**
     * Sets the expirationDateTime property value. Time that the exported report expires.
     * @param DateTime|null $value Value to set for the expirationDateTime property.
    */
    public function setExpirationDateTime(?DateTime $value): void {
        $this->expirationDateTime = $value;
    }

    /**
     * Sets the filter property value. Filters applied on the report. The maximum length allowed for this property is 2000 characters.
     * @param string|null $value Value to set for the filter property.
    */
    public function setFilter(?string $value): void {
        $this->filter = $value;
    }

    /**
     * Sets the format property value. Possible values for the file format of a report to be exported.
     * @param DeviceManagementReportFileFormat|null $value Value to set for the format property.
    */
    public function setFormat(?DeviceManagementReportFileFormat $value): void {
        $this->format = $value;
    }

    /**
     * Sets the localizationType property value. Configures how the requested export job is localized.
     * @param DeviceManagementExportJobLocalizationType|null $value Value to set for the localizationType property.
    */
    public function setLocalizationType(?DeviceManagementExportJobLocalizationType $value): void {
        $this->localizationType = $value;
    }

    /**
     * Sets the reportName property value. Name of the report. The maximum length allowed for this property is 2000 characters.
     * @param string|null $value Value to set for the reportName property.
    */
    public function setReportName(?string $value): void {
        $this->reportName = $value;
    }

    /**
     * Sets the requestDateTime property value. Time that the exported report was requested.
     * @param DateTime|null $value Value to set for the requestDateTime property.
    */
    public function setRequestDateTime(?DateTime $value): void {
        $this->requestDateTime = $value;
    }

    /**
     * Sets the select property value. Columns selected from the report. The maximum number of allowed columns names is 256. The maximum length allowed for each column name in this property is 1000 characters.
     * @param array<string>|null $value Value to set for the select property.
    */
    public function setSelect(?array $value): void {
        $this->select = $value;
    }

    /**
     * Sets the snapshotId property value. A snapshot is an identifiable subset of the dataset represented by the ReportName. A sessionId or CachedReportConfiguration id can be used here. If a sessionId is specified, Filter, Select, and OrderBy are applied to the data represented by the sessionId. Filter, Select, and OrderBy cannot be specified together with a CachedReportConfiguration id. The maximum length allowed for this property is 128 characters.
     * @param string|null $value Value to set for the snapshotId property.
    */
    public function setSnapshotId(?string $value): void {
        $this->snapshotId = $value;
    }

    /**
     * Sets the status property value. Possible statuses associated with a generated report.
     * @param DeviceManagementReportStatus|null $value Value to set for the status property.
    */
    public function setStatus(?DeviceManagementReportStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the url property value. Temporary location of the exported report.
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
