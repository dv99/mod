<?php
	
	$tid =(int)arg(1);
	
	$result = db_query("SELECT
					taxonomy_term_hierarchy.tid,
					taxonomy_term_data.`name`
					FROM
					taxonomy_term_hierarchy
					INNER JOIN taxonomy_term_data ON taxonomy_term_data.tid = taxonomy_term_hierarchy.tid
					WHERE parent='".$tid ."'");
					
?>
<script type="text/javascript">

$(document).ready(function() {
   // put all your jQuery goodness in here.
   var val= document.getElementById("edit-jump1").value;
	
   getCarStatus1(val);
 });

function getCarStatus1(val){
		
	var imgLoading = '<img src="/sites/default/files/loading.png"/>';
	$(".view-id-car_product_category_profile.view-display-id-car_image").html(imgLoading);
	$(".view-display-id-car_article").html(imgLoading);
	$(".view-display-id-car_event").html(imgLoading);
	$("#block-views-product-category-car-parts").html(imgLoading);
  
  viewName = 'car_product_category_profile';
  viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_image&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $(".view-id-car_product_category_profile.view-display-id-car_image").html(viewHtml);
    }
  });

   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_article&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml1 = data[1].data;
      $(".view-display-id-car_article").html(viewHtml1);
    }
  });
  
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_event&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml12 = data[1].data;
      $(".view-display-id-car_event").html(viewHtml12);
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
      $("#block-views-product-category-car-parts").html(viewHtml2);
    }
  });
  

}
</script>

	<div class="selectList">
	<select name="jump1" id="edit-jump1" onchange="getCarStatus1(this.value);">
		<?php 
		//$values = _get_element();
		foreach ($result as $record)
		{
			echo "<option  value='".$record->tid."'>".$record->name."</option>";
		}
		?>
		
	</select></div>



