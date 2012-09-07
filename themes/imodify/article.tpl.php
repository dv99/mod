<?php echo'<li>l asjldjf jsdlkf jljsdlkf lksjdflk;';?>
<?php print drupal_render_children($form); ?>
<?php /*?><div id="add_car">
  <h3><?php echo arg(1)=='add'?'ADD A ':'EDIT ';?>GALLERY</h3>
  <table width="500" border="0" cellpadding="0" cellspacing="0">
  	<tbody style="border:none;">
    <tr>
      <td><?php print drupal_render($form['title']); ?></td>
    </tr>
    <tr>
      <td align="center"><table width="450" border="0" cellspacing="0" cellpadding="8">
      	<tbody style="border:none;">
        <tr>
          <td><?php print drupal_render($form['field_gallery_image']); ?></td>
        </tr>
        <tr>
          <td class="selectList"><?php print drupal_render_children($form['field_car_gallery']);?></td>
        </tr>
        <tr>
          <td align="left" id="galSub"><label>&nbsp;</label><?php print drupal_render_children($form['actions']);?></td>
         </tr>
         </tbody>
      </table></td>
    </tr>
    </tbody>
  </table>
</div>
<div style="display:none"><?php print drupal_render_children($form); ?></div><?php */?>
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