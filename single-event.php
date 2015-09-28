<?php
/**
 * The Default Page Template
 *
**/
get_header();?>

<?php while (have_posts()) : the_post();

		$page_background_url = get_field('page_background_url');
		$page_background_quote = get_field('page_background_quote');
		$page_heading = get_the_title();
		$page_subheading = get_field('page_subheading');

	echo "<style>
			.jumbotron.contentpage {
				background: url('".$page_background_url."');
				min-height: 400px;
				background-position: right center;
				background-size: cover;
			}</style>";

	echo '<div class="jumbotron contentpage">
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
				<div class="col-md-12 contentpage titlebar">
					<div class="container">
					<div class="row">
					<h1>'.$page_heading.'</h1><h4>'.$page_subheading.'</h4>
					</div>
					</div>
					
				</div>
			</div>';
			endwhile;
?>


    <div class="container content-container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-8">
			<?php the_content(); ?>
			</div> 
               <div class="col-md-4">
               <?php while (have_posts()) : the_post();

						

					echo '<div class="landingpage-item photobox '.$sidebar_color.'">
		                  <div class="image">
		                    <img src="'.$sidebar_image_url.'">
		                  </div>
		                  <div class="text">
		                    <h1>'.$sidebar_heading.' &raquo;</h1>
		                    <p>'.$sidebar_text.' <br>
		                    <a href="'.$sidebar_link_url.'">'.$sidebar_link_text.'</a></p>
		                  </div>
		                </div>';

					
							endwhile;
				?>

				<?php

					// check if the repeater field has rows of data
					if( have_rows('sidebar_boxes') ):

					 	// loop through the rows of data
					    while ( have_rows('sidebar_boxes') ) : the_row();

					        // display a sub field value
							$sidebar_image_url = get_sub_field('sidebar_image_url');
							$sidebar_heading = get_sub_field('sidebar_heading');
							$sidebar_text = get_sub_field('sidebar_text');
							$sidebar_link_url = get_sub_field('sidebar_link_url');
							$sidebar_link_text = get_sub_field('sidebar_link_text');
							$sidebar_color = get_sub_field('sidebar_color');


					        echo '<div class="landingpage-item photobox '.$sidebar_color.'">
				                  <div class="image">
				                    <img src="'.$sidebar_image_url.'">
				                  </div>
				                  <div class="text">
				                    <h1>'.$sidebar_heading.' &raquo;</h1>
				                    <p>'.$sidebar_text.' <br>
				                    <a href="'.$sidebar_link_url.'">'.$sidebar_link_text.'</a></p>
				                  </div>
				                </div>';
				                
					    endwhile;

					else :

					    // no rows found

					endif;

					?>
	               	
               </div>
        </div>
      </div>
<?php get_footer(); ?>