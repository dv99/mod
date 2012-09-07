<?php
$addthis_src = 'http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4feed37c7d9ab28f';
$cuttent_path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER[REQUEST_URI]; 
?>

<?php //echo $rows;exit;'<pre>';print_r($view);exit;?>
<div class="title"><?php echo $view->result[0]->node_field_data_field_car_garage_title;?>'s GARAGE</div>

<div class="action">
     <a href="http://www.addthis.com/bookmark.php"
      class="addthis_button"
      addthis:url="<?php echo $cuttent_path;?>"
     
      ></a>
<script type="text/javascript" src="<?php echo $addthis_src; ?>"></script>

</div>
<div class="slider">
    <div class="<?php print $classes; ?>">
          <?php if ($header): ?>
            <div class="view-header">
              <?php print $header; ?>
            </div>
          <?php endif; ?>
         
         <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <?php print $title; ?>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
         
          <?php if ($exposed): ?>
            <div class="view-filters">
              <?php print $exposed; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($attachment_before): ?>
            <div class="attachment attachment-before">
              <?php print $attachment_before; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($rows): ?>
            <div class="view-content">
              <?php print $rows; ?>
            </div>
          <?php elseif ($empty): ?>
            <div class="view-empty">
              <?php print $empty; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($pager): ?>
            <?php print $pager; ?>
          <?php endif; ?>
        
          <?php if ($attachment_after): ?>
            <div class="attachment attachment-after">
              <?php print $attachment_after; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($more): ?>
            <?php print $more; ?>
          <?php endif; ?>
        
          <?php if ($footer): ?>
            <div class="view-footer">
              <?php print $footer; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($feed_icon): ?>
            <div class="feed-icon">
              <?php print $feed_icon; ?>
            </div>
          <?php endif; ?>        
        </div>
</div>
<?php /*
<div id="twoCol">
	<div class="title">ABC123's GARAGE</div>
    <div class="action">
        <ul>
            <li class="like"><a href="#">Like</a></li>
            <li class="comments"><a href="#">Comments</a></li>
            <li class="share">Share <a href="#"><img src="images/icon_facebook.gif" alt=""></a><a href="#"><img src="images/icon_twitter.gif" alt=""></a></li>
        </ul>
    </div>
    <div class="slider">
    <?php $car_img = $result->field_field_car_image[0]['raw']['filename'];?>
        <img src="<?php echo base_path();?>sites/default/files/<?php echo $car_img;?>" width="750" alt="" />
        <a href="#" class="moveLeft"><img src="images/arrow_left.jpg" alt="" /></a>
        <ul>
            <li class="active"><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
            <li><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
            <li><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
            <li><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
            <li><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
            <li><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
            <li><a href="#"><img src="images/img_slider.jpg" alt="" /></a></li>
        </ul>
        <a href="#" class="moveRight"><img src="images/arrow_right.jpg" alt="" /></a>
    </div>
</div><!-- #twoCol -->

<?php 
/*foreach($view->result as $result){
    $nid = $result->field_field_car_profile[0]['raw']['nid'];
    $node = node_load($nid);
    //echo "<pre>";print_r($result);echo "</pre>";?>
    <div class="feeds">
    	<?php
		$car_img = $result->field_field_car_image[0]['raw']['filename'];
		echo '<div class="left"><img src="'.base_path().'sites/default/files/'.$car_img.'" width="90" height="86" /></div>';?>
        <div class="right">
            <div class="head"><a href="#">EVORACER</a>I Own The Car</div>
            <ul class="thumbnails">
                <?php $i=0;
                foreach($node->field_gallery_image['und'] as $img){
					if($i<=9){
						$path = str_replace("public://", "", $img['uri']);
						echo '<li><a href="#"><img src="'.base_path().'sites/default/files/'.$path.'" width="63" height="63" /></a></li>';
					}else{
						break;
					}
					$i++;
                }?>
            </ul>
            <div class="action">
                <ul class="left">
                    <li class="favorite"><a href="#">Favorite</a></li>
                    <li><a href="#">Report</a></li>
                </ul>
                <ul class="right">
                    <li class="like"><a href="#">Like</a></li>
                    <li class="comments"><a href="#">Comment</a></li>
                    <li class="share">Share <a href="#"><img src="<?php echo base_path().path_to_theme();?>/images/icon_facebook.gif" alt="" /></a><a href="#"><img src="<?php echo base_path().path_to_theme();?>/images/icon_twitter.gif" alt="" /></a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php }*/?>