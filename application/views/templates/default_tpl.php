<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $meta_description ?>" />
  <meta name="KEYWORDS" content="<?php echo $meta_keywords ?>" />
  <link rel="stylesheet" href="/assets/css/style.css" type="text/css" />
</head>
<body>
  <div id="wrapper">
    <div id="header">
<?php echo View::factory('blocks/header_tpl')->render(); ?>
    </div>
    <div id="main">
<?php echo $content ?>
    </div>
    <div id="footer">
<?php echo View::factory('blocks/footer_tpl')->render(); ?>
    </div>
  </div>
</body>
</html>

