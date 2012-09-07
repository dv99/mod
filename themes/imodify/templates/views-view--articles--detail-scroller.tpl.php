<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<style type="text/css">
#addthis_button_top {
margin-left: 250px;
padding-right: 10px;
}
.view-display-id-detail_scroller{margin-left: -28px;}
</style>

<?php
	$value = $view->result;
	$termName = ucwords(strtolower(substr($value[0]->_field_data[nid][entity]->title,0,30)));
	$imgUri=$value[0]->field_field_article_image[0]['raw']['uri'];
	$makeImg=str_replace('public://',base_path().'sites/default/files/',$imgUri);
	$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path();
?>
<div style="width:542px; margin-top:10px;">
	<table border="0" cellspacing="0" cellpadding="0">
		<tbody style="border:none">
			<tr>
				<td valign="top" style="padding-right:10px;"><img src="<?php echo $makeImg;?>" height="28" width="28"/></td>
				<td valign="middle" style="padding-right:10px; color:#000; font-weight:bold; font-size:16px;"><?php echo $termName;?></td>
			</tr>
		</tbody>
	</table> 
	<div id="top_bar" style="float:left;">
		<a href="<?php echo base_path().'articles';?>" style="color:#F8A74A;">Back to main Page</a>
		<a class="addthis_button" id="addthis_button_top" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'articles/'.$value[0]->nid;?>"
		addthis:title="<?php echo $value[0]->_field_data[nid][entity]->title; ?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
		</div>
	<div style="margin-right:-500px;">
		<fb:like width="200" ></fb:like>
		</div>
</div>

<div class="slider">
    <div class="<?php print $classes; ?>">
	  <?php if ($rows): ?>
            <div class="view-content" >
              <?php print $rows; ?>
            </div>
        <?php endif; ?>   
        </div>
</div>
