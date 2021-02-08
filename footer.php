<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

    <footer class="main-section">
        <div class="sub-section">
            <div class="container footer-menu">
                <?php
                    if(is_active_sidebar('sidebar-2')){
                        dynamic_sidebar('sidebar-2');
                    }
                ?>
            </div>
        </div>
    </footer>

    <div class="main-section social-media">
        <div class="sub-section">
            <div class="container">
                <?php
                    if(is_active_sidebar('sidebar-3')){
                        dynamic_sidebar('sidebar-3');
                    }
                ?>    
                <div class="social-media-right">
                &copy; <?php  $thisYear = (int)date('Y'); echo $thisYear;?> Kepya - AGRO MARKETPLACE, SA. All rights reserved.
                </div>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>
<script src='<?php echo get_template_directory_uri();?>/js/bootstrap.min.js'></script>
<script type='text/javascript' src="<?php echo get_template_directory_uri();?>/js/scripts.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    jQuery('.menu').responsiveMenu({
        breakpoint: '1200'
    });
});
document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages;    

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".lazybg");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.classList.remove("lazybg");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
  } else {  
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".lazybg");
    
    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }    

      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazybg');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
      }, 20);
    }

    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
  }
})
</script>
<script>
function menuright() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>