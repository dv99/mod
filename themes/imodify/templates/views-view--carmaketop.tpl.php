<?php //echo '<pre>';print_r($view->result);exit;
print_r($_POST);?>
<?php /*?>foreach($view->result as $value){
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
	}
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
<div style="width:765px; text-align:right; padding-bottom:10px;"><?php echo theme_image_formatter($imgVars);?></div><?php */?>