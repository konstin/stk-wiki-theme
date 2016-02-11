<?php
/**
 * Foo Bar skin
 *
 * @file
 * @ingroup Skins
 * @author Jean-Manuel Clemencon (Design), konstin (Programming)
 * @license CC-BY-SA
 */

if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );
}

$wgExtensionCredits['skin'][] = array(
    'path' => __FILE__,
    'name' => 'SuperTuxKart',
    'namemsg' => 'SuperTuxKart',
    'version' => '1.0',
    'url' => 'https://github.com/konstin/STK-wiki-theme',
    'author' => array('Jean-Manuel Clemencon (Design)', 'konstin (Programming)'),
    'descriptionmsg' => 'A Skin for the Website of SuperTuxKart',
    'license' => '',
);

$wgValidSkinNames['supertuxkart'] = 'SuperTuxKart';

$wgAutoloadClasses['SkinSuperTuxKart'] = __DIR__ . '/SuperTuxKart.skin.php';
$wgAutoloadClasses['SuperTuxKartTemplate'] = __DIR__ . '/SuperTuxKartTemplate.php';
$wgMessagesDirs['SuperTuxKart'] = __DIR__ . '/i18n';

$wgResourceModules['skins.supertuxkart'] = array(
    'position' => 'bottom',
    'styles' => array(
        'supertuxkart.less' => array( 'media' => 'screen' ),
        'css/font-awesome.min.css' => array( 'media' => 'screen' ),
    ),

    'remoteSkinPath' => 'SuperTuxKart',
    'localBasePath' => __DIR__,
);

$wgResourceModules['skins.supertuxkart.dropdown.js'] = array(
    'scripts' => array(
        'js/responsive-youtube-video-size.js',
    ),

    'remoteSkinPath' => 'SuperTuxKart',
    'localBasePath' => __DIR__,
);

?>
