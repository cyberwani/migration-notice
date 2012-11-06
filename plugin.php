<?php
/*
Plugin Name: Migration Notice
Plugin URI: http://www.github.com/billerickson/migration-notice
Description: Lets users know this site has been migrated elsewhere
Version: 1.0
Author: Bill Erickson
Author URI: http://www.billerickson.net
License: GPLv2
*/



class BE_Migration_Notice {

	var $instance;
	
	public function __construct() {
		$this->instance =& $this;
		add_action( 'init', array( $this, 'init' ) );	
	}
	
	public function init() {
		
		// Backend Notice
		add_action( 'admin_notices', array( $this, 'admin_notice' ) );
		
		// Frontend Notice
		add_action( 'wp_head', array( $this, 'frontend_notice' ) );
		
	}
	
	/**
	 * Notice displayed at top of all admin pages
	 *
	 */
	public function admin_notice() {
		echo '<div class="error"><p>This site has been migrated.</p></div>';
	}
	
	/**
	 * Notice displayed at top of all frontend pages
	 *
	 * Use the 'migration_notice_hide_frontend' filter to disable, 
	 * in case you want to use a different hook.
	 */
	public function frontend_notice() {
		if( apply_filters( 'migration_notice_hide_frontend', false ) )
			return;
			
		echo '<div class="error"><p>This site has been migrated.</p></div>';
	}
	
}

global $be_migration_notice;
$be_migration_notice = new BE_Migration_Notice;
