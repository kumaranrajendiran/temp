//Hide status bar msg II script- by javascriptkit.com
//Visit JavaScript Kit (http://javascriptkit.com) for script
//Credit must stay intact for use

function hidestatus(){
window.status=''
return true
}

if (document.layers)
document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)

document.onmouseover=hidestatus
document.onmouseout=hidestatus
//---------------------------------------------------------------------------------------------------------------------------------------


// javascript library
// Glenn Olsen 
// 01/27/2003

// browser detection via object support
var ie4 = document.all ? true: false;
var ns4 = document.layers ? true : false;
var ie5 = document.getElementById && document.all ? true : false;
var ns6 = document.getElementById && !document.all ? true : false;

function err() {
	return 0
}	

function del(obj) {
	if(obj) {
		if (ns4) {
			obj.remove(true);
		} else if (ie5) {
			obj.parentNode.removeChild(obj);		
		} else if (ns6) {
			obj.parentNode.removeChild(obj);		
		} else if (ie4) {
			obj.parentElement.removeChild(obj);	
		}
	}
}

function getObj(ref) {
	if (ns4) {
		return document.layers[ref]
	} else if (ie5) {
		return document.getElementById(ref)
	} else if (ns6) {
		return document.getElementById(ref)
	} else if (ie4) {
		return document.all[ref];		
	} else {
		return null	
	}
}

// Make the object visible.
function show(obj) {
	if(obj) {
		if (ns4) {	
			obj.visibility = 'visible';
		} else if(ie5) {
			obj.style.display = 'block';
			obj.style.visibility = 'visible';
		} else if (ie4) {
			obj.style.visibility = 'visible';
		} else if (ns6) {
			obj.style.display = 'block';
			obj.style.visibility = 'visible';			
		}
	}
}

// Hide the object
function hide(obj) {
	if(obj) {
		if (ns4) {	
			obj.visibility = 'hidden';
		} else if(ie5) {
			obj.style.display = 'none';
			obj.style.visibility = 'hidden';		
		} else if (ie4) {
			obj.style.visibility = 'hidden';
		} else if (ns6) {
			obj.style.display = 'none';
			obj.style.visibility = 'hidden';			
		}
	}
}

// Return the y coordinate of the object
function getTop(obj) {
	if (ns4) {	
		return parseInt(obj.top);
	} else if(ie5 || ie4 || ns6) {
		if(obj.style.position == "absolute" && !isNaN(parseInt(obj.style.top))) {
			return parseInt(obj.style.top)
		} else {
			var t = 0;
			var tObj = obj;
			while(tObj.offsetParent != null) {
				//if(arguments.length > 1) {
				//	showProperties(tObj);
				//}
				if(!isNaN(tObj.offsetTop)) {
					t += tObj.offsetTop;
				}
				tObj = tObj.offsetParent;
			}
			return t
		}
	//} else if (ie4) {
	//	return parseInt(obj.style.top);
	//} else if (ns6) {
	//	return parseInt(obj.style.top);
	} else {
		err()	
	}
}

function setTop(obj,top) {
	if(!isNaN(top)) {
		if (ns4) {	
			obj.top = top;
		} else if(ie5) {
			obj.style.top = top;
		} else if(ie4) {
			obj.style.top = top;
		} else if(ns6) {
			obj.style.top = top;
		} else {
			err();	
		}
	}
}

// Return the x coordinate of the object
function getLeft(obj) {
	if (ns4) {	
		return parseInt(obj.left);
	} else if(ie5 || ie4 || ns6) {
		if(obj.style.position == "absolute" && !isNaN(parseInt(obj.style.left))) {
			return parseInt(obj.style.left);
		} else {
			var tObj = obj;
			var l = 0;
			while(tObj.offsetParent != null) {
				//if(arguments.length > 1) {			
				//	showProperties(tObj);
				//}
				if(!isNaN(tObj.offsetLeft)) {
					l += tObj.offsetLeft;
				}
				tObj = tObj.offsetParent;
			}
			return l
		}
	//} else if (ie4) {
	//	return parseInt(obj.style.left);
	//} else if (ns6) {
	//	return parseInt(obj.style.left);
	} else {
		err();	
	}
}

function setLeft(obj,left) {
	if (ns4) {
		obj.left = left;	
	} else if(ie5) {
		obj.style.left = left;
	} else if (ie4) {
		obj.style.left = left;
	} else if (ns6) {
		obj.style.left = left;
	} else {
		err();	
	}
}

