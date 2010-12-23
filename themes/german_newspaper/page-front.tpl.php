<?php
// $Id: page-front.tpl.php,v 1.11 2010/04/11 16:56:06 christiangnoth Exp $

//
//	get theme options
//
$gn_newslist            		= theme_get_setting('gn_newslist');
$gn_bottom_bar           		= theme_get_setting('gn_bottom_bar');
$gn_background          		= theme_get_setting('gn_background');
$gn_background_color    		= theme_get_setting('gn_background_color');
$gn_background_img      		= theme_get_setting('gn_background_img');
$gn_background_img_options	= theme_get_setting('gn_background_img_options');
$gn_background_img_url  		= theme_get_setting('gn_background_img_url');


$output = '';

$output =
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n" .
'<html xmlns="http://www.w3.org/1999/xhtml" lang="' . $language->language . '" xml:lang="' . $language->language . '" dir="' . $language->dir . '">' . "\n\n" .
'<head>' . "\n" .
'   <title>' . $head_title . '</title>' . "\n" .
'   <meta http-equiv="Content-Style-Type" content="text/css" />' . "\n";

echo $output;
$output = '';

print $head;

// All IE stylesheet
echo	'<!--[if lte IE 8]>' . "\n";
echo	'<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/css/ie-style-1024.css" />' . "\n";
echo	'<![endif]-->' . "\n";
// IE7 only stylesheet
echo	'<!--[if IE 7]>' . "\n" . '<![endif]-->' . "\n";
// IE6 only stylesheet
echo	'<!--[if IE 6]>' . "\n" . '<![endif]-->' . "\n";

print $styles;
print $scripts;

