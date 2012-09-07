<style type="text/css">
.tname{
	color:#454545;
	font-size : 16px;
	font-weight : bold;
	}
</style>
<?php
global $base_url;
$value = $view->result;
	//$termName=$value->taxonomy_term_data_name;
	$termName = ucwords(strtolower(substr($value[0]->_field_data[nid][entity]->title,0,80)));
?>
<div class="tname"><?php echo $termName.'   /  ';?><?php echo date('d M Y',$value[0]->_field_data['nid']['entity']->created);?></div>
</br></br>
<?php echo ucfirst(strtolower($value[0]->field_body[0]['raw']['value']));?>
<br/>
<div style="maxheight:500px; maxwidth:400px">
<fb:comments href="<?php echo $base_url.'/'.$_GET['q'];?>" width="500px"></fb:comments>;
</div>

