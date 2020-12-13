<?php
/**
 * Vision Theme settings
 * @package vision_theme
 *
 */

$plugin = elgg_extract('entity', $vars);
if (!$plugin instanceof \ElggPlugin) {
    return;
}

$general .= elgg_view_field([
    '#type' => 'fieldset',
    'id' => 'vision_theme-general',
    'fields' => [
        [
            '#type' => 'text',
            '#label' => elgg_echo('vision_theme:label:color'),
            'name' => 'params[header_color]',
            'value' => $plugin->header_color,
        ],
    ],
]);

echo elgg_view_module('info', elgg_echo('vision_theme:settings:general'), $general);

$ad .= elgg_view_field([
    '#type' => 'fieldset',
    'id' => 'vision_theme-adenable',
    'fields' => [
        [
            '#type' => 'select',
            '#label' => elgg_echo('vision_theme:label:enablead'),
            'name' => 'params[enablead]',
            'options_values' => [
                'yes' => elgg_echo('option:yes'),
                'no' => elgg_echo('option:no'),
            ],
            'value' => $plugin->enablead,
        ],
    ],
]);

$ad .= elgg_view_field([
    '#type' => 'fieldset',
    'id' => 'vision_theme-ad',
    'fields' => [
        [
            '#type' => 'longtext',
            '#label' => elgg_echo('vision_theme:label:ad'),
            'name' => 'params[ad]',
            'value' => $plugin->ad,
        ],
    ],
]);

echo elgg_view_module('info', elgg_echo('vision_theme:settings:ad'), $ad);

$sidebar .= elgg_view_field([
    '#type' => 'fieldset',
    'id' => 'vision_theme-alluser',
    'fields' => [
        [
            '#type' => 'select',
            '#label' => elgg_echo('elgg_connect:label:allusers'),
            'name' => 'params[allusers]',
            'options_values' => [
                'yes' => elgg_echo('option:yes'),
                'no' => elgg_echo('option:no'),
            ],
            'value' => $plugin->allusers,
        ],
    ],
]);

$sidebar .= elgg_view_field([
    '#type' => 'fieldset',
    'id' => 'vision_theme-friends',
    'fields' => [
        [
            '#type' => 'select',
            '#label' => elgg_echo('elgg_connect:label:friends'),
            'name' => 'params[friends]',
            'options_values' => [
                'yes' => elgg_echo('option:yes'),
                'no' => elgg_echo('option:no'),
            ],
            'value' => $plugin->friends,
        ],
    ],
]);

echo elgg_view_module('info', elgg_echo('vision_theme:settings:sidebar'), $sidebar);
