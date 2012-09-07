<script type="text/javascript" language="javascript">
$(document).ready(function(){
	MM_preloadImages('<?php echo base_path() . path_to_theme();?>/images/modifycar_hover.gif','<?php echo base_path() . path_to_theme();?>/images/suppliers_hover.gif','<?php echo base_path() . path_to_theme();?>/images/article_hover.gif','<?php echo base_path() . path_to_theme();?>/images/events_hover.gif','<?php echo base_path() . path_to_theme();?>/images/online_hover.gif','<?php echo base_path() . path_to_theme();?>/images/cat1_h.gif','<?php echo base_path() . path_to_theme();?>/images/cat2_h.gif','<?php echo base_path() . path_to_theme();?>/images/cat3_h.gif','<?php echo base_path() . path_to_theme();?>/images/cat4_h.gif','<?php echo base_path() . path_to_theme();?>/images/cat5_h.gif','<?php echo base_path() . path_to_theme();?>/images/cat6_h.gif','<?php echo base_path() . path_to_theme();?>/images/cat7_h.gif','<?php echo base_path() . path_to_theme();?>/images/menu_country_hover.png','<?php echo base_path() . path_to_theme();?>/images/menu_menu_hover.png','<?php echo base_path() . path_to_theme();?>/images/menu_document_hover.png','<?php echo base_path() . path_to_theme();?>/images/menu_car_hover.png','<?php echo base_path() . path_to_theme();?>/images/menu_globe_hover.png','<?php echo base_path() . path_to_theme();?>/images/menu_settings_hover.png');
	$(".one").mouseover(function() {
        $("#menu_country img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_country_hover.png");
    });
    $(".one").mouseout(function() {
        $("#menu_country img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_country.png");
    });
	$(".two").mouseover(function() {
        $("#menu_menu img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_menu_hover.png");
    });
    $(".two").mouseout(function() {
        $("#menu_menu img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_menu.png");
    }); 
	$(".three").mouseover(function() {
        $("#menu_document img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_document_hover.png");
    });
    $(".three").mouseout(function() {
        $("#menu_document img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_document.png");
    }); 
	$(".four").mouseover(function() {
        $("#menu_car img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_car_hover.png");
    });
    $(".four").mouseout(function() {
        $("#menu_car img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_car.png");
    }); 
	$(".five").mouseover(function() {
        $("#menu_globe img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_globe_hover.png");
    });
    $(".five").mouseout(function() {
        $("#menu_globe img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_globe.png");
    }); 
	$(".six").mouseover(function() {
        $("#menu_settings img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_settings_hover.png");
    });
    $(".six").mouseout(function() {
        $("#menu_settings img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/menu_settings.png");
    });
	$("#nav .selectList select").css('height','20px');
	$("table#sel-category a").click(function(e){
	e.preventDefault();
	$("#cat_image_select2 #sub_cat").html('<div style="padding-left:20px;"><img src="<?php echo base_path() . path_to_theme();?>/images/ajax-loader2.gif" width="60" height="30"/></div>');
	var viewArgument = $(this).attr('class');
	var viewName = 'taxonomy_view';
$('#product-cat-browse a').attr('href', '/car-product-category/'+viewArgument);   
   $.ajax({
    type: 'POST',
    url: Drupal.settings.basePath + 'views/ajax',
    dataType: 'json',
    data: 'view_name=' + viewName + '&view_display_id=car_model&view_args=' + viewArgument,
    success: function(data) {
      viewHtml = data[1].data;
      opt = $(viewHtml).find('select').html();
      html = '<div class="selectList" ><select name="jump3" id="edit-jump3" >'+opt+'</div>';
	 /*style="width: 118px; position: absolute; opacity: 0; font-size: 10px; height: 20px;"
	 if($('#sub_cat select').next('span').attr('class')!='customStyleSelectBox'){
	  $('#sub_cat . select').customSelect();
	  }
	  select id="select2" disabled="disabled" style="width: 118px; position: absolute; opacity: 0; font-size: 10px; height: 20px;" name="select2"
	*/
	
	
	$("#cat_image_select2 #sub_cat").html(html);  
	$("#cat_image_select2 #sub_cat .selectList").customSelect();
	$('#cat_image_select2 #sub_cat .selectList span.customStyleSelectBox').css('height','20px');


	$("#cat_image_select2 select").attr("disabled", "");
	
	//$("#sub_cat span.customStyleSelectBox span.customStyleSelectBoxInner").css( {height:'20px'});
  }
 });
	
      });
$(".scroller").simplyScroll({
			customClass:'vert',
			orientation:'vertical',
			auto: false,
			speed: 5			
		});

	
	/*if(($('#select_new .selectList select').next('span').attr('class')!='customStyleSelectBox changed') && ($('#select_new .selectList select').next('span').attr('class')!='customStyleSelectBox')) {
        	$('#select_new .selectList select').customSelect();
			}	
		*/
});
function swapImg(id,theImg){
	$("#"+id+" img").attr("src", "<?php echo base_path() . path_to_theme();?>/images/"+theImg);
	
}
</script>
<div id="tnb">
  <div class="container <?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">
    <div class="logo">
		<?php if ($logo): ?>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
        <?php endif; ?>
    </div>
    <ul id="nav">
      <li class="one"><a href="#" id="menu_country"><img src="<?php echo base_path() . path_to_theme();?>/images/menu_country.png" border="0" /></a>
        <ul>
          <div class="submenumidbg">
            <div class="txt">choose content concentration:</div>
            <li><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/australia.png" width="26" height="17" /></div>
              <span>Australia</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/us.png" width="26" height="17" /></div>
              <span>USA</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/uk.png" width="26" height="17" /></div>
              <span>United Kingdom</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/canada.png" width="26" height="17" /></div>
              <span>Canada</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/newzeland.png" width="26" height="17" /></div>
              <span>New Zeland</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/japan.png" width="26" height="17" /></div>
              <span>Japan</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/europe.png" width="26" height="17" /></div>
              <span>Europe</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/china.png" width="26" height="17" /></div>
              <span>China</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/russia.png" width="26" height="17" /></div>
              <span>Russia</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/uae.png" width="26" height="17" /></div>
              <span>UAE</span></a></li>
            <li class="lock"><a href="#">
              <div class="img"><img src="<?php echo base_path() . path_to_theme();?>/images/southafrica.png" width="26" height="17" /></div>
              <span>South Africa</span></a></li>
          </div>
          <div class="submenu_btm_curv"></div>
        </ul>
      </li>
      <li class="two"> <a href="#" id="menu_menu"><img src="<?php echo base_path() . path_to_theme();?>/images/menu_menu.png" border="0" /></a>
        <ul>
          <li class="box" style="margin-left:-225px">
            <div class="nav_menu">
              <div> <img src="<?php echo base_path() . path_to_theme();?>/images/nav_menu.gif" width="671" height="160" border="0" usemap="#Map" />
                <map name="Map" id="Map">
                  <area shape="rect" coords="80,88,187,114" href="/page/about-us" />
                  <area shape="rect" coords="203,88,309,114" href="<?php echo base_path();?>user/login" />
                </map>
              </div>
              <div id="navcar">
                <table width="955" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><a href="<?php echo base_path();?>modified-cars" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image59','','<?php echo base_path() . path_to_theme();?>/images/modifycar_hover.gif',1)"><img src="<?php echo base_path() . path_to_theme();?>/images/modifycar.gif" name="Image59" width="191" height="150" border="0" id="Image59" /></a></td>
                    <td><a href="<?php echo base_path();?>suppliers" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image60','','<?php echo base_path() . path_to_theme();?>/images/suppliers_hover.gif',1)"><img src="<?php echo base_path() . path_to_theme();?>/images/suppliers.gif" name="Image60" width="191" height="150" border="0" id="Image60" /></a></td>
                    <td><a href="<?php echo base_path();?>articles" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image61','','<?php echo base_path() . path_to_theme();?>/images/article_hover.gif',1)"><img src="<?php echo base_path() . path_to_theme();?>/images/article.gif" name="Image61" width="191" height="150" border="0" id="Image61" /></a></td>
                    <td><a href="<?php echo base_path();?>events" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image62','','<?php echo base_path() . path_to_theme();?>/images/events_hover.gif',1)"><img src="<?php echo base_path() . path_to_theme();?>/images/events.gif" name="Image62" width="193" height="150" border="0" id="Image62" /></a></td>
                    <td><a href="#" onclick="return false;" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image63','','<?php echo base_path() . path_to_theme();?>/images/online_hover.gif',1)"><img src="<?php echo base_path() . path_to_theme();?>/images/online.gif" name="Image63" width="191" height="150" border="0" id="Image63" /></a></td>
                  </tr>
                </table>
              </div>
            </div>
          </li>
        </ul>
      </li>
      <li class="three"><a href="#" id="menu_document"><img src="<?php echo base_path() . path_to_theme();?>/images/menu_document.png" border="0" /></a>
        <ul>
          <li class="box" style="margin-left:-295px">
            <div class="nav_menu">
              <table width="955" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="275" valign="top"><div class="product_category">
                      <img src="<?php echo base_path() . path_to_theme();?>/images/product_folder.gif" width="56" height="44" /> <br />
                      <h1>Product category Pages</h1>
                      <div style="text-align:left; padding-left:25px"> Browse content by product category. Spend less browsing time and get relevant content FAST!</div>
                      <br />
                      <br />
                      <img src="<?php echo base_path() . path_to_theme();?>/images/learn_more.gif" width="108" height="31" border="0" usemap="#Map" />
                      <map name="Map" id="Map">
                        <area shape="rect" coords="-2,1,106,32" href="/page/product-category" />
                      </map>
                    </div></td>
                  <td width="680" valign="top"><div class="content">
                      <h1>BROWSE CONTENT </h1>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" class="selectList"><form action="#" name="image_select" id="image_select">
                              <label for="d">Select Content Type: </label>
                              <select name="select" id="select" style="width:118px;">
                                <option value="articles">Articles</option>
                                <option value="events">Events</option>
                              </select>
                            </form></td>
                          <td width="325" align="left" class="yellow">Suggest Content Type<br />
                            Join as product category moderator</td>
                        </tr>
                      </table>
                      <p>select Category:<br />
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="sel-category">
                        	<tr>
                          	<td align="left" height="87" valign="top"><a href="#" class="266" id="ct1" onmouseout="swapImg(this.id,'cat1.gif')" onmouseover="swapImg(this.id,'cat1_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat1.gif" width="90" height="87" /></a></td>
                                <td align="left" height="87" valign="top"><a href="#" class="261" id="ct2" onmouseout="swapImg(this.id,'cat2.gif')" onmouseover="swapImg(this.id,'cat2_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat2.gif" width="90" height="87" /></a></td>
                                <td align="left" height="87" valign="top"><a href="#" class="246" id="ct3" onmouseout="swapImg(this.id,'cat3.gif')" onmouseover="swapImg(this.id,'cat3_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat3.gif" width="90" height="87" /></a></td>
                                <td align="left" height="87" valign="top"><a href="#" class="255" id="ct4" onmouseout="swapImg(this.id,'cat4.gif')" onmouseover="swapImg(this.id,'cat4_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat4.gif" width="90" height="87" /></a></td>
                                <td align="left" height="87" valign="top"><a href="#" class="266" id="ct5" onmouseout="swapImg(this.id,'cat5.gif')" onmouseover="swapImg(this.id,'cat5_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat5.gif" width="89" height="87" /></a></td>
                                <td align="left" height="87" valign="top"><a href="#" class="274" id="ct6" onmouseout="swapImg(this.id,'cat6.gif')" onmouseover="swapImg(this.id,'cat6_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat6.gif" width="89" height="87" /></a></td>
                                <td align="left" height="87" valign="top"><a href="#" class="276" id="ct7" onmouseout="swapImg(this.id,'cat7.gif')" onmouseover="swapImg(this.id,'cat7_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/cat7.gif" width="89" height="87" /></a></td>
                        	</tr>
                        </table>
                      </p>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                        <tr>
                          <td align="left" ><form action="#" name="cat_image_select" id="cat_image_select2">
                              <label for="d2">Select Subcategory: </label>
								<div id="sub_cat">
									<div class="selectList">                              
										<select name="select2" id="select2" style="width:118px;" disabled="disabled">
											<option value="all">Any</option>
                              			</select>
									</div>
								</div>
