
<style type="text/css">
div.inline { float:left; width:auto; }
.clearBoth { clear:both; }
.txtbox_bt1 {display:block; background:url(http://echo.imodify.com.au/sites/default/files/btn_refine.png) no-repeat 0 0; width:69px; height:22px; cursor:pointer; border:none; margin-bottom:5px; margin-top:6px;}
#back {
    background-color: #F9CE6F;
    border-bottom-left-radius: 900px;
    border-bottom-right-radius: 900px;
    border-top-left-radius: 900px;
    border-top-right-radius: 900px;
    height: 22px;
    margin-bottom: -27px;
    margin-left: 6px;
    margin-top: 5px;
    width: 121px;
}
	#cat span {
    color: #FFFFFF;
    font-weight: bold;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-right: 5px;
    margin-top: 5px;
    min-width: 100px;
	height: 22px;
    text-transform: uppercase;
}
</style>
<script type="text/javascript">
function getCarModel(val){
	
  var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	$("#cat").html('<table width="140" cellpadding="0" cellspacing="0"><tr><td height="35" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	//$("#cat select").attr("disabled", "disabled");
  
  viewName = 'taxonomy_view';
  viewArgument =  val;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_model&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
	  $("#cat").html(viewHtml);
	  
	 $("#cat option").remove();
	  $("#cat select").attr("disabled", "");
$(viewHtml).find('option').each(function(){
$("#cat select").append($(this));
});
$("#cat select option:first-child").attr("selected", true);

}
  });
}
 
 function clic(){
  val1=$('#edit-jump1').val();
	val2=$('#edit-jump3').val();
	val3=$('#edit-jump2').val();
	val4=<?php echo $v = arg(2); ?>;

	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif" width="50" height="20"/>';
	$("#block-views-modified-car-list-profile-car").html('<table width="500"  align="left" cellpadding="0" cellspacing="0"><tr><td height="300" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
	viewName = 'modified_car_list';
  //viewArgument =  val;
   
  	//viewName = 'car_product_category_profile';
  //viewArgument =  valcid;
   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=profile_car&view_args=' + val4 + '/'+ val2 +'/'+ val3, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#block-views-modified-car-list-profile-car").html(viewHtml);
    }
  });
 }

</script>

<div class="<?php print $classes; ?>">
	<?php

	//print_r($view->result);die;
	$record = $view->result;

	$page_section = $record[0]->taxonomy_term_data_node_name;

	$themes_path_image= base_path().path_to_theme().'/';
	$site_path = 'http://'.$_SERVER['HTTP_HOST'].base_path(); 

	//$directory=base_path().'sites/default/files/styles/image_128x84/public/';     //OLD


	$directory = base_path().'sites/default/files/styles/thumbnail/public/'; 

	?>
	<div><img src="<?php echo $themes_path_image;?>images/head1.png" width="149" height="21" /></div>
	<div style="margin-left:50px; margin-top:15px;"><b><?php echo $page_section; ?></b></div>
	</br></br>
	<form method="post" name="car model" action="#">

	<div class="inline">
		<label>CAR MAKE:</label></br>
		<div class="selectList">
		 <select name="jump1" id="edit-jump1" onchange="getCarModel(this.value);">
			<option  value="9.9">Any</option>
		<?php 
		$vid=3;
		$v=taxonomy_get_tree($vid, 0);
function cmp($a, $b)
{
    return strcmp($a->name, $b->name);
}

usort($v, 'cmp');

		foreach($v as $result)
		{
		    if($result->parents[0]==0)
			{
				$name=$result->name;
				$tid=$result->tid;
				echo "<option value='".$tid."'>".$name."</option>";
			}
		}
		?>
		</select>
		</div>
	</div>

	<div class="inline">
		<label>CAR MODEL:</label></br>
		<script type="text/javascript">
		//alert ($('#edit-jump1').val());
		getCarModel($('#edit-jump1').val());
		//setTimeout($(window).load(function() { clic();}),3000);
		</script>
		<div id="back" style="margin-bottom: -27px;  margin-left: 6px; margin-top: 5px;"></div>
		<div id="cat">
		</div>
	</div>
	<div class="inline">
		<label>MOD STYLE:</label></br>
		<div class="selectList">
		<select name="jump2" id="edit-jump2">
		<option  value="all">Any</option>
		<?php 


		$vid=6;
		$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
		//print_r($v);exit;
		foreach($v as $result)
		{
			
			$name=$result->name;
			$tid=$result->tid;
			echo "<option value='".$tid."'>".$name."</option>";
		}
		?>
		</select>
		</div>
	</div>

	</form>
	<div class="inline">
		</br>
		<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
	</div>
	<div id="show">
	</div>

</div>
