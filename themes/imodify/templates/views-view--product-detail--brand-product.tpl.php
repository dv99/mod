 <script type="text/javascript">
            $(document).ready(function() {
				$(".cart_feedback").mouseover(function() {
					var currentId = $(this).attr('id');
					$("#sub"+currentId).css('visibility', 'visible');
				});
				
				$(".cart_feedback").mouseout(function() {
					var currentId = $(this).attr('id');
					$("#sub"+currentId).css('visibility', 'hidden');
                });

            });
</script>
  
<style type="text/css">
.a_head1 {
padding-top: 0px !important;
}

.feeds .sound1_head1 a {
    color: black;
}
 </style>
<?php
//echo '<pre>'; print_r($view->result);die;
	$record=$view->result;
	$directory=base_path().'sites/default/files/';
	$themes_path_image= base_path().path_to_theme().'/';
?> 
<div id="content-onl9-store-page">
<div class="right">
	<div class="a_head1">
		<div class="items-drop-box">
		<?php
			$i=1;
			foreach($record as $value){
			$i++;
					
				if($i!=1){		
				$pid=$value->product_id;
				$sku=$value->_field_data[product_id][entity]->sku;
				$imgUri=$value->field_field_pimage[0]['raw']['uri'];
					$imgPath=str_replace('public://',base_path().'sites/default/files/styles/thumbnail/public/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>125,'height'=>98,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());
					
					$Price=$value->field_commerce_price[0][raw][amount];
					$image_name=$value->field_field_pimage[0][raw][filename];
					$rating=$value->field_field_rating[0][raw][average];
					$field=$value->field_field_pbrand_name[0][raw][node]->title;
					
		?>
				<div  class="cart_feedback" id="<?php echo $pid;?>" > 	   
				<div class="edit-item" style="height:200px; border: 1px solid #CCC;">
				<table width="120" border="0" cellspacing="00" cellpadding="00">
					<tr>
						<td><div align="center"><?php echo theme_image_formatter($imgVars);?></div></td>
					</tr>
					<tr>
						<td height="25" align="left" valign="bottom"><?php echo $field; ?></td>
					</tr>
					<tr>
						 <td align="left" valign="bottom"><?php echo $sku; ?>&nbsp;&nbsp;&nbsp;<font color="#008000">$<?php echo $Price;?></font></td>
					</tr>
					<tr>
						  <td>
						  <div align="center" >
						   <div id="sub<?php echo $pid;?>" style="text-align:center; padding:0 10px; visibility:hidden;"> 
					
					<?php   
								$view = views_get_view('product_detail');
								$view->set_arguments(array($pid));
								$view->set_display('add_to_cart');
								print $view->preview('add_to_cart');
							?>
						  
						  </div></td>
						</tr>
						
						
				</table>
			</div></div>
				<?php 	
						
						}
					} 
				
				?>
		</div>
	</div>
</div>
	</div>
</div>
