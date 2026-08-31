<?php

namespace MSPress\Includes\Plugins\OneDrive\Includes\Kiota\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class User extends DirectoryObject implements Parsable 
{
    /**
     * @var string|null $aboutMe A freeform text entry field for the user to describe themselves. Requires $select to retrieve.
    */
    private ?string $aboutMe = null;
    
    /**
     * @var bool|null $accountEnabled true if the account is enabled; otherwise, false. This property is required when a user is created. Requires $select to retrieve. Supports $filter (eq, ne, not, and in). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
    */
    private ?bool $accountEnabled = null;
    
    /**
     * @var array<UserActivity>|null $activities The user's activities across devices. Read-only. Nullable.
    */
    private ?array $activities = null;
    
    /**
     * @var array<AdhocCall>|null $adhocCalls Ad hoc calls associated with the user. Read-only. Nullable.
    */
    private ?array $adhocCalls = null;
    
    /**
     * @var string|null $ageGroup Sets the age group of the user. Allowed values: null, Minor, NotAdult, and Adult. For more information, see legal age group property definitions. Requires $select to retrieve. Supports $filter (eq, ne, not, and in).
    */
    private ?string $ageGroup = null;
    
    /**
     * @var array<AgreementAcceptance>|null $agreementAcceptances The user's terms of use acceptance statuses. Read-only. Nullable.
    */
    private ?array $agreementAcceptances = null;
    
    /**
     * @var array<AppRoleAssignment>|null $appRoleAssignments Represents the app roles a user is granted for an application. Supports $expand.
    */
    private ?array $appRoleAssignments = null;
    
    /**
     * @var array<AssignedLicense>|null $assignedLicenses The licenses that are assigned to the user, including inherited (group-based) licenses. This property doesn't differentiate between directly assigned and inherited licenses. Use the licenseAssignmentStates property to identify the directly assigned and inherited licenses. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, /$count eq 0, /$count ne 0).
    */
    private ?array $assignedLicenses = null;
    
    /**
     * @var array<AssignedPlan>|null $assignedPlans The plans that are assigned to the user. Read-only. Not nullable. Requires $select to retrieve. Supports $filter (eq and not).
    */
    private ?array $assignedPlans = null;
    
    /**
     * @var Authentication|null $authentication The authentication methods that are supported for the user.
    */
    private ?Authentication $authentication = null;
    
    /**
     * @var AuthorizationInfo|null $authorizationInfo The authorizationInfo property
    */
    private ?AuthorizationInfo $authorizationInfo = null;
    
    /**
     * @var DateTime|null $birthday The birthday of the user. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z. Requires $select to retrieve.
    */
    private ?DateTime $birthday = null;
    
    /**
     * @var array<string>|null $businessPhones The telephone numbers for the user. NOTE: Although it's a string collection, only one number can be set for this property. Read-only for users synced from the on-premises directory. Returned by default. Supports $filter (eq, not, ge, le, startsWith). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
    */
    private ?array $businessPhones = null;
    
    /**
     * @var Calendar|null $calendar The user's primary calendar. Read-only.
    */
    private ?Calendar $calendar = null;
    
    /**
     * @var array<CalendarGroup>|null $calendarGroups The user's calendar groups. Read-only. Nullable.
    */
    private ?array $calendarGroups = null;
    
    /**
     * @var array<Calendar>|null $calendars The user's calendars. Read-only. Nullable.
    */
    private ?array $calendars = null;
    
    /**
     * @var array<Event>|null $calendarView The calendar view for the calendar. Read-only. Nullable.
    */
    private ?array $calendarView = null;
    
    /**
     * @var array<Chat>|null $chats The chats property
    */
    private ?array $chats = null;
    
    /**
     * @var string|null $city The city where the user is located. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $city = null;
    
    /**
     * @var CloudClipboardRoot|null $cloudClipboard The cloudClipboard property
    */
    private ?CloudClipboardRoot $cloudClipboard = null;
    
    /**
     * @var array<CloudPC>|null $cloudPCs The user's Cloud PCs. Read-only. Nullable.
    */
    private ?array $cloudPCs = null;
    
    /**
     * @var string|null $companyName The name of the company that the user is associated with. This property can be useful for describing the company that a guest comes from. The maximum length is 64 characters.Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $companyName = null;
    
    /**
     * @var string|null $consentProvidedForMinor Sets whether consent was obtained for minors. Allowed values: null, Granted, Denied, and NotRequired. For more information, see legal age group property definitions. Requires $select to retrieve. Supports $filter (eq, ne, not, and in).
    */
    private ?string $consentProvidedForMinor = null;
    
    /**
     * @var array<ContactFolder>|null $contactFolders The user's contacts folders. Read-only. Nullable.
    */
    private ?array $contactFolders = null;
    
    /**
     * @var array<Contact>|null $contacts The user's contacts. Read-only. Nullable.
    */
    private ?array $contacts = null;
    
    /**
     * @var string|null $country The country or region where the user is located; for example, US or UK. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $country = null;
    
    /**
     * @var DateTime|null $createdDateTime The date and time the user was created, in ISO 8601 format and UTC. The value can't be modified and is automatically populated when the entity is created. Nullable. For on-premises users, the value represents when they were first created in Microsoft Entra ID. Property is null for some users created before June 2018 and on-premises users that were synced to Microsoft Entra ID before June 2018. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
    */
    private ?DateTime $createdDateTime = null;
    
    /**
     * @var array<DirectoryObject>|null $createdObjects Directory objects that the user created. Read-only. Nullable.
    */
    private ?array $createdObjects = null;
    
    /**
     * @var string|null $creationType Indicates whether the user account was created through one of the following methods:  As a regular school or work account (null). As an external account (Invitation). As a local account for an Azure Active Directory B2C tenant (LocalAccount). Through self-service sign-up by an internal user using email verification (EmailVerified). Through self-service sign-up by a guest signing up through a link that is part of a user flow (SelfServiceSignUp). Read-only.Requires $select to retrieve. Supports $filter (eq, ne, not, in).
    */
    private ?string $creationType = null;
    
    /**
     * @var CustomSecurityAttributeValue|null $customSecurityAttributes An open complex type that holds the value of a custom security attribute that is assigned to a directory object. Nullable. Requires $select to retrieve. Supports $filter (eq, ne, not, startsWith). The filter value is case-sensitive. To read this property, the calling app must be assigned the CustomSecAttributeAssignment.Read.All permission. To write this property, the calling app must be assigned the CustomSecAttributeAssignment.ReadWrite.All permissions. To read or write this property in delegated scenarios, the admin must be assigned the Attribute Assignment Administrator role.
    */
    private ?CustomSecurityAttributeValue $customSecurityAttributes = null;
    
    /**
     * @var UserDataSecurityAndGovernance|null $dataSecurityAndGovernance The data security and governance settings for the user. Read-only. Nullable.
    */
    private ?UserDataSecurityAndGovernance $dataSecurityAndGovernance = null;
    
    /**
     * @var string|null $department The name of the department in which the user works. Maximum length is 64 characters. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, and eq on null values).
    */
    private ?string $department = null;
    
    /**
     * @var int|null $deviceEnrollmentLimit The limit on the maximum number of devices that the user is permitted to enroll. Allowed values are 5 or 1000.
    */
    private ?int $deviceEnrollmentLimit = null;
    
    /**
     * @var array<DeviceManagementTroubleshootingEvent>|null $deviceManagementTroubleshootingEvents The list of troubleshooting events for this user.
    */
    private ?array $deviceManagementTroubleshootingEvents = null;
    
    /**
     * @var array<DirectoryObject>|null $directReports The users and contacts that report to the user. (The users and contacts that have their manager property set to this user.) Read-only. Nullable. Supports $expand.
    */
    private ?array $directReports = null;
    
    /**
     * @var string|null $displayName The name displayed in the address book for the user. This value is usually the combination of the user's first name, middle initial, and family name. This property is required when a user is created and it can't be cleared during updates. Maximum length is 256 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values), $orderby, and $search.
    */
    private ?string $displayName = null;
    
    /**
     * @var Drive|null $drive The user's OneDrive. Read-only.
    */
    private ?Drive $drive = null;
    
    /**
     * @var array<Drive>|null $drives A collection of drives available for this user. Read-only.
    */
    private ?array $drives = null;
    
    /**
     * @var EmployeeExperienceUser|null $employeeExperience The employeeExperience property
    */
    private ?EmployeeExperienceUser $employeeExperience = null;
    
    /**
     * @var DateTime|null $employeeHireDate The date and time when the user was hired or will start work in a future hire. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
    */
    private ?DateTime $employeeHireDate = null;
    
    /**
     * @var string|null $employeeId The employee identifier assigned to the user by the organization. The maximum length is 16 characters. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
    */
    private ?string $employeeId = null;
    
    /**
     * @var DateTime|null $employeeLeaveDateTime The date and time when the user left or will leave the organization. To read this property, the calling app must be assigned the User-LifeCycleInfo.Read.All permission. To write this property, the calling app must be assigned the User.Read.All and User-LifeCycleInfo.ReadWrite.All permissions. To read this property in delegated scenarios, the admin needs at least one of the following Microsoft Entra roles: Lifecycle Workflows Administrator (least privilege), Global Reader. To write this property in delegated scenarios, the admin needs the Global Administrator role. Supports $filter (eq, ne, not , ge, le, in). For more information, see Configure the employeeLeaveDateTime property for a user.
    */
    private ?DateTime $employeeLeaveDateTime = null;
    
    /**
     * @var EmployeeOrgData|null $employeeOrgData Represents organization data (for example, division and costCenter) associated with a user. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
    */
    private ?EmployeeOrgData $employeeOrgData = null;
    
    /**
     * @var string|null $employeeType Captures enterprise worker type. For example, Employee, Contractor, Consultant, or Vendor. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith).
    */
    private ?string $employeeType = null;
    
    /**
     * @var UserPrint|null $escapedPrint The print property
    */
    private ?UserPrint $escapedPrint = null;
    
    /**
     * @var array<Event>|null $events The user's events. Default is to show Events under the Default Calendar. Read-only. Nullable.
    */
    private ?array $events = null;
    
    /**
     * @var array<Extension>|null $extensions The collection of open extensions defined for the user. Read-only. Supports $expand. Nullable.
    */
    private ?array $extensions = null;
    
    /**
     * @var string|null $externalUserState For a guest invited to the tenant using the invitation API, this property represents the invited user's invitation status. For invited users, the state can be PendingAcceptance or Accepted, or null for all other users. Requires $select to retrieve. Supports $filter (eq, ne, not , in).
    */
    private ?string $externalUserState = null;
    
    /**
     * @var DateTime|null $externalUserStateChangeDateTime Shows the timestamp for the latest change to the externalUserState property. Requires $select to retrieve. Supports $filter (eq, ne, not , in).
    */
    private ?DateTime $externalUserStateChangeDateTime = null;
    
    /**
     * @var string|null $faxNumber The fax number of the user. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
    */
    private ?string $faxNumber = null;
    
    /**
     * @var array<Site>|null $followedSites The followedSites property
    */
    private ?array $followedSites = null;
    
    /**
     * @var string|null $givenName The given name (first name) of the user. Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
    */
    private ?string $givenName = null;
    
    /**
     * @var DateTime|null $hireDate The hire date of the user. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z. Requires $select to retrieve.  Note: This property is specific to SharePoint in Microsoft 365. We recommend using the native employeeHireDate property to set and update hire date values using Microsoft Graph APIs.
    */
    private ?DateTime $hireDate = null;
    
    /**
     * @var array<ObjectIdentity>|null $identities Represents the identities that can be used to sign in to this user account. Microsoft (also known as a local account), organizations, or social identity providers such as Facebook, Google, and Microsoft can provide identity and tie it to a user account. It might contain multiple items with the same signInType value. Requires $select to retrieve.  Supports $filter (eq) with limitations.
    */
    private ?array $identities = null;
    
    /**
     * @var string|null $identityParentId The identityParentId property
    */
    private ?string $identityParentId = null;
    
    /**
     * @var array<string>|null $imAddresses The instant message voice-over IP (VOIP) session initiation protocol (SIP) addresses for the user. Read-only. Requires $select to retrieve. Supports $filter (eq, not, ge, le, startsWith).
    */
    private ?array $imAddresses = null;
    
    /**
     * @var InferenceClassification|null $inferenceClassification Relevance classification of the user's messages based on explicit designations that override inferred relevance or importance.
    */
    private ?InferenceClassification $inferenceClassification = null;
    
    /**
     * @var ItemInsights|null $insights Represents relationships between a user and items such as OneDrive for work or school documents, calculated using advanced analytics and machine learning techniques. Read-only. Nullable.
    */
    private ?ItemInsights $insights = null;
    
    /**
     * @var array<string>|null $interests A list for the user to describe their interests. Requires $select to retrieve.
    */
    private ?array $interests = null;
    
    /**
     * @var bool|null $isManagementRestricted true if the user is a member of a restricted management administrative unit. If not set, the default value is null and the default behavior is false. Read-only.  To manage a user who is a member of a restricted management administrative unit, the administrator or calling app must be assigned a Microsoft Entra role at the scope of the restricted management administrative unit. Requires $select to retrieve.
    */
    private ?bool $isManagementRestricted = null;
    
    /**
     * @var bool|null $isResourceAccount Don't use – reserved for future use.
    */
    private ?bool $isResourceAccount = null;
    
    /**
     * @var string|null $jobTitle The user's job title. Maximum length is 128 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
    */
    private ?string $jobTitle = null;
    
    /**
     * @var array<Team>|null $joinedTeams The joinedTeams property
    */
    private ?array $joinedTeams = null;
    
    /**
     * @var DateTime|null $lastPasswordChangeDateTime The time when this Microsoft Entra user last changed their password or when their password was created, whichever date the latest action was performed. The date and time information uses ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Requires $select to retrieve.
    */
    private ?DateTime $lastPasswordChangeDateTime = null;
    
    /**
     * @var string|null $legalAgeGroupClassification Used by enterprise applications to determine the legal age group of the user. This property is read-only and calculated based on ageGroup and consentProvidedForMinor properties. Allowed values: null, Undefined,  MinorWithOutParentalConsent, MinorWithParentalConsent, MinorNoParentalConsentRequired, NotAdult, and Adult. For more information, see legal age group property definitions. Requires $select to retrieve.
    */
    private ?string $legalAgeGroupClassification = null;
    
    /**
     * @var array<LicenseAssignmentState>|null $licenseAssignmentStates State of license assignments for this user. Also indicates licenses that are directly assigned or the user inherited through group memberships. Read-only. Requires $select to retrieve.
    */
    private ?array $licenseAssignmentStates = null;
    
    /**
     * @var array<LicenseDetails>|null $licenseDetails A collection of this user's license details. Read-only.
    */
    private ?array $licenseDetails = null;
    
    /**
     * @var string|null $mail The SMTP address for the user, for example, jeff@contoso.com. Changes to this property update the user's proxyAddresses collection to include the value as an SMTP address. This property can't contain accent characters.  NOTE: We don't recommend updating this property for Azure AD B2C user profiles. Use the otherMails property instead. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, endsWith, and eq on null values).
    */
    private ?string $mail = null;
    
    /**
     * @var MailboxSettings|null $mailboxSettings Settings for the primary mailbox of the signed-in user. You can get or update settings for sending automatic replies to incoming messages, locale, and time zone. Requires $select to retrieve.
    */
    private ?MailboxSettings $mailboxSettings = null;
    
    /**
     * @var array<MailFolder>|null $mailFolders The user's mail folders. Read-only. Nullable.
    */
    private ?array $mailFolders = null;
    
    /**
     * @var string|null $mailNickname The mail alias for the user. This property must be specified when a user is created. Maximum length is 64 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $mailNickname = null;
    
    /**
     * @var array<ManagedAppRegistration>|null $managedAppRegistrations Zero or more managed app registrations that belong to the user.
    */
    private ?array $managedAppRegistrations = null;
    
    /**
     * @var array<ManagedDevice>|null $managedDevices The managed devices associated with the user.
    */
    private ?array $managedDevices = null;
    
    /**
     * @var DirectoryObject|null $manager The user or contact that is this user's manager. Read-only. Supports $expand.
    */
    private ?DirectoryObject $manager = null;
    
    /**
     * @var array<DirectoryObject>|null $memberOf The groups and directory roles that the user is a member of. Read-only. Nullable. Supports $expand.
    */
    private ?array $memberOf = null;
    
    /**
     * @var array<Message>|null $messages The messages in a mailbox or folder. Read-only. Nullable.
    */
    private ?array $messages = null;
    
    /**
     * @var string|null $mobilePhone The primary cellular telephone number for the user. Read-only for users synced from the on-premises directory. Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values) and $search. This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
    */
    private ?string $mobilePhone = null;
    
    /**
     * @var string|null $mySite The URL for the user's site. Requires $select to retrieve.
    */
    private ?string $mySite = null;
    
    /**
     * @var array<OAuth2PermissionGrant>|null $oauth2PermissionGrants The oauth2PermissionGrants property
    */
    private ?array $oauth2PermissionGrants = null;
    
    /**
     * @var string|null $officeLocation The office location in the user's place of business. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $officeLocation = null;
    
    /**
     * @var Onenote|null $onenote The onenote property
    */
    private ?Onenote $onenote = null;
    
    /**
     * @var array<OnlineMeeting>|null $onlineMeetings Information about a meeting, including the URL used to join a meeting, the attendees list, and the description.
    */
    private ?array $onlineMeetings = null;
    
    /**
     * @var string|null $onPremisesDistinguishedName Contains the on-premises Active Directory distinguished name or DN. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve.
    */
    private ?string $onPremisesDistinguishedName = null;
    
    /**
     * @var string|null $onPremisesDomainName Contains the on-premises domainFQDN, also called dnsDomainName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve.
    */
    private ?string $onPremisesDomainName = null;
    
    /**
     * @var OnPremisesExtensionAttributes|null $onPremisesExtensionAttributes Contains extensionAttributes1-15 for the user. These extension attributes are also known as Exchange custom attributes 1-15. Each attribute can store up to 1024 characters. For an onPremisesSyncEnabled user, the source of authority for this set of properties is the on-premises and is read-only. For a cloud-only user (where onPremisesSyncEnabled is false), these properties can be set during the creation or update of a user object.  For a cloud-only user previously synced from on-premises Active Directory, these properties are read-only in Microsoft Graph but can be fully managed through the Exchange Admin Center or the Exchange Online V2 module in PowerShell. Requires $select to retrieve. Supports $filter (eq, ne, not, in).
    */
    private ?OnPremisesExtensionAttributes $onPremisesExtensionAttributes = null;
    
