<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
<title><?php print $head_title ?></title>
<?php print $head ?>
<?php print $styles ?>
<?php print $scripts ?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Content-Language" content="en-us" />
<meta name="robots" content="all" />
<meta name="author" content="<?php print $site_name ?>" />
<meta name="description" content="<?php print $site_name ?> |  <?php print $slogan ?>" />
</head>

<body>
    <div id="header-section" class="clear-block">
        <div class="wrapper clear-block">
            <div id="logo">
            	<h1><a href="<?php print $base_path ?>" title="Homepage"><?php print $site_name ?></a></h1>
            	<?php if($site_slogan) { ?>
            	    <div id="slogan">
            	        <?php print $site_slogan ?>
            	    </div>
            	<?php } ?>
            </div>  <!-- END LOGO -->
            
            <div id="nav">
                <?php if (isset($primary_links)) : ?>
                    <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
                <?php endif; ?>
            </div> <!-- END NAV -->
        </div> <!-- END WRAPPER -->
    </div> <!--END HEADER SECTION-->
	

    <?php if (isset($secondary_links)) : ?>
        <div id="subnav">
        	<div class="wrapper">
                <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
            </div>
        </div>
    <?php endif; ?>


    <div id="content-region" class="wrapper clear-block">
		
        <?php if ($left OR $logo) { ?>
            <div id="left-sidebar">
                <?php if($logo) {print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" class="sitelogo" />'; } ?>
                <?php print $left ?>
            </div> <!--END LEFT SIDEBAR-->
        <?php } ?>
        
        <div id="body-section<?php if(!$left AND !$logo) {print '-wide';} ?>">
            <?php print $tabs ?>
            <?php print $messages ?>
            <?php if($content_top) { ?>
                <div id="content-top"><?php print $content_top ?></div>
            <?php } ?>
            <h1 id="page-title"><?php print $title ?></h1>
            <?php print $help ?>
            <?php print $content ?>
        </div><!--END BODY-SECTION-->
    </div> <!-- END CONTENT-REGION -->
    
    <div id="footer" class="wrapper clear-block">
        <?php if($feed_icons) { ?><div id="feeds"><?php print $feed_icons ?></div><?php } ?>
        <?php print $footer_message . $footer?>    
    </div> <!--END FOOTER-->

<?php print $closure ?>
</body>
</html>