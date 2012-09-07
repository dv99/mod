<style type="text/css">
.tname{
	color:#454545;
	font-size : 16px;
	font-weight : bold;
	}
</style>
<?php
//print_r($view->result);
global $base_url;
$value = $view->result;
	//$termName=$value->taxonomy_term_data_name;
	$termName = ucwords(strtolower(substr($value[0]->_field_data[nid][entity]->title,0,80)));
	
		$event_date = $value[0]->_field_data[nid][entity]->field_event_date[und][0][value];
				$event_date = explode (" ",$event_date);
				$event_newDate = date("d M Y", strtotime($event_date[0]));
				$event_date = $event_newDate;
?>
<div class="tname"><?php echo $termName.'   /  ';?><?php echo $event_date;?></div>

</br>
</br>

<?php echo ucfirst(strtolower($value[0]->field_field_event_desc[0]['raw']['value']));?>
<br/>      
<div style="maxheight:500px; maxwidth:400px">
		<fb:comments href="<?php echo $base_url.'/'.$_GET['q'];?>" width="400px"></fb:comments>;
</div>

