<?php
// $Id: block.tpl.php,v 1.4 2008/09/14 12:41:20 johnalbin Exp $

/**
 * @file block.tpl.php
 *
 * Theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $block->content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: This is a numeric id connected to each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: A set of CSS classes for the DIV wrapping the block.
     Possible values are: block-MODULE, region-odd, region-even, odd, even,
     region-count-X, and count-X.
 *
 * Helper variables:
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 */
?>
<div id="block-<?php print $block->module . '-' . $block->delta; ?>" class="<?php print $classes; ?>"><div class="block-inner">
	<div id="most-discussed-block-header-wrapper"><img src="/sites/all/themes/horns_of_green/images/home/home_discussedBanner.jpg" /></div>
	
   
  <div class="content">
    <?php print $block->content; ?>
  </div>
  <div class="blog-block-view-full-blog-link">
	<!--<a href="/blog" title="View Blog">View Greenhorn Connect Blog <img src="/sites/all/themes/horns_of_green/images/common/common_advance_arrowGrey.jpg" /></a>-->
   </div>
  <?php print $edit_links; ?>
  <div class="clear-block"></div>

</div></div> <!-- /block-inner, /block -->
