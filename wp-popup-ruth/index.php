<?php
/*
Plugin Name: Ruth Popup
Plugin URI: http://www.ruthannadorable.com
Version: 1.0
Author: Ruth Ann ADORABLE
Author URI: http://www.ruthannadorable.com
License: GPL2
*/
function ruth_popup_page(){
//dd_menu_page('Plugin de Popup | Reglages','Reglages de la popup', 'administrator','popup_jb','popup_jb_function','dashicons-format-aside',40);
	add_submenu_page('options-general.php','Plugin de Popup | Reglages','Reglages de la popup', 'administrator','popup_ruth','popup_ruth_function');
}
add_action('admin_menu','ruth_popup_page');
function popup_ruth_function(){
	include ('ruth_popup_admin.php');
};


?>