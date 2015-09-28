<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); ?>

<?php

$eventspage = get_page_by_title("What's Happening");
$custom_query = new WP_Query('page_id='.$eventspage->ID);
while($custom_query->have_posts()) : $custom_query->the_post();

$page_background_url = get_field('page_background_url');
$page_background_quote = get_field('page_background_quote');
$page_heading = get_the_title();
$page_subheading = get_field('page_subheading');

?>

<style>
		.jumbotron {
			background: url("<?php echo $page_background_url; ?>");
			min-height: 400px;
			background-position: right center;
			background-size: cover;
		}
</style>

<?php // add_external_calendar_events(); ?>

<div class="jumbotron">
	<div class="container">
		<div class="row">

			<?php if($page_background_quote != "") { ?>

				<div class="col-md-3 col-md-offset-9">
					<div class="jumbotron-caption-container">
						<div class="jumbotron-caption"><?php echo $page_background_quote; ?></div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>
</div>

<div class="titlebar" style="background: #ae6c15;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $page_heading; ?></h1>
				<h4><?php echo $page_subheading; ?></h4>
			</div>
		</div>
	</div>
</div>

<?php
			endwhile;
			wp_reset_postdata();
?>


    <div class="container content-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-8">

					<div id="tribe-events-pg-template">

						<div class="tribe-events-content-filterbar-title">
							<h1>Upcoming Events from <span class="date"><?php echo date("F jS") ?></span></h1>
						</div>

						<hr>

						<?php tribe_events_before_html(); ?>
						<?php tribe_get_view(); ?>
						<?php tribe_events_after_html(); ?>
					</div> <!-- #tribe-events-pg-template -->

			</div>
       <div class="col-md-4">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('calendar_sidebar') ) : endif; ?>
       </div>
      </div>
    </div>

<?php get_footer(); ?>
