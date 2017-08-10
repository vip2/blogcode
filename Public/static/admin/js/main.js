// 跳转方法
function dataUrl(e) {
	var url = $(e).data('hurl');
	if (url) {
		window.location.href = url;
	} else {
		return false;
	}
}

// ajax跳转方法
function ajaxUrl(e) {
	var url = $(e).data('hurl');
	if (url) {
		$.ajax({
			url:url,
			type: 'POST',
			dataype: 'json',
			success: function(data) {
				if (data.code == 0) {
					$.gritter.add({
						title: '修改失败！',
						text: data.msg,
						class_name: 'gritter-error gritter-center',
						after_open: function(){
							window.location.reload();
						}
					});
				}
			}
		});
	} else {
		$.gritter.add({
			title: '修改失败！',
			text: '修改失败，请重新操作。',
			class_name: 'gritter-error gritter-center',
			after_open: function(){
				window.location.reload();
			}
		});
		// window.location.reload();
		return false;
	}
}

// 控制台打印
function p(e) {
	console.dir(e);
}

function pd(e) {
	p(e);
	return false;
}