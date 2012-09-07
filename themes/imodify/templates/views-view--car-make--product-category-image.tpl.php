<style type="text/css">

.highlight_image1 {
    background-color: #F9CE6F;
    height: 45px;
    margin-bottom: -4px;
    margin-left: 36px;
    margin-top: 3px;
    width: 45px;
}
#img2 {
    float: none;
    margin-bottom: 10px;
    margin-left: 45px;
    margin-top: -37px;
    padding-bottom: -30;
    padding-left: 1px;
    padding-right: 0;
}
</style>
<?php
	global $base_url;
	//print_r($view->result);exit;
    $record = $view->result;
	$img_uri = $record[0]->field_field_product_cat_image[0]['raw']['uri'];
		
	if($img_uri){
	$img_uri = $record[0]->field_field_product_cat_image[0]['raw']['uri'];
		$imgPath=str_replace('public://',base_path().'sites/default/files/styles/thumb_75x75/public/',$img_uri);
		$imgVars = array();
		$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>30,'height'=>30,'title'=>'','attributes'=>array('class'=>''));
		$imgVars['image_style']='';
		$imgVars['path']=array('path'=>'events/'.$value->nid,'options'=>array());?>
	

<div class="highlight_image1" >
</div>
<div id="img2">
    <?php echo theme_image_formatter($imgVars);?>
</div>
<?php
}
?>