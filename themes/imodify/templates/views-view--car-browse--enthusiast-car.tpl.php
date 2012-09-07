<?php 

	global $user;
	$uid = $user->uid;
	
	$record  = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid ASC limit 0,1 ', array(':uid' => $user->uid,':type' => 'garage'));
	foreach($record as $result)
	{	
		$nid = $result->nid;
		$view2 = views_get_view('garage');
		$view2->set_arguments(array($nid));
		$view2->set_display('car_gallery');
		print $view2->preview('car_gallery'); 
	}
?>
<div class="viewAll"><a href="#">View All</a></div>
</div>
</div>


