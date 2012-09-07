<?php global $user, $base_url;
		//print_r($user);exit;
      $user_id = $user->uid;
	  $garageID=get_user_node_by_type('garage',$user->uid);
	  
$result = db_query('SELECT entity_id FROM {field_data_field_car} WHERE field_car_nid = :nid limit 0,1 ', array(':nid' => $view->result[0]->nid)); 
	  foreach ($result as $record){
	    $status_id = $record->entity_id; 
	}
$result = db_query('SELECT entity_id FROM {field_data_field_car_gallery} WHERE field_car_gallery_nid = :nid limit 0,1 ', array(':nid' => $view->result[0]->nid)); 
	  foreach ($result as $record){
	    $gallery_id = $record->entity_id; 
	}
?>
	  
	  
<div id="proLinkWrap">
	<script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $(".profileName").click(function(){
                $(".profile_rowmain").fadeToggle('slow');
                return false;
            });
        });
    </script>
	<?php 	$argument = arg(0);
		  $argument1 = arg(1);
$node = node_load($argument1);
	?>
    <div class="profile_rowmain">
        <ul>
			<?php if($node->type !="supplier_profile") {?>
            <li>
                <a href="<?php echo base_path();?>car-profile/<?php echo $view->result[0]->nid;?>"><div class="profile_row1">Profile</div></a>
                <a href="<?php echo base_path();?>node/<?php echo $view->result[0]->nid;?>/edit"><div class="profile_row2">edit</div></a>
            </li>
			<?php }elseif(in_array('Automotive Supplier', $user->roles)){ ?>
			
            <li>
                <a href="<?php echo base_path();?>supplier-profile/<?php echo $user->uid;?>"><div class="profile_row1">Profile</div></a>
                <a href="<?php echo base_path();?>supplier-profile/<?php echo $user->uid;?>"><div class="profile_row2">edit</div></a>
            </li>
			<?php }else{ ?>
			<li>
                <a href="<?php echo base_path();?>supplier-profile/<?php echo $user->uid;?>"><div class="profile_row1">Profile</div></a>
                <a href="<?php echo base_path();?>car-profile/<?php echo $view->result[0]->nid;?>"><div class="profile_row2">edit</div></a>
            </li>
			<?php } ?>
            <li>
                <a href="<?php echo base_path();?>car-gallery/<?php echo $gallery_id;?>"><div class="profile_row1">Gallery</div></a>
                <a href="<?php echo ($gallery_id)?'/node/'.$gallery_id.'/edit':'/node/add/gallery/'.$view->result[0]->nid ?>"><div class="profile_row2"><?php echo ($gallery_id)?'Edit':'Add' ?></div></a>
            </li>
           <?php if($node->type !="supplier_profile") {?>
			<li>
                <a href="<?php echo ($status_id)?base_path().'car-status/'.$status_id:'';?>"><div class="profile_row1">Car Status</div></a>
<?php if($status_id){?>
                <a href="<?php echo $base_url.'/node/'.$status_id.'/edit/car-status'?>"><div class="profile_row2">Update</div></a>
<?php }else{?>
		<a href="<?php echo $base_url.'/node/add/car-status'?>"><div class="profile_row2">Add</div></a>
<?php }?>
            </li>
			<?php } ?>
            <li>
                <a href="<?php echo base_path();?>car-message/<?php echo $view->result[0]->nid;?>" onclick="return false;"><div class="profile_row1">Messages</div></a>
                <a href="<?php echo base_path();?>car-message/<?php echo $view->result[0]->nid;?>" onclick="return false;"><div class="profile_row2"><img src="<?php echo base_path().path_to_theme();?>/images/lock_mini.gif" /></div></a>
                <?php /*?><a href="<?php echo base_path();?>car-message/<?php echo $view->result[0]->nid;?>"><div class="profile_row2">Compose</div></a><?php */?>
            </li>
			 <?php if($node->type =="supplier_profile") {?>
			 <li>
                <a href="<?php echo base_path();?>supplier/<?php echo $argument1;?>"><div class="profile_row1">Online Store</div></a>
                <a href="<?php echo base_path();?>supplier/<?php echo $argument1;?>"><div class="profile_row2">Manage</div></a>
            </li>
            <li>
                <a href="<?php echo base_path();?>car-message/<?php echo $view->result[0]->nid;?>"><div class="profile_row1">Favourites</div></a>
                <a href="<?php echo base_path();?>my-favorites/<?php echo $view->result[0]->nid;?>" onclick="return false;"><div class="profile_row2"><img src="<?php echo base_path().path_to_theme();?>/images/lock_mini.gif" /></div></a>
            </li>
			<?php }else{ ?>
            <li>
                <a href="<?php echo base_path();?>car-message/<?php echo $view->result[0]->nid;?>"><div class="profile_row1">Favourites</div></a>
                <a href="<?php echo base_path();?>my-favorites/<?php echo $view->result[0]->nid;?>" onclick="return false;"><div class="profile_row2"><img src="<?php echo base_path().path_to_theme();?>/images/lock_mini.gif" /></div></a>
            </li>
            <?php } ?>
            <li class="g2g"><a href="<?php echo base_path();?>garage/<?php echo $garageID[0]; ?>">Go to garage</a></li>
            <?php /*<li class="g2g"><a href="<?php echo base_path();?>garage/<?php echo $view->result[0]->field_field_car_garage[0]['raw']['nid'];?>">Go to garage</a></li>*/?>
        </ul>
    </div>
</div>