    /**
     * @var string|null $onPremisesImmutableId This property is used to associate an on-premises Active Directory user account to their Microsoft Entra user object. This property must be specified when creating a new user account in the Graph if you're using a federated domain for the user's userPrincipalName (UPN) property. NOTE: The $ and _ characters can't be used when specifying this property. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
    */
    private ?string $onPremisesImmutableId = null;
    
    /**
     * @var DateTime|null $onPremisesLastSyncDateTime Indicates the last time at which the object was synced with the on-premises directory; for example: 2013-02-16T03:04:54Z. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in).
    */
    private ?DateTime $onPremisesLastSyncDateTime = null;
    
    /**
     * @var array<OnPremisesProvisioningError>|null $onPremisesProvisioningErrors Errors when using Microsoft synchronization product during provisioning. Requires $select to retrieve. Supports $filter (eq, not, ge, le).
    */
    private ?array $onPremisesProvisioningErrors = null;
    
    /**
     * @var string|null $onPremisesSamAccountName Contains the on-premises samAccountName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith).
    */
    private ?string $onPremisesSamAccountName = null;
    
    /**
     * @var string|null $onPremisesSecurityIdentifier Contains the on-premises security identifier (SID) for the user that was synchronized from on-premises to the cloud. Read-only. Requires $select to retrieve. Supports $filter (eq including on null values).
    */
    private ?string $onPremisesSecurityIdentifier = null;
    
    /**
     * @var OnPremisesSyncBehavior|null $onPremisesSyncBehavior The onPremisesSyncBehavior property
    */
    private ?OnPremisesSyncBehavior $onPremisesSyncBehavior = null;
    
    /**
     * @var bool|null $onPremisesSyncEnabled true if this user object is currently being synced from an on-premises Active Directory (AD); otherwise the user isn't being synced and can be managed in Microsoft Entra ID. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values).
    */
    private ?bool $onPremisesSyncEnabled = null;
    
    /**
     * @var string|null $onPremisesUserPrincipalName Contains the on-premises userPrincipalName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith).
    */
    private ?string $onPremisesUserPrincipalName = null;
    
    /**
     * @var array<string>|null $otherMails A list of other email addresses for the user; for example: ['bob@contoso.com', 'Robert@fabrikam.com']. Can store up to 250 values, each with a limit of 250 characters. NOTE: This property can't contain accent characters. Requires $select to retrieve. Supports $filter (eq, not, ge, le, in, startsWith, endsWith, /$count eq 0, /$count ne 0). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
    */
    private ?array $otherMails = null;
    
    /**
     * @var OutlookUser|null $outlook The outlook property
    */
    private ?OutlookUser $outlook = null;
    
    /**
     * @var array<DirectoryObject>|null $ownedDevices Devices the user owns. Read-only. Nullable. Supports $expand and $filter (/$count eq 0, /$count ne 0, /$count eq 1, /$count ne 1).
    */
    private ?array $ownedDevices = null;
    
    /**
     * @var array<DirectoryObject>|null $ownedObjects Directory objects the user owns. Read-only. Nullable. Supports $expand, $select nested in $expand, and $filter (/$count eq 0, /$count ne 0, /$count eq 1, /$count ne 1).
    */
    private ?array $ownedObjects = null;
    
    /**
     * @var string|null $passwordPolicies Specifies password policies for the user. This value is an enumeration with one possible value being DisableStrongPassword, which allows weaker passwords than the default policy to be specified. DisablePasswordExpiration can also be specified. The two might be specified together; for example: DisablePasswordExpiration, DisableStrongPassword. Requires $select to retrieve. For more information on the default password policies, see Microsoft Entra password policies. Supports $filter (ne, not, and eq on null values).
    */
    private ?string $passwordPolicies = null;
    
    /**
     * @var PasswordProfile|null $passwordProfile Specifies the password profile for the user. The profile contains the user's password. This property is required when a user is created. The password in the profile must satisfy minimum requirements as specified by the passwordPolicies property. By default, a strong password is required. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values). To update this property:  User-PasswordProfile.ReadWrite.All is the least privileged permission to update this property.  In delegated scenarios, the User Administrator Microsoft Entra role is the least privileged admin role supported to update this property for nonadmin users. Privileged Authentication Administrator is the least privileged role that's allowed to update this property for all administrators in the tenant. In general, the signed-in user must have a higher privileged administrator role as indicated in Who can reset passwords.  In app-only scenarios, the calling app must be assigned a supported permission and at least the User Administrator Microsoft Entra role. This property is also subject to sensitive action restrictions.
    */
    private ?PasswordProfile $passwordProfile = null;
    
    /**
     * @var array<string>|null $pastProjects A list for the user to enumerate their past projects. Requires $select to retrieve.
    */
    private ?array $pastProjects = null;
    
    /**
     * @var array<Person>|null $people People that are relevant to the user. Read-only. Nullable.
    */
    private ?array $people = null;
    
    /**
     * @var array<ResourceSpecificPermissionGrant>|null $permissionGrants List all resource-specific permission grants of a user.
    */
    private ?array $permissionGrants = null;
    
    /**
     * @var ProfilePhoto|null $photo The user's profile photo. Read-only.
    */
    private ?ProfilePhoto $photo = null;
    
    /**
     * @var array<ProfilePhoto>|null $photos The collection of the user's profile photos in different sizes. Read-only.
    */
    private ?array $photos = null;
    
    /**
     * @var PlannerUser|null $planner Entry-point to the Planner resource that might exist for a user. Read-only.
    */
    private ?PlannerUser $planner = null;
    
    /**
     * @var string|null $postalCode The postal code for the user's postal address. The postal code is specific to the user's country or region. In the United States of America, this attribute contains the ZIP code. Maximum length is 40 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $postalCode = null;
    
    /**
     * @var string|null $preferredDataLocation The preferred data location for the user. For more information, see OneDrive Online Multi-Geo.
    */
    private ?string $preferredDataLocation = null;
    
    /**
     * @var string|null $preferredLanguage The preferred language for the user. The preferred language format is based on RFC 4646. The name is a combination of an ISO 639 two-letter lowercase culture code associated with the language, and an ISO 3166 two-letter uppercase subculture code associated with the country or region. Example: 'en-US', or 'es-ES'. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values)
    */
    private ?string $preferredLanguage = null;
    
    /**
     * @var string|null $preferredName The preferred name for the user. Not Supported. This attribute returns an empty string.Requires $select to retrieve.
    */
    private ?string $preferredName = null;
    
    /**
     * @var Presence|null $presence The presence property
    */
    private ?Presence $presence = null;
    
    /**
     * @var array<ProvisionedPlan>|null $provisionedPlans The plans that are provisioned for the user. Read-only. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, ge, le).
    */
    private ?array $provisionedPlans = null;
    
    /**
     * @var array<string>|null $proxyAddresses For example: ['SMTP: bob@contoso.com', 'smtp: bob@sales.contoso.com']. Changes to the mail property update this collection to include the value as an SMTP address. For more information, see mail and proxyAddresses properties. The proxy address prefixed with SMTP (capitalized) is the primary proxy address, while those addresses prefixed with smtp are the secondary proxy addresses. For Azure AD B2C accounts, this property has a limit of 10 unique addresses. Read-only in Microsoft Graph; you can update this property only through the Microsoft 365 admin center. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, ge, le, startsWith, endsWith, /$count eq 0, /$count ne 0).
    */
    private ?array $proxyAddresses = null;
    
    /**
     * @var array<DirectoryObject>|null $registeredDevices Devices that are registered for the user. Read-only. Nullable. Supports $expand and returns up to 100 objects.
    */
    private ?array $registeredDevices = null;
    
    /**
     * @var array<string>|null $responsibilities A list for the user to enumerate their responsibilities. Requires $select to retrieve.
    */
    private ?array $responsibilities = null;
    
    /**
     * @var array<string>|null $schools A list for the user to enumerate the schools they attended. Requires $select to retrieve.
    */
    private ?array $schools = null;
    
    /**
     * @var array<ScopedRoleMembership>|null $scopedRoleMemberOf The scopedRoleMemberOf property
    */
    private ?array $scopedRoleMemberOf = null;
    
    /**
     * @var string|null $securityIdentifier Security identifier (SID) of the user, used in Windows scenarios. Read-only. Returned by default. Supports $select and $filter (eq, not, ge, le, startsWith).
    */
    private ?string $securityIdentifier = null;
    
    /**
     * @var array<ServiceProvisioningError>|null $serviceProvisioningErrors Errors published by a federated service describing a nontransient, service-specific error regarding the properties or link from a user object.  Supports $filter (eq, not, for isResolved and serviceInstance).
    */
    private ?array $serviceProvisioningErrors = null;
    
    /**
     * @var UserSettings|null $settings The settings property
    */
    private ?UserSettings $settings = null;
    
    /**
     * @var bool|null $showInAddressList Do not use in Microsoft Graph. Manage this property through the Microsoft 365 admin center instead. Represents whether the user should be included in the Outlook global address list. See Known issue.
    */
    private ?bool $showInAddressList = null;
    
    /**
     * @var SignInActivity|null $signInActivity Get the last signed-in date and request ID of the sign-in for a given user. Read-only.Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le) but not with any other filterable properties. Note: Details for this property require a Microsoft Entra ID P1 or P2 license and the AuditLog.Read.All permission.This property isn't returned for a user who never signed in or last signed in before April 2020.
    */
    private ?SignInActivity $signInActivity = null;
    
    /**
     * @var DateTime|null $signInSessionsValidFromDateTime Any refresh tokens or session tokens (session cookies) issued before this time are invalid. Applications get an error when using an invalid refresh or session token to acquire a delegated access token (to access APIs such as Microsoft Graph). If this happens, the application needs to acquire a new refresh token by requesting the authorized endpoint. Read-only. Use revokeSignInSessions to reset. Requires $select to retrieve.
    */
    private ?DateTime $signInSessionsValidFromDateTime = null;
    
    /**
     * @var array<string>|null $skills A list for the user to enumerate their skills. Requires $select to retrieve.
    */
    private ?array $skills = null;
    
    /**
     * @var UserSolutionRoot|null $solutions The identifier that relates the user to the working time schedule triggers. Read-Only. Nullable
    */
    private ?UserSolutionRoot $solutions = null;
    
    /**
     * @var array<DirectoryObject>|null $sponsorOf Directory objects that this user sponsors, such as guest users, agent users, agent blueprints, agent blueprint principals, and agent identities. If the user is a member of a group that's a sponsor, the objects sponsored by that group are also included. Read-only. Nullable. Supports $filter, $count, $select, $expand, $top, and $skip.
    */
    private ?array $sponsorOf = null;
    
    /**
     * @var array<DirectoryObject>|null $sponsors The users and groups responsible for this guest's privileges in the tenant and keeping the guest's information and access updated. (HTTP Methods: GET, POST, DELETE.). Supports $expand.
    */
    private ?array $sponsors = null;
    
    /**
     * @var string|null $state The state or province in the user's address. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $state = null;
    
    /**
     * @var string|null $streetAddress The street address of the user's place of business. Maximum length is 1,024 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $streetAddress = null;
    
    /**
     * @var string|null $surname The user's surname (family name or last name). Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $surname = null;
    
    /**
     * @var UserTeamwork|null $teamwork A container for Microsoft Teams features available for the user. Read-only. Nullable.
    */
    private ?UserTeamwork $teamwork = null;
    
    /**
     * @var Todo|null $todo Represents the To Do services available to a user.
    */
    private ?Todo $todo = null;
    
    /**
     * @var array<DirectoryObject>|null $transitiveMemberOf The groups, including nested groups, and directory roles that a user is a member of. Nullable.
    */
    private ?array $transitiveMemberOf = null;
    
    /**
     * @var string|null $usageLocation A two-letter country code (ISO standard 3166). Required for users that are assigned licenses due to legal requirements to check for availability of services in countries/regions. Examples include: US, JP, and GB. Not nullable. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
    */
    private ?string $usageLocation = null;
    
    /**
     * @var string|null $userPrincipalName The user principal name (UPN) of the user. The UPN is an Internet-style sign-in name for the user based on the Internet standard RFC 822. By convention, this value should map to the user's email name. The general format is alias@domain, where the domain must be present in the tenant's collection of verified domains. This property is required when a user is created. The verified domains for the tenant can be accessed from the verifiedDomains property of organization.NOTE: This property can't contain accent characters. Only the following characters are allowed A - Z, a - z, 0 - 9, ' . - _ ! # ^ ~. For the complete list of allowed characters, see username policies. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, endsWith) and $orderby. This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
    */
    private ?string $userPrincipalName = null;
    
    /**
     * @var string|null $userType A string value that can be used to classify user types in your directory. The possible values are Member and Guest. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values). NOTE: For more information about the permissions for members and guests, see What are the default user permissions in Microsoft Entra ID?
    */
    private ?string $userType = null;
    
