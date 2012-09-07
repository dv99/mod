<div style="font-size:10px; font-weight : bold; margin-top:13px;margin-bottom:10px;">LATEST MEMBERS
</div>
<table>
<tbody>
<tr>
<?php
//echo '<pre>'; print_r($view->result);
$i=0;
foreach($view->result as $value){
$i++;
$nid=$value->nid;
$imgUri=$value->field_field_car_image[0]['raw']['uri'];
				$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
				$imgVars = array();
				$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>30,'height'=>30,'title'=>'','attributes'=>array('class'=>''));
				$imgVars['image_style']='';
				$imgVars['path']=array('path'=>'','options'=>array());
			?>
			
			<td>
			<div class='field-content recentThumb'>
			<a href='/car-profile/<?php echo $nid ; ?>'><?php echo  theme_image_formatter($imgVars) ;?></a>
			</div>
			</td>
<?php
if($i==5)
{
echo "</tr><tr>";
}			
}
?>
</tr>
<tr><td>&nbsp;&nbsp;</td></tr>
</tbody>
</table>


