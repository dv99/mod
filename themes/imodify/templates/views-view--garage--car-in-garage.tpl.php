<?php global $user;
	//print_r($view->result);
	$user_id = $user->uid;
	 $garageID=get_user_node_by_type('garage',$user->uid);
	//$themes_path_image= base_path().path_to_theme().'/';
	$record = $view->result;
	foreach($record as $result)
	{
		$image = $result->field_field_car_image[0][raw][filename];
		$CarId = $result->nid;
	?>
	<a href="<?php echo base_path().'car-profile/'.$CarId;?>"><img src="<?php base_path();?>/sites/default/files/<?php echo $image;?>" width="82" height="75" /></a>
	<?php } ?>
	</br>
	</br>
	<!--<div align=center><a href="/garage/<?php echo $garageID[0];?> " style="color:#bf5626;">View more</a></div>-->
	<a href="<?php echo base_path().'garage/'.$garageID[0];?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="84" height="18" /></a>
      
