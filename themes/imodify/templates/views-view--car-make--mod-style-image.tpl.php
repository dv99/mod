<style type="text/css">
.highlight_image2 {
    background-color: #F9CE6F;
    height: 45px;
    margin-bottom: -45px;
    margin-left: 36px;
    margin-top: 12px;
    width: 45px;
}

#img2 {
    float: none;
    margin-left: 45px;
    margin-top: 4px;
    padding-bottom: 1px;
    padding-left: 1px;
    padding-right: 0;
    padding-top: 3px;
}
</style>
<?php
    $record = $view->result;
	
	$image = $record[0]->field_field_thumb_image[0][raw][filename];
	$img_uri = $record[0]->field_field_thumb_image[0][raw][uri];
	$imgVars = array();
	
	if($image){
$imgVars['item']=array('uri'=>base_path().'sites/default/files/styles/thumb_30x30/public/'.$image,'alt'=>'','width'=>30,'height'=>30,'title'=>'','attributes'=>array('class'=>''));

$imgVars['image_style']='';
$imgVars['path']=array('path'=>'','options'=>array());
 
?>

<div class="highlight_image2" >
</div>
<div id="img2">
    <?php echo theme_image_formatter($imgVars);?>
</div>
<?php
}
?>