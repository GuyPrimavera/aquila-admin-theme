/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Aquila\'">' + entity + '</span>' + html;
	}
	var icons = {
		'aquila-tools': '&#xe909;',
		'aquila-comment': '&#xe90a;',
		'aquila-import_export': '&#xe90b;',
		'aquila-shopping_basket': '&#xe90c;',
		'aquila-person_pin': '&#xe90d;',
		'aquila-person_add': '&#xe90e;',
		'aquila-person': '&#xe90f;',
		'aquila-palette': '&#xe910;',
		'aquila-photo': '&#xe911;',
		'aquila-envelope': '&#xe912;',
		'aquila-cubes': '&#xe913;',
		'aquila-plug': '&#xe914;',
		'aquila-page': '&#xe915;',
		'aquila-feather': '&#xe916;',
		'aquila-settings': '&#xe917;',
		'aquila-aquila_full': '&#xe918;',
		'aquila-terminal': '&#xe907;',
		'aquila-code': '&#xe908;',
		'aquila-java': '&#xe901;',
		'aquila-javascript': '&#xe902;',
		'aquila-jquery': '&#xe903;',
		'aquila-mysql': '&#xe904;',
		'aquila-php': '&#xe905;',
		'aquila-edge': '&#xeadc;',
		'aquila-mito': '&#xa001;',
		'aquila-aquila': '&#xa002;',
		'aquila-css': '&#xe900;',
		'aquila-html': '&#xeadf;',
		'aquila-wordpress': '&#xeab6;',
		'aquila-magento': '&#xa003;',
		'aquila-pencil': '&#xe906;',
		'aquila-apple': '&#xeabf;',
		'aquila-windows': '&#xeac3;',
		'aquila-chrome': '&#xeae5;',
		'aquila-firefox': '&#xeae6;',
		'aquila-ie': '&#xeae7;',
		'aquila-opera': '&#xeae8;',
		'aquila-safari': '&#xeae9;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/aquila-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
