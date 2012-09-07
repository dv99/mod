<?php $argument = arg(0); 
	$argument1 = arg(1);
//echo '<pre>'; print_r(get_defined_vars()); die();?>
<?php
 if($argument == "supplier") {
print views_embed_view('supplier','supplier_image', $view->_field_data['nid']['entity']->uid);
}
else
{

$author_id = $view->result[0]->_field_data['nid']['entity']->uid;
$nid=$view->result[0]->_field_data['nid'];
global $user;
$guser=$user->uid;

//print $guser." = ".$author_id;

 $result_nid = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $author_id,':type' => 'supplier_profile'));
     $record = $result_nid->fetchCol();
 //echo $result_nid;

//echo '<pre>'; print_r($view->result);
$record=$view->result;
$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';

 $street = $view->result[0]->_field_data['nid']['entity']->location['street'];

 $image = $view->result[0]->_field_data['nid']['entity']->field_supplier_image['und'][0]['filename'];
 $img_uri = $view->result[0]->_field_data['nid']['entity']->field_supplier_image['und'][0]['uri'];
$nid=$view->result[0]->nid;


$overview = $view->result[0]->_field_data['nid']['entity']->field_supplier_overview['und'][0]['safe_value'];

 $suburb = $view->result[0]->_field_data['nid']['entity']->location['country_name'];
 $state = $view->result[0]->_field_data['nid']['entity']->location['province_name'];
 $street = $view->result[0]->_field_data['nid']['entity']->location['street'];
 
 

//$state=$record[0]->field_field_state[0]['rendered']['#markup'];
$imgVars = array();


if(empty($image)){
$imgVars['item']=array('uri'=>base_path().'sites/default/files/car.gif','alt'=>'','width'=>200,'height'=>192,'title'=>'','attributes'=>array('class'=>'' , 'onError'=>'this.src="'.base_path().path_to_theme().'/images/car.gif"'));
}else{
$imgVars['item']=array('uri'=>base_path().'sites/default/files/styles/carprofile_200x192/public/'.$image,'alt'=>'','width'=>200,'height'=>192,'title'=>'','attributes'=>array('class'=>'' , 'onError'=>'this.src="'.base_path().path_to_theme().'/images/car.gif"'));
}
$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());


$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';
?>
<div class="<?php print $classes; ?>" >
	
	<div class="cardetail_head1">
	<?php
 	echo $view->result[0]->users_node_name;
	?>
	<span class="sub_head" style="color:black;" >'s Profile </span>
	
	</div>
	<div style="padding-left:130px; padding-bottom:5px;">
	<?php
	 if($guser == $author_id)
	 {
	 ?>
		<strong><a href="<?php echo base_path().'node/'.$view->result[0]->nid.'/edit';?>" style="color:#f8931d;">Change Picture</a></strong>
	  
	<?php
	}
	?>
	</div>
	<div class="cardetail_main">
				<div class="cardetail_img"><?php echo theme_image_formatter($imgVars);?></div>
				<div class="cardetail_content">
					<table border="0" cellspacing="0" cellpadding="0" class="cardetail_content1">
						<tr>
						
						  
						  <?php //print $guser." = ".$author_id;
						  
						  if($guser != $author_id)
						  {
						  ?>
			  <td>
						  <!-- AddThis Button BEGIN -->
									<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value->nid;?>"
									addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
								<!-- AddThis Button END -->
			</td>
							<?php
						  }
						  else
						  {
						  ?>
						  <td><div class="carNamebg">
						  <?php echo $view->result[0]->users_node_name;?>
						</div></td>
						  <?php
						  }
						  ?>
						  
						
						  <?php
						  if($guser != $author_id)
						  {
						  ?>
							<td align="right">
						<div>
						<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_13.png" width="82" height="17" /></a>
						</div>
							</td>
						 <?php
						  }
						  else
						  {
						  ?>
						<td align="right" width="165">
						<div>
						  <a href="<?php echo base_path().'node/'.$view->result[0]->nid.'/edit';?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_edit.png" width="82" height="17" /></a>
							</div>
			</td>			 
						 <?php
						  }
						  ?>
						
					</tr>
			<tr> <td>&nbsp;</td></tr>

			<tr>
					<td  colspan="2"  width="472"><div align="left"><font color="black">
					<script type="text/javascript">
