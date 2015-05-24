<?php
class SuperTuxKartTemplate extends BaseTemplate {
    /**
     * This is function is used to create the entire page
     */
    public function execute() {
$this->html( 'headelement' ); ?>

<div class="outerbox"> <!-- currently unused -->


<!-- Header --------------------------------------------------------------------------------------->
<div class="header_wrapper">
<div class="header_color_wrapper generic-limit">
<div class="header_container">
    <nav>
    <ul class="nav">
            <li><a href="/wiki/Discover" >Discover</a></li>
            <li><a href="/wiki/Download" >Download</a></li>
            <li><a href="/wiki/FAQ"      >FAQ</a></li>
            <li><a href="/wiki/Community">Community</a></li>
            <li><a href="/wiki/About"    >About</a></li>
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


<!-- Main content --------------------------------------------------------------------------------->
<div class="main-content-wrapper generic-limit">


<!-- Toolbox -------------------------------------------------------------------------------------->
<div class="toolbox_wrapper">
    <p class="toolbox_title">Tool box</p>

    <div class="toolbox_section">
        <p>Me</p>
        <ul class="toolbox">
        <?php
        foreach ( $this->getPersonalTools() as $key => $item ) {
            echo $this->makeListItem( $key, $item );
        }
        ?>
        </ul>
    </div>

    <div class="toolbox_section">
        <p>Page</p>
        <ul class="toolbox">
        <?php
        foreach ( $this->data['content_actions'] as $key => $item ) {
            echo $this->makeListItem( $key, $item );
        }
        ?>
        </ul>
    </div>

    <div class="toolbox_section">
        <p>Tools</p>
        <ul class="toolbox">
        <?php
        foreach ( $this->getToolbox() as $key => $item ) {
            echo $this->makeListItem( $key, $item );
        }
        ?>
        </ul>
    </div>

    <div class="toolbox_section">
        <p>Language Links</p>
        <ul>
        <?php
        if ( $this->data['language_urls'] ) {
            foreach ( $this->data['language_urls'] as $key => $langLink ) {
                echo $this->makeListItem( $key, $langLink );
            }
        }
        ?>
        </ul>
    </div>
</div>

<div class="content_wrapper">
<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>

<?php $this->html( 'bodytext' ) ?>
</div>

</div>

<?php $this->printTrail(); ?>

</div> <!-- main-content-wrapper -->

</body>
</html><?php
    }
}

?>