// Return the height of the object in pixels
function getHeight(obj) {
	//alert('getHeight');
	//showProperties(obj);
	if (ns4) {	
		return parseInt(obj.clip.height);
	} else if(ie5 || ie4 || ns6) {
		var h = parseInt(obj.offsetHeight);
		if(h <= 0) {
			h = parseInt(obj.style.height);
		}
		return h
	//} else if (ie4) {
	//	return parseInt(obj.style.height);
	//} else if (ns6) {
	//	return parseInt(obj.height);
	} else {
		err();	
	}
}

function setHeight(obj,height) {
	if(!isNaN(height)) {
		if (ns4) {
			obj.height = height;	
		} else if(ie5) {
			obj.style.height = height;
		} else if (ie4) {
			obj.style.height = height;
		} else if (ns6) {
			obj.style.height = height;
		} else {
			err();	
		}
	}
}

// Return the width of the object in pixels
function getWidth(obj) {
	if (ns4) {	
		return parseInt(obj.clip.width);
	} else if(ie5 || ie4) {
		var w = parseInt(obj.style.width);
		if(w <= 0) {
			w = parseInt(obj.offsetWidth);
		}
		return w
	//} else if (ie4) {
	//	return parseInt(obj.style.width);
	} else if (ns6) {
		//if(arguments.length > 1) {
		//	showProperties(obj);
		//	showProperties(obj.style);
		//}
		var w = parseInt(obj.style.width);
		if(w <= 0) {
			w = parseInt(obj.offsetWidth);
		}
		return w
	} else {
		err();	
	}
}

function setWidth(obj,width) {
	if(!isNaN(width)) {
		if (ns4) {
			obj.width = width;	
		} else if(ie5) {
			obj.style.width = width;
		} else if (ie4) {
			obj.style.width = width;
		} else if (ns6) {
			obj.width = width;
		} else {
			err();	
		}
	}
}

function writeText(obj,txt) {
	if(ns4) {
		obj.document.open();
		obj.document.write(txt);
		obj.document.close();
	} else if(ie5 || ns6 || ie4) {
		obj.innerHTML = txt;	
	} 
}

function getParent(obj) {
	if (ns4) {
		//	
	} else if(ie5) {
		//showProperties(obj);
		return obj.parentNode;
	} else if (ie4) {
		//
	} else if (ns6) {
		return obj.parentNode;
	} else {
		err();	
	}
}

function getWindowWidth() {
	if (ns4) {
		return window.innerWidth;	
	} else if(ie5 || ie4) {
		return document.body.clientWidth;
	} else if (ns6) {
		return innerWidth;
	} else {
		err();	
	}
}

function getWindowHeight() {
	if (ns4) {
		return window.innerHeight;	
	} else if(ie5 || ie4) {
		return document.body.clientHeight;
	} else if (ns6) {
		return innerHeight;
	} else {
		err();	
	}
}

// Moves the object to the specified X Y coordinates
function setXY(obj,x,y) {	
	if (ns4) {
		obj.moveTo(x,y);	
	} else if(ie5) {
		obj.style.left = x;
		obj.style.top = y;	
	} else if(ie4) {
		obj.style.pixelLeft = x;
		obj.style.pixelTop = y;	
	} else if(ns6) {
		obj.style.left = x;
		obj.style.top = y;	
	} else {
		err();
	}
}

// clip functions
function clipLayer(layer, clipleft, cliptop, clipright, clipbottom) {
	//alert(clipleft + ", " + cliptop + ", " + clipright + ", " + clipbottom);
	//alert(isNaN(clipleft) + ", " + isNaN(cliptop) + ", " + isNaN(clipright) + ", " + isNaN(clipbottom));	
	if (ns4) {
		layer.clip.left   = clipleft;
		layer.clip.top    = cliptop;
		layer.clip.right  = clipright;
		layer.clip.bottom = clipbottom;	
	} else if(ie5) {
		layer.style.clip = 'rect(' + cliptop + ' ' +  clipright + ' ' + clipbottom + ' ' + clipleft +')';
		//alert(clipleft + ", " + cliptop + ", " + clipright + ", " + clipbottom);			
	} else if(ie4) {
		obj.style.pixelLeft = x;
		obj.style.pixelTop = y;	
	} else if(ns6) {
		layer.style.clip = 'rect(' + cliptop + ' ' +  clipright + ' ' + clipbottom + ' ' + clipleft +')';	
	} else {
		err();
	}
}