$(document).ready(function(){
  $("#read").click(function(){
 // $("#str1").hide();
    $("#str1").slideToggle('fast');
	$("#str").hide();
	$("#read").hide();
  });
});
</script>
					<div id="str"><?php echo substr($overview,0,100); ?></div>
					<div id="str1" style="display:none;"><?php echo $overview ; ?></div>
					
					
					</font></td>
				  </tr>
			<tr>
			  <th>&nbsp;</th>
			<td class="last_read"  id="read" align="right" width="165"  >
			<?php if($overview){?> 
			<a href="#">Read More</a>
			<?php } ?>
			</td>
			</tr>
			

					<tr>
					  <th>&nbsp;</th>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <th><a href="#">Supplier Category</a></th>
					  <td>
					  
					  <?php
								$view = views_get_view('supplier_profile');
												  $view->set_arguments(array($term_id));
												  $view->set_display('parent_category');
								  $category=$view->preview('parent_category');
								 echo $category!=''?$category:'NA';
								
								
								?>
					  
					  </td>
					</tr>
					<tr>
					  <th><a href="#">Location</a></th>
					  <td><?php  echo $suburb!=''?$suburb:'NA';  echo ' , '; echo $state!=''?$state:'NA';echo ' , '; echo $street!=''?$street:'NA';?></td>
					</tr>
				<tr>
					  <th></th>
					  <td>
					  <?php
								$view = views_get_view('supplier_profile');
												  $view->set_arguments(array($term_id));
												  $view->set_display('product_count');
								print $view->preview('product_count');
								
								
								
								?>
					 
					</tr>
					<tr>
					  <th>&nbsp;</th>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					<?php
				
				  $view = views_get_view('car_browse');
						$view->set_arguments(array());
						$view->set_display('supplier_gallery');
						 $gallery_id = $view->preview('supplier_gallery');
						//$gallery_id =284940;
					?>
				  <th colspan="2">
				  
					 <table border="0" cellspacing="0" cellpadding="0">
		 
					
					 <tr><td><?php  print views_embed_view('garage','suppl_gallery_block', $gallery_id);?> </td></tr>
					</table>
					
				  </th>
				</tr>
				<tr>
				
				  <td colspan="2"><strong>
				  <?php
				  if($guser == $author_id)
				  {
				  
					if(empty($gallery_id)){
					
					echo '<a href="'.base_path() .'node/add/gallery" style="color:#bf5626;">Add Gallery</a>';
					  
					  }
					  else{
					  echo '<a href="'.base_path() .'node/'.$gallery_id.'/edit" style="color:#bf5626;">Edit Gallery</a>';
						}
					  }
				  else
				  {
					 if(empty($gallery_id)){
					 
					  
					  }
					  else
					  {
					  echo '<a href="/car-gallery/'.$gallery_id.' " style="color:#bf5626;">View Gallery</a>';
					  }
						  }
				  ?>
				  </strong></td>
				</tr>
				  
							
							</strong>
						</td>
					</tr>
					
					</table>
				</div>
				</div>
				
				<div class="clr"></div>
			<div class="cardetail_main1">
				<div class="cardetail_mainbox1">

				
				<a href="/car-gallery/<?php echo $gallery_id ; ?>" style="text-decoration:none" ><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" />
					</a><div class="cardetail_mainbox1_text">Gallery</div>
				</div>
				<div class="cardetail_mainbox1"><a href="/supplier/<?php echo $author_id ; ?>" style="text-decoration:none" ><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /></a>
					<div class="cardetail_mainbox1_text">Online Store</div>
				</div>
			<?php
			 if($guser == $author_id)
			 {
			?>
				<div class="cardetail_mainbox1"><a href="#" style="float: left; height: 81px;"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /><img src="<?php echo base_path() . path_to_theme();?>/images/lock_mini.gif" style="top: -44px; left: 42px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /><img src="<?php echo base_path() . path_to_theme();?>/images/plus.gif" style="top: -72px; left: 72px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /></a><div class="cardetail_mainbox1_text">Garage</div>
				</div>
				
				<div class="cardetail_mainbox1"><a href="#" style="float: left; height: 81px;"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /><img src="<?php echo base_path() . path_to_theme();?>/images/lock_mini.gif" style="top: -44px; left: 42px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /><img src="<?php echo base_path() . path_to_theme();?>/images/plus.gif" style="top: -72px; left: 72px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /></a>
					<div class="cardetail_mainbox1_text">Events</div>
				</div>
				<div class="cardetail_mainbox1"><a href="#" style="float: left; height: 81px;"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" /><img src="<?php echo base_path() . path_to_theme();?>/images/lock_mini.gif" style="top: -44px; left: 42px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /><img src="<?php echo base_path() . path_to_theme();?>/images/plus.gif" style="top: -72px; left: 72px; position: relative; -moz-box-shadow:none; -webkit-box-shadow:none; box-shadow: none; -ms-filter: 'progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='')'; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=0, Direction=90, Color='');" /></a>
					<div class="cardetail_mainbox1_text">Articles</div>
				</div>
			<?php
			}
			?>
			</div>
			
			<div style="padding: 20px 0 20px 40px; width: 494px; float: left;"><img src="<?php echo base_path() . path_to_theme();?>/images/stream-lock.jpg" /></div>

			
			<?php
			}
			?>
	
	</div>
