<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class TargetOwners implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var NotifyMembers|null $notifyMembers The notifyMembers property
    */
    private ?NotifyMembers $notifyMembers = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var array<string>|null $securityGroups The collection of IDs for security groups used for allowing or blocking filtering. When notifyMembers is all, all members are eligible for ownership and this collection can be empty. When notifyMembers is allowSelected, only members in these security groups are eligible. When notifyMembers is blockSelected, members in these security groups are excluded.
    */
    private ?array $securityGroups = null;
    
    /**
     * Instantiates a new TargetOwners and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TargetOwners
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TargetOwners {
        return new TargetOwners();
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
            'notifyMembers' => fn(ParseNode $n) => $o->setNotifyMembers($n->getEnumValue(NotifyMembers::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'securityGroups' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSecurityGroups($val);
            },
        ];
    }

    /**
     * Gets the notifyMembers property value. The notifyMembers property
     * @return NotifyMembers|null
    */
    public function getNotifyMembers(): ?NotifyMembers {
        return $this->notifyMembers;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the securityGroups property value. The collection of IDs for security groups used for allowing or blocking filtering. When notifyMembers is all, all members are eligible for ownership and this collection can be empty. When notifyMembers is allowSelected, only members in these security groups are eligible. When notifyMembers is blockSelected, members in these security groups are excluded.
     * @return array<string>|null
    */
    public function getSecurityGroups(): ?array {
        return $this->securityGroups;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('notifyMembers', $this->getNotifyMembers());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeCollectionOfPrimitiveValues('securityGroups', $this->getSecurityGroups());
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
     * Sets the notifyMembers property value. The notifyMembers property
     * @param NotifyMembers|null $value Value to set for the notifyMembers property.
    */
    public function setNotifyMembers(?NotifyMembers $value): void {
        $this->notifyMembers = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the securityGroups property value. The collection of IDs for security groups used for allowing or blocking filtering. When notifyMembers is all, all members are eligible for ownership and this collection can be empty. When notifyMembers is allowSelected, only members in these security groups are eligible. When notifyMembers is blockSelected, members in these security groups are excluded.
     * @param array<string>|null $value Value to set for the securityGroups property.
    */
    public function setSecurityGroups(?array $value): void {
        $this->securityGroups = $value;
    }

}
