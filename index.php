<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>">
				<div class="post-header">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php if (getPostViews(get_the_ID()) > 0): ?>
					<div class="post-viewed" title="被围观的次数">
						<!-- 输出文章的浏览次数 -->
						<?php echo getPostViews(get_the_ID()); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="post-meta">
					<?php the_category(' | ') ?>
					<?php the_time('Y.m.d'); ?>
				</div>
				<div class="post-entry">
					<!-- 输出文章的图片和缩略内容 -->
					<?php the_content(); ?>
				</div>
			</article>
			<?php endwhile; ?>
		<?php else: ?>
			<!-- 404 页面 -->
		<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>