<?php

/**
 * Add body classes if certain regions have content.
 */
function imodify_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add navigation stylesheet
  drupal_add_css(path_to_theme().'/css/nav.css');
  
  //Add Countdown stylesheet
  /*drupal_add_css(path_to_theme().'/css/jquery.countdown.css');
  drupal_add_css(path_to_theme().'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');*/

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));

  // Add js for stylish select dropdowns
  drupal_add_js(path_to_theme().'/customSelect.jquery.js');

  // Add Countdown js
  /*drupal_add_js(path_to_theme().'/jquery.countdown.js');
  drupal_add_js(path_to_theme().'/script.js');*/

// Add js for scroll
  drupal_add_js(path_to_theme().'/jquery.simplyscroll.js');
  drupal_add_css(path_to_theme().'/css/jquery.simplyscroll.css');
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function imodify_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function imodify_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function imodify_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'bartik') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function imodify_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function imodify_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function imodify_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function imodify_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function imodify_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}

/**
 * Implementation of hook_theme
 * 
 */
function imodify_theme() {
  return array(
    'cars_node_form' => array(
        'arguments' => array('form' => NULL),
        'template' => 'templates/cars',
        'render element' => 'form',
    ),
	'car_status_node_form' => array(
        'arguments' => array('form' => NULL),
        'template' => 'templates/car_status',
        'render element' => 'form',
    ),
	'gallery_node_form' => array(
        'arguments' => array('form' => NULL),
        'template' => 'templates/gallery',
        'render element' => 'form',
    ),
	'supplier_profile_node_form' => array(
        'arguments' => array('form' => NULL),
        'template' => 'templates/suppliers',
        'render element' => 'form',
    ),
	'article_node_form' => array(
        'arguments' => array('form' => NULL),
        'template' => 'templates/article',
        'render element' => 'form',
    ),
	'event_node_form' => array(
        'arguments' => array('form' => NULL),
        'template' => 'templates/event',
        'render element' => 'form',
    )
  );
}

/**
* Preprocessor for theme('gallery_node_form').
*/
function imodify_preprocess_gallery_node_form(&$variables) {
global $user;

    // Extract the form buttons, and put them in independent variable.
   $cars = $variables['form']['field_car_gallery']['und']['#options'];
$carID=get_user_node_by_type('cars',$user->uid);
$i=0;
foreach($cars as $k => $v){
if(!in_array($k, $carID) && $i>0){
    unset($variables['form']['field_car_gallery']['und']['#options'][$k]);
}
$i++;
}
//echo "<pre>";print_r($variables['form']['field_car_gallery']['und']['#options']); die();

}

/**
*Implementation of hook_form_alter
*
*/
function imodify_form_user_register_form_alter(&$form, &$form_state, $form_id) {
    $form['account']['name']['#title'] = t('Username (Not Profile Name)');

}

function imodify_form_cars_node_form_alter(&$form, &$form_state, $form_id) {
    $form['title']['#title'] = t('Car Profile Name');

}

function imodify_form_gallery_node_form_alter(&$form, &$form_state, $form_id) {
    if(arg(3) !=''){
      $form['field_car_gallery']['und']['#default_value'][] = arg(3);
}
}


function imodify_preprocess_page(&$variables) {
  
  $args = arg();

if($args[0] == 'node' && $args[1] == 'add' && $args[2] == 'article' ){  
  if ($variables[page][content][system_main][main]['#markup'] == 'You are not authorized to access this page.'){
      $variables[page][content][system_main][main]['#markup'] = t('<h2>“You will need to be authorised to upload articles on iMODIFY." <br> Please contact us at <a href="mailto:admin@imodify.com.au" > admin@imodify.com.au</a></h2>');
}
}
  if (isset($variables['node'])) {
//echo "<pre>";print_r($variables['node']->type); 

    $suggests = &$variables['theme_hook_suggestions'];
    $args = arg();
if(!$args[2] == 'edit'){
    unset($args[0]);
    $type = "page__type_{$variables['node']->type}";
    $suggests = array_merge(
      $suggests,
      array($type),
      theme_get_suggestions($args, $type)
    );
}


    // if the url is: 'http://domain.com/node/123/edit'
    // and node type is 'blog'..
    //
    // This will be the suggestions:
    //
    // - page__node
    // - page__node__%
    // - page__node__123
    // - page__node__edit
    // - page__type_blog
    // - page__type_blog__%
    // - page__type_blog__123
    // - page__type_blog__edit
    //
    // Which connects to these templates:
    //
    // - page--node.tpl.php
    // - page--node--%.tpl.php
    // - page--node--123.tpl.php
    // - page--node--edit.tpl.php
    // - page--type-blog.tpl.php
    // - page--type-blog--%.tpl.php
    // - page--type-blog--123.tpl.php
    // - page--type-blog--edit.tpl.php
    //
    // Latter items take precedence.
  }
}



/**
*removing tabs from overlay
*
*/
function imodify_preprocess_overlay(&$variables) {
  unset($variables['tabs']) ;
}


/**
*Custom fuction to get related values
*
*/

function get_profile_based_ids($id, $uid=0) {
	$arr=array();
	$nnode=node_load($id);
	switch($nnode->type){
		case 'cars':
			$arr['garage_id']=$nnode->field_car_garage['und'][0]['nid'];
			$result = db_query('SELECT entity_id FROM {field_data_field_car} WHERE field_car_nid = :nid limit 0,1 ', array(':nid' => $id)); 
			$record=$result->fetchCol();
			$arr['carstatus_id']=$record[0];
			
			$result = db_query('SELECT entity_id FROM {field_data_field_car_gallery} WHERE field_car_gallery_nid = :nid limit 0,1 ', array(':nid' => $id)); 
			$record=$result->fetchCol();
			$arr['gallery_id']=$record[0];			
		break;
		case 'supplier_profile':
			$garID=get_user_node_by_type('garage',$nnode->uid);
			$arr['garage_id']=$garID[0];
			
			$galID=get_user_node_by_type('gallery',$nnode->uid);
			$arr['gallery_id']=$galID[0];
		break;
	}
	$arr['nodetype']=$nnode->type;
	return $arr;
}

function phphtemplate_preprocess_page(&$variables) {
  
  if ($variables['title'] == 'Access denied') {
    $variables['content'] = t('Your updated message here');
  }
}