echo  '<script type="text/javascript"></script>' . "\n";
echo  '</head>' . "\n\n";
echo  '<body>' . "\n";
echo  '<div id="container" style="background:' . $gn_background_color . ';">' . "\n";

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
//  start header newslist
//
if ( $gn_newslist )
{
  //  get content from tb with SQL Query
  $sql_string =	"SELECT n.nid AS nid,n.created AS node_created,n.title AS node_title,n.type AS node_type " .
							"FROM {node} n " .
							"WHERE n.status = 1 " .
							"ORDER BY node_created DESC";
  $result_query	= db_query(db_rewrite_sql($sql_string, 'n', 'nid'));


  //  print newslist
  $output_line = '';
  $output_line =
  '    <div id="newslist">' . "\n" .
  '      <div class="description">Headlines</div>' . "\n" .
  '      <table id="news_table" cellspacing="0">' . "\n" .
  '        <colgroup>' . "\n" .
  '          <col width="170px" />' . "\n" .
  '          <col width="145px" />' . "\n" .
  '          <col width="145px" />' . "\n" .
  '          <col width="145px" />' . "\n" .
  '          <col width="145px" />' . "\n" .
  '          <col width="170px" />' . "\n" .
  '        </colgroup>' . "\n" .
  '        <tr>' . "\n";
  echo $output_line;
  /*'       <div class="news">' . "\n" .*/
  $output_line =
  '          <td>' . "\n" .
  '            <div class="left_image">' . "\n" .
  '              <img src="themes/german_newspaper/news-images/left/rotate.php" alt="' . $site_name . '" />' . "\n" .
  '            </div>' . "\n\n" .
  '          </td>' . "\n";

  echo $output_line;
  $output_line 	= '';
  $counter_head = 0;
  $head 				= 4;

  while ( ($node_recent = db_fetch_object($result_query)) && ($counter_head < $head) )
  {
    $node_recent	= node_load($node_recent->nid);
    $written  		= date("D, d.m.Y",$node_recent->created);
    $account			= user_load(array('name' => $node_recent->name));
  //  $links	   	= $node_recent->links;
  //  $content   	= $node_recent->body;

    $output_line =
  '          <td class="news_table_col">' . "\n" .
  '            <div class="header_news_col clearfix">' . "\n" .
  '              <div class="header_news_meta">' . "\n" .
  '                ' . t($node_recent->type) . '<br />' . "\n" .
  '                ' . t('from') . ': ' . $account->name . "\n" .
  '                <br />' . "\n" .
  '                ' . t('on') . ': ' . t($written) . "\n" .
  '                <br />' . "\n" .
  '              </div>' . "\n" .
  '              <div class="header_news_title post">' . "\n" .
  '                <h2><a href="' . check_url(url('node/' . $node_recent->nid)) . '" title="' . $node_recent->title . '">' . $node_recent->title . '</a></h2>' . "\n" .
  '              </div>' . "\n" .
  '              <div class="header_news_commments clearfix">' . "\n" .
  '                 ' . t('Comments') . ': ' . $node_recent->comment_count . "\n" .
  '              </div>' . "\n" .
  '            </div>' . "\n" .
  '          </td>' . "\n\n";

/*
old version saved

    $output_line =
  '          <td id="news_table_col">' . "\n" .
  '            <div class="post" id="post-' . $node_recent->nid . '">' . "\n" . t($node_recent->type) . "\n" .
  '              <p>' . t('from') . ': ' . $account->name . "\n" .
  '                 <br />' . "\n" .
  '                 ' . t('on') . ': ' . t($written) . "\n" .
  '                 <br />' . "\n" .
  '              </p>' . "\n" .
  '              <br />' . "\n" .
  '              <a href="' . check_url(url('node/' . $node_recent->nid)) . '" title="' . $node_recent->title . '"><h2>' . $node_recent->title . '</h2></a>' . "\n" .
  '              <p>' . "\n" .
  '                 ' . t('Comments') . ': ' . $node_recent->comment_count . "\n" .
  '              </p>' . "\n" .
  '            </div>' . "\n" .
  '          </td>' . "\n\n";

*/



  /*'              <p><a href="' . apply_filters('the_permalink', get_permalink()) . '" rel="bookmark" title="Permalink: ' . the_title('', '', false) . '"><em>' . __('More on page ', 'german_newspaper') . $post->ID . '</em></a></p>' . "\n" .*/

    echo $output_line;
    $output_line = '';
    $counter_head++;
  }

  if ( $counter_head < $head )
  {
    //  build empty table columns
    for ( $i = $counter_head; $i < $head; $i++ )
    {
		  $output_line .=
  '          <td id="news_table_col">' . "\n" .
  '					   <div class="post" id="post-">' . "\n" .
  '					     <br /><br />' . "\n" .
  '					   </div>' . "\n" .
  '					 </td>' . "\n\n";

		  $counter_head++;
    }
    echo $output_line;
    $output_line = '';
  }


  //  clear variables
  db_set_active('default');
  $core = array('cache', 'cache_block', 'cache_filter', 'cache_page');
  $cache_tables = array_merge(module_invoke_all('flush_caches'), $core);
  $cache_flush = variable_get('cache_flush', 0);
  foreach ($cache_tables as $table)
  {
    if ($cache_flush && !variable_get('cache_flush', 0) && variable_get('cache_lifetime', 0))
    {
      variable_set('cache_flush', $cache_flush);
    }
    cache_clear_all(NULL, $table);
  }
  cache_clear_all('*', 'cache', true);
  cache_clear_all();

  $output_line .=
  '          <td>' . "\n" .
  '					   <div class="right_image">' . "\n";
  echo $output_line;

  $output_line = '				       <img src="/themes/german_newspaper/news-images/right/rotate.php" alt="' . $site_name .'" />' . "\n";
  echo $output_line;

  $output_line =
  '					   </div>' . "\n" .
  '          </td>' . "\n" .
  '        </tr>' . "\n" .
  '      </table>' . "\n" .
  /*'				</div>' . "\n" .*/
  '    </div>' . "\n\n";

  echo $output_line;
  $output_line = '';

  echo  '    <div class="clear"></div>' . "\n\n";
}


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
echo '     <p>' . "\n";
echo '        <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank" title="valides CSS Design"><img src="http://files.it-gnoth.de/images/links/css_ok.png" title="CSS valides Design" alt="CSS Valid" /></a> | ';
echo '<a href="http://it-gnoth.de/projekte/drupal/themes/" target="_blank" title="Drupal Theme Design">Drupal theme</a> designed by Christian Gnoth | ';
echo '<a href="http://validator.w3.org/check/referer" target="_blank" title="valides XHTML Design"><img src="http://files.it-gnoth.de/images/links/xhtml_ok.png" title="XHTML valides Design" alt="XHTML Valid" /></a>' . "\n";
echo '     </p>' . "\n";
echo '  </div>' . "\n\n";
echo '</div>' . "\n";
print $closure . "\n";
echo '</body>' . "\n";
echo '</html>' . "\n";

?>