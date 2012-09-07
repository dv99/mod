<?php 
//echo '<pre>';print_r($view->result);

// some requied variables
global $user;
$author_id = $view->result[0]->_field_data['nid']['entity']->uid;
$garage_id = $view->result[0]->_field_data['nid']['entity']->field_car_garage['und'][0]['nid'];

 $image = $view->result[0]->field_field_car_image[0]['raw']['filename'];
 $img_uri =$view->result[0]->field_field_car_image[0]['raw']['uri'];
 $suburb = $view->result[0]->_field_data['nid']['entity']->location['country_name'];
 $state = $view->result[0]->_field_data['nid']['entity']->location['province_name'];
 $street = $view->result[0]->_field_data['nid']['entity']->location['street'];
 
  $cat_arr = array();
foreach($view->result[0]->field_field_car_category as $cat){
  $cat_arr[] = $cat['raw']['taxonomy_term']->name; 
  }

if(empty($image)){
$imgVars['item']=array('uri'=>base_path().'sites/default/files/car.gif','alt'=>'','width'=>200,'height'=>192,'title'=>'','attributes'=>array('class'=>'', 'onError'=>'this.src="'.base_path().path_to_theme().'/images/car.gif"'));
}else{

$imgVars['item']=array('uri'=>base_path().'sites/default/files/styles/carprofile_200x192/public/'.$image,'alt'=>'','width'=>200,'height'=>192,'title'=>'','attributes'=>array('class'=>'', 'onError'=>'this.src="'.base_path().path_to_theme().'/images/car.gif"'));
}
$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());

?>

<div class="cardetail_head1"><?php echo $view->result[0]->node_title;?></div>
    <div style="padding-left:130px; padding-bottom:5px;"><strong><a href="<?php echo ($user->uid == $author_id)?base_path().'node/'.$view->result[0]->nid.'/edit':base_path().'garage/'.$garage_id;?>" style="color:#f8931d"><?php echo ($user->uid == $author_id)?'Change Picture':'View Garage'; ?></a></strong></div>
<div class="cardetail_main">
    <div class="cardetail_img"><?php echo theme_image_formatter($imgVars);?></div>
    <div class="cardetail_content">
      <table border="0" cellspacing="0" cellpadding="0" class="cardetail_content1" width="100%">
        <tr>
<?php if($user->uid == $author_id){ ?>
          <td><div class="carNamebg"><?php echo $view->result[0]->node_title;?></div></td>
          <td align="right"><a href="<?php echo base_path().'node/'.$view->result[0]->nid.'/edit';?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_edit.png" width="82" height="17" /></a></td>
<?php }else{ ?>
	  <td><script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>


<!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo base_path(). 'car-profile/'.$view->result[0]->nid;?>"
addthis:title="<?php echo $view->result[0]->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
<!-- AddThis Button END --></td>
          <td align="right"><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_13.png" width="82" height="17" /></a></td>
<?php }?>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th><a href="#">Car Category</a></th>
          <td><?php echo implode(", ", $cat_arr);//$view->result[0]->field_field_car_category[0]['raw']['taxonomy_term']->name;?></td>
        </tr>
        <tr>
          <th><a href="#">Vehicle Type</a></th>
          <td><?php echo $view->result[0]->field_field_car_make[0]['raw']['taxonomy_term']->name;?> <?php echo $view->result[0]->field_field_car_model[0]['raw']['taxonomy_term']->name;?> <?php echo $view->result[0]->field_field_year_of_make[0]['raw']['value']->name;?></td>
        </tr>
        <tr>
          <th><a href="#">Location</a></th>
			<td><?php  echo $suburb!=''?$suburb:'NA';  echo ' , '; echo $state!=''?$state:'NA';echo ' , '; echo $street!=''?$street:'NA';?></td>
        </tr>
        <tr>
          <th><a href="#">No. of Mods</a></th>
          <td><?php echo count($view->result[0]->field_field_car_style); echo ($user->uid == $author_id)? '<a href="#" style="float:right;color:#f8931d">Edit Mods</a>':'';?></td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th colspan="2"><table border="0" cellspacing="0" cellpadding="0">
		  
            <tr><td><?php print views_embed_view('garage','car_profile_gallery', $view->result[0]->nid);?> </td></tr>
          </table></th>
        </tr>
        <tr>
<?php $gallery_id = db_query("SELECT entity_id FROM {field_data_field_car_gallery} WHERE field_car_gallery_nid = :nid", array(':nid' => $view->result[0]->nid))->fetchCol();

if($user->uid == $author_id){ ?>
          <td colspan="2"><strong><?php if(empty($gallery_id)){
	      echo '<a href="'.base_path() .'node/add/gallery" style="color:#bf5626;">Add Gallery</a>';
      }else{ echo '<a href="'.base_path() .'node/'.$gallery_id[0].'/edit" style="color:#bf5626;">Edit Gallery</a>';
	  ?></td><?php
    }
}else{?>
	<td colspan="2"><strong><?php if(empty($gallery_id)){
	}
	else
	{
	      echo '<a href="'.base_path() .'car-gallery/'.$gallery_id[0].'" style="color:#bf5626;">View Gallery</a>';
		  }
}?>
</strong></td>
        </tr>
        </table>
    </div>
</div>
<div class="clr"></div>
<div class="cardetail_main1">
    <div class="cardetail_mainbox1">
	<a href="/car-gallery/<?php echo $gallery_id[0]; ?>" style="text-decoration:none" >
	<img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /></a>
    	<div class="cardetail_mainbox1_text">Gallery</div>
	</div>
    <div class="cardetail_mainbox1"><a href="<?php echo base_path().'garage/'.$garage_id ;?>" style="text-decoration:none" ><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /></a>
    	<div class="cardetail_mainbox1_text">Garage</div>
    </div>
<?php if($user->uid == $author_id){ ?>
    <div class="cardetail_mainbox1"><a href="#" style="float: left; height: 81px;"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /><img src="<?php echo base_path() . path_to_theme();?>/images/lock_mini.gif" style="top: -44px; left: 42px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /><img src="<?php echo base_path() . path_to_theme();?>/images/plus.gif" style="top: -72px; left: 72px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /></a>
    	<div class="cardetail_mainbox1_text">Mods</div>
    </div>
    <div class="cardetail_mainbox1"><a href="#" style="float: left; height: 81px;"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /><img src="<?php echo base_path() . path_to_theme();?>/images/lock_mini.gif" style="top: -44px; left: 42px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /><img src="<?php echo base_path() . path_to_theme();?>/images/plus.gif" style="top: -72px; left: 72px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /></a>
    	<div class="cardetail_mainbox1_text">Media feature</div>
    </div>
    <div class="cardetail_mainbox1"><a href="#" style="float: left; height: 81px;"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /><img src="<?php echo base_path() . path_to_theme();?>/images/lock_mini.gif" style="top: -44px; left: 42px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /><img src="<?php echo base_path() . path_to_theme();?>/images/plus.gif" style="top: -72px; left: 72px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /></a>
    	<div class="cardetail_mainbox1_text">Awards</div>
	</div>
<?php } ?>
</div>
 
 
<div style="padding: 20px 0 20px 40px; width: 494px; float: left;"><img src="<?php echo base_path() . path_to_theme();?>/images/stream-lock.jpg" /></div>  
