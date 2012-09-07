<?php //echo '<pre>';print_r($view->result);exit;
$imgVars = array();
$imgVars['item']=array('uri'=>base_path().'sites/default/files/styles/carprofile_200x192/public/'.$view->result[0]->field_field_car_image[0]['raw']['filename'],'alt'=>'','width'=>200,'height'=>192,'title'=>'','attributes'=>array('class'=>''));
$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());
$themes_path_image= base_path().path_to_theme().'/';
?>


    <div style="padding-left:130px; padding-bottom:5px;"><strong><a href="/node/add/cars"; style="color:#f8931d">Add Car</a></strong></div>
<div class="cardetail_main">
    <div class="cardetail_img"><img src='<?php echo $themes_path_image?>images/img_not.png'" width="180" height="124" /></a></div>
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
<div class="clr"></div>
<div class="cardetail_main1">
    <div class="cardetail_mainbox1"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" />
    	<div class="cardetail_mainbox1_text"><a href="/node/add/gallery" style="color:#bf5626;">Add Gallery</a></div>
	</div>
    <div class="cardetail_mainbox1"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" />
    	<div class="cardetail_mainbox1_text">Garage</div>
    </div>
    <div class="cardetail_mainbox1"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" />
    	<div class="cardetail_mainbox1_text">Mods</div>
    </div>
    <div class="cardetail_mainbox1"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" />
    	<div class="cardetail_mainbox1_text">Media feature</div>
    </div>
    <div class="cardetail_mainbox1"><img src="<?php echo base_path() . path_to_theme();?>/images/imgbox1.png" width="95" height="67" />
    	<div class="cardetail_mainbox1_text">Awards</div>
	</div>
</div>
 
 
 
 </div>
 

     
      
     