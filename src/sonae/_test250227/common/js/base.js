var root;
var scripts = document.getElementsByTagName("script");
var i = scripts.length;
while (i--) {
	var match = scripts[i].src.match(/(^|.*\/)base\.js$/);
	if (match) {
		root = match[1];
		break;
	}
}
//alert(root);

document.write('\n<script type="text/javascript" src="'+ root +'jquery-1.10.2.min.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'imgHover.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'smoothScroll.js"></script>');
/*
document.write('\n<script type="text/javascript" src="'+ root +'pageResizeReload.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'menuActive.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'pageTop.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'jquery.heightLine.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'slideDownMenu.js"></script>');
document.write('\n<link rel="stylesheet" type="text/css" href="'+ root +'prettyPhoto/css/prettyPhoto.css">');
document.write('\n<script type="text/javascript" src="'+ root +'prettyPhoto/js/jquery.prettyPhoto.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'googleAnalytics.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'swapimagemap.js"></script>');
*/

//レスポンシブサイト用
document.write('\n<script type="text/javascript" src="'+ root +'slideSideMenu.js"></script>');
/*
document.write('\n<script type="text/javascript" src="'+ root +'switchViewport.js"></script>');
document.write('\n<script type="text/javascript" src="'+ root +'jquery.cookie.js"></script>');
document.write('\n<link rel="stylesheet" type="text/css" href="'+ root +'font-awesome-4.6.3/css/font-awesome.min.css">');
*/

//HTML5対応
document.write('\n<!--[if lt IE 9]>');
document.write('\n<script type="text/javascript" src="'+ root +'html5.js"></script>');
document.write('\n<![endif]-->');



