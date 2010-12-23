<?php // $Id: template.php,v 1.1.10.3 2010/07/05 10:29:49 finex Exp $

function phptemplate_stylesheet_import($stylesheet, $media = 'all') {
  if (strpos($stylesheet, 'misc/drupal.css') == 0) {
    return theme_stylesheet_import($stylesheet, $media);
  }
}