<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Building extends Place implements Parsable 
{
    /**
     * @var BuildingMap|null $map Map file associated with a building in Places. This object is the IMDF-format representation of building.geojson.
    */
    private ?BuildingMap $map = null;
    
    /**
     * @var array<ResourceLink>|null $resourceLinks A set of links to external resources that are associated with the building. Inherited from place.
    */
    private ?array $resourceLinks = null;
    
    /**
     * @var PlaceFeatureEnablement|null $wifiState The wifiState property
    */
    private ?PlaceFeatureEnablement $wifiState = null;
    
    /**
     * Instantiates a new Building and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.building');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Building
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Building {
        return new Building();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'map' => fn(ParseNode $n) => $o->setMap($n->getObjectValue([BuildingMap::class, 'createFromDiscriminatorValue'])),
            'resourceLinks' => fn(ParseNode $n) => $o->setResourceLinks($n->getCollectionOfObjectValues([ResourceLink::class, 'createFromDiscriminatorValue'])),
            'wifiState' => fn(ParseNode $n) => $o->setWifiState($n->getEnumValue(PlaceFeatureEnablement::class)),
        ]);
    }

    /**
     * Gets the map property value. Map file associated with a building in Places. This object is the IMDF-format representation of building.geojson.
     * @return BuildingMap|null
    */
    public function getMap(): ?BuildingMap {
        return $this->map;
    }

    /**
     * Gets the resourceLinks property value. A set of links to external resources that are associated with the building. Inherited from place.
     * @return array<ResourceLink>|null
    */
    public function getResourceLinks(): ?array {
        return $this->resourceLinks;
    }

    /**
     * Gets the wifiState property value. The wifiState property
     * @return PlaceFeatureEnablement|null
    */
    public function getWifiState(): ?PlaceFeatureEnablement {
        return $this->wifiState;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('map', $this->getMap());
        $writer->writeCollectionOfObjectValues('resourceLinks', $this->getResourceLinks());
        $writer->writeEnumValue('wifiState', $this->getWifiState());
    }

    /**
     * Sets the map property value. Map file associated with a building in Places. This object is the IMDF-format representation of building.geojson.
     * @param BuildingMap|null $value Value to set for the map property.
    */
    public function setMap(?BuildingMap $value): void {
        $this->map = $value;
    }

    /**
     * Sets the resourceLinks property value. A set of links to external resources that are associated with the building. Inherited from place.
     * @param array<ResourceLink>|null $value Value to set for the resourceLinks property.
    */
    public function setResourceLinks(?array $value): void {
        $this->resourceLinks = $value;
    }

    /**
     * Sets the wifiState property value. The wifiState property
     * @param PlaceFeatureEnablement|null $value Value to set for the wifiState property.
    */
    public function setWifiState(?PlaceFeatureEnablement $value): void {
        $this->wifiState = $value;
    }

}
