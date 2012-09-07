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

</style>
<?php 
$maintain_block = 0;
$i=0;
$themes_path_image= base_path().path_to_theme().'/'; ?>

	<div class="feeds">
        <div class="right">

<?php 
		
	$nid = (int)arg(1);
	
	function getChild($tid)
	 {
		$tirm = taxonomy_get_children($tid, $vid = 0);
		return $tirm;
	 }
	 
	$result = db_query("SELECT
							DISTINCT taxonomy_term_hierarchy.parent as termparent
							FROM
							field_data_field_pbrand_name
							INNER JOIN field_data_field_sub_category ON field_data_field_pbrand_name.entity_id = field_data_field_sub_category.entity_id
							INNER JOIN taxonomy_term_hierarchy ON field_data_field_sub_category.field_sub_category_tid = taxonomy_term_hierarchy.tid
							INNER JOIN taxonomy_term_data ON taxonomy_term_data.tid = taxonomy_term_hierarchy.parent
							WHERE `field_pbrand_name_nid`='".$nid."'");
				
			foreach ($result as $record) 
			{
				//$tid = $record->tid;
				$pid = $record->termparent;
				$selectTerm = db_query("SELECT `name` FROM `taxonomy_term_data` WHERE `tid`='".$pid."'");
				//echo $name = $record->name."</br>";
				foreach($selectTerm as $termName)
				{
					 $name = $termName->name."</br>";?>
					<div class="a_head1"><?php echo $name; ?></div>
					<?php
				}
				$record = getChild($pid);
				foreach($record as $v)
				{
					$tid = $v->tid;
					$name= $v->name;
					$product = db_query("SELECT
								count(field_data_field_pbrand_name.entity_id) as pcount,
								field_data_field_sub_category.field_sub_category_tid
								FROM
								field_data_field_pbrand_name
								INNER JOIN field_data_field_sub_category ON field_data_field_pbrand_name.entity_id = field_data_field_sub_category.entity_id
								WHERE
								field_data_field_pbrand_name.field_pbrand_name_nid ='".$nid."' AND field_data_field_sub_category.field_sub_category_tid='".$tid."'");
					foreach($product as $pRecord)
					{
						 $a = $pRecord->pcount;
							if($a >0 )
							{
								 $a = "(".$pRecord->pcount.")"."</br>";
							}
							else
							{
								 $a = "(0)</br>";
							}
					}
					$view_product = views_get_view('product_detail');
					$view_product->set_arguments(array($nid,$tid));
					$view_product->set_display('brand_product');
					$product_show = $view_product->preview('brand_product'); 
					?>
					
					<div class="sound1_head1" >
				  
						<a href="<?php echo $tid; ?>" class="cat-count" id="<?php echo $tid; ?>"><?php echo $name.'   '  ;  ?><span><?php echo $a ;  ?></span></a>
				</div>
				
					
			
				<div class="content-div" id="<?php echo 'cont'.$tid; ?>" style="display:none; width:650px;">
					<?php echo $product_show; ?></div><?
				}
	 
			$i++;
			 if($i==1){ echo '<div class="maintain" >';$maintain_block = 1; } 
			 }
			 if ($maintain_block == 1) echo '</div>'; 
			
?>
		
	
</div>
</div>
</div>





