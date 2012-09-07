
	
<style type="text/css">
a {
color:#454545;
}

</style>

<?php
 $argument = arg(1);
 $guid=$user->uid;
$record=$view->result;
//echo '<pre>'; print_r($view->result);
?><tr><td><a href="#">No. of Items</a> <td><?php echo  $record[0]->field_supplir_user_users_product_id; 
if($argument  == $guid){
?>
<a href="#" style="float:right;color:#f8931d">Edit Items</a>
<?php
}
else
{
?>
<a href="#" style="float:right;color:#f8931d">View Items</a>
<?php
}
?>
</td>
</tr>
<tr> <td>&nbsp;</td></tr>
<tr>
<td><a href="#">No. of Brands</a> <td><?php echo  $record[0]->field_supplir_user_users__field_data_field_pbrand_name_field; 
if($argument  == $guid){
?>
<a href="#" style="float:right;color:#f8931d">Edit Brands</a>
<?php
}
else
{
?>
<a href="#" style="float:right;color:#f8931d">View Brands</a>
<?php
}
?>
</td>
</tr>

