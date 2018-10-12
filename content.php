<div class="single-posts">
  <div class="row no-gutters">
    <div class="col-5 col-md-5">
      <div class="post-thumbnail">
        <a href="<? the_permalink(); ?>">
          <?
          $image_data =  wp_get_attachment_image_src(the_post_thumbnail('medium'));
          $image_url = $image_data[0];
          echo 
          '<div class="image-thumbnail" 
          style="background-image: url(' . $image_url . ')"
          >
          </div>';
          ?>
        </a>
      </div>
    </div>
    <div class="col-7 col-md-7">
      <div class="post-content">
        <h3 class="title-post"><a href="<? the_permalink(); ?>"> <? the_title(); ?></a></h3>
        <p class="desc-post">
          <?= get_the_excerpt(); ?>
        </p>
        <div class="row no-gutters">
          <div class="col-6">
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
          <div class="col-6 align-self-center">
            <!-- <div class="category-post"> <?php the_category(' '); ?> </div>                   -->
          </div>
        </div>                         
        </div>
      </div>  
    </div>
  </div>
</div>