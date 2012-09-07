<style type="text/css">
#content-onl9-store-page .edit-item {
width:96px;
}
</style>
<?php
//echo '<pre>'; print_r($view->result);
$record=$view->result;

$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
?>
<div class="<?php echo $classes;?>" >
<div id="car_part">
	<div class="carmake_boxmid_head1">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="36%">PARTS/SERVICES</td>
            <td width="37%" align="right" style="padding-right:10px; font-size:11px; color:#595A5C;"><a href="<?php echo base_path();?>articles">View Full Page</a></td>
            <td width="27%" align="right" style="padding-right:10px; font-size:11px; color:#595A5C;"><img src="<?php echo base_path() . path_to_theme();?>/images/bt23.png" width="92" height="15" /></td>
          </tr>
        </table>
  	</div>
	<div id="part">
<div id="content-onl9-store-page" >
	<div class="feeds">
				 <div class="right">
				
				<div class="items-drop-box" style="width:804px;">
				<?php
					$j=1;
					//echo '<pre>'; print_r($record);die;
					foreach($record as $value){
					$pid=$value->product_id;
					$sku=$value->_field_data[product_id][entity]->sku;
					$field=$value->field_field_pbrand_name_1[0][raw][node]->title;
					$Price=$value->field_commerce_price[0][raw][amount];
					$imgUri=$value->field_field_pimage[0]['raw']['uri'];
					$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
					$imgVars = array();
					$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>98,'height'=>75,'title'=>'','attributes'=>array('class'=>''));
					$imgVars['image_style']='';
					$imgVars['path']=array('path'=>''.$value->nid,'options'=>array());
					if ($j <= 6 ) {
				?>	
					<div class="edit-item" style="height:200px;  border: 1px solid #CCC;">
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
						 <?php   
								$view = views_get_view('product_detail');
								$view->set_arguments(array($pid));
								$view->set_display('add_to_cart');
								print $view->preview('add_to_cart'); 
							?>
						  
						  </td>
						</tr>
					  </table>
					</div>
					<?php

						$j++;
						if($j==16){
							break;
						}
					} }
						
					?>


				</div>
			<div class="clr"></div>
					
		</div>  
	</div>
</div>  
</div>
</div>	
</div>
</div>	