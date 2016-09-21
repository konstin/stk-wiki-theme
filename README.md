# STK-wiki-theme

A modern and responsive wiki skin for the website of SuperTuxKart.

## Installation
A webserver with PHP and mysql and a mail server are required.

Download MediaWiki and go to the mediawiki directory. Clone this skin into a
folder called `skins/SuperTuxKart`. Copy `skins/SuperTuxKart/LocalSettings.template.php`
to `LocalSettings.php`. Replace the values of `$wgSecretKey` and `$wgUpgradeKey`
with real secret keys.

Create a mysql database with a corresponding user and put their values in the
database section of `LocalSettings.php`.

Download the following extension and unpack them in the `extensions` folder.
 * [Youtube](https://www.mediawiki.org/wiki/Extension:YouTube)
 * [CSS](https://www.mediawiki.org/wiki/Extension:CSS)
 * [NativeSvgHandler](https://www.mediawiki.org/wiki/Extension:NativeSvgHandler).
 * [IframePage](https://www.mediawiki.org/wiki/Extension:IframePage).

Now you can configure your webserver to serve the wiki.

## Coding Convetions
 * All stylesheets are written in less, stored in the `css/` folder and included in `supertuxkart.less`.
 * Values such as colors that will be used in multiple location are declared as variables in `css/general.less`
 * All code is indented with 4 spaces
 * Avoid javascript wherever possible
 * Avoid loading resources from external server due to privacy and availability issues
 * All custom fonts are saved in the `fonts` folder in different formats and included using `@font-face`
