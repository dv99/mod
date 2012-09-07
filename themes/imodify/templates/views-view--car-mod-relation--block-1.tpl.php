<script type="text/javascript" language="javascript">
	$(document).ajaxComplete(function(evt, request, settings){
		if($('.selectList .views-exposed-form select').next('span').attr('class')!='customStyleSelectBox'){
        	$('.selectList .views-exposed-form select').customSelect();
		}
      });
</script>
<div class="<?php print $classes; ?>">
<?php if ($exposed): ?>
	<ul class="refineBox selectList">
		<?php print $exposed; ?>
	</ul>
<?php endif; ?>
</div>
<div class="clr"></div>