<div id="tnb" style="display:none;">
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