<?php
# LocalSetting.php for the skin of https://supertuxkart.net

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}

###
# Actual options
###

$wgSitename = "SuperTuxKart";
$wgServer = "https://supertuxkart.net";

# Database settings
$wgDBtype = "mysql";
$wgDBserver = "localhost";
$wgDBname = "stk";
$wgDBuser = "stk";
$wgDBpassword = "*************";

# Shared memory settings
$wgMainCacheType = CACHE_ANYTHING;
$wgMemCachedServers = array();

# Piwik - comment out to deactivate
require_once "$IP/extensions/Piwik/Piwik.php";
$wgPiwikURL = "piwik.supertuxkart.net";
$wgPiwikIDSite = "1";

###
# Other Settings
###

# The URL structure
$wgScriptPath = "";
$wgArticlePath = "/$1";
$wgScriptExtension = ".php";
$wgUsePathInfo = true;
$wgResourceBasePath = $wgScriptPath;

# The skin
wfLoadSkin('SuperTuxKart');
$wgDefaultSkin = "SuperTuxKart";
$wgStylePath   = "$wgScriptPath/skins";
$wgLogo        = "$wgStylePath/SuperTuxKart/images/logo.png";
$wgFavicon     = "$wgStylePath/SuperTuxKart/images/favicon.png";

# Extensions
require_once "$IP/extensions/YouTube/YouTube.php";
require_once "$IP/extensions/CSS/CSS.php";
require_once "$IP/extensions/NativeSvgHandler/NativeSvgHandler.php";
require_once "$IP/extensions/IframePage/IframePage.php";
wfLoadExtension('ParserFunctions');

# Add custom namespace
# https://www.mediawiki.org/wiki/Manual:Using_custom_namespaces
define("NS_LEGACY", 3000); // This MUST be even.
$wgExtraNamespaces[NS_LEGACY] = "Legacy";
define("NS_LEGACY_TALK", 3001); // This MUST be the following odd integer.
$wgExtraNamespaces[NS_LEGACY_TALK] = "Legacy_talk"; // Note underscores in the namespace name.


# Prevent arbitrary account creation
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['*']['edit']          = false;
$wgGroupPermissions['*']['read']          = true;
$wgGroupPermissions['*']['createtalk']    = false;

# Necessary for e.g. the download page
$wgRawHtml = true;

# Image options
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgFileExtensions[] = 'svg';
$wgMaxImageArea = 100000000;

# Allow embedding itch.io
$wgIframePageSrc =  ['itchio' => 'https://itch.io/embed/83502'];

# wtf bots?
# https://www.mediawiki.org/wiki/Manual:Bot_passwords
$wgEnableBotPasswords = false;

###
# Secrets
###

$wgSecretKey = "REPLACE WITH REAL SECRET KEY";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "REPLACE WITH REAL UPGRADE KEY";

###
# Mediawiki boilerplate
###

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl  = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

## UPO means: this is also a user preference option
$wgEnableEmail         = true;
$wgEnableUserEmail     = true; # UPO
$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

$wgEmergencyContact = "mediawiki@" . $wgSitename;
$wgPasswordSender   = "mediawiki@" . $wgSitename;

# MySQL specific settings
$wgDBprefix = "";


###
# For Debugging
# DISABLE AFTER FINDING BUG
###
/*
error_reporting(-1);
ini_set('display_errors', 1);
$wgShowSQLErrors = true;
$wgDebugDumpSql = true;
$wgShowDBErrorBacktrace = true;
*/
