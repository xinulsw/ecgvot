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
        <h1 class="blog-title"><?php get_page_title(); ?></h1>
        <p class="lead blog-description">Czego dowiesz się sam, tego się nauczysz!</p>
    </div>

    <?php
      $main_url = get_site_url(false);
      $words = null;
      $max = 10;
      $page = 0;
      $first = 0;
      if (isset($_GET['words'])) $words=trim($_GET['words']);
      if (isset($_GET['page'])) $page=trim($_GET['page']);
      $first += ($page * $max);
      $res = return_i18n_search_results(
        $tags=null, $words, $first, $max, $order=null, $lang='pl');
      $all = $res['totalCount'];
      if ($res) {
        foreach ($res['results'] as $entry) {
          echo '<div class="nm_post list-group clearfix mb-3">';
          echo '<h3 class="nm_post_title"><a href="'.$main_url.'/'.$entry->url.'">'.$entry->title.'</a></h3>';
          echo '<p class="nm_post_date">Opublikowano '.date('d.m.Y', $entry->pubDate).'</p>';
          echo '<div class="nm_post_content list-group-item"><p>'.$entry->getExcerpt($entry->content, '20').'</p></div>';
          echo '</div>';
          echo '<ul class="list-group">';
        }

        echo '<nav class="blog-pagination">';
        if ($first > 0) {
          echo '<a class="btn btn-outline-primary" href="'.$main_url.get_page_slug(false).'?words='.$words.'&page='.($page-1).'">«« '.($page).'</a>';
        }
          echo '<a class="btn btn-outline-primary disabled" href="#">&nbsp;'.($page+1).'&nbsp;</a>';

        if ($all - $first - $max > 0) {
          echo '<a class="btn btn-outline-primary" href="'.$main_url.get_page_slug(false).'?words='.$words.'&page='.($page+1).'">'.($page+2).' »»</a>';
        }
        echo '</nav>';
      }
    ?>

    </div>

    <div class="col-md-3 offset-md-1">
      <?php require_once('sidebar.php'); ?>
    </div>
  </div>
</div>

<?php require_once('footer.php'); ?>