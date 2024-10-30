<?php
/*
Plugin Name: Browser-Update-Notify 
Plugin URI: http://wordpress.org/extend/plugins/browser-update-notify/
Description: Inform your visitors unobtrusively to switch to a newer browser. Source Code:<a href="http://Browser-Update.org>Browser-Update.org</a>.
Version: 0.2.1 
Author: Michael Stursberg
Author URI: 
*/


function check_browser() {
	
 $db_showalways = get_option('bun_showalways');
 $show = is_home() || is_front_page();
 
 if ($db_showalways == "1")
	 $show = true;
 if ( $show ) {
    // This is a homepage
  $dbie = get_option('bun_dbie');
  if($dbie == null ){$dbie = '8';
	   update_option('bun_dbie', $dbie);}
 
  $dbff = get_option('bun_dbff');
  if($dbff == null ){$dbff = '12';
	   update_option('bun_dbff', $dbff);}
 
  $dbs = get_option('bun_dbs');
  if($dbs == null ){$dbs = '5';
	   update_option('bun_dbs', $dbs);}
  
echo '<script type="text/javascript"> 
var $buoop = {vs:{i:'.$dbie.',f:'.$dbff.',o:11,s:'.$dbs.',n:9}} 
$buoop.ol = window.onload; 
window.onload=function(){ 
 try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
 var e = document.createElement("script"); 
 e.setAttribute("type", "text/javascript"); 
 e.setAttribute("src", "http://browser-update.org/update.js"); 
 document.body.appendChild(e); 
} 
</script>';
} 
}
add_action('wp_head', 'check_browser');

function check_browser2() {
echo '<style>
.buorg {
position: fixed !important;
clear: both !important;
z-index: 999999 !important;
width: 100% !important;
';
$db_position=get_option('bun_position');
if ($db_position==null || $db_position=="0"){ 
	echo 'bottom: 0px !important; top: auto !important;'; 
}
else  { 
	echo 'top: 0px !important;'; 
}
echo'</style>';
}
add_action('wp_head', 'check_browser2');


add_action('admin_menu', 'browser_update_notify');
function browser_update_notify() {
  add_options_page('browser_update_notify', 'Browser-Update-Notify', 'manage_options', 'my-unique-identifier', 'bun_admin');
}

function bun_admin() {
  include('bun_admin.php');
}
