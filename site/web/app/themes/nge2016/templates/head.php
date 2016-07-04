<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <?php wp_head(); ?>
  <?php if (is_admin_bar_showing()): ?>
  <style>#wpadminbar{margin-top:0;}.site__header{top:46px}@media screen and (min-width: 783px){.site__header{top:32px}}</style>
  <?php endif; ?>
</head>
