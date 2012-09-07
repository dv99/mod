<?php /*
if(!function_exists('_get_enthusiast_profile')){
	function _get_enthusiast_profile() {
	global $user, $base_url;
			// Get the node of car type for current user using JSON format.
		$uri = $base_url."/rest/user/".$user->uid;
		$response = file_get_contents($uri);
	
			// this will return an array, if you want an object, use json_decode($response) directly. See the comments below
		return drupal_json_decode($response);
	} 
}
$values = _get_enthusiast_profile();
$imgVars = array();
$imgVars['item']=array('uri'=>$base_url.'/sites/default/files/'.$values['field_picture_upload_register']['und'][0]['filename'],'alt'=>'','width'=>100,'height'=>100,'title'=>'','attributes'=>array('class'=>'profilePic'));
$imgVars['image_style']='';
$imgVars['path']=array('path'=>$base_url.'/user/'.$user->uid,'options'=>array());
//$theImg=theme_image_formatter($imgVars);
?>
<?php echo theme_image_formatter($imgVars);?>
<h2 class="profileName"><?php echo $values['name'];?></h2>

*/
?>