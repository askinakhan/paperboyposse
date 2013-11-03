var previewSrc = "flex_slider.png";

var sample = '[flex_slider id="mySlider"]\nREPLACE IT WITH [FLEX_ITEM] AND DELETE THIS TEXT\n[/flex_slider]';

var content = 'REPLACE IT WITH [flex_item] AND DELETE THIS TEXT';
 
wptsShortcodeAtts={
	attributes:[
		{
			label:"ID",
			id:"id",
			help:"The element ID"
		},
		{
			label:"Display Arrow?",
			id:"arrow",
			help:"Display arrows in slider?", 
			controlType:"select-control", 
			selectValues:['', 'true']
		}
		],
	defaultContent:"<br />" + content + "<br />",
	shortcode:"flex_slider"
};