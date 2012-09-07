<style type="text/css">
#image_slider {
	
	background:url(http://echo.imodify.com.au/sites/default/files/White-Background.gif) no-repeat 0 0;
	width:587px; height:330px;
    margin-bottom: -27px;
    margin-left: 104px;
    margin-top: 14px;
	display:none;
   }

#load_slider {
    margin-bottom: -5px;
    margin-left: -4px;
    margin-top: -330px;
}

</style>
<div style="height: 400px; margin-top:10px;">
<?php //echo '<pre>';print_r($view->result);//exit;
foreach($view->result as $value){
	if($value->tid==arg(1)){
		$imgUri=$value->field_field_maker_image[0]['raw']['uri'];
		$makeImg=str_replace('public://',base_path().'sites/default/files/',$imgUri);
		$termName=$value->taxonomy_term_data_name;
		$imgUri=$value->field_field_large_image[0]['raw']['uri'];
		$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
		$imgVars = array();
		$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>542,'height'=>256,'title'=>'','attributes'=>array('class'=>'dropShadow'));
		$imgVars['image_style']='';
		$imgVars['path']=array('path'=>'','options'=>array());
		$isAj=false;
	}
}
if($termName==''){
	$imgUri=$view->result[0]->field_field_maker_image[0]['raw']['uri'];
	$makeImg=str_replace('public://',base_path().'sites/default/files/',$imgUri);
	$termName=$view->result[0]->taxonomy_term_data_name;
	$imgUri=$view->result[0]->field_field_large_image[0]['raw']['uri'];
	$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
	$imgVars = array();
	$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>542,'height'=>256,'title'=>'','attributes'=>array('class'=>'dropShadow'));
	$imgVars['image_style']='';
	$imgVars['path']=array('path'=>'','options'=>array());
	$isAj=true;
}
?>
<table border="0" cellspacing="0" cellpadding="0">
	<tbody style="border:none">
        <tr>
            <td valign="top" style="padding-right:10px;"><img src="<?php echo $makeImg;?>" /></td>
            <td valign="middle" style="padding-right:10px; color:#000; font-weight:bold; font-size:14px;"><?php echo $termName;?></td>
            <td valign="middle" style="padding-right:20px;"><a href="#" style="color:#BD5728;">Join <?php echo $termName;?> Moderating Team</a></td>
        </tr>
    </tbody>
</table>
<div id="image_slider" style="margin-top:10px;">
</div>
<div id="load" style="margin-top: -360px;">
<div id="load_slider" style="margin-top:360px;">
<!--<div style="width:804px; text-align:center; padding-bottom:10px;"><?php echo theme_image_formatter($imgVars);?></div>-->
<?php
		$newid = $isAj==false?arg(1):$view->result[0]->tid;
		$view = views_get_view('car_make_profile');
		$view->set_arguments(array($newid));
		$view->set_display('make_scroller');
		print $view->preview('make_scroller');
?>
</div>
</div>
</div>
