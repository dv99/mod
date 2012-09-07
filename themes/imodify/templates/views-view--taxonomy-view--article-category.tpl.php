<div class="selectList">
<label>Select Category:</label>
<select name="jump1" id="edit-jump1" onchange="getArticleCategory(this.value);">
<?php 
$result = $view->result;
foreach ($result as $record)
{
$data = $record->taxonomy_term_data_name;
$id = $record->tid;
echo "<option value='".$id."'>".$data."</option>";
}
?>
</select></div>