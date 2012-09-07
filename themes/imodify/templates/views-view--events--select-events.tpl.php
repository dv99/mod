<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
		}
      });
</script>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<?php
//echo '<pre>';print_r($view->result);
//echo 'this block';
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
?>
<?php
//print_r($view->result);exit;
$themes_path_image= base_path().path_to_theme().'/';
?>
<div class="<?php print $classes; ?>">
<div id="content-artical">
    <div style="margin-top:15px; margin-bottom:40px;">
        <div style="margin-top:15px; margin-bottom:15px;">
            <?php if ($exposed): ?>
                <ul class="refineBox selectList">
                    <?php print $exposed; ?>
                </ul>
           <?php endif; ?>
       </div>
    </div>
    <div class="clr"></div>
	<?php
		$i=0;
			foreach($view->result as $value){
				$i++;
				$imgUri=$value->field_field_event_image[0]['raw']['uri'];
				$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
				$imgVars = array();
				$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>128,'height'=>84,'title'=>'','attributes'=>array('class'=>''));
				$imgVars['image_style']='';
				$imgVars['path']=array('path'=>'events/'.$value->nid,'options'=>array());
				$event_date = $value->_field_data[nid][entity]->field_event_date[und][0][value];
				$event_date = explode (" ",$event_date);
				$event_newDate = date("d M Y", strtotime($event_date[0]));
				$event_date = $event_newDate;
				if($i <= 3){
					if($i == 1) { echo '<div class="a-l">'; } 
	?>
	<div class="carmake_boxmid_boxmain1_1">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'events/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo $event_date;?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_field_event_desc[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'events/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'events/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
			</div>
        </div>
	</div>
 	<?php if ($i == 3) echo '</div>';  
							}  //If for 1st column close
			elseif($i >= 4 and $i <= 6 ){
				if($i == 4)  echo ' <div class="a-r">'; 
	?>
	<div class="carmake_boxmid_boxmain1_1">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'events/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo $event_date;?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_field_event_desc[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'events/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'events/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a></div>
        </div>
	</div>
	<?php if ($i == 6) echo '</div>';  
	}//If for 2nd column close
	elseif($i >=7 and $i <=8 ) { if ( $i == 7 )echo ' <div class="bb"> <div class="bb-left">'; 
	?>
	<div class="carmake_boxmid_boxmain1_1r">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'events/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo $event_date;?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_field_event_desc[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'events/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'events/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
			</div>
        </div>
    </div>
	<?php
		if($i == 8) echo '</div>'; 
		} //3rd left column close
		elseif($i >=9 and $i <=10 ) { if ( $i == 9 )echo '<div class="bb-center">'; 
	?>
	<div class="carmake_boxmid_boxmain1_1r">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'events/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo $event_date;?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_field_event_desc[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'events/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'events/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
			</div>
        </div>
	</div>
	<?php
		if($i == 10) echo '</div>'; 
		} // 4th left column close
	} //For each close
	switch($i){
		case 3:
		case 6:
		case 8:
		case $i>9:
		break;
		default:
			echo '</div>';
		break;
	}
	?>
	<?php
		if ($i >= 7) echo '</div>'; // BB tag close (main) Requires in all condition
			if ($i > 0) { ?>
				<div class="footer-view"><img src="<?php echo $themes_path_image;?>images/bt_view.png" align="absmiddle" /></div>
	<?php
}
?>
</div>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		var Num_items = '<?= $i;?>';
		if( Num_items > 6 ){
			$("#twoCol #block-block-9 #right").css('margin-top','-550px');
		}
		else{
		$("#twoCol #block-block-9 #right").css('margin-top','0px');
		}
		if (Num_items != 0){
		if( Num_items < 4 ){
			$("#twoCol #block-block-9 #right").css('margin-top','-367px');
		}
		}
	});
</script>