
$(function(){
	var url = location.href; // 現在URLのパスを変数urlに格納
	url = url.replace(/#.*?$/g, ''); // アンカーを含む場合は削除
	url = url.replace(/\?.*?$/g, ''); // パラメーターを含む場合は削除
	url = url.replace(/\/index(s)?\.htm(l)?$/g, '/'); // index.html、index.htm、index.shtmlは省略
    $('a').each(function(){
        var link = $(this).prop('href');
		link = link.replace(/\/index(s)?\.htm(l)?$/g, '/'); // index.html、index.htm、index.shtmlは省略
        if(link == url){
            $(this).addClass('active');
        }
    });
});

$(function(){
	var url = $('#breadcrumb a').slice('1').prop('href'); // 親カテゴリーのパスを変数urlに格納
	if(url){
		url = url.replace(/\/index(s)?\.htm(l)?$/g, '/'); // index.html、index.htm、index.shtmlは省略
		$('#globalNav a').each(function(){
        	var link = $(this).prop('href');
			link = link.replace(/\/index(s)?\.htm(l)?$/g, '/'); // index.html、index.htm、index.shtmlは省略
        	if(link == url){
            	$(this).addClass('active');
        	}
    	});
	}

});
