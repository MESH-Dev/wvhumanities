<div class="footer-container">
  <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="footer-block">
            <img src="<?php echo get_template_directory_uri(); ?>/img/online-catalog.png" class="alignleft">
        		<p>Get your West Virginia Encyclopedia and DVD in our <a href="<?php echo get_permalink( get_page_by_title('Online Store') ); ?>" target="_blank">Online Store &raquo;</a></p>
          </div>
        </div>
        <div class="col-md-3 middle">
          <div class="footer-block">
            <ul>
  	        	<li><a href="http://www.wvencyclopedia.org/" target="_blank">e-WV: The West Virginia Encyclopedia &raquo;</a></li>
  	        	<li><a href="<?php echo get_permalink( get_page_by_title('Our Historic Headquarters') ); ?>">Our Historic House &raquo;</a></li>
  	        	<li><a href="<?php echo get_permalink( get_page_by_title('Contact Us') ); ?>">Contact Us &raquo;</a></li>
  	        </ul>
            <small style="font-size: 70%;">&copy; <?php echo date("Y"); ?> All Rights Reserved</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="footer-block last">
            <span class="footer-address">West Virginia Humanities Council<br/>1310 Kanawha Blvd. E, Charleston, West Virginia  25301</span>
          	<span class="footer-phone">304-346-8500 (T) | 304-346-8504 (F)</span>
          </div>
          <div class="search-form">
            <?php get_search_form( ); ?>
          </div>
          <div class="footer-block">
            <small>Website by <a href="http://meshfresh.com">MESH</a></small>
          </div>
        </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55e99e46b263edbb" async="async"></script>

</body>
</html>
