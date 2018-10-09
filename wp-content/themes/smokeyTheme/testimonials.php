<!-- template part -->

<!-- Begin Testimonials -->


<section>
    <div id="testimonials">
    <div class="anchor" id="a-testimonials"></div>

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
  </div>
</section>

<!-- End Testimonials -->
