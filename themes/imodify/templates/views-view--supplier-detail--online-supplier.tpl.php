<?php $argument = arg(0);
	$argument1 = arg(1);
//echo '<pre>'; print_r(get_defined_vars()); die();?>
<style type="text/css">

.views-label-field-pbrand-name{
display:none;
}

.views-label-product-id{
display:none;
}

#readmore{
color:#00000;
font-family:"Times New Roman", Times, serif;
}
.postTabss {
	float:left;
	width:100%;
	}
.category_box{
	float: left;
	width: 680px;
	height: auto;
	border-bottom: #939393 thin solid;
	padding-left:25px;
}
.strathfield_img{
	float: left;
	padding: 1px;
	
	margin-left: 15px;
	margin-right: 20px;
}
.strathfield_content{
	float: left;
	width: 490px;
	margin-left: 10px;
}
.fb_link{
	float: right;
	width: 110px;
	height:17px;
	margin-right: 24px;
}
.cardetail_head1{
	color: #b63b00;
	font-size: 18px;
	font-weight: bold;
	margin-bottom: 0px;
}

.cardetail_img{
	float: left;
	padding: 1px;
	background-color: #b6b7b6;
	margin-left: 15px;
}
#twoColLeft th {
    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-bottom-color: -moz-use-text-color;
    border-bottom-style: none;
    border-bottom-width: medium;
    border-left-color-ltr-source: physical;
    border-left-color-rtl-source: physical;
    border-left-color-value: -moz-use-text-color;
    border-left-style-ltr-source: physical;
    border-left-style-rtl-source: physical;
    border-left-style-value: none;
    border-left-width-ltr-source: physical;
    border-left-width-rtl-source: physical;
    border-left-width-value: medium;
    border-right-color-ltr-source: physical;
    border-right-color-rtl-source: physical;
    border-right-color-value: -moz-use-text-color;
    border-right-style-ltr-source: physical;
    border-right-style-rtl-source: physical;
    border-right-style-value: none;
    border-right-width-ltr-source: physical;
    border-right-width-rtl-source: physical;
    border-right-width-value: medium;
    border-top-color: -moz-use-text-color;
    border-top-style: none;
    border-top-width: medium;
    font-weight: normal;
    padding-bottom: 5px;
    text-align: left;
    width: 40%;
}

#twoColLeft th {
    padding-right: 1em;
}
</style>

<?php


$author_id = $view->result[0]->_field_data['nid']['entity']->uid;
global $user;
echo $guser=$user->uid;
//print $guser." = ".$author_id;

$record=$view->result;

$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';

 $image = $view->result[0]->_field_data['nid']['entity']->field_supplier_image['und'][0]['filename'];
 $img_uri = $view->result[0]->_field_data['nid']['entity']->field_supplier_image['und'][0]['uri'];

$suburb=$record[0]->field_field_suburb[0][raw][safe_value];
$street=$record[0]->field_field_street[0][raw][safe_value];
$state=$record[0]->field_field_state[0]['rendered']['#markup'];
$imgVars = array();


if(empty($image)){
$imgVars['item']=array('uri'=>base_path().'sites/default/files/car.gif','alt'=>'','width'=>170,'height'=>105,'title'=>'','attributes'=>array('class'=>'', 'onError'=>'this.src="'.$themes_path_image.'images/car.gif"'));
}else{
$imgVars['item']=array('uri'=>base_path().'sites/default/files/styles/image_170x105/public/'.$image,'alt'=>'','width'=>170,'height'=>105,'title'=>'','attributes'=>array('class'=>'', 'onError'=>'this.src="'.$themes_path_image.'images/car.gif"'));
}
$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());


?>
<div class="<?php print $classes; ?>">
<div id="content-onl9-store-page">
    <div class="cardetail_head1"><?php
 	
	$name=$view->result[0]->users_node_name;
	echo $name; ?>
	<span class="style1">'s Online Store </span>
	<?php
	if($guser == $author_id)
	{
	?>
	<div align="right">
	 <a href="<?php echo base_path().'node/'.$view->result[0]->nid.'/edit';?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_edit.png" width="82" height="17" /></a>
	 </div>
	<?php
	}
	else
	{
	?>
	<div class="fb_link"><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_13.png" width="80" height="17" /></a></div>
	<div class="fb_link">
	<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="120" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
						</div>
	
	<?php
	}
	?>
	</div>
    <div style="padding-left:130px; padding-bottom:10px;"></div>
<div class="cardetail_main">
<div class="strathfield_img"><?php echo theme_image_formatter($imgVars);?></div>
<div class="strathfield_content">

<table width="485" border="0" cellspacing="00" cellpadding="00">
  <tr>  </tr>
  <tr>
    <td><table width="485" border="0" cellspacing="00" cellpadding="00">
      <tr>
        <td><div class="carNamebg"><?php echo $name;?></div></td>
        <td width="99">&nbsp;</td>
        <td width="109">&nbsp;</td>
		
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="485" border="0" cellspacing="00" cellpadding="00">
      <tr>
        <td width="13">&nbsp;</td>
        <td width="472"><div align="left">Your one stop shop to all things audio,security and navigations. Your one stop shop to all things audio,security and navigations. </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><table border="0" cellspacing="0" cellpadding="0" class="cardetail_content1">
   
    <tr>
      <th width="167">&nbsp;</th>
      <td width="292">&nbsp;</td>
    </tr>
    <tr>
      <th><a href="#"> Category</a></th>
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
      <td><?php  echo $state!=''?$state:'NA';  echo ' , '; echo $suburb!=''?$suburb:'NA';echo ' , '; echo $street!=''?$street:'NA';?></td>
    </tr>
	
    <tr>
      <th><a href="#">Service reach</a></th>
      <td><?php  echo 'NA'?></td>
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
	
      
	  <th colspan="2">
	  <?php
	   $view = views_get_view('car_browse');
            $view->set_arguments(array());
            $view->set_display('supplier_gallery');
			$gallery_id = $view->preview('supplier_gallery');
			?>
	  <table border="0" cellspacing="0" cellpadding="0">
		  
            <tr><td><?php  print views_embed_view('garage','suppl_gallery_block', $gallery_id);?> </td></tr>
          </table></th>
	 
    </tr>
	
    <tr>
	
      <td colspan="2">
	  <strong>
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
    </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

  
</div>
<div class="cardetail_main">


</div>


</div>

<div class="clr"></div>

 <div style="margin-top:15px; margin-bottom:15px;"><div class="postTabss">
            <div class="category_box"><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/by-brand-G.png" width="180" height="25" /></a><a href="#"><img  src="<?php echo base_path() . path_to_theme();?>/images/by-cat-O.png" width="180" height="25"/></a><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/by-car-type-G.png" width="180" height="25"/></a></div>
        </div>
      
 </div>

 
 </div>      
 </div>
</div>