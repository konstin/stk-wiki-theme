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

<?php $this->printTrail(); ?>
</div> <!-- main-content-wrapper -->


<?php /* - Footer (copyright section, various menu etc) -------------------------------------- */ ?>
<div class="footer-wrapper">

<div class="footer-links">
<table>
<?php

// Data to be displayed at the end
$footerSection = array (
    0 => array (
        0 => 'Community',
        1 => 'Forum',
        2 => 'Blog',
        3 => 'Twitter',
        4 => 'Addons',
        5 => 'irc: #stk@freenode'
    ),
    1 => array (
        0 => 'Media',
        1 => 'YouTube',
        2 => 'Screenshots',
        3 => 'Posters'
    ),
    2 => array (
        0 => 'Developement',
        1 => 'Modding SuperTuxKart',
        2 => 'GitHub',
        3 => 'Technical Documentation'
    ),
    3 => array (
        0 => 'About Us',
        1 => 'FAQ',
        2 => 'Who we are',
        3 => 'SuperTuxKart used in projects',
        4 => 'Terms and Conditions'
    )
);


$content = "<table>\n";

// This loop makes the link footer link table
for ($inner=0; $inner < count($footerSection[0]); $inner++) {
    $content .= "<tr>";

    // Generating table cell
    for ($outer=0; $outer < count($footerSection); $outer++) {
        // First row is an header
        $tag = ($inner == 0) ? "th" : "td";
        // detect if there is no row. Put empty content
        if(count($footerSection[$outer]) <= $inner) {
            $content .= "<$tag></$tag>";
        } else {
            $content .= "<$tag>{$footerSection[$outer][$inner]}</$tag>";
        }
    }

    $content .= "</tr>\n";
}

$content .= "</table>\n";

echo $content;


?>
</table>
</div>

<div class="footer-copyright">
(c) 2015 STK dev team<br />
Powered by Media Wiki<br />
Site design by Konstin & Sam<br /><br />

STK Developement Team © 2015
</div>

</div>

</body>
</html><?php
    }
}

?>
