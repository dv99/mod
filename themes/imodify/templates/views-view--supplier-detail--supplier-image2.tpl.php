<?php $argument = arg(0);
	$argument1 = arg(1);
?>
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
.cardetail_content1 th{
	font-weight: normal;
	text-align: left;
	padding-bottom: 5px;
	
}

.cardetail_content1 td{
	text-transform: none;
	text-decoration: none;
	color: #bf5626;
	
}
</style>
<?php
//echo '<pre>'; print_r($view->result);exit;
$record=$view->result;


$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';

 $image = $view->result[0]->_field_data['nid']['entity']->field_supplier_image['und'][0]['filename'];
 $img_uri = $view->result[0]->_field_data['nid']['entity']->field_supplier_image['und'][0]['uri'];
 
$uid=$record[0]->users_node_uid;			
$title=$record[0]->node_title;


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
    <div class="cardetail_head1">
	<?php echo $title ; ?>
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
        <td><div class="carNamebg"><?php echo $title;?></div></td>
        <td width="99">&nbsp;</td>
        <td width="109">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="485" height="30" border="0" cellpadding="00" cellspacing="00">
     
      <tr>
        <td>&nbsp;</td>
        <td><table width="413" height="81" border="0" cellpadding="0" cellspacing="0" class="cardetail_content1">
 
   <tr>

		  <td>
		  <?php
					$view = views_get_view('supplier_profile');
                                      $view->set_arguments(array($term_id));
                                      $view->set_display('product_count');
				    print $view->preview('product_count');
					
					
					
					?>
         
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
            <div class="category_box"><img src="<?php echo base_path() . path_to_theme();?>/images/by-brand-G.png" width="180" height="25" /><img  src="<?php echo base_path() . path_to_theme();?>/images/by-cat-O.png" width="180" height="25"/><img src="<?php echo base_path() . path_to_theme();?>/images/by-car-type-G.png" width="180" height="25"/></div>
        </div>
    
 </div>
        
  </div>
</div>