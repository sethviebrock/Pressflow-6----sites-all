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

  <?php /*?><?php if ($title && !$is_front): ?>
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
		<div id="bodyqs">
        <?php /*?><?php dprint_r($node->field_upload_photo); ?><?php */?>
		<p class="desc">Company Details</p><p id="title"><?php print $title;?></p>
		
			<div id="bodytop">
				<div class="company-details" style="float:right;">
					<?php if ($node->field_email[0]['value']): ?><div class="company-details-field">
                        <label>Email:</label>
                        <span class="field-content"><a href="mailto:<?php print $node->field_email[0]['value'];?>" title="Email Us"><?php print $node->field_email[0]['value'];?></a></span>
                    </div><?php endif; ?>
                    
					<?php if ($node->field_website[0][url]): ?><div class="company-details-field">
                        <label>Website:</label>
                        <span class="field-content"><a href="<?php print $node->field_website[0][url];?>" title="Visit Us"><?php print $node->title;?></a></span>
                    </div><?php endif; ?>
                    
                   <?php $keys = array_keys($taxonomy); ?>
                   <?php if ($taxonomy[$keys[0]]['title']): ?> <div class="company-details-field">
                        <label>Industry:</label>
						<span class="field-content"><?php print $taxonomy[$keys[0]]['title'];?></span>
                    </div><?php endif; ?>
                    
                    <?php if ($node->field_year_est[0]['value']): ?><div class="company-details-field">
                        <label>Founded:</label>
						<span class="field-content"><?php print $node->field_year_est[0]['value'];?></span>
                    </div><?php endif; ?>
                    
                    <?php if ($node->field_address[0]['value']): ?>
                    <div class="company-details-field">
                        <label>Address:</label>
						<span class="field-content">
							<?php print $node->field_address[0]['value']; ?>
						</span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($node->field_city_state[0]['value']): ?><div class="company-details-field">
                        <label>City/State:</label>
						<span class="field-content"><?php print $node->field_city_state[0]['value'];?></span>
                    </div><?php endif; ?>
                    
                    <div class="company-details-field">
                        <label>Funding:</label>
						<span class="field-content"><?php print $node->field_funding[0]['value'];?></span>
                    </div>
				</div>
                
                <div class="company-header" style="width:330px";>
                	<div style="float:left; margin-right:10px;"><?php echo($node->field_logo[0]['view']); ?></div>
					<div class="company-size" style="width:80px; float:left; border:1px solid #C4C4C4;">
						<center>
			            <img src="<?php print(base_path() . path_to_theme()); ?>/images/company-size.png" />
			            <p class="sizeC"><?php echo($node->field_size[0]['value']); ?></p>
			            </center>
		        	</div>	        	
		        	
					<div class="social-links" style="float:left;clear:left;">
						<?php
						if ($node->field_linkedin[0]['url']['default_value'] !== NULL) {
						    print '<a href=';
						    print $node->field_linkedin[0]['url'];
						    print ' id="smclip" title="LinkedIn" alt="LinkedIn logo" style="margin-right:15px; margin-left:5px;"target="_blank"><img src="/sites/all/themes/greenhorn/images/linkedin.png" width="40px;"/></a>';
						    
						}
						if ($node->field_facebook[0]['url']['default_value'] !== NULL) {
							print '<a href=';
							print $node->field_facebook[0]['url'];
							print ' id="smclip" title="Facebook" alt="Facebook logo" style="margin-right:15px;"target="_blank"><img src="/sites/all/themes/greenhorn/images/fb.png" width="40px;"</a>';
							
						} 
						if($node->field_twitter[0]['url']['default_value'] !== NULL) {
							print '<a href=';
							print $node->field_twitter[0]['url'];
							print ' id="smclip" title="Twitter" alt="Twitter logo" style="margin-right:15px;" target="_blank"><img src="/sites/all/themes/greenhorn/images/twitter.png" width="40px;"/></a>';
						}
						if ($node->field_crunchbase[0]['url']['default_value'] !== NULL) {
						    print '<a href=';
						    print $node->field_crunchbase[0]['url'];
						    print ' id="smclip" title="CrunchBase" alt="CrunchBase logo" style="margin-right:15px; margin-left:5px;"target="_blank"><img src="/sites/all/themes/greenhorn/images/cb.png" width="40px;"/></a>';
						    
						}
					?>
					</div>	
							
				</div>
				
			</div>
			
			<p class="desc" style="clear:both; padding-top: 25px;">The problem we solve:</p>
			<div class="bodyp2"><?php print $node->field_problem_solved[0]['value'];?></div>
			
			<p class="desc">Who we are:</p>
			<div class="bodyp2"><?php print $node->field_who_we_are[0]['value'];?></div>
			
			<!--Company Media-->
				
			<div class="culter-media">
            	<div style="padding-bottom: 16px;"class="gallery clearfix" style="list-style:none;"><?php foreach($node->field_upload_photo as $image): ?>
                	<a href="/<?php print $image['filepath'];?>" id="clip70x55" rel="prettyPhoto[gallery1]">
                		<?php print $image['view']; ?>
                	</a>
                	<? endforeach; ?>
                </div>
                
				<div class="gallery clearfix" style="list-style:none;"><?php foreach($node->field_youtube as $video): ?>
                	<li>
                		<a href="/<?php print $video['embed'];?>" id="clip70x55" rel="prettyPhoto[gallery2]">
                			<?php print $video['view'];?>
                		</a>
                	</li>
                	<? endforeach; ?>
                </div>
			</div>
			
			<div style="padding-top: 6px; clear:both;"><p class="desc">Why you want to work for us:</p></div>
			<div class="bodyp2"><?php print $node->field_why_join[0]['value'];?></div>
				
		</div>
		
		<div id="joblisting">

			<p class="desc">Jobs Available</p>
			
			<!--<div style="font-family:Geneva,sans-serif; font-size:12px; color:#4c4c4c;">-->
            <div class="embedded-view view-jobs">
				<?php print views_embed_view("jobs", "page_1", $node->nid );?>
			</div>
		</div>
		
		</div>
		
	</div>
<!--For TEST-->
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
</div> <!-- /node-inner, /node -->