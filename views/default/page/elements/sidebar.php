<?php

if (elgg_extract('show_owner_block', $vars, true)) {
    echo elgg_view('page/elements/owner_block', $vars);
}

echo elgg_view('page/elements/page_menu', $vars);

// optional 'sidebar' parameter
echo elgg_extract('sidebar', $vars, '');
