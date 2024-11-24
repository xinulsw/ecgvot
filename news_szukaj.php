<?php
$miesiace = $GLOBALS['miesiace'];
$data = return_special_field_date('pubDate', '%d-%m-%Y', 'false');
$day = substr($data, 0, 2);
$month = $miesiace[substr($data, 3, 2)][0];
$year = substr($data, 6, 4);
?>
<div class="col-xl-6 post-row">
  <div class="left-meta-post" id="<?php get_special_field('url','','false'); ?>">
    <div class="post-date">

        <span class="day"><?php echo $day; ?></span><span class="month"><?php echo $month; ?></span>
    </div>
  </div>
  <h2 class="post-title">
    <a href="<?php get_special_field('link','',false); ?>"><?php get_special_field('title','',false); ?></a>
  </h2>
  <div class="post-content">
    <p>
        <?php get_special_field_excerpt('content', $numWords); ?>
        <a class="read-more" href="<?php get_special_field('link','',false); ?>">Czytaj dalej... </a>
    </p>
  </div>
</div>