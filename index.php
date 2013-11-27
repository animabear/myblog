<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>">
				<div class="post-header">
					<?php if (getPostViews(get_the_ID()) > 0): $count = getPostViews(get_the_ID()); ?>
						<div class="post-viewed" title="我被围观了<?php echo $count; ?>次">
							<!-- 输出文章的浏览次数 -->
							<?php echo $count; ?>
						</div>
					<?php endif; ?>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post-meta">
					<?php the_category(' | ') ?>
					<?php the_tags(' / ', ','); ?>
					/
					<?php the_time('Y.m.d'); ?>
				</div>
				<div class="post-entry">
					<!-- 输出文章缩略图和摘要 -->
					<?php if (has_post_thumbnail()): ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb'); ?></a>
						</div>
					<?php endif; ?>
					<div class="post-introduce">
						<div class="post-detail">
							<?php the_excerpt(); ?>
						</div>
						<a class="read-more" href="<?php the_permalink(); ?>">阅读全文<i>&gt;&gt;</i></a>
					</div>
				</div>
			</article>
			<?php endwhile; ?>

			<?php if (function_exists('wp_pagenavi')): wp_pagenavi(); endif; ?>

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