# STK-wiki-theme

The new wiki theme for SuperTuxKart. Nothing more, nothing less.

## Installation

The theme is based on mediawiki, so first of all you'll need to download and install MediaWiki.

When mediaiwiki is ready, you need to download the skin to the `skins` folder. Now you should have a new folder called `skins/stk-wiki-theme`. Rename that folder to `SuperTuxKart`.

To register the skin, open `LocalSettings.php` and add the following line at the bottom:
```require_once "$IP/skins/SuperTuxKart/SuperTuxKart.php";```

If you want to use this skin with the SuperTuxKart wiki pages, you also need to install two mediawiki extensions: [Youtube](https://www.mediawiki.org/wiki/Extension:YouTube) and [CSS](https://www.mediawiki.org/wiki/Extension:CSS).

## Coding Convetions
 * All stylesheets are written in less, stored in the `css/` folder and included in `supertuxkart.less`.
 * Values such as colors that will be used in multiple location are declared as variables in `css/general.less`
 * All code is indented with 4 spaces
 * Avoid javascript wherever possible
 * Avoid loading resources from external server due to privacy and availability issues
 * All custom fonts are saved in the `fonts` folder in different formats and included using `@font-face`

