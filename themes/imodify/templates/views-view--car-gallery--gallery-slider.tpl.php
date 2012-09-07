<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<?php
	$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
	$themes_path_image= base_path().path_to_theme().'/';
	$value = $view->result;
	//print_r($value);die;
	//$termName=$value->taxonomy_term_data_name;
	$termName = ucwords(strtolower(substr($value[0]->_field_data[nid][entity]->title,0,30)));
	$imgUri=$value[0]->_field_data[nid][entity]->field_gallery_image[und][0][uri];
	$makeImg=str_replace('public://',base_path().'sites/default/files/',$imgUri);
	$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
	$author_id = $view->result[0]->_field_data['nid']['entity']->uid;
	//echo 'term id is '.$term_id = $record[0]->taxonomy_term_data_field_data_field_sub_category_tid;
	global $user;
	$user_id = $user->uid;
	$result = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $author_id,':type' => 'garage'));
	   foreach ($result as $record){
	   $garage_id = $record->nid; 
                }
				
		$result_n = db_query('SELECT * FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $author_id,':type' => 'cars'));
		foreach ($result_n as $record){
	    $car_nid = $record->nid; 
                }
		$node = node_load($car_nid);
		$mod_id = $node->field_car_style;
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="10%" rowspan="2" valign="top" align="left"><img src="<?php echo $makeImg;?>" width="61" height="59" class="dropShadow" /></td>
      <td colspan="2" valign="top"><h3><?php echo $termName;?>'<span>s Gallery</span></h3></td>
		<td width="22%" valign="top">
		<?php	
			$viewn = views_get_view('car_gallery');
				$viewn->set_arguments(array($author_id));
				$viewn->set_display('select_gallery');
				print $viewn->preview('select_gallery');
				
		?> 
		</td>
	  <!--
      <td width="22%" valign="top"><strong>Photo Gallery 1 <img src="<?php //echo $themes_path_image;?>images/arrow_down.gif" width="8" height="8" /></strong></td>
	  -->
      <?php if($user_id == $author_id) { ?>
	  <td width="11%" align="right" valign="top"><a href="<?php echo base_path().'node/'.$value[0]->nid.'/edit'; ?>" style="color:#f8931d">Edit Gallery</a></td>
      <td width="15%" align="right" valign="top"><a href="<?php echo base_path().'node/'.$value[0]->nid.'/edit'; ?>"><img src="<?php echo $themes_path_image;?>images/add_photo.gif" width="81" height="18" /></a></td>
	  <?php } else { ?>
	  <td width="8%" align="right" valign="top"></td>
	   <td width="15%" align="right" valign="top">
	   <!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'car-gallery/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
	   </td>
	   <?php } ?>
    </tr>
    <tr> 
      <td width="13%" valign="top"><h4><a href="<?php  echo base_path().'garage/'.$garage_id; ?>">View Garage</a></h4></td>
      <td colspan="4" valign="top"><h4><a href="<?php  echo base_path().'car-mod-style/'.$mod_id; ?>">View <?php echo ' '.$termName;?>'s Mods</a></h4></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
<div class="slider" style="width:710px; float:left;">
<?php
$record = $view->result;
//print_r($record);
echo $record[0]->field_field_gallery_image[0][rendered];
?>
</div>
 