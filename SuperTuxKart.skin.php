<?php
/**
 * SkinTemplate class for Foo Bar skin
 * @ingroup Skins
 */
class SkinSuperTuxKart extends SkinTemplate {
    var $skinname       = 'supertuxkart',
        $stylename      = 'SuperTuxKart',
        $template       = 'SuperTuxKartTemplate',
        $useHeadElement = true;

    /** Add Javascript declared in SuperTuxKart.php through $wgResourceModules here **/
    public function initPage(OutputPage $out) {
        parent::initPage($out);
        $out->addModules('skins.supertuxkart.dropdown.js');
        $out->addHeadItem('scaling1', '<meta name="viewport" content="user-scalable = yes">');
        $out->addHeadItem('scaling2', '<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    }

    /** Add CSS declared in SuperTuxKart.php through $wgResourceModules here **/
    function setupSkinUserCss(OutputPage $out) {
        parent::setupSkinUserCss($out);
        $out->addModuleStyles(array(
           'skins.supertuxkart', //  'mediawiki.skinning.interface' <- default styles
        ));
    }
}
