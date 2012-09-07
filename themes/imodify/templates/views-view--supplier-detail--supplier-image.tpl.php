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
			<div style="margin-top:15px; margin-bottom:15px;">
					<div class="postTabs">
						<ul>
							<li class="post active"><a href="#">Post to stream</a></li>
							<li class="update"><a href="#">Update Car status</a></li>
							<li class="upload"><a href="#">Upload Articles/ Events</a></li>
						</ul>
					</div>
					<div class="postBox1">
						<form action="#" name="post" id="post">
						<input type="text" value="Whats up?" onfocus="if(this.value=='Whats up?'){this.value=''}" onblur="if(this.value==''){this.value='Whats up?'}" />
						<input type="file" value=" " /></form>
					</div>
			</div>
					  
			<div class="feeds">
				<div class="left"><img src="<?php echo base_path() . path_to_theme();?>/images/img_feed.jpg" alt="" /></div>
				<div class="right">
					<div class="head"><a href="#">Sydney Aviation Cars Show</a> was uploaded.</div>
					<div class="description"><img src="<?php echo base_path() . path_to_theme();?>/images/img_post01.jpg" alt="" />Sat, 09/06/2012 at 10:00 am - Sun, 10/06/2012 at 4:00 pm<br /><br />Welcome to the Sydney Aviation Model Show, a show not to be missed by aviation and motor car enthusiasts of all ages!</div>
					<div class="action">
						<ul>
							<li class="like"><a href="#">Like</a></li>
							<li class="comments"><a href="#">Comments</a></li>
							<li class="share">Share <a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_facebook.gif" alt="" /></a><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_twitter.gif" alt="" /></a></li>
							<li class="last"><a href="#">Read More</a></li>
						</ul>
					</div>
					<div class="likes"><a href="#">3 Likes.</a></div>
					<div class="commentBox1"><a href="#">View All 6 Comments</a><input type="text" value="Write a comment..." /></div>
				</div>
			</div>
			<div class="feeds">
				<div class="left"><img src="<?php echo base_path() . path_to_theme();?>/images/img_feed.jpg" alt="" /></div>
				<div class="right">
					<div class="head"><a href="#">Sydney Aviation Cars Show</a> was uploaded.</div>
					<div class="description"><img src="<?php echo base_path() . path_to_theme();?>/images/img_post01.jpg" alt="" />Sat, 09/06/2012 at 10:00 am - Sun, 10/06/2012 at 4:00 pm<br /><br />Welcome to the Sydney Aviation Model Show, a show not to be missed by aviation and motor car enthusiasts of all ages!</div>
					<div class="action">
						<ul>
							<li class="like"><a href="#">Like</a></li>
							<li class="comments"><a href="#">Comments</a></li>
							<li class="share">Share <a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_facebook.gif" alt="" /></a><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_twitter.gif" alt="" /></a></li>
							<li class="last"><a href="#">Read More</a></li>
						</ul>
					</div>
					<div class="likes"><a href="#">3 Likes.</a></div>
					<div class="commentBox1"><a href="#">View All 6 Comments</a><input type="text" value="Write a comment..." /></div>
				</div>
			</div>        
			<div class="feeds">
				<div class="left"><img src="<?php echo base_path() . path_to_theme();?>/images/img_feed.jpg" alt="" /></div>
					<div class="right">
						<div class="head"><a href="#">EVORACER</a> uploaded new photos.</div>
						<div class="description">
							<div class="bigImgs">
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_photo1.jpg" alt="" class="first" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_photo2.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_photo3.jpg" alt="" /></a>
							</div>
							<div class="album">
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" class="first" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
								<a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/img_album.jpg" alt="" /></a>
							</div>
							<div class="gallery">
								<a href="#">Untitled Gallery</a>
								<a href="#" class="view">View Gallery</a>
							</div>
						</div>
						<div class="action">
							<ul>
								<li class="like"><a href="#">Like</a></li>
								<li class="comments"><a href="#">Comments</a></li>
								<li class="share">Share <a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_facebook.gif" alt="" /></a><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_twitter.gif" alt="" /></a></li>
								<li class="last"><a href="#">Read More</a></li>
							</ul>
						</div>
							<div class="likes"><a href="#">3 Likes.</a></div>
							<div class="commentBox1"><a href="#">View All 6 Comments</a><input type="text" value="Write a comment..." /></div>
					</div>
				</div>
			</div>
			
			<?php
			}
			?>
	
	</div>
