<style type="text/css">
.upload a{
color:red;
}
</style>
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
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
?>
<?php

global $user;
$guser=$user->uid;

$record=$view->result;
//print_r($view->result);
$themes_path_image= base_path().path_to_theme().'/';
?>
<div class="<?php print $classes; ?>">
<div id="content-artical">
<?php
if($guser){
   if(empty($record))
{
?>
</br>
<div class="upload" style="margin-left:200px; margin-top:30px;">
No article available <u><a href="/node/add/article"><strong>upload article</strong></a></u>
</div>
<?php
}}
?>
    <div class="clr"></div>
	<?php
		$i=0;
		$pre_nid='';
	
			foreach($record as $value){
			
				
				if($i>0){
				//$pre_nid=$nid;
				}
				$nid=$value->nid;
				if($pre_nid!=$nid){
				$i++;
				$imgUri=$value->field_field_article_image[0]['raw']['uri'];
				$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
				$imgVars = array();
				$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>128,'height'=>84,'title'=>'','attributes'=>array('class'=>''));
				$imgVars['image_style']='';
				$imgVars['path']=array('path'=>'articles/'.$value->nid,'options'=>array());
				if($i <= 3){
					if($i == 1) { echo '<div class="a-l">'; } 
	?>
	<div class="carmake_boxmid_boxmain1_1">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'articles/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo date('d M Y',$value->_field_data['nid']['entity']->created);?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_body[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'articles/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
			</div>
        </div>
	</div>
 	<?php if ($i == 3) echo '</div>';  
							}  //If for 1st column close
			elseif($i >= 4 and $i <= 6 ){
				if($i == 4)  echo ' <div class="a-r">'; 
	?>
	<div class="carmake_boxmid_boxmain1_1">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'articles/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo date('d M Y',$value->_field_data['nid']['entity']->created);?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_body[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'articles/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a></div>
        </div>
	</div>
	<?php if ($i == 6) echo '</div>'; 
	}//If for 2nd column close
	elseif($i >=7 and $i <=8 ) { if ( $i == 7 )echo '<div class="bb" style=" width: 815px;" > <div class="bb-left">'; 
	?>
	<div class="carmake_boxmid_boxmain1_1r">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'articles/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo date('d M Y',$value->_field_data['nid']['entity']->created);?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_body[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'articles/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
			</div>
        </div>
    </div>
	<?php
		if($i == 8) echo '</div>'; 
		} //3rd left column close
		elseif($i >=9 and $i <=10 ) { if ( $i == 9 )echo '<div class="bb-center">'; 
	?>
	<div class="carmake_boxmid_boxmain1_1r">
		<div class="carmake_boxmid_boxmain1_head1"><a href="<?php echo base_path().'articles/'.$value->nid;?>"><?php echo ucwords(strtolower(substr($value->_field_data['nid']['entity']->title,0,30)));?></a></div>
		<div class="carmake_boxmid_boxmain1_img"><?php echo theme_image_formatter($imgVars);?></div>
		<div class="carmake_boxmid_boxmain1_cntent">
            <div class="carmake_boxmid_boxmain1_date"><?php echo date('d M Y',$value->_field_data['nid']['entity']->created);?></div>
            <div class="carmake_boxmid_boxmain1_txt1"><?php echo ucfirst(strtolower(substr($value->field_body[0]['raw']['value'],0,135)));?>...</div>
            <div class="carmake_boxmid_boxmain1_bt">
			<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
						&nbsp;<a href="<?php echo base_path().'articles/'.$value->nid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/bt26.png" width="97" height="18" /></a>
			</div>
        </div>
	</div>
	<?php
		if($i == 10) echo '</div>'; 
		} // 4th left column close
	} // If condition close
	}	//For each close
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
		if ($i >= 7) echo '<div id="right"><div class="bb-add" style=" float: left;" >

      <div class="sponsored">Sponsored<a href="#" class="createAd">Create an Ad</a>
  <ul>
                <li>
                <a href="#">Advertisement Heading 1</a>
                <a href="#"><img src="'.base_path() . path_to_theme().'/images/img_ad1.jpg" alt="" /></a>
                Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.</li>
                <li>
                <a href="#">Advertisement Heading 2</a>
                <a href="#"><img src="'.base_path() . path_to_theme().'/images/img_ad2.jpg" alt="" /></a>
                Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.</li>
                <li>
                <a href="#">Advertisement Heading 3</a>
                <a href="#"><img src="'.base_path() . path_to_theme().'/images/img_ad3.jpg" alt="" /></a>
                Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.</li>
            </ul>
        </div>
    </div></div></div>'; // BB tag close (main) Requires in all condition
			if ($i > 0) { ?>
				<div class="footer-view"><img src="<?php echo $themes_path_image;?>images/bt_view.png" align="absmiddle" /></div>
	<?php
}
?>
</div>
</div>
