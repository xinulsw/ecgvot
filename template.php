<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File:    template.php
* @Package:   wDesign
* @Action:    Ecg theme for the GetSimple 3.x by wDesign
*
*****************************************************/
?><!doctype html>
<?php require_once('header.php'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">

    <div class="blog-header">
        <h1><?php get_page_title(); ?></h1>
        <p class="lead">Materiały edukacyjne z informatyki</p>
    </div>

    <?php get_page_content(); ?>

    </div>

    <div class="col-md-3 offset-md-1">
      <?php require_once('sidebar.php'); ?>
    </div>
  </div>
</div>

<?php require_once('footer.php'); ?>
