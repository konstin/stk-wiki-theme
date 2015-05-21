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

<div class="login"><a href="#">Login | Register</a></div>

<a class="logo"
    href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ) ?>"
    <?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
>
    <img
        src="<?php $this->text( 'logopath' ) ?>"
        alt="<?php $this->text( 'sitename' ) ?>"
    />
</a>

<nav>
    <ul class="nav">
        <li><a href="#">Discover</a></li>
        <li><a href="#">Download</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">Blog</a></li>
    </ul>
</nav>


<div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-menu">
        <h5>General</h5>
        <ul>
        <?php
            foreach ( $this->data['content_actions'] as $key => $tab ) {
                echo $this->makeListItem( $key, $tab );
            }
        ?>
        </ul>

        <?php
        foreach ( $this->getSidebar() as $boxName => $box ) { ?>
        <div id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>"<?php echo Linker::tooltip( $box['id'] ) ?>>
            <h5><?php echo htmlspecialchars( $box['header'] ); ?></h5>
        <?php
            if ( is_array( $box['content'] ) ) { ?>
            <ul>
        <?php
                foreach ( $box['content'] as $key => $item ) {
                    echo $this->makeListItem( $key, $item );
                }
        ?>
            </ul>
        <?php
            } else {
                echo $box['content'];
            }
        } ?>
    </div>
</div>


<div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip">
    <div class="jq-dropdown-panel">
        You can put whatever HTML you want in a panel!
    </div>
</div>


<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>

<?php $this->html( 'bodytext' ) ?>

<?php $this->printTrail(); ?>

</div>

</body>
</html><?php
    }
}

?>
