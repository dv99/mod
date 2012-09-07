<?php
//print_r($view->result);
$record = $view->result;
$rendered = $record[0]->field_field_vehicle_ownership[0][rendered];
$vehicle_ownership = render ($rendered);
if ($vehicle_ownership == ''){
echo 'I Own The Car';
}else
echo ucwords($vehicle_ownership);
?>