<?php 
//print_r($view->result);
//echo "<pre>";print_r(get_defined_vars());die;
$record = $view->result;
$nid = arg(1);
?>
<script type="text/javascript">
function getCarGallery(val){
		
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	$("#block-views-car-gallery-gallery-slider").html('<div style="padding-left:300px; padding-top:250px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	$("#block-views-car-gallery-car-image").html('<div style="padding-left:300px; padding-top:250px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
  
  viewName = 'car_gallery';
  viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=gallery_slider&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-car-gallery-gallery-slider").html(viewHtml);
	  
    
	 $('.galleryformatter:not(.gallery-processed)').each(function(){
      Drupal.galleryformatter.prepare(this);

    }).addClass('gallery-processed');

	$('#block-views-car-gallery-gallery-slider a')
      .filter('.colorbox')
      .once('init-colorbox-processed')
      .colorbox(Drupal.settings.colorbox);
    }
	
	
  });

   $.ajax({ 
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_image&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml1 = data[1].data;
      $("#block-views-car-gallery-car-image").html(viewHtml1);
    }
  });
  
 }
 $(document).ajaxComplete(function(evt, request, settings){

  if ($('#select_cargallery .selectList span').attr('class') !='customStyleSelectBox' ){
		$('#select_cargallery .selectList select').customSelect();
	}

	if($('.selectList select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList select').customSelect();
		}
});
</script>
<div id="select_cargallery">
<div class="selectList">
	<select name="jump1" id="edit-jump1" onchange="getCarGallery(this.value);">
		<?php 
		//$values = _get_element();
		foreach($record as $result)
		{	
			$stri  = $result->node_title;
			$title = substr($stri,0,18);

	        $str = ($nid ==$result->nid)?'selected="selected"':'';
			echo "<option ". $str ."   value='".$result->nid."'>".$title."</option>";
		}
		?>
		
	</select>
</div>
</div>
