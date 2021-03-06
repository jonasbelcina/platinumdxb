<?php 
$blog_show_date = dh_get_theme_option('blog-show-date',1);
$blog_show_comment = dh_get_theme_option('blog-show-comment',1);
$blog_show_category = dh_get_theme_option('blog-show-category',1);
$blog_show_tag = dh_get_theme_option('blog-show-tag',1);
$blog_show_author = dh_get_theme_option('blog-show-author',1);
$main_class = dh_get_main_class();
?>
<?php get_header() ?>
	<div class="content-container">
		<div class="<?php dh_container_class() ?>">
			<div class="row">
				<?php do_action('dh_left_sidebar')?>
				<?php do_action('dh_left_sidebar_extra')?>
				<div class="<?php echo esc_attr($main_class) ?>" data-itemprop="mainContentOfPage" role="main">
					<div class="main-content">
					<?php if ( have_posts() ) : ?>
						<?php 
						 while (have_posts()): the_post();
							$post_format = get_post_format();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="<?php echo dh_get_protocol() ?>://schema.org/Article" itemscope="">
							<div class="hentry-wrap">
								<?php dh_post_featured(); ?>
								<div class="entry-header">
									<h1 class="entry-title" data-itemprop="name"><?php the_title()?></h1>
									<div class="entry-meta icon-meta">
										<?php dh_post_meta($blog_show_date,$blog_show_comment,$blog_show_category,$blog_show_author,true,false,null,true); ?>
									</div>
								</div>
								<div class="entry-content" data-itemprop="mainContentOfPage">
									<?php the_content( esc_html__( 'Continue reading &hellip;', 'woow' ) ) ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'woow' ), 'after' => '</div>' ) ); ?>					
								</div>
								<div class="entry-footer">
									<div class="row">
										<?php if($blog_show_tag && has_tag()):?>
										<div class="col-sm-6">
											<div class="entry-tags">
												<?php the_tags('','')?>
											</div>
										</div>
										<?php endif;?>
										<div class="<?php if($blog_show_tag && has_tag()):?>col-sm-6 text-right<?php else:?>col-sm-12 text-center<?php endif;?>">
											<?php if(dh_get_theme_option('show-post-share',1)) dh_share('',dh_get_theme_option('post-fb-share',1),dh_get_theme_option('post-tw-share',1),dh_get_theme_option('post-go-share',1),dh_get_theme_option('post-pi-share',0),dh_get_theme_option('post-li-share',1));?>
										</div>
									</div>
								</div>
							</div>
							<meta content="<?php echo get_the_author()?>" itemprop="author">
						</article>
						 <?php
						 endwhile;
						 ?>
					<?php endif;?>
					<?php if(dh_get_theme_option('show-postnav',1)) dh_post_nav();?>
					<?php if (dh_get_theme_option('show-authorbio',1) && get_the_author_meta( 'description' ) ) : ?>
						<?php get_template_part( 'author-bio' ); ?>
					<?php endif; ?>
					<?php if(dh_get_theme_option('show-related',1)) dh_related_post() ?>
					<?php if(comments_open()):?>
						 <?php comments_template( '', true ); ?>
					<?php endif;?>
					</div>
				</div>
				<?php do_action('dh_right_sidebar_extra')?>
				<?php do_action('dh_right_sidebar')?>
			</div>
		</div>
	</div>
<?php get_footer() ?>