<?php

function ft_after_success_ajax_func() {
	global $wpdb;
	$table_name = $wpdb->prefix . "file_downloads_tracker";
	if ( isset( $_POST['status'] ) && isset( $_POST['payer_id'] ) ) {


		$status   = $_POST['status'];
		$payer_id = $_POST['payer_id'];

		$wpdb->insert(
			$table_name,
			[
				'payer_id' => $payer_id,
				'status'   => $status,
			],
			[
				'%s',
				'%d',
			]
		);

	}

		if ( $wpdb->insert_id ) {
			if ( $status == 0 ) {
				echo "Something went wrong";
			}
		} else {
			echo $wpdb->insert_id;
		}

	wp_die();
}

add_action( 'wp_ajax_ft_after_success_ajax_func', 'ft_after_success_ajax_func' );
add_action( 'wp_ajax_nopriv_ft_after_success_ajax_func', 'ft_after_success_ajax_func' );
