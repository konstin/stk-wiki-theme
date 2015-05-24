<?php
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 *
 * TODO: language links
 */
class SuperTuxKartTemplate extends BaseTemplate {
    /**
     * Outputs the entire contents of the page
     */
    public function execute() {
$this->html( 'headelement' ); ?>

<div class="outerbox">


<div class="header_wrapper">
<div class="header_container generic-limit">


    <div class="nav-color-wrapper">

    
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
    </div>
    
    <a class="logo"
        href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ) ?>"
        <?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
    >
        <img
            src="<?php $this->text( 'logopath' ) ?>"
            alt="<?php $this->text( 'sitename' ) ?>"
        />
    </a>
    
    <div class="searchform"><form action="<?php $this->text( 'wgScript' ); ?>">
        <input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
        <?php echo $this->makeSearchInput( array( 'type' => 'text' ) ); ?>
        <!--?php //echo $this->makeSearchButton( 'go' ); -->

    </form>
    </div>
    
<!--
    <div class="login"><a href="#">Login | Register</a></div>

    <nav>
    <div class="nav-color-wrapper">
        <ul class="nav">
            <li><a href="/wiki/Discover" >Discover</a></li>
            <li><a href="/wiki/Download" >Download</a></li>
            <li><a href="/wiki/FAQ"      >FAQ</a></li>
            <li><a href="/wiki/Community">Community</a></li>
            <li><a href="/wiki/About"    >About</a></li>
            <li><a href="http://supertuxkart.blogspot.de/">Blog</a></li>
        </ul>
    </div>
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

    <div class="searchform"><form action="<?php $this->text( 'wgScript' ); ?>">
        <input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
        <?php echo $this->makeSearchInput( array( 'type' => 'text' ) ); ?>
        <!--?php //echo $this->makeSearchButton( 'go' ); -->

<!--
    </form></div>
    
    <div class="toolmenu">
        Tools
    </div>
-->

</div>
</div>


<div class="main-content-wrapper generic-limit">
<!--
<p>Me</p>
<ul class="toolbox">
<?php
foreach ( $this->getPersonalTools() as $key => $item ) {
    echo $this->makeListItem( $key, $item );
}
?>
</ul>

<p>Page</p>
<ul class="toolbox">
<?php
foreach ( $this->data['content_actions'] as $key => $item ) {
    echo $this->makeListItem( $key, $item );
}
?>
</ul>

<p>Tools</p>
<ul class="toolbox">
<?php
foreach ( $this->getToolbox() as $key => $item ) {
    echo $this->makeListItem( $key, $item );
}
?>
</ul>

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
-->

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
