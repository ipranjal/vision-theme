<?php

/**
 * Layout content
 *
 * @uses $vars['content'] Content
 */

$content = elgg_extract('content', $vars, '');

$header = elgg_extract('header', $vars);
unset($vars['header']);

if (!isset($header)) {
    $title = elgg_extract('title', $vars, '');
    unset($vars['title']);

    if ($title) {
        $title = elgg_view_title($title, [
            'class' => 'elgg-heading-main',
        ]);
    }

    $menu_params = $vars;
    $menu_params['sort_by'] = 'priority';
    $menu_params['class'] = 'elgg-menu-hz';
    $buttons = elgg_view_menu('title', $menu_params);

    $header = $title . $buttons;
}

if (empty($header)) {
    return;
}
?>
<div class="elgg-layout-content clearfix">
    <div class="elgg-head elgg-layout-header">
    <?=$header?>
     </div>
    <?php echo elgg_view('page/layouts/elements/breadcrumbs', $vars) ?>

	<?=$content?>
</div>





<!-- <div class="elgg-head elgg-layout-header">
</div> -->
