<?php

namespace MSPress\Includes\Plugins\SharePoint\Includes\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BackupRestoreRoot extends Entity implements Parsable 
{
    /**
     * @var array<BrowseSessionBase>|null $browseSessions The list of browse sessions in the tenant.
    */
    private ?array $browseSessions = null;
    
    /**
     * @var array<DriveProtectionRule>|null $driveInclusionRules The list of drive inclusion rules applied to the tenant.
    */
    private ?array $driveInclusionRules = null;
    
    /**
     * @var array<DriveProtectionUnit>|null $driveProtectionUnits The list of drive protection units in the tenant.
    */
    private ?array $driveProtectionUnits = null;
    
    /**
     * @var array<DriveProtectionUnitsBulkAdditionJob>|null $driveProtectionUnitsBulkAdditionJobs The driveProtectionUnitsBulkAdditionJobs property
    */
    private ?array $driveProtectionUnitsBulkAdditionJobs = null;
    
    /**
     * @var EmailNotificationsSetting|null $emailNotificationsSetting The email notification settings in the tenant.
    */
    private ?EmailNotificationsSetting $emailNotificationsSetting = null;
    
    /**
     * @var array<ExchangeProtectionPolicy>|null $exchangeProtectionPolicies The list of Exchange protection policies in the tenant.
    */
    private ?array $exchangeProtectionPolicies = null;
    
    /**
     * @var array<ExchangeRestoreSession>|null $exchangeRestoreSessions The list of Exchange restore sessions available in the tenant.
    */
    private ?array $exchangeRestoreSessions = null;
    
    /**
     * @var array<MailboxProtectionRule>|null $mailboxInclusionRules The list of mailbox inclusion rules applied to the tenant.
    */
    private ?array $mailboxInclusionRules = null;
    
    /**
     * @var array<MailboxProtectionUnit>|null $mailboxProtectionUnits The list of mailbox protection units in the tenant.
    */
    private ?array $mailboxProtectionUnits = null;
    
    /**
     * @var array<MailboxProtectionUnitsBulkAdditionJob>|null $mailboxProtectionUnitsBulkAdditionJobs The mailboxProtectionUnitsBulkAdditionJobs property
    */
    private ?array $mailboxProtectionUnitsBulkAdditionJobs = null;
    
    /**
     * @var array<OneDriveForBusinessBrowseSession>|null $oneDriveForBusinessBrowseSessions The list of OneDrive for Business browse sessions in the tenant.
    */
    private ?array $oneDriveForBusinessBrowseSessions = null;
    
    /**
     * @var array<OneDriveForBusinessProtectionPolicy>|null $oneDriveForBusinessProtectionPolicies The list of OneDrive for Business protection policies in the tenant.
    */
    private ?array $oneDriveForBusinessProtectionPolicies = null;
    
    /**
     * @var array<OneDriveForBusinessRestoreSession>|null $oneDriveForBusinessRestoreSessions The list of OneDrive for Business restore sessions available in the tenant.
    */
    private ?array $oneDriveForBusinessRestoreSessions = null;
    
    /**
     * @var array<ProtectionPolicyBase>|null $protectionPolicies List of protection policies in the tenant.
    */
    private ?array $protectionPolicies = null;
    
    /**
     * @var array<ProtectionUnitBase>|null $protectionUnits List of protection units in the tenant.
    */
    private ?array $protectionUnits = null;
    
    /**
     * @var array<RestorePoint>|null $restorePoints List of restore points in the tenant.
    */
    private ?array $restorePoints = null;
    
    /**
     * @var array<RestoreSessionBase>|null $restoreSessions List of restore sessions in the tenant.
    */
    private ?array $restoreSessions = null;
    
    /**
     * @var array<ServiceApp>|null $serviceApps List of Backup Storage apps in the tenant.
    */
    private ?array $serviceApps = null;
    
    /**
     * @var ServiceStatus|null $serviceStatus Represents the tenant-level status of the Backup Storage service.
    */
    private ?ServiceStatus $serviceStatus = null;
    
    /**
     * @var array<SharePointBrowseSession>|null $sharePointBrowseSessions The list of SharePoint browse sessions in the tenant.
    */
    private ?array $sharePointBrowseSessions = null;
    
