<?php
class SuperTuxKartTemplate extends BaseTemplate {
    /**
     * This is function is used to create the entire page
     */
    public function execute() {
$this->html( 'headelement' ); ?>

<div class="outerbox"> <!-- currently unused -->


<?php /* - Header ---------------------------------------------------------------------------- */ ?>
<div class="header_wrapper">
<div class="header_color_wrapper_outer">
<div class="header_color_wrapper_inner">
<div class="navigation-tools">
    <nav>
    <ul class="nav">
        <li><a href="/wiki/Discover" >Discover </a></li>
        <li><a href="/wiki/Download" >Download </a></li>
        <li><a href="/wiki/FAQ"      >FAQ      </a></li>
        <li><a href="/wiki/Community">Community</a></li>
    </ul>
    </nav>

    <a class="logo"
        href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']) ?>"
        <?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('p-logo')) ?>
    >
        <img src="<?php $this->text('logopath') ?>" alt="<?php $this->text('sitename') ?>" />
    </a>

    <div class="searchform">
        <form action="<?php $this->text( 'wgScript' ); ?>">
            <input type="hidden" name="title" value="<?php $this->text('searchtitle') ?>" />
            <?php echo $this->makeSearchInput( array('type' => 'text') ); ?>
        </form>
        <i class="fa fa-search"></i>
    </div>

</div>
</div>
</div>
</div>


<?php /* - Main Content ---------------------------------------------------------------------- */ ?>
<div class="main-content-wrapper">

<?php /* - Toolbox --------------------------------------------------------------------------- */ ?>
<?php
$admin_tools = array( array("name" => "Actions", "tools" => array("edit", "move", "protect", "delete", "watch")),
                      array("name" => "Page",    "tools" => array("history", "whatlinkshere", "permalink", "info")),
                      array("name" => "Me",      "tools" => array("specialpages", "preferences", "watchlist", "mycontris", "logout")));

$user_tools = array("history", "whatlinkshere", "permalink", "info", "specialpages", "login");

$all_tools = array_merge($this->getPersonalTools(), $this->data['content_actions'], $this->getToolbox());

// Even goole didn't know a better to do that ...
$logged_in = false;
foreach ($all_tools as $key => $item ) {
    if ($key == "logout") {
        $logged_in = true;
    }
}
?>

<div class="content_wrapper">
<div class="tool-icons">
    <?php if ($this->data['language_urls'] and count($this->data['language_urls']) > 0) { ?>
    <div class="tool-dropdown language-dropdown">
        <button href="#" class="fa fa-globe fa-lg"></button>
        <div style="display: none;">
            <ul> <?php
            foreach ($this->data['language_urls'] as $key => $item) {
                echo $this->makeListItem($key, $item);
            }
            ?> </ul>
        </div>
    </div>
    <?php } ?>

    <div class="tool-dropdown options-dropdown">
        <button href="#" class="fa fa-cog fa-lg"></button>
        <div class="toolbox" style="display: none;">
            <p class="toolbox_title">Tools</p>

            <?php if ($logged_in) {
                 foreach ($admin_tools as $tool) { ?>
                    <div class="toolbox_section">
                        <p><?= $tool["name"] ?></p>
                        <ul>
                        <?php
                        foreach ($tool["tools"] as $toolname) {
                            foreach ($all_tools as $key => $item ) {
                                if ($key == $toolname) {
                                    echo $this->makeListItem($key, $item);
                                }
                            }
                        }
                        ?>
                        </ul>
                    </div>
                <?php }
            } else { ?>
                <ul>
                <?php
                foreach ($user_tools as $toolname) {
                    foreach ($all_tools as $key => $item ) {
                        if ($key == $toolname) {
                            echo $this->makeListItem($key, $item);
                        }
                    }
                }
                ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>


<?php /* Main Content ----------------------------------------------------------------------- */ ?>

<?php if ($this->data['title'] != 'Main Page') { ?>
    <h1 class="article-title"><?php $this->html('title') ?></h1>
<?php } ?>
<article>
<?php $this->html('bodytext') ?>
</article>
</div>

</div>

</div> <!-- main-content-wrapper -->


<?php /* - Footer (copyright section, various menu etc) -------------------------------------- */ ?>
<footer>

<div class="footer-links">
<?php

// Data to be displayed at the end
$footer_section = array (
    array( 'heading' => 'Community', 'entries' => array (
        array('Forum', 'http://forum.freegamedev.net/viewforum.php?f=16'),
        array('Blog', 'http://supertuxkart.blogspot.com/'),
        array('Twitter', 'https://twitter.com/supertuxkart'),
        array('Addons', 'http://addons.supertuxkart.net/'),
        array('irc: #stk@freenode', 'http://webchat.freenode.net?channels=%23stk&uio=d4')
    )),
    array( 'heading' => 'Media', 'entries' => array (
        array('YouTube', 'https://www.youtube.com/channel/UCJ9hmn6MG_ggpQUhmbMS2mQ'),
        array('Pictures', '/wiki/Pictures'),
        array('Posters', '/wiki/Posters')
    )),
    array( 'heading' => 'Developement', 'entries' => array (
        array('Modding', '/wiki/Track_Maker%27s_Guide'),
        array('GitHub', 'https://github.com/supertuxkart/stk-code'),
        array('Doxygen', 'http://supertuxkart.sourceforge.net/doxygen')
    )),
    array( 'heading' => 'About us', 'entries' => array (
        array('FAQ', '/wiki/FAQ'),
        array('Who we are', '/wiki/Team'),
        array('About SuperTuxKart', '/wiki/About_SuperTuxKart'),
        array('Projects using SuperTuxKart', '/wiki/Projects'),
    ))
);
?>

<?php
// This loop makes the link footer link table
foreach ($footer_section as $column) { ?>
    <div><p> <?= $column['heading'] ?> </p>
    <ul>

    <?php // Generating table cell
    foreach ($column['entries'] as $entry) { ?>
        <li><a href='<?= $entry[1] ?>'> <?= $entry[0] ?> </a></li>
    <?php } ?>

    </ul>
    </div>
<?php } ?>
</div>

<div class="footer-copyright">
Site design by Konstin & Sam<br />
Powered by <a href="https://www.mediawiki.org/wiki/MediaWiki">MediaWiki</a><br /><br />

SuperTuxKart Team © 2015
</div>

</footer>

<?php $this->printTrail(); // includes scripts etc. ?>

</body>
</html><?php
    }
}

?>
