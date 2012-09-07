<script type="text/javascript">
$(document).ready(function(){
  $('.updatecar_box2_links a').click(function(e){
    e.preventDefault();
      id = $(this).closest('div').attr('id');
      $('#'+id+'_detail').slideToggle('slow');
      });

});
</script>
<?php 
//echo "<pre>"; print_r($view->result);die();
$car_nid = $view->result[0]->_field_data[nid][entity]->field_car[und][0][nid];

 
foreach($view->result as $res){ ?>
 <div class="<?php echo $classes; ?>">
    <div class="cardetail_head1"><?php echo $view->result[0]->node_title; ?></div>
    <div class="tophead1">UPDATE CAR STATUS</div>
<table width="534" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="color:#b63b00; padding-bottom:5px;"><strong>Why Update My Car Status?</strong></td>
  </tr>
  <tr>
    <td>Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.<a href="#"><strong>learn more</strong></a></td>
  </tr>
  </table>
<div class="updatecar_main">
<div class="updatecar_box1">
<div class="updatecar_box1_leftmain">
  <table width="275" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Modification Style</td>
      <td><span class="selectList">
        <select name="select2" disabled="disabled">
          <option><?php echo views_embed_view('enthusiast_car_status', 'car_mod_style', $car_nid); ?></option>
        </select>
      </span></td>
      <td align="center" style="color:#b63b00;"><strong>?</strong></td>
    </tr>
    <tr>
      <td>Vehicle Ownership</td>
      <td><span class="selectList">
        <select name="select" disabled="disabled">
          <option><?php echo render($view->result[0]->field_field_vehicle_ownership); ?></option>
        </select>
      </span></td>
      <td align="center" style="color:#b63b00;"><strong>?</strong></td>
    </tr>
    <tr>
      <td>Personalized Plate</td>
      <td height="30"><span style="padding-bottom:10px; padding-left:10px;">
        <input name="textfield2" type="text"  class="updatecar_box2_input1" id="textfield2" style="width:110px;"/>
      </span></td>
      <td align="center" style="color:#b63b00;"><strong>?</strong></td>
    </tr>
    <tr>
      <td>Registration Status</td>
      <td><span class="selectList">
        <select name="select3" disabled="disabled">
          <option><?php echo render($view->result[0]->field_field_registration_status); ?></option>
        </select>
      </span></td>
     <td align="center" style="color:#b63b00;"><strong>?</strong></td>
    </tr>
  </table>
</div>
<div class="updatecar_box1_rightmain">
  <table width="200" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="25"><?php echo render($view->result[0]->field_field_car_for_sale); ?></td>
      <td height="25" align="center"><strong><a href="#">Edit</a></strong></td>
    </tr>
    <tr>
      <td height="25"><?php echo render($view->result[0]->field_field_plate_for_sale); ?></td>
      <td height="25" align="center"><strong><a href="#">Edit</a></strong></td>
    </tr>
    <tr>
      <td height="25">Expiry Date</td>
      <td height="25"><img src="images/icon_date.png" width="90" height="22" /></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td height="25" align="center" style="font-size:11px; color:#F7941E;">Set Reminder</td>
    </tr>
  </table>
</div>




</div>

<div class="updatecar_box2">
<div style="margin-bottom:20px;">Promoting product, website, imodify page, gallery images and more. Promoting product, website, imodify page, gallery images and more.Promoting product, website, imodify page, gallery images and more. Promoting product, website</div>
<div class="updatecar_box2_links" id="visual_imperfections"><a href="#">Visual (Exterior / Interior) Imperfections</a></div>
<div class="updatecar_box2_links_detail" id="visual_imperfections_detail" >
<div class="updatecar_box2_links_box1">
  <div style="padding-bottom:8px;"><input name="textfield" type="text" class="updatecar_box2_input1" id="textfield" /></div>
  <div style="padding-bottom:8px;">    <textarea name="textfield" class="updatecar_box2_input1" id="textfield"></textarea>
  </div>
  
  <div style="padding-bottom:8px;"><img src="<?php echo base_path() . path_to_theme();?>/images/img2.png" width="185" height="66" /></div>
  <div style="padding-bottom:8px;">Maximum File Size 8 MB<br />
png, gif, jpg, jpeg
</div>

  <div style="padding-bottom:8px;font-size:12px; color:#F7941E;">New Entry</div>
</div>

<div class="updatecar_box2_links_box2">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40">Max. Budget</td>
      <td height="40"><span style="padding-bottom:8px;">
        <input name="textfield2" type="text" class="updatecar_box2_input2" id="textfield2" value="AU$" />
      </span></td>
    </tr>
    <tr>
      <td height="40">Urgency</td>
      <td height="40" class="selectList" style="margin-left:0px!important;">
        <select name="select" disabled="disabled">
          <option><?php echo render($view->result[0]->field_field_urgency_option); ?></option>
        </select>
        </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="font-size:11px; color:#F7941E; padding-left:10px;">Set Reminder </td>
    </tr>
    <tr>
      <td height="50" style="padding-right:10px;">Quoted Price To Beat</td>
      <td height="50" style="padding-bottom:8px;">
        <input name="textfield3" type="text" class="updatecar_box2_input2" id="textfield3" value="" />
      </td>
    </tr>
  </table>
</div>


</div>




<div class="updatecar_box2_links"><a href="#">Mechanical Performance Issues / Abnormalities</a></div>
<div class="updatecar_box2_links" id="electrical"><a href="#">Electrical Wiring Faults and Malfunctions</a></div>

</div>
<div class="updatecar_box3_detail" id="electrical_detail">
<div class="updatecar_box3_links">Audio / Video</div>
<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>
<div class="updatecar_box3_detail_box11">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-bottom:10px;"><textarea name="textfield4" class="updatecar_box2_input1" id="textfield4" style="width:202px;" Placeholder="Add Your Comment..."></textarea>
      </td>
  </tr>
  <tr>
    <td style="padding-bottom:10px;"><img src="<?php echo base_path() . path_to_theme();?>/images/img3.png" width="209" height="88" /></td>
  </tr>
  <tr>
    <td style="padding-bottom:10px;"><strong><a href="#">Add Photos</a></strong></td>
  </tr>
  </table>



</div>
<div class="updatecar_box3_detail_box4">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="167">Modified/Purchase On</td>
      <td width="38">&nbsp;</td>
      <td width="90"><img src="<?php echo base_path() . path_to_theme();?>/images/icon_date.png" width="90" height="22" /></td>
    </tr>
    <tr>
      <td height="25">Supplier Tag</td>
      <td height="25" align="center"><a href="#" style="color:#F7941E;"><strong>Edit</strong></a></td>
      <td height="25" align="center"><a href="#" style="color:#F7941E;"><strong>Add Review</strong></a></td>
    </tr>
    <tr>
      <td height="25"><a href="#" style="text-decoration:underline;"><strong>Strathfield Car Radios</strong></a></td>
      <td height="25" align="center">&nbsp;</td>
      <td height="25" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="25">Product Tags</td>
      <td height="25" align="center"><a href="#" style="color:#F7941E;"><strong>Edit</strong></a></td>
      <td height="25" align="center"><a href="#" style="color:#F7941E;"><strong>Add Review</strong></a></td>
      </tr>
    <tr>
      <td height="25" colspan="3"><a href="#" style="text-decoration:underline;"><strong>Knewood R3882DVD, </strong></a>&nbsp;<a href="#" style="text-decoration:underline;"><strong>Knewood R3882DVD, </strong></a>&nbsp;<a href="#" style="text-decoration:underline;"><strong>Knewood R3882DVD, </strong></a>&nbsp;<a href="#" style="text-decoration:underline;"><strong>Knewood R3882DVD, </strong></a></td>
      </tr>
    <tr>
      <td height="25">Mod Style Tags</td>
      <td height="25" align="center"><a href="#" style="color:#F7941E;"><strong>Edit</strong></a></td>
      <td height="25" align="center">&nbsp;</td>
    </tr>
  </table>
</div>


</div>

<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>




</div>

<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>




</div>


<div class="updatecar_box3_links">Exterior</div>
<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>




</div>
<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>




</div>
<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>




</div>
<div class="updatecar_box3_detail">
<div class="updatecar_box3_detail_boxmain">
<div class="updatecar_box3_detail_box1">Speakers,S.ubs and Amps</div>
<div class="updatecar_box3_detail_box2">Set Reminder</div>
<div class="updatecar_box3_detail_box3">Sell Item</div>
</div>




</div>

</div>

<div style="float:right;"><a href="/node/<?php echo $view->result[0]->nid ?>/edit/car-status"><img src="<?php echo base_path() . path_to_theme();?>/images/bt_save.png" width="96" height="22" /></a></div>
</div>
        
  </div>
<?php } ?>