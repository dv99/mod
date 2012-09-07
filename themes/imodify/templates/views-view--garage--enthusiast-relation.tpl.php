<div class="<?php echo $classes;?>">
<div class="listing" style="margin-top:0;">
<div class="listTitle"><b><?php //echo $title_garge; ?>ABC123's Cars</b></div></div></div>
<script type="text/javascript">
function getCarModel(val){
	
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
  val1=$('#edit-jump1').val();
	val2=$('#edit-jump3').val();
	val3=$('#edit-jump2').val();
	val4=<?php
	global $user;
	$uid = $user->uid;
	
	$record  = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid ASC limit 0,1 ', array(':uid' => $user->uid,':type' => 'garage'));
	foreach($record as $result)
	{	
		echo $nid = $result->nid;
	}
	?>;
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/>';

	$("#block-views-car-browse-enthusiast-car").html('<table width="500"  align="left" cellpadding="0" cellspacing="0"><tr><td height="300" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	
	
	  
  viewName = 'car_browse';
  //viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=enthusiast_car&view_args=' + val4 + '/'+ val2 + '/'+ val3, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-car-browse-enthusiast-car").html(viewHtml);
	 
//	$(".view-display-id-car_gallery").html(imgLoading);
	viewName = 'garage';
	$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_gallery&view_args=' + val4 + '/'+ val2 + '/'+ val3, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
     // $(".view-display-id-car_gallery").html(viewHtml);
    }
  });
	  
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
$vid=3;
$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
function cmp($a, $b)
{
    return strcmp($a->name, $b->name);
}

usort($v, 'cmp');
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
</div>

<div class="inline">
<label>CAR MODEL:</label></br>
<script type="text/javascript">
//alert ($('#edit-jump1').val());
getCarModel($('#edit-jump1').val());
//setTimeout($(window).load(function() { clic();}),3000);
</script>
<div id="back" style="margin-bottom: -27px; margin-left: 6px; margin-top: 5px;"></div>
<div id="cat">
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

</form>
<div class="inline">
</br>
<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
</div>
</div>
