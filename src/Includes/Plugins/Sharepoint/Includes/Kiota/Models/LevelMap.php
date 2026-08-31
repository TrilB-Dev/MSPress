<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class LevelMap extends BaseMapFeature implements Parsable 
{
    /**
     * @var array<FixtureMap>|null $fixtures Collection of fixtures (such as furniture or equipment) on this level. Supports upsert.
    */
    private ?array $fixtures = null;
    
    /**
     * @var string|null $placeId Identifier of the floor to which this levelMap belongs.
    */
    private ?string $placeId = null;
    
    /**
     * @var array<SectionMap>|null $sections Collection of sections (such as zones or partitions) on this level. Supports upsert.
    */
    private ?array $sections = null;
    
    /**
     * @var array<UnitMap>|null $units Collection of units (such as rooms or offices) on this level. Supports upsert.
    */
    private ?array $units = null;
    
    /**
     * Instantiates a new LevelMap and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.levelMap');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LevelMap
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LevelMap {
        return new LevelMap();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'fixtures' => fn(ParseNode $n) => $o->setFixtures($n->getCollectionOfObjectValues([FixtureMap::class, 'createFromDiscriminatorValue'])),
            'placeId' => fn(ParseNode $n) => $o->setPlaceId($n->getStringValue()),
            'sections' => fn(ParseNode $n) => $o->setSections($n->getCollectionOfObjectValues([SectionMap::class, 'createFromDiscriminatorValue'])),
            'units' => fn(ParseNode $n) => $o->setUnits($n->getCollectionOfObjectValues([UnitMap::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the fixtures property value. Collection of fixtures (such as furniture or equipment) on this level. Supports upsert.
     * @return array<FixtureMap>|null
    */
    public function getFixtures(): ?array {
        return $this->fixtures;
    }

    /**
     * Gets the placeId property value. Identifier of the floor to which this levelMap belongs.
     * @return string|null
    */
    public function getPlaceId(): ?string {
        return $this->placeId;
    }

    /**
     * Gets the sections property value. Collection of sections (such as zones or partitions) on this level. Supports upsert.
     * @return array<SectionMap>|null
    */
    public function getSections(): ?array {
        return $this->sections;
    }

    /**
     * Gets the units property value. Collection of units (such as rooms or offices) on this level. Supports upsert.
     * @return array<UnitMap>|null
    */
    public function getUnits(): ?array {
        return $this->units;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('fixtures', $this->getFixtures());
        $writer->writeStringValue('placeId', $this->getPlaceId());
        $writer->writeCollectionOfObjectValues('sections', $this->getSections());
        $writer->writeCollectionOfObjectValues('units', $this->getUnits());
    }

    /**
     * Sets the fixtures property value. Collection of fixtures (such as furniture or equipment) on this level. Supports upsert.
     * @param array<FixtureMap>|null $value Value to set for the fixtures property.
    */
    public function setFixtures(?array $value): void {
        $this->fixtures = $value;
    }

    /**
     * Sets the placeId property value. Identifier of the floor to which this levelMap belongs.
     * @param string|null $value Value to set for the placeId property.
    */
    public function setPlaceId(?string $value): void {
        $this->placeId = $value;
    }

    /**
     * Sets the sections property value. Collection of sections (such as zones or partitions) on this level. Supports upsert.
     * @param array<SectionMap>|null $value Value to set for the sections property.
    */
    public function setSections(?array $value): void {
        $this->sections = $value;
    }

    /**
     * Sets the units property value. Collection of units (such as rooms or offices) on this level. Supports upsert.
     * @param array<UnitMap>|null $value Value to set for the units property.
    */
    public function setUnits(?array $value): void {
        $this->units = $value;
    }

}
