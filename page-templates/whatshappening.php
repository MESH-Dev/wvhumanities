<?php
/**
 *  
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header();?>

<?php while (have_posts()) : the_post();

		$page_background_url = get_field('page_background_url');
		$page_background_quote = get_field('page_background_quote');
		$page_heading = get_the_title();
		$page_subheading = get_field('page_subheading');

	echo "<style>
			.jumbotron.whatshappening {
				display:block;
				background: url('".$page_background_url."');
				min-height: 400px;
				background-position: right center;
				background-size: cover;
			}</style>";

	echo '<div class="jumbotron whatshappening">
	      <div class="container">
			<div class="row">
			        <div class="col-md-3 col-md-offset-9">
			          <div class="jumbotron-caption-container">
			            <div class="jumbotron-caption">'.$page_background_quote.'</div>
			          </div>
			          </div>
			        </div>
			      </div>
			</div>

			<div class="row">
				<div class="col-md-12 whatshappening titlebar">
					<div class="container">
					<div class="row">
					<h1>'.$page_heading.'</h1><h4>'.$page_subheading.'</h4>
					</div>
					</div>
					
				</div>
			</div>';
?>


    <div class="container content-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-8">

<?php 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


if($_GET['calmonth'] && $_GET['calyear']){
	$calendarmonth = $_GET['calmonth'];
	$calendaryear = $_GET['calyear'];
	$caldate = $calendaryear.''.$calendarmonth;
	$caltime = strtotime($caldate);
	$specificyear = date('Y', $caltime);
	$calendarmonthnumber = date('m', $caltime);

	$currentmonth = date('F', $caltime);
	$totaldays = date('t', $caltime);
	$currentmonthnumber = date('m', $caltime);
	$currentyear = $calendaryear;
	$previousmonth = date('F',strtotime( $currentmonth . ' last month'));
	$previousmonthyear = date('Y',strtotime( $calendaryear.$currentmonth . ' last month'));
	$nextmonth = date('F',strtotime( $currentmonth . ' next month'));
	$nextmonthyear = date('Y',strtotime( $calendaryear.$calendarmonth . ' next month'));
	$numberofdaysinmonth = cal_days_in_month(CAL_GREGORIAN, $currentmonthnumber, $specificyear);

}else{

	$currentmonth = date('F');
	$totaldays = date('t');
	$currentmonthnumber = date('m');
	$caldate = new DateTime();
	$currentyear = $caldate->format('Y');
	$previousmonth = date('F',strtotime( $currentmonth . ' last month'));
	$previousmonthyear = date('Y',strtotime( $currentmonth . ' last month'));
	$nextmonth = date('F',strtotime( $currentmonth . ' next month'));
	$nextmonthyear = date('Y',strtotime( $currentmonth . ' next month'));
	$numberofdaysinmonth = cal_days_in_month(CAL_GREGORIAN, $currentmonthnumber, $currentyear);
}





if(isset($_GET['date'])){
	$postsdate = new DateTime($_GET['date'],new DateTimeZone('America/New_York'));
	$args = array(
		'post_type' => 'event',
		'post_status' => 'publish',
		'paged'	=> $paged,
		'meta_query' => array(
			array(
				'key'     => 'datestart',
				'value'   => $postsdate->format('Ymd'),
				'compare' => '=',
			),
		),
	);
}elseif($_GET['calmonth'] && $_GET['calyear']){
	$daterange = array($currentyear.'-'.$currentmonthnumber.'-01', $currentyear.' 12:00 am -'.$currentmonthnumber.'-'.$numberofdaysinmonth.' 12:00am');
	$postsdate = new DateTime();
	$args = array(
	  'post_status'       => 'publish',
	  'post_type' => 'event',
	  'posts_per_page'    => 6,
	  'paged'             => $paged,
	  'meta_query' => array(
			array(
				'key'     => 'datestart',
				'value'   => $daterange,
				'compare' => 'BETWEEN',
				'type'	  => 'DATE'
			),
		),
	  'orderby'           => 'meta_value_num',
	  'order'             => 'ASC'
	);
}else{
	$daterange = array($currentyear.'-'.$currentmonthnumber.'-01', $currentyear.' 12:00 am -'.$currentmonthnumber.'-'.$numberofdaysinmonth.' 12:00am');
	$postsdate = new DateTime();
	$args = array(
	  'post_status'       => 'publish',
	  'post_type' => 'event',
	  'posts_per_page'    => 6,
	  'paged'             => $paged,
	  'meta_query' => array(
			array(
				'key'     => 'datestart',
				'value'   => $postsdate->format('d/m/y h:i a'),
				'compare' => '>=',
				'type'	  => 'DATE'
			),
		),
	  'orderby'           => 'meta_value_num',
	  'order'             => 'ASC'
	);
}
$event_query = new WP_Query( $args );



if ( $event_query->have_posts() ) : 
	while ( $event_query->have_posts() ) : $event_query->the_post(); 

		$datestart = get_field('datestart', get_the_ID());
		$date_display  = strtotime($datestart);
	 	$date_display_day   = date('d',$date_display);
	 	$date_display_month = date('M',$date_display);
	 	echo $datestart;
	 	
	 	?>

    	<div class="whatshappening-item">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-1">
						<div class="datebox">
							<span class="month"><?php echo $date_display_month ?></span>
							<span class="day"><?php echo $date_display_day; ?></span>
						</div>
					</div>
					<div class="col-md-11">
						<div class="description">
							<a href="<?php echo get_the_permalink(); ?>"><h2><?php echo get_the_title(); ?></h2></a>
							<h3><?php echo get_post_meta(get_the_ID(), 'event_type', true); ?></h3>
							<p><?php echo get_post_meta(get_the_ID(), 'description', true); ?></p>
						</div>
					</div>
				</div> 
			</div>        
		</div>
	<?php endwhile; else: ?>
		<h2 class="text-center">No Events found for this date.</h2>
<?php 
endif;  
endwhile;
?>
					       
        
               </div> 
               <div class="col-md-4">

               	<div class="wvh-calendar-container">
               	<?php

               	//do calendar actions and output
               	if($caltime){
               		$currentmonth = date('F', $caltime);
               	}else{
               		$currentmonth = date('F');
               		$calendarmonthnumber = $currentmonthnumber;
					$calendaryear = $currentyear;
               	}
               	echo '<div class="calendar-header">Calendar</div>';
               	echo '<div class="calendar-current-month"><a href="?calmonth='.$currentmonth.'&calyear='.$currentyear.'">'.$currentmonth .'</a></div>';
               	echo '<div class="calendar-nav-container">';
               	echo '<a href="?calmonth='.$nextmonth.'&calyear='.$nextmonthyear.'">&raquo;</a>';
				echo '<a href="?calmonth='.$previousmonth.'&calyear='.$previousmonthyear.'">&laquo;</a>';
				echo '</div><div class="calendar-row-clear"></div>';

				
				$args = array(
				  'post_status'       => 'publish',
				  'post_type' => 'event',
				  'posts_per_page'    => 20,
				  'paged'             => $paged,
				  'meta_query' => array(
						array(
							'key'     => 'datestart',
							'value'   => $daterange,
							'compare' => 'BETWEEN',
							'type'	  => 'DATE'
						),
					),
				  'orderby'           => 'meta_value_num',
				  'order'             => 'ASC'
				);

				query_posts( $args );
				if (have_posts()) : while (have_posts()) : the_post(); 					

				$eventdates[] = get_post_meta(get_the_ID(), 'datestart', true);

				endwhile;
				else :
				endif;
				wp_reset_query();


				// Loop through array of dates
				foreach($eventdates AS $eventdate){
						$timestamp = strtotime($eventdate);
						$eventmonth = date("m", $timestamp);
						if($eventmonth == $currentmonthnumber){
							// Out of all events, add the days from current selected month to an array
							$currentmontheventdays[] = date("d", $timestamp);
						}
				}

				// Loop through days in current month and check when divisble by 7 (week)
				$currentday = 1;
				while($currentday <= $numberofdaysinmonth){
					//Check if current day is in our list of days with events
					echo '<div class="calendar-date-block">';
					if(in_array($currentday, $currentmontheventdays)){
						echo '<a class="calendar-active-date" href="?date='.$calendaryear.''.$calendarmonthnumber.''.$currentday.'&calmonth='.$calendarmonthnumber.'&calyear='.$calendaryear.'">'.$currentday.'</a>';
					}else{
						echo $currentday;
					}
					echo '</div>';	
					if ($currentday%7 == 1 && $currentday != 1){  
						//echo '<div class="calendar-row-clear"></div>';
					}
					$currentday++;
				}

				?>

</div>



	               	<div class="landingpage-item photobox brown calendar-sidebar">
	                  <div class="image">
	                    <img src="landingpage-item1.jpg">
	                  </div>
	                  <div class="text">
	                    <h1>Quisque vitae &raquo;</h1>
	                    <p>Cras gravida venenatis luctus. Cras rutrum sed. Cras gravida venenatis luctus. Cras rutrum sed. <a href="#">Ut efficitur dictum</a></p>
	                  </div>
	                </div>
               </div>
        </div>
      </div>
<?php get_footer(); ?>