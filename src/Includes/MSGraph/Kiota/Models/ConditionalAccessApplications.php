<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class ConditionalAccessApplications implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ConditionalAccessFilter|null $applicationFilter Filter that defines the dynamic-application-syntax rule to include/exclude cloud applications. A filter can use custom security attributes to include/exclude applications.
    */
    private ?ConditionalAccessFilter $applicationFilter = null;
    
    /**
     * @var array<string>|null $excludeApplications Can be one of the following:  The list of client IDs (appId) explicitly excluded from the policy. Office365 - For the list of apps included in Office365, see Apps included in Conditional Access Office 365 app suite  MicrosoftAdminPortals - For more information, see Conditional Access Target resources: Microsoft Admin Portals
    */
    private ?array $excludeApplications = null;
    
    /**
     * @var array<string>|null $includeApplications Can be one of the following:  The list of client IDs (appId) the policy applies to, unless explicitly excluded (in excludeApplications)  All  Office365 - For the list of apps included in Office365, see Apps included in Conditional Access Office 365 app suite  MicrosoftAdminPortals - For more information, see Conditional Access Target resources: Microsoft Admin Portals
    */
    private ?array $includeApplications = null;
    
    /**
     * @var array<string>|null $includeAuthenticationContextClassReferences The includeAuthenticationContextClassReferences property
    */
    private ?array $includeAuthenticationContextClassReferences = null;
    
    /**
     * @var array<string>|null $includeUserActions User actions to include. Supported values are urn:user:registersecurityinfo and urn:user:registerdevice
    */
    private ?array $includeUserActions = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * Instantiates a new ConditionalAccessApplications and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConditionalAccessApplications
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConditionalAccessApplications {
        return new ConditionalAccessApplications();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the applicationFilter property value. Filter that defines the dynamic-application-syntax rule to include/exclude cloud applications. A filter can use custom security attributes to include/exclude applications.
     * @return ConditionalAccessFilter|null
    */
    public function getApplicationFilter(): ?ConditionalAccessFilter {
        return $this->applicationFilter;
    }

    /**
     * Gets the excludeApplications property value. Can be one of the following:  The list of client IDs (appId) explicitly excluded from the policy. Office365 - For the list of apps included in Office365, see Apps included in Conditional Access Office 365 app suite  MicrosoftAdminPortals - For more information, see Conditional Access Target resources: Microsoft Admin Portals
     * @return array<string>|null
    */
    public function getExcludeApplications(): ?array {
        return $this->excludeApplications;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'applicationFilter' => fn(ParseNode $n) => $o->setApplicationFilter($n->getObjectValue([ConditionalAccessFilter::class, 'createFromDiscriminatorValue'])),
            'excludeApplications' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setExcludeApplications($val);
            },
            'includeApplications' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIncludeApplications($val);
            },
            'includeAuthenticationContextClassReferences' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIncludeAuthenticationContextClassReferences($val);
            },
            'includeUserActions' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIncludeUserActions($val);
            },
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
        ];
    }

    /**
     * Gets the includeApplications property value. Can be one of the following:  The list of client IDs (appId) the policy applies to, unless explicitly excluded (in excludeApplications)  All  Office365 - For the list of apps included in Office365, see Apps included in Conditional Access Office 365 app suite  MicrosoftAdminPortals - For more information, see Conditional Access Target resources: Microsoft Admin Portals
     * @return array<string>|null
    */
    public function getIncludeApplications(): ?array {
        return $this->includeApplications;
    }

    /**
     * Gets the includeAuthenticationContextClassReferences property value. The includeAuthenticationContextClassReferences property
     * @return array<string>|null
    */
    public function getIncludeAuthenticationContextClassReferences(): ?array {
        return $this->includeAuthenticationContextClassReferences;
    }

    /**
     * Gets the includeUserActions property value. User actions to include. Supported values are urn:user:registersecurityinfo and urn:user:registerdevice
     * @return array<string>|null
    */
    public function getIncludeUserActions(): ?array {
        return $this->includeUserActions;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('applicationFilter', $this->getApplicationFilter());
        $writer->writeCollectionOfPrimitiveValues('excludeApplications', $this->getExcludeApplications());
        $writer->writeCollectionOfPrimitiveValues('includeApplications', $this->getIncludeApplications());
        $writer->writeCollectionOfPrimitiveValues('includeAuthenticationContextClassReferences', $this->getIncludeAuthenticationContextClassReferences());
        $writer->writeCollectionOfPrimitiveValues('includeUserActions', $this->getIncludeUserActions());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
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
     * Sets the applicationFilter property value. Filter that defines the dynamic-application-syntax rule to include/exclude cloud applications. A filter can use custom security attributes to include/exclude applications.
     * @param ConditionalAccessFilter|null $value Value to set for the applicationFilter property.
    */
    public function setApplicationFilter(?ConditionalAccessFilter $value): void {
        $this->applicationFilter = $value;
    }

    /**
     * Sets the excludeApplications property value. Can be one of the following:  The list of client IDs (appId) explicitly excluded from the policy. Office365 - For the list of apps included in Office365, see Apps included in Conditional Access Office 365 app suite  MicrosoftAdminPortals - For more information, see Conditional Access Target resources: Microsoft Admin Portals
     * @param array<string>|null $value Value to set for the excludeApplications property.
    */
    public function setExcludeApplications(?array $value): void {
        $this->excludeApplications = $value;
    }

    /**
     * Sets the includeApplications property value. Can be one of the following:  The list of client IDs (appId) the policy applies to, unless explicitly excluded (in excludeApplications)  All  Office365 - For the list of apps included in Office365, see Apps included in Conditional Access Office 365 app suite  MicrosoftAdminPortals - For more information, see Conditional Access Target resources: Microsoft Admin Portals
     * @param array<string>|null $value Value to set for the includeApplications property.
    */
    public function setIncludeApplications(?array $value): void {
        $this->includeApplications = $value;
    }

    /**
     * Sets the includeAuthenticationContextClassReferences property value. The includeAuthenticationContextClassReferences property
     * @param array<string>|null $value Value to set for the includeAuthenticationContextClassReferences property.
    */
    public function setIncludeAuthenticationContextClassReferences(?array $value): void {
        $this->includeAuthenticationContextClassReferences = $value;
    }

    /**
     * Sets the includeUserActions property value. User actions to include. Supported values are urn:user:registersecurityinfo and urn:user:registerdevice
     * @param array<string>|null $value Value to set for the includeUserActions property.
    */
    public function setIncludeUserActions(?array $value): void {
        $this->includeUserActions = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

}
