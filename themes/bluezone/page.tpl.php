<?php // $Id: page.tpl.php,v 1.1.4.3 2010/07/05 10:29:49 finex Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>">
<head>
  <title><?php print $head_title ?></title>
  <meta name="AUTHOR" content="http://www.finex.org" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="KEYWORDS" content="KEYWORDS" />
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>
<body>
<div id="secondary"> <!--START SECONDARY LINKS-->
  <?php if (isset($secondary_links)) { ?>
    <div class="column">
      <?php print theme('links', $secondary_links) ?>
    </div>
  <?php } ?>
</div> <!--END SECONDARY LINKS-->

<div id="header"> <!--START HEADER-->
  <div class="column">
    <div id="logo">
      <?php if ($logo) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
    </div>

    <div id="site_name">
      <?php if ($site_name) { ?><h1 ><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?><?php } ?></a></h1>
      <?php if ($site_slogan) { ?><p id="slogan"><?php print $site_slogan ?></p><?php } ?>
    </div>

  </div>
</div> <!--END HEADER-->

<div id="primary"> <!--START PRIMARY LINKS-->
  <?php if (isset($primary_links)) { ?>
    <div class="column">
      <?php print theme('links', $primary_links) ?>
    </div>
  <?php } ?>
</div> <!--END PRIMARY LINKS-->

<?php if ($breadcrumb) { ?>
  <div id="breadcrumb">
    <div class="column">
      <?php print $breadcrumb ?>
    </div>
  </div>
<?php } ?>

<div id="page"> <!--START PAGE-->

  <div class="column"> <!--START COLUMN (page)-->

    <div class="wrapper"></div>

    <div id="sidebar">
      <?php if ($sidebar) { ?>
        <?php print $sidebar ?>
      <?php } ?>
    </div>

    <div id="main">

      <?php print $help ?>
      <?php print $messages ?>

      <?php if ($title) { ?>
        <h1 class="title"><?php print $title ?></h1>
      <?php } ?>

      <?php if ($tabs) { ?>
        <div class="tabs">
          <?php print $tabs ?>
        </div>
      <?php } ?>

      <?php print $content; ?>

    </div>

    <div class="wrapper"></div>

  </div> <!--END COLUMN (page)-->

</div> <!--END PAGE-->

<div class="wrapper"></div>

<div id="footer"> <!--START FOOTER-->

  <div class="column"> <!--START COLUMN (footer)-->

    <?php print $footer_message ?>

    <?php print $feed_icons ?>

    <div id="author" > <!-- PLEASE DON'T REMOVE THIS SECTION -->
      BlueZone template by <a href="http://www.finex.org">FiNe<strong>X</strong><em>design</em></a> &amp; <a href="http://www.themes-drupal.org">Themes Drupal.org</a>
    </div>

  </div> <!--END COLUMN (footer)-->

</div> <!--END FOOTER-->

<?php print $closure ?>

</body>
</html>