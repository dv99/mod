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
<?php
//echo '<pre>'; print_r($view->result);
	$record=$view->result;
	$directory=base_path().'sites/default/files/';
	$themes_path_image= base_path().path_to_theme().'/';
?> 
<div class="right">
	<div class="a_head1">
		<div class="items-drop-box">
		<?php
			$j=1;
			$i=0;
			foreach($record as $value){
			$i++;
					
				if($i!=1){		
				
				$imgUri=$value->field_field_pimage[0]['raw']['uri'];
					$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>125,'height'=>98,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());
					
					$Price1=$value->field_commerce_price[0][raw][amount];
					$Price=substr($Price1,0,-2);
					$Price = number_format($Price, 2);
					$sku=$value->_field_data[product_id][entity]->sku;
					$image_name=$value->field_field_pimage[0][raw][filename];
					$rating=$value->field_field_rating[0][raw][average];
					$field=$value->field_field_pbrand_name[0][raw][node]->title;
					$random=rand();
		?>
			<div  class="cart_feedback" id="<?php echo $random;?>" > 	
					<div class="edit-item" style="height:200px; border: 1px solid #CCC;">
					  <table width="120" border="0" cellspacing="00" cellpadding="00">
						<tr>
						  <td><div align="center"><?php echo theme_image_formatter($imgVars);?></div></td>
						</tr>
						<tr>
						  <td height="25" align="left" valign="bottom"><?php echo $field; ?></td>
						</tr>
						<tr>
						 <td align="left" valign="bottom"><?php echo $sku; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">$<?php echo $Price;?></font></td>
						
						</tr>
						
						
						<tr>
						 <td>
						  <div align="center" >
						   <div id="sub<?php echo $random;?>" style="text-align:center; padding:0 10px; visibility:hidden;"> 
					
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
							$j++;
							if($j==5){
								break;
							}
						}
					} //echo 'value of j is'.$j;
						if($j < 5){ 
							for($j;$j<=4;$j++){
				?>
								<div class="edit-item" style="height:200px;  border: 1px solid #CCC;> 
									<table width="120" border="0" cellspacing="00" cellpadding="00">
										<tr>
											<td>
												<div align="center"><img src="<?php echo $themes_path_image;?>images/introbg.jpg" width="125" height="98" /></div></td>
										</tr>
									</table>
								</div>
				<?php		
						}
					}
				?>
		</div>
	</div>
</div>