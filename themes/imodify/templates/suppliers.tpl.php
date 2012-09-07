<div id="add_car">
  <h3>EDIT SUPPLIER PROFILE</h3>
  <table border="0" cellpadding="0" cellspacing="0">
    <tbody style="border:none;">
    <tr>
      <td><?php print drupal_render_children($form['field_supplier_image']);?></td>
    </tr>
    <tr>
      <td align="center"><table width="450" border="0" cellspacing="0" cellpadding="8">
        <tbody style="border:none;">
        <tr>
          <td><?php print drupal_render($form['field_business_type']); ?></td>
        </tr>
        <tr>
          <td class="selectList"><?php print drupal_render_children($form['field_category']);?></td>
        </tr>
        <tr>
          <td><?php print drupal_render_children($form['field_street']); ?></td>
        </tr>
        <tr>
          <td><?php print drupal_render_children($form['field_suburb']); ?></td>
        </tr>
        <tr>
          <td class="selectList"><?php print drupal_render_children($form['field_state']); ?></td>
        </tr>
        <tr>
          <td><?php print drupal_render_children($form['field_postcode']); ?></td>
        </tr>
        <?php /*?><tr>
          <td><?php print drupal_render_children($form['field_links_sm']);?></td>
        </tr><?php */?>
        <tr>
          <td align="left" id="supSub"><label>&nbsp;</label><?php print drupal_render_children($form['actions']);?></td>
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
