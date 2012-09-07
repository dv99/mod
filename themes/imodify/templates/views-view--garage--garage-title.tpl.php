<?php
$record = $view->result;
$title = $record[0]->node_title;
$check = arg(0);
?>
<div class="title"><?php echo $title;?></div>
<?php if ($check != 'enthusiast') {?>
<table width="65%" style="border-collapse: separate;">
<tr align="right">
<td>
	<!-- AddThis Button BEGIN -->
						<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=ra-4ff6c82229926a13" addthis:url="<?php echo $site_path.'events/'.$value->nid;?>"
						addthis:title="<?php echo $value->_field_data['nid']['entity']->title; ?>"></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ff6c82229926a13"></script>
					<!-- AddThis Button END -->
</td>
</tr>
</table>
<br/><br/>
<?php } ?>