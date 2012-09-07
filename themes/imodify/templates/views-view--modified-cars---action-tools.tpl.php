<?php 
global $user,$theme_path, $base_url;
//echo '<pre>';print_r($view->result);

$record2  = db_query("SELECT nid FROM `node` WHERE `uid`='".$user->uid."' AND `type`='cars' order by nid DESC limit 0,1");

	foreach($record2 as $result2){
	$nid=$result2->nid;
	
	$result3 = db_query('SELECT entity_id FROM {field_data_field_car} WHERE field_car_nid = :nid limit 0,1 ', array(':nid' => $nid)); 
	  foreach ($result3 as $record3){
	   $status_id = $record3->entity_id; 
	}
		
}

 $record1  = db_query("SELECT nid FROM `node` WHERE `uid`=".$user->uid." AND type='garage'");

	foreach($record1 as $result1){
	$garage_id=$result1->nid;

?>

<script type="text/javascript">
 function cls_articles(){
  
	val1=$('#edit-jump5').val();
	
	$("#block-views-articles-select-articles").html('<div style="padding-left:300px; padding-top:250px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	
	  
  viewName = 'articles';
  //viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=select_articles&view_args=' + 'all' + '/'+ 'all' + '/'+ val1, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-articles-select-articles ").html(viewHtml);
    }
  });
 }
 
 function cls_events(){
  
	val1=$('#edit-jump5').val();
	
		$("#block-views-events-new-select-events").html('<div style="padding-left:300px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
  
  viewName = 'events';
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=new_select_events&view_args=' + 'all' + '/'+ 'all' + '/'+ val1, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;        
      $("#block-views-events-new-select-events").html(viewHtml);
    }
  });
 }
 

 function click_default(){
  
	val1=$('#edit-jump5').val();
	
	if (val1 == 'Garage'){

	window.location.href = "<?php echo $base_url;?>/garage/<?php echo $garage_id;?>";

	}else if(val1 == 'Update Car Status'){
	
	window.location.href = "<?php echo $base_url;?>/node/<?php echo $status_id;?>/edit/car-status";
 }
 }
 $(document).ready(function(){
 $(".profile_rowmain").css('display','none');
 });
</script>
<?php
}
?>

<form method="post" name="car model" action="">
<div class="selectList" >
<label style="padding-left:10px;">SELECT ACTION:</label>
<select name="jump5" id="edit-jump5" >
<option  value="all">Select</option>
	<?php 
		if(arg(0) == "articles"){

		$vid=9;
		$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
		foreach ($v as $record)
		{
			echo "<option  value='".$tid=$record->tid."'>".$name=$record->name."</option>";
		}
		
		
		}
		elseif(arg(0) == "events"){

		$vid=10;
		$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
		foreach ($v as $record)
		{
			echo "<option  value='".$tid=$record->tid."'>".$name=$record->name."</option>";
		}
		}
		else
		{
		echo "<option  value='Garage'>Garage</option>";
			echo "<option  value='Update Car Status'>Update Car Status</option>";
			echo "<option class='lefLock' value='Repairs & Services'>Repairs & Services</option>";
			echo "<option class='lefLock' value='Car Designs'>Car Designs</option>";
			echo "<option class='lefLock' value='Upgrades & Tuning'>Upgrades & Tuning</option>";
			echo "<option class='lefLock' value='Maintain & Protect'>Maintain & Protect</option>";
			echo "<option class='lefLock' value='Q&A / Discussions'>Q&A / Discussions</option>";
			echo "<option class='lefLock' value='Test & Showcase'>Test & Showcase</option>";
		
		}
		?>
</select></div>
<div id="take"></div>
</form>
<div align="center" style="margin-top:10px; margin-bottom:30px;">
<?php
if(arg(0) == "articles")
{
?>
<input id="txtbox_bt1" type="submit" value="" onclick="cls_articles();">
<?php
}
elseif(arg(0) == "events"){
?>
<input id="txtbox_bt1" type="submit" value="" onclick="cls_events();">
<?php
}
else{
?>
<input id="txtbox_bt1" type="submit" value="" onclick="click_default();">
<?php
}
?>
</div>
</div>






