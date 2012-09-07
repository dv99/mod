<?php
//echo '<pre>';print_r($view->result);exit;
//$view = views_get_view('supplier_detail');
//$view->set_arguments(array($view->result[0]->node_uid));
//$view->set_display('supplier_image');
//print $view->preview('supplier_image');
print views_embed_view('supplier_detail', 'supplier_image', $view->result[0]->node_uid);
?>

