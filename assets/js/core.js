function calcularEdad(fecha_nac) {
    fecha_nac = fecha_nac.toString()
    edad = 0
    fecha_now = moment().format('DD/MM/YYYY')
    anioNow = Number(fecha_now.split('/')[2])
    mesNow = Number(fecha_now.split('/')[1])
    diaNow = Number(fecha_now.split('/')[0])

    anioNac = Number(fecha_nac.split('/')[2])
    mesNac = Number(fecha_nac.split('/')[1])
    diaNac = Number(fecha_nac.split('/')[0])
    if (mesNow >= mesNac) {
        if (mesNow == mesNac) {
            if (diaNow >= diaNac) {
                edad = anioNow - anioNac
            } else {
                edad = (anioNow - anioNac) - 1
            }
        } else {
            edad = anioNow - anioNac
        }
    } else {
        edad = (anioNow - anioNac) - 1
    }
    return edad
}

/*
    OBTENER DATOS DE UNA PERSONA CON SU DNI
*/
const api_dni = (dni) => {
    if (dni != "") { //validacion campos vacios
        //validacion longitud
        if (dni.length == 8) {
            $.ajax({
                type: "GET",
                url: "https://dniruc.apisperu.com/api/v1/dni/" + dni + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNveWFrczE5QGdtYWlsLmNvbSJ9.1NdRT9-w-xvSN0NONmckZLfMLcVixw_7sC30dAW9ALI",
                dataType: "json",
            }).done((data) => {
                let nombres = data.nombres
                let apellidos = data.apellidoPaterno + " " + data.apellidoMaterno;
                if (nombres != null) {
                    console.error(nombres + " " + apellidos)
                } else {
                    alert("DNI no existe")
                }
            });
        } else {
            alert("Los digitos deben ser 8")
        }
    } else {
        alert("Es necesario ingresar el DNI!");
    }
}

const api_ruc = (ruc) => {
    if(ruc.length==11){ //RUC tienen 11 digitos
        $.ajax({
            type: "GET",
            url: "https://dniruc.apisperu.com/api/v1/ruc/" + ruc + "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNveWFrczE5QGdtYWlsLmNvbSJ9.1NdRT9-w-xvSN0NONmckZLfMLcVixw_7sC30dAW9ALI",
            dataType: "json",
        }).done((data) => {
            let razonSocial=data.razonSocial
            let direccion=data.direccion

            console.log("RAZONN: ",razonSocial)
            console.log(direccion)
        });
    }else{ 
        alert('RUC debe tener 11 dígitos')
    }
    
}


$(document).ready(function () {

});


/**
 * Alert
 */
class Alert {
    static success(message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        // data.message: guardado o actualizado
        Toast.fire({
            icon: 'success',
            title: message
        })
    }
    static success2() {
        Swal.fire({
            icon: 'success',
            text: 'Guardado Correctamente!',
        })
    }
    static error(message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message
        })
    }
}