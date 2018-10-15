<section class="single-posts">
  <div class="row no-gutters">
    <div class="col-5 col-md-5">
      <div class="post-thumbnail">
        <a href="<? the_permalink(); ?>">
          <div class="image-thumbnail">
            <?
            the_post_thumbnail();
            ?>
          </div>
        </a>
      </div>
    </div>
    <div class="col-7 col-md-7">
      <div class="post-content">
        <h3 class="title-post"><a href="<? the_permalink(); ?>"> <? the_title(); ?></a></h3>
        <p class="desc-post">
          <?= get_the_excerpt(); ?>
        </p>
        <div class="meta-post">
          <p class="meta-post-author">
            <a href="<? echo get_author_posts_url(get_the_author_meta('ID')); ?>">
              <? the_author(); ?>
            </a>
          </p>
          <p class="meta-post-operator">
            &#149;
          </p>
          <p class="meta-post-time">
            <? the_time ('F j, Y');?>
          </p>
        </div>
      </div>  
    </div>
  </div>
</section>