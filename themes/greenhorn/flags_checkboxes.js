/**
* Behavior for altering the flag links
*/
Drupal.behaviors.alter_flag_links = function (context){
    //Returns a checkbox dom object
    var cb_factory = function(class_attr, checked) {
      var checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.checked = checked;
      jQuery(checkbox).attr('class', class_attr);
      return checkbox;
    }
    //Convert each link to a form checkbox.
    jQuery('span.flag-renew-job-post').each(function() {
      var flag_link = jQuery(this).children('a');
      if(flag_link.length == 0) {
        return;
      }
      flag_link.html(''); //Hide text
      var flag_classes = flag_link.attr('class');
      var checked = false;
      var class_attr = 'compare-cb';
      if(flag_classes.match(/unflag-action/)) {
        checked = true;
      }
      //Only Add form element if it doesn't exist
      if(jQuery(this).children('input').length == 0) {
        var elem = cb_factory(class_attr, checked);
        jQuery(this).prepend(elem);
      }
    });
    //Attach an event listener to each of the new checkboxes
    jQuery('input.compare-cb').each(function() {
      jQuery(this).click(function() {
        jQuery(this).parent().children('a').click();
      });
    });
  };