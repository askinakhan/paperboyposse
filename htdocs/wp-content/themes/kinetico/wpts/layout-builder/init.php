<?php

						require_once("widgets.php");
						
						require_once("layouts.php");

						/// READING
						
						$elements = get_post_meta($post->ID, "elements", true);
						
						function readWidget($w) {
							$class = $w[1];
							$content = $w[2];
							$fn = $class;
							//var_dump($w);
							return wpts_content_formatter( $fn($content) );
						}
						
						function readLayout($l) {
							$class = $l[1];
							$widgets = $l[2];
							
							$off = 0;
							$c = 0;
							$length = count($widgets);
							$output = '';
							
							while($c < $length) {
								$output .= readWidget(array_slice($widgets, $off, 4));
								$c += 4;
								$off += 4;
							}
							
							//$fn = $class;
							//$fn($output);
							
							builder_column($output, $class);
						}
						
						if($elements != "") :
								
						if (@base64_decode( $elements, true )) {
							
							$elements = base64_decode( $elements );
							$elements = maybe_unserialize( $elements );
							//- var_dump($elements);
						}
							
							foreach($elements as $element) {
								if($element[0] == "widget") {
									echo readWidget($element);
									continue;
								}
								
								if($element[0] == "layout") {
									readLayout($element);
									continue;
								}
								
							}
						endif;

?>