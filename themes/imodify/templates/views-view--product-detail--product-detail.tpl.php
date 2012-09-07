<?php
//echo '<pre>'; print_r($view->result);
$record=$view->result;
$directory=base_path().'sites/default/files/';
$themes_path_image = base_path().path_to_theme().'/';

$sku=$record[0]->commerce_product_sku;
$product_id=$record[0]->product_id;
$uid=$record[0]->_field_data[product_id][entity]->uid;
$product_title=$record[0]->commerce_product_title;
$product_type=$record[0]->commerce_product_type;
$Price1=$record[0]->field_commerce_price[0][raw][amount];
$Price=substr($Price1,0,-2);
					$Price = number_format($Price, 2);
$sku=$record[0]->_field_data[product_id][entity]->sku;

$warranty=$record[0]->_field_data[product_id][entity]->field_warranty[und][0][safe_value];
$info=$record[0]->_field_data[product_id][entity]->field_feature[und][0][safe_value];
$specification=$record[0]->_field_data[product_id][entity]->field_specification[und][0][safe_value];
//$image_name=$record[0]->field_field_pimage[0][raw][filename];
$image_name2=$record[0]->field_pimage[1][raw][filename];


$imgUri=$record[0]->field_field_pimage[0]['raw']['uri'];
		$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
		$imgVars = array();
		$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>'','height'=>'','title'=>'','attributes'=>array('class'=>'dropShadow','onError'=>'this.src="'.$themes_path_image.'images/img_not.png"'));
		$imgVars['image_style']='';
		$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());

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
			  <table width="680" height="235" border="0" cellpadding="00" cellspacing="00">
                <tr>
					<td width="350" id="product_image" ><?php echo theme_image_formatter($imgVars);?></td>
					<td width="150">
						<table width="140" height="252" border="0" cellpadding="00" cellspacing="00">
					  
					  <?php 
						
							foreach($record as $value){
								$i=1;
								for($i=1;$i<=3;$i++){
							$imgUri=$value->field_field_pimage[$i]['raw']['uri'];
								$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
								$imgVars = array();
								$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>125,'height'=>90,'title'=>'','attributes'=>array('onError'=>'this.src="'.$themes_path_image.'images/img_not.png"'));
								$imgVars['image_style']='';
								$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());?>
					  
					  
							<tr>
								<td width="150" height="3" align="left" valign="bottom">
								<?php echo theme_image_formatter($imgVars);?></td>
							</tr>
								<?php 
						
								}
							}
							?>
						</table>
					</td>
					<td width="160">
						<table width="157" height="264" border="0" cellpadding="00" cellspacing="00">
							<tr>
								<td height="20"><?php echo $product_title; ?></td>
							</tr>
							<tr>
								<td height="20"><span class="style10"><?php echo $sku; ?></span></td>
							</tr>
							<tr>
								<td height="26">
									<table width="157" height="25" border="0" cellpadding="00" cellspacing="00">
										<tr>
											<td height="25"><div align="left" class="style12">$<?php echo $Price ; ?> </div></td>
											
										</tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
						
						<div align="center">
							<div style="text-align:center; padding:0 10px;">
					<?php   
							$view = views_get_view('product_detail');
							$view->set_arguments(array($pid));
							$view->set_display('add_to_cart');
							print $view->preview('add_to_cart');
					?>
							</div>
						</div>
						</td>
							</tr>
							<tr>
								<td height="145">&nbsp;</td>
							</tr>
						</table>
					</td>
                  <td width="20">&nbsp;</td>
                </tr>
            </table>
		</div>
		<div class="clr"></div>
		<div class="items-drop-box">
			<div class="d-box"><h4>INFO</h4>
			  Product Origin
			  <p align="justify"><?php echo $info; ?></p>
			</div>
			<div class="d-box">
			    <p>Spacification</p>
				<p align="justify"><?php echo $specification; ?></p>
			    <p>&nbsp;</p>
			</div>
			<div class="d-box"><h4>ADDITIONAL INFO</h4>
			  Installation manual.pdf<br />
			  Visit website: www.kenwood.com
			</div>
			
		</div>
	<?php
		$term_id = $record[0]->taxonomy_term_data_field_data_field_sub_category_tid;
		$view = views_get_view('product_detail');
                                      $view->set_arguments(array($term_id));
                                      $view->set_display('product_category');
									//  print_r($view->render());
									print $view->preview('product_category');
		?>
	</div>
</div>
</div>
</div>



