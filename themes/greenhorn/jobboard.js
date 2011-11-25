$(function() {
  //Init jobboard search filters:
  //$(".views-exposed-widgets #edit-job-level-wrapper select").chosen({default_text: "Job level"});
  $(".views-exposed-widgets #edit-tid-1-wrapper select").chosen();
  $(".views-exposed-widgets #edit-tid-wrapper select").chosen();
  
  $(".page-jobboard-search ul.chzn-results #edit-tid-1_chzn_o_0").val('Clear search');

  //Insert default value text 
  $(".views-exposed-widgets input#edit-keys").val('Enter keywords');
  $(".views-exposed-widgets input#edit-keys").click(function(){
    $(".views-exposed-widgets input#edit-keys").val(''); 
  });

  $(".views-exposed-widgets input#edit-keys").blur(function(){
    if( ! $(".views-exposed-widgets input#edit-keys").val() ){
      $(".views-exposed-widgets input#edit-keys").val('Enter keywords'); 
    }
  });

  //Clear default value text
  $(".views-exposed-widgets input#edit-submit-Search").click(function(){
    if( $(".views-exposed-widgets input#edit-keys").val() == 'Enter keywords' ){
      $(".views-exposed-widgets input#edit-keys").val('');
    }
  });  

  $(".page-jobboard-search .views-row").hover(function(){
    $('#sidebar-right div.block.count-1').html(  
      $(this).find("div.views-field-markup").html()
    );
  });

  //Counter to prevent multiple calls from ajaxStop
  var page_load = 0;
 
  //When the view submits via AJAX we need to reinit everything: 
  $('.page-jobboard-search div').ajaxStop(function() {
    page_load++;
    if( page_load < 2 ){

      //$(".views-exposed-widgets #edit-job-level-wrapper select").chosen({default_text: "Job level"});
      $(".views-exposed-widgets #edit-tid-1-wrapper select").chosen();
      $(".views-exposed-widgets #edit-tid-wrapper select").chosen();

      $(".page-jobboard-search .views-row").hover(function(){
        $('#sidebar-right div.block.count-1').html(
          $(this).find("div.views-field-markup").html()
        );
      });
    }

  });

  //Reset the page_load counter when AJAX starts
  $('.page-jobboard-search div').ajaxStart(function() {
    page_load = 0;
  });
 
});
