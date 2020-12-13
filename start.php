<?php
/*
 * Vision theme
 *
 * @author Pranjal Pandey
 *
 */

return function () {
    elgg_register_event_handler('init', 'system', 'vision_init');

};

function vision_init()
{

    $plugin = elgg_get_plugin_from_id('vision_theme');

    // custom icon sizes
    elgg_register_plugin_hook_handler('entity:icon:sizes', 'group', 'elgg_connect_custom_icon_sizes');
    elgg_register_plugin_hook_handler('view_vars', 'page/layouts/default', 'custom_sidebar_alt');
    elgg_register_plugin_hook_handler('register', 'menu:site', 'site_menu_handler');
    elgg_extend_view('groups/edit/profile', 'elgg_connect/elements/info', 0);

    // theme specific CSS
    elgg_extend_view('elgg.css', 'vision_theme/css');

    elgg_extend_view('page/elements/sidebar', 'vision_theme/sidebar', 500);

    if (elgg_is_logged_in() && ($plugin->sidebar == "yes")) {
        //elgg_extend_view('river/sidebar', 'elgg_connect/sidebar');
    }
}

function custom_sidebar_alt($hook, $type, $vars, $params)
{
    $old_alt;
    if ($vars['sidebar_alt'] != false) {
        $old_alt = $vars['sidebar_alt'];
    }
    $vars['sidebar_alt'] = elgg_view('vision_theme/sidebar_alt');
    $vars['show_owner_block'] = false;
    $vars['show_owner_block_menu'] = false;
    $vars['show_page_menu'] = false;

    return $vars;
}
