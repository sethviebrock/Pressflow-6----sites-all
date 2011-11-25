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

<!--<script type="text/javascript">
$(document).ready(function(){
	$("#categList").hide();
		//Required to reset toggle to initial state boolean
		$(".trigger").unbind('click').click(
		function(){ 
			$("#categList").slideDown("1000");
			$("#imgChng").html('<img src="/ghtest/sites/all/themes/greenhorn/images/open.png" alt="open" />');}, 
		function() {
			$("#categList").slideUp("1000");
			$("#imgChng").html('<img src="/ghtest/sites/all/themes/greenhorn/images/closed.png" alt="close" />');
	});
	//resets the slideList upon the mouse leaving the element
	$("#categDrp").bind("mouseleave",
		function() {
			$("#categList").slideUp("1000");
			$("#imgChng").html('<img src="/ghtest/sites/all/themes/greenhorn/images/closed.png" alt="close" />');
	});
});
</script>-->

<div id="content">
	<p class="desc">Job Details</p>
	
	<div style="float:left; width:450px;">
		
		<?php print drupal_render($form['title']);?>
		 
		<?php //print drupal_render($form['field_company']);?><br/>
		
		<?php print drupal_render($form['field_level']);?><br/>
		
		<?php print drupal_render($form['field_what_you_do']);?>
		
		<?php print drupal_render($form['field_skills_needed']);?>
		
		<?php print drupal_render($form['field_why_this_job']);?>
	
	</div>
	
	<div style="float:right; width:450px;">
		<?php print drupal_render($form['taxonomy']);?><br/>

	    <?php print drupal_render($form['field_app_link']);?>

		<p class="desc">Media</p>
		
		<!--<img src="/sites/all/themes/greenhorn/images/youtube.jpg" width="100px" alt="YouTube Video"/>-->
		<?php print drupal_render($form['field_youtube']);?>
		
		<?php print drupal_render($form['field_upload_photo']);?>	
				
	</div>
	<div style="clear:both">
		<?php print drupal_render($form); ?>
    </div>
    
</div>

