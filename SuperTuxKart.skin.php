<?php
/**
 * SkinTemplate class for Foo Bar skin
 * @ingroup Skins
 */
class SkinSuperTuxKart extends SkinTemplate {
    var $skinname = 'supertuxkart', $stylename = 'SuperTuxKart',
        $template = 'SuperTuxKartTemplate', $useHeadElement = true;

    /**
     * Add JavaScript via ResourceLoader
     *
     * Uncomment this function if your skin has a JS file or files.
     * Otherwise you won't need this function and you can safely delete it.
     *
     * @param OutputPage $out
     */
    /*
    public function initPage( OutputPage $out ) {
        parent::initPage( $out );
        $out->addModules( 'skins.supertuxkart.js' );
    }
    */

    /**
     * Add CSS via ResourceLoader
     *
     * @param $out OutputPage
     */
    function setupSkinUserCss( OutputPage $out ) {
        parent::setupSkinUserCss( $out );
        $out->addModuleStyles( array(
           'skins.supertuxkart' //  'mediawiki.skinning.interface' <- default styles
        ) );
    }
}
