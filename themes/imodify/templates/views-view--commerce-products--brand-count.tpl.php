<?php
$items = $view->result[0]->commerce_product_title;
$brands = $view->result[0]->field_data_field_supplir_user_field_supplir_user_uid;
?>
 <tr>
      <th><a href="#">No. of items </a></th>
      <td><?php echo $items;?></td>
	  <td width="25%"><a href="#"><font color="#F8931D"> View Items </font></a></td>
    </tr>
    <tr>
      <th><a href="#">No. of Distributors </a></th>
      <td><?php echo $brands;?></td>
	   <td><a href="#"><font color="#F8931D"> View Distributors </font></a></td>
    </tr>
