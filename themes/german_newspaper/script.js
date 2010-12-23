// $Id: script.js,v 1.2 2009/06/16 20:29:32 christiangnoth Exp $

Drupal.theme.prototype.powered = function(color, height, width) {
  return '<img src="/images/powered-'+ color +'-'+ height +'x'+ width +'.png" />';
}


$('.footer').append(Drupal.theme('powered', 'black', 135, 42));



/*
 Javascript for Drop Down Menu's
 Source from
 http://www.htmldog.com/articles/suckerfish/dropdowns/
*/

sfHover = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
