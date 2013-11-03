<?php
	function normal_slider($ops, $id, $idinner ) {
	?>
		<?php
								if($ops != null) :
									foreach($ops as $slidei) {
										?>
											<div class="slide-single setting-block">
												<a href="#" class="delete-single">X</a>
												<div class="slide-preview">
													<?php if($slidei[0] != '') : ?>
														<img src="<?php echo $slidei[0]; ?>" alt="Preview" />
													<?php endif; ?>
												</div>
												<div class="wpts_input">
													<label>Image</label>
													<input type="text" class="upload-admin-input" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][0]" value="<?php echo $slidei[0]; ?>" /> <input class="upload-admin" type="button" value="Upload Image" />
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>Big Title</label>
													<input type="text" class="field-2" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][1]" value="<?php echo $slidei[1]; ?>" />
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>Little Description</label>
													<input type="text" class="field-3" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][2]"  value="<?php echo $slidei[2]; ?>" />
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>Description</label>
													<textarea name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][3]" class="field-4"><?php echo $slidei[3]; ?></textarea>
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>Old Price</label>
													<input type="text" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][4]" class="field-5" value="<?php echo $slidei[4]; ?>" />
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>On-Sale Price</label>
													<input type="text" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][5]" class="field-6" value="<?php echo $slidei[5]; ?>" />
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>Button Text</label>
													<input type="text" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][6]" class="field-7" value="<?php echo $slidei[6]; ?>" />
												<div class="clearboth"></div>
												</div>

												<div class="wpts_input">
													<label>Button Href / Link</label>
													<input type="text" name="sliders[<?php echo $id; ?>][3][<?php echo $idinner; ?>][7]" class="field-8" value="<?php echo $slidei[7]; ?>" />
												<div class="clearboth"></div>
												</div>

											</div>
										<?php
										$idinner++;
										echo '
										<script>
											idinner++;
										</script>';
									} // end if
								endif;
	}
?>