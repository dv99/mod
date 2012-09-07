<script type="text/javascript">
	$(document).ready(function(){
		$(".cat-count").click(function() {
		var id = $(this).attr('id');
		$("#countbr"+id).slideToggle("slow");
		return false;
		});
	});
</script>
<?php 
$maintain_block = 0;
$i=0;
$themes_path_image= base_path().path_to_theme().'/'; ?>

<div class="<?php echo $classes;?>">
	<div id="content-onl9-store-page">
		<div class="feeds">
			<div class="right">

<?php

	$uid = arg(1);
	
	$record = db_query("SELECT 
							`field_data_field_supplir_user`.`entity_id`,
							`field_data_field_parts_name`.field_parts_name_tid 
							FROM `field_data_field_supplir_user`
							INNER JOIN 
							`field_data_field_parts_name` 
							ON `field_data_field_supplir_user`.`entity_id` = `field_data_field_parts_name`.`entity_id` 
							WHERE `field_supplir_user_uid`='".$uid."'");
		foreach($record as $result)
		{
			$tid = $result->field_parts_name_tid;
			
			$record2 = db_query("SELECT count(`entity_id`) as product FROM `field_data_field_parts_name` WHERE `field_parts_name_tid`='".$tid."'");
				foreach($record2 as $result2)
				{
					$productCount = $result2->product;
					if($productCount > 0)
					{
						$record1 = db_query("SELECT `name` FROM `taxonomy_term_data` WHERE `tid`='".$tid."'");
						foreach($record1 as $result1)
						{
							$name = $result1->name;
							$name."(".$productCount.")";
						}
						$view_car_type = views_get_view('product_detail');
						$view_car_type->set_arguments(array($tid));
						$view_car_type->set_display('supplier_car_product');
						$brand_car_show = $view_car_type->preview('supplier_car_product');
						$tid= $i;
				
		
?>
<div class="sound1_head1" >
				 
						<a href="<?php echo $tid; ?>" class="cat-count" id="<?php echo $tid; ?>"><?php echo $name.'   '  ;  ?><span><?php echo '('.$productCount.')';  ?></span></a>
				</div>
				
					
			
				<div class="content-div" id="<?php echo 'countbr'.$tid; ?>" style="display:none; width:650px;">
					<?php echo $brand_car_show; ?></div><?
				}
	 
			$i++;
			 if($i==1){ echo '<div class="maintain" >';$maintain_block = 1; } 
			 }
			 }
			 if ($maintain_block == 1) echo '</div>'; 
			
?>

			</div>
		</div>
	</div>
</div>