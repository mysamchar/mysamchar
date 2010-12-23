<?php // $Id: block.tpl.php,v 1.1.10.3 2010/07/05 10:29:49 finex Exp $ ?>
<div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
    <h2 class="title"><?php print $block->subject; ?></h2>
    <div class="content"><?php print $block->content; ?></div>
</div>