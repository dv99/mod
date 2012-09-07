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
//echo '<pre>'; print_r($view->result);exit;
$record=$view->result;

$record[0]->_field_data[field_supplir_user_users_product_id][entity]->sku;
$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';
?>
<div id="content-onl9-store-page">
	<div class="feeds">
        <div class="right">
		   <div class="a_head1">
				<div class="items-drop-box">
					<a href="#"><img src="<?php echo $themes_path_image;?>images/bt8.png" width="97" height="25" align="left" /></a>
					<a href="#"><img src="<?php echo $themes_path_image;?>images/bt9.png" width="80" height="25" align="left" /></a> 				
				</div>
				<div class="items-drop-box">
				<?php
					$j=1;
					foreach($record as $value){
					$pid = $value->product_id;
					//$Brand=$value->field_field_pbrand_name_1[0][raw][node]->field_brand_name[und][0][safe_value];

					$Brand=$value->field_field_pbrand_name[0][raw][node]->title;
					//$pid=$value->field_supplir_user_users_product_id;
					$sku=$value->_field_data[field_supplir_user_users_product_id][entity]->sku;
					//$Model=$value->[_field_data][field_supplir_user_users_product_id][entity]sku;
					//echo $Model;
					$Price1=$value->field_commerce_price[0][raw][amount];
					
					$Price=substr($Price1,0,-2);
					$Price = number_format($Price, 2);

					
					$imgUri=$value->field_field_pimage[0]['raw']['uri'];
					$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>125,'height'=>98,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());

				?>
					<div  class="cart_feedback" id="<?php echo $pid;?>" > 	
					<div class="edit-item" style="height:200px;  border: 1px solid #CCC;">
					  <table width="120"   border="0" cellspacing="00" cellpadding="00">
						<tr>
						  <td><div align="center"><?php echo theme_image_formatter($imgVars);?></div></td>
						</tr>
						<tr>
						  <td height="25" align="left" valign="bottom"><?php echo $Brand; ?></td>
						  
						</tr>
						<tr>
						 <td align="left" valign="bottom"><?php echo $sku; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#008000">$<?php echo $Price;?></font></td>
						
						</tr>
						<tr>
					
						</tr>
						
						
						<tr>
						 
						
								  <!--<td width="70"><img src="<?php //echo $themes_path_image;?>images/stars.jpg" width="55" height="10" /></td>-->
								  
								   <td><div align="center" >
						   <div id="sub<?php echo $pid;?>" style="text-align:center; padding:0 10px; visibility:hidden;"> 
					
					<?php   
							$view = views_get_view('product_detail');
							$view->set_arguments(array($pid));
							$view->set_display('add_to_cart');
							print $view->preview('add_to_cart');
					?>
				</div>
						</div></td>
						
						
							
						</tr>
						<tr>
						<!--<a href="#"><img src="<?php echo $themes_path_image;?>images/add-to-cart2.png" width="102" height="23"/></a></div></td>-->
						</tr>
					  </table>
					</div></div>
					<?php

						$j++;
						if($j==16){
							break;
						}
					}
						if($j<16){
						for($j;$j<=16;$j++){
									
					?>
					<div class="edit-item" style="height:200px; border: 1px solid #CCC;"> 
						<table width="120" height="110" border="0" cellspacing="00" cellpadding="00">
							<tr>
								<td>
									<div align="center" ><img src="<?php echo $themes_path_image;?>images/introbg.jpg" width="125" height="98" />
									<div>
									</div>
									
									<div>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<?php		
							}
						}
					?>


				</div>
				<div class="clr"></div>
				<div style="text-align:center; padding:10px; ">
					<a href="#"><img src="<?php echo $themes_path_image;?>images/bt_view.png" width="158" height="17" /></a>
				</div>
				
			  
			</div>  
		</div>
    </div>
</div>
</div>
</div>