<?php //echo '<pre>';print_r($_GET);?>
<script type="text/javascript" language="javascript">
	if (undefined != $){
		var $=jQuery;
	}
	function listLiBg2(liID,bgT){
		bgT == 1 ? $('#'+liID).css('background-color','#F9CE6F') : $('#'+liID).css('background-color','');
	}
	
	function getArticles(val){
  
  
	//val1=$('#edit-jump5').val();
	//alert(val);
	
	$("#block-views-articles-select-articles").html('<div style="padding-left:300px; padding-top:250px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	
	  
  viewName = 'articles';
  //viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=select_articles&view_args=' + 'all' + '/'+ 'all' + '/'+ val, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-articles-select-articles ").html(viewHtml);
    }
  });
 }
 
</script>
<?php $geID=isset($_GET['field_article_category_tid'])&&$_GET['field_article_category_tid']!=''?$_GET['field_article_category_tid']:'';?>
<div class="<?php print $classes; ?>">
	<ul class="menu clearfix" style="margin:0; padding:0;">
		<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(0)=='articles'&&$geID==''?'#F9CE6F':'';?>; padding-left:25px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="1" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='articles'&&$geID==''?1:0;?>);"><a href="<?php echo base_path();?>articles"><strong>MAIN</strong></a></li>
		<?php foreach($view->result as $result){?>
				<li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo $result->tid==$geID?'#F9CE6F':'';?>; padding-left:25px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="<?php echo $result->tid;?>" onmouseout="listLiBg2(this.id,<?php echo $result->tid==$geID?1:0;?>);"><a href="#" onClick="getArticles(<?php echo $result->tid; ?>);"><?php echo $result->taxonomy_term_data_name;?></a></li>
		<?php }?>
	</ul>
</div>