<?php print drupal_render_children($form); ?>
<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("#overlay").css('min-width','800px')
		$("#overlay").css('width','800px');
		$("#overlay #content").css('width','100%');
		$("#overlay #content").css('margin','0');
		$("#overlay-content").css('-moz-border-top-left-radius','15px');
		$("#overlay-content").css('border-top-left-radius','15px');
		$("#overlay-content").css('-moz-border-bottom-left-radius','15px');
		$("#overlay-content").css('border-bottom-left-radius','15px');
		$("#overlay-content").css('-moz-border-bottom-right-radius','15px');
		$("#overlay-content").css('border-bottom-right-radius','15px');
	});
</script>
