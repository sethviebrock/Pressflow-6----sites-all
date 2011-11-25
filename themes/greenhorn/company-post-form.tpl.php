<?php
// $Id: content-field.tpl.php,v 1.1.2.6 2009/09/11 09:20:37 markuspetrux Exp $

/**
 * @file content-field.tpl.php
 * Default theme implementation to display the value of a field.
 *
 * Available variables:
 * - $node: The node object.
 * - $field: The field array.
 * - $items: An array of values for each item in the field array.
 * - $teaser: Whether this is displayed as a teaser.
 * - $page: Whether this is displayed as a page.
 * - $field_name: The field name.
 * - $field_type: The field type.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $label: The item label.
 * - $label_display: Position of label display, inline, above, or hidden.
 * - $field_empty: Whether the field has any valid value.
 *
 * Each $item in $items contains:
 * - 'view' - the themed view for that item
 *
 * @see template_preprocess_content_field()
 */ 
?>

<div id="content">
	<p class="desc">General Information</p>	
	
	<div style="width:1000px; float:left;">
		
		
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['title']);?>
		</div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_website']);?>
		</div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_year_est']);?>
		</div><div style="clear:both"></div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_address']);?>
		</div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_city_state']);?>
		</div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_email']);?>
		</div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_logo']);?>
		</div>
		<div style="margin-left: 4px; margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_size']);?>
		</div>
		<div style="margin-left: 4px; margin-right:30px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['field_funding']);?>
		</div>
		<div style="margin-right:10px; margin-bottom:10px; float:left;">
			<?php print drupal_render($form['taxonomy']);?>
		</div>	
				
		
	</div>
	
</div>
	
	
<div id="content">
	<p class="desc">Company Culture</p>
	
	<div style="width: 513px; float:left">	 
	
		<?php print drupal_render($form['field_problem_solved']);?>

		<?php print drupal_render($form['field_who_we_are']);?>
		
		<?php print drupal_render($form['field_why_join']);?>

	</div>	
	
	<div style="float:left; width:330px; margin-left:100px">
		<!--<span class="subhead">Social Media</span><br/>-->
		<span style="color:#124E00;font-family:Geneva,sans-serif;font-size:13px;font-weight:bold;">Add the URLs to your social media accounts.</span>
		
		<?php print drupal_render($form['field_linkedin']);?><br/>
		
		<?php print drupal_render($form['field_facebook']);?><br/>
		
		<?php print drupal_render($form['field_twitter']);?><br/>
		
		<?php print drupal_render($form['field_crunchbase']);?><br/>
		
		
		
		<span style="color:#124E00;font-family:Geneva,sans-serif;font-size:13px;font-weight:bold;">Add photos and videos.</span>
		
		<?php print drupal_render($form['field_youtube']);?>

		<?php print drupal_render($form['field_upload_photo']);?>
										
	</div>	
	
	<div style="clear:both">
		<?php print drupal_render($form); ?>
	</div>
    
</div>
