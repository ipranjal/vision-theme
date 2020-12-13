<?php

$plugin = elgg_get_plugin_from_id('vision_theme');
$user = elgg_get_logged_in_user_entity();

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
    );
    $content = elgg_list_entities($options);

    $title .= '<span> (' . $count . ')</span>';
    echo elgg_view_module('info', $title, $content);
}
