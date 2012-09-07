<?php 

//global $user;
global $user, $base_url;
//print_r($user);exit;
//print_r($view->result);
$uid = $user->uid;
$name = $user->name;
//$result = db_query("SELECT * FROM `file_managed` WHERE `fid`='".$fid."'");
$result = db_query("SELECT
					field_data_field_picture_upload_register.field_picture_upload_register_fid,
					file_managed.filename
					FROM
					field_data_field_picture_upload_register
					INNER JOIN file_managed ON field_data_field_picture_upload_register.field_picture_upload_register_fid = file_managed.fid
					WHERE entity_id ='".$uid."'");
				foreach($result as $record)
				{
					$image = $record->filename;
				}
$imgVars = array();
$imgVars['item']=array('uri'=>base_path().'sites/default/files/profile-pictures/picture-1130-1339486787.jpg','alt'=>'','width'=>200,'height'=>192,'title'=>'','attributes'=>array('class'=>''));
$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());
$themes_path_image= base_path().path_to_theme().'/';
//$image1 = 'http://echo.imodify.com.au/sites/default/files/profile-pictures/'.$image;
$image1 = $base_url.'/sites/default/files/'.$image;
?>
<div class="cardetail_head1"><?php echo $name;?> Online Store</div>
<div>&nbsp;</div>

<div class="cardetail_main">
    <div class="cardetail_img">
		<img src="<?php echo $image1; ?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="180" height="124" />
	 </div>
	 <div style="padding-left:253px; padding-bottom:5px; margin-top:20px;"><strong><a href="/node/add/supplier-profile"; style="color:#f8931d">Add Supplier Profile</a></strong></div>
	 <div style="padding-left:253px; padding-bottom:5px; margin-top:50px;"><strong><a href="/admin/commerce/products/add/product"; style="color:#f8931d">Add Product</a></strong></div>
    <div class="cardetail_content">
      <table border="0" cellspacing="0" cellpadding="0" class="cardetail_content1">
        <tr>
          <th>&nbsp;</th>
          <td>&nbsp;</td>
        </tr>
       
        <tr>
          <th>&nbsp;</th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th colspan="2"><table border="0" cellspacing="0" cellpadding="0">
           </table></th>
        </tr>
        </table>
    </div>
</div>



