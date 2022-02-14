class Alert{
    static success(message){
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
    static success2(){
        Swal.fire({
            icon: 'success',
            // title: 'Oops...',
            text: 'Guardado Correctamente!',
        })
    }
    static error(message){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message
        })
    }
}