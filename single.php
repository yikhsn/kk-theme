<?php
	get_header();
	setPostViews(get_the_ID());
?>
	<div class="body-cody">
		<div class="row no-gutters">
			<main class="col-lg-9 col-md-8 col-sm-12 col-12">
				<article class="single-page">
					<div class="row no-gutters">
						<?
						if ( have_posts() ) {
							while( have_posts()) {
								the_post(); ?>
									<div class="col-12">
										<h1 class="title-single-page"><? the_title(); ?></h1>
										<div class="row no-gutters">
											<div class="col-6">
												<div class="category-single-page">
													<?php
														$category = get_the_category();
														$firstCategory = $category[0]->cat_name;
														$linkFirstCategory = get_category_link($category[0]->cat_ID);

														?>
														<a href="<? echo esc_url($linkFirstCategory); ?>">
															<!-- <span> <? echo $firstCategory; ?></span> -->
														</a>
												</div>											
											</div>
											<div class="col-6">
												<div class="social-share-single">
													<div class="social-single-button twitter-share">
													</div>
													<div class="social-single-button facebook-share">
													</div>
													<div class="social-single-button linkedin-share">
													</div>
													<div class="social-single-button pinterest-share">
													</div>											
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-12">
										<div class="single-page-thumbnail">
											<?
												the_post_thumbnail();
											?>	
										</div>
									</div>
									
									<div class="col-12">								
										<div class="paragraph-single-page">
											<? the_content(); ?>
										</div>
									</div>

									<div class="col-12">
										<?
										echo '<div class="navigation-single">'; 
										wp_link_pages( array(
											'before' => '<ul class="pagination pagination-sm">',
											'after' => '</ul>',
											'link_before' => '<li class="page-link">',
											'link_after' => '</li>',
											'current_before' => '<a><li class="page-link active-sudoway">',
											'current_after' => '</li></a>',
										) );
										echo '</div>';
										?>
									</div>


									<div class="col-12">
										<div class="single-page-tags">
											<?php
												$posttags = get_the_tags();
												if ($posttags) {
													foreach($posttags as $tag) {
											?>
												<a href="<? echo get_tag_link($tag->term_id); ?>">
												<span class="single-tags-post">
													<? echo $tag->name; ?>
												</span>
												</a>
											<?	 
													}
												}
											?>
										</div>								
									</div>

									<div class="col-12">
										<div class="single-page-author-post">
											<div class="row no-gutters">
												<div class="col-4 col-md-2">
													<div class="author-post-avatar">
														<?
															echo get_avatar(get_the_author_meta('ID'), '150');
														?>
													</div>	
												</div>

												<div class="col-8 col-md-10">
													<div class="author-post-meta">
														<div class="author-post-name">
															<?
																the_author_posts_link();
															?>
														</div>
														<div class="author-post-link">
															<? if ( get_the_author_meta('user_url') ) { ?>
																<a href="<? the_author_meta('user_url'); ?>">
																	(
																	<?
																		echo str_replace('http://', '', get_the_author_meta('user_url'));
																	?>
																	)
																</a>
															<? } ?>
														</div>
														<div class="author-post-desc">
															<?
																the_author_description();
															?>
														</div>

														<div class="author-contribution">
															
															<div class="row">
																<div class="col-6">

																</div>
	
																<div class="col-6">
																	
																</div>
															</div>

														</div>

														<div class="author-socials">
															<?php if (get_the_author_meta('github')) { ?>
																<a href="<?php echo "https://www.github.com/" . get_the_author_meta('github') ?>">
																	<div class="author-social-github author-social">
																		<img src="<? echo get_template_directory_uri();?>/img/author-social/github.svg" alt="">
																	</div>
																</a>
															<?php } ?>

															<?php if (get_the_author_meta('linkedin')) { ?>
																<a href="<?php echo "https://www.linkedin.com/" . get_the_author_meta('linkedin') ?>">
																	<div class="author-social-linkedin author-social">
																		<img src="<? echo get_template_directory_uri();?>/img/author-social/linkedin.svg" alt="">

																	</div>
																</a>
															<?php } ?>

															<?php if (get_the_author_meta('facebook')) { ?>
																<a href="<?php echo "https://www.facebook.com/" . get_the_author_meta('facebook') ?>">
																	<div class="author-social-facebook author-social">
																		<img src="<? echo get_template_directory_uri();?>/img/author-social/facebook.svg" alt="">
																	</div>
																</a>
															<?php } ?>

															<?php if (get_the_author_meta('twitter')) { ?>
																<a href="<?php echo "https://www.twitter.com/" . get_the_author_meta('twitter') ?>">
																	<div class="author-social-twitter author-social">
																		<img src="<? echo get_template_directory_uri();?>/img/author-social/twitter.svg" alt="">
																	</div>
																</a>
															<?php } ?>

															<?php if (get_the_author_meta('instagram')) { ?>
																<a href="<?php echo "https://www.instagram.com/" . get_the_author_meta('instagram') ?>">
																<div class="author-social-instagram author-social">
																		<img src="<? echo get_template_directory_uri();?>/img/author-social/instagram.svg" alt="">
																	</div>
																</a>
															<?php } ?>
														</div>
													</div>
												</div>									
											</div>
										</div>
									</div>

									<div class="col-12">
										<div id="ads-top">
											<div class="row no-gutters">
												<?php dynamic_sidebar('sidebar-top'); ?>															
											</div>
										</div>
									</div>

									<div class="col-12">
										<?php dynamic_sidebar('single-side'); ?>
									</div>

									<!-- This not styling yet, i bet i dont need it for now -->
									<div class="col-12">
											<div class="comment-sudoway">
												<?
												if ( comments_open() || get_comments_number() ) {
															comments_template();
												}
												?>
											</div>
									</div>
						<?
							} 
						}			
						?>
					</div>	
				</article>
			</main>
			<aside class="col-lg-3 col-md-4 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar1'); ?>				
				</div>
			</aside>
		</div>
	</div>
  
<? get_footer(); ?>