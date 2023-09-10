<?php get_header(); ?>
<div id="main-visual">
  <div class="main-visual__container">
    <div class="main-visual__contents--img">
      <img src="<?php echo get_template_directory_uri()?>/image/main-visual.png" alt="">
    </div><!-- /. main visual img -->
  </div><!-- /. main visual container -->
</div><!--/# main visual -->

<main>
  <section id="about" class="section">
    <div class="about__inner inner">
      <div class="about__container">
        <div class="about__contents">
          <div class="about__title--container section-title__container">
            <h1 class="about__title section-title">
              <span>A</span>
              <span>B</span>
              <span>O</span>
              <span>U</span>
              <span>T</span>
            </h1>
          </div>
          <div class="about__contents--item is-sp__flex">
            <dt>FROM</dt>
            <dd>みやざき県 / 女 </dd>
          </div>
          <div class="about__contents--item is-sp__flex">
            <dt>NOW</dt>
            <dd>アルバイトしながら案件募集中</dd>
          </div>
          <div class="about__contents--item">
            <dt>STUDIES</dt>
            <dd>HTML / CSS(Sass) / JavaScript / WordPress(未だ勉強中)</dd>
          </div>
          <div class="about__contents--item">
            <dt>HISTORY</dt>
            <dd>
              2024.1 / アルバイトをしながら、<br>
              本格的にweb制作の学習を始める。<br>
              2024.7 / ポートフォリオ完成。(第一作目)<br>
              2024.8 / 活動開始。<br>
            </dd>
          </div><!-- /. about contents item -->
        </div><!-- /. about contents -->
        <div class="about__contents--item about__message">
          <dt>MESSAGE</dt>
          <dd>
            はじめまして。<br>
            ポートフォリオをご覧いただきありがとうございます。<br>
            web制作は、デザインを1から再現する楽しさを知りました。
            技術面もまだまだかと思います。
            だからこそ、いろんなデザインのサイトを作りたいのです。<br>
            <span>それが楽しいのです。</span><br>
            <span>わくわくするのです。</span><br>
            しゅしゅしゅっと、お届けできるよう
            毎日練習しています。<br>
            よろしくお願いします。<br>
          </dd>
        </div><!-- /. about contents item -->
      </div><!-- /. about container -->
    </div><!-- /. about inner -->
  </section><!-- /# about -->

  <section id="work" class="section">
    <div class="work__inner inner">
      <div class="work__title--container section-title__container">
        <div class="work__title--item">
          <h1 class="work__title section-title">
          <span>W</span>
          <span>O</span>
          <span>R</span>
          <span>K</span>
          </h1>
          <p class="work__text section-title__text">
            私のコーティングを見ていくが...調子乗りました。<br class="is-sp">是非、見ていってください。
          </p>
        </div><!-- /. work title item -->
        <div class="more-btn is-pc">
          <a href="<?php echo get_post_type_archive_link('work'); ?>" class="more">view more!!</a>
        </div><!-- /. more btn -->
      </div><!-- /. work title container -->
      <?php 
      $args = array(
        'post_type' => 'work',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $work_posts = get_posts($args);
      ?>
      <div class="work__items">
      <?php foreach ($work_posts as $post) : setup_postdata($post); ?>
        <a href="<?php echo get_permalink($post->ID);?>" class="work__item">
        <?php
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumb_url = wp_get_attachment_image_src($thumbnail_id);
        if (get_post_thumbnail_id($post->ID)) {
          the_post_thumbnail();
        } else {
          echo '<img src="' .get_template_directory_uri() . '">';
        }
        ?>
        </a><!-- /. work item -->
      <?php endforeach; ?>
      </div><!-- /. work items -->
      <div class="more-btn blog__more-btn is-sp">
        <a href="<?php echo get_post_type_archive_link('work'); ?>" class="more">view more!!</a>
      </div>
    </div><!-- /. work inner -->
  </section><!-- /# work -->

  <section id="blog" class="section">
    <div class="blog__inner inner">
      <div class="blog__wrap">
        <div class="blog__title--container section-title__container">
          <h1 class="blog__title section-title">
          <span>B</span>
          <span>L</span>
          <span>O</span>
          <span>G</span>
          </h1>
          <p class="blog__sub-title section-title__text">
            何気ないことも、お仕事のこともわたしの世界観でお伝えします。 <br>
            この人って、こんな人なんだあとわかるぶろぐ。
          </p>
        </div><!-- /. blog title container -->
        <div class="blog__img is-pc">
          <img src="<?php echo get_template_directory_uri()?>/image/blog.png" alt="">
        </div><!-- /. blog img -->
        <div class="more-btn blog__more-btn is-pc is-pc__tb">
          <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="more">view more!!</a>
        </div><!-- /. blog more btn -->
      </div><!-- /. blog wrap -->
      <div class="swiper">
        <?php
        $slideargs = array(
          'post_type' => 'blog',
          'orderby' => 'DESC',
          'posts_per_page' => 5,
        );
        $slider_query = new WP_Query($slideargs);
        ?>
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
        <?php if ($slider_query->have_posts()) : ?>
          <?php while ($slider_query->have_posts()) :?>
          <?php $slider_query->the_post(); ?>

          <!-- Slides -->
          <a href="<?php echo get_permalink($post->ID); ?>" class="swiper-slide blog__item">
            <?php 
            if (get_the_post_thumbnail()) {
              echo '<div class="blog__item--img">' . get_the_post_thumbnail() . '</div>';
            } else {
              echo '<div class="no-image"><p class="no-image__text">no image!!</p></div>';
            }
            ?>
            <h2 class="blog__item--title"><?php echo the_title(); ?></h2>
            <div class="blog__item--day"><?php echo the_date("Y/m/d"); ?></div>
          </a>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        </div><!-- /. swiper wrapper -->
      </div><!-- /. swiper -->
      <div class="more-btn blog__more-btn is-tb is-sp">
        <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="more">view more!!</a>
      </div>
    </div><!-- /. blog inner -->
  </section><!-- /# blog -->

  <section id="contact" class="section">
    <div class="contact__inner inner">
      <div class="contact__title--container section-title__container">
        <h1 class="contact__title section-title">CONTACT</h1>
      </div><!-- /. contact title container -->
      <form action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSfMqrATFDUO611Ls5dTCnnXIBijVyj9yc_GQ4BSU5kK0QZEnA/formResponse" method="post" class="contact__form" id="js-form">
        <p class="contact__text">全ての項目にご入力してください。</p><!-- /. contact text -->
        <div class="contact__form--rows">
          <div class="contact__form--row">
            <label for="name">name</label>
            <input type="text" name="entry.549221165" placeholder="名前" required>
          </div><!-- /. contact form row -->
          <div class="contact__form--row">
            <label for="mail" required>mail address</label>
            <input type="email" name="emailAddress" placeholder="メールアドレス">
          </div><!-- /. contact form row -->
          <div class="contact__form--row contact__select">
            <label for="select">contact details</label>
            <select name="entry.469967852" id="" required>
              <option value="コーディング">コーディング</option>
              <option value="WordPress">WordPress</option>
              <option value="ホームページ修正">ホームページ修正</option>
              <option value="その他">その他</option>
            </select>
          </div><!-- /. contact form row /. contact select -->
          <div class="contact__form--row">
            <label for="message">message</label>
            <textarea name="entry.1854901722" id="" placeholder="メッセージ" required></textarea>
          </div><!-- /. contact form row -->
        </div><!-- /. contact form rows-->
        <input type="submit" class="contact__btn" id="js-submit" value="SEND" disabled>
      </form><!-- /. contact form-->
      <div class="end-message message">
        <h1 class="end-message__title">メッセージが送信されました。</h1>
        <p class="end-message__text">
          ご連絡確認後、2〜3日以内にお問い合わせ頂いたご連絡先に返信いたします。
          もし、2〜3日以内に返信がない場合、お手数ですが再度メッセージをお送りください。
        </p>
      </div><!-- /. end message -->
      <div class="false-message message">
        <h1 class="false-message__title">メッセージが<br class="is-sp">送信されませんでした。</h1>
        <p class="false-message__text">
          メッセージが送信されませんでした。再度、記入していただき送信をお願いいたします。
        </p>
      </div><!-- /. false message -->
    </div><!-- /. contact inner -->
  </section><!-- /# contact -->
</main>
<?php get_footer(); ?>