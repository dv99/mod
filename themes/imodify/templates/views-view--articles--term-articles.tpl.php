<?php
//$value = $view->result;
//$value = $value[0];
$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
$themes_path_image= base_path().path_to_theme().'/';
//print_r($view->result);
//'Value of arg '.arg(1)

?>
<div id="content-artical">
<?php $i=0;
			foreach($view->result as $value){
				
				$imgUri=$value->field_field_article_image[0]['raw']['uri'];
				$imgPath=str_replace('public://',base_path().'sites/default/files/',$imgUri);
				$imgVars = array();
				$imgVars['item']=array('uri'=>$imgPath,'alt'=>'','width'=>128,'height'=>84,'title'=>'','attributes'=>array('class'=>''));
				$imgVars['image_style']='';
				$imgVars['path']=array('path'=>'articles/'.$value->nid,'options'=>array());
				$nid = $value->nid;
				if ($nid != arg(1)){
				$i++;
				
				
				?>


<?php if( $i == 1 ){ ?>
<div class="bb"> 
<div class="bb-left">

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
</div>
<?php } if ($i == 2) {?>

<div class="bb-center">
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
	</div>
<?php } 
}
 } // ForEach Close
if($i != 0) { echo '</div>';  //Close BB-Tag
?>

<div class="footer-view"><img src="<?php echo $themes_path_image;?>images/bt_view.png" align="absmiddle" /></div>
<?php }else echo 'No Related Articles'; 

?>
</div>