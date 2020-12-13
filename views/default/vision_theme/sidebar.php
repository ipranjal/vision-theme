<?php
$plugin = elgg_get_plugin_from_id('vision_theme');

if ($plugin->enablead != 'no') {
    echo elgg_view_module('info', 'Advertisement', $plugin->ad);
}

if ($plugin->allusers != 'no') {

    $title = "All Users";

    $options = array(
        'type' => 'user',
        "limit" => 40,
        'full_view' => false,
        'pagination' => false,
        'list_type' => 'gallery',
        'no_results' => elgg_echo('friends:none'),
        'order_by' => 'rand()',
    );
    $content = elgg_list_entities($options);

    echo elgg_view_module('info', $title, $content);
}
