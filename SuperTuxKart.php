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
    'namemsg' => 'skinname-supertuxkart',
    'version' => '1.0',
    'url' => 'https://www.mediawiki.org/wiki/Skin:SuperTuxKart',
    'author' => '[Jean-Manuel Clemencon (Design), konstin (Programming)]',
    'descriptionmsg' => 'supertuxkart-desc',
    'license' => 'CC-BY-SA',
);

$wgValidSkinNames['supertuxkart'] = 'SuperTuxKart';

$wgAutoloadClasses['SkinSuperTuxKart'] = __DIR__ . '/SuperTuxKart.skin.php';
$wgAutoloadClasses['SuperTuxKartTemplate'] = __DIR__ . '/SuperTuxKartTemplate.php';
$wgMessagesDirs['SuperTuxKart'] = __DIR__ . '/i18n';

$wgResourceModules['skins.supertuxkart'] = array(
    'styles' => array(
        'supertuxkart.css' => array( 'media' => 'screen' ),
    ),

    'remoteSkinPath' => 'SuperTuxKart',
    'localBasePath' => __DIR__,
);



?>
