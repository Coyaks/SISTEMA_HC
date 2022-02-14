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
            success: function (r) {
                if(r==1){
                    window.location.href='dashboard'
                }else{
                    console.log("Datos incorrectos")
                }
                
            }
        });    
    });

    
});