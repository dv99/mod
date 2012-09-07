<div id="tnb">
    <div class="container <?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">
        <div class="logo">
        	<?php if ($logo): ?>
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                  </a>
            <?php endif; ?>
        </div>
        <div class="tnb">
			<?php print render($page['header']); ?>
        </div>
        <?php if ($main_menu): ?>
              <div id="main-menu" class="navigation">
                <?php print theme('links__system_main_menu', array(
                  'links' => $main_menu,
                  'attributes' => array(
                    'id' => 'main-menu-links',
                    'class' => array('links', 'clearfix'),
                  ),
                  'heading' => array(
                    'text' => t('Main menu'),
                    'level' => 'h2',
                    'class' => array('element-invisible'),
                  ),
                )); ?>
              </div> <!-- /#main-menu -->
    	<?php endif; ?>
        <?php /*if ($secondary_menu): ?>
          <div id="secondary-menu" class="navigation">
            <?php print theme('links__system_secondary_menu', array(
              'links' => $secondary_menu,
              'attributes' => array(
                'id' => 'secondary-menu-links',
                'class' => array('links', 'inline', 'clearfix'),
              ),
              'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
          </div> <!-- /#secondary-menu -->
        <?php endif;
        <div class="search">
            <form action="#" name="search" id="search">
                <input type="text" name="text" value=" " />
                <input type="submit" value=" " />
            </form>
        </div>*/ ?>
          <div class="evoracer"><a href="#"><img src="<?php echo base_path() . path_to_theme();?>/images/logomini.png" alt="" /></a><?php
global $user;
if ($logged_in) 
{
    if(in_array('siteadmin', $user->roles)){
	  $link = 'admin/index';
      }elseif(in_array('Automotive Supplier', $user->roles)){
	  $result = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $user->uid,':type' => 'supplier_profile')); 
	  foreach ($result as $record){
	    $link = 'supplier-profile/'.$record->nid; 
	}
      }else{
	  $result = db_query('SELECT n.nid FROM {node} n WHERE n.type= :type AND n.uid = :uid order by n.nid DESC limit 0,1 ', array(':uid' => $user->uid,':type' => 'cars')); 
	  foreach ($result as $record){
	    $link = 'car-profile/'.$record->nid; 
	}
      }	
echo l(substr($user->name,0,12),$link).' | '.l("logout","user/logout");//logout link
}else{
print l("login","user/login").' | '.l("Sign-up","user/register");
}

?></div>
    </div>
</div>
<div class="container">
	<div id="page">
    	<?php if ($messages): ?>
            <div id="messages"><div class="section clearfix">
              <?php print $messages; ?>
            </div></div> <!-- /.section, /#messages -->
          <?php endif; ?>
        
          <?php if ($page['featured']): ?>
            <div id="featured"><div class="section clearfix">
              <?php print render($page['featured']); ?>
            </div></div> <!-- /.section, /#featured -->
          <?php endif; ?>
          <?php /*?><?php if ($breadcrumb): ?>
              <div id="breadcrumb"><?php print $breadcrumb; ?></div>
            <?php endif; ?><?php */?>
        
            <?php if ($page['sidebar_first']): ?>
              <div id="sidebar-first" class="column sidebar"><div class="section">
              	<div id="left">
                <?php print render($page['sidebar_first']); ?>
              </div></div></div> <!-- /#left, /.section, /#sidebar-first -->
            <?php endif; ?>
			<?php if ($page['two_col']): ?>
            <div id="twoCol">
				 <?php if ($page['two_col']): ?>
                    <?php print render($page['two_col']); ?>
                <?php endif; ?>
             <?php endif; ?>
             <?php if ($page['two_colleft']): ?>
            <div id="twoColLeft">
				 <?php if ($page['two_colleft']): ?>
                    <?php print render($page['two_colleft']); ?>
                <?php endif; ?>
             <?php endif; ?>
                <div id="content" class="column"><div class="section">
                  <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
                  <a id="main-content"></a>
                  <?php print render($title_prefix); ?>
                  <?php /*if ($title): ?>
                    <h1 class="title" id="page-title">
                      <?php print $title; ?>
                    </h1>
                  <?php endif;*/ ?>
                  <?php print render($title_suffix); ?>
                  <?php if ($tabs and $is_admin): ?>
                    <div class="tabs">
                      <?php print render($tabs); ?>
                    </div>
                  <?php endif; ?>
                  <?php print render($page['help']); ?>
                  <?php if ($action_links): ?>
                    <ul class="action-links">
                      <?php print render($action_links); ?>
                    </ul>
                  <?php endif; ?>
                  <?php /*print render($page['content']); //*/ print views_embed_view('supplier_detail','supplier_nid_to_uid', arg(2)); ?>
                <?php print $feed_icons; ?>
                </div></div><!-- #content -->
                <?php if ($page['two_colleft']): ?>
                	</div> <!-- /#twoColLeft -->
             	<?php endif; ?>
                <div id="right">
                    <?php if ($page['sidebar_second']): ?>
                      <div id="sidebar-second" class="column sidebar"><div class="section">
                        <?php print render($page['sidebar_second']); ?>
                      </div></div> <!-- /.section, /#sidebar-second -->
                    <?php endif; ?>
                </div>
            <?php if ($page['two_col']): ?>
            </div> <!-- /#twoCol -->
            <?php endif; ?>
            
            
            <?php if ($page['two_col2']): ?>
            <div id="twoCol">
				 <?php if ($page['two_col2']): ?>
                    <?php print render($page['two_col2']); ?>
                <?php endif; ?>
            </div> <!-- /#twoCol -->    
             <?php endif; ?>
             
             <?php if ($page['two_col3']): ?>
            <div id="twoCol">
				 <?php if ($page['two_col3']): ?>
                    <?php print render($page['two_col3']); ?>
                <?php endif; ?>
            </div> <!-- /#twoCol -->    
             <?php endif; ?>      
            
            
            <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
                <div id="triptych-wrapper"><div id="triptych" class="clearfix">
                  <?php print render($page['triptych_first']); ?>
                  <?php print render($page['triptych_middle']); ?>
                  <?php print render($page['triptych_last']); ?>
                </div></div> <!-- /#triptych, /#triptych-wrapper -->
              <?php endif; ?>
            
              <div id="footer-wrapper"><div class="section">
            
                <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
                  <div id="footer-columns" class="clearfix">
                    <?php print render($page['footer_firstcolumn']); ?>
                    <?php print render($page['footer_secondcolumn']); ?>
                    <?php print render($page['footer_thirdcolumn']); ?>
                    <?php print render($page['footer_fourthcolumn']); ?>
                  </div> <!-- /#footer-columns -->
                <?php endif; ?>
            
                <?php if ($page['footer']): ?>
                  <div id="footer" class="clearfix">
                    <?php print render($page['footer']); ?>
                  </div> <!-- /#footer -->
                <?php endif; ?>
            
              </div></div> <!-- /.section, /#footer-wrapper -->
    </div><!-- #page -->
</div><!-- container -->
<?php if ($page['fb_footer']): ?>
    <?php print render($page['fb_footer']); ?>
<?php endif; ?>

<?php 


?>