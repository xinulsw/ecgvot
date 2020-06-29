<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File:    sidebar.php
* @Package:   wDesign
* @Action:    Ecg theme for the GetSimple 3.x by wDesign
*
*****************************************************/
?>
      <div class="alert alert-primary"><?php $akt=getParent(); ?></div>
      <div>
        <?php
        if ($akt) show_lastUpdate();
        else {
          $podmenu = return_i18n_menu_data(return_page_slug(), 1, 4, $show=I18N_SHOW_MENU);
          //print_r(menu_data(return_page_slug()));
          $slug = return_page_slug();
          if (!empty($podmenu)) {
            echo '<ul>';
            foreach ($podmenu as $k => $v) {
//print_r($v);
              if (strcmp($slug, $v['parent']) == 0) echo_menu_item($v);
              else if (!empty($v['children']) && (strcmp($slug, $v['url']) == 0) ) {
                foreach ($v[children] as $j => $k) {
                  echo_menu_item($k);
                }
              }
            }
            echo '</ul>';
          }
          // print_r($podmenu);
          // get_i18n_navigation(return_page_slug(),1,2);
        }
        ?>
      </div>
      <div class="alert alert-primary">Na skróty</div>
      <div><?php get_component('sidebar');  ?></div>
      <div class="alert alert-primary">Kontakt</div>
      <div>
        <ul>
          <li><a href="javascript:void(location.href='mailto:'+String.fromCharCode(101,99,103,64,99,101,110,116,114,117,109,46,118,111,116,46,112,108))">eCG</a></li>
        </ul>
      </div>