<?php // $Id: comment.tpl.php,v 1.2.2.3 2010/07/05 10:29:49 finex Exp $ ?>
<div class="comment<?php if ($comment->status == COMMENT_NOT_PUBLISHED) print ' comment-unpublished'; ?>">
  <?php if ($picture) {
  print $picture;
} ?>
<h3 class="title"><?php print $title; ?></h3><?php if ($new != '') { ?><span class="new"><?php print $new; ?></span><?php } ?>
  <div class="submitted"><?php print $submitted; ?></div>
  <div class="content"><?php print $content; ?></div>
  <div class="links">&raquo; <?php print $links; ?></div>
</div>