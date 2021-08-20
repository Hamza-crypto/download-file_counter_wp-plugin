<?php
/* Template Name: Download Page Template */

function twenty_twenty_one_scripts2() {
	wp_enqueue_script(
		'download-script',
		plugin_dir_url(__DIR__) . 'assets/js/js-file-downloader.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	wp_enqueue_script(
		'ld-ajax',
		plugin_dir_url(__DIR__) . 'assets/js/ajax.js',
		['jquery'],
		'',
		true);
	wp_localize_script('ld-ajax', 'ld_ajax_url', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);

}

add_action('wp_enqueue_scripts', 'twenty_twenty_one_scripts2');
?>

<?php get_header();?>

    <!--  Custom Play Ground -->
<?php

if (isset($_GET['PayerID'])) {
	$payer_id = $_GET['PayerID'];

} else {
	wp_die("This page must be called after success payment.");
}

echo "
<script>

 //const fileUrl = 'https://images.pexels.com/photos/3244513/pexels-photo-3244513.jpeg?cs=srgb&dl=pexels-andy-vu-3244513.jpg&fm=jpg';
 const fileUrl = 'https://mypet1.com/wp-content/uploads/2021/08/The-Intelligent-Investor-The-Definitive-Book-On-Value-Investing-Revised-Edition-by-Benjamin-Graham-Jason-Zweig-z-lib.org_.pdf';


jQuery(function() {
    var payer_id = '$payer_id';

    !function () {

        jQuery('#file_start_msg').hide();
        jQuery('#plz-wait_msg').show();
           function process (event) {
  if (!event.lengthComputable) return; // guard
  var downloadingPercentage = Math.floor(event.loaded / event.total * 100);

   jQuery('#progress_bar').css({'width': downloadingPercentage + '%'});
   jQuery('#progress_bar').html(downloadingPercentage + '%');

};
      new jsFileDownloader({
      url: fileUrl,
       process: process
      })
        .then(function () {

          ft_success_ajax( payer_id, 1 );  //payer_id, status, total_tries

          jQuery('#plz-wait_msg').html('Download Completed Successfully');
        })
         .catch(function (error) {

       ft_success_ajax( payer_id , 0 );
        jQuery('#plz-wait_msg').html('Something went wrong. Please try again or contact Admin');
    });
    } ();


});

  </script>
";
?>
    <div class="container" style="
    max-width: 700px;
    margin: auto;
    text-align: center;
">

        <p id="file_start_msg"> Download initiaitng...</p>


        <div style="display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;">

            <div id="progress_bar" style="display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    background-color: #007bff;
    transition: width .6s ease; width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                0%

            </div>
        </div>
        <p id="plz-wait_msg" style="
        display:none;
"> File is downloading. Please wait...</p>
    </div>

<?php get_footer();?>