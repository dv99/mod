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
.strathfield_content {
    float: left;
    margin-left: 10px;
    width: 490px;
}

.cardetail_head1 {
    color: #B63B00;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 0;
}

.cardetail_main {
    overflow: hidden;
}

.strathfield_img {
    background-color: #B6B7B6;
    float: left;
    margin-left: 15px;
    margin-right: 20px;
    padding: 1px;
}

.fb_link {
    float: right;
    height: 17px;
    width: 110px;
}
#content .postTabs {
padding-left: 0px;
}

</style>
<?php
$argument1 = arg(1);
$record = $view->result;
//echo $record[0]->product_id; 
//$loc_pos = $record[0]->_field_data[node_field_data_field_pbrand_name_nid][entity]->locations;
$loc_name = $record[0]->_field_data[node_field_data_field_pbrand_name_nid][entity]->location[name];
$loc_street = $record[0]->_field_data[node_field_data_field_pbrand_name_nid][entity]->location[street];
$loc_country = $record[0]->_field_data[node_field_data_field_pbrand_name_nid][entity]->location[country_name];
//print_r($record);die;
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();

$themes_path_image = base_path().path_to_theme().'/';
$brand_name = $view->result[0]->_field_data[node_field_data_field_pbrand_name_nid][entity]->title;
$imgUri = $view->result[0]->_field_data[node_field_data_field_pbrand_name_nid][entity]->field_bimage[und][0][uri];
$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>170,'height'=>105,'title'=>'','attributes'=>array('class'=>'', 'onError'=>'this.src="'.$themes_path_image.'images/img_not.png"'));
$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());

$view01 = views_get_view('commerce_products');
$view01->set_arguments(array($term_id));
$view01->set_display('brand_category');

//no.of items and brands block

$view02 = views_get_view('commerce_products');
$view02->set_arguments(array($term_id));
$view02->set_display('brand_count');									
                                 

?>
<div id="content-onl9-store-page">
    <div class="cardetail_head1"><?php echo $brand_name;?><span class="style1">'s Online Store </span>
	    <div class="fb_link"><a href="#"><img src="<?php echo $themes_path_image;?>images/bt_13.png" width="82" height="17" /></a></div>
	<div class="fb_link" style="width:140px;">
	 <!-- AddThis Button BEGIN -->
		<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'brands/'.$argument1;?>"
		addthis:title="<?php echo $brand_name.' Online Store' ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
	<!-- AddThis Button END -->
	</div>
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
        <td><div class="carNamebg"><?php echo $brand_name;?></div></td>
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
      <?php if( arg(0)== 'brands') { ?>
	  <tr>
        <td width="13">&nbsp;</td>
        <td width="472"><div align="left">Your one stop shop to all things audio,security and navigations. Your one stop shop to all things audio,security and navigations. </div></td>
      </tr>
	  <?php } ?>
      <tr>
        <td>&nbsp;</td>
        <td><table border="0" cellspacing="0" cellpadding="0" class="cardetail_content1">
   
    <tr>
      <th width="167">&nbsp;</th>
      <td width="292">&nbsp;</td>
    </tr>
	 <?php if( arg(0)== 'brands') { ?>
    <tr>
      <th><a href="#"> Category</a></th>
      <td><?php  print $view01->preview('brand_category');?></td>
    </tr>
    <tr>
      <th><a href="#">Location</a></th>
      <td><?php echo $loc_country.', '.$loc_street.', '.$loc_name;?></td>
    </tr>
    <tr>
      <th><a href="#">Service reach </a></th>
      <td></td>
    </tr>
	<?php } ?>
	<?php  print $view02->preview('brand_count');?>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
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

 <div style="margin-top:15px; margin-bottom:15px;"><div class="postTabs">
            <div class="category_box"><img src="<?php echo $themes_path_image;?>images/by-brand-G.png" width="180" height="25" /><img  src="<?php echo $themes_path_image;?>images/by-cat-O.png" width="180" height="25"/><img  src="<?php echo $themes_path_image;?>images/by-car-type-G.png" width="180" height="25"/></div>
        </div>

 </div>
        
