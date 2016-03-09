<?php
/**
 * 404 Page Template
 * The template used for displaying 404 Page
 **/
get_header();?>





	<?php

		$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		$urlname = explode('-', $url);

		$start = strpos($url, 'event-') + 6;

		// $len = count($urlname);
		//
		// $eventname = $urlname[1];

		$eid = substr($url, $start);

		// var_dump($urlname);

		$eid = str_replace('/', '', $eid);



		$servername = "localhost";
		$username = "mesh";
		$password = "Wasd1234!";
		$dbname = "wvhc_filemaker";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		/* change character set to utf8 */
		if (!mysqli_set_charset($conn, "utf8")) {
		    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
		} else {
		    mysqli_character_set_name($conn);
		}

		//------------------------------------------------------

		$sql = "SELECT EventID from events where wp_id is null";


		$result = $conn->query($sql);



		if ($result->num_rows > 0) {
	    // output data of each row

	    while($row = $result->fetch_assoc()) {
				if ($row['EventID'] == $eid) {
					if (strpos($url,'event-') !== false) {

						echo "<script>window.location.href='http://wvhumanities.org/events?eid=" . $eid . "'</script>";

					}
				}
			}
		}





	?>

	<style>
	html, body{
		height:100%!important;
	}
	body{
		background:url('<?php bloginfo('template_url'); ?>/img/404_background_1.jpg');
		background-position:center center;
		background-size:cover;
	}
	</style>

	<div class="container container404">


			<div class="row">
				<div class="col-md-6">
					<div class="content404">
					<h1>Page Not Found</h1>
					<p>That page doesn’t exist, or is a broken link.<br>
					Please try another search, or check that the URL you entered is correct. </p>
					</div>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