<!-- 			    <span id="loading" style="display:none;"></span> -->
                            </form></td>
                          <td width="325" align="left" class="yellow" id="product-cat-browse"><a href="#"> <img src="<?php echo base_path() . path_to_theme();?>/images/browse.gif" width="91" height="35" border="0"/></a></td>
                        </tr>
                      </table>
                    </div></td>
                </tr>
              </table>
            </div>
          </li>
        </ul>
      </li>
      <li class="four"> <a href="#" id="menu_car"><img src="<?php echo base_path() . path_to_theme();?>/images/menu_car.png" border="0" /></a>
        <ul>
          <li class="box" style="margin-left:-357px">
            <div class="nav_menu">
              <table width="955" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="275" valign="top"><div class="product_category">
                      <img src="<?php echo base_path() . path_to_theme();?>/images/car_makes.gif" width="84" height="32" /> <br />
                      <h1>Car Make Pages</h1>
                      <div style="text-align:left; padding-left:25px"> Browse by type of content and car make. Spend less browsing time and get relevant content FAST!</div>
                      <br />
                      <br />
                      <img src="<?php echo base_path() . path_to_theme();?>/images/learn_more.gif" width="108" height="31" border="0" usemap="#Map" />
                      <map name="Map" id="Map">
                        <area shape="rect" coords="-2,1,106,32" href="/page/car-make" />
                      </map>
                    </div></td>
                  <td width="680" valign="top"><div class="content">
                      <h1>BROWSE CONTENT </h1>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" class="selectList"><form action="#" name="image_select" id="image_select">
                              <label for="d">Select Content Type: </label>
                              <select name="select" id="select" style="width:118px;">
                                <option value="articles">Articles</option>
                                <option value="events">Events</option>
                              </select>
                            </form></td>
                          <td width="325" align="left" class="yellow">Suggest Content Type<br />
                            Join as car make moderator</td>
                        </tr>
                      </table>
                      <p>Select Car Make:<br /></p>
                      <div class="rollCarMakes">
                        <a href="<?php echo base_path();?>car-make/audi" id="cm1"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-audi.png" /></a>
                        <a href="<?php echo base_path();?>car-make/bmw" id="cm2"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-bmw.png" /></a>
                        <a href="<?php echo base_path();?>car-make/ferrari" id="cm3"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-ferrari.png" /></a>
                        <a href="<?php echo base_path();?>car-make/ford" id="cm4"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-ford.png" /></a>
                        <a href="<?php echo base_path();?>car-make/honda" id="cm5"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-honda.png" /></a>
                        <a href="<?php echo base_path();?>car-make/lexus" id="cm6"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-lexus.png" /></a>
                        <a href="<?php echo base_path();?>car-make/holden" id="cm7" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-cm1.png" /></a>
                        <a href="<?php echo base_path();?>car-make/hyundai" id="cm8" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-huindai.png" /></a>
                        <a href="<?php echo base_path();?>car-make/jeep" id="cm9" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-jeep.png" /></a>
                        <a href="<?php echo base_path();?>car-make/kia" id="cm10" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-kia.png" /></a>
                        <a href="<?php echo base_path();?>car-make/lamborghini" id="cm11" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-lamborghini.png" /></a>
                        <a href="<?php echo base_path();?>car-make/mazda" id="cm12" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-cm2.png" /></a>
                        <a href="<?php echo base_path();?>car-make/mercedes" id="cm13" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-mercedez.png" /></a>
                        <a href="<?php echo base_path();?>car-make/mitsubishi" id="cm14" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-mitsubhishi.png" /></a>
                        <a href="<?php echo base_path();?>car-make/nissan" id="cm15" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-nissan.png" /></a>
                        <a href="<?php echo base_path();?>car-make/toyota" id="cm16" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-toyota.png" /></a>
                        <a href="<?php echo base_path();?>car-make/subaru" id="cm17" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-cm3.png" /></a>
                        <a href="<?php echo base_path();?>car-make/suzuki" id="cm18" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-suzuki.png" /></a>
                        <a href="<?php echo base_path();?>car-make/volkswagen" id="cm19" onclick="return false"><img src="<?php echo base_path() . path_to_theme();?>/images/logo-wolks.png" /></a>
                      </div><!-- rollCarMakes -->
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" class="selectList"><form action="#" name="image_select" id="image_select2">
                              <label for="d2">Select Subcategory: </label>
                              <select name="select2" id="select2" style="width:118px;">
                                <option>one</option>
                                <option>two</option>
                                <option>three</option>
                              </select>
                            </form></td>
                          <td width="325" align="left" class="yellow"><img src="<?php echo base_path() . path_to_theme();?>/images/browse.gif" width="91" height="35" border="0"/></td>
                        </tr>
                      </table>
                    </div></td>
                </tr>
              </table>
            </div>
          </li>
        </ul>
      </li>
      <li class="five"> <a href="#" id="menu_globe"><img src="<?php echo base_path() . path_to_theme();?>/images/menu_globe.png" border="0" /></a>
              <ul>
          <li class="box" style="margin-left:-434px">
            <div class="nav_menu">
              <table width="955" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="275" valign="top"><div class="product_category">
                      <img src="<?php echo base_path() . path_to_theme();?>/images/globe.gif" width="50" height="50" /> <br />
                      <h1>Mod Style Pages</h1>
                      <div style="text-align:left; padding-left:25px"> Browse by type of content and modification style (specialty equipment market). Spend less browsing time and get relevant content FAST!</div>
                      <br />
                      <br />
                      <img src="<?php echo base_path() . path_to_theme();?>/images/learn_more.gif" width="108" height="31" border="0" usemap="#Map" />
                      <map name="Map" id="Map">
                        <area shape="rect" coords="-2,1,106,32" href="/page/mod-style" />
                      </map>
                    </div></td>
                  <td width="680" valign="top"><div class="content">
                      <h1>BROWSE CONTENT</h1>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" class="selectList"><form action="#" name="image_select" id="image_select">
                              <label for="d">Select Content Type: </label>
                              <select name="select" id="select" style="width:118px;">
                                <option>one</option>
                                <option>two</option>
                                <option>three</option>
                              </select>
                            </form></td>
                          <td width="325" align="left" class="yellow">Suggest Content Type<br />
                            Join as mod style moderator</td>
                        </tr>
                      </table>
                      <p>Select Modification Style:<br />
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="rollModStyles">
<tr>
<?php 	$terms = taxonomy_get_tree(6);
		      $count=0;
		      foreach($terms as $term){
			$count++;
			echo '<td align="left" width="25%"><a href="'.$GLOBALS['base_url'].'/mod-styles/'.$term->tid.'">'.$term->name.'</a></td>';
			if($count % 4 == 0){
		      echo '</tr><tr>';
		      }
if($count > 19)
break;
		     }
