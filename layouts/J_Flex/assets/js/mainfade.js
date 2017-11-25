// JavaScript Document


jQuery(document).ready(function() {
	
	var current=0;
	var slide_length = jQuery('.slide_ul>li').length;//이미지의 갯수를 변수로
	

	jQuery('.slide_ul>li').hide();//이미지 안보이게
	jQuery('.slide_ul>li').first().show();//이미지 하나만 보이게
	
	
//자동 슬라이드 함수
function autoplay(){
	
	if(current == slide_length-1){
	current = 0;
}else{
	current++;
}
	jQuery('.slide_ul>li').stop().fadeOut(3000);
	jQuery('.slide_ul>li').eq(current).stop().fadeIn(1500);
}
setInterval(autoplay,8000);//반복

});
