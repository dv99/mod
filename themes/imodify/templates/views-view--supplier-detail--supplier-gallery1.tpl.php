<?php
//echo '<pre>'; print_r ($view->result);
$record=$view->result;
//$val=field_field_gallery_image;
$i=0;
$directory=base_path();
$dir = 'http://echo.imodify.com.au';
foreach($record as $value){

//$img_gall=$value->field_field_gallery_image[$i][raw][filename];
?>
<table>
<tr>
<?php
foreach($value->field_field_gallery_image as $img)
{
 $image =$img['raw']['filename'];
 $img_uri =$img['raw']['uri'];

 $imgUri=$img['raw']['uri'];
					$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>43,'height'=>43,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					//$imgVars['path']=array('path'=>'.'.$imgPath,'options'=>array());

if($i < 6){
?>

<td>
 <?php
 echo theme_image_formatter($imgVars).'</br>';
 ?>
 </td>
 
<?php
}$i++;
}
?>
</tr>
 </table>
 <?php
}
?>