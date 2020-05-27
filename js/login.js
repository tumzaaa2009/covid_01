$(document).ready(function () {
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $("#sent").click(function () { 
        var user = $("#user").val();
        var pass = $("#pass").val();;
        $.ajax({
            type: "POST",
            url: "login_check.php",
            data: {user:user, pass:pass},
            success: function (response) {
                //window.alert(response);
                if(response=='yes'){
                    window.location.assign("index.php");
				} else if(response=='empty') {
                    toastr.info('กรุณา! กรอก Username และ Password');
				} else if(response=='fail') {
                    toastr.warning('Username หรือ Password ไม่ถูกต้อง');
				} else if(response=='suspen'){
                    toastr.error('ถูกระงับการใช้งาน! Admin : จังหวัดสระบุรี');
                } else if(response=='error_update'){
                    toastr.error('เกิดข้อผิดพลาด! error(01)');
				} else if(response=='error_insert'){
                    toastr.error('เกิดข้อผิดพลาด! error(02)');
				}else {
                    toastr.error('เกิดข้อผิดพลาด! กรุณาลองใหม่อีกครั้ง');
				} 
            }
        });
        
    });
});