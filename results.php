<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File:    template.php
* @Package:   wDesign
* @Action:    Ecg theme for the GetSimple 3.x by wDesign
*
*****************************************************/
?><!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php get_page_clean_title(); ?> - <?php get_site_name(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- Bootstrap 4.5 CSS -->
        <link rel="stylesheet" href="<?php get_theme_url(); ?>/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php get_theme_url(); ?>/css/ecg.css">
        <?php get_i18n_header(); ?>
    </head>
    <body id="<?php get_page_slug();?>">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

 <header>
  <div class="container-fluid nawigacja-tlo">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <nav class="navbar navbar-expand-md navbar-dark nawigacja">
            <a class="navbar-brand" href="<?php get_site_url();?>"><?php get_site_name(); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
              <ul class="navbar-nav">
                <?php get_i18n_navigation(return_page_slug(), 0, 0, I18N_SHOW_MENU, $component='bs_menu'); ?>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-md-5">
        <form class="form-inline nawigacja my-auto justify-content-end" action="http://ecg.vot.pl/search-all" method="GET">
          <input type="text" name="words" class="form-control mr-sm-2 search-words" value="" placeholder="Szukane słowa" aria-label="Szukaj">
          <input type="submit" name="search" class="btn btn-outline-success my-2 my-sm-0 search-submit" value="Szukaj" />
          <script type="text/javascript" src="http://ecg.vot.pl/plugins/i18n_search/js/jquery.autocomplete.min.js"></script>
          <script type="text/javascript">
            $(function () {
              var $live = $('ul.search-results.search-live');
              // add css file
              $('head').append('<link rel="stylesheet" type="text/css" href="http://ecg.vot.pl/plugins/i18n_search/css/jquery.autocomplete.css"></link>');
              $('form.search input[name=words]').autocomplete(
                "http:\/\/ecg.vot.pl\/plugins\/i18n_search\/ajax\/suggest.php?langs=,pl", {
                minChars: 1,
                max: 50,
                scroll: true,
                multiple: true,
                multipleSeparator: ' '
              });
            });
          </script>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="<?php get_site_url();?>">eCG</a>
        <!-- <a href="<?php echo find_url('index',null); ?>">Strona główna</a> -->
        <?php
          $menu2 = return_i18n_breadcrumbs(return_page_slug());
          for ($i = 0; $i < count($menu2) - 1; $i++)
            echo '<a href="'.$menu2[$i]['url'].'" class="breadcrumb-item">'.$menu2[$i]['title'].'</a>';
          echo '<span class="breadcrumb-item active">'.$menu2[$i]['title'].'</span>';
        ?>
      </nav>
    </div>
  </div>

    </header>

<div class="container">
  <div class="row">
    <div class="col-md-8">

    <div class="blog-header">
        <h1 class="blog-title"><?php get_page_title(); ?></h1>
        <p class="lead blog-description">Czego dowiesz się sam, tego się nauczysz!</p>
    </div>

    <?php
      print_r($_GET);
      $words=null;
      $page=1;
      if (isset($_GET['words'])) $words=trim($_GET['words']);
      if (isset($_GET['page'])) $page=trim($_GET['page']);
      $res = return_i18n_search_results($tags=null, $words, $first=0, $max=10, $order=null, $lang=null);
      if ($res) echo '<ul>';
      foreach ($res['results'] as $entry) {
        echo '<li>'.$entry->title.'</li>';
      }
      if ($res) echo '</ul>';
    ?>

    </div>

    <div class="col-md-3 offset-md-1">
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
    </div>
  </div>
</div>

<footer>
  <?php get_footer(); ?>
  <div class="container">
    <div class="row alert alert-dark mt-3">
      <div class="col-6">
        <?php echo date('Y'); ?> &copy; by eCG
        &nbsp;~&nbsp;<?php echo get_execution_time(); ?>
      </div>
      <div class="col-6">
        <div class="float-right">&copy; Theme by wDesign 2020</div>
      </div>
    </div>
  </div>
</footer>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery first, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="<?php get_theme_url();?>/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  </body>
</html>
