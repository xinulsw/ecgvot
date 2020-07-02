<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File:    header.php
* @Package:   wDesign
* @Action:    Ecg theme for the GetSimple 3.x by wDesign
*
*****************************************************/
?>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php get_page_clean_title(); ?> - <?php get_site_name(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <!-- jQuery full minified version -->
        <script src="<?php get_theme_url(); ?>/vendor/jquery-3.5.1.min.js"></script>
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