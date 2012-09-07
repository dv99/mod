<?php //echo '<pre>';print_r($_GET);?>
<script type="text/javascript" language="javascript">
  if (undefined != $){
    var $=jQuery;
  }
  function listLiBg2(liID,bgT){
    bgT == 1 ? $('#'+liID).css('background-color','#F9CE6F') : $('#'+liID).css('background-color','');
  }
  
   function getEvents(val){
  
  $("#block-views-events-new-select-events").html('<div style="padding-left:300px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
  
  viewName = 'events';
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=new_select_events&view_args=' + 'all' + '/'+ 'all' + '/'+ val, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;        
      $("#block-views-events-new-select-events").html(viewHtml);
    }
  });
 }
 
</script>
<?php $geID=isset($_GET['field_event_category_tid'])&&$_GET['field_event_category_tid']!=''?$_GET['field_event_category_tid']:'';?>
<div class="<?php print $classes; ?>">
  <ul class="menu clearfix">
    <li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo arg(0)=='events'&&$geID==''?'#F9CE6F':'';?>; padding-left:25px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="1" onmouseout="listLiBg2(this.id,<?php echo arg(0)=='events'&&$geID==''?1:0;?>);"><a href="<?php echo base_path();?>events"><strong>MAIN</strong></a></li>
    <?php foreach($view->result as $result){?>
        <li style="background:url(<?php echo base_path().path_to_theme();?>/images/broicon.gif) no-repeat 5px 50% <?php echo $result->tid==$geID?'#F9CE6F':'';?>; padding-left:25px; line-height:20px;" onmouseover="listLiBg2(this.id,1);" id="<?php echo $result->tid;?>" onmouseout="listLiBg2(this.id,<?php echo $result->tid==$geID?1:0;?>);"><a href="#" onClick="getEvents(<?php echo $result->tid; ?>);"><?php echo $result->taxonomy_term_data_name;?></a></li>
    <?php }?>
  </ul>
</div>
