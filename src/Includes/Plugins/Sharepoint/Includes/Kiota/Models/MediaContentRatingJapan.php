<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MediaContentRatingJapan implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var RatingJapanMoviesType|null $movieRating Movies rating labels in Japan
    */
    private ?RatingJapanMoviesType $movieRating = null;
    
    /**
     * @var string|null $odataType The OdataType property
    */
    private ?string $odataType = null;
    
    /**
     * @var RatingJapanTelevisionType|null $tvRating TV content rating labels in Japan
    */
    private ?RatingJapanTelevisionType $tvRating = null;
    
    /**
     * Instantiates a new MediaContentRatingJapan and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MediaContentRatingJapan
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MediaContentRatingJapan {
        return new MediaContentRatingJapan();
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
            'movieRating' => fn(ParseNode $n) => $o->setMovieRating($n->getEnumValue(RatingJapanMoviesType::class)),
            '@odata.type' => fn(ParseNode $n) => $o->setOdataType($n->getStringValue()),
            'tvRating' => fn(ParseNode $n) => $o->setTvRating($n->getEnumValue(RatingJapanTelevisionType::class)),
        ];
    }

    /**
     * Gets the movieRating property value. Movies rating labels in Japan
     * @return RatingJapanMoviesType|null
    */
    public function getMovieRating(): ?RatingJapanMoviesType {
        return $this->movieRating;
    }

    /**
     * Gets the @odata.type property value. The OdataType property
     * @return string|null
    */
    public function getOdataType(): ?string {
        return $this->odataType;
    }

    /**
     * Gets the tvRating property value. TV content rating labels in Japan
     * @return RatingJapanTelevisionType|null
    */
    public function getTvRating(): ?RatingJapanTelevisionType {
        return $this->tvRating;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('movieRating', $this->getMovieRating());
        $writer->writeStringValue('@odata.type', $this->getOdataType());
        $writer->writeEnumValue('tvRating', $this->getTvRating());
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
     * Sets the movieRating property value. Movies rating labels in Japan
     * @param RatingJapanMoviesType|null $value Value to set for the movieRating property.
    */
    public function setMovieRating(?RatingJapanMoviesType $value): void {
        $this->movieRating = $value;
    }

    /**
     * Sets the @odata.type property value. The OdataType property
     * @param string|null $value Value to set for the @odata.type property.
    */
    public function setOdataType(?string $value): void {
        $this->odataType = $value;
    }

    /**
     * Sets the tvRating property value. TV content rating labels in Japan
     * @param RatingJapanTelevisionType|null $value Value to set for the tvRating property.
    */
    public function setTvRating(?RatingJapanTelevisionType $value): void {
        $this->tvRating = $value;
    }

}
