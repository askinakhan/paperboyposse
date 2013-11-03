var previewSrc = "";

var sample = '';

var content = 'Sample Text';
if(selectedText != '') {
	content = selectedText;
}
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"Title",
			id:"title",
			help:""
		},
		{
			label:"Sub Title",
			id:"subtitle",
			help:""
		}
		
		],
	defaultContent:content,
	shortcode:"frame"
};