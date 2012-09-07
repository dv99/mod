<style type="text/css">
#image_slider {		
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
<div class="<?php echo $classes;?>">
<div style="height: 400px; margin-top:10px;">
<?php 
//print_r($view->result);
foreach($view->result as $value){
	if($value->tid==arg(1)){
		$imgUri=$value->_field_data[tid][entity]->field_suppliercatimage[und][0][uri];
		$makeImg=str_replace('public://',base_path().'sites/default/files/',$imgUri);
		$termName=$value->taxonomy_term_data_name;
		$imgUri=$value->field_field_suppliercatimage[0][raw][uri];
		$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
		$imgVars = array();
		$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>542,'height'=>256,'title'=>'','attributes'=>array('class'=>'dropShadow'));
		$imgVars['image_style']='';
		$imgVars['path']=array('path'=>'','options'=>array());
		$isAj=false;
	}
} 
if($termName==''){

		$imgUri=$value->_field_data[tid][entity]->field_suppliercatimage[und][0][uri];
		$makeImg=str_replace('public://',base_path().'sites/default/files/',$imgUri);
		$termName=$value->taxonomy_term_data_name;
		$imgUri=$value->field_field_suppliercatimage[0][raw][uri];
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
            <td valign="top" style="padding-right:10px;"><img src="<?php echo $makeImg;?>" height="44" width="44" /></td>
            <td valign="middle" style="padding-right:10px; color:#000; font-weight:bold; font-size:14px;"><?php echo $termName;?></td>
            <td valign="middle" style="padding-right:20px;"><a href="#" style="color:#BD5728;">Join <?php echo $termName;?> Moderating Team</a></td>
        </tr>
    </tbody>
</table>
<div id="image_slider" style="margin-top:10px;">
</div>
<div id="load" style="margin-top: -360px;">
<div id="load_slider" style="margin-top:360px;">
<?php
		//$nid = arg(1);
		$nid = $isAj==false?arg(1):$view->result[0]->tid;
		$view = views_get_view('product_category');
		$view->set_arguments(array($nid));
		$view->set_display('product_scroller');
		print $view->preview('product_scroller');
?>
</div>
</div>
</div>
</div>
