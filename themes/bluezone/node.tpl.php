<?php // $Id: node.tpl.php,v 1.2.2.3 2010/07/05 10:29:49 finex Exp $ ?>
<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
  <?php if ($picture) {
    print $picture;
  }?>
  <h2 class="title"><a href="<?php print $node_url?>"><?php print $title?></a></h2>
  <?php if ($submitted) { ?>
    <span class="submitted"><?php print $submitted?></span>
  <?php } ?>
  <div class="content"><?php print $content?></div>
  <?php if ($terms) { ?>
    <span class="taxonomy">Archived in <?php print $terms?></span>
  <?php } ?>
  <?php if ($links) { ?><div class="links">&raquo; <?php print $links?></div><?php }; ?>
</div>