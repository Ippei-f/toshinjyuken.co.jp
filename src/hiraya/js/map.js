// JavaScript Document

var map;
var marker=[];
var infoWindow=[];
 
function initMap() {
	// 地図の作成
	var mapLatLng = new google.maps.LatLng({lat:center_lat,lng:center_lng});//緯度経度のデータ作成
	map = new google.maps.Map(document.getElementById('map'),{//地図を埋め込む
		center:mapLatLng,//地図の中心を指定
		zoom:zoom//地図のズームを指定
		//mapTypeControlOptions: { mapTypeIds: ['GrayScaleMap',google.maps.MapTypeId.ROADMAP] }
	});
 
	// マーカー毎の処理
	for (var i=0;i<markerData.length;i++) {
		markerLatLng = new google.maps.LatLng({lat:markerData[i]['lat'],lng:markerData[i]['lng']});//緯度経度のデータ作成
		marker[i] = new google.maps.Marker({//マーカーの追加
			position:markerLatLng,//マーカーを立てる位置を指定
			map:map//マーカーを立てる地図を指定
		});
		infoWindow[i] = new google.maps.InfoWindow({//吹き出しの追加
			content:'<div class="map_text">'+markerData[i]['name']+'</div>'//吹き出しに表示する内容
		}); 
		markerEvent(i);//マーカーにクリックイベントを追加
		marker[i].setOptions({//マーカーのオプション設定
			icon:{
				url:markerData[i]['icon']//マーカーの画像を変更
			}
		});
	}
	
	// 地図をグレースケールに
	var mapStyle = [
		{
			"stylers": [{ "hue":"#004021"	}]//,{"gamma":"1"}
		},
		//{
		//	"elementType": "labels.icon",
		//	"stylers": [{ "visibility": "off" }]
		//},
		//{
		//	"stylers": [{ "hue":"#004021"	},{"gamma":"1"}],//,{"lightness":"-50"},{"color": "#004021"}
		//	"stylers": [{ "saturation": -100 }],
		//	"elementType": "geometry",
		//	"featureType": "transit"
		//},
		//{
		//	"stylers": [{ "saturation": -100 }],
		//	"elementType": "labels",
		//	"featureType": "transit"
		//},		
		{
			"featureType": "transit.line",
			"elementType": "geometry",
			"stylers": [{ "saturation": -100 }],
		},
		{
			"featureType": "transit.line",
			"elementType": "labels",
			"stylers": [{ "saturation": -100 }],
		},
		{
			"featureType": "transit.station",
			"elementType": "geometry",
			"stylers": [{ "hue":"#004021"	},{"gamma":"0.75"}],//,{"lightness":"-50"}
		},
		{
			"featureType": "transit.station",
			"elementType": "labels",
			"stylers": [{ "hue":"#004021"	},{"gamma":"0.75"}],//,{"lightness":"-50"}
		},		
		{
			"stylers": [{ "saturation": -100 }],
			"featureType": "administrative"
		},
		{
			"featureType": "administrative",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"stylers": [{ "saturation": -100 }],
			"featureType": "landscape"
		},
		{
			"featureType": "landscape",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"stylers": [{ "saturation": -100 }],
			"featureType": "poi"
		},
		{
			"featureType": "poi",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},		
		{
			"stylers": [{ "saturation": -100 }],
			"featureType": "road"
		},
		{
			"featureType": "road",
			"elementType": "labels.text",
			"stylers": [{ "visibility": "off" }]
  	},
		{
			"featureType": "road",
			"elementType": "labels.icon",
			//"stylers": [{ "visibility": "off" }]
			"stylers": [{ "visibility": "simplified" }]
		},
		{
			"stylers": [{ "saturation": -100 }],
			"featureType": "water"
		},
		{
			"featureType": "water",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		}
	];
	/*
	var mapStyle = [
		{
			"elementType": "geometry",
			"stylers": [{ "color": "#f5f5f5" }]
		},
		{
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#616161" }]
		},
		{
			"elementType": "labels.text.stroke",
			"stylers": [{ "color": "#f5f5f5" }]
		},
		{
			"featureType": "administrative.land_parcel",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "administrative.land_parcel",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#bdbdbd" }]
		},
		{
			"featureType": "administrative.neighborhood",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [{ "color": "#eeeeee" }]
		},
		{
			"featureType": "poi",
			"elementType": "labels.text",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "poi",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#757575" }]
		},
		{
			"featureType": "poi.business",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [{ "color": "#e5e5e5" }]
		},
		{
			"featureType": "poi.park",
			"elementType": "labels.text",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "poi.park",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#9e9e9e" }]
		},
		{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [{ "color": "#ffffff" }]
		},
		{
			"featureType": "road",
			"elementType": "labels",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "road.arterial",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "road.arterial",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#757575" }]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry",
			"stylers": [{ "color": "#dadada" }]
		},
		{
			"featureType": "road.highway",
			"elementType": "labels",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "road.highway",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#616161" }]
		},
		{
			"featureType": "road.local",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "road.local",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#9e9e9e" }]
		},
		{
			"featureType": "transit.line",
			"elementType": "geometry",
			"stylers": [{ "color": "#e5e5e5" }]
		},
		{
			"featureType": "transit.station",
			"elementType": "geometry",
			"stylers": [{ "color": "#eeeeee" }]
		},
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [{ "color": "#c9c9c9" }]
		},
		{
			"featureType": "water",
			"elementType": "labels.text",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "water",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#9e9e9e" }]
		}
	];*/
	/*
	var mapStyle = [
		//{
		//	"elementType": "labels.icon",
		//	"stylers": [{ "visibility": "off" }]
		//},
		{
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#616161" }]
		},
		{
			"elementType": "labels.text.stroke",
			"stylers": [{ "color": "#f5f5f5" }]
		},
		{
			"featureType": "administrative.land_parcel",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#bdbdbd" }]
		},
		{
			"featureType": "administrative",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"stylers": [{ "saturation": -100 }],
			"featureType": "landscape"
		},
		{
			"featureType": "landscape",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [{ "color": "#eeeeee" }]
		},
		{
			"featureType": "poi",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "poi",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#757575" }]
		},
		{
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [{ "color": "#e5e5e5" }]
		},
		{
			"featureType": "poi.park",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#9e9e9e" }]
		},
		{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [{ "color": "#ffffff" }]
		},
		{
			"featureType": "road",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "road.arterial",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#757575" }]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry",
			"stylers": [{ "color": "#dadada" }]
		},
		{
			"featureType": "road.highway",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#616161" }]
		},
		{
			"featureType": "road.local",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#9e9e9e" }]
		},
		{
			"featureType": "transit.line",
			"elementType": "geometry",
			"stylers": [{ "color": "#e5e5e5" }]
		},
		{
			"featureType": "transit.station",
			"elementType": "geometry",
			"stylers": [{ "hue":"#004021"	},{"gamma":"1"}],//,{"lightness":"-50"}
		},
		{
			"featureType": "transit.station",
			"elementType": "labels",
			"stylers": [{ "hue":"#004021"	},{"gamma":"1"}],//,{"lightness":"-50"}
		},
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [{ "color": "#c9c9c9" }]
		},
		{
			"featureType": "water",
			"elementType": "labels.icon",
			"stylers": [{ "visibility": "off" }]
		},
		{
			"featureType": "water",
			"elementType": "labels.text.fill",
			"stylers": [{ "color": "#9e9e9e" }]
		}
	];
	*/
	var mapType = new google.maps.StyledMapType(mapStyle);
	map.mapTypes.set('GrayScaleMap', mapType);
	map.setMapTypeId('GrayScaleMap');
	
}

// マーカーにクリックイベントを追加
function markerEvent(i) {
	marker[i].addListener('click',function(){//マーカーをクリックしたとき
		infoWindow[i].open(map,marker[i]);//吹き出しの表示
	});
}