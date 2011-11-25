<?php
// $Id: search-block-form.tpl.php,v 1.1 2007/10/31 18:06:38 dries Exp $

/**
 * @file search-block-form.tpl.php
 * Default theme implementation for displaying a search form within a block region.
 *
 * Available variables:
 * - $search_form: The complete search form ready for print.
 * - $search: Array of keyed search elements. Can be used to print each form
 *   element separately.
 *
 * Default keys within $search:
 * - $search['search_block_form']: Text input area wrapped in a div.
 * - $search['submit']: Form submit button.
 * - $search['hidden']: Hidden form elements. Used to validate forms when submitted.
 *
 * Since $search is keyed, a direct print of the form element is possible.
 * Modules can add to the search form so it is recommended to check for their
 * existance before printing. The default keys will always exist.
 *
 *   <?php if (isset($search['extra_field'])): ?>
 *     <div class="extra-field">
 *       <?php print $search['extra_field']; ?>
 *     </div>
 *   <?php endif; ?>
 *
 * To check for all available data within $search, use the code below.
 *
 *   <?php print '<pre>'. check_plain(print_r($search, 1)) .'</pre>'; ?>
 *
 * @see template_preprocess_search_block_form()
 */
?>
<div class="container-inline">
  <table>
  	<tr>
    	<td><?php print $search['search_block_form']; ?></td>
        <td><div id="search-button">
      		<?php print $search['submit']; ?>
   			</div></td>
    </tr>
  </table>
   <?php print $search['hidden']; ?>
</div>

<!--  
<form id="search-block-form" method="post" accept-charset="UTF-8" action="/search">
  <div>
    <div id="edit-search-block-form-1-wrapper" class="form-item">
      <input type="text" class="form-text" title="Enter the terms you wish to search for." id="edit-search-block-form-1" name="edit-search-block-form-1" maxlength="128" gtbfieldid="570"/>
    </div>
    <div id="search-button">
      <input type="image" src="/sites/all/themes/horns_of_green/images/common/common_header_siteSearchBtn.jpg" class="form-submit" id="edit-submit" name="op"/>
    </div>
    <input type="hidden" value="form-2a60e9c38f29f1aa7671f6eb5bb4a6be" id="form-2a60e9c38f29f1aa7671f6eb5bb4a6be" name="form_build_id"/>
    <input type="hidden" value="7bada7621263c49e9b94714c80720e16" id="edit-search-block-form-form-token" name="form_token"/>
    <input type="hidden" value="search_block_form" id="edit-search-block-form" name="form_id"/>
  </div>
</form>-->