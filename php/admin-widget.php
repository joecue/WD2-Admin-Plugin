<?php

//LCCC Dashboard Widget

add_action('wp_dashboard_setup', 'wd2_admin_dashboard_widgets');
 
function wd2_admin_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('wd2_help_widget', 'Web Site Support', 'wd2_help_widget');

 	// Globalize the metaboxes array, this holds all the widgets for wp-admin
 
 	global $wp_meta_boxes;
 	
 	// Get the regular dashboard widgets array 
 	// (which has our new widget already but at the end)
 
 	$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
 	
 	// Backup and delete our new dashboard widget from the end of the array
	
 	$wd2_widget_backup = array( 'wd2_help_widget' => $normal_dashboard['wd2_help_widget'] );
 	unset( $normal_dashboard['wd2_help_widget'] );
 
 	// Merge the two arrays together so our widget is at the beginning
 
 	$sorted_dashboard = array_merge( $wd2_widget_backup, $normal_dashboard );
 
 	// Save the sorted array back into the original metaboxes 
 
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

function wd2_help_widget() {
echo '<h1>Welcome to Web Design 2!</h1>
<p><strong>Need help? <br />Please contact either</strong>
<ul style="list-style: disc; margin: 0 0 0 40px;">
<li> <strong>Joe Querin</strong> at <a href="mailto:jquerin@lorainccc.edu">jquerin@lorainccc.edu</a> or ext 7060.</li>
<li> <strong>David Brattoli</strong> at <a href="mailto:dbrattoli@lorainccc.edu">dbrattoli@lorainccc.edu</a> or ext 7074.</li>
</ul>
</p>
<p>For WordPress Tutorials visit: <a href="http://www.wpbeginner.com" target="_blank">WPBeginner</a></p>
<img src="' . plugins_url( 'images/LCCClogo2C.png', dirname(__FILE__) ) . '" style="margin: 0 0 0 100px;" alt="LCCC Logo">';
}

function wd2_rss_dashboard_widget_function() {
     $rss = fetch_feed( "https://unsplash.com/rss" );
  
     if ( is_wp_error($rss) ) {
          if ( is_admin() || current_user_can('manage_options') ) {
               echo '<p>';
               printf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
               echo '</p>';
          }
     return;
}
  
if ( !$rss->get_item_quantity() ) {
     echo '<p>Apparently, there are no updates to show!</p>';
     $rss->__destruct();
     unset($rss);
     return;
}
  
echo "<ul>\n";
  
if ( !isset($items) )
     $items = 5;
  
     foreach ( $rss->get_items(0, $items) as $item ) {
          $publisher = '';
          $site_link = '';
          $link = '';
          $content = '';
          $date = '';
          $link = esc_url( strip_tags( $item->get_link() ) );
          $title = esc_html( $item->get_title() );
          $content = $item->get_content();
          $content = wp_html_excerpt($content, 250) . ' ...';
          //$image = $item->get_medium();
          $enclosure = $item->get_enclosure();
          echo "<img src='" . $enclosure->get_thumbnail() . "'/><br />";
         //echo "<li><a class='rsswidget' href='$link'>$title</a>\n<div class='rssSummary'>$image</div>\n";
}
  
echo "</ul>\n";
$rss->__destruct();
unset($rss);
}
 
function wd2_add_rss_dashboard_widget() {
     wp_add_dashboard_widget('unsplash_dashboard_widget', 'Recent Posts from unsplash.com', 'wd2_rss_dashboard_widget_function');
}
 
add_action('wp_dashboard_setup', 'wd2_add_rss_dashboard_widget');

?>