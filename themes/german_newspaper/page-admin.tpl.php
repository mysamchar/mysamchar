<?php
// $Id: page-admin.tpl.php,v 1.10 2009/08/10 12:30:06 christiangnoth Exp $

//
//	get theme options
//
$gn_newslist            		= theme_get_setting('gn_newslist');
$gn_background          		= theme_get_setting('gn_background');
$gn_background_color    		= theme_get_setting('gn_background_color');
$gn_background_img      		= theme_get_setting('gn_background_img');
$gn_background_img_options	= theme_get_setting('gn_background_img_options');
$gn_background_img_url  		= theme_get_setting('gn_background_img_url');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <title><?php print $head_title ?></title>
  <meta http-equiv="Content-Style-Type" content="text/css" />

<?php
	print $head;
  print $styles;

	// All IE stylesheet
	echo	'<!--[if lt IE 8]>' . "\n";
	echo	'<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/css/ie-style-1024.css" />' . "\n";
	echo	'<![endif]-->' . "\n";
	// IE7 only stylesheet
	echo	'<!--[if IE 7]>' . "\n" . '<![endif]-->' . "\n";
	// IE6 only stylesheet
	echo	'<!--[if IE 6]>' . "\n" . '<![endif]-->' . "\n";

  print $scripts;
?>
</head>
<body>
<?php
echo  '<div id="container" style="background:' . $gn_background_color . ';">' . "\n";
?>
   <div id="header_top_left"><?php print $header_top_left ?></div>
   <div id="header_top_right"><?php print $header_top_right ?></div>
	<div class="clear-both"></div>

<?php echo	' 	<div id="header" style="background: transparent url(' . $logo . ') no-repeat 25px 10px; height: auto;">' . "\n"; ?>
   	<div id="title">
      	<?php if ($site_name) { ?><h1><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
      	<?php if ($site_slogan) { ?><div class='site-slogan'><?php print $site_slogan ?></div><?php } ?>
      <div id="title-spacer"></div>
   	</div>
  	</div>
	<div class="clear-both"></div>

	<div id="page_bar_container">
		<div class="page_bar">
			<div id="nav">
   	  	<?php
				if (isset($primary_links))
				{
					print menu_tree_output(menu_tree_page_data($menu_name = 'primary-links'));
					/* change made for drop down menu
					print theme('links', $primary_links, array('class' =>'links', 'id' => 'navlist'));
					*/
				}
			?>
	   	</div>
		</div>
	</div>
	<div class="clear-both"></div>

<?php
if ( $gn_background_img )
{
  echo  '  <div id="background_img" style="background: ' . $gn_background_color . ' url(' . $gn_background_img_url . ') ' . $gn_background_img_options . ';">' . "\n";
}
?>

<?php

if ($left)
{
	echo '  <div id="sidebar-left">' . "\n";
	print $left;
	echo '  </div>' . "\n";
}

echo '	<div id="page"';
if (!$left AND !$right)
{
	print " class='wide-page'";
}
else
{
	if ( !$left OR !$right )
	{
		print ' class="one-sidebar"';
	}
	else
	{
		print ' class="two-sidebars"';
	}
}
echo '>' . "\n";
?>
		<div id="main">
			<div id="content">
   				<?php print $header ?>
	     		<?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
					<div class="tabs"><?php print $tabs ?></div>
   	 	  	<?php if ($title) { ?><h1 class="title"><?php print $title ?></h1><?php } ?>
      		<?php print $help ?>
		     	<?php if ($show_messages && $messages) { print $messages; } ?>
  		    	<?php print $content ?>
    		  	<?php print $breadcrumb ?>
		   </div>
		</div>
 </div>

		<?php if ($right) { ?>
   		<div id="sidebar-right">
	   		<?php print $search_box ?>
         	<?php print $right ?>
	   	</div>
		<?php } ?>
 	<div class="clear-both"></div>

<?php
if ( $gn_background_img )
{
  echo  '  </div>    <!-- /background_img --> ' . "\n";
}
?>

	<div id="footer">
    	<?php print $footer_message . $footer ?>
    	<p><a href="http://it-gnoth.de/projekte/drupal/themes/" target="_blank">Drupal theme</a> designed by Christian Gnoth.</p>
  	</div>
</div>

	<script type="text/javascript">
	/* <![CDATA[ */
		$(document).ready(function(){
			$("#right-toggle").click( function() {
        $("#right-toggle").hide();
        $("#content").width("953px");
        $("#sidebar-left").css("padding-left","775px");
        $("#right").css("float","none");
        $("#content").css("border-right","1px solid #1A4864");
        $("#content").css("border-left","1px solid #1A4864");
        $("#content").css("border-bottom","1px solid #1A4864");
        $("#content").css("margin","0");
			});
    });
	/* ]]> */
	</script>
	<?php print $closure ?>
</body>
</html>
