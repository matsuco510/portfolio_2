<?php get_header(); ?>

<main class="blog-main main">
  <div class="blog-main__inner inner">
    <div class="blog-main__title--container section__title--container">
      <h1 class="blog-main__title section-title">BLOG!!</h1>
    </div><!-- /. blog main title container -->
    <div class="blog-main__container">
      <div class="blog-main__items">
      <?php
      if (have_posts()) :
        while(have_posts()) :
          the_post();
      ?>
        <a href="<?php the_permalink($post->ID); ?>" class="blog-main__item">
        <?php
        if (has_post_thumbnail()) {
          echo '<div class="blog__item--img blog-main__item--img blog-main__img">' . get_the_post_thumbnail() . '</div>';
        } else {
          echo '<div class="no-image blog-main__item--no-image blog-main__img"><p class="no-image__text blog-main__item--no-text">no image!!</p></div>';
        }
        ?>
          <h2 class="blog__item--title blog-main__item--title"><?php echo the_title(); ?></h2>
          <div class="blog-main__item--day"><?php echo the_date("Y/m/d"); ?></div>
        </a><!-- /. blog main item -->
        <?php
          endwhile;
        endif;
        ?>
      </div><!--/. blog main items -->
    </div><!-- /. blog main container -->
  </div><!-- /. blog main inner -->
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
</main><!-- /. blog main -->
<?php get_footer(); ?>