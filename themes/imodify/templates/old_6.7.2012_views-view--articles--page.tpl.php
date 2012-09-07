



 <?php

$record = $view->result;
$addthis_src = 'http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4feed37c7d9ab28f';
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path(); 
$directory=base_path().'sites/default/files/styles/image_128x84/public/';
$themes_path_image= base_path().path_to_theme().'/';

function trim_function($string){
     $string = substr($string,0,150);
     $string = substr($string,0,strrpos($string," "));
     $string = strtolower ($string);
	 $string = ucfirst($string); 
	 return $string;
}

function trim_function_title($string){
     $string = substr($string,0,30);
     $string = substr($string,0,strrpos($string," "));
	 $string = strtolower ($string);
	 $string = ucwords($string); 
     return $string;
}

?>
<div class="<?php print $classes; ?>">
  <div id="content-artical" class="view-content">
    <div class="name"><img src="<?php echo $themes_path_image;?>images/leftiocns_1_00.png" />Articles</div>
    <div style="width:804px; float:left; text-align:center; padding-bottom:20px;"><img class="dropShadow" src="<?php echo $themes_path_image;?>images/Articles-page-car.png"/></div>
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
	$title = trim_function_title($title);

	//image
	$image_name= $v->_field_data[nid][entity]->field_article_image[und][0][filename];
	


	//date
	$date=$v->_field_data[nid][entity]->created;

	////description 
	$value=$v->_field_data[nid][entity]->body[und][0][value];
	$desc = trim_function($value);
	//$desc = substr($value,0,138);
	 
if($i <= 3){
	if($i == 1)  echo '<div class="a-l" style="width:401px; height:435px;">'; 

 ?>
   <div class="carmake_boxmid_boxmain1_1">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img">
  <a href="/imodify.com/node/<?php echo $v->nid;?>#overlay-context=articles">
  <img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" /></a>
 </div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1">
	
	<?php 
		echo $desc; ?></div>
         <div class="carmake_boxmid_boxmain1_bt">
		<!-- AddThis Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php"
      class="addthis_button"
      addthis:url="<?php echo $site_path;?>events/<?php echo $v->nid;?>"
      addthis:title="<?php echo $title; ?>"
      ></a>
<script type="text/javascript" src="<?php echo $addthis_src; ?>"></script>
<a class="views-ajax-processed-processed" href="/events/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>images/bt26.png" width="97" height="18" /></a>
<!-- AddThis Button END -->
				
            
       
		</div>
  
  
  
  </div>
  
  </div>
  
<?php if ($i == 3) echo '</div>';  
}  //If for 1st column close
elseif($i >= 4 and $i <= 6 ){
	if($i == 4)  echo ' <div class="a-r" style="width:400px; height:420px;">'; 

?>
 <div class="carmake_boxmid_boxmain1_1">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
 <div class="carmake_boxmid_boxmain1_img">
  <a href="/imodify.com/node/<?php echo $v->nid;?>#overlay-context=articles">
  <img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" /></a>
 </div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1"><?php echo $desc; ?></div>
         <div class="carmake_boxmid_boxmain1_bt">
		<!-- AddThis Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php"
      class="addthis_button"
      addthis:url="<?php echo $site_path;?>events/<?php echo $v->nid;?>"
      addthis:title="<?php echo $title; ?>"
      ></a>
<script type="text/javascript" src="<?php echo $addthis_src; ?>"></script>
<a class="views-ajax-processed-processed" href="/events/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>images/bt26.png" width="97" height="18" /></a>
<!-- AddThis Button END -->
				
            
       
		</div>
  
  
  
  </div>
  
  </div>
  
<?php if ($i == 6) echo '</div>';  
}//If for 2nd column close
elseif($i >=7 and $i <=8 ) { if ( $i == 7 )echo ' <div class="bb" style="width:550px; height:237px;"> <div class="bb-left">'; 
?>

  
  <div class="carmake_boxmid_boxmain1_1r">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img">
  <a href="/imodify.com/node/<?php echo $v->nid;?>#overlay-context=articles">
  <img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" /></a>
 </div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1"><?php echo $desc; ?></div>
         <div class="carmake_boxmid_boxmain1_bt">
		<!-- AddThis Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php"
      class="addthis_button"
      addthis:url="<?php echo $site_path;?>events/<?php echo $v->nid;?>"
      addthis:title="<?php echo $title; ?>"
      ></a>
<script type="text/javascript" src="<?php echo $addthis_src; ?>"></script>
<a class="views-ajax-processed-processed" href="/events/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>images/bt26.png" width="97" height="18" /></a>
<!-- AddThis Button END -->
				
            
       
		</div>
  
  
  
  </div>
  
  </div>
  
  <?php
  if($i == 8) echo '</div>'; 
} //3rd left column close
elseif($i >=9 and $i <=10 ) { if ( $i == 9 )echo '<div class="bb-center">'; 
?>
  
  <div class="carmake_boxmid_boxmain1_1r">
  <div class="carmake_boxmid_boxmain1_head1"><a class="views-ajax-processed-processed" href="/imodify.com/articles/<?php echo $v->nid;?>"><?php echo $title;?></a></div>
  <div class="carmake_boxmid_boxmain1_img">
  <a href="/imodify.com/node/<?php echo $v->nid;?>#overlay-context=articles">
  <img src="<?php echo $directory.$image_name;?>" onerror="this.src='<?php echo $themes_path_image?>images/img_not.png'" width="128" height="84" /></a>
 </div>
  <div class="carmake_boxmid_boxmain1_cntent">
  <div class="carmake_boxmid_boxmain1_date"><?php 
							$Time = date("d M Y", $date); 
							echo $Time;
							?></div>
    <div class="carmake_boxmid_boxmain1_txt1"><?php echo $desc; ?></div>
         <div class="carmake_boxmid_boxmain1_bt">
		<!-- AddThis Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php"
      class="addthis_button"
      addthis:url="<?php echo $site_path;?>events/<?php echo $v->nid;?>"
      addthis:title="<?php echo $title; ?>"
      ></a>
<script type="text/javascript" src="<?php echo $addthis_src; ?>"></script>
<a class="views-ajax-processed-processed" href="/events/<?php echo $v->nid;?>"><img src="<?php echo $themes_path_image;?>images/bt26.png" width="97" height="18" /></a>
<!-- AddThis Button END -->
				
            
       
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
// 1st column and 2nd column

/*condition for less than 10 results*/
// if ($i == 7)echo '</div>'; // BB-left tag close
// if ($i == 9)echo '</div>'; //BB-Center tag close
?>
<div id="msg"></div>
<?php

if ($i >= 7) echo '</div>'; // BB tag close (main) Requires in all condition
?>
<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
		}
      });
</script>
</div>
    <div class="bb-add">
  <div id="right">
  
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
  </div>
 <?php if ($i > 0) { ?>

	<div class="footer-view"><img src="<?php echo $themes_path_image;?>images/bt_view.png" align="absmiddle" /></div>

<?php
}

?>
 

</div>

 

  
  
  
 
 
  
  
   