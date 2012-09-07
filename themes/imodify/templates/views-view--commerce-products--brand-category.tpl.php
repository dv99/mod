<?php 
	$nid = (int)arg(1);
	$result = db_query("SELECT
							DISTINCT taxonomy_term_hierarchy.parent as termparent
							FROM
							field_data_field_pbrand_name
							INNER JOIN field_data_field_sub_category ON field_data_field_pbrand_name.entity_id = field_data_field_sub_category.entity_id
							INNER JOIN taxonomy_term_hierarchy ON field_data_field_sub_category.field_sub_category_tid = taxonomy_term_hierarchy.tid
							INNER JOIN taxonomy_term_data ON taxonomy_term_data.tid = taxonomy_term_hierarchy.parent
							WHERE `field_pbrand_name_nid`='".$nid."'");
			foreach ($result as $record) 
			{
				$pid = $record->termparent;
				$selectTerm = db_query("SELECT `name` FROM `taxonomy_term_data` WHERE `tid`='".$pid."'");
				foreach($selectTerm as $termName)
				{
					echo $name = $termName->name;
				}
			}
			
?>