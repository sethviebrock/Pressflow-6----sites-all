// JavaScript Document

$(document).ready(function(){
  //$('#edit-search-block-form-1').watermark('Search Greenhorn Connect');
  
  $('#block-menu-primary-links li').hover(
    function(){
      $('ul:first', $(this)).show();
    },
    function(){
      $('ul', $(this)).hide();
    }
  );
  
  
});
