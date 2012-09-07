<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
if ($GLOBALS['user']->uid>0){
	header("Location: ".base_path()."modified-cars");
}
?>
<script type="text/javascript" language="javascript">
	var $=jQuery;
	$(document).ready(function(){
		$("body").attr("id","intro");
		$("#views_slideshow_controls_text_pause_intropage-page").hide();
		$("#views_slideshow_controls_text_previous_intropage-page").html('<div id="slLftNv"><a href="#"><img src="<?=path_to_theme();?>/images/arrow_left.gif" alt="" /></a></div>');		
		$("#views_slideshow_controls_text_next_intropage-page").html('<div id="slRgtNv"><a href="#"><img src="<?=path_to_theme();?>/images/arrow_right.gif" alt="" /></a></div>');
		$(".views-content-counter a").click(function(){
			return false;
		});
		$("#slfooter").css('position','fixed');
		/*$("#snUp").click(function(){
			$(".loginForm").slideUp('slow');
			$(".signupForm").show('slow');
			return false;
		});
		$("#lgIn").click(function(){
			$(".signupForm").hide('slow');
			$(".loginForm").slideDown('slow');
			return false;
		});*/
	});
	
</script>
<div id="cntIntro">
<center><img src="<?=path_to_theme();?>/images/img_txt.gif" alt="" /></center>
<h2>where car enthusiasts and automotive suppliers are showcased and connected</h2>
    <div class="slideCntWrap">
        <div class="<?php print $classes; ?>">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <?php print $title; ?>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($header): ?>
            <div class="view-header">
              <?php print $header; ?>
            </div>
          <?php endif; ?>
         
          <?php if ($exposed): ?>
            <div class="view-filters">
              <?php print $exposed; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($attachment_before): ?>
            <div class="attachment attachment-before">
              <?php print $attachment_before; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($rows): ?>
            <div class="view-content">
              <?php print $rows; ?>
            </div>
          <?php elseif ($empty): ?>
            <div class="view-empty">
              <?php print $empty; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($pager): ?>
            <?php print $pager; ?>
          <?php endif; ?>
        
          <?php if ($attachment_after): ?>
            <div class="attachment attachment-after">
              <?php print $attachment_after; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($more): ?>
            <?php print $more; ?>
          <?php endif; ?>
        
          <?php if ($footer): ?>
            <div class="view-footer">
              <?php print $footer; ?>
            </div>
          <?php endif; ?>
        
          <?php if ($feed_icon): ?>
            <div class="feed-icon">
              <?php print $feed_icon; ?>
            </div>
          <?php endif; ?>
        </div>
    </div><!-- slideCntWrap -->
</div>