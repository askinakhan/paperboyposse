		<div class="footer min-padding">
			<div class="container">
			
				<div class="four columns">
					<ul class="widgets-ul first-ul-widget">
					<?php dynamic_sidebar("footer-sidebar-1"); ?>
					</ul>
				</div>
				<div class="four columns">
					<ul class="widgets-ul">
					<?php dynamic_sidebar("footer-sidebar-2"); ?>
					</ul>
				</div>
				<div class="four columns">
					<ul class="widgets-ul">
					<?php dynamic_sidebar("footer-sidebar-3"); ?>
					</ul>	
				</div>
				<div class="four columns">
					<ul class="widgets-ul">
					<?php dynamic_sidebar("footer-sidebar-4"); ?>
					</ul>	
				</div>
			
			</div> <!-- .container -->
		</div>
		
	</div> <!-- .background -->
		
		<div class="down-footer">
			<p><?php echo stripslashes(wpts_get_option("general", "footer_text")); ?></p>
		</div>
	
	</div>
	
<?php wp_footer(); ?>
	</body>
</html>