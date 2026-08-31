<?php

namespace MSPress\Includes\MSGraph\Kiota\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use Psr\Http\Message\StreamInterface;

class OrganizationalBrandingProperties extends Entity implements Parsable 
{
    /**
     * @var string|null $backgroundColor Color that appears in place of the background image in low-bandwidth connections. We recommend that you use the primary color of your banner logo or your organization color. Specify this in hexadecimal format, for example, white is #FFFFFF.
    */
    private ?string $backgroundColor = null;
    
    /**
     * @var StreamInterface|null $backgroundImage Image that appears as the background of the sign-in page. The allowed types are PNG or JPEG not smaller than 300 KB and not larger than 1920 × 1080 pixels. A smaller image reduces bandwidth requirements and make the page load faster.
    */
    private ?StreamInterface $backgroundImage = null;
    
    /**
     * @var string|null $backgroundImageRelativeUrl A relative URL for the backgroundImage property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
    */
    private ?string $backgroundImageRelativeUrl = null;
    
    /**
     * @var StreamInterface|null $bannerLogo A banner version of your company logo that appears on the sign-in page. The allowed types are PNG or JPEG not larger than 36 × 245 pixels. We recommend using a transparent image with no padding around the logo.
    */
    private ?StreamInterface $bannerLogo = null;
    
    /**
     * @var string|null $bannerLogoRelativeUrl A relative URL for the bannerLogo property that is combined with a CDN base URL from the cdnList to provide the read-only version served by a CDN. Read-only.
    */
    private ?string $bannerLogoRelativeUrl = null;
    
    /**
     * @var array<string>|null $cdnList A list of base URLs for all available CDN providers that are serving the assets of the current resource. Several CDN providers are used at the same time for high availability of read requests. Read-only.
    */
    private ?array $cdnList = null;
    
    /**
     * @var ContentCustomization|null $contentCustomization Represents the content options to be customized throughout the authentication flow for a tenant. NOTE: Supported by Microsoft Entra External ID in external tenants only.
    */
    private ?ContentCustomization $contentCustomization = null;
    
    /**
     * @var string|null $customAccountResetCredentialsUrl A custom URL for resetting account credentials. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters.
    */
    private ?string $customAccountResetCredentialsUrl = null;
    
    /**
     * @var string|null $customCannotAccessYourAccountText A string to replace the default 'Can't access your account?' self-service password reset (SSPR) hyperlink text on the sign-in page. This text must be in Unicode format and not exceed 256 characters.
    */
    private ?string $customCannotAccessYourAccountText = null;
    
    /**
     * @var string|null $customCannotAccessYourAccountUrl A custom URL to replace the default URL of the self-service password reset (SSPR) 'Can't access your account?' hyperlink on the sign-in page. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters. DO NOT USE. Use customAccountResetCredentialsUrl instead.
    */
    private ?string $customCannotAccessYourAccountUrl = null;
    
    /**
     * @var StreamInterface|null $customCSS CSS styling that appears on the sign-in page. The allowed format is .css format only and not larger than 25 KB.
    */
    private ?StreamInterface $customCSS = null;
    
    /**
     * @var string|null $customCSSRelativeUrl A relative URL for the customCSS property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
    */
    private ?string $customCSSRelativeUrl = null;
    
    /**
     * @var string|null $customForgotMyPasswordText A string to replace the default 'Forgot my password' hyperlink text on the sign-in form. This text must be in Unicode format and not exceed 256 characters.
    */
    private ?string $customForgotMyPasswordText = null;
    
    /**
     * @var string|null $customPrivacyAndCookiesText A string to replace the default 'Privacy and Cookies' hyperlink text in the footer. This text must be in Unicode format and not exceed 256 characters.
    */
    private ?string $customPrivacyAndCookiesText = null;
    
    /**
     * @var string|null $customPrivacyAndCookiesUrl A custom URL to replace the default URL of the 'Privacy and Cookies' hyperlink in the footer. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters.
    */
    private ?string $customPrivacyAndCookiesUrl = null;
    
    /**
     * @var string|null $customResetItNowText A string to replace the default 'reset it now' hyperlink text on the sign-in form. This text must be in Unicode format and not exceed 256 characters. DO NOT USE: Customization of the 'reset it now' hyperlink text is currently not supported.
    */
    private ?string $customResetItNowText = null;
    
    /**
     * @var string|null $customTermsOfUseText A string to replace the the default 'Terms of Use' hyperlink text in the footer. This text must be in Unicode format and not exceed 256 characters.
    */
    private ?string $customTermsOfUseText = null;
    
    /**
     * @var string|null $customTermsOfUseUrl A custom URL to replace the default URL of the 'Terms of Use' hyperlink in the footer. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128characters.
    */
    private ?string $customTermsOfUseUrl = null;
    
