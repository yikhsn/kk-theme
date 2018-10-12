<?php get_header(); ?>

	<div class="body-blog">
		<div class="row no-gutters">
			<div class="col-lg-9 col-sm-12 col-12">
				<div id="content">
			
					<?		
					if ( have_posts() ) { ?>
					
						<?
						while( have_posts()) {
							the_post(); 
							if($post->post_type == 'page') continue;
							get_template_part('content');
						} 
					?>
					</div>
					<div id="pagination-blog">	
						<?
								if ( function_exists('wp_bootstrap_pagination') )
									wp_bootstrap_pagination();
						?>
					</div>
					<?
					}	
					else {
					?>
						<div class="single-post">
							<div class="row no-gutters">
								<div id="error-page">
									<h2 class="error-code">	<? echo "Tidak ada Post";?></h2>
								</div>	
							</div>
						</div>
					</div>			
					<? } ?>
			</div>			
			<div class="col-lg-3 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar1'); ?>				
				</div>
			</div>
		</div>
	</div>

<? get_footer(); ?>