<?php
// $Id: node.tpl.php,v 1.1 2009/06/07 12:01:38 christiangnoth Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

<?php if ($submitted || $terms): ?>
  <div class="meta">
  <?php if ($submitted): ?>
    <div class="submitted"><?php print $submitted ?></div>
  <?php
			endif;
		  if ($links)
			{
    		print '<div class="node-links">'. $links .'</div>';
	  	}
  ?>
  </div>
<?php endif; ?>

  <div class="content clear-block">
    <?php print $picture ?>
    <?php print $content ?>
  </div>

<?php
  if ($terms) {
    print '<div class="terms">'.t('Tags').': '. $terms .'</div>';
  }
?>

</div>