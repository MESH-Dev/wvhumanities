<?php
/**
 * The Default Page Template
 *
**/
get_header();?>

<?php get_template_part('partials/header', 'jumbotron'); ?>

<div class="container content-container">

  <div class="row">
    <div class="col-md-12">
      <?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
      <hr>
    </div>
  </div>

  <!-- Example row of columns -->
  <div class="row">

    <div class="col-md-8">
			<?php the_content(); ?>

 
      <div class="addthis_sharing_toolbox"></div>
		</div>

    <div class="col-md-4">

      <?php get_template_part('partials/sidebar', 'boxes'); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
