<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 			functions.php
* @Package:		GetSimple
* @Action:		Innovation theme for the GetSimple 3.0
*
*****************************************************/

/**
 * Innovation Parent Link
 *
 * This creates a link for a parent for the breadcrumb feature of this theme
 *
 * @param string $name - This is the slug of the link you want to create
 * @return string
 */

function Innovation_Parent_Link($name) {
	$file = GSDATAPAGESPATH . $name .'.xml';
	if (file_exists($file)) {
		$p = getXML($file);
		$title = $p->title;
		$parent = $p->parent;
		$slug = $p->slug;
		echo '<a href="'. find_url($name,'') .'">'. $title .'</a> &nbsp;&nbsp;&#149;&nbsp;&nbsp; ';
	}
}

/**
 * Innovation Settings
 *
 * This defines variables based on the theme plugin's settings
 *
 * @return bool
 */
/*
function Innovation_Settings() {
	$file = GSDATAOTHERPATH . 'InnovationSettings.xml';
	if (file_exists($file)) {
		$p = getXML($file);
		if ($p->facebook != '' ) define('FACEBOOK', $p->facebook);
		if ($p->twitter != '' ) define('TWITTER', $p->twitter);
		if ($p->linkedin != '' ) define('LINKEDIN', $p->linkedin);
		if ($p->webfont != '' ) define('WEBFONT', $p->webfont);
		return true;
	} else {
		return false;
	}
}
*/

function echo_menu_item($v) {
  echo '<li><a href="'.get_site_url(false).$v['url'].'">'.$v['menu'].'</a></li>';
}

function getParent() {
	$slug = return_page_slug();
	if ($slug == '404') {
		echo '<a href=".">Strona główna</a>';
		return false;
	}
	$stronaGlowna = false;
	$parent = '';
	$pdata=menu_data($slug);
	if (strcmp($slug, 'index') == 0) {
		$parent='<a href="'.$pdata['slug'].'">Zmiany</a>';
		$stronaGlowna = true;
	} else {
		// print_r($pdata);
		// if (empty($pdata['parent_slug'])) {
		// 	$parent='<a href="'.$pdata['slug'].'">'.$pdata['menu_text'].'</a>';
		// } else
		if (!empty($pdata['parent_slug'])){
			$ppdata=menu_data($pdata['parent_slug']);
			$parent='<a href="'.$pdata['parent_slug'].'">'.$ppdata['menu_text'].'</a>';
		}
		// else $parent=$pdata['menu_text'];
	}
	if (!empty($parent)) {
		echo '<div class="alert alert-primary">'.$parent.'</div>';
	}
	if ($stronaGlowna) {
		echo '<div>'.show_lastUpdate().'</div>';
	} else {
			$podmenu = return_i18n_menu_data(return_page_slug(), 1, 4, $show=I18N_SHOW_MENU);
      // print_r($podmenu);
      //print_r(menu_data(return_page_slug()));
      if (!empty($podmenu)) {
        echo '<div><ul>';
        foreach ($podmenu as $k => $v) {
				//print_r($v);
        	if (strcmp($slug, $v['parent']) == 0) echo_menu_item($v);
          else if (!empty($v['children']) && (strcmp($slug, $v['url']) == 0) ) {
            foreach ($v['children'] as $j => $k) {
              echo_menu_item($k);
            }
          }
        }
        echo '</ul></div>';
			}
	}
}