function holistic_map_toggle(show){
	if (show){
		$("#content-area .content .view").fadeOut();
		$(".sidebar .block-menu-block, .block-greenwich-mods").fadeOut();
		if ($("#holistic_map").length == 0)
			$("#content-area .content").append('<div id="holistic_map"></div>');
		else
			$("#holistic_map, #holistic_map_controls").fadeIn();
			

		$.getJSON('/map_json', function(data) {
			hmap = data;
			//alert("hmap="+hmap.length);
			holistic_map_init();
		});
		
	} else {
		$("#holistic_map, #holistic_map_controls").fadeOut();
		delete widgets['holistic_map_menu'];	
		$("#content-area .content .view").fadeIn();
		$(".sidebar .block-menu-block").fadeIn();
	}
	
}

function holistic_map_init(cat_path){
  //alert(self.location.href.indexOf("term="));

  if (self.location.href.indexOf("#") > 0){
    cat_path = self.location.href.substr(self.location.href.indexOf("#")+1);
  } else {
  	 cat_path = self.location.href.substr(self.location.href.indexOf(".co.uk/")+7); //TODO: remove hard coded tld
  	 if (cat_path == "map") cat_path = null;
  } 
	//alert(cat_path);

  //create block for dynamic menu 
  if ($("#holistic_map_menu").length == 0){
	  var h = ''+
	    '<div id="holistic_map_controls" class="block block-block">'+
	    '<div class="block-inner">'+
	    '<div class="content"><div id="holistic_map_menu">'+   
	    '</div></div></div></div>';
	  $(".region-sidebar-first .section").append(h);
  }
   
  if (GBrowserIsCompatible()) {
    window.onunload += ";GUnload();";

    //set up icons from taxonomy
    var icons = new Array();
    icons['default'] = new GIcon(G_DEFAULT_ICON);
    icons['default'].image = hmap.marker_image_url_base+'/default.png';
    icons['default'].iconSize = GSize(16,19);
    icons['default'].shadow = hmap.marker_image_url_base+'/shadow.png';
    icons['default'].shadowSize = GSize(16,19);
		
    var menu = new Menu('holistic_map_menu');
    menu.on_click = function(item){ }
    var idx = 1;
    for (v in hmap.marker_taxonomy){
      var vocab = hmap.marker_taxonomy[v];

      if (vocab.vid != 3){
        var addVocabsToMenu = true;
      } else {
        addVocabsToMenu = false;
      }

      if (addVocabsToMenu)
        menu.add_item('v'+v,'v'+v,vocab.name,null,0,true,false);

      for (t in vocab.terms){
        term = vocab.terms[t];
        if (term == null) continue;
        if (icons[term.tid] == undefined && term.map_icon != null){
          icons[term.tid] = new GIcon(G_DEFAULT_ICON);
          icons[term.tid].image = (term.map_icon == null)?null:(hmap.marker_image_url_base+'/'+term.map_icon);
          icons[term.tid].iconSize = GSize(16,19);
          icons[term.tid].shadow = (term.map_icon == null)?null:(hmap.marker_image_url_base+'/shadow.png');
          icons[term.tid].shadowSize = GSize(16,19);
        }
        for (p in term.parents){
          prent = term.parents[p];
          if (prent == '0' && addVocabsToMenu) prent = 'v'+v;
          menu.add_item(term.tid, term.tid, term.name, (term.map_icon == null)?null:(hmap.marker_image_url_base+'/'+term.map_icon), prent,true,(prent == '0' && addVocabsToMenu)?true:false, term.url);   
        }
      }
    }

 //set up map and position / zoom it appropriately
    var latlngbounds = new GLatLngBounds( );

    for (m in hmap.markers){
      marker = hmap.markers[m];

      var latlng = new GLatLng(marker.latitude,marker.longitude,true);
      latlngbounds.extend( latlng );
    }
    var map = new GMap2(document.getElementById('holistic_map'));
    map.setCenter( latlngbounds.getCenter(), map.getBoundsZoomLevel(latlngbounds) );
    map.setUIToDefault();

    // add markers to map
    for (m in hmap.markers){
      marker = hmap.markers[m];
      var latlng = new GLatLng(marker.latitude,marker.longitude,true);

      // add item count to menu
      menu.increment_item_count(marker.term);
      markerOptions = {title:marker.title};
      if (marker.term && icons[marker.term])
        markerOptions.icon=icons[marker.term];
      else {
        markerOptions.icon=icons['default'];
      }
      marker.gmarker = new GMarker(latlng, markerOptions); //save a reference to the marker for later
      //var h = '<h2>'+marker.title+'</h2>';
      var h = '<div id="node-'+marker.nid+'" class="node_location clearfix">'+
        '<h2 class="node-title">'+marker.title+'</h2>';
      if (marker.uri) h += '<div class="photo"><img src="'+marker.uri.replace('public:/',hmap.item_photo_url_base)+'" height="100" width="100" /></div>';
      h += '<p class="address">';
      if (marker.street && marker.street != '') h += marker.street+'<br/>';
      if (marker.additional && marker.additional != '') h += marker.additional+'<br/>';
      if (marker.city && marker.city != '') h += marker.city+'<br/>';
      if (marker.province && marker.province != '') h += marker.province+'<br/>';
      if (marker.postal_code && marker.postal_code != '') h += marker.postal_code+'<br/>';

      h +='</p>';

      h += '<ul class="contacts">';

      if (marker.field_phone_value && marker.field_phone_value != '') h += '<li>t: '+marker.field_phone_value+'</li>';
      if (marker.field_email_value && marker.field_email_value != '') h += '<li>e: <a href="mailto:'+marker.field_email_value+'">'+marker.field_email_value+'</a></li>';
      if (marker.field_web_address_value && marker.field_web_address_value != '') h += '<li>w: <a target="_blank" href="'+marker.field_web_address_value+'">'+marker.field_web_address_value.replace('http://','')+'</a></li>';
      
      h += '<p style="clear:both;"><a href="'+marker.url+'">More info &gt;&gt;</a></p>';

      marker.gmarker.bindInfoWindowHtml(h,{maxHeight:250, minWidth:300}); //, opts?:GInfoWindowOptions)
      map.addOverlay(marker.gmarker);
      
      if (cat_path) {
        //alert("catid="+catid);
        marker.gmarker.hide(); //set all
      }

    }    
 

    if (cat_path) {
      var menuid = menu.url_index[cat_path];
      //alert("cat_path="+cat_path);
      //alert("menu_id="+menuid);
      menu._iterative_hide_item();
      menu._iterative_show_item(menu.items[menuid]);
      menu._ensure_parents_selected(menu.items[menuid]);
    }
    menu.render();
  }
}

function holistic_map_hide_term(term_id){ 
  //alert("hide->term_id="+term_id);
  for (m in hmap.markers){
    marker = hmap.markers[m];

    if ( marker.term == term_id) {
      //alert("hiding->field_tid="+marker.field_shop_categories_tid);
      marker.gmarker.hide()
    }
  }  
}

function holistic_map_show_term(term_id){
  //alert("show->term_id="+term_id);
  for (m in hmap.markers){
    marker = hmap.markers[m];
    if ( marker.term == term_id) {
     //alert("showing->field_tid="+marker.field_shop_categories_tid);
     marker.gmarker.show()
    }
  }  
}




