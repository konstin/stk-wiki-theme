<?
/**
 * STK, a MediaWiki skin for Super Tux Kart (http://supertuxkart.sf.net)
 * Version 1.0
 * Made for MediaWiki 1.5
 * By Tom Jenkins of www.icecubewebdesign.co.uk, 2009. Based on 'Clean' by Kevin Hughes, kev@kevcom.com, 11/17/2005
 *
 * Local settings that affect this skin (in LocalSettings.php):
 * $wgDefaultSkin       change to "stk" to use as your default skin
 * $wgSitename          this is displayed as the site name
 * $wgLanguageCode      this affects the UI language
 * $wgGroupPermissions  this affects whether or not editing widgets are shown
 * $wgRightsPage, etc.  this affects the copyright statement in the footer
 *
 * $wgLogo has no effect on this skin.
 *
 * @package MediaWiki
 * @subpackage Skins
 */

//error_reporting(1);

//if(!defined('MEDIAWIKI'))
//	die();

/** */
require_once('includes/SkinTemplate.php');


/**
 * @package MediaWiki
 * @subpackage Skins
 */
class SkinSTK extends SkinTemplate {
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'stk';
		$this->stylename = 'stk';
		$this->template  = 'STKTemplate';
	}
}

/**
 * @package MediaWiki
 * @subpackage Skins
 */
class STKTemplate extends QuickTemplate {

