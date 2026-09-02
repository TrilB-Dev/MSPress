<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Security;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\Entity;

/**
 * Represents a query against the unified audit log.
*/
class AuditLogQuery extends Entity implements Parsable 
{
    /**
     * @var array<string>|null $administrativeUnitIdFilters The collection of administrative unit IDs to filter on.
    */
    private ?array $administrativeUnitIdFilters = null;
    
    /**
     * @var string|null $displayName The display name of the audit log query.
    */
    private ?string $displayName = null;
    
    /**
     * @var DateTime|null $filterEndDateTime The end date and time of the audit log query filter.
    */
    private ?DateTime $filterEndDateTime = null;
    
    /**
     * @var DateTime|null $filterStartDateTime The start date and time of the audit log query filter.
    */
    private ?DateTime $filterStartDateTime = null;
    
    /**
     * @var array<string>|null $ipAddressFilters The collection of IP addresses to filter on.
    */
    private ?array $ipAddressFilters = null;
    
    /**
     * @var string|null $keywordFilter The keyword to filter on.
    */
    private ?string $keywordFilter = null;
    
    /**
     * @var array<string>|null $objectIdFilters The collection of object IDs to filter on.
    */
    private ?array $objectIdFilters = null;
    
    /**
     * @var array<string>|null $operationFilters The collection of operations to filter on.
    */
    private ?array $operationFilters = null;
    
    /**
     * @var array<AuditLogRecord>|null $records The collection of audit log records retrieved by the query.
    */
    private ?array $records = null;
    
    /**
     * @var array<AuditLogRecordType>|null $recordTypeFilters The collection of record types to filter on.
    */
    private ?array $recordTypeFilters = null;
    
    /**
     * @var array<string>|null $serviceFilters The collection of services to filter on.
    */
    private ?array $serviceFilters = null;
    
    /**
     * @var AuditLogQueryStatus|null $status The status of the audit log query. Possible values are: notStarted, running, succeeded, failed, cancelled, unknownFutureValue.
    */
    private ?AuditLogQueryStatus $status = null;
    
    /**
     * @var array<string>|null $userPrincipalNameFilters The collection of user principal names to filter on.
    */
    private ?array $userPrincipalNameFilters = null;
    
    /**
     * Instantiates a new AuditLogQuery and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AuditLogQuery
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AuditLogQuery {
        return new AuditLogQuery();
    }

    /**
     * Gets the administrativeUnitIdFilters property value. The collection of administrative unit IDs to filter on.
     * @return array<string>|null
    */
    public function getAdministrativeUnitIdFilters(): ?array {
        return $this->administrativeUnitIdFilters;
    }

    /**
     * Gets the displayName property value. The display name of the audit log query.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'administrativeUnitIdFilters' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAdministrativeUnitIdFilters($val);
            },
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'filterEndDateTime' => fn(ParseNode $n) => $o->setFilterEndDateTime($n->getDateTimeValue()),
            'filterStartDateTime' => fn(ParseNode $n) => $o->setFilterStartDateTime($n->getDateTimeValue()),
            'ipAddressFilters' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIpAddressFilters($val);
            },
            'keywordFilter' => fn(ParseNode $n) => $o->setKeywordFilter($n->getStringValue()),
            'objectIdFilters' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setObjectIdFilters($val);
            },
            'operationFilters' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setOperationFilters($val);
            },
            'records' => fn(ParseNode $n) => $o->setRecords($n->getCollectionOfObjectValues([AuditLogRecord::class, 'createFromDiscriminatorValue'])),
            'recordTypeFilters' => fn(ParseNode $n) => $o->setRecordTypeFilters($n->getCollectionOfEnumValues(AuditLogRecordType::class)),
            'serviceFilters' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setServiceFilters($val);
            },
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(AuditLogQueryStatus::class)),
            'userPrincipalNameFilters' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setUserPrincipalNameFilters($val);
            },
        ]);
    }

    /**
     * Gets the filterEndDateTime property value. The end date and time of the audit log query filter.
     * @return DateTime|null
    */
    public function getFilterEndDateTime(): ?DateTime {
        return $this->filterEndDateTime;
    }

    /**
     * Gets the filterStartDateTime property value. The start date and time of the audit log query filter.
     * @return DateTime|null
    */
    public function getFilterStartDateTime(): ?DateTime {
        return $this->filterStartDateTime;
    }

    /**
     * Gets the ipAddressFilters property value. The collection of IP addresses to filter on.
     * @return array<string>|null
    */
    public function getIpAddressFilters(): ?array {
        return $this->ipAddressFilters;
    }

    /**
     * Gets the keywordFilter property value. The keyword to filter on.
     * @return string|null
    */
    public function getKeywordFilter(): ?string {
        return $this->keywordFilter;
    }

    /**
     * Gets the objectIdFilters property value. The collection of object IDs to filter on.
     * @return array<string>|null
    */
    public function getObjectIdFilters(): ?array {
        return $this->objectIdFilters;
    }

    /**
     * Gets the operationFilters property value. The collection of operations to filter on.
     * @return array<string>|null
    */
    public function getOperationFilters(): ?array {
        return $this->operationFilters;
    }

    /**
     * Gets the records property value. The collection of audit log records retrieved by the query.
     * @return array<AuditLogRecord>|null
    */
    public function getRecords(): ?array {
        return $this->records;
    }

