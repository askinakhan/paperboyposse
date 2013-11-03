var previewSrc = "gmap.png";

var sample = '[gmap width="400" height="350" address="Rua Itapolis 16, Sao Caetano do Sul" zoom="18" align="center"]';

var content = '';

wptsShortcodeAtts={
	attributes:[
		{
			label:"Width",
			id:"width",
			help:"The map width, default is 'auto' that is fullsize",
			value: 'auto'
		},
		{
			label:"Height",
			id:"height",
			help:"The map height, default is '400'",
			value: '400'
		},
		{
			label:"Address",
			id:"address",
			help:"The address that will be showed in map"
		},
		{
			label:"Zoom",
			id:"zoom",
			help:"Defines the Map zoom, default is 10"
		},
		{
			label:"Align",
			id:"align",
			help:"Button's alignment, leave blank to display inline", 
			controlType:"select-control", 
			selectValues:['', 'left', 'center', 'right']
		}
		],
	defaultContent:content,
	shortcode:"gmap"
};