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
	$brand_id = arg(1);
	$record = db_query("SELECT `field_data_field_supplir_user`.`field_supplir_user_uid`
							FROM `field_data_field_pbrand_name` 
							INNER JOIN `field_data_field_supplir_user` ON 
							`field_data_field_pbrand_name`.`entity_id`= `field_data_field_supplir_user`.`entity_id`
							WHERE `field_pbrand_name_nid`='".$brand_id."'
						");
				foreach($record as $result)
				{
					$uid = $result->field_supplir_user_uid;
					
					$record1 = db_query("SELECT `title` FROM `node` WHERE `uid`='".$uid."' AND `type`='supplier_profile'");
					foreach($record1 as $result1)
					{
					
						$name = $result1->title."</br>";  ?>
						<div class="a_head1"><?php //echo $name; ?></div>
						<?php
						$record3 = db_query("SELECT count(`entity_id`) as supplierCount FROM `field_data_field_supplir_user` WHERE `field_supplir_user_uid`='".$uid."'");
						foreach($record3 as $result3)
						{
							$pcout = $result3->supplierCount;
						}
					
						$view_brand = views_get_view('product_detail');
						$view_brand->set_arguments(array($uid));
						$view_brand->set_display('distributors_product');
						$brand_prouct_show = $view_brand ->preview('distributors_product');
						$tid = $i;
				
				?>
				<div class="sound1_head1" >
				 
						<a href="<?php echo $tid; ?>" class="cat-count" id="<?php echo $tid; ?>"><?php echo $name.'   '  ;  ?><span><?php echo '('.$pcout.')';  ?></span></a>
				</div>
				
					
			
				<div class="content-div" id="<?php echo 'countbr'.$tid; ?>" style="display:none; width:650px;">
					<?php echo $brand_prouct_show; ?></div><?
				}
	 
			$i++;
			 if($i==1){ echo '<div class="maintain" >';$maintain_block = 1; } 
			 }
			 if ($maintain_block == 1) echo '</div>'; 
			
?>
			</div>
		</div>
	</div>
</div>
