<?php



	//global $user;
	$nid = arg(1);
	
	$record1  = db_query("SELECT uid FROM `node` WHERE `nid`='".$nid."'");
	foreach($record1 as $result1){
	
		$uid=$result1->uid;
	
	$record  = db_query("SELECT nid FROM `node` WHERE `uid`='".$uid."' AND `type`='gallery' order by nid DESC limit 0,1");
	
					foreach($record as $result)
					{	
						 $gallery_id  = $result->nid;
						 //$gallery_id = $result->entity_id;
						 
					}
	}
				echo $gallery_id;
				
?>