?>
</tr>
                        </table></p>
                    </div></td>
                </tr>
              </table>
            </div>
          </li>
        </ul>
      </li>
      <li class="six"> <a href="#" id="menu_settings"><img src="<?php echo base_path() . path_to_theme();?>/images/menu_settings.png" border="0" /></a>
        <ul>
          <li class="box" style="margin-left:-490px">
            <div class="nav_menu">
              <table width="955" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="275" valign="top"><div class="product_category">
                      <img src="<?php echo base_path() . path_to_theme();?>/images/action_tool.gif"  /> <br />
                      <h1>Action Tools</h1>
                      <div style="text-align:left; padding-left:25px">Repair damage to car body, fix mechanical faults, upgrade/customise parts, or simply get started by getting mod designs made up for your car!</div>
                      <br />
                      <br />
                      <img src="<?php echo base_path() . path_to_theme();?>/images/learn_more.gif" width="108" height="31" border="0" usemap="#Map" />
                      <map name="Map" id="Map">
                        <area shape="rect" coords="-2,1,106,32" href="/page/action-tools" />
                      </map>
                    </div></td>
                  <td width="680" valign="top">
                  	<div class="content">
                      <h1>GUIDE TO CAR MODIFICATIONS</h1>
                      <div class="rollActTools">
                      	<a href="<?php echo base_path();?>modified-cars" id="at1" onmouseout="swapImg(this.id,'actool1.gif')" onmouseover="swapImg(this.id,'actool1_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/actool1.gif" /></a>
                        <a href="<?php echo base_path();?>modified-cars" id="at2" onmouseout="swapImg(this.id,'actool2.gif')" onmouseover="swapImg(this.id,'actool2_h.gif')" onclick="return false;"><img src="<?php echo base_path() . path_to_theme();?>/images/actool2.gif" /></a>
                        <a href="<?php echo base_path();?>modified-cars/profile-list/50" id="at3" onmouseout="swapImg(this.id,'actool3.gif')" onmouseover="swapImg(this.id,'actool3_h.gif')"><img src="<?php echo base_path() . path_to_theme();?>/images/actool3.gif" /></a>
                        <a href="<?php echo base_path();?>modified-cars" id="at4" onmouseout="swapImg(this.id,'actool4.gif')" onmouseover="swapImg(this.id,'actool4_h.gif')" onclick="return false;"><img src="<?php echo base_path() . path_to_theme();?>/images/actool4.gif" /></a>
                        <a href="<?php echo base_path();?>modified-cars" id="at5" onmouseout="swapImg(this.id,'actool5.gif')" onmouseover="swapImg(this.id,'actool5_h.gif')" onclick="return false;"><img src="<?php echo base_path() . path_to_theme();?>/images/actool5.gif" /></a>
                        <a href="<?php echo base_path();?>modified-cars" id="at6" onmouseout="swapImg(this.id,'actool6.gif')" onmouseover="swapImg(this.id,'actool6_h.gif')" onclick="return false;"><img src="<?php echo base_path() . path_to_theme();?>/images/actool6.gif" /></a>
                        <a href="<?php echo base_path();?>modified-cars" id="at7" onmouseout="swapImg(this.id,'actool7.gif')" onmouseover="swapImg(this.id,'actool7_h.gif')" onclick="return false;"><img src="<?php echo base_path() . path_to_theme();?>/images/actool7.gif" /></a>
                      </div><!-- rollActTools -->
                     </div></td>
                </tr>
              </table>
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <div class="tnb">
		<?php print render($page['header']); ?>
    </div>
    <?php if ($main_menu): ?>
          <div id="main-menu" class="navigation">
            <?php print theme('links__system_main_menu', array(
              'links' => $main_menu,
              'attributes' => array(
                'id' => 'main-menu-links',
                'class' => array('links', 'clearfix'),
              ),
              'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
          </div> <!-- /#main-menu -->
    <?php endif; ?>
    <div id="login_nav"><?php
		global $user;
		if ($logged_in) 
		{
			if(in_array('siteadmin', $user->roles)){
			  $link = 'admin/index';
			  }elseif(in_array('Automotive Supplier', $user->roles)){
			  $result = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $user->uid,':type' => 'supplier_profile')); 
			  foreach ($result as $record){
				$link = 'supplier-profile/'.$record->nid; 
			}
			  }else{
			  $result = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $user->uid,':type' => 'cars')); 
			  foreach ($result as $record){
				$link = 'car-profile/'.$record->nid; 
			}
			  }?>
		<ul>
			<li>
				<span class="user_nav_title_wrapper"><?php echo l(substr($user->name,0,16),$link);?></span>
				<ul class="menu_wrapper">
					<div class="menu_center">
            <ul>
              <?php 
                $result = db_query('SELECT n.nid, n.title FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC ', array(':uid' => $user->uid,':type' => 'cars')); 
                $i=0;
                $liLinks='';
                
                foreach ($result as $record){
                  $i++;
                  $liLinks.= '<li style="background:url(/themes/imodify/images/car-mini-icon.gif) 7px 30%  no-repeat; "><a href="/car-profile/'.$record->nid.'">'.$record->title.'</a></li>';
              }?>
              <?php if($i>0){?>
                  <div class="txt" style="padding:0 0 10px 10px;">Select Car</div>
                    <ul class="userOptions <?php echo $i>5?'scroller':'';?>">
                      <?php echo $liLinks;?>

                    </ul>
                    <div class="sepLog"></div>
                <?php }?>
                <ul class="userOptions">
                  <li><a href="#">Account Settings</a></li>
                  <li><a href="<?php echo base_path();?>node/add/car-status">Add Car Status</a></li>
                  <li><a href="<?php echo base_path();?>node/add/cars">Add a Car</a></li>
                  <li><a href="<?php echo base_path();?>node/add/gallery">Add a Gallery</a></li>
                  <li><a href="<?php echo base_path();?>node/add/article">Add an Article</a></li>
                  <li><a href="<?php echo base_path();?>node/add/event">Add an Event</a></li>
                  <li><a href="#">Find Friends</a></li>
                </ul>
                <div class="sepLog"></div>
                  <ul class="userOptions">
                    <li class="lock"><a href="#" onclick="return false;">Mobile App</a></li>
                    <li><?php echo l("Logout","user/logout");?></li>
                  </ul>
            </ul>
    			</div>
					<div class="menu_bottom"></div>
				</ul>
			</li>
    </ul>
    </ul>
<?php	}else{
		print l('Login',"user/login").' | '.l("Sign-up","user/register");
		}?>
    </div>
  </div>
</div>
<?php
global $user;
// code for login based restriction on certain pages
$arg0 = arg(0);
$arg1 = arg(1);
$dest = $_GET['q'];
$restricted0 = array('intropage','supplier','brands');
$restricted1 = array('login','register', 'logout');
if(!$user->uid){
 if(!in_array($arg1, $restricted1) && !in_array($arg0, $restricted0)){
// drupal_goto('user/login', array('query'=>drupal_get_destination()));
header("location: /user/login?destination=$dest");
exit();
}
} 
//------------------------------------------
?>           