    /**
     * @var StreamInterface|null $favicon A custom icon (favicon) to replace a default Microsoft product favicon on a Microsoft Entra tenant.
    */
    private ?StreamInterface $favicon = null;
    
    /**
     * @var string|null $faviconRelativeUrl A relative url for the favicon above that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
    */
    private ?string $faviconRelativeUrl = null;
    
    /**
     * @var string|null $headerBackgroundColor The RGB color to apply to customize the color of the header.
    */
    private ?string $headerBackgroundColor = null;
    
    /**
     * @var StreamInterface|null $headerLogo A company logo that appears in the header of the sign-in page. The allowed types are PNG or JPEG not larger than 36 × 245 pixels. We recommend using a transparent image with no padding around the logo.
    */
    private ?StreamInterface $headerLogo = null;
    
    /**
     * @var string|null $headerLogoRelativeUrl A relative URL for the headerLogo property that is combined with a CDN base URL from the cdnList to provide the read-only version served by a CDN. Read-only.
    */
    private ?string $headerLogoRelativeUrl = null;
    
    /**
     * @var LoginPageLayoutConfiguration|null $loginPageLayoutConfiguration Represents the layout configuration to be displayed on the login page for a tenant.
    */
    private ?LoginPageLayoutConfiguration $loginPageLayoutConfiguration = null;
    
    /**
     * @var LoginPageTextVisibilitySettings|null $loginPageTextVisibilitySettings Represents the various texts that can be hidden on the login page for a tenant.
    */
    private ?LoginPageTextVisibilitySettings $loginPageTextVisibilitySettings = null;
    
    /**
     * @var string|null $signInPageText Text that appears at the bottom of the sign-in box. Use this to communicate additional information, such as the phone number to your help desk or a legal statement. This text must be in Unicode format and not exceed 1024 characters.
    */
    private ?string $signInPageText = null;
    
    /**
     * @var StreamInterface|null $squareLogo A square version of your company logo that appears in Windows 10 out-of-box experiences (OOBE) and when Windows Autopilot is enabled for deployment. Allowed types are PNG or JPEG not larger than 240 x 240 pixels and not more than 10 KB in size. We recommend using a transparent image with no padding around the logo.
    */
    private ?StreamInterface $squareLogo = null;
    
    /**
     * @var StreamInterface|null $squareLogoDark A square dark version of your company logo that appears in Windows 10 out-of-box experiences (OOBE) and when Windows Autopilot is enabled for deployment. Allowed types are PNG or JPEG not larger than 240 x 240 pixels and not more than 10 KB in size. We recommend using a transparent image with no padding around the logo.
    */
    private ?StreamInterface $squareLogoDark = null;
    
    /**
     * @var string|null $squareLogoDarkRelativeUrl A relative URL for the squareLogoDark property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
    */
    private ?string $squareLogoDarkRelativeUrl = null;
    
    /**
     * @var string|null $squareLogoRelativeUrl A relative URL for the squareLogo property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
    */
    private ?string $squareLogoRelativeUrl = null;
    
    /**
     * @var string|null $usernameHintText A string that shows as the hint in the username textbox on the sign-in screen. This text must be a Unicode, without links or code, and can't exceed 64 characters.
    */
    private ?string $usernameHintText = null;
    
    /**
     * Instantiates a new OrganizationalBrandingProperties and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return OrganizationalBrandingProperties
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): OrganizationalBrandingProperties {
        $mappingValueNode = $parseNode->getChildNode("@odata.type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            switch ($mappingValue) {
                case '#microsoft.graph.organizationalBranding': return new OrganizationalBranding();
                case '#microsoft.graph.organizationalBrandingLocalization': return new OrganizationalBrandingLocalization();
            }
        }
        return new OrganizationalBrandingProperties();
    }

    /**
     * Gets the backgroundColor property value. Color that appears in place of the background image in low-bandwidth connections. We recommend that you use the primary color of your banner logo or your organization color. Specify this in hexadecimal format, for example, white is #FFFFFF.
     * @return string|null
    */
    public function getBackgroundColor(): ?string {
        return $this->backgroundColor;
    }

    /**
     * Gets the backgroundImage property value. Image that appears as the background of the sign-in page. The allowed types are PNG or JPEG not smaller than 300 KB and not larger than 1920 × 1080 pixels. A smaller image reduces bandwidth requirements and make the page load faster.
     * @return StreamInterface|null
    */
    public function getBackgroundImage(): ?StreamInterface {
        return $this->backgroundImage;
    }

    /**
     * Gets the backgroundImageRelativeUrl property value. A relative URL for the backgroundImage property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @return string|null
    */
    public function getBackgroundImageRelativeUrl(): ?string {
        return $this->backgroundImageRelativeUrl;
    }

