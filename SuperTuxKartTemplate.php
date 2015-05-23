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
<div class="login"><a href="#">Login | Register</a></div>

<nav>
<div class="nav-color-wrapper">
    <ul class="nav">
        <li><a href="<?php echo htmlspecialchars($this->data['nav_urls']['discover']['href']) ?>">Discover</a></li>
        <li><a href="#">Download</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">About</a></li>
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
</div>


<div class="main-content-wrapper">

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



<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>

<?php $this->html( 'bodytext' ) ?>

</div>

<?php $this->printTrail(); ?>

</div> <!-- main-content-wrapper -->

</body>
</html><?php
    }
}

?>