    /**
     * Instantiates a new User and sets the default values.
    */
    public function __construct() {
        parent::__construct();
        $this->setOdataType('#microsoft.graph.user');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return User
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): User {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.agentUser': return new AgentUser();
            }
        }
        return new User();
    }

    /**
     * Gets the aboutMe property value. A freeform text entry field for the user to describe themselves. Requires $select to retrieve.
     * @return string|null
    */
    public function getAboutMe(): ?string {
        return $this->aboutMe;
    }

    /**
     * Gets the accountEnabled property value. true if the account is enabled; otherwise, false. This property is required when a user is created. Requires $select to retrieve. Supports $filter (eq, ne, not, and in). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @return bool|null
    */
    public function getAccountEnabled(): ?bool {
        return $this->accountEnabled;
    }

    /**
     * Gets the activities property value. The user's activities across devices. Read-only. Nullable.
     * @return array<UserActivity>|null
    */
    public function getActivities(): ?array {
        return $this->activities;
    }

    /**
     * Gets the adhocCalls property value. Ad hoc calls associated with the user. Read-only. Nullable.
     * @return array<AdhocCall>|null
    */
    public function getAdhocCalls(): ?array {
        return $this->adhocCalls;
    }

    /**
     * Gets the ageGroup property value. Sets the age group of the user. Allowed values: null, Minor, NotAdult, and Adult. For more information, see legal age group property definitions. Requires $select to retrieve. Supports $filter (eq, ne, not, and in).
     * @return string|null
    */
    public function getAgeGroup(): ?string {
        return $this->ageGroup;
    }

    /**
     * Gets the agreementAcceptances property value. The user's terms of use acceptance statuses. Read-only. Nullable.
     * @return array<AgreementAcceptance>|null
    */
    public function getAgreementAcceptances(): ?array {
        return $this->agreementAcceptances;
    }

    /**
     * Gets the appRoleAssignments property value. Represents the app roles a user is granted for an application. Supports $expand.
     * @return array<AppRoleAssignment>|null
    */
    public function getAppRoleAssignments(): ?array {
        return $this->appRoleAssignments;
    }

    /**
     * Gets the assignedLicenses property value. The licenses that are assigned to the user, including inherited (group-based) licenses. This property doesn't differentiate between directly assigned and inherited licenses. Use the licenseAssignmentStates property to identify the directly assigned and inherited licenses. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, /$count eq 0, /$count ne 0).
     * @return array<AssignedLicense>|null
    */
    public function getAssignedLicenses(): ?array {
        return $this->assignedLicenses;
    }

    /**
     * Gets the assignedPlans property value. The plans that are assigned to the user. Read-only. Not nullable. Requires $select to retrieve. Supports $filter (eq and not).
     * @return array<AssignedPlan>|null
    */
    public function getAssignedPlans(): ?array {
        return $this->assignedPlans;
    }

    /**
     * Gets the authentication property value. The authentication methods that are supported for the user.
     * @return Authentication|null
    */
    public function getAuthentication(): ?Authentication {
        return $this->authentication;
    }

    /**
     * Gets the authorizationInfo property value. The authorizationInfo property
     * @return AuthorizationInfo|null
    */
    public function getAuthorizationInfo(): ?AuthorizationInfo {
        return $this->authorizationInfo;
    }

    /**
     * Gets the birthday property value. The birthday of the user. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z. Requires $select to retrieve.
     * @return DateTime|null
    */
    public function getBirthday(): ?DateTime {
        return $this->birthday;
    }

    /**
     * Gets the businessPhones property value. The telephone numbers for the user. NOTE: Although it's a string collection, only one number can be set for this property. Read-only for users synced from the on-premises directory. Returned by default. Supports $filter (eq, not, ge, le, startsWith). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @return array<string>|null
    */
    public function getBusinessPhones(): ?array {
        return $this->businessPhones;
    }

    /**
     * Gets the calendar property value. The user's primary calendar. Read-only.
     * @return Calendar|null
    */
    public function getCalendar(): ?Calendar {
        return $this->calendar;
    }

    /**
     * Gets the calendarGroups property value. The user's calendar groups. Read-only. Nullable.
     * @return array<CalendarGroup>|null
    */
    public function getCalendarGroups(): ?array {
        return $this->calendarGroups;
    }

    /**
     * Gets the calendars property value. The user's calendars. Read-only. Nullable.
     * @return array<Calendar>|null
    */
    public function getCalendars(): ?array {
        return $this->calendars;
    }

    /**
     * Gets the calendarView property value. The calendar view for the calendar. Read-only. Nullable.
     * @return array<Event>|null
    */
    public function getCalendarView(): ?array {
        return $this->calendarView;
    }

    /**
     * Gets the chats property value. The chats property
     * @return array<Chat>|null
    */
    public function getChats(): ?array {
        return $this->chats;
    }

    /**
     * Gets the city property value. The city where the user is located. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getCity(): ?string {
        return $this->city;
    }

    /**
     * Gets the cloudClipboard property value. The cloudClipboard property
     * @return CloudClipboardRoot|null
    */
    public function getCloudClipboard(): ?CloudClipboardRoot {
        return $this->cloudClipboard;
    }

    /**
     * Gets the cloudPCs property value. The user's Cloud PCs. Read-only. Nullable.
     * @return array<CloudPC>|null
    */
    public function getCloudPCs(): ?array {
        return $this->cloudPCs;
    }

    /**
     * Gets the companyName property value. The name of the company that the user is associated with. This property can be useful for describing the company that a guest comes from. The maximum length is 64 characters.Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getCompanyName(): ?string {
        return $this->companyName;
    }

    /**
     * Gets the consentProvidedForMinor property value. Sets whether consent was obtained for minors. Allowed values: null, Granted, Denied, and NotRequired. For more information, see legal age group property definitions. Requires $select to retrieve. Supports $filter (eq, ne, not, and in).
     * @return string|null
    */
    public function getConsentProvidedForMinor(): ?string {
        return $this->consentProvidedForMinor;
    }

    /**
     * Gets the contactFolders property value. The user's contacts folders. Read-only. Nullable.
     * @return array<ContactFolder>|null
    */
    public function getContactFolders(): ?array {
        return $this->contactFolders;
    }

    /**
     * Gets the contacts property value. The user's contacts. Read-only. Nullable.
     * @return array<Contact>|null
    */
    public function getContacts(): ?array {
        return $this->contacts;
    }

    /**
     * Gets the country property value. The country or region where the user is located; for example, US or UK. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getCountry(): ?string {
        return $this->country;
    }

    /**
     * Gets the createdDateTime property value. The date and time the user was created, in ISO 8601 format and UTC. The value can't be modified and is automatically populated when the entity is created. Nullable. For on-premises users, the value represents when they were first created in Microsoft Entra ID. Property is null for some users created before June 2018 and on-premises users that were synced to Microsoft Entra ID before June 2018. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
     * @return DateTime|null
    */
    public function getCreatedDateTime(): ?DateTime {
        return $this->createdDateTime;
    }

    /**
     * Gets the createdObjects property value. Directory objects that the user created. Read-only. Nullable.
     * @return array<DirectoryObject>|null
    */
    public function getCreatedObjects(): ?array {
        return $this->createdObjects;
    }

    /**
     * Gets the creationType property value. Indicates whether the user account was created through one of the following methods:  As a regular school or work account (null). As an external account (Invitation). As a local account for an Azure Active Directory B2C tenant (LocalAccount). Through self-service sign-up by an internal user using email verification (EmailVerified). Through self-service sign-up by a guest signing up through a link that is part of a user flow (SelfServiceSignUp). Read-only.Requires $select to retrieve. Supports $filter (eq, ne, not, in).
     * @return string|null
    */
    public function getCreationType(): ?string {
        return $this->creationType;
    }

    /**
     * Gets the customSecurityAttributes property value. An open complex type that holds the value of a custom security attribute that is assigned to a directory object. Nullable. Requires $select to retrieve. Supports $filter (eq, ne, not, startsWith). The filter value is case-sensitive. To read this property, the calling app must be assigned the CustomSecAttributeAssignment.Read.All permission. To write this property, the calling app must be assigned the CustomSecAttributeAssignment.ReadWrite.All permissions. To read or write this property in delegated scenarios, the admin must be assigned the Attribute Assignment Administrator role.
     * @return CustomSecurityAttributeValue|null
    */
    public function getCustomSecurityAttributes(): ?CustomSecurityAttributeValue {
        return $this->customSecurityAttributes;
    }

    /**
     * Gets the dataSecurityAndGovernance property value. The data security and governance settings for the user. Read-only. Nullable.
     * @return UserDataSecurityAndGovernance|null
    */
    public function getDataSecurityAndGovernance(): ?UserDataSecurityAndGovernance {
        return $this->dataSecurityAndGovernance;
    }

    /**
     * Gets the department property value. The name of the department in which the user works. Maximum length is 64 characters. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, and eq on null values).
     * @return string|null
    */
    public function getDepartment(): ?string {
        return $this->department;
    }

    /**
     * Gets the deviceEnrollmentLimit property value. The limit on the maximum number of devices that the user is permitted to enroll. Allowed values are 5 or 1000.
     * @return int|null
    */
    public function getDeviceEnrollmentLimit(): ?int {
        return $this->deviceEnrollmentLimit;
    }

    /**
     * Gets the deviceManagementTroubleshootingEvents property value. The list of troubleshooting events for this user.
     * @return array<DeviceManagementTroubleshootingEvent>|null
    */
    public function getDeviceManagementTroubleshootingEvents(): ?array {
        return $this->deviceManagementTroubleshootingEvents;
    }

    /**
     * Gets the directReports property value. The users and contacts that report to the user. (The users and contacts that have their manager property set to this user.) Read-only. Nullable. Supports $expand.
     * @return array<DirectoryObject>|null
    */
    public function getDirectReports(): ?array {
        return $this->directReports;
    }

    /**
     * Gets the displayName property value. The name displayed in the address book for the user. This value is usually the combination of the user's first name, middle initial, and family name. This property is required when a user is created and it can't be cleared during updates. Maximum length is 256 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values), $orderby, and $search.
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the drive property value. The user's OneDrive. Read-only.
     * @return Drive|null
    */
    public function getDrive(): ?Drive {
        return $this->drive;
    }

    /**
     * Gets the drives property value. A collection of drives available for this user. Read-only.
     * @return array<Drive>|null
    */
    public function getDrives(): ?array {
        return $this->drives;
    }

    /**
     * Gets the employeeExperience property value. The employeeExperience property
     * @return EmployeeExperienceUser|null
    */
    public function getEmployeeExperience(): ?EmployeeExperienceUser {
        return $this->employeeExperience;
    }

    /**
     * Gets the employeeHireDate property value. The date and time when the user was hired or will start work in a future hire. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
     * @return DateTime|null
    */
    public function getEmployeeHireDate(): ?DateTime {
        return $this->employeeHireDate;
    }

    /**
     * Gets the employeeId property value. The employee identifier assigned to the user by the organization. The maximum length is 16 characters. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getEmployeeId(): ?string {
        return $this->employeeId;
    }

    /**
     * Gets the employeeLeaveDateTime property value. The date and time when the user left or will leave the organization. To read this property, the calling app must be assigned the User-LifeCycleInfo.Read.All permission. To write this property, the calling app must be assigned the User.Read.All and User-LifeCycleInfo.ReadWrite.All permissions. To read this property in delegated scenarios, the admin needs at least one of the following Microsoft Entra roles: Lifecycle Workflows Administrator (least privilege), Global Reader. To write this property in delegated scenarios, the admin needs the Global Administrator role. Supports $filter (eq, ne, not , ge, le, in). For more information, see Configure the employeeLeaveDateTime property for a user.
     * @return DateTime|null
    */
    public function getEmployeeLeaveDateTime(): ?DateTime {
        return $this->employeeLeaveDateTime;
    }

    /**
     * Gets the employeeOrgData property value. Represents organization data (for example, division and costCenter) associated with a user. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
     * @return EmployeeOrgData|null
    */
    public function getEmployeeOrgData(): ?EmployeeOrgData {
        return $this->employeeOrgData;
    }

    /**
     * Gets the employeeType property value. Captures enterprise worker type. For example, Employee, Contractor, Consultant, or Vendor. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith).
     * @return string|null
    */
    public function getEmployeeType(): ?string {
        return $this->employeeType;
    }

    /**
     * Gets the print property value. The print property
     * @return UserPrint|null
    */
    public function getEscapedPrint(): ?UserPrint {
        return $this->escapedPrint;
    }

    /**
     * Gets the events property value. The user's events. Default is to show Events under the Default Calendar. Read-only. Nullable.
     * @return array<Event>|null
    */
    public function getEvents(): ?array {
        return $this->events;
    }

    /**
     * Gets the extensions property value. The collection of open extensions defined for the user. Read-only. Supports $expand. Nullable.
     * @return array<Extension>|null
    */
    public function getExtensions(): ?array {
        return $this->extensions;
    }

    /**
     * Gets the externalUserState property value. For a guest invited to the tenant using the invitation API, this property represents the invited user's invitation status. For invited users, the state can be PendingAcceptance or Accepted, or null for all other users. Requires $select to retrieve. Supports $filter (eq, ne, not , in).
     * @return string|null
    */
    public function getExternalUserState(): ?string {
        return $this->externalUserState;
    }

    /**
     * Gets the externalUserStateChangeDateTime property value. Shows the timestamp for the latest change to the externalUserState property. Requires $select to retrieve. Supports $filter (eq, ne, not , in).
     * @return DateTime|null
    */
    public function getExternalUserStateChangeDateTime(): ?DateTime {
        return $this->externalUserStateChangeDateTime;
    }

    /**
     * Gets the faxNumber property value. The fax number of the user. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getFaxNumber(): ?string {
        return $this->faxNumber;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'aboutMe' => fn(ParseNode $n) => $o->setAboutMe($n->getStringValue()),
            'accountEnabled' => fn(ParseNode $n) => $o->setAccountEnabled($n->getBooleanValue()),
            'activities' => fn(ParseNode $n) => $o->setActivities($n->getCollectionOfObjectValues([UserActivity::class, 'createFromDiscriminatorValue'])),
            'adhocCalls' => fn(ParseNode $n) => $o->setAdhocCalls($n->getCollectionOfObjectValues([AdhocCall::class, 'createFromDiscriminatorValue'])),
            'ageGroup' => fn(ParseNode $n) => $o->setAgeGroup($n->getStringValue()),
            'agreementAcceptances' => fn(ParseNode $n) => $o->setAgreementAcceptances($n->getCollectionOfObjectValues([AgreementAcceptance::class, 'createFromDiscriminatorValue'])),
            'appRoleAssignments' => fn(ParseNode $n) => $o->setAppRoleAssignments($n->getCollectionOfObjectValues([AppRoleAssignment::class, 'createFromDiscriminatorValue'])),
            'assignedLicenses' => fn(ParseNode $n) => $o->setAssignedLicenses($n->getCollectionOfObjectValues([AssignedLicense::class, 'createFromDiscriminatorValue'])),
            'assignedPlans' => fn(ParseNode $n) => $o->setAssignedPlans($n->getCollectionOfObjectValues([AssignedPlan::class, 'createFromDiscriminatorValue'])),
            'authentication' => fn(ParseNode $n) => $o->setAuthentication($n->getObjectValue([Authentication::class, 'createFromDiscriminatorValue'])),
            'authorizationInfo' => fn(ParseNode $n) => $o->setAuthorizationInfo($n->getObjectValue([AuthorizationInfo::class, 'createFromDiscriminatorValue'])),
            'birthday' => fn(ParseNode $n) => $o->setBirthday($n->getDateTimeValue()),
            'businessPhones' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setBusinessPhones($val);
            },
            'calendar' => fn(ParseNode $n) => $o->setCalendar($n->getObjectValue([Calendar::class, 'createFromDiscriminatorValue'])),
            'calendarGroups' => fn(ParseNode $n) => $o->setCalendarGroups($n->getCollectionOfObjectValues([CalendarGroup::class, 'createFromDiscriminatorValue'])),
            'calendars' => fn(ParseNode $n) => $o->setCalendars($n->getCollectionOfObjectValues([Calendar::class, 'createFromDiscriminatorValue'])),
            'calendarView' => fn(ParseNode $n) => $o->setCalendarView($n->getCollectionOfObjectValues([Event::class, 'createFromDiscriminatorValue'])),
            'chats' => fn(ParseNode $n) => $o->setChats($n->getCollectionOfObjectValues([Chat::class, 'createFromDiscriminatorValue'])),
            'city' => fn(ParseNode $n) => $o->setCity($n->getStringValue()),
            'cloudClipboard' => fn(ParseNode $n) => $o->setCloudClipboard($n->getObjectValue([CloudClipboardRoot::class, 'createFromDiscriminatorValue'])),
            'cloudPCs' => fn(ParseNode $n) => $o->setCloudPCs($n->getCollectionOfObjectValues([CloudPC::class, 'createFromDiscriminatorValue'])),
            'companyName' => fn(ParseNode $n) => $o->setCompanyName($n->getStringValue()),
            'consentProvidedForMinor' => fn(ParseNode $n) => $o->setConsentProvidedForMinor($n->getStringValue()),
            'contactFolders' => fn(ParseNode $n) => $o->setContactFolders($n->getCollectionOfObjectValues([ContactFolder::class, 'createFromDiscriminatorValue'])),
            'contacts' => fn(ParseNode $n) => $o->setContacts($n->getCollectionOfObjectValues([Contact::class, 'createFromDiscriminatorValue'])),
            'country' => fn(ParseNode $n) => $o->setCountry($n->getStringValue()),
            'createdDateTime' => fn(ParseNode $n) => $o->setCreatedDateTime($n->getDateTimeValue()),
            'createdObjects' => fn(ParseNode $n) => $o->setCreatedObjects($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'creationType' => fn(ParseNode $n) => $o->setCreationType($n->getStringValue()),
            'customSecurityAttributes' => fn(ParseNode $n) => $o->setCustomSecurityAttributes($n->getObjectValue([CustomSecurityAttributeValue::class, 'createFromDiscriminatorValue'])),
            'dataSecurityAndGovernance' => fn(ParseNode $n) => $o->setDataSecurityAndGovernance($n->getObjectValue([UserDataSecurityAndGovernance::class, 'createFromDiscriminatorValue'])),
            'department' => fn(ParseNode $n) => $o->setDepartment($n->getStringValue()),
            'deviceEnrollmentLimit' => fn(ParseNode $n) => $o->setDeviceEnrollmentLimit($n->getIntegerValue()),
            'deviceManagementTroubleshootingEvents' => fn(ParseNode $n) => $o->setDeviceManagementTroubleshootingEvents($n->getCollectionOfObjectValues([DeviceManagementTroubleshootingEvent::class, 'createFromDiscriminatorValue'])),
            'directReports' => fn(ParseNode $n) => $o->setDirectReports($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'drive' => fn(ParseNode $n) => $o->setDrive($n->getObjectValue([Drive::class, 'createFromDiscriminatorValue'])),
            'drives' => fn(ParseNode $n) => $o->setDrives($n->getCollectionOfObjectValues([Drive::class, 'createFromDiscriminatorValue'])),
            'employeeExperience' => fn(ParseNode $n) => $o->setEmployeeExperience($n->getObjectValue([EmployeeExperienceUser::class, 'createFromDiscriminatorValue'])),
            'employeeHireDate' => fn(ParseNode $n) => $o->setEmployeeHireDate($n->getDateTimeValue()),
            'employeeId' => fn(ParseNode $n) => $o->setEmployeeId($n->getStringValue()),
            'employeeLeaveDateTime' => fn(ParseNode $n) => $o->setEmployeeLeaveDateTime($n->getDateTimeValue()),
            'employeeOrgData' => fn(ParseNode $n) => $o->setEmployeeOrgData($n->getObjectValue([EmployeeOrgData::class, 'createFromDiscriminatorValue'])),
            'employeeType' => fn(ParseNode $n) => $o->setEmployeeType($n->getStringValue()),
            'print' => fn(ParseNode $n) => $o->setEscapedPrint($n->getObjectValue([UserPrint::class, 'createFromDiscriminatorValue'])),
            'events' => fn(ParseNode $n) => $o->setEvents($n->getCollectionOfObjectValues([Event::class, 'createFromDiscriminatorValue'])),
            'extensions' => fn(ParseNode $n) => $o->setExtensions($n->getCollectionOfObjectValues([Extension::class, 'createFromDiscriminatorValue'])),
            'externalUserState' => fn(ParseNode $n) => $o->setExternalUserState($n->getStringValue()),
            'externalUserStateChangeDateTime' => fn(ParseNode $n) => $o->setExternalUserStateChangeDateTime($n->getDateTimeValue()),
            'faxNumber' => fn(ParseNode $n) => $o->setFaxNumber($n->getStringValue()),
            'followedSites' => fn(ParseNode $n) => $o->setFollowedSites($n->getCollectionOfObjectValues([Site::class, 'createFromDiscriminatorValue'])),
            'givenName' => fn(ParseNode $n) => $o->setGivenName($n->getStringValue()),
            'hireDate' => fn(ParseNode $n) => $o->setHireDate($n->getDateTimeValue()),
            'identities' => fn(ParseNode $n) => $o->setIdentities($n->getCollectionOfObjectValues([ObjectIdentity::class, 'createFromDiscriminatorValue'])),
            'identityParentId' => fn(ParseNode $n) => $o->setIdentityParentId($n->getStringValue()),
            'imAddresses' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setImAddresses($val);
            },
            'inferenceClassification' => fn(ParseNode $n) => $o->setInferenceClassification($n->getObjectValue([InferenceClassification::class, 'createFromDiscriminatorValue'])),
            'insights' => fn(ParseNode $n) => $o->setInsights($n->getObjectValue([ItemInsights::class, 'createFromDiscriminatorValue'])),
            'interests' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setInterests($val);
            },
            'isManagementRestricted' => fn(ParseNode $n) => $o->setIsManagementRestricted($n->getBooleanValue()),
            'isResourceAccount' => fn(ParseNode $n) => $o->setIsResourceAccount($n->getBooleanValue()),
            'jobTitle' => fn(ParseNode $n) => $o->setJobTitle($n->getStringValue()),
            'joinedTeams' => fn(ParseNode $n) => $o->setJoinedTeams($n->getCollectionOfObjectValues([Team::class, 'createFromDiscriminatorValue'])),
            'lastPasswordChangeDateTime' => fn(ParseNode $n) => $o->setLastPasswordChangeDateTime($n->getDateTimeValue()),
            'legalAgeGroupClassification' => fn(ParseNode $n) => $o->setLegalAgeGroupClassification($n->getStringValue()),
            'licenseAssignmentStates' => fn(ParseNode $n) => $o->setLicenseAssignmentStates($n->getCollectionOfObjectValues([LicenseAssignmentState::class, 'createFromDiscriminatorValue'])),
            'licenseDetails' => fn(ParseNode $n) => $o->setLicenseDetails($n->getCollectionOfObjectValues([LicenseDetails::class, 'createFromDiscriminatorValue'])),
            'mail' => fn(ParseNode $n) => $o->setMail($n->getStringValue()),
            'mailboxSettings' => fn(ParseNode $n) => $o->setMailboxSettings($n->getObjectValue([MailboxSettings::class, 'createFromDiscriminatorValue'])),
            'mailFolders' => fn(ParseNode $n) => $o->setMailFolders($n->getCollectionOfObjectValues([MailFolder::class, 'createFromDiscriminatorValue'])),
            'mailNickname' => fn(ParseNode $n) => $o->setMailNickname($n->getStringValue()),
            'managedAppRegistrations' => fn(ParseNode $n) => $o->setManagedAppRegistrations($n->getCollectionOfObjectValues([ManagedAppRegistration::class, 'createFromDiscriminatorValue'])),
            'managedDevices' => fn(ParseNode $n) => $o->setManagedDevices($n->getCollectionOfObjectValues([ManagedDevice::class, 'createFromDiscriminatorValue'])),
            'manager' => fn(ParseNode $n) => $o->setManager($n->getObjectValue([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'memberOf' => fn(ParseNode $n) => $o->setMemberOf($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'messages' => fn(ParseNode $n) => $o->setMessages($n->getCollectionOfObjectValues([Message::class, 'createFromDiscriminatorValue'])),
            'mobilePhone' => fn(ParseNode $n) => $o->setMobilePhone($n->getStringValue()),
            'mySite' => fn(ParseNode $n) => $o->setMySite($n->getStringValue()),
            'oauth2PermissionGrants' => fn(ParseNode $n) => $o->setOauth2PermissionGrants($n->getCollectionOfObjectValues([OAuth2PermissionGrant::class, 'createFromDiscriminatorValue'])),
            'officeLocation' => fn(ParseNode $n) => $o->setOfficeLocation($n->getStringValue()),
            'onenote' => fn(ParseNode $n) => $o->setOnenote($n->getObjectValue([Onenote::class, 'createFromDiscriminatorValue'])),
            'onlineMeetings' => fn(ParseNode $n) => $o->setOnlineMeetings($n->getCollectionOfObjectValues([OnlineMeeting::class, 'createFromDiscriminatorValue'])),
            'onPremisesDistinguishedName' => fn(ParseNode $n) => $o->setOnPremisesDistinguishedName($n->getStringValue()),
            'onPremisesDomainName' => fn(ParseNode $n) => $o->setOnPremisesDomainName($n->getStringValue()),
            'onPremisesExtensionAttributes' => fn(ParseNode $n) => $o->setOnPremisesExtensionAttributes($n->getObjectValue([OnPremisesExtensionAttributes::class, 'createFromDiscriminatorValue'])),
            'onPremisesImmutableId' => fn(ParseNode $n) => $o->setOnPremisesImmutableId($n->getStringValue()),
            'onPremisesLastSyncDateTime' => fn(ParseNode $n) => $o->setOnPremisesLastSyncDateTime($n->getDateTimeValue()),
            'onPremisesProvisioningErrors' => fn(ParseNode $n) => $o->setOnPremisesProvisioningErrors($n->getCollectionOfObjectValues([OnPremisesProvisioningError::class, 'createFromDiscriminatorValue'])),
            'onPremisesSamAccountName' => fn(ParseNode $n) => $o->setOnPremisesSamAccountName($n->getStringValue()),
            'onPremisesSecurityIdentifier' => fn(ParseNode $n) => $o->setOnPremisesSecurityIdentifier($n->getStringValue()),
            'onPremisesSyncBehavior' => fn(ParseNode $n) => $o->setOnPremisesSyncBehavior($n->getObjectValue([OnPremisesSyncBehavior::class, 'createFromDiscriminatorValue'])),
            'onPremisesSyncEnabled' => fn(ParseNode $n) => $o->setOnPremisesSyncEnabled($n->getBooleanValue()),
            'onPremisesUserPrincipalName' => fn(ParseNode $n) => $o->setOnPremisesUserPrincipalName($n->getStringValue()),
            'otherMails' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setOtherMails($val);
            },
            'outlook' => fn(ParseNode $n) => $o->setOutlook($n->getObjectValue([OutlookUser::class, 'createFromDiscriminatorValue'])),
            'ownedDevices' => fn(ParseNode $n) => $o->setOwnedDevices($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'ownedObjects' => fn(ParseNode $n) => $o->setOwnedObjects($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'passwordPolicies' => fn(ParseNode $n) => $o->setPasswordPolicies($n->getStringValue()),
            'passwordProfile' => fn(ParseNode $n) => $o->setPasswordProfile($n->getObjectValue([PasswordProfile::class, 'createFromDiscriminatorValue'])),
            'pastProjects' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setPastProjects($val);
            },
            'people' => fn(ParseNode $n) => $o->setPeople($n->getCollectionOfObjectValues([Person::class, 'createFromDiscriminatorValue'])),
            'permissionGrants' => fn(ParseNode $n) => $o->setPermissionGrants($n->getCollectionOfObjectValues([ResourceSpecificPermissionGrant::class, 'createFromDiscriminatorValue'])),
            'photo' => fn(ParseNode $n) => $o->setPhoto($n->getObjectValue([ProfilePhoto::class, 'createFromDiscriminatorValue'])),
            'photos' => fn(ParseNode $n) => $o->setPhotos($n->getCollectionOfObjectValues([ProfilePhoto::class, 'createFromDiscriminatorValue'])),
            'planner' => fn(ParseNode $n) => $o->setPlanner($n->getObjectValue([PlannerUser::class, 'createFromDiscriminatorValue'])),
            'postalCode' => fn(ParseNode $n) => $o->setPostalCode($n->getStringValue()),
            'preferredDataLocation' => fn(ParseNode $n) => $o->setPreferredDataLocation($n->getStringValue()),
            'preferredLanguage' => fn(ParseNode $n) => $o->setPreferredLanguage($n->getStringValue()),
            'preferredName' => fn(ParseNode $n) => $o->setPreferredName($n->getStringValue()),
            'presence' => fn(ParseNode $n) => $o->setPresence($n->getObjectValue([Presence::class, 'createFromDiscriminatorValue'])),
            'provisionedPlans' => fn(ParseNode $n) => $o->setProvisionedPlans($n->getCollectionOfObjectValues([ProvisionedPlan::class, 'createFromDiscriminatorValue'])),
            'proxyAddresses' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setProxyAddresses($val);
            },
            'registeredDevices' => fn(ParseNode $n) => $o->setRegisteredDevices($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'responsibilities' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setResponsibilities($val);
            },
            'schools' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSchools($val);
            },
            'scopedRoleMemberOf' => fn(ParseNode $n) => $o->setScopedRoleMemberOf($n->getCollectionOfObjectValues([ScopedRoleMembership::class, 'createFromDiscriminatorValue'])),
            'securityIdentifier' => fn(ParseNode $n) => $o->setSecurityIdentifier($n->getStringValue()),
            'serviceProvisioningErrors' => fn(ParseNode $n) => $o->setServiceProvisioningErrors($n->getCollectionOfObjectValues([ServiceProvisioningError::class, 'createFromDiscriminatorValue'])),
            'settings' => fn(ParseNode $n) => $o->setSettings($n->getObjectValue([UserSettings::class, 'createFromDiscriminatorValue'])),
            'showInAddressList' => fn(ParseNode $n) => $o->setShowInAddressList($n->getBooleanValue()),
            'signInActivity' => fn(ParseNode $n) => $o->setSignInActivity($n->getObjectValue([SignInActivity::class, 'createFromDiscriminatorValue'])),
            'signInSessionsValidFromDateTime' => fn(ParseNode $n) => $o->setSignInSessionsValidFromDateTime($n->getDateTimeValue()),
            'skills' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSkills($val);
            },
            'solutions' => fn(ParseNode $n) => $o->setSolutions($n->getObjectValue([UserSolutionRoot::class, 'createFromDiscriminatorValue'])),
            'sponsorOf' => fn(ParseNode $n) => $o->setSponsorOf($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'sponsors' => fn(ParseNode $n) => $o->setSponsors($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'state' => fn(ParseNode $n) => $o->setState($n->getStringValue()),
            'streetAddress' => fn(ParseNode $n) => $o->setStreetAddress($n->getStringValue()),
            'surname' => fn(ParseNode $n) => $o->setSurname($n->getStringValue()),
            'teamwork' => fn(ParseNode $n) => $o->setTeamwork($n->getObjectValue([UserTeamwork::class, 'createFromDiscriminatorValue'])),
            'todo' => fn(ParseNode $n) => $o->setTodo($n->getObjectValue([Todo::class, 'createFromDiscriminatorValue'])),
            'transitiveMemberOf' => fn(ParseNode $n) => $o->setTransitiveMemberOf($n->getCollectionOfObjectValues([DirectoryObject::class, 'createFromDiscriminatorValue'])),
            'usageLocation' => fn(ParseNode $n) => $o->setUsageLocation($n->getStringValue()),
            'userPrincipalName' => fn(ParseNode $n) => $o->setUserPrincipalName($n->getStringValue()),
            'userType' => fn(ParseNode $n) => $o->setUserType($n->getStringValue()),
        ]);
    }

    /**
     * Gets the followedSites property value. The followedSites property
     * @return array<Site>|null
    */
    public function getFollowedSites(): ?array {
        return $this->followedSites;
    }

    /**
     * Gets the givenName property value. The given name (first name) of the user. Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getGivenName(): ?string {
        return $this->givenName;
    }

    /**
     * Gets the hireDate property value. The hire date of the user. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z. Requires $select to retrieve.  Note: This property is specific to SharePoint in Microsoft 365. We recommend using the native employeeHireDate property to set and update hire date values using Microsoft Graph APIs.
     * @return DateTime|null
    */
    public function getHireDate(): ?DateTime {
        return $this->hireDate;
    }

    /**
     * Gets the identities property value. Represents the identities that can be used to sign in to this user account. Microsoft (also known as a local account), organizations, or social identity providers such as Facebook, Google, and Microsoft can provide identity and tie it to a user account. It might contain multiple items with the same signInType value. Requires $select to retrieve.  Supports $filter (eq) with limitations.
     * @return array<ObjectIdentity>|null
    */
    public function getIdentities(): ?array {
        return $this->identities;
    }

    /**
     * Gets the identityParentId property value. The identityParentId property
     * @return string|null
    */
    public function getIdentityParentId(): ?string {
        return $this->identityParentId;
    }

    /**
     * Gets the imAddresses property value. The instant message voice-over IP (VOIP) session initiation protocol (SIP) addresses for the user. Read-only. Requires $select to retrieve. Supports $filter (eq, not, ge, le, startsWith).
     * @return array<string>|null
    */
    public function getImAddresses(): ?array {
        return $this->imAddresses;
    }

    /**
     * Gets the inferenceClassification property value. Relevance classification of the user's messages based on explicit designations that override inferred relevance or importance.
     * @return InferenceClassification|null
    */
    public function getInferenceClassification(): ?InferenceClassification {
        return $this->inferenceClassification;
    }

    /**
     * Gets the insights property value. Represents relationships between a user and items such as OneDrive for work or school documents, calculated using advanced analytics and machine learning techniques. Read-only. Nullable.
     * @return ItemInsights|null
    */
    public function getInsights(): ?ItemInsights {
        return $this->insights;
    }

    /**
     * Gets the interests property value. A list for the user to describe their interests. Requires $select to retrieve.
     * @return array<string>|null
    */
    public function getInterests(): ?array {
        return $this->interests;
    }

    /**
     * Gets the isManagementRestricted property value. true if the user is a member of a restricted management administrative unit. If not set, the default value is null and the default behavior is false. Read-only.  To manage a user who is a member of a restricted management administrative unit, the administrator or calling app must be assigned a Microsoft Entra role at the scope of the restricted management administrative unit. Requires $select to retrieve.
     * @return bool|null
    */
    public function getIsManagementRestricted(): ?bool {
        return $this->isManagementRestricted;
    }

    /**
     * Gets the isResourceAccount property value. Don't use – reserved for future use.
     * @return bool|null
    */
    public function getIsResourceAccount(): ?bool {
        return $this->isResourceAccount;
    }

    /**
     * Gets the jobTitle property value. The user's job title. Maximum length is 128 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getJobTitle(): ?string {
        return $this->jobTitle;
    }

    /**
     * Gets the joinedTeams property value. The joinedTeams property
     * @return array<Team>|null
    */
    public function getJoinedTeams(): ?array {
        return $this->joinedTeams;
    }

    /**
     * Gets the lastPasswordChangeDateTime property value. The time when this Microsoft Entra user last changed their password or when their password was created, whichever date the latest action was performed. The date and time information uses ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Requires $select to retrieve.
     * @return DateTime|null
    */
    public function getLastPasswordChangeDateTime(): ?DateTime {
        return $this->lastPasswordChangeDateTime;
    }

    /**
     * Gets the legalAgeGroupClassification property value. Used by enterprise applications to determine the legal age group of the user. This property is read-only and calculated based on ageGroup and consentProvidedForMinor properties. Allowed values: null, Undefined,  MinorWithOutParentalConsent, MinorWithParentalConsent, MinorNoParentalConsentRequired, NotAdult, and Adult. For more information, see legal age group property definitions. Requires $select to retrieve.
     * @return string|null
    */
    public function getLegalAgeGroupClassification(): ?string {
        return $this->legalAgeGroupClassification;
    }

    /**
     * Gets the licenseAssignmentStates property value. State of license assignments for this user. Also indicates licenses that are directly assigned or the user inherited through group memberships. Read-only. Requires $select to retrieve.
     * @return array<LicenseAssignmentState>|null
    */
    public function getLicenseAssignmentStates(): ?array {
        return $this->licenseAssignmentStates;
    }

    /**
     * Gets the licenseDetails property value. A collection of this user's license details. Read-only.
     * @return array<LicenseDetails>|null
    */
    public function getLicenseDetails(): ?array {
        return $this->licenseDetails;
    }

    /**
     * Gets the mail property value. The SMTP address for the user, for example, jeff@contoso.com. Changes to this property update the user's proxyAddresses collection to include the value as an SMTP address. This property can't contain accent characters.  NOTE: We don't recommend updating this property for Azure AD B2C user profiles. Use the otherMails property instead. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, endsWith, and eq on null values).
     * @return string|null
    */
    public function getMail(): ?string {
        return $this->mail;
    }

    /**
     * Gets the mailboxSettings property value. Settings for the primary mailbox of the signed-in user. You can get or update settings for sending automatic replies to incoming messages, locale, and time zone. Requires $select to retrieve.
     * @return MailboxSettings|null
    */
    public function getMailboxSettings(): ?MailboxSettings {
        return $this->mailboxSettings;
    }

    /**
     * Gets the mailFolders property value. The user's mail folders. Read-only. Nullable.
     * @return array<MailFolder>|null
    */
    public function getMailFolders(): ?array {
        return $this->mailFolders;
    }

    /**
     * Gets the mailNickname property value. The mail alias for the user. This property must be specified when a user is created. Maximum length is 64 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getMailNickname(): ?string {
        return $this->mailNickname;
    }

    /**
     * Gets the managedAppRegistrations property value. Zero or more managed app registrations that belong to the user.
     * @return array<ManagedAppRegistration>|null
    */
    public function getManagedAppRegistrations(): ?array {
        return $this->managedAppRegistrations;
    }

    /**
     * Gets the managedDevices property value. The managed devices associated with the user.
     * @return array<ManagedDevice>|null
    */
    public function getManagedDevices(): ?array {
        return $this->managedDevices;
    }

    /**
     * Gets the manager property value. The user or contact that is this user's manager. Read-only. Supports $expand.
     * @return DirectoryObject|null
    */
    public function getManager(): ?DirectoryObject {
        return $this->manager;
    }

    /**
     * Gets the memberOf property value. The groups and directory roles that the user is a member of. Read-only. Nullable. Supports $expand.
     * @return array<DirectoryObject>|null
    */
    public function getMemberOf(): ?array {
        return $this->memberOf;
    }

    /**
     * Gets the messages property value. The messages in a mailbox or folder. Read-only. Nullable.
     * @return array<Message>|null
    */
    public function getMessages(): ?array {
        return $this->messages;
    }

    /**
     * Gets the mobilePhone property value. The primary cellular telephone number for the user. Read-only for users synced from the on-premises directory. Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values) and $search. This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @return string|null
    */
    public function getMobilePhone(): ?string {
        return $this->mobilePhone;
    }

    /**
     * Gets the mySite property value. The URL for the user's site. Requires $select to retrieve.
     * @return string|null
    */
    public function getMySite(): ?string {
        return $this->mySite;
    }

    /**
     * Gets the oauth2PermissionGrants property value. The oauth2PermissionGrants property
     * @return array<OAuth2PermissionGrant>|null
    */
    public function getOauth2PermissionGrants(): ?array {
        return $this->oauth2PermissionGrants;
    }

    /**
     * Gets the officeLocation property value. The office location in the user's place of business. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getOfficeLocation(): ?string {
        return $this->officeLocation;
    }

    /**
     * Gets the onenote property value. The onenote property
     * @return Onenote|null
    */
    public function getOnenote(): ?Onenote {
        return $this->onenote;
    }

    /**
     * Gets the onlineMeetings property value. Information about a meeting, including the URL used to join a meeting, the attendees list, and the description.
     * @return array<OnlineMeeting>|null
    */
    public function getOnlineMeetings(): ?array {
        return $this->onlineMeetings;
    }

    /**
     * Gets the onPremisesDistinguishedName property value. Contains the on-premises Active Directory distinguished name or DN. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve.
     * @return string|null
    */
    public function getOnPremisesDistinguishedName(): ?string {
        return $this->onPremisesDistinguishedName;
    }

    /**
     * Gets the onPremisesDomainName property value. Contains the on-premises domainFQDN, also called dnsDomainName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve.
     * @return string|null
    */
    public function getOnPremisesDomainName(): ?string {
        return $this->onPremisesDomainName;
    }

    /**
     * Gets the onPremisesExtensionAttributes property value. Contains extensionAttributes1-15 for the user. These extension attributes are also known as Exchange custom attributes 1-15. Each attribute can store up to 1024 characters. For an onPremisesSyncEnabled user, the source of authority for this set of properties is the on-premises and is read-only. For a cloud-only user (where onPremisesSyncEnabled is false), these properties can be set during the creation or update of a user object.  For a cloud-only user previously synced from on-premises Active Directory, these properties are read-only in Microsoft Graph but can be fully managed through the Exchange Admin Center or the Exchange Online V2 module in PowerShell. Requires $select to retrieve. Supports $filter (eq, ne, not, in).
     * @return OnPremisesExtensionAttributes|null
    */
    public function getOnPremisesExtensionAttributes(): ?OnPremisesExtensionAttributes {
        return $this->onPremisesExtensionAttributes;
    }

    /**
     * Gets the onPremisesImmutableId property value. This property is used to associate an on-premises Active Directory user account to their Microsoft Entra user object. This property must be specified when creating a new user account in the Graph if you're using a federated domain for the user's userPrincipalName (UPN) property. NOTE: The $ and _ characters can't be used when specifying this property. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @return string|null
    */
    public function getOnPremisesImmutableId(): ?string {
        return $this->onPremisesImmutableId;
    }

    /**
     * Gets the onPremisesLastSyncDateTime property value. Indicates the last time at which the object was synced with the on-premises directory; for example: 2013-02-16T03:04:54Z. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in).
     * @return DateTime|null
    */
    public function getOnPremisesLastSyncDateTime(): ?DateTime {
        return $this->onPremisesLastSyncDateTime;
    }

    /**
     * Gets the onPremisesProvisioningErrors property value. Errors when using Microsoft synchronization product during provisioning. Requires $select to retrieve. Supports $filter (eq, not, ge, le).
     * @return array<OnPremisesProvisioningError>|null
    */
    public function getOnPremisesProvisioningErrors(): ?array {
        return $this->onPremisesProvisioningErrors;
    }

    /**
     * Gets the onPremisesSamAccountName property value. Contains the on-premises samAccountName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith).
     * @return string|null
    */
    public function getOnPremisesSamAccountName(): ?string {
        return $this->onPremisesSamAccountName;
    }

    /**
     * Gets the onPremisesSecurityIdentifier property value. Contains the on-premises security identifier (SID) for the user that was synchronized from on-premises to the cloud. Read-only. Requires $select to retrieve. Supports $filter (eq including on null values).
     * @return string|null
    */
    public function getOnPremisesSecurityIdentifier(): ?string {
        return $this->onPremisesSecurityIdentifier;
    }

    /**
     * Gets the onPremisesSyncBehavior property value. The onPremisesSyncBehavior property
     * @return OnPremisesSyncBehavior|null
    */
    public function getOnPremisesSyncBehavior(): ?OnPremisesSyncBehavior {
        return $this->onPremisesSyncBehavior;
    }

    /**
     * Gets the onPremisesSyncEnabled property value. true if this user object is currently being synced from an on-premises Active Directory (AD); otherwise the user isn't being synced and can be managed in Microsoft Entra ID. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values).
     * @return bool|null
    */
    public function getOnPremisesSyncEnabled(): ?bool {
        return $this->onPremisesSyncEnabled;
    }

    /**
     * Gets the onPremisesUserPrincipalName property value. Contains the on-premises userPrincipalName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith).
     * @return string|null
    */
    public function getOnPremisesUserPrincipalName(): ?string {
        return $this->onPremisesUserPrincipalName;
    }

    /**
     * Gets the otherMails property value. A list of other email addresses for the user; for example: ['bob@contoso.com', 'Robert@fabrikam.com']. Can store up to 250 values, each with a limit of 250 characters. NOTE: This property can't contain accent characters. Requires $select to retrieve. Supports $filter (eq, not, ge, le, in, startsWith, endsWith, /$count eq 0, /$count ne 0). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @return array<string>|null
    */
    public function getOtherMails(): ?array {
        return $this->otherMails;
    }

    /**
     * Gets the outlook property value. The outlook property
     * @return OutlookUser|null
    */
    public function getOutlook(): ?OutlookUser {
        return $this->outlook;
    }

    /**
     * Gets the ownedDevices property value. Devices the user owns. Read-only. Nullable. Supports $expand and $filter (/$count eq 0, /$count ne 0, /$count eq 1, /$count ne 1).
     * @return array<DirectoryObject>|null
    */
    public function getOwnedDevices(): ?array {
        return $this->ownedDevices;
    }

    /**
     * Gets the ownedObjects property value. Directory objects the user owns. Read-only. Nullable. Supports $expand, $select nested in $expand, and $filter (/$count eq 0, /$count ne 0, /$count eq 1, /$count ne 1).
     * @return array<DirectoryObject>|null
    */
    public function getOwnedObjects(): ?array {
        return $this->ownedObjects;
    }

    /**
     * Gets the passwordPolicies property value. Specifies password policies for the user. This value is an enumeration with one possible value being DisableStrongPassword, which allows weaker passwords than the default policy to be specified. DisablePasswordExpiration can also be specified. The two might be specified together; for example: DisablePasswordExpiration, DisableStrongPassword. Requires $select to retrieve. For more information on the default password policies, see Microsoft Entra password policies. Supports $filter (ne, not, and eq on null values).
     * @return string|null
    */
    public function getPasswordPolicies(): ?string {
        return $this->passwordPolicies;
    }

    /**
     * Gets the passwordProfile property value. Specifies the password profile for the user. The profile contains the user's password. This property is required when a user is created. The password in the profile must satisfy minimum requirements as specified by the passwordPolicies property. By default, a strong password is required. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values). To update this property:  User-PasswordProfile.ReadWrite.All is the least privileged permission to update this property.  In delegated scenarios, the User Administrator Microsoft Entra role is the least privileged admin role supported to update this property for nonadmin users. Privileged Authentication Administrator is the least privileged role that's allowed to update this property for all administrators in the tenant. In general, the signed-in user must have a higher privileged administrator role as indicated in Who can reset passwords.  In app-only scenarios, the calling app must be assigned a supported permission and at least the User Administrator Microsoft Entra role. This property is also subject to sensitive action restrictions.
     * @return PasswordProfile|null
    */
    public function getPasswordProfile(): ?PasswordProfile {
        return $this->passwordProfile;
    }

    /**
     * Gets the pastProjects property value. A list for the user to enumerate their past projects. Requires $select to retrieve.
     * @return array<string>|null
    */
    public function getPastProjects(): ?array {
        return $this->pastProjects;
    }

    /**
     * Gets the people property value. People that are relevant to the user. Read-only. Nullable.
     * @return array<Person>|null
    */
    public function getPeople(): ?array {
        return $this->people;
    }

    /**
     * Gets the permissionGrants property value. List all resource-specific permission grants of a user.
     * @return array<ResourceSpecificPermissionGrant>|null
    */
    public function getPermissionGrants(): ?array {
        return $this->permissionGrants;
    }

    /**
     * Gets the photo property value. The user's profile photo. Read-only.
     * @return ProfilePhoto|null
    */
    public function getPhoto(): ?ProfilePhoto {
        return $this->photo;
    }

    /**
     * Gets the photos property value. The collection of the user's profile photos in different sizes. Read-only.
     * @return array<ProfilePhoto>|null
    */
    public function getPhotos(): ?array {
        return $this->photos;
    }

    /**
     * Gets the planner property value. Entry-point to the Planner resource that might exist for a user. Read-only.
     * @return PlannerUser|null
    */
    public function getPlanner(): ?PlannerUser {
        return $this->planner;
    }

    /**
     * Gets the postalCode property value. The postal code for the user's postal address. The postal code is specific to the user's country or region. In the United States of America, this attribute contains the ZIP code. Maximum length is 40 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getPostalCode(): ?string {
        return $this->postalCode;
    }

    /**
     * Gets the preferredDataLocation property value. The preferred data location for the user. For more information, see OneDrive Online Multi-Geo.
     * @return string|null
    */
    public function getPreferredDataLocation(): ?string {
        return $this->preferredDataLocation;
    }

    /**
     * Gets the preferredLanguage property value. The preferred language for the user. The preferred language format is based on RFC 4646. The name is a combination of an ISO 639 two-letter lowercase culture code associated with the language, and an ISO 3166 two-letter uppercase subculture code associated with the country or region. Example: 'en-US', or 'es-ES'. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values)
     * @return string|null
    */
    public function getPreferredLanguage(): ?string {
        return $this->preferredLanguage;
    }

    /**
     * Gets the preferredName property value. The preferred name for the user. Not Supported. This attribute returns an empty string.Requires $select to retrieve.
     * @return string|null
    */
    public function getPreferredName(): ?string {
        return $this->preferredName;
    }

    /**
     * Gets the presence property value. The presence property
     * @return Presence|null
    */
    public function getPresence(): ?Presence {
        return $this->presence;
    }

    /**
     * Gets the provisionedPlans property value. The plans that are provisioned for the user. Read-only. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, ge, le).
     * @return array<ProvisionedPlan>|null
    */
    public function getProvisionedPlans(): ?array {
        return $this->provisionedPlans;
    }

    /**
     * Gets the proxyAddresses property value. For example: ['SMTP: bob@contoso.com', 'smtp: bob@sales.contoso.com']. Changes to the mail property update this collection to include the value as an SMTP address. For more information, see mail and proxyAddresses properties. The proxy address prefixed with SMTP (capitalized) is the primary proxy address, while those addresses prefixed with smtp are the secondary proxy addresses. For Azure AD B2C accounts, this property has a limit of 10 unique addresses. Read-only in Microsoft Graph; you can update this property only through the Microsoft 365 admin center. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, ge, le, startsWith, endsWith, /$count eq 0, /$count ne 0).
     * @return array<string>|null
    */
    public function getProxyAddresses(): ?array {
        return $this->proxyAddresses;
    }

    /**
     * Gets the registeredDevices property value. Devices that are registered for the user. Read-only. Nullable. Supports $expand and returns up to 100 objects.
     * @return array<DirectoryObject>|null
    */
    public function getRegisteredDevices(): ?array {
        return $this->registeredDevices;
    }

    /**
     * Gets the responsibilities property value. A list for the user to enumerate their responsibilities. Requires $select to retrieve.
     * @return array<string>|null
    */
    public function getResponsibilities(): ?array {
        return $this->responsibilities;
    }

    /**
     * Gets the schools property value. A list for the user to enumerate the schools they attended. Requires $select to retrieve.
     * @return array<string>|null
    */
    public function getSchools(): ?array {
        return $this->schools;
    }

    /**
     * Gets the scopedRoleMemberOf property value. The scopedRoleMemberOf property
     * @return array<ScopedRoleMembership>|null
    */
    public function getScopedRoleMemberOf(): ?array {
        return $this->scopedRoleMemberOf;
    }

    /**
     * Gets the securityIdentifier property value. Security identifier (SID) of the user, used in Windows scenarios. Read-only. Returned by default. Supports $select and $filter (eq, not, ge, le, startsWith).
     * @return string|null
    */
    public function getSecurityIdentifier(): ?string {
        return $this->securityIdentifier;
    }

    /**
     * Gets the serviceProvisioningErrors property value. Errors published by a federated service describing a nontransient, service-specific error regarding the properties or link from a user object.  Supports $filter (eq, not, for isResolved and serviceInstance).
     * @return array<ServiceProvisioningError>|null
    */
    public function getServiceProvisioningErrors(): ?array {
        return $this->serviceProvisioningErrors;
    }

    /**
     * Gets the settings property value. The settings property
     * @return UserSettings|null
    */
    public function getSettings(): ?UserSettings {
        return $this->settings;
    }

    /**
     * Gets the showInAddressList property value. Do not use in Microsoft Graph. Manage this property through the Microsoft 365 admin center instead. Represents whether the user should be included in the Outlook global address list. See Known issue.
     * @return bool|null
    */
    public function getShowInAddressList(): ?bool {
        return $this->showInAddressList;
    }

    /**
     * Gets the signInActivity property value. Get the last signed-in date and request ID of the sign-in for a given user. Read-only.Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le) but not with any other filterable properties. Note: Details for this property require a Microsoft Entra ID P1 or P2 license and the AuditLog.Read.All permission.This property isn't returned for a user who never signed in or last signed in before April 2020.
     * @return SignInActivity|null
    */
    public function getSignInActivity(): ?SignInActivity {
        return $this->signInActivity;
    }

    /**
     * Gets the signInSessionsValidFromDateTime property value. Any refresh tokens or session tokens (session cookies) issued before this time are invalid. Applications get an error when using an invalid refresh or session token to acquire a delegated access token (to access APIs such as Microsoft Graph). If this happens, the application needs to acquire a new refresh token by requesting the authorized endpoint. Read-only. Use revokeSignInSessions to reset. Requires $select to retrieve.
     * @return DateTime|null
    */
    public function getSignInSessionsValidFromDateTime(): ?DateTime {
        return $this->signInSessionsValidFromDateTime;
    }

    /**
     * Gets the skills property value. A list for the user to enumerate their skills. Requires $select to retrieve.
     * @return array<string>|null
    */
    public function getSkills(): ?array {
        return $this->skills;
    }

    /**
     * Gets the solutions property value. The identifier that relates the user to the working time schedule triggers. Read-Only. Nullable
     * @return UserSolutionRoot|null
    */
    public function getSolutions(): ?UserSolutionRoot {
        return $this->solutions;
    }

    /**
     * Gets the sponsorOf property value. Directory objects that this user sponsors, such as guest users, agent users, agent blueprints, agent blueprint principals, and agent identities. If the user is a member of a group that's a sponsor, the objects sponsored by that group are also included. Read-only. Nullable. Supports $filter, $count, $select, $expand, $top, and $skip.
     * @return array<DirectoryObject>|null
    */
    public function getSponsorOf(): ?array {
        return $this->sponsorOf;
    }

    /**
     * Gets the sponsors property value. The users and groups responsible for this guest's privileges in the tenant and keeping the guest's information and access updated. (HTTP Methods: GET, POST, DELETE.). Supports $expand.
     * @return array<DirectoryObject>|null
    */
    public function getSponsors(): ?array {
        return $this->sponsors;
    }

    /**
     * Gets the state property value. The state or province in the user's address. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getState(): ?string {
        return $this->state;
    }

    /**
     * Gets the streetAddress property value. The street address of the user's place of business. Maximum length is 1,024 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getStreetAddress(): ?string {
        return $this->streetAddress;
    }

    /**
     * Gets the surname property value. The user's surname (family name or last name). Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getSurname(): ?string {
        return $this->surname;
    }

    /**
     * Gets the teamwork property value. A container for Microsoft Teams features available for the user. Read-only. Nullable.
     * @return UserTeamwork|null
    */
    public function getTeamwork(): ?UserTeamwork {
        return $this->teamwork;
    }

    /**
     * Gets the todo property value. Represents the To Do services available to a user.
     * @return Todo|null
    */
    public function getTodo(): ?Todo {
        return $this->todo;
    }

    /**
     * Gets the transitiveMemberOf property value. The groups, including nested groups, and directory roles that a user is a member of. Nullable.
     * @return array<DirectoryObject>|null
    */
    public function getTransitiveMemberOf(): ?array {
        return $this->transitiveMemberOf;
    }

    /**
     * Gets the usageLocation property value. A two-letter country code (ISO standard 3166). Required for users that are assigned licenses due to legal requirements to check for availability of services in countries/regions. Examples include: US, JP, and GB. Not nullable. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @return string|null
    */
    public function getUsageLocation(): ?string {
        return $this->usageLocation;
    }

    /**
     * Gets the userPrincipalName property value. The user principal name (UPN) of the user. The UPN is an Internet-style sign-in name for the user based on the Internet standard RFC 822. By convention, this value should map to the user's email name. The general format is alias@domain, where the domain must be present in the tenant's collection of verified domains. This property is required when a user is created. The verified domains for the tenant can be accessed from the verifiedDomains property of organization.NOTE: This property can't contain accent characters. Only the following characters are allowed A - Z, a - z, 0 - 9, ' . - _ ! # ^ ~. For the complete list of allowed characters, see username policies. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, endsWith) and $orderby. This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @return string|null
    */
    public function getUserPrincipalName(): ?string {
        return $this->userPrincipalName;
    }

    /**
     * Gets the userType property value. A string value that can be used to classify user types in your directory. The possible values are Member and Guest. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values). NOTE: For more information about the permissions for members and guests, see What are the default user permissions in Microsoft Entra ID?
     * @return string|null
    */
    public function getUserType(): ?string {
        return $this->userType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('aboutMe', $this->getAboutMe());
        $writer->writeBooleanValue('accountEnabled', $this->getAccountEnabled());
        $writer->writeCollectionOfObjectValues('activities', $this->getActivities());
        $writer->writeCollectionOfObjectValues('adhocCalls', $this->getAdhocCalls());
        $writer->writeStringValue('ageGroup', $this->getAgeGroup());
        $writer->writeCollectionOfObjectValues('agreementAcceptances', $this->getAgreementAcceptances());
        $writer->writeCollectionOfObjectValues('appRoleAssignments', $this->getAppRoleAssignments());
        $writer->writeCollectionOfObjectValues('assignedLicenses', $this->getAssignedLicenses());
        $writer->writeCollectionOfObjectValues('assignedPlans', $this->getAssignedPlans());
        $writer->writeObjectValue('authentication', $this->getAuthentication());
        $writer->writeObjectValue('authorizationInfo', $this->getAuthorizationInfo());
        $writer->writeDateTimeValue('birthday', $this->getBirthday());
        $writer->writeCollectionOfPrimitiveValues('businessPhones', $this->getBusinessPhones());
        $writer->writeObjectValue('calendar', $this->getCalendar());
        $writer->writeCollectionOfObjectValues('calendarGroups', $this->getCalendarGroups());
        $writer->writeCollectionOfObjectValues('calendars', $this->getCalendars());
        $writer->writeCollectionOfObjectValues('calendarView', $this->getCalendarView());
        $writer->writeCollectionOfObjectValues('chats', $this->getChats());
        $writer->writeStringValue('city', $this->getCity());
        $writer->writeObjectValue('cloudClipboard', $this->getCloudClipboard());
        $writer->writeCollectionOfObjectValues('cloudPCs', $this->getCloudPCs());
        $writer->writeStringValue('companyName', $this->getCompanyName());
        $writer->writeStringValue('consentProvidedForMinor', $this->getConsentProvidedForMinor());
        $writer->writeCollectionOfObjectValues('contactFolders', $this->getContactFolders());
        $writer->writeCollectionOfObjectValues('contacts', $this->getContacts());
        $writer->writeStringValue('country', $this->getCountry());
        $writer->writeDateTimeValue('createdDateTime', $this->getCreatedDateTime());
        $writer->writeCollectionOfObjectValues('createdObjects', $this->getCreatedObjects());
        $writer->writeStringValue('creationType', $this->getCreationType());
        $writer->writeObjectValue('customSecurityAttributes', $this->getCustomSecurityAttributes());
        $writer->writeObjectValue('dataSecurityAndGovernance', $this->getDataSecurityAndGovernance());
        $writer->writeStringValue('department', $this->getDepartment());
        $writer->writeIntegerValue('deviceEnrollmentLimit', $this->getDeviceEnrollmentLimit());
        $writer->writeCollectionOfObjectValues('deviceManagementTroubleshootingEvents', $this->getDeviceManagementTroubleshootingEvents());
        $writer->writeCollectionOfObjectValues('directReports', $this->getDirectReports());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeObjectValue('drive', $this->getDrive());
        $writer->writeCollectionOfObjectValues('drives', $this->getDrives());
        $writer->writeObjectValue('employeeExperience', $this->getEmployeeExperience());
        $writer->writeDateTimeValue('employeeHireDate', $this->getEmployeeHireDate());
        $writer->writeStringValue('employeeId', $this->getEmployeeId());
        $writer->writeDateTimeValue('employeeLeaveDateTime', $this->getEmployeeLeaveDateTime());
        $writer->writeObjectValue('employeeOrgData', $this->getEmployeeOrgData());
        $writer->writeStringValue('employeeType', $this->getEmployeeType());
        $writer->writeObjectValue('print', $this->getEscapedPrint());
        $writer->writeCollectionOfObjectValues('events', $this->getEvents());
        $writer->writeCollectionOfObjectValues('extensions', $this->getExtensions());
        $writer->writeStringValue('externalUserState', $this->getExternalUserState());
        $writer->writeDateTimeValue('externalUserStateChangeDateTime', $this->getExternalUserStateChangeDateTime());
        $writer->writeStringValue('faxNumber', $this->getFaxNumber());
        $writer->writeCollectionOfObjectValues('followedSites', $this->getFollowedSites());
        $writer->writeStringValue('givenName', $this->getGivenName());
        $writer->writeDateTimeValue('hireDate', $this->getHireDate());
        $writer->writeCollectionOfObjectValues('identities', $this->getIdentities());
        $writer->writeStringValue('identityParentId', $this->getIdentityParentId());
        $writer->writeCollectionOfPrimitiveValues('imAddresses', $this->getImAddresses());
        $writer->writeObjectValue('inferenceClassification', $this->getInferenceClassification());
        $writer->writeObjectValue('insights', $this->getInsights());
        $writer->writeCollectionOfPrimitiveValues('interests', $this->getInterests());
        $writer->writeBooleanValue('isManagementRestricted', $this->getIsManagementRestricted());
        $writer->writeBooleanValue('isResourceAccount', $this->getIsResourceAccount());
        $writer->writeStringValue('jobTitle', $this->getJobTitle());
        $writer->writeCollectionOfObjectValues('joinedTeams', $this->getJoinedTeams());
        $writer->writeDateTimeValue('lastPasswordChangeDateTime', $this->getLastPasswordChangeDateTime());
        $writer->writeStringValue('legalAgeGroupClassification', $this->getLegalAgeGroupClassification());
        $writer->writeCollectionOfObjectValues('licenseAssignmentStates', $this->getLicenseAssignmentStates());
        $writer->writeCollectionOfObjectValues('licenseDetails', $this->getLicenseDetails());
        $writer->writeStringValue('mail', $this->getMail());
        $writer->writeObjectValue('mailboxSettings', $this->getMailboxSettings());
        $writer->writeCollectionOfObjectValues('mailFolders', $this->getMailFolders());
        $writer->writeStringValue('mailNickname', $this->getMailNickname());
        $writer->writeCollectionOfObjectValues('managedAppRegistrations', $this->getManagedAppRegistrations());
        $writer->writeCollectionOfObjectValues('managedDevices', $this->getManagedDevices());
        $writer->writeObjectValue('manager', $this->getManager());
        $writer->writeCollectionOfObjectValues('memberOf', $this->getMemberOf());
        $writer->writeCollectionOfObjectValues('messages', $this->getMessages());
        $writer->writeStringValue('mobilePhone', $this->getMobilePhone());
        $writer->writeStringValue('mySite', $this->getMySite());
        $writer->writeCollectionOfObjectValues('oauth2PermissionGrants', $this->getOauth2PermissionGrants());
        $writer->writeStringValue('officeLocation', $this->getOfficeLocation());
        $writer->writeObjectValue('onenote', $this->getOnenote());
        $writer->writeCollectionOfObjectValues('onlineMeetings', $this->getOnlineMeetings());
        $writer->writeStringValue('onPremisesDistinguishedName', $this->getOnPremisesDistinguishedName());
        $writer->writeStringValue('onPremisesDomainName', $this->getOnPremisesDomainName());
        $writer->writeObjectValue('onPremisesExtensionAttributes', $this->getOnPremisesExtensionAttributes());
        $writer->writeStringValue('onPremisesImmutableId', $this->getOnPremisesImmutableId());
        $writer->writeDateTimeValue('onPremisesLastSyncDateTime', $this->getOnPremisesLastSyncDateTime());
        $writer->writeCollectionOfObjectValues('onPremisesProvisioningErrors', $this->getOnPremisesProvisioningErrors());
        $writer->writeStringValue('onPremisesSamAccountName', $this->getOnPremisesSamAccountName());
        $writer->writeStringValue('onPremisesSecurityIdentifier', $this->getOnPremisesSecurityIdentifier());
        $writer->writeObjectValue('onPremisesSyncBehavior', $this->getOnPremisesSyncBehavior());
        $writer->writeBooleanValue('onPremisesSyncEnabled', $this->getOnPremisesSyncEnabled());
        $writer->writeStringValue('onPremisesUserPrincipalName', $this->getOnPremisesUserPrincipalName());
        $writer->writeCollectionOfPrimitiveValues('otherMails', $this->getOtherMails());
        $writer->writeObjectValue('outlook', $this->getOutlook());
        $writer->writeCollectionOfObjectValues('ownedDevices', $this->getOwnedDevices());
        $writer->writeCollectionOfObjectValues('ownedObjects', $this->getOwnedObjects());
        $writer->writeStringValue('passwordPolicies', $this->getPasswordPolicies());
        $writer->writeObjectValue('passwordProfile', $this->getPasswordProfile());
        $writer->writeCollectionOfPrimitiveValues('pastProjects', $this->getPastProjects());
        $writer->writeCollectionOfObjectValues('people', $this->getPeople());
        $writer->writeCollectionOfObjectValues('permissionGrants', $this->getPermissionGrants());
        $writer->writeObjectValue('photo', $this->getPhoto());
        $writer->writeCollectionOfObjectValues('photos', $this->getPhotos());
        $writer->writeObjectValue('planner', $this->getPlanner());
        $writer->writeStringValue('postalCode', $this->getPostalCode());
        $writer->writeStringValue('preferredDataLocation', $this->getPreferredDataLocation());
        $writer->writeStringValue('preferredLanguage', $this->getPreferredLanguage());
        $writer->writeStringValue('preferredName', $this->getPreferredName());
        $writer->writeObjectValue('presence', $this->getPresence());
        $writer->writeCollectionOfObjectValues('provisionedPlans', $this->getProvisionedPlans());
        $writer->writeCollectionOfPrimitiveValues('proxyAddresses', $this->getProxyAddresses());
        $writer->writeCollectionOfObjectValues('registeredDevices', $this->getRegisteredDevices());
        $writer->writeCollectionOfPrimitiveValues('responsibilities', $this->getResponsibilities());
        $writer->writeCollectionOfPrimitiveValues('schools', $this->getSchools());
        $writer->writeCollectionOfObjectValues('scopedRoleMemberOf', $this->getScopedRoleMemberOf());
        $writer->writeStringValue('securityIdentifier', $this->getSecurityIdentifier());
        $writer->writeCollectionOfObjectValues('serviceProvisioningErrors', $this->getServiceProvisioningErrors());
        $writer->writeObjectValue('settings', $this->getSettings());
        $writer->writeBooleanValue('showInAddressList', $this->getShowInAddressList());
        $writer->writeObjectValue('signInActivity', $this->getSignInActivity());
        $writer->writeDateTimeValue('signInSessionsValidFromDateTime', $this->getSignInSessionsValidFromDateTime());
        $writer->writeCollectionOfPrimitiveValues('skills', $this->getSkills());
        $writer->writeObjectValue('solutions', $this->getSolutions());
        $writer->writeCollectionOfObjectValues('sponsorOf', $this->getSponsorOf());
        $writer->writeCollectionOfObjectValues('sponsors', $this->getSponsors());
        $writer->writeStringValue('state', $this->getState());
        $writer->writeStringValue('streetAddress', $this->getStreetAddress());
        $writer->writeStringValue('surname', $this->getSurname());
        $writer->writeObjectValue('teamwork', $this->getTeamwork());
        $writer->writeObjectValue('todo', $this->getTodo());
        $writer->writeCollectionOfObjectValues('transitiveMemberOf', $this->getTransitiveMemberOf());
        $writer->writeStringValue('usageLocation', $this->getUsageLocation());
        $writer->writeStringValue('userPrincipalName', $this->getUserPrincipalName());
        $writer->writeStringValue('userType', $this->getUserType());
    }

    /**
     * Sets the aboutMe property value. A freeform text entry field for the user to describe themselves. Requires $select to retrieve.
     * @param string|null $value Value to set for the aboutMe property.
    */
    public function setAboutMe(?string $value): void {
        $this->aboutMe = $value;
    }

    /**
     * Sets the accountEnabled property value. true if the account is enabled; otherwise, false. This property is required when a user is created. Requires $select to retrieve. Supports $filter (eq, ne, not, and in). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @param bool|null $value Value to set for the accountEnabled property.
    */
    public function setAccountEnabled(?bool $value): void {
        $this->accountEnabled = $value;
    }

    /**
     * Sets the activities property value. The user's activities across devices. Read-only. Nullable.
     * @param array<UserActivity>|null $value Value to set for the activities property.
    */
    public function setActivities(?array $value): void {
        $this->activities = $value;
    }

    /**
     * Sets the adhocCalls property value. Ad hoc calls associated with the user. Read-only. Nullable.
     * @param array<AdhocCall>|null $value Value to set for the adhocCalls property.
    */
    public function setAdhocCalls(?array $value): void {
        $this->adhocCalls = $value;
    }

    /**
     * Sets the ageGroup property value. Sets the age group of the user. Allowed values: null, Minor, NotAdult, and Adult. For more information, see legal age group property definitions. Requires $select to retrieve. Supports $filter (eq, ne, not, and in).
     * @param string|null $value Value to set for the ageGroup property.
    */
    public function setAgeGroup(?string $value): void {
        $this->ageGroup = $value;
    }

    /**
     * Sets the agreementAcceptances property value. The user's terms of use acceptance statuses. Read-only. Nullable.
     * @param array<AgreementAcceptance>|null $value Value to set for the agreementAcceptances property.
    */
    public function setAgreementAcceptances(?array $value): void {
        $this->agreementAcceptances = $value;
    }

    /**
     * Sets the appRoleAssignments property value. Represents the app roles a user is granted for an application. Supports $expand.
     * @param array<AppRoleAssignment>|null $value Value to set for the appRoleAssignments property.
    */
    public function setAppRoleAssignments(?array $value): void {
        $this->appRoleAssignments = $value;
    }

    /**
     * Sets the assignedLicenses property value. The licenses that are assigned to the user, including inherited (group-based) licenses. This property doesn't differentiate between directly assigned and inherited licenses. Use the licenseAssignmentStates property to identify the directly assigned and inherited licenses. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, /$count eq 0, /$count ne 0).
     * @param array<AssignedLicense>|null $value Value to set for the assignedLicenses property.
    */
    public function setAssignedLicenses(?array $value): void {
        $this->assignedLicenses = $value;
    }

    /**
     * Sets the assignedPlans property value. The plans that are assigned to the user. Read-only. Not nullable. Requires $select to retrieve. Supports $filter (eq and not).
     * @param array<AssignedPlan>|null $value Value to set for the assignedPlans property.
    */
    public function setAssignedPlans(?array $value): void {
        $this->assignedPlans = $value;
    }

    /**
     * Sets the authentication property value. The authentication methods that are supported for the user.
     * @param Authentication|null $value Value to set for the authentication property.
    */
    public function setAuthentication(?Authentication $value): void {
        $this->authentication = $value;
    }

    /**
     * Sets the authorizationInfo property value. The authorizationInfo property
     * @param AuthorizationInfo|null $value Value to set for the authorizationInfo property.
    */
    public function setAuthorizationInfo(?AuthorizationInfo $value): void {
        $this->authorizationInfo = $value;
    }

    /**
     * Sets the birthday property value. The birthday of the user. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z. Requires $select to retrieve.
     * @param DateTime|null $value Value to set for the birthday property.
    */
    public function setBirthday(?DateTime $value): void {
        $this->birthday = $value;
    }

    /**
     * Sets the businessPhones property value. The telephone numbers for the user. NOTE: Although it's a string collection, only one number can be set for this property. Read-only for users synced from the on-premises directory. Returned by default. Supports $filter (eq, not, ge, le, startsWith). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @param array<string>|null $value Value to set for the businessPhones property.
    */
    public function setBusinessPhones(?array $value): void {
        $this->businessPhones = $value;
    }

    /**
     * Sets the calendar property value. The user's primary calendar. Read-only.
     * @param Calendar|null $value Value to set for the calendar property.
    */
    public function setCalendar(?Calendar $value): void {
        $this->calendar = $value;
    }

    /**
     * Sets the calendarGroups property value. The user's calendar groups. Read-only. Nullable.
     * @param array<CalendarGroup>|null $value Value to set for the calendarGroups property.
    */
    public function setCalendarGroups(?array $value): void {
        $this->calendarGroups = $value;
    }

    /**
     * Sets the calendars property value. The user's calendars. Read-only. Nullable.
     * @param array<Calendar>|null $value Value to set for the calendars property.
    */
    public function setCalendars(?array $value): void {
        $this->calendars = $value;
    }

    /**
     * Sets the calendarView property value. The calendar view for the calendar. Read-only. Nullable.
     * @param array<Event>|null $value Value to set for the calendarView property.
    */
    public function setCalendarView(?array $value): void {
        $this->calendarView = $value;
    }

    /**
     * Sets the chats property value. The chats property
     * @param array<Chat>|null $value Value to set for the chats property.
    */
    public function setChats(?array $value): void {
        $this->chats = $value;
    }

    /**
     * Sets the city property value. The city where the user is located. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the city property.
    */
    public function setCity(?string $value): void {
        $this->city = $value;
    }

    /**
     * Sets the cloudClipboard property value. The cloudClipboard property
     * @param CloudClipboardRoot|null $value Value to set for the cloudClipboard property.
    */
    public function setCloudClipboard(?CloudClipboardRoot $value): void {
        $this->cloudClipboard = $value;
    }

    /**
     * Sets the cloudPCs property value. The user's Cloud PCs. Read-only. Nullable.
     * @param array<CloudPC>|null $value Value to set for the cloudPCs property.
    */
    public function setCloudPCs(?array $value): void {
        $this->cloudPCs = $value;
    }

    /**
     * Sets the companyName property value. The name of the company that the user is associated with. This property can be useful for describing the company that a guest comes from. The maximum length is 64 characters.Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the companyName property.
    */
    public function setCompanyName(?string $value): void {
        $this->companyName = $value;
    }

    /**
     * Sets the consentProvidedForMinor property value. Sets whether consent was obtained for minors. Allowed values: null, Granted, Denied, and NotRequired. For more information, see legal age group property definitions. Requires $select to retrieve. Supports $filter (eq, ne, not, and in).
     * @param string|null $value Value to set for the consentProvidedForMinor property.
    */
    public function setConsentProvidedForMinor(?string $value): void {
        $this->consentProvidedForMinor = $value;
    }

    /**
     * Sets the contactFolders property value. The user's contacts folders. Read-only. Nullable.
     * @param array<ContactFolder>|null $value Value to set for the contactFolders property.
    */
    public function setContactFolders(?array $value): void {
        $this->contactFolders = $value;
    }

    /**
     * Sets the contacts property value. The user's contacts. Read-only. Nullable.
     * @param array<Contact>|null $value Value to set for the contacts property.
    */
    public function setContacts(?array $value): void {
        $this->contacts = $value;
    }

    /**
     * Sets the country property value. The country or region where the user is located; for example, US or UK. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the country property.
    */
    public function setCountry(?string $value): void {
        $this->country = $value;
    }

    /**
     * Sets the createdDateTime property value. The date and time the user was created, in ISO 8601 format and UTC. The value can't be modified and is automatically populated when the entity is created. Nullable. For on-premises users, the value represents when they were first created in Microsoft Entra ID. Property is null for some users created before June 2018 and on-premises users that were synced to Microsoft Entra ID before June 2018. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
     * @param DateTime|null $value Value to set for the createdDateTime property.
    */
    public function setCreatedDateTime(?DateTime $value): void {
        $this->createdDateTime = $value;
    }

    /**
     * Sets the createdObjects property value. Directory objects that the user created. Read-only. Nullable.
     * @param array<DirectoryObject>|null $value Value to set for the createdObjects property.
    */
    public function setCreatedObjects(?array $value): void {
        $this->createdObjects = $value;
    }

    /**
     * Sets the creationType property value. Indicates whether the user account was created through one of the following methods:  As a regular school or work account (null). As an external account (Invitation). As a local account for an Azure Active Directory B2C tenant (LocalAccount). Through self-service sign-up by an internal user using email verification (EmailVerified). Through self-service sign-up by a guest signing up through a link that is part of a user flow (SelfServiceSignUp). Read-only.Requires $select to retrieve. Supports $filter (eq, ne, not, in).
     * @param string|null $value Value to set for the creationType property.
    */
    public function setCreationType(?string $value): void {
        $this->creationType = $value;
    }

    /**
     * Sets the customSecurityAttributes property value. An open complex type that holds the value of a custom security attribute that is assigned to a directory object. Nullable. Requires $select to retrieve. Supports $filter (eq, ne, not, startsWith). The filter value is case-sensitive. To read this property, the calling app must be assigned the CustomSecAttributeAssignment.Read.All permission. To write this property, the calling app must be assigned the CustomSecAttributeAssignment.ReadWrite.All permissions. To read or write this property in delegated scenarios, the admin must be assigned the Attribute Assignment Administrator role.
     * @param CustomSecurityAttributeValue|null $value Value to set for the customSecurityAttributes property.
    */
    public function setCustomSecurityAttributes(?CustomSecurityAttributeValue $value): void {
        $this->customSecurityAttributes = $value;
    }

    /**
     * Sets the dataSecurityAndGovernance property value. The data security and governance settings for the user. Read-only. Nullable.
     * @param UserDataSecurityAndGovernance|null $value Value to set for the dataSecurityAndGovernance property.
    */
    public function setDataSecurityAndGovernance(?UserDataSecurityAndGovernance $value): void {
        $this->dataSecurityAndGovernance = $value;
    }

    /**
     * Sets the department property value. The name of the department in which the user works. Maximum length is 64 characters. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, and eq on null values).
     * @param string|null $value Value to set for the department property.
    */
    public function setDepartment(?string $value): void {
        $this->department = $value;
    }

    /**
     * Sets the deviceEnrollmentLimit property value. The limit on the maximum number of devices that the user is permitted to enroll. Allowed values are 5 or 1000.
     * @param int|null $value Value to set for the deviceEnrollmentLimit property.
    */
    public function setDeviceEnrollmentLimit(?int $value): void {
        $this->deviceEnrollmentLimit = $value;
    }

    /**
     * Sets the deviceManagementTroubleshootingEvents property value. The list of troubleshooting events for this user.
     * @param array<DeviceManagementTroubleshootingEvent>|null $value Value to set for the deviceManagementTroubleshootingEvents property.
    */
    public function setDeviceManagementTroubleshootingEvents(?array $value): void {
        $this->deviceManagementTroubleshootingEvents = $value;
    }

    /**
     * Sets the directReports property value. The users and contacts that report to the user. (The users and contacts that have their manager property set to this user.) Read-only. Nullable. Supports $expand.
     * @param array<DirectoryObject>|null $value Value to set for the directReports property.
    */
    public function setDirectReports(?array $value): void {
        $this->directReports = $value;
    }

    /**
     * Sets the displayName property value. The name displayed in the address book for the user. This value is usually the combination of the user's first name, middle initial, and family name. This property is required when a user is created and it can't be cleared during updates. Maximum length is 256 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values), $orderby, and $search.
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the drive property value. The user's OneDrive. Read-only.
     * @param Drive|null $value Value to set for the drive property.
    */
    public function setDrive(?Drive $value): void {
        $this->drive = $value;
    }

    /**
     * Sets the drives property value. A collection of drives available for this user. Read-only.
     * @param array<Drive>|null $value Value to set for the drives property.
    */
    public function setDrives(?array $value): void {
        $this->drives = $value;
    }

    /**
     * Sets the employeeExperience property value. The employeeExperience property
     * @param EmployeeExperienceUser|null $value Value to set for the employeeExperience property.
    */
    public function setEmployeeExperience(?EmployeeExperienceUser $value): void {
        $this->employeeExperience = $value;
    }

    /**
     * Sets the employeeHireDate property value. The date and time when the user was hired or will start work in a future hire. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
     * @param DateTime|null $value Value to set for the employeeHireDate property.
    */
    public function setEmployeeHireDate(?DateTime $value): void {
        $this->employeeHireDate = $value;
    }

    /**
     * Sets the employeeId property value. The employee identifier assigned to the user by the organization. The maximum length is 16 characters. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the employeeId property.
    */
    public function setEmployeeId(?string $value): void {
        $this->employeeId = $value;
    }

    /**
     * Sets the employeeLeaveDateTime property value. The date and time when the user left or will leave the organization. To read this property, the calling app must be assigned the User-LifeCycleInfo.Read.All permission. To write this property, the calling app must be assigned the User.Read.All and User-LifeCycleInfo.ReadWrite.All permissions. To read this property in delegated scenarios, the admin needs at least one of the following Microsoft Entra roles: Lifecycle Workflows Administrator (least privilege), Global Reader. To write this property in delegated scenarios, the admin needs the Global Administrator role. Supports $filter (eq, ne, not , ge, le, in). For more information, see Configure the employeeLeaveDateTime property for a user.
     * @param DateTime|null $value Value to set for the employeeLeaveDateTime property.
    */
    public function setEmployeeLeaveDateTime(?DateTime $value): void {
        $this->employeeLeaveDateTime = $value;
    }

    /**
     * Sets the employeeOrgData property value. Represents organization data (for example, division and costCenter) associated with a user. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in).
     * @param EmployeeOrgData|null $value Value to set for the employeeOrgData property.
    */
    public function setEmployeeOrgData(?EmployeeOrgData $value): void {
        $this->employeeOrgData = $value;
    }

    /**
     * Sets the employeeType property value. Captures enterprise worker type. For example, Employee, Contractor, Consultant, or Vendor. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith).
     * @param string|null $value Value to set for the employeeType property.
    */
    public function setEmployeeType(?string $value): void {
        $this->employeeType = $value;
    }

    /**
     * Sets the print property value. The print property
     * @param UserPrint|null $value Value to set for the print property.
    */
    public function setEscapedPrint(?UserPrint $value): void {
        $this->escapedPrint = $value;
    }

    /**
     * Sets the events property value. The user's events. Default is to show Events under the Default Calendar. Read-only. Nullable.
     * @param array<Event>|null $value Value to set for the events property.
    */
    public function setEvents(?array $value): void {
        $this->events = $value;
    }

    /**
     * Sets the extensions property value. The collection of open extensions defined for the user. Read-only. Supports $expand. Nullable.
     * @param array<Extension>|null $value Value to set for the extensions property.
    */
    public function setExtensions(?array $value): void {
        $this->extensions = $value;
    }

    /**
     * Sets the externalUserState property value. For a guest invited to the tenant using the invitation API, this property represents the invited user's invitation status. For invited users, the state can be PendingAcceptance or Accepted, or null for all other users. Requires $select to retrieve. Supports $filter (eq, ne, not , in).
     * @param string|null $value Value to set for the externalUserState property.
    */
    public function setExternalUserState(?string $value): void {
        $this->externalUserState = $value;
    }

    /**
     * Sets the externalUserStateChangeDateTime property value. Shows the timestamp for the latest change to the externalUserState property. Requires $select to retrieve. Supports $filter (eq, ne, not , in).
     * @param DateTime|null $value Value to set for the externalUserStateChangeDateTime property.
    */
    public function setExternalUserStateChangeDateTime(?DateTime $value): void {
        $this->externalUserStateChangeDateTime = $value;
    }

    /**
     * Sets the faxNumber property value. The fax number of the user. Requires $select to retrieve. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the faxNumber property.
    */
    public function setFaxNumber(?string $value): void {
        $this->faxNumber = $value;
    }

    /**
     * Sets the followedSites property value. The followedSites property
     * @param array<Site>|null $value Value to set for the followedSites property.
    */
    public function setFollowedSites(?array $value): void {
        $this->followedSites = $value;
    }

    /**
     * Sets the givenName property value. The given name (first name) of the user. Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the givenName property.
    */
    public function setGivenName(?string $value): void {
        $this->givenName = $value;
    }

    /**
     * Sets the hireDate property value. The hire date of the user. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014, is 2014-01-01T00:00:00Z. Requires $select to retrieve.  Note: This property is specific to SharePoint in Microsoft 365. We recommend using the native employeeHireDate property to set and update hire date values using Microsoft Graph APIs.
     * @param DateTime|null $value Value to set for the hireDate property.
    */
    public function setHireDate(?DateTime $value): void {
        $this->hireDate = $value;
    }

    /**
     * Sets the identities property value. Represents the identities that can be used to sign in to this user account. Microsoft (also known as a local account), organizations, or social identity providers such as Facebook, Google, and Microsoft can provide identity and tie it to a user account. It might contain multiple items with the same signInType value. Requires $select to retrieve.  Supports $filter (eq) with limitations.
     * @param array<ObjectIdentity>|null $value Value to set for the identities property.
    */
    public function setIdentities(?array $value): void {
        $this->identities = $value;
    }

    /**
     * Sets the identityParentId property value. The identityParentId property
     * @param string|null $value Value to set for the identityParentId property.
    */
    public function setIdentityParentId(?string $value): void {
        $this->identityParentId = $value;
    }

    /**
     * Sets the imAddresses property value. The instant message voice-over IP (VOIP) session initiation protocol (SIP) addresses for the user. Read-only. Requires $select to retrieve. Supports $filter (eq, not, ge, le, startsWith).
     * @param array<string>|null $value Value to set for the imAddresses property.
    */
    public function setImAddresses(?array $value): void {
        $this->imAddresses = $value;
    }

    /**
     * Sets the inferenceClassification property value. Relevance classification of the user's messages based on explicit designations that override inferred relevance or importance.
     * @param InferenceClassification|null $value Value to set for the inferenceClassification property.
    */
    public function setInferenceClassification(?InferenceClassification $value): void {
        $this->inferenceClassification = $value;
    }

    /**
     * Sets the insights property value. Represents relationships between a user and items such as OneDrive for work or school documents, calculated using advanced analytics and machine learning techniques. Read-only. Nullable.
     * @param ItemInsights|null $value Value to set for the insights property.
    */
    public function setInsights(?ItemInsights $value): void {
        $this->insights = $value;
    }

    /**
     * Sets the interests property value. A list for the user to describe their interests. Requires $select to retrieve.
     * @param array<string>|null $value Value to set for the interests property.
    */
    public function setInterests(?array $value): void {
        $this->interests = $value;
    }

    /**
     * Sets the isManagementRestricted property value. true if the user is a member of a restricted management administrative unit. If not set, the default value is null and the default behavior is false. Read-only.  To manage a user who is a member of a restricted management administrative unit, the administrator or calling app must be assigned a Microsoft Entra role at the scope of the restricted management administrative unit. Requires $select to retrieve.
     * @param bool|null $value Value to set for the isManagementRestricted property.
    */
    public function setIsManagementRestricted(?bool $value): void {
        $this->isManagementRestricted = $value;
    }

    /**
     * Sets the isResourceAccount property value. Don't use – reserved for future use.
     * @param bool|null $value Value to set for the isResourceAccount property.
    */
    public function setIsResourceAccount(?bool $value): void {
        $this->isResourceAccount = $value;
    }

    /**
     * Sets the jobTitle property value. The user's job title. Maximum length is 128 characters. Returned by default. Supports $filter (eq, ne, not , ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the jobTitle property.
    */
    public function setJobTitle(?string $value): void {
        $this->jobTitle = $value;
    }

    /**
     * Sets the joinedTeams property value. The joinedTeams property
     * @param array<Team>|null $value Value to set for the joinedTeams property.
    */
    public function setJoinedTeams(?array $value): void {
        $this->joinedTeams = $value;
    }

    /**
     * Sets the lastPasswordChangeDateTime property value. The time when this Microsoft Entra user last changed their password or when their password was created, whichever date the latest action was performed. The date and time information uses ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Requires $select to retrieve.
     * @param DateTime|null $value Value to set for the lastPasswordChangeDateTime property.
    */
    public function setLastPasswordChangeDateTime(?DateTime $value): void {
        $this->lastPasswordChangeDateTime = $value;
    }

    /**
     * Sets the legalAgeGroupClassification property value. Used by enterprise applications to determine the legal age group of the user. This property is read-only and calculated based on ageGroup and consentProvidedForMinor properties. Allowed values: null, Undefined,  MinorWithOutParentalConsent, MinorWithParentalConsent, MinorNoParentalConsentRequired, NotAdult, and Adult. For more information, see legal age group property definitions. Requires $select to retrieve.
     * @param string|null $value Value to set for the legalAgeGroupClassification property.
    */
    public function setLegalAgeGroupClassification(?string $value): void {
        $this->legalAgeGroupClassification = $value;
    }

    /**
     * Sets the licenseAssignmentStates property value. State of license assignments for this user. Also indicates licenses that are directly assigned or the user inherited through group memberships. Read-only. Requires $select to retrieve.
     * @param array<LicenseAssignmentState>|null $value Value to set for the licenseAssignmentStates property.
    */
    public function setLicenseAssignmentStates(?array $value): void {
        $this->licenseAssignmentStates = $value;
    }

    /**
     * Sets the licenseDetails property value. A collection of this user's license details. Read-only.
     * @param array<LicenseDetails>|null $value Value to set for the licenseDetails property.
    */
    public function setLicenseDetails(?array $value): void {
        $this->licenseDetails = $value;
    }

    /**
     * Sets the mail property value. The SMTP address for the user, for example, jeff@contoso.com. Changes to this property update the user's proxyAddresses collection to include the value as an SMTP address. This property can't contain accent characters.  NOTE: We don't recommend updating this property for Azure AD B2C user profiles. Use the otherMails property instead. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, endsWith, and eq on null values).
     * @param string|null $value Value to set for the mail property.
    */
    public function setMail(?string $value): void {
        $this->mail = $value;
    }

    /**
     * Sets the mailboxSettings property value. Settings for the primary mailbox of the signed-in user. You can get or update settings for sending automatic replies to incoming messages, locale, and time zone. Requires $select to retrieve.
     * @param MailboxSettings|null $value Value to set for the mailboxSettings property.
    */
    public function setMailboxSettings(?MailboxSettings $value): void {
        $this->mailboxSettings = $value;
    }

    /**
     * Sets the mailFolders property value. The user's mail folders. Read-only. Nullable.
     * @param array<MailFolder>|null $value Value to set for the mailFolders property.
    */
    public function setMailFolders(?array $value): void {
        $this->mailFolders = $value;
    }

    /**
     * Sets the mailNickname property value. The mail alias for the user. This property must be specified when a user is created. Maximum length is 64 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the mailNickname property.
    */
    public function setMailNickname(?string $value): void {
        $this->mailNickname = $value;
    }

    /**
     * Sets the managedAppRegistrations property value. Zero or more managed app registrations that belong to the user.
     * @param array<ManagedAppRegistration>|null $value Value to set for the managedAppRegistrations property.
    */
    public function setManagedAppRegistrations(?array $value): void {
        $this->managedAppRegistrations = $value;
    }

    /**
     * Sets the managedDevices property value. The managed devices associated with the user.
     * @param array<ManagedDevice>|null $value Value to set for the managedDevices property.
    */
    public function setManagedDevices(?array $value): void {
        $this->managedDevices = $value;
    }

    /**
     * Sets the manager property value. The user or contact that is this user's manager. Read-only. Supports $expand.
     * @param DirectoryObject|null $value Value to set for the manager property.
    */
    public function setManager(?DirectoryObject $value): void {
        $this->manager = $value;
    }

    /**
     * Sets the memberOf property value. The groups and directory roles that the user is a member of. Read-only. Nullable. Supports $expand.
     * @param array<DirectoryObject>|null $value Value to set for the memberOf property.
    */
    public function setMemberOf(?array $value): void {
        $this->memberOf = $value;
    }

    /**
     * Sets the messages property value. The messages in a mailbox or folder. Read-only. Nullable.
     * @param array<Message>|null $value Value to set for the messages property.
    */
    public function setMessages(?array $value): void {
        $this->messages = $value;
    }

    /**
     * Sets the mobilePhone property value. The primary cellular telephone number for the user. Read-only for users synced from the on-premises directory. Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values) and $search. This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @param string|null $value Value to set for the mobilePhone property.
    */
    public function setMobilePhone(?string $value): void {
        $this->mobilePhone = $value;
    }

    /**
     * Sets the mySite property value. The URL for the user's site. Requires $select to retrieve.
     * @param string|null $value Value to set for the mySite property.
    */
    public function setMySite(?string $value): void {
        $this->mySite = $value;
    }

    /**
     * Sets the oauth2PermissionGrants property value. The oauth2PermissionGrants property
     * @param array<OAuth2PermissionGrant>|null $value Value to set for the oauth2PermissionGrants property.
    */
    public function setOauth2PermissionGrants(?array $value): void {
        $this->oauth2PermissionGrants = $value;
    }

    /**
     * Sets the officeLocation property value. The office location in the user's place of business. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the officeLocation property.
    */
    public function setOfficeLocation(?string $value): void {
        $this->officeLocation = $value;
    }

    /**
     * Sets the onenote property value. The onenote property
     * @param Onenote|null $value Value to set for the onenote property.
    */
    public function setOnenote(?Onenote $value): void {
        $this->onenote = $value;
    }

    /**
     * Sets the onlineMeetings property value. Information about a meeting, including the URL used to join a meeting, the attendees list, and the description.
     * @param array<OnlineMeeting>|null $value Value to set for the onlineMeetings property.
    */
    public function setOnlineMeetings(?array $value): void {
        $this->onlineMeetings = $value;
    }

    /**
     * Sets the onPremisesDistinguishedName property value. Contains the on-premises Active Directory distinguished name or DN. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve.
     * @param string|null $value Value to set for the onPremisesDistinguishedName property.
    */
    public function setOnPremisesDistinguishedName(?string $value): void {
        $this->onPremisesDistinguishedName = $value;
    }

    /**
     * Sets the onPremisesDomainName property value. Contains the on-premises domainFQDN, also called dnsDomainName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve.
     * @param string|null $value Value to set for the onPremisesDomainName property.
    */
    public function setOnPremisesDomainName(?string $value): void {
        $this->onPremisesDomainName = $value;
    }

    /**
     * Sets the onPremisesExtensionAttributes property value. Contains extensionAttributes1-15 for the user. These extension attributes are also known as Exchange custom attributes 1-15. Each attribute can store up to 1024 characters. For an onPremisesSyncEnabled user, the source of authority for this set of properties is the on-premises and is read-only. For a cloud-only user (where onPremisesSyncEnabled is false), these properties can be set during the creation or update of a user object.  For a cloud-only user previously synced from on-premises Active Directory, these properties are read-only in Microsoft Graph but can be fully managed through the Exchange Admin Center or the Exchange Online V2 module in PowerShell. Requires $select to retrieve. Supports $filter (eq, ne, not, in).
     * @param OnPremisesExtensionAttributes|null $value Value to set for the onPremisesExtensionAttributes property.
    */
    public function setOnPremisesExtensionAttributes(?OnPremisesExtensionAttributes $value): void {
        $this->onPremisesExtensionAttributes = $value;
    }

    /**
     * Sets the onPremisesImmutableId property value. This property is used to associate an on-premises Active Directory user account to their Microsoft Entra user object. This property must be specified when creating a new user account in the Graph if you're using a federated domain for the user's userPrincipalName (UPN) property. NOTE: The $ and _ characters can't be used when specifying this property. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @param string|null $value Value to set for the onPremisesImmutableId property.
    */
    public function setOnPremisesImmutableId(?string $value): void {
        $this->onPremisesImmutableId = $value;
    }

    /**
     * Sets the onPremisesLastSyncDateTime property value. Indicates the last time at which the object was synced with the on-premises directory; for example: 2013-02-16T03:04:54Z. The Timestamp type represents date and time information using ISO 8601 format and is always in UTC. For example, midnight UTC on Jan 1, 2014 is 2014-01-01T00:00:00Z. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in).
     * @param DateTime|null $value Value to set for the onPremisesLastSyncDateTime property.
    */
    public function setOnPremisesLastSyncDateTime(?DateTime $value): void {
        $this->onPremisesLastSyncDateTime = $value;
    }

    /**
     * Sets the onPremisesProvisioningErrors property value. Errors when using Microsoft synchronization product during provisioning. Requires $select to retrieve. Supports $filter (eq, not, ge, le).
     * @param array<OnPremisesProvisioningError>|null $value Value to set for the onPremisesProvisioningErrors property.
    */
    public function setOnPremisesProvisioningErrors(?array $value): void {
        $this->onPremisesProvisioningErrors = $value;
    }

    /**
     * Sets the onPremisesSamAccountName property value. Contains the on-premises samAccountName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith).
     * @param string|null $value Value to set for the onPremisesSamAccountName property.
    */
    public function setOnPremisesSamAccountName(?string $value): void {
        $this->onPremisesSamAccountName = $value;
    }

    /**
     * Sets the onPremisesSecurityIdentifier property value. Contains the on-premises security identifier (SID) for the user that was synchronized from on-premises to the cloud. Read-only. Requires $select to retrieve. Supports $filter (eq including on null values).
     * @param string|null $value Value to set for the onPremisesSecurityIdentifier property.
    */
    public function setOnPremisesSecurityIdentifier(?string $value): void {
        $this->onPremisesSecurityIdentifier = $value;
    }

    /**
     * Sets the onPremisesSyncBehavior property value. The onPremisesSyncBehavior property
     * @param OnPremisesSyncBehavior|null $value Value to set for the onPremisesSyncBehavior property.
    */
    public function setOnPremisesSyncBehavior(?OnPremisesSyncBehavior $value): void {
        $this->onPremisesSyncBehavior = $value;
    }

    /**
     * Sets the onPremisesSyncEnabled property value. true if this user object is currently being synced from an on-premises Active Directory (AD); otherwise the user isn't being synced and can be managed in Microsoft Entra ID. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values).
     * @param bool|null $value Value to set for the onPremisesSyncEnabled property.
    */
    public function setOnPremisesSyncEnabled(?bool $value): void {
        $this->onPremisesSyncEnabled = $value;
    }

    /**
     * Sets the onPremisesUserPrincipalName property value. Contains the on-premises userPrincipalName synchronized from the on-premises directory. The property is only populated for customers who are synchronizing their on-premises directory to Microsoft Entra ID via Microsoft Entra Connect. Read-only. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith).
     * @param string|null $value Value to set for the onPremisesUserPrincipalName property.
    */
    public function setOnPremisesUserPrincipalName(?string $value): void {
        $this->onPremisesUserPrincipalName = $value;
    }

    /**
     * Sets the otherMails property value. A list of other email addresses for the user; for example: ['bob@contoso.com', 'Robert@fabrikam.com']. Can store up to 250 values, each with a limit of 250 characters. NOTE: This property can't contain accent characters. Requires $select to retrieve. Supports $filter (eq, not, ge, le, in, startsWith, endsWith, /$count eq 0, /$count ne 0). This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @param array<string>|null $value Value to set for the otherMails property.
    */
    public function setOtherMails(?array $value): void {
        $this->otherMails = $value;
    }

    /**
     * Sets the outlook property value. The outlook property
     * @param OutlookUser|null $value Value to set for the outlook property.
    */
    public function setOutlook(?OutlookUser $value): void {
        $this->outlook = $value;
    }

    /**
     * Sets the ownedDevices property value. Devices the user owns. Read-only. Nullable. Supports $expand and $filter (/$count eq 0, /$count ne 0, /$count eq 1, /$count ne 1).
     * @param array<DirectoryObject>|null $value Value to set for the ownedDevices property.
    */
    public function setOwnedDevices(?array $value): void {
        $this->ownedDevices = $value;
    }

    /**
     * Sets the ownedObjects property value. Directory objects the user owns. Read-only. Nullable. Supports $expand, $select nested in $expand, and $filter (/$count eq 0, /$count ne 0, /$count eq 1, /$count ne 1).
     * @param array<DirectoryObject>|null $value Value to set for the ownedObjects property.
    */
    public function setOwnedObjects(?array $value): void {
        $this->ownedObjects = $value;
    }

    /**
     * Sets the passwordPolicies property value. Specifies password policies for the user. This value is an enumeration with one possible value being DisableStrongPassword, which allows weaker passwords than the default policy to be specified. DisablePasswordExpiration can also be specified. The two might be specified together; for example: DisablePasswordExpiration, DisableStrongPassword. Requires $select to retrieve. For more information on the default password policies, see Microsoft Entra password policies. Supports $filter (ne, not, and eq on null values).
     * @param string|null $value Value to set for the passwordPolicies property.
    */
    public function setPasswordPolicies(?string $value): void {
        $this->passwordPolicies = $value;
    }

    /**
     * Sets the passwordProfile property value. Specifies the password profile for the user. The profile contains the user's password. This property is required when a user is created. The password in the profile must satisfy minimum requirements as specified by the passwordPolicies property. By default, a strong password is required. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values). To update this property:  User-PasswordProfile.ReadWrite.All is the least privileged permission to update this property.  In delegated scenarios, the User Administrator Microsoft Entra role is the least privileged admin role supported to update this property for nonadmin users. Privileged Authentication Administrator is the least privileged role that's allowed to update this property for all administrators in the tenant. In general, the signed-in user must have a higher privileged administrator role as indicated in Who can reset passwords.  In app-only scenarios, the calling app must be assigned a supported permission and at least the User Administrator Microsoft Entra role. This property is also subject to sensitive action restrictions.
     * @param PasswordProfile|null $value Value to set for the passwordProfile property.
    */
    public function setPasswordProfile(?PasswordProfile $value): void {
        $this->passwordProfile = $value;
    }

    /**
     * Sets the pastProjects property value. A list for the user to enumerate their past projects. Requires $select to retrieve.
     * @param array<string>|null $value Value to set for the pastProjects property.
    */
    public function setPastProjects(?array $value): void {
        $this->pastProjects = $value;
    }

    /**
     * Sets the people property value. People that are relevant to the user. Read-only. Nullable.
     * @param array<Person>|null $value Value to set for the people property.
    */
    public function setPeople(?array $value): void {
        $this->people = $value;
    }

    /**
     * Sets the permissionGrants property value. List all resource-specific permission grants of a user.
     * @param array<ResourceSpecificPermissionGrant>|null $value Value to set for the permissionGrants property.
    */
    public function setPermissionGrants(?array $value): void {
        $this->permissionGrants = $value;
    }

    /**
     * Sets the photo property value. The user's profile photo. Read-only.
     * @param ProfilePhoto|null $value Value to set for the photo property.
    */
    public function setPhoto(?ProfilePhoto $value): void {
        $this->photo = $value;
    }

    /**
     * Sets the photos property value. The collection of the user's profile photos in different sizes. Read-only.
     * @param array<ProfilePhoto>|null $value Value to set for the photos property.
    */
    public function setPhotos(?array $value): void {
        $this->photos = $value;
    }

    /**
     * Sets the planner property value. Entry-point to the Planner resource that might exist for a user. Read-only.
     * @param PlannerUser|null $value Value to set for the planner property.
    */
    public function setPlanner(?PlannerUser $value): void {
        $this->planner = $value;
    }

    /**
     * Sets the postalCode property value. The postal code for the user's postal address. The postal code is specific to the user's country or region. In the United States of America, this attribute contains the ZIP code. Maximum length is 40 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the postalCode property.
    */
    public function setPostalCode(?string $value): void {
        $this->postalCode = $value;
    }

    /**
     * Sets the preferredDataLocation property value. The preferred data location for the user. For more information, see OneDrive Online Multi-Geo.
     * @param string|null $value Value to set for the preferredDataLocation property.
    */
    public function setPreferredDataLocation(?string $value): void {
        $this->preferredDataLocation = $value;
    }

    /**
     * Sets the preferredLanguage property value. The preferred language for the user. The preferred language format is based on RFC 4646. The name is a combination of an ISO 639 two-letter lowercase culture code associated with the language, and an ISO 3166 two-letter uppercase subculture code associated with the country or region. Example: 'en-US', or 'es-ES'. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values)
     * @param string|null $value Value to set for the preferredLanguage property.
    */
    public function setPreferredLanguage(?string $value): void {
        $this->preferredLanguage = $value;
    }

    /**
     * Sets the preferredName property value. The preferred name for the user. Not Supported. This attribute returns an empty string.Requires $select to retrieve.
     * @param string|null $value Value to set for the preferredName property.
    */
    public function setPreferredName(?string $value): void {
        $this->preferredName = $value;
    }

    /**
     * Sets the presence property value. The presence property
     * @param Presence|null $value Value to set for the presence property.
    */
    public function setPresence(?Presence $value): void {
        $this->presence = $value;
    }

    /**
     * Sets the provisionedPlans property value. The plans that are provisioned for the user. Read-only. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, ge, le).
     * @param array<ProvisionedPlan>|null $value Value to set for the provisionedPlans property.
    */
    public function setProvisionedPlans(?array $value): void {
        $this->provisionedPlans = $value;
    }

    /**
     * Sets the proxyAddresses property value. For example: ['SMTP: bob@contoso.com', 'smtp: bob@sales.contoso.com']. Changes to the mail property update this collection to include the value as an SMTP address. For more information, see mail and proxyAddresses properties. The proxy address prefixed with SMTP (capitalized) is the primary proxy address, while those addresses prefixed with smtp are the secondary proxy addresses. For Azure AD B2C accounts, this property has a limit of 10 unique addresses. Read-only in Microsoft Graph; you can update this property only through the Microsoft 365 admin center. Not nullable. Requires $select to retrieve. Supports $filter (eq, not, ge, le, startsWith, endsWith, /$count eq 0, /$count ne 0).
     * @param array<string>|null $value Value to set for the proxyAddresses property.
    */
    public function setProxyAddresses(?array $value): void {
        $this->proxyAddresses = $value;
    }

    /**
     * Sets the registeredDevices property value. Devices that are registered for the user. Read-only. Nullable. Supports $expand and returns up to 100 objects.
     * @param array<DirectoryObject>|null $value Value to set for the registeredDevices property.
    */
    public function setRegisteredDevices(?array $value): void {
        $this->registeredDevices = $value;
    }

    /**
     * Sets the responsibilities property value. A list for the user to enumerate their responsibilities. Requires $select to retrieve.
     * @param array<string>|null $value Value to set for the responsibilities property.
    */
    public function setResponsibilities(?array $value): void {
        $this->responsibilities = $value;
    }

    /**
     * Sets the schools property value. A list for the user to enumerate the schools they attended. Requires $select to retrieve.
     * @param array<string>|null $value Value to set for the schools property.
    */
    public function setSchools(?array $value): void {
        $this->schools = $value;
    }

    /**
     * Sets the scopedRoleMemberOf property value. The scopedRoleMemberOf property
     * @param array<ScopedRoleMembership>|null $value Value to set for the scopedRoleMemberOf property.
    */
    public function setScopedRoleMemberOf(?array $value): void {
        $this->scopedRoleMemberOf = $value;
    }

    /**
     * Sets the securityIdentifier property value. Security identifier (SID) of the user, used in Windows scenarios. Read-only. Returned by default. Supports $select and $filter (eq, not, ge, le, startsWith).
     * @param string|null $value Value to set for the securityIdentifier property.
    */
    public function setSecurityIdentifier(?string $value): void {
        $this->securityIdentifier = $value;
    }

    /**
     * Sets the serviceProvisioningErrors property value. Errors published by a federated service describing a nontransient, service-specific error regarding the properties or link from a user object.  Supports $filter (eq, not, for isResolved and serviceInstance).
     * @param array<ServiceProvisioningError>|null $value Value to set for the serviceProvisioningErrors property.
    */
    public function setServiceProvisioningErrors(?array $value): void {
        $this->serviceProvisioningErrors = $value;
    }

    /**
     * Sets the settings property value. The settings property
     * @param UserSettings|null $value Value to set for the settings property.
    */
    public function setSettings(?UserSettings $value): void {
        $this->settings = $value;
    }

    /**
     * Sets the showInAddressList property value. Do not use in Microsoft Graph. Manage this property through the Microsoft 365 admin center instead. Represents whether the user should be included in the Outlook global address list. See Known issue.
     * @param bool|null $value Value to set for the showInAddressList property.
    */
    public function setShowInAddressList(?bool $value): void {
        $this->showInAddressList = $value;
    }

    /**
     * Sets the signInActivity property value. Get the last signed-in date and request ID of the sign-in for a given user. Read-only.Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le) but not with any other filterable properties. Note: Details for this property require a Microsoft Entra ID P1 or P2 license and the AuditLog.Read.All permission.This property isn't returned for a user who never signed in or last signed in before April 2020.
     * @param SignInActivity|null $value Value to set for the signInActivity property.
    */
    public function setSignInActivity(?SignInActivity $value): void {
        $this->signInActivity = $value;
    }

    /**
     * Sets the signInSessionsValidFromDateTime property value. Any refresh tokens or session tokens (session cookies) issued before this time are invalid. Applications get an error when using an invalid refresh or session token to acquire a delegated access token (to access APIs such as Microsoft Graph). If this happens, the application needs to acquire a new refresh token by requesting the authorized endpoint. Read-only. Use revokeSignInSessions to reset. Requires $select to retrieve.
     * @param DateTime|null $value Value to set for the signInSessionsValidFromDateTime property.
    */
    public function setSignInSessionsValidFromDateTime(?DateTime $value): void {
        $this->signInSessionsValidFromDateTime = $value;
    }

    /**
     * Sets the skills property value. A list for the user to enumerate their skills. Requires $select to retrieve.
     * @param array<string>|null $value Value to set for the skills property.
    */
    public function setSkills(?array $value): void {
        $this->skills = $value;
    }

    /**
     * Sets the solutions property value. The identifier that relates the user to the working time schedule triggers. Read-Only. Nullable
     * @param UserSolutionRoot|null $value Value to set for the solutions property.
    */
    public function setSolutions(?UserSolutionRoot $value): void {
        $this->solutions = $value;
    }

    /**
     * Sets the sponsorOf property value. Directory objects that this user sponsors, such as guest users, agent users, agent blueprints, agent blueprint principals, and agent identities. If the user is a member of a group that's a sponsor, the objects sponsored by that group are also included. Read-only. Nullable. Supports $filter, $count, $select, $expand, $top, and $skip.
     * @param array<DirectoryObject>|null $value Value to set for the sponsorOf property.
    */
    public function setSponsorOf(?array $value): void {
        $this->sponsorOf = $value;
    }

    /**
     * Sets the sponsors property value. The users and groups responsible for this guest's privileges in the tenant and keeping the guest's information and access updated. (HTTP Methods: GET, POST, DELETE.). Supports $expand.
     * @param array<DirectoryObject>|null $value Value to set for the sponsors property.
    */
    public function setSponsors(?array $value): void {
        $this->sponsors = $value;
    }

    /**
     * Sets the state property value. The state or province in the user's address. Maximum length is 128 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the state property.
    */
    public function setState(?string $value): void {
        $this->state = $value;
    }

    /**
     * Sets the streetAddress property value. The street address of the user's place of business. Maximum length is 1,024 characters. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the streetAddress property.
    */
    public function setStreetAddress(?string $value): void {
        $this->streetAddress = $value;
    }

    /**
     * Sets the surname property value. The user's surname (family name or last name). Maximum length is 64 characters. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the surname property.
    */
    public function setSurname(?string $value): void {
        $this->surname = $value;
    }

    /**
     * Sets the teamwork property value. A container for Microsoft Teams features available for the user. Read-only. Nullable.
     * @param UserTeamwork|null $value Value to set for the teamwork property.
    */
    public function setTeamwork(?UserTeamwork $value): void {
        $this->teamwork = $value;
    }

    /**
     * Sets the todo property value. Represents the To Do services available to a user.
     * @param Todo|null $value Value to set for the todo property.
    */
    public function setTodo(?Todo $value): void {
        $this->todo = $value;
    }

    /**
     * Sets the transitiveMemberOf property value. The groups, including nested groups, and directory roles that a user is a member of. Nullable.
     * @param array<DirectoryObject>|null $value Value to set for the transitiveMemberOf property.
    */
    public function setTransitiveMemberOf(?array $value): void {
        $this->transitiveMemberOf = $value;
    }

    /**
     * Sets the usageLocation property value. A two-letter country code (ISO standard 3166). Required for users that are assigned licenses due to legal requirements to check for availability of services in countries/regions. Examples include: US, JP, and GB. Not nullable. Requires $select to retrieve. Supports $filter (eq, ne, not, ge, le, in, startsWith, and eq on null values).
     * @param string|null $value Value to set for the usageLocation property.
    */
    public function setUsageLocation(?string $value): void {
        $this->usageLocation = $value;
    }

    /**
     * Sets the userPrincipalName property value. The user principal name (UPN) of the user. The UPN is an Internet-style sign-in name for the user based on the Internet standard RFC 822. By convention, this value should map to the user's email name. The general format is alias@domain, where the domain must be present in the tenant's collection of verified domains. This property is required when a user is created. The verified domains for the tenant can be accessed from the verifiedDomains property of organization.NOTE: This property can't contain accent characters. Only the following characters are allowed A - Z, a - z, 0 - 9, ' . - _ ! # ^ ~. For the complete list of allowed characters, see username policies. Returned by default. Supports $filter (eq, ne, not, ge, le, in, startsWith, endsWith) and $orderby. This property is subject to sensitive action restrictions; only specific privileged administrator roles can update it.
     * @param string|null $value Value to set for the userPrincipalName property.
    */
    public function setUserPrincipalName(?string $value): void {
        $this->userPrincipalName = $value;
    }

    /**
     * Sets the userType property value. A string value that can be used to classify user types in your directory. The possible values are Member and Guest. Requires $select to retrieve. Supports $filter (eq, ne, not, in, and eq on null values). NOTE: For more information about the permissions for members and guests, see What are the default user permissions in Microsoft Entra ID?
     * @param string|null $value Value to set for the userType property.
    */
    public function setUserType(?string $value): void {
        $this->userType = $value;
    }

}