    /**
     * @var array<SharePointProtectionPolicy>|null $sharePointProtectionPolicies The list of SharePoint protection policies in the tenant.
    */
    private ?array $sharePointProtectionPolicies = null;
    
    /**
     * @var array<SharePointRestoreSession>|null $sharePointRestoreSessions The list of SharePoint restore sessions available in the tenant.
    */
    private ?array $sharePointRestoreSessions = null;
    
    /**
     * @var array<SiteProtectionRule>|null $siteInclusionRules The list of site inclusion rules applied to the tenant.
    */
    private ?array $siteInclusionRules = null;
    
    /**
     * @var array<SiteProtectionUnit>|null $siteProtectionUnits The list of site protection units in the tenant.
    */
    private ?array $siteProtectionUnits = null;
    
    /**
     * @var array<SiteProtectionUnitsBulkAdditionJob>|null $siteProtectionUnitsBulkAdditionJobs The siteProtectionUnitsBulkAdditionJobs property
    */
    private ?array $siteProtectionUnitsBulkAdditionJobs = null;
    
    /**
     * Instantiates a new BackupRestoreRoot and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BackupRestoreRoot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BackupRestoreRoot {
        return new BackupRestoreRoot();
    }

    /**
     * Gets the browseSessions property value. The list of browse sessions in the tenant.
     * @return array<BrowseSessionBase>|null
    */
    public function getBrowseSessions(): ?array {
        return $this->browseSessions;
    }

    /**
     * Gets the driveInclusionRules property value. The list of drive inclusion rules applied to the tenant.
     * @return array<DriveProtectionRule>|null
    */
    public function getDriveInclusionRules(): ?array {
        return $this->driveInclusionRules;
    }

    /**
     * Gets the driveProtectionUnits property value. The list of drive protection units in the tenant.
     * @return array<DriveProtectionUnit>|null
    */
    public function getDriveProtectionUnits(): ?array {
        return $this->driveProtectionUnits;
    }

    /**
     * Gets the driveProtectionUnitsBulkAdditionJobs property value. The driveProtectionUnitsBulkAdditionJobs property
     * @return array<DriveProtectionUnitsBulkAdditionJob>|null
    */
    public function getDriveProtectionUnitsBulkAdditionJobs(): ?array {
        return $this->driveProtectionUnitsBulkAdditionJobs;
    }

    /**
     * Gets the emailNotificationsSetting property value. The email notification settings in the tenant.
     * @return EmailNotificationsSetting|null
    */
    public function getEmailNotificationsSetting(): ?EmailNotificationsSetting {
        return $this->emailNotificationsSetting;
    }

    /**
     * Gets the exchangeProtectionPolicies property value. The list of Exchange protection policies in the tenant.
     * @return array<ExchangeProtectionPolicy>|null
    */
    public function getExchangeProtectionPolicies(): ?array {
        return $this->exchangeProtectionPolicies;
    }

