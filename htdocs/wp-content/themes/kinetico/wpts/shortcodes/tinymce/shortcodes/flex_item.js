var previewSrc = "flex_slider.png";

var sample = '[flex_item src="http://www.wpthemetoolset.com/markup/wp-content/uploads/2012/02/Sea.jpg" href="" caption=""]';

var content = '';
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"Image SRC",
			id:"src",
			help:"Image address/source"
		},
		{
			label:"Href",
			id:"href",
			help:"Link to image, you can leave it blank to don't use links"
		}
		],
	defaultContent:content,
	shortcode:"flex_item"
};