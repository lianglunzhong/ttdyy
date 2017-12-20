jQuery.support.cors = true;
/**
 * 扩展jquery的事件注册，可以为选择器子选择器注册多个事件 
 * 	$("#talkfield").onEvent({
 *		'click' : {
 *   		'.page a' : function(){
 *    			var url = $(this).attr('url'); 
 *    		},
 *    		'tbody tr' : function(){
 * 				var bSelected = $(this).hasClass("row_selected");
 * 			} 
 * 		} 
 * 	});
 */
$.fn.onEvent = function(obj)
{
	for ( var event in obj)
		for ( var selector in obj[event])
			$(this).on(event, selector, obj[event][selector]);
	return this;
};

function isMobileValid(mobile)
{
    var myreg = /^[1][3,4,5,7,8,9][0-9]{9}$/;
    if(myreg.test(mobile)) {
        return true;
    } else {
        return false;
    }
}



 /**
 * 获取验证码
 * llz 2017/12/08
 */
function getMobileCode(obj, token)
{
    var mobileObj = $('#mobile');
    var mobile = mobileObj.val();

    if(!isMobileValid(mobile)) {
        mobileObj.closest('.form-group').addClass('has-error');
        $('#mobileInvalid').removeClass('hidden');
        return false;
    } else {
        mobileObj.closest('.form-group').removeClass('has-error');
        $('#mobileInvalid').addClass('hidden');
    }

    var getCodeBtn = $('#getCodeBtn');
    getCodeBtn.html('发送中···');

    //$.post('/', {phone:phone}, function(data, status){}, 'json');
    $.ajax({
        type: 'POST',
        url: '/sendSMS',
        // data: {mobile: mobile, _token: '{{ csrf_token() }}'},
        data: {mobile: mobile, _token: token},
        dataType: 'json',
        cache: false,
        success: function(data) {
            if(data.status) {
                $('#sendCodeError').find('strong').html('');
                $('#sendCodeError').addClass('hidden');

                getCodeBtn.attr('disabled', true);

                var minute = 120;
                var interval = window.setInterval(function() {

                    getCodeBtn.html('重新发送(' + minute + ')');

                    minute = minute - 1;
                    if(minute == 0) {
                        getCodeBtn.attr('disabled', false);
                        getCodeBtn.html('获取验证码');

                        window.clearInterval(interval);
                    }
                },1000);
            } else {
               $('#sendCodeError').find('strong').html(data.msg);
               $('#sendCodeError').removeClass('hidden'); 
            }
        },
        error: function(xhr, status, error) {
            $('#sendCodeError').find('strong').html('网络错误').removeClass('hidden');
            console.log(xhr);
            console.log(status);
            console.log(error);
        }
    });
}