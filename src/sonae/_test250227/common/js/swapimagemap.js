/*====================================================================================================
//////////////////////////////////////////////////////////////////////////////////////////////////////

 Author : http://www.yomotsu.net
 created: 2008/03/04
 update : 2008/06/06
 Licensed under the GNU Lesser General Public License version 2.1
 
 image map 箇所の area 要素用ロールオーバー

//////////////////////////////////////////////////////////////////////////////////////////////////////
====================================================================================================*/

var yomotsuSwapImageMap = {

	main : function(){
		var area = document.getElementsByTagName("area");
		for(i=0;i<area.length;i++){
			area[i].onmouseover = yomotsuSwapImageMap.over;
			area[i].onmouseout = yomotsuSwapImageMap.out;
		}
	},
	
	over : function(){
		var i, j,
		img = document.images,
		area = this.parentNode.getElementsByTagName("area"),
		mapIdReg = new RegExp ("\\b"+this.parentNode.id+"\\b");
		
		for(i=0;i<area.length;i++){
			if(area[i]===this){
				for (j = 0; j <img.length; j++) {
					if (img[j].src.match(/_swap0\.(png|gif|jpg)\b/)&&img[j].getAttribute("usemap").match(mapIdReg)){
						img[j].src = img[j].src.replace('_swap0.', '_swap'+(i+1)+'.');
					}
					else if((img[j].style.filter)&&(img[j].style.filter.match(/_swap0\.png\b/))&&img[j].getAttribute("usemap").match(mapIdReg)){//(IE5.5-6 && png)
						img[j].style.filter = img[j].style.filter.replace('_swap0.', '_swap'+(i+1)+'.');
					}
				}
			}
		}

	},
	
	out : function(){
		var i, j,
		img = document.images,
		area = this.parentNode.getElementsByTagName("area"),
		mapIdReg = new RegExp ("\\b"+this.parentNode.id+"\\b");
		
		for(i=0;i<area.length;i++){
			if(area[i]===this){
				for (j = 0; j <img.length; j++) {
					if (img[j].src.match(/_swap[0-9]{1,}\.(png|gif|jpg)\b/)&&img[j].getAttribute("usemap").match(mapIdReg)){
						img[j].src = img[j].src.replace('_swap'+(i+1)+'.', '_swap0.');
					}
					else if((img[j].style.filter)&&(img[j].style.filter.match(/_swap[0-9]{1,}\.png\b/))&&img[j].getAttribute("usemap").match(mapIdReg)){//(IE5.5-6 && png)
						img[j].style.filter = img[j].style.filter.replace('_swap'+(i+1)+'.', '_swap0.');
					}
				}
			}
		}
	},
	
	addEvent : function(){
		try {
			window.addEventListener('load', this.main, false);
		} catch (e) {
			window.attachEvent('onload', this.main);
		}
	}
}

yomotsuSwapImageMap.addEvent();