<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AccessReviewReviewerScope implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var string|null $query The query specifying who will be the reviewer.
    */
    private ?string $query = null;
    
    /**
     * @var string|null $queryRoot In the scenario where reviewers need to be specified dynamically, this property is used to indicate the relative source of the query. This property is only required if a relative query, for example, ./manager, is specified. Possible value: decisions.
    */
    private ?string $queryRoot = null;
    
    /**
     * @var string|null $queryType The type of query. Examples include MicrosoftGraph and ARM.
    */
    private ?string $queryType = null;
    
    /**
     * @var string|null $reviewerId The identifier of the reviewer.
    */
    private ?string $reviewerId = null;
    
    /**
     * @var AccessReviewReviewerScopeType|null $scopeType The scopeType property
    */
    private ?AccessReviewReviewerScopeType $scopeType = null;
    
    /**
     * Instantiates a new AccessReviewReviewerScope and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AccessReviewReviewerScope
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AccessReviewReviewerScope {
        return new AccessReviewReviewerScope();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'query' => fn(ParseNode $n) => $o->setQuery($n->getStringValue()),
            'queryRoot' => fn(ParseNode $n) => $o->setQueryRoot($n->getStringValue()),
            'queryType' => fn(ParseNode $n) => $o->setQueryType($n->getStringValue()),
            'reviewerId' => fn(ParseNode $n) => $o->setReviewerId($n->getStringValue()),
            'scopeType' => fn(ParseNode $n) => $o->setScopeType($n->getEnumValue(AccessReviewReviewerScopeType::class)),
        ];
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the query property value. The query specifying who will be the reviewer.
     * @return string|null
    */
    public function getQuery(): ?string {
        return $this->query;
    }

    /**
     * Gets the queryRoot property value. In the scenario where reviewers need to be specified dynamically, this property is used to indicate the relative source of the query. This property is only required if a relative query, for example, ./manager, is specified. Possible value: decisions.
     * @return string|null
    */
    public function getQueryRoot(): ?string {
        return $this->queryRoot;
    }

    /**
     * Gets the queryType property value. The type of query. Examples include MicrosoftGraph and ARM.
     * @return string|null
    */
    public function getQueryType(): ?string {
        return $this->queryType;
    }

    /**
     * Gets the reviewerId property value. The identifier of the reviewer.
     * @return string|null
    */
    public function getReviewerId(): ?string {
        return $this->reviewerId;
    }

    /**
     * Gets the scopeType property value. The scopeType property
     * @return AccessReviewReviewerScopeType|null
    */
    public function getScopeType(): ?AccessReviewReviewerScopeType {
        return $this->scopeType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeStringValue('query', $this->getQuery());
        $writer->writeStringValue('queryRoot', $this->getQueryRoot());
        $writer->writeStringValue('queryType', $this->getQueryType());
        $writer->writeStringValue('reviewerId', $this->getReviewerId());
        $writer->writeEnumValue('scopeType', $this->getScopeType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the query property value. The query specifying who will be the reviewer.
     * @param string|null $value Value to set for the query property.
    */
    public function setQuery(?string $value): void {
        $this->query = $value;
    }

    /**
     * Sets the queryRoot property value. In the scenario where reviewers need to be specified dynamically, this property is used to indicate the relative source of the query. This property is only required if a relative query, for example, ./manager, is specified. Possible value: decisions.
     * @param string|null $value Value to set for the queryRoot property.
    */
    public function setQueryRoot(?string $value): void {
        $this->queryRoot = $value;
    }

    /**
     * Sets the queryType property value. The type of query. Examples include MicrosoftGraph and ARM.
     * @param string|null $value Value to set for the queryType property.
    */
    public function setQueryType(?string $value): void {
        $this->queryType = $value;
    }

    /**
     * Sets the reviewerId property value. The identifier of the reviewer.
     * @param string|null $value Value to set for the reviewerId property.
    */
    public function setReviewerId(?string $value): void {
        $this->reviewerId = $value;
    }

    /**
     * Sets the scopeType property value. The scopeType property
     * @param AccessReviewReviewerScopeType|null $value Value to set for the scopeType property.
    */
    public function setScopeType(?AccessReviewReviewerScopeType $value): void {
        $this->scopeType = $value;
    }

}
