<?php 
global $theme_path,$base_url;
$record = $view->result;
$title_garge = $result[0]->node_title;?>
<div class="<?php echo $classes;?>">
<div class="listing" style="margin-top:0;">
<!--<div class="listTitle"><b><?php //echo $title_garge; ?>ABC123's Cars</b></div>-->
<?php if ($exposed): ?>
		  <ul class="refineBox selectList">
				<?php print $exposed; ?>
		  </ul>
	<?php endif; ?>

<?php 


	foreach($record as $result)
	{	
		$image = $result->field_field_car_image[0][raw][filename];
		$title = $result->_field_data[nid][entity]->title;
		//echo $v."</br>";
		$nid = $result->nid;
?>
<div class="feeds">
<div class="left"><a href="/car-profile/<?php echo $nid;?>"><img src="/sites/default/files/<?php echo $image;?>" width="90" height="86" /></a></div>
<div class="right">
<div class="head"><a href="/car-profile/<?php echo $nid;?>"><?php echo $title;?></a>
<?php
$view2 = views_get_view('garage');
		$view2->set_arguments(array($nid));
		$view2->set_display('car_ownership');
		print $view2->preview('car_ownership'); 
?>
</div>
<?php
$view2 = views_get_view('garage');
		$view2->set_arguments(array($nid));
		$view2->set_display('enthusiast_gallery');
		print $view2->preview('enthusiast_gallery'); 
?>
<div class="action">
<ul class="left">
<li class="favorite"><a href="#">Favorite</a></li>
<li><a href="#">Report</a></li>
</ul>
<ul class="right">
	<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="/car-profile/<?php echo $nid;?>"
						addthis:title="<?php echo $title; ?>"></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
			
</ul>
</div>
</div>
</div>

<?php 
 } ?>
<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
		}
      });
</script>