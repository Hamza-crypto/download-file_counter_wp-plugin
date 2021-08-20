<?php

function ld_create_table() {
	global $wpdb;
	$name            = "file_downloads_tracker";
	$table_name      = $wpdb->prefix . $name;
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		payer_id varchar(30) NOT NULL,
		status smallint(1) NOT NULL,
		created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		updated_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL ON UPDATE current_timestamp(),
		PRIMARY KEY  (id)
) $charset_collate;";

	//tries mediumint(10) NOT NULL,->(Next Modification)

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
}


