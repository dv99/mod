<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
			}
		});
	  
</script>
<script type="text/javascript">

$(document).ready(function() {
   // put all your jQuery goodness in here.
   var val= document.getElementById("edit-jump1").value;
	
   getCarStatus1(val);
 });

function getCarStatus1(val){
		
	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';

$("#image_car").html('<div style="padding-left:200px; padding-top:50px; "><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	
	$("#load_article").html('<div style="padding-left:200px; padding-top:200px; padding-bottom:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
	
	$("#load_events").html('<div style="padding-left:200px; padding-top:200px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');

	
	$("#part").html('<div style="padding-left:300px;padding-top:10px;"><img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/></div>');
  
  viewName = 'car_product_category_profile';
  viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_image&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#car_image").html(viewHtml);
    }
  });

   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_article&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml1 = data[1].data;
      $("#article").html(viewHtml1);
    }
  });
  
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_event&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml12 = data[1].data;
      $("#events").html(viewHtml12);
    }
  });
  
  viewName = 'product_category';
    $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_parts&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
		$("#car_part").html(viewHtml2);
	   
	  
    }
  });
}
</script>
<div class="<?php echo $classes;?>" >	
<?php $result=$view->result; ?>
<div id="select_new">

	<div class="selectList">
	
	
	<select name="jump1" id="edit-jump1" onchange="getCarStatus1(this.value);">
		<?php 
		//$values = _get_element();
		foreach ($result as $record)
		{
			echo "<option  value='".$record->tid."'>".$record->taxonomy_term_data_name."</option>";
		}
		?>
	</select>
	
	</div>
	</div>
</div>