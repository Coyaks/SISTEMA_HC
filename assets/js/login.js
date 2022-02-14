$(document).ready(function () {

    $('#formLogin').submit(function (e) { 
        e.preventDefault();
        var dataForm=$(this).serialize();
        console.log(dataForm)
       
        $.ajax({
            type: "POST",
            url: "LoginController/login",
            data: dataForm,
            //dataType: "JSON",
            success: function (response) {
                window.location.href='dashboard'
            }
        });    
    });

    
});