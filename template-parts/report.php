

selector.elementor-sticky--effects{
   background-color: rgba(255, 255, 255, 0.98)!important
}

selector{
   transition: background-color 4s ease !important;
}

selector.elementor-sticky--effects >.elementor-container{
   min-height: 40px;
}

selector > .elementor-container{
   transition: min-height 1s ease !important;
}
<?php
/* Template Name: Report Template */
?>
<?php get_header();?>

<?php
if (!current_user_can('administrator')) {
	wp_die('You are not allowed to access this page');
}

?>

    <div class="container" style="
    max-width: 700px;
    margin: auto;
">

        <div class="row">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Payer ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Time</th>
                </tr>
                </thead>
                <tbody>
                <?php
global $wpdb;
$table_name = $wpdb->prefix . "file_downloads_tracker";
$query = 'SELECT * FROM ' . $table_name . ' ORDER BY updated_at DESC LIMIT 30';

$result = $wpdb->get_results($query, 'ARRAY_A');
$cnt = 0;
foreach ($result as $row) {
	$cnt++;

	?>

                <tr>
                    <th scope="row"> <?=$cnt?> </th>
                    <td> <?=$row['payer_id']?> </td>
                    <td>
	                    <?php
if ($row['status'] == 1) {
		?>
                            <div style="
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
text-align: center;"
                            >
                                Success
                            </div>

                            <?php
} else {
		?>
                            <div style="
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
text-align: center;">
                                Error
                            </div>

		                    <?php
}

	?>


                        </td>
                    <td> <?=$row['updated_at']?> </td>


                </tr>

                <?php
}
?>

                </tbody>
            </table>

        </div>
    </div>

<?php get_footer();?>