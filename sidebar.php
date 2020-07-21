<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File:    sidebar.php
* @Package:   wDesign
* @Action:    Ecg theme for the GetSimple 3.x by wDesign
*
*****************************************************/
?>
      <?php getParent(); ?>
      <div class="alert alert-primary">Na skróty</div>
      <div><?php get_component('sidebar');  ?></div>
      <div class="alert alert-primary">Kontakt</div>
      <div>
        <ul>
          <li><a href="javascript:void(location.href='mailto:'+String.fromCharCode(101,99,103,64,99,101,110,116,114,117,109,46,118,111,116,46,112,108))">eCG</a></li>
        </ul>
      </div>