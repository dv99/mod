<?php //echo '<pre>';print_r($view->result);exit;?>
<div class="<?php print $classes; ?>">
    <div class="selectList">
        <select name="car-model-id">
    <?php foreach($view->result as $value){?>
            <option value="<?php echo $value->tid;?>"><?php echo $value->taxonomy_term_data_name;?></option>
    <?php }?>
        </select>
    </div>
</div>