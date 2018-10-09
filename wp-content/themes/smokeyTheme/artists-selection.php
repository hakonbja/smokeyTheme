<!-- template part -->

<!-- Begin Artists Selection -->


<section>
  <div id="artists-selection">
  <div class="anchor" id="a-artists-selection"></div>

    <div class="container">
      <h1 class="heading">Artists</h1>
      <h4 class="subheading">Check out some of our artists</h4>
      <div class="circles artists">

        <?php
        $artists_query = new WP_Query( array (
          'post_type' => 'artists',
          'posts_per_page' => '3',
          'orderby' => 'rand',
          'meta_query' => array(
              array(
                'key' => 'show-front',
                'value' => 'yes',
              ),
            )
          )
        );
        if ( $artists_query->have_posts() ) {
          while ( $artists_query->have_posts() ) {
          $artists_query->the_post(); ?>

          <div class="circle artist fade-in fade-early">
            <a href="<?php the_permalink(); ?>">
              <?php if(the_post_thumbnail()) {
                the_post_thumbnail('medium');
              } ?>
              <div class="overlay">
                <div class="text">
                  <h4><?php the_title() ?></h4>
                </div>
              </div>
            </a>
          </div> <?php
          }
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>

      </div>
      <h4 class="link"><a href="<?php echo home_url(); ?>/artists">Or see them all here</a></h4>
    </div>
  </div>
</section>
<!-- End Artists Selection -->