    /**
     * Gets the bannerLogo property value. A banner version of your company logo that appears on the sign-in page. The allowed types are PNG or JPEG not larger than 36 × 245 pixels. We recommend using a transparent image with no padding around the logo.
     * @return StreamInterface|null
    */
    public function getBannerLogo(): ?StreamInterface {
        return $this->bannerLogo;
    }

    /**
     * Gets the bannerLogoRelativeUrl property value. A relative URL for the bannerLogo property that is combined with a CDN base URL from the cdnList to provide the read-only version served by a CDN. Read-only.
     * @return string|null
    */
    public function getBannerLogoRelativeUrl(): ?string {
        return $this->bannerLogoRelativeUrl;
    }

    /**
     * Gets the cdnList property value. A list of base URLs for all available CDN providers that are serving the assets of the current resource. Several CDN providers are used at the same time for high availability of read requests. Read-only.
     * @return array<string>|null
    */
    public function getCdnList(): ?array {
        return $this->cdnList;
    }

    /**
     * Gets the contentCustomization property value. Represents the content options to be customized throughout the authentication flow for a tenant. NOTE: Supported by Microsoft Entra External ID in external tenants only.
     * @return ContentCustomization|null
    */
    public function getContentCustomization(): ?ContentCustomization {
        return $this->contentCustomization;
    }

    /**
     * Gets the customAccountResetCredentialsUrl property value. A custom URL for resetting account credentials. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters.
     * @return string|null
    */
    public function getCustomAccountResetCredentialsUrl(): ?string {
        return $this->customAccountResetCredentialsUrl;
    }

    /**
     * Gets the customCannotAccessYourAccountText property value. A string to replace the default 'Can't access your account?' self-service password reset (SSPR) hyperlink text on the sign-in page. This text must be in Unicode format and not exceed 256 characters.
     * @return string|null
    */
    public function getCustomCannotAccessYourAccountText(): ?string {
        return $this->customCannotAccessYourAccountText;
    }

    /**
     * Gets the customCannotAccessYourAccountUrl property value. A custom URL to replace the default URL of the self-service password reset (SSPR) 'Can't access your account?' hyperlink on the sign-in page. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters. DO NOT USE. Use customAccountResetCredentialsUrl instead.
     * @return string|null
    */
    public function getCustomCannotAccessYourAccountUrl(): ?string {
        return $this->customCannotAccessYourAccountUrl;
    }

    /**
     * Gets the customCSS property value. CSS styling that appears on the sign-in page. The allowed format is .css format only and not larger than 25 KB.
     * @return StreamInterface|null
    */
    public function getCustomCSS(): ?StreamInterface {
        return $this->customCSS;
    }

    /**
     * Gets the customCSSRelativeUrl property value. A relative URL for the customCSS property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @return string|null
    */
    public function getCustomCSSRelativeUrl(): ?string {
        return $this->customCSSRelativeUrl;
    }

    /**
     * Gets the customForgotMyPasswordText property value. A string to replace the default 'Forgot my password' hyperlink text on the sign-in form. This text must be in Unicode format and not exceed 256 characters.
     * @return string|null
    */
    public function getCustomForgotMyPasswordText(): ?string {
        return $this->customForgotMyPasswordText;
    }

    /**
     * Gets the customPrivacyAndCookiesText property value. A string to replace the default 'Privacy and Cookies' hyperlink text in the footer. This text must be in Unicode format and not exceed 256 characters.
     * @return string|null
    */
    public function getCustomPrivacyAndCookiesText(): ?string {
        return $this->customPrivacyAndCookiesText;
    }

    /**
     * Gets the customPrivacyAndCookiesUrl property value. A custom URL to replace the default URL of the 'Privacy and Cookies' hyperlink in the footer. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters.
     * @return string|null
    */
    public function getCustomPrivacyAndCookiesUrl(): ?string {
        return $this->customPrivacyAndCookiesUrl;
    }

    /**
     * Gets the customResetItNowText property value. A string to replace the default 'reset it now' hyperlink text on the sign-in form. This text must be in Unicode format and not exceed 256 characters. DO NOT USE: Customization of the 'reset it now' hyperlink text is currently not supported.
     * @return string|null
    */
    public function getCustomResetItNowText(): ?string {
        return $this->customResetItNowText;
    }

    /**
     * Gets the customTermsOfUseText property value. A string to replace the the default 'Terms of Use' hyperlink text in the footer. This text must be in Unicode format and not exceed 256 characters.
     * @return string|null
    */
    public function getCustomTermsOfUseText(): ?string {
        return $this->customTermsOfUseText;
    }

