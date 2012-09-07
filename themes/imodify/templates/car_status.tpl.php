<script type="text/javascript">
$(document).ready(function(){
  $('.updatecar_box2_links a').click(function(e){
    e.preventDefault();
      id = $(this).closest('div').attr('id');
      $('#'+id+'_detail').slideToggle('slow');
      });
  $("#edit-field-i-modified-it-und").click(function(){
	  if($("#edit-field-i-modified-it-und:checked").val()){
		  $("#perchOn").show('slow');
	  }else{
		  $("#perchOn").hide('slow');
	  }
  });

});
</script>
<div class="<?php echo $classes;?>" id="carStatusEditForm">
    <div class="tophead1">UPDATE CAR STATUS</div>
    <table width="534" border="0" cellspacing="0" cellpadding="0" style="display:none;">
	  <tbody style="border:none;">
		  <tr>
			<td style="color:#b63b00; padding-bottom:5px;"><strong>Why Update My Car Status?</strong></td>
		  </tr>
		  <tr>
			<td>Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.<a href="#"><strong>learn more</strong></a></td>
		  </tr>
	  </tbody>
    </table>
    <div class="updatecar_main" style="margin-bottom:-400px;">
        <div class="updatecar_box1">
            <div class="updatecar_box1_leftmain">
              <table width="274" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><?php print drupal_render_children($form['field_mod_style']);?></td>
                </tr>
				<tr>
                  <td class="selectList"><?php print drupal_render_children($form['field_vehicle_ownership']);?></td>
                </tr>
                <tr>
                  <td><?php print drupal_render_children($form['field_personalized_plate']);?></td>
                </tr>
                <tr>
                  <td class="selectList"><?php //print drupal_render_children($form['field_registration_status']);?></td>
                </tr>
                <tr>
                  <td><?php print drupal_render_children($form['field_engine_power']);?></td>
                </tr>
              </table>
            </div>
            <div class="updatecar_box1_rightmain">
              <table width="234" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><?php print drupal_render_children($form['field_km_reading']);?></td>
                </tr>
                <tr>
                  <td><?php print drupal_render_children($form['field_car_for_sale']);?></td>
                </tr>
				 <tr>
                  <td><?php print drupal_render_children($form['field_is_car_for_hire_']);?></td>
                </tr>
                <tr>
                  <td height="25"><?php //print drupal_render_children($form['field_plate_for_sale']);?></td>
                </tr>
                <tr>
                  <td height="25"><?php //print drupal_render_children($form['field_expiry_date']);?></td>
                </tr>
                <tr>
                  <!--<td align="right" style="font-size:11px; color:#F7941E;">Set Reminder</td>-->
                </tr>
              </table>
            </div>
        </div>
        <div class="updatecar_box2">
        	<div style="margin-bottom:20px;">Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.Promoting product, website, imodify page, gallery images and more. Promoting product, website</div>
            <div class="updatecar_box2_links" id="visual_imperfections" style="display:none;"><a href="#">Visual (Exterior / Interior) Imperfections</a></div>
            <?php /*<div class="updatecar_box2_links_detail" id="visual_imperfections_detail" style="display:none;">
            	<div class="updatecar_box2_links_box1">
                  <div style="padding-bottom:8px;"><?php print drupal_render_children($form['field_imperfections_summary']);?></div>
                  <div style="padding-bottom:8px;"><?php print drupal_render_children($form['field_imperfections_details']);?></div>
                  <div style="padding-bottom:8px;font-size:12px; color:#F7941E;"><a href="#">New Entry</a></div>
                </div>
				<div class="updatecar_box2_links_box2">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="selectList"><?php print drupal_render_children($form['field_urgency_option']);?></td>
                    </tr>
                    <tr>
                      <td align="right"><a href="#" style="font-size:11px; color:#F7941E;">Set Reminder</a></td>
                    </tr>
                    <tr>
                      <td><?php print drupal_render_children($form['field_quoted_price_to_beat']);?></td>
                    </tr>
                  </table>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" width="535">
                	<tr>
                      <td align="center"><?php print drupal_render_children($form['field_status_images']);?></td>
                    </tr>
                    <tr>
                      
                    </tr>
                </table>
            </div> */?>
            <div class="updatecar_box2_links_detail" id="visual_imperfections_detail">
            	<div><strong>Installed Aftermarket Parts / Services</strong></div>
                <table width="500" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="selectList"><?php print drupal_render_children($form['field_status_product_category']);?></td>
                    </tr>
                    <tr>
                        <td><?php print drupal_render_children($form['field_cat_image']);?></td>
                    </tr> 
                    <tr>
                        <td><?php print drupal_render_children($form['field_already_installed_when_i_b']);?></td>
                    </tr>
                    <tr>
                        <td><?php print drupal_render_children($form['field_i_modified_it']);?></td>
                    </tr>
                    <tr id="perchOn" style="display:none;">
                        <td><?php print drupal_render_children($form['field_modified_puchased_on']);?></td>
                    </tr>
                    <tr>
                      <td><?php print drupal_render_children($form['field__description']);?></td>
                    </tr>
                    <tr>
                      <td align="center" style="padding-top:20px;"><?php print drupal_render_children($form['actions']);?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div style="display:none"><?php print drupal_render_children($form); ?></div>


 