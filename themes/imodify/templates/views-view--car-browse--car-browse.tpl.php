<?php //echo '<pre>';print_r($view->result);exit;
global $user;
$lnode=node_load($view->result[0]->nid);
$av=get_profile_based_ids($view->result[0]->nid);
//echo '<pre>';print_r($av);

if($user->uid==$lnode->uid){
	/*echo '<pre>';print_r($av);exit;
	Array
	(
		[garage_id] => 1272
		[carstatus_id] => 1429
		[gallery_id] => 1383
	)
	*/
	?>
	<script type="text/javascript" language="javascript">
		if (undefined != $){
			var $=jQuery;
		}
		function listLiBg2(liID,bgT){
			bgT == 1 ? $('#'+liID).css('background-color','#F9CE6F') : $('#'+liID).css('background-color','');
		}
	</script>
	
	<div class="<?php print $classes;?>" style="padding-bottom:20px;">
		<ul class="menu clearfix" style="margin:0; padding:0;">
	<?php switch($av['nodetype']){
	
			case ('cars' || 'car_status'):?>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/browse_main.gif) no-repeat 5px 50% <?php echo arg(1)==$av['garage_id']?'#F9CE6F':'';?>; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb1" onmouseout="listLiBg2(this.id,<?php echo arg(1)==$av['garage_id']?1:0;?>);"><a href="<?php echo base_path();?>garage/<?php echo $av['garage_id'];?>"><strong>Garage</strong></a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(1)==$av['carstatus_id']?'#F9CE6F':'';?>; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb2" onmouseout="listLiBg2(this.id,<?php echo arg(1)==$av['carstatus_id']?1:0;?>);"><a href="<?php echo base_path();?>node/<?php echo $av['carstatus_id'];?>/edit/car-status">Update Car Status</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb3" onmouseout="listLiBg2(this.id,0);"><a href="#" class="lefLock" onclick="return false;">Repairs & Services</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb4" onmouseout="listLiBg2(this.id,0);"><a href="#" class="lefLock" onclick="return false;">Car Designs</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb5" onmouseout="listLiBg2(this.id,0);"><a href="#" class="lefLock" onclick="return false;">Upgrades & Tuning</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb6" onmouseout="listLiBg2(this.id,0);"><a href="#" class="lefLock" onclick="return false;">Maintain & Protect</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb7" onmouseout="listLiBg2(this.id,0);"><a href="#" class="lefLock" onclick="return false;">Q&A / Discussions</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb8" onmouseout="listLiBg2(this.id,0);"><a href="#" class="lefLock" onclick="return false;">Test & Showcase</a></li>
	<?php 	break;
			case 'supplier_profile':?>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/browse_main.gif) no-repeat 5px 50% <?php echo arg(0)=='supplier-profile'?'#F9CE6F':'';?>; padding-left:28px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="tb1" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='supplier-profile'?1:0;?>);"><a href="<?php echo base_path();?>supplier-profile/<?php echo $view->result[0]->nid;?>"><strong>Main</strong></a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(1)==$av['gallery_id']?'#F9CE6F':'';?>; padding-left:28px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="tb2" onmouseout="listLiBg2(this.id,<?php echo arg(1)==$av['gallery_id']?1:0;?>);"><a href="<?php echo base_path();?>gallery/<?php echo $av['gallery_id'];?>">Gallery</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(0)=='supplier'&&arg(1)==$view->result[0]->nid?'#F9CE6F':'';?>; padding-left:28px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="tb3" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='supplier'&&arg(1)==$view->result[0]->nid?1:0;?>);"><a href="<?php echo base_path();?>supplier/<?php echo $view->result[0]->nid;?>">Online Store</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(0)=='garage'?'#F9CE6F':'';?>; padding-left:28px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="tb4" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='garage'?1:0;?>);"><a href="<?php echo base_path();?>garage/<?php echo $av['garage_id'];?>">Garage</a></li>        
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="tb5" onmouseout="listLiBg2(this.id,0);"><a href="<?php echo base_path();?>articles/">Articles</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="tb6" onmouseout="listLiBg2(this.id,0);"><a href="<?php echo base_path();?>events">Events</a></li>
	<?php	break;
		  }?>
		</ul>
	</div>
<?php }elseif($user->uid!=""){
?>
<div class="<?php print $classes;?>" style="padding-bottom:20px;">
		<ul class="menu clearfix" style="margin:0; padding:0;">
	<?php switch($av['nodetype']){
			case 'supplier_profile':?>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/browse_main.gif) no-repeat 5px 50% <?php echo arg(0)=='supplier-profile'?'#F9CE6F':'';?>; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb1" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='supplier-profile'?1:0;?>);"><a href="<?php echo base_path();?>supplier-profile/<?php echo $view->result[0]->nid;?>"><strong>Main</strong></a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(1)==$av['gallery_id']?'#F9CE6F':'';?>; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb2" onmouseout="listLiBg2(this.id,<?php echo arg(1)==$av['gallery_id']?1:0;?>);"><a href="<?php echo base_path();?>gallery/<?php echo $av['gallery_id'];?>">Sponsors/ Partners</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(0)=='supplier'&&arg(1)==$view->result[0]->nid?'#F9CE6F':'';?>; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb3" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='supplier'&&arg(1)==$view->result[0]->nid?1:0;?>);"><a href="<?php echo base_path();?>supplier/<?php echo $view->result[0]->nid;?>">Action Tools</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(0)=='garage'?'#F9CE6F':'';?>; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb4" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='garage'?1:0;?>);"><a href="<?php echo base_path();?>garage/<?php echo $av['garage_id'];?>">Quick Quote</a></li>        
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb5" onmouseout="listLiBg2(this.id,0);"><a href="<?php echo base_path();?>articles/">Supplier Categories</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb6" onmouseout="listLiBg2(this.id,0);"><a href="<?php echo base_path();?>events">Parts and Services</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb6" onmouseout="listLiBg2(this.id,0);"><a href="<?php echo base_path();?>events">Listings/ Ad Campaign</a></li>
			<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50%; padding-left:28px; line-height:20px; float:left;" onmouseover="listLiBg2(this.id,1);" id="tb6" onmouseout="listLiBg2(this.id,0);"><a href="<?php echo base_path();?>events">Explore</a></li>
	<?php	break;
		  }?>
		</ul>
</div>
<?php }
?>