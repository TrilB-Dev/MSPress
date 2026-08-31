<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExternalOriginResourceConnector extends Entity implements Parsable 
{
    /**
     * @var ConnectionInfo|null $connectionInfo The connectionInfo property
    */
    private ?ConnectionInfo $connectionInfo = null;
    
    /**
     * @var ConnectorType|null $connectorType The connectorType property
    */
    private ?ConnectorType $connectorType = null;
    
    /**
     * @var string|null $createdBy The identifier of the user or application that created the connector.
    */
    private ?string $createdBy = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time when the connector was created.
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var string|null $description A description of the connector.
    */
    private ?string $description = null;
    
    /**
     * @var string|null $displayName The display name of the connector.
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $modifiedBy The identifier of the user or application that last modified the connector.
    */
    private ?string $modifiedBy = null;
    
    /**
     * @var DateTime|null $modifiedDateTime The date and time when the connector was last modified.
    */
    private ?DateTime $modifiedDateTime = null;
    
    /**
     * Instantiates a new ExternalOriginResourceConnector and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExternalOriginResourceConnector
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExternalOriginResourceConnector {
        return new ExternalOriginResourceConnector();
    }

    /**
     * Gets the connectionInfo property value. The connectionInfo property
     * @return ConnectionInfo|null
    */
    public function getConnectionInfo(): ?ConnectionInfo {
        return $this->connectionInfo;
    }

    /**
     * Gets the connectorType property value. The connectorType property
     * @return ConnectorType|null
    */
    public function getConnectorType(): ?ConnectorType {
        return $this->connectorType;
    }

    /**
     * Gets the createdBy property value. The identifier of the user or application that created the connector.
     * @return string|null
    */
    public function getCreatedBy(): ?string {
        return $this->createdBy;
    }

    /**
     * Gets the createdDateTime property value. The date and time when the connector was created.
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the description property value. A description of the connector.
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayName property value. The display name of the connector.
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
            'connectionInfo' => fn(ParseNode $n) => $o->setConnectionInfo($n->getObjectValue([ConnectionInfo::class, 'createFromDiscriminatorValue'])),
            'connectorType' => fn(ParseNode $n) => $o->setConnectorType($n->getEnumValue(ConnectorType::class)),
            'createdBy' => fn(ParseNode $n) => $o->setCreatedBy($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'modifiedBy' => fn(ParseNode $n) => $o->setModifiedBy($n->getStringValue()),
            'modifiedDateTime' => fn(ParseNode $n) => $o->setModifiedDateTime($n->getDateTimeValue()),
        ]);
    }

    /**
     * Gets the modifiedBy property value. The identifier of the user or application that last modified the connector.
     * @return string|null
    */
    public function getModifiedBy(): ?string {
        return $this->modifiedBy;
    }

    /**
     * Gets the modifiedDateTime property value. The date and time when the connector was last modified.
     * @return DateTime|null
    */
    public function getModifiedDateTime(): ?DateTime {
        return $this->modifiedDateTime;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('connectionInfo', $this->getConnectionInfo());
        $writer->writeEnumValue('connectorType', $this->getConnectorType());
        $writer->writeStringValue('createdBy', $this->getCreatedBy());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('modifiedBy', $this->getModifiedBy());
        $writer->writeDateTimeValue('modifiedDateTime', $this->getModifiedDateTime());
    }

    /**
     * Sets the connectionInfo property value. The connectionInfo property
     * @param ConnectionInfo|null $value Value to set for the connectionInfo property.
    */
    public function setConnectionInfo(?ConnectionInfo $value): void {
        $this->connectionInfo = $value;
    }

    /**
     * Sets the connectorType property value. The connectorType property
     * @param ConnectorType|null $value Value to set for the connectorType property.
    */
    public function setConnectorType(?ConnectorType $value): void {
        $this->connectorType = $value;
    }

    /**
     * Sets the createdBy property value. The identifier of the user or application that created the connector.
     * @param string|null $value Value to set for the createdBy property.
    */
    public function setCreatedBy(?string $value): void {
        $this->createdBy = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time when the connector was created.
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the description property value. A description of the connector.
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayName property value. The display name of the connector.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the modifiedBy property value. The identifier of the user or application that last modified the connector.
     * @param string|null $value Value to set for the modifiedBy property.
    */
    public function setModifiedBy(?string $value): void {
        $this->modifiedBy = $value;
    }

    /**
     * Sets the modifiedDateTime property value. The date and time when the connector was last modified.
     * @param DateTime|null $value Value to set for the modifiedDateTime property.
    */
    public function setModifiedDateTime(?DateTime $value): void {
        $this->modifiedDateTime = $value;
    }

}