    /**
     * Gets the customTermsOfUseUrl property value. A custom URL to replace the default URL of the 'Terms of Use' hyperlink in the footer. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128characters.
     * @return string|null
    */
    public function getCustomTermsOfUseUrl(): ?string {
        return $this->customTermsOfUseUrl;
    }

    /**
     * Gets the favicon property value. A custom icon (favicon) to replace a default Microsoft product favicon on a Microsoft Entra tenant.
     * @return StreamInterface|null
    */
    public function getFavicon(): ?StreamInterface {
        return $this->favicon;
    }

    /**
     * Gets the faviconRelativeUrl property value. A relative url for the favicon above that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @return string|null
    */
    public function getFaviconRelativeUrl(): ?string {
        return $this->faviconRelativeUrl;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'backgroundColor' => fn(ParseNode $n) => $o->setBackgroundColor($n->getStringValue()),
            'backgroundImage' => fn(ParseNode $n) => $o->setBackgroundImage($n->getBinaryContent()),
            'backgroundImageRelativeUrl' => fn(ParseNode $n) => $o->setBackgroundImageRelativeUrl($n->getStringValue()),
            'bannerLogo' => fn(ParseNode $n) => $o->setBannerLogo($n->getBinaryContent()),
            'bannerLogoRelativeUrl' => fn(ParseNode $n) => $o->setBannerLogoRelativeUrl($n->getStringValue()),
            'cdnList' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setCdnList($val);
            },
            'contentCustomization' => fn(ParseNode $n) => $o->setContentCustomization($n->getObjectValue([ContentCustomization::class, 'createFromDiscriminatorValue'])),
            'customAccountResetCredentialsUrl' => fn(ParseNode $n) => $o->setCustomAccountResetCredentialsUrl($n->getStringValue()),
            'customCannotAccessYourAccountText' => fn(ParseNode $n) => $o->setCustomCannotAccessYourAccountText($n->getStringValue()),
            'customCannotAccessYourAccountUrl' => fn(ParseNode $n) => $o->setCustomCannotAccessYourAccountUrl($n->getStringValue()),
            'customCSS' => fn(ParseNode $n) => $o->setCustomCSS($n->getBinaryContent()),
            'customCSSRelativeUrl' => fn(ParseNode $n) => $o->setCustomCSSRelativeUrl($n->getStringValue()),
            'customForgotMyPasswordText' => fn(ParseNode $n) => $o->setCustomForgotMyPasswordText($n->getStringValue()),
            'customPrivacyAndCookiesText' => fn(ParseNode $n) => $o->setCustomPrivacyAndCookiesText($n->getStringValue()),
            'customPrivacyAndCookiesUrl' => fn(ParseNode $n) => $o->setCustomPrivacyAndCookiesUrl($n->getStringValue()),
            'customResetItNowText' => fn(ParseNode $n) => $o->setCustomResetItNowText($n->getStringValue()),
            'customTermsOfUseText' => fn(ParseNode $n) => $o->setCustomTermsOfUseText($n->getStringValue()),
            'customTermsOfUseUrl' => fn(ParseNode $n) => $o->setCustomTermsOfUseUrl($n->getStringValue()),
            'favicon' => fn(ParseNode $n) => $o->setFavicon($n->getBinaryContent()),
            'faviconRelativeUrl' => fn(ParseNode $n) => $o->setFaviconRelativeUrl($n->getStringValue()),
            'headerBackgroundColor' => fn(ParseNode $n) => $o->setHeaderBackgroundColor($n->getStringValue()),
            'headerLogo' => fn(ParseNode $n) => $o->setHeaderLogo($n->getBinaryContent()),
            'headerLogoRelativeUrl' => fn(ParseNode $n) => $o->setHeaderLogoRelativeUrl($n->getStringValue()),
            'loginPageLayoutConfiguration' => fn(ParseNode $n) => $o->setLoginPageLayoutConfiguration($n->getObjectValue([LoginPageLayoutConfiguration::class, 'createFromDiscriminatorValue'])),
            'loginPageTextVisibilitySettings' => fn(ParseNode $n) => $o->setLoginPageTextVisibilitySettings($n->getObjectValue([LoginPageTextVisibilitySettings::class, 'createFromDiscriminatorValue'])),
            'signInPageText' => fn(ParseNode $n) => $o->setSignInPageText($n->getStringValue()),
            'squareLogo' => fn(ParseNode $n) => $o->setSquareLogo($n->getBinaryContent()),
            'squareLogoDark' => fn(ParseNode $n) => $o->setSquareLogoDark($n->getBinaryContent()),
            'squareLogoDarkRelativeUrl' => fn(ParseNode $n) => $o->setSquareLogoDarkRelativeUrl($n->getStringValue()),
            'squareLogoRelativeUrl' => fn(ParseNode $n) => $o->setSquareLogoRelativeUrl($n->getStringValue()),
            'usernameHintText' => fn(ParseNode $n) => $o->setUsernameHintText($n->getStringValue()),
        ]);
    }

    /**
     * Gets the headerBackgroundColor property value. The RGB color to apply to customize the color of the header.
     * @return string|null
    */
    public function getHeaderBackgroundColor(): ?string {
        return $this->headerBackgroundColor;
    }

    /**
     * Gets the headerLogo property value. A company logo that appears in the header of the sign-in page. The allowed types are PNG or JPEG not larger than 36 × 245 pixels. We recommend using a transparent image with no padding around the logo.
     * @return StreamInterface|null
    */
    public function getHeaderLogo(): ?StreamInterface {
        return $this->headerLogo;
    }

    /**
     * Gets the headerLogoRelativeUrl property value. A relative URL for the headerLogo property that is combined with a CDN base URL from the cdnList to provide the read-only version served by a CDN. Read-only.
     * @return string|null
    */
    public function getHeaderLogoRelativeUrl(): ?string {
        return $this->headerLogoRelativeUrl;
    }

    /**
     * Gets the loginPageLayoutConfiguration property value. Represents the layout configuration to be displayed on the login page for a tenant.
     * @return LoginPageLayoutConfiguration|null
    */
    public function getLoginPageLayoutConfiguration(): ?LoginPageLayoutConfiguration {
        return $this->loginPageLayoutConfiguration;
    }

    /**
     * Gets the loginPageTextVisibilitySettings property value. Represents the various texts that can be hidden on the login page for a tenant.
     * @return LoginPageTextVisibilitySettings|null
    */
    public function getLoginPageTextVisibilitySettings(): ?LoginPageTextVisibilitySettings {
        return $this->loginPageTextVisibilitySettings;
    }

    /**
     * Gets the signInPageText property value. Text that appears at the bottom of the sign-in box. Use this to communicate additional information, such as the phone number to your help desk or a legal statement. This text must be in Unicode format and not exceed 1024 characters.
     * @return string|null
    */
    public function getSignInPageText(): ?string {
        return $this->signInPageText;
    }

    /**
     * Gets the squareLogo property value. A square version of your company logo that appears in Windows 10 out-of-box experiences (OOBE) and when Windows Autopilot is enabled for deployment. Allowed types are PNG or JPEG not larger than 240 x 240 pixels and not more than 10 KB in size. We recommend using a transparent image with no padding around the logo.
     * @return StreamInterface|null
    */
    public function getSquareLogo(): ?StreamInterface {
        return $this->squareLogo;
    }

    /**
     * Gets the squareLogoDark property value. A square dark version of your company logo that appears in Windows 10 out-of-box experiences (OOBE) and when Windows Autopilot is enabled for deployment. Allowed types are PNG or JPEG not larger than 240 x 240 pixels and not more than 10 KB in size. We recommend using a transparent image with no padding around the logo.
     * @return StreamInterface|null
    */
    public function getSquareLogoDark(): ?StreamInterface {
        return $this->squareLogoDark;
    }

    /**
     * Gets the squareLogoDarkRelativeUrl property value. A relative URL for the squareLogoDark property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @return string|null
    */
    public function getSquareLogoDarkRelativeUrl(): ?string {
        return $this->squareLogoDarkRelativeUrl;
    }

    /**
     * Gets the squareLogoRelativeUrl property value. A relative URL for the squareLogo property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @return string|null
    */
    public function getSquareLogoRelativeUrl(): ?string {
        return $this->squareLogoRelativeUrl;
    }

    /**
     * Gets the usernameHintText property value. A string that shows as the hint in the username textbox on the sign-in screen. This text must be a Unicode, without links or code, and can't exceed 64 characters.
     * @return string|null
    */
    public function getUsernameHintText(): ?string {
        return $this->usernameHintText;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('backgroundColor', $this->getBackgroundColor());
        $writer->writeBinaryContent('backgroundImage', $this->getBackgroundImage());
        $writer->writeStringValue('backgroundImageRelativeUrl', $this->getBackgroundImageRelativeUrl());
        $writer->writeBinaryContent('bannerLogo', $this->getBannerLogo());
        $writer->writeStringValue('bannerLogoRelativeUrl', $this->getBannerLogoRelativeUrl());
        $writer->writeCollectionOfPrimitiveValues('cdnList', $this->getCdnList());
        $writer->writeObjectValue('contentCustomization', $this->getContentCustomization());
        $writer->writeStringValue('customAccountResetCredentialsUrl', $this->getCustomAccountResetCredentialsUrl());
        $writer->writeStringValue('customCannotAccessYourAccountText', $this->getCustomCannotAccessYourAccountText());
        $writer->writeStringValue('customCannotAccessYourAccountUrl', $this->getCustomCannotAccessYourAccountUrl());
        $writer->writeBinaryContent('customCSS', $this->getCustomCSS());
        $writer->writeStringValue('customCSSRelativeUrl', $this->getCustomCSSRelativeUrl());
        $writer->writeStringValue('customForgotMyPasswordText', $this->getCustomForgotMyPasswordText());
        $writer->writeStringValue('customPrivacyAndCookiesText', $this->getCustomPrivacyAndCookiesText());
        $writer->writeStringValue('customPrivacyAndCookiesUrl', $this->getCustomPrivacyAndCookiesUrl());
        $writer->writeStringValue('customResetItNowText', $this->getCustomResetItNowText());
        $writer->writeStringValue('customTermsOfUseText', $this->getCustomTermsOfUseText());
        $writer->writeStringValue('customTermsOfUseUrl', $this->getCustomTermsOfUseUrl());
        $writer->writeBinaryContent('favicon', $this->getFavicon());
        $writer->writeStringValue('faviconRelativeUrl', $this->getFaviconRelativeUrl());
        $writer->writeStringValue('headerBackgroundColor', $this->getHeaderBackgroundColor());
        $writer->writeBinaryContent('headerLogo', $this->getHeaderLogo());
        $writer->writeStringValue('headerLogoRelativeUrl', $this->getHeaderLogoRelativeUrl());
        $writer->writeObjectValue('loginPageLayoutConfiguration', $this->getLoginPageLayoutConfiguration());
        $writer->writeObjectValue('loginPageTextVisibilitySettings', $this->getLoginPageTextVisibilitySettings());
        $writer->writeStringValue('signInPageText', $this->getSignInPageText());
        $writer->writeBinaryContent('squareLogo', $this->getSquareLogo());
        $writer->writeBinaryContent('squareLogoDark', $this->getSquareLogoDark());
        $writer->writeStringValue('squareLogoDarkRelativeUrl', $this->getSquareLogoDarkRelativeUrl());
        $writer->writeStringValue('squareLogoRelativeUrl', $this->getSquareLogoRelativeUrl());
        $writer->writeStringValue('usernameHintText', $this->getUsernameHintText());
    }

    /**
     * Sets the backgroundColor property value. Color that appears in place of the background image in low-bandwidth connections. We recommend that you use the primary color of your banner logo or your organization color. Specify this in hexadecimal format, for example, white is #FFFFFF.
     * @param string|null $value Value to set for the backgroundColor property.
    */
    public function setBackgroundColor(?string $value): void {
        $this->backgroundColor = $value;
    }

    /**
     * Sets the backgroundImage property value. Image that appears as the background of the sign-in page. The allowed types are PNG or JPEG not smaller than 300 KB and not larger than 1920 × 1080 pixels. A smaller image reduces bandwidth requirements and make the page load faster.
     * @param StreamInterface|null $value Value to set for the backgroundImage property.
    */
    public function setBackgroundImage(?StreamInterface $value): void {
        $this->backgroundImage = $value;
    }

    /**
     * Sets the backgroundImageRelativeUrl property value. A relative URL for the backgroundImage property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @param string|null $value Value to set for the backgroundImageRelativeUrl property.
    */
    public function setBackgroundImageRelativeUrl(?string $value): void {
        $this->backgroundImageRelativeUrl = $value;
    }

    /**
     * Sets the bannerLogo property value. A banner version of your company logo that appears on the sign-in page. The allowed types are PNG or JPEG not larger than 36 × 245 pixels. We recommend using a transparent image with no padding around the logo.
     * @param StreamInterface|null $value Value to set for the bannerLogo property.
    */
    public function setBannerLogo(?StreamInterface $value): void {
        $this->bannerLogo = $value;
    }

    /**
     * Sets the bannerLogoRelativeUrl property value. A relative URL for the bannerLogo property that is combined with a CDN base URL from the cdnList to provide the read-only version served by a CDN. Read-only.
     * @param string|null $value Value to set for the bannerLogoRelativeUrl property.
    */
    public function setBannerLogoRelativeUrl(?string $value): void {
        $this->bannerLogoRelativeUrl = $value;
    }

    /**
     * Sets the cdnList property value. A list of base URLs for all available CDN providers that are serving the assets of the current resource. Several CDN providers are used at the same time for high availability of read requests. Read-only.
     * @param array<string>|null $value Value to set for the cdnList property.
    */
    public function setCdnList(?array $value): void {
        $this->cdnList = $value;
    }

    /**
     * Sets the contentCustomization property value. Represents the content options to be customized throughout the authentication flow for a tenant. NOTE: Supported by Microsoft Entra External ID in external tenants only.
     * @param ContentCustomization|null $value Value to set for the contentCustomization property.
    */
    public function setContentCustomization(?ContentCustomization $value): void {
        $this->contentCustomization = $value;
    }

    /**
     * Sets the customAccountResetCredentialsUrl property value. A custom URL for resetting account credentials. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters.
     * @param string|null $value Value to set for the customAccountResetCredentialsUrl property.
    */
    public function setCustomAccountResetCredentialsUrl(?string $value): void {
        $this->customAccountResetCredentialsUrl = $value;
    }

    /**
     * Sets the customCannotAccessYourAccountText property value. A string to replace the default 'Can't access your account?' self-service password reset (SSPR) hyperlink text on the sign-in page. This text must be in Unicode format and not exceed 256 characters.
     * @param string|null $value Value to set for the customCannotAccessYourAccountText property.
    */
    public function setCustomCannotAccessYourAccountText(?string $value): void {
        $this->customCannotAccessYourAccountText = $value;
    }

    /**
     * Sets the customCannotAccessYourAccountUrl property value. A custom URL to replace the default URL of the self-service password reset (SSPR) 'Can't access your account?' hyperlink on the sign-in page. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters. DO NOT USE. Use customAccountResetCredentialsUrl instead.
     * @param string|null $value Value to set for the customCannotAccessYourAccountUrl property.
    */
    public function setCustomCannotAccessYourAccountUrl(?string $value): void {
        $this->customCannotAccessYourAccountUrl = $value;
    }

    /**
     * Sets the customCSS property value. CSS styling that appears on the sign-in page. The allowed format is .css format only and not larger than 25 KB.
     * @param StreamInterface|null $value Value to set for the customCSS property.
    */
    public function setCustomCSS(?StreamInterface $value): void {
        $this->customCSS = $value;
    }

    /**
     * Sets the customCSSRelativeUrl property value. A relative URL for the customCSS property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @param string|null $value Value to set for the customCSSRelativeUrl property.
    */
    public function setCustomCSSRelativeUrl(?string $value): void {
        $this->customCSSRelativeUrl = $value;
    }

    /**
     * Sets the customForgotMyPasswordText property value. A string to replace the default 'Forgot my password' hyperlink text on the sign-in form. This text must be in Unicode format and not exceed 256 characters.
     * @param string|null $value Value to set for the customForgotMyPasswordText property.
    */
    public function setCustomForgotMyPasswordText(?string $value): void {
        $this->customForgotMyPasswordText = $value;
    }

    /**
     * Sets the customPrivacyAndCookiesText property value. A string to replace the default 'Privacy and Cookies' hyperlink text in the footer. This text must be in Unicode format and not exceed 256 characters.
     * @param string|null $value Value to set for the customPrivacyAndCookiesText property.
    */
    public function setCustomPrivacyAndCookiesText(?string $value): void {
        $this->customPrivacyAndCookiesText = $value;
    }

    /**
     * Sets the customPrivacyAndCookiesUrl property value. A custom URL to replace the default URL of the 'Privacy and Cookies' hyperlink in the footer. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128 characters.
     * @param string|null $value Value to set for the customPrivacyAndCookiesUrl property.
    */
    public function setCustomPrivacyAndCookiesUrl(?string $value): void {
        $this->customPrivacyAndCookiesUrl = $value;
    }

    /**
     * Sets the customResetItNowText property value. A string to replace the default 'reset it now' hyperlink text on the sign-in form. This text must be in Unicode format and not exceed 256 characters. DO NOT USE: Customization of the 'reset it now' hyperlink text is currently not supported.
     * @param string|null $value Value to set for the customResetItNowText property.
    */
    public function setCustomResetItNowText(?string $value): void {
        $this->customResetItNowText = $value;
    }

    /**
     * Sets the customTermsOfUseText property value. A string to replace the the default 'Terms of Use' hyperlink text in the footer. This text must be in Unicode format and not exceed 256 characters.
     * @param string|null $value Value to set for the customTermsOfUseText property.
    */
    public function setCustomTermsOfUseText(?string $value): void {
        $this->customTermsOfUseText = $value;
    }

    /**
     * Sets the customTermsOfUseUrl property value. A custom URL to replace the default URL of the 'Terms of Use' hyperlink in the footer. This URL must be in ASCII format or non-ASCII characters must be URL encoded, and not exceed 128characters.
     * @param string|null $value Value to set for the customTermsOfUseUrl property.
    */
    public function setCustomTermsOfUseUrl(?string $value): void {
        $this->customTermsOfUseUrl = $value;
    }

    /**
     * Sets the favicon property value. A custom icon (favicon) to replace a default Microsoft product favicon on a Microsoft Entra tenant.
     * @param StreamInterface|null $value Value to set for the favicon property.
    */
    public function setFavicon(?StreamInterface $value): void {
        $this->favicon = $value;
    }

    /**
     * Sets the faviconRelativeUrl property value. A relative url for the favicon above that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @param string|null $value Value to set for the faviconRelativeUrl property.
    */
    public function setFaviconRelativeUrl(?string $value): void {
        $this->faviconRelativeUrl = $value;
    }

    /**
     * Sets the headerBackgroundColor property value. The RGB color to apply to customize the color of the header.
     * @param string|null $value Value to set for the headerBackgroundColor property.
    */
    public function setHeaderBackgroundColor(?string $value): void {
        $this->headerBackgroundColor = $value;
    }

    /**
     * Sets the headerLogo property value. A company logo that appears in the header of the sign-in page. The allowed types are PNG or JPEG not larger than 36 × 245 pixels. We recommend using a transparent image with no padding around the logo.
     * @param StreamInterface|null $value Value to set for the headerLogo property.
    */
    public function setHeaderLogo(?StreamInterface $value): void {
        $this->headerLogo = $value;
    }

    /**
     * Sets the headerLogoRelativeUrl property value. A relative URL for the headerLogo property that is combined with a CDN base URL from the cdnList to provide the read-only version served by a CDN. Read-only.
     * @param string|null $value Value to set for the headerLogoRelativeUrl property.
    */
    public function setHeaderLogoRelativeUrl(?string $value): void {
        $this->headerLogoRelativeUrl = $value;
    }

    /**
     * Sets the loginPageLayoutConfiguration property value. Represents the layout configuration to be displayed on the login page for a tenant.
     * @param LoginPageLayoutConfiguration|null $value Value to set for the loginPageLayoutConfiguration property.
    */
    public function setLoginPageLayoutConfiguration(?LoginPageLayoutConfiguration $value): void {
        $this->loginPageLayoutConfiguration = $value;
    }

    /**
     * Sets the loginPageTextVisibilitySettings property value. Represents the various texts that can be hidden on the login page for a tenant.
     * @param LoginPageTextVisibilitySettings|null $value Value to set for the loginPageTextVisibilitySettings property.
    */
    public function setLoginPageTextVisibilitySettings(?LoginPageTextVisibilitySettings $value): void {
        $this->loginPageTextVisibilitySettings = $value;
    }

    /**
     * Sets the signInPageText property value. Text that appears at the bottom of the sign-in box. Use this to communicate additional information, such as the phone number to your help desk or a legal statement. This text must be in Unicode format and not exceed 1024 characters.
     * @param string|null $value Value to set for the signInPageText property.
    */
    public function setSignInPageText(?string $value): void {
        $this->signInPageText = $value;
    }

    /**
     * Sets the squareLogo property value. A square version of your company logo that appears in Windows 10 out-of-box experiences (OOBE) and when Windows Autopilot is enabled for deployment. Allowed types are PNG or JPEG not larger than 240 x 240 pixels and not more than 10 KB in size. We recommend using a transparent image with no padding around the logo.
     * @param StreamInterface|null $value Value to set for the squareLogo property.
    */
    public function setSquareLogo(?StreamInterface $value): void {
        $this->squareLogo = $value;
    }

    /**
     * Sets the squareLogoDark property value. A square dark version of your company logo that appears in Windows 10 out-of-box experiences (OOBE) and when Windows Autopilot is enabled for deployment. Allowed types are PNG or JPEG not larger than 240 x 240 pixels and not more than 10 KB in size. We recommend using a transparent image with no padding around the logo.
     * @param StreamInterface|null $value Value to set for the squareLogoDark property.
    */
    public function setSquareLogoDark(?StreamInterface $value): void {
        $this->squareLogoDark = $value;
    }

    /**
     * Sets the squareLogoDarkRelativeUrl property value. A relative URL for the squareLogoDark property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @param string|null $value Value to set for the squareLogoDarkRelativeUrl property.
    */
    public function setSquareLogoDarkRelativeUrl(?string $value): void {
        $this->squareLogoDarkRelativeUrl = $value;
    }

    /**
     * Sets the squareLogoRelativeUrl property value. A relative URL for the squareLogo property that is combined with a CDN base URL from the cdnList to provide the version served by a CDN. Read-only.
     * @param string|null $value Value to set for the squareLogoRelativeUrl property.
    */
    public function setSquareLogoRelativeUrl(?string $value): void {
        $this->squareLogoRelativeUrl = $value;
    }

    /**
     * Sets the usernameHintText property value. A string that shows as the hint in the username textbox on the sign-in screen. This text must be a Unicode, without links or code, and can't exceed 64 characters.
     * @param string|null $value Value to set for the usernameHintText property.
    */
    public function setUsernameHintText(?string $value): void {
        $this->usernameHintText = $value;
    }

}
