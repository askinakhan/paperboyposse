var previewSrc = "";

var sample = '';

var content = 'Sample Text';
if(selectedText != '') {
	content = selectedText;
}
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"Numbers Of Posts",
			id:"num",
			help:"ex: http://google.com"
		}		
		],
	defaultContent:content,
	shortcode:"latest_posts"
};