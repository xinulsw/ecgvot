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

function get_menu_level($pdata, $level) {
	if (!empty($pdata['parent_slug'])) {
		return get_menu_level(menu_data($pdata['parent_slug']), $level + 1);
	}
	return $level;
}

function show_lastUpdate($ile) {
	//define('LUPDATE_FILE', GSDATAOTHERPATH.'lastupdate.xml');
	if (!file_exists(LUPDATE_FILE)) {
		echo '<p>Brak listy zmian!</p>';
		return;
	}
	$xmldata = getXML(LUPDATE_FILE);
	//$ile = count($xmldata->children());
	//echo 'Wpisów: '.count($xmldata->children());
	echo '<ul>';
	foreach ($xmldata as $page) {
		$tb[]=array((string)$page->lastUpdate,(string)$page->url,(string)$page->title);
	}
	//print_r($tb);echo '<hr />';
	arsort($tb);//posortuj rosnąco
	//print_r($tb);
	foreach ($tb as $l => $t) {
		echo '<li><a href="';
		get_site_url();
		echo '?id='.$t[1].'">'.$t[2].'</a>&nbsp;['.$t[0].']</li>';
		if (--$ile == 0) break;
	}
	echo '</ul>';
}

function getParent() {
	$ile_lastUpdate = 3;

	$slug = return_page_slug();
	if ($slug == '404') {
		echo '<a href=".">Strona główna</a>';
		return false;
	}

	$stronaGlowna = false;
	$pdata=menu_data($slug);
	$parent = $pdata['parent_slug'];
	$level = get_menu_level($pdata, 0);
	// echo "Poziom: ".$level;
	$ppdata = '';

	if (strcmp($slug, 'index') == 0) { // strona główna
		echo '<div class="alert alert-primary"><p class="fw-bold">Materiały</p>
		<ul>
			<li><a href="https://lo1.sandomierz.pl/ecg/edytor-tekstu">Edytor tekstu »»»</a></li>
			<li><a href="https://lo1.sandomierz.pl/ecg/arkusz-kalkulacyjny">Arkusz kalkulacyjny »»»</a></li>
			<li><a href="https://lo1.sandomierz.pl/ecg/bazy-danych">Baza danych »»»</a></li>
			<li><a href="https://lo1.sandomierz.pl/ecg/grafika-rastrowa">Grafika rastrowa »»»</a></li>
			<li><a href="https://lo1.sandomierz.pl/ecg/grafika-wektorowa">Grafika wektorowa »»»</a></li>
			<li><a href="https://lo1.sandomierz.pl/ecg/grafika-3D">Grafika 3D »»»</a></li>
		</ul></div>';
		echo '<div class="alert alert-primary font-weight-bold">Ostatnio zaktualizowane</div>';
		echo '<div>'.show_lastUpdate($ile_lastUpdate).'</div>';
	} else if (!empty($parent)) { // podstrona strony poziomu głównego
		// echo 'Parent: '.$parent;
		$ppdata=menu_data($parent); // dane rodzica
		// print_r($ppdata);
		echo '<div class="alert alert-primary fw-bold">'.$ppdata['menu_text'].'</div>';

		//$parent='<a href="'.$pdata['parent_slug'].'">'.$ppdata['menu_text'].'</a>';

		// else $parent=$pdata['menu_text'];
		$podmenu = return_i18n_menu_data($slug, 1, 1, $show=I18N_FILTER_MENU | I18N_FILTER_CURRENT | I18N_OUTPUT_MENU);
        //print_r(menu_data(return_page_slug()));
        if (!empty($podmenu)) {
        	echo '<div><ul>';
        	foreach ($podmenu as $k => $v) {
        		echo_menu_item($v);
        	}
        	echo '</ul></div>';
		}
	}
}

$miesiace = array(
	'01' => array('sty', 'styczeń', 'stycznia'),
	'02' => array('lut', 'luty', 'lutego'),
	'03' => array('mar', 'marzec', 'marca'),
	'04' => array('kwi', 'kwiecień', 'kwietnia'),
	'05' => array('maj', 'maj', 'maja'),
	'06' => array('cze', 'czerwiec', 'czerwca'),
	'07' => array('lip', 'lipiec', 'lipca'),
	'08' => array('sie', 'sierpień', 'sierpnia'),
	'09' => array('wrz', 'wrzesień', 'września'),
	'10' => array('paź', 'październik', 'paźdiernika'),
	'11' => array('lis', 'listopad', 'listopada'),
	'12' => array('gru', 'grudzień', 'grudnia')
);
