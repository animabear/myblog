	</div> <!-- end #main -->
	<footer>
		<div id="footer">
			<div>
				<?php bloginfo('name'); ?> 2013 - <?php echo date('Y', time()); ?>&nbsp;&nbsp;Powered by <a href="https://cn.wordpress.org/" target="_blank">WordPress</a></span>
			</div>
		</div>
	</footer>
</div> <!-- end #page -->

<?php wp_footer(); ?> <!-- 登录后显示管理工具栏 -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.9.0.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
</body>
</html>