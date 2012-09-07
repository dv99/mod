<?php //echo '<pre>';print_r($view->result);exit;?>
<?php 
global $theme_path, $base_url;
?>
<script type="text/javascript">

 
 function getCarModel(val){
 
 
//alert(val);
	//alert('function called');
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	$("#cat").html('<table width="150" cellpadding="0" cellspacing="0"><tr><td height="35" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	//$("#cat select").attr("disabled", "disabled");
  
  viewName = 'taxonomy_view';
  viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_model&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#cat").html(viewHtml);
 $("#cat option").remove();
 $("#cat select").attr("disabled", "");
$(viewHtml).find('option').each(function(){
$("#cat select").append($(this));
});
$("#cat select option:first-child").attr("selected", true);
    }
  });
}
function clic(){
  viewArgument1=$('#edit-jump2').val();
	viewArgument=$('#edit-jump3').val();
	//val3=$('#edit-jump4').val();
	
	var imgLoading = '<div id="overlay"><img src="'+Drupal.settings.basePath+'sites/default/files/ajax-loader1.gif" class="loading_circle" alt="loading" /></div>';
$("#block-views-car-make-block-3").html('<table width="114" cellpadding="0" cellspacing="0"><tr><td height="100" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

//$("#load").html('<table width="804" cellpadding="0" cellspacing="0"><tr><td height="400" align="center" valign="middle">'+imgLoading+'</td></tr></table>');


$("#load").html('<div style="padding-left:350px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');

$("#image_car").html('<table width="522" cellpadding="0" cellspacing="0"><tr><td height="54" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

//$("#load_article").html('<table width="400" cellpadding="0" cellspacing="0"><tr><td height="360" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

$("#load_article").html('<div style="padding-left:200px; padding-top:220px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');

$("#load_events").html('<div style="padding-left:200px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');

//$("#load_events").html('<table width="400" cellpadding="0" cellspacing="0"><tr><td height="360" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

$("#make_image").html('<div style="padding-left:50px; margin-top:-25px;margin-bottom:20px;"><img src="/sites/default/files/ajax-loader1.gif"/></div>');


 $(".highlight_image").show();
 $("#image_slider").show();

viewName = 'car_make';
viewArgument = $('#edit-jump2').val();
$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=carmaketop&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-car-make-carmaketop").find(".content").html(viewHtml);
      $('.views_slideshow_cycle_main:not(.viewsSlideshowCycle-processed)').addClass('viewsSlideshowCycle-processed').each(function() {
	     var fullId = '#views_slideshow_cycle_main_car_make_profile-make_scroller';
	   var settings = Drupal.settings.viewsSlideshowCycle[fullId];
  	    settings.targetId = '#' + $(fullId + " :first").attr('id');
  	    settings.slideshowId = settings.targetId.replace('#views_slideshow_cycle_teaser_section_', '');
  	    settings.loaded = false;
  	   Drupal.viewsSlideshowCycle.load(fullId);
  	  });
    }
  });

$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_3&view_args=' + viewArgument1, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#make_image").html(viewHtml);
	 $(".highlight_image").hide();
    }
  });

viewName = 'taxonomy_view';
viewArgument = $('#edit-jump3').val();
$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_makes&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-taxonomy-view-car-makes").html(viewHtml);
    }
  });

viewName = 'car_make_profile';
$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_3&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $("#car_image").html(viewHtml2)
    }
  });
$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_1&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $("#article").html(viewHtml2)
    }
  });
 $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_2&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $("#events").html(viewHtml2)
    }
  });
}
</script>
<form method="post" name="car model" action="">
<label>SELECT CAR MAKE:</label>
<div class="selectList">
<select name="jump2" id="edit-jump2" onchange="getCarModel(this.value);">
<option  value="9.9">Any</option>
<?php 
asort($view->result);
foreach($view->result as $value){
$id=$value->tid;
$name=$value->taxonomy_term_data_name;
$name=$value->taxonomy_term_data_name;
	//$selected=arg(1)==$value->tid?' selected="selected" ':'';
echo "<option  value='".$id."'>".$name."</option>";
}
?>
</select></div>
<div class="highlight_image" style="margin-bottom: -19px; margin-left: 36px; margin-top: 7px;">
</div>
<div id="make_image" style="margin-bottom:25px;">
</div>
<div style="height:30px; ">
<label>SELECT CAR MODEL:</label>
<script type="text/javascript">
//alert ($('#edit-jump2').val());
getCarModel($('#edit-jump2').val());
</script>

<div id="back" style="margin-bottom: -27px; margin-left: 9px; margin-top: 5px;"></div>
<div id="cat">
</div>
</div>
</form>
<div id="button" align="center" style="float: none; margin-left: -13px;">
<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
</div>
