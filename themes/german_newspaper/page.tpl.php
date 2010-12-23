<?php
// $Id: page.tpl.php,v 1.17 2009/08/10 12:30:06 christiangnoth Exp $

//
//  get theme options
//
$gn_background          		= theme_get_setting('gn_background');
$gn_background_color    		= theme_get_setting('gn_background_color');
$gn_background_img      		= theme_get_setting('gn_background_img');
$gn_background_img_options	= theme_get_setting('gn_background_img_options');
$gn_background_img_url  		= theme_get_setting('gn_background_img_url');

$output = '';

$output =
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">' . "\n" .
'<html xmlns="http://www.w3.org/1999/xhtml" lang="' . $language->language . '" xml:lang="' . $language->language . '" dir="' . $language->dir . '">' . "\n\n" .
'<head>' . "\n" .
'   <title>' . $head_title . '</title>' . "\n" .
'   <meta http-equiv="Content-Style-Type" content="text/css" />' . "\n";

echo $output;
$output = '';

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

echo '<script type="text/javascript"></script>' . "\n";
echo '</head>' . "\n\n";
echo '<body>' . "\n";
echo '<div id="container" style="background:' . $gn_background_color . ';">' . "\n";

$output =
'   <div id="header_top_left">' . $header_top_left . '</div>' . "\n" .
' 	<div id="header_top_right">' . $header_top_right . '</div>' . "\n" .
'  	<div class="clear-both"></div>' . "\n" .
'		<div id="logo-title">' . "\n";
echo $output;
$output = '';

echo '      <div id="name-and-slogan">' . "\n";

	$output =
'      </div> <!-- /name-and-slogan -->' . "\n" .
'   </div> <!-- /logo-title -->' . "\n" .

' 	<div id="header" style="background: transparent url(' . $logo . ') no-repeat 25px 10px; height: auto;">' . "\n" .
'      <div id="title">' . "\n";
echo $output;
$output = '';

if ($site_name)
{
	 $output =
   '<h1><a href="' . $base_path . '" title="' . t('Home') . '">' . $site_name . '</a></h1>' . "\n";
	 echo $output;
	 $output = '';
}

if ($site_slogan)
{
	 $output =
   '<div id="site-slogan">' . $site_slogan . '</div>' . "\n";
	 echo $output;
	 $output = '';
}

$output =
'      </div>' . "\n" .
'      <div id="title-spacer"></div>' . "\n" .
'   </div> <!-- /header -->' . "\n" .
'  	<div class="clear-both"></div>' . "\n\n";
echo $output;
$output = '';



//
//
//  start horizontal navigation bar - drop down menu
//
$output =
'	  <div id="page_bar_container">' . "\n" .
'	     <div class="page_bar">' . "\n" .
'			    <div id="nav">' . "\n";
echo $output;
$output = '';

if (isset($primary_links))
{
		print menu_tree_output(menu_tree_page_data($menu_name = 'primary-links'));
		/* change made for drop down menu
		print theme('links', $primary_links, array('class' =>'links', 'id' => 'navlist'));
		*/
}

$output =
'	     </div>' . "\n" .
'	   </div>' . "\n" .
'	 </div>' . "\n\n" .
'  <div class="clear-both"></div>' . "\n\n";
echo $output;
$output = '';


if ( $gn_background_img )
{
  echo  '<div id="background_img" style="background: ' . $gn_background_color . ' url(' . $gn_background_img_url . ') ' . $gn_background_img_options . ';">' . "\n";
}

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
echo '  		<div id="main">' . "\n";
echo '	    	<div id="content">' . "\n";

print $header;
if ($mission)
{
	echo '<div id="mission">' . $mission . '</div>' . "\n";
}
echo '<div class="tabs">' . $tabs . '</div>' . "\n";
if ($title)
{
	echo '<h1 class="title">' . $title . '</h1>' . "\n";
}
print $help;
if ($show_messages && $messages)
{
	print $messages;
}
print $content;
print $breadcrumb;


echo '	    	</div>' . "\n";
echo '			</div>' . "\n";
echo '	</div>' . "\n";

if ($right)
{
	echo '    		<div id="sidebar-right">' . "\n";
	print $search_box;
	print $right;
	echo '    	   </div>' . "\n";
}

echo ' 	<div class="clear-both"></div>' . "\n\n";

//
//
//  start bottom bar
//
if ( $gn_bottom_bar )
{
	echo '  <div id="bottom_bar">';
	print $bottom_bar;
	echo '  </div>';
}

if ( $gn_background_img )
{
  echo  '  </div>    <!-- /background_img --> ' . "\n";
}

echo ' 	<div class="clear-both"></div>' . "\n\n";



//
//
//  start footer
//
echo '	<div id="footer">' . "\n";
print $footer_message . $footer . "\n";
echo '     <p><a href="http://it-gnoth.de/projekte/drupal/themes/" target="_blank">Drupal theme</a> designed by Christian Gnoth.</p>' . "\n";
echo '  </div>' . "\n\n";
echo '</div>' . "\n";
print $closure . "\n";
echo '</body>' . "\n";
echo '</html>' . "\n";

?>