<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46432156-11', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'before' ); ?>

<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
						<div class="top-nav">
							<?php wp_nav_menu( array( 'theme_location' => 'topmenu' ) ); ?>
						</div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-12 logobox menu">
					<div class="main-nav">
						<div class="navbar-header">
							<a href="<?php echo home_url(); ?>" class="navbar-brand">
								<img src="<?php bloginfo('template_directory');?>/img/wvhc-logo.png">
							</a>
						</div>
			    	<div id="navbar" class="navbar">
			    		<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'nav navbar-nav', 'walker' => new wp_bootstrap_navwalker() ) ); ?>
							<div class="mobile-nav">
								<span class="menu-icon">Menu</span>
								<span class="close-icon" style="display:none;"><i class="fa fa-times"></i></span>
							</div>
			    		<a href="http://www.wvencyclopedia.org/" target="_blank" class="ewv-link ewv-desktop">e-WV</a>
          	</div><!--/.nav-collapse -->

					</div>
					<div class="full-mobile-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'nav navbar-nav', 'walker' => new wp_bootstrap_navwalker() ) ); ?>
					</div>
					<div class="small-mobile-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'nav navbar-nav' ) ); ?>
						<div class="ewv-mobile">
							<a href="http://www.wvencyclopedia.org/" target="_blank" class="ewv-link">e-WV</a>
						</div>
					</div>
	    	</div>
	    </div>
	</div>
</nav>
