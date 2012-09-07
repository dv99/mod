var widgets = [];

function Menu(docObjId)
{
  this.docObjId = docObjId;
  widgets[docObjId] = this;
}

Menu.prototype = {
  items:[],
  item_index:[],
  parent_index:[],
  url_index:[],
  next_item_key:0,
  hide_items_with_zero_count:false,
  on_click:function(){},

  add_item:function(id,param,text,icon,parent,selected,expanded,url){
    if (id == null || id == undefined) return;
    var item_key = this.next_item_key++;
    if (parent == 0) {
      var level = 0;
    } else {
      var level = this.items[this.item_index[parent]].level+1;
    }
    this.items[item_key] = {id:id, param:param, text:text, icon:icon, parent:parent, selected:selected, expanded:expanded, level:level, url:url, count:0}

    this.item_index[id] = item_key;
    this.url_index[url] = item_key; //alert(url);
    if (this.parent_index[parent] == undefined) this.parent_index[parent] = [];
    this.parent_index[parent][this.parent_index[parent].length] = item_key;
  },

  increment_item_count:function(item_id){
    try {
      this.items[this.item_index[item_id]].count++;
    } catch (e){
      //alert("x-item_id="+item_id);
    }
  },

  get_item_count:function(item_id){
     return this._iterative_item_count(this.items[this.item_index[item_id]]);
  },

  render:function(){
    var h = this._generate_level(0,1) + '<p>Click category titles above for key, icons on map for more info or icons in key to hide/show.</p>';
    $('#'+this.docObjId).html(h);

  },

  render_item:function(item){
    var itemObjId = "#"+this.docObjId+'_'+item.id;
    $(itemObjId).replaceWith(this._generate_item(item)+this._generate_level(item.id,item.level));
  },

  click:function(obj){

    var item_id = $(obj).parent().attr('id').split('_').slice(-1)[0];
    var item = this.items[this.item_index[item_id]];

    if ($(obj).parent().hasClass('expanded')){
      $(obj).parent().removeClass('expanded');
      $(obj).parent().addClass('collapsed');
      item.expanded = false;
    } else {
      $(obj).parent().removeClass('collapsed');
      $(obj).parent().addClass('expanded');
      item.expanded = true;
    } 

    //if (item.expanded) item.expanded = false; else item.expanded = true;

    if (item.level > 0){
      if (item.selected){
        this._iterative_hide_item(item);
      } else {
        this._iterative_show_item(item);
      }
    }

    return false;
  },

  toggle:function(obj){
    var item_id = $(obj).parent().attr('id').split('_').slice(-1)[0];

    var item = this.items[this.item_index[item_id]];
    //if (!obj.checked) {
    if (item.selected) {
      // checkbox is being set / unset before this function call
      this._iterative_hide_item(item);
    } else {
      this._iterative_show_item(item);
    }
  },

  _iterative_hide_item:function(item){
   // alert("hide_item_id="+item.id);
   if (item){
      this._hide_item(item);
    }  else {
      item = {id:0};
    }
    //alert(dump(this.parent_index[item.id]));
    for (t in this.parent_index[item.id]){
      this._iterative_hide_item(this.items[this.parent_index[item.id][t]]);
    }
  },

  _hide_item:function(item){
     holistic_map_hide_term(item.param);
     //$("#"+item.docObjId).removeClass('selected');  
     //$("#"+item.docObjId).addClass('unselected');  
     item.selected = false;
     this.render_item(item);
  },

  _show_item:function(item){
      item.selected = true;
      //$("#"+item.docObjId).addClass('selected');
      //$("#"+item.docObjId).removeClass('unselected');
      holistic_map_show_term(item.param);
      this.render_item(item);
  },

  _iterative_show_item:function(item){
    //if (item.selected == false) return;
    //alert("show_item_id="+item.id);
    if (item){
      this._show_item(item);
    } else {
      item = {id:0};
    }

    for (t in this.parent_index[item.id]){
      this._iterative_show_item(this.items[this.parent_index[item.id][t]]);
    }
  },

  _iterative_item_count:function(item){
    var c=item.count;
    for (t in this.parent_index[item.id]){
      c += this._iterative_item_count(this.items[this.parent_index[item.id][t]]);
    }
    return c;
  },

  _ensure_parents_selected:function(item){
    if (!item) return;
    if (!item.selected || !item.expanded){
      item.selected = true; item.expanded = true;
      this.render_item(item);
      //alert(item.text);
    }
    if (item.parent != 0){
      this._ensure_parents_selected(this.items[this.item_index[item.parent]]);
    }

  },

  _generate_level:function(parent, level){

    //alert("render_level="+level);
    var h = '<ul class="menu">';
    for (i in this.parent_index[parent]){
      var item = this.items[this.parent_index[parent][i]];
      h += this._generate_item(item);
      //alert("parent_index["+parent+"]="+dump(this.parent_index[parent]));
      //alert("this="+dump(this.parent_index));
      if (this.parent_index[item.id] != undefined){
        //alert("item.id="+item.id);
        h += this._generate_level(item.id, ++level);
      }
      h += '</li>';
    }
    h += '</ul>';
    return h;
  },

  _generate_item:function(item){
    var count = this.get_item_count(item.id);
    if (this.hide_items_with_zero_count && count == 0) return '';
    var cssClass = '', style = '';
    if (item.expanded) cssClass += ' expanded'; else cssClass = ' collapsed';
    if (item.selected) {
      cssClass += ' selected'; 
    } else {
      cssClass += ' unselected'; 
    }

    if (item.icon != null){
        style = 'background:url('+item.icon+') 0px 2px no-repeat !important; margin-left:4px; padding-left:10px; ';
    }

    item.docObjId = this.docObjId+"_"+item.id;
    var h = '<li style="'+style+'" id="'+item.docObjId+'" class="'+cssClass+'">';
    if (item.level == 0){
      h += '<input type="checkbox" id="'+this.docObjId+"_"+item.id+'_chkbox" '+((item.selected)?'checked="true"':'')+' onclick="widgets[\''+this.docObjId+'\'].toggle(this)"/>';
    }
    h += '<a href="javascript:void(0);" onclick="widgets[\''+this.docObjId+'\'].click(this)">'+item.text+' ('+count+')</a>';
    return h;
  }
 
}
