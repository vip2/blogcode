// 处理选项卡
$('.nav-tabs li').on('click', function(e) {
	// 去掉active
	$(this).siblings().removeClass("active");
});