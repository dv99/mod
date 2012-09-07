<?php
//echo '<pre>'; print_r($view->result);

$recordz = $view->result;
//print_r($recordz);
//die;
$themes_path_image= base_path().path_to_theme().'/';
?>


<?php
	global $theme_path,$base_url;
	$theme_path = '/'.$theme_path;
	//$record = $view->result;
	
	?>
	<ul class="thumbnails">
<?php
	$j=1;
	$i=0;
	foreach($recordz as $value){
	$imgUri=$value->_field_data['nid']['entity']->field_gallery_image[und][$i
	][uri];
	if ($imgUri != ''){
					$imgPath = str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>63,'height'=>63,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>'car-gallery/'.$value->nid,'options'=>array());
					//$nid = $value->nid;
?>
<li><?php echo theme_image_formatter($imgVars); ?></li>
<?php

	$j++;
	$i++;
	if($j==12){
	break;
		} 
	 }
	 }
	 
if($j<13){
			for($j;$j<=12;$j++){
?>
				<li><a href="#"><img src="<?php echo $theme_path;?>/images/img_feed3.jpg" alt="" /></a></li>
<?php		
				}
			}
?>
</ul>