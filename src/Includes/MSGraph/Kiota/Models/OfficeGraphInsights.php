<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class OfficeGraphInsights extends Entity implements Parsable 
{
    /**
     * @var array<SharedInsight>|null $shared Calculated relationship that identifies documents shared with or by the user. This includes URLs, file attachments, and reference attachments to OneDrive for work or school and SharePoint files found in Outlook messages and meetings. This also includes URLs and reference attachments to Teams conversations. Ordered by recency of share.
    */
    private ?array $shared = null;
    
    /**
     * @var array<Trending>|null $trending Calculated relationship that identifies documents trending around a user. Trending documents are calculated based on activity of the user's closest network of people and include files stored in OneDrive for work or school and SharePoint. Trending insights help the user to discover potentially useful content that the user has access to, but has never viewed before.
    */
    private ?array $trending = null;
    
    /**
     * @var array<UsedInsight>|null $used Calculated relationship that identifies the latest documents viewed or modified by a user, including OneDrive for work or school and SharePoint documents, ranked by recency of use.
    */
    private ?array $used = null;
    
    /**
     * Instantiates a new OfficeGraphInsights and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OfficeGraphInsights
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OfficeGraphInsights {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.itemInsights': return new ItemInsights();
            }
        }
        return new OfficeGraphInsights();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'shared' => fn(ParseNode $n) => $o->setShared($n->getCollectionOfObjectValues([SharedInsight::class, 'createFromDiscriminatorValue'])),
            'trending' => fn(ParseNode $n) => $o->setTrending($n->getCollectionOfObjectValues([Trending::class, 'createFromDiscriminatorValue'])),
            'used' => fn(ParseNode $n) => $o->setUsed($n->getCollectionOfObjectValues([UsedInsight::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the shared property value. Calculated relationship that identifies documents shared with or by the user. This includes URLs, file attachments, and reference attachments to OneDrive for work or school and SharePoint files found in Outlook messages and meetings. This also includes URLs and reference attachments to Teams conversations. Ordered by recency of share.
     * @return array<SharedInsight>|null
    */
    public function getShared(): ?array {
        return $this->shared;
    }

    /**
     * Gets the trending property value. Calculated relationship that identifies documents trending around a user. Trending documents are calculated based on activity of the user's closest network of people and include files stored in OneDrive for work or school and SharePoint. Trending insights help the user to discover potentially useful content that the user has access to, but has never viewed before.
     * @return array<Trending>|null
    */
    public function getTrending(): ?array {
        return $this->trending;
    }

    /**
     * Gets the used property value. Calculated relationship that identifies the latest documents viewed or modified by a user, including OneDrive for work or school and SharePoint documents, ranked by recency of use.
     * @return array<UsedInsight>|null
    */
    public function getUsed(): ?array {
        return $this->used;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('shared', $this->getShared());
        $writer->writeCollectionOfObjectValues('trending', $this->getTrending());
        $writer->writeCollectionOfObjectValues('used', $this->getUsed());
    }

    /**
     * Sets the shared property value. Calculated relationship that identifies documents shared with or by the user. This includes URLs, file attachments, and reference attachments to OneDrive for work or school and SharePoint files found in Outlook messages and meetings. This also includes URLs and reference attachments to Teams conversations. Ordered by recency of share.
     * @param array<SharedInsight>|null $value Value to set for the shared property.
    */
    public function setShared(?array $value): void {
        $this->shared = $value;
    }

    /**
     * Sets the trending property value. Calculated relationship that identifies documents trending around a user. Trending documents are calculated based on activity of the user's closest network of people and include files stored in OneDrive for work or school and SharePoint. Trending insights help the user to discover potentially useful content that the user has access to, but has never viewed before.
     * @param array<Trending>|null $value Value to set for the trending property.
    */
    public function setTrending(?array $value): void {
        $this->trending = $value;
    }

    /**
     * Sets the used property value. Calculated relationship that identifies the latest documents viewed or modified by a user, including OneDrive for work or school and SharePoint documents, ranked by recency of use.
     * @param array<UsedInsight>|null $value Value to set for the used property.
    */
    public function setUsed(?array $value): void {
        $this->used = $value;
    }

}