    /**
     * Gets the recordTypeFilters property value. The collection of record types to filter on.
     * @return array<AuditLogRecordType>|null
    */
    public function getRecordTypeFilters(): ?array {
        return $this->recordTypeFilters;
    }

    /**
     * Gets the serviceFilters property value. The collection of services to filter on.
     * @return array<string>|null
    */
    public function getServiceFilters(): ?array {
        return $this->serviceFilters;
    }

    /**
     * Gets the status property value. The status of the audit log query. Possible values are: notStarted, running, succeeded, failed, cancelled, unknownFutureValue.
     * @return AuditLogQueryStatus|null
    */
    public function getStatus(): ?AuditLogQueryStatus {
        return $this->status;
    }

    /**
     * Gets the userPrincipalNameFilters property value. The collection of user principal names to filter on.
     * @return array<string>|null
    */
    public function getUserPrincipalNameFilters(): ?array {
        return $this->userPrincipalNameFilters;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfPrimitiveValues('administrativeUnitIdFilters', $this->getAdministrativeUnitIdFilters());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeDateTimeValue('filterEndDateTime', $this->getFilterEndDateTime());
        $writer->writeDateTimeValue('filterStartDateTime', $this->getFilterStartDateTime());
        $writer->writeCollectionOfPrimitiveValues('ipAddressFilters', $this->getIpAddressFilters());
        $writer->writeStringValue('keywordFilter', $this->getKeywordFilter());
        $writer->writeCollectionOfPrimitiveValues('objectIdFilters', $this->getObjectIdFilters());
        $writer->writeCollectionOfPrimitiveValues('operationFilters', $this->getOperationFilters());
        $writer->writeCollectionOfObjectValues('records', $this->getRecords());
        $writer->writeCollectionOfEnumValues('recordTypeFilters', $this->getRecordTypeFilters());
        $writer->writeCollectionOfPrimitiveValues('serviceFilters', $this->getServiceFilters());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeCollectionOfPrimitiveValues('userPrincipalNameFilters', $this->getUserPrincipalNameFilters());
    }

    /**
     * Sets the administrativeUnitIdFilters property value. The collection of administrative unit IDs to filter on.
     * @param array<string>|null $value Value to set for the administrativeUnitIdFilters property.
    */
    public function setAdministrativeUnitIdFilters(?array $value): void {
        $this->administrativeUnitIdFilters = $value;
    }

    /**
     * Sets the displayName property value. The display name of the audit log query.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the filterEndDateTime property value. The end date and time of the audit log query filter.
     * @param DateTime|null $value Value to set for the filterEndDateTime property.
    */
    public function setFilterEndDateTime(?DateTime $value): void {
        $this->filterEndDateTime = $value;
    }

    /**
     * Sets the filterStartDateTime property value. The start date and time of the audit log query filter.
     * @param DateTime|null $value Value to set for the filterStartDateTime property.
    */
    public function setFilterStartDateTime(?DateTime $value): void {
        $this->filterStartDateTime = $value;
    }

    /**
     * Sets the ipAddressFilters property value. The collection of IP addresses to filter on.
     * @param array<string>|null $value Value to set for the ipAddressFilters property.
    */
    public function setIpAddressFilters(?array $value): void {
        $this->ipAddressFilters = $value;
    }

    /**
     * Sets the keywordFilter property value. The keyword to filter on.
     * @param string|null $value Value to set for the keywordFilter property.
    */
    public function setKeywordFilter(?string $value): void {
        $this->keywordFilter = $value;
    }

    /**
     * Sets the objectIdFilters property value. The collection of object IDs to filter on.
     * @param array<string>|null $value Value to set for the objectIdFilters property.
    */
    public function setObjectIdFilters(?array $value): void {
        $this->objectIdFilters = $value;
    }

    /**
     * Sets the operationFilters property value. The collection of operations to filter on.
     * @param array<string>|null $value Value to set for the operationFilters property.
    */
    public function setOperationFilters(?array $value): void {
        $this->operationFilters = $value;
    }

    /**
     * Sets the records property value. The collection of audit log records retrieved by the query.
     * @param array<AuditLogRecord>|null $value Value to set for the records property.
    */
    public function setRecords(?array $value): void {
        $this->records = $value;
    }

    /**
     * Sets the recordTypeFilters property value. The collection of record types to filter on.
     * @param array<AuditLogRecordType>|null $value Value to set for the recordTypeFilters property.
    */
    public function setRecordTypeFilters(?array $value): void {
        $this->recordTypeFilters = $value;
    }

    /**
     * Sets the serviceFilters property value. The collection of services to filter on.
     * @param array<string>|null $value Value to set for the serviceFilters property.
    */
    public function setServiceFilters(?array $value): void {
        $this->serviceFilters = $value;
    }

    /**
     * Sets the status property value. The status of the audit log query. Possible values are: notStarted, running, succeeded, failed, cancelled, unknownFutureValue.
     * @param AuditLogQueryStatus|null $value Value to set for the status property.
    */
    public function setStatus(?AuditLogQueryStatus $value): void {
        $this->status = $value;
    }

    /**
     * Sets the userPrincipalNameFilters property value. The collection of user principal names to filter on.
     * @param array<string>|null $value Value to set for the userPrincipalNameFilters property.
    */
    public function setUserPrincipalNameFilters(?array $value): void {
        $this->userPrincipalNameFilters = $value;
    }

}
