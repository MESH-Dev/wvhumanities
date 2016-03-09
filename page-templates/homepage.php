<?php
/**
 * Template Name: Page - Homepage
 * The template used for displaying page content in page.php
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */
get_header(); ?>

<div class="home-left-half"></div>

<?php while (have_posts()) : the_post(); ?>
<div class="container content-container">
      <div class="row">
        <div class="col-md-3">
          <div class="home-left-caption">
          <?php

					// check if the repeater field has rows of data
					if( have_rows('homepage_side_background') ):

					 	// loop through the rows of data
					    while ( have_rows('homepage_side_background') ) : the_row();

					        // display a sub field value
					        $image = get_sub_field('image');
					        $banner_caption_top = get_sub_field('banner_caption_top');
					        $banner_caption_bottom = get_sub_field('banner_caption_bottom');
					        echo "<style>
					        		.home-left-half{
										background: url('".$image."') no-repeat;
										display: block;
										height: 100%;
										width: 46%;
										background-size: cover;
										background-position: center center;
										position: fixed;
										top: 0px;
										left: 0px;
										clear: both;
										margin-right: 10px;
									}
					        		</style>";
					        echo '<div class="banner-caption-top">'.$banner_caption_top.'</div>

					        ';
					    endwhile;

					else :

					    // no rows found

					endif;

					?>

          </div>
        </div>
        <div class="col-md-3 col-md-offset-3">


          <?php

					// check if the repeater field has rows of data
					if( have_rows('homepage_items_col_1') ):

					 	// loop through the rows of data
					    while ( have_rows('homepage_items_col_1') ) : the_row();

					        // display a sub field value
			            $block_type = get_sub_field('block_type');
					        $content_type = get_sub_field('content_type');
					        $image = get_sub_field('image');
					        $title = get_sub_field('title');
					        $description = get_sub_field('description');
					        $link_address = get_sub_field('link_address');
					        $link_text = get_sub_field('link_text');

                  // vars
                  $url = $image['url'];

                  $alt = $image['alt'];
                  $caption = $image['caption'];

                  // thumbnail
                  $thumb = $image['sizes']['large'];

					        echo '<div class="homepage-item '.$block_type.' '. $content_type.'">';

                  if ($block_type == "caption"){
                  ?>

                    <?php if($image != "") {

                    ?>
                      <div class="image">
                          <img src="<?php echo $thumb; ?>" />
                      </div>
                    <?php } ?>

                    <?php if($title != "") { ?>
                      <div class="text">
  	                    <?php echo $title; ?>
  	                  </div>
                    <?php } ?>

                  <?php
					        }
					        if ($block_type == "photobox"){
                  ?>

                    <?php if($image != "") { ?>
                      <div class="image">
                          <img src="<?php echo $thumb; ?>" />
                      </div>
                    <?php } ?>


                    <div class="text">
                      <?php if($title != "") { ?>
                        <a href="<?php echo $link_address; ?>"  <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><h1><?php echo $title; ?></h1></a>
                      <?php } ?>
                      <?php if ($description != "") { ?>
                        <p><?php echo $description ?></p>
                      <?php } ?>
                      <?php if (($link_address != "") && ($link_text != "")) { ?>
                        <p><a href="<?php echo $link_address; ?>"  <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><?php echo $link_text; ?> &raquo;</a></p>
                      <?php } ?>
                    </div>

                  <?php
		            	}
			            if ($block_type == "color"){
                  ?>

                    <div class="text">

                      <?php if($title != "") { ?>
                        <a href="<?php echo $link_address; ?>"  <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><h1><?php echo $title; ?></h1></a>
                      <?php } ?>
                      <?php if ($description != "") { ?>
                        <p><?php echo $description; ?></p>
                      <?php } ?>
                      <?php if (($link_address != "") && ($link_text != "")) { ?>
                        <p><a href="<?php echo $link_address; ?>"  <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><?php echo $link_text; ?> &raquo;</a></p>
                      <?php } ?>
                    </div>

                  <?php
		            	}

                  echo '</div>';

					    endwhile;

					else :

					    // no rows found

					endif;

					?>

            </div>
            <div class="col-md-3">


        				<?php

        				// check if the repeater field has rows of data
        				if( have_rows('homepage_items_col_2') ):

        				 	// loop through the rows of data
        				    while ( have_rows('homepage_items_col_2') ) : the_row();

        				        // display a sub field value
        		            $block_type = get_sub_field('block_type');
        				        $content_type = get_sub_field('content_type');
        				        $image = get_sub_field('image');
        				        $title = get_sub_field('title');
        				        $description = get_sub_field('description');
        				        $link_address = get_sub_field('link_address');
        				        $link_text = get_sub_field('link_text');

                        // vars
                      	$url = $image['url'];

                      	$alt = $image['alt'];
                      	$caption = $image['caption'];

                      	// thumbnail
                      	$thumb = $image['sizes']['large'];

        				        echo '<div class="homepage-item '.$block_type.' '. $content_type.'">';

                        if ($block_type == "caption"){
                        ?>

                          <?php if($image != "") { ?>
                            <div class="image">
                                <img src="<?php echo $thumb; ?>" />
                            </div>
                          <?php } ?>

                          <?php if($title != "") { ?>
                            <div class="text">
        	                    <?php echo $title; ?>
        	                  </div>
                          <?php } ?>

                        <?php
        				        }
        				        if ($block_type == "photobox"){
                        ?>

                          <?php if($image != "") { ?>
                            <div class="image">
                                <img src="<?php echo $thumb; ?>" />
                            </div>
                          <?php } ?>




                          <div class="text">
                            <?php if($title != "") { ?>
                              <h1><?php echo $title; ?></h1>
                            <?php } ?>
                            <?php if ($description != "") { ?>
                              <p><?php echo $description ?></p>
                            <?php } ?>
                            <?php if (($link_address != "") && ($link_text != "")) { ?>
                              <p><a href="<?php echo $link_address; ?>"  <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><?php echo $link_text; ?> &raquo;</a></p>
                            <?php } ?>
                          </div>

                        <?php
        	            	}
        		            if ($block_type == "color"){
                        ?>

                          <div class="text">

                            <?php if($title != "") { ?>
                              <h1><?php echo $title; ?></h1>
                            <?php } ?>
                            <?php if ($description != "") { ?>
                              <p><?php echo $description; ?></p>
                            <?php } ?>
                            <?php if (($link_address != "") && ($link_text != "")) { ?>
                              <p><a href="<?php echo $link_address; ?>"  <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><?php echo $link_text; ?> &raquo;</a></p>
                            <?php } ?>
                          </div>

                        <?php
        	            	}

                        echo '</div>';

        				    endwhile;

          				else :

          				    // no rows found

          				endif;

        				?>
        				<?php endwhile; // end of the loop. ?>


          </div>
    </div>
</div>


<?php get_footer(); ?>
