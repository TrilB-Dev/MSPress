<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Security;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models\Entity;

class ThreatIntelligence extends Entity implements Parsable 
{
    /**
     * @var array<ArticleIndicator>|null $articleIndicators Refers to indicators of threat or compromise highlighted in an article.Note: List retrieval is not yet supported.
    */
    private ?array $articleIndicators = null;
    
    /**
     * @var array<Article>|null $articles A list of article objects.
    */
    private ?array $articles = null;
    
    /**
     * @var array<HostComponent>|null $hostComponents Retrieve details about hostComponent objects.Note: List retrieval is not yet supported.
    */
    private ?array $hostComponents = null;
    
    /**
     * @var array<HostCookie>|null $hostCookies Retrieve details about hostCookie objects.Note: List retrieval is not yet supported.
    */
    private ?array $hostCookies = null;
    
    /**
     * @var array<HostPair>|null $hostPairs Retrieve details about hostTracker objects.Note: List retrieval is not yet supported.
    */
    private ?array $hostPairs = null;
    
    /**
     * @var array<HostPort>|null $hostPorts Retrieve details about hostPort objects.Note: List retrieval is not yet supported.
    */
    private ?array $hostPorts = null;
    
    /**
     * @var array<Host>|null $hosts Refers to host objects that Microsoft Threat Intelligence has observed.Note: List retrieval is not yet supported.
    */
    private ?array $hosts = null;
    
    /**
     * @var array<HostSslCertificate>|null $hostSslCertificates Retrieve details about hostSslCertificate objects.Note: List retrieval is not yet supported.
    */
    private ?array $hostSslCertificates = null;
    
    /**
     * @var array<HostTracker>|null $hostTrackers Retrieve details about hostTracker objects.Note: List retrieval is not yet supported.
    */
    private ?array $hostTrackers = null;
    
    /**
     * @var array<IntelligenceProfileIndicator>|null $intelligenceProfileIndicators The intelligenceProfileIndicators property
    */
    private ?array $intelligenceProfileIndicators = null;
    
    /**
     * @var array<IntelligenceProfile>|null $intelProfiles A list of intelligenceProfile objects.
    */
    private ?array $intelProfiles = null;
    
    /**
     * @var array<PassiveDnsRecord>|null $passiveDnsRecords Retrieve details about passiveDnsRecord objects.Note: List retrieval is not yet supported.
    */
    private ?array $passiveDnsRecords = null;
    
    /**
     * @var array<SslCertificate>|null $sslCertificates Retrieve details about sslCertificate objects.Note: List retrieval is not yet supported.
    */
    private ?array $sslCertificates = null;
    
    /**
     * @var array<Subdomain>|null $subdomains Retrieve details about the subdomain.Note: List retrieval is not yet supported.
    */
    private ?array $subdomains = null;
    
    /**
     * @var array<Vulnerability>|null $vulnerabilities Retrieve details about vulnerabilities.Note: List retrieval is not yet supported.
    */
    private ?array $vulnerabilities = null;
    
    /**
     * @var array<WhoisHistoryRecord>|null $whoisHistoryRecords Retrieve details about whoisHistoryRecord objects.Note: List retrieval is not yet supported.
    */
    private ?array $whoisHistoryRecords = null;
    
    /**
     * @var array<WhoisRecord>|null $whoisRecords A list of whoisRecord objects.
    */
    private ?array $whoisRecords = null;
    
    /**
     * Instantiates a new ThreatIntelligence and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ThreatIntelligence
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ThreatIntelligence {
        return new ThreatIntelligence();
    }

    /**
     * Gets the articleIndicators property value. Refers to indicators of threat or compromise highlighted in an article.Note: List retrieval is not yet supported.
     * @return array<ArticleIndicator>|null
    */
    public function getArticleIndicators(): ?array {
        return $this->articleIndicators;
    }

