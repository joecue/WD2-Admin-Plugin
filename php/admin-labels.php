<?php 
function wd2_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Posted';
    $submenu['edit.php'][5][0] = 'Posted';
    $submenu['edit.php'][10][0] = 'Add Posted';
    $submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    $submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}

add_action( 'admin_menu', 'wd2_change_post_menu_label' );

function wd2_change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Posted';
        $labels->singular_name = 'Posted';
        $labels->add_new = 'Add Posted';
        $labels->add_new_item = 'Add Posted';
        $labels->edit_item = 'Edit Posted';
        $labels->new_item = 'Posted';
        $labels->view_item = 'View Posted';
        $labels->search_items = 'Search Posted';
        $labels->not_found = 'No Posted found';
        $labels->not_found_in_trash = 'No Posted found in Trash';
    }
    add_action( 'init', 'wd2_change_post_object_label' );

?>