var previewSrc = "";

var sample = '';

var content = 'Sample Text';
if(selectedText != '') {
	content = selectedText;
}
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"Image Source",
			id:"src",
			help:"",
			value: ""
		},
		
		{
			label:"Image Width",
			id:"width",
			help:"",
			value: ""
		},
		
		{
			label:"Image Height",
			id:"height",
			help:"",
			value: ""
		},
		
		{
			label:"Padding CSS Rule (optional)",
			id:"padding",
			help:"Padding rule, like '20px 10px' or '10px 5px 15px 10px'",
			value: ""
		},
		{
			label:"Align",
			id:"align",
			help:"Image Align", 
			controlType:"select-control", 
			selectValues:['', 'left', 'right','center']
		}
		],
	defaultContent:'',
	shortcode:"image"
};