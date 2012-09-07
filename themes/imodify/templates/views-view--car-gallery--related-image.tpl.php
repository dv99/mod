<?PHP
//echo '<pre>'; print_r($view->result);
$record=$view->result;
$themes_path_image= base_path().path_to_theme().'/';
?>
<div class="car_img">
<?php
	$j=1;
	foreach($record as $value){
	//echo $record[0]->_field_data['nid']['entity']->field_gallery_image[und][0][filename];
	$imgUri=$value->_field_data['nid']['entity']->field_gallery_image[und][0][uri];
					$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>123,'height'=>97,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>'car-gallery/'.$value->nid,'options'=>array());
					$nid = $value->nid;
					if ($nid != arg(1)){
				
?>

	<div class="graybox"><?php echo theme_image_formatter($imgVars); ?></div>
<?php

	$j++;
	if($j==15){
	break;
		}
	} }
	if($j<15){
			for($j;$j<=15;$j++){
?>
				<div class="graybox"> 
							
					<div align="center"><img src="<?php echo $themes_path_image;?>images/introbg.jpg" width="123" height="97" /></div>
								
				</div>
<?php		
				}
			}
?>
		<div style="text-align:center"><img src="<?php echo $themes_path_image;?>images/viewmore.gif" width="371" height="20" /></div>

		<div class="clear"></div>
</div>