function getClipLeft(layer) {
  	if(ns4) {
    	return layer.clip.left;
	} else if(ie4 || ie5 || ns6) {
		var str =  layer.style.clip;
		if (!str)
		  return 0;
		var clip = getIEClipValues(layer.style.clip);
		return(clip[3]);
	} else {
		err();	
	}
}

function getClipTop(layer) {
  	if (ns4) {
    	return layer.clip.top;
	} else if(ie4 || ie5 || ns6) {
		var str =  layer.style.clip;
		if (!str)
		  return 0;
		var clip = getIEClipValues(layer.style.clip);
		return(clip[0]);
	} else {
		err();	
	}
}

function getClipRight(layer) {
  	if (ns4) {
    	return layer.clip.right;
	} else if(ie4 || ie5 || ns6) {
		var str =  layer.style.clip;
		if (!str)
		  return 0;
		var clip = getIEClipValues(layer.style.clip);
		return(clip[1]);
	} else {
		err();	
	}
}

function getClipBottom(layer) {
  	if (ns4) {
    	return layer.clip.bottom;
	} else if(ie4 || ie5 || ns6) {
		var str =  layer.style.clip;
		if (!str)
		  return 0;
		var clip = getIEClipValues(layer.style.clip);
		return(clip[2]);
	} else {
		err();	
	}
}

function getClipWidth(layer) {
  	if (ns4) {
    	return layer.clip.width;
	} else if(ie4 || ie5 || ns6) {
		var str =  layer.style.clip;
		if (!str)
		  return layer.style.pixelWidth;
		var clip = getIEClipValues(layer.style.clip);
	    return clip[1] - clip[3];
	} else {
		err();	
	}
}

function getClipHeight(layer) {
  	if (ns4) {
    	return layer.clip.height;
	} else if(ie4 || ie5 || ns6) {
		var str =  layer.style.clip;
		if (!str)
		  return layer.style.pixelHeight;
		var clip = getIEClipValues(layer.style.clip);
	    return clip[2] - clip[0];
	} else {
		err();	
	}
}

function getIEClipValues(str) {

  var clip = new Array();
  var i;

  // Parse out the clipping values for IE layers.

  i = str.indexOf("(");
  clip[0] = parseInt(str.substring(i + 1, str.length), 10);
  i = str.indexOf(" ", i + 1);
  clip[1] = parseInt(str.substring(i + 1, str.length), 10);
  i = str.indexOf(" ", i + 1);
  clip[2] = parseInt(str.substring(i + 1, str.length), 10);
  i = str.indexOf(" ", i + 1);
  clip[3] = parseInt(str.substring(i + 1, str.length), 10);
  return clip;
}

function scrollLayerBy(layer, dx, dy, bound) {
  var cl = getClipLeft(layer);
  var ct = getClipTop(layer);
  var cr = getClipRight(layer);
  var cb = getClipBottom(layer);
  var lw = getWidth(layer);
  var lh = getHeight(layer);
  //alert("cl: " + cl + ", ct: " + ct + ", cr: " + cr + ", cb: " + cb + ", lw: " + lw + ", lh: " + lh + ", dx: " + dx + ", dy: " + dy);
  
  	if (bound) {
    	if (cl + dx < 0) {
	  		dx = 0; 
   		} else if (cr + dx > lw) {   	  
	 		dx = 0;
			//alert("cl: " + cl + ", ct: " + ct + ", cr: " + cr + ", cb: " + cb + ", lw: " + lw + ", lh: " + lh + ", dx: " + dx + ", dy: " + dy);			
		}
    	if (ct + dy < 0) {
      		dy = 0;
    	} else if (cb + dy > lh) {
      		dy = 0;
		}
  	}
  	clipLayer(layer, cl + dx, ct + dy, cr + dx, cb + dy);
  	moveByXY(layer, -dx, -dy);
}

// Moves the object by x,y pixels. Use negative numbers for up or right
function moveByXY(obj,x,y) {
	if(ns4) {
		obj.moveBy(x,y);
	} else if(ie5 || ns6) {
		setLeft(obj,getLeft(obj) + x);
		setTop(obj,getTop(obj) + y);
		//alert(getLeft(obj));
		//alert(getTop(obj));
		//obj.style.left += x;		
		//obj.style.top += y;			
	} else if(ie4) {
		obj.style.pixelLeft = getLeft(obj) + x;
		obj.style.pixelTop = getTop(obj) + y;	
	} else {
		err();
	}
}

