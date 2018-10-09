<!--
/*
 * Template Name: artists
 * Template for custom post types of 'Artists'
 */
 -->

 <?php get_header();?>
<main>
  <div id="all-artists" class="container">
    <h1 class="heading">Artists</h1>
    <div class="filter">
      <div class="teacher btn active">
        <p>Teachers</p>
      </div>
      <div class="band btn active">
        <p>Bands</p>
      </div>
      <div class="dj btn active">
        <p>DJs</p>
      </div>
      <div class="other btn active">
        <p>Other</p>
      </div>
    </div>
    <div class="circles artists">

      <?php
      $artists_query = new WP_Query( array (
        'post_type' => 'artists',
        // 'orderby' => 'rand',
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
        $artists_query->the_post();
        $role = get_post_meta(get_the_ID(), 'role', true)?>

        <div class="circle artist active <?php echo strtolower($role) ?>">
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

  </div>
</main>

 <?php get_footer(); ?>
