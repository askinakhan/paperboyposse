<?php 
header("Content-Type:text/javascript");

//Setup URL to WordPres
$absolute_path = __FILE__;
$path_to_wp = explode( 'wp-content', $absolute_path );
$wp_url = $path_to_wp[0];

//Access WordPress
require_once( $wp_url.'/wp-load.php' );

//URL to TinyMCE plugin folder
$plugin_url = get_template_directory_uri().'/wpts/shortcodes/tinymce/';
?>
(function(){
	
	var icon_url = '<?php echo $plugin_url; ?>' + '/tb_icon.png';

	tinymce.create(
		"tinymce.plugins.wptsShortcodes",
		{
			init: function(d,e) {
					
					
					
					d.addCommand( "wptsOpenDialog",function(a,c){
						
						// Grab the selected text from the content editor.
						selectedText = '';
					
						if ( d.selection.getContent().length > 0 ) {
					
							selectedText = d.selection.getContent();
							
						} // End IF Statement
						
						wptsSelectedShortcodeType = c.identifier;
						wptsSelectedShortcodeTitle = c.title;
						
						jQuery.get(e+"/dialog.php",function(b){
							
							var a;
							
							jQuery('#wpts-shortcode-options').addClass( 'shortcode-' + wptsSelectedShortcodeType );
							
							// Skip the popup on certain shortcodes.
							
							switch ( wptsSelectedShortcodeType ) {

								case 'raw':
								a = '[raw]'+selectedText+'[/raw]';
								tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
								break;
								 /*************/
								
								case 'blockquote':
								a = '[blockquote]'+selectedText+'[/blockquote]';
								tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
								break;
								
								/*************/
								
								case 'divider':
								a  = '[divider]';
								tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
								break;
								/*************/
								
								case 'alert':
								a = '[alert]'+selectedText+'[/alert]';
								tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
								break;
								
								/*************/
								
								case 'success':
								a = '[success]'+selectedText+'[/success]';
								tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
								break;
								
								/*************/
								
								case 'message':
								a = '[message]'+selectedText+'[/message]';
								tinyMCE.activeEditor.execCommand("mceInsertContent", false, a);
								break;
								
								default:
								
								jQuery("#wpts-dialog").remove();
								jQuery("body").append(b);
								jQuery("#wpts-dialog").hide();
								var f=jQuery(window).width();
								b=jQuery(window).height();
								f=720<f?720:f;
								f-=80;
								b-=120;
							
							tb_show("WPTS - Insert "+ wptsSelectedShortcodeTitle +" Shortcode", "#TB_inline?width="+f+"&height="+b+"&inlineId=wpts-dialog");jQuery("#wpts-shortcode-options h3:first").text(""+c.title+" Shortcode Settings");
							
								break;
							
							} // End SWITCH Statement
						
						}
												 
					)
					 
					} 
				);

				},
					
				createControl:function(d,e){
				
						if(d=="wpts_shortcodes_button"){
						
							d=e.createMenuButton("wpts_shortcodes_button",{
								title:"WPTS - Insert Shortcode",
								image:icon_url,
								icons:false
								});
								
								var a=this;d.onRenderMenu.add(function(c,b){
																		
									c=b.addMenu({title:"Elements"});
										a.addWithDialog(c,"Frame","frame");
										c.addSeparator();
										a.addWithDialog(c,"Raw","raw");
										c.addSeparator();
										a.addWithDialog(c,"Divider","divider");
										c.addSeparator();
										a.addWithDialog(c,"Blockquote","blockquote");
										c.addSeparator();
										a.addWithDialog(c,"Callout","callout");
										c.addSeparator();
										/*a.addWithDialog(c,"Latest Posts","latest_posts");
										c.addSeparator();*/
										a.addWithDialog(c,"Image","image");
										c.addSeparator();
										a.addWithDialog(c,"Gmap","gmap");
										c.addSeparator();
										a.addWithDialog(c,"Button","button");
										c.addSeparator();
										a.addWithDialog(c,"Alert","alert");
										c.addSeparator();
										a.addWithDialog(c,"Success","success");
										c.addSeparator();
										a.addWithDialog(c,"Message","message");
										c.addSeparator();
										
										
										// ----------------------
									b.addSeparator();
									// ----------------------
									
									c=b.addMenu({title:"Video"});
										a.addWithDialog(c,"HTML5","html5");
										c.addSeparator();
										a.addWithDialog(c,"Flash","flash");
										c.addSeparator();
										a.addWithDialog(c,"Vimeo","vimeo");
										c.addSeparator();
										a.addWithDialog(c,"Youtube","youtube");
										c.addSeparator();
									
									// ----------------------
									b.addSeparator();
									// ----------------------
									c=b.addMenu({title:"Sliders"});
										a.addWithDialog(c,"Flex Slider","flex_slider");
										c.addSeparator();
										a.addWithDialog(c,"Flex Slider Item","flex_item");

							});
							
							return d
						
						} // End IF Statement
						
						return null
					},
		
				addImmediate:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand("mceInsertContent",false,a)}})},
				
				addWithDialog:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand("wptsOpenDialog",false,{title:e,identifier:a})}})},
		
				getInfo:function(){ return{longname:"WPTS Shortcode Generator",author:"VisualShortcodes.com",authorurl:"http://visualshortcodes.com",infourl:"http://visualshortcodes.com/shortcode-ninja",version:"1.0"} }
			}
		);
		
		tinymce.PluginManager.add("wptsShortcodes",tinymce.plugins.wptsShortcodes)
	}
)();
