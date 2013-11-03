<?php 

	/*** HOME PAGE SLIDER */

	function slider_0($options) {
		$ops = $options[3];
		$counter = 0;
		?>

		<div class="home-slider">
			<div class="flexslider">
				<ul class="slides">
					<?php
					foreach($ops as $slide) { 
					?>
					<li>
						<?php 
						$class = '';
						if($slide[1] != '' || $slide[2] != '' || $slide[3] != '' || $slide[4] != '' || $slide[5] != '' || $slide['6'] != '') : 
							$class = 'with-caption';
						?>
						<div class="flex-caption">
							<?php if($slide[1] != '') : ?>
								<h1><?php echo stripslashes($slide[1]); ?></h1>
							<?php endif; ?>

							<?php if($slide[2] != '') : ?>
								<p class="small-desc"><?php echo stripslashes($slide[2]); ?></p>
							<?php endif; ?>

							<?php if($slide[3] != '') : ?>
								<div class="description">
									<p>
									<?php echo nl2br(stripslashes($slide[3])); ?>
									</p>
								</div>
							<?php endif; ?>

							<?php if($slide[4] != '' || $slide[5] != '') : ?>
								<div class="price">
									<?php if($slide[4] != '') : ?><span class="cutted"><?php echo $slide[4]; ?></span><?php endif; ?>
									<?php if($slide[5] != '') : ?><span class="sale"><?php echo $slide[5]; ?></span><?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if($slide[6] != '') : ?>
								<div class="slide-button">
									<a href="<?php echo $slide[7]; ?>" class="button default"><?php echo stripslashes($slide[6]); ?></a>
								</div>
							<?php endif; ?>
							
						</div> <!-- .flex-caption -->
						<?php endif; ?>

						<a href="<?php echo $slide[7]; ?>"><img class="<?php echo $class; ?>" src="<?php echo $slide[0]; ?>" /></a>
					</li>
					<?php
		            	$counter++;
					}	?>
				</ul>
			</div>

			<!-- Place in the <head>, after the three links -->
			<script type="text/javascript" charset="utf-8">
			  jQuery(window).load(function() {
			    jQuery('.home-slider .flexslider').flexslider({
			    	controlNav: false,
			    	animation: 'slide'
			    });
			  });
			</script>
		</div> <!-- .home-slider -->

		<div class="divider" style="margin-top: 0 !important; margin-bottom: 0 !important;"></div>

		<?php
	}
?>