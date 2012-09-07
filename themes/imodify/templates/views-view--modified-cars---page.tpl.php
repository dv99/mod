<?php 
$vid=3;
$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
//echo 'echo-'.$v;
//echo '<pre>'; print_r($v);
//echo '<pre>';print_r($view);exit;?>
<div class="<?php print $classes; ?>">
	<div><img src="<?php echo base_path() . path_to_theme();?>/images/head1.png" width="149" height="21" /></div>
    <?php /*<div class="tophead1">Modifield Cars</div>*/?>
    <div class="topcarmain">
        <div class="topcarbox1"><a href="<?php echo base_path();?>modified-cars/profile-list/48<?php //echo $view->result[0]->tid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/topcar_1.png" width="122" height="83" /></a></div>
        <div class="topcarbox1"><a href="<?php echo base_path();?>modified-cars/profile-list/49<?php //echo $view->result[1]->tid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/topcar_2.png" width="112" height="80" /></a></div>
        <div class="topcarbox1"><a href="<?php echo base_path();?>modified-cars/profile-list/52<?php //echo $view->result[4]->tid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/topcar_5.png" width="99" height="81" /></a></div>
        <div class="topcarbox1"><a href="<?php echo base_path();?>modified-cars/profile-list/51<?php //echo $view->result[3]->tid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/topcar_4.png" width="125" height="84" /></a></div>
		<div class="topcarbox1"><a href="<?php echo base_path();?>modified-cars/profile-list/50<?php //echo $view->result[2]->tid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/topcar_3.png" width="111" height="83" /></a></div>        
        <div class="topcarbox1"><a href="<?php echo base_path();?>modified-cars/profile-list/53<?php //echo $view->result[5]->tid;?>"><img src="<?php echo base_path() . path_to_theme();?>/images/topcar_6.png" width="113" height="84" /></a></div>
    </div>
    <div class="clr"></div>
    <div class="updatecar_box5">
        <div class="updatecar_box5_head1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>EXPLORE</td>
                    <td align="right" style="padding-right:10px; color:#595A5C;">Expand Map View</td>
                </tr>
            </table>
        </div>
        <!---<div style="margin-top:15px; margin-bottom:15px;">
        	<?php if ($exposed): ?>
                <ul class="refineBox selectList">
                      <?php print $exposed; ?>
                </ul>
            <?php endif; ?>
        </div>-->
		
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

/* 
function clic(){
  val1=$('#edit-jump1').val();
	val2=$('#edit-jump3').val();
	val3=$('#edit-jump2').val();
	
	

	var imgLoading = '<img src="/sites/default/files/ajax-loader1.gif"/>';
	$("#load").html(imgLoading);
	 
  viewName = 'car_browse';
  //viewArgument =  val;
   
   
 }
 */

/*$(document).ajaxComplete(function(evt, request, settings){
if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
$('.selectList .views-exposed-form select').customSelect();
}
});*/
</script>

<div class="<?php print $classes; ?>">
</br></br>
<form method="post" name="car model" action="#">

<div class="inline">
<label>CAR MAKE:</label></br>
<div class="selectList">
 <select name="jump1" id="edit-jump1" onchange="getCarModel(this.value);">
	<option  value="9.9">Any</option>
		<?php 
$vid=3;
$v=taxonomy_get_tree($vid, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
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
<div id="back" style="margin-bottom: -27px; margin-left: 6px; margin-top: 5px;"></div>
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
<script type="text/javascript">
 
$(document).ready(function(){
 
        $("#load").hide();
        $(".txtbox_bt1").show();
 
    $('.txtbox_bt1').click(function(){
	$("#load").show();
    $('#load').delay(3000).fadeOut('slow');
    });
 
});
 
</script>

<div class="inline">
</br>
<input id="txtbox_bt1" type="submit" value="" onclick="clic();">
</div>
<div class="inline">
</br></br></br>
<div id="load">
<?php
echo "<img src='/sites/default/files/ajax-loader1.gif'/>";
?>	
</div>
</div>

</div>

    </div>
</div><?php /* class view */ ?>
<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
		}
      });
</script>