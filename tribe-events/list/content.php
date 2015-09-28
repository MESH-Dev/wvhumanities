<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list">

	<?php $terms = get_terms('tribe_events_cat'); ?>

	<div class="tribe-events-content-filterbar">
		<?php foreach ($terms as $term) : ?>
			<?php
				if(checked(true, in_array($term->term_id, $_REQUEST['tribe_eventcategory']), FALSE)){
					$checkmark = "&#8226;";
				}else{
					$checkmark = "";
				}

			?>

			<label>
				<input type="checkbox" <?php checked(true, in_array($term->term_id, $_REQUEST['tribe_eventcategory'])) ?> class="tribe-event-list-custom-filter" value="<?php echo $term->term_id ?>" name="tribe_eventcategory[]" data-slug="<?php echo $term->slug ?>">
				<span class="checkbox" id="<?php echo $term->slug ?>"><?php echo $checkmark;?></span>
				<span class="tribe-events-content-filterbar-text-terms" title="<?php echo $term->name ?>"><?php echo $term->name ?></span>
			</label>
		<?php endforeach; ?>
		<label>
			<input type="checkbox" <?php checked(count($terms), count($_REQUEST['tribe_eventcategory'])); ?> class="tribe-event-list-custom-filter" value="1" name="tribe_eventcategory_all" data-slug="all">
			<span class="checkbox"><?php echo $checkmark;?></span>
			<span class="tribe-events-content-filterbar-text-terms" title="Show All">Show All</span>
		</label>
	</div>

	<script type="text/javascript">
	jQuery(document).ready(function($) {
		var params = tribe_ev.fn.get_params();
		tribe_ev.fn.set_form(params);

		$('#tribe-events-content-wrapper').on('change', '.tribe-event-list-custom-filter', function(e) {

			$this = $(this);
			if ($this.attr('data-slug') == 'all') {
				if ($this.get(0).checked) {

					$('.tribe-events-filter-checkboxes input[type="checkbox"]').each(function() {
						$(this).attr('checked', 'checked').trigger('change');
						$('.tribe-events-content-filterbar span.checkbox#' + $(this).attr('data-slug') + '').trigger('change').html('&#8226;');
					});
				} else {
					$('.tribe-events-filter-checkboxes input[type="checkbox"]').each(function() {
						$(this).removeAttr('checked').trigger('change');
						$('.tribe-events-content-filterbar span.checkbox#' + $(this).attr('data-slug') + '').trigger('change').html('');
					});
				}
			} else {

				if ($(this).get(0).checked){
					$('.tribe-events-filter-checkboxes input[type="checkbox"][data-slug="' + $(this).attr('data-slug') + '"]').trigger('change').attr('checked', 'checked');
					$('.tribe-events-content-filterbar span.checkbox#' + $(this).attr('data-slug') + '').trigger('change').html('&#8226;');
				}else{

					$('.tribe-events-filter-checkboxes input[type="checkbox"][data-slug="' + $(this).attr('data-slug') + '"]').trigger('change').removeAttr('checked');
					$('.tribe-events-content-filterbar span.checkbox#' + $(this).attr('data-slug') + '').trigger('change').html('');
				}
			}
		});
	});
	</script>

	<hr>

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<!-- List Header -->
	<?php do_action( 'tribe_events_before_header' ); ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

		<!-- Header Navigation -->
		<?php do_action( 'tribe_events_before_header_nav' ); ?>
		<?php tribe_get_template_part( 'list/nav', 'header' ); ?>
		<?php do_action( 'tribe_events_after_header_nav' ); ?>

	</div>
	<!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ); ?>


	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>
		<?php tribe_get_template_part( 'list/loop' ) ?>
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>

	<!-- List Footer -->
	<?php do_action( 'tribe_events_before_footer' ); ?>
	<div id="tribe-events-footer">

		<!-- Footer Navigation -->
		<?php do_action( 'tribe_events_before_footer_nav' ); ?>
		<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
		<?php do_action( 'tribe_events_after_footer_nav' ); ?>

	</div>
	<!-- #tribe-events-footer -->
	<?php do_action( 'tribe_events_after_footer' ) ?>

</div><!-- #tribe-events-content -->
