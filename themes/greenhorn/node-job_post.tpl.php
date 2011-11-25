<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/05/12 18:41:54 johnalbin Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_user().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"><div class="node-inner">

  <?php print $picture; ?>

 <?php /*?> <?php if ($title && !$is_front): ?>
    <h2 class="title">
      <a href="<?php print $node_url; ?>" title="<?php print $title ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?><?php */?>

  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($submitted || $terms): ?>
    <div class="meta">
      <?php if ($submitted): ?>
        <div class="submitted">
          <?php print $submitted; ?>
        </div>
      <?php endif; ?>

      <?php /*?><?php if ($terms): ?>
        <div class="terms terms-inline"><?php print t(' in ') . $terms; ?></div>
      <?php endif; ?><?php */?>
    </div>
  <?php endif; ?>

  <div class="content">
    <!--BEGIN-->
    
    <!--For TEST-->
	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8">
			google.load("jquery", "1.3");
		</script>
				
		<link rel="stylesheet" href="/sites/all/themes/greenhorn/lightbox/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8"/>
		<script src="/sites/all/themes/greenhorn/lightbox/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<div id="container">
	<div style="width:600px; margin:0px 10px 10px 30px;float:left;">
		<p class="desc">Job Details</p>
		
		<div style="width:600px; float:left;">
			<p id="title">|| <?php print $title;?> <span style="font-style:italic; color:#FF3D24;text-transform:lowercase;"><?php print $node->field_level[0]['value'];?></span> ||</p>
			 <div class="apply-link" style="width:600px;">
			<?php 
			  $link = $node->field_app_link[0]['url'];
        $link = preg_replace('/^mailto:/','',$link);
        $pattern = "/\b[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})\b/i";
			  if (preg_match($pattern, $link)){ ?>
			  <a href="mailto:<?php print $link;?>" target="_blank" class="button" style="float:right; margin:0px;" alt="Apply Now">Apply Now</a>
			<?php } else { ?>
			 
				<a href="<?php print $node->field_app_link[0]['display_url'];?>" target="_blank" class="button" style="float:right; margin:0px;" alt="Apply Now">Apply Now</a>
			
			<?php } ?>
        </div>
		</div>
		
		<div style="padding-bottom: 30px; float:left;">
			<div class="bodyp"><span class="subhead">What you do:</span><br/><?php print $node->field_what_you_do[0]['value'];?></div>
		</div>
		
		<div style="float:left;margin-right:10px;width:290px;">
			<div class="bodyp"><span class="subhead">Skills Required:</span><br /><?php print $node->field_skills_needed[0]['value'];?></div>
		</div>
		
		<div style="width:290px; float:left;">
			<div class="bodyp"><span class="subhead">Why you want this job:</span><br/><?php print $node->field_why_this_job[0]['value'];?></div>	
		</div>
				
		<div style="float:left; width:590px;">
			
            <div class="gallery clearfix" style="padding-top:15px; list-style:none;">
            	<span class="subhead">Culture Media:</span><br/>
            	<?php foreach($node->field_upload_photo as $image): ?>
                	<li><a href="/<?php print $image['filepath'];?>"id="clip70x55" rel="prettyPhoto[gallery1]"><?php print $image['view']; ?></a></li>
                <?php endforeach; ?>
                
			</div>
            
            <div class="gallery clearfix" style="padding-top:15px; list-style:none;"><?php foreach($node->field_youtube as $video): ?>
                	<li>
                		<a href="/<?php print $video['embed'];?>" id="clip70x55" rel="prettyPhoto[gallery2]">
                			<?php print $video['view'];?>
                		</a>
                	</li>
                	<?php endforeach; ?>
                </div>

			<div class="apply-link" style="width:600px;">
			<?php 
			  $link = $node->field_app_link[0]['url'];
        $link = preg_replace('/^mailto:/','',$link);
        $pattern = "/\b[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})\b/i";
			  if (preg_match($pattern, $link)){ ?>
			  <a href="mailto:<?php print $link;?>" target="_blank" class="button" style="float:right; margin:0px;" alt="Apply Now">Apply Now</a>
			<?php } else { ?>
			 
				<a href="<?php print $node->field_app_link[0]['display_url'];?>" target="_blank" class="button" style="float:right; margin:0px;" alt="Apply Now">Apply Now</a>
			
			<?php } ?>
        </div>
			
		</div>
		
	</div>
	
	<div id="joblisting">
        <div class="embedded-view view-company-per-job">
			<?php print views_embed_view("company_per_job", "page_2", $field_company[0]['nid'] );?>
		</div>
	</div>
	
	</div>
	
</div>


<!--FOR TESTING-->
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".gallery a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
	});
</script>
		
<script type="text/javascript">
	function check() {
		//If the value of the input element is empty, we take the title attribute and add it as the value of the input
		$('input[title]').each(function() {
			if($(this).val() === '') {
				$(this).val($(this).attr('title'));	
			}
			//Once the input is focused if the value is equal to the title attribute, set the value to nothing and add a class of focused
			$(this).focus(function() {
				if($(this).val() == $(this).attr('title')) {
					$(this).val('').addClass('focused');	
				}
			});
			//Once the input loses focus make the input value empty, then set the value back to the title attribute and remove the class of focused
			$(this).blur(function() {
				if($(this).val() === '') {
					$(this).val($(this).attr('title')).removeClass('focused');	
				}
			});
		});
	}
	//Onload selects each input that has a title attribute, once the document is loaded
	$(document).ready(check());		
</script>

    <!--END-->
  </div>
<div class="node-clear"></div>
  <?php print $links; ?>
<div class="node-clear"></div>
</div></div> <!-- /node-inner, /node -->
