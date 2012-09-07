<script type="text/javascript">
 $('#cat .selectList').customSelect();
</script>
<div class="selectList">
<select name="jump3" id="edit-jump3" >
<option  value="all">Any</option>

<?php 
$result = $view->result;
foreach ($result as $record)
{
$data = $record->taxonomy_term_data_name;
$id = $record->tid;
echo "<option value='".$id."'>".$data."</option>";
}
?>
</select>
</div>




