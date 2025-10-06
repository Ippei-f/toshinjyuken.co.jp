
if(!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
//ここに書いた処理はスマホ閲覧時は無効となる

$(function(){
	var timer = false;
	$(window).resize(function() {
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
		//リロードする
		location.reload();
		}, 200);
	});
});

}
