<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); setPostViews(get_the_ID()); ?>
			<article class="post" id="post-<?php the_ID(); ?>">
				<div class="post-header">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post-meta">
					<?php the_category(' | ') ?>
					/
					<?php the_time('Y.m.d'); ?>
				</div>
				<div class="post-entry">
					<!-- 输出文章的图片和缩略内容 -->
					<?php the_content(); ?>
				</div>
				<div class="post-comments">
					<?php comments_template('', true);?>
				</div>
			</article>
			<?php endwhile; ?>
		<?php else: ?>
			<!-- 404 页面 -->
			<div class="post">
				<h2>404</h2>
				<h3>木有找到您请求的页面 &gt;_&lt;</h3>
			</div>
		<?php endif; ?>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>