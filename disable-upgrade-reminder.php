<?php 
/*
 Plugin Name: Disable Upgrade Reminder
 Plugin URI: http://masseltech.com/plugins/disable-upgrade-reminder/
 Description: Disable upgrade reminder is a plugin that disables the upgrade reminder at the top of the WordPress interface for all users except administrators. It is useful for any situation when you don't want anybody except admins worrying about available updates.
 Author: Jeremy Massel
 Version: 0.2
 Author URI: http://www.masseltech.com/
 */

/*  Copyright 2009  Jeremy Massel  (email : jkmassel@shaw.ca)
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


add_action('admin_init', 'do_disableUpgradeReminder');


function do_disableUpgradeReminder() {
    if (!current_user_can('edit_users')) {
        add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
        add_filter('pre_option_update_core', create_function('$a', "return null;"));
    }
}

?>