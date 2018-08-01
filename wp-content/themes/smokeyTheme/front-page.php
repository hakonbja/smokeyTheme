<?php get_header();?>

  <main>
    <section id="general-info">
      <div class="container">
        <h1><?php bloginfo('name')?></h1>
        <h2><?php bloginfo('description')?></h2>
        <div class="date-location fade-in fade-early">
          <div class="date">
            <i class="fas fa-calendar-check"></i>
            <h5>May 23 - 27, 2019</h5>
          </div>
          <div class="location">
            <i class="fas fa-map-marker-alt"></i>
            <h5>Amsterdam</h5>
          </div>
        </div>
        <div class="reg-opens fade-in fade-late">
            <h2>Registration&nbsp;opens in&nbsp;January&nbsp;2019</h2>
        </div>
        <div class="signup-form">

        </div>
      </div>
    </section>

    <div class="parallax"></div>

    <section id="testimonials">
      <div class="container">
        <h3>See&nbsp;what&nbsp;others said&nbsp;about Smokey&nbsp;Feet</h3>
        <div class="testimonialSlides">

          <?php
          $testimonials_query = new WP_Query( array (
            'post_type' => 'testimonials',
            'posts_per_page' => '-1',
            'orderby' => 'rand',
            )
          );
          if ($testimonials_query->have_posts()) {
            while ($testimonials_query->have_posts()) {
              $testimonials_query->the_post();
              $object = get_post();
              $author = get_post_meta($object->ID, 'q_author', true);
              ?>
              <div class="testimonial">
                <h1 class="quote"><q><?php the_title(); ?></q></h1>
                <?php if ($author) {
                  ?> <h4 class="author"><?php echo $author ?></h4> <?php
                } else {
                  ?> <h4 class="author">Anonymous</h4> <?php
                }
                ?>
              </div>
              <?php
            }
          }
          wp_reset_postdata();
          ?>

        </div>
      </div>
    </section>

    <div class="parallax"></div>

    <section>

      <?php get_template_part('mailchimp-signup') ?>

    </section>

  </main>

<?php get_footer(); ?>
