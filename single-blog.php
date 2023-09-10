<? get_header(); ?>

<main class="main blog-entry">
  <div id="blog-entry">
    <div class="blog-entry__inner inner">
      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>
      <div class="blog-entry__img entry__img">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('my_thumbnail');
        } else {
          echo '<div class="no-image"><p class="no-image__text">no image!!</p></div>';
        }
        ?>
      </div><!-- /. blog entry img -->
      <div class="blog-entry__contents">
        <p class="blog-entry__title"><?php the_title(); ?></p><!-- /. blog entry title -->
        <div class="blog-entry__text">
          <?php the_content(); ?>
        </div><!-- /. blog entry text -->
      </div><!-- /. blog entry contents -->
      <?php
        endwhile;
      endif;
      ?>

    </div><!-- /. blog entry inner -->
  </div><!-- /. blog entry -->
</main><!-- /. main entry -->
<? get_footer(); ?>