<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models\ExternalConnectors;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class Property implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $aliases A set of aliases or a friendly name for the property. Maximum 32 characters. Only alphanumeric characters allowed. For example, each string may not contain control characters, whitespace, or any of the following: :, ;, ,, (, ), [, ], {, }, %, $, +, !, *, =, &, ?, @, #, /, ~, ', ', <, >, `, ^. Optional.
    */
    private ?array $aliases = null;
    
    /**
     * @var string|null $description Specifies a human-readable description that explains the purpose, usage, or guidance related to the property. This property enhances semantic understanding by helping Copilot interpret queries and accurately map them to properties that results in more relevant and precise responses. Optional but we recommend that you use this property for queryable properties. The maximum supported length is 200 characters.
    */
    private ?string $description = null;
    
    /**
     * @var bool|null $isQueryable Specifies if the property is queryable. Queryable properties can be used in Keyword Query Language (KQL) queries. Optional.
    */
    private ?bool $isQueryable = null;
    
    /**
     * @var bool|null $isRefinable Specifies if the property is refinable.  Refinable properties can be used to filter search results in the Search API and add a refiner control in the Microsoft Search user experience. Optional.
    */
    private ?bool $isRefinable = null;
    
    /**
     * @var bool|null $isRetrievable Specifies if the property is retrievable. Retrievable properties are returned in the result set when items are returned by the search API. Retrievable properties are also available to add to the display template used to render search results. Optional.
    */
    private ?bool $isRetrievable = null;
    
    /**
     * @var bool|null $isSearchable Specifies if the property is searchable. Only properties of type String or StringCollection can be searchable. Nonsearchable properties aren't added to the search index. Optional.
    */
    private ?bool $isSearchable = null;
    
    /**
     * @var array<Label>|null $labels Specifies one or more well-known tags added against a property. Labels help Microsoft Search understand the semantics of the data in the connection. Adding appropriate labels would result in an enhanced search experience (for example, better relevance). Optional..The possible values are: title, url, createdBy, lastModifiedBy, authors, createdDateTime, lastModifiedDateTime, fileName, fileExtension, unknownFutureValue, containerName, containerUrl, iconUrl, assignedTo, dueDate, closedDate, closedBy, reportedBy, sprintName, severity, state, priority, secondaryId, itemParentId, parentUrl, tags, itemType, itemPath, numReactions. Use the Prefer: include-unknown-enum-members request header to retrieve additional values defined in this evolvable enum,For People Connectors you can include : personEmails, personAddresses, personAnniversaries, personName, personNote, personPhones, personCurrentPosition, personWebAccounts, personWebSite, personSkills, personProjects, personAccount, personAwards, personCertifications, personAssistants, personColleagues, personManager, personAlternateContacts, personEmergencyContacts.
    */
    private ?array $labels = null;
    
    /**
     * @var string|null $name The name of the property. Maximum 32 characters. Only alphanumeric characters allowed. For example, each string may not contain control characters, whitespace, or any of the following: :, ;, ,, (, ), [, ], {, }, %, $, +, !, *, =, &, ?, @, #, /, ~, ', ', <, >, `, ^.  Required.
    */
    private ?string $name = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var PropertyType|null $type The type property
    */
    private ?PropertyType $type = null;
    
    /**
     * Instantiates a new Property and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Property
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Property {
        return new Property();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the aliases property value. A set of aliases or a friendly name for the property. Maximum 32 characters. Only alphanumeric characters allowed. For example, each string may not contain control characters, whitespace, or any of the following: :, ;, ,, (, ), [, ], {, }, %, $, +, !, *, =, &, ?, @, #, /, ~, ', ', <, >, `, ^. Optional.
     * @return array<string>|null
    */
    public function getAliases(): ?array {
        return $this->aliases;
    }

    /**
     * Gets the description property value. Specifies a human-readable description that explains the purpose, usage, or guidance related to the property. This property enhances semantic understanding by helping Copilot interpret queries and accurately map them to properties that results in more relevant and precise responses. Optional but we recommend that you use this property for queryable properties. The maximum supported length is 200 characters.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'aliases' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAliases($val);
            },
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'isQueryable' => fn(ParseNode $n) => $o->setIsQueryable($n->getBooleanValue()),
            'isRefinable' => fn(ParseNode $n) => $o->setIsRefinable($n->getBooleanValue()),
            'isRetrievable' => fn(ParseNode $n) => $o->setIsRetrievable($n->getBooleanValue()),
            'isSearchable' => fn(ParseNode $n) => $o->setIsSearchable($n->getBooleanValue()),
            'labels' => fn(ParseNode $n) => $o->setLabels($n->getCollectionOfEnumValues(Label::class)),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(PropertyType::class)),
        ];
    }

    /**
     * Gets the isQueryable property value. Specifies if the property is queryable. Queryable properties can be used in Keyword Query Language (KQL) queries. Optional.
     * @return bool|null
    */
    public function getIsQueryable(): ?bool {
        return $this->isQueryable;
    }

    /**
     * Gets the isRefinable property value. Specifies if the property is refinable.  Refinable properties can be used to filter search results in the Search API and add a refiner control in the Microsoft Search user experience. Optional.
     * @return bool|null
    */
    public function getIsRefinable(): ?bool {
        return $this->isRefinable;
    }

    /**
     * Gets the isRetrievable property value. Specifies if the property is retrievable. Retrievable properties are returned in the result set when items are returned by the search API. Retrievable properties are also available to add to the display template used to render search results. Optional.
     * @return bool|null
    */
    public function getIsRetrievable(): ?bool {
        return $this->isRetrievable;
    }

    /**
     * Gets the isSearchable property value. Specifies if the property is searchable. Only properties of type String or StringCollection can be searchable. Nonsearchable properties aren't added to the search index. Optional.
     * @return bool|null
    */
    public function getIsSearchable(): ?bool {
        return $this->isSearchable;
    }

    /**
     * Gets the labels property value. Specifies one or more well-known tags added against a property. Labels help Microsoft Search understand the semantics of the data in the connection. Adding appropriate labels would result in an enhanced search experience (for example, better relevance). Optional..The possible values are: title, url, createdBy, lastModifiedBy, authors, createdDateTime, lastModifiedDateTime, fileName, fileExtension, unknownFutureValue, containerName, containerUrl, iconUrl, assignedTo, dueDate, closedDate, closedBy, reportedBy, sprintName, severity, state, priority, secondaryId, itemParentId, parentUrl, tags, itemType, itemPath, numReactions. Use the Prefer: include-unknown-enum-members request header to retrieve additional values defined in this evolvable enum,For People Connectors you can include : personEmails, personAddresses, personAnniversaries, personName, personNote, personPhones, personCurrentPosition, personWebAccounts, personWebSite, personSkills, personProjects, personAccount, personAwards, personCertifications, personAssistants, personColleagues, personManager, personAlternateContacts, personEmergencyContacts.
     * @return array<Label>|null
    */
    public function getLabels(): ?array {
        return $this->labels;
    }

    /**
     * Gets the name property value. The name of the property. Maximum 32 characters. Only alphanumeric characters allowed. For example, each string may not contain control characters, whitespace, or any of the following: :, ;, ,, (, ), [, ], {, }, %, $, +, !, *, =, &, ?, @, #, /, ~, ', ', <, >, `, ^.  Required.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the type property value. The type property
     * @return PropertyType|null
    */
    public function getType(): ?PropertyType {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('aliases', $this->getAliases());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeBooleanValue('isQueryable', $this->getIsQueryable());
        $writer->writeBooleanValue('isRefinable', $this->getIsRefinable());
        $writer->writeBooleanValue('isRetrievable', $this->getIsRetrievable());
        $writer->writeBooleanValue('isSearchable', $this->getIsSearchable());
        $writer->writeCollectionOfEnumValues('labels', $this->getLabels());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the aliases property value. A set of aliases or a friendly name for the property. Maximum 32 characters. Only alphanumeric characters allowed. For example, each string may not contain control characters, whitespace, or any of the following: :, ;, ,, (, ), [, ], {, }, %, $, +, !, *, =, &, ?, @, #, /, ~, ', ', <, >, `, ^. Optional.
     * @param array<string>|null $value Value to set for the aliases property.
    */
    public function setAliases(?array $value): void {
        $this->aliases = $value;
    }

    /**
     * Sets the description property value. Specifies a human-readable description that explains the purpose, usage, or guidance related to the property. This property enhances semantic understanding by helping Copilot interpret queries and accurately map them to properties that results in more relevant and precise responses. Optional but we recommend that you use this property for queryable properties. The maximum supported length is 200 characters.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the isQueryable property value. Specifies if the property is queryable. Queryable properties can be used in Keyword Query Language (KQL) queries. Optional.
     * @param bool|null $value Value to set for the isQueryable property.
    */
    public function setIsQueryable(?bool $value): void {
        $this->isQueryable = $value;
    }

    /**
     * Sets the isRefinable property value. Specifies if the property is refinable.  Refinable properties can be used to filter search results in the Search API and add a refiner control in the Microsoft Search user experience. Optional.
     * @param bool|null $value Value to set for the isRefinable property.
    */
    public function setIsRefinable(?bool $value): void {
        $this->isRefinable = $value;
    }

    /**
     * Sets the isRetrievable property value. Specifies if the property is retrievable. Retrievable properties are returned in the result set when items are returned by the search API. Retrievable properties are also available to add to the display template used to render search results. Optional.
     * @param bool|null $value Value to set for the isRetrievable property.
    */
    public function setIsRetrievable(?bool $value): void {
        $this->isRetrievable = $value;
    }

    /**
     * Sets the isSearchable property value. Specifies if the property is searchable. Only properties of type String or StringCollection can be searchable. Nonsearchable properties aren't added to the search index. Optional.
     * @param bool|null $value Value to set for the isSearchable property.
    */
    public function setIsSearchable(?bool $value): void {
        $this->isSearchable = $value;
    }

    /**
     * Sets the labels property value. Specifies one or more well-known tags added against a property. Labels help Microsoft Search understand the semantics of the data in the connection. Adding appropriate labels would result in an enhanced search experience (for example, better relevance). Optional..The possible values are: title, url, createdBy, lastModifiedBy, authors, createdDateTime, lastModifiedDateTime, fileName, fileExtension, unknownFutureValue, containerName, containerUrl, iconUrl, assignedTo, dueDate, closedDate, closedBy, reportedBy, sprintName, severity, state, priority, secondaryId, itemParentId, parentUrl, tags, itemType, itemPath, numReactions. Use the Prefer: include-unknown-enum-members request header to retrieve additional values defined in this evolvable enum,For People Connectors you can include : personEmails, personAddresses, personAnniversaries, personName, personNote, personPhones, personCurrentPosition, personWebAccounts, personWebSite, personSkills, personProjects, personAccount, personAwards, personCertifications, personAssistants, personColleagues, personManager, personAlternateContacts, personEmergencyContacts.
     * @param array<Label>|null $value Value to set for the labels property.
    */
    public function setLabels(?array $value): void {
        $this->labels = $value;
    }

    /**
     * Sets the name property value. The name of the property. Maximum 32 characters. Only alphanumeric characters allowed. For example, each string may not contain control characters, whitespace, or any of the following: :, ;, ,, (, ), [, ], {, }, %, $, +, !, *, =, &, ?, @, #, /, ~, ', ', <, >, `, ^.  Required.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the type property value. The type property
     * @param PropertyType|null $value Value to set for the type property.
    */
    public function setType(?PropertyType $value): void {
        $this->type = $value;
    }

}
