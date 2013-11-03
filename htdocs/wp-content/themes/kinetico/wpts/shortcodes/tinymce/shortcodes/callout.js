var previewSrc = "";

var sample = '';

var content = 'Sample Text';
if(selectedText != '') {
	content = selectedText;
}
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"Button Text :",
			id:"button",
			help:""
		},
		{
			label:"Button Href :",
			id:"href",
			help:""
		}
		
		],
	defaultContent:content,
	shortcode:"callout"
};