<?php //echo '<pre>';print_r($view->result);exit;?>
<?php 
global $theme_path, $base_url;
?>
<script type="text/javascript">

 
 function getCarModel(val){
 
 
//alert(val);
	//alert('function called');
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	
	$("#cat").html('<table width="150" cellpadding="0" cellspacing="0"><tr><td height="30" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
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
	val1=$('#edit-jump4').val(); 
	val2=$('#edit-jump2').val();
	val3=$('#edit-jump3').val();
	//val3=$('#edit-jump4').val();
	
	var imgLoading = '<img src="'+Drupal.settings.basePath+'sites/default/files/ajax-loader1.gif" class="loading_circle" alt="loading" />';

	$("#block-views-car-make-block-3").html('<table width="114" cellpadding="0" cellspacing="0"><tr><td height="100" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

//$("#load").html('<table width="804" cellpadding="0" cellspacing="0"><tr><td height="400" align="center" valign="middle">'+imgLoading+'</td></tr></table>');


$("#load").html('<div style="padding-left:350px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');



$("#image_car").html('<table width="522" cellpadding="0" cellspacing="0"><tr><td height="54" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

//$("#load_article").html('<table width="400" cellpadding="0" cellspacing="0"><tr><td height="360" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

$("#load_article").html('<div style="padding-left:200px; padding-top:200px; padding-bottom:200px; "><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');



$("#load_events").html('<div style="padding-left:200px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');

//$("#load_events").html('<table width="400" cellpadding="0" cellspacing="0"><tr><td height="360" align="center" valign="middle">'+imgLoading+'</td></tr></table>');

$("#make_image").html('<div style="padding-left:57px; margin-top:-45px;margin-bottom:20px;"><img src="/sites/default/files/ajax-loader1.gif"/></div>');

$("#mod_image").html('<div style="padding-left:57px; margin-top:-45px;margin-bottom:20px;"><img src="/sites/default/files/ajax-loader1.gif"/></div>');

 $(".highlight_image").show();
 $("#image_slider").show();
 $(".rightborder").show();
	
  viewName = 'car_mod_style';
  
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_1&view_args=' + val1, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-car-mod-style-block-1").find(".content").html(viewHtml);
	
		$('.views_slideshow_cycle_main:not(.viewsSlideshowCycle-processed)').addClass('viewsSlideshowCycle-processed').each(function() {
	     var fullId = '#views_slideshow_cycle_main_car_mod_style_profile-mod_style_slider';
	   var settings = Drupal.settings.viewsSlideshowCycle[fullId];
  	    settings.targetId = '#' + $(fullId + " :first").attr('id');
  	    settings.slideshowId = settings.targetId.replace('#views_slideshow_cycle_teaser_section_', '');
  	    settings.loaded = false;
  	   Drupal.viewsSlideshowCycle.load(fullId);
  	  });
	 }
  });
  
	viewName = 'car_mod_style_profile'
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_image&view_args=' + val1 + '/'+ val2, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#car_image").html(viewHtml);
    }
  });
 
    $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=mod_article&view_args=' + val1 + '/'+ val3, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#article").html(viewHtml);
    }
  });
  
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=mod_event&view_args=' + val1 + '/'+ val3, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#events").html(viewHtml);
    }
  });
  
  viewName = 'car_make';
  $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_3&view_args=' + val2, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      //alert(viewHtml);
	 $("#make_image").html(viewHtml);
	$(".highlight_image").hide();
	}
  });
  
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=mod_style_image&view_args=' + val1, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
     $("#mod_image").html(viewHtml);
    }
  });

}

</script>
<form method="post" name="car model" action="">
</br>
<label>SELECT MOD STYLE:</label>
<div class="selectList">
<select name="jump4" id="edit-jump4">
<option  value="all">Any</option>
<?php 


$vid=6;
$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
//print_r($v);exit;
foreach($v as $result)
{
	
	$name=$result->name;
	$tid=$result->tid;
	echo "<option value='".$tid."'>".$name."</option>";
}
?>
</select>
</div>
<div class="highlight_image" style=" margin-bottom: 20px; margin-left: 42px; margin-top: 2px;">
</div>
<div id="mod_image">
</div>
<!--  <div style="height:35px; margin-top:35px; margin-bottom:10px;"> -->
<div style="margin-top:10px;">
<label>SELECT CAR MAKE:</label>
<div class="selectList">

<select name="jump2" id="edit-jump2" onchange="getCarModel(this.value);">
<option  value="9.9">Any</option>
<?php 
asort($view->result);
foreach($view->result as $value){
	$selected=arg(1)==$value->tid?' selected="selected" ':'';
echo "<option  value='".$value->tid."' ".$selected.">".$value->taxonomy_term_data_name."</option>";
}
?>
</select></div>
</div>
<script type="text/javascript">
//alert ($('#edit-jump2').val());
getCarModel($('#edit-jump2').val());
</script>
<div class="highlight_image" style=" margin-bottom: 20px; margin-left: 42px; margin-top: 2px;" >
</div>
<div id="make_image">
</div>
<!--
<div style="height:35px; margin-top:35px;">
-->
<div style="height:30px; ">
<div style="margin-top:10px;">
<label>SELECT CAR MODEL:</label>

<div id="back" style=" margin-bottom: -27px; margin-left: 13px; margin-top: 5px;"></div>
<div id="cat">
</div>
</div>
</div>
</form>
<div id="button" align="center" style="float: none; margin-left: -13px;">
<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
</div>


