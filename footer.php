<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File:    footer.php
* @Package:   wDesign
* @Action:    Ecg theme for the GetSimple 3.x by wDesign
*
*****************************************************/
?>

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
