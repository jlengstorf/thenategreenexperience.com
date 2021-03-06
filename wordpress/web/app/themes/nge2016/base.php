<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class('no-js'); ?>>
<!--[if IE]>
  <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
  </div>
<![endif]-->
<div class="site">
<?php
  do_action('get_header');
  get_template_part('templates/header');
?>
<main class="site__content">
  <?php include Wrapper\template_path(); ?>
</main>
<?php
  do_action('get_footer');
  get_template_part('templates/footer');
  wp_footer();
?>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-80152209-1', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>
