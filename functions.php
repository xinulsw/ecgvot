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
function getParent() {
	$stronaGlowna = false;
	$slug = return_page_slug();
	if ($slug == '404') {
		echo '<a href=".">Strona główna</a>';
		return false;
	}
	if (strcmp($slug, 'index') == 0) {
		$parent='<a href="'.$pdata['slug'].'">Zmiany</a>';
		$stronaGlowna = true;
	} else {
		$pdata=menu_data($slug);
		//print_r($pdata);
		if (empty($pdata['parent_slug'])) {
			$parent='<a href="'.$pdata['slug'].'">'.$pdata['menu_text'].'</a>';
		} else if (isset($pdata['parent_slug'])){
			$ppdata=menu_data($pdata['parent_slug']);
			$parent='<a href="'.$pdata['parent_slug'].'">'.$ppdata['menu_text'].'</a>';
		} else $parent=$pdata['menu_text'];
	}
	echo $parent;
	return $stronaGlowna;
}

function show_lastUpdate() {
	//define('LUPDATE_FILE', GSDATAOTHERPATH.'lastupdate.xml');
	echo '<ul>';
	if (!file_exists(LUPDATE_FILE)) {
		echo '<li>Brak listy zmian!</li>';
		return;
	}
	$xmldata = getXML(LUPDATE_FILE);
	foreach ($xmldata as $page) {
		$tb[]=array((string)$page->lastUpdate,(string)$page->url,(string)$page->title);
	}
	arsort($tb);//posortuj rosnąco
	$i=0;
	foreach ($tb as $l => $t) {
		if ($i<3) //pokaż tylko 12 ostatnich zmian
			echo '<li><a href="'.get_site_url(false).$t[1].'">'.$t[2].'</a><br />['.$t[0].']</li>';
		else
			break;
		$i++;
	}
	echo '</ul>';
}

function echo_menu_item($v) {
	echo '<li><a href="'.get_site_url(false).$v[url].'">'.$v['menu'].'</a></li>';
}