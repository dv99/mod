 <script type="text/javascript">
            $(document).ready(function() {
				$(".cart_feedback").mouseover(function() {
					var currentId = $(this).attr('id');
					$("#subn"+currentId).css('visibility', 'visible');
				});
				
				$(".cart_feedback").mouseout(function() {
					var currentId = $(this).attr('id');
					$("#subn"+currentId).css('visibility', 'hidden');
                });

            });
</script>

<?php 
//echo '<pre>'; print_r($view->result);exit;
$record=$view->result;
$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';
?>

<div class="a_head1">
<div class="items-drop-box">
				<?php
					$i = 0;
					foreach($record as $value){
					
					$field=$value->field_field_pbrand_name[0][raw][node]->title;
					$pid=$value->product_id;
					$sku=$value->_field_data[product_id][entity]->sku;
					$Price1=$value->field_commerce_price[0][raw][amount];
					$Price=substr($Price1,0,-2);
					$Price = number_format($Price, 2);
					$imgUri=$value->field_field_pimage[0]['raw']['uri'];
					$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>125,'height'=>98,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());
					$random_id =  rand();
					?>
					<div  class="cart_feedback" id="<?php echo $random_id;?>" > 	
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
						   <div id="subn<?php echo $random_id;?>" style="text-align:center; padding:0 10px; visibility:hidden;"> 
					
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
						$i++;
					}
					?>


				</div>
				</div>
				</div>