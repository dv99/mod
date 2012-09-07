<div class="<?php echo $classes;?>">
<div id="car_image">
<?php //echo '<pre>';print_r($view->result);exit;?>
<div class="carmake_main" >
	<div class="updatecar_box5" style="margin-bottom:0px;">
        <div class="carmake_bottombox_head1">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="22%">IMAGES</td>
              <td width="57%" align="right" style="padding-right:10px; font-size:11px; color:#595A5C;">View Full Page </td>
              </tr>
          </table>
          <div style="font-weight:normal; padding-top:10px;">Quality vehicle on display, amongst a great crowd, list a great crowd, line of great crowd,<br />
          specialist automotive parts amongst a great crowd, list a great crowd disp quality vehicles</div>
        </div>
	</div>
</div>
<div id="image_car" style="height:170px;">
<div class="carmake_main">
    <div class="carmake_main_boxmain">
      <ul>
      	<?php $i=1; $j=count($view->result);
			
			foreach($view->result as $value){
				if ($value->_field_data[nid][entity]->field_car_image[und][0][uri] != ''){
				$imgPath=str_replace('public://',base_path().'sites/default/files/styles/thumb_95x67/public/',$value->_field_data[nid][entity]->field_car_image[und][0][uri]);				
				$imgVars = array();
				$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>95,'height'=>67,'title'=>'','attributes'=>array('class'=>''));
				$imgVars['image_style']='';
				$imgVars['path']=array('path'=>'car-profile/'.$value->nid,'options'=>array());?>
        		<li><?php echo theme_image_formatter($imgVars);?></li>
        <?php 	$i++;
				if($i==10){
					break;
				}
				}
			}
			  	if($i<10){
                	for($i;$i<=10;$i++){?>
                    	<li><img src="<?php echo base_path() . path_to_theme();?>/images/img4.png" width="95" height="67" /></li>
		<?php		}
			 	}?>
      </ul>
    </div>
	</div>
    <?php if($j>10){?>
    		<div style="text-align:center; padding-bottom:10px;"><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_view1.png" width="97" height="19" /></a></div>
    <?php }?>
</div>
</div>
</div>