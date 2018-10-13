<?php
  class Recent_Comment_Sudoway extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'recent-comment-sudoway',
        'description' => 'Custom Widget Recent Comment for Sudoway',
      );

      parent::__construct( 'recent-comment', 'Recent Comment Sudoway', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div class="widget widget-post">
        <h3 class="title-widget">Komentar Terakhir</h3>
        <?
        $args = array(
          'status' => 'approve',
          'number' => '5',
          // 'post_id' => 1, // use post_id, not post_ID
        );

        $comments = get_comments($args);
        foreach($comments as $comment){
        ?>
        <div class="content-widget">
          <div class="each-comment-widget">
            <span class="author-comment-widget"> <? echo $comment->comment_author; ?> </span>
            <span class="content-comment-widget">mengatakan "<? echo wp_html_excerpt( $comment->comment_content, 40 ); ?>..." di</span>
            <span class="post-comment-widget"><a href="<? echo get_the_permalink($comment->comment_post_ID); ?>"><? echo get_the_title($comment->comment_post_ID); ?></a></span>
          </div>
        </div>
        <?
        }
        ?>
      </div>
    <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Recent_Comment_Sudoway' ); 
  } );
?>