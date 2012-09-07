<?php 
	$llnode=node_load(arg(1));
if($GLOBALS['user']->uid==$llnode->uid){
}else{?>
<script type="text/javascript" language="javascript">
	if (undefined != $){
		var $=jQuery;
	}
	function listLiBg1(liID,bgT){
		bgT == 1 ? $('#'+liID).css('background-color','#F9CE6F') : $('#'+liID).css('background-color','');
	}
</script>
<ul class="listings" style="padding-top:10px;">
	<li>Browse</li>
    <li style="background:url(<?php echo base_path().path_to_theme();?>/images/browse_main.gif)  no-repeat 5px 50% <?php echo arg(0)=='modified-cars'&&arg(1)==''?'#F9CE6F':'';?>; padding-left:25px; line-height:20px; margin-bottom:5px;" onmouseover="listLiBg1(this.id,1);" id="1" onmouseout="listLiBg1(this.id,<?php echo arg(0)=='modified-cars'&&arg(1)==''?1:0;?>);"><a href="<?php echo base_path();?>modified-cars"><strong>Main</strong></a></li>
    <?php foreach($view->result as $result){?>
    		<li style="background:url(<?php echo base_path();?>sites/default/files/<?php echo $result->_field_data['tid']['entity']->field_modimage['und'][0]['filename'];?>)  no-repeat 5px 50% <?php echo $result->tid==arg(2)?'#F9CE6F':'';?>; padding-left:25px; line-height:20px;" onmouseover="listLiBg1(this.id,1);" id="<?php echo $result->tid;?>" onmouseout="listLiBg1(this.id,<?php echo $result->tid==arg(2)?1:0;?>);"><a href="<?php echo base_path();?>modified-cars/profile-list/<?php echo $result->tid;?>"><?php echo $result->taxonomy_term_data_name;?></a></li>
    <?php }?>
    <li style="background:url(<?php echo base_path().path_to_theme();?>/images/browse_explore.gif)  no-repeat 5px 50% <?php echo arg(0)=='node'?'#F9CE6F':'';?>; padding-left:25px; line-height:20px; margin-top:5px;" onmouseover="listLiBg1(this.id,1);" id="2" onmouseout="listLiBg1(this.id,<?php echo arg(0)=='node'?1:0;?>);"><a href="<?php echo base_path();?>modified-cars"><strong>Explore</strong></a></li>
</ul>
<?php }?>