function showProperties(element) {
	var showAll = false;
	if(arguments.length > 1) {
		showAll = true;
	}
	var sText = "";
	//sText += typeof(element) + ":\n";
	var props = new Array();
	for(var prop in element) {
		props.push(prop);
	}
	props.sort();
	for(var i=0; i<props.length; i++) {
		if(props[i] != "document") {
			if(typeof(element[props[i]]) == "function") {
				sText += "function " + props[i] + "()";	
			} else if(!showAll && (props[i] == "innerHTML" || props[i] == "outerHTML" || props[i] == "innerText" || props[i] == "outerText")) {
				sText += props[i] + ": " + element[props[i]].substring(0,30);
				if(element[props[i]].length > 30) {
					sText += "...";
				}
			} else {
				sText += props[i] + ": " + element[props[i]];
			} 
			sText += "; ";
		}
	}
	alert(sText);
}
//------------------------------------------------------------------------------
	<!-- //
	var currentMenuItem = null; 
	var hideTimeoutID;
	
	function resizeHack() {
		if(ns4) {
			// the onResize event in NS4 is buggy: specifically, NS4 becomes discombobulated with respect
			// to stylesheets and positioning.  The conventional workaround is to do a page reload.
			location.reload(true);
		} else {
			layoutMenus();
		}
	}	
	
	function showMenu(obj) {
 		clearTimeout(hideTimeoutID);
		while(currentMenuItem != null && currentMenuItem != obj.id && obj.parentNav != currentMenuItem) {
			_hideChildren(currentMenuItem);
			currentMenuItem = getObj(currentMenuItem).parentNav;
		}

		currentMenuItem = obj.id;
		if(typeof(obj.childNav) != "undefined") {
			for(var i=0; i < obj.childNav.length; i++) {
				show(getObj(obj.childNav[i]));
			}
		}
	}
	
	function hideMenu() {
		hideTimeoutID = setTimeout('_hideMenu()',300);
	}

	function _hideMenu() {
		while(currentMenuItem != null) {
			_hideChildren(currentMenuItem);
			currentMenuItem = getObj(currentMenuItem).parentNav;
		}
	}
	
	function _hideChildren(ref) {
		obj = getObj(ref);
		if(typeof(obj.childNav) != "undefined") {
			for(var i=0; i < obj.childNav.length; i++) {
				hide(getObj(obj.childNav[i]));
			}
		}
	}
	
	function layoutMenus() {
		var offPix = 1;
		if(ns6) {
			offPix = -1;
		}
		for(var i=0; i < 11; i++) {
			var iref = 'nav' + i;
		
			if(getObj(iref)) {
				var ileft = getLeft(getObj(iref));
				
				switch(i) {
					case 0:
						ileft += 0;
						break;
					case 1:
						ileft += 0;
						break;
				}				
					
				var iwidth = getWidth(getObj(iref));
				var itop = getTop(getObj(iref)) + getHeight(getObj(iref));
		
				getObj(iref).parentNav = null;
				getObj(iref).childNav = new Array();
	
				for(var j=0; j < 12; j++) {
					var jref = 'nav' + i + '_' + j;
					if(getObj(jref)) {
						hide(getObj(jref));
						getObj(jref).parentNav = iref;
						getObj(iref).childNav[getObj(iref).childNav.length] = jref;
						getObj(jref).childNav = new Array();
						var jtop = itop + (20 * j);
						var jwidth = getWidth(getObj(jref));
						if(i==99 && j==0) {
							alert(getWidth(getObj(jref),true));
						}
				
						setLeft(getObj(jref),ileft);
						setTop(getObj(jref),jtop);
						
						for(var k=0; k < 11; k++) {
							var kref = 'nav' + i + '_' + j + '_' + k;
							if(getObj(kref)) {
								hide(getObj(kref));
								getObj(kref).parentNav = jref;
								getObj(jref).childNav[getObj(jref).childNav.length] = kref;

								if(i < 3) {
									setLeft(getObj(kref),ileft + jwidth - offPix);									
								} else {
									setLeft(getObj(kref),ileft - getWidth(getObj(kref)) + offPix);
								}						
								setTop(getObj(kref),jtop + (k * 20));
							}
						}
					}
				}
			}
		}
	}
		
	// -->
