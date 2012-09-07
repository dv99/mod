<?php 
	global $user;
	$uid = $user->uid;
	
	$record  = db_query("SELECT nid FROM `node` WHERE `uid`='".$uid."' AND `type`='cars' order by nid DESC limit 0,1");
					foreach($record as $result)
					{	
						 $carsId    = $result->nid;
						 //$gallery_id = $result->entity_id;
					}

	$record3  = db_query("SELECT `entity_id` FROM `field_data_field_car` WHERE `field_car_nid`='".$carsId."'");
					foreach($record3 as $result3)
					{		
						$cars_id    = $result3->entity_id;
					}

	$record2  = db_query("SELECT `entity_id` FROM `field_data_field_car_gallery` WHERE`field_car_gallery_nid`='".$cars_id."'");
					foreach($record2 as $result2)
					{	
						 //$cars_id    = $result->nid;
						 $gallery_id = $result2->entity_id;
					}
					
	$record1  = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid ASC limit 0,1 ', array(':uid' => $user->uid,':type' => 'garage'));
	foreach($record1 as $result1)
	{	
		 $garage_nid = $result1->nid;
	}
?>
<?php
$themes_path_image= base_path().path_to_theme().'/';
$record = $view->result;
//print_r($record);
if ($gallery_id){
$gallery_id = $gallery_id.'/edit';
}else{
$gallery_id = 'add/gallery';
}
if ($cars_id){
$cars_id = 'node/'.$cars_id.'/edit';
}else{
$cars_id = 'node/add/car-status';
}

?>
<?php
$view = views_get_view('garage');
$view->set_arguments(array($garage_nid));
$view->set_display('garage_title');
?>
<div class="<?php echo $classes;?>">
<div id="garage" style="padding: 10px 0 20px;">
    <div class="top">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="50%" height="30" valign="top" style="padding-right:30px;"><?php print $view->preview('garage_title');?></td>
          <td width="15%" height="30" valign="top" style="padding-right:20px;"><a href="garage/<?php echo $garage_nid;?>"><img src="<?php echo $themes_path_image;?>images/bt17.png" width="142" height="17" /></a></td>
          <td width="10%" height="30" valign="top"><a href="node/add/cars"><img src="<?php echo $themes_path_image;?>images/bt19.png" width="59" height="17" /></a></td>
          <td width="5%" height="30" valign="top">&nbsp;</td>
          <td width="10%" height="30" valign="top" style="padding-right:20px;"><a href="<?php echo $cars_id;?>"><img src="<?php echo $themes_path_image;?>images/updatecarstatus.gif" width="94" height="20" /></a></td>
          <td width="10%" height="30" valign="top"><a href="node/<?php echo $gallery_id;?>"><img src="<?php echo $themes_path_image;?>images/bt20.png" width="82" height="17" /></a></td>
        </tr>
      </table>
    </div>
    
      <div class="tophead1">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="86%">EVORACER NOTIFICATIONS</td>
            <td width="14%" align="right" style="padding-right:10px;"><img src="<?php echo $themes_path_image;?>images/viewfullpage.gif" width="76" height="15" /></td>
            <td width="14%" align="right" style="padding-right:10px;"><img src="<?php echo $themes_path_image;?>images/setting.gif" width="50" height="16" /></td>
          </tr>
        </table>
      </div>
        
<div class="lock_wrap">
          <p>List of safety and legal reccomendation, include renewals, inspections or upgrades recommended / required for your car.</p>
          <div class="lock"> 
            <p><strong>Feature is locked</strong><br />
            This feature is currently under <br />
            developement.<br />
    Please check back later</p>
</div>
        </div>
        
        <div class="clr"></div>
  </div>
</div>