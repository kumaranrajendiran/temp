var preloadedimages=new Array()
for (i=0;i<photos.length;i++){
	preloadedimages[i]=new Image()
	preloadedimages[i].src=photos[i]
}

function applyeffect(){
	if (document.all && document.images.photoslider.filters){
		document.images.photoslider.filters.revealTrans.Transition=Math.floor(Math.random()*23)
		document.images.photoslider.filters.revealTrans.stop()
		document.images.photoslider.filters.revealTrans.apply()
	}
}

function playeffect(){
	if (document.all && document.images.photoslider.filters)
		document.images.photoslider.filters.revealTrans.play()
}

function keeptrack(){
	window.status="Image "+(which+1)+" of "+photos.length
}

function doSlideShow(){
	if (which==photos.length-1) which=-1
	which++
	applyeffect()
	document.images.photoslider.src=photos[which]
	playeffect()
	keeptrack()
}

function transport(){
	//window.location=photoslink[which]
	popupCoop();
}