    /**
     * Gets the exchangeRestoreSessions property value. The list of Exchange restore sessions available in the tenant.
     * @return array<ExchangeRestoreSession>|null
    */
    public function getExchangeRestoreSessions(): ?array {
        return $this->exchangeRestoreSessions;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'browseSessions' => fn(ParseNode $n) => $o->setBrowseSessions($n->getCollectionOfObjectValues([BrowseSessionBase::class, 'createFromDiscriminatorValue'])),
            'driveInclusionRules' => fn(ParseNode $n) => $o->setDriveInclusionRules($n->getCollectionOfObjectValues([DriveProtectionRule::class, 'createFromDiscriminatorValue'])),
            'driveProtectionUnits' => fn(ParseNode $n) => $o->setDriveProtectionUnits($n->getCollectionOfObjectValues([DriveProtectionUnit::class, 'createFromDiscriminatorValue'])),
            'driveProtectionUnitsBulkAdditionJobs' => fn(ParseNode $n) => $o->setDriveProtectionUnitsBulkAdditionJobs($n->getCollectionOfObjectValues([DriveProtectionUnitsBulkAdditionJob::class, 'createFromDiscriminatorValue'])),
            'emailNotificationsSetting' => fn(ParseNode $n) => $o->setEmailNotificationsSetting($n->getObjectValue([EmailNotificationsSetting::class, 'createFromDiscriminatorValue'])),
            'exchangeProtectionPolicies' => fn(ParseNode $n) => $o->setExchangeProtectionPolicies($n->getCollectionOfObjectValues([ExchangeProtectionPolicy::class, 'createFromDiscriminatorValue'])),
            'exchangeRestoreSessions' => fn(ParseNode $n) => $o->setExchangeRestoreSessions($n->getCollectionOfObjectValues([ExchangeRestoreSession::class, 'createFromDiscriminatorValue'])),
            'mailboxInclusionRules' => fn(ParseNode $n) => $o->setMailboxInclusionRules($n->getCollectionOfObjectValues([MailboxProtectionRule::class, 'createFromDiscriminatorValue'])),
            'mailboxProtectionUnits' => fn(ParseNode $n) => $o->setMailboxProtectionUnits($n->getCollectionOfObjectValues([MailboxProtectionUnit::class, 'createFromDiscriminatorValue'])),
            'mailboxProtectionUnitsBulkAdditionJobs' => fn(ParseNode $n) => $o->setMailboxProtectionUnitsBulkAdditionJobs($n->getCollectionOfObjectValues([MailboxProtectionUnitsBulkAdditionJob::class, 'createFromDiscriminatorValue'])),
            'oneDriveForBusinessBrowseSessions' => fn(ParseNode $n) => $o->setOneDriveForBusinessBrowseSessions($n->getCollectionOfObjectValues([OneDriveForBusinessBrowseSession::class, 'createFromDiscriminatorValue'])),
            'oneDriveForBusinessProtectionPolicies' => fn(ParseNode $n) => $o->setOneDriveForBusinessProtectionPolicies($n->getCollectionOfObjectValues([OneDriveForBusinessProtectionPolicy::class, 'createFromDiscriminatorValue'])),
            'oneDriveForBusinessRestoreSessions' => fn(ParseNode $n) => $o->setOneDriveForBusinessRestoreSessions($n->getCollectionOfObjectValues([OneDriveForBusinessRestoreSession::class, 'createFromDiscriminatorValue'])),
            'protectionPolicies' => fn(ParseNode $n) => $o->setProtectionPolicies($n->getCollectionOfObjectValues([ProtectionPolicyBase::class, 'createFromDiscriminatorValue'])),
            'protectionUnits' => fn(ParseNode $n) => $o->setProtectionUnits($n->getCollectionOfObjectValues([ProtectionUnitBase::class, 'createFromDiscriminatorValue'])),
            'restorePoints' => fn(ParseNode $n) => $o->setRestorePoints($n->getCollectionOfObjectValues([RestorePoint::class, 'createFromDiscriminatorValue'])),
            'restoreSessions' => fn(ParseNode $n) => $o->setRestoreSessions($n->getCollectionOfObjectValues([RestoreSessionBase::class, 'createFromDiscriminatorValue'])),
            'serviceApps' => fn(ParseNode $n) => $o->setServiceApps($n->getCollectionOfObjectValues([ServiceApp::class, 'createFromDiscriminatorValue'])),
            'serviceStatus' => fn(ParseNode $n) => $o->setServiceStatus($n->getObjectValue([ServiceStatus::class, 'createFromDiscriminatorValue'])),
            'sharePointBrowseSessions' => fn(ParseNode $n) => $o->setSharePointBrowseSessions($n->getCollectionOfObjectValues([SharePointBrowseSession::class, 'createFromDiscriminatorValue'])),
            'sharePointProtectionPolicies' => fn(ParseNode $n) => $o->setSharePointProtectionPolicies($n->getCollectionOfObjectValues([SharePointProtectionPolicy::class, 'createFromDiscriminatorValue'])),
            'sharePointRestoreSessions' => fn(ParseNode $n) => $o->setSharePointRestoreSessions($n->getCollectionOfObjectValues([SharePointRestoreSession::class, 'createFromDiscriminatorValue'])),
            'siteInclusionRules' => fn(ParseNode $n) => $o->setSiteInclusionRules($n->getCollectionOfObjectValues([SiteProtectionRule::class, 'createFromDiscriminatorValue'])),
            'siteProtectionUnits' => fn(ParseNode $n) => $o->setSiteProtectionUnits($n->getCollectionOfObjectValues([SiteProtectionUnit::class, 'createFromDiscriminatorValue'])),
            'siteProtectionUnitsBulkAdditionJobs' => fn(ParseNode $n) => $o->setSiteProtectionUnitsBulkAdditionJobs($n->getCollectionOfObjectValues([SiteProtectionUnitsBulkAdditionJob::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the mailboxInclusionRules property value. The list of mailbox inclusion rules applied to the tenant.
     * @return array<MailboxProtectionRule>|null
    */
    public function getMailboxInclusionRules(): ?array {
        return $this->mailboxInclusionRules;
    }

    /**
     * Gets the mailboxProtectionUnits property value. The list of mailbox protection units in the tenant.
     * @return array<MailboxProtectionUnit>|null
    */
    public function getMailboxProtectionUnits(): ?array {
        return $this->mailboxProtectionUnits;
    }

    /**
     * Gets the mailboxProtectionUnitsBulkAdditionJobs property value. The mailboxProtectionUnitsBulkAdditionJobs property
     * @return array<MailboxProtectionUnitsBulkAdditionJob>|null
    */
    public function getMailboxProtectionUnitsBulkAdditionJobs(): ?array {
        return $this->mailboxProtectionUnitsBulkAdditionJobs;
    }

    /**
     * Gets the oneDriveForBusinessBrowseSessions property value. The list of OneDrive for Business browse sessions in the tenant.
     * @return array<OneDriveForBusinessBrowseSession>|null
    */
    public function getOneDriveForBusinessBrowseSessions(): ?array {
        return $this->oneDriveForBusinessBrowseSessions;
    }

    /**
     * Gets the oneDriveForBusinessProtectionPolicies property value. The list of OneDrive for Business protection policies in the tenant.
     * @return array<OneDriveForBusinessProtectionPolicy>|null
    */
    public function getOneDriveForBusinessProtectionPolicies(): ?array {
        return $this->oneDriveForBusinessProtectionPolicies;
    }

    /**
     * Gets the oneDriveForBusinessRestoreSessions property value. The list of OneDrive for Business restore sessions available in the tenant.
     * @return array<OneDriveForBusinessRestoreSession>|null
    */
    public function getOneDriveForBusinessRestoreSessions(): ?array {
        return $this->oneDriveForBusinessRestoreSessions;
    }

    /**
     * Gets the protectionPolicies property value. List of protection policies in the tenant.
     * @return array<ProtectionPolicyBase>|null
    */
    public function getProtectionPolicies(): ?array {
        return $this->protectionPolicies;
    }

    /**
     * Gets the protectionUnits property value. List of protection units in the tenant.
     * @return array<ProtectionUnitBase>|null
    */
    public function getProtectionUnits(): ?array {
        return $this->protectionUnits;
    }

    /**
     * Gets the restorePoints property value. List of restore points in the tenant.
     * @return array<RestorePoint>|null
    */
    public function getRestorePoints(): ?array {
        return $this->restorePoints;
    }

    /**
     * Gets the restoreSessions property value. List of restore sessions in the tenant.
     * @return array<RestoreSessionBase>|null
    */
    public function getRestoreSessions(): ?array {
        return $this->restoreSessions;
    }

    /**
     * Gets the serviceApps property value. List of Backup Storage apps in the tenant.
     * @return array<ServiceApp>|null
    */
    public function getServiceApps(): ?array {
        return $this->serviceApps;
    }

    /**
     * Gets the serviceStatus property value. Represents the tenant-level status of the Backup Storage service.
     * @return ServiceStatus|null
    */
    public function getServiceStatus(): ?ServiceStatus {
        return $this->serviceStatus;
    }

    /**
     * Gets the sharePointBrowseSessions property value. The list of SharePoint browse sessions in the tenant.
     * @return array<SharePointBrowseSession>|null
    */
    public function getSharePointBrowseSessions(): ?array {
        return $this->sharePointBrowseSessions;
    }

    /**
     * Gets the sharePointProtectionPolicies property value. The list of SharePoint protection policies in the tenant.
     * @return array<SharePointProtectionPolicy>|null
    */
    public function getSharePointProtectionPolicies(): ?array {
        return $this->sharePointProtectionPolicies;
    }

    /**
     * Gets the sharePointRestoreSessions property value. The list of SharePoint restore sessions available in the tenant.
     * @return array<SharePointRestoreSession>|null
    */
    public function getSharePointRestoreSessions(): ?array {
        return $this->sharePointRestoreSessions;
    }

    /**
     * Gets the siteInclusionRules property value. The list of site inclusion rules applied to the tenant.
     * @return array<SiteProtectionRule>|null
    */
    public function getSiteInclusionRules(): ?array {
        return $this->siteInclusionRules;
    }

    /**
     * Gets the siteProtectionUnits property value. The list of site protection units in the tenant.
     * @return array<SiteProtectionUnit>|null
    */
    public function getSiteProtectionUnits(): ?array {
        return $this->siteProtectionUnits;
    }

    /**
     * Gets the siteProtectionUnitsBulkAdditionJobs property value. The siteProtectionUnitsBulkAdditionJobs property
     * @return array<SiteProtectionUnitsBulkAdditionJob>|null
    */
    public function getSiteProtectionUnitsBulkAdditionJobs(): ?array {
        return $this->siteProtectionUnitsBulkAdditionJobs;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeCollectionOfObjectValues('browseSessions', $this->getBrowseSessions());
        $writer->writeCollectionOfObjectValues('driveInclusionRules', $this->getDriveInclusionRules());
        $writer->writeCollectionOfObjectValues('driveProtectionUnits', $this->getDriveProtectionUnits());
        $writer->writeCollectionOfObjectValues('driveProtectionUnitsBulkAdditionJobs', $this->getDriveProtectionUnitsBulkAdditionJobs());
        $writer->writeObjectValue('emailNotificationsSetting', $this->getEmailNotificationsSetting());
        $writer->writeCollectionOfObjectValues('exchangeProtectionPolicies', $this->getExchangeProtectionPolicies());
        $writer->writeCollectionOfObjectValues('exchangeRestoreSessions', $this->getExchangeRestoreSessions());
        $writer->writeCollectionOfObjectValues('mailboxInclusionRules', $this->getMailboxInclusionRules());
        $writer->writeCollectionOfObjectValues('mailboxProtectionUnits', $this->getMailboxProtectionUnits());
        $writer->writeCollectionOfObjectValues('mailboxProtectionUnitsBulkAdditionJobs', $this->getMailboxProtectionUnitsBulkAdditionJobs());
        $writer->writeCollectionOfObjectValues('oneDriveForBusinessBrowseSessions', $this->getOneDriveForBusinessBrowseSessions());
        $writer->writeCollectionOfObjectValues('oneDriveForBusinessProtectionPolicies', $this->getOneDriveForBusinessProtectionPolicies());
        $writer->writeCollectionOfObjectValues('oneDriveForBusinessRestoreSessions', $this->getOneDriveForBusinessRestoreSessions());
        $writer->writeCollectionOfObjectValues('protectionPolicies', $this->getProtectionPolicies());
        $writer->writeCollectionOfObjectValues('protectionUnits', $this->getProtectionUnits());
        $writer->writeCollectionOfObjectValues('restorePoints', $this->getRestorePoints());
        $writer->writeCollectionOfObjectValues('restoreSessions', $this->getRestoreSessions());
        $writer->writeCollectionOfObjectValues('serviceApps', $this->getServiceApps());
        $writer->writeObjectValue('serviceStatus', $this->getServiceStatus());
        $writer->writeCollectionOfObjectValues('sharePointBrowseSessions', $this->getSharePointBrowseSessions());
        $writer->writeCollectionOfObjectValues('sharePointProtectionPolicies', $this->getSharePointProtectionPolicies());
        $writer->writeCollectionOfObjectValues('sharePointRestoreSessions', $this->getSharePointRestoreSessions());
        $writer->writeCollectionOfObjectValues('siteInclusionRules', $this->getSiteInclusionRules());
        $writer->writeCollectionOfObjectValues('siteProtectionUnits', $this->getSiteProtectionUnits());
        $writer->writeCollectionOfObjectValues('siteProtectionUnitsBulkAdditionJobs', $this->getSiteProtectionUnitsBulkAdditionJobs());
    }

    /**
     * Sets the browseSessions property value. The list of browse sessions in the tenant.
     * @param array<BrowseSessionBase>|null $value Value to set for the browseSessions property.
    */
    public function setBrowseSessions(?array $value): void {
        $this->browseSessions = $value;
    }

    /**
     * Sets the driveInclusionRules property value. The list of drive inclusion rules applied to the tenant.
     * @param array<DriveProtectionRule>|null $value Value to set for the driveInclusionRules property.
    */
    public function setDriveInclusionRules(?array $value): void {
        $this->driveInclusionRules = $value;
    }

    /**
     * Sets the driveProtectionUnits property value. The list of drive protection units in the tenant.
     * @param array<DriveProtectionUnit>|null $value Value to set for the driveProtectionUnits property.
    */
    public function setDriveProtectionUnits(?array $value): void {
        $this->driveProtectionUnits = $value;
    }

    /**
     * Sets the driveProtectionUnitsBulkAdditionJobs property value. The driveProtectionUnitsBulkAdditionJobs property
     * @param array<DriveProtectionUnitsBulkAdditionJob>|null $value Value to set for the driveProtectionUnitsBulkAdditionJobs property.
    */
    public function setDriveProtectionUnitsBulkAdditionJobs(?array $value): void {
        $this->driveProtectionUnitsBulkAdditionJobs = $value;
    }

    /**
     * Sets the emailNotificationsSetting property value. The email notification settings in the tenant.
     * @param EmailNotificationsSetting|null $value Value to set for the emailNotificationsSetting property.
    */
    public function setEmailNotificationsSetting(?EmailNotificationsSetting $value): void {
        $this->emailNotificationsSetting = $value;
    }

    /**
     * Sets the exchangeProtectionPolicies property value. The list of Exchange protection policies in the tenant.
     * @param array<ExchangeProtectionPolicy>|null $value Value to set for the exchangeProtectionPolicies property.
    */
    public function setExchangeProtectionPolicies(?array $value): void {
        $this->exchangeProtectionPolicies = $value;
    }

    /**
     * Sets the exchangeRestoreSessions property value. The list of Exchange restore sessions available in the tenant.
     * @param array<ExchangeRestoreSession>|null $value Value to set for the exchangeRestoreSessions property.
    */
    public function setExchangeRestoreSessions(?array $value): void {
        $this->exchangeRestoreSessions = $value;
    }

    /**
     * Sets the mailboxInclusionRules property value. The list of mailbox inclusion rules applied to the tenant.
     * @param array<MailboxProtectionRule>|null $value Value to set for the mailboxInclusionRules property.
    */
    public function setMailboxInclusionRules(?array $value): void {
        $this->mailboxInclusionRules = $value;
    }

    /**
     * Sets the mailboxProtectionUnits property value. The list of mailbox protection units in the tenant.
     * @param array<MailboxProtectionUnit>|null $value Value to set for the mailboxProtectionUnits property.
    */
    public function setMailboxProtectionUnits(?array $value): void {
        $this->mailboxProtectionUnits = $value;
    }

    /**
     * Sets the mailboxProtectionUnitsBulkAdditionJobs property value. The mailboxProtectionUnitsBulkAdditionJobs property
     * @param array<MailboxProtectionUnitsBulkAdditionJob>|null $value Value to set for the mailboxProtectionUnitsBulkAdditionJobs property.
    */
    public function setMailboxProtectionUnitsBulkAdditionJobs(?array $value): void {
        $this->mailboxProtectionUnitsBulkAdditionJobs = $value;
    }

    /**
     * Sets the oneDriveForBusinessBrowseSessions property value. The list of OneDrive for Business browse sessions in the tenant.
     * @param array<OneDriveForBusinessBrowseSession>|null $value Value to set for the oneDriveForBusinessBrowseSessions property.
    */
    public function setOneDriveForBusinessBrowseSessions(?array $value): void {
        $this->oneDriveForBusinessBrowseSessions = $value;
    }

    /**
     * Sets the oneDriveForBusinessProtectionPolicies property value. The list of OneDrive for Business protection policies in the tenant.
     * @param array<OneDriveForBusinessProtectionPolicy>|null $value Value to set for the oneDriveForBusinessProtectionPolicies property.
    */
    public function setOneDriveForBusinessProtectionPolicies(?array $value): void {
        $this->oneDriveForBusinessProtectionPolicies = $value;
    }

    /**
     * Sets the oneDriveForBusinessRestoreSessions property value. The list of OneDrive for Business restore sessions available in the tenant.
     * @param array<OneDriveForBusinessRestoreSession>|null $value Value to set for the oneDriveForBusinessRestoreSessions property.
    */
    public function setOneDriveForBusinessRestoreSessions(?array $value): void {
        $this->oneDriveForBusinessRestoreSessions = $value;
    }

    /**
     * Sets the protectionPolicies property value. List of protection policies in the tenant.
     * @param array<ProtectionPolicyBase>|null $value Value to set for the protectionPolicies property.
    */
    public function setProtectionPolicies(?array $value): void {
        $this->protectionPolicies = $value;
    }

    /**
     * Sets the protectionUnits property value. List of protection units in the tenant.
     * @param array<ProtectionUnitBase>|null $value Value to set for the protectionUnits property.
    */
    public function setProtectionUnits(?array $value): void {
        $this->protectionUnits = $value;
    }

    /**
     * Sets the restorePoints property value. List of restore points in the tenant.
     * @param array<RestorePoint>|null $value Value to set for the restorePoints property.
    */
    public function setRestorePoints(?array $value): void {
        $this->restorePoints = $value;
    }

    /**
     * Sets the restoreSessions property value. List of restore sessions in the tenant.
     * @param array<RestoreSessionBase>|null $value Value to set for the restoreSessions property.
    */
    public function setRestoreSessions(?array $value): void {
        $this->restoreSessions = $value;
    }

    /**
     * Sets the serviceApps property value. List of Backup Storage apps in the tenant.
     * @param array<ServiceApp>|null $value Value to set for the serviceApps property.
    */
    public function setServiceApps(?array $value): void {
        $this->serviceApps = $value;
    }

    /**
     * Sets the serviceStatus property value. Represents the tenant-level status of the Backup Storage service.
     * @param ServiceStatus|null $value Value to set for the serviceStatus property.
    */
    public function setServiceStatus(?ServiceStatus $value): void {
        $this->serviceStatus = $value;
    }

    /**
     * Sets the sharePointBrowseSessions property value. The list of SharePoint browse sessions in the tenant.
     * @param array<SharePointBrowseSession>|null $value Value to set for the sharePointBrowseSessions property.
    */
    public function setSharePointBrowseSessions(?array $value): void {
        $this->sharePointBrowseSessions = $value;
    }

    /**
     * Sets the sharePointProtectionPolicies property value. The list of SharePoint protection policies in the tenant.
     * @param array<SharePointProtectionPolicy>|null $value Value to set for the sharePointProtectionPolicies property.
    */
    public function setSharePointProtectionPolicies(?array $value): void {
        $this->sharePointProtectionPolicies = $value;
    }

    /**
     * Sets the sharePointRestoreSessions property value. The list of SharePoint restore sessions available in the tenant.
     * @param array<SharePointRestoreSession>|null $value Value to set for the sharePointRestoreSessions property.
    */
    public function setSharePointRestoreSessions(?array $value): void {
        $this->sharePointRestoreSessions = $value;
    }

    /**
     * Sets the siteInclusionRules property value. The list of site inclusion rules applied to the tenant.
     * @param array<SiteProtectionRule>|null $value Value to set for the siteInclusionRules property.
    */
    public function setSiteInclusionRules(?array $value): void {
        $this->siteInclusionRules = $value;
    }

    /**
     * Sets the siteProtectionUnits property value. The list of site protection units in the tenant.
     * @param array<SiteProtectionUnit>|null $value Value to set for the siteProtectionUnits property.
    */
    public function setSiteProtectionUnits(?array $value): void {
        $this->siteProtectionUnits = $value;
    }

    /**
     * Sets the siteProtectionUnitsBulkAdditionJobs property value. The siteProtectionUnitsBulkAdditionJobs property
     * @param array<SiteProtectionUnitsBulkAdditionJob>|null $value Value to set for the siteProtectionUnitsBulkAdditionJobs property.
    */
    public function setSiteProtectionUnitsBulkAdditionJobs(?array $value): void {
        $this->siteProtectionUnitsBulkAdditionJobs = $value;
    }

}
