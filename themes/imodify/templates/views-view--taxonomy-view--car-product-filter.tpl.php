<?php 
global $theme_path, $base_url;
?>
<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
		} 
		if(($('#select_new .selectList select').next('span').attr('class')!='customStyleSelectBox changed') && ($('#select_new .selectList select').next('span').attr('class')!='customStyleSelectBox')) {
        	$('#select_new .selectList select').customSelect();
			}
      });
</script>

<script type="text/javascript">
 
 function getCarModel(val){
 
 
//alert(val);
	//alert('function called');
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	 $("#cat").html('<table width="140" cellpadding="0" cellspacing="0"><tr><td height="35" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
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
	val4=$('#edit-jump5').val();
	
	
	
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	//$(".view-display-id-sub_category").html(imgLoading);
	
	$(".view-display-id-sub_category").html('<div id="back" style="width:202px; margin-bottom: 0px;"><div style="padding-left:85px; padding-top:6px;"><img src="/sites/default/files/ajax-loader1.gif" /></div></div>');
	
	$("#product_category").html('<div style="padding-left:56px;  padding-bottom:20px;"><img src="/sites/default/files/ajax-loader1.gif"/></div>');
	
	
	
	$("#load").html('<div style="padding-left:350px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	
	$("#image_slider").show();  
	$(".highlight_image").show();
	
	 viewName = 'car_make';
    $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=product_category_image&view_args=' + val1, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $("#product_category").html(viewHtml2);
	   $(".highlight_image").hide();
    }
  });
	
	viewName = 'car_product_category';
  viewArgument =  val1;
  
    $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=category_image&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $(".view-display-id-category_image").html(viewHtml2);
	 
	  $('.views_slideshow_cycle_main:not(.viewsSlideshowCycle-processed)').addClass('viewsSlideshowCycle-processed').each(function() {
	     var fullId = '#views_slideshow_cycle_main_product_category-product_scroller';
	   var settings = Drupal.settings.viewsSlideshowCycle[fullId];
  	    settings.targetId = '#' + $(fullId + " :first").attr('id');
  	    settings.slideshowId = settings.targetId.replace('#views_slideshow_cycle_teaser_section_', '');
  	    settings.loaded = false;
  	   Drupal.viewsSlideshowCycle.load(fullId);
  	  });
	 
    }
  });
  
  viewName = 'car_product_category';
  viewArgument =  val1;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=sub_category&view_args=' + viewArgument + '/'+ val3 +'/'+ val2, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
	  //alert(viewHtml);
	  valcid=$(viewHtml).find('option:first').val();
	  
      $(".view-display-id-sub_category").replaceWith(viewHtml);
	  
	  
$("#image_car").html('<div style="padding-left:200px; padding-top:50px; "><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	  
$("#load_article").html('<div style="padding-left:200px; padding-top:200px; padding-bottom:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	  
$("#load_events").html('<div style="padding-left:200px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');

$("#part").html('<div style="padding-left:300px;padding-top:10px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	   
	viewName = 'car_product_category_profile';
  viewArgument =  valcid;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_image&view_args=' + viewArgument + '/'+ val3 +'/'+ val4, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#car_image").html(viewHtml);
    }
  });
  
  $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_article&view_args=' + viewArgument + '/'+ val3 +'/'+ val4, // Pass a key/value pair.
    success: function(data) {
      viewHtml1 = data[1].data;
      $("#article").html(viewHtml1);
    }
  });
  
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_event&view_args=' + viewArgument + '/'+ val3 +'/'+ val4, // Pass a key/value pair.
    success: function(data) {
      viewHtml12 = data[1].data;
      $("#events").html(viewHtml12);
    }
  });
  
  viewName = 'product_category';
    $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_parts&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $("#car_part").html(viewHtml2);
    }
  });
    }
  });
  }

</script>
<div class="<?php echo $classes;?>" >
<form method="post" name="car model" action="">
</br>
<label>SELECT CATEGORY:</label>
<div class="selectList">
<select name="jump4" id="edit-jump4">
<option  value="all">Any</option>
<?php 
$vid=11;
$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
//print_r($v);exit;
foreach($v as $result)
{
	if($result->parents[0]==0)
	{
		$name=$result->name;
		$tid=$result->tid;
		echo "<option value='".$tid."'>".$name."</option>";
	}
}
?>
</select>
</div>
<div class="highlight_image" style="margin-bottom: -26px; margin-left: 42px; margin-top: 2px;">
</div>
<div id="product_category">
</div>
<div class="selectList">
<label>SELECT CAR MAKE:</label>
<select name="jump2" id="edit-jump2" onchange="getCarModel(this.value);">
<option  value="all">Any</option>
<?php 
asort($view->result);
foreach($view->result as $value)
{
	$id=$value->tid;
	$name=$value->taxonomy_term_data_name;
	echo "<option  value='".$id."'>".$name."</option>";
}
?>
</select></div>
<div style="height:35px;">
<label>SELECT CAR MODEL:</label>
<script type="text/javascript">
//alert ($('#edit-jump2').val());
getCarModel($('#edit-jump2').val());
</script>
<div id="back" style="margin-bottom: -27px; margin-left: 9px; margin-top: 5px;"></div>
<div id="cat">
</div>
</div>
<div style="margin-top:12px;">
<label>SELECT MOD STYLE:</label>
<div class="selectList">
<select name="jump4" id="edit-jump5">
<option  value="all">Any</option>
<?php 

$vid=6;
$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
//print_r($v);
foreach($v as $result)
{
	$name=$result->name;
	$tid=$result->tid;
	echo "<option value='".$tid."'>".$name."</option>";
}
?>
</select>
</div>
</div>

</form>
<div id="button" align="center" style="float: none; margin-left: -13px;">
<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
</div>
</div>
<div>
<?php echo $_POST['edit-jump4']; ?>
</div>


