<?php
// $Id: page.tpl.php,v 1.14.2.10 2009/11/05 14:26:26 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <meta name="description" content="Boston's entrepreneur hub for jobs, events, news, resources and organizations." />
<meta name="keywords" content="entrepreneur, entrepreneurial, boston, resources, events, entreprenuer events, young entrepreneurs, getting started, boston entrepreneur, boston startup, startup, startups, jobs" />
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $body_classes; ?>">

  <div id="page"><div id="page-inner">

    <a name="navigation-top" id="navigation-top"></a>
    <!--- 
    <?php if ($primary_links || $secondary_links || $navbar): ?>
      <div id="skip-to-nav"><a href="#navigation"><?php print t('Skip to Navigation'); ?></a></div>
    <?php endif; ?>
	--->
    <div id="header">
      <div id="header-inner" class="clear-block">
        <div id="header-top" class="clear-block">
          <?php if ($logo || $site_name || $site_slogan): ?>
          <div id="logo-title">
            <?php if ($logo): ?>
            <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" id="logo-image" /></a></div>
            <?php endif; ?>
            <img id="header-mantra" src="/sites/all/themes/horns_of_green/images/common/common_header_mantra.jpg" alt="Mantra" title="Mantra" />
            <?php if ($site_name): ?>
            <?php if ($title): ?>
            <div id="site-name"><strong> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <?php print $site_name; ?> </a> </strong></div>
            <?php else: ?>
            <h1 id="site-name"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <?php print $site_name; ?> </a> </h1>
            <?php endif; ?>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div>
          <!-- /#logo-title -->
          <?php endif; ?>
          <?php if(!$logged_in): ?>
          <div id="header-top-user">
            <?php if($header_login) { print $header_login; } ?>
          </div>
          <?php else: ?>
          	<div id="header-top-user-info">
          		<a href="<?php print "/user/" . $user->uid; ?>">My Account</a> | 
                <a href="/logout">Log Out</a>
          	</div>
          <?php endif; ?>
        </div>
        <div id="header-middle">
          <div id="navbar">
            <div id="navbar-inner" class="clear-block region region-navbar"> <?php print $navbar; ?> </div>
          </div>
          <!-- /#navbar-inner, /#navbar -->
          <div id="header-get-involved-social-links">Connect with Greenhorn: <a href="http://twitter.com/greenhornboston" title="Follow us on Twitter" target="_blank"><img src="/sites/all/themes/horns_of_green/images/common/common_twitterBtn.jpg" alt="Twitter" /></a><a href="http://www.facebook.com/pages/GreenhornConnectcom/193525736063?ref=ts" title="Follow us on Facebook" target="_blank"><img src="/sites/all/themes/horns_of_green/images/common/common_facebookBtn.jpg" alt="Facebook" /></a><a href="http://www.linkedin.com/groups?gid=2607729&trk=myg_ugrp_ovr" title="Follow us on LinkedIn" target="_blank"><img src="/sites/all/themes/horns_of_green/images/common/common_linkedInBtn.jpg" alt="LinkedIn" /></a></div>
        </div>
        <!-- /#header-middle -->
        <div id="header-bottom">
          <!-- Search Box -->
          <div id="search-box" >
          	<?php print $header_bottom; ?>
          </div><!-- /#search-box -->
          
          <div id="quick-find-text"> <span id="find">Find</span><br />
            <span id="what">what you need</span><br />
            <span id="faster">faster!</span> </div>
          <!-- /#header-find-text -->
          <!-- Quick Find Buttons -->
          <div id="quick-find-buttons">
            <?php print $quick_find; ?>
          </div>
          <!-- /Quick Find Buttons -->
        </div>
        <!-- /#header-bottom -->
      </div>
    </div> <!-- /#header-inner, /#header -->

    <div id="main"><div id="main-inner" class="clear-block<?php if ($search_box || $primary_links || $secondary_links || $navbar) { print ' with-navbar'; } ?>">

      <div id="content"><div id="content-inner">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php if ($content_top): ?>
          <div id="content-top" class="region region-content_top">
            <?php print $content_top; ?>
          </div> <!-- /#content-top -->
        <?php endif; ?>
			<div id="content-header">
        		<?php if ($breadcrumb || $title || $tabs || $help || $messages): ?>
          
            	<?php print $breadcrumb; ?>
            	
        			<?php endif; ?>
        <img src="/sites/all/themes/horns_of_green/images/pageHeaders/pageHeader_news.jpg" />
          </div> <!-- /#content-header -->
			<div id="content-area-wrapper-left-shadow">
         <div id="content-area-wrapper-right-shadow">
         <div id="content-area-wrapper-bottom-shadow">
         <div id="content-area-wrapper-left-corner">
         <div id="content-area-wrapper-right-corner">
        <div id="content-area" class="<?php if($tabs) { print ' with-tabs'; } ?>">
        		<?php /*?><?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?><?php */?>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <div class="page-divider-thick"></div>
          <?php print $content; ?>
        </div>
		

        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div> <!-- /#content-bottom -->
        <?php endif; ?>
        <div class="end-page-box"></div>
        </div></div></div>
			</div></div> <!-- /#content-area-wrapper, /#content-area-wrapper-inner -->
      </div></div> <!-- /#content-inner, /#content -->

     

      <?php if ($left): ?>
        <div id="sidebar-left"><div id="sidebar-left-inner" class="region region-left">
          <?php print $left; ?>
        </div></div> <!-- /#sidebar-left-inner, /#sidebar-left -->
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div> <!-- /#sidebar-right-inner, /#sidebar-right -->
      <?php endif; ?>

    </div></div> <!-- /#main-inner, /#main -->

    <div id="footer">
      <div id="footer-inner" class="region region-footer">
        <div id="footer-top">
          <div id="footer-top-right"> <span id="footer-sign-in"><a href="/user/register" title="Create an account">Join Now</a> | <a href="/user/login" title="Sign in">Sign In</a></span> <?php print $subscribe_button; ?> </div>
          <img src="/sites/all/themes/horns_of_green/images/common/common_logo_footer.jpg" alt="Greenhorn Connect Logo" /> </div>
        <div id="footer-middle">
          <div id="footer-middle-links">
            <ul style="margin-left: 0px;">
              <p>CATEGORIES</p>
              <li><a href="/resources/general" title="">General Resources</a></li>
              <li><a href="/resources/learning" title="">Learning Resources</a></li>
            </ul>
            <ul>
              <p>SPECIAL FEATURES</p>
              <li><a href="/resources" title="">Resource Search</a></li>
              <li><a href="/blog" title="">Blog</a></li>
            </ul>
            <ul>
              <p>SOCIAL</p>
              <li><a href="http://twitter.com/greenhornboston" title="" target="_blank">Twitter</a></li>
              <li><a href="http://www.facebook.com/pages/GreenhornConnectcom/193525736063?ref=ts" title="" target="_blank">Facebook</a></li>
            </ul>
            <ul>
              <p>Greenhorn Connect</p>
              <li><a href="/about" title="">What is Greenhorn Connect?</a></li>
              <li><a href="/user/register" title="">Join Greenhorn Connect.</a></li>
              <li><a href="/contact" title="">Make Greenhorn Connect better.</a></li>
            </ul>
          </div>
          <div id="footer-service-providers"><a href="/contact"><img src="/sites/all/themes/horns_of_green/images/btn/btn_footer_serviceProvider.jpg" alt="Feedback" title="Send us feedback" /></a></div>
          <div class="clear-block"></div>
        </div>
        <div id="footer-bottom">
          <ul>
            <li><a href="/contact" title="">Contact</a></li>
            <li><a href="/privacy-policy" title="Privacy Policy">Privacy Policy</a></li>
            <li><a href="/disclaimer" title="Privacy Policy">Disclaimer</a></li>
            <li><a href="/terms-of-use" title="Terms of Use">Terms of Use</a></li>
            <li><a href="http://www.fingerpainttheweb.com" title="" target="_blank"><span id="fingerpainted-link">This site has been fingerpainted.</span></a></li>
          </ul>
          <span id="copy-right">&copy; Greenhorn Connect LLC - all rights reserved</span> </div>
      </div>
    </div> <!-- /#footer-inner, /#footer -->
  </div></div> <!-- /#page-inner, /#page -->

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>

  <?php print $closure; ?>

</body>
</html>
