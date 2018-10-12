<?php
    function mytheme_comment($comment, $args, $depth) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }?>
        
        <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
        if ( 'div' != $args['style'] ) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
        } ?>
            <?php 
                if ( $args['avatar_size'] != 0 ) {
                    $args['avatar_size'] = 150;
            ?>                     
                <div class="comment-author-avatar">
                    <?
                        echo get_avatar( $comment, $args['avatar_size'] );                             
                    ?>
                </div>
            <?
                }
            ?>
                <div class="comment-content">
                    <div class="comment-author-name">
                        <? echo '<cite class="fn">' . get_comment_author() . '</cite>'; ?>
                    </div>

                <?php 
                    if ( $comment->comment_approved == '0' ) { ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Komentar anda sedang menunggu persetujuan.' ); ?></em><br/><?php 
                    } ?>
            
                    <div class="comment-meta commentmetadata">
                        <?php
                            /* translators: 1: date, 2: time */
                            printf( get_comment_date());
                        ?>
                    </div>

                    <div class="comment-text">
                        <?php comment_text(); ?>                                            
                    </div>
            
                    <div class="reply">
                    <?php 
                        comment_reply_link( 
                            array_merge( 
                                $args, 
                                array( 
                                    'add_below' => $add_below, 
                                    'depth'     => $depth, 
                                    'max_depth' => $args['max_depth'] 
                                ) 
                            ) 
                        );
                    ?>
                    </div>
                </div>
        <?php 
        if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php 
        endif;
    }
?>