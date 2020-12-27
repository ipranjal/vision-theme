<?php

$plugin = elgg_get_plugin_from_id('vision_theme');
$user = elgg_get_logged_in_user_entity();

if (elgg_get_context() == 'profile') {
    $user = elgg_get_page_owner_entity();
}

if (elgg_is_logged_in()) {

    $icon = elgg_view_entity_icon($user, 'large', array('use_hover' => false, 'class' => 'sidebar_alt_profile'));
    echo elgg_view_module('info', elgg_echo($user->name), $icon . elgg_view_menu('site', [
        'sort_by' => 'text',
        'class' => 'alt_site_menu',

    ]));
} else {
    echo elgg_view_module('info', 'Navigation', elgg_view_menu('site', [
        'sort_by' => 'text',
        'class' => 'alt_site_menu',
    ]));
}

/**
 * '&nbsp<span class=" fa-stack fa-xs" style="vertical-align: top;color:#1DA1F2;">
 *   <i class="far fa-certificate fa-stack-2x"></i>
 *   <i class="fas fa-check fa-stack-1x fa-inverse"></i>
 *  </span>'
 */

if (elgg_get_context() == 'profile') {
    // grab the actions and admin menu items from user hover
    $menu = elgg()->menus->getMenu('user_hover', [
        'entity' => $user,
        'username' => $user->username,
    ]);

    $admin = $menu->getSection('admin', []);

// if admin, display admin links
    $admin_links = '';
    if (elgg_is_admin_logged_in() && elgg_get_logged_in_user_guid() != $user->guid) {
        $text = elgg_format_element('span', [], elgg_echo('admin:options'));

        $toggle_icons = elgg_view_icon('angle-right', ['class' => 'elgg-action-expand']);
        $toggle_icons .= elgg_view_icon('angle-down', ['class' => 'elgg-action-collapse']);
        $toggle_icons = elgg_format_element('span', [
            'class' => 'profile-admin-menu-toggle-icons',
        ], $toggle_icons);

        $admin_links = '<ul class="profile-admin-menu-wrapper elgg-menu-owner-block">';
        $admin_links .= "<li><a rel=\"toggle\" href=\"#profile-menu-admin\" class=\"profile-admin-menu-toggle\">$text$toggle_icons</a>";
        $admin_links .= '<ul class="elgg-menu elgg-menu-owner-block profile-admin-menu hidden" id="profile-menu-admin">';
        foreach ($admin as $menu_item) {
            $admin_links .= elgg_view('navigation/menu/elements/item', ['item' => $menu_item]);
        }
        $admin_links .= '</ul>';
        $admin_links .= '</li>';
        $admin_links .= '</ul>';
        echo $admin_links;
    }
} else {
//Friends
    if (elgg_is_logged_in() && $plugin->friends != 'no') {

        $user = elgg_get_logged_in_user_entity();

        $count = $user->getFriends(array('count' => true));

        $title = elgg_view('output/url', array(
            'href' => "/friends/$user->username",
            'text' => elgg_echo('friends'),
            'is_trusted' => true,
        ));

        $options = array(
            'type' => 'user',
            "limit" => 40,
            'relationship' => 'friend',
            'relationship_guid' => elgg_get_logged_in_user_guid(),
            'inverse_relationship' => false,
            'full_view' => false,
            'pagination' => false,
            'list_type' => 'gallery',
            'no_results' => elgg_echo('friends:none'),
            'order_by' => 'rand()',
            'offset_key' => 0,
        );
        $content = elgg_list_entities($options);

        $title .= '<span> (' . $count . ')</span>';
        echo elgg_view_module('info', $title, $content);
    }
}