    /**
     * Gets the articles property value. A list of article objects.
     * @return array<Article>|null
    */
    public function getArticles(): ?array {
        return $this->articles;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'articleIndicators' => fn(ParseNode $n) => $o->setArticleIndicators($n->getCollectionOfObjectValues([ArticleIndicator::class, 'createFromDiscriminatorValue'])),
            'articles' => fn(ParseNode $n) => $o->setArticles($n->getCollectionOfObjectValues([Article::class, 'createFromDiscriminatorValue'])),
            'hostComponents' => fn(ParseNode $n) => $o->setHostComponents($n->getCollectionOfObjectValues([HostComponent::class, 'createFromDiscriminatorValue'])),
            'hostCookies' => fn(ParseNode $n) => $o->setHostCookies($n->getCollectionOfObjectValues([HostCookie::class, 'createFromDiscriminatorValue'])),
            'hostPairs' => fn(ParseNode $n) => $o->setHostPairs($n->getCollectionOfObjectValues([HostPair::class, 'createFromDiscriminatorValue'])),
            'hostPorts' => fn(ParseNode $n) => $o->setHostPorts($n->getCollectionOfObjectValues([HostPort::class, 'createFromDiscriminatorValue'])),
            'hosts' => fn(ParseNode $n) => $o->setHosts($n->getCollectionOfObjectValues([Host::class, 'createFromDiscriminatorValue'])),
            'hostSslCertificates' => fn(ParseNode $n) => $o->setHostSslCertificates($n->getCollectionOfObjectValues([HostSslCertificate::class, 'createFromDiscriminatorValue'])),
            'hostTrackers' => fn(ParseNode $n) => $o->setHostTrackers($n->getCollectionOfObjectValues([HostTracker::class, 'createFromDiscriminatorValue'])),
            'intelligenceProfileIndicators' => fn(ParseNode $n) => $o->setIntelligenceProfileIndicators($n->getCollectionOfObjectValues([IntelligenceProfileIndicator::class, 'createFromDiscriminatorValue'])),
            'intelProfiles' => fn(ParseNode $n) => $o->setIntelProfiles($n->getCollectionOfObjectValues([IntelligenceProfile::class, 'createFromDiscriminatorValue'])),
            'passiveDnsRecords' => fn(ParseNode $n) => $o->setPassiveDnsRecords($n->getCollectionOfObjectValues([PassiveDnsRecord::class, 'createFromDiscriminatorValue'])),
            'sslCertificates' => fn(ParseNode $n) => $o->setSslCertificates($n->getCollectionOfObjectValues([SslCertificate::class, 'createFromDiscriminatorValue'])),
            'subdomains' => fn(ParseNode $n) => $o->setSubdomains($n->getCollectionOfObjectValues([Subdomain::class, 'createFromDiscriminatorValue'])),
            'vulnerabilities' => fn(ParseNode $n) => $o->setVulnerabilities($n->getCollectionOfObjectValues([Vulnerability::class, 'createFromDiscriminatorValue'])),
            'whoisHistoryRecords' => fn(ParseNode $n) => $o->setWhoisHistoryRecords($n->getCollectionOfObjectValues([WhoisHistoryRecord::class, 'createFromDiscriminatorValue'])),
            'whoisRecords' => fn(ParseNode $n) => $o->setWhoisRecords($n->getCollectionOfObjectValues([WhoisRecord::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the hostComponents property value. Retrieve details about hostComponent objects.Note: List retrieval is not yet supported.
     * @return array<HostComponent>|null
    */
    public function getHostComponents(): ?array {
        return $this->hostComponents;
    }

    /**
     * Gets the hostCookies property value. Retrieve details about hostCookie objects.Note: List retrieval is not yet supported.
     * @return array<HostCookie>|null
    */
    public function getHostCookies(): ?array {
        return $this->hostCookies;
    }

    /**
     * Gets the hostPairs property value. Retrieve details about hostTracker objects.Note: List retrieval is not yet supported.
     * @return array<HostPair>|null
    */
    public function getHostPairs(): ?array {
        return $this->hostPairs;
    }

    /**
     * Gets the hostPorts property value. Retrieve details about hostPort objects.Note: List retrieval is not yet supported.
     * @return array<HostPort>|null
    */
    public function getHostPorts(): ?array {
        return $this->hostPorts;
    }

    /**
     * Gets the hosts property value. Refers to host objects that Microsoft Threat Intelligence has observed.Note: List retrieval is not yet supported.
     * @return array<Host>|null
    */
    public function getHosts(): ?array {
        return $this->hosts;
    }

    /**
     * Gets the hostSslCertificates property value. Retrieve details about hostSslCertificate objects.Note: List retrieval is not yet supported.
     * @return array<HostSslCertificate>|null
    */
    public function getHostSslCertificates(): ?array {
        return $this->hostSslCertificates;
    }

    /**
     * Gets the hostTrackers property value. Retrieve details about hostTracker objects.Note: List retrieval is not yet supported.
     * @return array<HostTracker>|null
    */
    public function getHostTrackers(): ?array {
        return $this->hostTrackers;
    }

    /**
     * Gets the intelligenceProfileIndicators property value. The intelligenceProfileIndicators property
     * @return array<IntelligenceProfileIndicator>|null
    */
    public function getIntelligenceProfileIndicators(): ?array {
        return $this->intelligenceProfileIndicators;
    }

    /**
     * Gets the intelProfiles property value. A list of intelligenceProfile objects.
     * @return array<IntelligenceProfile>|null
    */
    public function getIntelProfiles(): ?array {
        return $this->intelProfiles;
    }

    /**
     * Gets the passiveDnsRecords property value. Retrieve details about passiveDnsRecord objects.Note: List retrieval is not yet supported.
     * @return array<PassiveDnsRecord>|null
    */
    public function getPassiveDnsRecords(): ?array {
        return $this->passiveDnsRecords;
    }

    /**
     * Gets the sslCertificates property value. Retrieve details about sslCertificate objects.Note: List retrieval is not yet supported.
     * @return array<SslCertificate>|null
    */
    public function getSslCertificates(): ?array {
        return $this->sslCertificates;
    }

    /**
     * Gets the subdomains property value. Retrieve details about the subdomain.Note: List retrieval is not yet supported.
     * @return array<Subdomain>|null
    */
    public function getSubdomains(): ?array {
        return $this->subdomains;
    }

    /**
     * Gets the vulnerabilities property value. Retrieve details about vulnerabilities.Note: List retrieval is not yet supported.
     * @return array<Vulnerability>|null
    */
    public function getVulnerabilities(): ?array {
        return $this->vulnerabilities;
    }

    /**
     * Gets the whoisHistoryRecords property value. Retrieve details about whoisHistoryRecord objects.Note: List retrieval is not yet supported.
     * @return array<WhoisHistoryRecord>|null
    */
    public function getWhoisHistoryRecords(): ?array {
        return $this->whoisHistoryRecords;
    }

    /**
     * Gets the whoisRecords property value. A list of whoisRecord objects.
     * @return array<WhoisRecord>|null
    */
    public function getWhoisRecords(): ?array {
        return $this->whoisRecords;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('articleIndicators', $this->getArticleIndicators());
        $writer->writeCollectionOfObjectValues('articles', $this->getArticles());
        $writer->writeCollectionOfObjectValues('hostComponents', $this->getHostComponents());
        $writer->writeCollectionOfObjectValues('hostCookies', $this->getHostCookies());
        $writer->writeCollectionOfObjectValues('hostPairs', $this->getHostPairs());
        $writer->writeCollectionOfObjectValues('hostPorts', $this->getHostPorts());
        $writer->writeCollectionOfObjectValues('hosts', $this->getHosts());
        $writer->writeCollectionOfObjectValues('hostSslCertificates', $this->getHostSslCertificates());
        $writer->writeCollectionOfObjectValues('hostTrackers', $this->getHostTrackers());
        $writer->writeCollectionOfObjectValues('intelligenceProfileIndicators', $this->getIntelligenceProfileIndicators());
        $writer->writeCollectionOfObjectValues('intelProfiles', $this->getIntelProfiles());
        $writer->writeCollectionOfObjectValues('passiveDnsRecords', $this->getPassiveDnsRecords());
        $writer->writeCollectionOfObjectValues('sslCertificates', $this->getSslCertificates());
        $writer->writeCollectionOfObjectValues('subdomains', $this->getSubdomains());
        $writer->writeCollectionOfObjectValues('vulnerabilities', $this->getVulnerabilities());
        $writer->writeCollectionOfObjectValues('whoisHistoryRecords', $this->getWhoisHistoryRecords());
        $writer->writeCollectionOfObjectValues('whoisRecords', $this->getWhoisRecords());
    }

    /**
     * Sets the articleIndicators property value. Refers to indicators of threat or compromise highlighted in an article.Note: List retrieval is not yet supported.
     * @param array<ArticleIndicator>|null $value Value to set for the articleIndicators property.
    */
    public function setArticleIndicators(?array $value): void {
        $this->articleIndicators = $value;
    }

    /**
     * Sets the articles property value. A list of article objects.
     * @param array<Article>|null $value Value to set for the articles property.
    */
    public function setArticles(?array $value): void {
        $this->articles = $value;
    }

    /**
     * Sets the hostComponents property value. Retrieve details about hostComponent objects.Note: List retrieval is not yet supported.
     * @param array<HostComponent>|null $value Value to set for the hostComponents property.
    */
    public function setHostComponents(?array $value): void {
        $this->hostComponents = $value;
    }

    /**
     * Sets the hostCookies property value. Retrieve details about hostCookie objects.Note: List retrieval is not yet supported.
     * @param array<HostCookie>|null $value Value to set for the hostCookies property.
    */
    public function setHostCookies(?array $value): void {
        $this->hostCookies = $value;
    }

    /**
     * Sets the hostPairs property value. Retrieve details about hostTracker objects.Note: List retrieval is not yet supported.
     * @param array<HostPair>|null $value Value to set for the hostPairs property.
    */
    public function setHostPairs(?array $value): void {
        $this->hostPairs = $value;
    }

    /**
     * Sets the hostPorts property value. Retrieve details about hostPort objects.Note: List retrieval is not yet supported.
     * @param array<HostPort>|null $value Value to set for the hostPorts property.
    */
    public function setHostPorts(?array $value): void {
        $this->hostPorts = $value;
    }

    /**
     * Sets the hosts property value. Refers to host objects that Microsoft Threat Intelligence has observed.Note: List retrieval is not yet supported.
     * @param array<Host>|null $value Value to set for the hosts property.
    */
    public function setHosts(?array $value): void {
        $this->hosts = $value;
    }

    /**
     * Sets the hostSslCertificates property value. Retrieve details about hostSslCertificate objects.Note: List retrieval is not yet supported.
     * @param array<HostSslCertificate>|null $value Value to set for the hostSslCertificates property.
    */
    public function setHostSslCertificates(?array $value): void {
        $this->hostSslCertificates = $value;
    }

    /**
     * Sets the hostTrackers property value. Retrieve details about hostTracker objects.Note: List retrieval is not yet supported.
     * @param array<HostTracker>|null $value Value to set for the hostTrackers property.
    */
    public function setHostTrackers(?array $value): void {
        $this->hostTrackers = $value;
    }

    /**
     * Sets the intelligenceProfileIndicators property value. The intelligenceProfileIndicators property
     * @param array<IntelligenceProfileIndicator>|null $value Value to set for the intelligenceProfileIndicators property.
    */
    public function setIntelligenceProfileIndicators(?array $value): void {
        $this->intelligenceProfileIndicators = $value;
    }

    /**
     * Sets the intelProfiles property value. A list of intelligenceProfile objects.
     * @param array<IntelligenceProfile>|null $value Value to set for the intelProfiles property.
    */
    public function setIntelProfiles(?array $value): void {
        $this->intelProfiles = $value;
    }

    /**
     * Sets the passiveDnsRecords property value. Retrieve details about passiveDnsRecord objects.Note: List retrieval is not yet supported.
     * @param array<PassiveDnsRecord>|null $value Value to set for the passiveDnsRecords property.
    */
    public function setPassiveDnsRecords(?array $value): void {
        $this->passiveDnsRecords = $value;
    }

    /**
     * Sets the sslCertificates property value. Retrieve details about sslCertificate objects.Note: List retrieval is not yet supported.
     * @param array<SslCertificate>|null $value Value to set for the sslCertificates property.
    */
    public function setSslCertificates(?array $value): void {
        $this->sslCertificates = $value;
    }

    /**
     * Sets the subdomains property value. Retrieve details about the subdomain.Note: List retrieval is not yet supported.
     * @param array<Subdomain>|null $value Value to set for the subdomains property.
    */
    public function setSubdomains(?array $value): void {
        $this->subdomains = $value;
    }

    /**
     * Sets the vulnerabilities property value. Retrieve details about vulnerabilities.Note: List retrieval is not yet supported.
     * @param array<Vulnerability>|null $value Value to set for the vulnerabilities property.
    */
    public function setVulnerabilities(?array $value): void {
        $this->vulnerabilities = $value;
    }

    /**
     * Sets the whoisHistoryRecords property value. Retrieve details about whoisHistoryRecord objects.Note: List retrieval is not yet supported.
     * @param array<WhoisHistoryRecord>|null $value Value to set for the whoisHistoryRecords property.
    */
    public function setWhoisHistoryRecords(?array $value): void {
        $this->whoisHistoryRecords = $value;
    }

    /**
     * Sets the whoisRecords property value. A list of whoisRecord objects.
     * @param array<WhoisRecord>|null $value Value to set for the whoisRecords property.
    */
    public function setWhoisRecords(?array $value): void {
        $this->whoisRecords = $value;
    }

}
