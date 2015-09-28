<?php
/**
 * The Default Page Template
 *
**/
get_header();?>

<style>
		.jumbotron {
			background: url("http://humanities.bkfk-t5yk.accessdomain.com/wp-content/uploads/2015/04/Bear-Rocks-DEF1.jpg");
			min-height: 400px;
			background-position: right center;
			background-size: cover;
		}
</style>

<div class="jumbotron">
  <div class="container">
		<div class="row">



    </div>
  </div>
</div>

<?php

if (wp_get_post_parent_id(get_the_ID()) == get_page_by_title('Grants')->ID || get_page_by_title('Grants')->ID == get_the_ID()) {
	$color = 'forest';
} elseif (wp_get_post_parent_id(get_the_ID()) == get_page_by_title('Programs')->ID || get_page_by_title('Programs')->ID == get_the_ID()) {
	$color = 'sand';
} else {
	$color = 'kokoda';
}

?>

<div class="titlebar <?php echo $color; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Search Results</h1>
			</div>
		</div>
	</div>
</div>

<div class="container content-container">

  <!-- Example row of columns -->
  <div class="row">

    <div class="col-md-8">

      <?php if ( have_posts() ) : ?>

  			<header class="page-header">
  				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
  			</header><!-- .page-header -->

  			<?php
  			// Start the loop.
  			while ( have_posts() ) : the_post(); ?>

          <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

          <br/>

  				<?php
  				/*
  				 * Run the loop for the search to output the results.
  				 * If you want to overload this in a child theme then include a file
  				 * called content-search.php and that will be used instead.
  				 */

  				the_excerpt();


          echo "<hr/>";

  			// End the loop.
  			endwhile;

  			// Previous/next page navigation.
  			the_posts_pagination( array(
  				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
  				'next_text'          => __( 'Next page', 'twentyfifteen' ),
  				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
  			) );

				else :

				?>

				<header class="page-header">
  				<h1 class="page-title"><?php printf( __( 'No search results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
  			</header><!-- .page-header -->

				<?php

  		endif;
  		?>


		</div>

    <div class="col-md-4">

			<div class="search-form side-search">
				<?php get_search_form( ); ?>
			</div>

    </div>
  </div>
</div>

<?php get_footer(); ?>
