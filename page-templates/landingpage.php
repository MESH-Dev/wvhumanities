<?php
/**
 * Template Name: Page - Landing Page
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header();?>

<?php get_template_part('partials/header', 'jumbotron'); ?>

	<div class="container content-container">
	  <!-- Example row of columns -->


			<?php

				$rows = get_field('grid_items');
				$row_count = count($rows);

				// check if the repeater field has rows of data
				if( have_rows('grid_items') ):

					$count = 0;

				 	// loop through the rows of data
				    while ( have_rows('grid_items') ) : the_row();

				        // display a sub field value
							$grid_image = get_sub_field('grid_image_url');

							$flag = get_sub_field('flag');
							$grid_item_heading = get_sub_field('grid_item_heading');
							$grid_item_text = get_sub_field('grid_item_text');
							$grid_item_link_url = get_sub_field('grid_item_link_url');
							$grid_item_link_text = get_sub_field('grid_item_link_text');
							$grid_item_color = get_sub_field('grid_item_color');

							// vars
							$url = $grid_image['url'];

							$alt = $grid_image['alt'];
							$caption = $grid_image['caption'];

							// thumbnail
							$thumb = $grid_image['sizes']['large'];

							?>

							<?php if($grid_item_heading != "") { ?>

							<?php

							if($count % 3 == 0) {
								echo "<div class='row'>";
							}

							?>

					      <div class="col-md-4">
									<div class="photobox <?php echo $grid_item_color; ?>">
										<div class="landingpage-item">
		                  <div class="image">

								  		<?php if ($flag != "none") { ?>

												<div class="ribbon-wrapper">
										    	<div class="ribbon success <?php echo $flag; ?>">
												    <?php echo $flag; ?>
										    	</div>
												</div>

											<?php } ?>

												<?php if($grid_image != "") { ?>
													<img src="<?php echo $thumb; ?>">
												<?php } ?>

		                  </div>

											<div class="text">

												<a href="<?php echo $grid_item_link_url; ?>"><h1><?php echo $grid_item_heading; ?></h1></a>

		                    <p><?php echo $grid_item_text; ?></p>

												<?php if ($grid_item_link_text != "") { ?>
													<p>
			                      <a href="<?php echo $grid_item_link_url; ?>"><?php echo $grid_item_link_text; ?> &raquo;</a>
			                    </p>
												<?php } ?>
		                  </div>
										</div>
	                </div>
			        	</div>

							<?php

							if(($count % 3 == 2) || ($count == ($row_count - 1))) {
								echo "</div>";
							}

							$count = $count + 1;

							?>

							<?php } ?>

							<?php

				    endwhile;

				else :

				    // no rows found

				endif;

			?>


  </div>
<?php get_footer(); ?>
