<div id="add_car">
  <h3><?php echo arg(1)=='add'?'ADD A CAR':'EDIT CAR';?></h3>
  <table width="500" border="0" cellpadding="0" cellspacing="0">
  	<tbody style="border:none;">
    <tr>
      <td width="164" align="right"><?php if(arg(1)=='add'){?><img src="<?php echo base_path() . path_to_theme();?>/images/addcar.jpg" width="94" height="94" /><?php }else{echo '&nbsp;';};?></td>
      <td width="36">&nbsp;</td>
      <td width="300"><?php print drupal_render_children($form['field_car_image']);?></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><table width="450" border="0" cellspacing="0" cellpadding="8">
      	<tbody style="border:none;">
        <tr>
          <td><div style="float:left;"><?php print drupal_render_children($form['field_car_category']);?></div> <div style="float:left; font-size:10px;">Choose one or more</div></td>
        </tr>
        <tr>
          <td><?php print drupal_render($form['title']); ?></td>
        </tr>
        <tr>
          <td class="selectList"><?php print drupal_render_children($form['field_car_make']); ?></td>
        </tr>
        <tr>
          <td class="selectList"><?php print drupal_render_children($form['field_car_model']); ?></td>
        </tr>
        <tr>
          <td class="selectList"><?php print drupal_render_children($form['field_year_of_make']); ?></td>
        </tr>
        <tr>
          <td align="left" id="carSub"><label>&nbsp;</label><?php print drupal_render_children($form['actions']);?></td>
         </tr>
         </tbody>
      </table></td>
    </tr>
    </tbody>
  </table>
</div>
<div style="display:none"><?php print drupal_render_children($form); ?></div>

<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("#overlay").css('min-width','550px')
		$("#overlay").css('width','550px');
		$("#overlay .container").css('width','528px');
		$("#overlay #content").css('width','528px');
		$("#overlay #content").css('margin','0');
		$("#overlay-content").css('width','528px');
		$("#overlay-content").css('width','528px');
		$("#overlay-content").css('-moz-border-top-left-radius','15px');
		$("#overlay-content").css('border-top-left-radius','15px');
		$("#overlay-content").css('-moz-border-bottom-left-radius','15px');
		$("#overlay-content").css('border-bottom-left-radius','15px');
		$("#overlay-content").css('-moz-border-bottom-right-radius','15px');
		$("#overlay-content").css('border-bottom-right-radius','15px');
	});
</script>