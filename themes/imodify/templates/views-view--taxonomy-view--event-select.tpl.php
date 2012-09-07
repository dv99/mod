<script type="text/javascript">
function getCarModel(val){
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
	
    val1=$('#edit-jump2').val();
	val2=$('#edit-jump3').val();
	val3=$('#edit-jump4').val();
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	
	$("#block-views-events-new-select-events").html('<div style="padding-left:300px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
  
  viewName = 'events';
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=new_select_events&view_args=' + val2 + '/'+ val1 + '/'+ val3, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;        
      $("#block-views-events-new-select-events").html(viewHtml);
    }
  });
 }

/*$(document).ajaxComplete(function(evt, request, settings){
if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
$('.selectList .views-exposed-form select').customSelect();
}
});*/
</script>

<div class="<?php print $classes; ?>">
</br></br>
<form method="post" name="car model" action="#">
<div class="inline">
<label>CAR MAKE:</label></br>
<div class="selectList">
 <select name="jump1" id="edit-jump1" onchange="getCarModel(this.value);">
	<option  value="9.9">Any</option>
<?php 
asort($view->result);

		foreach ($view->result as $record)
		{
			$data = $record->taxonomy_term_data_name;
			$id = $record->tid;
			echo "<option  value='".$id."'>".$data."</option>";
		}
	?>
</select>
</div>
</div>
<div class="inline">
<label>CAR MODEL:</label></br>
<script type="text/javascript">
//alert ($('#edit-jump1').val());
getCarModel($('#edit-jump1').val());
</script>
<div id="back" style="margin-bottom: -27px; margin-left: 6px; margin-top: 5px;"></div>
<div id= "cat">
</div>
</div>
</div>
<div class="inline">
<label>MOD STYLE:</label></br>
<div class="selectList">
<select name="jump2" id="edit-jump2">
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
</div>
<div class="inline">
<label>CONTENT TYPE:</label></br>
<div class="selectList">
<select name="jump4" id="edit-jump4">
<option  value="all">Any</option>
<?php 
$vid=10;
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
</div>
</form>
<div class="inline">
</br>
<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
</div>
</div>
<div id="testing"></div>

