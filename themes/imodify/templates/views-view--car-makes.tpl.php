<?php 
	$llnode=node_load(arg(1));
if($GLOBALS['user']->uid==$llnode->uid){
}else{?>
<script type="text/javascript" language="javascript">
	if (undefined != $){
		var $=jQuery;
	}
	function listLiBg(liID,bgT){
		bgT == 1 ? $('#'+liID).css('background-color','#F9CE6F') : $('#'+liID).css('background-color','');
	}
</script>
<ul class="listings make" style="padding-top:10px;">
	<li>Car Make Pages</li>
    <?php $i=1;
		  foreach($view->result as $result){
			  if(arg(1)!=''){?>
			  
    			<li style="background:url(<?php echo base_path();?>sites/default/files/<?php echo $result->field_field_maker_image[0]['raw']['filename'];?>) no-repeat 5px 50% <?php echo $result->tid==arg(1)?'#F9CE6F':'';?>; padding-left:60px; line-height:45px;" id="<?php echo $result->tid;?>" onmouseover="listLiBg(this.id,1);" onmouseout="listLiBg(this.id,<?php echo $result->tid==arg(1)?1:0;?>);"><a href="<?php echo base_path();?>car-make/<?php echo $result->tid;?>" title="<?php echo $result->taxonomy_term_data_name;?>"><?php echo substr($result->taxonomy_term_data_name,0,11);?><?php echo strlen($result->taxonomy_term_data_name)>11?'..':'';?></a></li>
    <?php 	}else{?>
				<li style="background:url(<?php echo base_path();?>sites/default/files/<?php echo $result->field_field_maker_image[0]['raw']['filename'];?>) no-repeat 5px 50% <?php echo $result->tid==arg(1)?'#F9CE6F':'';?>; padding-left:60px; line-height:45px;" id="<?php echo $result->tid;?>" onmouseover="listLiBg(this.id,1);" onmouseout="listLiBg(this.id,<?php echo $result->tid==arg(1)?1:0;?>);"><a href="<?php echo base_path();?>car-make/<?php echo $result->tid;?>" title="<?php echo $result->taxonomy_term_data_name;?>"><?php echo substr($result->taxonomy_term_data_name,0,11);?><?php echo strlen($result->taxonomy_term_data_name)>11?'..':'';?></a></li>
    	<?php }
		}?>
</ul>
<div class="viewAll_mini" style="margin-left:20px;">
<a href="#<?php //echo base_path().'#'?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
</div>
<?php }?>
