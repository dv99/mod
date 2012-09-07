<?php
/*
//echo '<pre>'; print_r($view->result);exit;
	$record = $view->result;
	foreach($record as $result)
	{
		echo $result->field_field_brand_name[0][raw][value];
		$brnd_id =  $result->node_field_data_field_pbrand_name_nid;
			$view = views_get_view('product_detail');
			$view->set_arguments(array($brnd_id));
			$view->set_display('supplier_brands');
			print $view->preview('supplier_brands');
	}
	*/
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".cat-count").click(function() {
		var id = $(this).attr('id');
		$("#cont"+id).slideToggle("slow");
		return false;
		});
	});
</script>
<style type="text/css" >
.sound1_head1{
	margin-left: 10px;
	float: left;
	width: 670px;
	background-image: url(http://echo.imodify.com.au/themes/imodify/images/left_icon1.png);
	background-repeat: no-repeat;
	background-position: left center;
	padding-top: 14px;
	padding-right: 4px;
	padding-bottom: 14px;
	padding-left: 15px;
	font-weight: bold;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #c3c4c6;
	}
	#content-onl9-store-page .feeds .sound1_head1 a {
	color: black;
	}

.postTabs {
	float:left;
	width:100%;
}
.category_box{
	float: left;
	width: 680px;
	height: auto;
	border-bottom: #939393 thin solid;
	padding-left:25px;
}
.postBox1 {
	float:left;
	width:494px;
	clear:both;
	background:url(../images/bg_post1.png) no-repeat 0 0;
	height:53px;
	margin-top:5px;
}
.a_head1 {
    color: #3F3F3E;
    font-size: 14px;
    font-weight: bold;
    padding-bottom: 15px;
    padding-top: 60px;
    text-decoration: none;
}
.sound1_head1 {
    font-weight: bold;
}

.maintain {
    float: left;
    height: 200px;
    margin-top: -20px;
    width: 300px;
}
</style>
<?php 
$record = $view->result;
$maintain_block = 0;
$themes_path_image= base_path().path_to_theme().'/'; ?>
<div id="content-onl9-store-page">
	<div class="feeds">
        <div class="right">

<?php $i=0;
			foreach ($record as $result) 
			{
			 $name = $result->field_field_brand_name[0][raw][value];
			 $brnd_id =  $result->node_field_data_field_pbrand_name_nid;
			 $record1 = db_query("SELECT count(`entity_id`) as product FROM `field_data_field_pbrand_name` WHERE `field_pbrand_name_nid`='".$brnd_id."'");
			foreach($record1 as $result1)
			{
				$noOfProduct = $result1->product;
			}
			?>
				
				<?php
				//$record = getChild($pid);
				$view_brand = views_get_view('product_detail');
					$view_brand->set_arguments(array($brnd_id));
					$view_brand->set_display('supplier_brands');
					$brand_show = $view_brand->preview('supplier_brands');
					$tid = $i;
					?>
					
					<div class="sound1_head1" >
						<a href="<?php echo $tid; ?>" class="cat-count" id="<?php echo $tid; ?>"><?php echo $name.'   '  ;  ?><span><?php echo '('.$noOfProduct.')' ;  ?></span></a>
				</div>
				<div class="content-div" id="<?php echo 'cont'.$tid; ?>" style="display:none; width:650px;">
					<?php echo $brand_show; ?></div><?
			 $i++;	}
	
			 if($i==1){ echo '<div class="maintain">';$maintain_block = 1; } 
			 if ($maintain_block == 1) echo '</div>'; 
?>
		
	
</div>
</div>
</div>
</div>





