<?php

  // check if the repeater field has rows of data
  if( have_rows('sidebar_boxes') ):

     // loop through the rows of data
      while ( have_rows('sidebar_boxes') ) : the_row();

          // display a sub field value
      $sidebar_image = get_sub_field('sidebar_image');
      $sidebar_heading = get_sub_field('sidebar_heading');
      $sidebar_text = get_sub_field('sidebar_text');
      $sidebar_link_url = get_sub_field('sidebar_link_url');
      $sidebar_link_text = get_sub_field('sidebar_link_text');
      $sidebar_color = get_sub_field('sidebar_color');

      // vars
      $url = $sidebar_image['url'];
      $title = $sidebar_image['title'];
      $alt = $sidebar_image['alt'];
      $caption = $sidebar_image['caption'];

      // thumbnail
      $thumb = $sidebar_image['sizes']['large'];

      ?>

          <div class="photobox <?php echo $sidebar_color; ?>">
            <div class="landingpage-item">
              <?php if($sidebar_image != "") { ?>

                <div class="image">
                  <img src="<?php echo $thumb; ?>">
                </div>

              <?php } ?>

              <?php if($sidebar_heading != "") { ?>

                <div class="text">
                  <a href="<?php echo $sidebar_link_url; ?>" <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><h1><?php echo $sidebar_heading; ?></h1></a>
                  <p><?php echo $sidebar_text; ?></p>

                  <?php if ($sidebar_link_text != "") { ?>

                    <p><a href="<?php echo $sidebar_link_url; ?>" <?php if (get_sub_field('open_in_new_tab')) { echo "target='_blank'"; } ?>><?php echo $sidebar_link_text; ?> &raquo;</a></p>

                  <?php } ?>
                </div>

              <?php } ?>
            </div>
          </div>

      <?php

      endwhile;

  else :

      // no rows found

  endif;
?>
