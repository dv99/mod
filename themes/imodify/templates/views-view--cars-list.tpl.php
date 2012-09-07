<?php 
global $user, $theme_path, $base_url;
//print_r($user);die;

/**
* Get the element as object
* @return object
*/

function _get_element() {
global $user, $base_url;
        // Get the node of car type for current user using JSON format.
    $uri = $base_url."/rest/node/?fields=nid,title&parameters[uid]=".$user->uid."&parameters[type]=cars";
    $response = file_get_contents($uri);

        // this will return an array, if you want an object, use json_decode($response) directly. See the comments below
    return drupal_json_decode($response);
}
?>
<script type="text/javascript">

function getCarStatus(val){
var imgLoading = '<div id="overlay"><img src="/sites/default/files/ajax-loader1.gif" class="loading_circle" alt="loading" /></div>';
$(".view-id-enthusiast_car_status").html('<table width="114" cellpadding="0" cellspacing="0"><tr><td height="100" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
$("#block-views-enthusiast-car-status-block-3").find(".view-content").html('<table width="114" cellpadding="0" cellspacing="0"><tr><td height="100" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
$("#block-views-garage-car-image").find(".view-content").html('<table width="114" cellpadding="0" cellspacing="0"><tr><td height="100" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
$("#proLinkWrap").html('<table width="114" cellpadding="0" cellspacing="0"><tr><td height="230" align="center" valign="middle">'+imgLoading+'</td></tr></table>');


viewName = 'enthusiast_car_status';
viewArgument =  val;
$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_status&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $(".view-id-enthusiast_car_status").html(viewHtml);
    }
  });

$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=block_3&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml1 = data[1].data;
     $("#block-views-enthusiast-car-status-block-3").find(".view-content").html(viewHtml1);

	 $('.galleryformatter:not(.gallery-processed)').each(function(){
      Drupal.galleryformatter.prepare(this);

    }).addClass('gallery-processed');

	$('#block-views-enthusiast-car-status-block-3 a')
      .filter('.colorbox')
      .once('init-colorbox-processed')
      .colorbox(Drupal.settings.colorbox);
    }
  });

viewName = 'garage';
$.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_image&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml2 = data[1].data;
      $("#block-views-garage-car-image").html(viewHtml2)
    }
  });

 viewName = 'enthusiast_car_status';
 $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=profile_links&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#proLinkWrap").replaceWith(viewHtml);
    }
  });
if($("#content").find(".cardetail_head1").attr('class')){
$("#content").html('<table width="450" cellpadding="0" cellspacing="0"><tr><td height="200" align="center" valign="middle">'+imgLoading+'</td></tr></table>');
viewName = 'car_profile';
 $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=page&view_args=' + viewArgument, // Pass a key/value pair.
    success: function(data) {
      viewHtml = data[1].data;
      $("#content").html(viewHtml);

      $('#content a')
      .filter('.colorbox')
      .once('init-colorbox-processed')
      .colorbox(Drupal.settings.colorbox);
    }
  });
}
 }
 

</script>
<p>
<?php 
	if(in_array('Automotive Supplier', $user->roles)){?>
	<label style="width:100px; float:left;"><font color="#666666">SELECT PROFILE:</font></label>
	<?php }else{?>
	<label style="width:80px; float:left;"><font color="#666666">SELECT CAR:</font></label>
	<?php }?>
<a style="color:#bf5626; float:right;" href="/node/add/cars"><b>Add a car</b></a></p>
</br>
<div class="selectList">
<select name="jump1" id="edit-jump1" onchange="getCarStatus(this.value);">
<?php 
$values = _get_element();

foreach($values as $value){
echo "<option  value='".$value['nid']."'>".$value['title']."</option>";
}
?>
</select></div>
