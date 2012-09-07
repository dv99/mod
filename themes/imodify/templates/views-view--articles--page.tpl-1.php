 <?php
 $record = $view->result;
$directory=base_path().'sites/default/files/';
$themes_path_image= base_path().path_to_theme().'/';


?> 
  <div id="content-artical">
    <div class="name"><img src="<?php echo $themes_path_image;?>images/leftiocns_1_00.png" />Articles</div>
    <div style="margin-left:80px; margin-top:50px;"><img src="<?php echo $themes_path_image;?>images/Articles-page-car.png"/></div>
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
foreach($record as $v){
 $i++;
	// title
	$title=$v->node_title;

	//image
	$image_name= $v->_field_data[nid][entity]->field_article_image[und][0][filename];
	

	//date
	$date=$v->_field_data[nid][entity]->created;

	////description 
	$value=$v->_field_data[nid][entity]->body[und][0][value];
	$desc = substr($value,0,200);
	 
if($i <= 3){
	if($i == 1)  echo '<div class="a-l">'; 

 ?>
   <div class="carmake_boxmid_boxmain1_1">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img">
  <img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" />
 </div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1">
	
	<?php 
		echo $desc; ?></div>
      <div class="carmake_boxmid_boxmain1_bt"><img src="<?php echo $themes_path_image;?>/images/bt25.png" width="118" height="18" />&nbsp;&nbsp;&nbsp;&nbsp;<a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>/images/bt26.png" width="97" height="18" /></a></div>
  
  
  
  </div>
  
  </div>
  
<?php if ($i == 3) echo '</div>';  
}  //If for 1st column close
elseif($i >= 4 and $i <= 6 ){
	if($i == 4)  echo ' <div class="a-r">'; 

?>
 <div class="carmake_boxmid_boxmain1_1">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img">
  <img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" />
 </div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1"><?php echo $desc; ?></div>
      <div class="carmake_boxmid_boxmain1_bt"><img src="<?php echo $themes_path_image;?>/images/bt25.png" width="118" height="18" />&nbsp;&nbsp;&nbsp;&nbsp;<a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>/images/bt26.png" width="97" height="18" /></a></div>
  
  
  
  </div>
  
  </div>
  
<?php if ($i == 6) echo '</div>';  
}//If for 2nd column close
elseif($i >=7 and $i <=8 ) { if ( $i == 7 )echo ' <div class="bb"> <div class="bb-left">'; 
?>

  
  <div class="carmake_boxmid_boxmain1_1r">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img"><img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" /></div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1"><?php echo $desc; ?></div>
      <div class="carmake_boxmid_boxmain1_bt"><img src="<?php echo $themes_path_image;?>images/bt25.png" width="118" height="18" />&nbsp;&nbsp;&nbsp;&nbsp;<a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>images/bt26.png" width="97" height="18" /></a></div>
  
  
  
  </div>
  
  </div>
  
  <?php
  if($i == 8) echo '</div>'; 
} //3rd left column close
elseif($i >=9 and $i <=10 ) { if ( $i == 9 )echo '<div class="bb-center">'; 
?>
  
  <div class="carmake_boxmid_boxmain1_1r">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img"><img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" /></div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1"><?php echo $desc; ?></div>
      <div class="carmake_boxmid_boxmain1_bt"><img src="<?php echo $themes_path_image;?>images/bt25.png" width="118" height="18" />&nbsp;&nbsp;&nbsp;&nbsp;<a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>images/bt26.png" width="97" height="18" /></a></div>
  
  
  

  </div>
  </div>
  
  <?php
if($i == 10) echo '</div>'; 
} // 4th left column close
} //For each close
?>
    <div class="bb-add">
  
   <div class="sponsored">Sponsored<a href="#" class="createAd">Create an Ad</a>
  <ul>
                <li>
                <a href="#">Advertisement Heading 1</a>
                <a href="#"><img src="<?php echo $themes_path_image;?>images/img_ad1.jpg" alt="" /></a>
                Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.</li>
                <li>
                <a href="#">Advertisement Heading 2</a>
                <a href="#"><img src="<?php echo $themes_path_image;?>images/img_ad2.jpg" alt="" /></a>
                Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.</li>
                <li>
                <a href="#">Advertisement Heading 3</a>
                <a href="#"><img src="<?php echo $themes_path_image;?>images/img_ad3.jpg" alt="" /></a>
                Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.</li>
            </ul>
        </div>
  </div>
 <div class="footer-view"><img src="<?php echo $themes_path_image;?>images/bt_view.png" align="absmiddle" /></div>

</div>
  </div>
 
 

  
  
  
 
 
  
  
   