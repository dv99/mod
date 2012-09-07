<div class="<?php echo $classes;?>" id="carStatusEditForm">
  <div class="tophead1"><?php echo arg(1)=='add'?'Add An ':'Edit ';?>Event</div>
  <div class="updatecar_main">
	<div class="updatecar_box1">
            <div class="updatecar_box1_leftmain">
              <table width="274" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><?php print drupal_render_children($form['title']);?></td>
                </tr>
                <tr>
                  <td class="selectList"><?php print drupal_render_children($form['field_event_category']);?></td>
                </tr>
                <tr>
                  <td class="selectList"><?php print drupal_render_children($form['field_car_make']);?></td>
                </tr>
				<tr>
                  <td class="selectList"><?php print drupal_render_children($form['field_supcategory']);?></td>
                </tr>
				<tr>
                  <td class="selectList"><?php print drupal_render_children($form['taxonomy_vocabulary_1']);?></td>
                </tr>
				 <tr>
                  <td class="artTagMod"><?php print drupal_render_children($form['field_car_model']);?></td>
                </tr>
				<tr>
                  <td class="artTagMod"><?php print drupal_render_children($form['field_link']);?></td>
                </tr>
              </table>
            </div>
            <div class="updatecar_box1_rightmain" style="margin:0px 0 0 10px;">
              <table width="234" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="artTagMod"><?php print drupal_render_children($form['field_event_date']);?></td>
                </tr>
                <tr>
                  <td class="multiSelect" style="padding-top:10px;"><?php print drupal_render_children($form['field_car_style']);?> <span style="float:right; font-size:9px;">Select multiple styles</span></td>
                </tr>
              </table>
            </div>
        </div>
	  <table width="514" border="0" cellpadding="0" cellspacing="0" align="right">
		<tbody style="border:none;">
		<tr>
		  <td><?php print drupal_render_children($form['field_event_image']); ?></td>
		</tr>
		<tr>
		  <td><?php print drupal_render_children($form['field_event_desc']); ?></td>
		</tr>
		<tr>
		  <td align="center" height="50" class="artAct"><?php print drupal_render_children($form['actions']); ?></td>
		</tr>
		</tbody>
	  </table>
  </div>
</div>
<div style="display:none"><?php print drupal_render_children($form); ?></div>
<script type="text/javascript" language="javascript">
	/*$(document).ready(function(){
		$("div.form-item-field-event-desc-und-0-format").addClass('selectList');
		if($("div.form-item-field-event-desc-und-0-format").next('span').attr('class')!='customStyleSelectBox'){
        	$("div.form-item-field-event-desc-und-0-format").customSelect();
		}
	});*/
</script>