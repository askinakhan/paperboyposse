var previewSrc = "";

var sample = '';

var content = 'Sample Text';
if(selectedText != '') {
	content = selectedText;
}
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"Button Href:",
			id:"href",
			help:""
		},
		{
			label:"Target:",
			id:"target",
			help:"", 
			controlType:"select-control", 
			selectValues:['', '_blank']
		},
		{
			label:"Button Color:",
			id:"color",
			help:"", 
			controlType:"select-control", 
			selectValues:['default', 'dark','gray','blue']
		}
		],
	defaultContent:content,
	shortcode:"button"
};