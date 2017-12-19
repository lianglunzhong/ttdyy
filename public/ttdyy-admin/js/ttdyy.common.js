$(function() {
	//初始化时确定内容区域的高度
	changeContentBoxHeight();

	/** 监听浏览器窗口变化  */
	$(window).resize(function() {
		//动态改变内容区域的高度
		changeContentBoxHeight();
	});
	
});


/*
 * 动态改变内容区域的高度
 */
function changeContentBoxHeight()
{
	var width = document.documentElement.clientWidth || document.body.clientWidth;
	var height = document.documentElement.clientHeight || document.body.clientHeight;

	if(height < 725) {
		height = 725;
	}

	var min_height = parseInt(height - 175) + 'px';

	$('.content-box').css({'min-height': min_height})
	// console.log(width);
	// console.log(height);
}