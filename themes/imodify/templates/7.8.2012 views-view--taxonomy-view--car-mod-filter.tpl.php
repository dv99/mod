<?php //echo '<pre>';print_r($view->result);exit;?>
<style>
#overlay {
    width: 100%;
background: url('sites/default/files/loading.png') repeat;

    position: relative;
}
#overlay img.loading_circle {
    position: absolute;
}
.txtbox_bt1 {display:block; background:url(http://echo.imodify.com.au/sites/default/files/btn_refine.png) no-repeat 0 0; width:69px; height:22px; cursor:pointer; border:none; margin-bottom:5px; margin-top:19px;}


#back {
    background-color: #F9CE6F;
    border-bottom-left-radius: 900px;
    border-bottom-right-radius: 900px;
    border-top-left-radius: 900px;
    border-top-right-radius: 900px;
    height: 22px;
    margin-bottom: -27px;
    margin-left: 13px;
    margin-top: 5px;
    width: 125px;
}
.image {
    background-color: #FFFFCC;
    height: 45px;
    margin-bottom: -45px;
    margin-left: 52px;
    margin-top: 12px;
    width: 45px;
}
	#cat span {
    color: #FFFFFF;
    font-weight: bold;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-right: 5px;
    margin-top: 5px;
    min-width: 100px;
    text-transform: uppercase;
	 height: 23px;
}
</style>
<?php 
global $theme_path, $base_url;
?>
<script type="text/javascript">

 
 function getCarModel(val){
 
 
//alert(val);
	//alert('function called');
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	$("#cat").html('<table width="50" cellpadding="0" cellspacing="0"><tr><td height="35" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
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
	
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	
	$("#load").html('<table width="800" cellpadding="0" cellspacing="0"><tr><td height="200" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	
	$("#image_car").html('<table width="522" cellpadding="0" cellspacing="0"><tr><td height="54" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	
	$("#load_article").html('<table width="400" cellpadding="0" cellspacing="0"><tr><td height="400" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	
	$("#load_events").html('<table width="400" cellpadding="0" cellspacing="0"><tr><td height="400" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	
	
	
	
	$("#make_image").html('<table width="150" cellpadding="0" cellspacing="0"><tr><td height="30" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	
	$("#mod_image").html('<table width="150"  cellpadding="0" cellspacing="0"><tr><td height="30" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
  
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
      $("#make_image").html(viewHtml);
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
<div class="selectList" align="center">
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
<div class="image">
</div>
<div id="mod_image">
</div>
<div style="height:35px; margin-top:35px; margin-bottom:10px;">
<div class="selectList" align="center">
<label>SELECT CAR MAKE:</label>
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
<div class="image">
</div>
<div id="make_image">
</div>
<div style="height:35px; margin-top:35px;">
<label>SELECT CAR MODEL:</label>
<script type="text/javascript">
//alert ($('#edit-jump2').val());
getCarModel($('#edit-jump2').val());
</script>
<div id="back"></div>
<div id="cat" align="center">
</div>
</div>

</form>
<div align="center">
<input class="txtbox_bt1" type="submit" value="" onclick="clic();" >
</div>


