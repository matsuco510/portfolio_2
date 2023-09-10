<?php get_header(); ?>

<main class="main work-entry">
  <div id="work-entry">
    <div class="work-entry__inner inner">
    <?php
    if (have_posts()) :
      while(have_posts()) :
        the_post();
    ?>
      <div class="work-entry__left-container">
        <div class="work-entry__img entry__img">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'my_thumbnail' );
          } else {
            echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
          }
        ?>
        </div>
        <div class="work-entry__contents">
          <p class="work-entry__title"><?php the_title(); ?></p>
          <div class="work-entry__items">
            <div class="work-entry__table">
              <?php if (get_field('client')) : ?>
              <dl>
                <dt>クライアント名</dt>
                <dd><?php the_field('client'); ?></dd>
              </dl>
              <?php endif; ?>
              <?php if (get_field('access')) : ?>
              <dl>
                <dt>アクセス</dt>
                <dd><a href="<?php echo the_field('access'); ?>" class="work-entry__access"><?php the_field('access'); ?></a></dd>
              </dl>
              <?php endif; ?>
              <?php if (get_field('description')) : ?>
              <dl>
                <dt>説明</dt>
                <dd><?php the_field('description'); ?></dd>
              </dl>
              <?php endif; ?>
              <?php if (get_field('language used')) : ?>
              <dl>
                <dt>使用言語</dt>
                <dd><?php the_field('language used'); ?></dd>
              </dl>
              <?php endif; ?>
            </div><!-- /. work entry table -->
          </div><!-- /. work entry items-->
        </div><!-- /. works entry contents -->
      </div><!--/. work entry left container -->
      <div class="work-entry__right-container is-pc">
        <div class="work-entry__content">
          <?php the_content(); ?>
        </div><!-- /. works entry content-->
      </div>
      <?php
        endwhile;
      endif;
      ?>

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
    </div><!-- /. work entry inner -->
  </div><!-- /. work entry -->
</main>
<?php get_footer(); ?>