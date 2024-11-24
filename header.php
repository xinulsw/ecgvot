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
        <title><?php get_site_name(); ?> – Materiały edukacyjne z informatyki – <?php get_page_clean_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link rel="apple-touch-icon" href="favicon.png">
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

    <nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="<?php get_site_url();?>"><?php get_site_name(); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
        <?php get_i18n_navigation(return_page_slug(), 0, 0, I18N_SHOW_MENU, $component='bs_menu'); ?>
      </ul>
      <form class="d-flex" action="<?php get_site_url();?>search-all" method="GET">
        <input class="form-control me-2" type="search" placeholder="Szukane słowa" aria-label="Szukaj">
        <button class="btn btn-outline-success search-submit" type="submit">Szukaj</button>
      </form>
    </div>
    </nav> 

    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <nav class="breadcrumb p-2 breadcrumbs-tlo">
        <a class="breadcrumb-item" href="<?php get_site_url();?>">eCG</a>
        <!-- <a href="<?php echo find_url('index',null); ?>">Strona główna</a> -->
        <?php
          $menu2 = return_i18n_breadcrumbs(return_page_slug());
          if (count($menu2) > 0) {
            for ($i = 0; $i < count($menu2) - 1; $i++)
              echo '<a href="'.$menu2[$i]['url'].'" class="breadcrumb-item">'.$menu2[$i]['title'].'</a>';
            echo '<span class="breadcrumb-item active">'.$menu2[$i]['title'].'</span>';
          }
        ?>
      </nav>
    </div>
  </div>

    </header>