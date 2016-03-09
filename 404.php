<?php
/**
 * 404 Page Template
 * The template used for displaying 404 Page
 **/
get_header();?>

<style>
html, body{
	height:100%!important;
}
body{
	background:url('<?php bloginfo('template_url'); ?>/img/404_background_1.jpg');
	background-position:center center;
	background-size:cover;
}
</style>

<div class="container container404">
		<div class="row">
			<div class="col-md-6">
				<div class="content404">
				<h1>Page Not Found</h1>
				<p>That page doesn’t exist, or is a broken link.<br>
				Please try another search, or check that the URL you entered is correct. </p>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>