<?php get_header(); ?>
  <main class="work-main main">
    <div class="work-main__inner inner">
      <div class="work-main__title--container section__title--container">
        <h1 class="work-main__title section-title">WORK LISTS!!</h1>
      </div><!-- /. work main title container -->
      <div class="work__items">
      <?php
          if (have_posts()) :
            while(have_posts()) :
              the_post();
          ?>
        <a href="<?php the_permalink(); ?>" class="work__item">
        <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail('my_thumbnail');
          } else {
            echo '<div class="no-image"><p class="no-image__text">no image!!</p></div>';
          }
        ?>
        </a>
        <?php
            endwhile;
          endif;
        ?>
      </div><!-- /. work items -->
    </div><!--/. work main inner -->
    <?php if (paginate_links()) : ?>
    <div class="pagination">
    <?php
      echo paginate_links(
        array(
          'end_size' => 1,
          'mid_size' => 1,
          'prev_next' => true,
          'prev_text' => '<div class="pagination-prev">prev</div>',
          'next_text' => '<div class="pagination-next">next</div>'
        )
      );
      ?>
    </div><!-- /. pagination -->
    <?php endif; ?>
  </main><!-- /. work main -->

<?php get_footer(); ?>