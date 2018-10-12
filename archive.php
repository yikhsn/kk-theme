<?php get_header(); ?>

	<div class="body-cody">
		<div class="row no-gutters">
			<div class="col-lg-9 col-sm-12 col-12">
				<div class="body-content">
				<?
					if ( have_posts() ) { ?>
					
					<!-- <p>
						<?php
							if(is_category()){
								echo "Halaman Kategori "; single_cat_title();
							}
							elseif(is_author()){
								echo "Halaman Author " . get_the_author();
							}
							else{
								echo "Halaman Archive";
							}
						?>
					</p> -->

				<?
					while( have_posts()) {
						the_post();
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
					echo "Tidak ada Post";
				}

				wp_reset_postdata();
				?>
			</div>
			<div class="col-lg-3 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar1'); ?>				
				</div>
			</div>
		</div>
	</div>
</div>
<? get_footer(); ?>