<?php
/**
 * Template Name: Page - Event Series
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header();?>

<?php get_template_part('partials/header', 'jumbotron'); ?>


    <div class="container content-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4 clarendonlinks">
			<?php the_content(); ?>
        </div>
        <div class="col-md-8">
          <h1 class="eventseries"><?php echo get_field('events_list_title'); ?></h1>



<?php

$events_list = get_field('events_list');

if( $events_list ): ?>

	<?php foreach( $events_list as $e ):
		 

		$title = $e->post_title;
		$event_type = get_field('event_type', $e->ID);
		$datestart = get_post_meta($e->ID,'_EventStartDate',true);
		$dateend = get_post_meta($e->ID,'_EventEndDate',true);
		//$time = get_field('time', $e->ID);
		$description = $e->post_excerpt;
		//$venue = get_field('venue', $e->ID);
		//$filename = get_field('filename', $e->ID);

		$date_display  = strtotime($datestart);
		$date_display_day   = date('d',$date_display);
		$date_display_month = date('M',$date_display);

	    	//echo '<a href="'.get_permalink( $p->ID ).'">'.get_the_title( $p->ID ).'</a>';

	    	echo '<div class="littlelectures-item">
			        <div class="container-fluid">
			          <div class="row">
			            <div class="col-md-1">
			              <div class="datebox">
			                <span class="month">'.$date_display_month.'</span>
			                <span class="day">'.$date_display_day.'</span>
			              </div>
			            </div>
			            <div class="col-md-1">
			            </div>
			            <div class="col-md-8">
			              <div class="description">
			                <h2>'.$title.'</h2>
			                <h3 class="h3bold">'.$event_type.'</h3>
			                <p>'.$description.'</p>
			                <a href='.$e->guid.'>View Details &raquo;</a>
			              </div>

			            </div>
			          </div>
			          </div>
			        </div>';



 endforeach;
 endif;

?>









               </div>
        </div>
      </div>
<?php get_footer(); ?>