	/**
	 * @access private
	 */
	function execute() {
	    global $wgLanguageCode;
	    global $wgArticlePath;
	    global $wgSitename;
	    global $wgUser;

	    wfSuppressWarnings();

	    // Set up all needed template variables first!
	    $homeLink = htmlspecialchars($this->data['nav_urls']['mainpage']['href']);
	    // Language
	    $isEnglish = false;
	    if ($wgLanguageCode == "en") $isEnglish = true;
	    // Editing permissions
	    $canEdit = false;
	    if ($wgUser->isAllowed('edit')) $canEdit = true;

	    // Set up login text
	    $loginText = "";
	    foreach ($this->data['personal_urls'] as $key => $item):
		    $href = htmlspecialchars($item['href']);
		    $text = htmlspecialchars($item['text']);
		    if ($key == "userpage") $text = "My page";
		    if ($this->data['loggedin'] != 1)
		        $link = "    <a href='$href'>$text</a>\n";
	        else
        		$link = "    <li> <a href='$href'>$text</a> </li>\n";
		    if ($key == "anonlogin" || $key == "logout" || $key == "userpage" || $key == "preferences")
			    $loginText .= $link;
	    endforeach;
	    if (!$loginText && !$userpage):
		    $text = htmlspecialchars($this->translator->translate("userlogin"));
		    $path = str_replace('$1', "Special:Userlogin", $wgArticlePath);
		    $loginText = "    <a href='$path'>$text</a>\n";
	    endif;

	    // Navigation links
	    foreach ($this->data['nav_urls'] as $key => $item):
		    $href = htmlspecialchars($item['href']);
		    $text = htmlspecialchars($this->translator->translate($key));
		    $link = "<a href='$href'>$text</a>";

		    if ($key == "upload" && $isEnglish) $text = "Upload files";
		    if ($key == "recentchanges" && $isEnglish) $text = "Global changes";
		    if ($key == "help") $helpLink = $link;
		    if ($key == "recentchanges") $recentLink = $link;
		    if ($key == "upload") $uploadLink = $link;
		    if ($key == "specialpages") $specialLink = $link;
		    if ($key == "recentchangeslinked") $relatedLink = $link;
		    if ($key == "whatlinkshere") $linkingLink = $link;
	    endforeach;

	    // Content action links
	    foreach ($this->data['content_actions'] as $key => $item):
		    $href = htmlspecialchars($item['href']);
		    $text = htmlspecialchars($item['text']);
		    $link =  "<a href='$href'>$text</a>";

		    if ($key == "talk" && $isEnglish) $text = "Discuss";
		    if ($key == "history" && $isEnglish) $text = "Page changes";
		    if ($key == "move" && $isEnglish) $text = "Rename";
		    if ($key == "nstab-main") $text = $this->data['title'];
		    if ($key == "talk") $talkLink = $link;
		    if ($key == "edit") $editLink = $link;
		    if ($key == "history") $historyLink = $link;
		    if ($key == "protect") $protectLink = $link;
		    if ($key == "unprotect") $unprotectLink = $link;
		    if ($key == "delete") $deleteLink = $link;
		    if ($key == "move") $moveLink = $link;
		    if ($key == "watch") $watchLink = $link;
		    if ($key == "nstab-main") $pageLink = $link;
	    endforeach;

	    if (!$pageLink) $pageLink = $this->data['title'];

	    $text = htmlspecialchars($this->translator->translate("allpages"));
	    $path = str_replace('$1', "Special:Allpages", $wgArticlePath);
	    $allLink = "<a href='$path'>$text</a>";

	    $searchLabel = '<label for="searchField">' . htmlspecialchars($this->translator->translate("search")) . '</label>';
	    $newPageLabel = htmlspecialchars($this->translator->translate("newpage"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<? $this->text('lang') ?>" lang="<? $this->text('lang') ?>" dir="<? $this->text('dir') ?>">
<head>

    <meta http-equiv="Content-Type" content="<? $this->text('mimetype') ?>; charset=<? $this->text('charset') ?>" />

    <? $this->html('headlinks') ?>

    <title><? $this->text('pagetitle') ?></title>

    <!-- Wiki scripts -->
    <? if($this->data['jsvarurl']) { ?><script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('jsvarurl') ?>"></script><? } ?>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath') ?>/common/wikibits.js"></script>

    <!-- STK styles -->
    <link rel="stylesheet" type="text/css" media="screen, projection" href="<? $this->text('stylepath') ?>/<? $this->text('stylename') ?>/main.css" />
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" media="screen, projection" href="<? $this->text('stylepath') ?>/<? $this->text('stylename') ?>/ie6.css" />
    <![endif]-->

    <!-- STK scripts -->
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/lib/prototype-min.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/lib/effects-min.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/lib/accordion-min.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.wiki_controls.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.search_tidy.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.downloads.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.sub_sections.js"></script>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.init.js"></script>
    
    <!-- Don't use above scripting for IE6 (TODO: squish IE6 bugs to make this unnecessary)-->
    <!--[if lte IE 6]>
    <script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('stylepath');?>/<? $this->text('stylename'); ?>/scripts/stk.init.ie6.js"></script>
    <![endif]-->


    <!-- User styles -->
    <? if($this->data['usercss']) { ?><style type="text/css"><? $this->html('usercss') ?></style><? } ?>
    <style type="text/css"><? $this->html('usercss') ?></style>

    <!-- User scripts -->
    <? if($this->data['userjs']) { ?><script type="<? $this->text('jsmimetype') ?>" src="<? $this->text('userjs') ?>"></script><? } ?>
    <? if($this->data['userjsprev']) { ?><script type="<? $this->text('jsmimetype') ?>"><? $this->html('userjsprev') ?></script><? } ?>

</head>
<? 
    // Create ID for body tag
    $bodyId = str_replace(' ', '_', strtolower($this->data['title']));
    if (strpos($bodyId, ":") !== false):
        $bodyId = explode(":", $bodyId);
        $bodyId = $bodyId[1];
    endif;
?>
<body id="<? echo $bodyId;?>">

    <!-- Piwik analytics -->
    <script type="text/javascript">
    var pkBaseURL = (("https:" == document.location.protocol) ? "https://apps.sourceforge.net/piwik/supertuxkart/" : "http://apps.sourceforge.net/piwik/supertuxkart/");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
    piwik_action_name = '';
    piwik_idsite = 1;
    piwik_url = pkBaseURL + "piwik.php";
    piwik_log(piwik_action_name, piwik_idsite, piwik_url);
    </script>
    <object><noscript><p><img src="http://apps.sourceforge.net/piwik/supertuxkart/piwik.php?idsite=1" alt="piwik"/></p></noscript></object>
    <!-- End Piwik analytics -->

    <div id="head">
        <a id="logo" href="<? echo $homeLink ?>">
            <img alt="Super Tux Kart" src="<? $this->text('stylepath') ?>/<? $this->text('stylename') ?>/images/head/logo.png" />
        </a>
    </div>

    <!-- Navigation -->
    <?
	    $siteURL='../../';
    ?>
    <div id="nav">
        <!-- Top-level pages -->
        <ul id="topLevel">
    <?
	    echo '      <li><a href="' .  $siteURL . 'Discover">Discover STK</a></li>'."\n";
	    echo '      <li><a href="' .  $siteURL . 'Downloads">Download</a></li>'."\n";
	    echo '      <li><a href="' .  $siteURL . 'FAQ"><abbr title="Frequently Asked Questions">FAQ</abbr></a></li>'."\n";
	    echo '      <li><a href="' .  $siteURL . 'Get_involved">Get involved</a></li>'."\n";
	    echo '      <li><a href="' .  $siteURL . 'Community">Community</a></li>'."\n";
	    echo '      <li><a href="http://supertuxkart.blogspot.com/">Blog</a></li>'."\n";
    ?>
        </ul>
    </div>

    <!-- Page content -->
    <div id="content">
<?
    // If this isn't the front page, show the page title
    if ($this->data['title'] != 'Main Page' && $this->data['title'] != 'Main Page New') echo '<h1 id="page_title">'.$this->data['title'].'</h1>';
?>

<?
    // A few things must be done to the content in
    // order to make it more CSS-friendly
    $openP = false;
    $openSpan = false;
    if ($_REQUEST['title'] == "Special:Search") {
        echo "<span id='searchContent'>";
        $openSpan = true;
    } else if (strstr($_REQUEST['title'], "Special:Recentchangeslinked")
    !== false) {
        echo "<span id='relatedChanges'>";
        $openSpan = true;
    } else if ($_REQUEST['title'] == "Special:Userlogout") {
        $openP = true;
    } else if (strstr($_REQUEST['title'], "Special:Recentchangeslinked")
    != false) {
        $openP = true;
    }
    if ($_REQUEST['action'] == "history")
        $openP = true;

    if ($openP) echo "<p>";
    //echo "<div id='emptyDiv'></div>\n";

	$bodytext = $this->data['bodytext'];
	$bodytext = preg_replace("/editsection.*\[(.*)\]/", "editsection\">$1", $bodytext);
	echo $bodytext;

	if ($openP)
		echo "</p>";
	if ($openSpan)
		echo "</span>";

	if ($this->data['catlinks']) {
		echo '<div id="catlinks">';
		$this->html('catlinks');
		echo '</div>';
	}
?>

        <!-- Wiki controls & search (these will be moved by the WikiControls class to the top of #content -->
        <h2 id="heading_controls"> User Tools </h2>
        <div id="wikiControls">
            <? echo $helpLink; ?>

            <div id="search">
                <form id="searchForm" name="searchForm" action="<? $this->text('searchaction') ?>">
                    <? echo $searchLabel; ?>
                    <input
                        id="searchField"
                        name="search"
                        type="text"
                        accesskey="<? $this->msg('accesskey-search') ?>" value="<? $this->text('search') ?>" />
                </form>
            </div>
            
            <div id="userLinks">
                <?
                  if ($this->data['loggedin'] != 1):
                    echo '<span class="login">'.$loginText.'</span>';
                  else:
                ?>
                <span class="toggle"> Me </span>
                <ul id="userMenu">
                    <? echo $loginText; ?>
                </ul>
                <? endif; ?>
            </div>
            

            <!-- Edit menu -->
            <div id="editMenu">
            <?
                //if ($editLink && $canEdit):
            ?>
                <span class="toggle"> Wiki </span>
                <ul id="editMiniMenu">
                    <li class="wikiThis">
                        <span class="label">This page</span>
                        <ul>
                            <? if ($editLink && $canEdit): ?> <li> <? echo $editLink; ?> </li> <? endif; ?>
                            <? if ($protectLink && $canEdit): ?> <li> <? echo $protectLink; ?> </li> <? endif; ?>
                            <? if ($unprotectLink && $canEdit): ?> <li> <? echo $unprotectLink; ?> </li> <? endif; ?>
                            <? if ($deleteLink && $canEdit): ?> <li> <? echo $deleteLink; ?> </li> <? endif; ?>
                            <? if ($moveLink && $canEdit): ?> <li> <? echo $moveLink; ?> </li> <? endif; ?>
                            <? if ($talkLink): ?> <li> <? echo $talkLink; ?> </li> <? endif; ?>
                            <? if ($watchLink): ?> <li> <? echo $watchLink; ?> </li> <? endif; ?>
                            <? if ($historyLink): ?> <li> <? echo $historyLink; ?> </li> <? endif; ?>
                            <? if ($relatedLink): ?> <li> <? echo $relatedLink; ?> </li> <? endif; ?>
                            <? if ($linkingLink): ?> <li> <? echo $linkingLink; ?> </li> <? endif; ?>
                        </ul>
                    </li>

                    <li class="wikiOther">
                        <span class="label">Other</span>
                        <ul>
                            <li> <? echo $allLink; ?> </li>
                            <li> <? echo $specialLink; ?> </li>
                            <li> <? echo $recentLink; ?> </li>
                            <li> <? echo $uploadLink; ?> </li>
                        </ul>
                    </li>  
                </ul>
            <?
                //endif;
            ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="foot">
        <span id="site_credits"> Site design by Tom Jenkins of <a href="http://www.tntwebmedia.com" title="Web design, development and writing by TNT Web Media">TNT Web Media</a> </span>

    <?
	    $modtime = $this->data['lastmod'];
	    $pos = strpos($modtime, "modified");
	    $modtime = substr($modtime, $pos + 9);
	    $modtime = str_replace(",", "", $modtime);
	    $modtime = str_replace(".", "", $modtime);
	    $prefix = substr($modtime, 0, 5);
	    $suffix = substr($modtime, 6);
	    $time = strtotime($suffix);
	    $year = date("Y", $time);
	    $day = date("j", $time);
	    $month = date("n", $time);
	    $pieces = explode(":", $prefix);
	    $hour = $pieces[0];
	    $minute = $pieces[1];
	    $time = mktime($hour, $minute, $second, $month, $day, $year);
	    if ($time > 0) {
		    echo '<div id="last_mod"> Updated ' . date("F j, Y g:i a", $time) . '</div>';
	    }
    ?>

        <a id="sf_logo" href="http://sourceforge.net">
            <img alt="Powered by SourceForge.net" src="http://sflogo.sourceforge.net/sflogo.php?group_id=202302&amp;type=1" />
        </a>
    </div>

</body>
</html>

<?
    	wfRestoreWarnings();
	}
}

?>
