<div class="<?php echo $classes;?>">
<?php
$record = $view->result;
$page_section = $record[0]->taxonomy_term_data_node_name;
$themes_path_image= base_path().path_to_theme().'/';
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path(); 
$directory = base_path().'sites/default/files/styles/thumbnail/public/'; 
?>
<div class="clr"></div>
<div class="view-content cardetail_main1">
<?php 
if (sizeof($record) > 0) {

foreach ($record as $val)
{
	$image_name = $val->_field_data[nid][entity]->field_car_image[und][0][filename];
	$title = $val->node_title;

	$href = $val->_field_data[nid][entity]->vid;

?>

 <div class="cardetail_mainbox1"><a href="<?php echo $site_path.'car-profile/'.$href;?>"><img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/car_small.gif'" width="75" height="75" /></a>
 <div class="cardetail_mainbox1_text"><?php echo $title;?></div>
 </div>
 
  
<?php
}  // For Each Close
} // If condition Close
?>
        
 </div>        
        
 </div>