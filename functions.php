<?php

    /**
     * Function to add and load CSS and JS assets file
     */
    function theme_style() {
        wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.css' );
        wp_enqueue_style( 'highlight_css', get_template_directory_uri() . '/assets/css//assets/js/highlight.pack.css' );
        wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato' );
        wp_enqueue_style( 'PT Serif', 'https://fonts.googleapis.com/css?family=PT+Serif' );
        wp_enqueue_style('style', get_stylesheet_uri() );
    }

    add_action('wp_enqueue_scripts', 'theme_style');

    function theme_js() {

        global $wp_scripts;
        wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.slim.min.js');
        wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.js');
        wp_enqueue_script( 'highlight_js', get_template_directory_uri() . '/assets/js/highlight.pack.js');        
        wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');
    }
    
    add_action( 'wp_enqueue_scripts', 'theme_js');


    /**
     * 
     */
    add_filter('the_content', function( $content ){
        //--Remove all inline styles--
        $content = preg_replace('/ style=("|\')(.*?)("|\')/','',$content);
        return $content;
    }, 20);

    function get_excerpt_length() {
        return 15;
    }

    
    /**
     * Function to replace read more text on excerpt
     */
    function return_excerpt_text( $more ) {
        return "";
    }

    add_filter('excerpt_more', 'return_excerpt_text');
    add_filter('excerpt_length', 'get_excerpt_length');

    function init_setup(){
        register_nav_menus(array(
            'main_menu' => 'Menu Utama'
        ));
        
        add_theme_support('post-thumbnails');
        add_image_size( 'small_thumb', 600, 400, true );
        // set_post_thumbnail_size( 300, 250, array( 'left', 'top') );

        if ( function_exists( 'add_image_size' ) ) { 
            add_image_size( 'custom-image-thumb', 300, 250, true ); //200 pixels wide and 200 height, true for crop exact size and false for dimensional crop.
        }
    }

    add_action('after_setup_theme', 'init_setup');

    function widget_setup(){
        register_sidebar(array(
            'name' => "Sidebar Pertama",
            'id' => "sidebar1"
        ));

        register_sidebar(array(
            'name' => "Sidebar Kedua",
            'id' => "sidebar2"
        ));

        register_sidebar(array(
            'name' => "Sidebar Ketiga",
            'id' => "sidebar3"
        ));

        register_sidebar(array(
            'name' => "Sidebar Single",
            'id' => "single-side"
        ));

        register_sidebar(array(
            'name' => "Sidebar Top",
            'id' => "single-top"
        ));
    }

    add_action( 'widgets_init', 'widget_setup' );

    function setPostViews($postID) {
        $countKey = 'post_views_count';
        $count = get_post_meta($postID, $countKey, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $countKey);
            add_post_meta($postID, $countKey, '0');
        }else{
            $count++;
            update_post_meta($postID, $countKey, $count);
        }
    }

    function comment_form_hidden_fields()
	{
		comment_id_fields();
		if ( current_user_can( 'unfiltered_html' ) )
		{
			wp_nonce_field( 'unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false );
		}
    }

    function change_my_text( $translated_text, $text, $domain ) {
        if ( $translated_text === "Posts navigation" )
            $translated_text = "";
        return $translated_text;
    }

    add_filter( 'gettext', 'change_my_text', 20, 3 );
    
	add_filter('the_content', 'mte_add_incontent_ad');
    
    function mte_add_incontent_ad($content) {
		if(is_single()){
			$content_block = explode('<h3>',$content);
			for ($ke=0; $ke < 11; $ke++){
				if(!empty($content_block[$ke]))
				{	$content_block[$ke] .= "
							<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\">
							</script>
							<div class=\"d-flex justify-content-center align-items-center\">
							<ins class=\"adsbygoogle adslot_1\"
								 style=\"display:inline-block;width:336px;height:280px\"
								 data-full-width-responsive=\"true\"
								 data-ad-client=\"ca-pub-9201441298846648\"
								 data-ad-slot=\"9498606412\"></ins>
							</div>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>";
				}
			}

			for($i=1;$i<count($content_block);$i++){
				$content_block[$i] = '<h3>'.$content_block[$i];
			}

			$content = implode('',$content_block);
		}
		
		if(is_page()){
			$content_block = explode('<h2>',$content);
			for ($ke=0; $ke < 11; $ke++){
				if(!empty($content_block[$ke]))
				{	$content_block[$ke] .= "
							<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\">
							</script>
							<div class=\"d-flex justify-content-center align-items-center\">
							<ins class=\"adsbygoogle adslot_1\"
								 style=\"display:inline-block;width:336px;height:280px\"
								 data-full-width-responsive=\"true\"
								 data-ad-client=\"ca-pub-9201441298846648\"
								 data-ad-slot=\"9498606412\"></ins>
							</div>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>";
				}
			}

			for($i=1;$i<count($content_block);$i++){
				$content_block[$i] = '<h2>' . $content_block[$i];
			}

			$content = implode('',$content_block);
		}

		return $content;
    }

    /**
     * Funtion to create author social media
     */
    add_filter( 'user_contactmethods','wpse_user_contactmethods', 10, 1 );
    
    function wpse_user_contactmethods( $contact_methods ) {

        $contact_methods['github']  = __( 'Github', 'github');
        $contact_methods['facebook'] = __( 'Facebook', 'facebook');
        $contact_methods['twitter']  = __( 'Twitter', 'twitter');
        $contact_methods['instagram']  = __( 'Instagram', 'instagram');
        $contact_methods['linkedin'] = __( 'LinkedIn', 'linkedin');
        $contact_methods['youtube']  = __( 'YouTube', 'youtube');

        return $contact_methods;
    }

    /**
     * Call a moment system function
     */
    require get_template_directory() . '/inc/main/comment_system.php';


    /** 
     * Call a modular widget function
     * */
    require get_template_directory() . '/inc/widget/widget_recent_post.php';
    require get_template_directory() . '/inc/widget/widget_popular_post.php';
    require get_template_directory() . '/inc/widget/widget_recent_comment.php';
    require get_template_directory() . '/inc/widget/sidebar_related_post.php';  
    require get_template_directory() . '/inc/widget/sidebar_ads_300.php';
    require get_template_directory() . '/inc/widget/sidebar_ads_600.php';
    require get_template_directory() . '/inc/widget/widget_subscribe.php';

    /** 
     * Call a modular pagination function
     * */
    require get_template_directory() . '/inc/wp_pagination.php';

?>