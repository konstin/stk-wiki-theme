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
            <li><a href="/wiki/Discover" >Discover</a></li>
            <li><a href="/wiki/Download" >Download</a></li>
            <li><a href="/wiki/FAQ"      >FAQ</a></li>
            <li><a href="/wiki/Community">Community</a></li>
            <li><a href="/wiki/About"    >About</a></li>
            <li><a href="http://addons.supertuxkart.net">Add-ons</a></li>
            <li><a href="http://supertuxkart.blogspot.de/">Blog</a></li>
    </ul>
    </nav>

    <a class="logo"
        href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ) ?>"
        <?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
    >
        <img
            src="<?php $this->text( 'logopath' ) ?>"
            alt="<?php $this->text( 'sitename' ) ?>"
        />
    </a>

    <div class="searchform">
        <form action="<?php $this->text( 'wgScript' ); ?>">
            <input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
            <?php echo $this->makeSearchInput( array( 'type' => 'text' ) ); ?>
        </form>

        <!--div class="toolmenu">
            Tools
        </div-->

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

$user_tools = array("history", "whatlinkshere", "permalink", "info", "specialpages");

$all_tools = array_merge($this->getPersonalTools(), $this->data['content_actions'], $this->getToolbox());
?>

<div class="toolbox">
    <p class="toolbox_title">Tools</p>

    <?php foreach ($admin_tools as $tool) { ?>
        <div class="toolbox_section">
            <p><?php echo $tool["name"] ?></p>
            <ul>
            <?php
            foreach ($tool["tools"] as $toolname) {
                foreach ($all_tools as $key => $item ) {
                    if ($key == $toolname) {
                        echo $this->makeListItem($key, $item);
                        break; // Just to be sure
                    }
                }
            }
            ?>
            </ul>
        </div>
    <?php } ?>

    <div class="toolbox_section">
        <p>Language Links</p>
        <ul>
        <?php
        if ($this->data['language_urls']) {
            foreach ($this->data['language_urls'] as $key => $item) {
                echo $this->makeListItem($key, $item);
            }
        }
        ?>
        </ul>
    </div>
</div>

<div class="content_wrapper">
<div class="tool-icons">
    <a href="#" class="fa fa-globe fa-lg language-dropdown">
    <div style="display: none;">
        <ul>
        <li>Language 1</li>
        <li>Language 2</li>
        <li>Language 3</li>
        </ul>
    </div>
    </a>
    <a href="#" class="fa fa-cog fa-lg options-dropdown">
    <div style="display: none;">
        <ul>
        <?php
        foreach ($user_tools as $toolname) {
            foreach ($all_tools as $key => $item ) {
                if ($key == $toolname) {
                    echo $this->makeListItem($key, $item);
                    break; // Just to be sure
                }
            }
        }
        ?>
        </ul>
    </div>
    </a>
</div>
<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>

<?php $this->html( 'bodytext' ) ?>
</div>

</div>

plopy wood
<?php $this->printTrail(); ?>
mercury water
</div> <!-- main-content-wrapper -->

</body>
</html><?php
    }
}

?>
