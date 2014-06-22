<?php
// $Id: node-nodeblock-default.tpl.php,v 1.1 2009/04/01 03:12:10 rz Exp $

/**
 * @file node-nodeblock-default.tpl.php
 *
 * Theme implementation to display a nodeblock enabled block. This template is
 * provided as a default implementation that will be called if no other node
 * template is provided. Any node-[type] templates defined by the theme will
 * take priority over this template. Also, a theme can override this template
 * file to provide its own default nodeblock theme.
 *
 * Additional variables:
 * - $nodeblock: Flag for the nodeblock context.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php print $picture ?>

<?php if (!$page && !$nodeblock): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

 <div class="meta" style="border:none; padding:0px;"> 
  <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?> 

  <?php if ($terms): ?>
    <div class="terms terms-inline"><?php print $terms ?></div>
  <?php endif;?>
  </div>

  <div class="content">
    <div style="float:left; padding-right:15px;"><?php print $node->field_blockimage[0]['view'] ?></div>
   <div style="margin-bottom:10px">
    <?php print $node->field_blocktext[0]['view']; ?>
    </div>
	
	<?php 
	if(isset($GLOBALS['user']->roles[3]) || isset($GLOBALS['user']->roles[4])) {
		print '<div style="margin-top:-20px;text-align:right"><a style="color:#ccc" href="node/'.$nid.'/edit?'.drupal_get_destination().'" >edit</a></div>';
	}
	?>
	
    <a class="button white small" href="<?php print $node->field_learnmore[0]['view'] ?>"><span>Learn More</span></a>
  </div>

  <?php print $links; ?>
</div>