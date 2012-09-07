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
	
	.maintain {
	float:left;
	width:300px;
	height:200px;
	margin-top:-20px;
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
</style>

<div class="<?php print $classes; ?>">
<div id="content-onl9-store-page">
<?php $themes_path_image= base_path().path_to_theme().'/'; ?>

 
	<div class="feeds">
        <div class="right">
		<script type="text/javascript">
		$(document).ready(function(){
		$(".cat-count").click(function() {
		var id = $(this).attr('id');
   $("#cont"+id).slideToggle("slow");
   return false;
});

});

</script>
<?php 
		
	$uid = (int)arg(1);
	
	function getChild($tid)
	 {
		$tirm = taxonomy_get_children($tid, $vid = 0);
		return $tirm;
	 }
	 
	$result = db_query("SELECT
							DISTINCT taxonomy_term_hierarchy.parent as termparent
							FROM
							field_data_field_supplir_user
							INNER JOIN field_data_field_sub_category ON field_data_field_supplir_user.entity_id = field_data_field_sub_category.entity_id
							INNER JOIN taxonomy_term_hierarchy ON field_data_field_sub_category.field_sub_category_tid = taxonomy_term_hierarchy.tid
							INNER JOIN taxonomy_term_data ON taxonomy_term_data.tid = taxonomy_term_hierarchy.parent
							WHERE `field_supplir_user_uid`='".$uid."'");
							$i = 0;
				
			foreach ($result as $record) 
			{
				//$tid = $record->tid;
				$pid = $record->termparent;

				$selectTerm = db_query("SELECT `name` FROM `taxonomy_term_data` WHERE `tid`='".$pid."'");
				//echo $name = $record->name."</br>";
				
				foreach($selectTerm as $termName)
				{
					$name = $termName->name."</br>";
					?>
					<div class="a_head1"><?php echo $name ; ?></div>
					
					<?php
				}
				
				
				$record = getChild($pid);
				foreach($record as $v)
				{
					$tid = $v->tid;
					 $name= $v->name;
					$product = db_query("SELECT
								count(field_data_field_supplir_user.entity_id) as pcount,
								field_data_field_sub_category.field_sub_category_tid
								FROM
								field_data_field_supplir_user
								INNER JOIN field_data_field_sub_category ON field_data_field_supplir_user.entity_id = field_data_field_sub_category.entity_id
								WHERE
								field_data_field_supplir_user.field_supplir_user_uid ='".$uid."' AND field_data_field_sub_category.field_sub_category_tid='".$tid."'");
					foreach($product as $pRecord)
					{
						 $a = $pRecord->pcount;
							if($a >0 )
							{
								 $a =$pRecord->pcount."</br>";
							}
							else
							{
								 "(0)</br>";
							}
							$a='('.$pRecord->pcount.')' ;
							$id=$tid;
							
							
							?>
							
				
				
			<?php
					}
					?>
					
					
				<?php
					$view = views_get_view('product_detail');
					$view->set_arguments(array($uid,$tid));
					$view->set_display('supplier_product');
					$show=$view->preview('supplier_product'); 
					
					//echo $uid.'<br>';
					//echo $tid.'<br>';
					
					
					?>
				<div class="sound1_head1" >
				  
						<a href="<?php echo $tid; ?>" class="cat-count" id="<?php echo $tid; ?>"><?php echo $name.'   '  ;  ?><span><?php echo $a ;  ?></span></a>
				</div>
				
					
			
				<div class="content-div" id="<?php echo 'cont'.$tid; ?>" style="display:none; width:650px;">
					<?php echo $show ?>
				

				<?php
				
				}
				
			 $i++;
			 if($i==1)echo '<div class="maintain">'; if ($i == 2) echo '</div>';}
			
?>
		
	</div>
</div>
</div>